-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Okt 2021 pada 14.50
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dompet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet`
--

CREATE TABLE `dompet` (
  `dompet_id` bigint(12) UNSIGNED NOT NULL,
  `dompet_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dompet_reference` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dompet_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dompet_status_id` int(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dompet`
--

INSERT INTO `dompet` (`dompet_id`, `dompet_name`, `dompet_reference`, `dompet_description`, `dompet_status_id`, `created_at`, `updated_at`) VALUES
(1, 'Dompet Utama', '5270072502', 'Bank BCA', 1, '2021-10-27 05:05:06', '2021-10-27 05:05:06'),
(2, 'Dompet Tagihan', '5270072503', 'Bank BCA', 1, '2021-10-27 05:05:36', '2021-10-27 05:05:36'),
(3, 'Dompet Cadangan', '5270072504', 'Bank Permata', 1, '2021-10-27 05:06:09', '2021-10-27 09:57:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet_status`
--

CREATE TABLE `dompet_status` (
  `status_id` bigint(12) UNSIGNED NOT NULL,
  `status_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dompet_status`
--

INSERT INTO `dompet_status` (`status_id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Aktif', '2021-10-27 11:53:17', '2021-10-27 11:53:17'),
(2, 'Tidak Aktif', '2021-10-27 11:53:17', '2021-10-27 11:53:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `cat_id` bigint(12) UNSIGNED NOT NULL,
  `cat_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_status_id` int(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`cat_id`, `cat_name`, `cat_description`, `cat_status_id`, `created_at`, `updated_at`) VALUES
(1, 'Pengeluaran', 'Kategori untuk pengeluaran', 1, '2021-10-27 11:29:18', '2021-10-27 11:46:27'),
(2, 'Pemasukan', 'Kategori untuk pemasukan', 1, '2021-10-27 11:34:01', '2021-10-27 11:34:01'),
(3, 'Lain-Lain', 'Kategori lain-lainnya', 1, '2021-10-27 11:35:09', '2021-10-27 11:35:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_status`
--

CREATE TABLE `kategori_status` (
  `status_id` bigint(12) UNSIGNED NOT NULL,
  `status_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_status`
--

INSERT INTO `kategori_status` (`status_id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Aktif', '2021-10-27 18:17:35', '2021-10-27 18:18:35'),
(2, 'Tidak Aktif', '2021-10-27 18:19:35', '2021-10-27 18:20:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `trx_id` bigint(12) UNSIGNED NOT NULL,
  `trx_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_value` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dompet_id` int(12) NOT NULL,
  `cat_id` int(12) NOT NULL,
  `trx_status_id` int(12) NOT NULL,
  `trx_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`trx_id`, `trx_code`, `trx_description`, `trx_value`, `dompet_id`, `cat_id`, `trx_status_id`, `trx_date`, `created_at`, `updated_at`) VALUES
(1, 'WIN00000001', 'Saldo awal', '100000', 3, 2, 1, '2021-10-28', '2021-10-27 22:19:52', '2021-10-27 22:19:52'),
(2, 'WIN00000002', 'Gaji bulan januari', '3500000', 1, 2, 1, '2021-10-28', '2021-10-27 22:20:16', '2021-10-27 22:20:16'),
(3, 'WOUT00000001', 'Bayar dokter', '50000', 3, 1, 1, '2021-10-28', '2021-10-27 22:20:54', '2021-10-27 22:20:54'),
(4, 'WOUT00000002', 'Bayar kos', '500000', 1, 1, 1, '2021-10-28', '2021-10-27 22:21:40', '2021-10-27 22:21:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_status`
--

CREATE TABLE `transaksi_status` (
  `status_id` bigint(12) UNSIGNED NOT NULL,
  `status_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_status`
--

INSERT INTO `transaksi_status` (`status_id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Aktif', '2021-10-27 18:17:35', '2021-10-27 18:18:35'),
(2, 'Tidak Aktif', '2021-10-27 18:19:35', '2021-10-27 18:20:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` bigint(12) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_email_verified` tinyint(1) DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` int(10) DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_level` enum('member','administrator') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `user_status` enum('active','pending','suspend') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_online` enum('offline','online') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'offline',
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullname`, `bio`, `about`, `password`, `remember_token`, `email`, `email_token`, `is_email_verified`, `email_verified_at`, `phone_number`, `home_address`, `city`, `zip_code`, `country`, `user_image`, `user_level`, `user_status`, `user_online`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Daniels Trysyahputra', 'Saya sebagai developer website', 'Saya emang ganteng sekali', '$2y$10$Ec3folxeRRZ220SyCF6Q.eptg98BrcWBisCqTDKZ/mI51RkGQnKCK', 'PgoKLpMv1vP1RG2uHCHzCtYKWiACczCKZ0dYfMkfB7eWOdXVzFkUUsJlB6Gq', 'danielstputra@gmail.com', NULL, 1, '2021-09-10 03:29:00', '085859366229', 'Jl. Anggur, No.3, Lemahmekar, Kec. Indramayu, Kabupaten Indramayu, Jawa Barat 45212\n', 'Indramayu', 45212, 'Indonesia', 'default.png', 'administrator', 'active', 'offline', NULL, '2021-09-10 03:24:34', '2021-10-26 21:00:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dompet`
--
ALTER TABLE `dompet`
  ADD PRIMARY KEY (`dompet_id`);

--
-- Indeks untuk tabel `dompet_status`
--
ALTER TABLE `dompet_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indeks untuk tabel `kategori_status`
--
ALTER TABLE `kategori_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`trx_id`);

--
-- Indeks untuk tabel `transaksi_status`
--
ALTER TABLE `transaksi_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dompet`
--
ALTER TABLE `dompet`
  MODIFY `dompet_id` bigint(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dompet_status`
--
ALTER TABLE `dompet_status`
  MODIFY `status_id` bigint(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `cat_id` bigint(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_status`
--
ALTER TABLE `kategori_status`
  MODIFY `status_id` bigint(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `trx_id` bigint(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi_status`
--
ALTER TABLE `transaksi_status`
  MODIFY `status_id` bigint(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
