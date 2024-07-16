<?php
session_start();
require '../config.php';
require '../function.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../back_end/no_access.php');
    exit;
}

$query = $conn->prepare("
    SELECT 
        users.user_id, 
        users.username, 
        users.email,  
        users.nama_lengkap,
        users.password,  /* Tambahkan kolom password di sini */
        users.role,  /* Tambahkan kolom role di sini */
        MAX(login_logs.login_time) AS last_login, 
        MAX(login_logs.logout_time) AS last_logout
    FROM users
    LEFT JOIN login_logs ON users.user_id = login_logs.user_id
    GROUP BY users.user_id
    ORDER BY users.user_id ASC
");
$query->execute();
$result = $query->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Users</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet">
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
            font-family: 'Open Sans', sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .large-text {
            font-size: 35px;
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
                    <a href="../front_end/admin_beranda.php" class="btn btn-primary">Back</a>
                </div>
                <h1 class="display-4 large-text">Data User di website LP2I</h1>
                <div class="data_table px-4">
                    <table id="table-users" class="table display nowrep table-custom table-hover table-bordered" style="width:100%">
                        <thead class="thead-glass">
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>  <!-- Tambahkan kolom password di sini -->
                                <th>Role</th>  <!-- Ganti Created At dengan Role -->
                                <th>Last Login</th>
                                <th>Last Logout</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                $email = decryptValueAES192($row['email'], $secret_key);  // Dekripsi email
                                $password = decryptValueAES192($row['password'], $secret_key);  // Dekripsi password
                                echo "<tr>";
                                echo "<td>{$row['nama_lengkap']}</td>";
                                echo "<td>{$row['username']}</td>";
                                echo "<td>{$email}</td>";
                                echo "<td>{$password}</td>";  // Tambahkan kolom password di sini
                                echo "<td>{$row['role']}</td>";  // Tambahkan kolom role di sini
                                echo "<td>{$row['last_login']}</td>";
                                echo "<td>{$row['last_logout']}</td>";
                                echo "<td>
                                        <button class='btn btn-danger btn-delete' data-id='{$row['user_id']}' data-bs-toggle='modal' data-bs-target='#deleteUserModal'>Hapus Akun</button>
                                        <button class='btn btn-warning btn-reset-password' data-id='{$row['user_id']}' data-bs-toggle='modal' data-bs-target='#resetPasswordModal'>Reset Sandi</button>
                                    </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Reset Password -->
    <div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="../back_end/reset_password.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resetPasswordModalLabel">Reset Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="reset_user_id" name="user_id">
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Reset</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delete User -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="../back_end/delete_user.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteUserModalLabel">Hapus Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="delete_user_id" name="user_id">
                        <p>Apakah Anda yakin ingin menghapus akun ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/cr-2.0.3/date-1.5.2/fc-5.0.1/fh-4.0.1/kt-2.12.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.7.1/sp-2.3.1/sl-2.0.3/sr-1.4.1/datatables.min.js"></script>
    <script>
        // Inisialisasi DataTable
        $(document).ready(function() {
            $('#table-users').DataTable();
        });

        // Modal Reset Password
        $('#resetPasswordModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var user_id = button.data('id');
            var modal = $(this);
            modal.find('#reset_user_id').val(user_id);
        });

        // Modal Delete User
        $('#deleteUserModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var user_id = button.data('id');
            var modal = $(this);
            modal.find('#delete_user_id').val(user_id);
        });
    </script>
</body>
</html>
