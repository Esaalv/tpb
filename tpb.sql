-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk tpb
CREATE DATABASE IF NOT EXISTS `tpb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tpb`;

-- membuang struktur untuk table tpb.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_nip_unique` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tpb.admins: ~0 rows (lebih kurang)
REPLACE INTO `admins` (`id`, `name`, `username`, `nip`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin1', '123456789', '$2y$10$aMojogyVXXWIGXKcjKZYQOkQ/7iiullNLcjG91214d7V8dJKssXhm', '2025-03-02 13:41:35', '2025-03-02 13:41:35');

-- membuang struktur untuk table tpb.barangs
CREATE TABLE IF NOT EXISTS `barangs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint unsigned NOT NULL,
  `satuan_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `barangs_kategori_id_foreign` (`kategori_id`),
  KEY `barangs_satuan_id_foreign` (`satuan_id`),
  CONSTRAINT `barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`),
  CONSTRAINT `barangs_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tpb.barangs: ~7 rows (lebih kurang)
REPLACE INTO `barangs` (`id`, `foto`, `nama_barang`, `kategori_id`, `satuan_id`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Mikroskop', 1, 1, '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(2, NULL, 'Laptop', 2, 1, '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(3, NULL, 'Bola Basket', 3, 2, '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(4, NULL, 'Proyektor', 2, 1, '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(5, NULL, 'Whiteboard Marker', 7, 3, '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(6, NULL, 'Gitar Akustik', 6, 1, '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(7, NULL, 'Meja Lipat', 8, 1, '2025-03-02 13:41:35', '2025-03-02 13:41:35');

-- membuang struktur untuk table tpb.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tpb.failed_jobs: ~0 rows (lebih kurang)

-- membuang struktur untuk table tpb.kategoris
CREATE TABLE IF NOT EXISTS `kategoris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tpb.kategoris: ~8 rows (lebih kurang)
REPLACE INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
	(1, 'Peralatan Laboratorium', '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(2, 'Peralatan Elektronik', '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(3, 'Peralatan Olahraga', '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(4, 'Buku dan Modul', '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(5, 'Peralatan Kebersihan', '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(6, 'Peralatan Seni dan Musik', '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(7, 'Alat Tulis Kantor', '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(8, 'Peralatan Acara dan Seminar', '2025-03-02 13:41:35', '2025-03-02 13:41:35');

-- membuang struktur untuk table tpb.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tpb.migrations: ~0 rows (lebih kurang)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2025_02_09_100136_create_admins_table', 1),
	(6, '2025_02_09_100329_create_ormawas_table', 1),
	(7, '2025_02_17_233622_create_kategoris_table', 1),
	(8, '2025_02_17_233627_create_satuans_table', 1),
	(9, '2025_02_18_215814_create_barangs_table', 1),
	(10, '2025_03_02_200746_create_stocks_table', 1);

-- membuang struktur untuk table tpb.ormawas
CREATE TABLE IF NOT EXISTS `ormawas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organisasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ormawas_nim_unique` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tpb.ormawas: ~0 rows (lebih kurang)
REPLACE INTO `ormawas` (`id`, `name`, `nim`, `organisasi`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'Bima Ryan Alfarizi', '2205036', 'Himatif', '$2y$10$kZvOW6tGAE7/iuenFnpq6uPB49tM.r5COC5a3j5v3yBbNzSCqmYqO', '2025-03-02 13:41:35', '2025-03-02 13:41:35');

-- membuang struktur untuk table tpb.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tpb.password_reset_tokens: ~0 rows (lebih kurang)

-- membuang struktur untuk table tpb.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tpb.personal_access_tokens: ~0 rows (lebih kurang)

-- membuang struktur untuk table tpb.satuans
CREATE TABLE IF NOT EXISTS `satuans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tpb.satuans: ~6 rows (lebih kurang)
REPLACE INTO `satuans` (`id`, `nama_satuan`, `created_at`, `updated_at`) VALUES
	(1, 'Unit', '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(2, 'Set', '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(3, 'Buah', '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(4, 'Lembar', '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(5, 'Paket', '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(6, 'Dus', '2025-03-02 13:41:35', '2025-03-02 13:41:35');

-- membuang struktur untuk table tpb.stocks
CREATE TABLE IF NOT EXISTS `stocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stocks_barang_id_foreign` (`barang_id`),
  CONSTRAINT `stocks_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tpb.stocks: ~7 rows (lebih kurang)
REPLACE INTO `stocks` (`id`, `stock`, `barang_id`, `created_at`, `updated_at`) VALUES
	(1, '10', 1, '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(2, '5', 2, '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(3, '15', 3, '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(4, '8', 4, '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(5, '20', 5, '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(6, '3', 6, '2025-03-02 13:41:35', '2025-03-02 13:41:35'),
	(7, '7', 7, '2025-03-02 13:41:35', '2025-03-02 13:41:35');

-- membuang struktur untuk table tpb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tpb.users: ~0 rows (lebih kurang)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
