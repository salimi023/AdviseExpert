-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Ápr 21. 14:43
-- Kiszolgáló verziója: 10.1.32-MariaDB
-- PHP verzió: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `adviseexpert`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `category`
--

CREATE TABLE `category` (
  `catId` int(1) NOT NULL,
  `catTitle` varchar(256) NOT NULL,
  `catDesc` text,
  `catStat` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `category`
--

INSERT INTO `category` (`catId`, `catTitle`, `catDesc`, `catStat`) VALUES
(9, 'Kiskereskedés', 'Közvetlenül a vásárlókkal kapcsolatban álló vállalkozás.', 1),
(10, 'Nagykereskedés', 'A kiskereskedésekkel közvetlen kapcsolatban álló vállalkozás.', 1),
(11, 'Vásárló', 'Szolgáltatást vagy terméket beszerző természetes, illetve  jogi személy.', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `company`
--

CREATE TABLE `company` (
  `compId` int(3) NOT NULL,
  `compName` varchar(256) NOT NULL,
  `compEmail` varchar(256) NOT NULL,
  `compAddress` varchar(256) NOT NULL,
  `compCat` varchar(256) NOT NULL,
  `compStat` int(1) NOT NULL,
  `compDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `company`
--

INSERT INTO `company` (`compId`, `compName`, `compEmail`, `compAddress`, `compCat`, `compStat`, `compDate`) VALUES
(15, 'WinterFell Bt.', 'winterfell@winterfell.com', '25. Castle Black str, Winterfell 2525 ', '9', 0, '2019-04-19'),
(16, 'Lannister Zrt.', 'lannister@kingslanding.com', '20. Red Keep str.  Kings\' Landing 2020', '10', 1, '2019-04-20'),
(17, 'FaceLess Men Kft.', 'faceless@faceless.com', '10. Temple sqr. Bravos 666', '11', 2, '2019-04-21');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `contact`
--

CREATE TABLE `contact` (
  `contId` int(3) NOT NULL,
  `compId` int(3) NOT NULL,
  `contName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `contact`
--

INSERT INTO `contact` (`contId`, `compId`, `contName`) VALUES
(17, 15, 'Rob Stark'),
(18, 15, 'John Snow'),
(19, 15, 'Arya Stark'),
(21, 17, 'Jaqen H\'ghar'),
(22, 17, 'Ms. Waif'),
(23, 16, 'Cersei Lannister');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `userId` int(2) NOT NULL,
  `userName` varchar(256) NOT NULL,
  `userEmail` varchar(256) NOT NULL,
  `userPass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(9, 'Hodor', 'hold@thedoor.com', '$2y$10$2vQZG5Wzqi4PtnR8FI09VOsTUyZSl1DqJg2fA89I4TA9yNat5HtLy'),
(10, 'Tyrion Lannister', 'dwarf@lion.com', '$2y$10$IiDePQR8fXccSGYSPREyDueNhVPfdkLybGJItrjDDB1wpxOZ/bUBK');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- A tábla indexei `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`compId`);

--
-- A tábla indexei `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contId`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `company`
--
ALTER TABLE `company`
  MODIFY `compId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT a táblához `contact`
--
ALTER TABLE `contact`
  MODIFY `contId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
