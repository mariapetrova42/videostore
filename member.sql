-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 05:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videostore`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_first_name` varchar(50) DEFAULT NULL,
  `member_last_name` varchar(50) DEFAULT NULL,
  `member_email` varchar(50) DEFAULT NULL,
  `member_username` varchar(50) DEFAULT NULL,
  `member_password` varchar(50) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_first_name`, `member_last_name`, `member_email`, `member_username`, `member_password`, `is_admin`) VALUES
(1, 'Psyche', 'Younus', 'psychuout@gmail.com', 'psychic', 'SunFlower1@3$', 1),
(2, 'Dora', 'Explora', 'doradora@outlook.com', 'adorable', 'NoSwiping24', 1),
(3, 'Mariana', 'Petrel', 'riabird@proton.me', 'riachan', 'EagleEye68', 1),
(4, 'Profesor', 'Ricarudo', 'srricardito@gmail.com', 'richie', 'aprendeR35', 0),
(5, 'Michelle', 'Avana', 'mishavana@aol.com', 'biscuitjr', 'CookieYum46', 0),
(6, 'Truck', 'Aggarwal', 'truckerboy123@gmail.com', 'truckkun', 'IseKAIman69', 0),
(7, 'Ramen', 'Somany', 'somuchramen@outlook.com', 'noodles', 'SendNoods3456', 0),
(8, 'Moist', 'Von Lipwig', 'goldenmail@outlook.com', 'argent', 'Conmanager80', 0),
(9, 'Jam', 'Seraphine', 'sjamsine@gmail.com', 'jellyg', 'PeanutButter91', 0),
(10, 'Banana', 'Sugar', 'banananas@outlook.com', 'sugapie', 'MinionGru02', 0),
(11, 'Maurice', 'Wiseman', 'nineliveslover@outlook.com', 'catboy', 'YummRat12', 0),
(12, 'Harriet', 'Porber', 'bychucktingle@gmail.com', 'dinolvr', 'BadBoyPar23', 0),
(13, 'Alice', 'Wonderland', 'foreverlost@yahoo.com', 'bigsmall', 'DrinkMe45', 0),
(14, 'Moist', 'Von Lipwig', 'goldenmail@outlook.com', 'argent', 'Conmanager80', 0),
(15, 'Jam', 'Seraphine', 'sjamsine@gmail.com', 'jellyg', 'PeanutButter91', 0),
(16, 'Banana', 'Sugar', 'banananas@outlook.com', 'sugapie', 'MinionGru02', 0),
(17, 'Madison', 'Hatter', 'teapartyanimal@gmail.com', 'hatman', 'CrazyBeverage34', 0),
(18, 'Gem', 'Heartland', 'gemheart@aol.com', 'jeweljem', 'ChasmFiend56', 0),
(19, 'Kvothe', 'Bloodless', 'tooextra2btrue@proton.me', 'barkeep', 'EdemahRuh67', 0),
(20, 'Alice', 'Faerie', 'neverfound@yahoo.com', 'smallbig', 'EatMe78', 0),
(21, 'Mark', 'Avana', 'mikavana@aol.com', 'biscuitsr', 'YumCookie89', 0),
(22, 'Sierra', 'Younus', 'highsierra@outlook.com', 'nevada', 'GoodBunny90', 0),
(23, 'Alexander', 'Burr', 'pardonmesir@gmail.com', 'oservant', 'AdotHam01', 0),
(24, 'Anne', 'Cleaves', 'queenofthecastle@aol.com', 'queenbee', 'GetDown1234', 0),
(25, 'Odysseus', 'Ithica', 'twentyyearsgone@gmail.com', 'traveler', 'LongRoad345', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `member_id` (`member_id`,`member_email`,`member_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
