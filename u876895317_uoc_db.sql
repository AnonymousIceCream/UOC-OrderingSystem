-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2021 at 05:36 AM
-- Server version: 10.4.15-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u876895317_uoc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `submissionDate` date NOT NULL,
  `feedback` text NOT NULL,
  `suggestions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(32, 'UOC.Management@gmail.com', 'e005aeaa3d952dbf', '$2y$10$iJEmNYkDfqSEWW8o2eIcheOPWHj4y2KHiZ/87eqgRYZvtst/BM1Pi', '1621158887');

-- --------------------------------------------------------

--
-- Table structure for table `securitylog`
--

CREATE TABLE `securitylog` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `securitylog`
--

INSERT INTO `securitylog` (`id`, `username`, `name`, `password`) VALUES
(1, 'UOC.Management@gmail.com', 'UOC_Admin', '$2y$10$talxcgO6SY0KIIw/ItZWXu3rrLRpW6E9yCbvJwi1XoC1FE5XB47Be');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`) VALUES
(20, 'Coffee'),
(21, 'Non-Coffee'),
(22, 'Frappe (Coffee - Based)'),
(23, 'Ice Blend (Cream - Based)'),
(24, 'Pizza'),
(25, 'Pasta'),
(26, 'Meals'),
(27, 'Snacks'),
(28, 'Pastries'),
(29, 'Cakes'),
(30, 'Breads');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deliveryFee`
--

CREATE TABLE `tbl_deliveryFee` (
  `id` int(10) NOT NULL,
  `postalCode` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `deliveryFee` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `location` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_deliveryFee`
--

INSERT INTO `tbl_deliveryFee` (`id`, `postalCode`, `deliveryFee`, `location`) VALUES
(4, '1466', '50', ''),
(8, '1000', '80', 'Manila CPO - Ermita'),
(9, '1002', '80', 'Intramuros'),
(10, '1003', '80', 'Sta. Cruz South'),
(11, '1004', '80', 'Malate'),
(12, '1005', '80', 'San Miguel'),
(13, '1006', '80', 'Binondo'),
(14, '1007', '80', 'Paco'),
(15, '1008', '80', 'Sampaloc East'),
(16, '1009', '80', 'Sta. Ana'),
(17, '1010', '80', 'San Nicolas '),
(18, '1011', '80', 'Pandacan'),
(19, '1012', '80', 'Tondo South'),
(20, '1013', '80', 'Tondo North'),
(21, '1014', '80', 'Sta Cruz North'),
(22, '1015', '80', 'Sampaloc West '),
(23, '1016', '80', 'Sta Mesa'),
(24, '1017', '80', 'San Andres Bukid'),
(25, '1018', '80', 'Port Area (South)'),
(27, '1470', '70', 'Malabon'),
(28, '1471', '70', 'Flores'),
(29, '1472', '70', 'Longos'),
(30, '1473', '70', 'Tonsuya'),
(31, '1474', '70', 'Acacia'),
(32, '1475', '70', 'Potrero'),
(33, '1420', '80', 'Kaybiga/Deparo'),
(34, '1421', '80', 'Bagumbong / Pag-asa'),
(35, '1476', '70', 'Araneta Subd.'),
(36, '1477', '70', 'Maysilo'),
(37, '1478', '70', 'Santolan'),
(38, '1479', '70', 'Muzon'),
(39, '1480', '70', 'Dampalit'),
(40, '1422', '80', 'Novaliches North (Camarin North)'),
(41, '1423', '80', 'Lilles Ville Subdivision'),
(42, '1424', '80', 'Capitol Parkland Subdivision'),
(43, '1425', '80', 'Amparo Subdivision'),
(44, '1426', '80', 'Bankers Village'),
(45, '1427', '80', 'Tala Leprosarium'),
(46, '1105', '80', 'Alicia'),
(47, '1428', '80', 'Bagong Silang'),
(48, '1100', '80', 'Central'),
(49, '1101', '80', 'Krus Na Ligas'),
(50, '1400', '50', 'Caloocan City CPO'),
(51, '1102', '80', 'Claro'),
(52, '1401', '50', 'Baesa'),
(53, '1103', '80', 'Laging Handa'),
(54, '1104', '80', 'Mariblo'),
(55, '1402', '50', 'Sta. Quiteria'),
(56, '1106', '80', 'Baesa'),
(57, '1107', '80', ''),
(58, '1403', '50', 'Grace Park East'),
(59, '1404', '50', 'San Jose'),
(61, '1405', '50', '1st Ave. to 7th Ave. - West'),
(62, '1406', '50', 'Grace Park West'),
(64, '1108', '80', ''),
(65, '1407', '50', 'University Hills'),
(66, '1408', '50', 'Sangandaan'),
(67, '1111', '80', 'Bagong Lipunan'),
(68, '1409', '50', 'Kaunlaran Village (Caloocan City)'),
(69, '1410', '50', 'Maypajo'),
(70, '1411', '50', 'Fish Market (Caloocan City)'),
(71, '1112', '80', 'Damayan Lagi'),
(72, '1113', '80', 'Don Manuel'),
(73, '1114', '80', 'La Loma'),
(74, '1412', '50', 'Isla de Cocomo (Caloocan City)'),
(75, '1413', '50', 'Kapitbahayan East (Caloocan City)'),
(76, '1115', '80', 'Damar'),
(77, '1116', '80', 'San Bartolome'),
(78, '1117', '80', 'Gulod'),
(79, '1118', '80', 'Pasong Putik'),
(80, '1119', '80', 'Bagong Silangan'),
(81, '1120', '80', 'BF Homes'),
(82, '1121', '80', 'Commonwealth'),
(83, '1440', '70', 'Malinta'),
(84, '1441', '70', 'Karuhatan'),
(85, '1122', '80', 'Fairview South'),
(86, '1123', '80', 'Damong Maliit'),
(87, '1442', '70', 'Fortune Vil. - Paso De Blas'),
(88, '1124', '80', 'Kaligayahan'),
(89, '1125', '80', 'Doña Faustina Subd.'),
(90, '1126', '80', 'Batasan Hills'),
(91, '1127', '80', 'Holy Spirit'),
(92, '1128', '80', 'Culiat'),
(93, '1443', '70', 'Dalandan - West Canumay'),
(94, '1444', '70', 'Malanday-Mabolo-Polo'),
(95, '1445', '70', 'Balangkas-Caloong'),
(96, '1446', '70', 'Lingunan'),
(97, '1447', '70', 'East Canumay'),
(98, '1448', '70', 'Mapulang Lupa'),
(99, '1469', '70', 'Valenzuela P.O. Boxes'),
(100, '1411', '70', 'Fish Market - (Navatos)'),
(101, '1412', '70', 'Isla De Cocomo - (Navotas)'),
(102, '1413', '70', 'Kapitbahayan East - (Navotas)'),
(103, '1409', '70', 'Kaunlaran Village - (Navotas)'),
(104, '1485', '70', 'Navotas '),
(105, '1489', '70', 'Tangos '),
(106, '1490', '70', 'Tanza'),
(107, '1001', '80', 'Quiapo'),
(108, '1427', '80', 'Victory Heights'),
(111, '1100', '80', 'Piñahan'),
(112, '1100', '80', 'Project 6'),
(113, '1100', '80', 'Quezon City Cpo'),
(115, '1101', '80', 'Botocan'),
(116, '1101', '80', 'Diliman'),
(117, '1101', '80', 'Malaya'),
(118, '1101', '80', 'Old Capitol Site'),
(119, '1101', '80', 'San Vicente'),
(120, '1101', '80', 'Sikatuna Villge'),
(121, '1101', '80', 'Teachers Village'),
(122, '1101', '80', 'Univ. of the Phils. PO'),
(123, '1101', '80', 'UP Village'),
(124, '1102', '80', 'Amihan'),
(125, '1102', '80', 'Duyan-duyan'),
(126, '1102', '80', 'E. Rodriguez'),
(127, '1102', '80', 'Kamias'),
(128, '1102', '80', 'Quirino Dist. (Proj. 2 & 3)'),
(129, '1102', '80', 'Silangan'),
(130, '1103', '80', 'Kamuning'),
(131, '1103', '80', 'Obrero'),
(132, '1103', '80', 'Paligsahan'),
(133, '1103', '80', 'Roxas District'),
(134, '1103', '80', 'Sacred heart'),
(136, '1103', '80', 'South Triangle'),
(137, '1104', '80', 'Damayan'),
(138, '1104', '80', 'Nayon Kaunlaran'),
(139, '1104', '80', 'Paraiso'),
(140, '1104', '80', 'Phil-am'),
(141, '1104', '80', 'Santa Cruz'),
(142, '1104', '80', 'Talayan'),
(143, '1105', '80', 'Bagong Pag-asa'),
(144, '1105', '80', 'Bungad'),
(145, '1105', '80', 'Del Monte'),
(146, '1105', '80', 'Katipunan'),
(147, '1105', '80', 'Paltok'),
(148, '1105', '80', 'Project 7'),
(149, '1105', '80', 'R. Magsaysay'),
(150, '1105', '80', 'San Antonio'),
(151, '1105', '80', 'Sto. Cristo'),
(152, '1105', '80', 'Veterans Village'),
(153, '1106', '80', 'Apolonio Samson'),
(154, '1106', '80', 'Bahay Toro'),
(155, '1106', '80', 'Balumbato'),
(156, '1106', '80', 'Project 8'),
(157, '1106', '80', 'Salumbato'),
(158, '1106', '80', 'Unang Sigaw'),
(159, '1107', '80', 'New Era'),
(160, '1107', '80', 'Pasong Tamo'),
(161, '1108', '80', 'Loyola Heights'),
(162, '1108', '80', 'Pansol '),
(163, '1109', '80', 'Bagong Buhay'),
(164, '1109', '80', 'Bayanihan'),
(165, '1109', '80', 'Blue Ridge'),
(166, '1109', '80', 'Cubao'),
(167, '1109', '80', 'Dioquino Zobel'),
(168, '1109', '80', 'Escopa'),
(169, '1109', '80', 'Mangga'),
(170, '1109', '80', 'Marilag'),
(171, '1109', '80', 'Masagana'),
(172, '1109', '80', 'Milagrosa'),
(173, '1109', '80', 'Project 4'),
(174, '1109', '80', 'San Roque'),
(175, '1109', '80', 'Socorro'),
(176, '1109', '80', 'Tagumpay'),
(177, '1109', '80', 'Villa Maria Clara'),
(178, '1110', '80', 'Bagong Bayan'),
(179, '1110', '80', 'Camp Aguinaldo'),
(180, '1110', '80', 'Libis'),
(181, '1110', '80', 'St. Ignatius'),
(182, '1110', '80', 'Talampas'),
(183, '1110', '80', 'Ugong Norte'),
(184, '1111', '80', 'Crame'),
(185, '1111', '80', 'Immaculate Concepcion'),
(186, '1111', '80', 'Kaunlaran'),
(187, '1111', '80', 'Pinagkaisahan'),
(188, '1111', '80', 'St. Martin De Porres'),
(189, '1112', '80', 'Horseshoe'),
(190, '1112', '80', 'Kalusugan'),
(191, '1112', '80', 'Kristong Hari'),
(192, '1112', '80', 'Mariana'),
(193, '1112', '80', 'Valencia'),
(194, '1113', '80', 'Doña Imelda'),
(195, '1113', '80', 'Doña Aurora'),
(196, '1113', '80', 'Doña Josefa'),
(197, '1113', '80', 'Santol'),
(198, '1113', '80', 'San Isidro'),
(199, '1113', '80', 'Santo Niño'),
(200, '1113', '80', 'Tatalon'),
(201, '1114', '80', 'Gintong Silahis'),
(202, '1114', '80', 'Lourdes'),
(203, '1114', '80', 'Maharlika'),
(204, '1114', '80', 'Matalahib'),
(205, '1114', '80', 'Paang Bundok'),
(206, '1114', '80', 'Salvacion'),
(207, '1114', '80', 'San Isidro Labrador'),
(208, '1114', '80', 'Santa Teresita'),
(209, '1114', '80', 'Sienna'),
(210, '1114', '80', 'St. Peter'),
(211, '1115', '80', 'Balingasa'),
(212, '1115', '80', 'Manresa'),
(213, '1115', '80', 'Masambong'),
(214, '1115', '80', 'Masambong'),
(215, '1115', '80', 'Pag-ibig Sa Nayon'),
(216, '1115', '80', 'San Jose'),
(217, '1116', '80', 'Bagbag'),
(218, '1116', '80', 'Sauyo'),
(219, '1116', '80', 'Talipapa'),
(220, '1116', '80', 'Tandang Sora'),
(221, '1117', '80', 'Capri'),
(222, '1117', '80', 'San Agustin'),
(223, '1117', '80', 'Santa Lucia'),
(224, '1117', '80', 'Santa Monica'),
(225, '1118', '80', 'Fairview'),
(226, '1119', '80', 'Matandang Balara'),
(227, '1119', '80', 'Payatas'),
(228, '1121', '80', 'Fairview North'),
(229, '1121', '80', 'Novaliches Proper'),
(230, '1125', '80', 'Nagkaisang Nayon'),
(231, '1126', '80', 'Capitol Hills/Park'),
(232, '1128', '80', 'Vasra');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(225) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `featured` varchar(10) CHARACTER SET utf8 NOT NULL,
  `active` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(24, 'Espresso', ' ', '70.00', 'Food-2409.png', 20, 'No', 'Yes'),
(25, 'Americano', '          ', '75.00', 'Food-3950.png', 20, 'No', 'Yes'),
(26, 'Latte', '', '90.00', 'Food-4924.png', 20, 'No', 'Yes'),
(27, 'Café Mocha', '', '110.00', 'Food-6693.jpg', 20, 'Yes', 'Yes'),
(28, 'Hazelnut Latte', '', '120.00', 'Food-6032.png', 20, 'No', 'Yes'),
(29, 'Caramel Latte', '', '110.00', 'Food-2320.png', 20, 'No', 'Yes'),
(30, 'Tea', '', '65.00', 'Food-2642.png', 21, 'No', 'Yes'),
(31, 'Tea Latte', '', '85.00', 'Food-3258.png', 21, 'No', 'Yes'),
(32, 'Hot Chocolate', '', '85.00', 'Food-5999.png', 21, 'No', 'Yes'),
(33, 'Matcha Latte', '', '100.00', 'Food-4966.jpg', 21, 'Yes', 'Yes'),
(34, 'Hot Caramel', '', '85.00', 'Food-6130.png', 21, 'No', 'Yes'),
(35, 'Iced Tea', '', '50.00', 'Food-6236.png', 21, 'No', 'Yes'),
(36, 'Strawberry Iced Tea', '', '50.00', 'Food-2815.png', 21, 'No', 'Yes'),
(37, 'Cucumber Lemonade', '', '50.00', 'Food-7439.png', 21, 'No', 'Yes'),
(38, 'Blue Lemonade', '', '50.00', 'Food-7247.png', 21, 'No', 'Yes'),
(39, 'Sunset Lemonade', '', '65.00', 'Food-50.png', 21, 'No', 'Yes'),
(40, 'Dark Chocolate Chip Cookies', '', '20.00', 'Food-2757.jpg', 28, 'Yes', 'Yes'),
(42, 'Caramel', '', '120.00', 'Food-6826.png', 22, 'No', 'Yes'),
(43, 'White Mocha', '', '120.00', 'Food-2240.png', 22, 'No', 'Yes'),
(44, 'Black Forest', '', '135.00', 'Food-6850.png', 22, 'No', 'Yes'),
(45, 'Popcorn', '', '135.00', 'Food-8786.png', 22, 'No', 'Yes'),
(46, 'English Toffee', '', '135.00', 'Food-5059.png', 22, 'No', 'Yes'),
(47, 'Two Choco', '', '135.00', 'Food-3429.png', 22, 'No', 'Yes'),
(48, 'Nutella', '', '130.00', 'Food-7651.png', 22, 'No', 'Yes'),
(49, 'Triple Mocha', '', '140.00', 'Food-5560.png', 22, 'No', 'Yes'),
(50, 'Caramel Mocha', '', '140.00', 'Food-7228.png', 22, 'No', 'Yes'),
(51, 'Chocolate', '', '120.00', 'Food-1009.png', 23, 'No', 'Yes'),
(52, 'Caramel', '', '120.00', 'Food-6243.png', 23, 'No', 'Yes'),
(53, 'White Chocolate', '', '120.00', 'Food-2200.png', 23, 'No', 'Yes'),
(55, 'Strawberry', '', '140.00', 'Food-5229.png', 23, 'No', 'Yes'),
(56, 'Banana', '', '145.00', 'Food-4949.png', 23, 'No', 'Yes'),
(57, 'Popcorn', '', '140.00', 'Food-8874.png', 23, 'No', 'Yes'),
(58, 'Triple Choco', '', '140.00', 'Food-9097.png', 23, 'No', 'Yes'),
(59, 'Cheese Pizza', '', '210.00', 'Food-2379.png', 24, 'No', 'Yes'),
(60, 'Hawaiian Pizza', '', '220.00', 'Food-564.png', 24, 'No', 'Yes'),
(61, 'Tomato and Beef Pizza', '', '220.00', 'Food-8423.png', 24, 'No', 'Yes'),
(62, 'Pepperoni Pizza', '', '220.00', 'Food-791.png', 24, 'No', 'Yes'),
(63, 'Cheezy Bacon Pizza', '', '240.00', 'Food-3243.png', 24, 'No', 'Yes'),
(64, 'Chicken Pesto Pizza', '', '240.00', 'Food-1526.png', 24, 'No', 'Yes'),
(65, 'White Vegetarian Pizza', '', '235.00', 'Food-6302.png', 24, 'No', 'Yes'),
(66, 'Tomato Amatriciana', '', '130.00', 'Food-1295.png', 25, 'No', 'Yes'),
(67, 'Carbonara', '', '130.00', 'Food-1717.png', 25, 'No', 'Yes'),
(68, 'Chicken Pesto', '', '150.00', 'Food-6604.png', 25, 'No', 'Yes'),
(69, 'Baked Macaroni', '', '130.00', 'Food-8277.png', 25, 'No', 'Yes'),
(70, 'Beef Tapa', '', '135.00', 'Food-1173.png', 26, 'No', 'Yes'),
(71, 'Fried Chicken', '', '100.00', 'Food-8853.png', 26, 'No', 'Yes'),
(72, 'Lechon Kawali', '', '100.00', 'Food-4818.png', 26, 'No', 'Yes'),
(73, 'Potato Wedges', '', '80.00', 'Food-5835.png', 27, 'No', 'Yes'),
(74, 'Cheesy Bacon Wedges', '', '120.00', 'Food-6575.png', 27, 'No', 'Yes'),
(75, 'Churros with Dark Chocolate Dip', '', '120.00', 'Food-9667.png', 27, 'No', 'Yes'),
(76, 'Choco Crinkles', '', '20.00', 'Food-937.png', 28, 'No', 'Yes'),
(77, 'Double Chocolate Cookies', '', '30.00', 'Food-6140.png', 28, 'No', 'Yes'),
(78, 'Red Velvet and White Chocolate Cookies', '', '30.00', 'Food-1276.png', 28, 'No', 'Yes'),
(79, 'Matcha Cookies', '', '30.00', 'Food-2595.png', 28, 'No', 'Yes'),
(80, 'Mini Double Chocolate Cake', '', '120.00', 'Food-8130.png', 29, 'No', 'Yes'),
(81, 'Mini Red Velvet Cake', '', '120.00', 'Food-5668.png', 29, 'No', 'Yes'),
(82, 'Mini Walnut Carrot Cake', '', '120.00', 'Food-336.png', 29, 'No', 'Yes'),
(83, 'Mini Banana Loaf', '', '50.00', 'Food-6785.png', 30, 'No', 'Yes'),
(84, 'Mini Cheese Loaf', '', '50.00', 'Food-1474.png', 30, 'No', 'Yes'),
(86, 'Mocha', '', '120.00', 'Food-434.jpg', 22, 'Yes', 'Yes'),
(87, 'Cappuccino', '', '95.00', 'Food-9606.png', 20, 'No', 'Yes'),
(88, 'Smores', '', '40.00', 'Food-1669.png', 28, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_ID` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postalcode` int(4) NOT NULL,
  `region` varchar(50) NOT NULL,
  `order_items` varchar(255) NOT NULL,
  `paymentmode` varchar(100) NOT NULL,
  `order_date` datetime NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersPwd`) VALUES
(1, 'Mark Uy', 'mark.uy69011@gmail.com', '$2y$10$OurbFMg3er3K2fJGE112N.w6XFX27KF5A1du2G60uKe7RPTY152J.'),
(11, 'Ivann', 'ivann@yahoo.com', '$2y$10$/ajHWf5pNSHNZHAEk0jTeOyjhyJzPG1OcQDTzFDiTTWRqGH7Pp9Aa'),
(12, 'Anjelo', 'Anjelo@gmail.com', '$2y$10$rAx.GU9Ov1xIw.dszKfSde7dZ3ueKpO1x9n.9cBtn7DPDze5GT9Ny'),
(13, 'John', 'John@gmail.com', '$2y$10$1xX9IRWfrf1v7s/1bp68hexStWxCkSUQTQ7.uRHt6I63kCIr3ckPS'),
(14, 'Pastrana, Karl Anjelo D', 'kd.karl13@gmail.com', '$2y$10$f4UWnxtxeCOJnU3ryVAX/uKnH3m6LhirLzkKGFmk3WgYhgbHBDKr2'),
(15, 'IC', 'ic@yahoo.com', '$2y$10$MRX6VMVfzUxs9gb0NZWJ.uGiZFnryRT/6bQzwmzDktgbb1H5QoZeW'),
(16, 'Full', 'test@gmail.com', '$2y$10$VhQh5CYLaHFk/88t4gipvuu9/H941FQ.jybEkonL0FPLlD1YjmTHy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `securitylog`
--
ALTER TABLE `securitylog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_deliveryFee`
--
ALTER TABLE `tbl_deliveryFee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `securitylog`
--
ALTER TABLE `securitylog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_deliveryFee`
--
ALTER TABLE `tbl_deliveryFee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
