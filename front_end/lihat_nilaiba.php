<?php
session_start();
include '../config.php';
include '../back_end/tagname.php';
// Periksa apakah pengguna sudah login dan memiliki role 'mahasiswa'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mahasiswa') {
    // Jika tidak, redirect ke halaman login
    header('Location: ../back_end/no_access.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Query untuk mengambil data mahasiswa dari beberapa tabel untuk user yang sedang login
$query = $conn->prepare("
    SELECT 
        u.nama_lengkap, 
        m.npm, 
        gb.presensi, 
        gb.baca_tulis_alquran, 
        gb.al_islam_kemuh, 
        gb.status
    FROM grade_bamhs gb
    JOIN mahasiswa m ON gb.mahasiswa_id = m.mahasiswa_id
    JOIN users u ON m.user_id = u.user_id
    WHERE u.user_id = ?
");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();

$data = [];
if ($row = $result->fetch_assoc()) {
    // Dekripsi data sebelum ditambahkan ke array
    $nama_lengkap = $row['nama_lengkap'];
    $npm = decryptValueAES192($row['npm'], $secret_key); // 
    $presensi = decryptValueAES192($row['presensi'], $secret_key);
    $baca_tulis_alquran = decryptValueAES192($row['baca_tulis_alquran'], $secret_key);
    $al_islam_kemuh = decryptValueAES192($row['al_islam_kemuh'], $secret_key);
    $status = decryptValueAES192($row['status'], $secret_key);

    $data = [
        'nama_lengkap' => $nama_lengkap,
        'npm' => $npm,
        'presensi' => $presensi,
        'baca_tulis_alquran' => $baca_tulis_alquran,
        'al_islam_kemuh' => $al_islam_kemuh,
        'status' => $status
    ];
}
$head = '../components/head_mahasiswa.html';
$navbar = '../components/navbar_mahasiswa.html';
$footer = '../components/footer_mahasiswa.html';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>LPPI Universitas Muhammadiyah Bengkulu</title>
    <!-- Navbar -->
    <?php @include($head); ?>
    <!-- Navbar -->
</head>

<body id="top">
    <!-- Navbar -->
    <?php @include($navbar); ?>
    <!-- Navbar -->
    <main>
        <article>
            <!--
        - #SERVICE
    -->

            <section class="section service" id="service" aria-label="service">
                <div class="container">

                    <p class="section-subtitle has-before text-center">Nilai Baitul Arqam</p>
                    <h2 class="h2 section-title text-center">Nilai Baitul Arqom</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="30%">Informasi</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data)) : ?>
                                <tr>
                                    <td>Nama</td>
                                    <td><?= htmlspecialchars($data['nama_lengkap']); ?></td>
                                </tr>
                                <tr>
                                    <td>NPM</td>
                                    <td><?= htmlspecialchars($data['npm']); ?></td>
                                </tr>
                                <tr>
                                    <td>Presensi</td>
                                    <td><?= htmlspecialchars($data['presensi']); ?></td>
                                </tr>
                                <tr>
                                    <td>Baca Tulis Al Qur'an</td>
                                    <td><?= htmlspecialchars($data['baca_tulis_alquran']); ?></td>
                                </tr>
                                <tr>
                                    <td>Al Islam Kemuh</td>
                                    <td><?= htmlspecialchars($data['al_islam_kemuh']); ?></td>
                                </tr>
                                <tr>
                                    <td>Status Kelulusan</td>
                                    <td><?= htmlspecialchars($data['status']); ?></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>-</td>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <td colspan="2" class="text-center">Data tidak ditemukan</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </article>
    </main>
    <!--- #FOOTER-->
    <?php @include($footer); ?>
    <!--- #FOOTER-->
</body>

</html>