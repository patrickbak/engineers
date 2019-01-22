-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Lut 2018, 15:07
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `car_conf`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cookies`
--

CREATE TABLE `cookies` (
  `ID` int(11) NOT NULL,
  `Wybrane_czesci` text COLLATE utf8_polish_ci NOT NULL,
  `Obrazek` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `karoserie`
--

CREATE TABLE `karoserie` (
  `ID` int(11) NOT NULL,
  `Nazwa_karoserii` text COLLATE utf8_polish_ci NOT NULL,
  `Obrazek` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `karoserie`
--

INSERT INTO `karoserie` (`ID`, `Nazwa_karoserii`, `Obrazek`) VALUES
(1, 'Coupe1', 'coupe.jpg'),
(2, 'Sedan1', 'sedan.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kola`
--

CREATE TABLE `kola` (
  `ID` int(11) NOT NULL,
  `Nazwa_kol` text COLLATE utf8_polish_ci NOT NULL,
  `Obrazek` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kola`
--

INSERT INTO `kola` (`ID`, `Nazwa_kol`, `Obrazek`) VALUES
(1, 'Koła1', 'kola1.jpg'),
(2, 'Koła2', 'kola2.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `podwozia`
--

CREATE TABLE `podwozia` (
  `ID` int(11) NOT NULL,
  `Nazwa_podwozia` text COLLATE utf8_polish_ci NOT NULL,
  `Obrazek` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `podwozia`
--

INSERT INTO `podwozia` (`ID`, `Nazwa_podwozia`, `Obrazek`) VALUES
(1, 'BMW series 3', 'bmw_series_3.jpg'),
(2, 'Audi S4', 'audi_s4.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzaje_nadwozia`
--

CREATE TABLE `rodzaje_nadwozia` (
  `ID` int(11) NOT NULL,
  `Nazwa_nadwozia` text COLLATE utf8_polish_ci NOT NULL,
  `Obrazek` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `rodzaje_nadwozia`
--

INSERT INTO `rodzaje_nadwozia` (`ID`, `Nazwa_nadwozia`, `Obrazek`) VALUES
(1, 'Coupe', 'coupe.jpg'),
(2, 'Sedan', 'sedan.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `silniki`
--

CREATE TABLE `silniki` (
  `ID` int(11) NOT NULL,
  `Nazwa_silnika` text COLLATE utf8_polish_ci NOT NULL,
  `Obrazek` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `silniki`
--

INSERT INTO `silniki` (`ID`, `Nazwa_silnika`, `Obrazek`) VALUES
(1, 'BMWS60', 'bmws60.jpg'),
(2, 'Audi V8', 'audi_v8.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `skrzynie_biegow`
--

CREATE TABLE `skrzynie_biegow` (
  `ID` int(11) NOT NULL,
  `Nazwa_skrzyni` text COLLATE utf8_polish_ci NOT NULL,
  `Obrazek` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `skrzynie_biegow`
--

INSERT INTO `skrzynie_biegow` (`ID`, `Nazwa_skrzyni`, `Obrazek`) VALUES
(1, 'Tiptronic C60', 'tiptronic_c60.jpg'),
(2, '6-biegowa ręczna', '6_biegowa_reczna.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wnetrza`
--

CREATE TABLE `wnetrza` (
  `ID` int(11) NOT NULL,
  `Rodzaje_wnetrz` text COLLATE utf8_polish_ci NOT NULL,
  `Obrazek` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wnetrza`
--

INSERT INTO `wnetrza` (`ID`, `Rodzaje_wnetrz`, `Obrazek`) VALUES
(1, 'Alcantara brązowa', 'wnetrze1.jpg'),
(2, 'Alcantara biała', 'wnetrze2.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `cookies`
--
ALTER TABLE `cookies`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `karoserie`
--
ALTER TABLE `karoserie`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kola`
--
ALTER TABLE `kola`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `podwozia`
--
ALTER TABLE `podwozia`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rodzaje_nadwozia`
--
ALTER TABLE `rodzaje_nadwozia`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `silniki`
--
ALTER TABLE `silniki`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `skrzynie_biegow`
--
ALTER TABLE `skrzynie_biegow`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wnetrza`
--
ALTER TABLE `wnetrza`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
