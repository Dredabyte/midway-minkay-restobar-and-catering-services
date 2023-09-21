-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2023 at 01:53 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = '+08:00';



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rrs` or Resort Reservation System by AELDRED JOHN 
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation`
--

CREATE TABLE IF NOT EXISTS `accomodation` (
  `accomodation_id` int(11) NOT NULL AUTO_INCREMENT,
  `accomodation_name` varchar(30) NOT NULL,
  `accomodation_description` varchar(90) NOT NULL,
  PRIMARY KEY (`accomodation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tblaccomodation`
--

-- INSERT INTO `tblaccomodation` (`ACCOMID`, `ACCOMODATION`, `ACCOMDESC`) VALUES
-- (12, 'Standard Room', 'max 22hrs.'),
-- (13, 'Travelers Time', 'max of 12hrs.'),
-- (15, 'Bayanihan Room', 'max 22hrs.');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE IF NOT EXISTS `amenities` (
  `amenities_id` int(11) NOT NULL AUTO_INCREMENT,
  `amenities_name` varchar(125) NOT NULL,
  `amenities_description` varchar(125) NOT NULL,
  `amenities_image` varchar(255) NOT NULL,
  PRIMARY KEY (`amenities_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `amenities`
--


-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `guest` (
  `guest_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `photo` varchar(125) NOT NULL,
  PRIMARY KEY (`guest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `tblguest`
--

-- INSERT INTO `tblguest` (`GUESTID`, `REFNO`, `G_FNAME`, `G_LNAME`, `G_CITY`, `G_ADDRESS`, `DBIRTH`, `G_PHONE`, `G_NATIONALITY`, `G_COMPANY`, `G_CADDRESS`, `G_TERMS`, `G_UNAME`, `G_PASS`, `ZIP`, `LOCATION`) VALUES
-- (75, 0, 'Janry', 'Octavio', 'Kabankalan City', 'Coloso Street', '1989-11-07', '09123586545', 'Filipino', 'Snappy Trends', 'Coloso Street', 1, 'customer', 'b39f008e318efd2bb988d724a161b61c6909677f', 6111, 'guest/photos/hqdefault.jpg'),
-- (76, 0, 'Junjie', 'Villanueva', '', 'Coloso Street', '2015-10-15', '09123586545', 'Filipino', 'Snappy Trends', 'Coloso Street', 1, 'junjie', '84c73452a1e22cdaa2964e6302f1883e13cc2715', 6111, '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_date` datetime NOT NULL DEFAULT current_timestamp(),
  `confirmation_code` varchar(30) NOT NULL,
  `reference_number` varchar(50) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `msg_view` tinyint(1) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`payment_id`),
  UNIQUE KEY `confirmation_code` (`confirmation_code`),
  KEY `guest_id` (`guest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblpayment`
--

-- INSERT INTO `tblpayment` (`SUMMARYID`, `TRANSDATE`, `CONFIRMATIONCODE`, `PQTY`, `GUESTID`, `SPRICE`, `MSGVIEW`, `STATUS`) VALUES
-- (1, '2016-02-17 10:28:20', 'jmrtfpit', 2, 75, 1975, 1, 'Checkedout'),
-- (2, '2016-02-17 02:54:11', '865znauy', 2, 75, 2175, 0, 'Checkedout'),
-- (3, '2016-02-17 04:11:07', 'wttpna26', 1, 75, 725, 0, 'Checkedin'),
-- (4, '2016-02-22 09:07:51', 'ipqib4pw', 1, 76, 615, 1, 'Checkedout'),
-- (5, '2016-02-22 09:33:00', 'd6ktnesr', 2, 76, 1720, 1, 'Checkedin'),
-- (6, '2016-02-22 09:38:33', 'k0vyxcvc', 2, 76, 1340, 1, 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `confirmation_code` varchar(50) NOT NULL,
  `trans_date` datetime NOT NULL DEFAULT current_timestamp(),
  `room_id` int(11) NOT NULL,
  `arrival` datetime NOT NULL,
  `departure` datetime NOT NULL,
  `r_price` double NOT NULL,
  `guest_id` int(11) NOT NULL,
  `purpose` varchar(30) NOT NULL,
  `status` varchar(11) NOT NULL,
  `book_date` datetime NOT NULL,
  `remarks` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `room_id` (`room_id`),
  KEY `guest_id` (`guest_id`),
  KEY `confirmation_code` (`confirmation_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tblreservation`
--

-- INSERT INTO `tblreservation` (`RESERVEID`, `CONFIRMATIONCODE`, `TRANSDATE`, `ROOMID`, `ARRIVAL`, `DEPARTURE`, `RPRICE`, `GUESTID`, `PRORPOSE`, `STATUS`, `BOOKDATE`, `REMARKS`, `USERID`) VALUES
-- (1, 'jmrtfpit', '2016-02-17', 16, '2016-02-16 00:00:00', '2016-02-17 00:00:00', 725, 75, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
-- (2, 'jmrtfpit', '2016-02-17', 15, '2016-02-16 00:00:00', '2016-02-17 00:00:00', 1250, 75, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
-- (3, '865znauy', '2016-02-17', 16, '2016-02-17 00:00:00', '2016-02-19 00:00:00', 1450, 75, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
-- (4, '865znauy', '2016-02-17', 12, '2016-02-17 00:00:00', '2016-02-18 00:00:00', 725, 75, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
-- (5, 'wttpna26', '2016-02-17', 16, '2016-02-17 00:00:00', '2016-02-17 00:00:00', 725, 75, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
-- (6, 'ipqib4pw', '2016-02-22', 11, '2016-02-22 00:00:00', '2016-02-22 00:00:00', 615, 76, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
-- (7, 'd6ktnesr', '2016-02-22', 22, '2016-02-22 00:00:00', '2016-02-23 00:00:00', 995, 76, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
-- (8, 'd6ktnesr', '2016-02-22', 16, '2016-02-22 00:00:00', '2016-02-23 00:00:00', 725, 76, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
-- (9, 'k0vyxcvc', '2016-02-22', 11, '2016-02-22 00:00:00', '2016-02-23 00:00:00', 615, 76, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
-- (10, 'k0vyxcvc', '2016-02-22', 12, '2016-02-25 00:00:00', '2016-02-26 00:00:00', 725, 76, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_num` int(11) NOT NULL,
  `accomodation_id` int(11) NOT NULL,
  `room` varchar(30) NOT NULL,
  `room_description` varchar(255) NOT NULL,
  `num_person` int(11) NOT NULL,
  `price` double NOT NULL,
  `room_image` varchar(255) NOT NULL,
  PRIMARY KEY (`room_id`),
  KEY `accomodation_id` (`accomodation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tblroom`
--

-- INSERT INTO `tblroom` (`ROOMID`, `ROOMNUM`, `ACCOMID`, `ROOM`, `ROOMDESC`, `NUMPERSON`, `PRICE`, `ROOMIMAGE`) VALUES
-- (11, 3, 12, 'Wing A', 'without TV', 1, 615, 'rooms/Clash-of-Clans-Town-Hall-10-farm-walls.jpg'),
-- (12, 3, 12, 'Wing A', 'Without TV', 2, 725, 'rooms/Chrysanthemum.jpg'),
-- (13, 3, 13, 'Wing A', 'Without TV', 1, 445, 'rooms/Desert.jpg'),
-- (14, 4, 13, 'Wing A', 'Without TV', 2, 495, 'rooms/Desert.jpg'),
-- (15, 1, 15, 'Wing A', 'Without TV | for groups - minimum of 5 pax | 250php per person', 5, 1250, 'rooms/Hydrangeas.jpg'),
-- (16, 3, 12, 'Wing B & Ground Floor', 'With TV', 1, 725, 'rooms/Jellyfish.jpg'),
-- (17, 3, 12, 'Wing B & Ground Floor', 'With TV', 2, 835, 'rooms/Hydrangeas.jpg'),
-- (18, 3, 13, 'Wing B & Ground Floor', 'With TV', 1, 555, 'rooms/Jellyfish.jpg'),
-- (19, 3, 13, 'Wing B & Ground Floor', 'Without TV', 2, 605, 'rooms/Jellyfish.jpg'),
-- (20, 3, 12, 'Wing B & Ground Floor', 'Twin Beds with TV', 2, 845, 'rooms/Koala.jpg'),
-- (21, 3, 13, 'Wing B & Ground Floor', 'Twin Beds with TV', 2, 675, 'rooms/Lighthouse.jpg'),
-- (22, 3, 12, 'RM 223', 'With TV & Hot and Cold Shower', 2, 995, 'rooms/Sunset.jpg'),
-- (23, 3, 13, 'RM 223', 'With TV & Hot and Cold Shower', 2, 895, 'rooms/Tulips.jpg'),
-- (24, 3, 12, 'RM 224', '2 Beds with TV & Hot and Cold Shower', 2, 1650, 'rooms/Water lilies.jpg'),
-- (25, 3, 13, 'RM 224', '2 Beds with TV & Hot and Cold Shower', 2, 1430, 'rooms/Winter.jpg'),
-- (26, 3, 12, 'RM 111', '1 double & single bed with Hot and Cold Shower', 2, 1350, 'rooms/Winter.jpg'),
-- (27, 3, 13, 'RM 111', '1 double & single bed with Hot and Cold Shower', 2, 1100, 'rooms/Koala.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE IF NOT EXISTS `useraccount` (
  `useraccount_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(90) NOT NULL,
  `role` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`useraccount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbluseraccount`
--

-- INSERT INTO `tbluseraccount` (`USERID`, `UNAME`, `USER_NAME`, `UPASS`, `ROLE`, `PHONE`) VALUES
-- (1, 'Anonymous', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 912856478);

--
-- Constraints for dumped tables
--

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

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`);