-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2024 at 12:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brightminds`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `description`, `time_stamp`) VALUES
(2, 'Diary of a monster', 'uploads/img-1.png', 'Be free to check it out', '2024-10-12 18:58:59'),
(3, 'My unlived life', 'uploads/img-1.png', 'Hurry and check it out!', '2024-10-12 20:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poems`
--

CREATE TABLE `poems` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `text` text NOT NULL,
  `category` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) DEFAULT 0,
  `dislikes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poems`
--

INSERT INTO `poems` (`id`, `title`, `image`, `text`, `category`, `time_stamp`, `likes`, `dislikes`) VALUES
(5, 'A glimpse of her', 'uploads/R.jpg', 'It was just like in the movies <br>\r\nIt looked like some writing <br>\r\nJust the way I wrote my poems <br>\r\nIt’s what I imagined <br>\r\nAnd it came true <br>\r\nHer name was unique <br>\r\nAnd so was her love <br>\r\nHer voice had a rare sweetness <br>\r\nHer eyes got the best me <br>\r\nShe looked perfect <br>\r\nIt was love when we talked <br>', '', '2024-07-10 19:48:42', 1, 0),
(6, 'Love', 'uploads/R.jpg', 'You made it look real <br>\r\nYou gave it a meaning <br>\r\nYou smiled <br>\r\nAnd gave it light <br> \r\nYou laughed <br>\r\nAnd gave it life <br>\r\nIt was love <br>\r\nBehind those tiny eyes <br>\r\nStood the angel that murdered me <br> \r\nBehind those glasses <br>\r\nWere the eyes that stole me \r\n', '', '2024-08-19 05:57:56', 0, 0),
(7, 'Devil\'s fault', 'uploads/4.jpg', 'Along he came to take and destroy <br>\r\nHis actions brought me nothing but pain <br>\r\nThey say it’s too much putting the blame on him <br>\r\nBut I say it’s him that keeps bringing this torture <br>\r\nI woke up one day happily married <br>\r\nAlong he came and left me in tears <br>\r\nI was at the peak of my career <br>\r\nHe brought temptation upon temptation <br>\r\nI tried running from him <br>\r\nBut it seems like he was everywhere <br>\r\nHis goal was to eliminate happiness <br>\r\nAnd he never failed in archiving it <br>\r\nBut how can I when he brings anxiety anytime when I’m alone <br>\r\nThey tell me to be patient <br>\r\nBut I guess it never pays anymore so I’m panicking <br>\r\nTold me it was part of God’s plan <br>\r\nBut I thought otherwise <br>\r\nAll my pain and misery <br>\r\nWas the Devil’s fault ', '', '2024-08-19 06:01:18', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `link` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `image`, `link`, `description`, `time_stamp`) VALUES
(3, 'Love', 'uploads/R.jpg', 'C:\\xampp\\htdocs\\brightminds\\Zip folders\\love.zip', 'Dowload love poems', '2024-10-12 18:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `time_stamp`) VALUES
(9, 'Keiko', 'MOtanatswa591@gmail.com', '$2y$10$KZumyOP8eXS4U7j0qNWoRugoXvtXa.p0KniCD.AQ9IoT3sJ1YLA7C', 'admin', '2024-08-19 05:44:00'),
(10, 'ryuko', 'tanaka@gmail.com', '$2y$10$Ru.lXIsvHjB5Ryu5ueye2OnhCOR5NzT8mlvo7/z8AGGjpx2SNelkS', 'user', '2024-10-08 19:07:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poems`
--
ALTER TABLE `poems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `poems`
--
ALTER TABLE `poems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
