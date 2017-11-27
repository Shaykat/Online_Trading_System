-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 04:10 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `advdetails`
--

CREATE TABLE `advdetails` (
  `user_Id` int(8) NOT NULL,
  `adv_Id` int(11) NOT NULL,
  `photo` text NOT NULL,
  `title` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `details` longtext NOT NULL,
  `phone` varchar(15) NOT NULL,
  `negotiable` int(2) NOT NULL,
  `advType` varchar(30) NOT NULL,
  `adv_subcatagory` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advdetails`
--

INSERT INTO `advdetails` (`user_Id`, `adv_Id`, `photo`, `title`, `price`, `location`, `details`, `phone`, `negotiable`, `advType`, `adv_subcatagory`) VALUES
(16, 15, 'htc  m8.jpg', 'htc m8', 65000, 'Ghulsan', 'Description: vai koidin age bire thke ansi!! hater obostha karp!! business e loss khise tai beicha lamu :/ interested thkle knck dien!!,Condition: old,Model: m8 black', '01781554418', 1, 'product', 'MobilePhones'),
(16, 16, 'macbook pro.jpg', 'Macbook pro', 120000, 'Dhaka', 'Description: new kinte hbe vaiya tai bikri kore dbo :D,Condition: old,Model: skj 2015', '01920301684', 0, 'product', 'ComputersAndTablets'),
(16, 19, 'flat1.jpg', 'A spacious flat ', 8000000, 'Chittagong', 'Beds: 3,Baths: 2,Property Size: 1850,Address: pathrghta,Description: vai valo flat southern mhuki ! feel free to knck and visit the flat!!,Features: Full-Furnished', '01912234901', 0, 'property', 'ApartmentsAndFlats'),
(16, 20, 'flat2.jpg', 'luxarious flat', 1200000, 'Dhaka', 'Beds: 3,Baths: 2,Property Size: 2250,Address: Baridhara DOHS,Description: damn!! this is a huge flat !!,Features: semi-Furnished', '01620304187', 1, 'property', 'ApartmentsAndFlats'),
(14, 21, 'canon.jpg', 'canon EOS 6D updte', 100005, 'Chittagong', 'Description: imported from USA!! 5 pices available!!interested peoples can knock me!!,Condition: new,Model: EOS 6d', '01676696969', 1, 'product', 'CamerasAndCamrecorders'),
(14, 22, 'nexus 5.jpg', 'LG nexus 5', 52000, 'Dhaka', 'Description: 2 pices available.imported from MALAYSIYA!!\r\nblack color!!,Condition: new,Model: nexus 5 black', '01620304187', 1, 'product', 'MobilePhones'),
(14, 23, 'sonyvaiolaptop.jpg', 'Sony vaio laptop', 45000, 'Ghulsan', 'Description: my avones!! cahanging to mac!! have to sell!!contact me asap if u peolple are interested!!,Condition: old,Model: vai 765 edition', '01912234901', 1, 'product', 'ComputersAndTablets'),
(14, 24, 'dubai flat.jpg', 'A luxirious flat ', 15000000, 'Dhaka', 'Beds: 3,Baths: 2,Property Size: 4000,Address: ghulsan,Description: grand flat!!,Features: Full-Furnished', '01620304187', 0, 'property', 'ApartmentsAndFlats'),
(14, 25, 'flat in a mirpur dohs.jpg', 'A flat in a mirpur DOHS update', 1000000, 'Dhaka', 'Beds: 4,Baths: 3,Property Size: 1850,Address: mirpur dohs,Description: southern flat........................x...........................................................y..................................................z,Features: Full-Furnished', '01920301684', 1, 'property', 'ApartmentsAndFlats'),
(17, 28, 'iphone.jpg', 'Iphone', 40000, 'Chittagong', 'Description: Latest Iphone series device,Condition: old,Model: Iphone 7', '01620304187', 1, 'product', 'MobilePhones'),
(17, 29, 'flat in a mirpur dohs.jpg', 'Apartment', 8278829, 'Sylhet', 'Beds: 4,Baths: 4,Property Size: 5000,Address: Nikunjo-2,Description: 10 Stored Building,Features: semi-Furnished', '01781554418', 1, 'property', 'ApartmentsAndFlats');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `adv_Id` int(11) NOT NULL,
  `category_Id` varchar(30) NOT NULL,
  `sub_category_Id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`adv_Id`, `category_Id`, `sub_category_Id`) VALUES
(1, '1', '1'),
(2, '', '0'),
(3, '1', '1'),
(4, '1', '1'),
(5, '', '0'),
(6, '', '0'),
(7, '', '0'),
(8, '1', '2'),
(9, '', '0'),
(10, '1', '1'),
(11, '', '0'),
(12, '1', '1'),
(13, '1', '1'),
(14, '1', '1'),
(15, '1', '1'),
(16, '1', '2'),
(17, '1', '2'),
(18, '1', '2'),
(19, '', '0'),
(20, '', '0'),
(21, '1', '3'),
(22, '1', '1'),
(23, '1', '2'),
(24, '', '0'),
(25, '', '0'),
(26, '1', '3'),
(27, '1', '1'),
(28, '1', '1'),
(29, '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_Id` varchar(3) NOT NULL,
  `category_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_Id`, `category_Name`) VALUES
('1', 'Electronics'),
('10', 'Bank'),
('11', 'IT'),
('12', 'Airlines'),
('13', 'HotelOrRestaurent'),
('14', 'Government'),
('2', 'Cars and Vehicles'),
('3', 'Home & Garden'),
('4', 'Clothing, Health & Beauty'),
('5', 'Hobby,Sport & Kids'),
('6', 'Pets & Animals'),
('7', 'Other'),
('8', 'ApartmentsAndFlats'),
('9', 'AccountingOrFinance');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(6) NOT NULL,
  `category_Id` varchar(3) NOT NULL,
  `location` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `category_Id`, `location`) VALUES
(1, '11', 'Mirpur'),
(2, '10', 'Mothijhil'),
(3, '12', 'Chittagong'),
(4, '11', 'Khulna'),
(5, '11', 'Chittagong'),
(6, '10', 'Dhaka'),
(7, '9', 'Dhaka'),
(8, '11', 'Chittagong'),
(9, '13', 'Dhaka'),
(10, '10', 'Dhaka'),
(11, '9', 'Dhaka'),
(12, '10', 'Dhaka'),
(13, '11', 'Dhaka'),
(14, '12', 'Dhaka'),
(15, '12', 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `jobdetails`
--

CREATE TABLE `jobdetails` (
  `user_Id` int(6) NOT NULL,
  `job_Id` int(6) NOT NULL,
  `job_type` varchar(20) NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `applyVia` varchar(30) NOT NULL,
  `company_web` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `deadline` date NOT NULL,
  `description` longtext NOT NULL,
  `salary` int(8) NOT NULL,
  `salary_interval_unit` varchar(10) NOT NULL,
  `negotiable` int(2) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `job_category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobdetails`
--

INSERT INTO `jobdetails` (`user_Id`, `job_Id`, `job_type`, `job_title`, `applyVia`, `company_web`, `address`, `deadline`, `description`, `salary`, `salary_interval_unit`, `negotiable`, `phone`, `job_category`) VALUES
(16, 8, 'fullime', 'CSS designer', 'company@gmail.com', 'therap.bd.com', 'bnani dhaka', '2017-08-12', 'a proficent css designer need!!', 40000, 'month', 1, '01912234901', 'IT'),
(16, 9, 'pertime', 'A student needed for per time ', 'preetom@gmail.com', 'preetom@gmail.com', 'banani dhaka 1202', '2017-09-09', 'we are lokking for a well mannered smart student for servicing :)', 10000, 'month', 1, '01781554418', 'HotelOrRestaurent'),
(16, 10, 'Internship', 'junior trainee manager for dha', 'dhakabank@gmail.com', 'dhakabank@gmail.com', 'banani dhaka', '2017-05-10', 'we are looking for a fresh graduated from reputed university!!', 350000, 'month', 1, '01920301684', 'Bank'),
(14, 11, 'pertime', 'A finance assistance needed!! ', 'comapany@gmail.com', 'islamicbanklimited.com', 'banani dhaka', '2017-05-10', 'U are lokking for skilled fresher graduate!!\r\nmajor in finance must required!!', 15000, 'month', 0, '01620304187', 'AccountingOrFinance'),
(14, 12, 'pertime', 'A receiptonist need for HRM ba', 'comapany@gmail.com', 'HRMbank.com', 'Ghulsan Dhaka', '2016-06-15', 'looking for smart young student who can understand the clients!!', 8000, 'month', 1, '01912234901', 'Bank'),
(14, 13, 'Internship', 'Grapichs desgner needed!!', 'comapany@gmail.com', 'newscreed@gmail.com', 'banani dhaka', '2017-05-13', 'innovative desgner reqiered!!', 20000, 'month', 1, '01620304107', 'IT'),
(17, 15, 'fullime', 'Cabin Crue Needed', 'novoair@yahoo.com', 'novoair.com', 'Sylhet,Airport', '2017-05-17', 'This job is required a smart, well fit personality. Good Speaking skill in English.', 15000, 'week', 0, '01620304107', 'Airlines');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_Id` int(6) NOT NULL,
  `category_Id` varchar(3) NOT NULL,
  `sub_category_Id` varchar(3) NOT NULL,
  `location` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_Id`, `category_Id`, `sub_category_Id`, `location`) VALUES
(13, '1', '1', 'Dhaka'),
(15, '1', '1', 'Chittagong'),
(16, '1', '3', 'Sylhet'),
(17, '1', '1', 'Sylhet'),
(18, '1', '3', 'Rajshahi');

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `user_Id` int(6) NOT NULL,
  `product_Id` int(6) NOT NULL,
  `photo` text NOT NULL,
  `product_title` text NOT NULL,
  `description` longtext NOT NULL,
  `condition` varchar(15) NOT NULL,
  `model` varchar(20) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `price` int(10) NOT NULL,
  `negotiable` tinyint(1) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `location` varchar(30) NOT NULL,
  `advType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`user_Id`, `product_Id`, `photo`, `product_title`, `description`, `condition`, `model`, `gender`, `price`, `negotiable`, `phone`, `location`, `advType`) VALUES
(1, 13, 'LG_G4_lrg1.png', 'LG Mobiles', 'Nexus Mobile', 'new', 'Nexus 5', '', 20000, 1, '01625415607', '', ''),
(1, 15, 's7.jpg', 'Sumsung mobile', 'This is an awesome phone', 'new', 'Galexy S7', '', 45000, 1, '01625415627', '', ''),
(1, 16, 'canon 60D.jpg', 'Canon Camera', 'This is a awesome camera', 'new', 'Canon 60D', '', 80000, 1, '01625415637', '', ''),
(3, 17, 'LG_G4_lrg1.png', 'LG Mobiles', 'This is Nexus phone', 'old', 'Nexus 5', '', 15000, 1, '01625415697', '', ''),
(3, 18, 'canon 60D.jpg', 'Canon Camera', 'This is a camera', 'old', 'Canon 60D', '', 30000, 1, '01625415107', 'Rajshahi', 'product');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_Id` int(6) NOT NULL,
  `category_Id` varchar(3) NOT NULL,
  `location` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_Id`, `category_Id`, `location`) VALUES
(1, '8', ''),
(2, '8', 'Chittagong');

-- --------------------------------------------------------

--
-- Table structure for table `propertydetails`
--

CREATE TABLE `propertydetails` (
  `user_Id` int(6) NOT NULL,
  `property_Id` int(6) NOT NULL,
  `photo` text NOT NULL,
  `beds` int(2) NOT NULL,
  `baths` int(2) NOT NULL,
  `property_title` text NOT NULL,
  `property_size` int(8) NOT NULL,
  `Address` text NOT NULL,
  `description` longtext NOT NULL,
  `features` varchar(20) NOT NULL,
  `price` int(10) NOT NULL,
  `negotiable` int(2) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `location` varchar(30) NOT NULL,
  `advType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propertydetails`
--

INSERT INTO `propertydetails` (`user_Id`, `property_Id`, `photo`, `beds`, `baths`, `property_title`, `property_size`, `Address`, `description`, `features`, `price`, `negotiable`, `phone`, `location`, `advType`) VALUES
(1, 2, 'beautiful-property.jpg', 4, 4, 'Home', 6000, 'Lal khan bazar, Chittagong', 'This is a home', 'Full-Furnished', 2147483647, 1, '01625415617', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_Id` int(6) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_Id`, `UserName`, `Email`, `Password`, `user_type`) VALUES
(16, 'Nahid Hasan', 'hasannahid371@gmail.com', '000000', 'Admin'),
(17, 'Sumaiya Kaani', 'kaani@gmail.com', '678901', 'User'),
(18, 'abdul Shaykat', 'shaykat@gmail.com', '654321', 'Admin'),
(19, 'Jhon Lili', 'jhon@gmil.com', '96e79218', 'Admin'),
(20, 'gym die', 'gym@yahoo.com', '96e79218', 'User'),
(21, 'sumaiya Trisha', 'trisha@gmail.com', '96e79218', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_Id` varchar(3) NOT NULL,
  `sub_category_Name` varchar(30) NOT NULL,
  `category_Id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_Id`, `sub_category_Name`, `category_Id`) VALUES
('1', 'MobilePhones', '1'),
('2', 'ComputersAndTablets', '1'),
('3', 'CamerasAndCamrecorders', '1'),
('4', 'Cars', '2'),
('5', 'Motorbikes', '2'),
('6', 'Bycycles', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advdetails`
--
ALTER TABLE `advdetails`
  ADD UNIQUE KEY `adv_Id` (`adv_Id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`adv_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_Id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_Id`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD UNIQUE KEY `product_Id` (`product_Id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_Id`);

--
-- Indexes for table `propertydetails`
--
ALTER TABLE `propertydetails`
  ADD UNIQUE KEY `property_Id` (`property_Id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `adv_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
