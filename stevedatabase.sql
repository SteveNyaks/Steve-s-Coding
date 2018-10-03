-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2018 at 04:54 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stevedatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`username`, `password`, `email`) VALUES
('Delman', 'qwerty', 'mmgn@gmail.com'),
('Richard', 'laptop64', 'rasubonteng001@st.ug.edu.gh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentinfo`
--

CREATE TABLE `tbl_studentinfo` (
  `id` varchar(8) NOT NULL,
  `surname` varchar(15) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `othername` varchar(10) NOT NULL,
  `gender` enum('male','feamale') NOT NULL,
  `DOB` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `campus` enum('main','city','others') NOT NULL,
  `yearofenterance` varchar(4) NOT NULL,
  `yearofdeparture` varchar(4) NOT NULL,
  `course` varchar(25) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `hallofresidence` varchar(20) NOT NULL,
  `guardian_number` varchar(13) NOT NULL,
  `student_pic` blob,
  `student_level` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_studentinfo`
--

INSERT INTO `tbl_studentinfo` (`id`, `surname`, `firstname`, `othername`, `gender`, `DOB`, `email`, `campus`, `yearofenterance`, `yearofdeparture`, `course`, `phone_number`, `hallofresidence`, `guardian_number`, `student_pic`, `student_level`) VALUES
('10606745', 'Dan', 'Llyod', 'Kelvin', 'male', '2018-06-07', 'mmgn@gmail.com', 'main', '2018', '2022', 'Comp Scienec', '+23347868405', 'Pent', '2337864532214', '', '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_studentinfo`
--
ALTER TABLE `tbl_studentinfo`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
