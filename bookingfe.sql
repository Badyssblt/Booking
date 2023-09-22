-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 22 sep. 2023 à 10:36
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bookingfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `chambre` int NOT NULL,
  `animaux` tinyint(1) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `image` text NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`ID`, `nom`, `description`, `chambre`, `animaux`, `wifi`, `image`, `prix`) VALUES
(1, 'Mirror House North', 'Les Mirror Houses sont une paire de maisons de vacances, situées dans le cadre merveilleux des Dolomites du Tyrol du Sud, au milieu d\'un magnifique paysage de pommiers, juste à l\'extérieur de la ville de Bolzano.\r\nLes maisons Miroir offrent une chance unique de passer de belles vacances entourées d\'une architecture contemporaine de la plus haute qualité et de la plus étonnante beauté de la nature.', 3, 1, 0, 'https://a0.muscache.com/im/pictures/miso/Hosting-4604261/original/6645fb7f-74c0-40cf-a6bc-ee90596a4087.jpeg?im_w=960', 120.99),
(2, 'Cabane perchée - Toulx-Sainte-Croix, France', 'Dites-vous les sons de la nature dans ce logement unique.\r\nEtoile surplombe la prairie et les forêts avec des moutons et des cerfs. Vous ressentez l\'histoire de la région.\r\nEtoile fait partie de la ferme de vacances « A la belle Etoile ». La cabane dispose d\'un lit et sinon vous utiliserez la cuisine extérieure, le bâtiment de douche, la piscine chauffée (12/6).\r\nSur la propriété, vous pouvez faire un feu de camp et dans la région, vous pouvez marcher merveilleusement et profiter de toute la vue. Une fête à faire ici', 1, 1, 0, 'https://a0.muscache.com/im/pictures/miso/Hosting-895664338689478699/original/7b94f6e7-ab00-4698-b0d0-89ce55ef4e6c.jpeg?im_w=960', 80.99);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `name`, `surname`, `email`, `password`) VALUES
(1, 'Blilita', 'Badyss', 'badyss@gmail.com', 'badyss'),
(2, 'test', 'test', 'test@gmail.com', '$2y$10$EicjvzS.0H6.s.Bzo9l8UeiQ2Sf9J0qq5GPZES76U/ZBReBwtKZVy'),
(3, 'test', 'test', 'test@gmail.com', '$2y$10$qW3Ifz9pNzDgNq5.gOsKMuMLhdQajtm5e0BQEQDTbA3b9R85ybVUK'),
(4, 'blt', 'Badyss', 'blt', '$2y$10$AZoV/yX4H7.dDQrB0zmz9.yZdvcAQ/URl739XHbj6jJfK5P1D9blK'),
(5, 'Blilita', 'Badyss', 'blt@gmail.com', '$2y$10$2srhiSuWK0CU8Zz85IJRjOyELV2KJOEqPCYNxeaw7lgCjxR7BkCu6'),
(6, 'Lecoq', 'Armelle', 'armelle@gmail.com', '$2y$10$XNB01lrTIRfpStdU8taDEugP2Yy407O7HL/vCTI9EYKkPlHrawSjC'),
(7, 'blt', 'Badyss', 'blt@gmail.com', '$2y$10$a3Wa9qPb4obUGrRe9iV/EOgTEk2TOsCky7X2Zhwx1K9HoXhGdbr0m'),
(8, 'test', 'test', 'test@gmail.com', '$2y$10$S9IOVgCch2CB2NnZxZZyueR0/1MQlteJRSsdmRu8P1CpD6dq9IDya');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
