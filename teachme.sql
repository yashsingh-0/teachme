-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2021 at 10:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teachme`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$f/MRz1gfUuUyaj1ipbPrb.nVQ7DG3KDNlP9O3/MlKByEhkrRQpmmW'),
(2, 'second admin', 'sec_admin@gmail.com', '$2y$10$YfiMgwtbjnv/3gAXYcjqVOBpoZmSJRkha74sQXD5ZVgXbaOzkiNZC');

-- --------------------------------------------------------

--
-- Table structure for table `requests_info`
--

CREATE TABLE `requests_info` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `maths` int(11) NOT NULL,
  `physics` int(11) NOT NULL,
  `chemistry` int(11) NOT NULL,
  `biology` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests_info`
--

INSERT INTO `requests_info` (`id`, `email`, `maths`, `physics`, `chemistry`, `biology`) VALUES
(5, 'yashkumar2566@gmail.com', 2, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_info`
--

CREATE TABLE `teachers_info` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers_info`
--

INSERT INTO `teachers_info` (`id`, `name`, `email`, `subject`, `password`) VALUES
(1, 'Teacher_1', 'teacher@gmail.com', 'Maths', '$2y$10$f/MRz1gfUuUyaj1ipbPrb.nVQ7DG3KDNlP9O3/MlKByEhkrRQpmmW'),
(2, 'Teacher_2', 'teacher2@gmail.com', 'Computers', '$2y$10$90ZD6jYyPlvKiwOZvsESFeqVy77l1kYZ2LSKm9PE8Q7od1s/moMGu'),
(3, 'teacher3', 'teacher3@gmail.com', 'Hindi', '$2y$10$JhDR8UMpnglX1P7OimoRY.MVXsPkyuYF7ckeVF3O5C4Kye8aQAxEW');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `verified` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `email`, `occupation`, `password`, `verified`) VALUES
(1, 'Yash', 'yash@gmail.com', 'Parent', '4444', 0),
(2, 'yash', 'yash@gmail.com', 'Student', '$2y$10$uZ/IDLbsdu.oakKuSeQrouyq.vGtaT7oVB2AyVFLe/G.ldRvlG5F2', 0),
(3, 'Yash Singh', 'yash@gmail.com', 'Student', '$2y$10$xGsvj4b014L6uxvi/D29ju5TBHatV8q.7/9vTXz61j6AYKBzKyBUW', 0),
(4, 'yash', 'yash@gmail.com', 'Student', '$2y$10$abtDGTenJvb6LHaru8bCo.KWf4H8i/bybU1X7kzQUb.rMy.EBJqqu', 0),
(5, 'yash', 'yashkumar2566@gmail.com', 'Parent', '$2y$10$lYdMUVTzrGC.BMfueAkGleSwbev75SwSvOt72ajajeP0Npgv.8O.C', 0),
(6, 'Yash Singh', 'abcd@gmail.com', 'Student', '$2y$10$ek.JHZxIM8jZhX33LFP7auvkMVwBRFL7L4je.cStM8sdOk15pYj4y', 0),
(7, 'acvasd', 'for@sad.com', 'Student', '$2y$10$sfZnzexlu3ZNgFm3F2rz9OhOg9g3nwG.t4aWTrSRpqEueTDBxO29K', 0),
(8, 'admin', 'admin@gmail.com', 'Parent', '$2y$10$f/MRz1gfUuUyaj1ipbPrb.nVQ7DG3KDNlP9O3/MlKByEhkrRQpmmW', 0),
(9, 'babu bhai ', 'babuy@gmail.com', 'Student', '$2y$10$wrg2H5lKH4WWorV/BktEH.a2tpBPkepguXdJpyHLz7RgETdAm74Li', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests_info`
--
ALTER TABLE `requests_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_info`
--
ALTER TABLE `teachers_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requests_info`
--
ALTER TABLE `requests_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers_info`
--
ALTER TABLE `teachers_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
