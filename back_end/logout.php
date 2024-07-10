<?php
session_start();
include '../config.php'; // File koneksi database

// Atur zona waktu
date_default_timezone_set('Asia/Jakarta'); // Sesuaikan dengan zona waktu Anda

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Catat waktu logout
    $logoutTime = date('Y-m-d H:i:s');
    $logQuery = $conn->prepare("UPDATE login_logs SET logout_time = ? WHERE user_id = ? AND logout_time IS NULL ORDER BY login_time DESC LIMIT 1");
    $logQuery->bind_param('si', $logoutTime, $userId);
    if (!$logQuery->execute()) {
        echo "Error: " . $logQuery->error;
    }
}

session_destroy();
header("Location: ../index.php");
exit();
?>
