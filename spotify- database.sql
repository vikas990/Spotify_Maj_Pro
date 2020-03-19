-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2020 at 04:24 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotify`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `artist` int(11) NOT NULL,
  `geners` int(11) NOT NULL,
  `artworkpath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `geners`, `artworkpath`) VALUES
(1, 'Z-xBF', 2, 3, 'assests/artwork/energy.jpg'),
(2, 'fatehal', 3, 1, 'assests/artwork/popdance.jpg'),
(3, 'sportofi', 4, 5, 'assests/artwork/goinghigher.jpg'),
(4, 'MY MOOD', 3, 6, 'assests/artwork/mymood.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`) VALUES
(1, 'Hardy Sandhu'),
(2, 'Jessi Gill'),
(3, 'Rafter'),
(4, 'Honey Singh'),
(5, 'Gurunazar');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Pop'),
(2, 'Rock'),
(3, 'Romantic'),
(4, 'EDM'),
(5, 'Old is Gold'),
(6, 'MyMood');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `datecreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `datecreated`) VALUES
(4, 'Mix Mood', 'vikas', '2020-02-25 00:00:00'),
(6, 'my Music', 'vikas', '2020-02-26 00:00:00'),
(7, 'yoyo', 'shivam', '2020-02-26 00:00:00'),
(8, 'mood', 'shivam', '2020-03-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `playlistSongs`
--

CREATE TABLE `playlistSongs` (
  `id` int(11) NOT NULL,
  `songid` int(11) NOT NULL,
  `playlistid` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlistSongs`
--

INSERT INTO `playlistSongs` (`id`, `songid`, `playlistid`, `playlistOrder`) VALUES
(3, 34, 4, 2),
(4, 34, 4, 3),
(6, 36, 4, 5),
(8, 34, 6, 1),
(9, 36, 6, 2),
(10, 35, 6, 3),
(11, 32, 6, 4),
(12, 37, 6, 5),
(14, 14, 5, 3),
(15, 7, 5, 4),
(16, 6, 7, 1),
(17, 17, 7, 2),
(18, 16, 7, 3),
(19, 8, 7, 4),
(20, 7, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Songs`
--

CREATE TABLE `Songs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Songs`
--

INSERT INTO `Songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'Acoustic Breeze', 1, 2, 3, '2:37', 'assests/music/bensound-acousticbreeze.mp3', 1, 21),
(2, 'A new beginning', 1, 3, 1, '2:35', 'assests/music/bensound-anewbeginning.mp3', 2, 6),
(3, 'Better Days', 1, 2, 2, '2:33', 'assests/music/bensound-betterdays.mp3', 3, 11),
(4, 'Buddy', 1, 4, 3, '2:02', 'assests/music/bensound-buddy.mp3', 4, 8),
(5, 'Clear Day', 1, 2, 4, '1:29', 'assests/music/bensound-clearday.mp3', 5, 3),
(6, 'Going Higher', 2, 1, 1, '4:04', 'assests/music/bensound-goinghigher.mp3', 1, 21),
(7, 'Funny Song', 2, 4, 2, '3:07', 'assests/music/bensound-funnysong.mp3', 2, 13),
(8, 'Funky Element', 2, 1, 3, '3:08', 'assests/music/bensound-funkyelement.mp3', 2, 20),
(9, 'Extreme Action', 2, 1, 4, '8:03', 'assests/music/bensound-extremeaction.mp3', 3, 19),
(10, 'Epic', 2, 4, 5, '2:58', 'assests/music/bensound-epic.mp3', 3, 10),
(11, 'Energy', 2, 1, 6, '2:59', 'assests/music/bensound-energy.mp3', 4, 25),
(12, 'Dubstep', 2, 1, 7, '2:03', 'assests/music/bensound-dubstep.mp3', 5, 14),
(13, 'Happiness', 3, 2, 8, '4:21', 'assests/music/bensound-happiness.mp3', 5, 14),
(14, 'Happy Rock', 3, 2, 9, '1:45', 'assests/music/bensound-happyrock.mp3', 4, 10),
(15, 'Jazzy Frenchy', 3, 2, 10, '1:44', 'assests/music/bensound-jazzyfrenchy.mp3', 3, 2),
(16, 'Little Idea', 3, 1, 1, '2:49', 'assests/music/bensound-littleidea.mp3', 2, 5),
(17, 'Memories', 3, 1, 2, '3:50', 'assests/music/bensound-memories.mp3', 1, 7),
(18, 'Moose', 4, 1, 1, '2:43', 'assests/music/bensound-moose.mp3', 5, 3),
(19, 'November', 4, 1, 2, '3:32', 'assests/music/bensound-november.mp3', 4, 11),
(20, 'Of Elias Dream', 4, 1, 3, '4:58', 'assests/music/bensound-ofeliasdream.mp3', 3, 5),
(21, 'Pop Dance', 4, 4, 2, '2:42', 'assests/music/bensound-popdance.mp3', 2, 8),
(22, 'Retro Soul', 4, 4, 5, '3:36', 'assests/music/bensound-retrosoul.mp3', 1, 9),
(23, 'Sad Day', 5, 2, 1, '2:28', 'assests/music/bensound-sadday.mp3', 1, 22),
(24, 'Sci-fi', 5, 2, 2, '4:44', 'assests/music/bensound-scifi.mp3', 2, 27),
(25, 'Slow Motion', 5, 2, 3, '3:26', 'assests/music/bensound-slowmotion.mp3', 3, 20),
(27, 'Sweet', 5, 2, 5, '5:07', 'assets/music/bensound-sweet.mp3', 5, 11),
(32, 'KINNA SONA', 3, 4, 6, '4:29', 'assests/music/kinnasona.mp3', 3, 6),
(34, 'Raat Di Gedi', 4, 4, 6, '4:13', 'assests/music/Raatdigedi.mp3', 1, 11),
(35, 'IK VAARI', 5, 4, 6, '5:00', 'assests/music/Ikvaari.mp3', 2, 9),
(36, 'Kalla Changa', 2, 4, 6, '3:51', 'assests/music/Kallachanga.mp3', 2, 8),
(37, 'Taandav', 5, 4, 6, '3:22', 'assests/music/Taandav.mp3', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signupdate` datetime NOT NULL,
  `profilepic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `signupdate`, `profilepic`) VALUES
(2, 'shivam', 'Shivam', 'Kumar', 'Shivamsaha@gmail.com', '4f73954d7ffa07973f2d28bde12fca4d', '2020-02-01 00:00:00', 'assests/images/profile-pic/z1.png'),
(7, 'nikhil', 'Nikhil', 'Tevtia', 'Nikhiltevtia@gmail.com', '22187f737613f9504739384ad941f738', '2020-02-27 00:00:00', 'assests/images/profile-pic/z1.png'),
(8, 'Vikas', 'Vikas', 'Kumar', 'Vikaskumarp66@gmail.com', 'b81dafcd437e21322a1be19ba6109814', '2020-02-27 00:00:00', 'assests/images/profile-pic/z1.png'),
(9, 'rohit', 'Rohit', 'Kumar', 'Coolfairrohit@gmail.com', '3461724f90a9c811cd4357f1b177167f', '2020-03-18 00:00:00', 'assests/images/profile-pic/z1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlistSongs`
--
ALTER TABLE `playlistSongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Songs`
--
ALTER TABLE `Songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `playlistSongs`
--
ALTER TABLE `playlistSongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Songs`
--
ALTER TABLE `Songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
