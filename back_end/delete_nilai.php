<?php
session_start();
require '../config.php';
require '../function.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: no_access.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mahasiswa_id = $_POST['mahasiswa_id'];

    $stmt = $conn->prepare("DELETE FROM grade_bamhs WHERE mahasiswa_id = ?");
    $stmt->bind_param("i", $mahasiswa_id);
    $stmt->execute();
    $stmt->close();

    header('Location: ../front_end/grade_bamhs_admin.php');
    exit;
}
?>
