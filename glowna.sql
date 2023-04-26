-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2016 at 07:25 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza_szkola`
--

-- --------------------------------------------------------

--
-- Table structure for table `glowna`
--

CREATE TABLE `glowna` (
  `id` int(4) UNSIGNED NOT NULL,
  `Imie` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `Kod_pocztowy` varchar(6) COLLATE utf8_polish_ci DEFAULT NULL,
  `Miejscowosc` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `Ulica` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `Nrdomu` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `Kod_pocztowy2` varchar(6) COLLATE utf8_polish_ci DEFAULT NULL,
  `Miejscowosc2` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `Ulica2` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `Nrdomu2` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `Ocena_Niemiecki` int(1) DEFAULT NULL,
  `Ocena_Angielski` int(1) DEFAULT NULL,
  `Profil` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `glowna`
--

INSERT INTO `glowna` (`id`, `Imie`, `Nazwisko`, `Kod_pocztowy`, `Miejscowosc`, `Ulica`, `Nrdomu`, `Kod_pocztowy2`, `Miejscowosc2`, `Ulica2`, `Nrdomu2`, `Ocena_Niemiecki`, `Ocena_Angielski`, `Profil`) VALUES
(1, 'Asdasd', 'Sadsad', '23-433', 'Dsad', 'Asdasd', '23', '23-433', 'Dsad', 'Asdasd', '23', 4, 0, 'Tech. Informatyk'),
(2, 'Dsgsdf', 'Dgsdf', '34-435', 'Dfsdf', 'Sdfsdf', '34', '34-435', 'Dfsdf', 'Sdfsdf', '34', 6, 0, 'Tech. Informatyk'),
(3, 'Sdahg', 'Hgjkj', '32-456', 'Dsfhdsf', 'Hfgjty', '34', '32-456', 'Dsfhdsf', 'Hfgjty', '34', 2, 0, 'Tech. Informatyk'),
(4, 'Ghgh', 'Fdghj', '67-788', 'Dsdf', 'Fdrt', '56', '67-788', 'Dsdf', 'Fdrt', '56', 5, 0, 'Tech. Informatyk'),
(5, 'Sss', 'Sss', '21-214', 'Sadasd', 'Sadasd', '32', '21-214', 'Sadasd', 'Sadasd', '32', 4, 0, 'Tech. Informatyk'),
(6, 'Sad', 'Asd', '23-434', 'Sadasd', 'Sdsadsd', '23', '23-434', 'Sadasd', 'Sdsadsd', '23', 2, 0, 'Tech. Informatyk'),
(7, 'Sad', 'Sadf', '21-434', 'Sadd', 'Sasd', '23', '21-434', 'Sadd', 'Sasd', '23', 4, 0, 'Tech. Informatyk'),
(8, 'Sad', 'Sss', '23-213', 'Sx', 'Wesd', '23', '23-213', 'Sx', 'Wesd', '23', 3, 0, 'Tech. Informatyk'),
(9, 'Sss', 'Sss', '21-434', 'Sd', 'Sadasd', '23', '21-434', 'Sd', 'Sadasd', '23', 3, 0, 'Tech. Informatyk'),
(10, 'Sdasd', 'Sda', '23-213', 'Sadsad', 'Sdasd', '23', '23-213', 'Sadsad', 'Sdasd', '23', 4, 0, 'Tech. Informatyk'),
(11, 'Sad', 'Sd', '21-345', 'Sad', 'Sdad', '231', '21-345', 'Sad', 'Sdad', '231', 2, 0, 'Tech. Informatyk'),
(12, 'Sad', 'Sd', '21-213', 'Sd', 'Sadasd', '23', '21-213', 'Sd', 'Sadasd', '23', 4, 5, 'Tech. Informatyk'),
(19, 'Uczen', 'Jakis', '43-324', 'Sieradz', 'Ulica', '15', '32-532', 'SDDD', 'DFF', '234', 3, 4, 'Tech. Informatyk'),
(20, 'ss', 'Elo', '43-213', 'sss', 'zxs', '5', '23-435', 'sadasd', 'asdasd', '5', 2, 3, 'Tech. Informatyk'),
(21, 'ssss', 'sadsad', '', '', '', '', '', '', '', '', 0, 0, 'Tech. Informatyk'),
(22, 'Uczen', 'Jakis', '', 'Sieradz', 'Ulica', '15', '', '', '', '', 0, 4, 'Tech. Informatyk'),
(23, 'ss', '', '', '', '', '', '', '', '', '', 0, 0, 'Tech. Informatyk'),
(24, 'ssss', '', '', '', '', '', '', '', '', '', 0, 0, 'Tech. Informatyk'),
(25, 'sasd', '', '', '', '', '', '', '', '', '', 0, 0, 'Tech. Informatyk'),
(26, 'sad', '', '', '', '', '', '', '', '', '', 0, 0, 'Tech. Informatyk'),
(27, 'sa', '', '', '', '', '', '', '', '', '', 0, 0, 'Tech. Informatyk'),
(28, 'd', '', '', '', '', '', '', '', '', '', 0, 0, 'Tech. Informatyk'),
(29, 'sad', '', '', '', '', '', '', '', '', '', 0, 0, 'Tech. Informatyk'),
(30, 'sa', '', '', '', '', '', '', '', '', '', 0, 0, 'Tech. Informatyk'),
(31, 'd', '', '', '', '', '', '', '', '', '', 0, 0, 'Tech. Informatyk'),
(32, 'sad', '', '', '', '', '', '', '', '', '', 0, 0, 'Tech. Informatyk'),
(33, 'sad', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(34, 'sad', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(35, 'sad', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(36, 'sad', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(37, 'sda', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(38, 'sda', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(39, 'dg', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(40, 'g', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(41, 'sd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(42, 'h', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(43, 'gh', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(44, 'dhj', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(45, 'jt', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(46, 'rt', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(47, 'rw', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(48, 'rnfd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(49, 'gth', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(50, 'iy7', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(51, 'yrty', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(52, 'rtugk', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(53, 'r', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(54, 'u', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(55, 'try', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(56, 'rtyrtyrt', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(57, 'yt', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(58, 'wer', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(59, 'weytr', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(60, 'u', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(61, 'tu', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(62, 'y', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(63, 'retry', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(64, 'et', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(65, 'yry', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(66, 'u', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(67, 'ertuyi', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(68, 'gji', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(69, 'vcg', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(70, 'retr', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(71, 'ertuyi', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(72, 'dcgfd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(73, 'sffg', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(74, 'ertuyi', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(75, 'fdgfd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(76, 'rey', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(77, 'ertuyi', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(78, 'y', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(79, 'ertuyi', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Informatyk'),
(80, 'y', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(81, 'ertuyi', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(82, 'e', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(83, 'g', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(84, 'd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(85, 'g', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(86, 'fdgfd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(87, 'hr', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(88, 'ty', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(89, 'try', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(90, 'ur', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(91, 'ewr', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(92, 'rw', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(93, 'yty', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(94, 'r', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(95, 'y', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(96, 'trruyt', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(97, 'ut', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(98, 'yuto', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(99, 'rw', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(100, 'sgfdg', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(101, 'd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(102, 'g', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(103, 'dhj', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(104, 'd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(105, 'fdgfd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(106, 'er6', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(107, 'sad', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(108, 'r', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(109, '3e5t', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(110, 'r', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(111, 'sad', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(112, 'adsad', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(113, 'adsad', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(114, 'sad', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(115, 'fhgr', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(116, 'sad', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(117, 'yt', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(118, 'ewru', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(119, 'hjg', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(120, 'gfredtr', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(121, 'ssad', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(122, 'sa', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(123, 'asd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(124, 'asd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(125, 'asd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(126, 'sd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(127, 'asd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(128, 'asd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(129, 'ssdf', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik'),
(130, 'dasd', '', '', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 'Tech. Elektronik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `glowna`
--
ALTER TABLE `glowna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `glowna`
--
ALTER TABLE `glowna`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
