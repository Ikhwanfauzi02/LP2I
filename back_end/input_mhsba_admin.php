<?php
session_start();
include '../config.php';
include '../function.php';

// Periksa apakah pengguna sudah login dan memiliki role admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: no_access.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['check_npm'])) {
    $npm_input = $_POST['npm'];
    
    // Mendapatkan semua NPM dari database dan mendekripsi untuk perbandingan
    $query = $conn->prepare("SELECT * FROM mahasiswa");
    $query->execute();
    $result = $query->get_result();
    
    $mahasiswa = null;
    while ($row = $result->fetch_assoc()) {
        $decrypted_npm = decryptValueAES192($row['npm'], $secret_key);
        if ($decrypted_npm === $npm_input) {
            $mahasiswa = $row;
            $mahasiswa['npm'] = $decrypted_npm; // Menyimpan NPM yang didekripsi untuk ditampilkan
            break;
        }
    }

    if ($mahasiswa) {
        $_SESSION['mahasiswa'] = $mahasiswa;
    } else {
        $_SESSION['error'] = 'NPM tidak ditemukan';
    }

    header('Location: ../front_end/form_daftarba_admin.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $npm = $_POST['npm'];
    $angkatan = $_POST['angkatan'];
    $semester = $_POST['semester'];
    $alamat = encryptValueAES192($_POST['alamat'], $secret_key);
    $nomor_hp = encryptValueAES192($_POST['nomor_hp'], $secret_key);
    $user_id = $_SESSION['mahasiswa']['user_id'];

    // Lanjutkan proses pendaftaran
    $stmt = $conn->prepare("INSERT INTO ba_mahasiswa (user_id, npm, angkatan, semester, alamat, nomor_hp) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $user_id, $npm, $angkatan, $semester, $alamat, $nomor_hp);
    $stmt->execute();
    $stmt->close();

    // Hapus data mahasiswa dari sesi setelah berhasil mendaftar
    unset($_SESSION['mahasiswa']);

    header('Location: ../front_end/sukses.php');
    exit;
}
?>