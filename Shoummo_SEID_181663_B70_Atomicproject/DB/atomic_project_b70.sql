--
-- Database: `atomic_project_b70`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthdate`
--

CREATE TABLE `birthdate` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `monthdate` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `birthdate`
--

INSERT INTO `birthdate` (`id`, `name`, `birthdate`, `is_trashed`, `monthdate`, `year`) VALUES
(22, 'Karim', '07/05/2018', 'NO', '0705', '2018'),
(23, 'Fahim', '03/06/2014', '2017-10-03 08:48:24', '0306', '2014'),
(24, 'Anybody', '03/14/2018', 'NO', '0314', '2018'),
(26, 'Rahim', '06/07/2017', 'NO', '0607', '2017'),
(27, 'Karim', '07/05/2018', 'NO', '0705', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `book_title`
--

CREATE TABLE `book_title` (
  `id` int(13) NOT NULL,
  `book_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book_title`
--

INSERT INTO `book_title` (`id`, `book_title`, `author_name`, `is_trashed`) VALUES
(1, 'HIMU', 'HUMAYUN AHMED', 'NO'),
(5, 'Satkahan', 'Shamresh Mojumder', 'NO'),
(12, 'Autobiography of Bappy', 'Bappy', 'NO'),
(13, 'fdgdg', 'sdfsdf', '2017-10-03 08:48:41'),
(14, 'Sfdsgt', 'dsrdrtdr', '2017-10-03 08:48:41'),
(17, 'dsgfdg', 'sdtfdster', '2017-10-03 08:48:42'),
(18, 'fghdfhfdhytr', 'cgfhygfuftuy', '2017-10-03 08:48:49'),
(19, 'dssd', 'sdsdsd', '2017-10-03 08:48:49'),
(20, 'dssd', 'sdsdsd', '2017-10-03 08:48:49'),
(21, 'dssd', 'sdsdsd', '2017-10-03 08:49:43'),
(22, 'dssd', 'sdsdsd', '2017-10-03 08:49:43'),
(23, 'hjhjhjh', 'ihihihi', '2017-10-03 08:49:43'),
(24, 'gfhgfh', 'gfhgf', '2017-10-03 08:49:43'),
(25, 'Machine Design', 'Shigley', 'NO'),
(26, 'Refrigeration', 'Stoecker', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `city`, `is_trashed`) VALUES
(1, 'ASDDD', 'Dhaka', 'NO'),
(2, 'SDSDDSD', 'Barisal', 'NO'),
(3, 'EFEF', 'Khulna', 'NO'),
(4, 'GNG', 'Dhaka', 'NO'),
(5, 'GBGBG', 'Sylhet', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `name`, `email`, `is_trashed`) VALUES
(2, 'dvdv', 'dvdd@pspas.jsis', 'NO'),
(3, 'dwdwwdwd', 'wdwdwd@sodso.c', '2017-10-03 08:51:31'),
(4, 'sfdsf', 'sfdfsdf@gvgvgvg.com', 'NO'),
(5, 'scsc', 'scscsc@gvgv.bhbh', 'NO'),
(6, 'vty', 'sxa@nnnj.bhbh', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `gender`, `is_trashed`) VALUES
(1, 'Fahim', 'Male', '2017-10-03 08:51:07'),
(2, 'sdsds', 'Male', 'NO'),
(3, 'dsdswdwd', 'Female', '2017-10-03 08:51:09'),
(4, 'efeffef', 'Male', 'NO'),
(5, 'efvvvr', 'Female', 'NO'),
(6, 'rfrfrf', 'Female', 'NO'),
(7, 'rfrfffff', 'Male', 'NO'),
(8, 'plplpll', 'Female', 'NO'),
(9, 'uhuhu', 'Male', 'NO'),
(10, 'adadad', 'Male', 'NO'),
(11, 'ewfgdg', 'Male', 'NO'),
(12, 'Karim', 'Male', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(13) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hobbies` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `name`, `hobbies`, `is_trashed`) VALUES
(1, 'fhgvhjvhjgjh', 'Eating, Photography', 'NO'),
(2, 'Rahim', 'Eating, Riding', '2017-09-24 18:21:29'),
(3, 'fhfjhgb', 'Riding', 'NO'),
(4, 'fdssertwser', 'Photography', 'NO'),
(5, 'vgjhgjg', 'Eating', 'NO'),
(6, 'fhghf', 'Riding, Photography', 'NO'),
(7, 'adadad', 'Riding', 'NO'),
(8, 'dfgfdg', 'Eating', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `profile_picture`
--

CREATE TABLE `profile_picture` (
  `id` int(13) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profile_picture` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile_picture`
--

INSERT INTO `profile_picture` (`id`, `name`, `profile_picture`, `is_trashed`) VALUES
(8, 'pic6', '1506310369gallery-img1.jpg', 'NO'),
(9, 'HHJJJ', '150669203013719525_311470279193876_1298376428345582971_o.jpg', 'NO'),
(10, 'asdsadsad', '15069710634QIsU7.jpg', 'NO'),
(11, 'ewfgdg', '15069807493lY9S9z.jpg', 'NO'),
(12, 'asdsadsad', '15069809994QIsU7.jpg', '2017-10-03 08:52:01'),
(13, 'bgvnbnv', '1507018432audi-r8-wallpaper-6.jpg', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `sog`
--

CREATE TABLE `sog` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sog` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sog`
--

INSERT INTO `sog` (`id`, `name`, `sog`, `is_trashed`) VALUES
(9, 'dszesrtg', 'zrgdvxfhgf', '2017-10-03 08:53:44'),
(10, 'dfhbfgv', 'bfzgbrgbdzfg', '2017-10-03 08:53:44'),
(11, 'esfsefvsf', 'sefgdgfdg', '2017-10-02 19:25:35'),
(12, 'esfd', 'dfgdgdg', '2017-10-03 08:53:44'),
(13, 'dddffff', 'sddd', '2017-10-03 07:50:24'),
(14, 'Facebook', 'Facebook is an American for-profit corporation and an online social media and social networking service based in Menlo Park, California', 'NO'),
(15, 'Youtube', 'YouTube is an American video-sharing website headquartered in San Bruno, California. The service was created by three former PayPal employees ', 'NO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthdate`
--
ALTER TABLE `birthdate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_title`
--
ALTER TABLE `book_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_picture`
--
ALTER TABLE `profile_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sog`
--
ALTER TABLE `sog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birthdate`
--
ALTER TABLE `birthdate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `book_title`
--
ALTER TABLE `book_title`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `profile_picture`
--
ALTER TABLE `profile_picture`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sog`
--
ALTER TABLE `sog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
