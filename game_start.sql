-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 25, 2022 at 04:57 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_start`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `game_id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(1024) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '../assets/temp.png',
  `gname` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `desc_game` varchar(1024) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `price` varchar(6) DEFAULT NULL,
  `release_date` varchar(10) DEFAULT NULL,
  `publisher_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`game_id`),
  KEY `publisher_id` (`publisher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1017 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `image`, `gname`, `desc_game`, `price`, `release_date`, `publisher_id`) VALUES
(1001, 'https://cms.mygameon.my/wp-content/uploads/2021/10/FIFA-22-New.jpg', 'FIFA 2022', 'football simulation video game', '200.00', '2022-10-22', 1001),
(1002, 'https://i.gadgets360cdn.com/large/Battlefield_2042_trailer_1623328608655.jpg', 'Battlefield 2042', 'Battlefield 2042 is a first-person shooter game', '250.00', '2021-11-15', 1001),
(1003, 'https://shogi-pineapple.com/wp-content/uploads/2021/10/1634742838_Naruto-could-be-coming-to-Fortnite-sooner-than-you-think.jpg', 'Fornite', 'Free-to-play Battle Royale game with numerous game modes for every type of game player', 'Free', '2017-07-21', 1002),
(1004, 'https://i.guim.co.uk/img/media/7c2ab1a3e60e445caf0a4d3de302591e830e8f7f/0_0_3800_2280/master/3800.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=49331bc571155fab736c3ce179f31770', 'Mario', 'Mario Gang Wars', '69', '2022-01-22', 1002),
(1006, 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/52d9142c-09aa-45a6-8101-a06f8603475c/dea0olm-43260024-8a28-41cb-bec0-90ef42b7e368.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzUyZDkxNDJjLTA5YWEtNDVhNi04MTAxLWEwNmY4NjAzNDc1Y1wvZGVhMG9sbS00MzI2MDAyNC04YTI4LTQxY2ItYmVjMC05MGVmNDJiN2UzNjguanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.qaf8UrwzsExc7EJsENpiFsbkPuMAdvdua2IcoyVkcsU', 'Sonichu The Animation', 'Sonichu an original game series by Chris-chan. Sonichu will zap so hard that the enemy can\'t withstand it including Sonichu himself.', '99.99', '2022-01-28', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
CREATE TABLE IF NOT EXISTS `publisher` (
  `publisher_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(1024) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '../assets/temp.png',
  `pname` varchar(20) DEFAULT NULL,
  `bio` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`publisher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1006 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `image`, `pname`, `bio`) VALUES
(1001, 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Electronic-Arts-Logo.svg/1200px-Electronic-Arts-Logo.svg.png', 'EA ', 'Electronic Arts Inc. is an American video game company headquartered in Redwood City, California.'),
(1002, 'https://pbs.twimg.com/profile_images/1293555338072002560/XbmfZ-pv_400x400.jpg', 'Epic Games', 'An American video game and software developer and publisher based in Cary, North Carolina.');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `transaction_id` int NOT NULL AUTO_INCREMENT,
  `value` varchar(6) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `game_id` int NOT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `user_id` (`user_id`),
  KEY `game_id` (`game_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1049 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `value`, `user_id`, `game_id`) VALUES
(1002, '456.50', 1001, 1002),
(1003, '280.30', 1003, 1003),
(1004, '90', 1003, 1002),
(1006, 'Free', 1003, 1003),
(1007, '69.69', 1003, 1006),
(1017, '200.00', 1003, 1001),
(1030, '69.69', 1001, 1006),
(1031, '69.69', 1008, 1006),
(1032, '250.00', 1002, 1002),
(1033, '69.69', 1002, 1006),
(1036, '69', 1009, 1004),
(1037, '200.00', 1009, 1001),
(1038, '69.69', 1009, 1006),
(1039, '200.00', 1001, 1001),
(1040, 'Free', 1001, 1003),
(1041, '69', 1001, 1004);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `avatar` varchar(1024) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '../assets/temp.png',
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `passwd` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bio` varchar(512) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `role` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'User',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1016 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `avatar`, `username`, `passwd`, `email`, `bio`, `role`) VALUES
(1001, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNhQwHxAEWDT0NT0oeJ9l4z52BPjWmoxDwDg&usqp=CAU', 'Frosty', '12345', 'jasman@mail.com', 'I want to eat egg', 'Admin'),
(1002, '../assets/temp.png', 'TonyHuz', '12345', 'tony@mail.com', 'Support player', 'User'),
(1003, 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/52d9142c-09aa-45a6-8101-a06f8603475c/dea0olm-43260024-8a28-41cb-bec0-90ef42b7e368.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzUyZDkxNDJjLTA5YWEtNDVhNi04MTAxLWEwNmY4NjAzNDc1Y1wvZGVhMG9sbS00MzI2MDAyNC04YTI4LTQxY2ItYmVjMC05MGVmNDJiN2UzNjguanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.qaf8UrwzsExc7EJsENpiFsbkPuMAdvdua2IcoyVkcsU', 'AcepReal', '12345', 'aceps@mail.com', 'Sonichu lover no 1', 'User'),
(1004, '../assets/temp.png', 'jasman', '12345', 'jas@mail.com', NULL, 'User'),
(1008, 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Flag_of_the_Communist_Party_of_Kampuchea.svg/1280px-Flag_of_the_Communist_Party_of_Kampuchea.svg.png', 'ChinaNo1', '44444', 'ali@alibaba.cn', 'China is a great country. I love out leader John China', 'User'),
(1009, 'https://i1.sndcdn.com/avatars-000423224016-58aefd-t500x500.jpg', 'MrMeeseks', 'milf69', 'MrpoopyBH@hotmail.com', 'oooooooouuuuuuuuuuu <br>weeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'User');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
