-- Adminer 4.8.1 MySQL 10.4.28-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `finalkoreksi`;
CREATE DATABASE `finalkoreksi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `finalkoreksi`;

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `IdBarang` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NamaBarang` varchar(255) NOT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `Satuan` varchar(255) NOT NULL,
  `IdPengguna` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdBarang`),
  KEY `barang_idpengguna_foreign` (`IdPengguna`),
  CONSTRAINT `barang_idpengguna_foreign` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `barang` (`IdBarang`, `NamaBarang`, `Keterangan`, `Satuan`, `IdPengguna`, `created_at`, `updated_at`) VALUES
(2,	'Ikan',	'Ini Ikan',	'12000',	2,	'2023-10-22 03:27:15',	'2023-10-22 03:27:15'),
(3,	'Bakso',	'Ini Bakso',	'20000',	2,	'2023-10-22 05:55:17',	'2023-10-22 05:55:17'),
(4,	'Ayam',	'Ini ayam',	'35000',	2,	'2023-10-22 05:55:30',	'2023-10-22 05:55:30');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `hak_akses`;
CREATE TABLE `hak_akses` (
  `IdAkses` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NamaAkses` varchar(255) NOT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdAkses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `hak_akses` (`IdAkses`, `NamaAkses`, `Keterangan`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'admin',	'2023-10-22 10:14:52',	NULL),
(2,	'user',	'user',	NULL,	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2014_10_12_100000_create_password_resets_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2023_10_22_100251_create_hak_akses_table',	1),
(7,	'2023_10_22_100325_create_pengguna_table',	1),
(8,	'2023_10_22_100326_create_supplier_table',	1),
(9,	'2023_10_22_100327_create_pelanggan_table',	1),
(10,	'2023_10_22_100328_create_barang_table',	1),
(11,	'2023_10_22_100331_create_pembelian_table',	1),
(12,	'2023_10_22_100334_create_penjualan_table',	1),
(13,	'2023_10_22_103158_create_suppliers_table',	2);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `IdPelanggan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NamaPelanggan` varchar(255) NOT NULL,
  `NoHP` varchar(255) NOT NULL,
  `TanggalDaftar` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdPelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pelanggan` (`IdPelanggan`, `NamaPelanggan`, `NoHP`, `TanggalDaftar`, `created_at`, `updated_at`) VALUES
(1,	'James',	'123222',	'0000-00-00 00:00:00',	'2023-10-22 14:26:49',	'2023-10-22 08:20:28'),
(2,	'Budiarto',	'321',	'2023-10-22 00:00:00',	'2023-10-22 14:26:58',	NULL),
(3,	'Ayu',	'112233',	'2023-10-22 00:00:00',	'2023-10-22 14:27:09',	NULL);

DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian` (
  `IdPembelian` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `JumlahPembelian` int(11) NOT NULL,
  `HargaBeli` int(11) NOT NULL,
  `IdBarang` bigint(20) unsigned NOT NULL,
  `IdSupplier` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdPembelian`),
  KEY `pembelian_idbarang_foreign` (`IdBarang`),
  KEY `pembelian_idsupplier_foreign` (`IdSupplier`),
  CONSTRAINT `pembelian_idbarang_foreign` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`IdBarang`),
  CONSTRAINT `pembelian_idsupplier_foreign` FOREIGN KEY (`IdSupplier`) REFERENCES `supplier` (`IdSupplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pembelian` (`IdPembelian`, `JumlahPembelian`, `HargaBeli`, `IdBarang`, `IdSupplier`, `created_at`, `updated_at`) VALUES
(1,	223,	27429,	2,	2,	'2023-10-22 06:34:03',	'2023-10-22 06:55:58'),
(2,	20,	700000,	4,	1,	'2023-10-22 07:03:52',	'2023-10-22 07:03:52');

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `IdPengguna` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NamaPengguna` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `NamaDepan` varchar(255) NOT NULL,
  `NamaBelakang` varchar(255) NOT NULL,
  `NoHP` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `IdAkses` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdPengguna`),
  UNIQUE KEY `pengguna_namapengguna_unique` (`NamaPengguna`),
  KEY `pengguna_idakses_foreign` (`IdAkses`),
  CONSTRAINT `pengguna_idakses_foreign` FOREIGN KEY (`IdAkses`) REFERENCES `hak_akses` (`IdAkses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pengguna` (`IdPengguna`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHP`, `Alamat`, `IdAkses`, `created_at`, `updated_at`) VALUES
(1,	'admin123',	'$2y$10$j8uWwurfALHQjYWZS30sIO8PW/Db6wbZeLR12/YW8sO15Jl2E6K1G',	'ini',	'admin',	'123',	'Indonesia',	1,	'2023-10-22 03:15:10',	'2023-10-22 08:56:52'),
(2,	'admin1234',	'$2y$10$Zu0LdJJSTB1FdjBlJ440MeZpf.pQlKnka9j2WX2pVzkdDybGcNgYW',	'admin1234',	'admin1234',	'123',	'admin1234',	2,	'2023-10-22 03:22:34',	'2023-10-22 03:22:34');

DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan` (
  `IdPenjualan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `JumlahPenjualan` int(11) NOT NULL,
  `HargaJual` int(11) NOT NULL,
  `IdBarang` bigint(20) unsigned NOT NULL,
  `IdPelanggan` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdPenjualan`),
  KEY `penjualan_idbarang_foreign` (`IdBarang`),
  KEY `penjualan_idpelanggan_foreign` (`IdPelanggan`),
  CONSTRAINT `penjualan_idbarang_foreign` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`IdBarang`),
  CONSTRAINT `penjualan_idpelanggan_foreign` FOREIGN KEY (`IdPelanggan`) REFERENCES `pelanggan` (`IdPelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `penjualan` (`IdPenjualan`, `JumlahPenjualan`, `HargaJual`, `IdBarang`, `IdPelanggan`, `created_at`, `updated_at`) VALUES
(1,	32,	3936,	2,	3,	'2023-10-22 07:37:14',	'2023-10-22 08:05:13');

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1,	'App\\Models\\Pengguna',	NULL,	'authToken',	'e23647fbcdb2c6360f7bc4af3e04180fdf7fb6a5a2622a77a3a1362c03879703',	'[\"*\"]',	NULL,	NULL,	'2023-10-22 03:25:21',	'2023-10-22 03:25:21'),
(2,	'App\\Models\\Pengguna',	NULL,	'authToken',	'b718dab5d9e90852ed007667376e89e8d75201fe1d9da91e2eade16842a41c16',	'[\"*\"]',	NULL,	NULL,	'2023-10-22 03:25:35',	'2023-10-22 03:25:35'),
(3,	'App\\Models\\Pengguna',	NULL,	'authToken',	'54f96d07952a109f71cbf0adc7fb1e8d13e3abe1f40a08e52501cc7b54ecf629',	'[\"*\"]',	NULL,	NULL,	'2023-10-22 07:06:57',	'2023-10-22 07:06:57'),
(4,	'App\\Models\\Pengguna',	NULL,	'authToken',	'61b01dd7f7b207482f0df09add8ac1381b3a7d2af527bd6a8987bc1d1554fc7b',	'[\"*\"]',	NULL,	NULL,	'2023-10-22 07:45:42',	'2023-10-22 07:45:42'),
(5,	'App\\Models\\Pengguna',	NULL,	'authToken',	'dec53124e4b3eab49db8c2d8142a80e6ed04ddfbba0661a81589fa4ba5393cda',	'[\"*\"]',	NULL,	NULL,	'2023-10-22 07:52:10',	'2023-10-22 07:52:10'),
(6,	'App\\Models\\Pengguna',	2,	'authToken',	'5fe39aa78d2a74b6489656806e138754efd21cfd02a015a8fd606826902f87b7',	'[\"*\"]',	NULL,	NULL,	'2023-10-22 08:58:42',	'2023-10-22 08:58:42'),
(7,	'App\\Models\\Pengguna',	1,	'authToken',	'dd048bb3500b84ef748f4053cda55683379dc4b29b9389550ee3dc83de3c0a9d',	'[\"*\"]',	NULL,	NULL,	'2023-10-22 08:58:49',	'2023-10-22 08:58:49');

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `IdSupplier` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NamaSupplier` varchar(255) NOT NULL,
  `NoHP` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdSupplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `supplier` (`IdSupplier`, `NamaSupplier`, `NoHP`, `Alamat`, `created_at`, `updated_at`) VALUES
(1,	'Sumanto',	'123123',	'Jakarta',	'2023-10-22 13:05:21',	NULL),
(2,	'Ramadhan',	'32122',	'Indonesia',	'2023-10-22 13:39:43',	'2023-10-22 08:08:02');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2023-10-22 16:20:55
