-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 17, 2020 lúc 10:35 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sellclothes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `lv`) VALUES
(-1, 'admin', '$2y$12$rHZZFIjJ7VEnGBQYm.4Dn.4zeVLmpV0QXT7.rzE1gXuXcYpMfhNiy', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(4) NOT NULL,
  `id_clothes` int(4) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_hoadon`
--

CREATE TABLE `chitiet_hoadon` (
  `SoHD` int(11) NOT NULL,
  `MaHD` int(11) NOT NULL,
  `id_cloth` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `clothes`
--

CREATE TABLE `clothes` (
  `id` int(4) NOT NULL,
  `id_type` int(4) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `best_sell` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `clothes`
--

INSERT INTO `clothes` (`id`, `id_type`, `name`, `price`, `picture`, `best_sell`) VALUES
(1, 1, 'ao kh', '300000', 'product18.jpg', 1),
(2, 1, 'ao khoc', '400000', 'product19.jpg', 1),
(3, 1, 'ao khoac4', '350000', 'product20.jpg', 0),
(4, 3, 'ao thun1', '100000', 'product11.jpg', 1),
(5, 3, 'ao thun2', '100000', 'product12.jpg', 1),
(6, 3, 'ao thun3', '100000', 'product13.jpg', 0),
(7, 3, 'ao thun5', '100000', 'product15.jpg', 0),
(8, 3, 'ao thun6', '100000', 'product16.jpg', 0),
(9, 3, 'ao thun7', '100000', 'product17.jpg', 0),
(10, 1, 'ao khoac5', '400.000', '5f0ee745713ea0.99787849.jpg', 0),
(11, 1, 'ao khoac6', '500000', 'product26.jpg', 0),
(12, 1, 'ao khoac7', '350000', 'product27.jpg', 0),
(13, 1, 'ao khoac8', '250000', 'product28.jpg', 0),
(14, 1, 'ao khoac9', '300000', 'product29.jpg', 0),
(15, 1, 'ao khoac10', '300000', 'product30.jpg', 0),
(16, 1, 'ao khoac11', '300000', 'product31.jpg', 0),
(17, 1, 'ao khoac12', '350000', 'product32.jpg', 0),
(18, 1, 'ao khoac13', '450000', 'product33.jpg', 0),
(19, 1, 'ao khoac14', '200000', 'product34.jpg', 0),
(20, 6, 'quan jean3', '100000', 'product35.jpg', 0),
(21, 6, 'quan jean4', '150000', 'product36.jpg', 1),
(22, 3, 'ao thun8', '100000', 'product37.jpg', 0),
(23, 3, 'ao thun9', '100000', 'product38.jpg', 0),
(24, 3, 'ao thun10', '100000', 'product39.jpg', 0),
(25, 3, 'ao thun11', '100000', 'product40.jpg', 0),
(26, 3, 'ao thun12', '100000', 'product41.jpg', 0),
(27, 3, 'ao thun13', '100000', 'product42.jpg', 0),
(28, 3, 'ao thun14', '100000', 'product43.jpg', 0),
(29, 2, 'ao somi10', '100000', 'product44.jpg', 0),
(30, 2, 'ao somi11', '100000', 'product45.jpg', 0),
(31, 2, 'ao somi12', '100000', 'product46.jpg', 0),
(32, 2, 'ao somi13', '100000', 'product47.jpg', 0),
(33, 2, 'ao somi14', '100000', 'product48.jpg', 0),
(34, 2, 'ao somi15', '100000', 'product49.jpg', 0),
(35, 2, 'ao somi16', '100000', 'product50.jpg', 0),
(36, 2, 'ao somi17', '100000', 'product51.jpg', 0),
(37, 2, 'ao somi18', '100000', 'product52.jpg', 0),
(38, 2, 'ao somi19', '100000', 'product53.jpg', 0),
(39, 2, 'ao somi20', '100000', 'product54.jpg', 0),
(40, 1, 'quan hhh', '252252525', '5f0fc65ef08630.54419737.jpg', 0),
(41, 1, 'ao khoac2', '300000', '5f0fcc3619e700.63728803.jpg', 0),
(42, 1, 'ao khoac2', '300000', '5f0fcc46bc1b74.57515978.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typeclothes`
--

CREATE TABLE `typeclothes` (
  `id_type` int(11) NOT NULL,
  `name_type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `typeclothes`
--

INSERT INTO `typeclothes` (`id_type`, `name_type`, `type`) VALUES
(-1, 'NO PRODUCT TYPE', -1),
(1, 'jacket', 1),
(2, 't-shirt', 1),
(3, 'shirt', 1),
(6, 'jean', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `nametype` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `types`
--

INSERT INTO `types` (`id`, `nametype`) VALUES
(-1, 'NO TYPE'),
(1, 'ÁO '),
(2, 'QUẦN'),
(3, 'GIÀY');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `address`, `phoneNumber`) VALUES
(-1, 'admin', '5f1160ad603035.64866943.jpg', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Bills_fk0` (`id_clothes`),
  ADD KEY `Bills_fk1` (`id_user`);

--
-- Chỉ mục cho bảng `chitiet_hoadon`
--
ALTER TABLE `chitiet_hoadon`
  ADD PRIMARY KEY (`SoHD`),
  ADD KEY `fk_mahd` (`MaHD`);

--
-- Chỉ mục cho bảng `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Clothes_fk0` (`id_type`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Chỉ mục cho bảng `typeclothes`
--
ALTER TABLE `typeclothes`
  ADD PRIMARY KEY (`id_type`),
  ADD KEY `fk_types` (`type`);

--
-- Chỉ mục cho bảng `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitiet_hoadon`
--
ALTER TABLE `chitiet_hoadon`
  MODIFY `SoHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `clothes`
--
ALTER TABLE `clothes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `typeclothes`
--
ALTER TABLE `typeclothes`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `Bills_fk0` FOREIGN KEY (`id_clothes`) REFERENCES `clothes` (`id`),
  ADD CONSTRAINT `Bills_fk1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `chitiet_hoadon`
--
ALTER TABLE `chitiet_hoadon`
  ADD CONSTRAINT `fk_mahd` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`);

--
-- Các ràng buộc cho bảng `clothes`
--
ALTER TABLE `clothes`
  ADD CONSTRAINT `Clothes_fk0` FOREIGN KEY (`id_type`) REFERENCES `typeclothes` (`id_type`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `typeclothes`
--
ALTER TABLE `typeclothes`
  ADD CONSTRAINT `fk_types` FOREIGN KEY (`type`) REFERENCES `types` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Users_fk0` FOREIGN KEY (`id`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
