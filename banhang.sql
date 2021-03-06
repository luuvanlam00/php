-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 11, 2021 lúc 08:49 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_bl` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `noidung` varchar(50) NOT NULL,
  `ngay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_bl`, `masp`, `ten`, `noidung`, `ngay`) VALUES
(6, 17, 'vu', 'sản phẩm đẹp', '2020-11-15'),
(7, 17, 'lam ', 'toot', '2020-12-18'),
(9, 17, 'lam', 'hay', '2020-12-19'),
(10, 15, 'lam', 'sản phẩm tốt', '2020-12-22'),
(12, 30, 'lam', 'tốt', '2021-01-03'),
(13, 17, 'doanh', 'abc', '2021-03-08'),
(14, 31, 'vu', 'tốt', '2021-06-20'),
(15, 34, 'lam', 'tạm ổn', '2021-06-22'),
(16, 17, 'viet', 'tot', '2021-06-22'),
(17, 30, 'vu', 'tot', '2021-06-22'),
(18, 34, 'anh', 'san pham dep', '2021-06-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthd`
--

CREATE TABLE `cthd` (
  `id_cthd` int(11) NOT NULL,
  `id_hd` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `giaban` double NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cthd`
--

INSERT INTO `cthd` (`id_cthd`, `id_hd`, `masp`, `giaban`, `soluong`) VALUES
(136, 143, 15, 9390000, 3),
(137, 143, 40, 340000, 1),
(138, 144, 19, 10900000, 1),
(139, 144, 33, 1390000, 1),
(140, 145, 37, 2100000, 1),
(141, 145, 41, 599000, 1),
(142, 146, 17, 10290000, 3),
(143, 146, 19, 10900000, 2),
(144, 147, 30, 9390000, 1),
(145, 148, 17, 10290000, 1),
(146, 149, 30, 9390000, 1),
(147, 150, 19, 10900000, 1),
(149, 150, 30, 9390000, 1),
(150, 150, 30, 9390000, 1),
(151, 152, 40, 340000, 1),
(152, 153, 30, 9390000, 1),
(153, 154, 17, 10290000, 1),
(154, 155, 17, 10290000, 1),
(155, 156, 30, 9390000, 1),
(156, 157, 19, 10900000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthdn`
--

CREATE TABLE `cthdn` (
  `id_cthd` int(11) NOT NULL,
  `id_hd` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cthdn`
--

INSERT INTO `cthdn` (`id_cthd`, `id_hd`, `masp`, `soluong`, `dongia`) VALUES
(5, 3, 15, 10, 9000000),
(8, 3, 30, 10, 2000000),
(9, 3, 31, 10, 2000000),
(10, 3, 33, 10, 2000000),
(11, 3, 34, 10, 500000),
(12, 3, 35, 10, 500000),
(13, 3, 36, 10, 500000),
(15, 1, 50, 10, 500000),
(16, 4, 17, 10, 9000000),
(17, 4, 51, 10, 9000000),
(18, 5, 39, 20, 500000),
(19, 5, 42, 30, 500000),
(20, 5, 43, 30, 500000),
(21, 5, 45, 30, 500000),
(22, 5, 45, 50, 500000),
(23, 5, 46, 30, 500000),
(24, 5, 47, 30, 500000),
(25, 5, 48, 30, 2000000),
(26, 5, 49, 30, 2000000),
(27, 5, 50, 10, 2000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctkm`
--

CREATE TABLE `ctkm` (
  `id_ctkm` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `id_km` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hdn`
--

CREATE TABLE `hdn` (
  `id_hd` int(11) NOT NULL,
  `mancc` int(11) NOT NULL,
  `ngaynhap` date NOT NULL,
  `ten` varchar(11) NOT NULL,
  `noidung` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hdn`
--

INSERT INTO `hdn` (`id_hd`, `mancc`, `ngaynhap`, `ten`, `noidung`) VALUES
(1, 18, '2021-01-09', 'vu', 'san pham tố'),
(3, 13, '2021-02-01', 'vu', ' tốt'),
(4, 14, '2021-06-04', 'vu', 'tốt'),
(5, 19, '2021-06-12', 'lam', ' tốt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hd` int(11) NOT NULL,
  `thoigian` date NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `sdt` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `trangthai` varchar(50) NOT NULL,
  `thanhtoan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id_hd`, `thoigian`, `tenkh`, `sdt`, `email`, `diachi`, `trangthai`, `thanhtoan`) VALUES
(143, '2021-06-22', 'hanh', '0976325846', 'luuvanlam25@gmail.com', ' hoang kim', 'Xác nhận', 'Offline '),
(144, '2021-06-22', 'anh', '03937568264', 'luuvanlam25@gmail.com', ' hà tĩnh', 'Xác nhận', 'Offline '),
(145, '2021-06-22', 'son', '0389374553', 'luuvanlam25@gmail.com', 'thach da', 'Chưa xác nhận', 'Online'),
(146, '2021-06-22', 'LUU VAN LAM', '0376663258', 'luuvanlam25@gmail.com', ' hà nội', 'Xác nhận', 'Offline '),
(147, '2021-06-22', 'han', '0973553060', 'luuvanlam25@gmail.com', 'thanh hóa', 'Chưa xác nhận', 'Online'),
(148, '2021-06-22', 'ki', '0376325879', 'luuvanlam25@gmail.com', 'cu an', 'Chưa xác nhận', 'Offline'),
(149, '2021-06-22', 'hanh', '0314789356', 'luuvanlam25@gmail.com', ' ha tinh', 'Xác nhận', 'Offline '),
(150, '2021-06-22', 'LUU VAN LAM', '0376325879', 'luuvanlam25@gmail.com', ' thanh trì', 'Xác nhận', 'Offline '),
(152, '2021-06-23', 'LUU VAN LAM', '0314789356', 'luuvanlam25@gmail.com', ' cu an', 'Xác nhận', 'Offline '),
(153, '2021-06-23', 'hao', '0314789358', 'luuvanlam25@gmail.com', 'nam cuong', 'Chưa xác nhận', 'Online'),
(154, '2021-06-23', 'quynh', '0824934182', 'fasdasdasd@gmai.com', 'ha noi', 'Chưa xác nhận', 'Online'),
(155, '2021-06-23', 'LUU VAN LAM', '0314789358', 'luuvanlam25@gmail.com', 'thanh trì', 'Chưa xác nhận', 'Online'),
(156, '2021-06-23', 'LUU VAN LAM', '0314789356', 'luuvanlam25@gmail.com', ' thanh trì', 'Xác nhận', 'Online '),
(157, '2021-06-30', 'Dam Tuan Viet', '0528059577', 'luuvanlam25@gmail.com', 'Ha Noi', 'Chưa xác nhận', 'Offline');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_kh` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_kh`, `tenkh`, `email`, `sdt`) VALUES
(20, 'lam', 'minh@123', '0376663258'),
(96319, 'Nguyen Huu Vu', 'luuvanlam34@gmail.com', '0376663258'),
(96320, 'Dang Hong Minh', 'luuvanlam34@gmail.com', '0376663258'),
(96321, 'Nguyen Van An', 'luuvanlam34@gmail.com', '0376663258'),
(96322, 'LUU VAN LAM', 'luuvanlam34@gmail.com', '0376663258'),
(96323, 'Luu Van Vu', 'luuvanlam34@gmail.com', '0376663258'),
(96324, 'Dang Hong Minh', 'luuvanlam34@gmail.com', '0376663258'),
(96325, 'Luu Van Vu', 'luuvanlam34@gmail.com', '0376663258'),
(96326, 'Dang Hong Minh', 'luuvanlam34@gmail.com', '0376663258'),
(96327, 'Luu Van Viet', 'luuvanlam25@gmail.com', '0973553060'),
(96328, 'Luu Van Viet', 'luuvanlam25@gmail.com', '0376663258'),
(96329, 'Luu Van Hoang', 'luuvanlam25@gmail.com', '0376663258'),
(96330, 'Luu Van Hoang', 'luuvanlam25@gmail.com', '0973553060'),
(96331, 'hà ', 'luuvanlam25@gmail.com', '03937568264'),
(96332, 'vũ', 'luuvanlam25@gmail.com', '0315796384'),
(96333, 'vinh', 'luuvanlam25@gmail.com', '0973553060'),
(96334, 'thanh', 'luuvanlam25@gmail.com', '0973553060'),
(96335, 'minh', 'luuvanlam25@gmail.com', '0314783250'),
(96336, 'Dam Tuan Viet', 'luuvanlam25@gmail.com', '03937568264'),
(96337, 'Luu Van Vu', 'luuvanlam25@gmail.com', '03937568264'),
(96338, 'Luu Van Vu', 'hahieu@gmail.com', '0973553060'),
(96339, 'Nguyen Huu Vu', 'luuvanlam25@gmail.com', '03937568264'),
(96340, 'Luu Van Viet', 'luuvanlam25@gmail.com', '03937568264'),
(96341, 'LUU VAN LAM', 'luuvanlam25@gmail.com', '0376663258'),
(96342, 'LUU VAN LAM', 'luuvanlam25@gmail.com', '0376663258'),
(96343, 'hanh', 'luuvanlam25@gmail.com', '0976325846'),
(96344, 'anh', 'luuvanlam25@gmail.com', '03937568264'),
(96345, 'son', 'luuvanlam25@gmail.com', '0389374553'),
(96346, 'LUU VAN LAM', 'luuvanlam25@gmail.com', '0376663258'),
(96347, 'han', 'luuvanlam25@gmail.com', '0973553060'),
(96348, 'ki', 'luuvanlam25@gmail.com', '0376325879'),
(96349, 'hanh', 'luuvanlam25@gmail.com', '0314789356'),
(96350, 'LUU VAN LAM', 'luuvanlam25@gmail.com', '0376325879'),
(96351, 'LUU VAN LAM', 'luuvanlam25@gmail.com', '0376325879'),
(96352, 'han', 'luuvanlam25@gmail.com', '0314789358'),
(96353, 'LUU VAN LAM', 'luuvanlam25@gmail.com', '0314789356'),
(96354, 'LUU VAN LAM', 'luuvanlam25@gmail.com', '0314789356'),
(96355, 'hao', 'luuvanlam25@gmail.com', '0314789358'),
(96356, 'quynh', 'fasdasdasd@gmai.com', '0824934182'),
(96357, 'LUU VAN LAM', 'luuvanlam25@gmail.com', '0314789358'),
(96358, 'LUU VAN LAM', 'luuvanlam25@gmail.com', '0314789356'),
(96359, 'Dam Tuan Viet', 'luuvanlam25@gmail.com', '0528059577');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id_km` int(11) NOT NULL,
  `tgbd` date NOT NULL,
  `tgkt` date NOT NULL,
  `giamgia` float NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`maloai`, `tenloai`) VALUES
(37, 'Laptop'),
(38, 'PC'),
(39, 'Linh kiện PC'),
(40, 'Màn hình'),
(41, 'Bàn phím'),
(42, 'Tai nghe'),
(43, 'Ghế'),
(44, 'Chuột');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ncc`
--

CREATE TABLE `ncc` (
  `mancc` int(11) NOT NULL,
  `tenncc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ncc`
--

INSERT INTO `ncc` (`mancc`, `tenncc`) VALUES
(13, 'Asus'),
(14, 'Acer'),
(15, 'Dell'),
(16, 'Samsung'),
(17, 'MSI'),
(18, 'HP'),
(19, 'Lenovo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `vaitro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`taikhoan`, `matkhau`, `vaitro`) VALUES
('lam', '202cb962ac59075b964b07152d234b70', 'admin'),
('mai', '202cb962ac59075b964b07152d234b70', 'user'),
('vu', '202cb962ac59075b964b07152d234b70', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(50) NOT NULL,
  `anh` varchar(50) NOT NULL,
  `mota` varchar(200) NOT NULL,
  `chitiet` varchar(50) NOT NULL,
  `giaban` double NOT NULL,
  `giakm` double NOT NULL,
  `maloai` int(11) NOT NULL,
  `mancc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `anh`, `mota`, `chitiet`, `giaban`, `giakm`, `maloai`, `mancc`) VALUES
(15, 'Laptop Asus ', '1.jpg', 'Laptop mới ', 'Sản phẩm đẹp', 9790000, 9390000, 37, 13),
(17, 'Laptop Acer Aspire 3 A315 56 37DV', '2.jpg', 'Sản phẩm tốt ', 'Laptop mới', 11990000, 10290000, 37, 14),
(19, 'Laptop ASUS X509JA EJ427T', '3.jpg', 'Laptop tốt', 'Laptop mới', 11900000, 10900000, 37, 13),
(30, 'GVN Titan 10 M', '4.jpg', 'Tốt', 'Tốt', 11160000, 9390000, 38, 17),
(31, 'GVN Assassin M', '5.jpg', 'Tốt', 'Tốt', 11470000, 10290000, 38, 15),
(32, 'GVN Mystic M', '6.jpg', 'Tốt', 'Tốt', 12190000, 10690000, 38, 13),
(33, 'Asus PRIME H310M-CS R2.0 LGA1151v2', '7.jpg', 'Tốt', 'Tốt', 1590000, 1390000, 39, 13),
(34, '(8GB DDR4 1x8G 2666) RAM Kingston HyperX Fury Blac', '8.jpg', 'Tốt', 'Tốt', 1090000, 790000, 39, 16),
(35, 'HDD WD Blue 1TB 7200rpm', '9.jpg', 'Tốt', 'Tốt', 1100000, 980000, 39, 16),
(36, 'Màn hình Philips 223V5LHSB2 22“ Full HD', '10.jpg', 'Tốt', 'Tốt', 1990000, 1820000, 40, 18),
(37, 'Màn hình gương Lenovo ThinkVision S22e-19 22\" VA', '11.jpg', 'Tốt', 'Tốt', 2190000, 2100000, 40, 19),
(38, 'Màn hình ViewSonic VA2261H-2 22\" FHD', '12.jpg', 'Tốt', 'Tốt', 2390000, 2050000, 40, 13),
(39, 'Bộ bàn phím  Newmen T260', '13.jpg', 'Tốt', 'Tốt', 280000, 250000, 41, 13),
(40, 'Bàn phím Gaming DareU LK145 USB', '14.jpg', 'Tốt ', 'Tốt', 480000, 340000, 41, 17),
(41, 'Bàn phím cơ Gaming DAREU EK87 - Black (Multi-LED)', '15.jpg', 'Tốt ', 'Tốt', 599000, 0, 41, 13),
(42, 'Chuột Dare-U LM115G - Pink', '16.jpg', 'Tốt ', 'Tốt', 200000, 0, 44, 13),
(43, 'Chuột Dare-U LM115G Wireless', '17.jpg', 'Tốt ', 'Tốt', 200000, 0, 44, 13),
(44, 'Chuột Durgod M39', '18.jpg', 'Tốt ', 'Tốt', 190000, 0, 44, 13),
(45, 'Tai nghe Zidli ZH 7RB', '19.jpg', 'Tốt ', 'Tốt', 490000, 340000, 42, 13),
(46, 'Tai nghe DareU EH416 RGB', '20.jpg', 'Tốt ', 'Tốt', 590000, 350000, 42, 19),
(47, 'Tai nghe Rapoo VM150 In-ear', '21.jpg', 'Tốt ', 'Tốt', 569000, 400000, 42, 17),
(48, 'Ghế Warrior Raider Series WGC206 Black/Red', '22.jpg', 'Tốt ', 'Tốt', 2590000, 2550000, 43, 13),
(49, 'Ghế Warrior Raider Series WGC206 Black/White', '23.jpg', 'Tốt ', 'Tốt', 2550000, 2500000, 43, 15),
(50, 'Ghế Warrior Raider Series WGC206 Black', '24.jpg', 'Tốt ', 'Tốt', 2590000, 2500000, 43, 14),
(51, '', '55.png', 'Tốt ', 'Tốt', 22000000, 21500000, 37, 14);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD PRIMARY KEY (`id_cthd`),
  ADD KEY `id_hd` (`id_hd`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `cthdn`
--
ALTER TABLE `cthdn`
  ADD PRIMARY KEY (`id_cthd`),
  ADD KEY `cthdn_ibfk_1` (`id_hd`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `ctkm`
--
ALTER TABLE `ctkm`
  ADD PRIMARY KEY (`id_ctkm`);

--
-- Chỉ mục cho bảng `hdn`
--
ALTER TABLE `hdn`
  ADD PRIMARY KEY (`id_hd`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hd`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_kh`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id_km`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `ncc`
--
ALTER TABLE `ncc`
  ADD PRIMARY KEY (`mancc`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`taikhoan`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `maloai` (`maloai`),
  ADD KEY `mancc` (`mancc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `cthd`
--
ALTER TABLE `cthd`
  MODIFY `id_cthd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT cho bảng `cthdn`
--
ALTER TABLE `cthdn`
  MODIFY `id_cthd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `ctkm`
--
ALTER TABLE `ctkm`
  MODIFY `id_ctkm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hdn`
--
ALTER TABLE `hdn`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96360;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id_km` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `ncc`
--
ALTER TABLE `ncc`
  MODIFY `mancc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `cthd_ibfk_1` FOREIGN KEY (`id_hd`) REFERENCES `hoadon` (`id_hd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cthd_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `cthdn`
--
ALTER TABLE `cthdn`
  ADD CONSTRAINT `cthdn_ibfk_1` FOREIGN KEY (`id_hd`) REFERENCES `hdn` (`id_hd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cthdn_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loaisp` (`maloai`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`mancc`) REFERENCES `ncc` (`mancc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
