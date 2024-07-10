<?php
session_start();
include 'config.php'; // File koneksi database

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$query = $conn->prepare("SELECT * FROM login_logs ORDER BY login_time DESC");
$query->execute();
$result = $query->get_result();

while ($row = $result->fetch_assoc()) {
    echo "User ID: " . $row['user_id'] . " - Login Time: " . $row['login_time'] . " - Logout Time: " . $row['logout_time'] . "<br>";
}
?>
