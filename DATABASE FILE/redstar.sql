-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 01:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redstar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_phone` varchar(50) NOT NULL,
  `cust_province` varchar(100) NOT NULL,
  `cust_city` varchar(100) NOT NULL,
  `cust_barangay` varchar(100) NOT NULL,
  `cust_hnumber` varchar(100) NOT NULL,
  `cust_zip` varchar(30) NOT NULL,
  `cust_s_name` varchar(100) NOT NULL,
  `cust_s_cname` varchar(100) NOT NULL,
  `cust_s_phone` varchar(50) NOT NULL,
  `cust_s_province` varchar(100) NOT NULL,
  `cust_s_city` varchar(100) NOT NULL,
  `cust_s_barangay` varchar(100) NOT NULL,
  `cust_s_hnumber` varchar(100) NOT NULL,
  `cust_s_zip` varchar(30) NOT NULL,
  `cust_password` varchar(100) NOT NULL,
  `cust_token` varchar(255) NOT NULL,
  `cust_datetime` varchar(100) NOT NULL,
  `cust_timestamp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_id`, `cust_name`, `cust_email`, `cust_phone`, `cust_province`, `cust_city`, `cust_barangay`, `cust_hnumber`, `cust_zip`, `cust_s_name`, `cust_s_cname`, `cust_s_phone`, `cust_s_province`, `cust_s_city`, `cust_s_barangay`, `cust_s_hnumber`, `cust_s_zip`, `cust_password`, `cust_token`, `cust_datetime`, `cust_timestamp`) VALUES
(13, 'Jojo Javier', 'jojojavier@gmail.com', '0987654321', 'Batangas', 'Tanauan', 'Boot', '1114', '4232', 'Jojo Javier', 'Google', '9357289035', 'Batangas', 'Tanauan', 'Boot', '1124 Sitio Ople', '4232', 'eb89f40da6a539dd1b1776e522459763', '5b4fdf1bfb7990733afc6c86bf345437', '2023-05-13 09:03:14', '1684023149');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_title` varchar(255) NOT NULL,
  `faq_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`faq_id`, `faq_title`, `faq_content`) VALUES
(1, 'How do I place an order?', '<p class=\"MsoNormal\">To place an order on our website, simply find the product\r\nyou wish to purchase and click on the \"Add to Cart\" button. Once\r\nyou\'ve added all the items you want to your cart, click on the\r\n\"Checkout\" button to proceed to the payment page. Here, you\'ll be\r\nasked to enter your shipping address. Once you\'ve reviewed your order and\r\nconfirmed that everything looks correct, click on the \"Place Order\"\r\nbutton to complete your purchase. If you encounter any issues or have any questions,\r\nfeel free to contact our customer support team for assistance.<o:p></o:p></p>'),
(2, 'Is Home credit Available?', '<p class=\"MsoNormal\">Yes, just follow these 3 easy steps. </p><p class=\"MsoNormal\">1) Submit 2 valid Ids,\r\n</p><p class=\"MsoNormal\">2) Complete the application form</p><p class=\"MsoNormal\">3) Wait 10 mins for the result.<o:p></o:p></p>\r\n'),
(3, 'How much for customer service', '<p>It\'s FREE, we offer lifetime free customer service at comfort of your home.</p>\r\n'),
(4, 'Can you deliver outside the country?', '<p class=\"MsoNormal\">We regret to inform our valued customers that Red Star is\r\nonly available in locations that are in proximity to our physical branches.<o:p></o:p></p><p class=\"a  \" style=\"box-sizing: inherit; text-rendering: optimizeLegibility; line-height: 1.6; margin-bottom: 0.714286rem; padding: 0px; font-size: 14px; color: rgb(10, 10, 10); font-family: opensans, \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(250,=\"\" 250,=\"\" 250);\"=\"\"><span style=\"color: rgb(209, 213, 219); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, \"Segoe UI\", Roboto, Ubuntu, Cantarell, \"Noto Sans\", sans-serif, \"Helvetica Neue\", Arial, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\", \"Noto Color Emoji\"; font-size: 16px; white-space: pre-wrap; background-color: rgb(68, 70, 84);\"><br></span><br></p>\r\n'),
(5, 'What are your freebies?', '<p><b>Free Canopy</b></p><p><b>Free Flat Screen TV 19\' inches</b></p><p><b>Free Air Fryer</b></p><p><b>Free Lifetime Service</b></p><p><b>Free Delivery Nearby places</b></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `payment_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `product_id`, `product_name`, `size`, `color`, `quantity`, `unit_price`, `payment_id`) VALUES
(14, 96, 'RS Single', '', '', '1', '21000', '1'),
(15, 95, 'RS - Motor Bike', '', '', '1', '36000', '1'),
(16, 96, 'RS Single', '', '', '1', '21000', '1'),
(17, 95, 'RS - Motor Bike', '', '', '1', '36000', '1'),
(18, 94, 'RS - Cargo', '', '', '1', '63000', '1'),
(19, 96, 'RS Single', '', '', '1', '21000', '1'),
(20, 96, 'RS Single', '', '', '1', '21000', '1'),
(21, 96, 'RS Single', '', '', '1', '21000', '1'),
(26, 98, 'RS - 7', '', '', '1', '59800', '1684761143'),
(27, 97, 'NEW RS - 2', '', '', '1', '39800', '1684761143'),
(28, 97, 'NEW RS - 2', '', '', '1', '39800', '1684762939');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `payment_date` varchar(50) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `shipping_status` varchar(20) NOT NULL,
  `payment_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `customer_id`, `customer_name`, `customer_email`, `payment_date`, `paid_amount`, `payment_method`, `payment_status`, `shipping_status`, `payment_id`) VALUES
(75, 13, 'Jojo Javier', 'jojojavier@gmail.com', '2023-05-22 21:42:19', 39800, 'Cash on Delivery', 'Completed', 'Pending', '1684762939'),
(74, 13, 'Jojo Javier', 'jojojavier@gmail.com', '2023-05-22 21:12:23', 99600, 'Cash on Delivery', 'Completed', 'Completed', '1684761143');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_current_price` varchar(10) NOT NULL,
  `p_qty` int(10) NOT NULL,
  `p_featured_photo` varchar(255) NOT NULL,
  `p_description` text NOT NULL,
  `p_is_featured` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `p_current_price`, `p_qty`, `p_featured_photo`, `p_description`, `p_is_featured`) VALUES
(94, 'RS - Cargo', '63000', 19, 'product-featured-94.jpg', 'Dimension\r\nLength: 3100 mm\r\nWidth : 1050 mm\r\nHeight: 1700 mm\r\nMotor : 1200 Watts\r\nBattery : 60v20ah\r\nTire - Front: 3.50-12 (490mm diameter)\r\nBack:16x4.0 (510mm diameter)\r\nSpeed: 30-45 kph\r\nLoad Capacity: 350 kgs.\r\nCarriage (LxH): 150x50 cm brushless intelligent controller', 1),
(95, 'RS - Motor Bike', '36000', 51, 'product-featured-95.png', 'Motor : 600 Watts\r\nBattery: 60v20ah\r\nTire : 3.0x10 Tubeless\r\nRange :30-60 km\r\nSpeed : 30-50 kph\r\nLoad Capacity: 200 kgs.\r\nBrake System Front: Disc\r\nBack: Drum\r\nRemote Control: Anti-Theft \r\nDual Remote Control Alarm', 1),
(96, 'RS Single', '21000', 25, 'product-featured-96.png', 'Motor : 350 Watts\r\nBattery : 48v12ah\r\nTire : 14x2.50 Tubeless\r\nRange : 30-40 km\r\nSpeed : 25-35 kph\r\nLoad Capacity: 150 kgs.\r\nRemote Control: Anti-Theft \r\nDual Remote Control Alarm', 1),
(97, 'NEW RS - 2', '39800', 42, 'product-featured-97.png', 'Dimension\r\nLength: 1600 mm\r\nWidth: 650 mm\r\nHeight: 1000 mm\r\nBattery : 48v20ah\r\nTire : Tubeless\r\nMotor : 500 Watts\r\nRange : 30-40 km\r\nSpeed: 25-35 kph\r\nLoad Capacity: 250 kgs.\r\nRemote Control: Anti-Theft \r\nDual Remote Control Alarm', 1),
(98, 'RS - 7', '59800', 40, 'product-featured-98.png', 'Dimension\r\nLength: 2200 mm\r\nWidth: 800 mm\r\nHeight: 1650 mm\r\nMotor : 650 Watts\r\nBattery : 60v20ah\r\nTire : 3.00x10\r\nRange : 30-50 km\r\nSpeed : 30-40 kph\r\nLoad Capacity: 300 kgs.\r\nRemote Control: Anti-Theft Dual Remote Control Alarm', 1),
(99, 'RS - 5', '36000', 46, 'product-featured-99.png', 'Dimension\r\nLength: 1600 mm\r\nWidth: 650 mm\r\nHeight: 1000 mm\r\nMotor : 500 Watts\r\nBattery : 48v20ah\r\nTire : Tubeless\r\nRange : 30-40 km\r\nSpeed : 25-35 kph\r\nLoad Capacity: 250 kgs.\r\nRemote Control: Anti-Theft\r\nDual Remote Control Alarm', 1),
(100, 'RS - 4', '75000', 78, 'product-featured-100.png', 'Dimension\r\nLength : 2100 mm\r\nWidth : 950 mm\r\nHeight : 1700 mm\r\nMotor : 650 Watts\r\nBattery : 60v20ah\r\nTire : 3.00x10\r\nRange : 30-50 km\r\nSpeed : 30-40 kph\r\nLoad Capacity: 300 kgs.\r\nRemote Control: Anti-Theft \r\nDual Remote Control Alarm', 1),
(101, 'RS - 2', '49000', 66, 'product-featured-101.png', 'Dimension\r\nLength: 1900 mm\r\nWidth: 800 mm\r\nHeight: 1600 mm\r\nBattery : 48v20ah\r\nTire : 3.00x10\r\nMotor : 500 Watts\r\nRange : 30-40 km\r\nSpeed : 25-35 kph\r\nLoad Capacity: 250 kgs.\r\nRemote Control: Anti-Theft \r\nDual Remote Control Alarm', 1),
(102, 'RS - 1', '58000', 50, 'product-featured-102.png', 'Dimension\r\nLength: 2100 mm\r\nWidth: 950 mm\r\nHeight: 1700 mm\r\nBattery : 60v20ah\r\nTire :  3.00x10\r\nMotor : 650 Watts\r\nRange : 30-50 km\r\nSpeed : 25-35 kph\r\nLoad Capacity: 300 kgs.\r\nRemote Control: Anti-Theft \r\nDual Remote Control Alarm', 1),
(104, 'RS - 6', '42000', 34, 'product-featured-104.jpg', 'Length: 1600 mm \r\nWidth: 650 mm \r\nHeight 1000mm \r\nMotor power: 500 Watts \r\nBattery: 48v/20 ah \r\nRemote Control: Anti-theft \r\nDual Remote Control Alarm \r\nTire: Tubeless Range: 35 - 45 km\r\nSpeed: 25 - 35 kph \r\nLoad Capacity: 200 kg', 1),
(105, 'RS - 3', '52800', 54, 'product-featured-105.jpg', 'DIMENSION:\r\nLength: 2100 mm \r\nWidth: 1100 mm \r\nHeight: 1700 mm\r\nMotor Power:650Watts\r\nBattery : 48v/20ah\r\nTire : 3.00-10Tubeless\r\nBreak System : Disc Brake\r\nRange : 30-40Km\r\nSpeed : 25-35Kph\r\nLoad Capacity : 200Kg\r\nRemote Control:\r\nAnti-Theft Dual Remote Control Alarm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_photo`
--

CREATE TABLE `tbl_product_photo` (
  `pp_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `title`, `content`, `photo`) VALUES
(5, 'Free Delivery', 'Enjoy Free shipping near of our branch store', 'service-5.jpg'),
(6, 'Fast Delivery', 'as soon as you place order', 'service-6.jpg'),
(7, 'Freebies', 'always expect a lot of freebies', 'service-7.jpg'),
(8, 'Satisfaction Guarantee', 'We guarantee you with our quality satisfaction.', 'service-8.jpg'),
(9, 'Secure Checkout', 'Providing Secure Checkout Options for all', 'service-9.jpg'),
(10, 'Free Customer Service', 'Lifetime free customer service', 'service-10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `photo`, `heading`, `content`, `position`) VALUES
(1, 'slider-1.jpg', 'Welcome to Red Star Ebike', 'Shop Online for Latest Ebike', 'Center'),
(2, 'slider-2.jpg', 'Free Delivery on all areas!!', 'make yourself comfortable on your home and let us bring your desire redstar ebike!', 'Center'),
(3, 'slider-3.jpg', 'No Holiday for customer service', 'Any time of the day, we got your back! we are always available for you. ', 'Left');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `social_id` int(11) NOT NULL,
  `social_name` varchar(30) NOT NULL,
  `social_url` varchar(255) NOT NULL,
  `social_icon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`social_id`, `social_name`, `social_url`, `social_icon`) VALUES
(1, 'Facebook', 'https://www.facebook.com/profile.php?id=100064815231234', 'fa-brands fa-facebook'),
(2, 'Twitter', '', 'fa-brands fa-twitter'),
(3, 'LinkedIn', '', 'fa-brands fa-linkedin'),
(6, 'YouTube', 'https://youtu.be/sGho_JThB5M', 'fa-brands fa-youtube'),
(7, 'Instagram', 'https://www.instagram.com/redstarebikecompany/', 'fa-brands fa-instagram');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscriber`
--

CREATE TABLE `tbl_subscriber` (
  `subs_id` int(11) NOT NULL,
  `subs_email` varchar(255) NOT NULL,
  `subs_date` varchar(100) NOT NULL,
  `subs_date_time` varchar(100) NOT NULL,
  `subs_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_subscriber`
--

INSERT INTO `tbl_subscriber` (`subs_id`, `subs_email`, `subs_date`, `subs_date_time`, `subs_hash`) VALUES
(1, 'ruth@mail.com', '2022-03-20', '2022-03-20 10:25:18', 'f4eabc1afed38a08da8d1c6e5fb42187'),
(4, 'morgan.sarahh5@mail.com', '2022-03-20', '2022-03-20 10:27:48', 'bcdeda095a6c882803fc3aaf4a17f08e'),
(5, 'greenwd1154@mail.com', '2022-03-20', '2022-03-20 10:28:09', '279ecfe9debbb091c664641f534857ee'),
(6, 'awsm785@mail.com', '2022-03-20', '2022-03-20 10:28:21', '94096ae01fc65e71c50c7843d096e041'),
(7, 'fasfas@email.com', '2023-05-14', '2023-05-14 09:25:25', '0fed1a1fb26e61b57a8631f195170734'),
(13, 'hello@casfa.com', '2023-05-14', '2023-05-14 09:33:05', 'd914e0b8bcbbe9a7934a0b0af0d2ff75');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `email`, `phone`, `password`, `photo`, `role`, `status`) VALUES
(1, 'Administrator', 'admin@mail.com', '0987654321', '21232f297a57a5a743894a0e4a801fc3', 'user1.png', 'Admin', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_product_photo`
--
ALTER TABLE `tbl_product_photo`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  ADD PRIMARY KEY (`subs_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tbl_product_photo`
--
ALTER TABLE `tbl_product_photo`
  MODIFY `pp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  MODIFY `subs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
