-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2021 at 02:11 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(13) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_id`),
  KEY `admin_email` (`admin_email`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `name`, `mobile`, `img`, `is_delete`) VALUES
(30, 'supunchalaka123@gmail.com', 'supun', 771712924, ' ../img/profilePic/homepageImage_en_US.jpg', 0),
(31, 'asdsssadad@hhhhh', 'asdasdas', 771712924, ' ../img/profilePic/sub-buzz-22673-1523574476-1.png', 1),
(32, 'supunchalaka@gmail.com', 'supun Chalaka', 771712924, ' ../img/profilePic/golder-retriever-puppy.jpeg', 1),
(33, 'chalaka@gmail.com', 'chalaka', 771712924, ' ../img/profilePic/2020_12_23_15_06_IMG_1115.JPG', 1),
(34, 'oj@gmail.com', 'Asd chalak', 771712924, ' ../img/profilePic/IMG_20180826_113446_179.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_type` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` int(13) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `doctor_id` varchar(200) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  `isDone` tinyint(1) NOT NULL DEFAULT '0',
  `amount` int(10) NOT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1334 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `appointment_type`, `date`, `time`, `specialization`, `doctor_id`, `patient_id`, `isApproved`, `isDone`, `amount`) VALUES
(1321, 'Cash', '2020-12-02', 2, 'opd', 'reg/5656/CGd', '1002', 1, 0, 1300),
(1322, 'Online', '2020-12-02', 3, 'opd', 'reg/5656/CGd', '1002', 0, 0, 1200),
(1328, 'Online', '2020-01-11', 7, 'webtcr', '1003', '1002', 1, 0, 1300),
(1329, 'Cash', '2020-12-02', 4, 'physicaltherapy', '343', '343', 0, 0, 1200),
(1330, 'Cash', '2020-12-02', 1, 'vaxination', '234', '343', 0, 0, 1300),
(1331, 'Cash', '2020-12-17', 2, 'vaxination', '4545', '2323', 0, 0, 2600),
(1332, 'Online', '2020-12-02', 5, 'counseling', '4545', '234', 0, 0, 1200),
(1333, 'Cash', '2020-12-02', 5, 'counseling', 'asd', 'asd', 0, 0, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

DROP TABLE IF EXISTS `blood`;
CREATE TABLE IF NOT EXISTS `blood` (
  `blood_Id` int(11) NOT NULL AUTO_INCREMENT,
  `blood_date` date NOT NULL,
  `blood_type` varchar(3) NOT NULL,
  `blood_details` varchar(50) NOT NULL,
  `blood_status` enum('available','used','destroy','transfer') NOT NULL,
  PRIMARY KEY (`blood_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`blood_Id`, `blood_date`, `blood_type`, `blood_details`, `blood_status`) VALUES
(1, '2020-12-01', 'A+', 'Narahenpita blood ban', 'destroy'),
(2, '2020-12-01', 'B+', 'Narahenpita blood ban', 'used'),
(3, '2020-12-08', 'A+', 'Matara Bank', 'destroy'),
(4, '2020-04-20', 'A+', 'Matara Bank', 'used'),
(5, '2020-04-20', 'A+', 'Matara Bank', 'used'),
(6, '2020-04-20', 'A+', 'Matara Bank', 'destroy'),
(7, '2020-04-20', 'O+', 'Anuradhapura Bank', 'used'),
(8, '2019-05-21', 'AB-', 'Anuradapura Bank', 'used'),
(9, '2020-12-16', 'O-', 'Jaffna Bank', 'used'),
(10, '2020-12-06', 'A+', 'Narahenpita blood bank', 'used'),
(11, '2020-12-16', 'O+', 'Matara blood bank', 'destroy'),
(12, '2020-12-15', 'AB-', 'Narahenpita blood bank', 'used'),
(13, '2020-12-13', 'A+', 'Matara blood bank', 'used'),
(14, '2020-12-07', 'O+', 'Narahenpita blood bank', 'used'),
(15, '2020-12-13', 'A+', 'Narahenpita blood bank', 'used'),
(16, '2020-12-02', 'AB-', 'Galle Blood bank', 'used'),
(17, '2020-12-03', 'O-', 'jaffna', 'used'),
(18, '2020-12-14', 'A-', 'Narahenpita blood bank', 'used'),
(19, '2020-12-01', 'O+', 'Galle Blood bank', 'used'),
(20, '2020-12-11', 'AB+', 'Matara blood bank', 'used'),
(21, '2020-12-07', 'O+', 'Galle Blood bank', 'used'),
(22, '2020-12-06', 'A+', 'Narahenpita blood bank', 'used'),
(23, '2020-12-15', 'A+', 'Matara blood bank', 'used'),
(24, '2020-12-13', 'A+', 'Galle Blood bank', 'used'),
(25, '2020-12-02', 'A+', 'Narahenpita blood bank', 'destroy'),
(26, '2020-12-01', 'A+', 'Matara blood bank', 'destroy'),
(27, '2020-12-13', 'B+', 'Narahenpita blood bank', 'used'),
(28, '2020-12-13', 'B-', 'Narahenpita blood bank', 'used'),
(29, '2020-12-02', 'AB-', 'matara', 'used'),
(30, '2020-12-02', 'B+', 'matara', 'used'),
(31, '2020-12-02', 'A+', 'matara', 'destroy'),
(32, '2020-12-07', 'AB+', 'Galle Blood bank', 'used'),
(33, '2020-12-01', 'O+', 'Matara blood bank', 'destroy'),
(34, '2021-01-13', 'A+', 'Matara blood bank', 'available'),
(35, '2021-01-09', 'A-', 'Galle Blood bank', 'available'),
(36, '2021-01-15', 'A-', 'Narahenpita blood bank', 'available'),
(37, '2021-01-07', 'A-', 'Narahenpita blood bank', 'used'),
(38, '2021-01-06', 'A-', 'Galle Blood bank', 'used'),
(39, '2021-01-16', 'A+', 'jaffna', 'destroy');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `is_replied` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `type`, `name`, `phone`, `email`, `message`, `img`, `is_replied`) VALUES
(16, 'Reporting Error', 'asdasdasd', 771712924, 'asd8989ad@hhhhh', 'asdsadas', '', 1),
(14, 'Internal Server Error', 'asdsad', 771712924, 'asdsadad@hhhhh', 'asds', '', 0),
(15, 'Reporting Error', 'asdsad', 771712924, 'asdsadad@hhhhh', 'asdsadsadsadasdasdsadasd', '', 0),
(13, 'Unauthorized', 'asdsad', 771712924, 'asd8989ad@hhhhh', 'asdsd', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `counseling`
--

DROP TABLE IF EXISTS `counseling`;
CREATE TABLE IF NOT EXISTS `counseling` (
  `counseling_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(200) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`counseling_id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `amount` decimal(7,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`doctor_reg_id`),
  KEY `doctor_email` (`doctor_email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_reg_id`, `doctor_email`, `name`, `specialization`, `mobile`, `address`, `amount`, `img`, `is_delete`) VALUES
('reg/5656/CGd', 'supunchalaka@gmail.com', 'Dr.Supun Chalaka', ' physicaltherapy', 771712924, 'No 273/4/2, Himbutana Lane', '1222.00', ' img/profilePic/1.jpg', 0),
('reg/5656/CGFddddd', 'supun@smasdmobile.com', 'Dr.Supun Chalaka', ' counseling', 771712924, 'No 273/4/2, Himbutana Lane', '1222.00', ' img/profilePic/', 0),
('asd/asd', 'sachin@gmail.com', 'Dr.asd', 'pediatrician', 711234564, 'asd', '2000.00', ' ../img/profilePic/IMG_20180826_113446_179.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

DROP TABLE IF EXISTS `drug`;
CREATE TABLE IF NOT EXISTS `drug` (
  `drugs_id` int(11) NOT NULL AUTO_INCREMENT,
  `drugsName` varchar(100) NOT NULL,
  `dose` varchar(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` float(6,2) NOT NULL,
  `drug_expire_date` varchar(20) NOT NULL,
  PRIMARY KEY (`drugs_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` float(6,2) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `payment_id` (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mlt`
--

DROP TABLE IF EXISTS `mlt`;
CREATE TABLE IF NOT EXISTS `mlt` (
  `mlt_id` int(100) NOT NULL AUTO_INCREMENT,
  `mlt_email` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mlt_id`),
  KEY `mlt_email` (`mlt_email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlt`
--

INSERT INTO `mlt` (`mlt_id`, `mlt_email`, `name`, `mobile`, `img`, `is_delete`) VALUES
(1, 'sadni@smartlkmobile.com', 'asdasd', 771712924, ' img/profilePic/2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `title`, `msg`, `role`, `date`) VALUES
(14, 'Important Meeting about this corona pandemic ', 'Please attend the zoom meeting to discuss this pandemic situation. here is the link\r\nkjhfjskahkjsdhajskdh.com \r\ntime: 10.00\r\ndate: 07/26', 'admin,doctor', '2021-01-19'),
(13, 'About the Salary', 'Dear Staff, \r\nYour Salary has been deposit into your bank account. Please check it out', 'admin,doctor,pharmacist,mlt,reception', '2021-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` int(100) NOT NULL AUTO_INCREMENT,
  `patient_email` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `district` varchar(50) NOT NULL,
  `mobile` int(10) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `blood_type` varchar(3) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`patient_id`),
  KEY `patient_email` (`patient_email`)
) ENGINE=MyISAM AUTO_INCREMENT=1036 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_email`, `name`, `address`, `district`, `mobile`, `age`, `gender`, `blood_type`, `img`, `is_delete`) VALUES
(1035, 'supChala90un@smartlkmobile.com', 'Supun Chalaka', ' No 273/4/2, Himbutana Lane', 'Gampaha', 771712924, 45, ' Male', 'A+', 'img/profilePic/IMG_20180821_135841_276.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patientsmedicalhistory`
--

DROP TABLE IF EXISTS `patientsmedicalhistory`;
CREATE TABLE IF NOT EXISTS `patientsmedicalhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `reportPDF` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` float(6,2) NOT NULL,
  `appointment_Id` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `appointment_Id` (`appointment_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=1003 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `date`, `amount`, `appointment_Id`, `payment_type`) VALUES
(1001, '2020-12-02', 1200.00, 1005, 'cash'),
(1002, '2020-12-03', 2600.00, 1002, 'card');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

DROP TABLE IF EXISTS `pharmacist`;
CREATE TABLE IF NOT EXISTS `pharmacist` (
  `pharmacist_reg_id` varchar(200) NOT NULL,
  `pharmacist_email` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pharmacist_reg_id`),
  KEY `pharmacist_email` (`pharmacist_email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`pharmacist_reg_id`, `pharmacist_email`, `name`, `mobile`, `img`, `is_delete`) VALUES
('reg/8988', 'sup34c@gmail.com', 'Supun Chalaka', 771712924, ' img/profilePic/2.jpg', 0),
('reg/89ss88', 'asssccd@gmail.com', 'Supun Chalaka', 771712924, ' img/profilePic/IMG_20180709_125842_159.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `physiotherapy`
--

DROP TABLE IF EXISTS `physiotherapy`;
CREATE TABLE IF NOT EXISTS `physiotherapy` (
  `physiotherapy_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(200) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `number` int(10) NOT NULL,
  PRIMARY KEY (`physiotherapy_id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reception`
--

DROP TABLE IF EXISTS `reception`;
CREATE TABLE IF NOT EXISTS `reception` (
  `reception_id` int(200) NOT NULL AUTO_INCREMENT,
  `reception_email` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reception_id`),
  KEY `reception_email` (`reception_email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reception`
--

INSERT INTO `reception` (`reception_id`, `reception_email`, `name`, `mobile`, `img`, `is_delete`) VALUES
(1, 'supun@sm3rtlkmobile.com', 'Supun Chalaka', 771712924, ' img/profilePic/2.jpg', 0),
(2, 'ishara@gmail.com', 'ishara', 711234564, ' ../img/profilePic/IMG_20180821_140246_131.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

DROP TABLE IF EXISTS `reminder`;
CREATE TABLE IF NOT EXISTS `reminder` (
  `reminder_id` int(11) NOT NULL AUTO_INCREMENT,
  `appoinmnet_type` varchar(20) NOT NULL,
  `appoinment_date` date NOT NULL,
  `appoinment_time` int(10) NOT NULL,
  `patient_contact` int(10) NOT NULL,
  `reminder_period` int(5) NOT NULL,
  PRIMARY KEY (`reminder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `report_Id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `issue` varchar(200) NOT NULL,
  `receive` varchar(200) NOT NULL,
  `pdfFile` varchar(200) NOT NULL,
  PRIMARY KEY (`report_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `doc_id`, `date`, `time`) VALUES
(3, 'doc001', '2020-11-10', '04:19:00'),
(4, 'doc002', '2020-11-10', '04:19:36'),
(5, 'doc003', '2020-12-16', '11:12:35'),
(6, 'doc004', '2020-12-16', '08:35:11'),
(7, 'doc005', '2020-12-24', '19:19:23'),
(8, 'doc006', '2020-12-23', '11:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `specilization`
--

DROP TABLE IF EXISTS `specilization`;
CREATE TABLE IF NOT EXISTS `specilization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specilization` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specilization`
--

INSERT INTO `specilization` (`id`, `specilization`) VALUES
(1, 'Homeopath'),
(2, 'Ayurveda'),
(3, 'Dentist');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(200) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `pwd`, `role`, `isDelete`) VALUES
('asdsssadad@hhhhh', 'f10e2821bbbea527ea02200352313bc059445190', 'admin', 0),
('supunchalaka@gmail.com', 'f10e2821bbbea527ea02200352313bc059445190', 'admin', 0),
('chalaka@gmail.com', 'f10e2821bbbea527ea02200352313bc059445190', 'admin', 0),
('oj@gmail.com', 'f10e2821bbbea527ea02200352313bc059445190', 'admin', 0),
('ishara@gmail.com', 'f10e2821bbbea527ea02200352313bc059445190', 'reception', 0),
('sachin@gmail.com', 'f10e2821bbbea527ea02200352313bc059445190', 'doctor', 0),
('supunchalaka123@gmail.com', 'f10e2821bbbea527ea02200352313bc059445190', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vaxination`
--

DROP TABLE IF EXISTS `vaxination`;
CREATE TABLE IF NOT EXISTS `vaxination` (
  `vaccine_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(255) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `baby_name` varchar(255) NOT NULL,
  `b_date` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `vaccine_1` date NOT NULL,
  `vaccine_2` date NOT NULL,
  `vaccine_3` date NOT NULL,
  `vaccine_4` date NOT NULL,
  `vaccine_5` date NOT NULL,
  `vaccine_6` date NOT NULL,
  `vaccine_7` date NOT NULL,
  `state` int(11) NOT NULL,
  `state2` int(11) NOT NULL,
  PRIMARY KEY (`vaccine_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaxination`
--

INSERT INTO `vaxination` (`vaccine_id`, `doctor_id`, `patient_id`, `baby_name`, `b_date`, `gender`, `vaccine_1`, `vaccine_2`, `vaccine_3`, `vaccine_4`, `vaccine_5`, `vaccine_6`, `vaccine_7`, `state`, `state2`) VALUES
(30, 'reg/5656/CGFddddd', '1002', 'Echo', '2020-10-15', 'M', '2020-12-15', '2021-02-15', '2021-04-15', '2021-07-15', '2022-04-15', '2023-10-15', '2025-10-15', 0, 1),
(29, 'reg/5656/CGFddddd', '1002', 'dishan', '2020-10-08', 'F', '2020-12-08', '2021-02-08', '2021-04-08', '2021-07-08', '2022-04-08', '2023-10-08', '2025-10-08', 0, 1),
(31, 'reg/5656/CGd', '1002', 'Alfa', '2020-11-17', 'F', '2021-01-17', '2021-03-17', '2021-05-17', '2021-08-17', '2022-05-17', '2023-11-17', '2025-11-17', 0, 0),
(32, 'reg/5656/CGd', '1003', 'Bravo', '2020-11-24', 'M', '2021-01-24', '2021-03-24', '2021-05-24', '2021-08-24', '2022-05-24', '2023-11-24', '2025-11-24', 0, 0),
(33, 'reg/5656/CGd', '1002', 'Charly', '2020-12-01', 'M', '2021-02-01', '2021-04-01', '2021-06-01', '2021-09-01', '2022-06-01', '2023-12-01', '2025-12-01', 0, 0),
(34, 'reg/5656/CGFddddd', '1003', 'Delta', '2020-12-08', 'F', '2021-02-08', '2021-04-08', '2021-06-08', '2021-09-08', '2022-06-08', '2023-12-08', '2025-12-08', 0, 0),
(35, 'reg/5656/CGd', '1002', 'nayomi', '2020-12-15', 'F', '2021-02-15', '2021-04-15', '2021-06-15', '2021-09-15', '2022-06-15', '2023-12-15', '2025-12-15', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `webtcr`
--

DROP TABLE IF EXISTS `webtcr`;
CREATE TABLE IF NOT EXISTS `webtcr` (
  `webTcrId` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(200) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `number` int(10) NOT NULL,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`webTcrId`),
  KEY `doctor_id` (`doctor_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `webtcrdoc`
--

DROP TABLE IF EXISTS `webtcrdoc`;
CREATE TABLE IF NOT EXISTS `webtcrdoc` (
  `count` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(15) NOT NULL,
  `patient_id` varchar(15) NOT NULL,
  `is_msg_send` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`count`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webtcrdoc`
--

INSERT INTO `webtcrdoc` (`count`, `doc_id`, `patient_id`, `is_msg_send`) VALUES
(43, 'doc001', 'p001', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
