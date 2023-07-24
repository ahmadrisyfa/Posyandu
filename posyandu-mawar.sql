-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 02:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu-mawar`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayibalita`
--

CREATE TABLE `bayibalita` (
  `id_anak` bigint(20) UNSIGNED NOT NULL,
  `nik_anak` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_anak` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nama_ayah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kia` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bayibalita`
--

INSERT INTO `bayibalita` (`id_anak`, `nik_anak`, `no_kk`, `nama_anak`, `jk`, `tgl_lahir`, `nama_ayah`, `nama_ibu`, `alamat`, `kia`, `ket`, `created_at`, `updated_at`) VALUES
(1, '3208281903150001', '3208301408191116', 'Syahril Sanusi', 'Laki-laki', '2017-05-08', 'Nanang', 'Elis Wilmayana', 'RT01/RW02', 'Ya', '-', '2023-06-17 05:46:34', '2023-07-08 23:49:48'),
(2, '3208282303100003', '3208301408190006', 'selviiiiiiiii', 'Perempuan', '2023-03-08', 'Nanang', 'Ros', 'Jl. Buah Batu', 'Ya', '-', '2023-06-18 23:43:33', '2023-07-08 15:14:38'),
(3, '320828190315000', '3208301408190333', 'ari w', 'Laki-laki', '2021-06-21', 'ayah', 'ibu', 'RT 01 RW 3 Dusun 1', 'Ya', 'BPJS', '2023-06-21 06:57:09', '2023-07-06 09:24:32'),
(4, '3208282303100001', '320830140819260', 'ayuu', 'Perempuan', '2021-08-09', 'ayah', 'ibu', 'Jl. Buah Batu', 'Ya', '-', '2023-07-06 06:16:03', '2023-07-06 06:16:03'),
(6, '3208282303102014', '3208301408192608', 'Tifani Nur Agustin', 'Perempuan', '2022-08-26', 'Kusnadi', 'Susanti', 'RT 01 RW 3 Dusun 1', 'Ya', '-', '2023-06-22 09:42:41', '2023-06-22 09:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_hadirbayi`
--

CREATE TABLE `daftar_hadirbayi` (
  `id_dha` bigint(20) UNSIGNED NOT NULL,
  `id_anak` bigint(20) NOT NULL,
  `id_jadwal` bigint(20) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_hadirbayi`
--

INSERT INTO `daftar_hadirbayi` (`id_dha`, `id_anak`, `id_jadwal`, `status`, `ket`, `created_at`, `updated_at`) VALUES
(9, 2, 1, 'Hadir', '-', '2023-07-08 06:31:15', '2023-07-08 06:31:15'),
(10, 1, 4, 'Hadir', '-', '2023-07-08 06:32:08', '2023-07-08 06:32:08'),
(11, 4, 4, 'Hadir', '-', '2023-07-08 06:46:44', '2023-07-08 06:46:44'),
(12, 6, 4, 'Hadir', '-', '2023-07-08 06:55:32', '2023-07-08 06:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_hadiribu`
--

CREATE TABLE `daftar_hadiribu` (
  `id_dhi` bigint(20) UNSIGNED NOT NULL,
  `id_ibu` bigint(20) NOT NULL,
  `id_jadwal` bigint(20) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_hadiribu`
--

INSERT INTO `daftar_hadiribu` (`id_dhi`, `id_ibu`, `id_jadwal`, `status`, `ket`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'Hadir', '-', '2023-07-08 05:32:56', '2023-07-08 07:12:33'),
(6, 1, 4, 'Hadir', '-', '2023-07-08 07:29:27', '2023-07-08 07:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ibuhamil`
--

CREATE TABLE `ibuhamil` (
  `id_ibu` bigint(20) UNSIGNED NOT NULL,
  `nik_ibu` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `hamil_ke` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hpht` date NOT NULL,
  `nama_suami` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kia` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ibuhamil`
--

INSERT INTO `ibuhamil` (`id_ibu`, `nik_ibu`, `no_kk`, `nama_ibu`, `tgl_lahir`, `hamil_ke`, `hpht`, `nama_suami`, `alamat`, `kia`, `ket`, `created_at`, `updated_at`) VALUES
(1, '3208305704014005', '3208301408892606', 'Widianti', '2001-07-06', '1', '2023-02-02', 'Saeful', 'RT01/RW01', 'Ya', '-', '2023-06-18 22:23:59', '2023-07-06 10:25:45'),
(2, '3208305704240002', '3208282303101143', 'Rini', '2000-06-22', '1', '2023-02-06', 'Roni', 'RT 01 RW 3 Dusun 1', 'Ya', 'BPJS', '2023-06-22 06:31:06', '2023-06-22 06:31:06'),
(4, '320830570400005', '320830140819006', 'ayii', '2000-06-06', '1', '2023-05-06', 'Saeful', 'Jl. Buah Batu', 'Ya', '-', '2023-07-06 09:38:03', '2023-07-10 03:47:58'),
(5, '3208305704000002', '3208301408192606', 'Wulan  R', '1999-06-01', '1', '2023-10-10', 'Kusmana', 'RT01/RW03', 'Ya', '-', '2023-06-18 22:09:54', '2023-06-26 01:35:27'),
(6, '3208305704000005', '3208301408192606', 'Ika', '1999-02-15', '2 s/d 4', '2023-05-23', 'Kiman', 'RT02/RW03', 'Ya', 'BPJS', '2023-06-16 22:08:46', '2023-07-06 14:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `tanggal_posyandu_bayibalita` date NOT NULL,
  `tanggal_posyandu_ibuhamil` date NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal_posyandu_bayibalita`, `tanggal_posyandu_ibuhamil`, `bulan`, `created_at`, `updated_at`) VALUES
(1, '2023-07-12', '2023-07-13', 'Juli', '2023-07-04 07:58:44', '2023-07-04 08:09:42'),
(4, '2023-08-11', '2023-08-12', 'Agustus', '2023-07-08 06:30:20', '2023-07-08 06:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_02_095404_create_roles_table', 1),
(6, '2023_06_04_145841_create_obat_table', 1),
(7, '2023_06_09_063430_create_bayibalita_table', 2),
(8, '2023_06_09_083152_create_ibuhamil_table', 3),
(9, '2023_06_11_143654_create_daftar_hadirbayi_table', 4),
(10, '2023_06_13_040902_create_daftar_hadiribu_table', 5),
(11, '2023_06_13_045546_create_daftar_hadiribu_table', 6),
(12, '2023_06_14_142546_create_penimbangan_anak_table', 7),
(13, '2023_06_14_145902_create_pemeriksaan_ibu_table', 7),
(14, '2023_06_17_023409_change_id_obat_type', 8),
(15, '2023_06_17_034907_create_obat_table', 9),
(16, '2023_06_17_040424_create_obat_table', 10),
(17, '2023_06_20_225917_create_vaksin_anak_table', 11),
(18, '2023_06_20_230013_create_vaksin_ibu_table', 11),
(19, '2023_07_04_141225_create_jadwal_table', 12),
(20, '2023_07_05_162247_create_obatmasuk_table', 13),
(21, '2023_07_05_162316_create_obatkeluar_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` bigint(20) UNSIGNED NOT NULL,
  `nama_obat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_obat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sisa_obat` int(11) NOT NULL,
  `tgl_ed` date NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `sisa_obat`, `tgl_ed`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Amlodipin(10 mg)', 'Tablet', 10, '2025-12-23', 'Tersedia', '2023-06-18 22:49:57', '2023-07-10 03:08:21'),
(2, 'Kloram tetes mata', 'Tetes', 10, '2023-06-12', 'Habis', '2023-06-18 22:52:16', '2023-07-10 03:20:55'),
(3, 'Oksitetra', 'Salep', 11, '2023-09-05', 'Tersedia', '2023-06-18 22:53:15', '2023-07-07 02:58:36'),
(4, 'Rohto', 'Tetes', 20, '2024-06-05', 'Tersedia', '2023-07-05 15:20:01', '2023-07-10 03:15:26'),
(5, 'Obat merah', 'Tetes', 6, '2024-04-05', 'Expired Date', '2023-07-06 10:59:31', '2023-07-10 03:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `obatkeluar`
--

CREATE TABLE `obatkeluar` (
  `id_OK` bigint(20) UNSIGNED NOT NULL,
  `id_obat` bigint(20) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obatkeluar`
--

INSERT INTO `obatkeluar` (`id_OK`, `id_obat`, `tgl_keluar`, `jumlah`, `ket`, `created_at`, `updated_at`) VALUES
(9, 1, '2023-07-06', 26, '-', '2023-07-06 11:04:20', '2023-07-06 11:04:20'),
(10, 4, '2023-07-13', 1, '-', '2023-07-06 17:14:27', '2023-07-06 17:14:27'),
(12, 4, '2023-07-10', 5, '-', '2023-07-10 03:13:23', '2023-07-10 03:13:23'),
(13, 2, '2023-07-14', 6, 'pemeriksaan', '2023-07-14 03:02:30', '2023-07-14 03:02:30');

--
-- Triggers `obatkeluar`
--
DELIMITER $$
CREATE TRIGGER `ambilstok` AFTER INSERT ON `obatkeluar` FOR EACH ROW BEGIN
 	UPDATE obat set sisa_obat = sisa_obat - NEW.jumlah
    WHERE id_obat= NEW.id_obat;
 
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapusstok` AFTER DELETE ON `obatkeluar` FOR EACH ROW BEGIN
	UPDATE obat SET sisa_obat = sisa_obat + OLD.Jumlah
    WHERE id_obat = OLD.id_obat;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `obatmasuk`
--

CREATE TABLE `obatmasuk` (
  `id_OM` bigint(20) UNSIGNED NOT NULL,
  `id_obat` bigint(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_ed` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obatmasuk`
--

INSERT INTO `obatmasuk` (`id_OM`, `id_obat`, `tgl_masuk`, `jumlah`, `tgl_ed`, `created_at`, `updated_at`) VALUES
(9, 2, '2023-07-07', 3, '2023-07-21', '2023-07-06 17:11:24', '2023-07-06 17:11:24'),
(10, 3, '2023-07-01', 11, '2023-05-05', '2023-07-07 02:46:47', '2023-07-07 02:46:47'),
(11, 1, '2023-07-10', 10, '2025-12-23', '2023-07-10 03:06:48', '2023-07-10 03:06:48'),
(13, 2, '2023-07-10', 5, '2024-07-10', '2023-07-10 06:02:47', '2023-07-10 06:02:47'),
(14, 2, '2023-07-10', 7, '2023-07-13', '2023-07-10 06:03:32', '2023-07-10 06:03:32');

--
-- Triggers `obatmasuk`
--
DELIMITER $$
CREATE TRIGGER `deletestok` AFTER DELETE ON `obatmasuk` FOR EACH ROW BEGIN
	UPDATE obat set sisa_obat = sisa_obat - OLD.Jumlah
    WHERE id_obat = OLD.id_obat;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambahstok` AFTER INSERT ON `obatmasuk` FOR EACH ROW BEGIN
	UPDATE obat set sisa_obat = sisa_obat + NEW.Jumlah
    WHERE id_obat = NEW.id_obat;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_ibu`
--

CREATE TABLE `pemeriksaan_ibu` (
  `id_periksa` bigint(20) UNSIGNED NOT NULL,
  `id_dhi` bigint(20) NOT NULL,
  `id_jadwal` bigint(20) NOT NULL,
  `id_ibu` bigint(20) NOT NULL,
  `id_vaksin` bigint(20) NOT NULL,
  `tanggal_posyandu_ibuhamil` date NOT NULL,
  `berat_badan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinggi_badan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lila_imt` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hb_goldarah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tensi` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_obat` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemeriksaan_ibu`
--

INSERT INTO `pemeriksaan_ibu` (`id_periksa`, `id_dhi`, `id_jadwal`, `id_ibu`, `id_vaksin`, `tanggal_posyandu_ibuhamil`, `berat_badan`, `tinggi_badan`, `lila_imt`, `hb_goldarah`, `tensi`, `id_obat`, `jumlah`, `ket`, `created_at`, `updated_at`) VALUES
(9, 2, 1, 1, 1, '2023-07-13', '50', '155', '32/28,5', '13,6/A+', '127/75', '2', '1', '-', '2023-07-08 07:30:52', '2023-07-08 07:30:52');

--
-- Triggers `pemeriksaan_ibu`
--
DELIMITER $$
CREATE TRIGGER `obatkeluar` AFTER INSERT ON `pemeriksaan_ibu` FOR EACH ROW BEGIN
 	UPDATE obat set sisa_obat = sisa_obat - NEW.jumlah
    WHERE id_obat= NEW.id_obat;
 
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penimbangan_anak`
--

CREATE TABLE `penimbangan_anak` (
  `id_timbang` bigint(20) UNSIGNED NOT NULL,
  `id_dha` bigint(20) NOT NULL,
  `id_anak` bigint(20) NOT NULL,
  `id_vaksin` bigint(20) NOT NULL,
  `tanggal_posyandu_bayibalita` date NOT NULL,
  `id_jadwal` bigint(20) NOT NULL,
  `jk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_badan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `st` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penimbangan_anak`
--

INSERT INTO `penimbangan_anak` (`id_timbang`, `id_dha`, `id_anak`, `id_vaksin`, `tanggal_posyandu_bayibalita`, `id_jadwal`, `jk`, `berat_badan`, `st`, `ket`, `created_at`, `updated_at`) VALUES
(6, 9, 2, 1, '2023-08-11', 4, 'Perempuan', '10,1', 'Naik', '-', '2023-07-08 06:36:38', '2023-07-08 06:36:38'),
(14, 10, 1, 1, '2023-07-12', 1, 'Laki-Laki', '10,1', 'Naik', '-', '2023-07-09 00:22:58', '2023-07-09 00:22:58'),
(15, 12, 6, 1, '2023-07-12', 1, 'Perempuan', '10,1', 'Naik', '-', '2023-07-09 00:26:19', '2023-07-09 00:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'bidan', '2023-06-08 21:50:55', '2023-06-08 21:50:55'),
(2, 'kader1', '2023-06-08 21:50:55', '2023-06-08 21:50:55'),
(3, 'kader2', '2023-07-10 08:48:47', '2023-07-10 08:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Bidan Desa', 'bidan@gmail.com', '2023-06-08 21:50:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'cbQ7F4MyNo3BVv07mszmgW2MPSzyVse723BVcPV3oIE3MGpeVIH5GKPDsuxR', '2023-06-08 21:50:55', '2023-06-08 21:50:55'),
(3, 'Kader Posyandu 1', 'kader1@gmail.com', '2023-06-08 21:50:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, 'TLFYee9UdePDjlnL3WqB6yhctRpF8xA1RiLw9cbHlZ9nXCBXHcIZCEqExuWb', '2023-06-08 21:50:55', '2023-06-08 21:50:55'),
(4, 'Kader Posyandu 2', 'kader2@gmail.com', '2023-06-08 21:50:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3, '8UDoTB8XJOMQkYK7iLKMhv5ykkQRfprYirP57myt0sBov1qtJVkt3iwcK9Bm', '2023-06-08 21:50:55', '2023-06-08 21:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `vaksin_anak`
--

CREATE TABLE `vaksin_anak` (
  `id_vaksin` bigint(20) UNSIGNED NOT NULL,
  `nama_vaksin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_anak` int(11) NOT NULL,
  `ket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaksin_anak`
--

INSERT INTO `vaksin_anak` (`id_vaksin`, `nama_vaksin`, `umur_anak`, `ket`, `created_at`, `updated_at`) VALUES
(1, 'Vaksin BCG Polio 1', 1, 'Mencegah Penularan Tuberculosis dan Polio(umur 1 bulan)', '2023-06-23 03:38:08', '2023-06-23 03:55:50'),
(2, 'Vaksin DPT-HB-Hib 1 Polio 2', 2, 'Mencegah Polio, Difteri, Batuk Rejan, Tetanus, Hepatitis B, Meningitis, & Pneumonia(2 bulan)', '2023-06-23 03:39:31', '2023-06-23 03:53:39'),
(3, 'Vaksin DPT-HB-Hib 2 Polio 3', 3, 'Mencegah Polio, Difteri, Batuk Rejan, Tetanus, Hepatitis B, Meningitis, & Pneumonia(3 bulan)', '2023-06-23 03:40:48', '2023-06-23 03:57:10'),
(4, 'Vaksin DPT-HB-Hib 3 Polio 4', 4, 'Mencegah Polio, Difteri, Batuk Rejan, Tetanus, Hepatitis B, Meningitis, & Pneumonia(4 bulan)', '2023-06-23 03:56:45', '2023-06-23 03:56:45'),
(5, 'Vaksin Campak', 9, 'Mencegah Campak(9 bulan)', '2023-06-23 03:57:52', '2023-06-23 14:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `vaksin_ibu`
--

CREATE TABLE `vaksin_ibu` (
  `id_vaksin` bigint(20) UNSIGNED NOT NULL,
  `nama_vaksin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaksin_ibu`
--

INSERT INTO `vaksin_ibu` (`id_vaksin`, `nama_vaksin`, `ket`, `created_at`, `updated_at`) VALUES
(1, 'Vaksin MMR', 'Mencegah Penyakit Campak, Gondongan, dan Rubella', '2023-06-23 04:00:43', '2023-06-23 04:00:43'),
(2, 'Vaksin Tetanus Toxoid (TT)', 'Mencegah tetanus neonatorum (tetanus pada bayi baru lahir).', '2023-06-23 04:01:38', '2023-06-23 04:01:38'),
(3, 'Vaksin Hepatitis B', 'Mencegah penyakit Hepatitis B yang merupakan infeksi penyakit hati yang serius', '2023-06-23 04:02:48', '2023-06-23 04:02:48'),
(4, 'Vaksin Influenza', 'Mencegah penyakit Influenza', '2023-06-23 04:03:19', '2023-06-23 04:03:19'),
(5, 'Vaksin Difteri, Pertusis, dan Tetanus (DPT)', 'Mencegah Difteri, Pertusis, dan Tetanus', '2023-06-23 04:05:43', '2023-06-23 14:37:06'),
(6, 'Vaksin Hepatitis A', 'Mencegah penyakit Hepatitis A', '2023-06-23 04:08:23', '2023-06-23 04:08:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayibalita`
--
ALTER TABLE `bayibalita`
  ADD PRIMARY KEY (`id_anak`);

--
-- Indexes for table `daftar_hadirbayi`
--
ALTER TABLE `daftar_hadirbayi`
  ADD PRIMARY KEY (`id_dha`),
  ADD KEY `id_anak` (`id_anak`);

--
-- Indexes for table `daftar_hadiribu`
--
ALTER TABLE `daftar_hadiribu`
  ADD PRIMARY KEY (`id_dhi`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ibuhamil`
--
ALTER TABLE `ibuhamil`
  ADD PRIMARY KEY (`id_ibu`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `obatkeluar`
--
ALTER TABLE `obatkeluar`
  ADD PRIMARY KEY (`id_OK`);

--
-- Indexes for table `obatmasuk`
--
ALTER TABLE `obatmasuk`
  ADD PRIMARY KEY (`id_OM`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pemeriksaan_ibu`
--
ALTER TABLE `pemeriksaan_ibu`
  ADD PRIMARY KEY (`id_periksa`),
  ADD UNIQUE KEY `id_dhi` (`id_dhi`);

--
-- Indexes for table `penimbangan_anak`
--
ALTER TABLE `penimbangan_anak`
  ADD PRIMARY KEY (`id_timbang`),
  ADD UNIQUE KEY `id_dha` (`id_dha`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vaksin_anak`
--
ALTER TABLE `vaksin_anak`
  ADD PRIMARY KEY (`id_vaksin`);

--
-- Indexes for table `vaksin_ibu`
--
ALTER TABLE `vaksin_ibu`
  ADD PRIMARY KEY (`id_vaksin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayibalita`
--
ALTER TABLE `bayibalita`
  MODIFY `id_anak` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `daftar_hadirbayi`
--
ALTER TABLE `daftar_hadirbayi`
  MODIFY `id_dha` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `daftar_hadiribu`
--
ALTER TABLE `daftar_hadiribu`
  MODIFY `id_dhi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ibuhamil`
--
ALTER TABLE `ibuhamil`
  MODIFY `id_ibu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `obatkeluar`
--
ALTER TABLE `obatkeluar`
  MODIFY `id_OK` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `obatmasuk`
--
ALTER TABLE `obatmasuk`
  MODIFY `id_OM` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pemeriksaan_ibu`
--
ALTER TABLE `pemeriksaan_ibu`
  MODIFY `id_periksa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penimbangan_anak`
--
ALTER TABLE `penimbangan_anak`
  MODIFY `id_timbang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vaksin_anak`
--
ALTER TABLE `vaksin_anak`
  MODIFY `id_vaksin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vaksin_ibu`
--
ALTER TABLE `vaksin_ibu`
  MODIFY `id_vaksin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
