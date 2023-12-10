-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2022 at 12:44 PM
-- Server version: 10.3.29-MariaDB-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safegaze_database`
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
(1, '3xchaps-facility', '3xchaps', '$2y$10$UcSCO0gVXB3cI8XeBeAeOeKbYTus33KrKOepYPSFQXGHQdItmkGoS', '3xchaps@gmail.com', '07926839321', '35 bath road', 'EX27QR', '3xchaps-access'),
(2, 'Exeter Trampoline Centre', 'Exeter Trampoline Centre', '$2y$10$S/WYlpVuXaHOvqPI37OaoOoA7OdYKq276ZrT8gyIh8OPE9Ga1l3SG', 'info@exetertrampoline.co.uk', '01392366367', '6 Apple Lane', 'EX2 5GL', '#teamETA');

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

--
-- Dumping data for table `fri_times`
--

INSERT INTO `fri_times` (`access_id`, `member_id`, `start_time`, `end_time`) VALUES
(1, 2, '10:00:00', '16:00:00'),
(2, 6, '10:30:00', '11:30:00'),
(4, 8, '16:00:00', '18:45:00'),
(5, 10, '17:00:00', '19:00:00'),
(8, 15, '17:30:00', '18:45:00'),
(9, 16, '16:00:00', '18:00:00'),
(10, 23, '18:30:00', '20:30:00'),
(11, 35, '18:25:00', '20:30:00'),
(12, 37, '16:00:00', '18:00:00'),
(13, 39, '16:00:00', '18:00:00'),
(14, 14, '16:00:00', '18:45:00');

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
(1, 2, 'ETA livestream', 'NA0U-KiNLas', ''),
(2, 11, 'ETC', 'xJ_qlIPGCqU', ''),
(2, 12, 'ETA livestream', 'WbkUd4tTV68', '');

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
(2, 1, 'Polly Buzza-Johns', '$2y$10$sfdzLHCHZEGuMCF8xKl/BeyauqJZgYhs..prqsj7jUSxGfiFW38.G', 'polly@exetertrampoline.co.uk', 'Polly', 'Buzza-Johns', '1991-05-25', 'female', 'active'),
(1, 2, 'reecestudent', '$2y$10$9FI.jEKaxccCOzI.nxT6L.fkIaV2ZY.YiQOLBpkyNgayPfhsysp7.', 'reece.davies@students.plymouth.ac.uk', 'Reece', 'Davies', '1999-03-29', 'male', 'active'),
(2, 3, 'Rlpryce', '$2y$10$SBF/RpA59owiObnzHjlQ.e/pgxpb4mtEva86Ly8EwvfE2CVjAVEeO', 'rlpryce@ymail.com', 'Rebecca', 'Pryce', '1979-06-04', 'female', 'active'),
(2, 4, 'nikimurch@hotmail.co.uk', '$2y$10$HRWhXUkShEGKQxGughEK8eszppgW8uA1UQwMKfcuOuTs70cDLzhri', 'nikimurch@hotmail.co.uk', 'Nicola ', 'Murch ', '1976-06-21', 'female', 'active'),
(2, 5, 'Pops', '$2y$10$hPZDKYrx.Np.j.m.vq8zLeifd/btopQdyDH2CagFCv.pybWkGWVQq', 'lizzieepl@aol.co.uk', 'Lizzie', 'Litto', '1978-08-31', 'Gender', 'active'),
(2, 6, 'Stacey80', '$2y$10$Q8y/cSKvq6yXn7l44AwUj.zkCQaXUCA3fugSuo0ZQpBTE4UMFiqSO', 'staceydart@hotmail.co.uk', 'Stacey', 'Dart', '2021-03-13', 'female', 'active'),
(2, 7, 'EVRusso', '$2y$10$I7kbIq7Hv3kY2YgiEgyrmOTzk6uDzSBSqNXhLBVVk/r221I00Jla.', 'emma@kinderkinder.co.uk', 'Hettie', 'Russo', '2017-06-12', 'female', 'active'),
(2, 8, 'Emily ', '$2y$10$/yz8tSry5MpLqWXAP1Kg9e8kJ48ds6awKqMtCLN8e7cfWopDZLmei', 'emilysheppy@gmail.com', 'Emily ', 'Shepherd ', '1994-02-05', 'female', 'active'),
(2, 9, 'Jordans', '$2y$10$m3gpgcE8zSLCX8pEshFs2.n06Zws5SYosWepvqyqo6BUV2K/LUNnq', 'fiona_r_anderson@hotmail.com', 'Fiona', 'Anderson', '1982-02-04', 'female', 'active'),
(2, 10, 'MAddai', '$2y$10$9Q3INRjYoaD3VNvemNqqiOb1ofFGKjyjbolQw5LnN0xG2gGWBln5q', 'michelleaddai@hotmail.co.uk', 'Michelle', 'Addai', '1984-01-05', 'female', 'active'),
(2, 11, 'Ej', '$2y$10$QEj3WsTGN/Jp4aSYVDfibuMijGuoyrWDq1E8OKWniyNnlrrZtjs7u', 'emmacoombe@hotmail.co.uk', 'Emma', 'Johnston ', '1981-05-29', 'female', 'inactive'),
(2, 12, 'ramsdalesteve', '$2y$10$uLApV9tFMZmIM6VgOtEEbuzxrXTv/RzlRQQv2tAbRgaid1XfBDjw.', 'ramsdalesteve@hotmail.com', 'Steve', 'Ramsdale', '1980-07-08', 'male', 'active'),
(2, 13, 'Squeak', '$2y$10$g1F0ZRF/4PcKvGrvpl0PX.4FkpWKVfWXWT5tLzoschefFY0YnEvuG', 'mbygate@hotmail.com', 'Maria', 'Shearer', '1967-07-12', 'female', 'active'),
(2, 14, 'Ruthy', '$2y$10$BZVpVV4rOuKIRrTpmCIEJeFsK8XuilySUIPM5jcOcHLN8ByAOpO.m', 'ruthyluxton@yahoo.co.uk', 'Ruthy', 'Luxton', '1977-12-26', 'Gender', 'active'),
(2, 15, 'junglejo_uk@yahoo.co.uk', '$2y$10$LsZZ0g7K7LgFco8Bv7vDluL3ZItxA6TwD/2A1az2/0ErIvbv43Io2', 'junglejo_uk@yahoo.co.uk', 'Joeann', 'Lovell', '1979-03-18', 'female', 'active'),
(2, 16, 'Beadis', '$2y$10$sB6ItCCKN9S14PMrgS1JeexORDjetCHHQ2pGN4P0Jn1xZ5tLJ4G/u', 'anna_disney@hotmail.com', 'Beatrox', 'Disney', '2013-02-09', 'female', 'active'),
(2, 17, 'NigePaul', '$2y$10$Ml2x49p1LeefFsAMOW4G.u53PpvebHF0trS4ShJHybSGfOVWCq/ZS', 'nigedpaul74@gmail.com', 'Nigel', 'Paul', '1974-06-18', 'male', 'active'),
(2, 18, 'mimo', '$2y$10$qBil4NGTV4Q.uvx7bR7eteyBePytQKrSeUSRRaNEK7rbwsvc588Cq', 'moragandmichael@gmail.com', 'Morag', 'Dawson', '1974-08-05', 'female', 'active'),
(2, 19, 'L Turner ', '$2y$10$QAAhBpUhcYPUXMyX8nHH4ewjbpx8bM1x8p1VolV/d8xoMzMW5kG/a', 'lbhoole@yahoo.com', 'Laura', 'Turner', '1982-07-08', 'female', 'inactive'),
(2, 20, 'KellyJ', '$2y$10$rnWabV9jmz0tQ0/UV.sOPeRWga8YwuTNhPJ8VDfPxzdhLqCdDsT9O', 'kellythomas64681@hotmail.com', 'Kelly', 'Jones', '1985-04-10', 'Gender', 'active'),
(2, 21, 'Ca225', '$2y$10$UdFY8Eb4Cp.eoTkPAr3A3OC2nqfc3Hlf6JlRTgvEHCkdAiK.8xpIm', 'carrieatkins225@hotmail.com', 'Carrie', 'Atkins ', '1987-08-20', 'female', 'active'),
(2, 22, 'Dmcneill', '$2y$10$eY3q.DGDUrcA4Q80K9KMN.ARgmlp9njoUj1f03tbg5PvmUXNvfA2y', 'daniellewedgery@hotmail.com', 'Danielle', 'McNeill', '1985-04-25', 'female', 'active'),
(2, 23, 'Liz', '$2y$10$dCIIqxaT8wO.3UdSGh81E.h4/oT7vM2fwgawJbYzWoe8OCjvdFDOy', 'lbrazier68@hotmail.co.uk', 'Liz', 'Shackleton', '1968-02-08', 'female', 'active'),
(2, 24, 'petch1977@sky.com', '$2y$10$81Gy99H6q4x.E8bugqBVu.2EA4nrBfW/gz9u/o6vSXUk7S2y5gqUi', 'petch1977@sky.com', 'Peter', 'Fleming', '1977-08-09', 'male', 'active'),
(2, 25, 'Lucyjbarrett', '$2y$10$yYsdQTz0o4aBrZRH792/pOAwQHNCj9COg2EEcmaQFMjFj.k4jZksm', 'lucyjbarrett@hotmail.com', 'Lucy', 'Gill', '1979-03-24', 'male', 'inactive'),
(2, 26, 'michaela.potter@icloud.co', '$2y$10$V33ZIfIHoZz5EeD7CnDXaeSg5bBi.zCFjLAnVwYzaHZChzHI4u2xS', 'michaela.potter@icloud.com', 'Toby', 'Potter', '2006-06-09', 'male', 'active'),
(2, 27, 'avabird', '$2y$10$GH5iC7MjCro12W85i2hzfesAIVtuMRiJ6IAOZvWXGPKbtVEpptOja', 'kieron@worldwidewanders.com', 'Ava', 'Bird', '2015-08-12', 'female', 'active'),
(2, 28, 'MontyBates', '$2y$10$x8zlnTB4GdGdb3FiFol1t.zDOu1lSfv0VF39EcolhP3GacRWIDvNG', 'Skelatalpenguin@googlemail.com', 'Autumn', 'bates', '1986-11-25', 'female', 'active'),
(2, 29, 'laurenj9@hotmail.co.uk', '$2y$10$KWlhZYwq6iKpPeRq2Rk7fOHitQCLCNJUmegWUNUZoMT2URwbEStSW', 'laurenj9@hotmail.co.uk', 'Lauren', 'Tyrer', '1987-09-09', 'female', 'active'),
(2, 30, 'Alfie.cunningham', '$2y$10$GpfbcZHHgsezkuruswD0ZOgL21uRgpS74SsZrFV/QDX6ZOGGYzr92', 'cboobyer@doctors.org.uk', 'Alfie', 'Cunningham', '2016-08-06', 'male', 'active'),
(2, 31, 'hannah.g07@hotmail.co.uk', '$2y$10$kqz9EqqtVYq2hALAFuEgVOHCAvOSZ8OGapVL25iK60Y2qrH91wAWS', 'hannah.g07@hotmail.co.uk', 'Hannah ', 'Gulliford', '1991-04-09', 'female', 'inactive'),
(2, 32, 'JoannaMay', '$2y$10$XCScN4a3/jxK2.PSvh1M7.5B9ff2Y/UDBfxBc8lAGPVJKgHQ6aoGG', 'joanna.may.1974@gmail.com', 'Joanna ', 'May ', '1974-01-05', 'female', 'active'),
(2, 33, 'Chr1sp', '$2y$10$CJHOplM0gcbDHXh3NVWxz.GnPgGdYrn.Q.99pKuTehFKbji3BSu3S', 'Cmpollard@hotmail.com', 'Chris ', 'Pollard ', '1977-10-14', 'male', 'active'),
(2, 34, 'Donnavinn', '$2y$10$ntPXsZvTVhyP1dy7eLg.NeqGRvtf9D1CYkE/DLwUd4u.sjBcmi6Zi', 'dvinnicombe123@rocketmail.com', 'Donna', 'Vinnicombe', '1984-08-11', 'female', 'active'),
(2, 35, 'Lizzie', '$2y$10$TjP7CkCMwrhp.sTCq.31oOodNykx6dX.j89m8.mhOtU0N7oUgl2CO', 'lizadlem@hotmail.co.uk', 'Elizabeth', 'Adlem', '1979-08-26', 'female', 'active'),
(2, 36, 'Laura P', '$2y$10$zdESi1jS0xts2.lNwnQ3kOmnfzf8rmWMAHCgpraOPey5p0LY.44dq', 'laura.a.jewell@hotmail.co.uk', 'Laura', 'Pattison', '1986-02-28', 'female', 'active'),
(2, 37, 'lamaraseldon', '$2y$10$3pLlxrriBzh03f1cIhIx/etXjwwfncTnrlKvLGOtiSddryTZbRLhy', 'lammywammy@hotmail.com', 'lamara', 'seldon', '0000-00-00', 'female', 'active'),
(2, 38, 'EmilyWare', '$2y$10$eL52OYl8l/UvnyN/kJ5Hr.6AGGIkxrhA14x.9VvVKlp0Kxfam.eoG', 'rebecca-37@hotmail.co.uk', 'Emily ', 'Ware', '2015-05-18', 'Gender', 'active'),
(2, 39, 'JP0', '$2y$10$d5eficDLTcO6tWyNOu1kDO/k5c406K0gr6ACSpJJ3U3HbhLRiFglm', 'jadepoulton30@hotmail.com', 'Jade', 'poulton', '1992-04-30', 'female', 'active'),
(2, 40, 'AnnikaA', '$2y$10$PoI9WTRbtMU4Hmjjmne.2uRMGnfOvQx9FLZXLIDhdAVtE1evy1F4q', 'tigger_annika@hotmail.com', 'Annika', 'Amoako', '1984-10-19', 'female', 'active'),
(2, 41, 'Hollie-Bea', '$2y$10$sT96Knl4Kse253PbE5fGOuix3Ry/FWLUIwlYMC52WT4Nutsdqdt8u', 'hollielouis07@hotmail.co.uk', 'Hollie', 'Mackenzie', '1982-12-22', 'female', 'active'),
(2, 42, 'Hollie-Bea223', '$2y$10$1RpBYC/517JqdFElXsLcF.K4u2alIP8Io/sDw03faBE7QopUJKkIG', 'kmackenzie63@yahoo.co.uk', 'Hollie', 'Mackenzie', '1982-12-22', 'female', 'declined');

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

--
-- Dumping data for table `mon_times`
--

INSERT INTO `mon_times` (`access_id`, `member_id`, `start_time`, `end_time`) VALUES
(5, 4, '17:00:00', '20:30:00'),
(6, 7, '15:40:00', '16:55:00'),
(7, 3, '17:30:00', '18:45:00'),
(9, 13, '17:00:00', '19:00:00'),
(11, 15, '17:30:00', '18:45:00'),
(12, 21, '16:00:00', '18:00:00'),
(13, 2, '17:00:00', '19:00:00'),
(16, 32, '18:25:00', '19:40:00'),
(17, 36, '16:35:00', '17:50:00'),
(18, 39, '16:00:00', '18:00:00'),
(19, 41, '17:30:00', '20:30:00');

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

--
-- Dumping data for table `sat_times`
--

INSERT INTO `sat_times` (`access_id`, `member_id`, `start_time`, `end_time`) VALUES
(1, 4, '09:00:00', '10:45:00'),
(2, 13, '09:00:00', '11:00:00'),
(3, 17, '10:30:00', '12:00:00'),
(5, 23, '09:00:00', '11:00:00'),
(6, 24, '09:00:00', '10:15:00'),
(7, 26, '11:45:00', '13:55:00'),
(8, 34, '11:45:00', '13:55:00'),
(9, 41, '10:30:00', '13:00:00');

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

--
-- Dumping data for table `thu_times`
--

INSERT INTO `thu_times` (`access_id`, `member_id`, `start_time`, `end_time`) VALUES
(1, 2, '10:00:00', '16:00:00'),
(2, 5, '17:30:00', '18:45:00'),
(3, 4, '17:00:00', '20:30:00'),
(4, 13, '18:30:00', '20:30:00'),
(5, 17, '17:00:00', '20:30:00'),
(6, 18, '18:30:00', '19:30:00'),
(7, 23, '17:00:00', '20:30:00'),
(8, 28, '16:35:00', '17:50:00'),
(9, 33, '17:30:00', '18:30:00'),
(10, 41, '17:30:00', '20:30:00');

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

--
-- Dumping data for table `tue_times`
--

INSERT INTO `tue_times` (`access_id`, `member_id`, `start_time`, `end_time`) VALUES
(1, 2, '17:00:00', '19:00:00'),
(2, 16, '16:00:00', '18:00:00'),
(3, 27, '17:30:00', '18:30:00'),
(4, 29, '16:30:00', '17:30:00'),
(5, 30, '16:30:00', '17:30:00'),
(6, 37, '16:00:00', '18:00:00'),
(7, 38, '17:30:00', '18:40:00'),
(8, 8, '16:00:00', '18:00:00'),
(9, 9, '15:40:00', '16:50:00'),
(10, 12, '16:35:00', '17:50:00'),
(11, 14, '16:00:00', '18:00:00'),
(12, 17, '17:00:00', '20:30:00'),
(13, 20, '17:30:00', '18:30:00'),
(14, 41, '17:30:00', '20:30:00'),
(15, 40, '17:30:00', '18:40:00');

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
-- Dumping data for table `wed_times`
--

INSERT INTO `wed_times` (`access_id`, `member_id`, `start_time`, `end_time`) VALUES
(3, 10, '16:00:00', '18:00:00'),
(5, 13, '17:00:00', '20:30:00'),
(6, 21, '16:00:00', '18:00:00'),
(7, 22, '15:40:00', '16:55:00'),
(8, 2, '17:00:00', '19:00:00'),
(9, 41, '17:30:00', '20:30:00');

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
  MODIFY `facility_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fri_times`
--
ALTER TABLE `fri_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `livestreams`
--
ALTER TABLE `livestreams`
  MODIFY `livestream_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mon_times`
--
ALTER TABLE `mon_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sat_times`
--
ALTER TABLE `sat_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sun_times`
--
ALTER TABLE `sun_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thu_times`
--
ALTER TABLE `thu_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tue_times`
--
ALTER TABLE `tue_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wed_times`
--
ALTER TABLE `wed_times`
  MODIFY `access_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
