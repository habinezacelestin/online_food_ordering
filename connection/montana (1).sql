-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 01:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `montana`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(255) NOT NULL,
  `pro_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_id`, `cat_name`) VALUES
(1, 'Room'),
(2, 'sale'),
(3, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `comment`) VALUES
(1, 'welcome', 'habineza@gmail.com', 'sdzfxcgvbbhgvfc dxfcgvbjknjhbgyftdr'),
(2, 'habineza celestin', 'habineza@gmail.com', 'aesdrfgyhjkhgufydtr     serdtgyih esrdtgyuih dtfgyuhij rdtgyuijok'),
(3, 'eroi', 'eru123@gmail.com', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `ord_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `proname` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `ord_id`, `pro_id`, `proname`, `quantity`, `price`, `order_date`) VALUES
(1, 110671254, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(2, 110671254, 19, 'Biryani', 1, 7000, '2022-11-06'),
(3, 110671410, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(4, 110671410, 19, 'Biryani', 1, 7000, '2022-11-06'),
(5, 110671445, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(6, 110671445, 19, 'Biryani', 1, 7000, '2022-11-06'),
(7, 110671528, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(8, 110671528, 19, 'Biryani', 1, 7000, '2022-11-06'),
(9, 110671539, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(10, 110671539, 19, 'Biryani', 1, 7000, '2022-11-06'),
(11, 110671703, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(12, 110671703, 19, 'Biryani', 1, 7000, '2022-11-06'),
(13, 110671720, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(14, 110671720, 19, 'Biryani', 1, 7000, '2022-11-06'),
(15, 110671725, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(16, 110671725, 19, 'Biryani', 1, 7000, '2022-11-06'),
(17, 110680013, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(18, 110680013, 19, 'Biryani', 1, 7000, '2022-11-06'),
(19, 110680117, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(20, 110680117, 19, 'Biryani', 1, 7000, '2022-11-06'),
(21, 110680401, 17, 'Chicken', 1, 10000, '2022-11-06'),
(22, 110680401, 18, 'Shawarma', 45, 3000, '2022-11-06'),
(23, 110680557, 16, 'coffee', 15, 1000, '2022-11-06'),
(24, 110680834, 18, 'Shawarma', 10, 3000, '2022-11-06'),
(25, 110680834, 17, 'Chicken', 12, 10000, '2022-11-06'),
(26, 110680834, 25, 'special h', 1, 100, '2022-11-06'),
(27, 110681807, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(28, 110681930, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(29, 110682101, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(30, 110682236, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(31, 110682500, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(32, 110685938, 18, 'Shawarma', 1, 3000, '2022-11-06'),
(33, 110685938, 25, 'special h', 1, 100, '2022-11-06'),
(34, 110690033, 16, 'coffee', 1, 1000, '2022-11-06'),
(35, 110690439, 25, 'special h', 3, 100, '2022-11-06'),
(36, 110690655, 25, 'special h', 1, 100, '2022-11-06'),
(37, 110690854, 25, 'special h', 1, 100, '2022-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `ord_id` int(255) NOT NULL,
  `Pay_method` varchar(255) NOT NULL,
  `phone_pay` int(255) NOT NULL,
  `Txr` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `pay_amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pay_id`, `u_id`, `ord_id`, `Pay_method`, `phone_pay`, `Txr`, `date`, `pay_amount`) VALUES
(1, 2, 110680241, 'Mobile Money', 788967579, 'Momo_63675c311ad19', '2022-11-06', 200000),
(2, 2, 110680401, 'Mobile Money', 786190157, 'Momo_63675c66f0297', '2022-11-06', 145000),
(3, 2, 110680557, 'Mobile Money', 786190157, 'Momo_63675cde7c5d2', '2022-11-06', 15000),
(4, 2, 110680834, 'Mobile Money', 788967579, 'Momo_63675d7b281f3', '2022-11-06', 150100),
(5, 2, 110685938, 'Mobile Money', 786190157, 'Momo_636769753474f', '2022-11-06', 3100),
(6, 2, 110690033, 'Mobile Money', 786190157, 'Momo_636769aa0e8e7', '2022-11-06', 1000),
(7, 2, 110690439, 'Mobile Money', 780083237, 'Momo_63676aaa8a374', '2022-11-06', 300),
(8, 2, 110690655, 'Mobile Money', 780083237, 'Momo_63676b349155c', '2022-11-06', 100),
(9, 2, 110690854, 'Mobile Money', 780083237, 'Momo_63676ba503421', '2022-11-06', 100);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(255) NOT NULL,
  `Cat_id` int(255) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_type` varchar(255) NOT NULL,
  `pro_description` varchar(255) NOT NULL,
  `pro_image` varchar(255) NOT NULL,
  `pro_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `Cat_id`, `pro_name`, `pro_type`, `pro_description`, `pro_image`, `pro_price`) VALUES
(16, 3, 'coffee', 'Dinner Menu', 'it is composed by sugar and nescaffee ', '634d9ccd9c207.jpg', 1000),
(17, 3, 'Chicken', 'Luncheon Menu', 'rwandan', '634d9d946b5a1.png', 10000),
(18, 3, 'Shawarma', 'Breakfast Menu', 'ertfytgf', '634d9eea34fb4.png', 3000),
(19, 3, 'Biryani', 'Dinner Menu', 'ryuiui', '634d9f629a2aa.png', 7000),
(20, 1, 'mh4', 'V.I.P', 'have 100*100m', '634e65b49cd1a.png', 100000),
(22, 1, 'Kist 4', 'V.I.P', 'have 100*100m', '634e662083b68.png', 200000),
(23, 2, 'mh4', 'Wedding sale', 'have 100*100m', '634e6b6e72e31.png', 10000),
(25, 3, 'special h', 'Dinner Menu', 'wertyuiop', '635425324cbe4.png', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(1, 'habineza1', 'habineza', 'celestin', 'habineza@gmail.com', '0786190157', '777777', 'kimironko', 'Administrator', '2022-11-05 19:59:32'),
(2, 'habineza', 'jack', 'celestin', 'habin@gmail.com', '0786190157', '555555', 'gikondo', 'user', '2022-11-05 19:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `ord_id` int(255) NOT NULL,
  `u_id` int(222) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `no_products` int(255) NOT NULL,
  `total_price` int(255) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`ord_id`, `u_id`, `name`, `no_products`, `total_price`, `date`, `status`) VALUES
(110671410, 2, NULL, 2, 10000, '2022-11-06', 'Rejected'),
(110671445, 2, NULL, 2, 10000, '2022-11-06', 'Rejected'),
(110671528, 2, NULL, 2, 10000, '2022-11-06', 'Pending'),
(110671539, 2, NULL, 2, 10000, '2022-11-06', 'Pending'),
(110671703, 2, NULL, 2, 10000, '2022-11-06', 'Completed'),
(110671720, 2, NULL, 2, 10000, '2022-11-06', 'Completed'),
(110671725, 2, NULL, 2, 10000, '2022-11-06', 'Pending'),
(110680013, 2, NULL, 2, 10000, '2022-11-06', 'Pending'),
(110680117, 2, NULL, 2, 10000, '2022-11-06', 'Pending'),
(110680207, 2, 'Kist 4', 1, 200000, '2022-11-06', 'Pending'),
(110680241, 2, 'Kist 4', 1, 200000, '2022-11-06', 'Completed'),
(110680401, 2, NULL, 2, 145000, '2022-11-06', 'Completed'),
(110680557, 2, NULL, 1, 15000, '2022-11-06', 'Pending'),
(110680834, 2, NULL, 3, 150100, '2022-11-06', 'Pending'),
(110681807, 2, NULL, 1, 3000, '2022-11-06', 'Pending'),
(110681930, 2, NULL, 1, 3000, '2022-11-06', 'Pending'),
(110682101, 2, NULL, 1, 3000, '2022-11-06', 'Pending'),
(110682236, 2, NULL, 1, 3000, '2022-11-06', 'Pending'),
(110682500, 2, NULL, 1, 3000, '2022-11-06', 'Pending'),
(110682529, 2, 'Kist 4', 1, 200000, '2022-11-06', 'Pending'),
(110684701, 2, 'Kist 4', 1, 200000, '2022-11-06', 'Pending'),
(110684858, 2, 'Kist 4', 1, 200000, '2022-11-06', 'Pending'),
(110684952, 2, 'Kist 4', 1, 200000, '2022-11-06', 'Pending'),
(110685120, 2, 'Kist 4', 1, 200000, '2022-11-06', 'Pending'),
(110685202, 2, 'Kist 4', 1, 200000, '2022-11-06', 'Pending'),
(110685311, 2, 'Kist 4', 1, 200000, '2022-11-06', 'Pending'),
(110685409, 2, 'Kist 4', 1, 200000, '2022-11-06', 'Pending'),
(110685644, 2, 'Kist 4', 1, 200000, '2022-11-06', 'Pending'),
(110685743, 2, 'Kist 4', 1, 200000, '2022-11-06', 'Pending'),
(110685938, 2, NULL, 2, 3100, '2022-11-06', 'Pending'),
(110690033, 2, NULL, 1, 1000, '2022-11-06', 'Pending'),
(110690439, 2, NULL, 1, 300, '2022-11-06', 'Pending'),
(110690655, 2, NULL, 1, 100, '2022-11-06', 'Pending'),
(110690854, 2, NULL, 1, 100, '2022-11-06', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `pro_id_2` (`pro_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`ord_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `ord_id` (`ord_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `Cat_id` (`Cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `u_id` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
