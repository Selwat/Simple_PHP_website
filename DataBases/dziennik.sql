-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Cze 2023, 14:24
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `dziennik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `opis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Zrzut danych tabeli `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `grade`, `subject`, `opis`) VALUES
(8, 19, 2, 'Informatyka', 'Sprawdzian'),
(12, 19, 5, 'Matematyka', 'Kartkówka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `history`
--

CREATE TABLE `history` (
  `Grade_id` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `OldGrade` int(11) NOT NULL,
  `NewGrade` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `opis` varchar(200) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `LastName` varchar(60) NOT NULL,
  `role` enum('admin','uczeń','nauczyciel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('admin','uczeń','nauczyciel') NOT NULL,
  `Name` varchar(60) NOT NULL,
  `LastName` varchar(60) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `PhoneNumber` int(9) NOT NULL,
  `Birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `role`, `Name`, `LastName`, `Email`, `Password`, `PhoneNumber`, `Birthday`) VALUES
(4, 'admin', 'admin', 'admin', 'admin@wp.pl', '$argon2i$v=19$m=65536,t=4,p=1$Y3ZIczlHNy5Pa3NUOXI4Zw$TaIZPGfZMKzAAKrEIAx1ywpd4lbFAKIGJrQh5dFuPNY', 666555222, '2023-06-17'),
(19, 'uczeń', 'Katarzyna', 'Kowalska', 'Kowalska@wp.pl', '$argon2i$v=19$m=65536,t=4,p=1$VUFLYmpJU29jT2xvR2MwSA$HJpGk++68WpJUG1kvxdVH7fE9qX1PIidWyXsGnBbJmw', 444000999, '2023-07-05'),
(20, 'uczeń', 'Basia', 'Kowalska', 'Basia@wp.pl', '$argon2i$v=19$m=65536,t=4,p=1$WGVCQzV4Mm1NSHBNaUtzNQ$yCPmYF4u5mySGj74P78UAgkIndVoClohxkrkdogf8h4', 444000922, '2023-05-18'),
(27, 'nauczyciel', 'Basia', 'Gajda', 'Andrzejewska@wp.pl', '$argon2i$v=19$m=65536,t=4,p=1$eEMvSzkuajdnT3dlWTdyYw$p56KaumaEqL795WssjSUZKh5phYtXgft7804RBGbxWQ', 444222111, '2023-06-21');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indeksy dla tabeli `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`Grade_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `history`
--
ALTER TABLE `history`
  MODIFY `Grade_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
