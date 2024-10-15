-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Okt 15. 13:06
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `gde`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `prefix` varchar(30) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `company` varchar(500) NOT NULL,
  `org_unit` varchar(200) NOT NULL,
  `post` varchar(200) NOT NULL,
  `country` varchar(300) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `street_and_num` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `lunch` varchar(10) DEFAULT NULL,
  `authors` varchar(1000) DEFAULT NULL,
  `conf_title` varchar(200) DEFAULT NULL,
  `conf_lang` varchar(100) DEFAULT NULL,
  `conf_theme` varchar(200) DEFAULT NULL,
  `attachment` varchar(500) DEFAULT NULL,
  `comment` varchar(2000) DEFAULT NULL,
  `is_instructor` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `prefix`, `first_name`, `last_name`, `company`, `org_unit`, `post`, `country`, `post_code`, `city`, `street_and_num`, `email`, `lunch`, `authors`, `conf_title`, `conf_lang`, `conf_theme`, `attachment`, `comment`, `is_instructor`, `created_at`) VALUES
(55, NULL, 'Szaniszló', 'Árpád', 'Max &amp; Future Kft.', 'Max &#38; Future Kft.', 'Position', 'Magyarország', '1117', 'Budapest', 'Hauszmann Alajos u. 3b', 'dddevelopedbybarley@gmail.com', NULL, 'Authors1 ,Authors2', 'PRes title', 'Pres lang', 'Adatbiztonság és információbiztonság', '1604114192670e3e5da4b851.14223302.PDF', 'Comment 1', 1, '2024-10-15'),
(56, NULL, 'Szaniszló', 'Árpád', 'Max &amp; Future Kft.', 'Max &#38; Future Kft.', 'Beosztás', 'Magyarország', '1117', 'Budapest', 'Hauszmann Alajos u. 3b', 'developedbybarley@gmail.com', NULL, 'dsadsadasd', 'dsadsadsad', 'dsadsadsad', 'Egyéb', '1393115105670e3e80a82a73.47692224.PDF', 'dsadsadsad', 1, '2024-10-15');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
