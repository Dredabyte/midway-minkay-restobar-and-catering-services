-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 03:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midway_minkay_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation`
--

CREATE TABLE `accomodation` (
  `accomodation_id` int(11) NOT NULL,
  `accomodation_name` varchar(30) NOT NULL,
  `accomodation_description` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`accomodation_id`, `accomodation_name`, `accomodation_description`) VALUES
(12, 'Standard Room', 'max 22hrs and etc.'),
(13, 'Travelers Time', 'pang travelers jud syaa ayy'),
(15, 'Bayanihan Room', 'max 22hrs and etc.');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `amenities_id` int(11) NOT NULL,
  `amenities_name` varchar(125) NOT NULL,
  `amenities_description` varchar(125) NOT NULL,
  `amenities_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`amenities_id`, `amenities_name`, `amenities_description`, `amenities_image`) VALUES
(9, 'The bathrooms', 'with hot water showers', 'pics/bathroom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `city` varchar(90) NOT NULL,
  `address` varchar(90) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `company` varchar(90) NOT NULL,
  `company_address` varchar(90) NOT NULL,
  `terms` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `location` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `ref_no`, `firstname`, `lastname`, `city`, `address`, `birthdate`, `phone`, `nationality`, `company`, `company_address`, `terms`, `username`, `password`, `zip_code`, `location`) VALUES
(77, 0, 'Janry', 'Octavio', 'Kabankalan City', 'Coloso Street', '2023-08-22', '09123586545', 'Filipino', 'Snappy Trends', 'Coloso Street', 1, 'customer', 'b39f008e318efd2bb988d724a161b61c6909677f', 6111, '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `trans_date` datetime NOT NULL,
  `confirmation_code` varchar(30) NOT NULL,
  `reference_number` varchar(50) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `msg_view` tinyint(1) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `trans_date`, `confirmation_code`, `reference_number`, `p_qty`, `guest_id`, `price`, `msg_view`, `status`) VALUES
(7, '2023-08-24 14:40:48', 'jmrtfpit', 'asdasd32885469', 2, 77, 500, 1, 'Checkedout');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `confirmation_code` varchar(50) NOT NULL,
  `trans_date` date NOT NULL,
  `room_id` int(11) NOT NULL,
  `arrival` datetime NOT NULL,
  `departure` datetime NOT NULL,
  `r_price` double NOT NULL,
  `guest_id` int(11) NOT NULL,
  `purpose` varchar(30) NOT NULL,
  `status` varchar(11) NOT NULL,
  `book_date` datetime NOT NULL,
  `remarks` text NOT NULL,
  `useraccount_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `confirmation_code`, `trans_date`, `room_id`, `arrival`, `departure`, `r_price`, `guest_id`, `purpose`, `status`, `book_date`, `remarks`, `useraccount_id`) VALUES
(11, 'jmrtfpit', '2023-08-01', 22, '2023-08-20 19:09:08', '2023-08-24 19:09:08', 725, 77, 'Travel', 'Pending', '2023-08-27 19:09:08', 'sample only', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_num` int(11) NOT NULL,
  `accomodation_id` int(11) NOT NULL,
  `room` varchar(30) NOT NULL,
  `room_description` varchar(255) NOT NULL,
  `num_person` int(11) NOT NULL,
  `price` double NOT NULL,
  `room_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_num`, `accomodation_id`, `room`, `room_description`, `num_person`, `price`, `room_image`) VALUES
(11, 3, 12, 'Wing A', 'without TV', 1, 615, 'rooms/Clash-of-Clans-Town-Hall-10-farm-walls.jpg'),
(12, 3, 12, 'Wing A', 'Without TV', 2, 725, 'rooms/Chrysanthemum.jpg'),
(13, 3, 13, 'Wing A', 'Without TV', 1, 445, 'rooms/Desert.jpg'),
(14, 4, 13, 'Wing A', 'Without TV', 2, 495, 'rooms/Desert.jpg'),
(15, 1, 15, 'Wing A', 'Without TV | for groups - minimum of 5 pax | 250php per person', 5, 1250, 'rooms/Hydrangeas.jpg'),
(16, 3, 12, 'Wing B & Ground Floor', 'With TV', 1, 725, 'rooms/Jellyfish.jpg'),
(17, 3, 12, 'Wing B & Ground Floor', 'With TV', 2, 835, 'rooms/Hydrangeas.jpg'),
(18, 3, 13, 'Wing B & Ground Floor', 'With TV', 1, 555, 'rooms/Jellyfish.jpg'),
(19, 3, 13, 'Wing B & Ground Floor', 'Without TV', 2, 605, 'rooms/Jellyfish.jpg'),
(20, 3, 12, 'Wing B & Ground Floor', 'Twin Beds with TV', 2, 845, 'rooms/Koala.jpg'),
(21, 3, 13, 'Wing B & Ground Floor', 'Twin Beds with TV', 2, 675, 'rooms/Lighthouse.jpg'),
(22, 3, 12, 'RM 223', 'With TV & Hot and Cold Shower', 2, 995, 'rooms/Sunset.jpg'),
(23, 3, 13, 'RM 223', 'With TV & Hot and Cold Shower', 2, 895, 'rooms/Tulips.jpg'),
(24, 3, 12, 'RM 224', '2 Beds with TV & Hot and Cold Shower', 2, 1650, 'rooms/Water lilies.jpg'),
(25, 3, 13, 'RM 224', '2 Beds with TV & Hot and Cold Shower', 2, 1430, 'rooms/Winter.jpg'),
(26, 3, 12, 'RM 111', '1 double & single bed with Hot and Cold Shower', 2, 1350, 'rooms/Winter.jpg'),
(27, 3, 13, 'RM 111', '1 double & single bed with Hot and Cold Shower', 2, 1100, 'rooms/Koala.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `useraccount_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(90) NOT NULL,
  `role` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`useraccount_id`, `name`, `username`, `password`, `role`, `phone`) VALUES
(1, 'Anonymous', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', '09361878506');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD PRIMARY KEY (`accomodation_id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`amenities_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `confirmation_code` (`confirmation_code`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `guest_id` (`guest_id`),
  ADD KEY `confirmation_code` (`confirmation_code`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `accomodation_id` (`accomodation_id`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`useraccount_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodation`
--
ALTER TABLE `accomodation`
  MODIFY `accomodation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `amenities_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `useraccount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`accomodation_id`) REFERENCES `accomodation` (`accomodation_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
