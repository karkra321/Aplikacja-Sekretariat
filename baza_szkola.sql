-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Lip 2018, 22:49
-- Wersja serwera: 5.6.24
-- Wersja PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `baza_szkola`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `glowna`
--

CREATE TABLE IF NOT EXISTS `glowna` (
  `id` int(4) unsigned NOT NULL,
  `Imie` varchar(30) NOT NULL,
  `Nazwisko` varchar(30) NOT NULL,
  `Kod_pocztowy` varchar(6) DEFAULT NULL,
  `Miejscowosc` varchar(50) DEFAULT NULL,
  `Ulica` varchar(50) DEFAULT NULL,
  `Nrdomu` varchar(50) DEFAULT NULL,
  `Kod_pocztowy2` varchar(6) DEFAULT NULL,
  `Miejscowosc2` varchar(50) DEFAULT NULL,
  `Ulica2` varchar(50) DEFAULT NULL,
  `Nrdomu2` varchar(50) DEFAULT NULL,
  `Ocena_Niemiecki` int(1) DEFAULT NULL,
  `Ocena_Angielski` int(1) DEFAULT NULL,
  `Profil` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indeksy dla zrzutów tabel
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
-- AUTO_INCREMENT dla tabeli `glowna`
--
ALTER TABLE `glowna`
  MODIFY `id` int(4) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
