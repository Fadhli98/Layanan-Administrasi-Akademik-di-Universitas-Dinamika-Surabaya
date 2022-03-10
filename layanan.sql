-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2021 at 08:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `aak`
--

CREATE TABLE `aak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_aak` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aak`
--

INSERT INTO `aak` (`id`, `nama`, `email`, `nik`, `password`, `is_aak`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'agung', 'agung@gmail.com', '12344', '$2y$10$E5oI.eXSjbd5NJ7BYNpgIuN9NlcwhSDht.5Z.A1lMpXu1e6prVoCq', 0, NULL, '2021-06-07 05:41:44', '2021-06-07 05:41:44'),
(2, 'user aak', 'mahen@gmail.com', '34423', '$2y$10$pVmg51JiXgeUOKaWQFG07eyZgjQ9Mq5erRMA34S1KFI7IPCQa7D3O', 0, 'zbP4UIbq7UVP81MX1sWrqbbaWeMjDVIZmQU5PYdeHiX7IdQWrlv2bEP8E6iO', '2021-06-07 06:07:19', '2021-06-07 06:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mhs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telp` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_mhs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_pengajuan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_absen` date DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berkas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id`, `nim`, `nama_mhs`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `email_mhs`, `semester`, `angkatan`, `jurusan`, `fakultas`, `alasan_pengajuan`, `tanggal_absen`, `tanggal_masuk`, `jenis`, `berkas`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, '', 'aditya martin', '', NULL, '', '17410100039@dinamika.ac.id', '8', '2017', 'S1 Sistem Informasi', '', '', NULL, NULL, 'Cuti', '17410100039_cuti.pdf', '', 'ditolak', '2021-06-22', '2021-06-23'),
(2, '', 'Marsito Pradana', '', NULL, '', 'michelle.prasetya@example.org', '6', '2018', 'S1 Desain Komunikasi Visual', '', '', NULL, NULL, 'Yudisium', 'xlsm', '', 'proses', '2021-04-15', NULL),
(3, '', 'Anggabaya Gunarto', '', NULL, '', 'novi.prasetyo@example.com', '6', '2019', 'S1 Sistem Informasi', '', '', NULL, NULL, 'Yudisium', 'potx', '', 'proses', '2021-04-16', NULL),
(4, '', 'Harsanto Wacana', '', NULL, '', 'victoria66@example.org', '3', '2020', 'S1 Desain Komunikasi Visual', '', '', NULL, NULL, 'Yudisium', 'tsv', '', 'selesai', '2021-06-17', '2021-06-19'),
(5, '', 'Jumari Martaka Firgantoro M.Kom.', '', NULL, '', 'jailani.kanda@example.org', '6', '2020', 'S1 Sistem Informasi', '', '', NULL, NULL, 'BST', 'ksp', '', 'selesai', '2021-07-15', '2021-07-17'),
(6, '', 'Jatmiko Ardianto', '', NULL, '', 'hassanah.kurnia@example.com', '8', '2018', 'S1 Produksi Film Dan Telivisi', '', '', NULL, NULL, 'Yudisium', 'ifb', '', 'proses', '2021-05-25', NULL),
(7, '', 'Marwata Tamba', '', NULL, '', 'kayla20@example.org', '7', '2016', 'S1 Produksi Film Dan Telivisi', '', '', NULL, NULL, 'Yudisium', 'mp4', '', 'selesai', '2021-06-24', '2021-06-24'),
(8, '', 'Darimin Bambang Wijaya', '', NULL, '', 'garda10@example.com', '4', '2019', 'S1 Produksi Film Dan Telivisi', '', '', NULL, NULL, 'Dispensasi', 'm4v', '', 'selesai', '2021-06-25', '2021-06-27'),
(9, '', 'Ajiono Uwais M.Farm', '', NULL, '', 'hasim.rahayu@example.org', '8', '2017', 'S1 Sistem Komputer', '', '', NULL, NULL, 'Cuti', 'viv', '', 'proses', '2021-08-25', NULL),
(10, '', 'Titi Riyanti', '', NULL, '', 'qaryani@example.org', '8', '2017', 'S1 Akutansi', '', '', NULL, NULL, 'BST', 'nfo', '', 'selesai', '2021-08-27', '2021-08-28'),
(11, '', 'Mutia Halimah', '', NULL, '', 'kmaheswara@example.org', '4', '2018', 'S1 Desain Komunikasi Visual', '', '', NULL, NULL, 'Cuti', 'mdi', '', 'selesai', '2021-05-27', '2021-05-08'),
(12, '', 'Maryadi Natsir S.E.', '', NULL, '', 'lukita98@example.net', '4', '2021', 'S1 Desain Komunikasi Visual', '', '', NULL, NULL, 'Cuti', 'dxf', '', 'ditolak', '2021-05-11', '2021-08-15'),
(13, '', 'Lanjar Sirait M.Kom.', '', NULL, '', 'zwastuti@example.com', '4', '2019', 'D3 Sistem Informasi', '', '', NULL, NULL, 'Yudisium', 'snd', '', 'proses', '2021-05-27', NULL),
(14, '', 'Akarsana Hakim', '', NULL, '', 'qpuspasari@example.net', '6', '2020', 'D3 Sistem Informasi', '', '', NULL, NULL, 'Dispensasi', 'mng', '', 'selesai', '2021-04-06', '2021-04-07'),
(15, '', 'Garan Rendy Wijaya S.Gz', '', NULL, '', 'embuh36@example.org', '8', '2021', 'S1 Sistem Komputer', '', '', NULL, NULL, 'Cuti', 'pgn', '', 'selesai', '2021-04-14', '2021-04-18'),
(16, '', 'Eli Fujiati S.Kom', '', NULL, '', 'susanti.puspa@example.net', '4', '2016', 'D3 Sistem Informasi', '', '', NULL, NULL, 'Cuti', 'p', '', 'selesai', '2021-04-14', '2021-04-18'),
(17, '', 'Maya Tania Laksmiwati M.TI.', '', NULL, '', 'saefullah.fitriani@example.com', '8', '2016', 'S1 Desain Komunikasi Visual', '', '', NULL, NULL, 'Yudisium', 'csh', '', 'selesai', '2021-07-02', '2021-07-05'),
(18, '', 'Ega Wijaya S.Farm', '', NULL, '', 'handayani.kariman@example.net', '8', '2017', 'S1 Desain Komunikasi Visual', '', '', NULL, NULL, 'Cuti', 'xdp', '', 'proses', '2021-08-18', NULL),
(19, '', 'Kemba Adriansyah', '', NULL, '', 'usihombing@example.org', '8', '2017', 'S1 Sistem Komputer', '', '', NULL, NULL, 'Dispensasi', 'qam', '', 'selesai', '2021-05-12', '2021-05-13'),
(20, '', 'Zizi Yolanda', '', NULL, '', 'siti.firmansyah@example.net', '4', '2021', 'S1 Sistem Komputer', '', '', NULL, NULL, 'Yudisium', 'flx', '', 'selesai', '2021-06-24', '2021-06-24'),
(21, '', 'Setya Irawan', '', NULL, '', 'olivia.kuswoyo@example.com', '6', '2019', 'S1 Desain Komunikasi Visual', '', '', NULL, NULL, 'Yudisium', 'stl', '', 'selesai', '2021-07-21', '2021-07-23'),
(22, '', 'Hendra Cakrajiya Siregar S.IP', '', NULL, '', 'wardi.suwarno@example.com', '8', '2020', 'S1 Sistem Informasi', '', '', NULL, NULL, 'Cuti', 'sub', '', 'selesai', '2021-07-23', '2021-07-23'),
(23, '', 'Vicky Anggraini', '', NULL, '', 'atmaja.ramadan@example.com', '5', '2020', 'S1 Sistem Informasi', '', '', NULL, NULL, 'Yudisium', 'bed', '', 'selesai', '2021-07-24', '2021-07-26'),
(24, '', 'Wakiman Hasim Nainggolan', '', NULL, '', 'ika43@example.com', '7', '2016', 'S1 Sistem Informasi', '', '', NULL, NULL, 'Dispensasi', 'ppm', '', 'selesai', '2021-05-27', '2021-05-29'),
(25, '', 'Alika Mardhiyah', '', NULL, '', 'palastri.salsabila@example.net', '5', '2020', 'S1 Desain Produk', '', '', NULL, NULL, 'Yudisium', 'latex', '', 'proses', '2021-07-29', NULL),
(26, '', 'Fitriani Namaga', '', NULL, '', 'sihotang.lintang@example.com', '6', '2016', 'S1 Sistem Informasi', '', '', NULL, NULL, 'Cuti', 'wvx', '', 'selesai', '2021-06-29', '2021-08-15'),
(27, '', 'agung', '', NULL, '', 'agu.email', '8', '2017', 'S1 Sistem Informasi', '', '', NULL, NULL, 'Dispensasi', 'asad', '', 'selesai', '2021-07-05', '2021-07-08'),
(28, '', 'Ivan Ramadan S.Pd', '', NULL, '', 'uchita.uwais@example.com', '3', '2016', 'S1 Desain Komunikasi Visual', '', '', NULL, NULL, 'Cuti', 'curl', '', 'selesai', '2020-07-01', '2021-07-04'),
(29, '', 'Amalia Rahayu S.Gz', '', NULL, '', 'rmahendra@example.org', '6', '2020', 'S1 Desain Komunikasi Visual', '', '', NULL, NULL, 'BST', 'sbml', '', 'selesai', '2020-07-21', '2021-07-25'),
(30, '', 'Gandi Kurniawan S.Pd', '', NULL, '', 'gprakasa@example.org', '7', '2019', 'S1 Desain Komunikasi Visual', '', '', NULL, NULL, 'Yudisium', 'sh', '', 'selesai', '2020-05-04', '2021-05-06'),
(31, '', 'Lidya Usada S.Kom', '', NULL, '', 'aryani.anita@example.com', '3', '2021', 'S1 Desain Komunikasi Visual', '', '', NULL, NULL, 'Cuti', 'tga', '', 'selesai', '2020-07-02', '2021-07-03'),
(32, '', 'Asmadi Prabowo', '', NULL, '', 'tantri.oktaviani@example.org', '4', '2016', 'S1 Sistem Komputer', '', '', NULL, NULL, 'Dispensasi', 'xo', '', 'selesai', '2020-05-10', '2021-05-11'),
(33, '', 'Ana Wulandari', '', NULL, '', 'widya.farida@example.com', '5', '2018', 'S1 Produksi Film Dan Telivisi', '', '', NULL, NULL, 'Dispensasi', 'oxt', '', 'selesai', '2020-06-13', '2021-06-15'),
(34, '', 'Viman Situmorang', '', NULL, '', 'manah42@example.net', '7', '2017', 'S1 Sistem Komputer', '', '', NULL, NULL, 'Yudisium', '3g2', '', 'selesai', '2020-04-07', '2021-04-08'),
(35, '', 'Warsa Kemal Kusumo', '', NULL, '', 'rika66@example.net', '8', '2016', 'S1 Akutansi', '', '', NULL, NULL, 'Cuti', 'vcs', '', 'selesai', '2020-04-23', '2021-04-24'),
(36, '', 'Sabrina Fujiati', '', NULL, '', 'prahayu@example.com', '4', '2019', 'S1 Desain Produk', '', '', NULL, NULL, 'Dispensasi', 'au', '', 'selesai', '2020-04-12', '2021-04-14'),
(37, '', 'Novi Uchita Laksita', '', NULL, '', 'zulkarnain.ratna@example.com', '8', '2020', 'S1 Sistem Informasi', '', '', NULL, NULL, 'Yudisium', 'for', '', 'selesai', '2021-04-04', '2021-04-06'),
(38, '', 'Balijan Irawan', '', NULL, '', 'unamaga@example.org', '5', '2017', 'S1 Akutansi', '', '', NULL, NULL, 'Cuti', 'csv', '', 'ditolak', '2020-07-10', '2021-07-12'),
(39, '', 'Waluyo Siregar S.H.', '', NULL, '', 'emil.purnawati@example.org', '6', '2019', 'S1 Sistem Komputer', '', '', NULL, NULL, 'Dispensasi', 'wgt', '', 'selesai', '2020-07-23', '2021-07-25'),
(40, '', 'Asmuni Najmudin S.Pd', '', NULL, '', 'tri16@example.com', '4', '2017', 'S1 Desain Komunikasi Visual', '', '', NULL, NULL, 'BST', 'xbm', '', 'selesai', '2020-04-25', '2021-04-27'),
(41, '', 'Dadi Adriansyah', '', NULL, '', 'widya.saputra@example.com', '6', '2018', 'S1 Akutansi', '', '', NULL, NULL, 'Yudisium', 'xpi', '', 'selesai', '2020-05-05', '2021-05-10'),
(42, '', 'Panca Jefri Uwais S.I.Kom', '', NULL, '', 'slestari@example.com', '3', '2018', 'S1 Akutansi', '', '', NULL, NULL, 'BST', 'vxml', '', 'ditolak', '2021-08-09', '2021-08-15'),
(43, '', 'Yono Iswahyudi', '', NULL, '', 'chelsea.halim@example.org', '4', '2019', 'S1 Akutansi', '', '', NULL, NULL, 'BST', 'mpy', '', 'selesai', '2020-07-16', '2021-07-17'),
(44, '', 'Surya Megantara', '', NULL, '', 'pyulianti@example.org', '3', '2020', 'S1 Akutansi', '', '', NULL, NULL, 'Dispensasi', 'tex', '', 'selesai', '2020-06-04', '2021-06-05'),
(45, '', 'Ella Laksmiwati M.Ak', '', NULL, '', 'yosef05@example.net', '8', '2017', 'D3 Sistem Informasi', '', '', NULL, NULL, 'Cuti', 'aifc', '', 'selesai', '2020-04-15', '2021-04-16'),
(46, '', 'Lukman Hidayanto', '', NULL, '', 'habibi.galak@example.net', '4', '2016', 'S1 Sistem Informasi', '', '', NULL, NULL, 'BST', 'kia', '', 'selesai', '2020-07-22', '2021-07-30'),
(47, '', 'Kasiyah Laksita', '', NULL, '', 'niyaga29@example.org', '3', '2021', 'S1 Desain Produk', '', '', NULL, NULL, 'Yudisium', 'xwd', '', 'selesai', '2020-07-06', '2021-07-09'),
(48, '', 'Janet Laksmiwati', '', NULL, '', 'psiregar@example.net', '3', '2021', 'S1 Desain Produk', '', '', NULL, NULL, 'Yudisium', 'rmi', '', 'selesai', '2020-05-04', '2021-05-07'),
(49, '', 'Sungkem anjang', '', NULL, '', 'sung@gmail.id', '5', '2016', 'S1 Akutansi', '', '', NULL, NULL, 'Dispensasi', 'pdf', '', 'selesai', '2021-07-25', '2021-07-28'),
(50, '', 'Diana angela', '', NULL, '', 'dia@gmail.vom', '6', '2018', 'S1 Desain Komunikasi Visual', '', '', NULL, NULL, 'Dispensasi', 'pdf', '', 'ditolak', '2021-08-02', '2021-08-15'),
(3359, '', 'Ahmad Rizqa', 'Sidoarjo', '1998-12-12', '082112341234', '17410100038@dinamika.ac.id', '6', '2017', 'S1 Sistem Informasi', 'Teknik dan Informatika', 'gabut', NULL, NULL, 'Cuti', NULL, NULL, 'Proses', NULL, NULL),
(3365, '17410100038', 'Ahmad Rizqa', 'Sidoarjo', '1998-12-12', '082112341234', '17410100038@dinamika.ac.id', '6', '2017', 'S1 Sistem Informasi', 'Teknik dan Informatika', 'gabut', NULL, NULL, 'BST', NULL, NULL, 'Proses', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_mhs` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `email`, `no_telp`, `alamat`, `semester`, `angkatan`, `fakultas`, `jurusan`, `status`, `password`, `is_mhs`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '17410100039', 'Aditya Martin', '', '0000-00-00', '17410100039@dinamika.ac.id', '', '', '7', '2017', '', 'S1 Sistem Informasi', 'Aktif', '$2y$10$O9mWFljyMiGRwvtUH7KPPeCJQjfFGkU6SFdGi2ePgVYJOgusUvcSW', 0, NULL, '2021-06-06 22:06:50', '2021-06-06 22:06:50'),
(2, '17410100038', 'Ahmad Rizqa', 'Sidoarjo', '1998-12-12', '17410100038@dinamika.ac.id', '082112341234', 'Taman Cahaya Asri X-90, Sidoarjo', '6', '2017', 'Teknik dan Informatika', 'S1 Sistem Informasi', 'Aktif', '$2y$10$icc48vb1M4FebYn/f4/uZ.fzZvmotrM65EPPNQEzMEFo.p2B/0Y5W', 0, NULL, '2021-06-07 02:50:05', '2021-06-07 02:50:05'),
(3, '15410100029', 'Adi Wijaya', '', '0000-00-00', '15410100029@dinamika.ac.id', '', '', '5', '2015', '', 'S1 Sistem Komputer', 'Aktif', '$2y$10$KaZrOTpphEx2z8slBn7UQ.aHgOUoHkIwisnjBlbYuP7HEZ0WVP3XG', 0, NULL, '2021-06-07 04:45:25', '2021-06-07 04:45:25');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2021_06_06_115326_create_mhs_tableasas', 2),
(7, '2021_06_06_115135_create_mhs_table', 3),
(10, '2021_06_06_115311_create_aak_table', 4),
(12, '2021_06_17_105955_create_dokumen_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_set` int(10) NOT NULL,
  `dispensasi` int(11) NOT NULL,
  `cuti` int(11) NOT NULL,
  `yudisium` int(11) NOT NULL,
  `bst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_set`, `dispensasi`, `cuti`, `yudisium`, `bst`) VALUES
(1, 3, 3, 50, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `nik`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '1234', NULL, '$2y$10$.93pDVAiC1mu0xOkSDxr6emcDLdJqoghgrlow//NncGqlgMndj.Oe', NULL, '2021-06-05 22:31:18', '2021-06-05 22:31:18'),
(2, 'yupi', 'yupi@gmail.com', '1213', NULL, '$2y$10$SsFkedY4VwuwQC2cCJ414u21VHIvi7dMRnav7/rlpg8MxanvUehH2', NULL, '2021-06-07 05:15:52', '2021-06-07 05:15:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aak`
--
ALTER TABLE `aak`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aak_email_unique` (`email`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mhs_nim_unique` (`nim`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_set`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aak`
--
ALTER TABLE `aak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3366;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_set` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
