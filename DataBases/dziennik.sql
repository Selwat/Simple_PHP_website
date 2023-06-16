-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Cze 2023, 15:53
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
(14, 20, 2, 'Matematyka', 'Kartkówka'),
(15, 30, 6, 'Informatyka', 'Egzamin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `history`
--

CREATE TABLE `history` (
  `Grade_id` int(11) NOT NULL,
  `Student_Name` varchar(60) NOT NULL,
  `Student_LastName` varchar(60) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `OldGrade` int(11) NOT NULL,
  `NewGrade` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `opis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Zrzut danych tabeli `history`
--

INSERT INTO `history` (`Grade_id`, `Student_Name`, `Student_LastName`, `Date`, `OldGrade`, `NewGrade`, `subject`, `opis`) VALUES
(3, 'Basia', 'Stefaniak', '2023-06-16', 5, 1, 'Matematyka', 'Kartkówka'),
(4, 'Basia', 'Stefaniak', '2023-06-16', 1, 6, 'Matematyka', 'Kartkówka'),
(5, 'Basia', 'Stefaniak', '2023-06-16', 6, 6, 'Matematyka', 'Kartkówka'),
(6, 'Basia', 'Stefaniak', '2023-06-16', 6, 2, 'Matematyka', 'Kartkówka'),
(7, 'Basia', 'Kaftan', '2023-06-16', 2, 2, 'Matematyka', 'Kartkówka'),
(8, 'Katarzyna', 'Główczyńska', '2023-06-16', 6, 6, 'Informatyka', 'Egzamin');

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
(20, 'uczeń', 'Basia', 'Kaftan', 'Basia@wp.pl', '$argon2i$v=19$m=65536,t=4,p=1$WGVCQzV4Mm1NSHBNaUtzNQ$yCPmYF4u5mySGj74P78UAgkIndVoClohxkrkdogf8h4', 444000922, '2023-05-18'),
(27, 'nauczyciel', 'Basia', 'Podlasiak', 'Andrzejewska@wp.pl', '$argon2i$v=19$m=65536,t=4,p=1$eEMvSzkuajdnT3dlWTdyYw$p56KaumaEqL795WssjSUZKh5phYtXgft7804RBGbxWQ', 444222111, '2023-06-21'),
(30, 'uczeń', 'Katarzyna', 'Główczyńska', 'Hamiga@wp.pl', '$argon2i$v=19$m=65536,t=4,p=1$TXZEZDUwWGJEM1A5OGJJUA$qdW37wa6MVzkywxYU0WyCmFDb9vDlIeRGHKCYFV4u9Y', 777222111, '2023-07-05');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `history`
--
ALTER TABLE `history`
  MODIFY `Grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
