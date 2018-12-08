-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 03:12 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `b_id` int(5) NOT NULL,
  `b_userid` int(5) NOT NULL,
  `b_wallid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`b_id`, `b_userid`, `b_wallid`) VALUES
(1, 6, 19),
(2, 6, 23),
(3, 6, 47),
(4, 6, 16),
(5, 6, 25);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, '3D Abstract'),
(2, 'Anime'),
(3, 'Bike'),
(4, 'Lanscape'),
(5, 'Girl');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(3) NOT NULL,
  `wallpaper_id` int(5) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `wallpaper_id`, `user_id`, `username`, `content`, `date`) VALUES
(7, 19, '6', 'Natsu', 'Hello', '2018-12-07 00:00:00'),
(9, 19, '6', 'Natsu', 'Beautiful, thanks!!!', '2018-12-07 00:00:00'),
(10, 19, '6', 'Natsu', 'I love that', '2018-12-07 09:52:02'),
(11, 16, '6', 'Natsu', 'Vuong ga', '2018-12-07 10:26:19'),
(12, 19, '7', 'tokuda', 'wow,that beautiful', '2018-12-07 10:52:16'),
(13, 73, '7', 'tokuda', 'Dungvothan', '2018-12-07 13:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `ID` int(11) NOT NULL,
  `Cat_ID` int(3) NOT NULL,
  `Wallpaper` text NOT NULL,
  `Owner` varchar(255) NOT NULL,
  `DownNum` int(11) NOT NULL,
  `Like_count` int(5) NOT NULL,
  `CmtNum` int(3) NOT NULL,
  `Date_upload` datetime NOT NULL,
  `Tag` varchar(255) NOT NULL DEFAULT 'wallpaper'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`ID`, `Cat_ID`, `Wallpaper`, `Owner`, `DownNum`, `Like_count`, `CmtNum`, `Date_upload`, `Tag`) VALUES
(16, 5, 'blonde-person-woman-10988.jpg', 'admin', 1, 2, 1, '2018-12-04 00:00:00', 'girl,beautiful'),
(19, 1, 'abstraction_painting_girl_paint_flowers_hand_thoughtful_rendering_93862_1920x1080.jpg', 'user', 5, 0, 4, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery,girl'),
(20, 1, 'abstraction_vector_girl_headphones_318_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(21, 1, 'cars_traffic_night_light_83478_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(22, 1, 'daniele-levis-pelusi-311022-unsplash.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(23, 1, 'flight_balloon_sky_86980_1920x1080.jpg', 'admin', 1, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(24, 1, 'girl_face_explosion_92171_1920x1080.jpg', 'admin', 1, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(25, 1, 'line_light_pattern_stripes_colorful_88549_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(26, 1, 'mask_face_balls_91679_1920x1080.jpg', 'Natsu', 0, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(27, 1, 'paint_water_liquid_85058_1920x1080.jpg', 'user', 0, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(28, 1, 'points_cubes_background_light_91691_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(29, 1, 'sky_light_abstraction_85064_1920x1080.jpg', 'admin', 3, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(30, 1, 'triangle_light_blurred_88541_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(47, 2, 'anime-girl-brown-hair-kimono-snow-blue-eyes-profile-view.png', 'admin', 4, 0, 0, '2018-12-04 00:00:00', 'anime,girl,cute,beautiful'),
(48, 2, 'anime-girl-guitar-instrument-birds-white-dress-singing-windy-brown-hair.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'anime,girl,cute,beautiful'),
(49, 2, 'anime-girl-ocean-teddy-bear-chair-scenic-horizon-clean-sky.png', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'anime,girl,cute,beautiful'),
(50, 2, 'anime-girl-school-uniform-back-view-clouds-buildings-sunlight.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'anime,girl,cute,beautiful'),
(51, 2, 'anime-girl-sunset-clouds-wind-scenic.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'anime,girl,cute,beautiful'),
(52, 2, 'IMG_3677.JPG', 'admin', 5, 0, 0, '2018-12-04 00:00:00', 'anime,girl,cute,beautiful'),
(72, 3, 'mountain_bike_cyclist_man_76602_1600x900.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'bike,bycicle'),
(73, 5, '5.jpg', 'Natsu', 1, 0, 1, '2018-12-04 00:00:00', 'irene,beautiful,kpop,red velvet,girl'),
(74, 5, '6.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'irene,beautiful,kpop,red velvet,girl'),
(75, 5, '7.png', 'Natsu', 0, 0, 0, '2018-12-04 00:00:00', 'irene,beautiful,kpop,red velvet,girl'),
(79, 4, 'rhythmoflivingwp.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene'),
(81, 4, 'questwp.jpg', 'Natsu', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene'),
(82, 4, 'callingwp.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene'),
(83, 4, 'greenwp.jpg', 'Natsu', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene'),
(84, 5, '2.jpg', 'admin', 2, 0, 0, '2018-12-04 00:00:00', 'girl,beautiful,cute'),
(85, 5, '3.jpg', 'Natsu', 0, 0, 0, '2018-12-04 00:00:00', 'girl,beautiful,cute'),
(86, 4, 'landscape_art_moon_127187_3840x2400.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene'),
(87, 4, 'dock_boat_landscape_86253_3840x2400.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene'),
(88, 4, 'landscape_art_road_127350_3840x2400.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene'),
(89, 4, 'sunset-1920x1080-bear-deer-8k-19715.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene'),
(90, 4, 'trang_an_bai_dinh_landscape_top_view_117348_3840x2400.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene'),
(91, 3, 'Bike-Wallpapers-21-1920-x-1200.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'bike,motorbike,moto'),
(93, 3, 'bike_grass_street_70263_1600x1200.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'bike,bycicle'),
(94, 3, 'bike_wheel_glare_blurring_54378_1920x1200.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'bike,bycicle'),
(95, 3, 'flo-karr-145590-unsplash.jpg', 'Natsu', 0, 0, 0, '2018-12-04 00:00:00', 'bike,bycicle'),
(97, 3, 'andhika-soreng-390599-unsplash.jpg', 'user', 0, 0, 0, '2018-12-04 00:00:00', 'bike,race'),
(98, 3, 'conor-luddy-547143-unsplash.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'bike,motorbike,moto'),
(99, 3, 'conor-luddy-649791-unsplash.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'bike,motorbike,moto'),
(100, 3, 'rikki-chan-122572-unsplash.jpg', 'Natsu', 0, 0, 0, '2018-12-04 00:00:00', 'bike,motorbike,moto'),
(101, 3, 'roberto-nickson-g-368523-unsplash.jpg', 'Natsu', 0, 0, 0, '2018-12-04 00:00:00', 'bike,motorbike,moto'),
(102, 3, 'volkan-olmez-340811-unsplash.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'bike,motorbike,moto'),
(103, 3, 'jia-ye-785389-unsplash.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'girl,bike,moto'),
(104, 4, 'village_aerial_view_landscape_130546_3840x2400.jpg', 'user', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene,amazing,wonderful,cloud,mountain'),
(105, 4, 'road_landscape_asphalt_130837_3840x2400.jpg', 'user', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene,amazing,wonderful,cloud,mountain'),
(106, 4, 'gracewp.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene,amazing,wonderful,cloud,mountain'),
(108, 0, '33984410.jpg', 'user', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl'),
(109, 0, 'anime-1920x1080-girl-beauty-4k-19468.jpg', 'user', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl'),
(110, 0, 'anime-1920x1080-girl-castle-4k-18919.jpg', 'Natsu', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl'),
(111, 0, 'anime-girl-black-hair-sad-expression-semi-realistic.png', 'admin', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl'),
(112, 0, 'anime-girl-closed-eyes-long-hair-red-scarf.jpg', 'admin', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl'),
(113, 0, 'made-in-abyss-ouzen-monochrome-black-eyes.jpg', 'admin', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl'),
(114, 0, 'r_e_n_d_e_r___9_by_pitviolet-dc9vsc1.png', 'admin', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl'),
(115, 2, 'anime-1920x1080-girl-castle-4k-18919.jpg', 'admin', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl,cartoon'),
(116, 2, 'anime-girl-black-hair-sad-expression-semi-realistic.png', 'admin', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl,cartoon'),
(117, 2, 'anime-girl-closed-eyes-long-hair-red-scarf.jpg', 'admin', 1, 0, 0, '2018-12-06 00:00:00', 'anime,girl,cartoon'),
(118, 2, 'anime-girl-slice-of-life-breads-scarf-brown-hair.jpg', 'admin', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl,cartoon'),
(119, 2, 'made-in-abyss-ouzen-monochrome-black-eyes.jpg', 'user', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl,cartoon'),
(120, 2, 'r_e_n_d_e_r___9_by_pitviolet-dc9vsc1.png', 'user', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl,cartoon'),
(122, 5, 'b.jpg', 'admin', 0, 0, 0, '2018-12-06 00:00:00', 'girl,beautiful,sexy'),
(123, 5, 'c.jpg', 'Natsu', 0, 0, 0, '2018-12-06 00:00:00', 'girl,beautiful,sexy'),
(126, 1, 'WallpaperStudio10-46323.jpg', 'Natsu', 4, 0, 0, '2018-12-07 00:00:00', 'abstract,jellyfish,sea'),
(127, 1, 'geometric-1366x768-shapes-mosaic-hd-3087.jpg', 'Natsu', 0, 1, 0, '2018-12-08 10:41:56', '3d,square');

-- --------------------------------------------------------

--
-- Table structure for table `love`
--

CREATE TABLE `love` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `wallpaper_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `love`
--

INSERT INTO `love` (`id`, `user_id`, `wallpaper_id`) VALUES
(18, 6, 28),
(20, 6, 19),
(22, 6, 23),
(23, 6, 24),
(24, 6, 29),
(25, 6, 20),
(26, 6, 20),
(27, 6, 47),
(30, 6, 16),
(31, 6, 127);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(3) NOT NULL,
  `cat_id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `tag` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'draft',
  `comments_count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL DEFAULT 'Mr.Fox',
  `birthday` date NOT NULL,
  `gender` varchar(255) NOT NULL DEFAULT 'Male',
  `about` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'fox.jpg',
  `status` varchar(255) NOT NULL,
  `upload_count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `birthday`, `gender`, `about`, `role`, `email`, `avatar`, `status`, `upload_count`) VALUES
(1, 'admin', 'admin', 'Mr.Admin', '0000-00-00', 'Male', '', 'admin', 'admin@gmail.com', 'fox.jpg', '', 43),
(2, 'user', '1212', 'Mr.Fox', '0000-00-00', 'Male', 'I love fox wallpaper', 'user', 'user@gmail.com', 'fox.jpg', '', 9),
(3, 'unactive', '1234', 'Mr.Fox', '0000-00-00', 'Male', '', 'user', 'abcd@gmail.com', 'fox.jpg', 'ban', 0),
(6, 'Natsu', '1111', 'Duy Hung Bui', '1997-12-07', 'Male', ' Hello Summer , I love you <3  ', 'user', 'natsu1270@gmail.com', 'd.jpg', '', 13),
(7, 'tokuda', '1212qwqw', 'Tokuda', '0000-00-00', 'Male', '  I am tokuda ', 'user', 'kuda@gmail.com', 'hollow_knight_guide.0.jpg', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `love`
--
ALTER TABLE `love`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `b_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `love`
--
ALTER TABLE `love`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
