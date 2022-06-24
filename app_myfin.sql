-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 04:38 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_myfin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_adminstaff`
--

CREATE TABLE `tb_adminstaff` (
  `id_adminstaff` int(11) NOT NULL,
  `email_adminstaff` varchar(100) NOT NULL,
  `password_adminstaff` varchar(100) NOT NULL,
  `role` enum('Admin','Staff') NOT NULL,
  `nama_adminstaff` varchar(100) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0 COMMENT '0 = false\r\n1 = true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_adminstaff`
--

INSERT INTO `tb_adminstaff` (`id_adminstaff`, `email_adminstaff`, `password_adminstaff`, `role`, `nama_adminstaff`, `deleted`) VALUES
(5, 'zulfi@gmail.com', '$2y$10$hnSv75WiEnuhB1h8Ty5oKeZq5dLcbfySjBI0HM2JKOAWlCGkytNYi', 'Admin', 'Zulfi Masyita', 0),
(7, 'viorella@gmail.com', '$2y$10$u9VfyKqQTD4eC.n7Sa7sDeaSHhmeXMzi19Gbos8bu86ZPyt0aAseC', 'Staff', 'Viorella Sunghaiyon', 0),
(11, 'haikal12@gmail.com', '$2y$10$/WNsRqJoVpMriTA0j4kjNOcVBlbocMc9aoRtbKQBEslKCgw5rx6SK', 'Staff', 'Haikal Chandra', 0),
(16, 'henderyjames@gmail.com', '$2y$10$w5X0FdoVXF03xQs.NOpc7.NNosF6QaKBZmy9svg31v7VTT9LmU2ES', 'Staff', 'Hendery James', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_appbanner`
--

CREATE TABLE `tb_appbanner` (
  `file_banner` blob NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_nasabah`
--

CREATE TABLE `tb_data_nasabah` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kode_otp` int(6) NOT NULL,
  `pin_user` int(6) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `saldo` varchar(100) DEFAULT '0',
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kota_lahir` varchar(50) DEFAULT NULL,
  `ktp_file` blob DEFAULT NULL,
  `swa_file` blob DEFAULT NULL,
  `ava` blob DEFAULT NULL,
  `pertanyaan_keamanan` varchar(100) DEFAULT NULL,
  `jawaban_keamanan` varchar(100) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0 COMMENT '0 = false\r\n1 = true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_data_nasabah`
--

INSERT INTO `tb_data_nasabah` (`id_user`, `email`, `kode_otp`, `pin_user`, `create_at`, `saldo`, `nik`, `nama_lengkap`, `no_hp`, `alamat`, `tgl_lahir`, `kota_lahir`, `ktp_file`, `swa_file`, `ava`, `pertanyaan_keamanan`, `jawaban_keamanan`, `deleted`) VALUES
(1, 'rendratri@gmail.com', 356744, NULL, '2022-04-18 10:27:46', '7000000', '3519155500550002', 'Rendra Tri', '087878656434', 'Jl. Matahari no.06 Madiun', '2000-07-09', 'Madiun', NULL, NULL, NULL, 'Siapa Nama Gurumu?', 'Joko', 0),
(2, 'madu@gmail.com', 111111, 1212, '2022-04-28 13:12:19', '8000000', '3519155508880003', 'Madu Zaneta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(14, 'karina005@gmail.com', 0, NULL, '2022-05-08 06:56:10', NULL, '3519155506570001', 'Karina Dewi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_maps`
--

CREATE TABLE `tb_maps` (
  `nama_tempat` varchar(100) NOT NULL,
  `link_gmaps` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nik`
--

CREATE TABLE `tb_nik` (
  `nik` int(16) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kota_lahir` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penarikan_saldo`
--

CREATE TABLE `tb_penarikan_saldo` (
  `id_penarikan` int(11) NOT NULL,
  `jml_penarikan` int(20) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('ditolak','diterima') NOT NULL,
  `id_nasabah` int(11) DEFAULT NULL,
  `id_adminstaff` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penarikan_saldo`
--

INSERT INTO `tb_penarikan_saldo` (`id_penarikan`, `jml_penarikan`, `bank`, `no_rek`, `nama_pemilik`, `create_at`, `status`, `id_nasabah`, `id_adminstaff`) VALUES
(1, 1000000, 'BNI', '0316714338', 'Rendra Tri', '2022-05-07 19:05:27', 'diterima', 1, 5),
(2, 2000000, 'BNI', '0316714338', 'Karina Dewi', '2022-05-19 15:38:45', '', 14, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan_kredit`
--

CREATE TABLE `tb_pengajuan_kredit` (
  `id_pengajuan_kredit` int(11) NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `tanggal_pengajuan` varchar(100) DEFAULT NULL,
  `penggunaan` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `gaji` varchar(100) DEFAULT NULL,
  `gaji_tambahan` varchar(100) NOT NULL,
  `besar_pengajuan` int(100) NOT NULL,
  `bsr_pengajuan_diterima` int(200) DEFAULT 0,
  `tenor` enum('3 bulan','6 bulan','12 bulan') NOT NULL,
  `score` int(4) NOT NULL,
  `tanggal_ubah` date DEFAULT NULL,
  `tanggal_catatan` date DEFAULT NULL,
  `status` enum('diterima','ditolak','catatan','pending') NOT NULL,
  `ket_catatan` text DEFAULT NULL,
  `id_adminstaff` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengajuan_kredit`
--

INSERT INTO `tb_pengajuan_kredit` (`id_pengajuan_kredit`, `id_nasabah`, `tanggal_pengajuan`, `penggunaan`, `pekerjaan`, `gaji`, `gaji_tambahan`, `besar_pengajuan`, `bsr_pengajuan_diterima`, `tenor`, `score`, `tanggal_ubah`, `tanggal_catatan`, `status`, `ket_catatan`, `id_adminstaff`) VALUES
(1, 1, '2022-05-01', 'Beli motor', 'Petani', '1200000', '0', 7000000, 0, '6 bulan', 81, '2022-06-01', '2022-05-25', 'ditolak', '', 7),
(3, 2, '2022-05-07', 'Modal Usaha', 'Wiraswasta', '2000000', '500000', 5000000, 5000000, '6 bulan', 71, '2022-06-18', NULL, 'diterima', '', NULL),
(4, 1, '2022-05-03', 'Renovasi Rumah', 'PNS', '3000000', '0', 10000000, 7000000, '6 bulan', 83, '2022-06-10', '2022-06-08', 'catatan', 'memperbaiki data pada pengajuan data yang harus dilengkapi dengan alamat', NULL),
(6, 14, '2022-05-09', 'Biaya Sekolah', 'Petani', '1300000', '0', 5000000, 5000000, '3 bulan', 84, '2022-06-10', '2022-05-23', 'catatan', 'memperbaiki data pada pengajuan data yang harus dilengkapi dengan alamat', NULL),
(9, 2, '2022-05-31', 'Biaya Sekolah', 'Kuli Bangunan', '1500000', '500000', 3000000, 3000000, '3 bulan', 82, '2022-06-18', NULL, 'diterima', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertanyaan`
--

CREATE TABLE `tb_pertanyaan` (
  `Pertanyaan1` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_staff`
--

CREATE TABLE `tb_staff` (
  `id_adminstaff` int(11) NOT NULL,
  `email_adminstaff` varchar(100) NOT NULL,
  `password_adminstaff` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `nama_adminstaff` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_staff`
--

INSERT INTO `tb_staff` (`id_adminstaff`, `email_adminstaff`, `password_adminstaff`, `role`, `nama_adminstaff`) VALUES
(1, 'viorella@gmail.com', '$2y$10$LooHMkVRXXzWIW2WllayNOsN19ycCkuDzRk.qpct/p0hQYT/CcQMK', 'Staff', 'Viorella Sunghaiyon'),
(2, 'haikal@gmail.com', '$2y$10$Tqvww1fVRwBHcjKUM3m5k.OgmxT1PUQATx/7Nz8xc/TeDeN7Zf5DS', 'Staff', 'Haikal Chandra');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `jenis_transaksi` varchar(100) NOT NULL,
  `nominal_transaks` int(10) NOT NULL,
  `status_transaksi` varchar(10) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_verifikasi_akun`
--

CREATE TABLE `tb_verifikasi_akun` (
  `no_hp` int(15) NOT NULL,
  `kode_verif` int(6) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `exp_at` datetime NOT NULL,
  `id_nasabah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_adminstaff`
--
ALTER TABLE `tb_adminstaff`
  ADD PRIMARY KEY (`id_adminstaff`);

--
-- Indexes for table `tb_data_nasabah`
--
ALTER TABLE `tb_data_nasabah`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_nik`
--
ALTER TABLE `tb_nik`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_penarikan_saldo`
--
ALTER TABLE `tb_penarikan_saldo`
  ADD PRIMARY KEY (`id_penarikan`),
  ADD KEY `id_nasabah` (`id_nasabah`),
  ADD KEY `id_adminstaff` (`id_adminstaff`);

--
-- Indexes for table `tb_pengajuan_kredit`
--
ALTER TABLE `tb_pengajuan_kredit`
  ADD PRIMARY KEY (`id_pengajuan_kredit`),
  ADD KEY `id_nasabah` (`id_nasabah`),
  ADD KEY `id_adminstaff` (`id_adminstaff`);

--
-- Indexes for table `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD PRIMARY KEY (`id_adminstaff`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_verifikasi_akun`
--
ALTER TABLE `tb_verifikasi_akun`
  ADD KEY `id_nasabah` (`id_nasabah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_adminstaff`
--
ALTER TABLE `tb_adminstaff`
  MODIFY `id_adminstaff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_data_nasabah`
--
ALTER TABLE `tb_data_nasabah`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_nik`
--
ALTER TABLE `tb_nik`
  MODIFY `nik` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_penarikan_saldo`
--
ALTER TABLE `tb_penarikan_saldo`
  MODIFY `id_penarikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengajuan_kredit`
--
ALTER TABLE `tb_pengajuan_kredit`
  MODIFY `id_pengajuan_kredit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_staff`
--
ALTER TABLE `tb_staff`
  MODIFY `id_adminstaff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_penarikan_saldo`
--
ALTER TABLE `tb_penarikan_saldo`
  ADD CONSTRAINT `tb_penarikan_saldo_ibfk_1` FOREIGN KEY (`id_nasabah`) REFERENCES `tb_data_nasabah` (`id_user`),
  ADD CONSTRAINT `tb_penarikan_saldo_ibfk_2` FOREIGN KEY (`id_adminstaff`) REFERENCES `tb_adminstaff` (`id_adminstaff`);

--
-- Constraints for table `tb_pengajuan_kredit`
--
ALTER TABLE `tb_pengajuan_kredit`
  ADD CONSTRAINT `tb_pengajuan_kredit_ibfk_1` FOREIGN KEY (`id_nasabah`) REFERENCES `tb_data_nasabah` (`id_user`),
  ADD CONSTRAINT `tb_pengajuan_kredit_ibfk_2` FOREIGN KEY (`id_adminstaff`) REFERENCES `tb_adminstaff` (`id_adminstaff`);

--
-- Constraints for table `tb_verifikasi_akun`
--
ALTER TABLE `tb_verifikasi_akun`
  ADD CONSTRAINT `tb_verifikasi_akun_ibfk_1` FOREIGN KEY (`id_nasabah`) REFERENCES `tb_data_nasabah` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
