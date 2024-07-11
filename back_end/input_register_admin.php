<?php
session_start();
include '../config.php'; // File koneksi database
include '../function.php'; // File fungsi enkripsi

if (isset($_POST['register'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $nama_lengkap = filter_var($_POST['nama_lengkap'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
    $posisi = filter_var($_POST['posisi'], FILTER_SANITIZE_SPECIAL_CHARS);
    $instansi = filter_var($_POST['instansi'], FILTER_SANITIZE_SPECIAL_CHARS);

    // Validasi input
    if (empty($username) || empty($nama_lengkap) || empty($email) || empty($password) || empty($posisi) || empty($instansi)) {
        echo "<script>alert('Semua field harus diisi');</script>";
    } else {
        // Periksa apakah username atau nama lengkap sudah ada
        $query_check = $conn->prepare("SELECT user_id FROM users WHERE username = ? OR email = ?");
        $query_check->bind_param('ss', $username, $email);
        $query_check->execute();
        $query_check->store_result();

        if ($query_check->num_rows > 0) {
            echo "<script>alert('Username atau Email sudah ada.');</script>";
            echo "<script>
                    alert('Username atau Email sudah ada.!!');
                    window.location.href = '../front_end/register_admin.php';
                </script>";
        } else {
            // Encrypt email and password
            $encrypted_email = encryptValueAES192($email, $secret_key);
            $encrypted_password = encryptValueAES192($password, $secret_key);

            // Insert user data into database
            $query = $conn->prepare("INSERT INTO users (username, nama_lengkap, email, password, role) VALUES (?, ?, ?, ?, 'admin')");
            $query->bind_param('ssss', $username, $nama_lengkap, $encrypted_email, $encrypted_password);

            if ($query->execute()) {
                $user_id = $query->insert_id;

                // Insert into admin_details table
                $query_admin = $conn->prepare("INSERT INTO admin_details (user_id, posisi, instansi) VALUES (?, ?, ?)");
                $query_admin->bind_param('iss', $user_id, $posisi, $instansi);
                $query_admin->execute();

                echo "<script>
                        alert('Add User berhasil!!');
                        window.location.href = '../back_end/logout.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Registrasi gagal, coba lagi');
                        window.location.href = '../front_end/register_admin.php';
                    </script>";
            }
        }
    }
}
?>
