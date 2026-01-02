-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2025 at 04:21 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `absens`
--

CREATE TABLE `absens` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `mata_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `status` enum('hadir','izin','sakit','alpha') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hadir',
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absens`
--

INSERT INTO `absens` (`id`, `siswa_id`, `kelas_id`, `mata_pelajaran`, `date`, `status`, `time_in`, `time_out`, `created_by`, `created_at`, `updated_at`) VALUES
(12, 2, 1, NULL, '2025-12-22', 'hadir', NULL, NULL, NULL, '2025-12-26 21:08:43', '2025-12-26 21:08:43'),
(13, 3, 5, NULL, '2025-12-22', 'hadir', NULL, NULL, NULL, '2025-12-26 21:42:00', '2025-12-26 21:42:00'),
(14, 3, 5, NULL, '2025-12-23', 'hadir', NULL, NULL, NULL, '2025-12-26 21:42:00', '2025-12-26 21:42:00'),
(15, 3, 5, NULL, '2025-12-24', 'hadir', NULL, NULL, NULL, '2025-12-26 21:42:00', '2025-12-26 21:42:00'),
(16, 3, 5, NULL, '2025-12-25', 'hadir', NULL, NULL, NULL, '2025-12-26 21:42:00', '2025-12-26 21:42:00'),
(17, 2, 1, NULL, '2025-12-24', 'hadir', NULL, NULL, NULL, '2025-12-26 21:42:53', '2025-12-26 23:06:37'),
(18, 2, 1, NULL, '2025-12-25', 'hadir', NULL, NULL, NULL, '2025-12-26 21:42:53', '2025-12-26 22:56:14'),
(19, 2, 1, NULL, '2025-12-01', 'hadir', NULL, NULL, NULL, '2025-12-26 21:53:46', '2025-12-26 21:53:46'),
(20, 2, 1, NULL, '2025-12-02', 'hadir', NULL, NULL, NULL, '2025-12-26 21:53:46', '2025-12-26 21:53:46'),
(21, 2, 1, NULL, '2025-12-03', 'hadir', NULL, NULL, NULL, '2025-12-26 21:53:46', '2025-12-26 21:53:46'),
(22, 2, 1, NULL, '2025-12-04', 'hadir', NULL, NULL, NULL, '2025-12-26 21:53:46', '2025-12-26 21:53:46'),
(23, 2, 1, NULL, '2025-12-05', 'hadir', NULL, NULL, NULL, '2025-12-26 21:53:46', '2025-12-26 21:53:46'),
(24, 2, 1, NULL, '2025-12-08', 'hadir', NULL, NULL, NULL, '2025-12-26 21:54:03', '2025-12-26 21:54:03'),
(25, 2, 1, NULL, '2025-12-09', 'hadir', NULL, NULL, NULL, '2025-12-26 21:54:03', '2025-12-26 21:54:03'),
(26, 2, 1, NULL, '2025-12-10', 'hadir', NULL, NULL, NULL, '2025-12-26 21:54:03', '2025-12-26 21:54:03'),
(27, 2, 1, NULL, '2025-12-11', 'hadir', NULL, NULL, NULL, '2025-12-26 21:54:03', '2025-12-26 21:54:03'),
(28, 2, 1, NULL, '2025-12-12', 'hadir', NULL, NULL, NULL, '2025-12-26 21:54:03', '2025-12-26 21:54:03'),
(29, 2, 1, NULL, '2025-12-15', 'hadir', NULL, NULL, NULL, '2025-12-26 21:54:20', '2025-12-26 21:54:20'),
(30, 2, 1, NULL, '2025-12-16', 'hadir', NULL, NULL, NULL, '2025-12-26 21:54:20', '2025-12-26 21:54:20'),
(31, 2, 1, NULL, '2025-12-17', 'hadir', NULL, NULL, NULL, '2025-12-26 21:54:20', '2025-12-26 21:54:20'),
(32, 2, 1, NULL, '2025-12-18', 'hadir', NULL, NULL, NULL, '2025-12-26 21:54:20', '2025-12-26 21:54:20'),
(33, 2, 1, NULL, '2025-12-19', 'hadir', NULL, NULL, NULL, '2025-12-26 21:54:20', '2025-12-26 21:54:20'),
(34, 2, 1, NULL, '2025-12-29', 'izin', NULL, NULL, NULL, '2025-12-26 21:54:42', '2025-12-26 21:54:42'),
(35, 2, 1, NULL, '2025-12-30', 'hadir', NULL, NULL, NULL, '2025-12-26 21:54:42', '2025-12-26 21:54:42'),
(36, 2, 1, NULL, '2025-12-31', 'hadir', NULL, NULL, NULL, '2025-12-26 21:54:42', '2025-12-26 21:54:42'),
(37, 2, 1, NULL, '2026-01-01', 'hadir', NULL, NULL, NULL, '2025-12-26 21:54:42', '2025-12-26 21:54:42'),
(38, 2, 1, NULL, '2026-01-02', 'hadir', NULL, NULL, NULL, '2025-12-26 21:54:42', '2025-12-26 21:54:42'),
(39, 2, 1, NULL, '2025-12-23', 'hadir', NULL, NULL, NULL, '2025-12-26 21:57:37', '2025-12-26 23:06:37'),
(40, 2, 1, NULL, '2025-12-26', 'hadir', NULL, NULL, NULL, '2025-12-26 22:11:15', '2025-12-26 22:11:15'),
(46, 25, 1, NULL, '2025-12-29', 'hadir', NULL, NULL, NULL, '2025-12-29 07:01:53', '2025-12-29 07:01:53'),
(47, 25, 1, NULL, '2025-12-30', 'hadir', NULL, NULL, NULL, '2025-12-29 07:01:53', '2025-12-29 07:01:53'),
(48, 25, 1, NULL, '2025-12-31', 'sakit', NULL, NULL, NULL, '2025-12-29 07:01:53', '2025-12-29 07:01:53'),
(49, 25, 1, NULL, '2026-01-01', 'hadir', NULL, NULL, NULL, '2025-12-29 07:01:53', '2025-12-29 07:01:53'),
(50, 25, 1, NULL, '2026-01-02', 'izin', NULL, NULL, NULL, '2025-12-29 07:01:53', '2025-12-29 07:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('sdn-13-cache-adeliaresti@gmail.com|127.0.0.1', 'i:2;', 1762792258),
('sdn-13-cache-adeliaresti@gmail.com|127.0.0.1:timer', 'i:1762792258;', 1762792258);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru_dan_staff`
--

CREATE TABLE `guru_dan_staff` (
  `id` bigint UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_urut` int DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_karpeg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nuptk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pangkat_golongan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sk_nomor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sk_tanggal` date DEFAULT NULL,
  `sk_tmt` date DEFAULT NULL,
  `angka_kredit` decimal(10,3) DEFAULT NULL,
  `masa_kerja_tahun` int DEFAULT NULL,
  `masa_kerja_bulan` int DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmt_kgb_terakhir` date DEFAULT NULL,
  `sertifikasi` enum('Sudah','Belum') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmt_bertugas` date DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_dan_staff`
--

INSERT INTO `guru_dan_staff` (`id`, `foto`, `no_urut`, `nama`, `nip`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_karpeg`, `nuptk`, `npwp`, `pangkat_golongan`, `sk_nomor`, `sk_tanggal`, `sk_tmt`, `angka_kredit`, `masa_kerja_tahun`, `masa_kerja_bulan`, `jabatan`, `pendidikan_terakhir`, `tmt_kgb_terakhir`, `sertifikasi`, `ket`, `tmt_bertugas`, `alamat`, `created_at`, `updated_at`) VALUES
(1, '1766308886_kepsek.jpg', NULL, 'Devina Heriyanti, S.Pd.GSD', '12343423541', 'Padang lawas', '2025-10-16', 'P', 'L.24324', '1232423543564565', '56659259846', 'Peembina', '823.4', '2025-10-28', NULL, '267.508', 2025, 2, 'Kepala Sekolah', 'S1', '2025-10-28', 'Belum', 'dfddfg', '2025-10-28', 'Batang Anai', '2025-10-28 00:31:36', '2025-12-21 02:21:26'),
(2, '1763443086_a.png', NULL, 'AINULFIA,S.Pd', '197611281999122002', 'Simpang Kurai Taji', '1976-11-28', 'P', 'J.107409', '1460754656300023', '482390234201000', 'Pembina Tk.I / IV.b', '823.4/4220/BKD-2022', '2022-09-05', '2024-10-01', '563.644', 20, 10, 'Guru', 'S1', '2023-12-01', 'Sudah', 'ss', '2024-10-01', 'Simpang Kurai Taji', '2025-11-03 23:09:30', '2025-11-17 22:18:06'),
(4, '1763443108_Screenshot 2025-11-05 151420.png', NULL, 'NETY WARTINI,S.Pd.', '197608072003122003', 'Galoro, 07-08-1976', '1976-08-07', 'P', 'L.227585', '7139754656300020', '482390325201000', 'Pembina / IV.a', '823.4/5420/BKD-2024', '2024-11-25', '2024-12-01', '253.895', 19, 0, 'Guru', 'S1 PGSD', NULL, 'Sudah', 'akan pensuin pada  Agustus 2036', '2023-12-10', 'Punggung Lading', '2025-11-05 00:59:00', '2025-12-05 22:00:41'),
(6, '1766304281_Agustina.jpg', NULL, 'GUSNIARTI', '197611281999112342', 'Pariaman', NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guru', 'S1', NULL, NULL, NULL, NULL, NULL, '2025-12-21 00:48:13', '2025-12-27 04:09:39'),
(8, '1766834277_nelvi.jpg', NULL, 'NELVIANI, S.PdI', '198912212022212009', 'Kasik Puti', '1989-12-01', 'P', 'L.24365', NULL, NULL, 'Ahli Pertama / IX', NULL, NULL, NULL, NULL, NULL, NULL, 'Guru', NULL, NULL, 'Sudah', NULL, NULL, 'Pariaman Timur', '2025-12-27 04:17:57', '2025-12-27 04:17:57'),
(9, NULL, NULL, 'NE, S.PdI', '198912212022212', 'Kasik Puti', '1989-12-01', 'P', 'L.24365', NULL, NULL, 'Ahli Pertama / IX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-29 00:35:07', '2025-12-29 00:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `gambar_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `tanggal_kegiatan`, `gambar_kegiatan`, `deskripsi`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'Festival Malingka Carano Jo Arai Pinang Ke III', '2025-10-16', 'kegiatan/yNaU44HvnTjPqYr2rKKDlKvF3U0pHfXr3dxiEouo.jpg', 'Dilaksanakan acara Festival Malingka Carano Jo Arai Pinang Ke III yang diikuti oleh 81 peserta hebat se Sumatera Barat. Sekolah kami ikut serta dalam kegiatan tersebut dan di wakili oleh  Maudyratul Rahman Aftani murid kls 6, serta di dampingi oleh bu Mulya Nisma Apapun  hasilnya Terima Kasih nak, atas penampilan terbaik  versimu', '2025-10-27 09:56:12', '2025-11-10 09:38:47', 'Resti Adelia'),
(3, 'Lomba Bahasa Ibuu', '2025-11-12', 'kegiatan/Zi1srmHueHhBwsSfiuBFOvQ14FGuHKWM1sOo7MSV.jpg', 'Pada kegiatan ini peserta didik dapat :1. Bercerita dengan menggunakan bahasa daerah dan dengan gayanya sendiri. 2: Berpidato dengan menggunakan bahasa daerahnya.3.membuat pantun dan membacakan pantun dengan bahasa dan daerah dengan dialek yang benar.4. Badendang sesuai bahasa daerahnya.', '2025-11-10 09:40:59', '2025-12-05 23:27:49', 'Resti Adelia'),
(4, 'Goro Besama', '2025-12-17', 'kegiatan/MnRzQSXeC5KkVYPOi97eHiZ2X7L6XsGSF87latSp.jpg', 'seluruh siswa sdn 13', '2025-12-29 00:41:09', '2025-12-29 00:41:32', 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajar` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guru_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mata_pelajaran` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `tahun_ajar`, `guru_id`, `created_at`, `updated_at`, `mata_pelajaran`) VALUES
(1, 'Kelas 1', '2025/2026', 4, '2025-11-05 01:08:50', '2025-12-05 21:54:50', '[\"Matematika\", \"Seni Budaya\", \"Bahasa Indonesia\", \"Bahasa Inggris \", \"Olahraga\", \"PKN\", \"Agama\", \"BAM\"]'),
(2, 'Kelas 2', '2025/2026', 6, '2025-11-05 01:09:09', '2025-12-21 01:09:36', '[\"Matematika\", \"Seni Budaya\", \"Bahasa Indonesia\", \"Bahasa Inggris \", \"Olahraga\", \"PKN\", \"Agama\", \"BAM\"]'),
(3, 'Kelas 3', '2025/2026', 1, '2025-12-05 21:53:54', '2025-12-05 21:53:54', '[\"Matematika\", \"Seni Budaya\", \"Bahasa Indonesia\", \"Bahasa Inggris \", \"Olahraga\", \"PKN\", \"Agama\", \"BAM\"]'),
(4, 'Kelas 4', '2025/2026', 4, '2025-11-09 22:24:01', '2025-12-06 00:22:35', '[\"Matematika\", \"Seni Budaya\", \"Bahasa Indonesia\", \"Bahasa Inggris \", \"Olahraga\", \"PKN\", \"Agama\"]'),
(5, 'Kelas 5', '2025/2026', 2, '2025-11-05 01:09:27', '2025-11-05 01:09:27', '[\"Matematika\", \"Seni Budaya\", \"Bahasa Indonesia\", \"Bahasa Inggris \", \"Olahraga\", \"PKN\", \"Agama\", \"BAM\"]'),
(6, 'Kelas 1A', '2025/2026', 9, '2025-12-29 00:38:33', '2025-12-29 00:38:33', '[\"Matematika\", \"Penjas\"]');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_03_135536_create_visi_misi_table', 2),
(5, '2025_10_27_153842_create_kegiatan_table', 3),
(6, '2025_10_14_043646_create_guru_dan_staff_table', 4),
(7, '2025_10_09_153126_add_alamat_telepon_to_users_table', 5),
(8, '2025_11_03_082956_create_kelas_table', 6),
(9, '2025_11_05_032409_add_tahun_ajar_to_kelas_table', 7),
(11, '2025_11_05_042317_create_siswa_table', 8),
(12, '2025_11_10_150913_add_updated_by_to_kegiatan_table', 9),
(13, '2025_11_27_072942_create_mou_table', 10),
(14, '2025_12_06_040319_add_mata_pelajaran_to_kelas_table', 11),
(15, '2025_12_06_064408_create_table', 12),
(16, '2025_12_19_124246_create_contacts_table', 13),
(17, '2025_12_17_125504_add_role_kelas_to_users_table', 14),
(18, '2025_12_23_042405_create_absens_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `mou`
--

CREATE TABLE `mou` (
  `id` bigint UNSIGNED NOT NULL,
  `judul_mou` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kerjasama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `jangka_waktu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aktif','Akan Berakhir','Tidak Aktif','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mou`
--

INSERT INTO `mou` (`id`, `judul_mou`, `jenis_kerjasama`, `nama_instansi`, `tanggal_mulai`, `tanggal_berakhir`, `jangka_waktu`, `status`, `file`, `created_at`, `updated_at`) VALUES
(2, 'Peningkatan Kesehatan Siswa', 'Kesehatann', 'Puskesmas Air Santok', '2023-01-01', '2026-01-01', '3 Tahun', 'Aktif', 'mou/462o6zVpES6niibzaIB2oncL6R3mv22lmoo1kZg0.pdf', '2025-11-27 01:08:30', '2025-12-05 23:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$12$ouLI8VDaOiZN5KSzk3Te9euzsk36y4NZHxFXcXYjBwa2SzXQwpX4K', '2025-12-20 22:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('TLOd9IRBFlZNsaPPL0l23tafv6TqHCSapNjQHQqI', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNDh3NFRrUDJ5dGVuMTk1U01ua3l3VEhpMnZhRzBJWkQ3bU8zTXVUZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1767017754),
('wfFiXrRn1bxI6z77yQkQlHVTkwHzurehhUJqs2ST', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNkw3ZllybHlGRXNMaXZMQlNUSnUzTTVxMlh2RDZqZE9QY2ZCTjZXNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1767017703);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nipd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `orangtua_perempuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orangtua_laki_laki` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `tahun_ajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama_siswa`, `nipd`, `nisn`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `orangtua_perempuan`, `orangtua_laki_laki`, `alamat`, `kelas_id`, `tahun_ajar`, `created_at`, `updated_at`) VALUES
(2, 'Adnan Syarif', '1334', '2434', 'Laki-laki', 'Padang', '2025-12-26', 'Era Rekma Yenti', 'Abdulrahman', NULL, 1, '2025/2026', '2025-12-26 02:19:32', '2025-12-29 06:31:04'),
(3, 'Yudha Pratama', '23892', '827842', 'Laki-laki', 'Padang', '2025-12-26', NULL, 'we', NULL, 5, '2025/2026', '2025-12-26 02:38:43', '2025-12-26 22:21:15'),
(4, 'Faran Hidayat', '569', '018043408', 'Laki-laki', 'Pariaman', '2007-01-12', NULL, NULL, NULL, 4, '2025/2026', '2025-12-26 22:24:16', '2025-12-26 22:24:16'),
(24, 'Radit Alhadi', '23237', '13440001', 'Laki-laki', 'Pariaman', '2014-02-11', NULL, NULL, NULL, 1, '2025/2026', '2025-12-27 05:29:45', '2025-12-26 22:33:34'),
(25, 'Maudy Ratulrahman Afani', '101', '01000001', 'Perempuan', 'Pariaman', '2014-02-11', NULL, NULL, NULL, 1, '2025/2026', '2025-12-27 05:33:02', '2025-12-27 05:33:02'),
(26, 'Rizky Ramadhan', '102', '01000002', 'Laki-laki', 'Padang', '2014-03-05', NULL, NULL, NULL, 2, '2025/2026', '2025-12-27 05:33:02', '2025-12-27 05:33:02'),
(27, 'Aisyah Putri Nabila', '103', '30000001', 'Perempuan', 'Bukittinggi', '2014-01-22', NULL, NULL, NULL, 3, '2025/2026', '2025-12-27 05:33:02', '2025-12-27 05:33:02'),
(28, 'Muhammad Farhan', '104', '30000002', 'Laki-laki', 'Solok', '2014-04-14', NULL, NULL, NULL, 4, '2025/2026', '2025-12-27 05:33:02', '2025-12-27 05:33:02'),
(29, 'Nabila Safitri', '105', '31000001', 'Perempuan', 'Payakumbuh', '2014-05-09', NULL, NULL, NULL, 5, '2025/2026', '2025-12-27 05:33:02', '2025-12-27 05:33:02'),
(31, 'Salsabila Azzahra', '107', '01000003', 'Perempuan', 'Sawahlunto', '2014-07-03', NULL, NULL, NULL, 1, '2025/2026', '2025-12-27 05:33:02', '2025-12-27 05:33:02'),
(33, 'Dinda Maharani', '109', '31000003', 'Perempuan', 'Agam', '2014-09-12', NULL, NULL, NULL, 3, '2025/2026', '2025-12-27 05:33:02', '2025-12-27 05:33:02'),
(34, 'Ilham Pratama', '110', '01000004', 'Laki-laki', 'Tanah Datar', '2014-10-30', NULL, NULL, NULL, 4, '2025/2026', '2025-12-27 05:33:02', '2025-12-27 05:33:02'),
(36, 'Hanum', '12342', '9236764', 'Perempuan', 'Padang', '2011-02-01', NULL, NULL, NULL, 4, '2025/2026', '2025-12-29 06:30:28', '2025-12-29 06:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `mata_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` datetime NOT NULL,
  `file_lampiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `judul`, `deskripsi`, `kelas_id`, `mata_pelajaran`, `deadline`, `file_lampiran`, `created_at`, `updated_at`) VALUES
(2, 'Tugas Seni Budaya', 'Menggambar pemandangan alam', 2, 'Seni Budaya', '2026-01-11 23:59:00', NULL, '2025-12-27 05:43:40', '2025-12-27 05:43:40'),
(3, 'Tugas Bahasa Indonesia', 'Membuat ringkasan cerita pendek', 3, 'Bahasa Indonesia', '2026-01-12 23:59:00', NULL, '2025-12-27 05:43:40', '2025-12-27 05:43:40'),
(4, 'Tugas Bahasa Inggris', 'Menyusun perkenalan diri sederhana', 4, 'Bahasa Inggris', '2026-01-13 23:59:00', NULL, '2025-12-27 05:43:40', '2025-12-27 05:43:40'),
(5, 'Tugas Olahraga', 'Mencatat aktivitas olahraga harian', 5, 'Olahraga', '2026-01-14 23:59:00', NULL, '2025-12-27 05:43:40', '2025-12-27 05:43:40'),
(7, 'Tugas Agama', 'Meringkas materi ibadah harian', 1, 'Agama', '2026-01-16 23:59:00', NULL, '2025-12-27 05:43:40', '2025-12-27 05:43:40'),
(8, 'Tugas BAM', 'Menulis kosakata dasar BAM', 2, 'BAM', '2026-01-17 23:59:00', NULL, '2025-12-27 05:43:40', '2025-12-27 05:43:40'),
(9, 'Latihan Matematika', 'Latihan soal perkalian sederhana', 3, 'Matematika', '2026-01-18 23:59:00', NULL, '2025-12-27 05:43:40', '2025-12-27 05:43:40'),
(10, 'Praktik Seni Budaya', 'Membuat kerajinan dari kertas', 4, 'Seni Budaya', '2026-01-19 23:59:00', NULL, '2025-12-27 05:43:40', '2025-12-27 05:43:40'),
(11, 'Bahasa Indonesia Lanjutan', 'Menulis pengalaman pribadi', 5, 'Bahasa Indonesia', '2026-01-20 23:59:00', NULL, '2025-12-27 05:43:40', '2025-12-27 05:43:40'),
(13, 'Olahraga Mandiri', 'Melakukan senam pagi selama 5 hari', 1, 'Olahraga', '2026-01-22 23:59:00', NULL, '2025-12-27 05:43:40', '2025-12-27 05:43:40'),
(14, 'PKN Lanjutan', 'Menjelaskan hak dan kewajiban siswa', 2, 'PKN', '2026-01-23 23:59:00', NULL, '2025-12-27 05:43:40', '2025-12-27 05:43:40'),
(15, 'Agama Harian', 'Mencatat kegiatan ibadah harian', 3, 'Agama', '2026-01-24 23:59:00', NULL, '2025-12-27 05:43:40', '2025-12-27 05:43:40'),
(16, 'BAM Percakapan', 'Latihan percakapan sederhana', 4, 'BAM', '2026-01-25 23:59:00', NULL, '2025-12-27 05:43:40', '2025-12-27 05:43:40'),
(17, 'Buku halamn 100', 'kerjakan pada buku dengan baik', 1, 'PKN', '2026-01-10 00:00:00', 'lampiran_tugas/vMZcuP2C63TRsjBtlkahvIjiEW5Pp8wlUtluYkMo.jpg', '2025-12-29 07:12:41', '2025-12-29 07:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'orangtua',
  `kelas_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `kelas_id`, `remember_token`, `created_at`, `updated_at`, `alamat`, `telepon`, `profile_photo_path`) VALUES
(1, 'Operator', 'sdnsiska13@gmail.com', NULL, '$2y$12$NJK.7UkpoHSKBRbDonJ1FO4e970kaFUlTQMun8qZXGPQKPcD94Qti', 'admin', NULL, 'mqXMebPDgTVZHqNDI0homA6h3x5PAJ8EI4OAGpRVAOgcp8ihofABvJejx477', '2025-12-22 21:55:09', '2025-12-29 00:31:41', 'Pariaman', '+6282384617816', 'profile_photos/yRw2tcx6Olx61lhQbubnm9xPBSqWAqxjRC1vZr8r.jpg'),
(2, 'Orang Tua Kelas 1', 'ortu_kelas1@sekolah.id', NULL, '$2y$12$98KdN4xaq6hu/8bSz2yRhOBCB.TfgLUjKng51At0snw7e3c.awsoi', 'orangtua', 1, NULL, '2025-12-22 22:08:09', '2025-12-22 22:12:04', NULL, NULL, NULL),
(3, 'Orang Tua Kelas 2', 'ortu_kelas2@sekolah.id', NULL, '$2y$12$bQ/BOPA1SzzN5oEtr4BwUevGGDVvzVT4UnkJeaig2alS41ddQpXtu', 'orangtua', 2, NULL, '2025-12-22 22:08:09', '2025-12-22 22:12:05', NULL, NULL, NULL),
(4, 'Orang Tua Kelas 3', 'ortu_kelas3@sekolah.id', NULL, '$2y$12$9.bazexp52qirFRfccz76.Sq4ODvsxiT2sS7fnip6/ac8Gt5QWIuW', 'orangtua', 3, NULL, '2025-12-22 22:11:04', '2025-12-22 22:12:05', NULL, NULL, NULL),
(5, 'Orang Tua Kelas 4', 'ortu_kelas4@sekolah.id', NULL, '$2y$12$P9VvR198chFUmUvBIc9oVu5qQD/vhb6hJWtFasovW1ys.xYstDl4O', 'orangtua', 4, NULL, '2025-12-22 22:11:05', '2025-12-22 22:12:05', NULL, NULL, NULL),
(6, 'Orang Tua Kelas 5', 'ortu_kelas5@sekolah.id', NULL, '$2y$12$0uBhbnBc03qP1H4L1.S/0OQRWWM1M/HDNFJS4FM0c2xecQ.epu8da', 'orangtua', 5, NULL, '2025-12-22 22:11:05', '2025-12-22 22:12:06', NULL, NULL, NULL),
(7, 'Orang Tua Kelas 6', 'ortu_kelas6@sekolah.id', NULL, '$2y$12$NnSmuCI1ktfw9JuWDtjAH.twI4WNXaHMyO0xIJVyiiX6GLx/46pJe', 'orangtua', NULL, NULL, '2025-12-22 22:12:07', '2025-12-22 22:12:07', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci,
  `misi` text COLLATE utf8mb4_unicode_ci,
  `akreditasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `nama_sekolah`, `visi`, `misi`, `akreditasi`, `created_at`, `updated_at`) VALUES
(2, 'SDN 13  Kampung Kandang', 'Terwujudnya Generasi Beriman dan Bertaqwa, Berprestasi, Kreatif, Melestarikan Budaya, Peduli Lingkungan serta Mencerminkan Profile Pelajar Pancasila.', 'Menanamkan Nilai nilai Religius dan Berakhlak Mulia.\nMeningkatkan Kualitas Pembelajaran untuk Prestasi Akadmik dan Non Akademik.\nMendorong Kreatvitas dan Berfikir Kritis.\nMenumbuhkna Semangat Nasionalisme dan Cinta Tanah Air.\nMembangun Kemandirian dan Tanggung Jawab\nMengembangkan Keterampilan Sosial dan Kerjasama\nMengembngkan Wawasan Global dan Litersi Teknologi', 'A', '2025-10-03 13:21:46', '2025-10-03 14:49:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `absens_siswa_id_date_mata_pelajaran_unique` (`siswa_id`,`date`,`mata_pelajaran`),
  ADD KEY `absens_kelas_id_foreign` (`kelas_id`),
  ADD KEY `absens_created_by_foreign` (`created_by`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru_dan_staff`
--
ALTER TABLE `guru_dan_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_guru_id_foreign` (`guru_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mou`
--
ALTER TABLE `mou`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nipd_unique` (`nipd`),
  ADD UNIQUE KEY `siswa_nisn_unique` (`nisn`),
  ADD KEY `siswa_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absens`
--
ALTER TABLE `absens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru_dan_staff`
--
ALTER TABLE `guru_dan_staff`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mou`
--
ALTER TABLE `mou`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absens`
--
ALTER TABLE `absens`
  ADD CONSTRAINT `absens_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `absens_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absens_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru_dan_staff` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
