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

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_id`, `facility_name`, `facility_username`, `password`, `email_address`, `telephone`, `address`, `postcode`, `access_code`) VALUES
(1, 'Test facility (admin)', 'admin', 'admin', 'admin@test.com', '01752', 'Not a real address', 'XX1234XX', 'newFacility'),
(2, 'new facility', 'new_facility', 'password', 'newfacility@gmail.com', '01752', 'Address stated', 'ZZ1234ZZ', 'testAccess'),
(3, 'sql insert statement test', 'SQLTest', 'password', 'sql@gmail.com', '01752', 'Uh', 'AA12AA', 'sqlTestAccess'),
(4, 'First Test', 'firsttest', 'firsttest', 'firsttest@test.com', '01752', 'First Test Street', 'AB12CD', 'firsttest'),
(5, 'Second Test', 'secondtest', '$2y$10$8LbATAzM/Jy2qLp2p9EsS.zna2MVQus4NoeysJBhAreT/7vGYVDSq', 'secondtest@test.com', '01752', 'Second Test Street', 'AB12CD', 'second-test'),
(6, 'Third Test', 'thirdtest', '$2y$10$/5Qn1AEjGnQ7Vz9AN.AjHucf7YxEyW..x4q6i9J3f3FBM6wArbI8y', 'thirdtest@test.com', '01752', 'Third Test Street', 'AB12CD', 'thirdtest'),
(7, 'Final Test Changed', 'finaltest', '$2y$10$.FgsgffBVC/5rKHxrtWp1OswlKoHZXdCFvotE6RzrQF7fc.exYtaG', 'finaltest@test.com', '01752 123456', 'Testing Street, Plymouth', 'AB1 2CD', 'finaltestaccess'),
(8, 'Error Test', 'errortest', '$2y$10$.FgsgffBVC/5rKHxrtWp1OswlKoHZXdCFvotE6RzrQF7fc.exYtaG', 'errortest@test.com', '01752', 'Error test street', 'ET11TE', 'errortest');

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

--
-- Dumping data for table `livestreams`
--

INSERT INTO `livestreams` (`facility_id`, `livestream_id`, `livestream_title`, `livestream_link`, `livestream_notes`) VALUES
(7, 31, 'Test A', 'ZZPPj83eqKw', ''),
(7, 32, 'Test B', 'UPCCj83zqKwq', ''),
(7, 35, 'Video demonstration', 'LRHmWbyVlOo', '');

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

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`facility_id`, `member_id`, `member_username`, `password`, `email_address`, `first_name`, `last_name`, `date_of_birth`, `gender`, `status`) VALUES
(1, 1, 'firstUser', 'password', 'first@test.com', 'First', 'User', '2020-11-06', 'male', 'pending'),
(1, 2, 'secondUser', 'password123', 'second@test.com', 'Second', 'User', '2020-11-06', 'female', 'active'),
(7, 3, 'thirdUser', 'password3', 'third@test.com', 'Third', 'User', NULL, NULL, 'active'),
(7, 4, 'newUser', 'password', 'newuser@test.com', 'New', 'User', NULL, 'male', 'declined'),
(7, 6, 'fourthUser', '$2y$10$.FgsgffBVC/5rKHxrtWp1OswlKoHZXdCFvotE6RzrQF7fc.exYtaG', 'fourthuser@test.com', 'Fourth', 'User', NULL, 'female', 'declined'),
(7, 7, 'fifthUser', '$2y$10$.FgsgffBVC/5rKHxrtWp1OswlKoHZXdCFvotE6RzrQF7fc.exYtaG', 'fifthuser@test.com', 'Fifth', 'User', '2020-01-01', 'male', 'pending'),
(7, 8, 'sixthUser', '$2y$10$.FgsgffBVC/5rKHxrtWp1OswlKoHZXdCFvotE6RzrQF7fc.exYtaG', 'sixthuser@test.com', 'Sixth', 'User', '2020-12-24', 'female', 'inactive'),
(7, 9, 'seventhUser', '$2y$10$.FgsgffBVC/5rKHxrtWp1OswlKoHZXdCFvotE6RzrQF7fc.exYtaG', 'seventhuser@test.com', 'Seventh', 'User', '2020-12-23', 'male', 'active'),
(7, 10, 'eighthuser', '$2y$10$tjqe6zf7IVdXHZOr0VmCxuOWmhqzbER.adXZuCs4GZbHhYefLcrPO', 'eighthuser@test.com', 'Eighth', 'User', '2021-02-10', 'male', 'active');

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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`facility_id`, `message_id`, `message_title`, `urgency_level`, `message_notes`) VALUES
(1, 1, 'New message', 'low', 'Message\'s notes'),
(1, 2, 'Another message', 'urgent', 'Some more notes'),
(2, 3, 'Message from new facility', 'low', 'Notes?????'),
(7, 5, 'Low urgency message (1)', 'low', 'Testing low urgency.'),
(7, 6, 'Medium urgency message (2)', 'medium', 'Testing medium urgency.'),
(7, 7, 'Urgent message (3)', 'urgent', 'Testing high urgency message.'),
(7, 13, 'New message', 'low', 'This is a test');

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

--
-- Dumping data for table `mon_times`
--

INSERT INTO `mon_times` (`access_id`, `member_id`, `start_time`, `end_time`) VALUES
(1, 9, '09:00:00', '10:45:00'),
(2, 9, '17:00:00', '18:10:00'),
(3, 10, '09:00:00', '10:45:00');

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

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`member_id`, `member_status`) VALUES
(1, 'pending'),
(2, 'pending'),
(3, 'accepted');

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

--
-- Dumping data for table `training_times`
--

INSERT INTO `training_times` (`member_id`, `nine_am`, `ten_am`, `eleven_am`, `twelve_pm`, `one_pm`, `two_pm`, `three_pm`, `four_pm`, `five_pm`, `six_pm`, `seven_pm`, `eight_pm`) VALUES
(7, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
(9, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0),
(10, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
  MODIFY `facility_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fri_times`
--
ALTER TABLE `fri_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `livestreams`
--
ALTER TABLE `livestreams`
  MODIFY `livestream_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mon_times`
--
ALTER TABLE `mon_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sat_times`
--
ALTER TABLE `sat_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sun_times`
--
ALTER TABLE `sun_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thu_times`
--
ALTER TABLE `thu_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tue_times`
--
ALTER TABLE `tue_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wed_times`
--
ALTER TABLE `wed_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
