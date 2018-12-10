-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2018 lúc 04:23 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `my-store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date_order` datetime NOT NULL,
  `total` double NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `customer_id`, `date_order`, `total`, `note`, `created_at`, `updated_at`) VALUES
(15, 28, '2018-11-21 07:44:47', 54.45, 'Mua hàng', '2018-11-21 00:44:47', '2018-11-21 00:44:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantily` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_details`
--

INSERT INTO `bill_details` (`id`, `bill_id`, `product_id`, `quantily`, `price`, `created_at`, `updated_at`) VALUES
(19, 12, 11, 1, 45, '2018-11-20 08:10:29', '2018-11-20 08:10:29'),
(20, 13, 11, 1, 45, '2018-11-21 00:23:03', '2018-11-21 00:23:03'),
(21, 14, 11, 1, 45, '2018-11-21 00:43:38', '2018-11-21 00:43:38'),
(22, 15, 11, 1, 45, '2018-11-21 00:44:47', '2018-11-21 00:44:47'),
(23, 16, 11, 2, 45, '2018-12-08 07:41:57', '2018-12-08 07:41:57'),
(24, 17, 11, 1, 45, '2018-12-08 07:43:38', '2018-12-08 07:43:38'),
(25, 18, 11, 1, 45, '2018-12-08 07:45:01', '2018-12-08 07:45:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Womens', 0, 'Products', NULL, NULL),
(2, 'Mens', 0, 'Products', NULL, NULL),
(3, 'Clothing\'s Men', 2, 'Products', NULL, '2018-11-09 00:50:35'),
(4, 'Bags\'s Men', 2, 'Products', NULL, '2018-11-09 00:51:22'),
(5, 'Watches\'s Men', 2, 'Products', NULL, '2018-11-09 00:49:47'),
(6, 'Bags\'s Men', 2, 'Products', NULL, '2018-11-09 00:49:29'),
(7, 'Clothing\'s WoMen', 1, 'Products', NULL, '2018-11-09 00:50:16'),
(8, 'Wallets\'s WoMen', 1, 'Products', NULL, '2018-11-09 00:50:04'),
(9, 'Bagss\'s WoMen', 1, 'Products', NULL, '2018-11-03 20:50:20'),
(10, 'Watchess\'s WoMen', 1, 'Products', NULL, '2018-11-09 00:42:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `idUser`, `id_prod`, `message`, `created_at`, `updated_at`) VALUES
(6, 16, 10, 'hihihi kaka', '2018-11-16 20:32:50', '2018-11-16 20:32:50'),
(9, 16, 10, 'Cái này là cái áo phải không admin', '2018-11-17 05:00:55', '2018-11-17 05:00:55'),
(10, 16, 9, 'Sản phẩm này chưa có bình luận à', '2018-11-17 05:34:07', '2018-11-17 05:34:07'),
(11, 27, 11, 'Ô cái áo này đẹp quá', '2018-11-21 00:48:17', '2018-11-21 00:48:17'),
(12, 16, 11, 'Hạnh muốn mau cái áo nàyk', '2018-11-24 02:22:44', '2018-11-24 02:22:44'),
(13, 28, 11, 'kaka day la 1 binh luan moi', '2018-12-08 07:50:37', '2018-12-08 07:50:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(12, 'user', 'user@gmail.com', 'HCM', 1644519613, NULL, '2018-11-20 08:10:28', '2018-11-20 08:10:28'),
(13, 'Dương Quốc Vĩnh', 'quocvinh.tdc@gmail.com', 'HCM', 1644519613, NULL, '2018-11-21 00:23:02', '2018-11-21 00:23:02'),
(14, 'HoaiPhuong', 'hoaiphuong@gmail.com', 'HCM', 164419613, NULL, '2018-11-21 00:43:38', '2018-11-21 00:43:38'),
(15, 'user', 'user@gmail.com', 'HCM', 1644519613, NULL, '2018-11-21 00:44:47', '2018-11-21 00:44:47'),
(16, 'amin', 'admin@gmail.com', 'HCM', 1644519613, NULL, '2018-12-08 07:41:57', '2018-12-08 07:41:57'),
(17, 'phuongthao', 'phuongthao@gmail.com', 'HCM', 123456789, NULL, '2018-12-08 07:43:38', '2018-12-08 07:43:38'),
(18, 'Duong Quoc Vinh', 'quocvinh.tdc@gmail.com', 'HCM', 123456789, NULL, '2018-12-08 07:45:00', '2018-12-08 07:45:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(28, '2014_10_12_000000_create_users_table', 1),
(29, '2014_10_12_100000_create_password_resets_table', 1),
(30, '2018_10_08_143519_create_categories_table', 1),
(31, '2018_10_08_143807_create_products_table', 1),
(32, '2018_10_08_144355_create_posts_table', 1),
(33, '2018_10_08_144749_create_contacts_table', 1),
(34, '2018_10_08_144956_create_options_table', 1),
(35, '2018_10_08_145141_create_social_accounts_table', 1),
(36, '2018_10_09_130934_create_categogies_table', 1),
(37, '2018_10_14_135727_add_col_into_users_table', 1),
(38, '2018_11_16_045054_create_customers_table', 2),
(39, '2018_11_16_045254_create_bills_table', 2),
(40, '2018_11_16_045430_create_bill_details_table', 2),
(41, '2018_11_17_010251_create_comment_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `adress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(9, 'Party Men\'s Blazer', 261, 'm8.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', 3, '2018-11-15 20:46:18', '2018-11-15 20:46:18'),
(10, 'Formal Blue Shirt', 46, 'm1.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', 3, '2018-11-15 20:48:06', '2018-11-15 20:50:06'),
(11, 'Gabi Full Sleeve Sweatshirt', 45, 'm4.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', 2, '2018-11-15 20:48:51', '2018-11-15 21:15:26'),
(12, 'Dark Blue Track Pants', 81, 'm3.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', 3, '2018-11-15 20:49:46', '2018-11-15 20:49:46'),
(13, 'A-line Black Skirt', 130, 'w1.jpg', 'A-line Black Skirt \r\n- Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', 7, '2018-11-15 20:52:15', '2018-11-15 20:52:15'),
(14, 'Sleeveless Solid Blue Top', 400, 'w4.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', 1, '2018-11-15 20:53:06', '2018-11-15 21:15:17'),
(15, 'Áo thun nữ trung niên 558 An Thủy-Trắng', 249000, '69dd5be136c01e9f2c81bc1a6fe63939.jpg', 'Chất liệu: 65% cotton 35% polyester co giãn nhẹ\r\nĐường may tỉ mỉ, chắc chắn\r\nGam màu thời trang\r\nKiểu dáng trẻ trung, hiện đại', 7, '2018-11-19 00:33:20', '2018-11-19 00:33:20'),
(16, 'Quần Áo Lặn Biển Dài Tay', 699, '1.u5566.d20170827.t223901.58779_2.jpg', 'Chất liệu cao cấp\r\nCo dãn thoải mái\r\nKiểu dáng thời trang\r\nMau khô, chống nắng', 7, '2018-11-19 00:35:20', '2018-11-19 01:31:20'),
(17, 'Áo Khoác Kaki Nữ Có Nón AK45', 230, 'c2c4f75238867932e8035c29cd500f74.jpg', 'Chất liệu kaki 2 lớp, bên trong lót vải dù\r\nKiểu dáng nút bấm, dây kéo bên trong cổ bẻ\r\nThiết kế tay dài bo eo, nón có thể tháo rời\r\nForm áo vừa vặn cơ thể, thoải mái vận động\r\nĐem lại cảm giác thoải mái cho người mặc\r\nMàu sắc đẹp mắt, dễ dàng mix kèm nhiều phụ kiện', 7, '2018-11-19 00:36:56', '2018-11-19 00:46:42'),
(18, 'Áo Nữ Kiểu Trễ Vai Cột Nơ Tay Citino AO-003 - Họa Tiết Trái Tim', 269, '7ee4a6e6661f03373a8609950eca2341.jpg', 'Chất liệu Cotton pha Thiết kế trẻ trung, hiện đại Form suông, trễ vai, tay lửng cột nơ Họa tiết trái tim nữ tính', 7, '2018-11-19 00:37:51', '2018-11-19 00:46:32'),
(20, 'Quần Áo Lặn Biển Dài Tay, Cản Tia UV,', 599, '1.u5566.d20170827.t225314.960465_2.jpg', 'Chất liệu cao cấp Co dãn thoải mái Kiểu dáng thời trang Mau khô, chống nắng', 7, '2018-11-19 00:40:41', '2018-11-19 01:30:36'),
(21, 'Áo Mưa Kiểu Nữ Vải Polyester #350-1 - Hồng', 259, '1.u5168.d20170823.t114340.828821.jpg', 'Màu hồng chấm bi ngọt ngào, nữ tính Dạng váy choàng măng-tô thời trang Chất liệu Polyester phủ PVC Kết cấu 2 lớp cao cấp, dày 0.2mm Phù hợp với các bạn nữ', 7, '2018-11-19 00:41:53', '2018-11-19 00:45:35'),
(22, 'Áo Sơ Mi Nữ Papka 3010 - Hồng Họa Tiết', 231, '6d73f4fc2f944e46bac8bfa9a3296918.jpg', 'Chất liệu vải linen thoáng mát, mềm mịn Áo thấm hút mồ hôi hiệu quả Thiết kế cổ tròn kết hợp tay lửng xinh xắn Tà trước so le nổi bật, hiện đại', 7, '2018-11-19 00:43:42', '2018-11-19 00:45:22'),
(23, 'Áo Thun Nữ T&D Body Need Tay Lỡ Cá Tính D65 - Trắng', 59, 'd65_1.u4064.d20170104.t101601.363772.jpg', 'Chất liệu thun mềm mại, thoáng mát Form áo ôm vừa vặn cơ thể Họa tiết chữ cái phối sọc khác màu trẻ trung Phù hợp để mặc đi học, dạo phố hay du lịch', 7, '2018-11-19 00:48:11', '2018-11-19 00:48:24'),
(24, 'Áo thun nam áo phông trơn của nam màu đen', 79000, 'bcbadb35c2fdb968d1791cbd38eb93fc.jpg', 'Vải thun cotton 65/35: thoáng mát, thấm mồ hôi cực tốt Không xù lông, giặt không phai màu Style áo trẻ trung, dễ phối đồ Luôn đảm bảo chất lượng Màu sắc: Đen, dáng áo body', 3, '2018-11-19 00:52:02', '2018-11-19 00:52:02'),
(25, 'Áo len nam - áo thun nam Siêu Thị 3Q', 399000, 'f1f48f78f6dae27f6dbff5c0e4de71d5.jpg', 'Phong cách nam tính lịch lãm Thiết kế tinh tế Tay dài sành điệu, cá tính Sản phẩm có from dáng chuẩn Hợp thời trang, màu sắc trang nhã', 3, '2018-11-19 00:53:05', '2018-11-19 00:53:05'),
(26, 'Mẫu Áo Khoác Nam Kaneki', 499000, 'b6a89502913f26cbff39986792cbbacf.jpg', 'Áo sáng màu, hình in thấm màu, bảo hành giặt máy thoải mái. Áo đen in lưới chất lượng cao. Kiểu dáng thời trang, áo tay dài, có mũ trùm đầu, có túi ốp ở bụng,khóa kéo chất lượng tốt. Áo dáng xuông, mặc rất thoải mái, dễ phối đồ. Kiểu dáng trẻ trung, nam hay nữ đều mặc được', 3, '2018-11-19 00:54:02', '2018-11-19 01:30:50'),
(27, 'Áo khoác da nam - Áo da nam vk288', 534000, 'c3ea88da149672af8628995d147dacdf.jpg', 'Size M: từ 1m6 55kg đổ lại Size L: từ 1m68 65kg đổ lại Size XL: từ 1m75 75kg đổ lại Size XXL từ 1m8 83kg đổ lại Màu sắc: Đủ màu Chất liệu: Da tổng hợp cao cấp, siêu mềm nhẹ', 3, '2018-11-19 00:55:20', '2018-11-19 00:55:20'),
(28, 'Áo thun nam áo phông trơn của nam màu trắng', 79000, 'ca159d56fe59c07d26da4e116998b912.jpg', 'Vải thun cotton 65/35: thoáng mát, thấm mồ hôi cực tốt Không xù lông, giặt không phai màu Style áo trẻ trung, dễ phối đồ Luôn đảm bảo chất lượng', 3, '2018-11-19 00:56:11', '2018-11-19 00:56:11'),
(29, 'Áo len nam - Áo len YX282', 59000, 'e94b3d2340f23949f9140ee8575604dc.jpg', 'Mã sản phẩm: Áo nam - YX282 Chất liệu: 100% vải sợi tổng hợp và len cao cấp  Size: M, L, XL, 2XL Màu sắc: Len loại pha màu với 3 tông màu chính: đỏ, ghi xám, xanh', 3, '2018-11-19 00:57:28', '2018-11-19 00:57:28'),
(30, 'Áo Ba Lỗ Nam Thể Thao PEAK FW67103', 529000, 'd9d4151d0ab166e218aca32524e2d572.jpg', 'Chất liệu cao cấp Thiết kế thời trang Đường may tỉ mỉ, chắc chắn', 3, '2018-11-19 00:58:27', '2018-11-19 00:58:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_user_id` int(10) UNSIGNED NOT NULL,
  `provider` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `phone`) VALUES
(16, 'Quốc Vĩnh', 'quocvinh.tdc@gmail.com', '$2y$10$jpzDA/Q5eYExogz8rHvQcOKrwSeeQC79wX3TrGEn4jACrlZhqeS76', 'MnHVbEcnw1JMWjnQZQkMI219jM0HVHCyYcYKLkYvy1xRvBoKqPiV9DwP3h9o', '2018-11-16 07:40:53', '2018-11-18 04:23:07', 'supper admin', '0976 285 801'),
(20, 'Thị Huyền', 'huyennguyen@gmail.com', '$2y$10$8YxoTe2mMoZqaskdm5M67OvaVHj4EYZkclUaR4NVsH8ROo/x0Exv.', 'VHAy8eZOKqRRpLVJ4BOw6SRCrK4nEYv4ehb17IPN', '2018-11-18 04:16:48', '2018-11-18 04:16:48', 'admin', '012313131231'),
(21, 'Hữu Tấn', 'huutan@gmail.com', '$2y$10$Zzes7vWmllL/nYUr8CMuZOFeJWmJKoFkvjCoLKX6hCIPnVbsNYjSC', 'VHAy8eZOKqRRpLVJ4BOw6SRCrK4nEYv4ehb17IPN', '2018-11-18 04:17:15', '2018-11-18 04:17:15', 'user', '0123123123'),
(22, 'Bảo Ni', 'baoni@gmail.com', '$2y$10$N1h8/Wj5FDMQsGPrTyiq/.ULcSEsLXQ4786a.d/qS4hqBBryE1tQy', '8eDgj7sSZTvtmdz7johLs0a7NzgBaJb2RLh7trVko57IoxZYKZm5E58dNlJZ', '2018-11-18 04:17:51', '2018-11-18 04:17:51', 'user', '012312312'),
(26, 'Robin', 'Robin@gmail.com', '$2y$10$jnFhki2XMAYDzo6VSxKg..xLPfKXr2Gs0fo9b209OIZhNctiv4Zh.', 'Naq6wCo7sb4y74cCfzowImdkWT2vhM78wxAXNMbXK4zGxzZxGoC19elcXju7', '2018-11-20 07:25:37', '2018-11-20 07:25:37', 'user', '01644519613'),
(27, 'amin', 'admin@gmail.com', '$2y$10$iHR4CxJlGghLYBDT/KQsmetGuZzDYFKOnPsm0m2m.i6M.G6sY8PZ2', 'LD5yeAXZRh3mXvhqWwrIVr4G1m0Bt0405gonbAIN0xEqIDb6C8vP2dxB5rsl', '2018-11-20 07:30:57', '2018-11-20 07:30:57', 'admin', '01644519613'),
(28, 'user', 'user@gmail.com', '$2y$10$SpsiajxWKULf3q0i4/wrEeNfb.XhJvAk5sYfIi5NiGPzgcz.D8CdG', 'WuIh80pyJFt6BM68f6w3MLO72eYgPWyyzCxd1wIhVt7XgWwlY88qFnMWJ5tp', '2018-11-20 08:10:14', '2018-11-20 08:10:14', 'user', '01644519613'),
(29, 'Thu', 'vinhthu@gmail.com', '$2y$10$9OdFuDayKTYRlzceyrfh7e..MCCQM1eS1oQOwO0paTG13P8msm04K', 'Esuf4O37Q2UUdadrSNNlmcKyUnHHEtHWOkVK5AiXx2DEoTcjFLiBRLjcxYVu', '2018-12-06 20:37:59', '2018-12-06 20:37:59', 'user', '0123123123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_accounts_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
