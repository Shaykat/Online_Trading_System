-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2017 at 07:02 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

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
('2', 'Cars and Vehicles'),
('3', 'Home & Garden'),
('4', 'Clothing, Health & Beauty'),
('5', 'Hobby,Sport & Kids'),
('6', 'Pets & Animals'),
('7', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `user_Id` int(6) NOT NULL,
  `product_Id` int(6) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '1', '1', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `product_Id` int(6) NOT NULL,
  `photo` text NOT NULL,
  `product_title` text NOT NULL,
  `description` longtext NOT NULL,
  `condition` varchar(15) NOT NULL,
  `model` varchar(20) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_Id` int(6) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_Id`, `UserName`, `Email`, `Password`) VALUES
(1, '12', '12', '12');

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
('2', 'Computers & Tablets', '1'),
('3', 'Cameras & Recorders', '1'),
('4', 'Cars', '2'),
('5', 'Motorbikes', '2'),
('6', 'Bycycles', '2'),
('7', 'Furniture', '3'),
('8', 'Home Appliances', '3'),
('9', 'Electricity & Garden', '3'),
('10', 'Clothing', '4'),
('11', 'Jewellery', '4'),
('12', 'Watches', '4'),
('13', 'Health & Beauty Products', '4'),
('14', 'Musical Instruments', '5'),
('15', 'Sports Equipments', '5'),
('16', 'Childresn\'s Iteam', '5'),
('17', 'Pets', '6'),
('18', 'Farm Animals', '6'),
('19', 'Pet & Animal Accessories', '6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD UNIQUE KEY `user_Id` (`user_Id`);

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
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
