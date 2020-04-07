-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2019 at 09:21 PM
-- Server version: 5.6.34
-- PHP Version: 5.6.32

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
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `slug` varchar(128) NOT NULL,
  `visibility` tinyint(4) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concerts`
--

INSERT INTO `concerts` (`id`, `name`, `date`, `time`, `city`, `country`, `address`, `payment`, `slug`, `visibility`, `user_id`, `lat`, `lng`) VALUES
(4, 'World Tour', '2019-02-02', '19:00:00', 'New York City', 'New York', '', 500000, '', 1, 11, '37.09668482', '-76.99218750'),
(7, 'World Tour', '2019-02-01', '05:00:00', 'Barcelona', 'Spain', '', 500000000, '', 1, 11, '39.71340246', '-1.93359375'),
(8, 'dsad', '2019-01-24', '14:00:00', 'gf', 'g', '', 12, '', 1, 12, '46.07007672', '14.52085207'),
(13, 'asdad', '2019-01-28', '20:20:00', 'Hrastnik', 'Slovenia', '', 123, '', 1, 11, '19.40168922', '9.31640625'),
(14, 'Hi festival', '2019-02-22', '20:00:00', 'Hrastnik', 'Slovenia', '', 123, '', 1, 11, '34.82043681', '64.51171875'),
(15, 'Kres Kisovec', '2018-11-08', '20:00:00', 'Hrastnik', 'Slovenia', '', 200, '', 1, 11, '-22.01705507', '-55.89843750'),
(16, 'Kres', '2019-02-21', '22:00:00', 'Hrastnik', 'Slovenia', '', 123, '', 1, 11, '48.28856943', '12.12890625'),
(17, 'kresssssssssssss', '2020-03-20', '20:20:00', 'Hrastnik ', 'Slovenia', '', 200, '', 1, 11, '7.45763597', '42.53906250'),
(18, 'kresssssssssssssdsadasd', '2019-02-19', '20:20:00', 'Hrastnik', 'Slovenia', '', 123, '', 1, 11, '43.13895739', '-1.58203125'),
(19, 'sadds', '2019-02-24', '00:00:00', '', '', '', 0, '', 1, 11, '35.96676284', '71.19140625'),
(20, 'sssssssssssssssssss', '2019-02-23', '20:00:00', '', '', '', 0, '', 1, 11, '42.36451428', '30.93750000'),
(21, '', '2019-04-19', '00:00:00', '', '', '', 0, '', 0, 11, '36.95634872', '60.29296875'),
(22, '', '2019-02-07', '00:00:00', '', '', '', 0, '', 0, 11, '42.88188506', '85.07812500'),
(23, '', '0000-00-00', '00:00:00', '', '', '', 0, '', 0, 11, '40.78665945', '-79.80468750'),
(24, '', '0000-00-00', '00:00:00', '', '', '', 0, '', 0, 11, '15.88458066', '18.63281250'),
(25, 'Hi Festival', '2019-02-20', '00:00:00', 'Hrastnik', 'Slovenia', 'Rob 25, 1314 Rob, Slovenia', 123, '', 1, 11, '45.84729257', '14.56455354'),
(26, 'Hi Festival', '2019-02-28', '05:05:00', 'Hrastnik', 'Slovenia', 'Unnamed Road, 16460 Barajas de Melo, Cuenca, Spain', 456, '', 1, 12, '40.11786787', '-2.98828125'),
(27, 'World Tour', '2019-03-03', '05:50:00', 'Hrastnik', 'Slovenia', 'R348, Co. Galway, Ireland', 456, '', 1, 22, '53.28318399', '-8.61328125');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_picture` varchar(100) CHARACTER SET latin1 NOT NULL,
  `fb` varchar(100) NOT NULL,
  `yt` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `description` varchar(800) NOT NULL,
  `video1` varchar(100) NOT NULL,
  `video2` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`, `user_picture`, `fb`, `yt`, `insta`, `website`, `description`, `video1`, `video2`) VALUES
(11, 'Metallica', 'm', 'm', 'Screenshot_20170711-114023.png', '', '', '', '', '', '', ''),
(12, 'Admin', 'a', 'a', 'Logo3.jpg', 'https://www.facebook.com/WarningBand8/', 'ssssss', 'Simon Žlak', 'ssssssss', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'https://www.youtube.com/embed/4Hihge6FFVw', 'https://www.youtube.com/embed/IwAme8lLpAk'),
(20, 'tst', 'tst', 'tst', 'Full_vectorized.png', 'fgdas', 'ygasdgfggrfffff', 'igasd', 'wgasd', '', '', ''),
(21, 'test', 'test', 'test', 'LogoFinalRGBVector.PNG', 'gggg', '', '', '', '', '', ''),
(22, 'Steel Panther', 's', 's', 'forest-3840x2160-green-5k-19712.jpg', 'sssssssss', '', '', '', 'ssssssssss', 'https://www.youtube.com/embed/RByAmYcSTYA', 'https://www.youtube.com/embed/18_oYwYfAkw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concerts`
--
ALTER TABLE `concerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
