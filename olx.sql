-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2015 at 06:41 PM
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
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `category` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(12) unsigned NOT NULL,
  `pur_year` int(4) unsigned DEFAULT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `file_size` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`category`,`price`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category`, `name`, `price`, `pur_year`, `description`, `filename`, `file_size`) VALUES
(1, 3, 'Mobiles and Tablets', 'Moto G', 7000, 2014, 'Moto G in good condition purchased in January 2014.', 'moto g.jpg', 675345),
(2, 3, 'Vehicles', 'Indica Vista', 200000, 2011, 'Indica Vista purchased in 2011 travelled a total of 50,000 km. Price is negotiable.', 'indica vista.jpg', 69643),
(5, 3, 'Electronics and Computer', 'Lenovo IdeaPad Z510', 40000, 2014, 'The specs are: 2GB NVIDIA Graphics Card, 6GB RAM, 1TB Hard Disk, 15.6 inches Screen.', 'lenovo z510.jpg', 485516),
(6, 4, 'Electronics and Computer', 'HP Pavillion', 37000, 2014, 'HP Laptop White in color, 6GB RAM, 2GB NVIDIA GeForce 740M, 1TB Hard Disk, Windows 8.1, 15.6 inches screen in excellent condition.', 'hp laptop.jpg', 388263),
(9, 4, 'Vehicles', 'Audi A4', 1000000, 0, 'Audi A4 with meter reading about 40,000 km.', 'audi.jpg', 1098228),
(10, 4, 'Clothing and Accessories', 'Shirt', 1000, 2014, 'Designer Shirt size XL', 'shirt.jpg', 67281),
(11, 4, 'Books and CDs', 'Inception DVD', 200, 2010, 'Inception Bluray quality DVD', 'inception.jpg', 312585),
(12, 4, 'Home and Furniture', 'Sofa', 5000, 0, 'Bed Room sofa in nice condition.', 'bed room sofa.jpg', 1226964),
(13, 4, 'Other', 'Cricket Bat', 1000, 0, 'Nice Cricket Bat', 'bat.jpg', 52346),
(14, 5, 'Clothing and Accessories', 'Hoodie', 999, 0, 'Hoodie of Size XL', 'hoodie.jpg', 27805),
(15, 5, 'Books and CDs', 'Madagascar DVD', 400, 0, 'Madagascar series in bluray quality', 'madagascar dvd.jpg', 151214),
(16, 5, 'Home and Furniture', 'Toshiba Refrigerator', 20000, 0, 'Medium sized Toshiba Regfrigerator', 'toshiba_ref.jpg', 20102),
(17, 5, 'Other', 'Football', 300, 0, 'Reebok Football', 'football.jpg', 123674),
(18, 3, 'Other', 'Basketball', 500, 0, 'Basketball in nice condition', 'basketball.jpg', 390207),
(19, 3, 'Books and CDs', 'Kane And Abel', 500, 0, 'It is an awesome novel written by Jeffrey Archer', 'kane and abel.jpg', 23477);

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
  UNIQUE KEY `email` (`username`),
  KEY `email_2` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `email`, `username`, `password`) VALUES
(3, 'Hemant', 'Mann', '9999999999', 'hemant@gmail.com', 'Hemant', '$2y$10$MGRmYTMxZGRiNGU0NDg4NuirkyRFNXjZLMbIRx8valB135WV262ua'),
(4, 'Abhishek', 'Rathee', '9876543210', 'rathee@gmail.com', 'Abhi', '$2y$10$NDgzYTU3OTQ3YzhlZjU1MO13549jBdkx/1lNG6WTKxnQokBx/idyC'),
(5, 'Prakhar', 'Sandhu', '9876543221', 'prakhar@gmail.com', 'Prakhar', '$2y$10$ZjI4ZTJhMWFjZjA2OTFjNOwHvwfOhovz7Hydho5YdXx0NeWNiayrG'),
(8, 'Abhishek', 'Arya', '9877654321', 'arya@gmail.com', 'Arya', '$2y$10$MzFjYjAxMzhjNmEyMjAzNOAL7tW9m3kBuMVXE2lB7H5UHLeH3PMeu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
