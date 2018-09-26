-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2018 at 11:48 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kapalsampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `kapal`
--

CREATE TABLE `kapal` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hrm_me` int(5) NOT NULL,
  `hrm_ae` int(5) NOT NULL,
  `status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kapal`
--

INSERT INTO `kapal` (`id`, `name`, `hrm_me`, `hrm_ae`, `status`, `keterangan`) VALUES
(1, 'KM. SAPU-SAPU I', 14, 3, 'operational', NULL),
(2, 'KM LUMBA-LUMBA II', 14, 4, 'operational', 'mesin baik'),
(3, 'KM SAPU-SAPU II', 14, 3, 'operational', NULL),
(4, 'KM LELE', 14, 3, 'breakdown', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemakaian`
--

CREATE TABLE `pemakaian` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_permintaan` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` int(5) UNSIGNED NOT NULL,
  `selesai` int(5) UNSIGNED NOT NULL,
  `pakai_jam` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `bbm_me` int(4) UNSIGNED NOT NULL DEFAULT '0',
  `bbm_ae` int(4) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemakaian`
--

INSERT INTO `pemakaian` (`id`, `id_permintaan`, `tanggal`, `mulai`, `selesai`, `pakai_jam`, `bbm_me`, `bbm_ae`) VALUES
(1, 1, '2018-04-12', 2796, 2802, 6, 84, 18),
(2, 1, '2018-04-13', 2802, 2808, 6, 84, 18),
(3, 1, '2018-04-14', 2808, 2808, 0, 0, 0),
(4, 1, '2018-04-15', 2808, 2808, 0, 0, 0),
(5, 1, '2018-04-16', 2808, 2813, 5, 70, 15),
(6, 1, '2018-04-17', 2813, 2819, 6, 84, 18),
(7, 1, '2018-04-18', 2819, 2824, 5, 70, 15),
(8, 1, '2018-04-19', 2824, 2830, 6, 84, 18),
(9, 1, '2018-04-20', 2830, 2835, 5, 70, 15),
(10, 1, '2018-04-21', 2835, 2842, 7, 98, 21);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kapal` int(2) UNSIGNED NOT NULL,
  `juru_mudi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_isi` date NOT NULL,
  `v_permintaan` int(10) UNSIGNED NOT NULL,
  `v_awal` int(5) UNSIGNED NOT NULL DEFAULT '0',
  `vts` int(10) UNSIGNED NOT NULL,
  `v_me` int(5) UNSIGNED NOT NULL DEFAULT '0',
  `v_ae` int(5) UNSIGNED NOT NULL DEFAULT '0',
  `v_pemakaian` int(5) UNSIGNED DEFAULT '0',
  `v_sisa` int(5) UNSIGNED NOT NULL DEFAULT '0',
  `min_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id`, `id_kapal`, `juru_mudi`, `tanggal_isi`, `v_permintaan`, `v_awal`, `vts`, `v_me`, `v_ae`, `v_pemakaian`, `v_sisa`, `min_id`) VALUES
(1, 1, 'IRSAN JABIR', '2018-04-12', 1500, 1500, 0, 644, 138, 782, 718, 1),
(8, 3, 'hgnxg', '2018-09-01', 1200, 1200, 100, 0, 0, 0, 1200, 8),
(9, 1, 'irsan Jabir', '2018-05-16', 1500, 2300, 400, 0, 0, 0, 2300, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nip`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Haslan', '820100922', '$2y$10$GWworW6InQpcY97oFGTuFO8sM6y4G9tPorwMi390FUIthF/0l/3Da', 'CnLEslpZADEaSvBvTVt1EseMljCqxjBPvSuso1fniQcEGJRKmGe4YXh1EQvk', NULL, NULL),
(4, 'Irsan Jabir', '820100084', '$2y$10$nd0pBYqar10H8yieEl.2IuUq.4rmU2/jXqZv3TnozAVtkg.pS37Um', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemakaian`
--
ALTER TABLE `pemakaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_permintaan` (`id_permintaan`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kapal` (`id_kapal`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kapal`
--
ALTER TABLE `kapal`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemakaian`
--
ALTER TABLE `pemakaian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
