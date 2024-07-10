<?php
// Ambil username dari sesi
$username = $_SESSION['username'];

// Query untuk mengambil nama_lengkap berdasarkan username
$sql = "SELECT nama_lengkap FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil hasil query
    $row = $result->fetch_assoc();
    $nama_lengkap = $row['nama_lengkap'];
} else {
    $nama_lengkap = "Nama tidak ditemukan";
}
?>