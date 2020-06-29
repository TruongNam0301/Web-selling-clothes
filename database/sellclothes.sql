-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 29, 2020 lúc 03:01 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

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
  `id` int(4) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`) VALUES
(1, 'nam', '1');

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
(23, 3, 'ao thun7', '100000', 'product17.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typeclothes`
--

CREATE TABLE `typeclothes` (
  `id_type` int(11) NOT NULL,
  `name_type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `typeclothes`
--

INSERT INTO `typeclothes` (`id_type`, `name_type`) VALUES
(1, 'jacket'),
(2, 't-shirt'),
(3, 'shirt'),
(4, 'jean');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `phoneNumber`) VALUES
(1, 'Trương Văn Nam', 'tphcm', '0123456789');

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
  ADD PRIMARY KEY (`id_type`);

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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `clothes`
--
ALTER TABLE `clothes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Users_fk0` FOREIGN KEY (`id`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
