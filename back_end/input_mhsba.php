<?php
session_start();
include '../config.php';
include '../function.php';

// Mengecek apakah request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form dan melakukan sanitasi untuk menghindari input yang tidak aman
    $angkatan = filter_var($_POST['angkatan'], FILTER_SANITIZE_SPECIAL_CHARS);
    $semester = filter_var($_POST['semester'], FILTER_SANITIZE_SPECIAL_CHARS);
    $alamat = filter_var($_POST['alamat'], FILTER_SANITIZE_SPECIAL_CHARS);
    $nomor_hp = filter_var($_POST['nomor_hp'], FILTER_SANITIZE_SPECIAL_CHARS);

    // Mengenkripsi data menggunakan fungsi yang telah ditambahkan di function.php
    $encrypted_alamat = encryptValueAES192($alamat, $secret_key);
    $encrypted_nomor_hp = encryptValueAES192($nomor_hp, $secret_key);

    // Mengambil user_id dan username dari sesi yang sedang aktif
    $user_id = $_SESSION['user_id']; // Asumsi user_id disimpan di sesi
    $username = $_SESSION['username']; // Asumsi username disimpan di sesi

    // Mengambil npm dari tabel mahasiswa berdasarkan user_id
    $query_npm = $conn->prepare("SELECT npm FROM mahasiswa WHERE user_id = ?");
    $query_npm->bind_param('i', $user_id);
    $query_npm->execute();
    $result_npm = $query_npm->get_result();
    $row_npm = $result_npm->fetch_assoc();
    $npm = $row_npm['npm'];

    // Mengecek apakah pengguna sudah pernah mendaftar sebelumnya berdasarkan user_id dan npm
    $query_check = $conn->prepare("SELECT * FROM ba_mahasiswa WHERE user_id = ? AND npm = ?");
    $query_check->bind_param('is', $user_id, $npm); // Mengikat parameter user_id dan npm ke query
    $query_check->execute(); // Menjalankan query
    $result_check = $query_check->get_result(); // Mendapatkan hasil dari query

    // Jika sudah ada pendaftaran dengan user_id dan npm tersebut, tampilkan pesan error
    if ($result_check->num_rows > 0) {
        echo "<script>alert('Anda sudah mendaftar sebelumnya!'); 
        window.location.href='../front_end/formdaftarba_mhs.php';</script>";
    } else {
        // Jika belum ada pendaftaran, persiapkan query untuk memasukkan data pendaftaran baru
        $query = $conn->prepare("INSERT INTO ba_mahasiswa (user_id, npm, angkatan, semester, alamat, nomor_hp, waktu_daftar) VALUES (?, ?, ?, ?, ?, ?, NOW())");
        $query->bind_param('isssss', $user_id, $npm, $angkatan, $semester, $encrypted_alamat, $encrypted_nomor_hp); // Mengikat parameter ke query

        // Menjalankan query dan memeriksa apakah berhasil
        if ($query->execute()) {
            // Menampilkan pesan sukses dengan alert JavaScript dan mengarahkan ke halaman ba_mahasiswa.php
            echo "<script>alert('Pendaftaran berhasil!'); 
            window.location.href='../front_end/ba_mahasiswa.php';</script>";
        } else {
            // Menampilkan pesan kesalahan dengan alert JavaScript dan tetap di halaman pendaftaran
            echo "<script>alert('Terjadi kesalahan saat mendaftar. Silakan coba lagi.'); 
            window.location.href='../front_end/formdaftarba_mhs.php';</script>";
        }

        // Menutup pernyataan prepared
        $query->close();
    }

    // Menutup koneksi database
    $conn->close();
}
?>
