-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 03:21 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pets_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopt_pets`
--

CREATE TABLE `adopt_pets` (
  `id` int(9) NOT NULL,
  `author_id` int(9) DEFAULT NULL,
  `pet_name` varchar(100) NOT NULL,
  `category_id` int(9) DEFAULT NULL,
  `pet_img` varchar(200) NOT NULL,
  `location` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `pet_details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adopt_pets`
--

INSERT INTO `adopt_pets` (`id`, `author_id`, `pet_name`, `category_id`, `pet_img`, `location`, `address`, `pet_details`) VALUES
(3, 1, 'peacock', 3, 'bug-fix.png', 'dhaka', 'house #3, mirpur-1, dhaka.', 'fdsfsdafsfsda'),
(6, 6, 'jack', 2, 'dog4.jpg', 'dhaka ', 'farmgate', 'i ned money, that why i want sell my pet');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Cats'),
(2, 'Dogs'),
(3, 'Birds');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(10) NOT NULL,
  `users_id` int(10) DEFAULT NULL,
  `doctors_id` int(10) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `reply` text DEFAULT NULL,
  `is_seen` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `users_id`, `doctors_id`, `message`, `reply`, `is_seen`) VALUES
(1, 14, 1, '', 'h', 0),
(2, 14, 10, 'hi', NULL, 1),
(3, 14, 10, 'how are you?', NULL, 1),
(4, 14, 1, 'heello', NULL, 0),
(5, 14, 1, 'i am good', NULL, 0),
(6, 14, 1, 'nice', NULL, 0),
(7, 14, 5, 'hi\n', NULL, 0),
(8, 14, 5, 'how are you nwo', NULL, 0),
(9, 14, 5, 'fsd', NULL, 0),
(10, 14, 5, '', 'hi', 0),
(11, 14, 5, 'last', NULL, 0),
(12, 14, 5, 'fsd', NULL, 0),
(13, 5, 14, 'fsdfsd', NULL, 0),
(14, 1, 14, 'fdsfsd', NULL, 0),
(15, 1, 14, 'nope', NULL, 0),
(16, 1, 10, 'yes', NULL, 1),
(17, 14, 6, 'how are u\n', NULL, 0),
(18, 14, 6, 'hi\n', NULL, 0),
(19, 14, 6, 'book. It has survived not only five centuries, ', NULL, 0),
(20, 14, 5, 'hi', NULL, 0),
(21, 14, 5, 'kldsjfd', NULL, 0),
(22, 14, 6, 'fdsfas', NULL, 0),
(23, 14, 6, 'fdsa', NULL, 0),
(24, 14, 6, 'hei id 14', NULL, 0),
(25, 1, 14, 'how are you ', NULL, 0),
(26, 14, 5, 'hi', NULL, 0),
(27, 14, 5, 'dfsdaf', '', 0),
(28, 1, 14, 'hi\n', NULL, 0),
(29, 1, 14, '', 'hi again', 0),
(30, 14, 1, 'hello sir', '', 0),
(31, 1, 14, '', 'he', 0),
(32, 1, 14, '', 'hi', 0),
(33, 14, 10, '', 'test', 1),
(34, 14, 10, '', 'i am here', 1),
(35, 14, 5, 'hi', '', 0),
(36, 14, 10, 'hi', '', 1),
(37, 14, 10, '', 'hello sir', 1),
(38, 14, 10, '', 'hi', 1),
(39, 14, 10, 'fjsdk', '', 1),
(40, 14, 10, '', 'gfgf', 1),
(41, 14, 10, 'hi\n', '', 1),
(42, 14, 10, 'fsdfs', '', 1),
(43, 14, 10, '', 'how old are your pet?', 1),
(44, 14, 10, 'hi', '', 1),
(45, 14, 10, 'how are you', '', 1),
(46, 14, 10, '', 'yeah, I am fine. how about you?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(9) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(9) DEFAULT NULL,
  `user_name` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(9) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(155) NOT NULL,
  `password` int(20) NOT NULL DEFAULT 12345,
  `designation` varchar(120) NOT NULL,
  `picture` varchar(120) NOT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(9) NOT NULL,
  `liker` int(9) DEFAULT NULL,
  `post` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `liker`, `post`) VALUES
(1, 6, 1),
(2, 6, 1),
(3, 6, 1),
(4, 6, 1),
(5, 6, 1),
(6, 6, 1),
(23, 6, 17),
(24, 6, 14),
(25, 6, 13),
(27, 6, 12),
(30, 6, 18),
(69, 3, 17),
(70, 3, 17),
(84, 14, 49);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(9) NOT NULL,
  `author_id` int(9) DEFAULT NULL,
  `post_text` text NOT NULL,
  `post_file` varchar(200) NOT NULL,
  `post_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `post_text`, `post_file`, `post_date`) VALUES
(13, 3, 'updated', 'dog2.jpg', '03-08-2021, 12:32am'),
(15, 4, 'updated', 'dog2.jpg', '03-08-2021, 12:32am'),
(20, 5, 'jhjhu', '', '16-10-2021, 02:35pm'),
(21, 5, 'test cropper', 'upload/616a8ffb14057.png', '16-10-2021, 02:40pm'),
(22, 5, 'test test ', 'uploads/posts/616a90778b39f.png', '16-10-2021, 02:42pm'),
(23, 5, 'tejfklsd tesklj sfds', '616a915c39704.png', '16-10-2021, 02:46pm'),
(24, 5, 'fdfsdfads', '616a93f158d73.png', '16-10-2021, 02:57pm'),
(25, 5, 'fgdtgdfgdsfgfds', '616a943812a0e.png', '16-10-2021, 02:58pm'),
(26, 5, 'fdgdfgfdsgfds', '0', '16-10-2021, 03:02pm'),
(27, 5, 'dsfsdafsda', 'Array', '16-10-2021, 03:16pm'),
(28, 5, 'dsfsdfsdafsda', 'uploads/posts/616a991266562.png', '16-10-2021, 03:19pm'),
(29, 5, 'dsfsdafsda', 'l', '16-10-2021, 03:20pm'),
(30, 5, 'fdsafsdfdsa', 'css3.png', '16-10-2021, 09:26pm'),
(31, 5, 'fsdafsdafa', 'mizan-md.jpg', '16-10-2021, 09:38pm'),
(32, 5, '', '1634405085.png', '16-10-2021, 11:24pm'),
(33, 5, '', '1634405167.png', '16-10-2021, 11:26pm'),
(34, 5, '', '1634405537.png', '16-10-2021, 11:32pm'),
(35, 5, '', '1634405606.png', '16-10-2021, 11:33pm'),
(36, 5, '', '1634405832.png', '16-10-2021, 11:37pm'),
(37, 5, 'This is atest p image before upload and insert to database using PHP Mysqli an', '1634406389.png', '16-10-2021, 11:46pm'),
(38, 5, 'This is atest p image before upload and insert to database using PHP Mysqli an', '1634406438.png', '16-10-2021, 11:47pm'),
(39, 5, 'fdsfsafsdaf', '1634407825.png', '17-10-2021, 12:10am'),
(40, 5, 'fdfsadafsda', '1634407949.png', '17-10-2021, 12:12am'),
(41, 5, '', '1634409167.png', '17-10-2021, 12:32am'),
(42, 5, '', '1634409426.png', '17-10-2021, 12:37am'),
(43, 5, '', '1634409537.png', '17-10-2021, 12:38am'),
(44, 5, 'fdsfdsafsdafsda', '1634409629.png', '17-10-2021, 12:40am'),
(45, 5, 'ustry. m passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu', '1634410288.png', '17-10-2021, 12:51am');

-- --------------------------------------------------------

--
-- Table structure for table `sell_pets`
--

CREATE TABLE `sell_pets` (
  `id` int(9) NOT NULL,
  `author_id` int(9) DEFAULT NULL,
  `pet_name` varchar(50) NOT NULL,
  `category_id` int(9) DEFAULT NULL,
  `pet_price` int(9) NOT NULL,
  `pet_img` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `pet_details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell_pets`
--

INSERT INTO `sell_pets` (`id`, `author_id`, `pet_name`, `category_id`, `pet_price`, `pet_img`, `location`, `address`, `pet_details`) VALUES
(3, 4, 'rabit', 2, 3000, 'mizan.jpg', 'khulna', 'Shial bari more, Mirpur-2, Dhaka-1216', 'fsdfsdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(9) NOT NULL,
  `fulll_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `accept_conditoins` varchar(200) NOT NULL,
  `bio` varchar(500) DEFAULT 'Write your Bio here whihin 500 characters.',
  `image` varchar(100) DEFAULT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `fulll_name`, `email`, `phone`, `password`, `accept_conditoins`, `bio`, `image`, `verification_code`, `is_verified`) VALUES
(4, 'mizan rahaman', 'mizan88developer@gmail.com', 4565454, '123', 'Accepts turms and conditions', 'Write your Bio here whihin 500 characters.', NULL, '', 1),
(5, 'shakil', 'shakil@gmail.com', 147852369, '12347', 'Accepts turms and conditions', 'Write your Bio here whihin 500 characters.', NULL, '', 0),
(17, 'test', 'mizan522151@gmail.com', 56789789, '123', 'Accept the terms & policies', 'Write your Bio here whihin 500 characters.', NULL, 'd40ed176ae1e4f444077df1c6b9ac499', 1);

-- --------------------------------------------------------

--
-- Table structure for table `super_users`
--

CREATE TABLE `super_users` (
  `id` int(10) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_users`
--

INSERT INTO `super_users` (`id`, `name`, `email`, `password`) VALUES
(1, 'shakil khan', 'shakil@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopt_pets`
--
ALTER TABLE `adopt_pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_pets`
--
ALTER TABLE `sell_pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_users`
--
ALTER TABLE `super_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopt_pets`
--
ALTER TABLE `adopt_pets`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sell_pets`
--
ALTER TABLE `sell_pets`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `super_users`
--
ALTER TABLE `super_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
