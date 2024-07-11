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
        u.user_id,  
        u.nama_lengkap,
        m.mahasiswa_id,
        m.npm,
        m.program_studi
    FROM users u
    LEFT JOIN mahasiswa m ON u.user_id = m.user_id
    WHERE u.role = 'mahasiswa'
");
$query->execute();
$result = $query->get_result();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['delete_id'])) {
    $mahasiswa_id = $_POST['mahasiswa_id'];
    $presensi = encryptValueAES192($_POST['presensi'], $secret_key);
    $baca_tulis_alquran = encryptValueAES192($_POST['baca_tulis_alquran'], $secret_key);
    $al_islam_kemuh = encryptValueAES192($_POST['al_islam_kemuh'], $secret_key);
    $status = encryptValueAES192($_POST['status'], $secret_key);

    $stmt = $conn->prepare("
        INSERT INTO grade_bamhs (mahasiswa_id, presensi, baca_tulis_alquran, al_islam_kemuh, status) 
        VALUES (?, ?, ?, ?, ?) 
        ON DUPLICATE KEY UPDATE 
        presensi=?, baca_tulis_alquran=?, al_islam_kemuh=?, status=?
    ");
    $stmt->bind_param("issssisss", $mahasiswa_id, $presensi, $baca_tulis_alquran, $al_islam_kemuh, $status, $presensi, $baca_tulis_alquran, $al_islam_kemuh, $status);
    $stmt->execute();
    $stmt->close();
}

$data = [];
while ($row = $result->fetch_assoc()) {
    $nama = $row['nama_lengkap'];
    $npm = decryptValueAES192($row['npm'], $secret_key);
    $prodi = $row['program_studi'];

    $nilai_query = $conn->prepare("SELECT * FROM grade_bamhs WHERE mahasiswa_id = ?");
    $nilai_query->bind_param("i", $row['mahasiswa_id']);
    $nilai_query->execute();
    $nilai_result = $nilai_query->get_result()->fetch_assoc();

    $presensi = $nilai_result ? decryptValueAES192($nilai_result['presensi'], $secret_key) : '';
    $baca_tulis_alquran = $nilai_result ? decryptValueAES192($nilai_result['baca_tulis_alquran'], $secret_key) : '';
    $al_islam_kemuh = $nilai_result ? decryptValueAES192($nilai_result['al_islam_kemuh'], $secret_key) : '';
    $status = $nilai_result ? decryptValueAES192($nilai_result['status'], $secret_key) : '';

    $data[] = [
        'mahasiswa_id' => $row['mahasiswa_id'],
        'nama' => $nama,
        'npm' => $npm,
        'prodi' => $prodi,
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai Mahasiswa Baitul Arqom</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link rel="shortcut icon" href=".7 ./assets/img/umb.png">
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
                    <a href="ba_operator.php" class="btn btn-primary">Back</a>
                </div>
                <div class="container mt-5">
                    <h2 class="display-4 large-text">Nilai Program Baitul Arqam Mahasiswa</h2>
                    <h2 class="display-4 large-text">Universitas Muhammadiyah Bengkulu</h2>
                    <h2 class="display-4 large-text" id="tahun">Tahun</h2>
                    <div class="data_table px-4">
                        <table id="table-sb" class="table display nowrep table-custom table-hover table-bordered" style="width:100%">
                            <thead class="thead-glass">
                                <tr>
                                    <th>Nama</th>
                                    <th>NPM</th>
                                    <th>Prodi</th>
                                    <th>Presensi</th>
                                    <th>Baca Tulis Alquran</th>
                                    <th>Al Islam Kemuh</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $mahasiswa): ?>
                                    <tr>
                                        <td><?= ($mahasiswa['nama']); ?></td>
                                        <td><?= ($mahasiswa['npm']); ?></td>
                                        <td><?= ($mahasiswa['prodi']); ?></td>
                                        <td><?= ($mahasiswa['presensi']); ?></td>
                                        <td><?= ($mahasiswa['baca_tulis_alquran']); ?></td>
                                        <td><?= ($mahasiswa['al_islam_kemuh']); ?></td>
                                        <td><?= ($mahasiswa['status']); ?></td>
                                        <td>
                                            <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#inputNilaiModal' data-id='<?= htmlspecialchars($mahasiswa['mahasiswa_id']); ?>'>Input Nilai</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="inputNilaiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input Nilai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="mahasiswa_id" name="mahasiswa_id">
                        <div class="mb-3">
                            <label for="presensi" class="form-label">Presensi</label>
                            <input type="text" class="form-control" id="presensi" name="presensi" required>
                        </div>
                        <div class="mb-3">
                            <label for="baca_tulis_alquran" class="form-label">Baca Tulis Alquran</label>
                            <input type="text" class="form-control" id="baca_tulis_alquran" name="baca_tulis_alquran" required>
                        </div>
                        <div class="mb-3">
                            <label for="al_islam_kemuh" class="form-label">Al Islam Kemuh</label>
                            <input type="text" class="form-control" id="al_islam_kemuh" name="al_islam_kemuh" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Lulus">Lulus</option>
                                <option value="Tidak Lulus">Tidak Lulus</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Input</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/cr-2.0.3/date-1.5.2/fc-5.0.1/fh-4.0.1/kt-2.12.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.7.1/sp-2.3.1/sl-2.0.3/sr-1.4.1/datatables.min.js"></script>
    <script src="./assets/js/datatables.js"></script>

    <script>
        $('#inputNilaiModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #mahasiswa_id').val(id);
        });
    </script>

</body>
</html>
