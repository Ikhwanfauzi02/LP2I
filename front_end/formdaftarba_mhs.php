<?php
session_start();

// Periksa apakah pengguna sudah login dan memiliki role 'mahasiswa'
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] !== 'mahasiswa')) {
    header('Location: ../back_end/no_access.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <!---<title> Responsive Registration Form>--->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Form</title>
        <link rel="stylesheet" href="../assets/css/formdaftar.css">

</head>
<body>
    <div class="container">
        <button class="button2" onclick="window.location.href='../front_end/ba_mahasiswa.php'">Kembali</button>
        <div class="title">Registration Form</div>
        <div class="content card mt-5">
            <div class="card-body py-1">
                <form action="../back_end/input_mhsba.php" method="POST">
                    <div class="user-details">
                    <div class="input-box">
                        <span class="details">Tahun Angkatan</span>
                        <input type="text" name="angkatan" placeholder="Tahun angkatan" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Semester</span>
                        <input type="text" name="semester" placeholder="Semester" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Alamat</span>
                        <input type="text" name="alamat" placeholder="Alamat lengkap" required>
                    </div>
                    <div class="input-box">
                        <span class="details">No. Mobile</span>
                        <input type="text" name="nomor_hp" placeholder="Masukkan nomor mobile" required>
                    </div>
                    <button class="button1" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>