-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 12, 2023 at 05:02 AM
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
-- Database: `perum_eko`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_perumahan`
--

CREATE TABLE `access_perumahan` (
  `id_access` int(11) NOT NULL,
  `id_perum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `access_perumahan`
--

INSERT INTO `access_perumahan` (`id_access`, `id_perum`, `id_user`) VALUES
(2, 2, 17),
(4, 2, 15),
(6, 2, 18),
(7, 3, 18),
(11, 2, 23),
(12, 2, 22),
(13, 2, 21),
(14, 2, 20),
(16, 2, 16),
(17, 2, 24),
(18, 2, 26),
(20, 2, 28),
(21, 2, 29),
(22, 3, 29),
(24, 2, 31),
(25, 3, 31),
(26, 2, 32),
(27, 3, 32),
(28, 2, 33),
(29, 2, 36),
(30, 2, 35),
(31, 2, 14),
(32, 3, 14),
(33, 2, 37),
(34, 2, 38),
(35, 3, 38),
(36, 2, 39),
(37, 3, 39),
(38, 2, 40),
(39, 3, 40),
(40, 2, 41),
(41, 3, 41),
(42, 3, 19),
(43, 3, 46),
(44, 3, 45),
(45, 3, 44),
(46, 3, 43),
(47, 3, 48),
(48, 3, 47),
(49, 2, 30),
(50, 3, 30),
(51, 2, 27),
(52, 3, 27);

-- --------------------------------------------------------

--
-- Table structure for table `angsuran_bank`
--

CREATE TABLE `angsuran_bank` (
  `id_angsur` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `jml_angsur` varchar(100) NOT NULL,
  `angsuran` varchar(20) NOT NULL,
  `cicilan_angsuran` varchar(100) NOT NULL,
  `tgl_bayar` varchar(2) NOT NULL,
  `status` int(1) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `denda` varchar(20) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `approved_history`
--

CREATE TABLE `approved_history` (
  `id` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL,
  `id_title_kode` int(11) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_cicil_kt`
--

CREATE TABLE `bank_cicil_kt` (
  `id_cicil` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `bukti_nota` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_cicil_lain`
--

CREATE TABLE `bank_cicil_lain` (
  `id_cicil` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `bukti_nota` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_cicil_pak`
--

CREATE TABLE `bank_cicil_pak` (
  `id_cicil` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `bukti_nota` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_cicil_pb`
--

CREATE TABLE `bank_cicil_pb` (
  `id_cicil` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `bukti_nota` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_cicil_rb`
--

CREATE TABLE `bank_cicil_rb` (
  `id_cicil` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `bukti_nota` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_cicil_tj`
--

CREATE TABLE `bank_cicil_tj` (
  `id_cicil` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `bukti_nota` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_cicil_tjl`
--

CREATE TABLE `bank_cicil_tjl` (
  `id_cicil` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `bukti_nota` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_cicil_um`
--

CREATE TABLE `bank_cicil_um` (
  `id_cicil` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `bukti_nota` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `berkas_konsumen`
--

CREATE TABLE `berkas_konsumen` (
  `id_berkas` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bukti_pembayaran`
--

CREATE TABLE `bukti_pembayaran` (
  `id_bukti` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `db` varchar(200) NOT NULL,
  `bukti_pembayaran` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bukti_spkb`
--

CREATE TABLE `bukti_spkb` (
  `id_bukti_spkb` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `bukti_spkb` varchar(200) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bukti_spr`
--

CREATE TABLE `bukti_spr` (
  `id_bukti_spr` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `bukti_spr` varchar(200) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cicil_fee_marketing`
--

CREATE TABLE `cicil_fee_marketing` (
  `id_cicil` int(11) NOT NULL,
  `id_marketing` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cicil_insidentil`
--

CREATE TABLE `cicil_insidentil` (
  `id_cicil` int(11) NOT NULL,
  `id_insidentil` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `jml_pengajuan` varchar(20) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cicil_kas`
--

CREATE TABLE `cicil_kas` (
  `id_cicil` int(11) NOT NULL,
  `id_kas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cicil_material`
--

CREATE TABLE `cicil_material` (
  `id_cicil` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `jml_pengajuan` varchar(100) NOT NULL,
  `bukti_pembayaran` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cicil_pembatalan`
--

CREATE TABLE `cicil_pembatalan` (
  `id_cicil` int(11) NOT NULL,
  `id_pembatalan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cicil_pembebasan_lahan`
--

CREATE TABLE `cicil_pembebasan_lahan` (
  `id_cicil` int(11) NOT NULL,
  `id_pembebasan` int(11) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(1) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `tgl_approve` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cicil_pengeluaran_lain`
--

CREATE TABLE `cicil_pengeluaran_lain` (
  `id_cicil` int(11) NOT NULL,
  `id_pengeluaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cicil_progres`
--

CREATE TABLE `cicil_progres` (
  `id_cicil` int(11) NOT NULL,
  `id_progres` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_group`
--

CREATE TABLE `db_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(60) NOT NULL,
  `home` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `description` varchar(255) NOT NULL,
  `durasi_awal` time DEFAULT NULL,
  `durasi_akhir` time DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_diupdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `db_group`
--

INSERT INTO `db_group` (`id`, `group_name`, `home`, `status`, `description`, `durasi_awal`, `durasi_akhir`, `tanggal_dibuat`, `tanggal_diupdate`, `user_id`, `active`) VALUES
(1, 'Direktur Utama', 1, 1, '1', NULL, NULL, '2020-05-26 09:07:41', '2023-06-23 01:11:46', 1, 0),
(2, 'Administrator', 1, 1, '1', NULL, NULL, '2020-05-26 09:45:48', '2022-01-14 07:01:46', 1, 0),
(3, 'Accounting', 1, 1, '1', NULL, NULL, '2020-12-22 10:18:34', '2022-09-01 08:46:25', 1, 0),
(4, 'Marketing', 1, 1, '', NULL, NULL, '2021-01-22 13:50:28', '2022-06-09 01:20:44', 1, 0),
(5, 'Logistik', 1, 1, '', NULL, NULL, '2022-06-07 03:48:51', '2022-06-07 03:48:57', 1, 0),
(6, 'Pengawas Proyek', 1, 1, '', NULL, NULL, '2022-06-07 03:49:18', '2022-09-01 10:13:06', 1, 0),
(7, 'Asisten Accounting', 1, 1, '', NULL, NULL, '2022-09-01 09:18:23', '2022-12-15 10:06:34', 1, 1),
(8, 'ssadf', 1, 2, '', NULL, NULL, '2022-09-01 09:18:46', '2022-09-01 10:10:40', 1, 1),
(9, 'saff', 1, 2, '', NULL, NULL, '2022-09-01 09:18:56', '2022-09-01 10:10:45', 1, 1),
(10, 'Supervisor', 1, 1, '', NULL, NULL, '2023-06-21 15:11:55', '2023-06-21 15:12:03', 1, 0),
(11, 'Manager HRD', 1, 1, '', NULL, NULL, '2023-06-21 15:15:48', '2023-06-21 15:20:17', 1, 0),
(12, 'Manager Proyek', 1, 1, '', NULL, NULL, '2023-06-21 15:16:10', '2023-06-21 15:20:19', 1, 0),
(13, 'Manager Accounting', 1, 1, '', NULL, NULL, '2023-06-21 15:17:06', '2023-06-21 15:20:22', 1, 0),
(14, 'Manager Admin', 1, 1, '', NULL, NULL, '2023-06-21 15:19:56', '2023-06-21 15:20:43', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_group_module`
--

CREATE TABLE `db_group_module` (
  `group_id` int(11) NOT NULL,
  `modul_id` int(11) NOT NULL,
  `crud_create` int(11) DEFAULT NULL,
  `crud_update` int(11) DEFAULT NULL,
  `crud_delete` int(11) DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_diupdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `db_group_module`
--

INSERT INTO `db_group_module` (`group_id`, `modul_id`, `crud_create`, `crud_update`, `crud_delete`, `tanggal_dibuat`, `tanggal_diupdate`) VALUES
(0, 75, 1, 1, 1, '2022-06-03 00:02:31', '2022-06-03 00:02:31'),
(1, 1, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 2, 2, 2, 2, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 7, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 8, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 11, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 12, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 13, 2, 2, 2, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 14, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 15, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 18, 2, 2, 2, '2022-09-01 22:28:41', '2022-09-01 22:28:41'),
(1, 48, 2, 2, 2, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 49, 2, 2, 2, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 50, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 51, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 52, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 53, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 54, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 55, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 56, 2, 2, 2, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 57, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 58, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 59, 2, 2, 2, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 60, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 61, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 62, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 63, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 64, 2, 2, 2, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 65, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 67, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 68, 2, 2, 2, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 69, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 70, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 71, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 72, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 73, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 74, 2, 2, 2, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 75, 1, 1, 1, '2022-06-09 01:32:42', '2022-06-09 01:32:42'),
(1, 76, 1, 1, 1, '2022-06-20 01:15:24', '2022-06-20 01:15:24'),
(1, 77, 1, 1, 1, '2022-06-20 01:15:24', '2022-06-20 01:15:24'),
(1, 78, 1, 1, 1, '2022-06-28 05:42:24', '2022-06-28 05:42:24'),
(1, 79, 1, 1, 1, '2022-06-28 05:42:24', '2022-06-28 05:42:24'),
(1, 80, 1, 1, 1, '2022-06-28 05:42:49', '2022-06-28 05:42:49'),
(1, 81, 1, 1, 1, '2022-06-28 05:42:49', '2022-06-28 05:42:49'),
(1, 82, 1, 1, 1, '2022-06-28 05:43:09', '2022-06-28 05:43:09'),
(1, 83, 1, 1, 1, '2022-07-20 07:07:28', '2022-07-20 07:07:28'),
(1, 84, 1, 1, 1, '2022-07-29 10:00:07', '2022-07-29 10:00:07'),
(1, 85, 1, 1, 1, '2022-08-18 08:06:04', '2022-08-18 08:06:04'),
(1, 86, 1, 1, 1, '2022-08-23 08:39:44', '2022-08-23 08:39:44'),
(1, 87, 1, 1, 1, '2022-09-01 22:46:50', '2022-09-01 22:46:50'),
(1, 88, 1, 1, 1, '2022-09-03 13:21:20', '2022-09-03 13:21:20'),
(1, 89, 1, 1, 1, '2022-09-04 03:58:24', '2022-09-04 03:58:24'),
(1, 90, 1, 1, 1, '2022-09-05 01:17:07', '2022-09-05 01:17:07'),
(1, 91, 1, 1, 1, '2022-09-06 03:41:55', '2022-09-06 03:41:55'),
(1, 93, 1, 1, 1, '2022-09-07 02:03:58', '2022-09-07 02:03:58'),
(1, 94, 1, 1, 1, '2022-09-12 02:42:33', '2022-09-12 02:42:33'),
(1, 95, 1, 1, 1, '2022-10-21 11:28:48', '2022-10-21 11:28:48'),
(2, 1, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 2, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 13, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 14, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 15, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 18, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 48, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 49, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 50, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 51, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 52, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 53, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 54, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 55, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 56, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 57, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 58, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 59, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 60, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 61, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 62, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 63, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 64, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 65, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 67, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 68, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 69, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 70, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 71, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 72, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 73, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 74, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 75, 2, 2, 2, '2022-06-09 16:38:40', '2022-06-09 16:38:40'),
(2, 77, 1, 1, 1, '2022-09-14 18:02:24', '2022-09-14 18:02:24'),
(2, 78, 1, 1, 1, '2022-09-14 18:02:24', '2022-09-14 18:02:24'),
(2, 79, 1, 1, 1, '2022-09-14 18:04:17', '2022-09-14 18:04:17'),
(2, 80, 1, 1, 1, '2022-09-14 18:04:17', '2022-09-14 18:04:17'),
(2, 81, 1, 1, 1, '2022-09-14 17:48:36', '2022-09-14 17:48:36'),
(2, 82, 1, 1, 1, '2022-09-14 17:48:36', '2022-09-14 17:48:36'),
(2, 83, 1, 1, 1, '2022-09-14 17:47:18', '2022-09-14 17:47:18'),
(2, 84, 1, 1, 1, '2022-09-14 17:54:41', '2022-09-14 17:54:41'),
(2, 85, 1, 1, 1, '2022-09-14 17:54:41', '2022-09-14 17:54:41'),
(2, 86, 1, 1, 1, '2022-09-14 17:55:53', '2022-09-14 17:55:53'),
(2, 87, 1, 1, 1, '2022-09-14 17:55:53', '2022-09-14 17:55:53'),
(2, 88, 1, 1, 1, '2022-09-14 17:57:23', '2022-09-14 17:57:23'),
(2, 89, 1, 1, 1, '2022-09-14 17:57:23', '2022-09-14 17:57:23'),
(2, 90, 1, 1, 1, '2022-09-14 17:58:12', '2022-09-14 17:58:12'),
(2, 91, 1, 1, 1, '2022-09-14 17:58:12', '2022-09-14 17:58:12'),
(2, 93, 1, 1, 1, '2022-09-14 17:58:50', '2022-09-14 17:58:50'),
(2, 94, 1, 1, 1, '2022-09-14 17:58:50', '2022-09-14 17:58:50'),
(2, 95, 1, 1, 1, '2022-10-21 11:28:48', '2022-10-21 11:28:48'),
(3, 1, 2, 2, 2, '2022-06-09 02:15:15', '2022-06-09 02:15:15'),
(3, 56, 2, 2, 2, '2022-06-09 02:15:15', '2022-06-09 02:15:15'),
(3, 57, 1, 1, 1, '2022-06-09 02:15:15', '2022-06-09 02:15:15'),
(3, 58, 1, 1, 1, '2022-06-09 02:15:15', '2022-06-09 02:15:15'),
(3, 73, 1, 1, 1, '2022-06-09 02:15:15', '2022-06-09 02:15:15'),
(3, 84, 1, 1, 1, '2022-07-29 10:00:07', '2022-07-29 10:00:07'),
(3, 85, 1, 1, 1, '2022-08-18 08:06:04', '2022-08-18 08:06:04'),
(3, 86, 1, 1, 1, '2022-08-23 08:39:44', '2022-08-23 08:39:44'),
(3, 88, 1, 1, 1, '2022-09-03 13:21:20', '2022-09-03 13:21:20'),
(3, 89, 1, 1, 1, '2022-09-04 03:58:24', '2022-09-04 03:58:24'),
(3, 90, 1, 1, 1, '2022-09-05 01:17:07', '2022-09-05 01:17:07'),
(3, 91, 1, 1, 1, '2022-09-06 03:41:55', '2022-09-06 03:41:55'),
(3, 93, 1, 1, 1, '2022-09-07 02:03:58', '2022-09-07 02:03:58'),
(3, 94, 1, 1, 1, '2022-09-09 06:13:56', '2022-09-09 06:13:56'),
(3, 95, 1, 1, 1, '2022-10-21 11:29:04', '2022-10-21 11:29:04'),
(4, 1, 2, 2, 2, '2022-06-09 01:30:37', '2022-06-09 01:30:37'),
(4, 2, 2, 2, 2, '2022-06-09 01:30:37', '2022-06-09 01:30:37'),
(4, 50, 1, 1, 1, '2022-06-09 01:30:37', '2022-06-09 01:30:37'),
(4, 52, 1, 1, 1, '2022-06-09 01:30:37', '2022-06-09 01:30:37'),
(4, 53, 1, 1, 1, '2022-06-09 01:30:37', '2022-06-09 01:30:37'),
(4, 54, 1, 1, 1, '2022-06-09 01:30:37', '2022-06-09 01:30:37'),
(4, 55, 1, 1, 1, '2022-06-09 01:30:37', '2022-06-09 01:30:37'),
(4, 57, 1, 1, 1, '2022-06-09 01:30:37', '2022-06-09 01:30:37'),
(4, 58, 1, 1, 1, '2022-06-09 01:30:37', '2022-06-09 01:30:37'),
(4, 73, 1, 1, 1, '2022-06-09 01:30:37', '2022-06-09 01:30:37'),
(5, 1, 2, 2, 2, '2022-06-09 01:51:12', '2022-06-09 01:51:12'),
(5, 11, 2, 2, 2, '2022-06-09 01:51:12', '2022-06-09 01:51:12'),
(5, 12, 2, 2, 2, '2022-06-09 01:51:12', '2022-06-09 01:51:12'),
(5, 59, 2, 2, 2, '2022-06-09 01:51:12', '2022-06-09 01:51:12'),
(5, 60, 1, 1, 1, '2022-06-09 01:51:12', '2022-06-09 01:51:12'),
(5, 61, 1, 1, 1, '2022-06-09 01:51:12', '2022-06-09 01:51:12'),
(5, 62, 1, 1, 1, '2022-06-09 01:51:12', '2022-06-09 01:51:12'),
(5, 63, 1, 1, 1, '2022-06-09 01:51:12', '2022-06-09 01:51:12'),
(6, 1, 2, 2, 2, '2022-06-09 06:30:52', '2022-06-09 06:30:52'),
(6, 64, 2, 2, 2, '2022-06-09 06:30:52', '2022-06-09 06:30:52'),
(6, 65, 1, 1, 1, '2022-06-09 06:30:52', '2022-06-09 06:30:52'),
(6, 67, 1, 1, 1, '2022-06-09 06:30:52', '2022-06-09 06:30:52'),
(6, 81, 1, 1, 1, '2022-09-02 08:15:04', '2022-09-02 08:15:04'),
(6, 82, 1, 1, 1, '2022-09-02 08:15:54', '2022-09-02 08:15:54'),
(6, 83, 1, 1, 1, '2022-09-02 08:14:14', '2022-09-02 08:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `db_module`
--

CREATE TABLE `db_module` (
  `id` int(11) NOT NULL,
  `tipe` int(11) DEFAULT NULL,
  `title` varchar(60) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `aktif` int(11) DEFAULT NULL,
  `icons` varchar(60) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `db_module`
--

INSERT INTO `db_module` (`id`, `tipe`, `title`, `url`, `tag`, `parent`, `level`, `aktif`, `icons`, `description`, `tanggal_dibuat`) VALUES
(1, 1010, 'Dashboard', 'dashboard/', NULL, 0, 1, 1, 'fas fa-tachometer-alt', '', '2022-01-14 07:01:46'),
(2, 1020, 'Manajemen Marketing', '#', NULL, 999, 1, 1, 'fas fa-file-alt', '', '2022-03-12 03:58:16'),
(3, 1027, 'Manajemen Keuangan', 'laporan_keuangan/bulanan/', NULL, 50, 1, 0, 'far fa-circle', '', '2022-06-09 14:46:15'),
(4, 1026, 'Laporan Tahunan', 'laporan_keuangan/tahunan/', NULL, 50, 1, 0, 'far fa-circle', '', '2022-06-09 14:46:25'),
(5, 1025, 'Setup Transaksi', 'laporan_keuangan/setup/', NULL, 50, 0, 0, 'far fa-circle', '', '2022-03-12 03:58:52'),
(6, 1030, 'Manajemen Proyek', 'inventaris/', NULL, 999, 1, 0, 'fas fa-archive', '', '2022-06-09 14:36:24'),
(7, 1031, 'Daftar Barang', 'inventaris/daftar_barang/', NULL, 6, 6, 1, 'far fa-circle', '', '2022-01-14 07:01:46'),
(8, 1032, 'Keluar Masuk Barang', 'inventaris/stok/', '', 6, 6, 1, 'far fa-circle', '', '2022-01-14 07:01:46'),
(9, 1033, 'Laporan', 'inventaris/laporan/', NULL, 6, 0, 0, 'far fa-circle', '', '2022-01-14 07:01:46'),
(10, 1040, 'Logistik', 'rab/', NULL, 999, 1, 0, 'fas fa-clipboard-list', '', '2022-06-09 14:37:13'),
(11, 1041, 'Buat RAB', 'rab/new/', NULL, 10, 0, 1, 'far fa-circle', '', '2022-01-15 21:20:04'),
(12, 1042, 'Daftar RAB', 'rab/list/', NULL, 10, 0, 1, 'far fa-circle', '', '2022-01-15 21:20:08'),
(13, 1130, 'Users & Groups', 'users_groups/', NULL, 999, 1, 0, 'fas fa-users', '', '2022-09-01 23:03:47'),
(14, 1131, 'Users', 'users_groups/users/', NULL, 13, 0, 1, 'far fa-circle', '', '2022-01-14 07:01:46'),
(15, 1132, 'Groups', 'users_groups/groups/', NULL, 13, 0, 1, 'far fa-circle', '', '2022-01-14 07:01:46'),
(16, 1133, 'Modules', 'users_groups/modules/', NULL, 13, 0, 0, 'far fa-circle', '', '2022-01-15 22:50:09'),
(17, 1023, 'Laba/Rugi', 'laporan_keuangan/laba_rugi/', '', 2, 0, 0, 'far fa-circle', '', '2022-01-14 07:01:46'),
(18, 1050, 'Master Perumahan', 'master/perumahan/', NULL, 0, 1, 0, 'far fa-circle', NULL, '2022-09-01 22:55:21'),
(22, 1050, 'Profile Lembaga', 'setup/', '', 0, 1, 0, 'fas fa-landmark', '', '2022-06-09 14:45:46'),
(48, 1050, 'Pembebasan Lahan', 'other/pembebasan_lahan/', NULL, 74, 74, 1, 'far fa-circle', NULL, '2022-05-31 03:41:35'),
(49, 1050, 'Pengeluaran Lain', 'other/pengeluaran_lain/', NULL, 74, 74, 1, 'far fa-circle', NULL, '2022-05-31 03:42:27'),
(50, 1021, 'Calon Konsumen', 'marketing/data_konsumen', NULL, 2, 2, 1, ' far fa-circle', NULL, '2022-03-13 04:58:32'),
(51, 1060, 'Master Kavling', 'master/kavling/', NULL, 87, 0, 1, 'far fa-circle', NULL, '2022-09-01 22:53:07'),
(52, 1022, 'Transaksi Bank', 'marketing/transaksi_bank', NULL, 2, 2, 1, 'far fa-circle', NULL, '2022-03-15 06:22:02'),
(53, 1023, 'Transaksi Inhouse', 'marketing/transaksi_inhouse', '', 2, 2, 1, 'far fa-circle', NULL, '2022-03-17 06:22:39'),
(54, 1024, 'Konsumen', 'marketing/konsumen', NULL, 2, 2, 1, 'far fa-circle', NULL, '2022-03-19 15:12:14'),
(55, 1025, 'Pembatalan Transaksi', 'marketing/transaksi_batal', NULL, 2, 2, 1, 'far fa-circle', NULL, '2022-03-20 09:06:38'),
(56, 1070, 'Accounting', '#', NULL, 999, 1, 1, 'fas fa-dollar-sign', NULL, '2022-03-22 03:55:27'),
(57, 1071, 'Transaksi Bank', 'accounting/bank', NULL, 56, 56, 1, 'far fa-circle', NULL, '2022-03-22 04:11:41'),
(58, 1072, 'Transaksi Inhouse', 'accounting/inhouse', NULL, 56, 56, 1, 'far fa-circle', NULL, '2022-03-23 00:06:12'),
(59, 1043, 'Manajemen Logistik', 'logistik/', NULL, 999, 1, 1, 'fa fa-industry', NULL, '2022-03-29 06:57:12'),
(60, 1044, 'Ajukan Material', 'logistik/ajukan_material/', NULL, 59, 0, 1, 'far fa-circle', NULL, '2022-03-29 06:58:41'),
(61, 1045, 'Material Masuk', 'logistik/material_masuk/', NULL, 59, 0, 1, 'far fa-circle', NULL, '2022-03-29 06:58:41'),
(62, 1046, 'Material Keluar', 'logistik/material_keluar/', NULL, 59, 0, 1, 'far fa-circle', NULL, '2022-03-29 06:59:36'),
(63, 1046, 'Rekap Stok Material', 'logistik/rekap_stok_material/', NULL, 59, 0, 1, 'far fa-circle', NULL, '2022-06-28 09:00:45'),
(64, 1028, 'Manajemen Proyek', 'proyek/', NULL, 999, 1, 1, 'fa fa-briefcase', NULL, '2022-04-01 06:55:46'),
(65, 1047, 'Ajukan Proyek', 'proyek/ajukan_proyek/', NULL, 64, 0, 1, 'far fa-circle', NULL, '2022-04-03 03:06:53'),
(67, 1049, 'RAB', 'proyek/rab/', NULL, 64, 0, 1, 'far fa-circle', NULL, '2022-04-08 04:18:16'),
(68, 1080, 'Admin KPR', '#', NULL, 999, 1, 1, 'fas fa-user', NULL, '2022-04-24 05:56:31'),
(69, 1081, 'Data Konsumen', 'kpr/konsumen', NULL, 68, 68, 1, 'far fa-circle', NULL, '2022-04-24 06:02:51'),
(70, 1082, 'Rekening Bank', 'kpr/rek_bank', NULL, 68, 68, 1, 'far fa-circle', NULL, '2022-04-24 06:03:00'),
(71, 1083, 'Berkas Konsumen', 'kpr/berkas_konsumen', NULL, 68, 68, 1, 'far fa-circle', NULL, '2022-04-24 06:03:08'),
(72, 1061, 'Master Cluster', 'master/cluster/', NULL, 87, 0, 1, 'far fa-circle', NULL, '2022-09-01 22:54:18'),
(73, 1073, 'Fee Marketing', 'accounting/fee_marketing', NULL, 56, 56, 1, 'far fa-circle', NULL, '2022-05-09 06:08:44'),
(74, 1090, 'Menu lain-lain', '#', NULL, 999, 1, 1, 'fas fa-stream', NULL, '2022-05-31 03:37:32'),
(75, 1061, 'Master Material', 'master/material/', '', 87, 0, 1, 'far fa-circle', NULL, '2022-09-01 22:54:36'),
(77, 1063, 'Master Tipe', 'master/tipe', NULL, 87, 0, 1, 'far fa-circle', NULL, '2022-09-01 22:50:48'),
(78, 1062, 'Master Jenis Material', 'master/jenis_material/', NULL, 87, 0, 1, 'far fa-circle', NULL, '2022-09-01 22:52:28'),
(79, 1064, 'Master Satuan Unit', 'master/unit/', NULL, 87, 0, 1, 'far fa-circle', NULL, '2022-09-01 22:52:33'),
(80, 1065, 'Master Supplier', 'master/supplier/', NULL, 87, 0, 1, 'far fa-circle', NULL, '2022-09-01 22:52:38'),
(81, 1051, 'Pengajuan Material', 'proyek/pengajuan_material/', NULL, 64, 0, 1, 'far fa-circle', NULL, '2022-06-28 05:39:33'),
(82, 1052, 'Pekerjaan Insidentil', 'proyek/pekerjaan_insidentil/', NULL, 64, 0, 1, 'far fa-circle', NULL, '2022-06-28 05:40:27'),
(83, 1051, 'Progres Pembangunan', 'proyek/progres', NULL, 64, 0, 1, 'far fa-circle', NULL, '2022-11-23 00:43:16'),
(84, 1074, 'Upah Pekerja', 'accounting/pembangunan', NULL, 56, 56, 1, 'far fa-circle', NULL, '2022-09-03 11:42:25'),
(85, 1075, 'Management Kode', 'accounting/kode', '#', 56, 56, 0, 'far fa-circle', NULL, '2022-09-01 23:02:44'),
(86, 1076, 'Laporan Bulanan', 'accounting/laporan', NULL, 56, 56, 1, 'far fa-circle', NULL, '2022-08-23 08:38:12'),
(87, 1090, 'Management Master', '#', '#', 999, 1, 1, 'fas fa-star', NULL, '2022-09-01 22:45:08'),
(88, 1077, 'Pembebasan Lahan', 'accounting/pembebasan_lahan', NULL, 56, 56, 1, 'far fa-circle', NULL, '2022-09-03 13:19:28'),
(89, 1078, 'Pengeluaran Lain', 'accounting/pengeluaran_lain', NULL, 56, 56, 1, 'far fa-circle', NULL, '2022-09-04 03:57:39'),
(90, 1079, 'RAB', 'accounting/rab', NULL, 56, 56, 1, 'far fa-circle', NULL, '2022-09-05 01:16:29'),
(91, 1100, 'Pekerjaan Insidentil', 'accounting/insidentil', NULL, 56, 56, 1, 'far fa-circle', NULL, '2022-09-06 03:39:56'),
(93, 1101, 'Pengajuan Material', 'accounting/pengajuan_material', NULL, 56, 56, 1, 'far fa-circle', NULL, '2022-09-07 02:03:21'),
(94, 1102, 'Laporan Arus Kas', 'accounting/laporan_kas', NULL, 56, 56, 1, 'far fa-circle', NULL, '2022-09-09 06:12:07'),
(95, 1103, 'Pembatalan Transaksi', 'accounting/pembatalan_transaksi', NULL, 56, 56, 1, 'far fa-circle', NULL, '2022-10-21 11:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `db_status`
--

CREATE TABLE `db_status` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `action` int(11) NOT NULL DEFAULT 0,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `db_status`
--

INSERT INTO `db_status` (`id`, `nama`, `action`, `color`) VALUES
(1, 'Lunas', 0, 'primary'),
(2, 'Hutang', 0, 'danger'),
(3, 'Return', 0, 'warning'),
(4, 'Cancel', 0, 'info'),
(5, 'Delete', 1, 'danger');

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `id` int(11) NOT NULL,
  `group_id` varchar(3) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `employer_id` int(11) DEFAULT NULL,
  `sales_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT 0,
  `status` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` timestamp NULL DEFAULT current_timestamp(),
  `tanggal_diupdate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`id`, `group_id`, `username`, `password`, `nama`, `email`, `avatar`, `employer_id`, `sales_id`, `store_id`, `status`, `description`, `tanggal_dibuat`, `tanggal_diupdate`, `active`) VALUES
(1, '1', NULL, '21232f297a57a5a743894a0e4a801fc3', 'Super Admin', '081234567890', '', NULL, NULL, 1, 1, 'Super Admin', '2020-05-26 10:15:14', '2022-06-20 10:29:06', 0),
(4, '4', NULL, 'bce240f59ddf9ed1a2aa255ed8b38c8a', 'nurul  ihsan', '087662551443', NULL, NULL, NULL, 1, 1, NULL, '2022-01-03 15:23:11', '2022-06-20 10:40:55', 1),
(11, '3', NULL, '25d55ad283aa400af464c76d713c07ad', 'Roboot', '089772615241', NULL, NULL, NULL, 1, 1, NULL, '2022-06-20 18:32:17', '2022-06-20 18:33:15', 1),
(14, '2', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '082123456789', NULL, NULL, NULL, 1, 1, NULL, '2022-10-01 12:34:56', '2022-10-01 12:34:56', 0),
(16, '4', NULL, '25d55ad283aa400af464c76d713c07ad', 'Marketing Kantor', '024123456789', NULL, NULL, NULL, 1, 1, NULL, '2022-10-01 12:36:27', '2022-11-13 08:30:16', 0),
(19, '10', NULL, '6c6c25ef1b1161becb79b7f84390d0b0', 'Yogie Prasetyo', '085230515465', NULL, NULL, NULL, 1, 2, NULL, '2022-11-14 04:47:26', '2023-07-06 03:15:29', 0),
(20, '4', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'Rudi Setiawan', '081334737349', 'd212b548-4a16-42f0-a9be-d77d0f0395ea.jpg', NULL, NULL, 1, 1, NULL, '2022-11-14 04:48:04', '2023-01-26 07:41:16', 0),
(21, '4', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'Uswatun Hasanah', '081331998918', NULL, NULL, NULL, 1, 2, NULL, '2022-11-14 04:48:42', '2023-05-17 15:34:57', 0),
(23, '4', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'Ahmad Abqoriyin Hisan', '081249126390', NULL, NULL, NULL, 1, 1, NULL, '2022-11-14 04:50:09', '2022-11-14 04:50:09', 0),
(24, '4', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'Chairul Makom', '085235571979', NULL, NULL, NULL, 1, 1, NULL, '2022-11-14 04:56:40', '2022-11-14 04:56:40', 0),
(26, '4', NULL, 'd1f0fae4c2c0668670985b158504ec5c', 'Dwi Merinda', '085230552002', NULL, NULL, NULL, 1, 1, NULL, '2023-01-20 06:15:34', '2023-01-20 06:15:34', 0),
(27, '3', NULL, '43e34d558375d76914d714ea9cdb2ece', 'Dewi Dwi Kurnianingsih', '085230507590', NULL, NULL, NULL, 1, 1, NULL, '2023-01-20 06:18:29', '2023-01-20 06:18:29', 0),
(28, '4', NULL, 'd80eada8019e90959262354b622d4783', 'Meti Rofiana', '082344698231', NULL, NULL, NULL, 1, 1, NULL, '2023-01-20 06:50:47', '2023-01-20 06:50:47', 0),
(29, '6', NULL, '639cf0777ae245084494a7b00045e09e', 'Dio Martha Anugraha', '082338328731', NULL, NULL, NULL, 1, 1, NULL, '2023-01-20 07:05:43', '2023-01-20 07:05:43', 0),
(30, '5', NULL, 'dd8ad7c71a3c6b6ea6e0fe3a6c7a3895', 'Mochammad Alviandana', '082257714070', NULL, NULL, NULL, 1, 1, NULL, '2023-01-20 07:25:30', '2023-01-20 07:25:30', 0),
(31, '3', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'CobaAccounting', '089772661552', NULL, NULL, NULL, 1, 1, NULL, '2023-01-30 06:53:28', '2023-01-30 06:53:28', 0),
(32, '4', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'CobaMarketing', '089776335114', NULL, NULL, NULL, 1, 1, NULL, '2023-02-02 04:05:17', '2023-02-02 04:05:17', 0),
(33, '6', NULL, '5c38bb112191be3233c5ffeaba8dbc04', 'Mochammad Alviandana 2', '082257714777', NULL, NULL, NULL, 1, 1, NULL, '2023-02-06 06:45:33', '2023-02-06 06:45:33', 0),
(34, '1', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'coba', '080987654321', NULL, NULL, NULL, 1, 1, NULL, '2023-02-20 06:06:00', '2023-02-20 06:06:00', 0),
(35, '4', NULL, 'a56d8fd9206e199b0c8f5fbd4f1ac6a1', 'Ahmad Iqbal', '083119528121', NULL, NULL, NULL, 1, 1, NULL, '2023-06-19 04:25:55', '2023-06-19 04:25:55', 0),
(36, '4', NULL, '96452cfac6688b62cbb791aa5f771cf4', 'Gladin eka anggraini', '085812763279', 'WhatsApp_Image_2022-07-03_at_10_24_47_(1).jpeg', NULL, NULL, 1, 1, NULL, '2023-06-19 04:27:06', '2023-06-19 11:38:14', 0),
(37, '10', NULL, '04f08bc26e1c98f17512d68f02517b8f', 'Meti Rofiana', '0823446982311', NULL, NULL, NULL, 1, 1, NULL, '2023-06-21 15:13:13', '2023-06-21 15:13:13', 0),
(38, '10', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'Coba SPV', '089776254312', NULL, NULL, NULL, 1, 1, NULL, '2023-06-30 06:35:37', '2023-06-30 06:35:37', 0),
(39, '14', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'Coba manager admin', '089776354112', NULL, NULL, NULL, 1, 1, NULL, '2023-06-30 06:37:27', '2023-06-30 06:37:27', 0),
(40, '13', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'Coba manager accounting', '089776534112', NULL, NULL, NULL, 1, 1, NULL, '2023-06-30 06:39:04', '2023-06-30 06:39:04', 0),
(41, '12', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'Coba manager proyek', '089776554331', NULL, NULL, NULL, 1, 1, NULL, '2023-06-30 06:40:33', '2023-06-30 06:40:33', 0),
(42, '11', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'Coba manager hrd', '089776554309', NULL, NULL, NULL, 1, 1, NULL, '2023-06-30 06:43:11', '2023-06-30 06:43:11', 0),
(43, '4', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'Evi Qurotu Aini', '085895830289', NULL, NULL, NULL, 1, 1, NULL, '2023-07-06 02:44:42', '2023-07-06 02:44:42', 0),
(45, '4', NULL, 'a047d35a6f6a769076540502a2f1bef9', 'Muhamad Iqbal', '082139181201', '1683082068637.jpg', NULL, NULL, 1, 1, NULL, '2023-07-06 02:47:55', '2023-07-06 03:09:47', 0),
(46, '4', NULL, '282b5b87344e778d1270d19994706de9', 'Tika Khairani', '089515793817', NULL, NULL, NULL, 1, 1, NULL, '2023-07-06 02:49:00', '2023-07-06 02:49:00', 0),
(47, '10', NULL, '6c6c25ef1b1161becb79b7f84390d0b0', 'Yogie Prasetyo', '0852305154651', 'IMG_20210905_211307.jpg', NULL, NULL, 1, 1, NULL, '2023-07-06 03:16:47', '2023-07-06 08:34:04', 0),
(48, '4', NULL, '87ff2d869ab9ed9ad7a6fdf09dfdf479', 'Dwi Febriyanti', '0857916434741', '1683080859122.jpg', NULL, NULL, 1, 1, NULL, '2023-07-06 03:19:41', '2023-07-06 03:57:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_user_history_login`
--

CREATE TABLE `db_user_history_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `db_user_history_login`
--

INSERT INTO `db_user_history_login` (`id`, `user_id`, `last_login`) VALUES
(1, 1, '2023-09-12 03:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembatalan`
--

CREATE TABLE `detail_pembatalan` (
  `id_konsumen` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nominal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `harga_kesepakatan_inhouse`
--

CREATE TABLE `harga_kesepakatan_inhouse` (
  `id_kesepakatan` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `jml_kesepakatan` varchar(20) NOT NULL,
  `angsuran` varchar(20) NOT NULL,
  `cicilan_angsuran` varchar(20) NOT NULL,
  `tgl_bayar` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tgl_pembayaran` varchar(100) NOT NULL,
  `denda` varchar(100) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inhouse_cicil_hk`
--

CREATE TABLE `inhouse_cicil_hk` (
  `id_cicil` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `bukti_nota` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inhouse_cicil_kt`
--

CREATE TABLE `inhouse_cicil_kt` (
  `id_cicil` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `bukti_nota` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inhouse_cicil_tj`
--

CREATE TABLE `inhouse_cicil_tj` (
  `id_cicil` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `bukti_nota` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inhouse_cicil_tjl`
--

CREATE TABLE `inhouse_cicil_tjl` (
  `id_cicil` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `bukti_nota` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inhouse_cicil_um`
--

CREATE TABLE `inhouse_cicil_um` (
  `id_cicil` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `bukti_nota` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kas_operasional`
--

CREATE TABLE `kas_operasional` (
  `id_kas` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `id_perumahan` int(11) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelebihan_tanah`
--

CREATE TABLE `kelebihan_tanah` (
  `id_kt` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `jml_kt` varchar(20) NOT NULL,
  `angsuran` varchar(20) NOT NULL,
  `cicilan_angsuran` varchar(20) NOT NULL,
  `tgl_bayar` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tgl_pembayaran` varchar(100) NOT NULL,
  `denda` varchar(100) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelebihan_tanah_inhouse`
--

CREATE TABLE `kelebihan_tanah_inhouse` (
  `id_kt` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `jml_kt` varchar(20) NOT NULL,
  `angsuran` varchar(20) NOT NULL,
  `cicilan_angsuran` varchar(20) NOT NULL,
  `tgl_bayar` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tgl_pembayaran` varchar(100) NOT NULL,
  `denda` varchar(100) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kode`
--

CREATE TABLE `kode` (
  `id_kode` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `deskripsi_kode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kode`
--

INSERT INTO `kode` (`id_kode`, `kode`, `deskripsi_kode`) VALUES
(5, '2', 'Pengeluaran'),
(6, '1', 'Pemasukan'),
(11, '0', 'Kas MCM');

-- --------------------------------------------------------

--
-- Table structure for table `lain_lain`
--

CREATE TABLE `lain_lain` (
  `id_lain` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `jml_lain` varchar(20) NOT NULL,
  `angsuran` varchar(20) NOT NULL,
  `cicilan_angsuran` varchar(20) NOT NULL,
  `tgl_bayar` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tgl_pembayaran` varchar(100) NOT NULL,
  `denda` varchar(100) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `id` int(11) NOT NULL,
  `tipe_id` int(11) DEFAULT NULL COMMENT '1 = pemasukan 2 = pengeluaran',
  `kategori_id` int(11) DEFAULT NULL COMMENT 'kategori transaksi',
  `nominal` int(11) DEFAULT NULL,
  `nama_transaksi` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `datetimes` timestamp NULL DEFAULT current_timestamp(),
  `jenis_kas` int(11) DEFAULT NULL COMMENT '1=kas besar, 2=kas kecil',
  `user_id` int(11) DEFAULT NULL,
  `user_update` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `action` int(11) DEFAULT 0 COMMENT '0 = aktif, 1=delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan_kategori_induk`
--

CREATE TABLE `laporan_keuangan_kategori_induk` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan_kategori_transaksi`
--

CREATE TABLE `laporan_keuangan_kategori_transaksi` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL COMMENT '1 = Pemasukkan, 2=Pengeluaran',
  `induk` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan_tipe`
--

CREATE TABLE `laporan_keuangan_tipe` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `warna` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `laporan_keuangan_tipe`
--

INSERT INTO `laporan_keuangan_tipe` (`id`, `nama`, `warna`) VALUES
(1, 'Pemasukan', 'primary'),
(2, 'Pengeluaran', 'danger');

-- --------------------------------------------------------

--
-- Table structure for table `list_pengajuan_material`
--

CREATE TABLE `list_pengajuan_material` (
  `id_list` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `rab_material` int(11) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logistik_stok`
--

CREATE TABLE `logistik_stok` (
  `id_stok` int(11) NOT NULL,
  `proyek_material_id` int(11) NOT NULL,
  `logistik_id` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` varchar(10) NOT NULL,
  `stok_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mandor_proyek`
--

CREATE TABLE `mandor_proyek` (
  `id_mandor_proyek` int(11) NOT NULL,
  `id_mandor` int(11) NOT NULL,
  `id_proyek_upah` int(11) NOT NULL,
  `id_blok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_logistik`
--

CREATE TABLE `master_logistik` (
  `id` int(11) NOT NULL,
  `proyek_material_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `material_id` int(11) DEFAULT NULL,
  `jml_pengajuan` varchar(10) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT 'status 1 = approve pengajuan\r\n2 = masuk\r\n3 = Ditolak',
  `detail` int(2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nota` varchar(200) NOT NULL,
  `time` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `stok_id` int(11) NOT NULL,
  `tipe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_logistik_detail`
--

CREATE TABLE `master_logistik_detail` (
  `id_logistik_detail` int(11) NOT NULL,
  `logistik_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `harga_real` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_mcm` date DEFAULT NULL,
  `pembayaran` varchar(100) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_logistik_keluar`
--

CREATE TABLE `master_logistik_keluar` (
  `id` bigint(11) NOT NULL,
  `proyek_material_id` int(11) NOT NULL,
  `logistik_id` int(11) NOT NULL,
  `material_keluar` int(20) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `kavling` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_logistik_masuk`
--

CREATE TABLE `master_logistik_masuk` (
  `id` int(11) NOT NULL,
  `proyek_material_id` int(11) NOT NULL,
  `logistik_id` int(11) NOT NULL,
  `material_masuk` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `dokumentasi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_mandor`
--

CREATE TABLE `master_mandor` (
  `id_mandor` int(11) NOT NULL,
  `nama_mandor` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `atas_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_material`
--

CREATE TABLE `master_material` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `nama_material` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_produk`
--

CREATE TABLE `master_produk` (
  `id` int(11) NOT NULL,
  `barcode` varchar(60) NOT NULL DEFAULT '',
  `nama_produk` varchar(255) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `harga` int(11) DEFAULT 0,
  `stok` int(11) NOT NULL,
  `status` int(11) DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `tanggal` date DEFAULT NULL,
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `action` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `master_produk_kategori`
--

CREATE TABLE `master_produk_kategori` (
  `id` int(11) NOT NULL,
  `kategori_produk` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `action` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `master_produk_unit`
--

CREATE TABLE `master_produk_unit` (
  `id` int(11) NOT NULL,
  `nama_satuan` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `action` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `master_proyek`
--

CREATE TABLE `master_proyek` (
  `id` int(11) NOT NULL,
  `nama_proyek` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `approve` int(1) NOT NULL DEFAULT 0,
  `rab` int(11) NOT NULL DEFAULT 0,
  `print` int(1) NOT NULL DEFAULT 0,
  `end` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_proyek_kavling`
--

CREATE TABLE `master_proyek_kavling` (
  `id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `kavling_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_supplier`
--

CREATE TABLE `master_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `nama_toko` varchar(225) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama_bank` varchar(200) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `no_rek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material_keluar`
--

CREATE TABLE `material_keluar` (
  `id_keluar` int(11) NOT NULL,
  `id_logistik` int(11) NOT NULL,
  `jml_keluar` varchar(10) NOT NULL,
  `kavling_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `icon`, `url`, `type`, `parent`) VALUES
(1, 'Dashboard', 'nav-icon fas fa-tachometer-alt', 'dashboard/', 0, 0),
(2, 'Marketing / Admin', 'nav-icon fas fa-file-alt', '#', 1, 0),
(3, 'Management Proyek', 'nav-icon fa fa-briefcase', '#', 1, 0),
(4, 'Management Logistik', 'nav-icon fa fa-industry', '#', 1, 0),
(5, 'Management Keuangan', 'nav-icon fas fa-dollar-sign', '#', 1, 0),
(6, 'SPV', 'nav-icon fas fa-user', '#', 1, 0),
(7, 'Menu Lain-Lain', 'nav-icon fas fa-stream', '#', 1, 0),
(8, 'Management Master', 'nav-icon fas fa-star', '#', 1, 0),
(9, 'Calon Konsumen', 'far fa-circle nav-icon', 'marketing/data_konsumen', 3, 2),
(10, 'Transaksi Bank', 'far fa-circle nav-icon', 'marketing/transaksi_bank', 3, 2),
(11, 'Transaksi Inhouse', 'far fa-circle nav-icon', 'marketing/transaksi_inhouse', 3, 2),
(12, 'Konsumen', 'far fa-circle nav-icon', 'marketing/konsumen', 3, 2),
(13, 'Pembatalan Transaksi', 'far fa-circle nav-icon', 'marketing/transaksi_batal', 3, 2),
(14, 'Ajukan Proyek', 'far fa-circle nav-icon', 'proyek/ajukan_proyek', 3, 3),
(15, 'RAB', 'far fa-circle nav-icon', 'proyek/rab', 3, 3),
(16, 'Pengajuan Material', 'far fa-circle nav-icon', 'proyek/pengajuan_material', 3, 3),
(17, 'Progres Pembangunan', 'far fa-circle nav-icon', 'proyek/progres', 3, 3),
(18, 'Pekerjaan Insidentil', 'far fa-circle nav-icon', 'proyek/pekerjaan_insidentil', 3, 3),
(19, 'Ajukan Material', 'far fa-circle nav-icon', 'logistik/ajukan_material', 3, 4),
(20, 'Material Masuk', 'far fa-circle nav-icon', 'logistik/material_masuk', 3, 4),
(21, 'Material Keluar', 'far fa-circle nav-icon', 'logistik/material_keluar', 3, 4),
(22, 'Rekap Stok Material', 'far fa-circle nav-icon', 'logistik/rekap_stok_material', 3, 4),
(23, 'Pemasukan', 'far fa-dot-circle nav-icon', '#', 2, 5),
(24, 'Pengeluaran', 'far fa-dot-circle nav-icon', '#', 2, 5),
(25, 'Laporan', 'far fa-dot-circle nav-icon', '#', 2, 5),
(26, 'Transaksi Bank', 'far fa-circle nav-icon', 'accounting/bank', 3, 23),
(27, 'Transaksi Inhouse', 'far fa-circle nav-icon', 'accounting/inhouse', 3, 23),
(28, 'Lainnya', 'far fa-circle nav-icon', 'accounting/pemasukan_lain', 3, 23),
(29, 'Marketing', 'nav-icon far fa-circle text-info', '#', 4, 24),
(30, 'Proyek', 'nav-icon far fa-circle text-info', '#', 4, 24),
(32, 'Cashback', 'far fa-circle nav-icon', 'accounting/fee_marketing', 3, 29),
(33, 'Pembatalan Transaksi', 'far fa-circle nav-icon', 'accounting/pembatalan_transaksi', 3, 29),
(34, 'Upah Kerja', 'far fa-circle nav-icon', 'accounting/pembangunan', 3, 30),
(35, 'Pengajuan Material', 'far fa-circle nav-icon', 'accounting/pengajuan_material', 3, 30),
(36, 'Pekerjaan Insidentil', 'far fa-circle nav-icon', 'accounting/insidentil', 3, 30),
(39, 'Pengeluaran Lainnya', 'far fa-circle nav-icon', 'accounting/kas_operasional', 3, 24),
(40, 'Laporan Bulanan', 'far fa-circle nav-icon', 'accounting/laporan', 3, 25),
(41, 'Laporan Arus Kas', 'far fa-circle nav-icon', 'accounting/laporan_kas', 3, 25),
(42, 'Data Konsumen', 'far fa-circle nav-icon', 'kpr/konsumen', 3, 6),
(43, 'Rekening Bank', 'far fa-circle nav-icon', 'kpr/rek_bank', 3, 6),
(44, 'Berkas Konsumen', 'far fa-circle nav-icon', 'kpr/berkas_konsumen', 3, 6),
(45, 'Pembebasan Lahan', 'far fa-circle nav-icon', 'other/pembebasan_lahan/', 3, 7),
(46, 'Pengeluaran Lain', 'far fa-circle nav-icon', 'other/pengeluaran_lain/', 3, 7),
(47, 'Master Kavling', 'far fa-circle nav-icon', 'master/kavling/', 3, 8),
(48, 'Master Tipe', 'far fa-circle nav-icon', 'master/tipe', 3, 8),
(49, 'Master Cluster', 'far fa-circle nav-icon', 'master/cluster/', 3, 8),
(50, 'Master Material', 'far fa-circle nav-icon', 'master/material/', 3, 8),
(51, 'Master Jenis Material', 'far fa-circle nav-icon', 'master/jenis_material/', 3, 8),
(52, 'Master Satuan Unit', 'far fa-circle nav-icon', 'master/unit/', 3, 8),
(53, 'Master Supplier', 'far fa-circle nav-icon', 'master/supplier/', 3, 8),
(54, 'Master Mandor', 'far fa-circle nav-icon', 'master/mandor/', 3, 8),
(55, 'Pesan', 'nav-icon fas fa-tachometer-alt', '#', 1, 0),
(56, 'Kirim Massal', 'far fa-circle nav-icon', 'pesan/kirim_massal', 3, 55),
(57, 'Tagihan', 'far fa-circle nav-icon', 'pesan/tagihan', 3, 55),
(58, 'Invoice', 'far fa-circle nav-icon', 'pesan/invoice', 3, 55),
(59, 'Pengaturan', 'far fa-circle nav-icon', 'pesan/pengaturan', 3, 55);

-- --------------------------------------------------------

--
-- Table structure for table `menu_access`
--

CREATE TABLE `menu_access` (
  `id_access` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_access`
--

INSERT INTO `menu_access` (`id_access`, `id_group`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 1, 24),
(25, 1, 25),
(26, 1, 26),
(27, 1, 27),
(28, 1, 28),
(29, 1, 29),
(30, 1, 30),
(31, 1, 31),
(32, 1, 32),
(33, 1, 33),
(34, 1, 34),
(35, 1, 35),
(36, 1, 36),
(37, 1, 37),
(38, 1, 38),
(39, 1, 39),
(40, 1, 40),
(41, 1, 41),
(42, 1, 42),
(43, 1, 43),
(44, 1, 44),
(45, 1, 45),
(46, 1, 46),
(47, 1, 47),
(48, 1, 48),
(49, 1, 49),
(50, 1, 50),
(51, 1, 51),
(52, 1, 52),
(53, 1, 53),
(54, 2, 1),
(55, 2, 2),
(56, 2, 3),
(57, 2, 4),
(58, 2, 5),
(59, 2, 6),
(60, 2, 7),
(61, 2, 8),
(62, 2, 9),
(63, 2, 10),
(64, 2, 11),
(65, 2, 12),
(66, 2, 13),
(67, 2, 14),
(68, 2, 15),
(69, 2, 16),
(70, 2, 17),
(71, 2, 18),
(72, 2, 19),
(73, 2, 20),
(74, 2, 21),
(75, 2, 22),
(76, 2, 23),
(77, 2, 24),
(78, 2, 25),
(79, 2, 26),
(80, 2, 27),
(81, 2, 28),
(82, 2, 29),
(83, 2, 30),
(84, 2, 31),
(85, 2, 32),
(86, 2, 33),
(87, 2, 34),
(88, 2, 35),
(89, 2, 36),
(90, 2, 37),
(91, 2, 38),
(92, 2, 39),
(93, 2, 40),
(94, 2, 41),
(95, 2, 42),
(96, 2, 43),
(97, 2, 44),
(98, 2, 45),
(99, 2, 46),
(100, 2, 47),
(101, 2, 48),
(102, 2, 49),
(103, 2, 50),
(104, 2, 51),
(105, 2, 52),
(106, 2, 53),
(107, 3, 1),
(108, 3, 5),
(109, 3, 23),
(110, 3, 24),
(111, 3, 25),
(112, 3, 26),
(113, 3, 27),
(114, 3, 28),
(115, 3, 29),
(116, 3, 30),
(117, 3, 31),
(118, 3, 32),
(119, 3, 33),
(120, 3, 34),
(121, 3, 35),
(122, 3, 36),
(123, 3, 37),
(124, 3, 38),
(125, 3, 39),
(126, 3, 40),
(127, 3, 41),
(128, 4, 1),
(129, 4, 2),
(130, 4, 9),
(131, 4, 10),
(132, 4, 11),
(133, 4, 12),
(134, 4, 13),
(135, 5, 1),
(136, 5, 4),
(137, 5, 19),
(138, 5, 20),
(139, 5, 21),
(140, 5, 22),
(141, 6, 1),
(142, 6, 3),
(143, 6, 14),
(144, 6, 15),
(145, 6, 16),
(146, 6, 17),
(147, 6, 18),
(148, 7, 1),
(149, 7, 5),
(150, 7, 23),
(151, 7, 26),
(152, 7, 27),
(153, 7, 28),
(154, 1, 54),
(155, 1, 55),
(156, 1, 56),
(157, 1, 57),
(158, 1, 58),
(159, 1, 59),
(160, 10, 6),
(161, 10, 42),
(162, 10, 43),
(163, 10, 44),
(164, 10, 1),
(165, 12, 1),
(166, 12, 3),
(167, 12, 4),
(168, 12, 14),
(169, 12, 15),
(170, 12, 16),
(171, 12, 17),
(172, 12, 18),
(173, 12, 19),
(174, 12, 20),
(175, 12, 21),
(176, 12, 22),
(177, 13, 1),
(178, 13, 5),
(179, 13, 23),
(180, 13, 24),
(181, 13, 25),
(182, 13, 26),
(183, 13, 27),
(184, 13, 29),
(185, 13, 30),
(186, 13, 32),
(187, 13, 33),
(188, 13, 34),
(189, 13, 35),
(190, 13, 36),
(191, 13, 39),
(192, 13, 40),
(193, 13, 41),
(194, 13, 28),
(195, 14, 2),
(196, 14, 1),
(197, 14, 9),
(198, 14, 10),
(199, 14, 11),
(200, 14, 12),
(201, 14, 13),
(202, 14, 6),
(203, 14, 42),
(204, 14, 43),
(205, 14, 44);

-- --------------------------------------------------------

--
-- Table structure for table `nota_material`
--

CREATE TABLE `nota_material` (
  `id_nota` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `nota` varchar(200) NOT NULL,
  `tgl_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pak`
--

CREATE TABLE `pak` (
  `id_pak` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `jml_pak` varchar(20) NOT NULL,
  `angsuran` varchar(20) NOT NULL,
  `cicilan_angsuran` varchar(20) NOT NULL,
  `tgl_bayar` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tgl_pembayaran` varchar(100) NOT NULL,
  `denda` varchar(10) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_lain`
--

CREATE TABLE `pemasukan_lain` (
  `id_pemasukan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `tgl_approve_manager` date DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembatalan_transaksi`
--

CREATE TABLE `pembatalan_transaksi` (
  `id_pembatalan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_pembatalan` date NOT NULL,
  `total_pengembalian` varchar(100) NOT NULL,
  `title_kode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembebasan_lahan`
--

CREATE TABLE `pembebasan_lahan` (
  `id_pembebasan` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL,
  `nama_penjual` varchar(100) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `tgl_pengalihan` date NOT NULL,
  `total_pembelian` varchar(100) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_material`
--

CREATE TABLE `pengajuan_material` (
  `id_pengajuan` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status_pengajuan` int(1) NOT NULL,
  `supplier` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL,
  `title_kode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_pesan`
--

CREATE TABLE `pengaturan_pesan` (
  `id` int(11) NOT NULL,
  `template_pesan` text DEFAULT NULL,
  `interval_1` int(11) NOT NULL,
  `interval_2` int(11) DEFAULT NULL,
  `interval_3` int(11) DEFAULT NULL,
  `jam` time NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_lain`
--

CREATE TABLE `pengeluaran_lain` (
  `id_pengeluaran` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `jml_pengeluaran` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `id_perumahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `piutang_bank`
--

CREATE TABLE `piutang_bank` (
  `id_piutang` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `jml_piutang` varchar(100) NOT NULL,
  `angsuran` varchar(20) NOT NULL,
  `cicilan_angsuran` varchar(100) NOT NULL,
  `tgl_bayar` varchar(2) NOT NULL,
  `status` int(1) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `denda` varchar(20) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progres_pembangunan`
--

CREATE TABLE `progres_pembangunan` (
  `id_progres` int(11) NOT NULL,
  `upah_id` int(11) NOT NULL,
  `kavling_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `progres` varchar(4) NOT NULL,
  `total` varchar(20) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `status` int(2) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `mandor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rab_detail`
--

CREATE TABLE `rab_detail` (
  `id` int(11) NOT NULL,
  `rab_id` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL COMMENT '1 = induk, 0 = parent',
  `parent` int(11) DEFAULT NULL COMMENT 'ambil dari id yang level nya 1, jika level 1 maka paren nya = 999',
  `deskripsi` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 4 COMMENT '1 = progres, 2, = cancel, 3 = delete, 4 = template, 5 = finish',
  `action` int(11) DEFAULT 0 COMMENT '0 = active, 1=non aktive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rab_master`
--

CREATE TABLE `rab_master` (
  `id` int(11) NOT NULL,
  `judul_rab` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `total_anggaran` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1 = progres, 2, = cancel, 3 = delete, 4 = template, 99 = selesai',
  `action` int(11) DEFAULT 0 COMMENT '0 = active, 1=non aktive, 2=temp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `rek_bank`
--

CREATE TABLE `rek_bank` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `no_rekening` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `tgl_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stok_in_out`
--

CREATE TABLE `stok_in_out` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `stok_tipe` int(11) DEFAULT NULL COMMENT 'stok in atau out',
  `quantity` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 1 COMMENT '1=ok, 2=cancel, 3 = return, 4 = delete',
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `tanggal_update` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL COMMENT 'user yang create stock',
  `action` int(11) NOT NULL DEFAULT 0 COMMENT '0 = aktif, 1 = tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `stok_tipe`
--

CREATE TABLE `stok_tipe` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `store_profile`
--

CREATE TABLE `store_profile` (
  `id` int(11) NOT NULL,
  `judul_web` varchar(17) DEFAULT NULL,
  `nama_lembaga` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `bidang` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `action` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='pada tabel user masuknya ke store_id' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `store_profile`
--

INSERT INTO `store_profile` (`id`, `judul_web`, `nama_lembaga`, `alamat`, `telp`, `hp`, `contact_person`, `bidang`, `logo`, `api_key`, `user_id`, `tanggal`, `action`) VALUES
(1, 'SISTEM MANAJEMEN ', 'PT TUNGGAL GRIYA SAKINAH', 'jember', '0821111111', '0821111111', 'bapak', 'Developer dan Real Estate', 'profile-64aa55cabb.jpg', 'F38Ry6AMXqkINwcm11', 1, '2021-01-13 09:47:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kode`
--

CREATE TABLE `sub_kode` (
  `id_sub` int(11) NOT NULL,
  `id_kode` int(11) NOT NULL,
  `sub_kode` varchar(100) NOT NULL,
  `deskripsi_sub_kode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_kode`
--

INSERT INTO `sub_kode` (`id_sub`, `id_kode`, `sub_kode`, `deskripsi_sub_kode`) VALUES
(9, 11, '0.1', 'Saldo Bulan Sebelumnya'),
(10, 11, '0.2', 'Transfer MCM'),
(11, 11, '0.3', 'Pembayaran Langsung'),
(12, 11, '0.4', 'Lainnya'),
(23, 6, '1.1', 'Transaksi Bank'),
(24, 6, '1.2', 'Transaksi Inhouse'),
(26, 6, '1.3', 'Pemasukan Lainnya'),
(27, 5, '2.1', 'Pembangunan'),
(28, 5, '2.2', 'Operasional'),
(29, 5, '2.3', 'Gaji dan Tunjangan'),
(30, 5, '2.4', 'Realisasi Bank'),
(31, 5, '2.5', 'Promosi / Iklan'),
(32, 5, '2.6', 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `tanda_jadi_lokasi`
--

CREATE TABLE `tanda_jadi_lokasi` (
  `id_tjl` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `jml_tjl` varchar(100) NOT NULL,
  `angsuran` varchar(100) NOT NULL,
  `cicilan_angsuran` varchar(100) NOT NULL,
  `tgl_bayar` varchar(2) NOT NULL,
  `status` int(1) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tgl_pembayaran` varchar(100) NOT NULL,
  `denda` varchar(100) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tanda_jadi_lokasi_inhouse`
--

CREATE TABLE `tanda_jadi_lokasi_inhouse` (
  `id_tjl` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `jml_tjl` varchar(20) NOT NULL,
  `angsuran` varchar(20) NOT NULL,
  `cicilan_angsuran` varchar(20) NOT NULL,
  `tgl_bayar` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tgl_pembayaran` varchar(100) NOT NULL,
  `denda` varchar(100) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blok`
--

CREATE TABLE `tbl_blok` (
  `id_blok` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL,
  `blok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cluster`
--

CREATE TABLE `tbl_cluster` (
  `id_cluster` int(11) NOT NULL,
  `id_perum` int(11) NOT NULL,
  `nama_cluster` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kavling`
--

CREATE TABLE `tbl_kavling` (
  `id_kavling` int(11) NOT NULL,
  `id_perum` int(11) NOT NULL,
  `id_cluster` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `blok` varchar(40) NOT NULL,
  `no_rumah` varchar(10) NOT NULL,
  `lt` varchar(100) NOT NULL,
  `lb` varchar(100) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `status_kavling` int(11) NOT NULL DEFAULT 0,
  `proyek` int(11) NOT NULL DEFAULT 0,
  `sitemap_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marketing`
--

CREATE TABLE `tbl_marketing` (
  `id_marketing` int(11) NOT NULL,
  `nama_konsumen` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `dapat_info` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tempat_kerja` varchar(100) NOT NULL,
  `gaji` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status_menikah` varchar(10) NOT NULL,
  `status_fee_marketing` int(1) NOT NULL,
  `img_fee_marketing` varchar(100) NOT NULL,
  `nominal_fee_marketing` varchar(20) NOT NULL,
  `spr` int(1) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `tgl_fee_marketing` date DEFAULT NULL,
  `perum` int(11) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `admin_id` int(11) NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_max_material`
--

CREATE TABLE `tbl_max_material` (
  `id_max` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `max` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasangan`
--

CREATE TABLE `tbl_pasangan` (
  `id_pasangan` int(11) NOT NULL,
  `id_marketing` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `tempat_kerja` varchar(200) NOT NULL,
  `gaji` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL,
  `id_blok` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `status_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perumahan`
--

CREATE TABLE `tbl_perumahan` (
  `id_perumahan` int(11) NOT NULL,
  `nama_perumahan` varchar(200) NOT NULL,
  `kabupaten` varchar(200) NOT NULL,
  `alamat_perumahan` text NOT NULL,
  `cluster` int(1) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_perumahan`
--

INSERT INTO `tbl_perumahan` (`id_perumahan`, `nama_perumahan`, `kabupaten`, `alamat_perumahan`, `cluster`, `logo`) VALUES
(2, 'Green View Bondowoso', 'Bondowoso', 'Jl Sekar Putih Tegal Ampel Bondowoso', 1, 'g23.png'),
(3, 'Villa Utama Residence', 'Situbondo', 'Jl Cermee Klampokan Panji', 1, 'g221.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proyek_insidentil`
--

CREATE TABLE `tbl_proyek_insidentil` (
  `id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `nilai` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_insidentil` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `id_perumahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proyek_lainnya`
--

CREATE TABLE `tbl_proyek_lainnya` (
  `id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `harga_lainnya` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `tgl_approve` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proyek_material`
--

CREATE TABLE `tbl_proyek_material` (
  `id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `material_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `jml_out` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `tgl_approve` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proyek_upah`
--

CREATE TABLE `tbl_proyek_upah` (
  `id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `harga_kontrak` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `action` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipe`
--

CREATE TABLE `tbl_tipe` (
  `id_tipe` int(11) NOT NULL,
  `id_perum` int(11) NOT NULL,
  `id_cluster` int(11) DEFAULT NULL,
  `tipe` varchar(10) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'Status Jika punya Max Material',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_bank`
--

CREATE TABLE `tbl_transaksi_bank` (
  `id_transaksi_bank` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `id_rumah` int(11) NOT NULL,
  `harga_kesepakatan` varchar(40) NOT NULL,
  `tanda_jadi` varchar(100) NOT NULL,
  `tgl_tanda_jadi` date NOT NULL,
  `status` int(11) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `marketing_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_inhouse`
--

CREATE TABLE `tbl_transaksi_inhouse` (
  `id_inhouse` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `id_rumah` int(11) NOT NULL,
  `tanda_jadi` varchar(20) NOT NULL,
  `tgl_tanda_jadi` date NOT NULL,
  `status` int(11) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `marketing_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `title_kode`
--

CREATE TABLE `title_kode` (
  `id_title` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `kode_title` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `title_kode`
--

INSERT INTO `title_kode` (`id_title`, `id_sub`, `kode_title`, `deskripsi`) VALUES
(1, 1, '1', 'Tanda Jadi Lokasi'),
(2, 1, '2', 'Uang Muka'),
(3, 1, '3', 'Kelebihan Tanah'),
(4, 1, '4', 'PAK'),
(5, 1, '5', 'Lain - Lain'),
(6, 1, '6', 'Angsuran Bank'),
(7, 1, '7', 'Piutang Bank'),
(8, 2, '1', 'Harga Kesepakatan'),
(9, 2, '2', 'Tanda Jadi Lokasi'),
(10, 2, '3', 'Unag Muka'),
(11, 2, '4', 'Kelebihan Tanah'),
(12, 3, '1', 'Fee Marketing'),
(13, 4, '1', 'Upah Pekerja'),
(14, 4, '2', 'RAB material'),
(15, 4, '3', 'RAB Upah Pekerja'),
(16, 4, '4', 'RAB Lain'),
(17, 4, '5', 'Pekerjaan insidentil'),
(18, 4, '6', 'Pengajuan Material'),
(19, 5, '1', 'Pembebasan Lahan'),
(20, 5, '2', 'Pengeluaran Lain'),
(21, 17, '1.5.a', 'Realisasi Bank BTN'),
(22, 17, '1.5.b', 'Realisasi Bank Jatim'),
(23, 17, '1.5.c', 'Realisasi Bank Lainnya'),
(24, 18, '1.6.a', 'Piutang Bank BTN'),
(25, 18, '1.6.b', 'Piutang Bank Jatim'),
(26, 18, '1.6.c', 'Piutang Bank Lainnya'),
(27, 13, '1.1.a', 'Tanda Jadi'),
(28, 14, '1.2.a', 'DP/ Uang Muka'),
(29, 15, '1.3.a', 'Harga Posisi'),
(30, 16, '1.4.a', 'PAK'),
(31, 19, '1.7.a', 'Cash Tempo'),
(32, 20, '1.8.a', 'Angsuran Inhouse'),
(33, 21, '1.9.a', 'SBUM'),
(34, 22, '1.2.a', 'DP / Uang Muka'),
(35, 23, '1.1.a', 'Tanda Jadi'),
(36, 23, '1.1.b', 'Tanda Jadi Lokasi'),
(37, 23, '1.1.c', 'Uang Muka'),
(38, 23, '1.1.d', 'Kelebihan Tanah'),
(39, 23, '1.1.e', 'Realisasi Bank'),
(40, 23, '1.1.f', 'Piutang Bank'),
(41, 23, '1.1.g', 'SBUM'),
(42, 23, '1.1.h', 'PAK'),
(43, 23, '1.1.i', 'Lain-lain'),
(44, 24, '1.2.a', 'Tanda Jadi'),
(45, 24, '1.2.b', 'Tanda Jadi Lokasi'),
(46, 24, '1.2.c', 'Uang Muka'),
(47, 24, '1.2.d', 'Kelebihan Tanah'),
(48, 24, '1.2.e', 'Harga Kesepakatan'),
(49, 25, '1.3.a', 'Transaksi Lainnya'),
(51, 26, '1.3.b', 'Fasilitas KYG Bank'),
(52, 26, '1.3.c', 'Fasiltas KPL Bank'),
(53, 26, '1.3.d', 'Pinjaman / Modal pihak non Bank'),
(54, 26, '1.3.e', 'Pinjaman Bank'),
(55, 27, '2.1.a', 'Belanja Material Langsung'),
(56, 27, '2.1.b', 'Belanja Material Mitra'),
(57, 27, '2.1.c', 'Upah Kerja Bangunan'),
(58, 27, '2.1.d', 'Upah Kerja non Bangunan'),
(59, 27, '2.1.e', 'Biaya Sub Kontraktor'),
(60, 27, '2.1.f', 'Pematangan Lahan Teknis'),
(61, 27, '2.1.g', 'Pematangan Lahan non Teknis'),
(62, 28, '2.2.a', 'Inventaris'),
(63, 28, '2.2.b', 'ATK'),
(67, 28, '2.2.c', 'Listrik / Pdam'),
(68, 28, '2.2.d', 'Materai'),
(69, 28, '2.2.e', 'Transport / BBM'),
(70, 28, '2.2.f', 'Konsumsi'),
(71, 28, '2.2.g', 'Service Kendaraan / Aset'),
(72, 28, '2.2.h', 'Lain-lain'),
(73, 29, '2.3.a', 'Gaji Manager'),
(74, 29, '2.3.b', 'Gaji Devisi Proyek dan Umum'),
(75, 29, '2.3.c', 'Gaji Devisi Keuangan'),
(76, 29, '2.3.d', 'Gaji Devisi Admin / Marketing'),
(77, 29, '2.3.e', 'Tunjangan / Bonus'),
(78, 30, '2.4.a', 'Biaya Realisasi'),
(79, 30, '2.4.b', 'Notaris / BBN'),
(80, 30, '2.4.c', 'PPh'),
(81, 30, '2.4.d', 'BPHTB'),
(82, 30, '2.4.e', 'PPN'),
(83, 30, '2.4.f', 'LPA dan KJPP'),
(84, 30, '2.4.g', 'PPN dan Lainnya'),
(85, 31, '2.5.a', 'Cetak Banner'),
(86, 31, '2.5.b', 'Cetak Brosur'),
(87, 31, '2.5.c', 'Fee Marketing / Admin'),
(88, 31, '2.5.d', 'Iklan Medsos'),
(89, 31, '2.5.e', 'Pameran / CFD'),
(92, 31, '2.5.f', 'Pajak Reklame'),
(93, 32, '2.6.a', 'Dana Talangan'),
(94, 32, '2.6.b', 'Pembebasan Lahan'),
(95, 31, '2.5.g', 'Voucher / Casback'),
(96, 26, '1.3.f', 'Pembayaran Dana Talangan'),
(97, 26, '1.3.a', 'Modal langsung perusahaan'),
(98, 32, '2.6.c', 'Pengembalian dana konsumen'),
(99, 26, '1.3.g', 'Pemasukan Lain-lain'),
(100, 32, '2.6.d', 'Zakat Mal / Csr'),
(101, 32, '2.6.e', 'Pembayaran KYG / Bank'),
(102, 32, '2.6.f', 'Pembayaran Non Bank');

-- --------------------------------------------------------

--
-- Table structure for table `uang_muka`
--

CREATE TABLE `uang_muka` (
  `id_um` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `jml_um` varchar(20) NOT NULL,
  `angsuran` varchar(20) NOT NULL,
  `cicilan_angsuran` varchar(20) NOT NULL,
  `tgl_bayar` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tgl_pembayaran` varchar(100) NOT NULL,
  `denda` varchar(100) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uang_muka_inhouse`
--

CREATE TABLE `uang_muka_inhouse` (
  `id_um` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `jml_um` varchar(20) NOT NULL,
  `angsuran` varchar(20) NOT NULL,
  `cicilan_angsuran` varchar(20) NOT NULL,
  `tgl_bayar` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tgl_pembayaran` varchar(100) NOT NULL,
  `denda` varchar(100) NOT NULL,
  `title_kode` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_perumahan`
--
ALTER TABLE `access_perumahan`
  ADD PRIMARY KEY (`id_access`);

--
-- Indexes for table `angsuran_bank`
--
ALTER TABLE `angsuran_bank`
  ADD PRIMARY KEY (`id_angsur`);

--
-- Indexes for table `approved_history`
--
ALTER TABLE `approved_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_cicil_kt`
--
ALTER TABLE `bank_cicil_kt`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `bank_cicil_lain`
--
ALTER TABLE `bank_cicil_lain`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `bank_cicil_pak`
--
ALTER TABLE `bank_cicil_pak`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `bank_cicil_pb`
--
ALTER TABLE `bank_cicil_pb`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `bank_cicil_rb`
--
ALTER TABLE `bank_cicil_rb`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `bank_cicil_tj`
--
ALTER TABLE `bank_cicil_tj`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `bank_cicil_tjl`
--
ALTER TABLE `bank_cicil_tjl`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `bank_cicil_um`
--
ALTER TABLE `bank_cicil_um`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `berkas_konsumen`
--
ALTER TABLE `berkas_konsumen`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD PRIMARY KEY (`id_bukti`);

--
-- Indexes for table `bukti_spkb`
--
ALTER TABLE `bukti_spkb`
  ADD PRIMARY KEY (`id_bukti_spkb`);

--
-- Indexes for table `bukti_spr`
--
ALTER TABLE `bukti_spr`
  ADD PRIMARY KEY (`id_bukti_spr`);

--
-- Indexes for table `cicil_fee_marketing`
--
ALTER TABLE `cicil_fee_marketing`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `cicil_insidentil`
--
ALTER TABLE `cicil_insidentil`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `cicil_kas`
--
ALTER TABLE `cicil_kas`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `cicil_material`
--
ALTER TABLE `cicil_material`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `cicil_pembatalan`
--
ALTER TABLE `cicil_pembatalan`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `cicil_pembebasan_lahan`
--
ALTER TABLE `cicil_pembebasan_lahan`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `cicil_pengeluaran_lain`
--
ALTER TABLE `cicil_pengeluaran_lain`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `cicil_progres`
--
ALTER TABLE `cicil_progres`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `db_group`
--
ALTER TABLE `db_group`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `db_group_module`
--
ALTER TABLE `db_group_module`
  ADD PRIMARY KEY (`group_id`,`modul_id`) USING BTREE;

--
-- Indexes for table `db_module`
--
ALTER TABLE `db_module`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `db_status`
--
ALTER TABLE `db_status`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `db_user_history_login`
--
ALTER TABLE `db_user_history_login`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `harga_kesepakatan_inhouse`
--
ALTER TABLE `harga_kesepakatan_inhouse`
  ADD PRIMARY KEY (`id_kesepakatan`);

--
-- Indexes for table `inhouse_cicil_hk`
--
ALTER TABLE `inhouse_cicil_hk`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `inhouse_cicil_kt`
--
ALTER TABLE `inhouse_cicil_kt`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `inhouse_cicil_tj`
--
ALTER TABLE `inhouse_cicil_tj`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `inhouse_cicil_tjl`
--
ALTER TABLE `inhouse_cicil_tjl`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `inhouse_cicil_um`
--
ALTER TABLE `inhouse_cicil_um`
  ADD PRIMARY KEY (`id_cicil`);

--
-- Indexes for table `kas_operasional`
--
ALTER TABLE `kas_operasional`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indexes for table `kelebihan_tanah`
--
ALTER TABLE `kelebihan_tanah`
  ADD PRIMARY KEY (`id_kt`);

--
-- Indexes for table `kelebihan_tanah_inhouse`
--
ALTER TABLE `kelebihan_tanah_inhouse`
  ADD PRIMARY KEY (`id_kt`);

--
-- Indexes for table `kode`
--
ALTER TABLE `kode`
  ADD PRIMARY KEY (`id_kode`);

--
-- Indexes for table `lain_lain`
--
ALTER TABLE `lain_lain`
  ADD PRIMARY KEY (`id_lain`);

--
-- Indexes for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `laporan_keuangan_kategori_induk`
--
ALTER TABLE `laporan_keuangan_kategori_induk`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `laporan_keuangan_kategori_transaksi`
--
ALTER TABLE `laporan_keuangan_kategori_transaksi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `laporan_keuangan_tipe`
--
ALTER TABLE `laporan_keuangan_tipe`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `list_pengajuan_material`
--
ALTER TABLE `list_pengajuan_material`
  ADD PRIMARY KEY (`id_list`);

--
-- Indexes for table `logistik_stok`
--
ALTER TABLE `logistik_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `mandor_proyek`
--
ALTER TABLE `mandor_proyek`
  ADD PRIMARY KEY (`id_mandor_proyek`);

--
-- Indexes for table `master_logistik`
--
ALTER TABLE `master_logistik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_logistik_detail`
--
ALTER TABLE `master_logistik_detail`
  ADD PRIMARY KEY (`id_logistik_detail`);

--
-- Indexes for table `master_logistik_keluar`
--
ALTER TABLE `master_logistik_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_logistik_masuk`
--
ALTER TABLE `master_logistik_masuk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logistik_id` (`logistik_id`);

--
-- Indexes for table `master_mandor`
--
ALTER TABLE `master_mandor`
  ADD PRIMARY KEY (`id_mandor`);

--
-- Indexes for table `master_material`
--
ALTER TABLE `master_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_produk`
--
ALTER TABLE `master_produk`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `master_produk_kategori`
--
ALTER TABLE `master_produk_kategori`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `master_produk_unit`
--
ALTER TABLE `master_produk_unit`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `master_proyek`
--
ALTER TABLE `master_proyek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `master_proyek_kavling`
--
ALTER TABLE `master_proyek_kavling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyek_id` (`proyek_id`);

--
-- Indexes for table `master_supplier`
--
ALTER TABLE `master_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `material_keluar`
--
ALTER TABLE `material_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu_access`
--
ALTER TABLE `menu_access`
  ADD PRIMARY KEY (`id_access`);

--
-- Indexes for table `nota_material`
--
ALTER TABLE `nota_material`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `pak`
--
ALTER TABLE `pak`
  ADD PRIMARY KEY (`id_pak`);

--
-- Indexes for table `pemasukan_lain`
--
ALTER TABLE `pemasukan_lain`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `pembatalan_transaksi`
--
ALTER TABLE `pembatalan_transaksi`
  ADD PRIMARY KEY (`id_pembatalan`);

--
-- Indexes for table `pembebasan_lahan`
--
ALTER TABLE `pembebasan_lahan`
  ADD PRIMARY KEY (`id_pembebasan`);

--
-- Indexes for table `pengajuan_material`
--
ALTER TABLE `pengajuan_material`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `pengaturan_pesan`
--
ALTER TABLE `pengaturan_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran_lain`
--
ALTER TABLE `pengeluaran_lain`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `piutang_bank`
--
ALTER TABLE `piutang_bank`
  ADD PRIMARY KEY (`id_piutang`);

--
-- Indexes for table `progres_pembangunan`
--
ALTER TABLE `progres_pembangunan`
  ADD PRIMARY KEY (`id_progres`);

--
-- Indexes for table `rab_detail`
--
ALTER TABLE `rab_detail`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `rab_master`
--
ALTER TABLE `rab_master`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `rek_bank`
--
ALTER TABLE `rek_bank`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`);

--
-- Indexes for table `stok_in_out`
--
ALTER TABLE `stok_in_out`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `stok_tipe`
--
ALTER TABLE `stok_tipe`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `store_profile`
--
ALTER TABLE `store_profile`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `sub_kode`
--
ALTER TABLE `sub_kode`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `tanda_jadi_lokasi`
--
ALTER TABLE `tanda_jadi_lokasi`
  ADD PRIMARY KEY (`id_tjl`);

--
-- Indexes for table `tanda_jadi_lokasi_inhouse`
--
ALTER TABLE `tanda_jadi_lokasi_inhouse`
  ADD PRIMARY KEY (`id_tjl`);

--
-- Indexes for table `tbl_blok`
--
ALTER TABLE `tbl_blok`
  ADD PRIMARY KEY (`id_blok`),
  ADD UNIQUE KEY `id_blok` (`id_blok`);

--
-- Indexes for table `tbl_cluster`
--
ALTER TABLE `tbl_cluster`
  ADD PRIMARY KEY (`id_cluster`);

--
-- Indexes for table `tbl_kavling`
--
ALTER TABLE `tbl_kavling`
  ADD PRIMARY KEY (`id_kavling`);

--
-- Indexes for table `tbl_marketing`
--
ALTER TABLE `tbl_marketing`
  ADD PRIMARY KEY (`id_marketing`);

--
-- Indexes for table `tbl_max_material`
--
ALTER TABLE `tbl_max_material`
  ADD PRIMARY KEY (`id_max`);

--
-- Indexes for table `tbl_pasangan`
--
ALTER TABLE `tbl_pasangan`
  ADD PRIMARY KEY (`id_pasangan`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tbl_perumahan`
--
ALTER TABLE `tbl_perumahan`
  ADD PRIMARY KEY (`id_perumahan`);

--
-- Indexes for table `tbl_proyek_insidentil`
--
ALTER TABLE `tbl_proyek_insidentil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_proyek_lainnya`
--
ALTER TABLE `tbl_proyek_lainnya`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyek_id` (`proyek_id`);

--
-- Indexes for table `tbl_proyek_material`
--
ALTER TABLE `tbl_proyek_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyek_id` (`proyek_id`),
  ADD KEY `kavling_id` (`tipe_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `tbl_proyek_upah`
--
ALTER TABLE `tbl_proyek_upah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyek_id` (`proyek_id`),
  ADD KEY `kavling_id` (`tipe_id`);

--
-- Indexes for table `tbl_tipe`
--
ALTER TABLE `tbl_tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `tbl_transaksi_bank`
--
ALTER TABLE `tbl_transaksi_bank`
  ADD PRIMARY KEY (`id_transaksi_bank`);

--
-- Indexes for table `tbl_transaksi_inhouse`
--
ALTER TABLE `tbl_transaksi_inhouse`
  ADD PRIMARY KEY (`id_inhouse`);

--
-- Indexes for table `title_kode`
--
ALTER TABLE `title_kode`
  ADD PRIMARY KEY (`id_title`);

--
-- Indexes for table `uang_muka`
--
ALTER TABLE `uang_muka`
  ADD PRIMARY KEY (`id_um`);

--
-- Indexes for table `uang_muka_inhouse`
--
ALTER TABLE `uang_muka_inhouse`
  ADD PRIMARY KEY (`id_um`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_perumahan`
--
ALTER TABLE `access_perumahan`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `angsuran_bank`
--
ALTER TABLE `angsuran_bank`
  MODIFY `id_angsur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `approved_history`
--
ALTER TABLE `approved_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_cicil_kt`
--
ALTER TABLE `bank_cicil_kt`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_cicil_lain`
--
ALTER TABLE `bank_cicil_lain`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_cicil_pak`
--
ALTER TABLE `bank_cicil_pak`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_cicil_pb`
--
ALTER TABLE `bank_cicil_pb`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_cicil_rb`
--
ALTER TABLE `bank_cicil_rb`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_cicil_tj`
--
ALTER TABLE `bank_cicil_tj`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_cicil_tjl`
--
ALTER TABLE `bank_cicil_tjl`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_cicil_um`
--
ALTER TABLE `bank_cicil_um`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berkas_konsumen`
--
ALTER TABLE `berkas_konsumen`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bukti_spkb`
--
ALTER TABLE `bukti_spkb`
  MODIFY `id_bukti_spkb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bukti_spr`
--
ALTER TABLE `bukti_spr`
  MODIFY `id_bukti_spr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cicil_fee_marketing`
--
ALTER TABLE `cicil_fee_marketing`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cicil_insidentil`
--
ALTER TABLE `cicil_insidentil`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cicil_kas`
--
ALTER TABLE `cicil_kas`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cicil_material`
--
ALTER TABLE `cicil_material`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cicil_pembatalan`
--
ALTER TABLE `cicil_pembatalan`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cicil_pembebasan_lahan`
--
ALTER TABLE `cicil_pembebasan_lahan`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cicil_pengeluaran_lain`
--
ALTER TABLE `cicil_pengeluaran_lain`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cicil_progres`
--
ALTER TABLE `cicil_progres`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_group`
--
ALTER TABLE `db_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `db_module`
--
ALTER TABLE `db_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `db_status`
--
ALTER TABLE `db_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `db_user_history_login`
--
ALTER TABLE `db_user_history_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `harga_kesepakatan_inhouse`
--
ALTER TABLE `harga_kesepakatan_inhouse`
  MODIFY `id_kesepakatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inhouse_cicil_hk`
--
ALTER TABLE `inhouse_cicil_hk`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inhouse_cicil_kt`
--
ALTER TABLE `inhouse_cicil_kt`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inhouse_cicil_tj`
--
ALTER TABLE `inhouse_cicil_tj`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inhouse_cicil_tjl`
--
ALTER TABLE `inhouse_cicil_tjl`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inhouse_cicil_um`
--
ALTER TABLE `inhouse_cicil_um`
  MODIFY `id_cicil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kas_operasional`
--
ALTER TABLE `kas_operasional`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelebihan_tanah`
--
ALTER TABLE `kelebihan_tanah`
  MODIFY `id_kt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelebihan_tanah_inhouse`
--
ALTER TABLE `kelebihan_tanah_inhouse`
  MODIFY `id_kt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kode`
--
ALTER TABLE `kode`
  MODIFY `id_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lain_lain`
--
ALTER TABLE `lain_lain`
  MODIFY `id_lain` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_keuangan_kategori_induk`
--
ALTER TABLE `laporan_keuangan_kategori_induk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_keuangan_kategori_transaksi`
--
ALTER TABLE `laporan_keuangan_kategori_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_keuangan_tipe`
--
ALTER TABLE `laporan_keuangan_tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `list_pengajuan_material`
--
ALTER TABLE `list_pengajuan_material`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logistik_stok`
--
ALTER TABLE `logistik_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mandor_proyek`
--
ALTER TABLE `mandor_proyek`
  MODIFY `id_mandor_proyek` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_logistik`
--
ALTER TABLE `master_logistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1565;

--
-- AUTO_INCREMENT for table `master_logistik_detail`
--
ALTER TABLE `master_logistik_detail`
  MODIFY `id_logistik_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_logistik_keluar`
--
ALTER TABLE `master_logistik_keluar`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_logistik_masuk`
--
ALTER TABLE `master_logistik_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_mandor`
--
ALTER TABLE `master_mandor`
  MODIFY `id_mandor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_material`
--
ALTER TABLE `master_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_produk`
--
ALTER TABLE `master_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_produk_kategori`
--
ALTER TABLE `master_produk_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_produk_unit`
--
ALTER TABLE `master_produk_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_proyek`
--
ALTER TABLE `master_proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `master_proyek_kavling`
--
ALTER TABLE `master_proyek_kavling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_supplier`
--
ALTER TABLE `master_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_keluar`
--
ALTER TABLE `material_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `menu_access`
--
ALTER TABLE `menu_access`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `nota_material`
--
ALTER TABLE `nota_material`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pak`
--
ALTER TABLE `pak`
  MODIFY `id_pak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemasukan_lain`
--
ALTER TABLE `pemasukan_lain`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembatalan_transaksi`
--
ALTER TABLE `pembatalan_transaksi`
  MODIFY `id_pembatalan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembebasan_lahan`
--
ALTER TABLE `pembebasan_lahan`
  MODIFY `id_pembebasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_material`
--
ALTER TABLE `pengajuan_material`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaturan_pesan`
--
ALTER TABLE `pengaturan_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengeluaran_lain`
--
ALTER TABLE `pengeluaran_lain`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `piutang_bank`
--
ALTER TABLE `piutang_bank`
  MODIFY `id_piutang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progres_pembangunan`
--
ALTER TABLE `progres_pembangunan`
  MODIFY `id_progres` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rab_detail`
--
ALTER TABLE `rab_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rab_master`
--
ALTER TABLE `rab_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rek_bank`
--
ALTER TABLE `rek_bank`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stok_in_out`
--
ALTER TABLE `stok_in_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stok_tipe`
--
ALTER TABLE `stok_tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_profile`
--
ALTER TABLE `store_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_kode`
--
ALTER TABLE `sub_kode`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tanda_jadi_lokasi`
--
ALTER TABLE `tanda_jadi_lokasi`
  MODIFY `id_tjl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tanda_jadi_lokasi_inhouse`
--
ALTER TABLE `tanda_jadi_lokasi_inhouse`
  MODIFY `id_tjl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cluster`
--
ALTER TABLE `tbl_cluster`
  MODIFY `id_cluster` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kavling`
--
ALTER TABLE `tbl_kavling`
  MODIFY `id_kavling` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_marketing`
--
ALTER TABLE `tbl_marketing`
  MODIFY `id_marketing` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_max_material`
--
ALTER TABLE `tbl_max_material`
  MODIFY `id_max` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pasangan`
--
ALTER TABLE `tbl_pasangan`
  MODIFY `id_pasangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_perumahan`
--
ALTER TABLE `tbl_perumahan`
  MODIFY `id_perumahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_proyek_insidentil`
--
ALTER TABLE `tbl_proyek_insidentil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_proyek_lainnya`
--
ALTER TABLE `tbl_proyek_lainnya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_proyek_material`
--
ALTER TABLE `tbl_proyek_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_proyek_upah`
--
ALTER TABLE `tbl_proyek_upah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tipe`
--
ALTER TABLE `tbl_tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transaksi_bank`
--
ALTER TABLE `tbl_transaksi_bank`
  MODIFY `id_transaksi_bank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transaksi_inhouse`
--
ALTER TABLE `tbl_transaksi_inhouse`
  MODIFY `id_inhouse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title_kode`
--
ALTER TABLE `title_kode`
  MODIFY `id_title` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `uang_muka`
--
ALTER TABLE `uang_muka`
  MODIFY `id_um` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uang_muka_inhouse`
--
ALTER TABLE `uang_muka_inhouse`
  MODIFY `id_um` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_logistik_masuk`
--
ALTER TABLE `master_logistik_masuk`
  ADD CONSTRAINT `master_logistik_masuk_ibfk_1` FOREIGN KEY (`logistik_id`) REFERENCES `master_logistik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `master_proyek_kavling`
--
ALTER TABLE `master_proyek_kavling`
  ADD CONSTRAINT `master_proyek_kavling_ibfk_1` FOREIGN KEY (`proyek_id`) REFERENCES `master_proyek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_proyek_lainnya`
--
ALTER TABLE `tbl_proyek_lainnya`
  ADD CONSTRAINT `tbl_proyek_lainnya_ibfk_1` FOREIGN KEY (`proyek_id`) REFERENCES `master_proyek` (`id`);

--
-- Constraints for table `tbl_proyek_material`
--
ALTER TABLE `tbl_proyek_material`
  ADD CONSTRAINT `tbl_proyek_material_ibfk_1` FOREIGN KEY (`proyek_id`) REFERENCES `master_proyek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_proyek_upah`
--
ALTER TABLE `tbl_proyek_upah`
  ADD CONSTRAINT `tbl_proyek_upah_ibfk_1` FOREIGN KEY (`proyek_id`) REFERENCES `master_proyek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
