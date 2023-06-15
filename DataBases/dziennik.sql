-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Cze 2023, 14:25
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `history`
--

CREATE TABLE `history` (
  `Grade_id` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `OldGrade` int(11) NOT NULL,
  `NewGrade` int(11) NOT NULL
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
(3, 'uczeń', 'Szymon', 'Kowalski', 'Szymon456@wp.pl', '$argon2i$v=19$m=65536,t=4,p=1$RC9zRXl2SEtkNlVpTE9PRw$sFLPBWak+WuX+SjA6e/IHMyrkxZFbtG+nEHPh2YcZp4', 666777111, '2023-06-24'),
(4, 'admin', 'admin', 'admin', 'admin@wp.pl', '$argon2i$v=19$m=65536,t=4,p=1$Y3ZIczlHNy5Pa3NUOXI4Zw$TaIZPGfZMKzAAKrEIAx1ywpd4lbFAKIGJrQh5dFuPNY', 666555222, '2023-06-17'),
(5, 'nauczyciel', 'Basia', 'Kowalska', 'Basia@wp.pl', '$argon2i$v=19$m=65536,t=4,p=1$SXlDU0RtNldhaWZLWFdvUA$wIKO0kxDqa+bK3ZvQ7Gax28kuvGqVwLkqZFXYjv92DA', 666444222, '2023-07-01');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
