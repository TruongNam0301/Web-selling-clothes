-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 14, 2020 lúc 06:58 AM
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
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`) VALUES
(1, 'test', '$2y$12$sHWsdiUVv6AtoOhpRu//wukYs4pCtHv8oRzCwA0FO3inPejMGADMy');

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
-- Cấu trúc bảng cho bảng `clothes`
--

CREATE TABLE `clothes` (
  `id` int(4) NOT NULL,
  `id_type` int(4) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `clothes`
--

INSERT INTO `clothes` (`id`, `id_type`, `name`, `price`, `picture`) VALUES
(1, 3, 'ao thun', '20000', 'product1.jpg'),
(2, 2, 'ao so mi', '100000', 'product2.jpg'),
(3, 1, 'ao khoac jean', '300000', 'product3.jpg'),
(4, 4, 'quan jean1', '200000', 'product21.jpg'),
(5, 4, 'quan jean2', '200000', 'product22.jpg'),
(6, 2, 'ao somi2', '100000', 'product5.jpg'),
(7, 2, 'ao somi3', '100000', 'product6.jpg'),
(8, 2, 'ao somi4', '100000', 'product7.jpg'),
(9, 2, 'ao somi5', '100000', 'product8.jpg'),
(10, 2, 'ao somi6', '100000', 'product9.jpg'),
(11, 2, 'ao somi7', '100000', 'product10.jpg'),
(12, 2, 'ao somi8', '100000', 'product23.jpg'),
(13, 2, 'ao somi9', '100000', 'product24.jpg'),
(14, 1, 'ao khoac2', '300000', 'product18.jpg'),
(15, 1, 'ao khoac3', '400000', 'product19.jpg'),
(16, 1, 'ao khoac4', '350000', 'product20.jpg'),
(17, 3, 'ao thun1', '100000', 'product11.jpg'),
(18, 3, 'ao thun2', '100000', 'product12.jpg'),
(19, 3, 'ao thun3', '100000', 'product13.jpg'),
(20, 3, 'ao thun4', '100000', 'product14.jpg'),
(21, 3, 'ao thun5', '100000', 'product15.jpg'),
(22, 3, 'ao thun6', '100000', 'product16.jpg'),
(23, 3, 'ao thun7', '100000', 'product17.jpg'),
(24, 1, 'ao khoac5', '400000', 'product25.jpg'),
(25, 1, 'ao khoac6', '500000', 'product26.jpg'),
(26, 1, 'ao khoac7', '350000', 'product27.jpg'),
(27, 1, 'ao khoac8', '250000', 'product28.jpg'),
(28, 1, 'ao khoac9', '300000', 'product29.jpg'),
(29, 1, 'ao khoac10', '300000', 'product30.jpg'),
(30, 1, 'ao khoac11', '300000', 'product31.jpg'),
(31, 1, 'ao khoac12', '350000', 'product32.jpg'),
(32, 1, 'ao khoac13', '450000', 'product33.jpg'),
(33, 1, 'ao khoac14', '200000', 'product34.jpg'),
(34, 4, 'quan jean3', '100000', 'product35.jpg'),
(35, 4, 'quan jean4', '150000', 'product36.jpg'),
(36, 3, 'ao thun8', '100000', 'product37.jpg'),
(37, 3, 'ao thun9', '100000', 'product38.jpg'),
(38, 3, 'ao thun10', '100000', 'product39.jpg'),
(39, 3, 'ao thun11', '100000', 'product40.jpg'),
(40, 3, 'ao thun12', '100000', 'product41.jpg'),
(41, 3, 'ao thun13', '100000', 'product42.jpg'),
(42, 3, 'ao thun14', '100000', 'product43.jpg'),
(43, 2, 'ao somi10', '100000', 'product44.jpg'),
(44, 2, 'ao somi11', '100000', 'product45.jpg'),
(45, 2, 'ao somi12', '100000', 'product46.jpg'),
(46, 2, 'ao somi13', '100000', 'product47.jpg'),
(47, 2, 'ao somi14', '100000', 'product48.jpg'),
(48, 2, 'ao somi15', '100000', 'product49.jpg'),
(49, 2, 'ao somi16', '100000', 'product50.jpg'),
(50, 2, 'ao somi17', '100000', 'product51.jpg'),
(51, 2, 'ao somi18', '100000', 'product52.jpg'),
(52, 2, 'ao somi19', '100000', 'product53.jpg'),
(53, 2, 'ao somi20', '100000', 'product54.jpg'),
(54, 2, 'ao somi21', '100000', 'product55.jpg'),
(55, 2, 'ao somi21', '100000', 'product56.jpg');

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
(1, 'jacket', 1),
(2, 't-shirt', 1),
(3, 'shirt', 1),
(4, 'jean', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'ÁO'),
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
(1, 'test', 'user-image.png', NULL, NULL);

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
-- Chỉ mục cho bảng `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Clothes_fk0` (`id_type`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `clothes`
--
ALTER TABLE `clothes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `typeclothes`
--
ALTER TABLE `typeclothes`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Các ràng buộc cho bảng `clothes`
--
ALTER TABLE `clothes`
  ADD CONSTRAINT `Clothes_fk0` FOREIGN KEY (`id_type`) REFERENCES `typeclothes` (`id_type`);

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
