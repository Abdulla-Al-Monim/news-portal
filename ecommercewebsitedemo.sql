-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 04:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercewebsitedemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` varchar(255) NOT NULL,
  `cat_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_status`) VALUES
(4, 'World', 'this is world category', '1'),
(5, 'Home', 'This is Home category', '1'),
(6, 'Sport', 'this is sport category', '1'),
(7, 'Lifestyle', 'This is Lifestyle category', '1');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `C_commests` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `c_status` int(11) NOT NULL,
  `c_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `c_name`, `C_commests`, `post_id`, `c_status`, `c_date`) VALUES
(4, '1', 'i am monim\r\n', 5, 2, '2020-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `image`, `cat_id`, `author_id`, `post_date`) VALUES
(5, 'লকডাউন ওয়ারী: ', 'রান ঢাকার ওয়ারীর লকডাউন এলাকায় গত রোববার করোনাভাইরাস পরীক্ষায় নমুনা দিয়েছিলেন ১৩ জন। তাদের মধ্যে ১২ জনই কোভিড-১৯ পজিটিভ। মঙ্গলবার এ ফল দিয়েছে সরকারের রোগতত্ত্ব, রোগ নিয়ন্ত্রণ ও গবেষণা প্রতিষ্ঠান (আইইডিসিআর)। \r\n', '28733_159385_6903_469175_51762333_2270785769867073_4370612484810211328_o.jpg', 4, 9, '2020-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `sub_email` varchar(255) NOT NULL,
  `sub_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`sub_id`, `sub_name`, `sub_email`, `sub_pass`) VALUES
(1, 'monim', 'monim@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `role` int(2) NOT NULL DEFAULT 2 COMMENT '1= admin,2=editor',
  `status` int(2) NOT NULL DEFAULT 0 COMMENT '0= in-active,1=active',
  `image` text DEFAULT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `user_name`, `password`, `phone`, `address`, `role`, `status`, `image`, `join_date`) VALUES
(1, 'Abdulla al monim Rasel', 'abdullaalmonim@gmail.com', 'monim', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '01723030645', 'Kalihati', 1, 1, '307111_person.JPG', '2020-06-22'),
(9, 'rasel monim', 'monim@gmail.com', 'monim', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01723030645', 'kalihati', 1, 1, '469175_51762333_2270785769867073_4370612484810211328_o.jpg', '2020-07-08'),
(11, 'rasel', 'ra@gmail.com', 'monim', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '01712154865', 'kalihati', 2, 1, '6903_469175_51762333_2270785769867073_4370612484810211328_o.jpg', '2020-07-13'),
(12, 'asha', 'asha@gmail.com', 'asha', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0171215478', 'kalihati', 2, 1, NULL, '0000-00-00'),
(13, 'asha', 'asha@gmail.com', 'asha', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 'kalihati', 2, 0, NULL, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
