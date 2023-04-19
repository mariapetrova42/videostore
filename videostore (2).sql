-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 05:42 PM
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
-- Table structure for table `disk`
--

CREATE TABLE `disk` (
  `item_id` int(11) NOT NULL,
  `disk_daily_rent` varchar(50) DEFAULT NULL,
  `disk_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `disk`
--

INSERT INTO `disk` (`item_id`, `disk_daily_rent`, `disk_type`) VALUES
(1, '0.75', 'DVD'),
(2, '0.75', 'Blu-Ray');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(17, 'Madison', 'Hatter', 'teapartyanimal@gmail.com', 'hatman', 'CrazyBeverage34', 0),
(18, 'Gem', 'Heartland', 'gemheart@aol.com', 'jeweljem', 'ChasmFiend56', 0),
(19, 'Kvothe', 'Bloodless', 'tooextra2btrue@proton.me', 'barkeep', 'EdemahRuh67', 0),
(20, 'Alice', 'Faerie', 'neverfound@yahoo.com', 'smallbig', 'EatMe78', 0),
(21, 'Mark', 'Avana', 'mikavana@aol.com', 'biscuitsr', 'YumCookie89', 0),
(22, 'Sierra', 'Younus', 'highsierra@outlook.com', 'nevada', 'GoodBunny90', 0),
(26, 'Deku', 'Izuku', 'deckurface@gmail.com', 'allmightjr', 'PlusUltra6789', 0),
(27, 'Kenma', 'Kozume', 'catboyplayer@gmail.com', 'nekokun', 'NekomaSlay7890', 0),
(28, 'Sebastian', 'Michaelis', 'givemeyoursoul@aol.com', 'father', 'CielSoulYum8901', 0),
(29, 'Juliet', 'Romera', 'dumbwaystodie@yahoo.com', 'jcapulet', 'LetMeLive9012', 0),
(30, 'Inej', 'Brekker', 'tightropewalker@proton.me', 'dancer', 'KazLove0123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `movie_genre` varchar(50) DEFAULT NULL,
  `movie_title` varchar(50) DEFAULT NULL,
  `movie_year` int(4) DEFAULT NULL,
  `movie_director` varchar(50) DEFAULT NULL,
  `movie_actor1` varchar(50) DEFAULT NULL,
  `movie_actor2` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `item_id`, `movie_genre`, `movie_title`, `movie_year`, `movie_director`, `movie_actor1`, `movie_actor2`) VALUES
(1, NULL, 'Adventure', 'Princess Bride, The', 1987, 'Rob Reiner', 'Cary Elwes', 'Robin Wright'),
(2, NULL, 'Spy', 'Man From UNCLE, The', 2015, 'Guy Ritchie', 'Henry Caville', 'Armie Hammer'),
(3, NULL, 'Adventure', 'Mulan', 1998, 'Barry Cook', 'Ming-Na Wen', 'Eddie Murphy'),
(4, NULL, 'Comedy', 'Alvin and the Chipmunks', 2007, 'Tim Hill', 'Jason Lee', 'David Cross'),
(5, NULL, 'Comedy', 'Trading Places', 1983, 'John Landis', 'Dan Aykroud', 'Eddie Murphy'),
(6, NULL, 'Comedy', 'Coming to America', 1988, 'John Landis', 'Eddie Murphy', 'Arsenio Hall'),
(7, NULL, 'Fanstasy', 'Shrek', 2001, 'Andrew Adamson', 'Mike Meyers', 'Cameron Diaz'),
(8, NULL, 'Adventure', 'Robin Hood: Men in Tights', 1993, 'Mel Brooks', 'Cary Elwes', 'Richard Lewis'),
(9, NULL, 'Action', 'Hunger Games, The', 2012, 'Gary Ross', 'Jennifer Lawrence', 'Josh Hutcherson'),
(10, NULL, 'Fantasy', 'Shrek 2', 2004, 'Andrew Adamson', 'Mike Meyers', 'Antonio Banderas'),
(11, NULL, 'Horror', 'Frankenstein', 1931, 'James Whale', 'Colin Clive', 'Boris Karloff'),
(12, NULL, 'Horror', 'Dracula', 1931, 'Tom Browning', 'Bela Lugosi', 'David Manners'),
(13, NULL, 'Horror', 'Get Out', 2017, 'Jordan Peele', 'Daniel Kaluuya', 'Allison Williams'),
(14, NULL, 'Romance', 'Crazy Stupid Love', 2011, 'Glen Ficarra', 'Steve Carell', 'Ryan Gosling'),
(15, NULL, 'Thriller', 'Cocaine Bear', 2023, 'Elizabeth Banks', 'Keri Russel', 'Christian Convery'),
(16, NULL, 'Spy', 'Mission Impossible', 1996, 'Brian De Palma', 'Tom Cruise', 'Jon Voight'),
(17, NULL, 'Spy', 'Mission Impossible 2', 2000, 'John Woo', 'Tom Cruise', 'Dougray Scott'),
(18, NULL, 'Fantasy', 'Puss in Boots', 2011, 'Chris Miller', 'Antonio Banderas', 'Salma Hayek'),
(19, NULL, 'Superhero', 'Iron Man', 2008, 'Jon Favreau', 'Robert Downey Jr', 'Terrence Howard'),
(20, NULL, 'Superhero', 'Hulk', 2003, 'Ang Lee', 'Eric Bana', 'Jennifer Connely'),
(21, NULL, 'Drama', 'Beautiful Mind, A', 2001, 'Ron Howard', 'Russel Crowe', 'Ed Harris');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `store_phone` varchar(10) DEFAULT NULL,
  `store_street1` varchar(50) DEFAULT NULL,
  `store_street2` varchar(50) DEFAULT NULL,
  `store_city` varchar(50) DEFAULT NULL,
  `store_state` varchar(50) DEFAULT NULL,
  `store_zipcode` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_phone`, `store_street1`, `store_street2`, `store_city`, `store_state`, `store_zipcode`) VALUES
(1, '7731234567', '1776 Windy City St', 'FL 27', 'Chicago', 'Illinois', '60601'),
(2, '8479876543', '1857 Cool College Rd', '', 'Lake Forest', 'Illinois', '60045'),
(3, '2624561237', '6666 Spooky Dr', 'FL 01', 'Kenosha', 'Wisconsin', '53140');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tran_id` int(11) NOT NULL,
  `tran_start_date` date DEFAULT NULL,
  `tran_end_date` date DEFAULT NULL,
  `tran_type` varchar(50) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disk`
--
ALTER TABLE `disk`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_id` (`item_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `member_id` (`member_id`,`member_email`,`member_username`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`),
  ADD UNIQUE KEY `movie_id` (`movie_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`),
  ADD UNIQUE KEY `store_id` (`store_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tran_id`),
  ADD UNIQUE KEY `member_id` (`member_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disk`
--
ALTER TABLE `disk`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tran_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`);

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
