-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 01:07 PM
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
-- Database: `e-commerece`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `qty`, `created_at`, `updated_at`) VALUES
(16, 1, 2, 2, NULL, '2023-12-27 07:08:12'),
(49, 9, 1, 1, NULL, NULL),
(50, 6, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` varchar(191) DEFAULT NULL,
  `popular` varchar(191) DEFAULT NULL,
  `img` text DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_descrip` varchar(191) DEFAULT NULL,
  `meta_keywords` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `img`, `meta_title`, `meta_descrip`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(43, 'Foodses', 'foods', 'Foodses', 'Active', 'Very Popular', 'https://res.cloudinary.com/dsme2ifqy/image/upload/v1702888555/project_uas/uploads/admin/category/2023-12-18_083553_foods.jpg', 'foods', 'foods', 'egg,seafood,eatable,vegan,dairy,chicken', '2023-12-17 23:51:04', '2023-12-18 01:35:54'),
(44, 'furnitures', 'furniture', 'furnitures', 'Active', 'Very Popular', 'https://res.cloudinary.com/dsme2ifqy/image/upload/v1703049706/project_uas/uploads/admin/category/2023-12-20_052110_clothing-store-with-blurred-efecto.jpg', 'furniture', 'furniture', 'furniture,chair,table,gnome,pen,lamp', '2023-12-17 23:53:07', '2023-12-19 22:21:47'),
(45, 'electronics', 'electronics', 'electronics,gadget,widget,drone,phone,fridge,lamp', 'Active', 'Very Popular', 'https://res.cloudinary.com/dsme2ifqy/image/upload/v1702883540/project_uas/uploads/admin/category/2023-12-18_071217_electronics.jpg', 'electronics', 'electronics is something gadget like phone and other things', 'electronics,gadget,widget,drone,phone,fridge,lamp', '2023-12-18 00:12:20', '2023-12-18 00:12:20'),
(50, 'Games', 'game', 'games,playfull,ps2,ps3,ps4,ps5,fun,relaxing', 'Active', 'Very Popular', 'https://res.cloudinary.com/dsme2ifqy/image/upload/v1703115321/project_uas/uploads/admin/category/2023-12-20_233518_games_cate.jpg', 'games', 'games', 'games,playfull,ps2,ps3,ps4,ps5,fun,relaxing', '2023-12-20 16:35:20', '2023-12-20 16:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_17_093421_create_data_table_categories', 2),
(9, '2023_12_20_075204_create_product', 3),
(10, '2023_12_26_040452_create_cart_table', 3),
(11, '2023_12_28_081639_create_order_item', 4),
(12, '2023_12_29_041155_create_order', 5),
(13, '2024_01_11_033918_create_wishlists_table', 6),
(14, '2024_01_17_014326_create_reviews_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address1` varchar(191) NOT NULL,
  `address2` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `state` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL,
  `tracking_number` varchar(191) NOT NULL,
  `snap_token` text NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `last_name`, `user_id`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `status`, `tracking_number`, `snap_token`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 'Acen', 'Chandra', 1, 'frentzenpp@gmail.com', '0895605207566', 'Pkp', 'Bukit intan', 'Bangka Belitung', 'Pangkalpinang', 'Indonesia', 'Completed', 'pp2948', '', 439200, '2023-12-28 22:24:58', '2024-01-08 05:54:59'),
(2, 'Acen', 'Chandra', 1, 'frentzenpp@gmail.com', '0895605207566', 'Pkp', 'Bukit intan', 'Bangka Belitung', 'Pangkalpinang', 'Indonesia', 'Pending', 'uehdsj83', '', 260000, '2023-12-28 22:26:16', '2023-12-28 22:26:16'),
(3, 'Acen', 'Chandra', 1, 'frentzenpp@gmail.com', '0895605207566', 'Pkp', 'Bukit intan', 'Bangka Belitung', 'Pangkalpinang', 'Indonesia', 'Pending', '1283hjdsja', '', 100000, '2023-12-28 22:31:46', '2023-12-28 22:31:46'),
(6, 'Acen', 'Chandra', 1, 'frentzenpp@gmail.com', '0895605207566', 'Pkp', 'Bukit intan', 'Bangka Belitung', 'Pangkalpinang', 'Indonesia', 'Pending', 'hee918', '', 10000, '2023-12-28 22:35:56', '2023-12-28 22:35:56'),
(8, 'Acen', 'Chandra', 1, 'frentzenpp@gmail.com', '0895605207566', 'Pkp', 'Bukit intan', 'Bangka Belitung', 'Pangkalpinang', 'Indonesia', 'Pending', '2163667318899G2', '', 105000, '2023-12-29 14:46:06', '2023-12-29 14:46:06'),
(9, 'acen', 'sasda', 1, 'frentzenpp@gmail.com', '0895605207566', 'Pkp', 'Bukit intan', 'Bangka Belitung', 'Pangkalpinang', 'Indonesia', 'Pending', '55426299043128M', '', 2860000, '2024-01-11 23:37:22', '2024-01-11 23:37:23'),
(10, 'acen', 'sasda', 1, 'frentzenpp@gmail.com', '0895605207566', 'Pkp', 'Bukit intan', 'Bangka Belitung', 'Pangkalpinang', 'Indonesia', 'Pending', '44194785762K906', '', 100000, '2024-01-11 23:41:09', '2024-01-11 23:41:09'),
(11, 'acen', 'Chandra', 1, 'frentzenpp@gmail.com', '0895605207566', 'Pkp', 'Bukit intan', 'Bangka Belitung', 'Pangkalpinang', 'Indonesia', 'Pending', '62023883M431191', '', 100000, '2024-01-12 00:25:48', '2024-01-12 00:25:48'),
(12, 'acen', 'Chandra', 1, 'frentzenpp@gmail.com', '0895605207566', 'Pkp', 'Bukit intan', 'Bangka Belitung', 'Pangkalpinang', 'Indonesia', 'Pending', '17925A726576237', '', 90000, '2024-01-12 00:30:25', '2024-01-12 00:30:25'),
(13, 'acen', 'Chandra', 1, 'frentzenpp@gmail.com', '0895605207566', 'Pkp', 'Bukit intan', 'Bangka Belitung', 'Pangkalpinang', 'Indonesia', 'Pending', '619279T49109766', '', 10000, '2024-01-12 00:58:59', '2024-01-12 00:58:59'),
(14, 'acen', 'Chandra', 1, 'frentzenpp@gmail.com', '0895605207566', 'Pkp', 'Bukit intan', 'Bangka Belitung', 'Pangkalpinang', 'Indonesia', 'Pending', '45325P163128825', '', 0, '2024-01-15 22:50:26', '2024-01-15 22:50:26'),
(15, 'acen', 'Chandra', 1, 'frentzenpp@gmail.com', '0895605207566', 'Pkp', 'Bukit intan', 'Bangka Belitung', 'Pangkalpinang', 'Indonesia', 'Pending', '693805424987O28', '0f4c14fb-043e-422f-9961-66d33bd25ba0', 3000000, '2024-01-16 03:00:36', '2024-01-16 03:00:36'),
(16, 'acen', 'Chandra', 1, 'frentzenpp@gmail.com', '0895605207566', 'Pkp', 'Bukit intan', 'Bangka Belitung', 'Pangkalpinang', 'Indonesia', 'Pending', '05078A521767895', '4883821d-f09c-4207-8850-27f1fd9470a4', 30000, '2024-01-16 03:01:34', '2024-01-16 03:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `qty`, `price`, `total_price`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 8, 54900, 439200, '2023-12-28 22:24:59', '2023-12-28 22:24:59'),
(4, 2, 3, 2, 15000, 30000, '2023-12-28 22:26:16', '2023-12-28 22:26:16'),
(5, 2, 4, 2, 115000, 230000, '2023-12-28 22:26:16', '2023-12-28 22:26:16'),
(6, 3, 5, 1, 100000, 100000, '2023-12-28 22:32:01', '2023-12-28 22:32:01'),
(7, 6, 8, 1, 10000, 10000, '2023-12-28 22:35:56', '2023-12-28 22:35:56'),
(10, 8, 3, 1, 15000, 15000, '2023-12-29 14:46:06', '2023-12-29 14:46:06'),
(11, 8, 6, 1, 90000, 90000, '2023-12-29 14:46:06', '2023-12-29 14:46:06'),
(12, 9, 3, 4, 15000, 60000, '2024-01-11 23:37:22', '2024-01-11 23:37:22'),
(13, 9, 8, 1, 10000, 10000, '2024-01-11 23:37:23', '2024-01-11 23:37:23'),
(14, 9, 6, 1, 90000, 90000, '2024-01-11 23:37:23', '2024-01-11 23:37:23'),
(15, 9, 7, 1, 2700000, 2700000, '2024-01-11 23:37:23', '2024-01-11 23:37:23'),
(16, 10, 5, 1, 100000, 100000, '2024-01-11 23:41:09', '2024-01-11 23:41:09'),
(17, 11, 5, 1, 100000, 100000, '2024-01-12 00:25:48', '2024-01-12 00:25:48'),
(18, 12, 6, 1, 90000, 90000, '2024-01-12 00:30:25', '2024-01-12 00:30:25'),
(19, 13, 8, 1, 10000, 10000, '2024-01-12 00:58:59', '2024-01-12 00:58:59'),
(20, 15, 5, 3, 100000, 300000, '2024-01-16 03:00:36', '2024-01-16 03:00:36'),
(21, 15, 7, 1, 2700000, 2700000, '2024-01-16 03:00:36', '2024-01-16 03:00:36'),
(22, 16, 8, 3, 10000, 30000, '2024-01-16 03:01:34', '2024-01-16 03:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('frentzenpp@gmail.com', '$2y$10$/kIqnAW9q2ZyipUpR746hOnnBwY2V5Y6uPFFOd4WSSskVDjffAiii', '2024-01-30 22:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `category_id` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `img` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(191) NOT NULL,
  `trending` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `small_description` tinytext NOT NULL,
  `original_price` bigint(20) NOT NULL,
  `selling_price` bigint(20) NOT NULL,
  `tax_percentage` int(11) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_descrip` varchar(191) NOT NULL,
  `meta_keywords` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `slug`, `img`, `qty`, `status`, `trending`, `description`, `small_description`, `original_price`, `selling_price`, `tax_percentage`, `meta_title`, `meta_descrip`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Monster Hunter World Iceborne', '50', 'monste hunter world', 'https://res.cloudinary.com/dsme2ifqy/image/upload/v1703599096/project_uas/uploads/admin/category/2023-12-26_135813_mhw_bd.jpg', 0, 'Active', 'yes', '📌 Silahkan Cek Bintang Toko Kita (Bintang 5) ⭐⭐⭐⭐⭐ 😉.\r\nRegion 3 / Asia / English\r\n🔹Kondisi Mulus, Lancar dimainkan\r\n🔹Iceborne Edition termasuk = Monster Hunter World + Iceborne.\r\n🔹Game 100% Original/Asli (Resmi Playstation).\r\n🔹Bisa dimainkan di Semua Jenis PS4 & PS5.\r\n🔹Bahasa Inggris / English.\r\n🔹Packing Aman, Free Bubblewrap.', 'Iklan aktif = STOK READY KIRIM, FREEONGKIR.', 250000, 231000, 5, 'Monster Hunter World Iceborne', 'Monster Hunter World Iceborne', 'Monster Hunter World Iceborne', '2023-12-26 06:58:16', '2023-12-28 02:04:39'),
(2, 'Fried Chicken', '43', 'Fried Chicken', 'https://res.cloudinary.com/dsme2ifqy/image/upload/v1703599222/project_uas/uploads/admin/category/2023-12-26_140019_ayam_goreng.jpg', 0, 'Active', 'yes', 'PERHATIAN\r\nTeliti dan bijak sebelum membeli karena barang yang sudah dipesan tidak bisa di kembalikan, belilah produk sesuai kebutuhan,jika ada pertanyaan jangan segan menghubungi kami\r\nPesanan yang masuk diatas jam 6 pagi akan dikirim keesokan harinya', 'PERHATIAN\r\nTeliti dan bijak sebelum membeli karena barang yang sudah dipesan tidak bisa di kembalikan, belilah produk sesuai kebutuhan,jika ada pertanyaan jangan segan menghubungi kami\r\nPesanan yang masuk diatas jam 6 pagi akan dikirim keesokan harinya', 70000, 54900, 5, 'Fried Chicken', 'Fried Chicken', 'Fried Chicken', '2023-12-26 07:00:22', '2023-12-28 22:24:59'),
(3, 'pudding', '43', 'pudding', 'https://res.cloudinary.com/dsme2ifqy/image/upload/v1703599341/project_uas/uploads/admin/category/2023-12-26_140219_puding.jpg', 0, 'Active', 'yes', 'Japanese Milk Pudding / Purin / Pudding Ala Gyukaku.\r\nDengan Brown Sugar\r\n\r\nUkuran 150ml.\r\n\r\n*wajib untuk dimasukkan kulkas terlebih dahulu setelah pudding diterima karena berpotensi cair selama perjalanan. Setelah dimasukkan ke kulkas, teksturnya akan padat kembali selayaknya pudding.', 'Pengiriman hanya via:\r\ngrab (Sameday/Instant)\r\ngojek (Sameday/instant)\r\nShopee Instant', 20000, 15000, 5, 'puding', 'puding', 'puding', '2023-12-26 07:02:21', '2024-01-11 23:37:22'),
(4, 'Meja Laptop Lipat Serbaguna', '44', 'Meja Laptop lipat', 'https://res.cloudinary.com/dsme2ifqy/image/upload/v1703599477/project_uas/uploads/admin/category/2023-12-26_140433_meja2.jpg', 7, 'Active', 'yes', 'Rumaku Meja Laptop Lipat Foldable Desk Zoomer / Meja Belajar Serbaguna\r\n\r\nRumaku memperkenalkan meja lipat Zoomer Fleksibel yang bisa kamu pakai untuk segala kebutuhan!\r\n\r\nDesain modern dan konsep fleksibel yang terdapat pada meja lipet zoomer ini membuat kamu nyaman dan mampu menyesuaikan kebutuhan kamu saat kerja dan belajar.\r\n\r\nDibuat dengan bahan Laminate Pressed Wood sebanyak 3 lapis dijamin tahan lama dan awet karena bahan sudah teruji kokoh, kuat premium terbaik.\r\n\r\nUniknya dari meja ini adalah stage panel zoomer yang terdiri dari 5 tingkat sehingga permukaan meja bisa diangkat naik ke atas sehingga memudahkan kita untuk membaca agar tidak membuat pegal leher.', 'Rumaku, Pilihan Ibu Pintar!', 400000, 115000, 5, 'meja', 'meja', 'meja', '2023-12-26 07:04:37', '2023-12-29 14:44:33'),
(5, 'meja', '44', 'meja', 'https://res.cloudinary.com/dsme2ifqy/image/upload/v1703599566/project_uas/uploads/admin/category/2023-12-26_140605_meja.jpg', 4, 'Active', 'yes', 'Meja kokoh serba guna dan kuat', 'Meja kokoh serba guna dan kuat', 400000, 100000, 5, 'meja', 'meja', 'meja', '2023-12-26 07:06:06', '2024-01-16 03:00:36'),
(6, 'Meja Gaming', '44', 'Meja Gaming', 'https://res.cloudinary.com/dsme2ifqy/image/upload/v1703599627/project_uas/uploads/admin/category/2023-12-26_140704_meja3.jpg', 7, 'Active', 'yes', 'Meja Gaming', 'Meja Gaming', 200000, 90000, 5, 'meja', 'meja', 'meja', '2023-12-26 07:07:07', '2024-01-12 00:30:25'),
(7, 'kursi Gaming', '45', 'Kursi gaming', 'https://res.cloudinary.com/dsme2ifqy/image/upload/v1703599754/project_uas/uploads/admin/category/2023-12-26_140908_kursi_gaming.jpg', 5, 'Not Active', 'yes', 'Kursi gaming', 'kursi gaming', 3000000, 2700000, 5, 'kursi gaming', 'kursi gaming', 'kursi gaming', '2023-12-26 07:09:14', '2024-01-16 03:00:36'),
(8, 'Susu', '43', 'Susu', 'https://res.cloudinary.com/dsme2ifqy/image/upload/v1703643349/project_uas/uploads/admin/category/2023-12-27_021548_milk.jpg', 3, 'Active', 'yes', 'Susu murni asli dari sapi nya langsung dibungkus sedemikian rupa', 'Susu murni asli dari sapi nya langsung dibungkus sedemikian rupa', 15000, 10000, 5, 'susu', 'susu sapi segar', 'susu sapi segar', '2023-12-26 19:15:50', '2024-01-16 03:01:34'),
(9, 'nama', '43', 'slug', 'https://res.cloudinary.com/dsme2ifqy/image/upload/v1706789313/project_uas/uploads/admin/category/2024-02-01_120829_3_serigala.jpg', 1, 'Active', 'yes', 'des', 'small', 1000, 1100, 1, 'ti', 'a', 'aa', '2024-02-01 05:08:34', '2024-02-01 05:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `star` int(11) NOT NULL,
  `review_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `star`, `review_description`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 5, 'Ayam goreng yang satu ini benar-benar luar biasa! Rasanya yang gurih, renyah di luar, dan lembut di dalam membuatnya menjadi sajian yang sulit untuk dilupakan. Secara pribadi, saya adalah penggemar berat ayam goreng, dan produk ini berhasil memenuhi semua ekspektasi saya.', '2024-01-16 19:45:28', '2024-01-16 19:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `akses` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `address1` varchar(191) DEFAULT NULL,
  `address2` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `akses`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_name`, `phone`, `address1`, `address2`, `city`, `state`, `country`) VALUES
(1, 'acen', 'frentzenpp@gmail.com', 'user', NULL, '$2y$10$Qj2ZMt42n2nwXNqnf76Cf.xXpEj7JRMrlALJUNLwkpWnhAleResjG', '656EtRAHNwNcEPBR5jwYbepFKCSGygGuSWo1bLjM1rAQamnVUGVtqW73dVVf', '2023-12-15 04:37:59', '2024-02-02 20:28:59', 'Chandra', '0895605207566', 'Pkp', 'Bukit intan', 'Bangka Belitung', 'Pangkalpinang', 'Indonesia'),
(2, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$Qj2ZMt42n2nwXNqnf76Cf.xXpEj7JRMrlALJUNLwkpWnhAleResjG', '5mUHwiC1wDCTvBFvS29VvhvWjrLIMTkNCbapWK3smBaa2yYRDQVOmtllRUNN', '2023-12-15 08:12:10', '2023-12-15 08:12:10', '', '39848738748', '', '', '', '', ''),
(3, 'acen', 'acen@gmail.com', NULL, NULL, '$2y$10$rLu8CXRBqz2VVAGi7rRtX.S.vRTIT.TwSFSvDlkFCykaCDpxrHMzO', NULL, '2024-02-01 04:45:46', '2024-02-01 04:45:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 1, 3, '2024-01-10 22:31:05', '2024-01-10 22:31:05'),
(5, 1, 5, '2024-01-11 06:49:11', '2024-01-11 06:49:11'),
(6, 1, 8, '2024-01-16 03:01:18', '2024-01-16 03:01:18'),
(7, 1, 9, '2024-02-01 05:09:27', '2024-02-01 05:09:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
