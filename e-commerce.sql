-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2018 at 08:06 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `password` varchar(120) NOT NULL,
  `image` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `name`, `email`, `phone`, `password`, `image`) VALUES
(10, 'kousar', 'kousar.cse2334@gmail.com', '01781048385', 'kousar', ''),
(11, 'কাওসার রহমান ', 'admin@gmail.com', '2332424', '1234', ''),
(12, 'Shammi Akter', 'shammi@gmail.com', '01773340092', '1234567', ''),
(13, 'কাওসার রহমান ', 'kousar.cse2334@gmail.com', '01773340092', 'kousar', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `inventory_id` int(11) NOT NULL,
  `category_id` int(32) NOT NULL,
  `subcategory_id` int(32) NOT NULL,
  `item_id` int(32) NOT NULL,
  `product_id` int(32) NOT NULL,
  `product_quentity` int(32) NOT NULL,
  `product_b_price` int(32) NOT NULL,
  `product_s_price` int(32) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`inventory_id`, `category_id`, `subcategory_id`, `item_id`, `product_id`, `product_quentity`, `product_b_price`, `product_s_price`, `added_date`) VALUES
(1, 3, 6, 7, 22, 20, 1000, 1200, '2018-04-28 18:34:17'),
(2, 3, 3, 6, 21, 30, 2500, 3400, '2018-04-28 18:34:28'),
(3, 1, 7, 8, 27, 7, 21000, 22000, '2018-04-28 18:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `category_id` int(30) NOT NULL,
  `subcategory_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_id`, `item_name`, `category_id`, `subcategory_id`) VALUES
(1, 'Formal', 2, 2),
(2, 'Jeans', 2, 2),
(3, 'Full Sleeve', 2, 4),
(4, 'Casual', 2, 4),
(5, 'Solid Color', 2, 5),
(6, 'Cotton', 3, 3),
(7, 'Leather', 3, 6),
(8, 'Showcase', 1, 7),
(9, 'Samsung', 5, 8),
(10, 'Iphone', 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_category`
--

CREATE TABLE `tbl_main_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(120) NOT NULL,
  `created_date` varchar(120) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_main_category`
--

INSERT INTO `tbl_main_category` (`category_id`, `category_name`, `created_date`, `description`) VALUES
(1, 'Home Decor', '', ''),
(2, 'Men''s Shopping', '', ''),
(3, 'Women''s Shopping', '', ''),
(4, 'Mobile', '', ''),
(5, 'Electronics', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `category_id` int(32) NOT NULL,
  `subcategory_id` int(32) NOT NULL,
  `item_id` int(32) NOT NULL,
  `product_description` varchar(120) NOT NULL,
  `product_price` int(32) NOT NULL,
  `product_image` varchar(120) NOT NULL,
  `publication_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `category_id`, `subcategory_id`, `item_id`, `product_description`, `product_price`, `product_image`, `publication_status`) VALUES
(20, 'Narrow fit jeans pant', 2, 2, 2, 'descrition', 599, './uploads/1.jpg', 0),
(21, 'Multi Color Cotton Sharee', 3, 3, 6, 'Multi Color Cotton Sharee', 3449, './uploads/2.jpg', 1),
(22, 'Ladies Chocolate Leather Side Bag', 3, 6, 7, 'Ladies Chocolate Leather Side Bag', 1169, './uploads/3.jpg', 1),
(23, 'Genuine leather bag', 3, 6, 7, 'Genuine leather bag', 1800, './uploads/4.jpg', 0),
(24, 'Menz Full Sleeve Casual Shirt', 2, 4, 3, 'Menz Full Sleeve Casual Shirt', 1000, './uploads/1_(1).jpg', 0),
(25, 'Mens Polo Shirt', 2, 5, 5, 'Mens Polo Shirt', 300, './uploads/5.jpg', 0),
(27, 'Canadian Process Wood showcase', 1, 7, 8, 'Canadian Process Wood showcase', 26000, './uploads/1_(2).jpg', 0),
(28, 'Denim Tawar Wash Jeans Pant', 2, 2, 2, 'Denim Tawar Wash Jeans Pant - Copy', 599, './uploads/6.jpg', 0),
(29, 'Semi Narrow Jeans Pant', 2, 2, 2, 'Semi Narrow Jeans Pant', 799, './uploads/7.jpg', 0),
(30, 'Alcott Semi Narrow Jeans Pant ', 2, 2, 2, 'Alcott Semi Narrow Jeans Pant ', 799, './uploads/8.jpg', 0),
(31, 'Menz Full Sleeve Casual Shirt', 2, 4, 4, 'Menz Full Sleeve Casual Shirt', 1199, './uploads/9.jpg', 0),
(32, 'iPhone 5S (32GB)', 5, 8, 10, 'iPhone 5S (32GB)', 1199, './uploads/10.jpg', 0),
(33, 'Apple iPhone 6 Plus (64GB) ', 5, 8, 10, 'Apple iPhone 6 Plus (64GB) ', 3299, './uploads/11.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `sub_category_name` varchar(120) NOT NULL,
  `category_id` int(32) NOT NULL,
  `created_date` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `sub_category_name`, `category_id`, `created_date`) VALUES
(2, 'Pants', 2, ''),
(3, 'Sharee', 3, ''),
(4, 'Shirts', 2, ''),
(5, 'Polo Shirts', 2, ''),
(6, 'Bags', 3, ''),
(7, 'Furniture', 1, ''),
(8, 'Mobile', 5, ''),
(9, 'Television', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(120) NOT NULL,
  `user_email` varchar(120) NOT NULL,
  `user_password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(6, 'kousar Rahman', 'kousar.cse2334@gmail.com', 'kousar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_viewer_massage`
--

CREATE TABLE `tbl_viewer_massage` (
  `viewer_msg_id` int(11) NOT NULL,
  `viewer_name` varchar(120) NOT NULL,
  `viewer_email` varchar(120) NOT NULL,
  `viewer_message` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sending_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_viewer_massage`
--

INSERT INTO `tbl_viewer_massage` (`viewer_msg_id`, `viewer_name`, `viewer_email`, `viewer_message`, `status`, `sending_date`) VALUES
(1, 'kousar', 'kousar@gmail.com', 'Hi I am here', 1, '0000-00-00 00:00:00'),
(3, 'Shammi Akter', 'shammi@gmail.com', 'Yes it is send', 1, '0000-00-00 00:00:00'),
(4, 'Sumon', 'sumon@gmail.com', 'I am sumon', 1, '0000-00-00 00:00:00'),
(5, 'Sumon', 'sumon@gmail.com', 'I am sumon', 1, '0000-00-00 00:00:00'),
(6, 'Sumon', 'sumon@gmail.com', 'I am sumon', 1, '0000-00-00 00:00:00'),
(7, 'Rokibul', 'rokibul@gmail.com', 'from Rokibul', 1, '2018-04-25 00:00:00'),
(8, 'Rokibul', 'rokibul@gmail.com', 'from Rokibul', 1, '2018-04-25 00:00:00'),
(9, 'Rokibul', 'rokibul@gmail.com', 'from Rokibul', 1, '2018-04-25 23:47:15'),
(10, 'Kousar Ragman', 'kousar@gmail.com', 'I am a Bangladeshi. I love Bangladesh. Bangla is my mother  tongue. fsdfs dfsdfs dfvsdfs sdfs fsdssdfskdf skjdhjsd kjhjdajakdja adaj ', 1, '2018-04-27 20:59:39'),
(11, 'Akmal Hossain', 'akmal@gmail.com', 'Career Objective:\r\nTo pursue a career in the field of Computer Science & Engineering with any institution where my education, aptitude, sincerity and dedication to work will be properly utilized.\r\nProject Title: Medical Information System.\r\nLanguage & Platform: PHP, HTML, CSS, JavaScript\r\nDetails: This is a web site where user can find any information about doctor, hospital, ambulance and pharmacies. There are also a blood bank where user can register as a donor and they also find out donor as they need. User can also search doctor, hospital, ambulance and blood donor. ', 0, '2018-05-01 00:10:03'),
(12, 'Raton Kumar', 'rotan@yahoo.com', 'Message from roton', 1, '2018-05-03 17:45:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_main_category`
--
ALTER TABLE `tbl_main_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_viewer_massage`
--
ALTER TABLE `tbl_viewer_massage`
  ADD PRIMARY KEY (`viewer_msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_main_category`
--
ALTER TABLE `tbl_main_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_viewer_massage`
--
ALTER TABLE `tbl_viewer_massage`
  MODIFY `viewer_msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
