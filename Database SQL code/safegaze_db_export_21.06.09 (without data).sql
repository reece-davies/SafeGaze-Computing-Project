-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 10:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safegaze`
--

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` int(255) NOT NULL,
  `facility_name` varchar(50) NOT NULL,
  `facility_username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `postcode` varchar(15) NOT NULL,
  `access_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fri_times`
--

CREATE TABLE `fri_times` (
  `access_id` int(255) NOT NULL,
  `member_id` int(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `livestreams`
--

CREATE TABLE `livestreams` (
  `facility_id` int(255) NOT NULL,
  `livestream_id` int(255) NOT NULL,
  `livestream_title` varchar(100) NOT NULL,
  `livestream_link` varchar(255) NOT NULL,
  `livestream_notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `facility_id` int(255) NOT NULL,
  `member_id` int(255) NOT NULL,
  `member_username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `facility_id` int(255) NOT NULL,
  `message_id` int(255) NOT NULL,
  `message_title` varchar(100) NOT NULL,
  `urgency_level` varchar(20) NOT NULL,
  `message_notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mon_times`
--

CREATE TABLE `mon_times` (
  `access_id` int(255) NOT NULL,
  `member_id` int(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sat_times`
--

CREATE TABLE `sat_times` (
  `access_id` int(255) NOT NULL,
  `member_id` int(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `member_id` int(255) NOT NULL,
  `member_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sun_times`
--

CREATE TABLE `sun_times` (
  `access_id` int(255) NOT NULL,
  `member_id` int(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thu_times`
--

CREATE TABLE `thu_times` (
  `access_id` int(255) NOT NULL,
  `member_id` int(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `training_times`
--

CREATE TABLE `training_times` (
  `member_id` int(255) NOT NULL,
  `nine_am` tinyint(1) DEFAULT NULL,
  `ten_am` tinyint(1) DEFAULT NULL,
  `eleven_am` tinyint(1) DEFAULT NULL,
  `twelve_pm` tinyint(1) DEFAULT NULL,
  `one_pm` tinyint(1) DEFAULT NULL,
  `two_pm` tinyint(1) DEFAULT NULL,
  `three_pm` tinyint(1) DEFAULT NULL,
  `four_pm` tinyint(1) DEFAULT NULL,
  `five_pm` tinyint(1) DEFAULT NULL,
  `six_pm` tinyint(1) DEFAULT NULL,
  `seven_pm` tinyint(1) DEFAULT NULL,
  `eight_pm` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tue_times`
--

CREATE TABLE `tue_times` (
  `access_id` int(255) NOT NULL,
  `member_id` int(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wed_times`
--

CREATE TABLE `wed_times` (
  `access_id` int(255) NOT NULL,
  `member_id` int(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`),
  ADD UNIQUE KEY `facility_username` (`facility_username`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `fri_times`
--
ALTER TABLE `fri_times`
  ADD PRIMARY KEY (`access_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `livestreams`
--
ALTER TABLE `livestreams`
  ADD PRIMARY KEY (`livestream_id`),
  ADD KEY `facility_id` (`facility_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `member_username` (`member_username`),
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD KEY `facility_id` (`facility_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `facility_id` (`facility_id`);

--
-- Indexes for table `mon_times`
--
ALTER TABLE `mon_times`
  ADD PRIMARY KEY (`access_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `sat_times`
--
ALTER TABLE `sat_times`
  ADD PRIMARY KEY (`access_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `sun_times`
--
ALTER TABLE `sun_times`
  ADD PRIMARY KEY (`access_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `thu_times`
--
ALTER TABLE `thu_times`
  ADD PRIMARY KEY (`access_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `training_times`
--
ALTER TABLE `training_times`
  ADD UNIQUE KEY `member_id` (`member_id`) USING BTREE;

--
-- Indexes for table `tue_times`
--
ALTER TABLE `tue_times`
  ADD PRIMARY KEY (`access_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `wed_times`
--
ALTER TABLE `wed_times`
  ADD PRIMARY KEY (`access_id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fri_times`
--
ALTER TABLE `fri_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livestreams`
--
ALTER TABLE `livestreams`
  MODIFY `livestream_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mon_times`
--
ALTER TABLE `mon_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sat_times`
--
ALTER TABLE `sat_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sun_times`
--
ALTER TABLE `sun_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thu_times`
--
ALTER TABLE `thu_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tue_times`
--
ALTER TABLE `tue_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wed_times`
--
ALTER TABLE `wed_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fri_times`
--
ALTER TABLE `fri_times`
  ADD CONSTRAINT `fri_times_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `livestreams`
--
ALTER TABLE `livestreams`
  ADD CONSTRAINT `livestreams_ibfk_1` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`facility_id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`facility_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`facility_id`);

--
-- Constraints for table `mon_times`
--
ALTER TABLE `mon_times`
  ADD CONSTRAINT `mon_times_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `sat_times`
--
ALTER TABLE `sat_times`
  ADD CONSTRAINT `sat_times_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `sun_times`
--
ALTER TABLE `sun_times`
  ADD CONSTRAINT `sun_times_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `thu_times`
--
ALTER TABLE `thu_times`
  ADD CONSTRAINT `thu_times_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `training_times`
--
ALTER TABLE `training_times`
  ADD CONSTRAINT `training_times_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `tue_times`
--
ALTER TABLE `tue_times`
  ADD CONSTRAINT `tue_times_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `wed_times`
--
ALTER TABLE `wed_times`
  ADD CONSTRAINT `wed_times_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
