<?php
session_start();
include '../config.php';
include '../function.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: ../back_end/no_access.php');
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $old_password = filter_var($_POST['old_password'], FILTER_SANITIZE_SPECIAL_CHARS);
    $new_password = filter_var($_POST['new_password'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_SPECIAL_CHARS);

    // Cek apakah password baru dan konfirmasi password sama
    if ($new_password !== $confirm_password) {
        echo "<script>alert('Password baru dan konfirmasi password tidak cocok');
        window.location.href='../front_end/ganti_password.php';</script>";
        exit;
    }

    // Ambil password saat ini dari database
    $stmt = $conn->prepare("SELECT password FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($encrypted_password);
    $stmt->fetch();
    $stmt->close();

    // Dekripsi password yang tersimpan
    $decrypted_password = decryptValueAES192($encrypted_password, $secret_key);

    // Cek apakah password lama cocok
    if ($old_password !== $decrypted_password) {
        echo "<script>alert('Password lama tidak cocok');
        window.location.href='../front_end/ganti_password.php';</script>";
        exit;
    }

    // Enkripsi password baru
    $encrypted_new_password = encryptValueAES192($new_password, $secret_key);

    // Update password baru di database
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
    $stmt->bind_param("si", $encrypted_new_password, $user_id);
    $stmt->execute();
    $stmt->close();

    // Beri pesan dan arahkan ke halaman login
    echo "<script>alert('Password berhasil diubah');
    window.location.href='../back_end/logout.php';</script>";
    exit;
}
?>

