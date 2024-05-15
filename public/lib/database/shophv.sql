-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 15, 2024 lúc 07:33 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shophv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `rank`, `hidden`, `created_at`, `updated_at`) VALUES
(1, 'IPhone', 'iphone', 1, 1, '2024-04-22 11:40:05', NULL),
(2, 'IPad', 'ipad', 1, 1, '2024-04-22 11:40:05', NULL),
(3, 'Mac', 'mac', 1, 1, '2024-04-22 11:40:05', NULL),
(4, 'Watch', 'watch', 1, 1, '2024-04-22 11:40:05', NULL),
(5, 'Âm Thanh', 'am-thanh', 1, 1, '2024-04-22 11:40:05', NULL),
(6, 'Phụ Kiện', 'phu-kien', 1, 1, '2024-04-22 11:40:05', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon_codes`
--

CREATE TABLE `coupon_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `percent_amount` varchar(255) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_delete` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon_codes`
--

INSERT INTO `coupon_codes` (`id`, `name`, `code`, `type`, `percent_amount`, `expire_date`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(4, 'Giảm 50% cho người mới', 'newbie', 'amount', '100000', '2025-12-02', 1, 1, '2024-04-27 01:46:26', '2024-04-27 02:31:06'),
(5, 'anc', 'newbie1', 'Percent', '50', '2049-12-02', 1, 1, '2024-04-27 02:49:24', '2024-04-27 02:49:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ram` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2024_04_06_195230_create_coupon_codes_table', 2),
(12, '2024_04_06_195143_create_coupon_codes_table', 3),
(14, '2014_10_12_000000_create_users_table', 4),
(15, '2014_10_12_100000_create_password_reset_tokens_table', 4),
(16, '2019_08_19_000000_create_failed_jobs_table', 4),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(18, '2024_03_18_162340_create_categories_table', 4),
(19, '2024_03_18_173434_create_models_table', 4),
(20, '2024_03_18_173647_create_orders_table', 4),
(21, '2024_03_18_173820_create_products_table', 4),
(22, '2024_03_18_184217_create_details_table', 4),
(23, '2024_04_04_101938_create_order_items_table', 4),
(24, '2024_04_11_202952_create_coupon_codes_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `models`
--

CREATE TABLE `models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `models`
--

INSERT INTO `models` (`id`, `model_name`, `slug`, `created_at`, `updated_at`, `category_id`) VALUES
(1, '15 Series', '15-series', '2024-04-22 11:40:12', '2024-04-22 12:48:43', 1),
(2, '14 Series', '14-series', '2024-04-22 11:40:12', NULL, 1),
(3, '13 Series', '13-series', '2024-04-22 11:40:12', NULL, 1),
(4, '12 Series', '12-series', '2024-04-22 11:40:12', NULL, 1),
(5, '11 Series', '11-series', '2024-04-22 11:40:12', NULL, 1),
(6, 'IPad Pro M1', 'ipad-pro-m1', '2024-04-22 11:40:12', NULL, 2),
(7, 'IPad Pro M2', 'ipad-pro-m2', '2024-04-22 11:40:12', NULL, 2),
(8, 'IPad Air', 'ipad-air', '2024-04-22 11:40:12', NULL, 2),
(9, 'IPad 9', 'ipad-9', '2024-04-22 11:40:12', NULL, 2),
(10, 'IPad 10', 'ipad-10', '2024-04-22 11:40:12', NULL, 2),
(11, 'IPad Mini', 'ipad-mini', '2024-04-22 11:40:12', NULL, 2),
(12, 'MacBook Pro M2', 'macbook-pro-m2', '2024-04-22 11:40:12', NULL, 3),
(13, 'MacBook Pro M3', 'macbook-pro-m3', '2024-04-22 11:40:12', NULL, 3),
(14, 'MacBook Air', 'macbook-air', '2024-04-22 11:40:12', NULL, 3),
(15, 'MacBook Imac', 'macbook-imac', '2024-04-22 11:40:12', NULL, 3),
(16, 'MacBook Mini', 'macbook-mini', '2024-04-22 11:40:12', NULL, 3),
(17, 'MacBook Pro', 'macbook-pro', '2024-04-22 11:40:12', NULL, 3),
(18, 'MacBook Studio', 'macbook-studio', '2024-04-22 11:40:12', NULL, 3),
(19, 'Apple Watch Ultra 22', 'apple-watch-ultra-2', '2024-04-22 11:40:12', NULL, 4),
(20, 'Apple Watch SE', 'apple-watch-se', '2024-04-22 11:40:12', NULL, 4),
(21, 'Apple Watch Series 8', 'apple-watch-series-8', '2024-04-22 11:40:12', NULL, 4),
(22, 'Apple Watch Series 7', 'apple-watch-series-7', '2024-04-22 11:40:12', NULL, 4),
(23, 'Apple Watch Series 6', 'apple-watch-series-6', '2024-04-22 11:40:12', NULL, 4),
(24, 'Apple Watch Series 3', 'apple-watch-series-3', '2024-04-22 11:40:12', NULL, 4),
(25, 'Marshall', 'marshall', '2024-04-22 11:40:12', NULL, 5),
(26, 'Apple Sound', 'apple-sound', '2024-04-22 11:40:12', NULL, 5),
(27, 'AirPods', 'airpods', '2024-04-22 11:40:12', NULL, 5),
(28, 'Ốp lưng', 'op-lung', '2024-04-22 11:40:12', NULL, 6),
(29, 'Kính cường lực', 'kinh-cuong-luc', '2024-04-22 11:40:12', NULL, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `total_money` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `admin_note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone_number`, `address`, `email`, `status`, `total_money`, `note`, `admin_note`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Sáu', '0353605902', '1203 Kha Vạn Cân, P. Linh Đông, Thành Phố Thủ Đức, TP HCM', 'admin@gmail.com', '2', 25900000, '123', NULL, '2024-04-22 12:23:27', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `product_name`, `quantity`, `price`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'IPhone 15 Pro Max 256GB', 1, 25900000, 2, 1, '2024-04-22 12:23:27', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumbnails` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `shortDes` text NOT NULL,
  `hot` tinyint(1) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `hidden` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `amount`, `price`, `image`, `thumbnails`, `description`, `shortDes`, `hot`, `views`, `hidden`, `created_at`, `updated_at`, `model_id`, `category_id`) VALUES
(1, 'IPhone 15 Pro Max 128GB', 'ao-vcl', 32900000, 28900000, 'iphone_01.png', 'iphone_01.png', 'abc', 'abc', 1, 3, 1, '2024-04-22 11:40:17', '2024-04-27 01:33:19', 1, 1),
(2, 'IPhone 15 Pro Max 256GB', 'ao-vcl', 32500000, 25900000, 'iphone_02.png', 'iphone_01.png', 'abc', 'abc', 1, 45, 1, '2024-04-22 11:40:17', '2024-04-24 11:14:54', 1, 1),
(3, 'IPhone 15 Pro Max 512GB', 'ao-vcl', 31900000, 26900000, 'iphone_03.png', 'iphone_01.png', 'abc', 'abc', 0, 6, 1, '2024-04-22 11:40:17', '2024-04-24 11:11:42', 1, 1),
(4, 'IPhone 15 Pro Max 1T', 'ao-vcl', 35900000, 31900000, 'iphone_04.png', 'iphone_01.png', 'abc', 'abc', 0, 1, 1, '2024-04-22 11:40:17', '2024-04-24 10:42:26', 1, 1),
(5, 'IPhone 15 Pro 128GB', 'ao-vcl', 28900000, 21900000, 'iphone_04.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 1, 1),
(6, 'IPhone 15 Pro 256GB', 'ao-vcl', 28500000, 25900000, 'iphone_05.png', 'iphone_01.png', 'abc', 'abc', 1, 1, 1, '2024-04-22 11:40:17', '2024-04-24 09:04:22', 1, 1),
(7, 'IPhone 15 Pro 512GB', 'ao-vcl', 28900000, 26900000, 'iphone_06.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 1, 1),
(8, 'IPhone 15 Pro 1T', 'ao-vcl', 28900000, 26900000, 'iphone_07.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 1, 1),
(9, 'IPhone 15 128GB', 'ao-vcl', 23900000, 14900000, 'iphone_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 1, 1),
(10, 'IPhone 15 256GB', 'ao-vcl', 23500000, 13900000, 'iphone_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 1, 1),
(11, 'IPhone 15 512GB', 'ao-vcl', 23900000, 11900000, 'iphone_03.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 1, 1),
(12, 'IPhone 15 1T', 'ao-vcl', 23900000, 11900000, 'iphone_05.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 1, 1),
(13, 'IPhone 15 mini 128GB', 'ao-vcl', 18900000, 14900000, 'iphone_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 1, 1),
(14, 'IPhone 15 mini 256GB', 'ao-vcl', 18500000, 12800000, 'iphone_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 1, 1),
(15, 'IPhone 15 mini 512GB', 'ao-vcl', 18900000, 12900000, 'iphone_03.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 1, 1),
(16, 'IPhone 15 mini 1T', 'ao-vcl', 18900000, 14900000, 'iphone_05.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 1, 1),
(17, 'IPhone 14 Pro Max 128GB', 'ao-vcl', 32900000, 28900000, 'iphone_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 2, 1),
(18, 'IPhone 14 Pro Max 256GB', 'ao-vcl', 32500000, 25900000, 'iphone_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 2, 1),
(19, 'IPhone 14 Pro Max 512GB', 'ao-vcl', 31900000, 26900000, 'iphone_03.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 2, 1),
(20, 'IPhone 14 Pro Max 1T', 'ao-vcl', 35900000, 31900000, 'iphone_04.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 2, 1),
(21, 'IPhone 14 Pro 128GB', 'ao-vcl', 28900000, 21900000, 'iphone_04.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 2, 1),
(22, 'IPhone 14 Pro 256GB', 'ao-vcl', 28500000, 25900000, 'iphone_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 2, 1),
(23, 'IPhone 14 Pro 512GB', 'ao-vcl', 28900000, 26900000, 'iphone_06.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 2, 1),
(24, 'IPhone 14 Pro 1T', 'ao-vcl', 28900000, 26900000, 'iphone_07.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 2, 1),
(25, 'IPhone 14 128GB', 'ao-vcl', 23900000, 14900000, 'iphone_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 2, 1),
(26, 'IPhone 14 256GB', 'ao-vcl', 23500000, 13900000, 'iphone_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 2, 1),
(27, 'IPhone 14 512GB', 'ao-vcl', 23900000, 11900000, 'iphone_03.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 2, 1),
(28, 'IPhone 14 1T', 'ao-vcl', 23900000, 11900000, 'iphone_05.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 2, 1),
(29, 'IPhone 13 Pro Max 123GB', 'ao-vcl', 32900000, 23900000, 'iphone_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 3, 1),
(30, 'IPhone 13 Pro Max 256GB', 'ao-vcl', 32500000, 25900000, 'iphone_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 3, 1),
(31, 'IPhone 13 Pro Max 512GB', 'ao-vcl', 31900000, 26900000, 'iphone_03.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 3, 1),
(32, 'IPhone 13 Pro Max 1T', 'ao-vcl', 35900000, 31900000, 'iphone_04.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 3, 1),
(33, 'IPhone 13 Pro 128GB', 'ao-vcl', 28900000, 21900000, 'iphone_04.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 3, 1),
(34, 'IPhone 13 Pro 256GB', 'ao-vcl', 28500000, 25900000, 'iphone_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 3, 1),
(35, 'IPhone 13 Pro 512GB', 'ao-vcl', 28900000, 26900000, 'iphone_06.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 3, 1),
(36, 'IPhone 13 Pro 1T', 'ao-vcl', 28900000, 26900000, 'iphone_07.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 3, 1),
(37, 'IPhone 13 128GB', 'ao-vcl', 23900000, 14900000, 'iphone_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 3, 1),
(38, 'IPhone 13 256GB', 'ao-vcl', 23500000, 13900000, 'iphone_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 3, 1),
(39, 'IPhone 13 512GB', 'ao-vcl', 23900000, 11900000, 'iphone_03.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 3, 1),
(40, 'IPhone 13 1T', 'ao-vcl', 23900000, 11900000, 'iphone_05.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 3, 1),
(41, 'IPhone 12 Pro Max 128GB', 'ao-vcl', 32900000, 28900000, 'iphone_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 4, 1),
(42, 'IPhone 12 Pro Max 256GB', 'ao-vcl', 32500000, 25900000, 'iphone_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 4, 1),
(43, 'IPhone 12 Pro Max 512GB', 'ao-vcl', 31900000, 26900000, 'iphone_03.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 4, 1),
(44, 'IPhone 12 Pro 128GB', 'ao-vcl', 28900000, 21900000, 'iphone_04.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 4, 1),
(45, 'IPhone 12 Pro 256GB', 'ao-vcl', 28500000, 25900000, 'iphone_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 4, 1),
(46, 'IPhone 12 Pro 512GB', 'ao-vcl', 28900000, 26900000, 'iphone_06.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 4, 1),
(47, 'IPhone 12 128GB', 'ao-vcl', 23900000, 14900000, 'iphone_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 4, 1),
(48, 'IPhone 12 256GB', 'ao-vcl', 23500000, 13900000, 'iphone_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 4, 1),
(49, 'IPhone 12 512GB', 'ao-vcl', 23900000, 11900000, 'iphone_03.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 4, 1),
(50, 'IPhone 11 Pro Max 128GB', 'ao-vcl', 32900000, 28900000, 'iphone_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 5, 1),
(51, 'IPhone 11 Pro Max 256GB', 'ao-vcl', 32500000, 25900000, 'iphone_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 5, 1),
(52, 'IPhone 11 Pro Max 512GB', 'ao-vcl', 31900000, 26900000, 'iphone_03.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 5, 1),
(53, 'IPhone 11 Pro 128GB', 'ao-vcl', 28900000, 21900000, 'iphone_04.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 5, 1),
(54, 'IPhone 11 Pro 256GB', 'ao-vcl', 28500000, 25900000, 'iphone_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 5, 1),
(55, 'IPhone 11 Pro 512GB', 'ao-vcl', 28900000, 26900000, 'iphone_06.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 5, 1),
(56, 'IPhone 11 128GB', 'ao-vcl', 23900000, 14900000, 'iphone_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 5, 1),
(57, 'IPhone 11 256GB', 'ao-vcl', 23500000, 13900000, 'iphone_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 5, 1),
(58, 'IPhone 11 512GB', 'ao-vcl', 23900000, 11900000, 'iphone_03.png', 'iphone_01.png', 'abc', 'abc', 0, 0, 1, '2024-04-22 11:40:17', NULL, 5, 1),
(59, 'iPad Pro M1 12.9 inch WiFi Cellular 512GB', 'ao-vcl', 42990000, 32900000, 'ipad_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 6, 2),
(60, 'iPad Pro M1 12.9 inch WiFi 512GB', 'ao-vcl', 38990000, 29900000, 'ipad_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 6, 2),
(61, 'iPad Pro M2 11 inch WiFi 128GB', 'ao-vcl', 28990000, 19900000, 'ipad_03.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 7, 2),
(62, 'iPad Pro M2 11 inch WiFi Cellular 128GB', 'ao-vcl', 28990000, 23900000, 'ipad_04.png', 'iphone_01.png', 'abc', 'abc', 1, 1, 1, '2024-04-22 11:40:17', '2024-04-24 10:37:54', 7, 2),
(63, 'iPad Pro M2 12.9 inch WiFi 128GB', 'ao-vcl', 28990000, 23900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 7, 2),
(64, 'iPad Pro M2 11 inch WiFi Cellular 256GB', 'ao-vcl', 28990000, 21900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 7, 2),
(65, 'iPad Pro M2 11 inch WiFi 256GB', 'ao-vcl', 28990000, 22900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 7, 2),
(66, 'iPad Pro M2 11 inch WiFi 512GB', 'ao-vcl', 28990000, 23900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 7, 2),
(67, 'iPad Pro M2 12.9 inch WiFi Cellular 128GB', 'ao-vcl', 28990000, 26900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 7, 2),
(68, 'iPad Pro M2 12.9 inch WiFi Cellular 258GB', 'ao-vcl', 28990000, 23900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 7, 2),
(69, 'iPad Pro M2 12.9 inch WiFi Cellular 512GB', 'ao-vcl', 28990000, 23700000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 7, 2),
(70, 'iPad Pro M2 12.9 inch WiFi Cellular 1TB', 'ao-vcl', 28990000, 21900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 7, 2),
(71, 'iPad Pro M2 12.9 inch WiFi Cellular 2TB', 'ao-vcl', 28990000, 25900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 7, 2),
(72, 'iPad Air 4', 'ao-vcl', 28990000, 15900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 8, 2),
(73, 'iPad Air 5 WiFi 64GB', 'ao-vcl', 28990000, 12900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 1, 1, '2024-04-22 11:40:17', '2024-04-23 12:52:48', 8, 2),
(74, 'iPad Air 5 WiFi 256GB', 'ao-vcl', 28990000, 16900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 8, 2),
(75, 'iPad Air 5 WiFi Cellular 64GB', 'ao-vcl', 28990000, 25900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 8, 2),
(76, 'iPad Air 5 WiFi Cellular 256GB', 'ao-vcl', 28990000, 22900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 1, 1, '2024-04-22 11:40:17', '2024-04-23 12:52:53', 8, 2),
(77, 'iPad gen 9 10.2 inch WiFi 64GB', 'ao-vcl', 28990000, 22900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 9, 2),
(78, 'iPad Gen 9th 10.2 inch WiFi 256GB', 'ao-vcl', 28990000, 22900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 9, 2),
(79, 'iPad Gen 10 th 10.9 inch WiFi 64GB', 'ao-vcl', 28990000, 22900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 10, 2),
(80, 'iPad Gen 10th 10.9 inch WiFi Cellular 64GB', 'ao-vcl', 28990000, 22900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 10, 2),
(81, 'iPad Mini 6', 'ao-vcl', 28990000, 22900000, 'ipad_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 11, 2),
(82, 'MacBook Pro 16 M1 Pro (16 Core/16GB/1TB)', 'ao-vcl', 48990000, 43900000, 'mac_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 12, 3),
(83, 'MacBook Pro 13 inch M2 (10 core| 8GB RAM| 256GB SSD)', 'ao-vcl', 43990000, 38900000, 'mac_03.png', 'iphone_01.png', 'abc', 'abc', 1, 16, 1, '2024-04-22 11:40:17', '2024-04-27 01:41:01', 12, 3),
(84, 'MacBook Pro 16 M1 Pro (16 Core/16GB/512SSD)', 'ao-vcl', 43990000, 38900000, 'mac_01.png', 'iphone_01.png', 'abc', 'abc', 1, 6, 1, '2024-04-22 11:40:17', '2024-04-27 01:34:00', 12, 3),
(85, 'MacBook Pro 13 inch M2 (10 core| 16GB RAM| 512GB SSD)', 'ao-vcl', 33990000, 32900000, 'mac_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 12, 3),
(86, 'MacBook Pro 14 inch M3 2023 (8GB RAM| 10 Core GPU| 512GB SSD)', 'ao-vcl', 33990000, 32900000, 'mac_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 13, 3),
(87, 'MacBook Pro 14 inch M3 2023 (8GB RAM| 10 Core GPU| 1TB SSD)', 'ao-vcl', 33990000, 32900000, 'mac_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 13, 3),
(88, 'MacBook Pro 14 inch M3 Pro 2023 (18GB RAM| 14 core GPU| 512GB SSD)', 'ao-vcl', 33990000, 32900000, 'mac_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 13, 3),
(89, 'MacBook Pro 14 inch M3 Pro 2023 (18GB RAM| 18 core GPU| 1TB SSD)', 'ao-vcl', 33990000, 32900000, 'mac_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 13, 3),
(90, 'MacBook Air M1 2020 (8GB RAM | 256GB SSD)', 'ao-vcl', 33990000, 32900000, 'mac_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 14, 3),
(91, 'MacBook Air M3 13 inch', 'ao-vcl', 33990000, 32900000, 'mac_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 14, 3),
(92, 'MacBook Air M2 2022 (8GB RAM | 256GB SSD)', 'ao-vcl', 33990000, 28900000, 'mac_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 14, 3),
(93, 'MacBook Air M2 2022 (8GB RAM | 512GB SSD)', 'ao-vcl', 33990000, 29900000, 'mac_03.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 14, 3),
(94, 'iMac M1 2021 24 inch (8 Core GPU/8GB/512GB)', 'ao-vcl', 33990000, 29900000, 'mac_04.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 15, 3),
(95, 'iMac M3 2023 24 inch (8 Core GPU/8GB/256GB)', 'ao-vcl', 33990000, 29900000, 'mac_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 15, 3),
(96, 'iMac M3 2023 24 inch (10 Core GPU/8GB/256GB)', 'ao-vcl', 33990000, 29900000, 'mac_06.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 15, 3),
(97, 'iMac M3 2023 24 inch (10 Core GPU/8GB/512GB)', 'ao-vcl', 33990000, 28900000, 'mac_07.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 15, 3),
(98, 'Mac mini M2 (10-Core GPU| 8GB RAM | 256GB SSD)', 'ao-vcl', 33990000, 28900000, 'mac_04.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 16, 3),
(99, 'Mac mini M2 (10-Core GPU| 8GB RAM | 512GB SSD)', 'ao-vcl', 33990000, 27900000, 'mac_03.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 16, 3),
(100, 'Mac mini M2 Pro (16-Core GPU| 16GB RAM | 512GB SSD)', 'ao-vcl', 33990000, 24900000, 'mac_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 16, 3),
(101, 'Mac mini M2 (10-Core GPU| 16GB RAM | 256GB SSD) CTO', 'ao-vcl', 33990000, 23900000, 'mac_04.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 16, 3),
(102, 'Mac Pro M2 Ultra', 'ao-vcl', 200990000, 199900000, 'mac_07.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 17, 3),
(103, 'Studio Display', 'ao-vcl', 20990000, 19900000, 'mac_07.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 18, 3),
(104, 'Mac Studio M1 Max', 'ao-vcl', 50990000, 49900000, 'mac_07.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 18, 3),
(105, 'Mac Studio M1 Ultra', 'ao-vcl', 109990000, 99900000, 'mac_07.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 18, 3),
(106, 'Apple Watch Ultra 2 GPS + Cellular 49mm Ocean Band', 'ao-vcl', 5990000, 5200000, 'watch_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 19, 4),
(107, 'Apple Watch Ultra 2 GPS + Cellular 49mm Alpine LoopS', 'ao-vcl', 2790000, 20900000, 'watch_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 19, 4),
(108, 'Apple Watch Ultra 2 GPS + Cellular 49mm Trail Loop', 'ao-vcl', 6990000, 5900000, 'watch_03.png', 'iphone_01.png', 'abc', 'abc', 1, 1, 1, '2024-04-22 11:40:17', '2024-04-24 10:42:22', 19, 4),
(109, 'Apple Watch Series 9 Nhôm (GPS + Cellular) 41mm | Sport Band', 'ao-vcl', 1290000, 10900000, 'watch_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 19, 4),
(110, 'Apple Watch Series 9 Nhôm (GPS) 41mm | Sport Band', 'ao-vcl', 9790000, 7900000, 'watch_04.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 20, 4),
(111, 'Apple Watch Series 9 Nhôm (GPS) 41mm | Sport Loop', 'ao-vcl', 9790000, 8900000, 'watch_06.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 20, 4),
(112, 'Apple Watch Series 9 Nhôm (GPS) 45mm | Sport Band', 'ao-vcl', 12790000, 10900000, 'watch_05.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 20, 4),
(113, 'Apple Watch Series 9 Nhôm (GPS) 45mm | Sport Loop', 'ao-vcl', 12790000, 10700000, 'watch_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 20, 4),
(114, 'Apple Watch Series 8 Nhôm (GPS) 45mm | Sport Loop', 'ao-vcl', 12790000, 10700000, 'watch_06.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 21, 4),
(115, 'Apple Watch SE 2023 GPS Sport Loop', 'ao-vcl', 12790000, 10700000, 'watch_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 21, 4),
(116, 'Apple Watch Series 7 Nhôm GPS', 'ao-vcl', 12790000, 10700000, 'watch_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 22, 4),
(117, 'Apple Watch Series 7 Thép GPS + Cellular', 'ao-vcl', 12790000, 10700000, 'watch_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 22, 4),
(118, 'Apple Watch Series 6 Thép GPS + Cellular', 'ao-vcl', 12790000, 10700000, 'watch_03.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 23, 4),
(119, 'Apple Watch Series 3 Nhôm', 'ao-vcl', 12790000, 10700000, 'watch_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 24, 4),
(120, 'Loa Marshall Acton II Bluetooth', 'ao-vcl', 12790000, 10700000, 'sound_01.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 25, 5),
(121, 'Loa Marshall Stanmore II Bluetooth', 'ao-vcl', 12790000, 10700000, 'sound_02.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 25, 5),
(122, 'Tai nghe Apple WH1000XM5', 'ao-vcl', 12790000, 10700000, 'sound_03.png', 'iphone_01.png', 'abc', 'abc', 1, 1, 1, '2024-04-22 11:40:17', '2024-04-24 10:52:42', 26, 5),
(123, 'Loa Harman Kardon Onyx Studio 8', 'ao-vcl', 12790000, 10700000, 'sound_04.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 26, 5),
(124, 'AirPos 2', 'ao-vcl', 12790000, 10700000, 'sound_06.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 27, 5),
(125, 'AirPos 3', 'ao-vcl', 12790000, 10700000, 'sound_07.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 27, 5),
(126, 'AirPos Pro', 'ao-vcl', 12790000, 10700000, 'sound_09.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 27, 5),
(127, 'AirPos Pro', 'ao-vcl', 1279000, 1070000, 'sound_09.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 28, 6),
(128, 'Cường lực', 'ao-vcl', 1290000, 1070000, 'sound_09.png', 'iphone_01.png', 'abc', 'abc', 1, 0, 1, '2024-04-22 11:40:17', NULL, 29, 6);
INSERT INTO `products` (`id`, `name`, `slug`, `amount`, `price`, `image`, `thumbnails`, `description`, `shortDes`, `hot`, `views`, `hidden`, `created_at`, `updated_at`, `model_id`, `category_id`) VALUES
(130, 'IPhone quá là Max', 'iphone-qua-la-max', 45900000, 39900000, 'media_66294c11b3928.jpg', '[\"DM_20240327233212_001876.jpg\",\"DM_20240327233212_002318.jpg\",\"DM_20240327233212_004676.jpg\"]', '<h2 class=\"st-pd-contentTitle\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:inherit;color:rgb(33, 37, 41);font-family:Roboto, sans-serif;font-size:20px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;line-height:28px;margin:0px 0px 24px;orphans:2;padding:0px;text-align:center;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;vertical-align:baseline;white-space:normal;widows:2;word-spacing:0px;\">Đánh giá chi tiết iPhone 15 Pro Max 1TB</h2><figure class=\"image\"><img style=\"aspect-ratio:600/600;\" src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4QHGRXhpZgAATU0AKgAAAAgACAEOAAIAAABBAAAAbgESAAMAAAABAAEAAAExAAIAAAAxAAAAsAEyAAIAAAAUAAAA4gE7AAIAAAARAAAA9oKYAAIAAAARAAABCIdpAAQAAAABAAABGoglAAQAAAABAAABOAAAAABpUGhvbmUgMTUgY2jDrW5oIGjDo25nIGdpw6EgcuG6uywgbXVhIGfDs3AgMCUsIGdpYW8gdG/DoG4gcXXhu5FjAABBZG9iZSBQaG90b3Nob3AgTGlnaHRyb29tIDEyLjEgQ2xhc3NpYyAoV2luZG93cykAADIwMjM6MDk6MTMgMTA6MzE6MzUAZGlkb25nbW9pLmNvbS52bgAAZGlkb25nbW9pLmNvbS52bgAAAAKQAAAHAAAABDAyMzGSkAACAAAABDUyOAAAAAAAAAYAAAABAAAABAICAAAAAQACAAAAAk4AAAAAAgAFAAAAAwAAAYYAAwACAAAAAkUAAAAABAAFAAAAAwAAAZ4ABgAFAAAAAQAAAbYAAAAAAAAACgAAAAEASRNGAAGGoAAAAAAAAAABAAAAagAAAAECWseWAA9CQAAAAAAAAAABAALmMAAAJxD/4RPKaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA3LjAtYzAwMCAxLjAwMDAwMCwgMDAwMC8wMC8wMC0wMDowMDowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6SXB0YzR4bXBDb3JlPSJodHRwOi8vaXB0Yy5vcmcvc3RkL0lwdGM0eG1wQ29yZS8xLjAveG1sbnMvIiB4bWxuczpwaG90b3Nob3A9Imh0dHA6Ly9ucy5hZG9iZS5jb20vcGhvdG9zaG9wLzEuMC8iIHhtbG5zOmxyPSJodHRwOi8vbnMuYWRvYmUuY29tL2xpZ2h0cm9vbS8xLjAvIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmNycz0iaHR0cDovL25zLmFkb2JlLmNvbS9jYW1lcmEtcmF3LXNldHRpbmdzLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9IkMxMzgwNzI0QjExNUUyMDk4NTFGQUVGQzYwRUI4Mjk0IiB4bXBNTTpQcmVzZXJ2ZWRGaWxlTmFtZT0iaXBob25lLTE1LWNoaW5oLWhhbmctMi5qcGciIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0iQzEzODA3MjRCMTE1RTIwOTg1MUZBRUZDNjBFQjgyOTQiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6YTcyNmZjMjktODAyZi1jZjQwLTk3ZjAtYzU4MTg1ZDY1MGNlIiBkYzpmb3JtYXQ9ImltYWdlL2pwZWciIElwdGM0eG1wQ29yZTpMb2NhdGlvbj0iMzE0IEhvw6BuZyBWxINuIFRo4bulIHBoxrDhu51uZyA0IHF14bqtbiBUw6JuIELDrG5oIiBJcHRjNHhtcENvcmU6Q291bnRyeUNvZGU9IlZOTSIgcGhvdG9zaG9wOkNvdW50cnk9IlZpZXQgTmFtIiBwaG90b3Nob3A6QXV0aG9yc1Bvc2l0aW9uPSJpUGhvbmUgMTUgY2jDrW5oIGjDo25nIGdpw6EgcuG6uywgbXVhIGfDs3AgMCUsIGdpYW8gdG/DoG4gcXXhu5FjIiBwaG90b3Nob3A6Q2l0eT0iSG8gQ2hpIE1pbmgiIHBob3Rvc2hvcDpTdGF0ZT0iSG8gQ2hpIE1pbmgiIHhtcDpMYWJlbD0iaVBob25lIDE1IGNow61uaCBow6NuZyBnacOhIHLhurssIG11YSBnw7NwIDAlLCBnaWFvIHRvw6BuIHF14buRYyIgeG1wOlJhdGluZz0iNSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgTGlnaHRyb29tIDEyLjEgQ2xhc3NpYyAoV2luZG93cykiIHhtcDpNb2RpZnlEYXRlPSIyMDIzLTA5LTEzVDEwOjMxOjM1LjUyOCswNzowMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAyMy0wOS0xM1QxMDozMTozNiswNzowMCIgY3JzOkNyb3BUb3A9IjAiIGNyczpDcm9wTGVmdD0iMCIgY3JzOkNyb3BCb3R0b209IjEiIGNyczpDcm9wUmlnaHQ9IjEiIGNyczpDcm9wQW5nbGU9IjAiIGNyczpDcm9wQ29uc3RyYWluVG9XYXJwPSIwIiBjcnM6UmF3RmlsZU5hbWU9ImlwaG9uZS0xNS1jaGluaC1oYW5nLTItMi5qcGciPiA8eG1wTU06SGlzdG9yeT4gPHJkZjpTZXE+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDphNzI2ZmMyOS04MDJmLWNmNDAtOTdmMC1jNTgxODVkNjUwY2UiIHN0RXZ0OndoZW49IjIwMjMtMDktMTNUMTA6MzE6MzYrMDc6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBMaWdodHJvb20gQ2xhc3NpYyAxMi4xIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iL21ldGFkYXRhIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8ZGM6dGl0bGU+IDxyZGY6QWx0PiA8cmRmOmxpIHhtbDpsYW5nPSJ4LWRlZmF1bHQiPmlQaG9uZSAxNSBjaMOtbmggaMOjbmcgZ2nDoSBy4bq7LCBtdWEgZ8OzcCAwJSwgZ2lhbyB0b8OgbiBxdeG7kWM8L3JkZjpsaT4gPC9yZGY6QWx0PiA8L2RjOnRpdGxlPiA8ZGM6Y3JlYXRvcj4gPHJkZjpTZXE+IDxyZGY6bGk+ZGlkb25nbW9pLmNvbS52bjwvcmRmOmxpPiA8L3JkZjpTZXE+IDwvZGM6Y3JlYXRvcj4gPGRjOnJpZ2h0cz4gPHJkZjpBbHQ+IDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+ZGlkb25nbW9pLmNvbS52bjwvcmRmOmxpPiA8L3JkZjpBbHQ+IDwvZGM6cmlnaHRzPiA8ZGM6ZGVzY3JpcHRpb24+IDxyZGY6QWx0PiA8cmRmOmxpIHhtbDpsYW5nPSJ4LWRlZmF1bHQiPmlQaG9uZSAxNSBjaMOtbmggaMOjbmcgZ2nDoSBy4bq7LCBtdWEgZ8OzcCAwJSwgZ2lhbyB0b8OgbiBxdeG7kWM8L3JkZjpsaT4gPC9yZGY6QWx0PiA8L2RjOmRlc2NyaXB0aW9uPiA8ZGM6c3ViamVjdD4gPHJkZjpCYWc+IDxyZGY6bGk+aXBob25lIDE1IGNow61uaCBow6NuZzwvcmRmOmxpPiA8cmRmOmxpPmlwaG9uZSAxNSBnacOhIGJhbyBuaGnDqnU8L3JkZjpsaT4gPHJkZjpsaT5pcGhvbmUgMTUgZ2nDoSBy4bq7PC9yZGY6bGk+IDwvcmRmOkJhZz4gPC9kYzpzdWJqZWN0PiA8SXB0YzR4bXBDb3JlOkNyZWF0b3JDb250YWN0SW5mbyBJcHRjNHhtcENvcmU6Q2lFbWFpbFdvcms9ImxpZW5oZUBkaWRvbmdtb2kuY29tLnZuIiBJcHRjNHhtcENvcmU6Q2lUZWxXb3JrPSIxOTAwMDIyMCIgSXB0YzR4bXBDb3JlOkNpVXJsV29yaz0iZGlkb25nbW9pLmNvbS52biIvPiA8bHI6d2VpZ2h0ZWRGbGF0U3ViamVjdD4gPHJkZjpCYWc+IDxyZGY6bGk+aXBob25lIDE1IGNow61uaCBow6NuZzwvcmRmOmxpPiA8cmRmOmxpPmlwaG9uZSAxNSBnacOhIHLhurs8L3JkZjpsaT4gPHJkZjpsaT5pcGhvbmUgMTUgZ2nDoSBiYW8gbmhpw6p1PC9yZGY6bGk+IDwvcmRmOkJhZz4gPC9scjp3ZWlnaHRlZEZsYXRTdWJqZWN0PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg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\" width=\"600\" height=\"600\"></figure><h2 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:inherit;color:rgb(33, 37, 41);font-family:Roboto, sans-serif;font-size:20px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;letter-spacing:normal;line-height:28px;margin:0px 0px 16px;orphans:2;padding:0px;text-align:center;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;vertical-align:baseline;white-space:normal;widows:2;word-spacing:0px;\"><strong style=\"border-width:0px;box-sizing:inherit;margin:0px;padding:0px;vertical-align:baseline;\">Đánh giá iPhone 15 Pro Max 1TB từ FPT Shop</strong></h2><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:inherit;color:rgb(73, 80, 87);font-family:Roboto, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:24px;margin:0px 0px 16px;orphans:2;padding:0px;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;vertical-align:baseline;white-space:normal;widows:2;word-spacing:0px;\"><b style=\"border-width:0px;box-sizing:inherit;font-size:inherit;line-height:inherit;margin:0px;padding:0px;vertical-align:baseline;\"><strong>Với phiên bản 1TB của iPhone 15 Pro Max, bạn sẽ có được những trải nghiệm tuyệt vời và cao cấp nhất. Không chỉ sở hữu bộ nhớ rộng rãi để thoải mái lưu trữ dữ liệu, sản phẩm còn được trang bị bộ khung vỏ Titan sang trọng và siêu bền. Chip xử lý A17 Pro cực mạnh sẽ giải quyết mượt mà những tác vụ nặng và phức tạp nhất.</strong></b></p>', 'abc', 0, 7, 1, '2024-04-24 11:14:41', '2024-04-24 11:19:38', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone_number`, `image`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$BOcECPTv79KkGCj1yn/bf.XZ6VioP.pIc9Xk9L0icptmbeKGP7odG', '0123', 'admin.png', 1, NULL, NULL, '2024-04-27 09:03:32'),
(6, 'Abra Hutchinson', 'peruduze@gmail.com', NULL, '$2y$12$TDFydQsDO/ROYv.WDHcOgekklOQ.7yRKyaNqzYjwClENkIiK8AmeW', '+1 (698) 409-4963', 'user.png', 1, NULL, '2024-04-22 13:27:54', '2024-04-22 13:27:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupon_codes`
--
ALTER TABLE `coupon_codes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `details_product_id_index` (`product_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `models_category_id_index` (`category_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_model_id_index` (`model_id`),
  ADD KEY `products_category_id_index` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `coupon_codes`
--
ALTER TABLE `coupon_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
