-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 12:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distsys`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `registration_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `mobile`, `address`, `registration_number`) VALUES
(1, 'Kwame Nkrumah', 'kwame.nkrumah@yahoo.com', 'password', '1234567890', 'Accra, Ghana', 'GH123'),
(2, 'Nelson Mandela', 'nelson.mandela@gmail.com', 'password', '0987654321', 'Johannesburg, South Africa', 'SA456'),
(3, 'Chinua Achebe', 'chinua.achebe@yahoo.com', 'password', '1357924680', 'Ogidi, Nigeria', 'NG789'),
(4, 'Wangari Maathai', 'wangari.maathai@gmail.com', 'password', '2468013579', 'Nyeri, Kenya', 'KE012'),
(5, 'Miriam Makeba', 'miriam.makeba@yahoo.com', 'password', '9876543210', 'Johannesburg, South Africa', 'SA789'),
(6, 'Haile Selassie', 'haile.selassie@gmail.com', 'password', '0123456789', 'Addis Ababa, Ethiopia', 'ET123'),
(7, 'Yaa Asantewaa', 'yaa.asantewaa@yahoo.com', 'password', '2345678901', 'Kumasi, Ghana', 'GH456'),
(8, 'Jomo Kenyatta', 'jomo.kenyatta@gmail.com', 'password', '3456789012', 'Nairobi, Kenya', 'KE345'),
(9, 'Desmond Tutu', 'desmond.tutu@yahoo.com', 'password', '4567890123', 'Cape Town, South Africa', 'SA012'),
(10, 'Chimamanda Adichie', 'chimamanda.adichie@gmail.com', 'password', '5678901234', 'Enugu, Nigeria', 'NG012');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
