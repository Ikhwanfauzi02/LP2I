<?php
session_start();
include '../config.php'; // File koneksi database
include '../function.php'; // File fungsi enkripsi

if (isset($_POST['submit'])) {

    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

    // Validasi input
    if (empty($username) || empty($password)) {
        echo "<script>
                alert('Username dan password harus diisi!!');
                window.location.href = '../front_end/login.php';
            </script>";
    } else {
        // Pencocokan username di database
        $query = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $query->bind_param('s', $username);
        $query->execute();
        $result = $query->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            // Dekripsi password dari database
            $decrypted_password = decryptValueAES192($user['password'], $secret_key);

            // Cocokkan password yang didekripsi dengan password yang dimasukkan
            if ($decrypted_password === $password) {
                $_SESSION['user_id'] = $user['user_id']; 
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Catat waktu login
                $logQuery = $conn->prepare("INSERT INTO login_logs (user_id, login_time) VALUES (?, NOW())");
                if ($logQuery === false) {
                    die("Error preparing login log query: " . $conn->error);
                }

                $logQuery->bind_param('i', $user['user_id']);
                if ($user['user_id'] === null) {
                    die("Error: user_id is null");
                }

                if (!$logQuery->execute()) {
                    die("Error executing login log query: " . $logQuery->error);
                }

                // Redirect berdasarkan role
                switch ($user['role']) {
                    case 'admin':
                        header('Location: ../front_end/admin_beranda.php');
                        break;
                    case 'operator':
                        header('Location: ../front_end/operator_beranda.php');
                        break;
                    case 'mahasiswa':
                        header('Location: ../front_end/mahasiswa_beranda.php');
                        break;
                }
                exit;
            } else {
                echo "<script>
                    alert('Email atau password Anda tidak sesuai!!');
                    window.location.href = '../front_end/login.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Email atau password Anda tidak sesuai!!');
                window.location.href = '../front_end/login.php';
            </script>";
        }
    }
}
?>