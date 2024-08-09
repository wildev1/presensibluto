-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 04:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emall`
--

-- --------------------------------------------------------

--
-- Table structure for table `lembaga`
--

CREATE TABLE `lembaga` (
  `lembaga_id` varchar(32) NOT NULL,
  `nama_lembaga` varchar(255) DEFAULT NULL,
  `nsm` varchar(20) DEFAULT NULL,
  `npsm` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `nama_pimpinan` varchar(255) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `qrcode` varchar(220) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lembaga`
--

INSERT INTO `lembaga` (`lembaga_id`, `nama_lembaga`, `nsm`, `npsm`, `alamat`, `kecamatan`, `kabupaten`, `provinsi`, `logo`, `nama_pimpinan`, `nip`, `qrcode`, `create_at`, `updated_at`) VALUES
('c4ca4238a0b923820dcc509a6f75849b', 'Apins Digital', '1234567890', '0987654321', 'Jl. Raya lembaga No. 123', 'Kota', 'Kabupaten A', 'Provinsi X', '026be910c0938b7ab3e227328df8fe21.png', 'Apins Digital', '12345S', 'qrcode_12345S.png', '2024-07-02 11:17:19', '2024-07-02 15:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `permission_id` varchar(50) NOT NULL,
  `nama_permission` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`permission_id`, `nama_permission`, `created_at`, `updated_at`) VALUES
('0d0a0d29cb1ea09e5b114a25488f1c2a', 'Delete', '2024-07-05 16:14:25', '2024-07-05 16:14:25'),
('1bff2aa4f947f117b88a5561c811ebb1', 'View', '2024-07-06 05:23:09', '2024-07-06 05:23:09'),
('5ff1ba6c236958a0988a2f562cae7350', 'Create', '2024-07-05 16:14:48', '2024-07-05 16:14:48'),
('cb6d763bd964c0ecceb11c47f0764180', 'Update', '2024-07-05 16:14:17', '2024-07-05 16:14:17'),
('d6a1994cd679638e9bf39963bb4c7ede', 'Edit', '2024-07-05 16:14:07', '2024-07-05 16:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `persentase_tagihan`
--

CREATE TABLE `persentase_tagihan` (
  `persentase_tagihan_id` varchar(50) NOT NULL,
  `jabatan_santri` varchar(100) DEFAULT NULL,
  `potongan` varchar(100) DEFAULT NULL,
  `pembayaran` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `persentase_tagihan`
--

INSERT INTO `persentase_tagihan` (`persentase_tagihan_id`, `jabatan_santri`, `potongan`, `pembayaran`, `deskripsi`, `created_at`, `updated_at`) VALUES
('094db1cb001f6ff646db7901258a6694', 'Pengurus Pusat', '5', '95', '-', '2024-07-03 23:57:55', '2024-07-04 01:22:25'),
('4b9175c8cd48c675f68dcfeb12caf212', 'Santri', '0', '100', '-', '2024-07-04 05:40:34', '2024-07-04 05:40:34'),
('5c6d08a8c30ede481d34d14aee0b1778', 'Pengurus kamar', '25', '75', '-', '2024-07-04 00:05:43', '2024-07-05 03:47:33'),
('aa1091eddc21b95f23ffa04c2a5c8d78', 'Pengurus Harian P2AL', '0', '100', '-', '2024-07-03 23:54:38', '2024-07-04 01:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `rayon`
--

CREATE TABLE `rayon` (
  `rayon_id` varchar(50) NOT NULL,
  `kode_rayon` varchar(100) DEFAULT NULL,
  `nama_rayon` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rayon`
--

INSERT INTO `rayon` (`rayon_id`, `kode_rayon`, `nama_rayon`, `deskripsi`, `created_at`, `updated_at`) VALUES
('0effab2c278abb28794e80dbd9beca6e', 'RN-89397', 'Al-Bukhary', '-', '2024-07-02 08:22:22', '2024-07-02 08:22:22'),
('c4c3895ba23ae3110fd899fd5d2a93ff', 'RN-43639', 'RLA', '-', '2024-07-04 07:44:55', '2024-07-04 07:44:55'),
('cc5a3e63dd5e2a01c13ad1e5e7cdc6a4', 'RN-23624', 'Al-Idrisy', '-', '2024-07-02 08:21:28', '2024-07-02 08:21:28'),
('d8d124cddc80af2d9b0ea74fde1120f7', 'RN-31815', 'RLA', '-', '2024-07-02 08:20:29', '2024-07-02 08:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roles_id` varchar(50) NOT NULL,
  `nama_roles` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roles_id`, `nama_roles`, `created_at`, `updated_at`) VALUES
('1', 'Admin', '2024-07-05 16:40:51', '2024-07-07 04:57:00'),
('5b434c663f169307ee7023d2257db077', 'Administrator', '2024-07-06 01:49:43', '2024-07-06 01:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permission`
--

CREATE TABLE `roles_permission` (
  `roles_permission_id` varchar(50) NOT NULL,
  `roles_id` varchar(50) DEFAULT NULL,
  `permission_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles_permission`
--

INSERT INTO `roles_permission` (`roles_permission_id`, `roles_id`, `permission_id`, `created_at`, `updated_at`) VALUES
('114ed13b90d1f46e101da7a888c59530', '5b434c663f169307ee7023d2257db077', '0d0a0d29cb1ea09e5b114a25488f1c2a', '2024-07-06 05:25:13', '2024-07-06 05:25:13'),
('47e3814cb1a4d60058c90a61206063ec', '5b434c663f169307ee7023d2257db077', '5ff1ba6c236958a0988a2f562cae7350', '2024-07-06 05:25:13', '2024-07-06 05:25:13'),
('7dca97d8dbdb0bb6cf0fd2e744fb18a7', '1', '0d0a0d29cb1ea09e5b114a25488f1c2a', '2024-07-06 05:25:13', '2024-07-06 05:25:13'),
('9525f492c689ed3921b61d69fd816d21', '5b434c663f169307ee7023d2257db077', 'd6a1994cd679638e9bf39963bb4c7ede', '2024-07-06 05:25:13', '2024-07-06 05:25:13'),
('c43d914af61c855db307cfb997de3ebc', '1', '1bff2aa4f947f117b88a5561c811ebb1', '2024-07-06 05:25:13', '2024-07-06 05:25:13'),
('cd95752fd3d738c6abef43a5fd247fbd', '5b434c663f169307ee7023d2257db077', 'cb6d763bd964c0ecceb11c47f0764180', '2024-07-06 05:25:13', '2024-07-06 05:25:13'),
('e2cee9d68a716b48fb9877fe7a24fded', '5b434c663f169307ee7023d2257db077', '1bff2aa4f947f117b88a5561c811ebb1', '2024-07-06 05:25:13', '2024-07-06 05:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `santri_id` varchar(50) NOT NULL,
  `rayon_id` varchar(50) DEFAULT NULL,
  `tahun_ajaran_id` varchar(50) DEFAULT NULL,
  `persentase_tagihan_id` varchar(50) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nik_santri` varchar(20) DEFAULT NULL,
  `no_kk` varchar(50) DEFAULT NULL,
  `nama_santri` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `hubungan_wali` varchar(50) DEFAULT NULL,
  `tanggal_aktivasi` date DEFAULT NULL,
  `tanggal_penutupan` date DEFAULT NULL,
  `fingerprint_data` text DEFAULT NULL,
  `status_santri` enum('aktif','non-aktif') DEFAULT 'aktif',
  `status_kartu` enum('aktif','non-aktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`santri_id`, `rayon_id`, `tahun_ajaran_id`, `persentase_tagihan_id`, `nis`, `nik_santri`, `no_kk`, `nama_santri`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nama_ayah`, `hubungan_wali`, `tanggal_aktivasi`, `tanggal_penutupan`, `fingerprint_data`, `status_santri`, `status_kartu`, `created_at`, `updated_at`) VALUES
('6686277e3dbd7', '0effab2c278abb28794e80dbd9beca6e', '44364c24af8bac2bd3080ad4ccc727f7', '5c6d08a8c30ede481d34d14aee0b1778', '0192090901', '3529101701000004', '3529101701000001', 'Aqid Fahri Hafin', 'Laki-laki', 'Sumenep', '1999-09-17', '-', 'HAMDI', NULL, NULL, NULL, NULL, 'aktif', 'aktif', '2024-07-04 04:39:26', '2024-07-04 04:39:26'),
('668638714c906', 'cc5a3e63dd5e2a01c13ad1e5e7cdc6a4', '44364c24af8bac2bd3080ad4ccc727f7', '4b9175c8cd48c675f68dcfeb12caf212', '0192090905', '3529101701000002', '3529101701000001', 'Zainur Ridha', 'Laki-laki', 'Sumenep', '2024-07-05', '-', 'ahmad', NULL, NULL, NULL, NULL, 'aktif', 'aktif', '2024-07-04 05:51:45', '2024-07-04 05:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` varchar(36) NOT NULL,
  `semester` varchar(36) NOT NULL,
  `tahun_ajaran_id` varchar(36) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester`, `tahun_ajaran_id`, `create_at`) VALUES
('59131ae71a8ec51199a7d127884ee098', 'Kedua', '68219d86e7ccd797d70f39977d1bf031', '2024-07-04 05:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `tagihan_id` varchar(50) NOT NULL,
  `santri_id` varchar(50) DEFAULT NULL,
  `tahun_ajaran_id` varchar(50) DEFAULT NULL,
  `jenis_tagihan` varchar(50) DEFAULT NULL,
  `jumlah_tagihan` decimal(10,2) DEFAULT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` enum('Lunas','Belum Lunas') DEFAULT 'Belum Lunas',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`tagihan_id`, `santri_id`, `tahun_ajaran_id`, `jenis_tagihan`, `jumlah_tagihan`, `tanggal_jatuh_tempo`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
('66b44081eb06e', '6686277e3dbd7', '68219d86e7ccd797d70f39977d1bf031', 'SPP', '90.00', '2024-08-08', 'p', 'Belum Lunas', '2024-08-08 03:50:25', '2024-08-08 03:50:25'),
('66b44081eb083', '668638714c906', '68219d86e7ccd797d70f39977d1bf031', 'SPP', '90.00', '2024-08-08', 'p', 'Belum Lunas', '2024-08-08 03:50:25', '2024-08-08 03:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `tahun_ajaran_id` varchar(50) NOT NULL,
  `kode_tahun_ajaran` varchar(100) DEFAULT NULL,
  `nama_tahun_ajaran` varchar(100) DEFAULT NULL,
  `status_tahun_ajaran` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`tahun_ajaran_id`, `kode_tahun_ajaran`, `nama_tahun_ajaran`, `status_tahun_ajaran`, `created_at`, `updated_at`) VALUES
('44364c24af8bac2bd3080ad4ccc727f7', 'TA-024716', '2025/2026', 'aktif', '2024-07-04 03:37:04', '2024-07-04 03:37:04'),
('68219d86e7ccd797d70f39977d1bf031', 'TA-024231', '2026/2027', 'aktif', '2024-07-02 05:06:47', '2024-07-04 05:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` varchar(50) NOT NULL,
  `tagihan_id` varchar(50) DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `users_id` varchar(50) DEFAULT NULL,
  `gross_amount` varchar(50) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `transaction_time` varchar(50) DEFAULT NULL,
  `va_number` varchar(255) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `merchant_id` varchar(255) DEFAULT NULL,
  `reference_id` varchar(255) DEFAULT NULL,
  `acquirer` varchar(255) DEFAULT NULL,
  `status_code` varchar(50) DEFAULT NULL,
  `pdf_url` text DEFAULT NULL,
  `jenis_transaksi` enum('Top-up','Penarikan','Pembayaran Tagihan') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` varchar(50) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status` enum('aktif','non-aktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `nama`, `username`, `password`, `email`, `telepon`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
('1', 'Admin', 'admin', '$2y$10$y2WLfT94FZ6w3SmQlJlfkewe6vNmKR.abIc919tcZ.VJ0ISeirFHS', 'admin@example.com', '123456789', 'Admin Address', 'aktif', '2024-07-05 16:40:51', '2024-07-05 16:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `users_roles_id` varchar(50) NOT NULL,
  `users_id` varchar(50) DEFAULT NULL,
  `roles_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`users_roles_id`, `users_id`, `roles_id`, `created_at`, `updated_at`) VALUES
('1', '1', '1', '2024-07-05 16:40:51', '2024-07-05 16:40:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`lembaga_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `persentase_tagihan`
--
ALTER TABLE `persentase_tagihan`
  ADD PRIMARY KEY (`persentase_tagihan_id`);

--
-- Indexes for table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`rayon_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_id`);

--
-- Indexes for table `roles_permission`
--
ALTER TABLE `roles_permission`
  ADD PRIMARY KEY (`roles_permission_id`),
  ADD KEY `roles_id` (`roles_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`santri_id`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD UNIQUE KEY `nik_santri` (`nik_santri`),
  ADD KEY `persentase_tagihan_id` (`persentase_tagihan_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`),
  ADD KEY `rayon_id` (`rayon_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`tagihan_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`),
  ADD KEY `santri_id` (`santri_id`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`tahun_ajaran_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `tagihan_id` (`tagihan_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `usersname` (`username`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`users_roles_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles_permission`
--
ALTER TABLE `roles_permission`
  ADD CONSTRAINT `roles_permission_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`roles_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_permission_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`permission_id`) ON DELETE CASCADE;

--
-- Constraints for table `santri`
--
ALTER TABLE `santri`
  ADD CONSTRAINT `santri_ibfk_1` FOREIGN KEY (`persentase_tagihan_id`) REFERENCES `persentase_tagihan` (`persentase_tagihan_id`),
  ADD CONSTRAINT `santri_ibfk_2` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`tahun_ajaran_id`),
  ADD CONSTRAINT `santri_ibfk_3` FOREIGN KEY (`rayon_id`) REFERENCES `rayon` (`rayon_id`);

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`tahun_ajaran_id`) ON DELETE CASCADE;

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`tahun_ajaran_id`),
  ADD CONSTRAINT `tagihan_ibfk_2` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`santri_id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`tagihan_id`) REFERENCES `tagihan` (`tagihan_id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`roles_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
