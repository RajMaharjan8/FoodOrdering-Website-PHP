-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 02:36 AM
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
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `email`, `username`, `password`) VALUES
(8, 'Avinna', 'vina', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'Raj Maharjan', 'raj', '21232f297a57a5a743894a0e4a801fc3'),
(15, 'Sujal Shakya', 'sujal', '21232f297a57a5a743894a0e4a801fc3'),
(19, 'trishi13@gmail.com', 'Trishi', '3e0d6401786530d6e5255a99c1549349'),
(20, 'admin@admin.com', 'admin', '1dec9924e9aa074165f75bdef90c36d3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(25, 'Snacks', 'burger.jpg', 'Yes', 'Yes'),
(26, 'Drinks', 'drinks.jpg', 'Yes', 'Yes'),
(27, 'Desert', 'strawberry-icecream.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `full_name`, `email`, `subject`, `detail`) VALUES
(3, 'Raj', 'rajm48952@gmail.com', 'Good Food', 'Awesome Food love it\r\n'),
(5, 'Prabhash Maharjan', 'prabhash@gmail.com', 'Newari Khaja set', 'Great Newari Khaja set. Love the items. Happy Tihar!'),
(6, 'rahul', 'rahul89@gmail.com', 'review', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(17, 'Buff Momo', 'Delicious buff momo with momo chutney. ', 130.00, 'momo.jpg', 25, 'Yes', 'Yes'),
(18, 'Newari Khaja Set', 'It includes choila, allu tarkari, achar, chiura, fried fish and egg.', 150.00, 'newa.jpg', 25, 'Yes', 'Yes'),
(19, 'CocaCola Can', '330ml of Carbonated sweetness available in both Diet and No Sugar Vanilla.', 50.00, 'cocacola.jpg', 26, 'Yes', 'Yes'),
(20, 'Fanta Can', 'Sweet Carbonated Drink available in two flavors i.e. oranges and grapes.', 50.00, 'fanta.jpg', 26, 'Yes', 'Yes'),
(21, 'Strawberry Ice-Cream', 'Stawberry ice-cream made with natural strawberry containing jimmies.', 100.00, 'strawberry-icecream.jpg', 27, 'No', 'Yes'),
(22, 'Burger', 'Juicy, big, loaded with toppings of  sautéed peppers, onions and sweet mayo.', 150.00, 'burger-2.jpg', 25, 'Yes', 'Yes'),
(23, 'French Fries', 'Crispy and delicious french fries mixed with special masalas.', 90.00, 'fries.jpg', 25, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(6, 'Pizza', 10.00, 2, 20.00, '2022-10-20 01:33:36', 'Ordered', 'Pramish Thapa', '9812345678', 'rajm48952@gmail.com', 'milan'),
(7, 'Burger', 9.00, 3, 27.00, '2022-10-20 01:34:22', 'Ordered', 'Ashit Shakya', '9812345678', 'ashit123@gmail.com', 'Nagaun'),
(10, 'CocaCola Can', 50.00, 4, 200.00, '2022-10-22 03:05:06', 'Ordered', 'Prabhash Maharjan', '1234567890', 'prabhash@gmail.com', 'Panga'),
(11, 'Fanta Can', 50.00, 3, 150.00, '2022-10-22 03:13:34', 'On Delivery', 'Nemon Maharjan', '9841674153', 'nemon@gmail.com', 'Nayabazar');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `contact`, `email`, `password`, `address`) VALUES
(1, 'Avinna', '9871542134', 'aviney1234@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Panga'),
(2, 'Pramish', '9187162542', 'pramish23@gmail.co', '030fddce742683537afcac81fdf2d1d1', 'Nagaun'),
(6, 'SujalShakya', '9817265321', 'sujal@gmail.com', '1d9a34f301a6d136eab7600c0987a876', 'lalitpur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
