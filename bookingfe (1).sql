-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 13 oct. 2023 à 15:28
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
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `reservationID` int NOT NULL,
  `date_debut` text NOT NULL,
  `date_fin` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`ID`, `userID`, `reservationID`, `date_debut`, `date_fin`, `status`) VALUES
(16, 2, 2, '05-10-2023', '10-10-2023', 0),
(15, 2, 3, '06-10-2023', '11-10-2023', 0),
(14, 2, 3, '06-10-2023', '11-10-2023', 0),
(13, 2, 3, '06-10-2023', '11-10-2023', 0),
(12, 2, 3, '06-10-2023', '11-10-2023', 0),
(11, 2, 3, '06-10-2023', '07-10-2023', 0),
(10, 2, 1, '05-10-2023', '14-10-2023', 0),
(17, 8, 2, '04-10-2023', '11-10-2023', 0),
(18, 8, 1, '11-10-2023', '17-10-2023', 0);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `reservationID` int NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'none',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`ID`, `reservationID`, `name`) VALUES
(1, 1, 'Maison'),
(2, 2, 'logement insolite'),
(3, 3, 'logement insolite'),
(4, 4, 'Chalet'),
(5, 5, 'Maison'),
(6, 6, 'Chalet'),
(7, 7, 'Maison');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `author` int NOT NULL,
  `message` text NOT NULL,
  `recipient` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`ID`, `author`, `message`, `recipient`, `date`) VALUES
(63, 2, 'test', 1, '2023-10-12 10:04:40'),
(64, 2, 'test', 1, '2023-10-12 10:04:40'),
(62, 2, 'test', 1, '2023-10-12 10:04:40'),
(61, 2, 'test', 1, '2023-10-12 10:04:39'),
(60, 2, 'test', 1, '2023-10-12 10:04:36'),
(59, 2, 'test', 1, '2023-10-12 10:04:36'),
(58, 2, 'test', 1, '2023-10-12 10:04:34'),
(57, 2, 'Test', 2, '2023-10-12 10:00:36'),
(56, 2, 'Bonjour', 1, '2023-10-11 20:40:19'),
(65, 1, 'bonjour déjà', 2, '2023-10-12 10:08:24'),
(66, 2, 'test', 1, '2023-10-12 10:10:07'),
(67, 2, 'test', 1, '2023-10-12 10:10:08'),
(68, 2, 'test', 1, '2023-10-12 10:10:09'),
(69, 2, 'test', 1, '2023-10-12 10:10:09'),
(70, 2, 'qsd', 2, '2023-10-12 10:30:46'),
(71, 2, 'test', 1, '2023-10-12 10:31:22'),
(72, 2, '', 2, '2023-10-12 10:34:48'),
(73, 2, '', 2, '2023-10-12 10:35:30'),
(74, 2, 'test', 2, '2023-10-12 10:35:52'),
(75, 2, 'test', 2, '2023-10-12 10:53:02'),
(76, 2, 'mathias', 2, '2023-10-12 10:54:15');

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
  `coordonne` text NOT NULL,
  `userID` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`ID`, `nom`, `description`, `chambre`, `animaux`, `wifi`, `image`, `prix`, `coordonne`, `userID`) VALUES
(1, 'Mirror House North', 'Les Mirror Houses sont une paire de maisons de vacances, situées dans le cadre merveilleux des Dolomites du Tyrol du Sud, au milieu d\'un magnifique paysage de pommiers, juste à l\'extérieur de la ville de Bolzano.\r\nLes maisons Miroir offrent une chance unique de passer de belles vacances entourées d\'une architecture contemporaine de la plus haute qualité et de la plus étonnante beauté de la nature.', 3, 1, 0, 'https://a0.muscache.com/im/pictures/miso/Hosting-4604261/original/6645fb7f-74c0-40cf-a6bc-ee90596a4087.jpeg?im_w=960', 120.99, '46.46, 11.31', 1),
(2, 'Cabane perchée - Toulx-Sainte-Croix, France', 'Dites-vous les sons de la nature dans ce logement unique.\r\nEtoile surplombe la prairie et les forêts avec des moutons et des cerfs. Vous ressentez l\'histoire de la région.\r\nEtoile fait partie de la ferme de vacances « A la belle Etoile ». La cabane dispose d\'un lit et sinon vous utiliserez la cuisine extérieure, le bâtiment de douche, la piscine chauffée (12/6).\r\nSur la propriété, vous pouvez faire un feu de camp et dans la région, vous pouvez marcher merveilleusement et profiter de toute la vue. Une fête à faire ici', 1, 1, 0, 'https://a0.muscache.com/im/pictures/miso/Hosting-895664338689478699/original/7b94f6e7-ab00-4698-b0d0-89ce55ef4e6c.jpeg?im_w=960', 80.99, '46.29, 2.21', 2),
(3, 'Hébergement (OVNI)', 'Le OVNI, unique en son genre, peut accueillir jusqu\' à quatre personnes. Il est situé au cœur du Pembrokeshire méridional. Pratique pour les stations balnéaires populaires de Tenby et Saundersfoot avec leurs plages de sable blanc et leurs ports pittoresques.', 2, 0, 1, 'https://a0.muscache.com/im/pictures/9da940a2-82d0-4efc-808e-381292ac5321.jpg?im_w=1200', 207, '51.71, -4.73', 3),
(4, 'Le chalet du lac d\'étival\r\n\r\n', 'Chalet neuf situé dans le parc régional du haut jura, entre lacs et montagnes, offrant une belle vue sur la nature environnante. Au calme sur un terrain privatif de 1004m2 non clos. Calme et repos assurés dans un véritable écrin de verdure à 800 m du lac d\'étival ( baignade, ballade et pêche). Vous pourrez profiter en hiver des joies du ski de fond, des raquettes et des chiens de traineaux à Prénovel ( 8 km ) , du ski de descente à Morbier (25 ', 2, 1, 0, 'https://a0.muscache.com/im/pictures/0c7c9dbd-9ad2-4a02-94d0-bd728211f66f.jpg?im_w=1200', 78, '46.51, 5.80', 4),
(5, 'Logement entier : villa - Aude, France\r\n', 'Nous avons tous besoin de quelque chose à attendre avec impatience et avec plus de 300 jours d\'ensoleillement, de châteaux, de grottes préhistoriques, d\'une campagne magnifique, de magnifiques plages méditerranéennes, des Pyrénées majestueuses, de la nourriture et du vin fabuleux, vous pourrez garantir d\'excellentes vacances pour toute la famille au Domaine de Nougayrol. Une superbe villa située dans un vignoble de 36h avec piscine privée, vous pourrez découvrir la beauté de ce quartier', 3, 1, 0, 'https://a0.muscache.com/im/pictures/a52bb51a-0f7c-4ed9-968d-cb5cb223478e.jpg?im_w=1200', 176, '43.10, 2.10', 5),
(6, 'Joli studio avec pk à Vall d\'Incles Grandvalira\r\n\r\n', 'Studio récemment rénové en 2021, tout neuf, idéal pour les amoureux de la nature et des montagnes. Il est situé dans la Vall d\'Incles, l\'une des plus belles vallées d\'Andorre.\r\nIl dispose d\'un grand balcon à côté de la rivière avec des vues incroyables, canapé-lit confortable, lit simple, cuisine complète avec grille-pain, cafetière et salon avec télévision à écran plat et wifi.', 2, 0, 1, 'https://a0.muscache.com/im/pictures/35573e41-3590-45dc-a90b-b01c86fd42ac.jpg?im_w=1200', 90, '42.58, 1.66', 6),
(7, 'Gite de Fonclaire\r\n\r\n', 'Fonclaire est un chalet spacieux totalement équipé, orienté Sud face à la Montagne Noire à 600 m d\'altitude. Idéal pour des vacances dépaysantes entre amis ou en famille pour un weekend ou une semaine. Sa capacité d’accueil de maximum 21 personnes, son vaste terrain, et sa localisation vous permettront de déconnecter pleinement tout en restant proche des commodités.', 16, 1, 1, 'https://a0.muscache.com/im/pictures/cc56e747-12f1-4d5d-81c1-61a52330486c.jpg?im_w=1200', 590, '46.05, 2.05', 4);

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `name`, `surname`, `email`, `password`) VALUES
(1, 'Lecoq', 'Armelle', 'armelle@gmail.com', '$2y$10$K07Y2MuaRynd04sZOL6FWer0HvR72wngLxws7m0BF2PYy.9MEPVjC'),
(2, 'Doe', 'John', 'johndoe@gmail.com', '$2y$10$Mjx9a7irj3CMyuAEyBNlcun2NTI5UDd3AP6lMRQFsPGCgI9qkfoYu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
