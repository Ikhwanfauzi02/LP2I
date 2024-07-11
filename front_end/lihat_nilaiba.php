<?php
session_start();
include '../config.php';
include '../function.php';

// Periksa apakah pengguna sudah login dan memiliki role 'mahasiswa'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mahasiswa') {
    // Jika tidak, redirect ke halaman no_access
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
    $npm = decryptValueAES192($row['npm'], $secret_key); // Tidak perlu didekripsi
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Program Baitul Arqam Mahasiswa UMB</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.3/date-1.5.2/fc-5.0.1/fh-4.0.1/kt-2.12.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.7.1/sp-2.3.1/sl-2.0.3/sr-1.4.1/datatables.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/umb.png">
    <style>
        body {
            background-image: url('../assets/img/umbkampus4.png');
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Times New Roman', Times, serif;
        }

        .large-text {
            font-size: 30px;
        }

        .table-custom {
            width: 100%;
            margin: 0 auto;
        }

        .display-4 {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body py-1">
                <div class="text-end mt-3">
                    <a href="ba_mahasiswa.php" class="btn btn-primary">Back</a>
                </div>
                <div class="container mt-5">
                    <h2 class="display-4 large-text">Nilai Program Baitul Arqam Mahasiswa</h2>
                    <h2 class="display-4 large-text">Universitas Muhammadiyah Bengkulu</h2>
                    <h2 class="display-4 large-text" id="tahun">Tahun</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="datatable">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/cr-2.0.3/date-1.5.2/fc-5.0.1/fh-4.0.1/kt-2.12.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.7.1/sp-2.3.1/sl-2.0.3/sr-1.4.1/datatables.min.js"></script>
    <script src="../assets/js/datatables.js"></script>
</body>

</html>