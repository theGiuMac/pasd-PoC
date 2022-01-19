-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2022 at 09:21 PM
-- Server version: 10.3.31-MariaDB-0+deb10u1
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket_products`
--

USE supermarket_products;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity_display` int(11) NOT NULL,
  `quantity_warehouse` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity_display`, `quantity_warehouse`, `image_path`) VALUES
(1, 'Milk', 1.5, 0, 5, ''),
(2, 'Breadcrumbs', 0.45, 25, 50, ''),
(3, 'Corn chips', 1.25, 15, 25, ''),
(4, 'Deodorant', 2.75, 30, 60, ''),
(5, 'Orange juice', 2.25, 45, 30, ''),
(6, 'Chocomel', 1.75, 10, 30, ''),
(7, 'Heineken', 2, 12, 40, ''),
(8, 'Cheeze', 1.25, 5, 10, ''),
(9, 'Ice cream', 4,75, 10, 50, ''),
(10, 'Orange', 0.99, 15, 0, ''),
(11, 'Beef', 7, 5, 6, ''),
(12, 'Pork', 3, 6, 7, ''),
(13, 'Chicken Breast', 6.25, 7, 8, ''),
(14, 'Protein Shake', 11.25, 5, 10, ''),
(15, 'Spaghetti', 1.99, 10, 20, ''),
(16, 'Eggs', 3.25, 10, 20, ''),
(17, 'Water', 1.25, 15, 40, ''),
(18, 'Salad', 4.99, 10, 20, ''),
(19, 'Toilet paper', 2.25, 20, 50, ''),
(20, 'Pet feed', 10.99, 20, 50, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

