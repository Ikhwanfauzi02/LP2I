<?php
// Konfigurasi database
$host = "localhost";
$db = "lppidb";
$user = "root";
$pass = "";
$secret_key = "enclppi2024unmuhbengkulu"; // Ubah sesuai dengan kebutuhan

// Koneksi ke database
$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
