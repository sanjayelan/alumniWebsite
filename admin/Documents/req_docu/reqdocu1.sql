-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 11:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psgim_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni_events`
--

CREATE TABLE `alumni_events` (
  `event_id` int(5) NOT NULL,
  `event_title` varchar(30) NOT NULL,
  `event_description` text NOT NULL,
  `event_picture_path` varchar(30) NOT NULL,
  `event_posted_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni_events`
--

INSERT INTO `alumni_events` (`event_id`, `event_title`, `event_description`, `event_picture_path`, `event_posted_on`) VALUES
(1, 'The pongal function', 'qwertyuiop asdfghjkl zxcvbnm,', './events_images/eventpic1.png', '2022-09-28 14:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_list`
--

CREATE TABLE `alumni_list` (
  `registration_number` varchar(8) NOT NULL,
  `alumni_first_name` varchar(20) NOT NULL,
  `alumni_middle_name` varchar(20) NOT NULL,
  `alumni_last_name` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `batch` int(4) NOT NULL,
  `dept_id` int(5) NOT NULL,
  `initial` varchar(2) NOT NULL,
  `blood_group` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni_list`
--

INSERT INTO `alumni_list` (`registration_number`, `alumni_first_name`, `alumni_middle_name`, `alumni_last_name`, `dob`, `gender`, `batch`, `dept_id`, `initial`, `blood_group`) VALUES
('19MSS001', 'Abishekh', '', 'Balamurugan', '1992-10-01', 'male', 2002, 4, 'OB', 'A-'),
('19MSS010', 'Bharath', 'Kalyan', 'Rajendran', '1992-12-20', 'male', 2002, 3, 'rb', 'A+'),
('19MSS012', 'Dharaneesh', '', 'Rajasekaran', '1992-11-10', 'male', 2002, 2, 'RM', 'O-'),
('19MSS019', 'Kamalesh', '', 'Nataraj', '1993-07-12', 'male', 2002, 5, 'N', 'B-'),
('19MSS039', 'Sanjay', 'Kumar', 'Elangovan', '1991-04-01', 'male', 2002, 1, 'E', 'B+');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_login`
--

CREATE TABLE `alumni_login` (
  `alumni_login_id` int(5) NOT NULL,
  `registration_number` varchar(8) NOT NULL,
  `password` varchar(50) NOT NULL,
  `login_date` date DEFAULT NULL,
  `logout_date` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni_login`
--

INSERT INTO `alumni_login` (`alumni_login_id`, `registration_number`, `password`, `login_date`, `logout_date`, `is_active`) VALUES
(1, '19MSS001', 'qwerty', '2022-10-11', '2022-10-12', 1),
(2, '19MSS010', 'qwerty', '2022-08-09', '2022-11-03', 1),
(3, '19MSS012', 'qwerty', '2022-11-03', '2022-11-10', 0),
(4, '19MSS019', 'qwerty', '2022-07-05', '2022-07-07', 0),
(5, '19MSS039', 'qwerty', '2023-01-06', '2023-02-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `alumni_news`
--

CREATE TABLE `alumni_news` (
  `news_id` int(11) NOT NULL,
  `news_article_title` varchar(30) NOT NULL,
  `news_description` text NOT NULL,
  `news_article_link` varchar(50) NOT NULL,
  `news_picture_path` varchar(30) NOT NULL,
  `news_posted_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni_news`
--

INSERT INTO `alumni_news` (`news_id`, `news_article_title`, `news_description`, `news_article_link`, `news_picture_path`, `news_posted_on`) VALUES
(1, 'The aritle', 't to use and its super compatible in all ways with your system', 'fsdafasdf', './news_images/newspic1.jpg', '2022-09-28 08:46:17'),
(2, 'The aritle', 't to use and its super compatible in all ways with your system', 'fsdafasdf', './news_images/newspic2.jpg', '2022-09-28 08:46:28'),
(3, '', '', '', './news_images/newspic2.', '2022-09-30 05:32:09'),
(4, 'The aritle', 'qwerty', 'dfdf', './news_images/newspic2.png', '2022-10-06 07:40:23'),
(5, 'The aritle', 'qwerty', 'dfdf', './news_images/newspic2.png', '2022-10-06 07:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_requirement`
--

CREATE TABLE `alumni_requirement` (
  `req_id` int(5) NOT NULL,
  `req_type_id` int(1) NOT NULL,
  `req_posted_on` datetime NOT NULL,
  `req_file_path` varchar(20) NOT NULL,
  `req_title` varchar(50) NOT NULL,
  `req_link` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `alumni_users`
--

CREATE TABLE `alumni_users` (
  `email` varchar(30) NOT NULL COMMENT 'Mail of the Passed out student',
  `registraton_number` varchar(8) NOT NULL COMMENT 'Roll number of the Passed out student',
  `user_type_id` int(5) DEFAULT NULL,
  `dept_id` varchar(5) DEFAULT NULL COMMENT 'Department of the Passed out student',
  `user_address_id` int(5) NOT NULL COMMENT 'Address of the Passed out student',
  `job_id` int(5) DEFAULT NULL,
  `guide_id` int(5) DEFAULT NULL COMMENT 'Year in which the student passed out',
  `mobile_number` int(10) NOT NULL COMMENT 'Mobile number of the Passed out student',
  `profile_img_path` varchar(20) DEFAULT NULL,
  `user_added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comp_details`
--

CREATE TABLE `comp_details` (
  `comp_id` int(5) NOT NULL,
  `comp_street` varchar(35) NOT NULL,
  `comp_district` varchar(20) NOT NULL,
  `comp_state` varchar(20) NOT NULL,
  `comp_country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comp_details`
--

INSERT INTO `comp_details` (`comp_id`, `comp_street`, `comp_district`, `comp_state`, `comp_country`) VALUES
(1, 'asd', 'fgh', 'hj', 'kl'),
(2, 'qwe', 'rty', 'uio', 'poui'),
(3, 'zx', 'cv', 'bn', 'mn'),
(4, 'zse', 'rgb', 'bji', 'ikm');

-- --------------------------------------------------------

--
-- Table structure for table `dept_details`
--

CREATE TABLE `dept_details` (
  `dept_id` int(2) NOT NULL,
  `dept_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_details`
--

INSERT INTO `dept_details` (`dept_id`, `dept_name`) VALUES
(1, 'software system'),
(2, 'MBA'),
(3, 'MCA'),
(4, 'computer scienc'),
(5, 'Mechanical');

-- --------------------------------------------------------

--
-- Table structure for table `guide_details`
--

CREATE TABLE `guide_details` (
  `guide_id` int(5) NOT NULL,
  `dept_id` int(5) NOT NULL,
  `giude_fname` varchar(20) NOT NULL,
  `giude_mname` varchar(20) NOT NULL,
  `giude_lname` varchar(20) NOT NULL,
  `guide_initial` varchar(2) NOT NULL,
  `guide_img_path` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `job_id` int(5) NOT NULL,
  `comp_id` int(5) NOT NULL,
  `role` varchar(25) NOT NULL,
  `comp_pincode` varchar(10) NOT NULL,
  `salary` int(6) NOT NULL,
  `exprecience` int(2) NOT NULL,
  `last_updated_on` datetime NOT NULL,
  `comp_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_details`
--

INSERT INTO `job_details` (`job_id`, `comp_id`, `role`, `comp_pincode`, `salary`, `exprecience`, `last_updated_on`, `comp_name`) VALUES
(1, 1, 'front end', '654715', 100000, 5, '2022-10-11 07:11:48', 'kekkran mekkaran'),
(2, 2, 'front end', '632145', 200000, 6, '2022-10-11 07:11:48', 'atm and co'),
(3, 3, 'full stack', '698745', 300000, 7, '2022-10-11 07:13:36', 'moms and co'),
(4, 4, 'devops', '654123', 400000, 8, '2022-10-11 07:13:36', 'mudhal nee');

-- --------------------------------------------------------

--
-- Table structure for table `user_address_details`
--

CREATE TABLE `user_address_details` (
  `user_address_id` int(5) NOT NULL,
  `user_street` varchar(35) NOT NULL,
  `user_district` varchar(20) NOT NULL,
  `user_state` varchar(20) NOT NULL,
  `user_country` varchar(20) NOT NULL,
  `user_pincode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address_details`
--

INSERT INTO `user_address_details` (`user_address_id`, `user_street`, `user_district`, `user_state`, `user_country`, `user_pincode`) VALUES
(1, 'qwe', 'rty', 'uio', 'poiu', 612345),
(2, 'asd', 'dfg', 'ghj', 'jkl', 698745),
(3, 'zx', 'cv', 'bn', 'mn', 632154),
(4, 'zse', 'rfv', 'bhu', 'ikm', 654781);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(5) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_type_name` varchar(20) NOT NULL,
  `user_type_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type`, `user_type_name`, `user_type_status`) VALUES
(1, 'admin', 'administrator', 0),
(2, 'alumni', 'student', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni_list`
--
ALTER TABLE `alumni_list`
  ADD PRIMARY KEY (`registration_number`),
  ADD UNIQUE KEY `dept_id` (`dept_id`);

--
-- Indexes for table `alumni_login`
--
ALTER TABLE `alumni_login`
  ADD PRIMARY KEY (`alumni_login_id`),
  ADD UNIQUE KEY `registration_number` (`registration_number`);

--
-- Indexes for table `alumni_requirement`
--
ALTER TABLE `alumni_requirement`
  ADD PRIMARY KEY (`req_id`),
  ADD UNIQUE KEY `req_type_id` (`req_type_id`);

--
-- Indexes for table `alumni_users`
--
ALTER TABLE `alumni_users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `registraton_number` (`registraton_number`,`dept_id`,`user_address_id`,`guide_id`,`job_id`),
  ADD UNIQUE KEY `user_type_id` (`user_type_id`),
  ADD KEY `guide_id` (`guide_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `user_address_id` (`user_address_id`);

--
-- Indexes for table `comp_details`
--
ALTER TABLE `comp_details`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `dept_details`
--
ALTER TABLE `dept_details`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `guide_details`
--
ALTER TABLE `guide_details`
  ADD PRIMARY KEY (`guide_id`);

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`job_id`),
  ADD UNIQUE KEY `comp_id` (`comp_id`);

--
-- Indexes for table `user_address_details`
--
ALTER TABLE `user_address_details`
  ADD PRIMARY KEY (`user_address_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni_login`
--
ALTER TABLE `alumni_login`
  MODIFY `alumni_login_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alumni_requirement`
--
ALTER TABLE `alumni_requirement`
  MODIFY `req_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comp_details`
--
ALTER TABLE `comp_details`
  MODIFY `comp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dept_details`
--
ALTER TABLE `dept_details`
  MODIFY `dept_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guide_details`
--
ALTER TABLE `guide_details`
  MODIFY `guide_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_details`
--
ALTER TABLE `job_details`
  MODIFY `job_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_address_details`
--
ALTER TABLE `user_address_details`
  MODIFY `user_address_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni_login`
--
ALTER TABLE `alumni_login`
  ADD CONSTRAINT `alumni_login_ibfk_1` FOREIGN KEY (`registration_number`) REFERENCES `alumni_list` (`registration_number`);

--
-- Constraints for table `alumni_requirement`
--
ALTER TABLE `alumni_requirement`
  ADD CONSTRAINT `alumni_requirement_ibfk_1` FOREIGN KEY (`req_type_id`) REFERENCES `alumni_req_type` (`req_type_id`);

--
-- Constraints for table `alumni_users`
--
ALTER TABLE `alumni_users`
  ADD CONSTRAINT `alumni_users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`),
  ADD CONSTRAINT `alumni_users_ibfk_2` FOREIGN KEY (`guide_id`) REFERENCES `guide_details` (`guide_id`),
  ADD CONSTRAINT `alumni_users_ibfk_3` FOREIGN KEY (`job_id`) REFERENCES `job_details` (`job_id`),
  ADD CONSTRAINT `alumni_users_ibfk_5` FOREIGN KEY (`user_address_id`) REFERENCES `user_address_details` (`user_address_id`),
  ADD CONSTRAINT `alumni_users_ibfk_6` FOREIGN KEY (`registraton_number`) REFERENCES `alumni_list` (`registration_number`);

--
-- Constraints for table `dept_details`
--
ALTER TABLE `dept_details`
  ADD CONSTRAINT `dept_details_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `alumni_list` (`dept_id`);

--
-- Constraints for table `job_details`
--
ALTER TABLE `job_details`
  ADD CONSTRAINT `job_details_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `comp_details` (`comp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
