-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2021 at 03:59 PM
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
  `uni1` varchar(300) NOT NULL,
  `course1` varchar(300) NOT NULL,
  `uni2` varchar(300) NOT NULL,
  `course2` varchar(300) NOT NULL,
  `uni3` varchar(300) NOT NULL,
  `course3` varchar(300) NOT NULL,
  `uni4` varchar(300) NOT NULL,
  `course4` varchar(300) NOT NULL,
  `uni5` varchar(300) NOT NULL,
  `course5` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `user_id`, `uni1`, `course1`, `uni2`, `course2`, `uni3`, `course3`, `uni4`, `course4`, `uni5`, `course5`) VALUES
(1, 1, '(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA', 'SARJANA MUDA SAINS KEMANUSIAAN', '(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA', 'SARJANA MUDA SAINS KOMPUTER (PENGURUSAN PANGKALAN DATA)', '(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS', 'SARJANA MUDA PENDIDIKAN (BIMBINGAN DAN KAUNSELING)', '(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA', 'SARJANA MUDA SAINS KOMPUTER (KEPINTARAN BUATAN)', '(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA', 'SARJANA MUDA SAINS KOMPUTER (PEMBANGUNAN PERISIAN)');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `document_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `transcript` varchar(500) NOT NULL,
  `result_spm` varchar(500) NOT NULL,
  `result_muet` varchar(500) NOT NULL,
  `ic_photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`document_id`, `user_id`, `transcript`, `result_spm`, `result_muet`, `ic_photo`) VALUES
(1, 1, 'transcript1.jpg', 'result_spm1.pdf', 'result_muet1.pdf', 'ic_photo1.jpg'),
(2, 2, 'transcript2.png', 'result_spm2.jpg', 'result_muet2.png', 'ic_photo2.png');

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
(1, 'Syarep', '991226146969', 'Lelaki', 'syarep1@gmail.com', 'test123'),
(2, 'Naz', '990119122222', 'Perempuan', 'nananana@yahoo.com', '098765');

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `detail_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `birthplace` varchar(20) NOT NULL,
  `marital_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`detail_id`, `user_id`, `fullname`, `address`, `phone1`, `phone2`, `birthplace`, `marital_status`) VALUES
(1, 1, 'Muhammad Syariff Kamil Bin Sypudin ', 'Rawang, Selangor', '0176266581', '0192727232', 'Selagor', 'Bujang'),
(2, 2, 'Naz Binti Syafiq', 'Shah Alam', '0162664389', '0124464389', 'Selagor', 'Berkahwin');

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
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userdetail`
--
ALTER TABLE `userdetail`
  MODIFY `detail_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
