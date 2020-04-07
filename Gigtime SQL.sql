-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2020 at 01:18 PM
-- Server version: 5.6.34
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gigtime`
--

-- --------------------------------------------------------

--
-- Table structure for table `concerts`
--

CREATE TABLE `concerts` (
  `concert_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `visibility` tinyint(4) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `performer1` varchar(255) NOT NULL,
  `performer2` varchar(255) NOT NULL,
  `performer3` varchar(255) NOT NULL,
  `performer4` varchar(255) NOT NULL,
  `performer5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concerts`
--

INSERT INTO `concerts` (`concert_id`, `name`, `date`, `time`, `city`, `country`, `description`, `address`, `image`, `slug`, `visibility`, `user_id`, `lat`, `lng`, `performer1`, `performer2`, `performer3`, `performer4`, `performer5`) VALUES
(115, 'MCH', '2019-11-21', '20:00:00', 'Hrastnik', 'Slovenia', 'Koncert v MCHju', 'Cesta 3. julija 27, 1430 Hrastnik, Slovenia', '', '', 1, 38, '46.15051966', '15.08568969', '', '', '', '', ''),
(116, 'Holister', '2020-08-08', '20:00:00', 'Zagreb', 'Croatia', '', 'Ul. Ivana Tkalčića 73, 10000, Zagreb, Croatia', '', '', 1, 38, '45.81875150', '15.97660413', '', '', '', '', ''),
(117, 'Orto Bar Warning', '2020-05-21', '20:00:00', 'Ljubljana', 'Slovenia', '', 'Bolgarska ulica 1, 1000 Ljubljana, Slovenia', '', '', 1, 38, '46.05793110', '14.52145481', '', '', '', '', ''),
(118, 'Whiskey A Go Go', '2021-12-16', '20:20:00', 'Los Angeles', 'United States', '', '8901 Sunset Blvd, West Hollywood, CA 90069, USA', '', '', 1, 39, '34.09081585', '-118.38571554', '', '', '', '', ''),
(119, 'Palba', '2021-04-22', '21:00:00', 'Zagorje Ob Savi', 'Slovenia', '', 'Cesta zmage 16b, 1410 Zagorje ob Savi, Slovenia', '', '', 1, 40, '46.13317615', '14.99462476', '', '', '', '', ''),
(120, 'Kiss', '2020-12-25', '19:00:00', 'Los Angeles', 'United States', '', '1117 3/4 N Clark St, West Hollywood, CA 90069, USA', '', '', 1, 41, '34.09090476', '-118.38565804', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `picture_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `picture_filename` varchar(255) NOT NULL,
  `imgDesc` varchar(50) NOT NULL,
  `imgDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`picture_id`, `user_id`, `picture_filename`, `imgDesc`, `imgDate`) VALUES
(27, 38, 'DSC_0129.JPG', 'MCH', '2019-11-21'),
(28, 38, 'DSC_0097.JPG', 'MCH', '2019-11-13'),
(29, 38, 'FB_IMG_1560108681670.jpg', 'Koncert', '2019-04-23'),
(30, 38, 'FB_IMG_1560108688438.jpg', 'Koncert', '2019-08-08'),
(31, 39, 'green-day-2019-press-photo.jpg', 'Group', '0000-00-00'),
(33, 39, '41ce2fa0d585747ee4cf3369c5f1fa40.jpg', '', '0000-00-00'),
(34, 40, '33964538_2147551215517194_4503635331433627648_o.jpg', '', '0000-00-00'),
(35, 40, '55905154_2388278851444428_2697748999628128256_n.jpg', 'Koncert', '2019-11-19'),
(36, 41, 'GettyImages-1098119648.jpg', 'Kiss', '2020-03-13'),
(37, 41, 'featured-whiskey.jpg', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_role` int(11) NOT NULL,
  `user_picture` varchar(100) CHARACTER SET latin1 NOT NULL,
  `zanr1` varchar(255) DEFAULT NULL,
  `zanr2` varchar(255) DEFAULT NULL,
  `fb` varchar(100) NOT NULL,
  `yt` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `description` varchar(800) NOT NULL,
  `contact` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`, `user_role`, `user_picture`, `zanr1`, `zanr2`, `fb`, `yt`, `insta`, `website`, `description`, `contact`) VALUES
(38, 'Warning', 'warningband@gmail.com', 'warning', 1, 'Full_vectorized.png', 'Punk Rock', 'Cover Band', 'facebook.com/warningband8', 'https://www.youtube.com/channel/UC-chkGb1EVpCH4QYh00Dnzw', 'https://www.instagram.com/warningbandoffical/', '', 'Warning je skupina štirih mladih glasbenikov', ''),
(39, 'Green Day', 'green.day@gmail.com', 'greenday', 1, '41ce2fa0d585747ee4cf3369c5f1fa40.jpg', 'Punk Rock', '', 'faceook.com/greenday', '', '', 'www.greenday.com', 'Green Day is a 4 peice punk rock group from California, USA', 'greenday@gmail.com'),
(40, 'Garaža bar', 'garaza@gmail.com', 'garaza', 2, '31655508_2128970740708575_7056041417994403840_n.jpg', NULL, NULL, '', '', '', '', '', ''),
(41, 'Whiskey A Go Go', 'whiskey@gmail.com', 'whiskey', 2, 'whisky-a-go-go-2013.jpg', NULL, NULL, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venue_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `indoor` int(11) NOT NULL,
  `genre` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `contactVenue` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_id`, `location`, `size`, `indoor`, `genre`, `description`, `contactVenue`, `user_id`, `lat`, `lng`) VALUES
(7, '', 50, 1, '', 'Rock bar', '386111111', 40, '46.13316899', '14.99465737'),
(8, '', 500, 1, '', 'Famous Whiskey A Go Go', '546840864', 41, '34.09082835', '-118.38568878');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`concert_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concerts`
--
ALTER TABLE `concerts`
  MODIFY `concert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `concerts`
--
ALTER TABLE `concerts`
  ADD CONSTRAINT `concerts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
