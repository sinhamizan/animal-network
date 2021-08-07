-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 07:06 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
(1, 1, 'dog', 1, 'Array', 'dhaka', 'house #3, mirpur-1, dhaka.', ', I am a dot net core developer. I am looking for a angular js frontend expert who can work with me'),
(2, 4, 'test', 2, 'css3.png', 'dhaka', 'Mirpur-2, Dhaka-1216', 'dfs'),
(3, 1, 'peacock', 3, 'bug-fix.png', 'dhaka', 'house #3, mirpur-1, dhaka.', 'fdsfsdafsfsda'),
(4, 3, 'dove', 3, 'screen.jpg', 'Rajshahi', 'rajshahi', 'very cute'),
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
(1, 3, 'this is a post', 'dog.jpg', '03-08-2021, 12:36am'),
(3, 6, 'updated imge test', '101243457_2743510885893152_3899518245329174528_n.jpg', '05-08-2021, 02:25am'),
(4, 1, ' Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, rem', 'dog2.jpg', '03-08-2021, 12:32am'),
(5, 5, 'updated', 'dog2.jpg', '03-08-2021, 12:32am'),
(6, 6, 'updated', 'dog2.jpg', '03-08-2021, 12:32am'),
(8, 6, 'updated', 'dog2.jpg', '03-08-2021, 12:32am'),
(9, 6, 'updated', 'dog2.jpg', '03-08-2021, 12:32am'),
(10, 6, 'updated', 'dog2.jpg', '03-08-2021, 12:32am'),
(11, 1, 'updated', 'dog2.jpg', '03-08-2021, 12:32am'),
(12, 6, 'updated', 'dog2.jpg', '03-08-2021, 12:32am'),
(13, 3, 'updated', 'dog2.jpg', '03-08-2021, 12:32am'),
(14, 6, 'updated success', 'rabit3.jpg', '05-08-2021, 03:15am'),
(15, 4, 'updated', 'dog2.jpg', '03-08-2021, 12:32am'),
(17, 6, 'fsdfsd  Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, rem', 'donate.jpg', '05-08-2021, 03:37am'),
(18, 6, ' ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release', 'download (7).jpg', '07-08-2021, 11:04pm');

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
(1, 1, 'test', 1, 45, 'logo.png', 'dhaka', 'house #3, mirpur-1, dhaka.', 'fsdfsdafsda'),
(2, 1, 'test', 2, 45, 'html-5.png', 'dhaka', 'house #3, mirpur-1, dhaka.', 'fdsfsda'),
(3, 4, 'rabit', 2, 3000, 'mizan.jpg', 'khulna', 'Shial bari more, Mirpur-2, Dhaka-1216', 'fsdfsdfsd'),
(4, 3, 'peacock', 3, 2500, 's.jpg', 'khulna', 'rajshahi', 'need urgent money');

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
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `fulll_name`, `email`, `phone`, `password`, `accept_conditoins`, `bio`, `image`) VALUES
(1, 'nahid hasan', 'mizan522151@gmail.com', 45454646, '123', 'on', 'Write your Bio here whihin 500 characters.', NULL),
(3, 'hamifur tahman', 'test@gmail.com', 152362541, '12345', 'Accepts turms and conditions', 'I am a student.', 'mizan-md.jpg'),
(4, 'mizan rahaman', 'mizan88developer@gmail.com', 4565454, '123', 'Accepts turms and conditions', 'Write your Bio here whihin 500 characters.', NULL),
(5, 'shakil', 'shakil@gmail.com', 147852369, '12347', 'Accepts turms and conditions', 'Write your Bio here whihin 500 characters.', NULL),
(6, 'habibur rahaman', 'habib@gmail.com', 1254878569, 'habib', 'Accepts turms and conditions', 'I am Habibur Rahman.', 'dog2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopt_pets`
--
ALTER TABLE `adopt_pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adopter` (`author_id`),
  ADD KEY `category2` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`author_id`);

--
-- Indexes for table `sell_pets`
--
ALTER TABLE `sell_pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller` (`author_id`),
  ADD KEY `category` (`category_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopt_pets`
--
ALTER TABLE `adopt_pets`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sell_pets`
--
ALTER TABLE `sell_pets`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adopt_pets`
--
ALTER TABLE `adopt_pets`
  ADD CONSTRAINT `adopter` FOREIGN KEY (`author_id`) REFERENCES `signup` (`id`),
  ADD CONSTRAINT `category2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `test` FOREIGN KEY (`author_id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `sell_pets`
--
ALTER TABLE `sell_pets`
  ADD CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `seller` FOREIGN KEY (`author_id`) REFERENCES `signup` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
