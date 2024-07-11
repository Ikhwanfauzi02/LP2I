CREATE DATABASE IF NOT EXISTS lppidb;
USE lppidb;

-- Tabel users (untuk pendaftaran akun)
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    nama_lengkap VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'operator', 'mahasiswa') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel mahasiswa (menyimpan data khusus mahasiswa)
CREATE TABLE mahasiswa (
    mahasiswa_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    npm VARCHAR(512) NOT NULL UNIQUE,
    program_studi VARCHAR(512) NOT NULL,
    fakultas VARCHAR(512) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Tabel ba_mahasiswa
CREATE TABLE ba_mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    npm VARCHAR(20),
    angkatan VARCHAR(4),
    semester VARCHAR(2),
    alamat TEXT,
    nomor_hp VARCHAR(15),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (npm) REFERENCES mahasiswa(npm)
);

-- Tabel grade_bamhs
CREATE TABLE grade_bamhs (
    id_grade INT AUTO_INCREMENT PRIMARY KEY,
    mahasiswa_id INT NOT NULL,
    presensi VARCHAR(512),
    baca_tulis_alquran VARCHAR(512),
    al_islam_kemuh VARCHAR(512),
    status VARCHAR(512),
    FOREIGN KEY (mahasiswa_id) REFERENCES mahasiswa(mahasiswa_id) ON DELETE CASCADE
);

-- Tabel admin_details
CREATE TABLE admin_details (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    posisi VARCHAR(255) NOT NULL,
    instansi VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Tabel operator_details
CREATE TABLE operator_details (
    operator_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    posisi VARCHAR(255) NOT NULL,
    instansi VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Tabel login_logs (mencatat waktu login dan logout pengguna)
CREATE TABLE login_logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    logout_time TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);