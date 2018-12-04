-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 02:50 PM
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
  `post_id` int(3) NOT NULL,
  `author` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `author`, `email`, `content`, `status`, `date`) VALUES
(1, 1, 'Natsu', 'hdaobk@yahoo.com', 'Nice theme,I love that...<3.', 'approved', '2018-11-28'),
(4, 3, 'yasou', 'yasou@gmail.com', 'Hasagi', 'approved', '2018-11-29'),
(6, 2, 'Talon', 'Talon@lol.com', 'Talon assassin is the best', 'approved', '2018-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `ID` int(11) NOT NULL,
  `Cat_ID` int(3) NOT NULL,
  `Wallpaper` text NOT NULL,
  `Owner` varchar(255) NOT NULL,
  `Download_count` int(11) NOT NULL,
  `Like_count` int(5) NOT NULL,
  `Comment_count` int(3) NOT NULL,
  `Date_upload` date NOT NULL,
  `Tag` varchar(255) NOT NULL DEFAULT 'wallpaper'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`ID`, `Cat_ID`, `Wallpaper`, `Owner`, `Download_count`, `Like_count`, `Comment_count`, `Date_upload`, `Tag`) VALUES
(16, 5, 'blonde-person-woman-10988.jpg', 'admin', 0, 0, 0, '2018-12-04', 'girl,beautiful'),
(19, 1, 'abstraction_painting_girl_paint_flowers_hand_thoughtful_rendering_93862_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04', 'abstract,colorful,color,mystery'),
(20, 1, 'abstraction_vector_girl_headphones_318_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04', 'abstract,colorful,color,mystery'),
(21, 1, 'cars_traffic_night_light_83478_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04', 'abstract,colorful,color,mystery'),
(22, 1, 'daniele-levis-pelusi-311022-unsplash.jpg', 'admin', 0, 0, 0, '2018-12-04', 'abstract,colorful,color,mystery'),
(23, 1, 'flight_balloon_sky_86980_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04', 'abstract,colorful,color,mystery'),
(24, 1, 'girl_face_explosion_92171_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04', 'abstract,colorful,color,mystery'),
(25, 1, 'line_light_pattern_stripes_colorful_88549_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04', 'abstract,colorful,color,mystery'),
(26, 1, 'mask_face_balls_91679_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04', 'abstract,colorful,color,mystery'),
(27, 1, 'paint_water_liquid_85058_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04', 'abstract,colorful,color,mystery'),
(28, 1, 'points_cubes_background_light_91691_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04', 'abstract,colorful,color,mystery'),
(29, 1, 'sky_light_abstraction_85064_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04', 'abstract,colorful,color,mystery'),
(30, 1, 'triangle_light_blurred_88541_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04', 'abstract,colorful,color,mystery'),
(31, 1, 'triangle_shape_dark_figure_88540_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04', 'abstract,colorful,color,mystery'),
(47, 2, 'anime-girl-brown-hair-kimono-snow-blue-eyes-profile-view.png', 'admin', 0, 0, 0, '2018-12-04', 'anime,girl,cute,beautiful'),
(48, 2, 'anime-girl-guitar-instrument-birds-white-dress-singing-windy-brown-hair.jpg', 'admin', 0, 0, 0, '2018-12-04', 'anime,girl,cute,beautiful'),
(49, 2, 'anime-girl-ocean-teddy-bear-chair-scenic-horizon-clean-sky.png', 'admin', 0, 0, 0, '2018-12-04', 'anime,girl,cute,beautiful'),
(50, 2, 'anime-girl-school-uniform-back-view-clouds-buildings-sunlight.jpg', 'admin', 0, 0, 0, '2018-12-04', 'anime,girl,cute,beautiful'),
(51, 2, 'anime-girl-sunset-clouds-wind-scenic.jpg', 'admin', 0, 0, 0, '2018-12-04', 'anime,girl,cute,beautiful'),
(52, 2, 'IMG_3677.JPG', 'admin', 0, 0, 0, '2018-12-04', 'anime,girl,cute,beautiful'),
(54, 3, '2019_ducati_scrambler_icon_4k-t1.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,moto,motorbike,race'),
(56, 3, '2019_kawasaki_ninja_zx_10r_krt_2-t1.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,moto,motorbike,race'),
(57, 3, '2019_kawasaki_ninja_zx_10r_krt-t1.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,moto,motorbike,race'),
(58, 3, '2019_kawasaki_z125_5k-t1.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,moto,motorbike,race'),
(60, 3, '2019_ktm_1290_super_duke_gt_4k-t1.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,moto,motorbike,race'),
(61, 3, '2020_suzuki_katana_4k_8k-t1.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,moto,motorbike,race'),
(62, 3, '2020_suzuki_katana_4k-t1.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,moto,motorbike,race'),
(63, 3, 'bmw_r_ninet_falcon_by_hookie_co-t1.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,moto,motorbike,race'),
(64, 3, 'kawasaki_ninja_zx_10r_5k-t1.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,moto,motorbike,race'),
(65, 3, 'ktm_1290_super_duke_gt_2019_4k-t1.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,moto,motorbike,race'),
(66, 3, 'motocross_biker_stunts-t1.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,moto,motorbike,race'),
(67, 3, 'mv_agusta_dragster_800_rr_pirelli_2018_4k_2-t1.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,moto,motorbike,race'),
(68, 3, 'mv_agusta_dragster_800_rr_pirelli_2018_4k-t1.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,moto,motorbike,race'),
(69, 3, 'yamaha_xjr_1300_cafe_racer_4k-t1.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,moto,motorbike,race'),
(70, 3, 'bike_grass_street_70263_1600x1200.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,bycicle'),
(71, 3, 'bike_wheel_glare_blurring_54378_1920x1200.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,bycicle'),
(72, 3, 'mountain_bike_cyclist_man_76602_1600x900.jpg', 'admin', 0, 0, 0, '2018-12-04', 'bike,bycicle'),
(73, 5, '5.jpg', 'admin', 0, 0, 0, '2018-12-04', 'irene,beautiful,kpop,red velvet,girl'),
(74, 5, '6.jpg', 'admin', 0, 0, 0, '2018-12-04', 'irene,beautiful,kpop,red velvet,girl'),
(75, 5, '7.png', 'admin', 0, 0, 0, '2018-12-04', 'irene,beautiful,kpop,red velvet,girl'),
(79, 4, 'rhythmoflivingwp.jpg', 'admin', 0, 0, 0, '2018-12-04', 'landscape,sene'),
(81, 4, 'questwp.jpg', 'admin', 0, 0, 0, '2018-12-04', 'landscape,sene'),
(82, 4, 'callingwp.jpg', 'admin', 0, 0, 0, '2018-12-04', 'landscape,sene'),
(83, 4, 'greenwp.jpg', 'admin', 0, 0, 0, '2018-12-04', 'landscape,sene'),
(84, 5, '2.jpg', 'admin', 0, 0, 0, '2018-12-04', 'girl,beautiful,cute'),
(85, 5, '3.jpg', 'admin', 0, 0, 0, '2018-12-04', 'girl,beautiful,cute'),
(86, 4, 'landscape_art_moon_127187_3840x2400.jpg', 'admin', 0, 0, 0, '2018-12-04', 'landscape,sene'),
(87, 4, 'dock_boat_landscape_86253_3840x2400.jpg', 'admin', 0, 0, 0, '2018-12-04', 'landscape,sene'),
(88, 4, 'landscape_art_road_127350_3840x2400.jpg', 'admin', 0, 0, 0, '2018-12-04', 'landscape,sene'),
(89, 4, 'sunset-1920x1080-bear-deer-8k-19715.jpg', 'admin', 0, 0, 0, '2018-12-04', 'landscape,sene'),
(90, 4, 'trang_an_bai_dinh_landscape_top_view_117348_3840x2400.jpg', 'admin', 0, 0, 0, '2018-12-04', 'landscape,sene');

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
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role`, `email`, `avatar`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '', ''),
(2, 'user', '1212', 'user', 'user@gmail.com', '', ''),
(3, 'unactive', '1234', 'user', 'abcd@gmail.com', '', 'ban'),
(4, 'banned', '1234', 'user', 'ban@gmail.com', '', 'ban');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
