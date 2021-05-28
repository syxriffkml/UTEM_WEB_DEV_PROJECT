-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2021 at 06:18 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_b032010352`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `app_1` varchar(1000) NOT NULL,
  `app_2` varchar(1000) NOT NULL,
  `app_3` varchar(1000) NOT NULL,
  `app_4` varchar(1000) NOT NULL,
  `app_5` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `document_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `transcript` varchar(1000) NOT NULL,
  `result_spm` varchar(1000) NOT NULL,
  `result_muet` varchar(1000) NOT NULL,
  `ic_photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `ic_num` varchar(12) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `ic_num`, `gender`, `email`, `password`) VALUES
(10, 'test', '123989992222', 'Lelaki', 'testing@yahoo.com', '123'),
(11, 'Syariff', '990226146869', 'Lelaki', 'vexr777@gmail.com', 'qwerty'),
(12, 'kai', '123989992222', 'Perempuan', 'kai123@yahoo.com', 'kai0999'),
(14, 'asd', '111111111111', 'Lelaki', '11a@yahoo.com', '111'),
(15, 'crynix777', '12121212', 'Lain-lain', 'hafizi_86@hotmail.com', 'asas'),
(16, 'eca', '745674564564', 'Perempuan', 'qsczaza@yahoo.com', 'eca111'),
(17, '#1 GODPLAYER', '453453453453', 'Lelaki', 'hafizi_86@hotmail.com', 'qwerty'),
(18, 'adam', '764573473475', 'Lelaki', 'adam@adamadam.com', 'adam'),
(19, 'kai2', '788645234321', 'Lelaki', 'kai2@yahoo.com', 'kai999'),
(20, 'vexr777@gmail.com', '990226146869', 'Lelaki', 'kai2@yahoo.com', '123'),
(21, 'asd', '12312312', 'Lelaki', 'dg@yahoodd.co', '123'),
(22, '1', '1', 'Lelaki', 'nalelo2929@leonvero.com', '1'),
(23, 'Nazzzzzzzzzzzzzzzzzzz', '121212144444', 'Perempuan', 'naz@yahoo.co.uk', '123'),
(24, 'Syariffffffffffffffffffff', '232312142352', 'Lelaki', 'syarifffffff@yahoo.com', '123'),
(25, 'hudaaaaaaaaaaaaaaaaaa', '768687905674', 'Lelaki', 'huda@gmail.com', '123'),
(26, 'afiq', '734563453453', 'Lelaki', 'afiqhamam@gmail.com', '123'),
(27, 'hehe', '345353534534', 'Lain-lain', 'hehe@hehe.co', '111'),
(28, 'gege', '23423423', 'Lain-lain', 'gege@yah.co', '123'),
(29, 'Syarifah', '992786734333', 'Lelaki', 'syaefa@yahoo.com', '123'),
(30, 'Syarifffffff', '212121212121', 'Lelaki', '7qwa3eyyu@yahoo.com', 'abc'),
(31, 'hehe19287615555', '192876155554', 'Perempuan', '19287615555@yahoo.com', '123'),
(32, 'asasas', '465745673', 'Lelaki', 'qsczaza@yahoo.com', '234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
