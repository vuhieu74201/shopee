-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2021 lúc 06:22 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopee`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `iddanhmuc` int(11) NOT NULL,
  `stt` int(11) NOT NULL,
  `tendanhmuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`iddanhmuc`, `stt`, `tendanhmuc`) VALUES
(18, 1, 'Apple'),
(19, 2, 'Samsung'),
(20, 3, 'Oppo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `idgiohang` int(255) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `tensanpham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anhsanpham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mausac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(255) NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`idgiohang`, `idsanpham`, `tensanpham`, `anhsanpham`, `mausac`, `soluong`, `gia`) VALUES
(161, 10, ' IPhone 12 Pro Max 256GB ', 'iphone12.png', 'Đen ', 1, 29000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbadmin`
--

CREATE TABLE `tbadmin` (
  `id_admin` int(11) NOT NULL,
  `ten_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbadmin`
--

INSERT INTO `tbadmin` (`id_admin`, `ten_admin`, `password`, `fullname`, `sdt`) VALUES
(1, 'admin', '123456', 'Vũ Minh Hiếu', 1234),
(2, 'admin2', '123456', '', 654321);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitiethoadon`
--

CREATE TABLE `tbl_chitiethoadon` (
  `id_chitiethoadon` int(11) NOT NULL,
  `madonhang` varchar(255) NOT NULL,
  `idnguoidung` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `soluongmua` int(255) NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  `ngaymua` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitiethoadon`
--

INSERT INTO `tbl_chitiethoadon` (`id_chitiethoadon`, `madonhang`, `idnguoidung`, `idsanpham`, `soluongmua`, `ghichu`, `ngaymua`) VALUES
(49, '1025', 2, 10, 1, '', '2021-12-22 13:15:44'),
(50, '6837', 2, 20, 1, '', '2021-12-22 13:16:19'),
(51, '6837', 2, 15, 3, '', '2021-12-22 13:16:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id_donhang` int(11) NOT NULL,
  `idnguoidung` int(255) NOT NULL,
  `idsanpham` int(255) NOT NULL,
  `madonhang` varchar(255) NOT NULL,
  `ngaydat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trangthai` varchar(255) NOT NULL,
  `hinhthucthanhtoan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id_donhang`, `idnguoidung`, `idsanpham`, `madonhang`, `ngaydat`, `trangthai`, `hinhthucthanhtoan`) VALUES
(62, 2, 10, '1025', '2021-12-22 14:02:10', '1', '0'),
(63, 2, 20, '6837', '2021-12-22 15:22:19', '', '0'),
(64, 2, 15, '6837', '2021-12-22 15:22:19', '', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbnguoidung`
--

CREATE TABLE `tbnguoidung` (
  `idnguoidung` int(255) NOT NULL,
  `taikhoan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thangsinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namsinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbnguoidung`
--

INSERT INTO `tbnguoidung` (`idnguoidung`, `taikhoan`, `fullname`, `matkhau`, `email`, `sdt`, `diachi`, `gioitinh`, `avatar`, `ngaysinh`, `thangsinh`, `namsinh`) VALUES
(2, 'admin', 'minh hiếu ', '123456', 'vuhieu74201@gmail.com', '0942131', 'Hà Nội', '1', 'apple.png', '3', '11', '2001'),
(27, 'vuhieu', 'hiếu vũ Minh', '123456', 'admin123@gmail.com', '0421312', 'nam định', '0', 'apple.png', '7', '4', '2001'),
(37, 'vuhieu7420', 'vu hieu', '1234', '', '02312', 'ha noi', '', '', '', '', ''),
(38, 'vuhieu7420211', 'dsads', '1234', '', '1312321', 'ha noi', '', '', '', '', ''),
(39, 'hieu12321', 'VŨ MINH HIẾU', '123123', 'vuhieu74201@gmail.com', '0973037211', 'Hà nội', '0', 'avt.png', '7', '4', '2001');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbsanpham`
--

CREATE TABLE `tbsanpham` (
  `idsanpham` int(11) NOT NULL,
  `masp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tensanpham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anhsanpham` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mota` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `mausac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(255) NOT NULL,
  `gia` int(255) NOT NULL,
  `iddanhmuc` int(11) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbsanpham`
--

INSERT INTO `tbsanpham` (`idsanpham`, `masp`, `tensanpham`, `anhsanpham`, `mota`, `mausac`, `soluong`, `gia`, `iddanhmuc`, `trangthai`) VALUES
(10, '800', ' IPhone 12 Pro Max 256GB ', 'iphone12.png', '<p>iPhone 12 Pro. M&agrave;n h&igrave;nh Super Retina XDR 6.1 inch s&aacute;ng đẹp ấn tượng (1). Ceramic Shield với khả năng chịu va đập khi rơi tốt hơn gấp 4 lần (2). Ảnh chụp tuyệt đẹp trong điều kiện &aacute;nh s&aacute;ng yếu với hệ thống camera chuy&ecirc;n nghiệp mới v&agrave; phạm vi thu ph&oacute;ng quang học 4x. Quay phim, bi&ecirc;n tập v&agrave; ph&aacute;t video Dolby Vision đẳng cấp điện ảnh. Chụp ảnh ch&acirc;n dung ở chế độ Ban Đ&ecirc;m v&agrave; trải nghiệm thực tế ảo tăng cường đẳng cấp mới với LiDAR Scanner. Chip A14 Bionic mạnh mẽ. Cho bất tận những năng lực ấn tượng.</p>\r\n\r\n<p>T&iacute;nh năng nổi bật</p>\r\n\r\n<p>&bull; M&agrave;n h&igrave;nh Super Retina XDR 6.1 inch (1)</p>\r\n\r\n<p>&bull; Ceramic Shield, chất liệu k&iacute;nh bền chắc nhất từng c&oacute; tr&ecirc;n điện thoại th&ocirc;ng minh &bull; A14 Bionic, chip nhanh nhất từng c&oacute; tr&ecirc;n điện thoại th&ocirc;ng minh</p>\r\n\r\n<p>&bull; Hệ thống camera chuy&ecirc;n nghiệp 12MP với c&aacute;c camera Ultra Wide, Wide v&agrave; Telephoto; phạm vi thu ph&oacute;ng quang học 4x; chế độ Ban Đ&ecirc;m, Deep Fusion, HDR th&ocirc;ng minh thế hệ 3, Apple ProRAW (3), khả năng quay video HDR Dolby Vision 4K</p>\r\n\r\n<p>&bull; LiDAR Scanner cải thiện trải nghiệm thực tế ảo tăng cường v&agrave; chụp ảnh ch&acirc;n dung ở chế độ Ban Đ&ecirc;m &bull; Camera trước TrueDepth 12MP với chế độ Ban Đ&ecirc;m v&agrave; khả năng quay video HDR Dolby Vision 4K &bull; Khả năng chống nước đạt chuẩn IP68 đứng đầu thị trường (4)</p>\r\n\r\n<p>&bull; iOS 14 với c&aacute;c tiện &iacute;ch được thiết kế lại tr&ecirc;n M&agrave;n H&igrave;nh Ch&iacute;nh, Thư Viện Ứng Dụng ho&agrave;n to&agrave;n mới, App Clips c&ugrave;ng nhiều t&iacute;nh năng kh&aacute;c.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;</p>\r\n\r\n<p>(1) M&agrave;n h&igrave;nh c&oacute; c&aacute;c g&oacute;c bo tr&ograve;n. Khi t&iacute;nh theo h&igrave;nh chữ nhật, k&iacute;ch thước m&agrave;n h&igrave;nh l&agrave; 6.06 inch theo đường ch&eacute;o. Diện t&iacute;ch hiển thị thực tế nhỏ hơn.</p>\r\n\r\n<p>(2) X&aacute;c nhận dựa v&agrave;o mặt trước c&oacute; Ceramic Shield của iPhone 12 Pro so với iPhone thế hệ trước.</p>\r\n\r\n<p>(3) Apple ProRAW sắp ra mắt.</p>\r\n\r\n<p>(4) iPhone 12 Pro Max c&oacute; khả năng chống tia nước, chống nước v&agrave; chống bụi. Sản phẩm đ&atilde; qua kiểm nghiệm trong điều kiện ph&ograve;ng th&iacute; nghiệm c&oacute; kiểm so&aacute;t đạt mức IP68 theo ti&ecirc;u chuẩn IEC 60529 (chống nước ở độ s&acirc;u tối đa 6 m&eacute;t trong v&ograve;ng tối đa 30 ph&uacute;t). Khả năng chống tia nước, chống nước v&agrave; chống bụi kh&ocirc;ng phải l&agrave; c&aacute;c điều kiện vĩnh viễn. Khả năng n&agrave;y c&oacute; thể giảm do hao m&ograve;n th&ocirc;ng thường. Kh&ocirc;ng sạc pin khi iPhone đang bị ướt. Vui l&ograve;ng tham khảo hướng dẫn sử dụng để biết c&aacute;ch lau sạch v&agrave; l&agrave;m kh&ocirc; m&aacute;y. Kh&ocirc;ng bảo h&agrave;nh sản phẩm bị hỏng do thấm chất lỏng.</p>\r\n\r\n<p>Bộ sản phẩm bao gồm:</p>\r\n\r\n<p>&bull; Điện thoại</p>\r\n\r\n<p>&bull; D&acirc;y sạc</p>\r\n\r\n<p>&bull; HDSD Bảo h&agrave;nh điện tử 12 th&aacute;ng.</p>\r\n', 'Đen ', 145, 29000000, 18, 1),
(11, '5179', 'Samsung', 'iphone12.png', '', 'vàng', 25, 24000000, 19, 1),
(12, '4', 'Samsung Flex', 'hkc_mb24v9_gearvn_be09fd4ac7104552977afe25336e55b1_large.jpg', '', 'xanh', 25, 30000000, 19, 1),
(13, '213', 'oppo', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'vàng', 12, 12300000, 20, 1),
(14, '214', 'iphone 12', 'iphone.png', '', 'xanh', 42, 32000000, 18, 1),
(15, '1', 'apple', '4.png', '', 'xanh', 5, 3900000, 18, 1),
(19, '241', 'macbook', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'trắng', 12, 30000000, 18, 1),
(20, '7842', 'IPhone 13 Pro Max 256G', 'iphone13.png', '<p><a href=\"https://www.thegioididong.com/dtdd/iphone-13-pro-max\" target=\"_blank\">iPhone 13 Pro Max 128GB</a>&nbsp;- si&ecirc;u phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ&nbsp;<a href=\"https://www.thegioididong.com/apple\" target=\"_blank\">Apple</a>. M&aacute;y c&oacute; thiết kế kh&ocirc;ng mấy đột ph&aacute; khi so với người tiền nhiệm, b&ecirc;n trong đ&acirc;y vẫn l&agrave; một sản phẩm c&oacute; m&agrave;n h&igrave;nh si&ecirc;u đẹp, tần số qu&eacute;t được n&acirc;ng cấp l&ecirc;n 120 Hz mượt m&agrave;, cảm biến camera c&oacute; k&iacute;ch thước lớn hơn, c&ugrave;ng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn s&agrave;ng c&ugrave;ng bạn chinh phục mọi thử th&aacute;ch.</p>\r\n', 'vàng', 213, 32000000, 18, 1),
(21, '398', ' IPhone 12 Pro Max 256GB ', 'iphone12.png', '<p>iPhone 12 Pro. M&agrave;n h&igrave;nh Super Retina XDR 6.1 inch s&aacute;ng đẹp ấn tượng (1). Ceramic Shield với khả năng chịu va đập khi rơi tốt hơn gấp 4 lần (2). Ảnh chụp tuyệt đẹp trong điều kiện &aacute;nh s&aacute;ng yếu với hệ thống camera chuy&ecirc;n nghiệp mới v&agrave; phạm vi thu ph&oacute;ng quang học 4x. Quay phim, bi&ecirc;n tập v&agrave; ph&aacute;t video Dolby Vision đẳng cấp điện ảnh. Chụp ảnh ch&acirc;n dung ở chế độ Ban Đ&ecirc;m v&agrave; trải nghiệm thực tế ảo tăng cường đẳng cấp mới với LiDAR Scanner. Chip A14 Bionic mạnh mẽ. Cho bất tận những năng lực ấn tượng.</p>\r\n\r\n<p>T&iacute;nh năng nổi bật</p>\r\n\r\n<p>&bull; M&agrave;n h&igrave;nh Super Retina XDR 6.1 inch (1)</p>\r\n\r\n<p>&bull; Ceramic Shield, chất liệu k&iacute;nh bền chắc nhất từng c&oacute; tr&ecirc;n điện thoại th&ocirc;ng minh &bull; A14 Bionic, chip nhanh nhất từng c&oacute; tr&ecirc;n điện thoại th&ocirc;ng minh</p>\r\n\r\n<p>&bull; Hệ thống camera chuy&ecirc;n nghiệp 12MP với c&aacute;c camera Ultra Wide, Wide v&agrave; Telephoto; phạm vi thu ph&oacute;ng quang học 4x; chế độ Ban Đ&ecirc;m, Deep Fusion, HDR th&ocirc;ng minh thế hệ 3, Apple ProRAW (3), khả năng quay video HDR Dolby Vision 4K</p>\r\n\r\n<p>&bull; LiDAR Scanner cải thiện trải nghiệm thực tế ảo tăng cường v&agrave; chụp ảnh ch&acirc;n dung ở chế độ Ban Đ&ecirc;m &bull; Camera trước TrueDepth 12MP với chế độ Ban Đ&ecirc;m v&agrave; khả năng quay video HDR Dolby Vision 4K &bull; Khả năng chống nước đạt chuẩn IP68 đứng đầu thị trường (4)</p>\r\n\r\n<p>&bull; iOS 14 với c&aacute;c tiện &iacute;ch được thiết kế lại tr&ecirc;n M&agrave;n H&igrave;nh Ch&iacute;nh, Thư Viện Ứng Dụng ho&agrave;n to&agrave;n mới, App Clips c&ugrave;ng nhiều t&iacute;nh năng kh&aacute;c.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;</p>\r\n\r\n<p>(1) M&agrave;n h&igrave;nh c&oacute; c&aacute;c g&oacute;c bo tr&ograve;n. Khi t&iacute;nh theo h&igrave;nh chữ nhật, k&iacute;ch thước m&agrave;n h&igrave;nh l&agrave; 6.06 inch theo đường ch&eacute;o. Diện t&iacute;ch hiển thị thực tế nhỏ hơn.</p>\r\n\r\n<p>(2) X&aacute;c nhận dựa v&agrave;o mặt trước c&oacute; Ceramic Shield của iPhone 12 Pro so với iPhone thế hệ trước.</p>\r\n\r\n<p>(3) Apple ProRAW sắp ra mắt.</p>\r\n\r\n<p>(4) iPhone 12 Pro Max c&oacute; khả năng chống tia nước, chống nước v&agrave; chống bụi. Sản phẩm đ&atilde; qua kiểm nghiệm trong điều kiện ph&ograve;ng th&iacute; nghiệm c&oacute; kiểm so&aacute;t đạt mức IP68 theo ti&ecirc;u chuẩn IEC 60529 (chống nước ở độ s&acirc;u tối đa 6 m&eacute;t trong v&ograve;ng tối đa 30 ph&uacute;t). Khả năng chống tia nước, chống nước v&agrave; chống bụi kh&ocirc;ng phải l&agrave; c&aacute;c điều kiện vĩnh viễn. Khả năng n&agrave;y c&oacute; thể giảm do hao m&ograve;n th&ocirc;ng thường. Kh&ocirc;ng sạc pin khi iPhone đang bị ướt. Vui l&ograve;ng tham khảo hướng dẫn sử dụng để biết c&aacute;ch lau sạch v&agrave; l&agrave;m kh&ocirc; m&aacute;y. Kh&ocirc;ng bảo h&agrave;nh sản phẩm bị hỏng do thấm chất lỏng.</p>\r\n\r\n<p>Bộ sản phẩm bao gồm:</p>\r\n\r\n<p>&bull; Điện thoại</p>\r\n\r\n<p>&bull; D&acirc;y sạc</p>\r\n\r\n<p>&bull; HDSD Bảo h&agrave;nh điện tử 12 th&aacute;ng.</p>\r\n', 'Đen ', 145, 29000000, 18, 1),
(22, '5179', 'Samsung', 'iphone12.png', '', 'vàng', 25, 24000000, 19, 1),
(23, '4', 'Samsung Flex', 'hkc_mb24v9_gearvn_be09fd4ac7104552977afe25336e55b1_large.jpg', '', 'xanh', 25, 30000000, 19, 1),
(24, '213', 'oppo', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'vàng', 12, 12300000, 20, 1),
(25, '214', 'iphone 12', 'iphone.png', '', 'xanh', 42, 32000000, 18, 1),
(26, '1', 'apple', '4.png', '', 'xanh', 5, 3900000, 18, 1),
(27, '241', 'macbook', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'trắng', 12, 30000000, 18, 1),
(28, '7842', 'IPhone 13 Pro Max 256G', 'iphone13.png', '<p><a href=\"https://www.thegioididong.com/dtdd/iphone-13-pro-max\" target=\"_blank\">iPhone 13 Pro Max 128GB</a>&nbsp;- si&ecirc;u phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ&nbsp;<a href=\"https://www.thegioididong.com/apple\" target=\"_blank\">Apple</a>. M&aacute;y c&oacute; thiết kế kh&ocirc;ng mấy đột ph&aacute; khi so với người tiền nhiệm, b&ecirc;n trong đ&acirc;y vẫn l&agrave; một sản phẩm c&oacute; m&agrave;n h&igrave;nh si&ecirc;u đẹp, tần số qu&eacute;t được n&acirc;ng cấp l&ecirc;n 120 Hz mượt m&agrave;, cảm biến camera c&oacute; k&iacute;ch thước lớn hơn, c&ugrave;ng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn s&agrave;ng c&ugrave;ng bạn chinh phục mọi thử th&aacute;ch.</p>\r\n', 'vàng', 213, 32000000, 18, 1),
(29, '800', ' IPhone 12 Pro Max 256GB ', 'iphone12.png', '<p>iPhone 12 Pro. M&agrave;n h&igrave;nh Super Retina XDR 6.1 inch s&aacute;ng đẹp ấn tượng (1). Ceramic Shield với khả năng chịu va đập khi rơi tốt hơn gấp 4 lần (2). Ảnh chụp tuyệt đẹp trong điều kiện &aacute;nh s&aacute;ng yếu với hệ thống camera chuy&ecirc;n nghiệp mới v&agrave; phạm vi thu ph&oacute;ng quang học 4x. Quay phim, bi&ecirc;n tập v&agrave; ph&aacute;t video Dolby Vision đẳng cấp điện ảnh. Chụp ảnh ch&acirc;n dung ở chế độ Ban Đ&ecirc;m v&agrave; trải nghiệm thực tế ảo tăng cường đẳng cấp mới với LiDAR Scanner. Chip A14 Bionic mạnh mẽ. Cho bất tận những năng lực ấn tượng.</p>\r\n\r\n<p>T&iacute;nh năng nổi bật</p>\r\n\r\n<p>&bull; M&agrave;n h&igrave;nh Super Retina XDR 6.1 inch (1)</p>\r\n\r\n<p>&bull; Ceramic Shield, chất liệu k&iacute;nh bền chắc nhất từng c&oacute; tr&ecirc;n điện thoại th&ocirc;ng minh &bull; A14 Bionic, chip nhanh nhất từng c&oacute; tr&ecirc;n điện thoại th&ocirc;ng minh</p>\r\n\r\n<p>&bull; Hệ thống camera chuy&ecirc;n nghiệp 12MP với c&aacute;c camera Ultra Wide, Wide v&agrave; Telephoto; phạm vi thu ph&oacute;ng quang học 4x; chế độ Ban Đ&ecirc;m, Deep Fusion, HDR th&ocirc;ng minh thế hệ 3, Apple ProRAW (3), khả năng quay video HDR Dolby Vision 4K</p>\r\n\r\n<p>&bull; LiDAR Scanner cải thiện trải nghiệm thực tế ảo tăng cường v&agrave; chụp ảnh ch&acirc;n dung ở chế độ Ban Đ&ecirc;m &bull; Camera trước TrueDepth 12MP với chế độ Ban Đ&ecirc;m v&agrave; khả năng quay video HDR Dolby Vision 4K &bull; Khả năng chống nước đạt chuẩn IP68 đứng đầu thị trường (4)</p>\r\n\r\n<p>&bull; iOS 14 với c&aacute;c tiện &iacute;ch được thiết kế lại tr&ecirc;n M&agrave;n H&igrave;nh Ch&iacute;nh, Thư Viện Ứng Dụng ho&agrave;n to&agrave;n mới, App Clips c&ugrave;ng nhiều t&iacute;nh năng kh&aacute;c.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;</p>\r\n\r\n<p>(1) M&agrave;n h&igrave;nh c&oacute; c&aacute;c g&oacute;c bo tr&ograve;n. Khi t&iacute;nh theo h&igrave;nh chữ nhật, k&iacute;ch thước m&agrave;n h&igrave;nh l&agrave; 6.06 inch theo đường ch&eacute;o. Diện t&iacute;ch hiển thị thực tế nhỏ hơn.</p>\r\n\r\n<p>(2) X&aacute;c nhận dựa v&agrave;o mặt trước c&oacute; Ceramic Shield của iPhone 12 Pro so với iPhone thế hệ trước.</p>\r\n\r\n<p>(3) Apple ProRAW sắp ra mắt.</p>\r\n\r\n<p>(4) iPhone 12 Pro Max c&oacute; khả năng chống tia nước, chống nước v&agrave; chống bụi. Sản phẩm đ&atilde; qua kiểm nghiệm trong điều kiện ph&ograve;ng th&iacute; nghiệm c&oacute; kiểm so&aacute;t đạt mức IP68 theo ti&ecirc;u chuẩn IEC 60529 (chống nước ở độ s&acirc;u tối đa 6 m&eacute;t trong v&ograve;ng tối đa 30 ph&uacute;t). Khả năng chống tia nước, chống nước v&agrave; chống bụi kh&ocirc;ng phải l&agrave; c&aacute;c điều kiện vĩnh viễn. Khả năng n&agrave;y c&oacute; thể giảm do hao m&ograve;n th&ocirc;ng thường. Kh&ocirc;ng sạc pin khi iPhone đang bị ướt. Vui l&ograve;ng tham khảo hướng dẫn sử dụng để biết c&aacute;ch lau sạch v&agrave; l&agrave;m kh&ocirc; m&aacute;y. Kh&ocirc;ng bảo h&agrave;nh sản phẩm bị hỏng do thấm chất lỏng.</p>\r\n\r\n<p>Bộ sản phẩm bao gồm:</p>\r\n\r\n<p>&bull; Điện thoại</p>\r\n\r\n<p>&bull; D&acirc;y sạc</p>\r\n\r\n<p>&bull; HDSD Bảo h&agrave;nh điện tử 12 th&aacute;ng.</p>\r\n', 'Đen ', 145, 29000000, 18, 1),
(30, '5179', 'Samsung', 'iphone12.png', '', 'vàng', 25, 24000000, 19, 1),
(31, '4', 'Samsung Flex', 'hkc_mb24v9_gearvn_be09fd4ac7104552977afe25336e55b1_large.jpg', '', 'xanh', 25, 30000000, 19, 1),
(32, '213', 'oppo', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'vàng', 12, 12300000, 20, 1),
(33, '214', 'iphone 12', 'iphone.png', '', 'xanh', 42, 32000000, 18, 1),
(34, '1', 'apple', '4.png', '', 'xanh', 5, 3900000, 18, 1),
(35, '241', 'macbook', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'trắng', 12, 30000000, 18, 1),
(36, '7842', 'IPhone 13 Pro Max 256G', 'iphone13.png', '<p><a href=\"https://www.thegioididong.com/dtdd/iphone-13-pro-max\" target=\"_blank\">iPhone 13 Pro Max 128GB</a>&nbsp;- si&ecirc;u phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ&nbsp;<a href=\"https://www.thegioididong.com/apple\" target=\"_blank\">Apple</a>. M&aacute;y c&oacute; thiết kế kh&ocirc;ng mấy đột ph&aacute; khi so với người tiền nhiệm, b&ecirc;n trong đ&acirc;y vẫn l&agrave; một sản phẩm c&oacute; m&agrave;n h&igrave;nh si&ecirc;u đẹp, tần số qu&eacute;t được n&acirc;ng cấp l&ecirc;n 120 Hz mượt m&agrave;, cảm biến camera c&oacute; k&iacute;ch thước lớn hơn, c&ugrave;ng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn s&agrave;ng c&ugrave;ng bạn chinh phục mọi thử th&aacute;ch.</p>\r\n', 'vàng', 213, 32000000, 18, 1),
(37, '398', ' IPhone 12 Pro Max 256GB ', 'iphone12.png', '<p>iPhone 12 Pro. M&agrave;n h&igrave;nh Super Retina XDR 6.1 inch s&aacute;ng đẹp ấn tượng (1). Ceramic Shield với khả năng chịu va đập khi rơi tốt hơn gấp 4 lần (2). Ảnh chụp tuyệt đẹp trong điều kiện &aacute;nh s&aacute;ng yếu với hệ thống camera chuy&ecirc;n nghiệp mới v&agrave; phạm vi thu ph&oacute;ng quang học 4x. Quay phim, bi&ecirc;n tập v&agrave; ph&aacute;t video Dolby Vision đẳng cấp điện ảnh. Chụp ảnh ch&acirc;n dung ở chế độ Ban Đ&ecirc;m v&agrave; trải nghiệm thực tế ảo tăng cường đẳng cấp mới với LiDAR Scanner. Chip A14 Bionic mạnh mẽ. Cho bất tận những năng lực ấn tượng.</p>\r\n\r\n<p>T&iacute;nh năng nổi bật</p>\r\n\r\n<p>&bull; M&agrave;n h&igrave;nh Super Retina XDR 6.1 inch (1)</p>\r\n\r\n<p>&bull; Ceramic Shield, chất liệu k&iacute;nh bền chắc nhất từng c&oacute; tr&ecirc;n điện thoại th&ocirc;ng minh &bull; A14 Bionic, chip nhanh nhất từng c&oacute; tr&ecirc;n điện thoại th&ocirc;ng minh</p>\r\n\r\n<p>&bull; Hệ thống camera chuy&ecirc;n nghiệp 12MP với c&aacute;c camera Ultra Wide, Wide v&agrave; Telephoto; phạm vi thu ph&oacute;ng quang học 4x; chế độ Ban Đ&ecirc;m, Deep Fusion, HDR th&ocirc;ng minh thế hệ 3, Apple ProRAW (3), khả năng quay video HDR Dolby Vision 4K</p>\r\n\r\n<p>&bull; LiDAR Scanner cải thiện trải nghiệm thực tế ảo tăng cường v&agrave; chụp ảnh ch&acirc;n dung ở chế độ Ban Đ&ecirc;m &bull; Camera trước TrueDepth 12MP với chế độ Ban Đ&ecirc;m v&agrave; khả năng quay video HDR Dolby Vision 4K &bull; Khả năng chống nước đạt chuẩn IP68 đứng đầu thị trường (4)</p>\r\n\r\n<p>&bull; iOS 14 với c&aacute;c tiện &iacute;ch được thiết kế lại tr&ecirc;n M&agrave;n H&igrave;nh Ch&iacute;nh, Thư Viện Ứng Dụng ho&agrave;n to&agrave;n mới, App Clips c&ugrave;ng nhiều t&iacute;nh năng kh&aacute;c.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;</p>\r\n\r\n<p>(1) M&agrave;n h&igrave;nh c&oacute; c&aacute;c g&oacute;c bo tr&ograve;n. Khi t&iacute;nh theo h&igrave;nh chữ nhật, k&iacute;ch thước m&agrave;n h&igrave;nh l&agrave; 6.06 inch theo đường ch&eacute;o. Diện t&iacute;ch hiển thị thực tế nhỏ hơn.</p>\r\n\r\n<p>(2) X&aacute;c nhận dựa v&agrave;o mặt trước c&oacute; Ceramic Shield của iPhone 12 Pro so với iPhone thế hệ trước.</p>\r\n\r\n<p>(3) Apple ProRAW sắp ra mắt.</p>\r\n\r\n<p>(4) iPhone 12 Pro Max c&oacute; khả năng chống tia nước, chống nước v&agrave; chống bụi. Sản phẩm đ&atilde; qua kiểm nghiệm trong điều kiện ph&ograve;ng th&iacute; nghiệm c&oacute; kiểm so&aacute;t đạt mức IP68 theo ti&ecirc;u chuẩn IEC 60529 (chống nước ở độ s&acirc;u tối đa 6 m&eacute;t trong v&ograve;ng tối đa 30 ph&uacute;t). Khả năng chống tia nước, chống nước v&agrave; chống bụi kh&ocirc;ng phải l&agrave; c&aacute;c điều kiện vĩnh viễn. Khả năng n&agrave;y c&oacute; thể giảm do hao m&ograve;n th&ocirc;ng thường. Kh&ocirc;ng sạc pin khi iPhone đang bị ướt. Vui l&ograve;ng tham khảo hướng dẫn sử dụng để biết c&aacute;ch lau sạch v&agrave; l&agrave;m kh&ocirc; m&aacute;y. Kh&ocirc;ng bảo h&agrave;nh sản phẩm bị hỏng do thấm chất lỏng.</p>\r\n\r\n<p>Bộ sản phẩm bao gồm:</p>\r\n\r\n<p>&bull; Điện thoại</p>\r\n\r\n<p>&bull; D&acirc;y sạc</p>\r\n\r\n<p>&bull; HDSD Bảo h&agrave;nh điện tử 12 th&aacute;ng.</p>\r\n', 'Đen ', 145, 29000000, 18, 1),
(38, '5179', 'Samsung', 'iphone12.png', '', 'vàng', 25, 24000000, 19, 1),
(39, '4', 'Samsung Flex', 'hkc_mb24v9_gearvn_be09fd4ac7104552977afe25336e55b1_large.jpg', '', 'xanh', 25, 30000000, 19, 1),
(40, '213', 'oppo', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'vàng', 12, 12300000, 20, 1),
(41, '214', 'iphone 12', 'iphone.png', '', 'xanh', 42, 32000000, 18, 1),
(42, '1', 'apple', '4.png', '', 'xanh', 5, 3900000, 18, 1),
(43, '241', 'macbook', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'trắng', 12, 30000000, 18, 1),
(44, '7842', 'IPhone 13 Pro Max 256G', 'iphone13.png', '<p><a href=\"https://www.thegioididong.com/dtdd/iphone-13-pro-max\" target=\"_blank\">iPhone 13 Pro Max 128GB</a>&nbsp;- si&ecirc;u phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ&nbsp;<a href=\"https://www.thegioididong.com/apple\" target=\"_blank\">Apple</a>. M&aacute;y c&oacute; thiết kế kh&ocirc;ng mấy đột ph&aacute; khi so với người tiền nhiệm, b&ecirc;n trong đ&acirc;y vẫn l&agrave; một sản phẩm c&oacute; m&agrave;n h&igrave;nh si&ecirc;u đẹp, tần số qu&eacute;t được n&acirc;ng cấp l&ecirc;n 120 Hz mượt m&agrave;, cảm biến camera c&oacute; k&iacute;ch thước lớn hơn, c&ugrave;ng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn s&agrave;ng c&ugrave;ng bạn chinh phục mọi thử th&aacute;ch.</p>\r\n', 'vàng', 213, 32000000, 18, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`iddanhmuc`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`idgiohang`),
  ADD KEY `idsanpham` (`idsanpham`);

--
-- Chỉ mục cho bảng `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  ADD PRIMARY KEY (`id_chitiethoadon`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id_donhang`);

--
-- Chỉ mục cho bảng `tbnguoidung`
--
ALTER TABLE `tbnguoidung`
  ADD PRIMARY KEY (`idnguoidung`);

--
-- Chỉ mục cho bảng `tbsanpham`
--
ALTER TABLE `tbsanpham`
  ADD PRIMARY KEY (`idsanpham`),
  ADD KEY `iddanhmuc` (`iddanhmuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `iddanhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `idgiohang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT cho bảng `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  MODIFY `id_chitiethoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `tbnguoidung`
--
ALTER TABLE `tbnguoidung`
  MODIFY `idnguoidung` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `tbsanpham`
--
ALTER TABLE `tbsanpham`
  MODIFY `idsanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`idsanpham`) REFERENCES `tbsanpham` (`idsanpham`);

--
-- Các ràng buộc cho bảng `tbsanpham`
--
ALTER TABLE `tbsanpham`
  ADD CONSTRAINT `tbsanpham_ibfk_1` FOREIGN KEY (`iddanhmuc`) REFERENCES `danhmuc` (`iddanhmuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
