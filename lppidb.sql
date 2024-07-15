-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2024 at 05:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lppidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`admin_id`, `user_id`, `posisi`, `instansi`) VALUES
(1, 1, 'Staff IT', 'UPTTIK');

-- --------------------------------------------------------

--
-- Table structure for table `ba_mahasiswa`
--

CREATE TABLE `ba_mahasiswa` (
  `id_baitul` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `angkatan` varchar(20) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nomor_hp` varchar(512) DEFAULT NULL,
  `waktu_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ba_mahasiswa`
--

INSERT INTO `ba_mahasiswa` (`id_baitul`, `mahasiswa_id`, `angkatan`, `semester`, `alamat`, `nomor_hp`, `waktu_daftar`) VALUES
(1, 1, '2020', '10', 'vGpxwYNlAxRydyAUAFQuEWhUYgqUD07Yu3wJhhfKJLV2XZBUo8XEvVXJ+Y5tl4gNdSPOI90fFebzJyqrGtm2afMTOi9nqUUQwVdifgXKBb7CxEUm4o3Ibw32IEgzJXaoNxT4QHQ/ZGQgr3N2aWQUVA==', 'VNYppEVUeNGKjYtNpTO7OmKDcADYheIyfPFABda58ncNX6djza5LX3F85yJhp+O7', '2024-07-12 02:15:06'),
(2, 2, '2020', '20', 'R70f9H0zM4yijJ4J0Hx+eYUB4jDkPQJommPSRPHxKpapUaVDlCJU2Vvh2vrc9i7j', 'v091IBMafm6Lce4gGXpj6mTxYCysSoBRpV2xCTzr7omPn2XpSHKakcsMjvn6HUX+', '2024-07-14 15:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `grade_bamhs`
--

CREATE TABLE `grade_bamhs` (
  `id_grade` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `presensi` varchar(512) DEFAULT NULL,
  `baca_tulis_alquran` varchar(512) DEFAULT NULL,
  `al_islam_kemuh` varchar(512) DEFAULT NULL,
  `status` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade_bamhs`
--

INSERT INTO `grade_bamhs` (`id_grade`, `mahasiswa_id`, `presensi`, `baca_tulis_alquran`, `al_islam_kemuh`, `status`) VALUES
(1, 1, 'L7qxiVh5YLFVi0Z9GrAppJSJU3+9ZE4OOWwVoZ4T2eRdvfo1gXUrc/wQLpw4lcBr', 'xS+BPbbIVgSoWXSo2YFPhd72ZCKgCRkaXGKXHyqHuZNygDox18yLJxlDU9HRS8mN', 'MEl/plliMdKFK7rFKIbqZuZnr/K0FdEaEjaNDk59Yi34HY3YK4T5rzR5z9jRu4Mr', 'hqPIPNxyXP2PB/lKjRS4YEIxsBIaY5bht/RNX0GS3ymIQ9jIzt1gwnL4B1DPkpp5'),
(2, 2, 'jJV6Q0TguHRzqxaLGDiT3lHUY9Tg5xvhQPf4k1A0eFxziVyG6Xm+qQ0WE5KDprri', 'Ide8LASntLFjrVHD/5TE3JXHWdAanAUZce+uA6GZeaGoXoIxXqoJUiC6tyxKIUVX', 'wnjl1SwM3gss8D5hML+NTJxmJDXMn33LTn6ZYRfCY/1L1x4hjVGIZVAp4kAUzpdj', 'u8WQJltal8zsTRBN4u2K60TZmKrhLTOuPzbIzidbeSsN5azxnS/Ru5/OSRnAthsX');

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`log_id`, `user_id`, `login_time`, `logout_time`) VALUES
(1, 1, '2024-07-12 01:50:49', '2024-07-12 01:53:36'),
(2, 2, '2024-07-12 01:53:46', '2024-07-12 02:02:47'),
(3, 3, '2024-07-12 02:02:59', '2024-07-12 02:08:31'),
(4, 2, '2024-07-12 02:08:37', '2024-07-12 02:14:40'),
(5, 3, '2024-07-12 02:14:48', '2024-07-12 02:17:57'),
(6, 2, '2024-07-12 02:18:03', '2024-07-12 02:18:44'),
(7, 1, '2024-07-12 02:18:50', '2024-07-12 02:21:14'),
(8, 4, '2024-07-12 02:21:42', '2024-07-12 02:25:32'),
(9, 4, '2024-07-12 02:25:39', '2024-07-12 02:25:45'),
(10, 4, '2024-07-12 02:25:50', '2024-07-12 02:25:58'),
(11, 4, '2024-07-12 02:27:11', '2024-07-12 02:29:25'),
(12, 4, '2024-07-12 02:30:06', '2024-07-12 02:30:15'),
(13, 2, '2024-07-12 02:30:33', NULL),
(14, 2, '2024-07-14 14:56:58', '2024-07-14 15:13:05'),
(15, 4, '2024-07-14 15:13:12', '2024-07-14 15:16:50'),
(16, 1, '2024-07-14 15:17:22', '2024-07-14 15:17:42'),
(17, 1, '2024-07-14 15:18:35', '2024-07-14 15:34:39'),
(18, 4, '2024-07-14 15:34:58', '2024-07-14 15:35:24'),
(19, 2, '2024-07-14 15:35:31', '2024-07-14 15:36:06'),
(20, 4, '2024-07-14 15:36:11', '2024-07-14 15:39:10'),
(21, 1, '2024-07-14 15:39:16', '2024-07-14 15:39:57'),
(22, 1, '2024-07-14 15:40:54', '2024-07-14 15:41:29'),
(23, 3, '2024-07-14 15:41:34', '2024-07-14 15:58:49'),
(24, 1, '2024-07-14 15:58:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `npm` varchar(512) NOT NULL,
  `program_studi` varchar(512) NOT NULL,
  `fakultas` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_id`, `user_id`, `npm`, `program_studi`, `fakultas`) VALUES
(1, 3, 'ilkMhilh8tOSz0lf5pRUFvBkXzttfVzfnP5tTeUVTiYQ6LTA+rWwgBpfKUiFUCFR', 'Arsitektur', 'Teknik'),
(2, 4, 'Y+MtG9h6/EIb3pmjbx/Q+GF6D9t0u/vR6YUSJ7B3NWHANj1onKZTYThXwa9VCb0L', 'Informatika', 'Teknik');

-- --------------------------------------------------------

--
-- Table structure for table `operator_details`
--

CREATE TABLE `operator_details` (
  `operator_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operator_details`
--

INSERT INTO `operator_details` (`operator_id`, `user_id`, `posisi`, `instansi`) VALUES
(1, 2, 'Staff IT', 'Teknik');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','operator','mahasiswa') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `nama_lengkap`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Adminlppi', 'ikhwan pau', 'c965rDVfKtbu+ZenP93P09jp17jYivkGONOhBdliW5Fvhn7XkDr6/69YEsNosuje', '1QhnhXJ84zobeQ/ezTuhI/XVqkUWIMeEWmBAshfAgeKCTxNUlhRCdq8KBN8H20mH', 'admin', '2024-07-12 01:50:33'),
(2, 'abrar', 'abrar abe', 'MqdZQ0bgNNQWj4lTLfatRqBTZJSZECNNDGhPQM5YSGjHentU24chWn4a8hgeTVgs', 'lq2qaf0aIBneMp4rL7otX6PzNBA2ybhF1fIKm/9WHrf37YQNiK2PjL8RGrCo17m8', 'operator', '2024-07-12 01:51:51'),
(3, 'baskoro', 'Fauzi Baskoro', 'WZapY9f3d6LqaLxHpYJBPSE3anJHqhzavcIEhF/iItnjIKMfxfEI4q4riwZMJmFzkmaypIxHAiBv/Q4Ig5/70Q==', 'Vw6Mz0+74JizZI4HYOyd3AXYCxFwhur7hgwAmkTeZxHgnPJ+Q/WD9MP3GgRNMxi9', 'mahasiswa', '2024-07-12 01:52:16'),
(4, 'iqbal', 'iqbal muhammad', 'RsXbN/3xU6sEgwjKAJ+evAS4/c4y7Wq2TWztR3T/0LW7SCamHb4kCR46Pk/bhDte', 'ZKuqX2/3strrrVKmjwFf6D48a6cXcEHlcRiq85dlcbNZhTXHGOmhEByVFkn7XnRT', 'mahasiswa', '2024-07-12 02:19:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ba_mahasiswa`
--
ALTER TABLE `ba_mahasiswa`
  ADD PRIMARY KEY (`id_baitul`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indexes for table `grade_bamhs`
--
ALTER TABLE `grade_bamhs`
  ADD PRIMARY KEY (`id_grade`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`),
  ADD UNIQUE KEY `npm` (`npm`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `operator_details`
--
ALTER TABLE `operator_details`
  ADD PRIMARY KEY (`operator_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ba_mahasiswa`
--
ALTER TABLE `ba_mahasiswa`
  MODIFY `id_baitul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grade_bamhs`
--
ALTER TABLE `grade_bamhs`
  MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `operator_details`
--
ALTER TABLE `operator_details`
  MODIFY `operator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD CONSTRAINT `admin_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `ba_mahasiswa`
--
ALTER TABLE `ba_mahasiswa`
  ADD CONSTRAINT `ba_mahasiswa_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`mahasiswa_id`) ON DELETE CASCADE;

--
-- Constraints for table `grade_bamhs`
--
ALTER TABLE `grade_bamhs`
  ADD CONSTRAINT `grade_bamhs_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`mahasiswa_id`) ON DELETE CASCADE;

--
-- Constraints for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD CONSTRAINT `login_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `operator_details`
--
ALTER TABLE `operator_details`
  ADD CONSTRAINT `operator_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
