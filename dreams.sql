-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Feb 07, 2023 at 10:38 AM
-- Server version: 10.10.2-MariaDB-1:10.10.2+maria~ubu2204
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreams`
--

-- --------------------------------------------------------

--
-- Table structure for table `dreams`
--

CREATE TABLE `dreams` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `dream_title` varchar(255) DEFAULT NULL,
  `dream_or_nightmare` enum('Dream','Nightmare','Dream/Nightmare') DEFAULT 'Dream',
  `dream_description` varchar(1000) DEFAULT 'NULL',
  `dream_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `dreams`
--

INSERT INTO `dreams` (`id`, `created_at`, `dream_title`, `dream_or_nightmare`, `dream_description`, `dream_date`) VALUES
(1, '2023-02-06 14:24:08', 'Walls in house made of sponge cake!', 'Dream', 'I had a dream where I saw cracks appearing in the walls of my house, that started to grow and grow. As they grew, they started to look like sponge cake, and fell away to reveal huge holes in the wall. How odd!', '2023-02-01'),
(2, '2023-02-06 14:25:58', 'Lost bike at a music festival', 'Dream', 'I had a very strange dream last night where I lost my bike at a music festival! It was on the downs, and I was there in my campervan, but when I drove away I realised my bike had been left! When I woke up I wasn\'t sure I would find it in my bike shed...', '2023-02-01'),
(3, '2023-02-07 09:37:07', 'No clothes on at a wedding', 'Dream/Nightmare', 'I am at a wedding, and about to give a speech, when I realise I am naked! It is quite stressful for a moment, but ultimately becomes really really funny. So strange how things can start as a nightmare, and end in a dream.', '2022-12-04'),
(4, '2023-02-07 09:37:07', 'Teaching and having a high pitched voice', 'Nightmare', 'This is a classic dream that I have often around the start of term. I am in a lesson, and trying to get control of a rowdy class. They are ignoring me, so a raise my voice, but when I speak, it is at a high pitched whisper. I lose my temper, and the class laughs at me. Funnily enough, I never lose my temper in real life at all! But I guess this is my fear that one day I might lose control of the room....', '2022-09-01'),
(5, '2023-02-07 09:37:07', 'Using a toilet in B&Q ', 'Dream', 'So odd...in this dream I am reading a paper in an outhouse style toilet  that is in the middle of B&Q. My friends and family are outside and looking for me, but I stay quiet in here and just read the paper!', '2019-10-11'),
(6, '2023-02-07 09:37:07', 'Hooded figure in a corridor', 'Nightmare', 'I am walking down a narrow, gothic corridor, with lanterns and low red light. It is narrow, and with no doors. In front of me is a hooded figure that  know, if it sees me, will hurt me. I am creeping behind them, trying to stay quiet. They stopm and slowly turn around, and just as they face me I wake up, terrified!', '2018-08-08'),
(7, '2023-02-07 09:37:07', 'Head being crushed in a field', 'Nightmare', 'This is a recurring nightmare, and one that happens when I am ill. I am in a beautiful field, with cows, but a machine with a big clamp grabs my head, and crushes it into a thin pancake! ', '1995-12-12'),
(8, '2023-02-07 09:37:07', 'Falling through the sky', 'Nightmare', 'I  just remember falling towards the ground, and it rushing towards men really fast! The feeling of seeing the ground rush towards me is so scary, and the nightmare woke me up!', '2020-10-02'),
(9, '2023-02-07 09:37:07', 'Little kittens biting my finger', 'Dream', 'I was in my sisters childhood bedroom, and a few tiny little kittens were there playing with each other. I went to stroke one, and it bit my finger and clamped down hard! I shook my hand to get it off, and it flew out of the window. Although it isn\'t funny, I laughed my head off!', '2021-06-12'),
(10, '2023-02-07 09:37:07', 'Teeth falling out', 'Dream/Nightmare', 'I had a dream about all of my teeth falling out. How odd! I was talking with a friend, and suddenly felt with my tongue that my teeth were all cracked an several of them had already fallen out. As usual, I looked in the mirror and saw them looking odd. But I wasn\'t scared!', '2023-01-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dreams`
--
ALTER TABLE `dreams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dreams`
--
ALTER TABLE `dreams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
