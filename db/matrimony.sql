-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2021 at 09:24 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matrimony`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(255) NOT NULL,
  `sent_by` varchar(255) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `createdAt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sent_by`, `received_by`, `message`, `createdAt`) VALUES
(24, 'rashmi@gmail.com', 'khalidraza362001@gmail.com', 'hello ', '2021-10-08 07:25:17pm'),
(25, 'khalidraza362001@gmail.com', 'rashmi@gmail.com', 'gfghfghfg', '2021-10-08 07:25:28pm'),
(26, 'khalidraza362001@gmail.com', 'ramesh@gmail.com', 'uiouio', '2021-10-08 07:45:13pm'),
(27, 'ramesh@gmail.com', 'khalidraza362001@gmail.com', 'gggg', '2021-10-08 08:04:15pm'),
(28, 'khalidraza362001@gmail.com', 'rashmi@gmail.com', 'sdfs', '2021-10-08 08:43:52pm'),
(29, 'rashmi@gmail.com', 'khalidraza362001@gmail.com', 'asdfasd', '2021-10-08 08:52:35pm'),
(30, 'rashmi@gmail.com', 'khalidraza362001@gmail.com', 'fgd', '2021-10-08 08:52:45pm'),
(31, 'rashmi@gmail.com', 'khalidraza362001@gmail.com', 'dfgdf', '2021-10-08 08:52:48pm'),
(32, 'khalidraza362001@gmail.com', 'rashmi@gmail.com', 'dsfg', '2021-10-08 08:52:51pm'),
(33, 'khalidraza362001@gmail.com', 'rashmi@gmail.com', 'sdfg', '2021-10-08 08:52:54pm');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `cust_id` int(20) NOT NULL,
  `profileimage` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `maritalstatus` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` int(10) NOT NULL,
  `age` varchar(255) NOT NULL,
  `height` int(10) NOT NULL,
  `weight` int(10) NOT NULL,
  `profilecreatedfor` varchar(255) NOT NULL,
  `drinking` varchar(255) NOT NULL,
  `smoking` varchar(255) NOT NULL,
  `mothertongue` varchar(255) NOT NULL,
  `diet` varchar(255) NOT NULL,
  `dateofbirth` varchar(10) NOT NULL,
  `placeofbirth` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `horoscope` text NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `workprofile` text NOT NULL,
  `jobrole` text NOT NULL,
  `annualincome` int(255) NOT NULL,
  `aboutyourself` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `profilecreationdate` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `cust_id`, `profileimage`, `firstname`, `lastname`, `maritalstatus`, `gender`, `state`, `city`, `pincode`, `age`, `height`, `weight`, `profilecreatedfor`, `drinking`, `smoking`, `mothertongue`, `diet`, `dateofbirth`, `placeofbirth`, `religion`, `horoscope`, `qualification`, `workprofile`, `jobrole`, `annualincome`, `aboutyourself`, `phone`, `profilecreationdate`) VALUES
(55, 30, '1.jpg', 'ramesh', 'kumar', 'Single', 'Male', 'Andhra Pradesh', 'Visakhapatnam', 400604, '20', 0, 0, '', '', '', 'Telgu', '', '2222-02-22', 'jg', 'Hindu', 'u', 'y', '', 'uyg', 0, 'uy', '7045201798', ''),
(56, 31, '5.jpg', 'sultan', 'Shaikh', 'Married', 'Male', 'Maharashtra', 'Mumbai', 400604, '35', 0, 0, 'Choose your preference', 'Choose your preference', 'Choose your preference', 'Hindi', 'Choose your preference', '3333-03-31', 'hjghjghjg', 'Muslim', 'jhgjh', 'gjhg', 'Your work Profile', 'jhg', 0, 'jhg', 'jhg', '2021-09-24 22:11:44'),
(60, 32, 'a5.jpg', 'Suresh', 'Jadhav', 'Divorsed', 'Male', 'Single', 'Mumbai', 400604, '22', 5, 51, 'Self', 'Yes', 'Sometimes', 'Tamil', 'Non-Vegetarian', '2003-02-22', 'VY', 'Marathi', 'UI', 'K', 'Private Sector', 'NJN', 200000, 'KN', '7045201798', ''),
(61, 33, '4.jpg', 'rashmi', 'kj', 'Married', 'Female', 'Karnataka', 'Banglore', 0, '25', 0, 0, 'Self', 'Choose your preference', 'Choose your preference', 'Kannada', 'Choose your preference', '3333-03-31', 'kjlj', 'Christian ', 'lkjkl', 'jkl', 'Your work Profile', 'kjlkj', 0, 'jlk', 'jkj', '2021-09-25 20:05:26'),
(66, 34, 'p12.jpg', 'Rakesh', 'Sharma', 'Single', 'Male', 'Gujarat', 'Surat', 400505, '34', 23, 50, 'Single', 'Single', 'Single', 'Marathi', 'Single', '2222-02-22', 'Surat', 'Gujarati', 'Scorpio', 'Graduate', 'Married', 'Clerk', 4000000, 'lsdkjfflkjsadlkfjlk', '07045201798', '2021-09-29 14:39:10'),
(67, 41, 'messaging.png', 'Khalidraza', 'Shaikh', 'Select your marital status', 'Select your Gender', 'Maharashtra', 'Mumbai', 400604, 'ghj', 0, 0, 'Choose your preference', 'Choose your preference', 'Choose your preference', 'Choose your preference', 'Choose your preference', '2222-02-22', 'jhgjhg', 'jhg', 'gjh', 'gjhg', 'Your work Profile', 'jhgj', 0, 'ghjg', 'hjg', '2021-10-03 23:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usertype`, `status`, `dt`) VALUES
(30, 'khalid', 'khalidraza362001@gmail.com', 'asdf', 'User', 'Active', '2021-09-24 21:25:45'),
(31, 'ramesh', 'ramesh@gmail.com', 'asdf', 'User', 'Active', '2021-09-24 21:57:59'),
(32, 'kamlesh', 'kamlesh@gmail.com', 'asdf', 'User', 'Inactive', '2021-09-25 19:59:23'),
(33, 'rashmi', 'rashmi@gmail.com', 'asdf', 'User', 'Active', '2021-09-25 20:04:53'),
(34, 'rakesh', 'rakesh12@gmail.com', 'asdfg', 'User', 'Active', '2021-09-25 20:27:19'),
(35, 'rk', 'rk@gmail.com', 'asdf', 'User', 'Active', '2021-09-25 20:29:15'),
(36, 'admin', 'admin@gmail.com', 'asdf', 'Admin', 'Active', '2021-10-02 22:59:42'),
(43, 'rahul', 'rahul@gmail.com', 'asdf', 'User', 'Active', '2021-10-05 07:45:21'),
(45, 'a', 'a@gmail.com', 'asdf', 'User', 'Active', '2021-10-05 22:55:30'),
(46, 'drakealpha3', 's@gmail.com', 'asdf', 'User', 'Active', '2021-10-05 23:51:55'),
(47, 'sdf', 'asdasd@gmail.com', 'asdf', 'User', 'Active', '2021-10-06 00:33:43'),
(48, 'b', 'b@gmail.com', 'asdf', 'User', 'Active', '2021-10-06 00:42:55'),
(56, 'asdf', 'ase@gmail.com', 'asdf', 'Admin', 'Active', '2021-10-08 21:14:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`);
ALTER TABLE `profiles` ADD FULLTEXT KEY `maritalstatus` (`maritalstatus`);
ALTER TABLE `profiles` ADD FULLTEXT KEY `gender` (`gender`,`maritalstatus`,`city`,`state`,`religion`,`mothertongue`);
ALTER TABLE `profiles` ADD FULLTEXT KEY `age` (`age`);
ALTER TABLE `profiles` ADD FULLTEXT KEY `gender_2` (`gender`,`state`,`city`);
ALTER TABLE `profiles` ADD FULLTEXT KEY `gender_3` (`gender`,`state`);
ALTER TABLE `profiles` ADD FULLTEXT KEY `aboutyourself` (`aboutyourself`);
ALTER TABLE `profiles` ADD FULLTEXT KEY `maritalstatus_2` (`maritalstatus`);
ALTER TABLE `profiles` ADD FULLTEXT KEY `maritalstatus_3` (`maritalstatus`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
