<?php
session_start();
include '../config.php';
include '../function.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['user_id'], $_POST['new_password'], $_POST['confirm_password'])) {
        die("Required fields missing");
    }

    $user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $new_password = filter_var($_POST['new_password'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_SPECIAL_CHARS);

    if ($new_password !== $confirm_password) {
        echo "<script>alert('Password baru dan konfirmasi password tidak cocok');
        window.location.href='../front_end/view_users.php';</script>";
        exit;
    }

    $encrypted_new_password = encryptValueAES192($new_password, $secret_key);

    // Menggunakan prepared statement untuk mengupdate password
    $query = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
    if ($query === false) {
        die("Error preparing query: " . $conn->error);
    }
    $query->bind_param("si", $encrypted_new_password, $user_id);
    if ($query->execute()) {
        echo "<script>alert('Password berhasil direset');
        window.location.href='../front_end/view_users.php';</script>";
    } else {
        die("Error executing query: " . $query->error);
    }
    $query->close();
}
?>
