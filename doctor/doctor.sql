-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2021 at 05:07 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arogya`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_reg_id` varchar(200) NOT NULL,
  `doctor_email` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`doctor_reg_id`),
  KEY `doctor_email` (`doctor_email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_reg_id`, `doctor_email`, `name`, `specialization`, `mobile`, `address`, `amount`, `img`) VALUES
('reg/5656/CGd', 'supunchalaka@gmail.com', 'Dr.Supun Chalaka', 'physicaltherapy', 771712924, 'No 273/4/2, Himbutana Lane', 1222, ' img/profilePic/1.jpg'),
('reg/5656/CGFddddd', 'asd@gmail.com', 'Dr.Supun Chalaka', 'vaccine', 771712924, 'No 273/4/2, Himbutana Lane', 1222, ' img/profilePic/1.jpg'),
('reg/5656/CGFddee', 'abc@gmail.com', 'Dr.sajith jayasinghe', 'pediatrician', 771712924, 'No 273/4/2, Himbutana Lane', 1222, ' ../img/profilePic/1.jpg'),
('reg/5656/CG', 'sdasd@fdsf.cdfsf', 'sasas', 'webtcr', 768444710, 'sad', 200, ''),
('8646', 'uddhikaish26ara1@gmail.com', 'Dr.qwq', 'webtcr', 763304183, 'KDE 172, Ranajayapura, Ipalogama.', 500, ' ../img/profilePic/mathara language.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
