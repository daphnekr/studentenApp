-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 28 jun 2020 om 11:30
-- Serverversie: 8.0.18
-- PHP-versie: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentenapp`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klassen`
--

CREATE TABLE `klassen` (
  `id` int(11) NOT NULL,
  `groepnaam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slb'er_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klassen`
--

INSERT INTO `klassen` (`id`, `groepnaam`, `slb'er_id`) VALUES
(8, 'LPIAO19A1', 2),
(9, 'LPIAO19A2', 1),
(10, 'LPIAO19A3', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leraar`
--

CREATE TABLE `leraar` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `leraar`
--

INSERT INTO `leraar` (`id`, `voornaam`, `achternaam`) VALUES
(1, 'Arnold', 'de Jong'),
(2, 'Jan-Willem', 'Huisman'),
(3, 'Stefano', 'Verhoeven');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lessen`
--

CREATE TABLE `lessen` (
  `id` int(11) NOT NULL,
  `les` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tijd_id` int(11) NOT NULL,
  `tijdsduur` int(11) NOT NULL,
  `leraar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `lessen`
--

INSERT INTO `lessen` (`id`, `les`, `tijd_id`, `tijdsduur`, `leraar_id`) VALUES
(1, 'Nederlands', 8, 60, 3),
(2, 'Engels', 2, 0, 1),
(3, 'Rekenen', 4, 0, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `planning`
--

CREATE TABLE `planning` (
  `id` int(11) NOT NULL,
  `klas_id` int(11) NOT NULL,
  `les_id` int(11) NOT NULL,
  `datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `planning`
--

INSERT INTO `planning` (`id`, `klas_id`, `les_id`, `datum`) VALUES
(39, 10, 3, '2020-06-07'),
(40, 9, 1, '2020-06-07'),
(41, 8, 2, '2020-06-07');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `studenten`
--

CREATE TABLE `studenten` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `e-mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `klas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `studenten`
--

INSERT INTO `studenten` (`id`, `voornaam`, `achternaam`, `e-mail`, `klas_id`) VALUES
(22, 'Mahad', 'Aden', '', 9),
(23, 'Yordi', 'van Berkum', '', 9),
(24, 'Kevin', 'Chen', '', 9),
(25, 'Marvin', 'Klinge', '', 9),
(26, 'Enrico', 'Koetsier', '', 9),
(27, 'Tido', 'Koldenhof', '', 9),
(28, 'Jeremy', 'Korteland', '', 9),
(29, 'Oğuz Han', 'Korucu', '', 9),
(30, 'Daphne', 'Kramer', 'xdaphnekramer@live.nl', 9),
(31, 'Yilmaz', 'Kuru', '', 9),
(32, 'Chylvano', 'Landburg', '', 9),
(33, 'Timo', 'Lemmen', '', 9),
(34, 'Storm', 'Lindsen', '', 9),
(35, 'Rick', 'Lugtigheid', '', 9),
(36, 'Eddy', 'Markhorst', '', 9),
(37, 'Daan', 'Masson', '', 9),
(38, 'Giovanni', 'Mierop', '', 9),
(39, 'Sam', 'Moekardanoe', '', 9),
(40, 'Jaden', 'Muller', '', 9),
(41, 'Ange', 'Mutesi', '', 9),
(42, 'Jason', 'Ronoastro', '', 9),
(43, 'Koen', 'van Wensen', '', 9),
(44, 'Dimitri', 'Aistov', '', 8),
(45, 'Kimberly', 'van Berkum', '', 8),
(46, 'Rowin', 'Bodegom', '', 8),
(47, 'Sander', 'Boom', '', 8),
(48, 'Robin', 'Broekhof', '', 8),
(49, 'Diony', 'Busker', '', 8),
(50, 'Merijn', 'Dreef', '', 8),
(51, 'Omid', 'Fayzi', '', 8),
(52, 'Jorijn', 'van der Graaf', '', 8),
(53, 'Marlo', 'van Gulik', '', 8),
(54, 'Thijmen', 'Hagendoorn', '', 8),
(55, 'Winston', 'Hartman', '', 8),
(56, 'Gijs', 'Hatamleh', '', 8),
(57, 'Anthony', 'Inocêncio Ramos', '', 8),
(58, 'Berkan', 'Kaya', '', 8),
(59, 'Mitchell', 'Kneefel', '', 8),
(60, 'Jayco', 'de Ligt', '', 8),
(61, 'Swen', 'Sperling', '', 8),
(62, 'Sam', 'Al-Meshhedi', '', 10),
(63, 'Bram', 'van Ballegooijen', '', 10),
(64, 'Razvan', 'Bogaciu', '', 10),
(65, 'Kenny', 'Nathalia', '', 10),
(66, 'Remy', 'Nijsten', '', 10),
(67, 'Ahmet', 'Özer', '', 10),
(68, 'Daan', 'van der Plas', '', 10),
(69, 'Killian', 'Pol', '', 10),
(70, 'Gerben', 'Reppel', '', 10),
(71, 'Jeffry', 'Simiyon', '', 10),
(72, 'Valentijn', 'Slijper', '', 10),
(73, 'Rick', 'Snijders', '', 10),
(74, 'Stian', 'Speelman', '', 10),
(75, 'John', 'Spruijt', '', 10),
(76, 'Bartek', 'Stawiarski', '', 10),
(77, 'Thijmen', 'Stegenga', '', 10),
(78, 'Nick', 'Verwoerd', '', 10),
(79, 'Stijn', 'de Vries', '', 10),
(80, 'Job', 'Walst', '', 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tijden`
--

CREATE TABLE `tijden` (
  `id` int(11) NOT NULL,
  `tijd` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tijden`
--

INSERT INTO `tijden` (`id`, `tijd`) VALUES
(1, '13:00:00'),
(2, '14:00:00'),
(3, '11:00:00'),
(4, '09:00:00'),
(5, '08:00:00'),
(6, '19:00:00'),
(7, '16:00:00'),
(8, '15:00:00'),
(9, '18:00:00');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `klassen`
--
ALTER TABLE `klassen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentenapp_ibfk_7` (`slb'er_id`);

--
-- Indexen voor tabel `leraar`
--
ALTER TABLE `leraar`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `lessen`
--
ALTER TABLE `lessen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentenapp_ibfk_1` (`tijd_id`),
  ADD KEY `studentenapp_ibfk_6` (`leraar_id`);

--
-- Indexen voor tabel `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentenapp_ibfk_2` (`les_id`),
  ADD KEY `studentenapp_ibfk_3` (`klas_id`) USING BTREE;

--
-- Indexen voor tabel `studenten`
--
ALTER TABLE `studenten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentenapp_ibfk_5` (`klas_id`);

--
-- Indexen voor tabel `tijden`
--
ALTER TABLE `tijden`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `klassen`
--
ALTER TABLE `klassen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `leraar`
--
ALTER TABLE `leraar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT voor een tabel `lessen`
--
ALTER TABLE `lessen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `planning`
--
ALTER TABLE `planning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT voor een tabel `studenten`
--
ALTER TABLE `studenten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT voor een tabel `tijden`
--
ALTER TABLE `tijden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `klassen`
--
ALTER TABLE `klassen`
  ADD CONSTRAINT `studentenapp_ibfk_7` FOREIGN KEY (`slb'er_id`) REFERENCES `leraar` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Beperkingen voor tabel `lessen`
--
ALTER TABLE `lessen`
  ADD CONSTRAINT `studentenapp_ibfk_1` FOREIGN KEY (`tijd_id`) REFERENCES `tijden` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `studentenapp_ibfk_6` FOREIGN KEY (`leraar_id`) REFERENCES `leraar` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Beperkingen voor tabel `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `studentenapp_ibfk_2` FOREIGN KEY (`les_id`) REFERENCES `lessen` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `studentenapp_ibfk_3` FOREIGN KEY (`klas_id`) REFERENCES `klassen` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Beperkingen voor tabel `studenten`
--
ALTER TABLE `studenten`
  ADD CONSTRAINT `studentenapp_ibfk_5` FOREIGN KEY (`klas_id`) REFERENCES `klassen` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
