<?php
session_start();
include '../config.php'; // File koneksi database
include '../function.php'; // File fungsi enkripsi

if (isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $nama_lengkap = filter_var($_POST['nama_lengkap'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
    $role = filter_var($_POST['role'], FILTER_SANITIZE_SPECIAL_CHARS);

    // Validasi input
    if (empty($username) || empty($nama_lengkap) || empty($email) || empty($password) || empty($role)) {
        echo "<script>alert('Semua field harus diisi');</script>";
    } else {
        // Periksa apakah username atau email sudah ada
        $query_check = $conn->prepare("SELECT user_id FROM users WHERE username = ? OR email = ?");
        $query_check->bind_param('ss', $username, $email);
        $query_check->execute();
        $query_check->store_result();
        
        if ($query_check->num_rows > 0) {
            echo "<script>alert('Username atau Email sudah ada.');</script>";
            echo "<script>
                    alert('Username atau Email sudah ada.!!');
                    window.location.href = '../front_end/register.php';
                </script>";
        } else {
            // Encrypt email and password
            $encrypted_email = encryptValueAES192($email, $secret_key);
            $encrypted_password = encryptValueAES192($password, $secret_key);

            // Insert user data into database
            $query = $conn->prepare("INSERT INTO users (username, nama_lengkap, email, password, role) VALUES (?, ?, ?, ?, ?)");
            $query->bind_param('sssss', $username, $nama_lengkap, $encrypted_email, $encrypted_password, $role);
            
            if ($query->execute()) {
                $user_id = $query->insert_id;

                // Additional details based on role
                if ($role === 'mahasiswa') {
                    $npm = filter_var($_POST['npm'], FILTER_SANITIZE_SPECIAL_CHARS);
                    $program_studi = filter_var($_POST['program_studi'], FILTER_SANITIZE_SPECIAL_CHARS);
                    $fakultas = filter_var($_POST['fakultas'], FILTER_SANITIZE_SPECIAL_CHARS);
                
                    // Encrypt other details
                    $encrypted_npm = encryptValueAES192($npm, $secret_key);
                
                    // Insert into mahasiswa table
                    $query_mahasiswa = $conn->prepare("INSERT INTO mahasiswa (user_id, npm, program_studi, fakultas) VALUES (?, ?, ?, ?)");
                    $query_mahasiswa->bind_param('isss', $user_id, $encrypted_npm, $program_studi, $fakultas);
                    $query_mahasiswa->execute();
                } elseif ($role === 'operator') {
                    $posisi = filter_var($_POST['posisi'], FILTER_SANITIZE_SPECIAL_CHARS);
                    $instansi = filter_var($_POST['instansi'], FILTER_SANITIZE_SPECIAL_CHARS);
                
                    // Insert into operator_details table
                    $query_operator = $conn->prepare("INSERT INTO operator_details (user_id, posisi, instansi) VALUES (?, ?, ?)");
                    $query_operator->bind_param('iss', $user_id, $posisi, $instansi);
                    $query_operator->execute();
                }

                echo "<script>
                        alert('Add User berhasil!!');
                        window.location.href = '../front_end/register.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Registrasi gagal, coba lagi');
                        window.location.href = '../front_end/register.php';
                    </script>";
            }
        }
    }
}
?>
