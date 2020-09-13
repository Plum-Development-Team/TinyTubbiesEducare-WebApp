-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 05:44 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tinytubieseducare`
--

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `child_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `repository` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tasklist`
--

CREATE TABLE `tasklist` (
  `tasklist_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `forgotten_answer` varchar(100) NOT NULL,
  `log_in` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_profile`, `user_country`, `user_gender`, `forgotten_answer`, `log_in`) VALUES
(1, 'chiko', '12345678', 'chiko@gmail.com', 'images/mcLogo.png.40', 'Camps Bay', 'Male', 'chikomutandwa', 'Offline'),
(3, 'sam', '12345678', 'sam@gmail.com', 'images/black-background-hd-wallpapers-11.jpg.52', 'GrassyPark', 'Male', '', 'Offline'),
(4, 'mutale', '12345678', 'mutale@gmail.com', 'images/images.png', 'Clarmont', 'Female', '', 'Offline'),
(5, 'Kangwa', '87654321', 'kangwa@gmail.com', 'images/1509844786195.jpeg.69', 'Mowbray', 'Female', '', 'Offline'),
(6, 'khuliso', '001113Kp', 'nyathelakhuliso@gmail.com', 'images/images.png', 'Camps Bay', 'Female', '', 'Offline'),
(7, 'joe', '12345678', 'joe@yahoo.com', 'images/images.png', 'Mowbray', 'Male', 'joe123', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `users_chat`
--

CREATE TABLE `users_chat` (
  `msg_id` int(11) NOT NULL,
  `sender_username` varchar(100) NOT NULL,
  `receiver_username` varchar(100) NOT NULL,
  `msg_content` varchar(255) NOT NULL,
  `msg_status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_chat`
--

INSERT INTO `users_chat` (`msg_id`, `sender_username`, `receiver_username`, `msg_content`, `msg_status`, `msg_date`) VALUES
(2, 'mutale', 'chiko', 'hi', 'read', '2020-07-20 21:26:37'),
(3, 'chiko', 'mutale', 'how are you', 'read', '2020-07-20 21:33:30'),
(4, 'mutale', 'chiko', 'hi', 'read', '2020-07-20 21:33:45'),
(5, 'mutale', 'chiko', 'hi', 'read', '2020-07-21 13:28:43'),
(6, 'chiko', 'mutale', 'how are you', 'read', '2020-07-21 13:29:16'),
(7, 'chiko', 'mutale', 'long time how have you been ', 'read', '2020-07-21 13:29:36'),
(8, 'mutale', 'chiko', 'hi', 'read', '2020-07-21 13:29:45'),
(9, 'chiko', 'mutale', 'long time how have you been ', 'read', '2020-07-21 13:30:41'),
(10, 'mutale', 'chiko', 'did you watch the game last night', 'read', '2020-07-21 13:33:18'),
(11, 'mutale', 'chiko', 'did you watch the game last night', 'read', '2020-07-21 13:33:28'),
(12, 'chiko', 'mutale', 'yes i did we had a poor game tactic were wrong from the coach from the start', 'read', '2020-07-21 13:36:07'),
(13, 'mutale', 'chiko', 'but anyways we move on to the next game ', 'read', '2020-07-21 13:38:22'),
(14, 'mutale', 'chiko', 'but anyways we move on to the next game ', 'read', '2020-07-21 13:38:31'),
(15, 'mutale', 'chiko', 'okay it was nice talking to you ', 'read', '2020-07-21 13:39:38'),
(16, 'chiko', 'sam', 'hey man how is it going that side ', 'read', '2020-07-21 15:02:49'),
(17, 'chiko', 'sam', 'i hope the children are not giving you problems', 'read', '2020-07-21 15:03:45'),
(18, 'chiko', 'Kangwa', 'kangwa are you still alive ', 'unread', '2020-07-21 15:14:45'),
(19, 'chiko', 'Kangwa', 'please call me need to chat ', 'unread', '2020-07-21 15:15:01'),
(20, 'chiko', 'Kangwa', 'there is something i need to talk to you about agent ', 'unread', '2020-07-21 15:15:26'),
(21, 'chiko', 'Kangwa', '!!!!!!', 'unread', '2020-07-21 15:15:40'),
(22, 'sam', 'chiko', 'hi', 'read', '2020-07-22 16:23:29'),
(23, 'sam', 'chiko', 'they are giving me hell but atleast they behaving now ', 'read', '2020-07-22 16:24:00'),
(24, 'sam', 'chiko', 'how is every one at the camps bay campus', 'read', '2020-07-22 16:24:35'),
(25, 'sam', 'chiko', 'please send my regards to eveyrone that side ', 'read', '2020-07-22 16:24:58'),
(26, 'chiko', 'Kangwa', 'you ar online and you not reading my messages ', 'unread', '2020-07-24 05:23:12'),
(27, 'chiko', 'Kangwa', 'kangwa that is being rude ', 'unread', '2020-07-24 05:23:27'),
(28, 'chiko', 'Kangwa', 'please respond to my messages ', 'unread', '2020-07-24 05:23:44'),
(29, 'khuliso', 'chiko', 'Hy babes', 'read', '2020-07-24 06:10:26'),
(30, 'khuliso', 'chiko', 'Are you good', 'read', '2020-07-24 06:10:46'),
(31, 'khuliso', 'chiko', 'kiss kiss uuuuu', 'read', '2020-07-24 06:11:05'),
(32, 'khuliso', 'Kangwa', 'hey babes how you doing ', 'unread', '2020-07-24 06:25:26'),
(33, 'khuliso', 'Kangwa', 'am having a party this weekend tell every one ', 'unread', '2020-07-24 06:26:23'),
(34, 'khuliso', 'Kangwa', 'thanks ', 'unread', '2020-07-24 06:26:31'),
(35, 'khuliso', 'sam', 'big man ati bwa ', 'unread', '2020-07-24 06:27:09'),
(36, 'khuliso', 'sam', 'mulifye mu local ', 'unread', '2020-07-24 06:27:28'),
(37, 'khuliso', 'sam', 'aka bine ati bwa', 'unread', '2020-07-24 06:27:57'),
(38, 'khuliso', 'sam', 'njala big man iti payisa', 'unread', '2020-07-24 06:28:13'),
(39, 'khuliso', 'sam', 'but anyway bigman laka laka', 'unread', '2020-07-24 06:28:32'),
(40, 'chiko', 'Kangwa', 'hellloooooo', 'unread', '2020-07-24 10:17:36'),
(41, 'chiko', 'Kangwa', 'until now am tired ', 'unread', '2020-07-24 10:17:55'),
(42, 'joe kalinde', 'chiko', 'hey', 'unread', '2020-07-24 21:14:41'),
(43, 'joe kalinde', 'chiko', 'am quite new ', 'unread', '2020-07-24 21:14:59'),
(44, 'joe kalinde', 'chiko', 'would you care to update me on everyone', 'unread', '2020-07-24 21:15:22'),
(45, 'joe kalinde', 'chiko', 'thanks', 'unread', '2020-07-24 21:15:49'),
(46, 'chiko', 'sam', 'hi', 'read', '2020-08-28 09:36:24'),
(47, 'chiko', 'sam', 'hi', 'read', '2020-08-28 09:38:23'),
(48, 'chiko', 'sam', 'hi', 'read', '2020-08-28 09:38:35'),
(49, 'sam', 'chiko', 'let me refresh the page ', 'read', '2020-08-28 09:41:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`child_id`),
  ADD KEY `fk_Class_id_for_Child` (`class_id`),
  ADD KEY `fk_School_id_Class_for_Child` (`school_id`),
  ADD KEY `fk_parent_id_for_Child` (`user_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `fk_school_id_for_class` (`school_id`),
  ADD KEY `fk_staff_id_for_class` (`user_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `tasklist`
--
ALTER TABLE `tasklist`
  ADD PRIMARY KEY (`tasklist_id`),
  ADD KEY `fk_class_id_for_TaskList` (`class_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `fk_Class_id_for_Child` FOREIGN KEY (`Class_Id`) REFERENCES `class` (`Class_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_School_id_Class_for_Child` FOREIGN KEY (`School_Id`) REFERENCES `class` (`School_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_parent_id_for_Child` FOREIGN KEY (`User_Id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `fk_school_id_for_class` FOREIGN KEY (`School_Id`) REFERENCES `school` (`School_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_staff_id_for_class` FOREIGN KEY (`User_Id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `tasklist`
--
ALTER TABLE `tasklist`
  ADD CONSTRAINT `fk_class_id_for_TaskList` FOREIGN KEY (`Class_Id`) REFERENCES `class` (`Class_Id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
