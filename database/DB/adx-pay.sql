-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Bulan Mei 2021 pada 12.54
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adx-pay`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `saldo`, `username`, `password`, `phone_number`, `email`, `created_at`, `updated_at`) VALUES
(3, 'Yoga', NULL, 'CUS623294770', '$2y$10$ppWc8V/Ojdk0sWFm3tAl2.OsRyKhQ1mcwURIDAJlcOYXP0rkP9LgW', '085847801933', 'yogade9595.yd@gmail.com', '2021-05-02 07:08:03', '2021-05-02 07:08:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_services`
--

CREATE TABLE `customer_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer_services`
--

INSERT INTO `customer_services` (`id`, `name`, `saldo`, `username`, `password`, `phone_number`, `email`, `created_at`, `updated_at`) VALUES
(22, 'dekga', NULL, 'CS1011204192', '$2y$10$ggxfENXANi9SFTRb4gT/F.KBQC2h.ZgLEU7P3ACdG.FLrhmRPIQci', '085847801933', 'yogade9595.yd@gmail.com', '2021-04-25 05:39:45', '2021-04-25 06:35:19'),
(29, 'asasa', NULL, 'CS587067496', '$2y$10$tMggpYaS1wm5AUqdY1Mgg.QKWOlPwWCSaaNWPfSdpPoyWIQ/rDMMe', '24523', 'yogade9595.yd@gmail.com', '2021-04-25 19:44:10', '2021-04-25 19:44:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_22_063233_create_customer_services_table', 1),
(2, '2021_03_22_063305_create_customers_table', 1),
(3, '2021_04_26_101019_create_mutations_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutations`
--

CREATE TABLE `mutations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idcust` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trxid_api` bigint(20) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mutations`
--

INSERT INTO `mutations` (`id`, `username`, `jenis_transaksi`, `code`, `phone`, `idcust`, `status`, `trxid_api`, `note`, `created_at`, `updated_at`) VALUES
(5, '', '', 'X25', '08174730064', NULL, '2', 202104281034895087, 'X25 08174730064 Sdh pernah, Status: SUKSES. pada @2021-04-28 07:38:28. SN: 21040426006440.', '2021-04-28 06:50:36', '2021-04-28 06:50:36'),
(6, '', '', 'X25', '08174730064', NULL, '2', 202104281885899061, 'X25 08174730064 Sdh pernah, Status: SUKSES. pada @2021-04-28 07:38:28. SN: 21040426006440.', '2021-04-28 06:51:59', '2021-04-28 06:51:59'),
(7, '', '', 'X25', '08174730064', NULL, '2', 20210428763482698, 'X25 08174730064 Sdh pernah, Status: SUKSES. pada @2021-04-28 07:38:28. SN: 21040426006440.', '2021-04-28 06:54:38', '2021-04-28 06:54:38'),
(8, '', '', 'X25', '08174730064', NULL, '2', 20210428707853220, 'X25 08174730064 Sdh pernah, Status: SUKSES. pada @2021-04-28 07:38:28. SN: 21040426006440.', '2021-04-28 14:29:52', '2021-04-28 14:29:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer_services`
--
ALTER TABLE `customer_services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mutations`
--
ALTER TABLE `mutations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `customer_services`
--
ALTER TABLE `customer_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mutations`
--
ALTER TABLE `mutations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
