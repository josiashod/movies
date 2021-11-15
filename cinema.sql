-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 04:38 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `date`) VALUES
(1, 'Samuel AHOUANVOEKE', 'samuelahouanvoeke@gmail.com', 'Africa\'s burgeoning animation scene got a boost this week with the announcement of an ambitious new partnership that will pair rising talents from across the continent ... Africa\'s burgeoning animation scene got a boost this week with the announcement of an ambitious new partnership that will pair rising talents from across the continent ...', '2021-11-14 12:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `type`, `content`, `image`) VALUES
(1, 'New Character Posters For Pirates Of The Caribbean', '2021-11-13', 'avant-premieres', ' Joss Whedon has a little bit of a history with superhero movies, and for creating layered female characters. After his documented frustrations with Wonder Woman, he\'s getting another chance at the DC Extended Universe and Warner Bros., closing in on a deal to write direct and produce a Batgirl movie.\r\n\r\nIt\'s a somewhat surprising, but welcome move, given that Whedon has taken a long break to write something original, but has now pivoted to focus on developing the Batgirl project. First appearing in 1967 in Gardner Fox and Carmine Infantino\'s story run The Million Dollar Debut Of Batgirl, she\'s the superhero alias of Barbara Gordon, daughter of Gotham City Police Commissioner James Gordon. So we can likely expect J.K. Simmons\' take on Gordon to appear along with other Bat-related characters.\r\n\r\nBased on Lissa Evans’ novel “Their Finest Hour and a Half” and directed by Lone Scherfig (“An Education”), the film is set in London during World War II when the British ministry was utilizing propaganda films to boost morale. Arterton plays Catrin Cole, a scriptwriter who is brought on to handle the women’s dialogue — commonly referred to as “the nausea.” The film, opening this week, features an outstanding ensemble, including Bill Nighy as a washed-up actor and Sam Claflin as Catrin’s fellow writer and sparring partner.\r\n\r\nArterton is next set to play Vita Sackville-West in Vita and Virginia about her relationship with Virginia Woolf. She spoke to Variety about working with female directors, remarkable women, and why she shies away from the term “strong female character.”\r\nI’m friends with the producer who I worked with on Byzantium and he sent it to me. I read the book as well, which is fantastic. You’re always looking for untold stories and many times they’re women’s stories. What surprised me is that it centers around a woman who’s really quite timid. I guess she’s allowed to be because all of the other characters. ', 'blog-detail.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `type_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `link`, `type_id`, `type`) VALUES
(1, 'Capture d’écran (90).png', 1, 'image'),
(2, 'Capture d’écran (91).png', 1, 'image'),
(3, 'Capture d’écran (92).png', 1, 'image'),
(4, 'bloglist-it1.jpg', 1, 'event'),
(5, 'bloglist-it2.jpg', 1, 'event'),
(6, 'bloglist-it3.jpg', 1, 'event'),
(7, 'bloglist-it4.jpg', 1, 'event'),
(8, 'bloglist-it5.jpg', 1, 'event'),
(9, 'bloglist-it6.jpg', 1, 'event'),
(10, 'blogv21.jpg', 1, 'event'),
(11, 'blogv22.jpg', 1, 'event'),
(12, 'blogv23.jpg', 1, 'event'),
(13, 'blogv24.jpg', 1, 'event'),
(14, 'blogv25.jpg', 1, 'event'),
(15, 'ava3.jpg', 2, 'image'),
(16, 'ava4.jpg', 2, 'image'),
(17, 'blog26.jpg', 2, 'image'),
(18, 'blog27.jpg', 2, 'image'),
(19, 'blog29.jpg', 2, 'image'),
(20, 'blog-detail.jpg', 2, 'image'),
(21, 'blog-detail2.jpg', 2, 'image'),
(22, 'bloglist-it1.jpg', 2, 'image'),
(23, 'bloglist-it2.jpg', 2, 'image'),
(24, 'bloglist-it3.jpg', 2, 'image'),
(25, 'blogv22.jpg', 2, 'image'),
(26, 'blogv23.jpg', 2, 'image'),
(27, 'blogv24.jpg', 2, 'image'),
(28, 'blogv25.jpg', 2, 'image');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `kind` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `new` tinyint(1) NOT NULL,
  `resume` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `kind`, `name`, `date`, `time`, `new`, `resume`, `image`) VALUES
(1, 'divertissement', 'SPATARI', '2021-11-11', '01:30:00', 1, 'Tony Stark creates the Ultron Program to protect the world, but when the peacekeeping program becomes hostile, The Avengers go into action to try and defeat a virtually impossible enemy together. Earth\'s mightiest heroes must come together once again to protect the world from global extinction.', 'movie-single.jpg'),
(2, 'action', 'Aang AVATAR', '2021-11-17', '02:30:00', 0, 'Prince died not long after the 2016 Rock Hall ceremony, so this year\'s edition featured Lenny Kravitz and a full gospel choir performing a swamp-funk take on When Doves Cry.\r\nPrince died not long after the 2016 Rock Hall ceremony, so this year\'s edition featured Lenny Kravitz and a full gospel choir performing a swamp-funk take on When Doves Cry.\r\nPrince died not long after the 2016 Rock Hall ceremony, so this year\'s edition featured Lenny Kravitz and a full gospel choir performing a swamp-funk take on When Doves Cry.\r\nPrince died not long after the 2016 Rock Hall ceremony, so this year\'s edition featured Lenny Kravitz and a full gospel choir performing a swamp-funk take on When Doves Cry.\r\nPrince died not long after the 2016 Rock Hall ceremony, so this year\'s edition featured Lenny Kravitz and a full gospel choir performing a swamp-funk take on When Doves Cry.', 'film1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `week` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `rate` varchar(255) NOT NULL,
  `movie` int(11) NOT NULL,
  `room` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `date`, `week`, `time`, `rate`, `movie`, `room`) VALUES
(1, '2021-11-07', '2021-11-44', '15:30:00', 'Tarif Standart - 1500', 1, 'Salle Aang - 200'),
(2, '2021-11-11', '2021-11-45', '02:10:00', 'Tarif standard - 1500', 2, '1 - 200');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `name`, `price`) VALUES
(1, 'Tarif standard', 1500),
(2, 'Aang AVATAR', 0),
(3, '', 0),
(4, '', 0),
(5, '', 0),
(6, '', 0),
(7, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `place` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `place`) VALUES
(1, 'Aang AVATAR', 200),
(2, '', 0),
(3, '', 0),
(4, '', 0),
(5, '', 0),
(6, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `statut`) VALUES
(1, 'Shrisby', 'digitsolutionsbj@gmail.com', '70c881d4a26984ddce795f6f71817c9cf4480e79', 0),
(2, 'Samuel', 'samuelahouanvoeke@gmail.com', '70c881d4a26984ddce795f6f71817c9cf4480e79', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
