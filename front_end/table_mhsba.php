<?php
session_start();
include '../config.php';
include '../function.php';

if (!isset($_SESSION['user_id']) || ($_SESSION['role'] !== 'operator')) {
    header('Location: ../back_end/no_access.php');
    exit;
}

// Query untuk mengambil data mahasiswa dari beberapa tabel
$query = $conn->prepare("
    SELECT 
        ba_mahasiswa.id_baitul, 
        ba_mahasiswa.mahasiswa_id, 
        mahasiswa.npm, 
        mahasiswa.program_studi, 
        mahasiswa.fakultas, 
        ba_mahasiswa.angkatan, 
        ba_mahasiswa.semester, 
        ba_mahasiswa.alamat, 
        ba_mahasiswa.nomor_hp,
        users.username,
        users.nama_lengkap
    FROM ba_mahasiswa 
    JOIN mahasiswa ON ba_mahasiswa.mahasiswa_id = mahasiswa.mahasiswa_id
    JOIN users ON mahasiswa.user_id = users.user_id
");
$query->execute();
$result = $query->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    // Dekripsi data sebelum ditambahkan ke array
    $nama_lengkap = $row['nama_lengkap'];
    $npm = decryptValueAES192($row['npm'], $secret_key);
    $program_studi = $row['program_studi'];
    $fakultas = $row['fakultas'];
    $angkatan = $row['angkatan'];
    $semester = $row['semester'];
    $alamat = decryptValueAES192($row['alamat'], $secret_key);
    $nomor_hp = decryptValueAES192($row['nomor_hp'], $secret_key);

    $data[] = [
        'nama_lengkap' => $nama_lengkap,
        'npm' => $npm,
        'program_studi' => $program_studi,
        'fakultas' => $fakultas,
        'angkatan' => $angkatan,
        'semester' => $semester,
        'alamat' => $alamat,
        'nomor_hp' => $nomor_hp
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa Baitul Arqom</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/umb.png">
    <style>
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
                    <a href="ba_operator.php" class="btn btn-primary">Back</a>
                </div>
                <div class="container mt-5">
                    <h2 class="display-4 large-text">Nilai Program Baitul Arqam Mahasiswa</h2>
                    <h2 class="display-4 large-text">Universitas Muhammadiyah Bengkulu</h2>
                    <h2 class="display-4 large-text" id="tahun">Tahun</h2>
                    <div class="data_table px-4">
                        <table id="table-sb" class="table table-bordered display compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NPM</th>
                                    <th>Prodi</th>
                                    <th>Fakultas</th>
                                    <th>Semester</th>
                                    <th>Angkatan</th>
                                    <th>Alamat</th>
                                    <th>Nomor HP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $index => $mahasiswa): ?>
                                    <tr>
                                        <td><?= ($mahasiswa['nama_lengkap']); ?></td>
                                        <td><?= ($mahasiswa['npm']); ?></td>
                                        <td><?= ($mahasiswa['program_studi']); ?></td>
                                        <td><?= ($mahasiswa['fakultas']); ?></td>
                                        <td><?= ($mahasiswa['semester']); ?></td>
                                        <td><?= ($mahasiswa['angkatan']); ?></td>
                                        <td><?= ($mahasiswa['alamat']); ?></td>
                                        <td><?= ($mahasiswa['nomor_hp']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
