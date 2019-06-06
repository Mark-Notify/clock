-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2019 at 05:58 PM
-- Server version: 5.5.37-log
-- PHP Version: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usr8oldclo_root`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_profile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `c_detail` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `c_date1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `c_name`, `c_profile`, `post_id`, `c_detail`, `c_date1`) VALUES
(1, 'yuiiko ', '2019-02-09-1549706588.jpg', 1, ' = =', '2019-02-09 10:04:57'),
(2, 'Mark', '2019-02-09-1549703032.jpg', 2, 'กูไม่ซื้อ', '2019-02-09 12:13:21'),
(3, 'mark ', '2019-02-09-1549703032.jpg', 3, 'หาคุกให้เว็บกูละ', '2019-02-12 14:23:08'),
(4, 'mark ', '2019-02-09-1549703032.jpg', 1, 'อิอิ', '2019-02-12 18:44:54'),
(5, 'mark ', '2019-02-09-1549703032.jpg', 1, 'ฟฟฟฟ\r\n', '2019-02-12 19:18:11'),
(6, 'jay ', '2019-02-14-1550080249.jpg', 3, 'สนใจครับ\r\n', '2019-02-13 18:00:43'),
(7, 'jay ', '2019-02-14-1550080249.jpg', 11, 'สนใจครับ', '2019-02-13 18:06:38'),
(8, 'jay ', '2019-02-14-1550080249.jpg', 11, 'สวัสดีครับ ลิซ่า', '2019-02-13 18:07:20'),
(9, 'jay ', '2019-02-14-1550080249.jpg', 10, 'น่าสนใจมากครับ เรือนนี้ผมหามาสักพักเเล้ว\r\n', '2019-02-13 18:07:58'),
(10, 'lisa ', '2019-02-14-1550081057.jpg', 11, 'ราคา 25,000 บาทค่ะ', '2019-02-13 18:18:22'),
(11, 'jay ', '2019-02-14-1550080249.jpg', 12, 'สนใจซื้อครับ', '2019-02-13 18:25:48'),
(12, 'jay ', '2019-02-14-1550080249.jpg', 13, 'สนใจซื้อครับ', '2019-02-13 18:27:03'),
(13, 'jay ', '2019-02-14-1550080249.jpg', 10, 'สนใจซื้อครับผม ', '2019-02-13 18:37:21'),
(14, 'jay ', '2019-02-14-1550080249.jpg', 14, 'สนใจครับผม ติดต่อได้ทางไหนครับ', '2019-02-13 18:38:45'),
(15, 'mark ', '2019-02-09-1549703032.jpg', 11, 'ลิซ่าก็ร้อนเงินเหมือนกันหรอ', '2019-02-15 16:43:15'),
(16, 'mark ', '2019-02-09-1549703032.jpg', 10, 'ไม่ขายแล้ว', '2019-02-17 16:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `create_date`) VALUES
(1, 'ธันย์ชนก  บาริศรี', 'yuiiko009@gmail.com', 'test', 'คนสวย', '2019-02-09 09:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `date1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `user`, `pass`, `pass_hash`, `name`, `profile`, `profile_path`, `about`, `status`, `date1`) VALUES
(1, 'Mark', '1111', 'b59c67bf196a4758191e42f76670ceba', 'Mark', '2019-02-09-1549703032.jpg', './upload/', 'Mark Dev 407', 'admin', '2019-02-12 20:06:15'),
(2, 'ัี่yuii', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'yuiiko', '2019-02-09-1549706588.jpg', './upload/', 'test', 'user', '2019-02-09 10:03:08'),
(3, 'kanit', 'b2u4l3l3y', '258001f25997722c128161b9ce23ad60', 'kanit', '2019-02-12-1549918352.jpg', './upload/', 'จันทร์โอชา', 'user', '2019-02-11 20:52:32'),
(4, 'mmm', '123', '202cb962ac59075b964b07152d234b70', 'Meaw', '2019-02-13-1550001406.jpg', './upload/', 'Hi', 'user', '2019-02-12 19:56:46'),
(5, 'jay', '12345678', '25d55ad283aa400af464c76d713c07ad', 'JJ', '2019-02-14-1550080249.jpg', './upload/', 'สู้ๆ', 'user', '2019-02-13 17:50:49'),
(7, 'ัี่yuii2', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'yuiiko2', '2019-02-14-1550080782.jpg', './upload/', 'สวยมาก', 'user', '2019-02-13 17:59:42'),
(8, 'lisa', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'Lisa', '2019-02-14-1550081057.jpg', './upload/', 'สวยย', 'admin', '2019-02-16 14:08:13'),
(9, 'rose', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'Rose''', '2019-02-14-1550081287.png', './upload/', 'ส๊วยสวย', 'user', '2019-02-13 18:08:07'),
(10, 'jiso', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'Jiso', '2019-02-14-1550081532.jpg', './upload/', 'สวยยย', 'user', '2019-02-13 18:12:12'),
(11, 'jennie', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'Jennie', '2019-02-14-1550081750.jpg', './upload/', 'สวยยยยยยย', 'user', '2019-02-13 18:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `track_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customerid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `date1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `date1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `detail`, `name`, `user`, `about`, `profile`, `profile_path`, `image`, `image_path`, `status`, `date1`) VALUES
(10, 'Mido Baroncelii เรือนทอง', '<p>Mido&nbsp;Baroncelii เรือนทอง&nbsp;ขนาด 38 มม. ตัวเรือนทอง PVD ไม่ลอก กระจกซัฟฟายกันรอย หน้าปัทขาวหลักโรมัน พร้อมวันที่ ฝาหลังเปลือยโชว์เครื่อง เครื่องออโตเมติก สภาพของใหม่แกะกล่องตัวเรือนยังมีพลาสสิกติดอยู่ พร้อมกล่องใบ รับประกันศูนย์ 1 ปีเต็ม ราคาเบาๆ 17220 พร้อมส่ง ems คับ ใครหาของใหม่ราคารเบาๆอยู่ก็จัดไป</p>\r\n', 'yuiiko2', 'ัี่yuii2', 'สวยมาก', '2019-02-14-1550080782.jpg', './upload/', '2019-02-14-1550080889.jpg', './upload/', 'Y', '2019-02-13 18:01:29'),
(11, 'Orient 60th Anniversary Limited Edition', '<p>Orient 60th Anniversary Limited Edition&nbsp;รุ่นพิเศษ ฉลองครบรอบ 60 ปี ของแบรนด์&nbsp; ผลิตจำนวนจำกัด 1500 เรือนทั่วโลก ในเมืองไทยได้มาเพียง 150 เรือนเท่านั้น มาในรูปแบบนาฬิกาย้อนยุค ที่บ่งบอกถึงประวัติศาสตร์ที่สร้างชื่อของแบรนด์โอเรียนท์อย่างกลไกไขลาน ซึ่งเป็นกลไกผลิตในญี่ปุ่น made in japan คุณภาพสูงและมีความเที่ยงตรงดีมาก&nbsp;&nbsp;ตัวเรือนทองเคลือบแบบ Electro plate โดยใช้ทอง 22 K&nbsp;&nbsp;ขนาดตัวเรือน 39 mm (ไม่รวมเม็ดมะยม) ฟังก์ชั่นแสดงเวลาแบบสามเข็ม และแสดงวันที่ ณ ตำแหน่ง 3 น. มีฟัง', 'Lisa', 'lisa', 'สวยย', '2019-02-14-1550081057.jpg', './upload/', '2019-02-14-1550081120.jpg', './upload/', 'Y', '2019-02-13 18:05:20'),
(12, 'Omega ที่ระลึก Cities Service Gas Company ปี 1967', '<p>Omega ที่ระลึก&nbsp;Cities Service Gas Company ปี 1967&nbsp;ขนาด 34 มม. ตัวเรือนหุ้มทอง 10K GF ทรงนิยม หน้าปัทขาวเดิมๆ มี logo รูปไฟสกีนบนหน้าปัท สั่งทำขึ้นพิเศษโดย&nbsp;บริษัท&nbsp;Cities Service Gas Company&nbsp;ในปี 1967 สวยคลาสสิก พร้อมวันที่ มาดูด้านหลังแกะตัวหนังสือจากโรงงานโดยเฉพาะคับ มาดูเครื่อง เครื่องออโตเมติก Cal.563 เดิมๆ สวยใส เดินดี ล้างเช็คเรียบร้อยแล้วคับ มาพร้อมสายหนังเส้นใหม่ ราคาเบาๆ 22500 พร้อมส่ง ems คับ ใครสะสมพวกนาฬิกาลิมิติเต็ดผลิตพิเศษก็จัดไปคับ นานๆมาที</p>\r\n\r\n<p>&nb', 'Rose''', 'rose', 'ส๊วยสวย', '2019-02-14-1550081287.png', './upload/', '2019-02-14-1550081359.jpg', './upload/', 'Y', '2019-02-13 18:09:19'),
(14, 'Omega Pinspotters 300 Award ปี 1954', '<p>Omega Pinspotters 300 Award ปี 1954&nbsp;หน้าปัทสกีน Logo AMF สร้างขึ้นเพื่อเป็นเกียรประวัติให้กับสมาคมโบว์ลิ่ง AMF Bowling Centers, Inc เพื่อมอบเป็นรางวัลให้กับนักกีฬาโบว์ ขนาด 34 มม. ตัวเรือนทองหุ้ม 14K GF ทั้งเรือน หน้าปัทขาวเดิมๆ สกีน logo AMF สวยคลาสสิก มาดูเครื่อง เครื่อง Cal.500 เดิมๆสวยใสกริบ เดินดี มาพร้อมสายหนังเส้นใหม่ พร้อมกล่องใบ ราคาเบาๆ 19500 พร้อมส่ง ems คับ ใครสะสมพวกนาฬิกาที่ระลึกรุ่นพิเศษหายากก็จัดไปคับ นานๆมาที</p>\r\n\r\n<p>ราคาพิเศษ :&nbsp;&nbsp;19,500.00</p>\r\n', 'Jennie', 'jennie', 'สวยยยยยยย', '2019-02-14-1550081750.jpg', './upload/', '2019-02-14-1550081820.jpg', './upload/', 'Y', '2019-02-13 18:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_th` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `detail_th` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `detail_en` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `categories` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_full` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sale` int(11) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `date1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `name_th`, `name_en`, `detail_th`, `detail_en`, `categories`, `price`, `price_full`, `sale`, `image`, `image_path`, `date1`) VALUES
(13, 'ลอนกินีไฮโดรคอนเควส1', 'ลอนกินีไฮโดรคอนเควส1', 'Longines HydroConquest 1', '<p>ยี่ห้อ:<strong>ลอนกินี</strong></p>\r\n\r\n<p>รุ่น:<strong>ไฮโดรคอนเควส</strong></p>\r\n\r\n<p>รับประกันจากผู้ผลิต:<strong>มีใบประกัน</strong></p>\r\n\r\n<p>กล่องดั้งเดิมจากผู้ผลิต:<strong>มีกล่อง</strong></p>\r\n\r\n<p>ขนาดเคส:<strong>41.0mm</strong></p>\r\n\r\n<p>วัสดุ:<strong>เหล็กสแตนเลส</strong></p>\r\n\r\n<p>การรับประัน<strong>:1ปี</strong></p>\r\n', '<p>Brand:<strong>Longines</strong></p>\r\n\r\n<p>Generation:<strong>HydroConquest</strong></p>\r\n\r\n<p>ManufacturerWarantywith:<strong>insurance</strong></p>\r\n\r\n<p>Originalboxfromthemanufacturer:<strong>with box</strong></p>\r\n\r\n<p>Casesize:<strong>41.0mm</strong></p>\r\n\r\n<p>Material:<strong>stainlesssteel</strong></p>\r\n\r\n<p>warranty:1year</p>\r\n', 'watch', '45000', '52000', 10, '2019-02-17-1550404978.png', './upload/', '2019-02-17 13:11:05'),
(14, 'ลอนกินี ไฮโดรคอนเควส 2', 'ลอนกินี ไฮโดรคอนเควส 2', 'Longines HydroConquest 2', '<p>ยี่ห้อ:<strong>ลอนกินี</strong></p>\r\n\r\n<p>รุ่น:<strong>ไฮโดรคอนเควส</strong></p>\r\n\r\n<p>รับประกันจากผู้ผลิต:<strong>มีใบประกัน</strong></p>\r\n\r\n<p>กล่องดั้งเดิมจากผู้ผลิต:<strong>มีกล่อง</strong></p>\r\n\r\n<p>ขนาดเคส:<strong>41.0mm</strong></p>\r\n\r\n<p>วัสดุ:<strong>เหล็กสแตนเลส</strong></p>\r\n\r\n<p>การรับประกัน:<strong>1ปี</strong></p>\r\n', '<p>Brand:<strong>Longines</strong></p>\r\n\r\n<p>Generation:<strong>HydroConquest</strong></p>\r\n\r\n<p>Manufacturer Warranty:<strong>withinsurance</strong></p>\r\n\r\n<p>Originalboxfromthemanufacturer:<strong>withbox</strong></p>\r\n\r\n<p>Casesize:<strong>41.0mm</strong></p>\r\n\r\n<p>Material:<strong>stainlesssteel</strong></p>\r\n\r\n<p>warranty:<strong>1year</strong></p>\r\n', 'watch', '54000', '60000', 10, '2019-02-17-1550405267.png', './upload/', '2019-02-17 13:11:05'),
(15, 'ลอนกินี ไฮโดรคอนเควส 3', 'ลอนกินี ไฮโดรคอนเควส 3', 'Longines HydroConquest 3', '<p>ยี่ห้อ:<strong>ลอนกินี</strong></p>\r\n\r\n<p>รุ่น:<strong>ไฮโดรคอนเควส</strong></p>\r\n\r\n<p>รับประกันจากผู้ผลิต:<strong>มีใบประกัน</strong></p>\r\n\r\n<p>กล่องดั้งเดิมจากผู้ผลิต:<strong>มีกล่อง</strong></p>\r\n\r\n<p>ขนาดเคส:<strong>41.0mm</strong></p>\r\n\r\n<p>วัสดุ:<strong>เหล็กสแตนเลส</strong></p>\r\n\r\n<p>การรับประกัน:<strong>1ปี</strong></p>\r\n', '<p>Brand:<strong>Longines</strong></p>\r\n\r\n<p>Generation:<strong>HydroConquest</strong></p>\r\n\r\n<p>ManufacturerWarranty:<strong>withinsurance</strong></p>\r\n\r\n<p>Originalboxfromthemanufacturer:<strong>withbox</strong></p>\r\n\r\n<p>Casesize:<strong>41.0mm</strong></p>\r\n\r\n<p>Material:<strong>stainlesssteel</strong></p>\r\n\r\n<p>warranty:<strong>1year</strong></p>\r\n', 'watch', '63000', '74000', 10, '2019-02-17-1550405305.png', './upload/', '2019-02-17 13:11:05'),
(16, 'โอเมกา ดี วิล', 'โอเมกา ดี วิล', 'OMEGA DE VILLE', '<p>ยี่ห้อ:<strong>โอเมกา</strong></p>\r\n\r\n<p>รุ่น:<strong>ดีวิล</strong></p>\r\n\r\n<p>ระบบ:<strong>ไขลาน</strong></p>\r\n\r\n<p>ขนาด:<strong>25x25</strong><strong>มิลลิเมต</strong></p>\r\n\r\n<p>รายละเอียด:<strong>หน้าปัดเรือนนี้สภาพสวยและสมบูรณ์</strong><strong>&nbsp;</strong></p>\r\n\r\n<p>การรับประกัน:<strong>1ปี</strong></p>\r\n', '<p>Brand:<strong>Omega</strong></p>\r\n\r\n<p>Generation:<strong>DEVILLE</strong></p>\r\n\r\n<p>System:<strong>Winding</strong></p>\r\n\r\n<p>Size:<strong>25x25millimeters</strong></p>\r\n\r\n<p>Description:<strong>Thiswatchfaceisbeautifulandperfect</strong></p>\r\n\r\n<p>warranty:<strong>1year</strong></p>\r\n', 'watch', '9000', '12000', 10, '2019-02-17-1550405422.png', './upload/', '2019-02-17 13:11:04'),
(17, 'โอเมกา เเฟลกชิพ', 'โอเมกา เเฟลกชิพ', 'Omega Flafship', '<p>ยี่ห้อ:<strong>โอเมกา</strong></p>\r\n\r\n<p>รุ่น:<strong>Flagship</strong></p>\r\n\r\n<p>ระบบ:<strong>Automatic</strong><strong>ขึ้นลานด้วยมือได้</strong></p>\r\n\r\n<p>ขนาด:<strong>34</strong><strong>มิลลิเมตร</strong></p>\r\n\r\n<p>รายละเอียด:<strong>สุดคลาสิคตัวเรือนทำจากทองคำแท้ๆ</strong></p>\r\n\r\n<p>การรับประกัน:<strong>1ปี</strong></p>\r\n', '<p>Brand:<strong>Omega</strong></p>\r\n\r\n<p>Generation:<strong>Flagship</strong></p>\r\n\r\n<p>Automatic:<strong>systemwithahandyard</strong></p>\r\n\r\n<p>size:<strong>34mm</strong></p>\r\n\r\n<p>Quality:<strong>Theclassicdetailsofthehousearemadeofrealgold</strong></p>\r\n\r\n<p>warranty:<strong>1year</strong></p>\r\n', 'watch', '7200', '7500', 10, '2019-02-17-1550405488.png', './upload/', '2019-02-17 13:11:04'),
(18, 'โอเมกา ซุปเปอร์ ซิวิล', 'โอเมกา ซุปเปอร์ ซิวิล', 'Omega Super Seville', '<p>ยี่ห้อ:<strong>โอเมกา</strong></p>\r\n\r\n<p>รุ่น:<strong>ซุปเปอร์ซิวิล</strong></p>\r\n\r\n<p>ระบบ:<strong>Automatic</strong><strong>ขึ้นลานด้วยมือได้</strong></p>\r\n\r\n<p>ขนาด:<strong>34</strong><strong>มิลลิเมตร</strong></p>\r\n\r\n<p>รายละเอียด:<strong>ขอบหยักสวยและสมบูรณ์โรเล็กซ์สไตล์</strong><strong>Rolexstyle</strong></p>\r\n\r\n<p>การรับประกัน:<strong>1ปี</strong></p>\r\n', '<p>Brand:<strong>Omega</strong></p>\r\n\r\n<p>Generation:<strong>Superseville</strong></p>\r\n\r\n<p>Automatic:<strong>systemwithahand</strong></p>\r\n\r\n<p>size<strong>:34mm</strong></p>\r\n\r\n<p>Quality:<strong>Detailsofthewavyedges,beautifulandperfectRolexstyleRolexstyle</strong></p>\r\n\r\n<p>warranty:<strong>1year</strong></p>\r\n', 'watch', '6300', '7000', 10, '2019-02-17-1550405552.png', './upload/', '2019-02-17 13:11:04'),
(19, 'เบนลุส สวิส เมด', 'เบนลุส สวิส เมด', 'BENRUS Swiss Made', '<p>ยี่ห้อ:<strong>เบนลุส</strong></p>\r\n\r\n<p>รุ่น:<strong>สวิสเมด</strong></p>\r\n\r\n<p>รายละเอียดสินค้า:<strong>ระบบไขลานเครื่องสวยเดินดี</strong></p>\r\n\r\n<p>ขนาด:<strong>35มม.</strong></p>\r\n\r\n<p>การรับประกัน:<strong>1ปี</strong></p>\r\n', '<p>Brand:<strong>BENRUS</strong></p>\r\n\r\n<p>Generation:<strong>SwissMade</strong></p>\r\n\r\n<p>ProductDescriptionwinding:<strong>systembeautiful,goodwalking</strong></p>\r\n\r\n<p>size:<strong>35mm</strong></p>\r\n\r\n<p>warranty:<strong>1year</strong></p>\r\n', 'watch', '4500', '5000', 10, '2019-02-17-1550405635.png', './upload/', '2019-02-17 13:11:04'),
(20, 'เบนลุส วอลเเทม', 'เบนลุส วอลเเทม', 'BENRUS WALTHAM', '<p>ยี่ห้อ:<strong>เบนลุส</strong></p>\r\n\r\n<p>รุ่น:<strong>วอลเเทม</strong></p>\r\n\r\n<p>รายละเอียดสินค้า:<strong>ระบบไขลานเครื่องสวยเดินดี</strong></p>\r\n\r\n<p>ขนาด:<strong>32.5</strong><strong>มม.</strong></p>\r\n\r\n<p>การรับประกัน:<strong>1ปี</strong></p>\r\n', '<p>Brand:<strong>BENLUS</strong></p>\r\n\r\n<p>Gemeration:<strong>WALTHAM</strong></p>\r\n\r\n<p>Product:Discription:<strong>Widdingsystembeautiful,goodwalking</strong></p>\r\n\r\n<p>size:<strong>32.5mm</strong></p>\r\n\r\n<p>wrranty:<strong>1year</strong></p>\r\n', 'watch', '3600', '4000', 10, '2019-02-17-1550405690.png', './upload/', '2019-02-17 13:11:04'),
(21, 'เบนลุส วิทนาเออ', 'เบนลุส วิทนาเออ', 'BEMRUS WITTNAUER', '<p>ยี่ห้อ:<strong>เบนลุส</strong></p>\r\n\r\n<p>รุ่น:<strong>วิทนาเออ</strong></p>\r\n\r\n<p>รายละเอียดสินค้า:<strong>ระบบไขลานเครื่องสวยเดินดี</strong></p>\r\n\r\n<p>ขนาด:<strong>30</strong><strong>มม.</strong></p>\r\n\r\n<p>การรับประกัน:<strong>1ปี</strong></p>\r\n', '<p>Brand:<strong>BENRUS</strong></p>\r\n\r\n<p>Gerneration:<strong>WITTNAUER</strong></p>\r\n\r\n<p>ProductDiscriptionWidding:<strong>systemberutiful,goodwalking</strong></p>\r\n\r\n<p>size:<strong>30mm</strong></p>\r\n\r\n<p>warranty:<strong>1year</strong></p>\r\n', 'watch', '5400', '6000', 10, '2019-02-17-1550405743.png', './upload/', '2019-02-17 13:11:04'),
(23, 'สายหนังจรเข้เเท้บาลี', 'สายหนังจรเข้เเท้บาลี', 'Crocodileleatherstrapbali', '<p>ยี่ห้อ:<strong>ได-โมเดล</strong></p>\r\n\r\n<p>รุ่น:<strong>บาลี</strong></p>\r\n\r\n<p>คุณภาพ:<strong>ผลิตจากหนังจรเข้ตัดเย็บด้วยมือด้ายสีครีมเหมาะสำหรับนาฬิกาสปอร์ต</strong></p>\r\n\r\n<p>สี:<strong>ดำ</strong></p>\r\n\r\n<p>การรับประกัน:<strong>6เดือน</strong></p>\r\n', '<p>Brand:<strong>Di-model</strong></p>\r\n\r\n<p>Generation:<strong>Bali</strong></p>\r\n\r\n<p>Quality:<strong>Madefromcrocodilesewingwithcreamcoloredhand,suitableforsportwatches</strong></p>\r\n\r\n<p>Color:<strong>Black</strong></p>\r\n\r\n<p>warranty:<strong>6month</strong></p>\r\n', 'parts', '270', '300', 10, '2019-02-17-1550406664.png', './upload/', '2019-02-18 17:02:14'),
(24, 'สายหนังจรเข้เเท้จัมโบเคเอ็น', 'สายหนังจรเข้เเท้จัมโบเคเอ็น', 'CrocodileleatherstrapJumboKN', '<p>ยี่ห้อ:<strong>ได-โมเดล</strong></p>\r\n\r\n<p>รุ่น:<strong>จัมโบเค.เอ็น</strong></p>\r\n\r\n<p>คุณภาพ:<strong>สายหนังจรเข้คุณภาพสูงความอ่อนนุ่มสวยใส่สบายดีไซด์ให้เป็นเเบบ</strong><strong>Sportlook</strong></p>\r\n\r\n<p>สี:<strong>เขียว</strong></p>\r\n\r\n<p>การรับประกัน:<strong>6เดือน</strong></p>\r\n', '<p>Brand:<strong>Di-model</strong></p>\r\n\r\n<p>Generation:<strong>Jumbo K.N.</strong></p>\r\n\r\n<p>Quality:<strong>Crocodileleatherstrap,highquality,softness,comfortabletowearDesidnedtobeasportlookwithacreamcoloredthreadCanbewaterproofupto100meterstowearwithasportwatchwatersport</strong></p>\r\n\r\n<p>Color:<strong>Green</strong></p>\r\n\r\n<p>warranty:<strong>6month</strong></p>\r\n', 'parts', '270', '300', 10, '2019-02-17-1550406701.png', './upload/', '2019-02-18 17:02:14'),
(26, 'สายหนังจรเข้เเท้บาลิโชรโน', 'สายหนังจรเข้เเท้บาลิโชรโน', 'CrocodileleatherstrapBalichrono', '<p>ยี่ห้อ:<strong>ได-โมเดล</strong></p>\r\n\r\n<p>รุ่น:<strong>บาลีโชรโน</strong></p>\r\n\r\n<p>รายละเอียด:<strong>ผลิตจากหนังจรเข้ตัดเย็บด้วยมือด้ายสีครีมเหมาะสำหรับนาฬิกาสปอร์ตระดับไฮเอ็น</strong></p>\r\n\r\n<p>สี:<strong>น้ำตาล</strong></p>\r\n\r\n<p>การรับประกัน:<strong>6เดือน</strong></p>\r\n', '<p>Crocodileleatherstrap3</p>\r\n\r\n<p>Brand:<strong>Di-model</strong></p>\r\n\r\n<p>Generation:<strong>BaliChrono</strong></p>\r\n\r\n<p>Quality:<strong>MadefromcrocodileleatherSewingwithcreamcoloredhandsuitableforhight-endsportwatch</strong></p>\r\n\r\n<p>Color:<strong>Brown</strong></p>\r\n\r\n<p>waarranty:<strong>6month</strong></p>\r\n', 'parts', '270', '300', 10, '2019-02-17-1550406773.png', './upload/', '2019-02-18 17:02:14'),
(30, 'ลอนกินีพรีเซนต์', 'ลอนกินีพรีเซนต์', 'LonginesPresence', '<p>ยี่ห้อ:<strong>ลอนกินีพรีเซนต์</strong></p>\r\n\r\n<p>รุ่น:<strong>พารอเรล</strong></p>\r\n\r\n<p>วัสดุ:<strong>เหล็กสเเตนเลส</strong></p>\r\n\r\n<p>ขนาด:<strong>31มม</strong></p>\r\n\r\n<p>สี:<strong>ทอง</strong></p>\r\n\r\n<p>การรับประกัน:<strong>1ปี</strong></p>\r\n', '<p>Brand:<strong>LonginiPersence</strong></p>\r\n\r\n<p>Generation:<strong>Paralel</strong></p>\r\n\r\n<p>Material:<strong>Stainlesssteel</strong></p>\r\n\r\n<p>size:<strong>31mm</strong></p>\r\n\r\n<p>Color:<strong>Golden</strong></p>\r\n\r\n<p>Warranty:<strong>1year</strong></p>\r\n', 'watch', '27000', '23000', 10, '2019-02-17-1550418431.png', './upload/', '2019-02-17 17:22:30'),
(31, 'ลอนกินีไฮโดรคอนเควส4', 'ลอนกินีไฮโดรคอนเควส4', 'LonginesHydroConquest4', '<p>ยี่ห้อ:<strong>ลอนกินีไฮโดรคอนเควส</strong></p>\r\n\r\n<p>รุ่น:<strong>ไฮโดรคอนเควส(สำหรับผู้หญิง)</strong></p>\r\n\r\n<p>วัสดุ:<strong>พิเศษ</strong></p>\r\n\r\n<p>ขนาด:<strong>31มม</strong></p>\r\n\r\n<p>สี:<strong>ดำ</strong></p>\r\n\r\n<p>การรับประกัน:<strong>1ปี</strong></p>\r\n', '<p>Brand:<strong>LonginiesHydroconquest</strong></p>\r\n\r\n<p>Generation:<strong>Hydroconquest</strong></p>\r\n\r\n<p>Material:<strong>Special</strong></p>\r\n\r\n<p>Size:<strong>31mm</strong></p>\r\n\r\n<p>color:<strong>black</strong></p>\r\n\r\n<p>Waranty:<strong>1year</strong></p>\r\n', 'watch', '18000', '23000', 10, '2019-02-17-1550418555.png', './upload/', '2019-02-17 17:22:30'),
(32, 'ลอนกินีไฮโดรคอนเควส5', 'ลอนกินีไฮโดรคอนเควส5', 'LonginesHydroConquest5', '<p>ยี่ห้อ:<strong>ลอนกินีไฮโดนคอนเควส</strong></p>\r\n\r\n<p>รุ่น:<strong>อาริวอล</strong></p>\r\n\r\n<p>วัสดุ:<strong>เหล็กสเเตนเลส</strong></p>\r\n\r\n<p>ขนาด:<strong>31มม</strong></p>\r\n\r\n<p>สี:<strong>ดำ</strong></p>\r\n\r\n<p>การรับประกัน:<strong>1ปี</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Brand:<strong>LonginiesHydroconquest</strong></p>\r\n\r\n<p>Generation:<strong>Arrial</strong></p>\r\n\r\n<p>Material:<strong>Stanlesssteel</strong></p>\r\n\r\n<p>Size:<strong>31mm</strong></p>\r\n\r\n<p>Color:<strong>Black</strong></p>\r\n\r\n<p>Warranty:<strong>1year</strong></p>\r\n', 'watch', '27000', '30000', 10, '2019-02-17-1550418591.png', './upload/', '2019-02-17 17:22:30'),
(33, 'สายหนังจรเข้เเท้หลุยเซียนา1', 'สายหนังจรเข้เเท้หลุยเซียนา1', 'CrocodileleatherstrapLouisiana1', '<p>ยี่ห้อ:<strong>เอบีพีพาริส</strong></p>\r\n\r\n<p>รุ่น:<strong>เอเเอลอา02หลยเซียนาอัลลิเกเตอร์</strong></p>\r\n\r\n<p>ขนาด:<strong>31มม</strong></p>\r\n\r\n<p>Description:<strong>หลุยเซียนาอัลลิเกเตอร์ส่วนล่างเป็นรับเบอร์สวีทไม่กลัวเหงื่อ</strong></p>\r\n\r\n<p>สี:<strong>ดำ</strong></p>\r\n\r\n<p>การรับประกัน:<strong>6เดือน</strong></p>\r\n', '<p>Brand:<strong>ABPPARIS</strong></p>\r\n\r\n<p>Generation:<strong>ALR02LouisianaAulligator</strong></p>\r\n\r\n<p>size:<strong>31mm</strong></p>\r\n\r\n<p>Description:<strong>LouisisnaAulligatorthelowwerpartisrubberswissnotafaidofsweat</strong></p>\r\n\r\n<p>color:<strong>black</strong></p>\r\n\r\n<p>warranty:<strong>1year</strong></p>\r\n', 'parts', '450', '500', 10, '2019-02-17-1550420259.png', './upload/', '2019-02-18 17:02:14'),
(34, 'สายหนังจรเข้เเท้sหลุยเซียนา2', 'สายหนังจรเข้เเท้sหลุยเซียนา2', 'CrocodileleatherstrapLouisiana2', '<p>ยี่ห้อ:<strong>เอบีพีพาริส</strong></p>\r\n\r\n<p>รุ่น:<strong>เอสทีเอ13</strong></p>\r\n\r\n<p>ขนาด:<strong>31มม</strong></p>\r\n\r\n<p>รายละเอียด:<strong>หนังจรเข้คัดพิเศษ</strong></p>\r\n\r\n<p>สี:<strong>น้ำเงิน</strong></p>\r\n\r\n<p>การรับประกัน:<strong>6</strong><strong>เดือน</strong></p>\r\n', '<p>Brand:<strong>ABPPARIS</strong></p>\r\n\r\n<p>Generation:<strong>STA13</strong></p>\r\n\r\n<p>size:<strong>31mm</strong></p>\r\n\r\n<p>Drescription:<strong>CrocodileleatherSpecial</strong></p>\r\n\r\n<p>Color:<strong>Blue</strong></p>\r\n\r\n<p>Warranty:<strong>6month</strong></p>\r\n', 'parts', '450', '500', 10, '2019-02-17-1550420940.png', './upload/', '2019-02-18 17:02:14'),
(35, 'สายหนังจรเข้เเท้หลุยเซียนา3', 'สายหนังจรเข้เเท้หลุยเซียนา3', 'CrocodileleatherstrapLouisiana3', '<p>ยี่ห้อ:<strong>เอบีพีพาริส</strong></p>\r\n\r\n<p>รุ่น:<strong>เอสทีเอ05</strong></p>\r\n\r\n<p>ขนาด:<strong>21มม</strong></p>\r\n\r\n<p>รายละเอียด:<strong>หนังจรเข้ขนาดพิเศษ</strong></p>\r\n\r\n<p>สี:<strong>น้ำตาล</strong></p>\r\n\r\n<p>การรรับประกัน:<strong>6เดือน</strong></p>\r\n', '<p>Brand:<strong>ABPPARIS</strong></p>\r\n\r\n<p>Generation:<strong>STA05</strong></p>\r\n\r\n<p>Size:<strong>21mm</strong></p>\r\n\r\n<p>Description:<strong>CrocodileleathersrapSpecial</strong></p>\r\n\r\n<p>Color:<strong>Brown</strong></p>\r\n\r\n<p>Warranty:<strong>6month</strong></p>\r\n', 'parts', '450', '500', 10, '2019-02-17-1550420883.png', './upload/', '2019-02-17 16:28:03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
