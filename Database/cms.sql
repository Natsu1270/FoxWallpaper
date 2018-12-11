-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2018 lúc 05:15 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cms`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookmark`
--

CREATE TABLE `bookmark` (
  `b_id` int(5) NOT NULL,
  `b_userid` int(5) NOT NULL,
  `b_wallid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bookmark`
--

INSERT INTO `bookmark` (`b_id`, `b_userid`, `b_wallid`) VALUES
(1, 6, 19),
(2, 6, 23),
(3, 6, 47),
(4, 6, 16),
(5, 6, 25),
(6, 6, 97),
(7, 6, 100),
(8, 6, 115);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, '3D Abstract'),
(2, 'Anime'),
(3, 'Bike'),
(4, 'Lanscape'),
(5, 'Girl');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
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
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `wallpaper_id`, `user_id`, `username`, `content`, `date`) VALUES
(7, 19, '6', 'Natsu', 'Hello', '2018-12-07 00:00:00'),
(9, 19, '6', 'Natsu', 'Beautiful, thanks!!!', '2018-12-07 00:00:00'),
(10, 19, '6', 'Natsu', 'I love that', '2018-12-07 09:52:02'),
(11, 16, '6', 'Natsu', 'Vuong ga', '2018-12-07 10:26:19'),
(12, 19, '7', 'tokuda', 'wow,that beautiful', '2018-12-07 10:52:16'),
(13, 73, '7', 'tokuda', 'Dungvothan', '2018-12-07 13:27:01'),
(14, 127, '6', 'Natsu', 'cool,I love it.', '2018-12-08 15:41:15'),
(15, 120, '6', 'Natsu', 'Äáº¹p wa.', '2018-12-09 07:06:12'),
(16, 84, '2', 'user', 'Ä‘áº¹p quÃ¡ <3', '2018-12-11 05:01:32'),
(17, 73, '2', 'user', 'irene kÃ¬a..', '2018-12-11 05:04:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
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
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`ID`, `Cat_ID`, `Wallpaper`, `Owner`, `DownNum`, `Like_count`, `CmtNum`, `Date_upload`, `Tag`) VALUES
(16, 5, 'blonde-person-woman-10988.jpg', 'admin', 1, 2, 1, '2018-12-04 00:00:00', 'girl,beautiful'),
(19, 1, 'abstraction_painting_girl_paint_flowers_hand_thoughtful_rendering_93862_1920x1080.jpg', 'user', 5, 2, 4, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery,girl'),
(20, 1, 'abstraction_vector_girl_headphones_318_1920x1080.jpg', 'admin', 0, 1, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(21, 1, 'cars_traffic_night_light_83478_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(22, 1, 'daniele-levis-pelusi-311022-unsplash.jpg', 'admin', 1, 2, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(23, 1, 'flight_balloon_sky_86980_1920x1080.jpg', 'admin', 1, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(24, 1, 'girl_face_explosion_92171_1920x1080.jpg', 'admin', 1, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(25, 1, 'line_light_pattern_stripes_colorful_88549_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(26, 1, 'mask_face_balls_91679_1920x1080.jpg', 'Natsu', 0, 1, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(27, 1, 'paint_water_liquid_85058_1920x1080.jpg', 'user', 0, 1, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(28, 1, 'points_cubes_background_light_91691_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(29, 1, 'sky_light_abstraction_85064_1920x1080.jpg', 'admin', 3, -1, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(30, 1, 'triangle_light_blurred_88541_1920x1080.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'abstract,colorful,color,mystery'),
(47, 2, 'anime-girl-brown-hair-kimono-snow-blue-eyes-profile-view.png', 'admin', 4, 0, 0, '2018-12-04 00:00:00', 'anime,girl,cute,beautiful'),
(48, 2, 'anime-girl-guitar-instrument-birds-white-dress-singing-windy-brown-hair.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'anime,girl,cute,beautiful'),
(49, 2, 'anime-girl-ocean-teddy-bear-chair-scenic-horizon-clean-sky.png', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'anime,girl,cute,beautiful'),
(50, 2, 'anime-girl-school-uniform-back-view-clouds-buildings-sunlight.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'anime,girl,cute,beautiful'),
(51, 2, 'anime-girl-sunset-clouds-wind-scenic.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'anime,girl,cute,beautiful'),
(52, 2, 'IMG_3677.JPG', 'admin', 5, 0, 0, '2018-12-04 00:00:00', 'anime,girl,cute,beautiful'),
(72, 3, 'mountain_bike_cyclist_man_76602_1600x900.jpg', 'admin', 0, 1, 0, '2018-12-04 00:00:00', 'bike,bycicle'),
(73, 5, '5.jpg', 'Natsu', 1, 0, 2, '2018-12-04 00:00:00', 'irene,beautiful,kpop,red velvet,girl'),
(74, 5, '6.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'irene,beautiful,kpop,red velvet,girl'),
(75, 5, '7.png', 'Natsu', 0, 0, 0, '2018-12-04 00:00:00', 'irene,beautiful,kpop,red velvet,girl'),
(79, 4, 'rhythmoflivingwp.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene'),
(81, 4, 'questwp.jpg', 'Natsu', 0, 1, 0, '2018-12-04 00:00:00', 'landscape,sene'),
(82, 4, 'callingwp.jpg', 'admin', 0, 1, 0, '2018-12-04 00:00:00', 'landscape,sene'),
(83, 4, 'greenwp.jpg', 'Natsu', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene'),
(84, 5, '2.jpg', 'admin', 2, 1, 1, '2018-12-04 00:00:00', 'girl,beautiful,cute'),
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
(104, 4, 'village_aerial_view_landscape_130546_3840x2400.jpg', 'user', 0, 1, 0, '2018-12-04 00:00:00', 'landscape,sene,amazing,wonderful,cloud,mountain'),
(105, 4, 'road_landscape_asphalt_130837_3840x2400.jpg', 'user', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene,amazing,wonderful,cloud,mountain'),
(106, 4, 'gracewp.jpg', 'admin', 0, 0, 0, '2018-12-04 00:00:00', 'landscape,sene,amazing,wonderful,cloud,mountain'),
(108, 0, '33984410.jpg', 'user', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl'),
(109, 0, 'anime-1920x1080-girl-beauty-4k-19468.jpg', 'user', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl'),
(110, 0, 'anime-1920x1080-girl-castle-4k-18919.jpg', 'Natsu', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl'),
(111, 0, 'anime-girl-black-hair-sad-expression-semi-realistic.png', 'admin', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl'),
(112, 0, 'anime-girl-closed-eyes-long-hair-red-scarf.jpg', 'admin', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl'),
(113, 0, 'made-in-abyss-ouzen-monochrome-black-eyes.jpg', 'admin', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl'),
(114, 0, 'r_e_n_d_e_r___9_by_pitviolet-dc9vsc1.png', 'admin', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl'),
(115, 2, 'anime-1920x1080-girl-castle-4k-18919.jpg', 'admin', 0, 1, 0, '2018-12-06 00:00:00', 'anime,girl,cartoon'),
(116, 2, 'anime-girl-black-hair-sad-expression-semi-realistic.png', 'admin', 0, 1, 0, '2018-12-06 00:00:00', 'anime,girl,cartoon'),
(117, 2, 'anime-girl-closed-eyes-long-hair-red-scarf.jpg', 'admin', 1, 0, 0, '2018-12-06 00:00:00', 'anime,girl,cartoon'),
(118, 2, 'anime-girl-slice-of-life-breads-scarf-brown-hair.jpg', 'admin', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl,cartoon'),
(119, 2, 'made-in-abyss-ouzen-monochrome-black-eyes.jpg', 'user', 0, 0, 0, '2018-12-06 00:00:00', 'anime,girl,cartoon'),
(120, 2, 'r_e_n_d_e_r___9_by_pitviolet-dc9vsc1.png', 'user', 3, 0, 1, '2018-12-06 00:00:00', 'anime,girl,cartoon'),
(122, 5, 'b.jpg', 'admin', 0, 0, 0, '2018-12-06 00:00:00', 'girl,beautiful,sexy'),
(123, 5, 'c.jpg', 'Natsu', 0, 0, 0, '2018-12-06 00:00:00', 'girl,beautiful,sexy'),
(126, 1, 'WallpaperStudio10-46323.jpg', 'Natsu', 4, 1, 0, '2018-12-07 00:00:00', 'abstract,jellyfish,sea'),
(127, 1, 'geometric-1366x768-shapes-mosaic-hd-3087.jpg', 'Natsu', 6, 3, 1, '2018-12-08 10:41:56', '3d,square'),
(128, 2, 'original.gif', 'user', 0, 0, 0, '2018-12-11 04:15:11', 'sakura,anime');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `love`
--

CREATE TABLE `love` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `wallpaper_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `love`
--

INSERT INTO `love` (`id`, `user_id`, `wallpaper_id`) VALUES
(20, 6, 19),
(22, 6, 23),
(23, 6, 24),
(27, 6, 47),
(30, 6, 16),
(32, 6, 72),
(33, 2, 19),
(34, 2, 84),
(35, 2, 116),
(36, 7, 19),
(39, 6, 126),
(40, 6, 28),
(42, 6, 26),
(58, 6, 20),
(59, 6, 22),
(60, 6, 27),
(61, 27, 127),
(62, 2, 22),
(63, 2, 82),
(64, 2, 81),
(65, 2, 104),
(66, 2, 127);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
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
-- Cấu trúc bảng cho bảng `user`
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
  `active_code` varchar(255) NOT NULL,
  `upload_count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `birthday`, `gender`, `about`, `role`, `email`, `avatar`, `status`, `active_code`, `upload_count`) VALUES
(1, 'admin', 'admin', 'Mr.Admin', '0000-00-00', 'Male', '', 'admin', 'admin@gmail.com', 'fox.jpg', '', '', 43),
(2, 'user', '1212', 'Mr.Fox', '0000-00-00', 'Male', 'I love fox wallpaper', 'user', 'user@gmail.com', 'fox.jpg', '', '', 10),
(6, 'Natsu', '1111', 'Duy Hung Bui', '1997-12-07', 'Male', 'I am fine !', 'user', 'hungduy1270@gmail.com', 'd.jpg', '', '', 13),
(7, 'tokuda', '1212qwqw', 'Tokuda', '0000-00-00', 'Male', '  I am tokuda ', 'user', 'kuda@gmail.com', 'hollow_knight_guide.0.jpg', '', '', 0),
(34, 'test', '1234', 'Mr.Fox', '0000-00-00', 'Male', '', 'user', 'test123@email.com', '', 'unactived', 'aa3725c0e214c56ffea6a3246ad9adb5', 0),
(35, 'test2', '1212', 'Mr.Fox', '0000-00-00', 'Male', '', 'user', 'test2@gg.com', '', 'unactived', '5feb03af7075488fdf2c15bcb051310f', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`b_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `love`
--
ALTER TABLE `love`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `b_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT cho bảng `love`
--
ALTER TABLE `love`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
