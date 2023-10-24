-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 02:27 PM
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
  `accomodation_name` varchar(255) NOT NULL,
  `accomodation_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`accomodation_id`, `accomodation_name`, `accomodation_description`) VALUES
(12, 'PUBLISH RATE', '2 pax, Air-conditioned, FREE breakfast, soap, towels, blanket'),
(13, 'PROMO RATE', 'PROMO RATE: 2 pax, Air-conditioned, FREE breakfast, soap, towels, blanket'),
(14, 'BARKADAHAN PROMO COMES W/ FREE BREAKFAST', 'FREE breakfast'),
(15, 'FUNCTION HALLS RATE', 'FUNCTION HALLS RATE');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `amenities_id` int(11) NOT NULL,
  `amenities_name` varchar(125) NOT NULL,
  `amenities_description` varchar(125) NOT NULL,
  `amenities_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `city` varchar(90) NOT NULL,
  `address` varchar(90) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `terms` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `photo` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `email`, `firstname`, `lastname`, `city`, `address`, `birthdate`, `phone`, `nationality`, `terms`, `username`, `password`, `zip_code`, `photo`) VALUES
(95, 'aeldredjohn.tanahura@gmail.com', 'Aeldred John', 'Tañahura', 'Iligan City', 'Sta. Elena', '2001-06-11', '09361878506', 'Filipino', 1, 'dred', '321db91c2992a4058225401ab94696bad40ae9c9', 9200, '');

-- --------------------------------------------------------

--
-- Table structure for table `message_us`
--

CREATE TABLE `message_us` (
  `message_us_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_us`
--

INSERT INTO `message_us` (`message_us_id`, `name`, `email`, `message`) VALUES
(10, 'Mico Gacutan', 'aeldredjohn.tanahura@gmail.com', 'ssample rani sya'),
(11, 'Mico Gacutan', 'aeldredjohn.tanahura@gmail.com', 'ssample rani syaashdahsdhasd'),
(12, 'Mico Gacutan', 'mico.gacutan02@gmail.com', 'ssample rani syaashdahsdhasd'),
(13, 'Aeldred John Y. Tañahura', 'aeldredjohn.tanahura@gmail.com', 'Located conveniently along the National Highway of Barangay Tubigan, Initao, Misamis Oriental and a few minutes away from Initao National Park.\r\nMidway White Beach Resort is known for its scenic ambiance, white sand beaches, fun water rides and its Filipino hospitality. The resort caters national conventions, official government functions, private weddings, family gatherings and all other occassions are held here.'),
(14, 'Aeldred John Y. Tañahura', 'aeldredjohn.tanahura@gmail.com', 'watata'),
(15, 'Von Justine Caumeran ', 'vonjustine.caumeran@gmail.com', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam at, optio reprehenderit saepe, temporibus laborum molestias suscipit facere officia rem maxime eius provident accusamus quasi fuga corrupti sequi voluptatibus! Sit!'),
(16, 'Von Justine', 'vonjustine99@gmail.com', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam at, optio reprehenderit saepe, temporibus laborum molestias suscipit facere officia rem maxime eius provident accusamus quasi fuga corrupti sequi voluptatibus! Sit!\r\nahahahahhaha'),
(17, 'AELDRED JOHN Y. TAÑAHURA', 'admin@admin.com', 'sample only for the blog hshshsh'),
(18, 'aeldred', 'admin@admin.com', 'msg ni sya'),
(19, 'SATOSHI NAKAMOTO', 'satosh@gmail.com', 'BTC TO THE MOON!!!!!'),
(20, 'fany', 'fany@gmail.com', 'hjashdajshdj\r\n'),
(21, 'galotskie', 'admin@gmail.com', 'asdasdasdasdasd'),
(22, 'galotsdfsdfsdf', 'asdasdad@gmail.com', 'asdadasdasd'),
(23, 'sapot', 'sapot@gmail.com', 'hahahaha');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `trans_date` datetime NOT NULL DEFAULT current_timestamp(),
  `confirmation_code` varchar(30) NOT NULL,
  `reference_number` varchar(50) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `msg_view` tinyint(1) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `trans_date`, `confirmation_code`, `reference_number`, `p_qty`, `guest_id`, `price`, `msg_view`, `status`) VALUES
(81, '2023-09-28 19:32:16', '123456789', '', 1, 95, 2500, 0, 'Checkedout'),
(82, '2023-09-28 19:39:43', '99999999', '', 2, 95, 6500, 0, 'Checkedout'),
(83, '2023-09-28 20:08:29', '09159056977', '', 1, 95, 3500, 0, 'Checkedout');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `confirmation_code` varchar(50) NOT NULL,
  `trans_date` datetime NOT NULL DEFAULT current_timestamp(),
  `room_id` int(11) NOT NULL,
  `arrival` datetime NOT NULL,
  `departure` datetime NOT NULL,
  `r_price` double NOT NULL,
  `guest_id` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `book_date` datetime NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `confirmation_code`, `trans_date`, `room_id`, `arrival`, `departure`, `r_price`, `guest_id`, `status`, `book_date`, `remarks`) VALUES
(106, '123456789', '2023-09-28 11:32:16', 11, '2023-09-27 00:00:00', '2023-09-27 00:00:00', 2500, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(107, '99999999', '2023-09-28 11:39:43', 12, '2023-09-27 00:00:00', '2023-09-27 00:00:00', 3000, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(108, '99999999', '2023-09-28 11:39:43', 13, '2023-09-27 00:00:00', '2023-09-27 00:00:00', 3500, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(109, '09159056977', '2023-09-28 12:08:29', 13, '2023-09-27 00:00:00', '2023-09-27 00:00:00', 3500, 95, 'Checkedout', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_num` int(11) NOT NULL,
  `accomodation_id` int(11) NOT NULL,
  `room` varchar(250) NOT NULL,
  `room_description` varchar(255) NOT NULL,
  `num_person` int(11) NOT NULL,
  `price` double NOT NULL,
  `room_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_num`, `accomodation_id`, `room`, `room_description`, `num_person`, `price`, `room_image`) VALUES
(11, 1, 12, 'Standard Room', 'FREE hygiene kits, towels, breakfast and aircon', 2, 2500, 'rooms/room1.jpg'),
(12, 1, 12, 'Deluxe Room', 'FREE hygiene kits, towels and breakfast and aircon', 2, 3000, 'rooms/room2.jpg'),
(13, 1, 12, 'Suite Room', 'FREE hygiene kits, towels and breakfast and aircon', 2, 3500, 'rooms/room3.jpg'),
(14, 1, 13, 'Standard Room', 'FREE hygiene kits, towels and breakfast and aircon', 2, 1799, 'rooms/PR_Standard_Room.JPG'),
(15, 1, 13, 'Deluxe Room', 'FREE hygiene kits, towels and breakfast and aircon', 2, 1999, 'rooms/PR_Deluxe_Room.JPG'),
(16, 1, 13, 'Suite Room', 'FREE hygiene kits, towels and breakfast and aircon', 2, 2999, 'rooms/PR_Suite_Room.JPG'),
(17, 1, 14, 'Family Suite Room (FR. SAL)', 'FREE breakfast, 3hours Videoke, 1 trip Banana Boat, Zipline', 8, 7499, 'rooms/Family_Suite_Room.JPG'),
(18, 1, 14, 'Family Suite Room (alvarez)', 'FREE breakfast, lunch, dinner, 3hours Videoki, 1 trip Banana Boat, Zipline', 5, 9999, 'rooms/Family_Suite_Room_(2).JPG'),
(19, 1, 14, 'Family Suite Room (Standard Room)', 'FREE unlimited videoke, hygiene kits, towels and breakfast and aircon', 10, 6999, 'rooms/Family_Suite_Room_(3).JPG'),
(20, 1, 14, 'Family Suite Room(5pax)', '--', 5, 3999, 'rooms/01.jpg'),
(21, 1, 14, 'Family Suite Room(12pax)', '--', 12, 4799, 'rooms/02.jpg'),
(22, 1, 14, 'Family Suite Room(20pax)', 'FREE Free 1 trip Banana boat 10 pax', 20, 11999, 'rooms/03.jpg'),
(23, 1, 14, 'Ocean View Suite Room(2pax)', '--', 20, 2999, 'rooms/ocean.jpg'),
(24, 1, 15, 'LONGINO HALL', '30-40 pax with \r\nSound System, \r\nAir-Conditioned & \r\nVideoke', 40, 9500, 'rooms/FH_LONGINO_HALLS.JPG'),
(25, 1, 15, 'WORLD VISION (50-60 persons)', '50-60 pax, with \r\nSound System, \r\nAir-Conditioned & \r\nVideoke', 60, 12500, 'rooms/FH_WORLD_VISION.JPG'),
(26, 1, 15, 'DANIOT HALL', 'Minimun of 150 pax with SS, AC & Videoke', 150, 30000, 'rooms/hall3.jpg'),
(27, 1, 15, 'JAM ADIONG HALL', 'Minimun of 100 pax with SS, AC & Videoke', 100, 20000, 'rooms/hall4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `useraccount_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(90) NOT NULL,
  `role` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`useraccount_id`, `name`, `username`, `password`, `role`, `phone`) VALUES
(1, 'Reinan Sabas', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', '09361878506');

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
-- Indexes for table `message_us`
--
ALTER TABLE `message_us`
  ADD PRIMARY KEY (`message_us_id`);

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
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `message_us`
--
ALTER TABLE `message_us`
  MODIFY `message_us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
