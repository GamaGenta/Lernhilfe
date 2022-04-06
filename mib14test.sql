-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Apr 2022 um 17:38
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mib14test`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `todoeintrag`
--

CREATE TABLE `todoeintrag` (
  `idToDo` int(11) NOT NULL,
  `Titel` varchar(50) NOT NULL,
  `Inhalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `todoeintrag`
--

INSERT INTO `todoeintrag` (`idToDo`, `Titel`, `Inhalt`) VALUES
(1, 'ToDo Eintrag 1', 'Der Inhalt des ersten ToDo Eintrags !'),
(2, 'ToDo Eintrag 2', 'Der Inhalt des zweiten ToDo Eintrags !!'),
(3, 'ToDo Eintrag 3', 'Der Inhalt des dritten ToDo Eintrags !!!'),
(4, 'ToDo Eintrag 4', 'Der Inhalt des vierten ToDo Eintrags !!!!'),
(5, 'ToDo Eintrag 5', 'Der Inhalt des fünften ToDo Eintrags !!!!!'),
(6, 'ToDo Eintrag 6', 'Der Inhalt des sechsten ToDo Eintrags !!!!!!');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `todoeintrag`
--
ALTER TABLE `todoeintrag`
  ADD PRIMARY KEY (`idToDo`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `todoeintrag`
--
ALTER TABLE `todoeintrag`
  MODIFY `idToDo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
