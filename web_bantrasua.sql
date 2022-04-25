-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 04:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_bantrasua`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ma_admin` int(11) NOT NULL,
  `user_admin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_admin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten_admin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt_admin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi_admin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ma_admin`, `user_admin`, `pass_admin`, `hoten_admin`, `sdt_admin`, `diachi_admin`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Lê Diểm Trinh', '0824955654', 'Phú Lộc, Tam Bình, Vĩnh Long');

-- --------------------------------------------------------

--
-- Table structure for table `da`
--

CREATE TABLE `da` (
  `ma_phantramda` int(11) NOT NULL,
  `phantram_da` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `da`
--

INSERT INTO `da` (`ma_phantramda`, `phantram_da`) VALUES
(2, '50 % đá'),
(3, '100% đá'),
(6, 'Đá riêng');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_trasua`
--

CREATE TABLE `danhmuc_trasua` (
  `ma_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhmuc_trasua`
--

INSERT INTO `danhmuc_trasua` (`ma_danhmuc`, `ten_danhmuc`) VALUES
(2, 'Trà trái cây'),
(3, 'Trà Premium kết hợp'),
(5, 'Macchiato Cream Cheese'),
(6, 'Trà sữa');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `ma_donhang` int(11) NOT NULL,
  `ma_giohang` int(11) NOT NULL,
  `ma_admin` int(11) NOT NULL DEFAULT 1,
  `tongtien_donhang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu_nguoidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoigian_dathang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tintrang_donhang` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`ma_donhang`, `ma_giohang`, `ma_admin`, `tongtien_donhang`, `ghichu_nguoidung`, `thoigian_dathang`, `tintrang_donhang`) VALUES
(33, 41, 1, '76000', '', '2022-04-21 10:37:50', 1),
(34, 40, 1, '51000', '', '2022-04-21 10:37:50', 1),
(35, 43, 1, '54000', '', '2022-04-21 10:40:01', 1),
(36, 42, 1, '51000', '', '2022-04-21 10:40:01', 1),
(37, 44, 1, '51000', '', '2022-04-21 10:41:38', 1),
(38, 45, 1, '54000', '', '2022-04-21 10:44:33', 1),
(39, 46, 1, '76000', '', '2022-04-21 10:45:36', 1),
(40, 47, 1, '76000', '', '2022-04-21 11:12:52', 1),
(41, 50, 1, '51000', '', '2022-04-21 12:11:22', 1),
(42, 49, 1, '54000', '', '2022-04-21 12:11:22', 1),
(43, 51, 1, '204000', '', '2022-04-21 12:21:53', 1),
(44, 56, 1, '228000', 'aaaaa', '2022-04-21 15:40:31', 1),
(45, 55, 1, '51000', 'aaaaa', '2022-04-21 15:40:31', 1),
(46, 58, 1, '51000', '', '2022-04-21 17:37:00', 1),
(47, 60, 1, '90000', '', '2022-04-23 15:52:54', 1),
(48, 57, 1, '51000', '', '2022-04-23 20:01:00', 1),
(49, 54, 1, '54000', '', '2022-04-23 20:01:00', 0),
(50, 61, 1, '120000', '', '2022-04-23 20:01:16', 0),
(51, 64, 1, '138000', '', '2022-04-23 20:03:20', 1),
(52, 63, 1, '180000', '', '2022-04-23 20:03:20', 1),
(53, 62, 1, '190000', '', '2022-04-23 20:03:20', 1),
(54, 65, 1, '180000', '', '2022-04-23 20:09:58', 1),
(55, 66, 1, '120000', '', '2022-04-23 20:22:28', 0),
(56, 68, 1, '40000', '', '2022-04-25 08:47:51', 0),
(57, 67, 1, '90000', '', '2022-04-25 08:47:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `duong`
--

CREATE TABLE `duong` (
  `ma_phantramduong` int(11) NOT NULL,
  `phantram_duong` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `duong`
--

INSERT INTO `duong` (`ma_phantramduong`, `phantram_duong`) VALUES
(1, '100 % đường'),
(2, '70% đường'),
(3, '50% đường');

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `ma_giohang` int(11) NOT NULL,
  `ma_trasua` int(11) NOT NULL,
  `ma_phantramda` int(11) NOT NULL,
  `ma_phamtramduong` int(11) NOT NULL,
  `ma_nguoidung` int(11) NOT NULL,
  `soluong_dat` int(11) NOT NULL,
  `tinhtrang_giohang` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`ma_giohang`, `ma_trasua`, `ma_phantramda`, `ma_phamtramduong`, `ma_nguoidung`, `soluong_dat`, `tinhtrang_giohang`) VALUES
(40, 4, 2, 1, 1, 1, 1),
(41, 5, 2, 1, 1, 1, 1),
(42, 4, 2, 1, 1, 1, 1),
(43, 6, 3, 2, 1, 1, 1),
(44, 4, 2, 2, 1, 1, 1),
(45, 6, 2, 2, 1, 1, 1),
(46, 5, 3, 2, 1, 1, 1),
(47, 5, 2, 2, 1, 1, 1),
(49, 6, 2, 2, 1, 1, 1),
(50, 4, 6, 2, 1, 1, 1),
(51, 4, 6, 1, 1, 4, 1),
(54, 6, 3, 1, 1, 1, 1),
(55, 4, 2, 2, 2, 1, 1),
(56, 5, 6, 1, 2, 3, 1),
(57, 4, 3, 1, 1, 1, 1),
(58, 8, 6, 3, 2, 1, 1),
(60, 35, 3, 3, 2, 2, 1),
(61, 29, 6, 3, 1, 2, 1),
(62, 32, 2, 1, 2, 5, 1),
(63, 26, 2, 2, 2, 3, 1),
(64, 16, 6, 1, 2, 2, 1),
(65, 29, 3, 3, 2, 3, 1),
(66, 29, 3, 2, 1, 2, 1),
(67, 35, 6, 3, 1, 2, 1),
(68, 33, 2, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `ma_nguoidung` int(11) NOT NULL,
  `user_nguoidung` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_nguoidung` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten_nguoidung` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt_nguoidung` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi_nguoidung` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`ma_nguoidung`, `user_nguoidung`, `pass_nguoidung`, `hoten_nguoidung`, `sdt_nguoidung`, `diachi_nguoidung`) VALUES
(1, 'diemtrinh', 'd20af5f710bd7425ce004782d6cd5b8d', 'Lê Diểm Trinh', '0824955654', 'Phú Lộc, Tam Bình, Vĩnh Long'),
(2, 'thanhquyen', '9c4a46622f453a605c80cd59596c070b', 'Nguyễn Thanh Quyên', '0111111111', 'Mang Thít, Vĩnh Long');

-- --------------------------------------------------------

--
-- Table structure for table `thongke`
--

CREATE TABLE `thongke` (
  `ma_thongke` int(11) NOT NULL,
  `ma_admin` int(11) NOT NULL DEFAULT 1,
  `tongtien_thongke` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_thongke` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nam_thongke` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thongke`
--

INSERT INTO `thongke` (`ma_thongke`, `ma_admin`, `tongtien_thongke`, `ngay_thongke`, `nam_thongke`) VALUES
(1, 1, '845000', '2022-04-21', '2022'),
(2, 1, '822220', '2022-04-10', '2022'),
(3, 1, '356420', '2022-04-09', '2022'),
(5, 1, '1123000', '2022-04-23', '2022'),
(6, 1, '130000', '2022-04-25', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `trasua`
--

CREATE TABLE `trasua` (
  `ma_trasua` int(11) NOT NULL,
  `ten_trasua` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_danhmuc` int(11) NOT NULL,
  `hinhanh_trasua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_trasua` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tomtat_trasua` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trasua`
--

INSERT INTO `trasua` (`ma_trasua`, `ten_trasua`, `ma_danhmuc`, `hinhanh_trasua`, `gia_trasua`, `tomtat_trasua`) VALUES
(4, 'Combo Đặc Biệt Double Tea', 6, '0969985512 . 2-removebg-preview.png', '51000', '<p>Tr&agrave; sữa Double Tea đặc biệt kết hợp c&ugrave;ng tr&acirc;n ch&acirc;u mật png, pudding socola, 3 vi&ecirc;n ph&ocirc; mai cafe.&nbsp;</p>\r\n'),
(5, 'Combo Đặc Biệt Trà sữa Premium', 3, 'e284d5aee7 . 3-removebg-preview.png', '76000', '<p>Tr&agrave; sữa&nbsp;Premium cao cấp&nbsp;kết hợp c&ugrave;ng sốt cẩm thạch thơm ngon, pudding trứng v&agrave; 3 vi&ecirc;n ph&ocirc; mai cafe.&nbsp;</p>\r\n'),
(6, 'Combo Đặc Biệt', 1, 'd31911e8ec . 4-removebg-preview.png', '54000', '<p>Tr&agrave; sữa truyền thống kết hợp Tr&acirc;n ch&acirc;u củ năng, Tr&acirc;n ch&acirc;u tươi Khoai m&ocirc;n, Pudding trứng, Vi&ecirc;n ph&ocirc; mai caf&eacute; v&agrave; Kh&uacute;c bạch ph&ocirc; mai.</p>\r\n'),
(8, 'Combo Đặc Biệt Double Tea', 6, 'd0386bca05 . 1.jpg', '51000', '<p>Tr&agrave; sữa Double Tea đặc biệt kết hợp c&ugrave;ng tr&acirc;n ch&acirc;u mật png, pudding socola, 3 vi&ecirc;n ph&ocirc; mai cafe.</p>\r\n'),
(12, 'Trà trái cây hồng hạc', 2, 'c3c1de3d72 . honghac.jpg', '69000', '<p>Sự kết hợp độc đ&aacute;o từ hương LỤC TR&Agrave; c&ugrave;ng vị tr&aacute;i c&acirc;y tươi ổi hồng c&ocirc; đặc thơm lừng v&agrave; chanh d&acirc;y tươi, k&egrave;m cam mỹ nhập khẩu loại 1, dưa hấu hắc mỹ nh&acirc;n kh&ocirc;ng hạt v&agrave; cam v&agrave;ng.</p>\r\n'),
(13, 'Trà sữa Bạc hà', 6, '6c11866927 . ts_bacha.png', '33000', '<p>Tr&agrave; sữa truyền thống kết hợp c&ugrave;ng vị bạc h&agrave; m&aacute;t lạnh sảng kho&aacute;i.</p>\r\n'),
(14, 'Trà trái cây hồng ngọc', 2, '731ea9149e . hongngoc.jpg', '69000', '<p>Sự kết hợp độc đ&aacute;o từ hương LỤC TR&Agrave; c&ugrave;ng vị tr&aacute;i c&acirc;y tươi đ&agrave;o xay v&agrave; d&acirc;u xay, k&egrave;m dưa hấu kh&ocirc;ng hạt v&agrave; tr&aacute;i vải tươi.</p>\r\n'),
(15, 'Trà trái cây lục ngọc', 2, 'b1a2ba290a . lucngoc.jpg', '69000', '<p>Sự kết hợp độc đ&aacute;o từ hương LỤC TR&Agrave; c&ugrave;ng vị tr&aacute;i c&acirc;y tươi dưa lưới ngọt dịu h&ograve;a c&ugrave;ng vị thanh m&aacute;t bạc h&agrave;, k&egrave;m dưa hấu kh&ocirc;ng hạt v&agrave; đ&agrave;o miếng.</p>\r\n'),
(16, ' Trà trái cây nhiệt đới', 2, '37048d6c84 . nhietdoi.jpg', '69000', '<p>Sự kết hợp độc đ&aacute;o từ hương HỒNG TR&Agrave; c&ugrave;ng vị tr&aacute;i c&acirc;y tươi nhiệt đới, k&egrave;m tr&aacute;i vải tươi, đ&agrave;o miếng v&agrave; cam v&agrave;ng.</p>\r\n'),
(17, 'Song vị nhiệt đới', 2, 'a4d3fd903c . songnhietdoi.jpg', '69000', '<p>Hồng tr&agrave; mang hương vị đ&agrave;o kết hợp c&ugrave;ng tr&aacute;i c&acirc;y tươi đ&agrave;o miếng v&agrave; tr&aacute;i vải.</p>\r\n'),
(18, ' Song vị tươi mát', 2, '7cf7b14407 . tuoimat.jpg', '69000', '<p>Lục tr&agrave; mang hương vị chua nhẹ của tắc h&ograve;a quyện vị ngọt của d&acirc;u kết hợp c&ugrave;ng thủy tinh cầu vồng.</p>\r\n'),
(19, ' Trà sữa Café', 6, '8cff275d74 . ts_cf.png', '33000', '<p>Tr&agrave; sữa truyền thống kết hợp c&ugrave;ng vị s&aacute;nh đậm của c&agrave; ph&ecirc; nguy&ecirc;n chất thơm lừng.</p>\r\n'),
(20, 'Trà sữa Khoai Môn', 6, '8e5cf3d3c5 . ts_khoaimon.png', '33000', '<p>Tr&agrave; sữa truyền thống kết hợp c&ugrave;ng vị khoai m&ocirc;n ngọt thơm.</p>\r\n'),
(21, 'Trà Sữa Socola', 6, '522f906f4e . ts_scl.png', '33000', '<p>Tr&agrave; sữa truyền thống kết hợp c&ugrave;ng bột socola nguy&ecirc;n chất kh&ocirc;ng đường, ngọt vừa, đậm đ&agrave; vị socola.</p>\r\n'),
(22, 'Trà sữa Phô mai', 6, '17c5517d42 . ts_phomai.png', '33000', '<p>Tr&agrave; sữa truyền thống kết hợp c&ugrave;ng vị ph&ocirc; mai thơm b&eacute;o đặc trưng nhưng kh&ocirc;ng g&acirc;y ng&aacute;n.</p>\r\n'),
(23, ' Trà Sữa Matcha', 6, 'c34188dbfc . ts_matcha.png', '33000', '<p>Tr&agrave; sữa truyền thống kết hợp c&ugrave;ng vị thơm lừng, thanh m&aacute;t của bột Matcha Nhật Bản.</p>\r\n'),
(24, 'Trà xanh premium kem muối', 3, '0382e1a33a . traxanhmui.png', '58000', '<p>Tr&agrave; xanh được l&agrave;m từ nguy&ecirc;n liệu cao cấp theo c&ocirc;ng thức đặc biệt, vị ngọt nhẹ kết hợp c&ugrave;ng lớp kem muối b&eacute;o mặn b&ecirc;n tr&ecirc;n.</p>\r\n'),
(25, ' Trà sữa premium', 3, '47cd3af91d . ts_premium.png', '48000', '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu cao cấp theo c&ocirc;ng thức đặc biệt, vị ngọt nhẹ, tốt cho sức khỏe.</p>\r\n'),
(26, 'Trà sữa Premium kem phô mai machiato', 3, '1cd9fa6baa . phomai_pre.png', '60000', '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu cao cấp theo c&ocirc;ng thức đặc biệt, vị ngọt nhẹ kết hợp c&ugrave;ng lớp kem ph&ocirc; mai macchiato b&eacute;o thanh ngọt b&ecirc;n tr&ecirc;n.</p>\r\n'),
(27, ' Trà sữa premium, sốt cẩm thạch', 3, 'd929738d72 . pre_sotcamthach.png', '60000', '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu cao cấp theo c&ocirc;ng thức đặc biệt, vị ngọt nhẹ kết hợp c&ugrave;ng tr&acirc;n ch&acirc;u trắng.</p>\r\n'),
(28, 'Trà xanh premium, sợi dai Đào Fuji', 3, 'a74b975879 . pre_soidaidao.png', '58000', '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu cao cấp theo c&ocirc;ng thức đặc biệt, vị ngọt nhẹ kết hợp c&ugrave;ng sợi dai khoai m&ocirc;n.</p>\r\n'),
(29, ' Trà sữa premium, sợi dai matcha', 3, '7823671b0a . soidai_matcha_pre.png', '60000', '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu cao cấp theo c&ocirc;ng thức đặc biệt, vị ngọt nhẹ kết hợp c&ugrave;ng sợi dai matcha.</p>\r\n'),
(30, 'Hồng Trà Kem phô mai Machiato', 5, 'c2ff12e743 . hongtra.png', '35000', '<p>Hồng tr&agrave; thanh m&aacute;t nguy&ecirc;n chất kết hợp c&ugrave;ng lớp kem ph&ocirc; mai macchiato b&eacute;o ngọt b&ecirc;n tr&ecirc;n.</p>\r\n'),
(31, ' Lục trà Kem muối', 5, '4abcd22da2 . luctra.png', '35000', '<p>Lục tr&agrave; đậm vị kết hợp c&ugrave;ng lớp kem muối b&eacute;o mặn b&ecirc;n tr&ecirc;n.</p>\r\n'),
(32, 'Trà sữa kem phô mai macchiato', 5, '866664a961 . phomai.png', '38000', '<p>Tr&agrave; sữa truyền thống c&ugrave;ng lớp kem ph&ocirc; mai macchiato b&eacute;o ngọt b&ecirc;n tr&ecirc;n.</p>\r\n'),
(33, 'Double tea Kem Muối', 5, '0db3889c53 . doubletea.png', '40000', '<p>Double tea đậm tr&agrave; c&ugrave;ng lớp kem muối b&eacute;o mặn b&ecirc;n tr&ecirc;n.</p>\r\n'),
(34, ' Matcha latte macchiato', 5, 'abbad4d0ea . latte.png', '45000', '<p>Sự h&ograve;a quyện giữa Sữa v&agrave; bột Matcha Nhật Bản. B&eacute;o dịu, ngọt vừa, đậm đ&agrave; vị Matcha c&ugrave;ng lớp kem macchiato b&eacute;o ngọt b&ecirc;n tr&ecirc;n.</p>\r\n'),
(35, 'Socola latte macchiato', 5, 'b56405daef . scl.png', '45000', '<p>Sự h&ograve;a quyện giữa Sữa v&agrave; bột Socola nguy&ecirc;n chất. B&eacute;o dịu, ngọt vừa, đậm đ&agrave; vị Socola c&ugrave;ng lớp kem macchiato b&eacute;o ngọt b&ecirc;n tr&ecirc;n.</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ma_admin`);

--
-- Indexes for table `da`
--
ALTER TABLE `da`
  ADD PRIMARY KEY (`ma_phantramda`);

--
-- Indexes for table `danhmuc_trasua`
--
ALTER TABLE `danhmuc_trasua`
  ADD PRIMARY KEY (`ma_danhmuc`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ma_donhang`),
  ADD KEY `ma_giohang` (`ma_giohang`),
  ADD KEY `ma_admin` (`ma_admin`);

--
-- Indexes for table `duong`
--
ALTER TABLE `duong`
  ADD PRIMARY KEY (`ma_phantramduong`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`ma_giohang`),
  ADD KEY `ma_trasua` (`ma_trasua`),
  ADD KEY `ma_phantramda` (`ma_phantramda`),
  ADD KEY `ma_phamtramduong` (`ma_phamtramduong`),
  ADD KEY `ma_nguoidung` (`ma_nguoidung`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`ma_nguoidung`);

--
-- Indexes for table `thongke`
--
ALTER TABLE `thongke`
  ADD PRIMARY KEY (`ma_thongke`),
  ADD KEY `ma_admin` (`ma_admin`);

--
-- Indexes for table `trasua`
--
ALTER TABLE `trasua`
  ADD PRIMARY KEY (`ma_trasua`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ma_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `da`
--
ALTER TABLE `da`
  MODIFY `ma_phantramda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `danhmuc_trasua`
--
ALTER TABLE `danhmuc_trasua`
  MODIFY `ma_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ma_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `duong`
--
ALTER TABLE `duong`
  MODIFY `ma_phantramduong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `ma_giohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `ma_nguoidung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thongke`
--
ALTER TABLE `thongke`
  MODIFY `ma_thongke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trasua`
--
ALTER TABLE `trasua`
  MODIFY `ma_trasua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`ma_giohang`) REFERENCES `giohang` (`ma_giohang`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`ma_admin`) REFERENCES `admin` (`ma_admin`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`ma_trasua`) REFERENCES `trasua` (`ma_trasua`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`ma_phantramda`) REFERENCES `da` (`ma_phantramda`),
  ADD CONSTRAINT `giohang_ibfk_3` FOREIGN KEY (`ma_phamtramduong`) REFERENCES `duong` (`ma_phantramduong`),
  ADD CONSTRAINT `giohang_ibfk_4` FOREIGN KEY (`ma_nguoidung`) REFERENCES `nguoidung` (`ma_nguoidung`);

--
-- Constraints for table `thongke`
--
ALTER TABLE `thongke`
  ADD CONSTRAINT `thongke_ibfk_1` FOREIGN KEY (`ma_admin`) REFERENCES `admin` (`ma_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
