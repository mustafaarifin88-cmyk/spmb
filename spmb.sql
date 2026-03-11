-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2026 at 11:16 AM
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
-- Database: `spmb`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `nama_agama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama_agama`) VALUES
(1, 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `berkas_pendaftaran`
--

CREATE TABLE `berkas_pendaftaran` (
  `id` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `id_persyaratan` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berkas_pendaftaran`
--

INSERT INTO `berkas_pendaftaran` (`id`, `id_pendaftaran`, `id_persyaratan`, `file_path`) VALUES
(1, 1, 1, '1773223392_71549023fc8761ddbbb2.png'),
(2, 1, 2, '1773223392_3a36b77a40931ca4ce1a.png');

-- --------------------------------------------------------

--
-- Table structure for table `latar_belakang`
--

CREATE TABLE `latar_belakang` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `latar_belakang`
--

INSERT INTO `latar_belakang` (`id`, `gambar`, `is_active`) VALUES
(1, '1773217278_6ccdaf5d5c62a9fd1bc3.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `nama_pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama_pekerjaan`) VALUES
(1, 'PNS');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `nik_siswa` varchar(20) NOT NULL,
  `nama_peserta_didik` varchar(100) NOT NULL,
  `nama_panggilan` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_agama` int(11) NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `jumlah_saudara_kandung` int(11) NOT NULL,
  `jumlah_saudara_angkat` int(11) NOT NULL,
  `bahasa_sehari_hari` varchar(50) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tempat_tinggal` enum('Orang Tua','Wali','Menumpang','Asrama') NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `nik_ayah` varchar(20) NOT NULL,
  `nik_ibu` varchar(20) NOT NULL,
  `pendidikan_ayah` varchar(50) NOT NULL,
  `pendidikan_ibu` varchar(50) NOT NULL,
  `penghasilan_ayah` varchar(50) NOT NULL,
  `penghasilan_ibu` varchar(50) NOT NULL,
  `id_pekerjaan_ayah` int(11) NOT NULL,
  `id_pekerjaan_ibu` int(11) NOT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `pendidikan_wali` varchar(50) DEFAULT NULL,
  `hubungan_wali` varchar(50) DEFAULT NULL,
  `id_pekerjaan_wali` int(11) DEFAULT NULL,
  `masuk_sebagai` varchar(50) DEFAULT 'Murid Baru',
  `asal_peserta_didik` varchar(100) NOT NULL,
  `nama_tk` varchar(100) NOT NULL,
  `tahun_nomor_ijazah` varchar(100) NOT NULL,
  `ttd_ortu` varchar(255) NOT NULL,
  `status_pendaftaran` enum('Menunggu','Diterima','Ditolak') DEFAULT 'Menunggu',
  `alasan_tolak` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `id_user`, `no_kk`, `nik_siswa`, `nama_peserta_didik`, `nama_panggilan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `id_agama`, `kewarganegaraan`, `anak_ke`, `jumlah_saudara_kandung`, `jumlah_saudara_angkat`, `bahasa_sehari_hari`, `berat_badan`, `tinggi_badan`, `alamat`, `no_telp`, `tempat_tinggal`, `nama_ayah`, `nama_ibu`, `nik_ayah`, `nik_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `id_pekerjaan_ayah`, `id_pekerjaan_ibu`, `nama_wali`, `pendidikan_wali`, `hubungan_wali`, `id_pekerjaan_wali`, `masuk_sebagai`, `asal_peserta_didik`, `nama_tk`, `tahun_nomor_ijazah`, `ttd_ortu`, `status_pendaftaran`, `alasan_tolak`, `created_at`, `updated_at`) VALUES
(1, 2, '123456', '121837', 'Mus J', 'Mus', 'Laki-laki', 'Jakarta', '2026-03-10', 1, 'WNI', 2, 2, 0, 'Indonesia ', 1, 10, 'Jakarta Barat ', '0822888777222', 'Orang Tua', 'Ayah', 'Ibu', '128822726', '9281716', 'S3', 'S2', '> 2.000.000', '> 2.000.000', 1, 1, '', '', '', NULL, 'Murid Baru', 'Sekolah Herry Potter ', 'Kanak', '81817162625252', '69b13ddfa98bd.png', 'Diterima', NULL, '2026-03-11 17:03:11', '2026-03-11 17:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id` int(11) NOT NULL,
  `nama_persyaratan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `persyaratan`
--

INSERT INTO `persyaratan` (`id`, `nama_persyaratan`) VALUES
(1, 'Foto Copy Ijazah Legis'),
(2, 'Foto Copy KK Legis');

-- --------------------------------------------------------

--
-- Table structure for table `profil_sekolah`
--

CREATE TABLE `profil_sekolah` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `desa` varchar(100) NOT NULL,
  `nama_kepsek` varchar(100) NOT NULL,
  `nip_kepsek` varchar(50) NOT NULL,
  `ttd_kepsek` varchar(255) DEFAULT NULL,
  `logo_pemda` varchar(255) DEFAULT NULL,
  `logo_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_sekolah`
--

INSERT INTO `profil_sekolah` (`id`, `nama_sekolah`, `alamat_lengkap`, `desa`, `nama_kepsek`, `nip_kepsek`, `ttd_kepsek`, `logo_pemda`, `logo_sekolah`) VALUES
(1, 'SMA Negeri 1 Contoh', 'Jl. Pendidikan No. 1', 'Desa Contoh', 'Budi Santoso, S.Pd., M.Pd.', '19800101 200501 1 001', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_profil` varchar(255) DEFAULT 'default.png',
  `level` enum('admin','siswa') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `password`, `foto_profil`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$57qSO2MRSClHSBp5.EDyTepRDkkgNiAHUKmUq5YnLeDVTjYd0g4AS', 'default.png', 'admin', '2026-03-11 00:50:28', '2026-03-11 14:14:13'),
(2, 'Mustafa Arifin', 'siswa', '$2y$10$ee0ujDdIbWTox7WCPgPqceXr6HqCieb7/ZtQ6ZmtEE5mrgVVJ5EgW', '1773214998_ab01670a3e6cc715e50c.png', 'siswa', '2026-03-11 14:38:26', '2026-03-11 14:43:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berkas_pendaftaran`
--
ALTER TABLE `berkas_pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`),
  ADD KEY `id_persyaratan` (`id_persyaratan`);

--
-- Indexes for table `latar_belakang`
--
ALTER TABLE `latar_belakang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_pekerjaan_ayah` (`id_pekerjaan_ayah`),
  ADD KEY `id_pekerjaan_ibu` (`id_pekerjaan_ibu`),
  ADD KEY `id_pekerjaan_wali` (`id_pekerjaan_wali`);

--
-- Indexes for table `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berkas_pendaftaran`
--
ALTER TABLE `berkas_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `latar_belakang`
--
ALTER TABLE `latar_belakang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berkas_pendaftaran`
--
ALTER TABLE `berkas_pendaftaran`
  ADD CONSTRAINT `fk_berkas_pendaftaran` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_berkas_persyaratan` FOREIGN KEY (`id_persyaratan`) REFERENCES `persyaratan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_pendaftaran_agama` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pendaftaran_p_ayah` FOREIGN KEY (`id_pekerjaan_ayah`) REFERENCES `pekerjaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pendaftaran_p_ibu` FOREIGN KEY (`id_pekerjaan_ibu`) REFERENCES `pekerjaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pendaftaran_p_wali` FOREIGN KEY (`id_pekerjaan_wali`) REFERENCES `pekerjaan` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_pendaftaran_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
