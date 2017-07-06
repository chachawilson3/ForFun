-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2017 at 06:12 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dirtbikes`
--

-- --------------------------------------------------------

--
-- Table structure for table `dirtbike_rentals`
--

CREATE TABLE `dirtbike_rentals` (
  `dirtbike_id` int(11) NOT NULL,
  `dirtbike_make` varchar(30) DEFAULT NULL,
  `dirtbike_motor_size` int(11) DEFAULT NULL,
  `rental_id` int(11) DEFAULT NULL,
  `dirtbike_model` varchar(30) DEFAULT NULL,
  `dirtbike_year` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dirtbike_rentals`
--

INSERT INTO `dirtbike_rentals` (`dirtbike_id`, `dirtbike_make`, `dirtbike_motor_size`, `rental_id`, `dirtbike_model`, `dirtbike_year`, `price`) VALUES
(1, 'KTM', 250, NULL, NULL, 2011, 50),
(2, 'kawasaki', NULL, NULL, '250', 2012, 50),
(3, 'honda', 250, NULL, 'crf', 2012, 75),
(4, 'yamaha', 250, NULL, 'yz', 2010, 85);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(30) DEFAULT NULL,
  `number_of_tracks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `number_of_tracks`) VALUES
(1, 'vermont', NULL),
(2, 'arizona', NULL),
(3, 'colorado', NULL),
(4, 'new mexico', NULL),
(5, 'washington', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `member_name_first` varchar(30) DEFAULT NULL,
  `member_name_last` varchar(30) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `dob` date NOT NULL,
  `membership_color` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_name_first`, `member_name_last`, `street`, `city`, `zip`, `email`, `dob`, `membership_color`, `password`, `username`) VALUES
(5, 'charlie', 'Wilson', '57 loomis street #1', 'burlington', 5401, 'charliewilsn333@gmail.com', '1993-02-26', 'Pro membership', '$2y$10$qjO5bKxBJR/IPtRCnxR51e9', 'chacha'),
(6, 'Charles', 'Wilson', '57 loomis street #1', 'burlington', 5401, 'charliewilsn333@gmail.com', '1993-02-26', 'Pro membership', '$2y$10$xkkfdH2uCp/JnFdJYYjVZOe', 'charlie'),
(7, 'Charles', 'Wilson', '57 loomis street #1', 'burlington', 5401, 'charliewilsn333@gmail.com', '1993-02-26', 'Pro membership', '$2y$10$UWGb0yDnS8.XkXJi1TpkrOc', 'hello'),
(8, 'Charles', 'Wilson', '57 loomis street #1', 'burlington', 5401, 'charliewilsn333@gmail.com', '1993-02-26', 'Pro membership', '$2y$10$PezhS/reJwBE/tzuSaiEDuK', 'poop');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `rental_id` int(11) NOT NULL,
  `availability` varchar(18) DEFAULT NULL,
  `rental_start_date` date DEFAULT NULL,
  `rental_return_date` date DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`rental_id`, `availability`, `rental_start_date`, `rental_return_date`, `member_id`) VALUES
(1, NULL, '2017-06-07', '2017-07-08', NULL),
(2, NULL, '2017-06-07', '2017-07-08', NULL),
(3, NULL, '2015-02-26', '2017-07-08', NULL),
(4, NULL, '2017-02-26', '2017-05-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `track_name` varchar(30) DEFAULT NULL,
  `track_skill_level` varchar(30) DEFAULT NULL,
  `track_type` varchar(30) DEFAULT NULL,
  `track_length` varchar(30) DEFAULT NULL,
  `rental_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`track_name`, `track_skill_level`, `track_type`, `track_length`, `rental_id`, `location_id`, `price`) VALUES
('mudders track', 'intermediate', 'muddy', '2.5 miles', 1, 1, 150),
('pro track', 'expert', 'groomed', '3 miles', 2, 2, 500),
('sandy uphill track', 'expert', 'sandy', '5 miles', 3, 3, 180),
('freestyle track', 'beginner', 'groomed', '2 miles', 4, 4, 150),
('race track', 'intermediate', 'groomed', '3.5 miles', 5, 5, 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dirtbike_rentals`
--
ALTER TABLE `dirtbike_rentals`
  ADD UNIQUE KEY `XPKdirtbike_rentals` (`dirtbike_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD UNIQUE KEY `XPKlocation` (`location_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD UNIQUE KEY `XPKrentals` (`rental_id`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD UNIQUE KEY `XPKtracks` (`location_id`,`rental_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
