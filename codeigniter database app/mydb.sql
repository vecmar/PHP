-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Ne 09.Jún 2019, 18:02
-- Verzia serveru: 10.1.39-MariaDB
-- Verzia PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `mydb`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `prenajom`
--

CREATE TABLE `prenajom` (
  `idpren` int(11) NOT NULL,
  `sportoviska_idsport` int(11) NOT NULL,
  `zakaznici_idzak` int(11) NOT NULL,
  `termin` datetime NOT NULL,
  `trvanie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `prenajom`
--

INSERT INTO `prenajom` (`idpren`, `sportoviska_idsport`, `zakaznici_idzak`, `termin`, `trvanie`) VALUES
(1, 1, 1, '2019-05-08 07:00:00', 60),
(2, 4, 4, '2019-05-09 15:30:00', 30),
(3, 3, 2, '2019-05-09 15:30:00', 60),
(4, 5, 3, '2019-05-08 16:30:00', 45),
(5, 2, 1, '2019-05-04 12:00:00', 60);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `sportoviska`
--

CREATE TABLE `sportoviska` (
  `idsport` int(11) NOT NULL,
  `nazov` varchar(30) DEFAULT NULL,
  `oznacenie` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `sportoviska`
--

INSERT INTO `sportoviska` (`idsport`, `nazov`, `oznacenie`) VALUES
(1, 'Tenisovy kurt 1 ', 'TK1'),
(2, 'Tenisovy kurt 2', 'TK2'),
(3, 'Squash kurt 2', 'SQ2'),
(4, 'Posilovna', 'GYM'),
(5, 'Lezecka stena', 'LS'),
(11, 'Bazen 1', 'B1'),
(13, 'strelnica', 'GUN');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `zakaznici`
--

CREATE TABLE `zakaznici` (
  `idzak` int(11) NOT NULL,
  `meno` varchar(30) NOT NULL,
  `adresa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `zakaznici`
--

INSERT INTO `zakaznici` (`idzak`, `meno`, `adresa`) VALUES
(1, 'Fero Mikus', 'Samorin'),
(2, 'Lukas Raab', 'Bratislava 4 '),
(3, 'Peto Magat', 'Stupava'),
(4, 'Marek Pottmann', 'Lozorno'),
(5, 'Rudo Beresik', 'Bratislava 1');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `prenajom`
--
ALTER TABLE `prenajom`
  ADD PRIMARY KEY (`idpren`),
  ADD KEY `fk_prenajom_sportoviska_idx` (`sportoviska_idsport`),
  ADD KEY `fk_prenajom_zakaznici1_idx` (`zakaznici_idzak`);

--
-- Indexy pre tabuľku `sportoviska`
--
ALTER TABLE `sportoviska`
  ADD PRIMARY KEY (`idsport`);

--
-- Indexy pre tabuľku `zakaznici`
--
ALTER TABLE `zakaznici`
  ADD PRIMARY KEY (`idzak`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `prenajom`
--
ALTER TABLE `prenajom`
  MODIFY `idpren` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pre tabuľku `sportoviska`
--
ALTER TABLE `sportoviska`
  MODIFY `idsport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pre tabuľku `zakaznici`
--
ALTER TABLE `zakaznici`
  MODIFY `idzak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `prenajom`
--
ALTER TABLE `prenajom`
  ADD CONSTRAINT `fk_prenajom_sportoviska` FOREIGN KEY (`sportoviska_idsport`) REFERENCES `sportoviska` (`idsport`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prenajom_zakaznici1` FOREIGN KEY (`zakaznici_idzak`) REFERENCES `zakaznici` (`idzak`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
