CREATE TABLE `bookmark` (
  `b_id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `b_userid` int(5) NOT NULL,
  `b_wallid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `category` (
  `id` int(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `category` (`id`, `title`) VALUES
(1, '3D Abstract'),
(2, 'Anime'),
(3, 'Bike'),
(4, 'Lanscape'),
(5, 'Girl');





CREATE TABLE `comment` (
  `id` int(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `wallpaper_id` int(5) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `image` (
  `ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Cat_ID` int(3) NOT NULL,
  `Wallpaper` text NOT NULL,
  `Owner` varchar(255) NOT NULL,
  `DownNum` int(11) NOT NULL,
  `Like_count` int(5) NOT NULL,
  `CmtNum` int(3) NOT NULL,
  `Date_upload` datetime NOT NULL,
  `Tag` varchar(255) NOT NULL DEFAULT 'wallpaper'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `love` (
  `Id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_Id` int(5) NOT NULL,
  `wallpaper_Id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `posts` (
  `id` int(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
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




CREATE TABLE `user` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NULL DEFAULT 'Mr.Fox',
  `birthday` date NULL,
  `gender` varchar(255) NULL DEFAULT 'Male',
  `about` text NULL,
  `role` varchar(255)  NULL,
  `email` varchar(255) NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'fox.png',
  `status` varchar(255) NULL,
  `active_code` varchar(255) NULL,
  `upload_count` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

