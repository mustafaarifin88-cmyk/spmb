ALTER TABLE `profil_sekolah` 
ADD `nama_dinas` varchar(150) DEFAULT NULL AFTER `id`,
ADD `kabupaten` varchar(100) DEFAULT NULL AFTER `desa`;

ALTER TABLE `persyaratan` 
ADD `is_wajib` tinyint(1) DEFAULT 1;

ALTER TABLE `pendaftaran` 
MODIFY COLUMN `status_pendaftaran` enum('Menunggu','Diterima','Ditolak','Perbaikan') DEFAULT 'Menunggu',
ADD `pesan_perbaikan` text DEFAULT NULL AFTER `alasan_tolak`;

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_open` tinyint(1) DEFAULT 0,
  `tgl_buka` date DEFAULT NULL,
  `tgl_tutup` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pengaturan` (`is_open`, `tgl_buka`, `tgl_tutup`) VALUES (1, '2026-01-01', '2026-12-31');

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `berkas_fisik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_berkas` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;