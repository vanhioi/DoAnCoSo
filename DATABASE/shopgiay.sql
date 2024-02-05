-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 05:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `idrole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `idgiohang` int(11) NOT NULL,
  `idKH` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongsotien` decimal(10,0) NOT NULL,
  `ngaythemvao` datetime NOT NULL,
  `idSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `idLoaisp` int(11) NOT NULL,
  `tenloaisp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`idLoaisp`, `tenloaisp`) VALUES
(11, 'women'),
(12, 'Kid'),
(13, 'men'),
(14, 'sale'),
(15, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `mausp`
--

CREATE TABLE `mausp` (
  `idmau` int(11) NOT NULL,
  `tenmau` varchar(255) NOT NULL,
  `idSP` int(11) NOT NULL,
  `soluongtriongkho` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mausp`
--

INSERT INTO `mausp` (`idmau`, `tenmau`, `idSP`, `soluongtriongkho`) VALUES
(1, 'trắng', 3, '2');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `Namerole` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `idSP` int(11) NOT NULL,
  `tenSP` varchar(100) NOT NULL,
  `mota` text NOT NULL,
  `gia` double(10,0) NOT NULL,
  `img` varchar(50) NOT NULL,
  `idLoaisp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idSP`, `tenSP`, `mota`, `gia`, `img`, `idLoaisp`) VALUES
(1, 'giay thet hao nu nike dunk-high-by-you-dv2272-900-phoi-mau', 'Giày Thế Thao Nữ Nike Dunk High By You DV2272-900 Phối Màu được làm từ chất liệu da cao cấp mềm mại cho vẻ ngoài cổ điển và bắt mắt. Giày được thiết kế cổ cạo với độ ôm hỗ trợ chuyển động mang lại cảm giác thoải mái tối đa.\r\nForm giày chuẩn đẹp với các đường chỉ vô cùng chắc chắn, tỉ mỉ.', 5680000, 'iay-the-thao-nu-nike-dunk-high-by-you-dv2272-900-p', 11),
(2, 'Giày Thể Thao Nữ Nike Air Max 90 Futura Unlocked By You DX5047-900 Phối Màu', 'Giày Thể Thao Nữ Nike Air Max 90 Futura Unlocked By You DX5047-900 Phối Màu là mẫu giày được thương hiệu Nike nổi tiếng của Mỹ thiết kế mang phong cách đậm chất thể thao trẻ trung và vô cùng năng động. Hoàn hảo về chất lượng và kiểu dáng đẹp mắt, Nike Air Max 90\r\nFutura Unlocked By You DX5047-900 đang được giới trẻ yêu thích và săn đón.', 6500000, 'iay-the-thao-nu-nike-air-max-90-futura-unlocked-by', 11),
(3, 'Giày Thể Thao Nữ Nike Air Force 1 Lover XX Premium Women\'s Shoes BV8249-001 Màu Đen', 'Giày Thể Thao Nữ Nike Air Force 1 Lover XX Premium Women\'s Shoes BV8249-001 Màu Đen được làm từ chất liệu da cao cấp với độ ôm được thiết kế đặc biệt để nâng đỡ có định hướng và hỗ trợ chuyển động. Đế ngoài cao su với vòng tròn trục bóng rỗ truyền thống cho lực kéo và độ bền.', 5890000, 'giay-the-thao-nu-nike-air-force-1-lover-xx-premium', 11),
(4, 'Giày Thễ Thao Nike Air Max Excee Jade lce CD6432-127 Màu Trắng \r\n', 'Giày Thễ Thao Nike Air Max Excee Jade lce CD6432-127 Màu Trắng Phối Xanh được làm từ chất liệu da và vải lưới\r\nsiêu mềm mại, được thiết kế nhiều theo form dáng quen thuộc của Nike Air nhưng độc đáo hơn với những mảng màu tinh\r\nté. Giày được thiết kề cỗ thấp với độ ôm hỗ trợ chuyễn động mang lại cảm giác thoải mái tối đa !', 4000000, 'giay-the-thao-nike-air-max-excee-jade-ice-cd5432-1', 11),
(5, 'Giày Thể Thao Nữ Nike Air Max 90 Futura Unlocked By You DX5047-900', 'Giày Thể Thao Nữ Nike Air Max 90 Futura Unlocked By You DX5047-900 Phối Màu là mẫu giày được thương hiệu Nike nổi tiếng của Mỹ thiết kế mang phong cách đậm chất thể thao trẻ trung và vô cùng năng động. Hoàn hảo về chất lượng và kiểu dáng đẹp mắt, Nike Air Max 90\r\nFutura Unlocked By You DX5047-900 đang được giới trẻ yêu thích và săn đón.\r\nSize:	35.5 36.5 37.5 38 38.5 39 40 40.5 41 42 42.5 43 44 44.5 45 ', 6500000, 'giay-the-thao-nike-air-force-1-low-shadow-sail-pin', 11),
(6, 'Giày Thễ Thao Nữ Nike Air Max Excie CD5432-604', 'Giày Thễ Thao Nữ Nike Air Max Excie CD5432-604 Phối Màu được làm từ chất liệu vải đột cao cấp với độ ôm được\r\nthiết kế đặc biệt để nâng đỡ có định hướng và hỗ trợ chuyễn động. Form giày đi lên chân vừa vặn, các đường nét của đôi\r\ngiày vô cũng tỉnh tế và sắc sảo hài lòng mọi khách hàng \r\nBên trong có đề đệm êm ái, mang lại cảm giác dễ chịu khi sử dụng, không gây đau chân. Đề giày mềm nhẹ và ma sát tốt\r\nhạn chế trơn trượt và mang lại sự thoải mái ngay cả khi bạn đi giày trong một khoảng thời gian dài \r\nSize:	36 36.5 37.5 38 38.5 39 40 ', 3500000, 'giay-the-thao-nu-nike-air-max-excie-cd5432-604-pho', 11),
(7, 'Giày Thể Thao Nữ Nike Air Force 1 Shadow DV7449-101', 'Giày Thể Thao Nữ Nike Air Force 1 Shadow DV7449-101 Màu Hồng Be là mẫu giày thể thao trẻ trung, khỏe khoắn của thương hiệu Nike nỗi tiếng của Mỹ. Nike Air Force 1 Shadow DV7449-101 hoàn hảo về chất lượng và kiểu dáng vô cùng đẹp mắt chắc hẳn sẽ đem đến cho bạn trải nghiệm tuyệt vời.\r\nSize:	36 36.5 37.5 38 38.5 39 40 40.5 41 42 42.5 43 44 ', 3990000, 'giay-the-thao-nu-nike-air-force-1-shadow-dv7449-10', 11),
(8, 'Giày Thễ Thao Nike Dunk Low Citron Pulse DD1503-002', 'Giày Thễ Thao Nike Dunk Low Citron Pulse DD1503-002 Màu Vàng sử dụng chất liệu da cao cấp trên mọi chi tiếtbên\r\nngoài. Ưu điễm của chất liệu này là bên mặt trơn láng, dễ tạo màu và không thắm nước ở bề mặt \r\nSize:	36.5', 4500000, 'giay-the-thao-nike-dunk-low-citron-pulse-dd1503-00', 11),
(9, 'Tatum 1', 'Trước khi họ có thể cộng điểm, MVP của bạn phải bắt tay vào cuộc. Tatum 1 được thiết kế để dễ dàng mang vào, vì vậy trẻ em có thể tự mang giày và bắt đầu giờ chơi nhanh hơn. Nhẹ, bền và an toàn, chúng có đôi chân nhỏ được bảo vệ trong mỗi bước đi lớn\r\nSize:	baby', 1189149, 'tatum-1-old-school-shoes-qdvrQt (3).png', 12),
(10, 'sunray adjust6 ', 'Có lẽ con nhỏ của bạn đang hướng tới lớp học bơi. Hoặc chúng chỉ cần một chiếc dép trượt dễ dàng để chơi và bò dưới ánh nắng mặt trời. Nike Sunray Adapt 6 siêu sang trọng khi thời tiết ấm áp ập đến. Các cạnh giúp giữ chân bé khi chơi—chúng tôi không thích bị trượt! Ngoài ra, còn gì dễ dàng hơn việc đóng dây đeo? Giữ an toàn là điều ít lo lắng nhất của bạn.\r\nSize:	baby', 889000, 'sunray-adjust-6-slides-6xjxth (3).png', 12),
(11, 'Nike Court Borough', 'Hãy khởi đầu thuận lợi cho con bạn với Nike Court Borough. Được chế tạo cho mục đích sử dụng lâu dài, huyền thoại được chế tạo lại này sử dụng sự kết hợp của các vật liệu bền ở mặt trên và đế ngoài để đạt được vẻ ngoài cổ điển với dây đeo dễ dàng tháo lắp. Ngoài ra, hộp ngón chân và phần giữa bàn chân được thiết kế lại giúp bàn chân của họ có thêm một chút không gian để họ có thể thoải mái chạy suốt cả ngày.\r\nSize: baby', 1019000, 'court-borough-low-recraft-shoes-D0nqP8 (3).png', 12),
(12, 'swoosh 1 shoes', 'Những bước đi đầu tiên của bé là một bước ngoặt khá lớn. (Máy ảnh của bạn đã sẵn sàng chưa?) Chúng tôi đã thiết kế Nike Swoosh 1 để cung cấp cho đôi chân của các em những công cụ quan trọng cần thiết cho sự phát triển tự nhiên và giúp ngăn ngừa các vấn đề về chân trong tương lai. Flyknit siêu mềm và nhiều tính năng khác nhau kết hợp để tạo ra một chiếc giày đã giành được Dấu chấp nhận của Hiệp hội Y khoa Bàn chân Hoa Kỳ.\r\nSize: baby', 1529000, 'swoosh-1-shoes-zqmX8g (3).png', 12),
(13, 'Nike Pico 5', 'Nike Pico 5 có kiểu dáng vừa vặn an toàn với lực kéo lớn. Nó được làm từ chất liệu bền, đệm thoải mái và dây đai có thể điều chỉnh để dễ dàng cởi ra.\r\nSize:	Baby', 533399, 'pico-5-shoes-QQ5g1N (3).png', 12),
(14, 'Nike Flex Plus 2', 'Nike Flex Plus 2 không lãng phí thời gian để trẻ học những bước đi đầu tiên và trải nghiệm lần đầu chơi. Chúng ta đang nói về tất cả những khoảnh khắc đầu tiên mà bạn muốn ghi lại làm kỷ niệm, đồng thời giúp đôi chân nhỏ bé của chúng được thoải mái. Hệ thống dây thun cải tiến giúp việc mang giày này trở nên dễ dàng. Điều tuyệt vời nhất: Các nhà thiết kế của chúng tôi đã làm cho chúng trở nên siêu linh hoạt nên mỗi động tác sẽ mang lại cho vận động viên tương lai của bạn sự tự tin để tiếp tục tiến bước.\r\nSize: baby', 1399000, 'flex-plus-2-shoes-S48sDb (3).png', 12);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `idSize` int(11) NOT NULL,
  `idSP` int(11) NOT NULL,
  `sizevalue` varchar(20) NOT NULL,
  `soluongtonkho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`idSize`, `idSP`, `sizevalue`, `soluongtonkho`) VALUES
(1, 13, 'baby', 10),
(2, 3, '36.5 ', 2),
(3, 3, '37', 4),
(4, 3, '40', 30),
(5, 3, '41', 10),
(6, 3, '42', 2);

-- --------------------------------------------------------

--
-- Table structure for table `spnew`
--

CREATE TABLE `spnew` (
  `idSP` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `tenSPnew` varchar(100) NOT NULL,
  `giaSPnew` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spsale`
--

CREATE TABLE `spsale` (
  `idSPsale` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `tenSPSale` varchar(100) NOT NULL,
  `giaSPsale` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idKH` int(11) NOT NULL,
  `TenKH` varchar(100) NOT NULL,
  `diachiKH` varchar(100) NOT NULL,
  `diachiemailKH` varchar(100) NOT NULL,
  `sodienthoaiKH` varchar(50) NOT NULL,
  `idrole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idrole` (`idrole`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`idgiohang`),
  ADD KEY `idKH` (`idKH`),
  ADD KEY `idSP` (`idSP`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`idLoaisp`);

--
-- Indexes for table `mausp`
--
ALTER TABLE `mausp`
  ADD PRIMARY KEY (`idmau`),
  ADD KEY `idSP` (`idSP`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idSP`),
  ADD KEY `idLoaisp` (`idLoaisp`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`idSize`),
  ADD KEY `idSP` (`idSP`);

--
-- Indexes for table `spnew`
--
ALTER TABLE `spnew`
  ADD PRIMARY KEY (`idSP`);

--
-- Indexes for table `spsale`
--
ALTER TABLE `spsale`
  ADD PRIMARY KEY (`idSPsale`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idKH`),
  ADD KEY `idrole` (`idrole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `idgiohang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `idLoaisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mausp`
--
ALTER TABLE `mausp`
  MODIFY `idmau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `idSize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `spnew`
--
ALTER TABLE `spnew`
  MODIFY `idSP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spsale`
--
ALTER TABLE `spsale`
  MODIFY `idSPsale` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `role` (`idrole`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`idKH`) REFERENCES `user` (`idKH`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`);

--
-- Constraints for table `mausp`
--
ALTER TABLE `mausp`
  ADD CONSTRAINT `mausp_ibfk_1` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`);

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `user` (`idKH`),
  ADD CONSTRAINT `role_ibfk_2` FOREIGN KEY (`idrole`) REFERENCES `admin` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idLoaisp`) REFERENCES `loaisp` (`idLoaisp`);

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `role` (`idrole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
