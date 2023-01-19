-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 06:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ima_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` text DEFAULT NULL,
  `admin_id` varchar(10) NOT NULL,
  `createDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_username`, `admin_password`, `admin_id`, `createDate`) VALUES
(1, 'admindemo', 'e10adc3949ba59abbe56e057f20f883e', '0', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_db`
--

CREATE TABLE `announcement_db` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `title` varchar(250) NOT NULL,
  `pdf_name` varchar(250) NOT NULL,
  `video_link` text NOT NULL,
  `link` text NOT NULL,
  `createDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_solution_db`
--

CREATE TABLE `book_solution_db` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `title` varchar(250) NOT NULL,
  `pdf_name` varchar(250) NOT NULL,
  `video_link` text NOT NULL,
  `stream` int(11) NOT NULL,
  `link` text NOT NULL,
  `createDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courseenquiry_db`
--

CREATE TABLE `courseenquiry_db` (
  `id` int(11) NOT NULL,
  `stream` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `medium` varchar(50) NOT NULL,
  `submitDate` varchar(20) NOT NULL,
  `createDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `stream` varchar(50) NOT NULL,
  `class` varchar(25) NOT NULL,
  `medium` varchar(50) NOT NULL,
  `agree` varchar(5) NOT NULL,
  `date_info` varchar(150) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_db`
--

CREATE TABLE `enrollment_db` (
  `id` int(11) NOT NULL,
  `enroll_no` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `fatherName` varchar(300) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobileno` varchar(20) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `medium` varchar(50) NOT NULL,
  `stream` varchar(50) NOT NULL,
  `examMode` varchar(50) NOT NULL,
  `examTime` varchar(50) NOT NULL,
  `examDate` varchar(50) NOT NULL,
  `submitDate` varchar(50) NOT NULL,
  `createDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `entarncetest_db`
--

CREATE TABLE `entarncetest_db` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `month` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `pdf_name` varchar(250) NOT NULL,
  `video_link` text NOT NULL,
  `stream` int(11) NOT NULL,
  `link` text NOT NULL,
  `createDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_db`
--

CREATE TABLE `gallery_db` (
  `id` int(11) NOT NULL,
  `category` varchar(191) DEFAULT NULL,
  `title` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `product_id` int(11) NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery_db`
--

INSERT INTO `gallery_db` (`id`, `category`, `title`, `image`, `product_id`, `createDate`) VALUES
(1, '2', 'Oasis Sainik School Staff', 'gallery-photo-1.jpg', 0, '2023-01-11 18:56:50'),
(2, '2', 'Oasis Sainik School Staff', 'gallery-photo-2.jpg', 0, '2023-01-11 18:59:27'),
(3, '2', 'Oasis Sainil School Staff', 'gallery-photo-3.jpg', 0, '2023-01-11 18:59:58'),
(4, '3', 'Oasis Sainik School Laboratories', 'gallery-photo-4.jpg', 0, '2023-01-11 19:09:15'),
(5, '3', 'Oasis Sainik School Laboratories', 'gallery-photo-5.jpg', 0, '2023-01-11 19:10:46'),
(6, '3', 'Oasis Sainik School Laboratories', 'gallery-photo-6.jpg', 0, '2023-01-11 19:11:08'),
(7, '3', 'Oasis Sainik School Laboratories', 'gallery-photo-6-sub-7-1.jpg', 6, '2023-01-11 19:11:08'),
(8, '3', 'Oasis Sainik School Laboratories', 'gallery-photo-6-sub-8-2.jpg', 6, '2023-01-11 19:11:08'),
(9, '4', 'Oasis Sainik School Sports', 'gallery-photo-9.jpg', 0, '2023-01-11 19:16:12'),
(11, '4', 'Oasis Sainik School Sports', 'gallery-photo-11.jpg', 0, '2023-01-11 19:19:02'),
(14, '4', 'Oasis Sainik School Sports', 'gallery-photo-13-sub-14-1.jpg', 13, '2023-01-11 19:21:41'),
(15, '4', 'Oasis Sainik School Sports', 'gallery-photo-15.jpg', 0, '2023-01-11 19:23:22'),
(16, '4', 'Oasis Sainik School Sports', 'gallery-photo-15-sub-16-1.jpg', 15, '2023-01-11 19:23:22'),
(17, '4', 'Oasis Sainik School Sports', 'gallery-photo-17.jpg', 0, '2023-01-11 19:23:48'),
(18, '4', 'Oasis Sainik School Sports', 'gallery-photo-17-sub-18-1.jpg', 17, '2023-01-11 19:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `importantnotes_db`
--

CREATE TABLE `importantnotes_db` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `title` varchar(250) NOT NULL,
  `pdf_name` varchar(250) NOT NULL,
  `video_link` text NOT NULL,
  `stream` int(11) NOT NULL,
  `link` text NOT NULL,
  `createDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_planner_db`
--

CREATE TABLE `lesson_planner_db` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `title` varchar(250) NOT NULL,
  `pdf_name` varchar(250) NOT NULL,
  `video_link` text NOT NULL,
  `stream` int(11) NOT NULL,
  `link` text NOT NULL,
  `createDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `new_db`
--

CREATE TABLE `new_db` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `title` varchar(250) NOT NULL,
  `pdf_name` varchar(250) NOT NULL,
  `video_link` text NOT NULL,
  `createDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `result_db`
--

CREATE TABLE `result_db` (
  `id` int(11) NOT NULL,
  `field` varchar(50) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `name` varchar(300) NOT NULL,
  `collage` varchar(500) NOT NULL,
  `image_name` varchar(150) NOT NULL,
  `image_title` varchar(250) NOT NULL,
  `image_alt` varchar(250) NOT NULL,
  `status` varchar(5) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_downloads`
--

CREATE TABLE `tb_downloads` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `links` text DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_downloads`
--

INSERT INTO `tb_downloads` (`id`, `title`, `links`, `status`, `createDate`, `updateDate`) VALUES
(1, 'Class 5 Home Work', 'https://drive.google.com/file/d/1rxUbDaX68JBMVrFBxzvD0jyt4SWmKth0/view', '1', '2023-01-09 16:48:54', '2023-01-09 16:48:54'),
(2, 'Class 6 Home Work', 'https://drive.google.com/file/d/1N1wlzBJMJDNQGhPWLY4Wi0Dn_JRUdL05/view', '1', '2023-01-09 17:19:00', '2023-01-09 17:19:00'),
(4, 'Class 7 Home Work', 'https://drive.google.com/file/d/1UAuq05_6ua_QCGvxl2w-SXuqxLdwfqy6/view', '1', '2023-01-09 17:21:35', '2023-01-09 17:21:35'),
(5, 'Class 8 Home Work', 'https://drive.google.com/file/d/1keSIOGLzzu0na26r31yml2TX3lLq4iml/view', '1', '2023-01-09 17:27:11', '2023-01-09 17:27:11'),
(6, 'Class 9 Home Work', 'https://drive.google.com/file/d/1Y5Ni_GolYVlhJ9NKa1pbhn7fhXcVAsTJ/view', '1', '2023-01-09 17:27:28', '2023-01-09 17:27:28'),
(7, 'Class 10 Home Work', 'https://drive.google.com/file/d/1ySq2AzyKJUcPZJmPvcIECSiSuiU4U4ZX/view', '1', '2023-01-09 17:27:58', '2023-01-09 17:27:58'),
(8, 'Class 12 : Commerce Home Work', 'https://drive.google.com/file/d/1gtzIo_WEWRRSS1ioxLt5VfEPcnlS47ST/view', '1', '2023-01-09 17:28:20', '2023-01-09 17:28:20'),
(9, 'Class 12 : Science Home Work', 'https://drive.google.com/file/d/18Xb04314IWV973hXfqSc2-lpS1yUQK7E/view', '1', '2023-01-09 17:28:43', '2023-01-09 17:28:43'),
(10, 'Train Route and Hotel in Suratgarh', 'https://drive.google.com/file/d/1ETbq-pgp80e02GNwjg4UFEgsbLhooBqx/view', '1', '2023-01-09 17:29:24', '2023-01-09 17:29:24'),
(11, 'Train Route', 'https://drive.google.com/file/d/13AURDyYE4bwL-hO2AxJ2Fafe8pyHToHR/view', '1', '2023-01-09 17:29:38', '2023-01-09 17:29:38'),
(12, 'Medical Report Performa', 'https://drive.google.com/file/d/1hHBCx_A3UfnXAns-dVNmChv_0xjK6e5e/view', '1', '2023-01-09 17:30:00', '2023-01-09 17:30:00'),
(13, 'Class 4 Sample Paper', 'https://drive.google.com/file/d/1ZSzZpUILJk9oV9m8fS5Jrjdv7ZpurKP-/view', '1', '2023-01-09 17:30:26', '2023-01-09 17:30:26'),
(14, 'Class 5 Sample Paper', 'https://drive.google.com/file/d/1gzWtYaxLv_5cEnyhNSdEefzxugNkZGvT/view', '1', '2023-01-09 17:30:38', '2023-01-09 17:30:38'),
(15, 'Class 6 Sample Paper', 'https://drive.google.com/file/d/1xedhqckKrXiJFlhaC0txWP3RpfpJ6s5I/view', '1', '2023-01-09 17:30:53', '2023-01-09 17:30:53'),
(16, 'Class 7 Sample Paper', 'https://drive.google.com/file/d/1NUndujo0oHKP7b5E95ZY9zn7U0rGYsZp/view', '1', '2023-01-09 17:31:05', '2023-01-09 17:31:05'),
(17, 'Class 8 Sample Paper', 'https://drive.google.com/file/d/16jcRBJu2jkPTgDGUfWRIpK09T3Ti7p-o/view', '1', '2023-01-09 17:31:21', '2023-01-09 17:31:21'),
(18, 'Class 9 Sample Paper', 'https://drive.google.com/file/d/1IMXOs7VZX2aetKTFSspcA0XWjiWW5CSd/view', '1', '2023-01-09 17:31:39', '2023-01-09 17:31:39'),
(19, 'Class 11 Sample Paper', 'https://drive.google.com/file/d/126keAtxvCenGar7QXNqQ0PW62LvwBY-T/view', '1', '2023-01-09 17:31:53', '2023-01-09 17:31:53'),
(20, 'HDFC Deposit Slip', 'https://drive.google.com/file/d/1DjPlqx3nJlLc71ZVeky4nMw62sU--m_H/view', '1', '2023-01-09 17:32:10', '2023-01-09 17:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_img_category`
--

CREATE TABLE `tb_img_category` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_img_category`
--

INSERT INTO `tb_img_category` (`id`, `title`, `image`, `description`, `status`, `createDate`, `updateDate`) VALUES
(2, 'Staff', 'category-1.jpg', '', '1', '2023-01-10 11:41:39', '2023-01-10 11:41:39'),
(3, 'Laboratories', 'category-3.jpg', '', '1', '2023-01-10 11:45:05', '2023-01-10 11:45:05'),
(4, 'Sports', 'category-4.jpg', '', '1', '2023-01-10 11:45:51', '2023-01-10 11:45:51'),
(5, 'Infrastructure', 'category-5.jpg', '', '1', '2023-01-10 11:46:32', '2023-01-10 11:46:32'),
(6, 'Activities', 'category-6.jpg', '', '1', '2023-01-10 11:47:09', '2023-01-10 11:47:09'),
(7, 'Students', 'category-7.jpg', '', '1', '2023-01-10 11:47:51', '2023-01-10 11:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_db`
--

CREATE TABLE `testimonial_db` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `class` varchar(10) NOT NULL,
  `board` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `review_img` varchar(50) NOT NULL,
  `review_img_title` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `createDateTime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(256) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `password` char(150) NOT NULL,
  `c_pass` varchar(150) NOT NULL,
  `user_id` text NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `mobile_no`, `password`, `c_pass`, `user_id`, `createDate`, `updateDate`) VALUES
(1, 'useradmin', 'admin@mail.com', '9876543211', 'e10adc3949ba59abbe56e057f20f883e', '123456', '1', '2021-10-23 13:29:31', '2021-10-23 13:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`id`, `user_id`, `admin_id`) VALUES
(1, 0, '0'),
(2, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `verify_mobile`
--

CREATE TABLE `verify_mobile` (
  `id` int(11) NOT NULL,
  `enroll_id` int(11) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `otp` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  `createDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement_db`
--
ALTER TABLE `announcement_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_solution_db`
--
ALTER TABLE `book_solution_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseenquiry_db`
--
ALTER TABLE `courseenquiry_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollment_db`
--
ALTER TABLE `enrollment_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entarncetest_db`
--
ALTER TABLE `entarncetest_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_db`
--
ALTER TABLE `gallery_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `importantnotes_db`
--
ALTER TABLE `importantnotes_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_planner_db`
--
ALTER TABLE `lesson_planner_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_db`
--
ALTER TABLE `new_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_db`
--
ALTER TABLE `result_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_downloads`
--
ALTER TABLE `tb_downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_img_category`
--
ALTER TABLE `tb_img_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_db`
--
ALTER TABLE `testimonial_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify_mobile`
--
ALTER TABLE `verify_mobile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement_db`
--
ALTER TABLE `announcement_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_solution_db`
--
ALTER TABLE `book_solution_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courseenquiry_db`
--
ALTER TABLE `courseenquiry_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollment_db`
--
ALTER TABLE `enrollment_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entarncetest_db`
--
ALTER TABLE `entarncetest_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_db`
--
ALTER TABLE `gallery_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `importantnotes_db`
--
ALTER TABLE `importantnotes_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson_planner_db`
--
ALTER TABLE `lesson_planner_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_db`
--
ALTER TABLE `new_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result_db`
--
ALTER TABLE `result_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_downloads`
--
ALTER TABLE `tb_downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_img_category`
--
ALTER TABLE `tb_img_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonial_db`
--
ALTER TABLE `testimonial_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userdetail`
--
ALTER TABLE `userdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verify_mobile`
--
ALTER TABLE `verify_mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
