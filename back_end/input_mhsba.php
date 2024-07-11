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

    // Mengambil user_id dari sesi yang sedang aktif
    $user_id = $_SESSION['user_id']; // Asumsi user_id disimpan di sesi

    // Mengambil mahasiswa_id dari tabel mahasiswa berdasarkan user_id
    $query_mahasiswa = $conn->prepare("SELECT mahasiswa_id FROM mahasiswa WHERE user_id = ?");
    $query_mahasiswa->bind_param('i', $user_id);
    $query_mahasiswa->execute();
    $result_mahasiswa = $query_mahasiswa->get_result();
    $row_mahasiswa = $result_mahasiswa->fetch_assoc();
    $mahasiswa_id = $row_mahasiswa['mahasiswa_id'];

    // Tambahkan pemeriksaan apakah mahasiswa_id ditemukan
    if (!$mahasiswa_id) {
        echo "<script>alert('Mahasiswa ID tidak ditemukan untuk user_id tersebut'); 
        window.location.href='../front_end/formdaftarba_mhs.php';</script>";
        exit;
    }

    // Mengecek apakah pengguna sudah pernah mendaftar sebelumnya berdasarkan mahasiswa_id
    $query_check = $conn->prepare("SELECT * FROM ba_mahasiswa WHERE mahasiswa_id = ?");
    $query_check->bind_param('i', $mahasiswa_id); // Mengikat parameter mahasiswa_id ke query
    $query_check->execute(); // Menjalankan query
    $result_check = $query_check->get_result(); // Mendapatkan hasil dari query

    // Jika sudah ada pendaftaran dengan mahasiswa_id tersebut, tampilkan pesan error
    if ($result_check->num_rows > 0) {
        echo "<script>alert('Anda sudah mendaftar sebelumnya!'); 
        window.location.href='../front_end/formdaftarba_mhs.php';</script>";
    } else {
        // Jika belum ada pendaftaran, persiapkan query untuk memasukkan data pendaftaran baru
        $query = $conn->prepare("INSERT INTO ba_mahasiswa (mahasiswa_id, angkatan, semester, alamat, nomor_hp, waktu_daftar) VALUES (?, ?, ?, ?, ?, NOW())");
        $query->bind_param('issss', $mahasiswa_id, $angkatan, $semester, $encrypted_alamat, $encrypted_nomor_hp); // Mengikat parameter ke query

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
