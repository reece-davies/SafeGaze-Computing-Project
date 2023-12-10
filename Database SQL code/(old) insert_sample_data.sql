--SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
--START TRANSACTION;
--SET time_zone = "+00:00";

INSERT INTO `access_codes` (`facility_id`, `access_code`) VALUES
(2, 'newFacility'),
(1, 'TestAccess');

-- --------------------------------------------------------

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_id`, `facility_name`, `facility_username`, `password`, `email_address`, `telephone`, `address`, `postcode`) VALUES
(1, 'Test facility (admin)', 'admin', 'admin', 'admin@test.com', '01752', 'Not a real address', 'XX1234XX'),
(2, 'new facility', 'new_facility', 'password', 'newfacility@gmail.com', '01752', 'Address stated', 'ZZ1234ZZ');

-- --------------------------------------------------------

--
-- Dumping data for table `livestreams`
--

INSERT INTO `livestreams` (`facility_id`, `livestream_id`, `livestream_title`, `livestream_link`, `livestream_notes`) VALUES
(1, 1, 'a', 'a', NULL),
(1, 2, 'b', 'b', 'b'),
(2, 3, 'c', 'c', NULL);

-- --------------------------------------------------------

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`facility_id`, `member_id`, `member_username`, `password`, `email_address`, `first_name`, `last_name`, `date_of_birth`, `gender`) VALUES
(1, 1, 'firstUser', 'password', 'first@gmail.com', 'first', 'user', '2020-11-06', 'male'),
(1, 2, 'secondUser', 'password123', 'second@gmail.com', 'second', 'user', '2020-11-06', 'female'),
(2, 3, 'thirdUser', 'password3', 'third@gmail.com', 'third', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`facility_id`, `message_id`, `message_title`, `urgency_level`, `message_notes`) VALUES
(1, 1, 'New message', 'low', 'Message\'s notes'),
(1, 2, 'Another message', 'urgent', 'Some more notes'),
(2, 3, 'Message from new facility', 'low', 'Notes?????');

-- --------------------------------------------------------

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`member_id`, `member_status`) VALUES
(1, 'pending'),
(2, 'pending'),
(3, 'accepted');

-- --------------------------------------------------------

--
-- Dumping data for table `training_times`
--

INSERT INTO `training_times` (`member_id`, `time_slot`) VALUES
(1, '12:00-13:00'),
(1, '13:00-14:00'),
(2, '12:00-13:00');
