-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 10:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myportfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_me`
--

CREATE TABLE `about_me` (
  `id` int(11) NOT NULL,
  `info_me` varchar(512) NOT NULL,
  `info1` varchar(10) NOT NULL,
  `info2` varchar(10) NOT NULL,
  `info3` varchar(10) NOT NULL,
  `info4` varchar(10) NOT NULL,
  `cv_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_me`
--

INSERT INTO `about_me` (`id`, `info_me`, `info1`, `info2`, `info3`, `info4`, `cv_link`) VALUES
(1, 'I am presently immersed in Android and web development projects while nurturing a keen interest in blockchain technology and machine learning. The prospect of exploring deep learning further excites me. My pursuits reflect a dynamic blend of practical application and curiosity-driven exploration in the ever-evolving landscape of technology.', '5+', '3+', '1+', '12+', 'https://drive.google.com/file/d/13dcciHfC6h13JC1lw5wTlS6Mk18XTwFv/view?usp=sharing');

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`id`, `image`, `title`, `description`) VALUES
(1, 'dbbl.jpg', 'DBBL Scholarship', 'I have achieved a DBBL scholarship on the basis of my S.S.C result.'),
(2, 'WhatsApp Image 2024-03-03 at 14.14.11_515df9ba.jpg', 'Dean Award', 'I am awarded university dean award for achieving cgpa 3.76 in 1st year ');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `details` varchar(512) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `details`, `location`, `email`, `education`, `profession`, `phone`) VALUES
(1, 'I am currently completing my under graduation program in a reputed university of Bangladesh(KUET).', 'KUET, Khulna, Bangladesh', 'choyanbaruakuetcse@gmail.com', 'Khulna University Of Engineering and Technology(KUET)', 'Student,Developer', '01763160077');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `description`) VALUES
(1, 'choyan', 'choyan@gmail.com', 'ssad', 'asdasdasd'),
(2, 'plabon', 'plabon@gmail.com', 'ssaddsad', 'sdfdsfssfs'),
(3, 'safa', 'safa@gmail.com', 'fsfasdas', 'asdasdasdasd'),
(4, 'azmain', 'azmain@gmail.com', 'fs', 'sdfsdfsdfsd'),
(5, 'mahedi', 'mahedi@gmail.com', 'ssad', 'asdasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(1, 'IMG_20240212_044550.jpg'),
(2, 'IMG_6128.jpg'),
(3, 'IMG_6135.jpg'),
(4, 'IMG_6150.jpg'),
(5, 'IMG_9886.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro_name` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` varchar(512) NOT NULL,
  `cv_link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `title`, `intro_name`, `short_description`, `description`, `cv_link`, `image`) VALUES
(1, '$Choyan$Personal-Portfolio', 'Choyan', 'A Universty Student.', 'Greetings! I\'m Choyan Mitra Barua Bijoy from Chittagong, currently pursuing Computer Science and Engineering at KUET. Proficient in Android, web, AutoCAD, and 3D modeling, I\'m now diving into Blockchain and Machine Learning. Join me in exploring the forefront of technology and innovation.', 'https://drive.google.com/file/d/13dcciHfC6h13JC1lw5wTlS6Mk18XTwFv/view?usp=sharing', 'myPic2.png');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_image` varchar(255) NOT NULL,
  `github_link` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_image`, `github_link`, `youtube_link`) VALUES
(1, 'android 12', 'digital-digital-art-artwork-illustration-simple-hd-wallpaper-abf6ec1d53314f894594ebf93d5c9cb0.jpg', 'https://github.com/ve-nom101', 'https://www.youtube.com/watch?v=rIiiMos71ZIg'),
(6, 'FilmFrenzy', 'peakpx.jpg', 'https://github.com/VE-NOM101/FilmFrenzy.git', '#'),
(7, 'Draw - IT', 'port-work2.jpg', 'https://github.com/VE-NOM101/Draw-It.git', '#');

-- --------------------------------------------------------

--
-- Table structure for table `reg_table`
--

CREATE TABLE `reg_table` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_table`
--

INSERT INTO `reg_table` (`id`, `username`, `email`, `password`) VALUES
(1, 'Choyan', 'choyan@gmail.com', '12Abcd#'),
(2, 'Plabon', 'plabon@gmail.com', '123ads$');

-- --------------------------------------------------------

--
-- Table structure for table `section_control`
--

CREATE TABLE `section_control` (
  `id` int(11) NOT NULL,
  `home_section` int(11) NOT NULL,
  `about_section` int(11) NOT NULL,
  `portfolio_section` int(11) NOT NULL,
  `blogs_section` int(11) NOT NULL,
  `contact_section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section_control`
--

INSERT INTO `section_control` (`id`, `home_section`, `about_section`, `portfolio_section`, `blogs_section`, `contact_section`) VALUES
(1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `twitter`, `facebook`, `instagram`, `github`, `linkedin`) VALUES
(1, '', 'https://www.facebook.com/people/Choyan-Barua/pfbid033oNz4mUPVQLf7Vj75Hg9Vi44WSK93gAFjviooQxFsbFLv1YsLcqfJ5RNzHbryvFDl/', '', 'https://github.com/ve-nom101', 'https://www.linkedin.com/in/choyan-barua-6b6b84284/');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `id` int(11) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `details_para` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`id`, `duration`, `role`, `place`, `details_para`) VALUES
(2, '2015 - 2016', 'J.S.C Exam', 'Chittagong Board', 'In 2016, I passed the Junior School Certificate (J.S.C) exam under the Chittagong Board with a GPA of -5.00(A+) and received a government scholarship for scoring over 1100 marks.'),
(3, '2016 - 2017', 'S.S.C Exam', 'Chittagong board', 'In the 2016-17 session, I successfully completed my SSC (Secondary School Certificate) examination under the Chittagong Board with an outstanding GPA of 5.00 (A+). My exceptional academic performance earned me prestigious scholarships from both the govern'),
(4, '2018 - 2019', 'H.S.C Exam', 'Chittagong board', 'In the 2018-19 session, I achieved another remarkable milestone by obtaining a GPA of 5.00 (A+) in my H.S.C (Higher Secondary Certificate) examination conducted by the Chittagong Board.'),
(5, '2020 - Present', 'Under graduation', 'KUET', '\nSince 2020, I\'ve been enrolled in my undergraduate program at KUET (Khulna University of Engineering and Technology). As of my fourth semester, I\'ve maintained a strong CGPA of 3.87. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_table`
--
ALTER TABLE `reg_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_control`
--
ALTER TABLE `section_control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reg_table`
--
ALTER TABLE `reg_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `section_control`
--
ALTER TABLE `section_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
