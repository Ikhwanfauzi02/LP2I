<?php
session_start();
include '../config.php';
include '../function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        echo "<script>alert('Password baru dan konfirmasi password tidak cocok');
        window.location.href='../front_end/view_users.php';</script>";
        exit;
    }

    $encrypted_new_password = encryptValueAES192($new_password, $secret_key);

    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
    $stmt->bind_param("si", $encrypted_new_password, $user_id);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Password berhasil direset');
    window.location.href='../front_end/view_users.php';</script>";
}
?>
