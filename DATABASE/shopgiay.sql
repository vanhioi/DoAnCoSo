-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 03:43 AM
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
-- Database: `shopgiay`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `iddm` int(11) NOT NULL,
  `tendm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`iddm`, `tendm`) VALUES
(1, 'NEW'),
(2, 'SALE');

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
(11, 'Women'),
(12, 'Kid'),
(13, 'Men');

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
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `idKH` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` varchar(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `id_phuongthuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `idKH`, `fullname`, `email`, `phone_number`, `address`, `note`, `order_date`, `status`, `order_id`, `id_phuongthuc`) VALUES
(29, 0, 'Kha', 'kha23@gmail.com', '2423', 'sfsd', 'gg', '2024-03-12 19:09:56', 1, 1, 1),
(30, 0, 'Kha', 'kha23@gmail.com', '2423', 'sfsd', 'gg', '2024-03-12 19:31:01', 1, 1, 2),
(31, 0, 'Kha', 'kha23@gmail.com', '2423', 'sfsd', 'gg', '2024-03-12 19:34:45', 1, 1, 2),
(32, 0, 'Kha', 'kha23@gmail.com', '2423', 'sfsd', 'gg', '2024-03-12 19:40:47', 1, 1, 2),
(33, 0, 'Kha', 'kha23@gmail.com', '2423', 'sfsd', 'gg', '2024-03-12 19:41:32', 1, 1, 2),
(34, 0, 'Kha', 'kha23@gmail.com', '2423', 'sfsd', 'gg', '2024-03-12 19:42:40', 1, 1, 2),
(35, 0, 'Kha', 'kha23@gmail.com', '2423', 'sfsd', 'gg', '2024-03-12 19:44:32', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `idKH` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status_name`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đã xác nhận');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `namerole` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `namerole`) VALUES
(1, 'user'),
(2, 'admin');

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
  `idLoaisp` int(11) NOT NULL,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idSP`, `tenSP`, `mota`, `gia`, `img`, `idLoaisp`, `iddm`) VALUES
(1, 'giay thet hao nu nike dunk-high-by-you-dv2272-900-phoi-mau', 'Giày Thế Thao Nữ Nike Dunk High By You DV2272-900 Phối Màu được làm từ chất liệu da cao cấp mềm mại cho vẻ ngoài cổ điển và bắt mắt. Giày được thiết kế cổ cạo với độ ôm hỗ trợ chuyển động mang lại cảm giác thoải mái tối đa.\r\nForm giày chuẩn đẹp với các đường chỉ vô cùng chắc chắn, tỉ mỉ.', 5680000, 'iay-the-thao-nu-nike-dunk-high-by-you-dv2272-900-p', 11, 1),
(2, 'Giày Thể Thao Nữ Nike Air Max 90 Futura Unlocked By You DX5047-900 Phối Màu', 'Giày Thể Thao Nữ Nike Air Max 90 Futura Unlocked By You DX5047-900 Phối Màu là mẫu giày được thương hiệu Nike nổi tiếng của Mỹ thiết kế mang phong cách đậm chất thể thao trẻ trung và vô cùng năng động. Hoàn hảo về chất lượng và kiểu dáng đẹp mắt, Nike Air Max 90\r\nFutura Unlocked By You DX5047-900 đang được giới trẻ yêu thích và săn đón.', 6500000, 'iay-the-thao-nu-nike-air-max-90-futura-unlocked-by', 11, 1),
(3, 'Giày Thể Thao Nữ Nike Air Force 1 Lover XX Premium Women\'s Shoes BV8249-001 Màu Đen', 'Giày Thể Thao Nữ Nike Air Force 1 Lover XX Premium Women\'s Shoes BV8249-001 Màu Đen được làm từ chất liệu da cao cấp với độ ôm được thiết kế đặc biệt để nâng đỡ có định hướng và hỗ trợ chuyển động. Đế ngoài cao su với vòng tròn trục bóng rỗ truyền thống cho lực kéo và độ bền.', 5890000, 'giay-the-thao-nu-nike-air-force-1-lover-xx-premium', 11, 2),
(4, 'Giày Thễ Thao Nike Air Max Excee Jade lce CD6432-127 Màu Trắng \r\n', 'Giày Thễ Thao Nike Air Max Excee Jade lce CD6432-127 Màu Trắng Phối Xanh được làm từ chất liệu da và vải lưới\r\nsiêu mềm mại, được thiết kế nhiều theo form dáng quen thuộc của Nike Air nhưng độc đáo hơn với những mảng màu tinh\r\nté. Giày được thiết kề cỗ thấp với độ ôm hỗ trợ chuyễn động mang lại cảm giác thoải mái tối đa !', 4000000, 'giay-the-thao-nike-air-max-excee-jade-ice-cd5432-1', 11, 1),
(5, 'Giày Thể Thao Nữ Nike Air Max 90 Futura Unlocked By You DX5047-900', 'Giày Thể Thao Nữ Nike Air Max 90 Futura Unlocked By You DX5047-900 Phối Màu là mẫu giày được thương hiệu Nike nổi tiếng của Mỹ thiết kế mang phong cách đậm chất thể thao trẻ trung và vô cùng năng động. Hoàn hảo về chất lượng và kiểu dáng đẹp mắt, Nike Air Max 90\r\nFutura Unlocked By You DX5047-900 đang được giới trẻ yêu thích và săn đón.\r\nSize:	35.5 36.5 37.5 38 38.5 39 40 40.5 41 42 42.5 43 44 44.5 45 ', 6500000, 'giay-the-thao-nike-air-force-1-low-shadow-sail-pin', 11, 2),
(6, 'Giày Thễ Thao Nữ Nike Air Max Excie CD5432-604', 'Giày Thễ Thao Nữ Nike Air Max Excie CD5432-604 Phối Màu được làm từ chất liệu vải đột cao cấp với độ ôm được\r\nthiết kế đặc biệt để nâng đỡ có định hướng và hỗ trợ chuyễn động. Form giày đi lên chân vừa vặn, các đường nét của đôi\r\ngiày vô cũng tỉnh tế và sắc sảo hài lòng mọi khách hàng \r\nBên trong có đề đệm êm ái, mang lại cảm giác dễ chịu khi sử dụng, không gây đau chân. Đề giày mềm nhẹ và ma sát tốt\r\nhạn chế trơn trượt và mang lại sự thoải mái ngay cả khi bạn đi giày trong một khoảng thời gian dài \r\nSize:	36 36.5 37.5 38 38.5 39 40 ', 3500000, 'giay-the-thao-nu-nike-air-max-excie-cd5432-604-pho', 11, 1),
(7, 'Giày Thể Thao Nữ Nike Air Force 1 Shadow DV7449-101', 'Giày Thể Thao Nữ Nike Air Force 1 Shadow DV7449-101 Màu Hồng Be là mẫu giày thể thao trẻ trung, khỏe khoắn của thương hiệu Nike nỗi tiếng của Mỹ. Nike Air Force 1 Shadow DV7449-101 hoàn hảo về chất lượng và kiểu dáng vô cùng đẹp mắt chắc hẳn sẽ đem đến cho bạn trải nghiệm tuyệt vời.\r\nSize:	36 36.5 37.5 38 38.5 39 40 40.5 41 42 42.5 43 44 ', 3990000, 'giay-the-thao-nu-nike-air-force-1-shadow-dv7449-10', 11, 1),
(8, 'Giày Thễ Thao Nike Dunk Low Citron Pulse DD1503-002', 'Giày Thễ Thao Nike Dunk Low Citron Pulse DD1503-002 Màu Vàng sử dụng chất liệu da cao cấp trên mọi chi tiếtbên\r\nngoài. Ưu điễm của chất liệu này là bên mặt trơn láng, dễ tạo màu và không thắm nước ở bề mặt \r\nSize:	36.5', 4500000, 'giay-the-thao-nike-dunk-low-citron-pulse-dd1503-00', 11, 2),
(9, 'Tatum 1', 'Trước khi họ có thể cộng điểm, MVP của bạn phải bắt tay vào cuộc. Tatum 1 được thiết kế để dễ dàng mang vào, vì vậy trẻ em có thể tự mang giày và bắt đầu giờ chơi nhanh hơn. Nhẹ, bền và an toàn, chúng có đôi chân nhỏ được bảo vệ trong mỗi bước đi lớn\r\nSize:	baby', 1189149, 'tatum-1-old-school-shoes-qdvrQt (3).png', 12, 1),
(10, 'sunray adjust6 ', 'Có lẽ con nhỏ của bạn đang hướng tới lớp học bơi. Hoặc chúng chỉ cần một chiếc dép trượt dễ dàng để chơi và bò dưới ánh nắng mặt trời. Nike Sunray Adapt 6 siêu sang trọng khi thời tiết ấm áp ập đến. Các cạnh giúp giữ chân bé khi chơi—chúng tôi không thích bị trượt! Ngoài ra, còn gì dễ dàng hơn việc đóng dây đeo? Giữ an toàn là điều ít lo lắng nhất của bạn.\r\nSize:	baby', 889000, 'sunray-adjust-6-slides-6xjxth (3).png', 12, 2),
(11, 'Nike Court Borough', 'Hãy khởi đầu thuận lợi cho con bạn với Nike Court Borough. Được chế tạo cho mục đích sử dụng lâu dài, huyền thoại được chế tạo lại này sử dụng sự kết hợp của các vật liệu bền ở mặt trên và đế ngoài để đạt được vẻ ngoài cổ điển với dây đeo dễ dàng tháo lắp. Ngoài ra, hộp ngón chân và phần giữa bàn chân được thiết kế lại giúp bàn chân của họ có thêm một chút không gian để họ có thể thoải mái chạy suốt cả ngày.\r\nSize: baby', 1019000, 'court-borough-low-recraft-shoes-D0nqP8 (3).png', 12, 1),
(12, 'swoosh 1 shoes', 'Những bước đi đầu tiên của bé là một bước ngoặt khá lớn. (Máy ảnh của bạn đã sẵn sàng chưa?) Chúng tôi đã thiết kế Nike Swoosh 1 để cung cấp cho đôi chân của các em những công cụ quan trọng cần thiết cho sự phát triển tự nhiên và giúp ngăn ngừa các vấn đề về chân trong tương lai. Flyknit siêu mềm và nhiều tính năng khác nhau kết hợp để tạo ra một chiếc giày đã giành được Dấu chấp nhận của Hiệp hội Y khoa Bàn chân Hoa Kỳ.\r\nSize: baby', 1529000, 'swoosh-1-shoes-zqmX8g (3).png', 12, 1),
(13, 'Nike Pico 5', 'Nike Pico 5 có kiểu dáng vừa vặn an toàn với lực kéo lớn. Nó được làm từ chất liệu bền, đệm thoải mái và dây đai có thể điều chỉnh để dễ dàng cởi ra.\r\nSize:	Baby', 533399, 'pico-5-shoes-QQ5g1N (3).png', 12, 2),
(14, 'Nike Flex Plus 2', 'Nike Flex Plus 2 không lãng phí thời gian để trẻ học những bước đi đầu tiên và trải nghiệm lần đầu chơi. Chúng ta đang nói về tất cả những khoảnh khắc đầu tiên mà bạn muốn ghi lại làm kỷ niệm, đồng thời giúp đôi chân nhỏ bé của chúng được thoải mái. Hệ thống dây thun cải tiến giúp việc mang giày này trở nên dễ dàng. Điều tuyệt vời nhất: Các nhà thiết kế của chúng tôi đã làm cho chúng trở nên siêu linh hoạt nên mỗi động tác sẽ mang lại cho vận động viên tương lai của bạn sự tự tin để tiếp tục tiến bước.\r\nSize: baby', 1399000, 'flex-plus-2-shoes-S48sDb (3).png', 12, 2),
(15, 'Giày PEGASUS TURBO ', ' Hãy để chú ngựa giống quý giá này giúp bạn vượt qua những chặng đường khó khăn. Hoàn thiện với lớp bọt nhẹ hơn, phản ứng nhanh, được tái sử dụng và phần trên bằng lông vũ, con ngựa có màu sắc sặc sỡ này được tạo ra để giúp bạn tăng nhịp độ mà không phải hy sinh sự thoải mái khi bạn cố gắng đạt thành tích cá nhân tốt nhất. Chiếc xe bất tử này được chế tạo một cách có trách nhiệm với ít nhất 50% vật liệu tái chế tính theo trọng lượng trong khi vẫn duy trì đặc tính hàng ngày đã được thử và đúng của nó.\r\n- Size: 39 40 41', 2550000, 'PEGASUS TURB.png', 13, 1),
(16, 'Giày Nike Invincible 3', 'Với khả năng giảm chấn tối đa để hỗ trợ mỗi dặm, Invincible 3 là mức độ thoải mái cao nhất dưới chân của chúng tôi. Bọt ZoomX sang trọng và nảy giúp bạn luôn ổn định và tươi mới. Nói cách khác—bạn sẽ cảm thấy dễ chịu cả ngày, bất kể bạn đang làm gì. Và khi bạn kết hợp tất cả lớp đệm này với màu sắc dễ tạo kiểu, bạn sẽ có được một đôi giày mà bạn không bao giờ muốn ngừng mang.\r\n- Size: 36.5', 2800000, 'Nike Invincible 3.png', 13, 2),
(17, 'Giày Nike Air Max Command \'White Gray Red\' ', ' Mang tính cách mạng vào năm 1987 và vẫn còn phù hợp cho đến ngày nay, Nike Air Max Command mang đến cảm giác cổ điển với sự sang trọng sang trọng của đệm Nike Air và đế giữa bằng bọt mềm. Phần trên bằng vật liệu hỗn hợp có các đường cắt để tăng thêm chiều sâu trong khi đế ngoài Waffle mang lại kiểu dáng và độ bền di sản.\r\n- Sỉze: 36, 36.5, 37.5, 38', 1680000, 'Giày Nike Air Max Command \'White Gray Red\'.png', 13, 1),
(18, 'Giày Đá bóng Nike Zoom Mercurial Vapor 15 Academy - Cam  JapanSport DZ3477-800', ' Bước vào buổi bình minh của một ngày mới và khiến cả thế giới chú ý đến kỹ năng của bạn. Thiết kế ánh kim hào nhoáng, đồ họa tương lai và màu sắc rực rỡ giống như mặt trời mọc chuyển màu nói lên sức mạnh hấp dẫn của trò chơi dành cho nữ, một lực lượng chính thức có khả năng đoàn kết chúng ta trong và ngoài sân cỏ. Được thiết kế để đưa trò chơi của bạn lên một tầm cao mới, nó có đệm Zoom Air và kết cấu bám dính phía trên để mang lại cảm giác chạm chính xác, nhờ đó bạn có thể phát huy hết khả năng trong những phút yếu ớt của trận đấu.\r\n- Size: 42, 44', 1380000, 'giày đá bóng.png', 13, 2),
(23, 'Nike Force 1 Mid SE EasyOn', 'Mặc dù những đôi giày thể thao này trông giống như một chiếc AF-1 cổ điển nhưng có một điểm khác biệt rất hữu ích. Bạn có thể nhận ra nó? Dây buộc trên phiên bản đặc biệt này chỉ để trưng bày. Trên thực tế, phần ren nâng lên nên đôi chân vặn vẹo có thể trượt vào dễ dàng. Dây đeo nhanh chóng giúp bạn khóa và điều chỉnh vừa vặn. Không cần buộc!\r\n\r\nSize:	baby', 1909000, 'Nike Force 1 Mid SE EasyOn.png', 13, 1),
(24, 'Jordan Lil Drip', 'Với chất liệu dệt bền chắc, đôi giày bốt linh hoạt này được thiết kế dành cho những chuyến phiêu lưu. Nhà thám hiểm nhỏ bé của bạn thích tự mình làm mọi việc, vì vậy chúng tôi đã thiết kế tay cầm để giúp việc kéo chúng trở nên dễ dàng. Đế ngoài bằng cao su—với lực kéo lấy cảm hứng từ lốp xe tải quái vật—mang lại cho giày độ bám cần thiết khi di chuyển trên sân chơi, vỉa hè và cánh đồng lầy lội. Bị bẩn chưa bao giờ trông dễ thương đến thế.\r\nSize:	baby', 1073399, 'Jordan Lil Drip.jpg', 12, 2),
(25, 'Nike Sunray Adjust 6', 'Có lẽ con nhỏ của bạn đang hướng tới lớp học bơi. Hoặc chúng chỉ cần một chiếc dép trượt dễ dàng để chơi và bò dưới ánh nắng mặt trời. Nike Sunray Adapt 6 siêu sang trọng khi thời tiết ấm áp ập đến. Các cạnh giúp giữ chân bé khi chơi—chúng tôi không thích bị trượt! Ngoài ra, còn gì dễ dàng hơn việc đóng dây đeo? Giữ an toàn là điều ít lo lắng nhất của bạn.\r\nSize:	baby', 889000, 'Nike Sunray Adjust 6.png', 12, 2),
(26, 'Giày Thể Thao Nike Air Jordan 1 Zoom CMFT Pink Oxford Phối Màu ', 'Giày Thể Thao Nike Air Jordan 1 Zoom CMFT Pink Oxford Phối Màu được thiết kế mang nét thể thao phóng đại với phong cách trẻ trung, khỏe khoắn đặc trưng của thương hiệu Nike nỗi tiếng của Mỹ. Mẫu giày hoàn hảo về chất lượng và vô cùng đẹp mắt chắc chắn bạn sẽ khó bỏ lỡ.\r\nSize:	36 36.5 37.5 38 38.5 39 40 ', 7020000, 'Giày Thể Thao Nike Air Jordan 1 Zoom CMFT Pink Oxf', 11, 1),
(27, 'Giày Sneaker Nữ Nike Running Shoes Air Winflow 10 White DV4023-103', 'Giày Sneaker Nữ Nike Running Shoes Air Winflow 10 White DV4023-103 Màu Trắng là mẫu giày thể thao trẻ trung, khỏe khoăn của thương hiệu Nike nổi tiếng của Mỹ. Running Shoes Air Winflow 10 White DV4023-103 với kiểu dáng vô cùng đẹp mắt chắc hẳn sẽ đem đến cho bạn một phong cách hoàn toàn mới và đầy trải nghiệm.\r\nSize:	36 36.5 37.5 38 38.5 39 40 ', 2900000, 'Giày Sneaker Nữ Nike Running Shoes Air Winflow 10 ', 11, 2),
(28, 'Jordan Lil Drip', 'Với chất liệu dệt bền chắc, đôi giày bốt linh hoạt này được thiết kế dành cho những chuyến phiêu lưu. Nhà thám hiểm nhỏ bé của bạn thích tự mình làm mọi việc, vì vậy chúng tôi đã thiết kế tay cầm để giúp việc kéo chúng trở nên dễ dàng. Đế ngoài bằng cao su—với lực kéo lấy cảm hứng từ lốp xe tải quái vật—mang lại cho giày độ bám cần thiết khi di chuyển trên sân chơi, vỉa hè và cánh đồng lầy lội. Bị bẩn chưa bao giờ trông dễ thương đến thế.\r\nSize:	baby', 1073399, 'Jordan Lil Drip.png', 12, 1),
(29, 'Nike Dynamo 2 EasyOn', 'Đánh thức con rồng bên trong con bạn với Nike Dynamo 2 EasyOn. Được thiết kế để vui chơi mọi lúc, đôi giày mềm mại và sang trọng này nhằm mục đích giúp trẻ em tiến bộ nhanh chóng. Họ có thể dậm xuống gót chân có thể thu gọn và trượt chân nhanh chóng. Hoặc, nếu họ chưa sẵn sàng tự làm việc đó, bạn có thể chỉ cho họ cách thực hiện bằng cách ấn gót chân xuống.\r\n\r\nSize:	Baby', 1399000, 'Nike Dynamo 2 EasyOn.png', 12, 2),
(30, 'Nike Force 1 Mid SE EasyOn', 'Mặc dù những đôi giày thể thao này trông giống như một chiếc AF-1 cổ điển nhưng có một điểm khác biệt rất hữu ích. Bạn có thể nhận ra nó? Dây buộc trên phiên bản đặc biệt này chỉ để trưng bày. Trên thực tế, phần ren nâng lên nên đôi chân vặn vẹo có thể trượt vào dễ dàng. Dây đeo nhanh chóng giúp bạn khóa và điều chỉnh vừa vặn. Không cần buộc!\r\n\r\nSize:	baby', 1909000, 'Nike Force 1 Mid SE EasyOn.png', 12, 1),
(31, 'Nike Star Runner 3', 'Chúng ta có một số ngôi sao quyền lực ở đây. Nike Star Runner 3 phóng lên bầu trời với những đôi giày sẵn sàng để chơi được thiết kế cho mỗi bước bò cho đến từng bước trưởng thành. Chúng tôi đã bổ sung thêm 2 dây đai để dễ dàng cởi ra, cùng với lớp xốp siêu mềm và rất linh hoạt để tăng thêm sự thoải mái. Được thiết kế hướng tới Trái đất, chúng được làm từ ít nhất 20% vật liệu tái chế tính theo trọng lượng.\r\nSize: baby.', 976649, 'Nike Star Runner 3.png', 12, 2),
(32, 'Giày Air Zoom Structure 25 - Đen  JapanSport DJ7883-003', 'Với sự ổn định ở nơi bạn cần và đệm ở nơi bạn muốn, Structure 25 hỗ trợ bạn trong những chặng đường dài, những buổi tập luyện ngắn và thậm chí cả những bước lùi trước khi ngày kết thúc. Đó là sự ổn định mà bạn tìm kiếm, trung thành ngay từ lần buộc đầu tiên, đã được thử và kiểm nghiệm, với hệ thống giữa bàn chân hỗ trợ hoàn toàn và có lớp đệm thoải mái hơn trước.\r\n- Size: 39, 40, 40.5, 42', 2280000, 'Giày Air Zoom Structure 25 - Đen JapanSport DJ7883', 13, 1),
(33, 'Giày Air Max Excee - Đen  JapanSport DZ0795-001', 'Hòa mình vào phong cách với Air Max Excee, nổi bật với những gam màu nổi bật tinh tế cho phong cách thách thức thời gian. Lấy cảm hứng từ Air Max 90, những đôi giày này mang đến nét hiện đại trên biểu tượng huyền thoại thông qua các đường nét thiết kế thon dài và tỷ lệ méo mó.\r\n- Size: 40 40.5 41 42.5 43 44', 1780000, 'Giày Air Max Excee - Đen JapanSport DZ0795-001.png', 13, 2),
(34, 'Giày Air Max 1 Escape - Đen  JapanSport FJ0698-100', 'AM1 Escape kết hợp DNA chạy cổ điển với các chi tiết lấy cảm hứng từ Tây Bắc Thái Bình Dương. Những màu sắc nổi bật được lấy từ một quảng cáo chạy bộ mang tính biểu tượng của Nike—một quảng cáo có hình Núi St. Helens\' miệng núi lửa cuồn cuộn trong nền. Khung cảnh rừng thêu dưới gót chân thật đáng để du ngoạn. Và các điểm nhấn bằng da lộn chắc chắn, chất liệu vải thoáng mát và dây buộc lấy cảm hứng từ giày bốt sẽ hoàn thiện vẻ ngoài của bạn.\r\n- Size: 44', 2500000, 'Giày Air Max 1 Escape - Đen JapanSport FJ0698-100.', 13, 1),
(35, 'Giày Air Force 1 React - Trắng  JapanSport DM0573-100', 'Từ những chiếc vòng đinh cho đến huyền thoại đường phố đô thị, Nike AF1 React tiến thêm một bước nữa vào lĩnh vực biểu tượng giày. Các tính năng nâng cao từ đế ngoài cho đến nhãn hiệu tạo thêm nét ấn tượng cho vẻ ngoài nổi bật trong khi công nghệ Nike React hỗ trợ mang lại một chuyến đi suôn sẻ. Nổi bật để phù hợp.\r\n- Size: 35.5 36 36.5 37.5 38 38.5', 2550000, 'Giày Air Force 1 React - Trắng JapanSport DM0573-1', 13, 2),
(36, 'Giày Air Force 1 Premium MF Vachetta TanWhite  JapanSport DR9503-201', 'Người ta nói đường đến trái tim là qua sô cô la. Họ đã sai. Tận hưởng niềm hạnh phúc thực sự với sản phẩm thủ công này dựa trên bản gốc b-ball. Kết hợp da mịn với dây buộc bằng sáp, nó mang lại tình yêu ngay từ cái nhìn đầu tiên. Nhãn lưỡi bằng da và dubrae tạo thêm nét nghệ thuật trong khi đệm khí đặt quả anh đào ở phía dưới—đặt bạn nhẹ nhàng trên tầng 9.\r\n- Size: 43 44', 1950000, 'Giày Air Force 1 Premium MF Vachetta TanWhite Japa', 13, 1),
(37, 'Giày Air Force 1 \'07 - Đen trắng  JapanSport FD2592-002', 'Là một sản phẩm mới của giày bóng rổ mang tính biểu tượng và phổ biến. Để đạt được sự vừa vặn thoải mái với đặc tính đệm tuyệt vời, da tổng hợp được hoàn thiện với màu sắc dễ phối hợp với mọi phong cách. Được giới thiệu vào năm 1982 như một vật dụng không thể thiếu trong môn bóng rổ, Air Force 1 đã tạo dựng được vị thế không thể lay chuyển vào những năm 1990. Phong cách trắng-trắng cổ điển, sạch sẽ lan rộng từ sân bóng rổ đến thành phố, nhận được sự ủng hộ rộng rãi. Nó đã dần dần thâm nhập vào văn hóa hip-hop, đồng thời các mô hình và màu sắc hợp tác hạn chế cũng đã xuất hiện. Air Force 1 đã trở thành đôi giày thể thao mang tính biểu tượng trên toàn thế giới. Hơn 2.000 phiên bản đã được bắt nguồn từ món đồ cổ điển này. Nó có ảnh hưởng rất lớn đến thời trang, nền âm nhạc và văn hóa sneaker.\r\n- Size: 39 40 40.5 42 42.5 43', 2750000, 'Giày Air Force 1 \'07 - Đen trắng JapanSport FD2592', 13, 2),
(38, 'Giày Thể Thao Nữ Nike Air Force 1 Shadow DV7449-101 Màu Hồng Be', 'Giày Thể Thao Nữ Nike Air Force 1 Shadow DV7449-101 Màu Hồng Be là mẫu giày thể thao trẻ trung, khỏe khoắn của thương hiệu Nike nỗi tiếng của Mỹ. Nike Air Force 1 Shadow DV7449-101 hoàn hảo về chất lượng và kiểu dáng vô cùng đẹp mắt chắc hẳn sẽ đem đến cho bạn trải nghiệm tuyệt vời.\r\nSize:	36 36.5 37.5 38 38.5 39 40 40.5 41 42 42.5 43 44 ', 3990000, 'Giày Thể Thao Nữ Nike Air Force 1 Shadow DV7449-10', 11, 1),
(40, 'Giày Thể Thao Nike Air Force 1 Low Shadow ‘Sail Pink Glaze’ CI0919-111 Phối Màu', 'Giày Thể Thao Nữ Nike Air Max 90 Futura Unlocked By You DX5047-900 Phối Màu là mẫu giày được thương hiệu Nike nổi tiếng của Mỹ thiết kế mang phong cách đậm chất thể thao trẻ trung và vô cùng năng động. Hoàn hảo về chất lượng và kiểu dáng đẹp mắt, Nike Air Max 90\r\nFutura Unlocked By You DX5047-900 đang được giới trẻ yêu thích và săn đón.\r\nSize:	35.5 36.5 37.5 38 38.5 39 40 40.5 41 42 42.5 43 44 44.5 45 ', 6500000, 'Giày Thể Thao Nike Air Force 1 Low Shadow ‘Sail Pi', 11, 1),
(41, 'Giày PEGASUS TURBO - Xám  JapanSport DM3413-005', ' Hãy để chú ngựa giống quý giá này giúp bạn vượt qua những chặng đường khó khăn. Hoàn thiện với lớp bọt nhẹ hơn, phản ứng nhanh, được tái sử dụng và phần trên bằng lông vũ, con ngựa có màu sắc sặc sỡ này được tạo ra để giúp bạn tăng nhịp độ mà không phải hy sinh sự thoải mái khi bạn cố gắng đạt thành tích cá nhân tốt nhất. Chiếc xe bất tử này được chế tạo một cách có trách nhiệm với ít nhất 50% vật liệu tái chế tính theo trọng lượng trong khi vẫn duy trì đặc tính hàng ngày đã được thử và đúng của nó.\r\n- Size: 39 40 41', 2550000, 'Giày PEGASUS TURBO - Xám JapanSport DM3413-005.png', 13, 1),
(42, 'Giày Đá bóng Nike Zoom Mercurial Vapor 15 Academy - Cam  JapanSport DZ3477-800', 'Bước vào buổi bình minh của một ngày mới và khiến cả thế giới chú ý đến kỹ năng của bạn. Thiết kế ánh kim hào nhoáng, đồ họa tương lai và màu sắc rực rỡ giống như mặt trời mọc chuyển màu nói lên sức mạnh hấp dẫn của trò chơi dành cho nữ, một lực lượng chính thức có khả năng đoàn kết chúng ta trong và ngoài sân cỏ. Được thiết kế để đưa trò chơi của bạn lên một tầm cao mới, nó có đệm Zoom Air và kết cấu bám dính phía trên để mang lại cảm giác chạm chính xác, nhờ đó bạn có thể phát huy hết khả năng trong những phút yếu ớt của trận đấu.\r\n- Size: 42, 44', 1380000, 'Giày Đá bóng Nike Zoom Mercurial Vapor 15 Academy ', 13, 2),
(43, 'Giày Air Max Excee1 - Đen  JapanSport DZ0795-001', 'Hòa mình vào phong cách với Air Max Excee, nổi bật với những gam màu nổi bật tinh tế cho phong cách thách thức thời gian. Lấy cảm hứng từ Air Max 90, những đôi giày này mang đến nét hiện đại trên biểu tượng huyền thoại thông qua các đường nét thiết kế thon dài và tỷ lệ méo mó.\r\n- Size: 40 40.5 41 42.5 43 44', 1780000, 'Giày Air Max Excee1 - Đen JapanSport DZ0795-001.pn', 12, 1),
(44, 'Giày Air Max 1.1 Escape - Đen  JapanSport FJ0698-100', 'AM1 Escape kết hợp DNA chạy cổ điển với các chi tiết lấy cảm hứng từ Tây Bắc Thái Bình Dương. Những màu sắc nổi bật được lấy từ một quảng cáo chạy bộ mang tính biểu tượng của Nike—một quảng cáo có hình Núi St. Helens\' miệng núi lửa cuồn cuộn trong nền. Khung cảnh rừng thêu dưới gót chân thật đáng để du ngoạn. Và các điểm nhấn bằng da lộn chắc chắn, chất liệu vải thoáng mát và dây buộc lấy cảm hứng từ giày bốt sẽ hoàn thiện vẻ ngoài của bạn.\r\n- Size: 44', 2500000, 'Giày Air Max 1.1 Escape - Đen JapanSport FJ0698-10', 13, 2),
(45, 'Giày Thể Thao Nữ Nike Air Max Excie CD5432-604 Phối Màu', 'Giày Thễ Thao Nữ Nike Air Max Excie CD5432-604 Phối Màu được làm từ chất liệu vải đột cao cấp với độ ôm được\r\nthiết kế đặc biệt để nâng đỡ có định hướng và hỗ trợ chuyễn động. Form giày đi lên chân vừa vặn, các đường nét của đôi\r\ngiày vô cũng tỉnh tế và sắc sảo hài lòng mọi khách hàng \r\nBên trong có đề đệm êm ái, mang lại cảm giác dễ chịu khi sử dụng, không gây đau chân. Đề giày mềm nhẹ và ma sát tốt\r\nhạn chế trơn trượt và mang lại sự thoải mái ngay cả khi bạn đi giày trong một khoảng thời gian dài \r\nSize:	36 36.5 37.5 38 38.5 39 40 ', 3500000, 'Giày Thể Thao Nữ Nike Air Max Excie CD5432-604 Phố', 11, 1),
(49, 'Giày Nike Air Max Command \'White Gray Red\' - Hồng  JapanSport 397690-169', ' Mang tính cách mạng vào năm 1987 và vẫn còn phù hợp cho đến ngày nay, Nike Air Max Command mang đến cảm giác cổ điển với sự sang trọng sang trọng của đệm Nike Air và đế giữa bằng bọt mềm. Phần trên bằng vật liệu hỗn hợp có các đường cắt để tăng thêm chiều sâu trong khi đế ngoài Waffle mang lại kiểu dáng và độ bền di sản.\r\n- Sỉze: 36, 36.5, 37.5, 38', 1680000, 'Giày Nike Air Max Command \'White Gray Red\' - Hồng ', 11, 1),
(50, 'Air Zoom Structure 25 - Đen  JapanSport DJ7883-003', 'Với sự ổn định ở nơi bạn cần và đệm ở nơi bạn muốn, Structure 25 hỗ trợ bạn trong những chặng đường dài, những buổi tập luyện ngắn và thậm chí cả những bước lùi trước khi ngày kết thúc. Đó là sự ổn định mà bạn tìm kiếm, trung thành ngay từ lần buộc đầu tiên, đã được thử và kiểm nghiệm, với hệ thống giữa bàn chân hỗ trợ hoàn toàn và có lớp đệm thoải mái hơn trước.\r\n- Size: 39, 40, 40.5, 42', 2280000, 'Air Zoom Structure 25 - Đen JapanSport DJ7883-003.', 13, 2);

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
-- Table structure for table `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `id` int(11) NOT NULL,
  `phuongthuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `thanhtoan`
--

INSERT INTO `thanhtoan` (`id`, `phuongthuc`) VALUES
(1, 'Thanh toán tiền mặt'),
(2, 'Chuyển khoản ngân hàng\r\n'),
(3, 'Ví MoMo');

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
  `idrole` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idKH`, `TenKH`, `diachiKH`, `diachiemailKH`, `sodienthoaiKH`, `idrole`, `password`) VALUES
(1, 'tran bao anh kha', 'ấp b xã a huyện d tỉnh F', 'kha23@gmail.com', '0987543234', 1, '123456789'),
(2, 'nguyen nhu hen', 'đường D5 huyện nhà bè tỉnh thành phố HCM', 'nhuycute@gmail.com', '0789564218', 1, '3456789'),
(4, 'admin1', '', 'admin1@gmail.com', '', 2, 'admin1'),
(5, 'user1', '', 'user1@gmail.com', '', 1, 'user1'),
(6, 'user2', '', 'user2@gmail.com', '', 1, 'user2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`iddm`);

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
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_ibfk_2` (`status`),
  ADD KEY `order_ibfk_4` (`id_phuongthuc`),
  ADD KEY `FK_idKH` (`idKH`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_ibfk_1` (`order_id`),
  ADD KEY `order_details_ibfk_2` (`masp`),
  ADD KEY `order_details_ibfk_3` (`idKH`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idSP`),
  ADD KEY `idLoaisp` (`idLoaisp`),
  ADD KEY `iddm` (`iddm`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`idSize`),
  ADD KEY `idSP` (`idSP`);

--
-- Indexes for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idKH`),
  ADD KEY `idrole` (`idrole`),
  ADD KEY `FK_idKH` (`idKH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `iddm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `idLoaisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mausp`
--
ALTER TABLE `mausp`
  MODIFY `idmau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `idSize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mausp`
--
ALTER TABLE `mausp`
  ADD CONSTRAINT `mausp_ibfk_1` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`status`) REFERENCES `user` (`idKH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`status`) REFERENCES `order_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_4` FOREIGN KEY (`id_phuongthuc`) REFERENCES `thanhtoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`idSP`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`idKH`) REFERENCES `user` (`idKH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idLoaisp`) REFERENCES `loaisp` (`idLoaisp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`iddm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
