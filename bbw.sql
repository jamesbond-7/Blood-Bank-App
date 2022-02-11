-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 05:54 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbw`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_info`
--

CREATE TABLE `blood_info` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `blood_group` enum('A1+','A1-','A2+','A2-','B+','B-','A1B+','A1B-','A2B+','A2B-','AB+','AB-','O+','O-','A+','A-') NOT NULL,
  `num_trans_bag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_info`
--

INSERT INTO `blood_info` (`id`, `hospital_id`, `blood_group`, `num_trans_bag`) VALUES
(2, 1, 'O+', 76),
(4, 2, 'AB-', 30),
(5, 2, 'A1B+', 65),
(6, 2, 'A2B+', 30),
(7, 1, 'AB-', 30),
(8, 1, 'A+', 80),
(9, 3, 'A+', 90),
(10, 3, 'AB+', 80),
(11, 3, 'O-', 10),
(12, 4, 'A-', 80),
(13, 4, 'AB+', 20);

-- --------------------------------------------------------

--
-- Table structure for table `blood_request`
--

CREATE TABLE `blood_request` (
  `id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `blood_info_id` int(11) NOT NULL,
  `request` enum('initiated','granted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_request`
--

INSERT INTO `blood_request` (`id`, `receiver_id`, `hospital_id`, `blood_info_id`, `request`) VALUES
(1, 1, 1, 8, 'granted'),
(2, 1, 2, 4, 'initiated'),
(3, 1, 3, 9, 'granted'),
(4, 1, 3, 9, 'granted'),
(5, 1, 3, 11, 'granted'),
(6, 5, 3, 10, 'initiated'),
(7, 5, 1, 7, 'initiated'),
(8, 5, 4, 13, 'granted');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(11) NOT NULL,
  `hname` varchar(100) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `hemail` varchar(50) NOT NULL,
  `haddress` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `hname`, `contact_no`, `hemail`, `haddress`, `password`) VALUES
(1, 'Apoolo Hospital', '8969681533', 'apolo@gmail.com', 'Hajrat Ganj Lucknow', '$2y$10$NGC.0vF2WvL2.o3f6f5SwuqRoOQ76DUESpntIVHJcACOU9iF1MUM2'),
(2, 'Fortis Hospital', '9635559666', 'fortis@gmail.com', 'Anand Nagar Lucknow', '$2y$10$CU6BJIZSDe.xwb8KtLgsPuLFaEJE.8yd1tAJwEJj0G3bDcW3ttIHK'),
(3, 'Sahara Hospital Cardiologists', '6676451654', 'sahara@gmail.com', 'Lucknow,Uttar Pradesh', '$2y$10$V1XMH1i9D5IObIsiiOZnLe3ExiwJzDE7GcmJASl2GUYpsiMXYdlgy'),
(4, 'Shekhar Hospital', '6464715464', 'shekhar@gmail.com', 'Church Road Lucknow', '$2y$10$WCmU9jVdld0QK6ob3kNYfurbnDlSuPnbGlma1S934nkAcmQqW1Z2G');

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `blood_group` enum('A+','A-','B+','B-','O+','O-','AB+','AB-','A1+','A1-','A2+','A2-','A1B+','A1B-','A2B+','A2B-') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`id`, `name`, `phone_no`, `email`, `password`, `blood_group`) VALUES
(1, 'Aman', '8576656465', 'antooaman@gmail.com', '$2y$10$YiaG6BuQx237jHOXVT7HTeO6ELbKLDrUwVkbMt4Ng.oeKeftRA9mG', 'B+'),
(2, 'Adarsh', '8888888888', 'adarsh@gmail.com', '$2y$10$DxrFzvTH6oFkglKMHvXuLee5Q6k6LOXZkSnsRLxQqrvc7JlCzkwwq', 'B+'),
(3, 'dfjflj', '5555555555', 'dj@gmail.com', '$2y$10$ZfpRhsPPmSZp6poBkLTgKu.8PO1eN9.okpZbqLgcGdr.jO1fm.I2W', 'A+'),
(4, 'Boy', '4654646446', 'boy@gmail.com', '$2y$10$GPwTVM.QBsCwXGz2xv8.YeeS5fsPYD/.QepOZ.ZNw495ic5/ShCCW', 'A2-'),
(5, 'Abhay', '6464646464', 'abhay@gmail.com', '$2y$10$s2EODMmjS5sCb1if6Tv1quY2zIrEQGeS3eJrMzVVxz5Ne2eBo1iHK', 'A+');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_info`
--
ALTER TABLE `blood_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `blood_request`
--
ALTER TABLE `blood_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receiver_id` (`receiver_id`),
  ADD KEY `hospital_id` (`hospital_id`),
  ADD KEY `blood_info_id` (`blood_info_id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_info`
--
ALTER TABLE `blood_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `blood_request`
--
ALTER TABLE `blood_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_info`
--
ALTER TABLE `blood_info`
  ADD CONSTRAINT `blood_info_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`);

--
-- Constraints for table `blood_request`
--
ALTER TABLE `blood_request`
  ADD CONSTRAINT `blood_request_ibfk_1` FOREIGN KEY (`receiver_id`) REFERENCES `receivers` (`id`),
  ADD CONSTRAINT `blood_request_ibfk_2` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`),
  ADD CONSTRAINT `blood_request_ibfk_3` FOREIGN KEY (`blood_info_id`) REFERENCES `blood_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
