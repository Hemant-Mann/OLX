-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2015 at 10:31 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `olx`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(24) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(5, 'Books and CDs'),
(4, 'Clothing and Accessories'),
(2, 'Electronics and Computer'),
(6, 'Home and Furniture'),
(3, 'Mobiles and Tablets'),
(7, 'Other'),
(1, 'Vehicles');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(12) unsigned NOT NULL,
  `pur_year` varchar(4) DEFAULT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `name` (`name`),
  KEY `category_id` (`category_id`),
  FULLTEXT KEY `description` (`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `name`, `price`, `pur_year`, `description`, `filename`) VALUES
(1, 3, 3, 'Moto G', 7000, '2014', 'Moto G in good condition purchased in January 2014.', 'moto g.jpg'),
(2, 3, 1, 'Indica Vista', 200000, '2011', 'Indica Vista purchased in 2011 travelled a total of 50,000 km. Price is negotiable.', 'indica vista.jpg'),
(5, 3, 2, 'Lenovo IdeaPad Z510', 40000, '2014', 'The specs are: 2GB NVIDIA Graphics Card, 6GB RAM, 1TB Hard Disk, 15.6 inches Screen.', 'lenovo z510.jpg'),
(6, 4, 2, 'HP Pavillion', 37000, '2014', 'HP Laptop White in color, 6GB RAM, 2GB NVIDIA GeForce 740M, 1TB Hard Disk, Windows 8.1, 15.6 inches screen in excellent condition.', 'hp laptop.jpg'),
(9, 4, 1, 'Audi A4', 1000000, '0', 'Audi A4 with meter reading about 40,000 km.', 'audi.jpg'),
(10, 4, 4, 'Shirt', 1000, '2014', 'Designer Shirt size XL', 'shirt.jpg'),
(11, 4, 5, 'Inception DVD', 200, '2010', 'Inception Bluray quality DVD', 'inception.jpg'),
(12, 4, 6, 'Sofa', 5000, '0', 'Bed Room sofa in nice condition.', 'bed room sofa.jpg'),
(13, 4, 7, 'Cricket Bat', 1000, '0', 'Nice Cricket Bat', 'bat.jpg'),
(14, 5, 4, 'Hoodie', 999, '0', 'Hoodie of Size XL', 'hoodie.jpg'),
(15, 5, 5, 'Madagascar DVD', 400, '0', 'Madagascar series in bluray quality', 'madagascar dvd.jpg'),
(16, 5, 6, 'Toshiba Refrigerator', 20000, '0', 'Medium sized Toshiba Regfrigerator', 'toshiba_ref.jpg'),
(17, 5, 7, 'Football', 300, '0', 'Reebok Football', 'football.jpg'),
(18, 3, 7, 'Basketball', 500, '0', 'Basketball in nice condition', '12-Wilson Basketball.jpg'),
(19, 3, 5, 'Kane And Abel', 500, '0', 'It is an awesome novel written by Jeffrey Archer', 'kane and abel.jpg'),
(20, 3, 3, 'Nexus 5', 15000, '2014', 'The google brand Nexus 5 in red color', '3-Nexus 5-nexus.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `phone` (`phone`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `email`, `username`, `password`) VALUES
(3, 'Hemant', 'Mann', '9999999999', 'hemant@gmail.com', 'Hemant', '$2y$10$MGRmYTMxZGRiNGU0NDg4NuirkyRFNXjZLMbIRx8valB135WV262ua'),
(4, 'Abhishek', 'Rathee', '9876543210', 'rathee@gmail.com', 'Abhi', '$2y$10$NDgzYTU3OTQ3YzhlZjU1MO13549jBdkx/1lNG6WTKxnQokBx/idyC'),
(5, 'Prakhar', 'Sandhu', '9876543221', 'prakhar@gmail.com', 'Prakhar', '$2y$10$ZjI4ZTJhMWFjZjA2OTFjNOwHvwfOhovz7Hydho5YdXx0NeWNiayrG'),
(8, 'Abhishek', 'Arya', '9877654321', 'arya@gmail.com', 'Arya', '$2y$10$MzFjYjAxMzhjNmEyMjAzNOAL7tW9m3kBuMVXE2lB7H5UHLeH3PMeu'),
(9, 'Test', 'User', '8888888888', 'tester@fake.com', 'yoyo', '$2y$10$YmVhOGUyMzYzOWEzNGNkNuQR5.UI4ECSlD0tM3Dm6DabSa616uOba');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
