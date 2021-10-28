-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2021 lúc 11:04 AM
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
-- Cơ sở dữ liệu: `project_quanghaisport`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_bill`
--

CREATE TABLE `tbl_bill` (
  `billId` int(10) NOT NULL,
  `custId` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `payment_methods` varchar(255) NOT NULL COMMENT '0: thanh toán khi nhận hàng, 1: thanh toán bằng paypal\r\n',
  `total_money` float NOT NULL,
  `payment_status` int(10) NOT NULL COMMENT '0: chưa thanh toán ,1: Đã thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_bill`
--

INSERT INTO `tbl_bill` (`billId`, `custId`, `date`, `payment_methods`, `total_money`, `payment_status`) VALUES
(26, 4, '08/10/21  07:44:23', 'Thanh Toán khi nhận hàng', 1389000, 1),
(27, 4, '08/10/21  07:46:03', 'Thanh Toán khi nhận hàng', 990000, 1),
(28, 4, '08/10/21  07:50:47', 'Thanh Toán khi nhận hàng', 990000, 2),
(29, 4, '08/10/21  07:52:10', 'Thanh Toán khi nhận hàng', 122222, 0),
(30, 4, '08/10/21  07:55:19', 'Thanh Toán khi nhận hàng', 122222, 0),
(31, 4, '08/10/21  07:56:56', 'Thanh Toán khi nhận hàng', 5899000, 2),
(32, 21, '09/10/21  06:06:48', 'Thanh Toán khi nhận hàng', 275000, 0),
(33, 23, '09/10/21  06:29:38', 'Thanh Toán khi nhận hàng', 990000, 1),
(34, 23, '09/10/21  06:31:19', 'Thanh Toán khi nhận hàng', 396000, 0),
(35, 23, '09/10/21  06:32:09', 'Thanh Toán khi nhận hàng', 396000, 2),
(36, 4, '16/10/21  03:10:45', 'Thanh Toán khi nhận hàng', 2044000, 1),
(37, 4, '16/10/21  04:38:48', 'Thanh Toán khi nhận hàng', 989000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `prodId` int(10) NOT NULL,
  `prodName` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `billId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(10) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(17, 'Nam'),
(20, 'Nữ'),
(21, 'Trẻ Em'),
(22, 'Dụng cụ & Linh kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_child`
--

CREATE TABLE `tbl_category_child` (
  `catChildId` int(10) NOT NULL,
  `catChildName` varchar(255) NOT NULL,
  `catId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_child`
--

INSERT INTO `tbl_category_child` (`catChildId`, `catChildName`, `catId`) VALUES
(1, 'Giày dép', 17),
(2, 'Áo', 17),
(3, 'Quần', 17),
(4, 'Đồ Bơi', 17),
(5, 'Giày dép', 20),
(6, 'Áo', 20),
(7, 'Quần', 20),
(8, 'Đồ Bơi', 20),
(9, 'Giày Dép', 21),
(10, 'Áo', 21),
(11, 'Quần', 21),
(12, 'Đồ bơi', 21),
(13, 'Trang bị thể thao', 21),
(14, 'Balo & Túi', 22),
(15, 'Phụ kiện điện tử', 22),
(16, 'Chạy bộ & đi bộ', 22),
(17, 'Thể thao ngoài trời', 22),
(18, 'Trang bị thể thao', 22),
(19, 'Dụng cụ', 21),
(22, 'Leo Núi', 22),
(23, 'sản phẩm 1', 27),
(24, 'Test', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `commId` int(10) NOT NULL,
  `replyId` int(10) DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `prodId` int(10) NOT NULL,
  `custId` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`commId`, `replyId`, `content`, `prodId`, `custId`, `date`, `role`) VALUES
(88, NULL, 'sản phẩm này còn không ad\n', 175, 18, '20-10-21 10:10:01', 0),
(89, NULL, 'tôi muốn mua sản phẩm này với size to hơn\n\n', 175, 18, '20-10-21 10:10:23', 0),
(90, NULL, 'áo polo này có màu đen không ?', 184, 18, '20-10-21 10:10:48', 0),
(91, NULL, 'tôi muốn mua\n', 173, 18, '20-10-21 10:10:15', 0),
(92, NULL, 'sản phầm này còn không bạn\n', 184, 52, '20-10-21 10:10:43', 0),
(93, NULL, 'ib e với ', 180, 52, '20-10-21 10:10:20', 0),
(94, NULL, 'cái này dành cho mấy đứa nhỏ chơi có an toàn không nhỉ ?\n', 175, 52, '20-10-21 10:10:50', 0),
(95, 93, '<p>sản phẩm n&agrave;y b&ecirc;n shop vẫn c&ograve;n rất nhiều ạ</p>', 180, 27, '20-10-21 11:10:04', 1),
(96, 91, '<p>b&ecirc;n m&igrave;nh tạm thời hết h&agrave;ng ạ.</p>', 173, 27, '20-10-21 11:10:42', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `custId` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `urlImage` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roles` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`custId`, `username`, `password`, `name`, `urlImage`, `active`, `address`, `phone`, `email`, `roles`) VALUES
(2, 'loren kid ', 'b4f3eb846524524c3fd046285486818a', 'loee nguyễn A', '75a9de80c1.jpg', 0, 'Đà Nẵng', '09123123', 'loe@gmail.com', 0),
(3, 'đặng anh tuân', 'tuan', 'dang anh tuan', '', 1, ' quảng nam', '0929992', 'thang@gmail.com', 0),
(4, 'tuananh', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Tuấn Anh 2022', '', 1, 'Quảng Điền , thừa  thiên huế, Quảng Nam', '9999192312', 'hue@gmail.com', 1),
(5, 'trung462', '415d454bad33f0fcbff46d07bff5ade6', 'Trần Văn Trung', '46d8002eeb.jpg', 1, 'Thừa Thiên Huế', '0912314122', 'trung@gmail.com', 0),
(9, 'trung123', '827ccb0eea8a706c4c34a16891f84e7b', 'trung văn A', '', 1, 'thừa thiên huế', '0973127008', 'trungtv0910@gmail.com', 1),
(12, 'tuanb', 'e10adc3949ba59abbe56e057f20f883e', 'Tuấn B', 'b559026659.jpg', 1, 'thừa thiên huế', '0973127008', 'trungtvpd04212@fpt.edu.vn', 1),
(14, 'asssa', '5d793fc5b00a2348c3fb9ab59e5ca98a', 'trung văn A', '7fa44426b1.jpg', 1, 'đà nẵng', '01231234', '09731270082@gmail.com', 0),
(15, '12311', '96e79218965eb72c92a549dd5a330112', 'Tuấn C', 'b52246dad1.jpg', 1, 'Quảng Nam', '01231234', 'trungtv0910@gmail.com', 0),
(16, 'admin', '5de87ecb65152f53f8bbec40107ebd9e', 'quản trị', '997fa1059d.jpg', 1, 'Quảng Nam', '01231234', 'trungtvpd04212@fpt.edu.vn', 1),
(17, 'testvnexpress091', '827ccb0eea8a706c4c34a16891f84e7b', 'loee nguyễn BAC', '', 1, 'Nghệ An', '09777331231', 'ngoctrinh@gmail.com', 0),
(18, 'aolang', 'cb93ac4d34e44637656b7c8e8fee6fa1', 'aolang ', '', 1, 'đà nẵng', '01231234', 'ao@gmail.com', 0),
(20, 'taiw', '6d2e38b607b2622649f1b8d7a8314398', 'taiw', '', 1, 'thừa thiên huế', '912312312', 'taiw@gmail.com', 0),
(22, 'okela', '50d9364250214f821e536fe32997160d', 'okela', '', 1, 'Hà Nội', '0973127008', 'okela@gmail.com', 0),
(24, 'okela2', '8e1a57251cdb59e0d9431b7d4bfcbf73', 'okela2', '', 1, 'Huế', '0973127008', 'okela2@gmail.com', 0),
(25, 'trung2', 'e10adc3949ba59abbe56e057f20f883e', 'trung văn ', '', 1, 'Huế', '0973127008', 'trung2@gmail.com', 0),
(26, 'trung2', 'e10adc3949ba59abbe56e057f20f883e', 'trung văn ', '', 1, 'Huế', '0973127008', 'trung2@gmail.com', 0),
(27, 'trungtv0910', '2f21f5eb3ea8b064d402594d5b2b401a', 'trung văn A', '2d3c3c3b21.jpg', 1, 'Quảng Xương Điền Hương Thừa Thiên Huế', '0973127008', 'trungtv0910a@gmail.com', 1),
(48, 'test1', '2f21f5eb3ea8b064d402594d5b2b401a', 'Vantrung', '', 1, 'hue', '1111111111111113', 'test1@gmail.com', 0),
(52, 'caosang', '2f21f5eb3ea8b064d402594d5b2b401a', 'cao sang trần', '', 1, 'thon 2 nghệ tú, Nghệ An', '0972112455', 'caosang@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `prodId` int(10) NOT NULL,
  `prodName` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` float NOT NULL,
  `discount` float DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `dayInput` varchar(255) NOT NULL,
  `prodDesc` longtext NOT NULL,
  `view` int(10) DEFAULT NULL,
  `catId` int(10) NOT NULL,
  `type` int(10) NOT NULL,
  `catChildId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`prodId`, `prodName`, `quantity`, `price`, `discount`, `image`, `dayInput`, `prodDesc`, `view`, `catId`, `type`, `catChildId`) VALUES
(164, 'Áo khoát chống thấm nam', 200, 122222, 0, 'a15f223217.jpg', '29/09/2021', '<p>Mức Gi&aacute; Tốt Nhất</p>\r\n<p>\"</p>', 10, 17, 1, 2),
(165, 'Áo Polo chơi Tenis', 200, 145000, 0, '87cbc4e065.jpg', '29/09/2021', '<p>&Aacute;o polo chơi thể thao</p>\r\n<p>\"</p>', 7, 17, 0, 2),
(166, 'Quần Short tập fitnet đen', 22, 99000, 0, 'f70ec100d3.jpg', '29/09/2021', '<p>d&ugrave; bạn đang quay trở lại luyện tập hay mới bắt đầu th&igrave; quần short fitness l&agrave; một lựa chọn th&ocirc;ng minh</p>\r\n<p>\"</p>', 8, 17, 1, 3),
(167, 'Quần dài đi bộ tresking', 220, 445000, 0, '8528e6bc3d.jpg', '29/09/2021', '<p>Quần d&agrave;i 2 trong 1, c&oacute; thể mặc như quần short</p>\r\n<p>\"</p>\r\n<p>\"</p>\r\n<p>\"</p>', 6, 17, 1, 3),
(168, 'Giày đi bộ PW 100 cho nam -Xám', 200, 275000, 0, '68b1e72dfa.jpg', '30/09/2021', '<p>Kh&aacute;m ph&aacute; qu&aacute; tr&igrave;nh đi bộ với mức gi&aacute; phải chăng nhất nhờ c&ocirc;ng nghệ Flex-H độc quyền mang đến sự linh hoạt.Độ đ&agrave;n hồi tốt v&agrave; trọng lượng nhẹ\"</p>', 18, 17, 2, 1),
(169, 'Đồng hồ định vị GPS', 100, 2900000, 0, 'e68d30ccb0.jpg', '30/09/2021', '<p>C&aacute;c chỉ số v&agrave; đánh d&acirc;́u ban đầu gi&uacute;p bạn tiến bộ (tốc độ, đo t&ocirc;́c đ&ocirc;̣ , khoảng c&aacute;ch, nhịp tim, v&ugrave;ng mục ti&ecirc;u, s&ocirc;́ v&ograve;ng). Truy&ecirc;̀n và ph&acirc;n tích các hoạt đ&ocirc;̣ng', 12, 22, 2, 15),
(170, 'Quần short chạy bộ Kiprun Light cho nam - Đen', 22, 445000, 0.2, 'a4e6b9a39d.jpg', '30/09/2021', '<p>ch&uacute;ng t&ocirc;i thiết kế mẫu quần short chạy bộ trọng lượng nhẹ n&agrave;y để chạy bộ trong thời ti&ecirc;́t nóng.Bạn đang t&igrave;m sản phẩm nhẹ? Kh&ocirc;ng những nhẹ, mẫu quần short chạy bộ cho nam n&agrave;y c&ograve;n được thiết kế với &', 28, 17, 2, 1),
(171, 'Xà đơn đa năng 500', 200, 545000, 0, '0c07336c1f.jpg', '30/09/2021', '<p>x&agrave; đơn 500 l&agrave; loại x&agrave; đa năng Thiết kế buổi tập của bạn: k&eacute;o x&agrave; đơn, đẩy ngực v&agrave; k&eacute;o x&agrave; k&eacute;p. c&oacute; thể điều chỉnh x&agrave; sao cho ph&ugrave; hợp với &ocirc; cửa.\"</p>\r\n<p>\"</p>', 5, 22, 1, 17),
(172, 'Bộ 2 tạ cầm tay 1 kg - Xanh lá', 200, 195000, 0, 'ade9174175.jpg', '30/09/2021', '<p>Tạ cầm tay l&agrave; sản phẩm kh&ocirc;ng thể thiếu trong bộ trang bị tập luyện. Sản phẩm c&oacute; sẵn 6 trọng lượng để ph&ugrave; hợp với nhu cầu tập luyện của bạn.Bạn sẽ y&ecirc;u th&iacute;ch: - Tay cầm thoải m&aacute;i - H&igrave;nh d&aacute;ng gi', 21, 22, 1, 17),
(173, 'Thảm fitness trong nhà và ngoài trời', 100, 396000, 0, '38ca67e3a2.jpg', '30/09/2021', '<p>Tập cơ, trong nh&agrave; v&agrave; ngo&agrave;i trời. Thảm 120 x 80 cm c&oacute; thể sử dụng với gi&agrave;y v&agrave; cho tất cả c&aacute;c hoạt động.Thảm n&agrave;y được thiết kế bởi những người y&ecirc;u th&iacute;ch luyện tập sức mạnh v&agrave; thể', 32, 22, 1, 17),
(174, 'Xà đơn khóa được 70 cm', 200, 545000, 0, 'b14447d52c.jpg', '30/09/2021', '<p>Ch&uacute;ng t&ocirc;i thiết kế x&agrave; đơn n&agrave;y cho những b&agrave;i tập thể h&igrave;nh đơn giản tại nh&agrave;.Bạn muốn một thanh x&agrave; lắp đặt nhanh ch&oacute;ng? H&atilde;y thử x&agrave; đơn của ch&uacute;ng t&ocirc;i: c&oacute; thể lắ', 21, 22, 1, 18),
(175, 'Bạt nhún tập cardio fitness Fit Trampo 100', 200, 300000, 0, '8e9e13c69a.jpg', '30/09/2021', '<p>ch&uacute;ng t&ocirc;i bảo đảm rằng bạt nh&uacute;n 100 c&oacute; k&iacute;ch cỡ ph&ugrave; hợp cho c&aacute;c buổi tập trong nh&agrave;.Bạn muốn thử tập nhảy fitness? Được trang bị khung th&eacute;p v&agrave; 36 l&ograve; xo, bạt nh&uacute;n 100 của c', 1065, 22, 1, 17),
(177, 'Máy chạy bộ không động cơ W100', 100, 4995000, 0.1, '0952050ad8.jpg', '11/10/2021', '<p>Đội ngũ những người đam m&ecirc; fitness v&agrave; cardio của ch&uacute;ng t&ocirc;i đ&atilde; thiết kế m&aacute;y n&agrave;y để tập đi bộ với độ nghi&ecirc;ng 15%.Đội ngũ những người đam m&ecirc; fitness v&agrave; cardio của ch&uacute;ng t&ocirc;i đ&a', 0, 22, 2, 16),
(178, 'Áo khoác nỉ hiking vùng núi MH520 cho nam - Ngọc lam', 200, 495000, 0.1, '16a5bc9f63.jpg', '11/10/2021', '<p>ch&uacute;ng t&ocirc;i đ&atilde; thiết kế &aacute;o nỉ ấm &aacute;p nhưng cực kỳ tho&aacute;ng kh&iacute; n&agrave;y cho người đi hiking thường xuy&ecirc;n cần &aacute;o c&oacute; trọng lượng nhẹ.Bạn sẽ rất th&iacute;ch chất liệu nỉ t&aacute;i chế ấm &', 0, 17, 2, 2),
(179, 'Giày chạy bộ Run Active cho nữ - Hồng', 22, 695000, 0.1, '71338de8f3.jpg', '11/10/2021', '<p>Đội ngũ của ch&uacute;ng t&ocirc;i ph&aacute;t triển đ&ocirc;i gi&agrave;y n&agrave;y cho nữ chạy bộ tối đa hai lần một tuần. D&agrave;nh cho chạy bộ tr&ecirc;n đường hoặc tr&ecirc;n m&aacute;y chạy bộ.Trọng lượng nhẹ v&agrave; giảm chấn l&agrave; hai ', 7, 20, 1, 5),
(180, 'Quần short tập fitness cardio 500 cho Nữ - Xám/Vànga', 2222, 245000, 0.1, '4a603569ec.jpg', '12/10/2021', '<p>Chiếc quần short được ch&uacute;ng t&ocirc;i tạo ra để gi&uacute;p bạn kh&ocirc;ng bỏ lỡ một buổi tập n&agrave;o của m&igrave;nh!Quần short rộng, tho&aacute;ng m&aacute;t cho sự thoải m&aacute;i cao hơn khi tập!Bạn c&oacute; thể mặc nhiều lớp với quần ', 9, 20, 1, 7),
(181, 'Giày tập Gym đơn giản & Pilates không trượt - Đen', 100, 1500000, 0.1, '46cecd4019.jpg', '13/10/2021', 'thiết kế của chúng tôi đã tạo ra vớ ba lê chống trượt này cho các hoạt động Pilates và gym đơn giản.Những đôi vớ này xỏ vào giống như giày ba lê phẳng và có quai để cải thiện khả năng giữ và các hạt silicone dưới bàn chân để chống trượt trong các hoạt độn', 25, 20, 0, 5),
(184, 'Áo Polo chơi tennis, cầu lông, bóng bàn Dry 100 cho nam - Trắng', 220, 145000, 0.1, 'df961d4ec2.jpg', '17/10/2021', 'Dành cho các môn thể thao dùng vợt (tennis, cầu lông, bóng bàn, padel, squash) trong thời tiết ấm.Áo thun polo thể thao cổ điển này thích hợp với cả môn tennis và cầu lông. Bạn sẽ yêu thích chiếc áo thun polo này bởi lớp vải nhẹ và thoáng mát. Mặc khi thi đấu hoặc chơi thể thao!', 3, 17, 1, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD PRIMARY KEY (`billId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD KEY `fk_cart_bill` (`billId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_category_child`
--
ALTER TABLE `tbl_category_child`
  ADD PRIMARY KEY (`catChildId`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`commId`),
  ADD KEY `fk_cmt_prod` (`prodId`),
  ADD KEY `fk_cmt_cust` (`custId`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`custId`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`prodId`),
  ADD KEY `fk_prod_cat` (`catId`),
  ADD KEY `fk_prod_catChild` (`catChildId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_bill`
--
ALTER TABLE `tbl_bill`
  MODIFY `billId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `tbl_category_child`
--
ALTER TABLE `tbl_category_child`
  MODIFY `catChildId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `commId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `custId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `prodId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `fk_cart_bill` FOREIGN KEY (`billId`) REFERENCES `tbl_bill` (`billId`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `fk_cmt_cust` FOREIGN KEY (`custId`) REFERENCES `tbl_customer` (`custId`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cmt_prod` FOREIGN KEY (`prodId`) REFERENCES `tbl_product` (`prodId`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `fk_prod_cat` FOREIGN KEY (`catId`) REFERENCES `tbl_category` (`catId`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_prod_catChild` FOREIGN KEY (`catChildId`) REFERENCES `tbl_category_child` (`catChildId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
