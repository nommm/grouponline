-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2023 at 06:14 PM
-- Server version: 5.7.12-log
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group1`
--

-- --------------------------------------------------------

--
-- Table structure for table `grouptable`
--

CREATE TABLE `grouptable` (
  `gid` varchar(5) NOT NULL,
  `gname` varchar(100) NOT NULL,
  `gtotal` int(11) NOT NULL,
  `gamount` int(11) NOT NULL,
  `gplace` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grouptable`
--

INSERT INTO `grouptable` (`gid`, `gname`, `gtotal`, `gamount`, `gplace`) VALUES
('00001', 'อาหารไทย', 15, 4, 'โรงอาหาร'),
('00002', 'อาหารลาว', 15, 7, 'โรงอาหาร'),
('00003', 'แบดมินตัน', 10, 10, 'อาคารพระสมุทรคุรนาจา'),
('00004', 'ฟุตบอล', 14, 14, 'โดมหลวงปู่ฮะ'),
('00005', 'คอมพิวเตอร์กราฟฟิก', 20, 20, 'ห้อง137'),
('00006', 'เทคนิคช่างไฟ', 10, 5, 'หน้าตึก6'),
('00007', 'บอลเลบอล', 14, 14, 'โดมหลวงปู่ฮะ'),
('00008', 'รักการอ่าน', 10, 4, 'ห้องสมุด');

-- --------------------------------------------------------

--
-- Table structure for table `selectevent`
--

CREATE TABLE `selectevent` (
  `senum` int(5) NOT NULL,
  `setime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stuid` varchar(5) NOT NULL,
  `gid` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `selectevent`
--

INSERT INTO `selectevent` (`senum`, `setime`, `stuid`, `gid`) VALUES
(1, '2022-12-28 17:09:15', '09005', '00005'),
(2, '2022-12-28 17:05:25', '09002', '00001'),
(3, '2023-01-03 10:13:59', '25252', '00001');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stuid` varchar(5) NOT NULL,
  `stnametltle` varchar(10) NOT NULL,
  `stname` varchar(100) NOT NULL,
  `stgrade` varchar(10) NOT NULL,
  `sttel` varchar(10) NOT NULL,
  `stpassword` varchar(100) NOT NULL,
  `stuserlevel` varchar(10) NOT NULL,
  `stcreatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stuid`, `stnametltle`, `stname`, `stgrade`, `sttel`, `stpassword`, `stuserlevel`, `stcreatetime`) VALUES
('09001', 'mr', 'Ausadang', '5/3', '0613379946', '12345678', 'admin', '2022-12-25 07:17:37'),
('09002', '', 'Ausadang', '5/3', '0613379946', '12345678', 'student', '2022-12-25 07:17:37'),
('09003', 'mr', 'Ausadang', '5/3', '0613379946', '12345678', 'student', '2022-12-25 07:17:37'),
('09005', '', 'อัษฎางค์ ศักดิ์สิงห์', '1/1', '0613379946', '12345678', 'student', '2022-12-25 07:17:37'),
('25252', '', 'อัษฎางค์ ศักดิ์สิงห์', '1/1', '0613379946', '12345678', 'student', '2022-12-25 07:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tcuid` varchar(5) NOT NULL,
  `tcnametitle` varchar(10) NOT NULL,
  `tcname` varchar(100) NOT NULL,
  `tctel` varchar(10) NOT NULL,
  `tcemail` varchar(100) NOT NULL,
  `tcpassword` varchar(100) NOT NULL,
  `tcuserlevel` varchar(10) NOT NULL,
  `gid` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tcuid`, `tcnametitle`, `tcname`, `tctel`, `tcemail`, `tcpassword`, `tcuserlevel`, `gid`) VALUES
('00001', 'นาย', 'อัษฎางค์ ศักดิ์สิงห์', '0613379946', 'ausadang@gmail.com', '12345678', 'teacher', '00001'),
('00002', 'นาย', 'อัษฎางค์ l6fs]jv', '0613379946', 'ausadang@gmail.com', '12345678', 'teacher', '00003'),
('00003', 'นาย', 'อัษฎางค์ k', '0613379946', 'ausadang@gmail.com', '12345678', 'teacher', '00003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grouptable`
--
ALTER TABLE `grouptable`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `selectevent`
--
ALTER TABLE `selectevent`
  ADD PRIMARY KEY (`senum`),
  ADD KEY `stuid` (`stuid`),
  ADD KEY `gid` (`gid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stuid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tcuid`),
  ADD KEY `gid` (`gid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `selectevent`
--
ALTER TABLE `selectevent`
  MODIFY `senum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `selectevent`
--
ALTER TABLE `selectevent`
  ADD CONSTRAINT `selectevent_ibfk_1` FOREIGN KEY (`stuid`) REFERENCES `student` (`stuid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `selectevent_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `grouptable` (`gid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `grouptable` (`gid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
