<?php
session_start();
include '../config.php';
include '../function.php';

// Periksa apakah pengguna sudah login dan memiliki role admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../back_end/no_access.php');
    exit;
}

// Inisialisasi variabel
$npm_found = false;
$npm_error = '';
$mahasiswa = null;

if (isset($_SESSION['mahasiswa'])) {
    $mahasiswa = $_SESSION['mahasiswa'];
    $npm_found = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Daftar Mahasiswa Baitul Arqom</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Daftarkan Mahasiswa Baitul Arqom</h2>
        
        <!-- Form untuk cek NPM -->
        <form method="POST" action="../back_end/input_mhsba_admin.php">
        <div class="text-end mt-3">
                    <a href="ba_admin.php" class="btn btn-danger">Back</a>
        </div>
            <div class="mb-3">
                <label for="npm" class="form-label">Masukkan NPM Mahasiswa</label>
                <input type="text" class="form-control" id="npm" name="npm" value="<?= isset($npm) ? ($npm) : '' ?>" required>
                <button type="submit" name="check_npm" class="btn btn-primary mt-2">Cek NPM</button>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger mt-2"><?= ($_SESSION['error']) ?></div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
            </div>
        </form>

        <?php if ($npm_found): ?>
            <!-- Form pendaftaran mahasiswa hanya jika NPM ditemukan -->
            <form method="POST" action="../back_end/input_mhsba_admin.php">
                <input type="hidden" name="npm" value="<?= ($mahasiswa['npm']) ?>">
                <div class="mb-3">
                    <label for="angkatan" class="form-label">Angkatan</label>
                    <input type="text" class="form-control" id="angkatan" name="angkatan" required>
                </div>
                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <input type="text" class="form-control" id="semester" name="semester" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <div class="mb-3">
                    <label for="nomor_hp" class="form-label">Nomor HP</label>
                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
                </div>
                <!-- Tambahkan input lainnya sesuai kebutuhan -->
                <button type="submit" name="register" class="btn btn-primary">Daftarkan</button>
            </form>
        <?php endif; ?>
        
    </div>
</body>
</html>