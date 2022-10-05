-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2022 at 10:19 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usercollection`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_contact` varchar(255) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_contact`, `user_image`) VALUES
(1, 'Rahul Nalawade', 'nalawaderahul62@gmail.com', '$2y$10$Roht7IpMVDJwpZL0R7MiUOh458J6KPalK86jgxMEGsRhBLczAS77O', '9876543210', '1.jpg'),
(2, 'john', 'john@gmail.com', '$2y$10$Roht7IpMVDJwpZL0R7MiUOh458J6KPalK86jgxMEGsRhBLczAS77O', '1234567890', ''),
(3, 'ram', 'ram@gmail.com', '$2y$10$Roht7IpMVDJwpZL0R7MiUOh458J6KPalK86jgxMEGsRhBLczAS77O', '8795462310', 'home.png'),
(4, 'stefen', 'stefen@gmail.com', '$2y$10$Roht7IpMVDJwpZL0R7MiUOh458J6KPalK86jgxMEGsRhBLczAS77O', '3216549870', 'c.png'),
(5, 'maddy', 'maddy@gmail.com', '$2y$10$Roht7IpMVDJwpZL0R7MiUOh458J6KPalK86jgxMEGsRhBLczAS77O', '8888888888', '1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
