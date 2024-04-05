-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 avr. 2024 à 07:52
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `festival`
--

-- --------------------------------------------------------

--
-- Structure de la table `b5_formules`
--

DROP TABLE IF EXISTS `b5_formules`;
CREATE TABLE IF NOT EXISTS `b5_formules` (
  `id_formules` int NOT NULL AUTO_INCREMENT,
  `typeDePass` varchar(100) NOT NULL,
  `prix` int NOT NULL,
  PRIMARY KEY (`id_formules`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `b5_formules`
--

INSERT INTO `b5_formules` (`id_formules`, `typeDePass`, `prix`) VALUES
(1, 'pass1jour', 40),
(2, 'pass1jourTR', 25),
(3, 'pass2jours', 70),
(4, 'pass2joursTR', 50),
(5, 'pass3jours', 100),
(6, 'pass3joursTR', 65);

-- --------------------------------------------------------

--
-- Structure de la table `b5_nuitées`
--

DROP TABLE IF EXISTS `b5_nuitées`;
CREATE TABLE IF NOT EXISTS `b5_nuitées` (
  `id_nuitee` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prix` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_nuitee`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `b5_nuitées`
--

INSERT INTO `b5_nuitées` (`id_nuitee`, `nom`, `prix`) VALUES
(1, 'tente1nuit', '5'),
(2, 'tente2nuits', '10'),
(3, 'tente3nuits', '12'),
(4, 'camion1nuit', '5'),
(5, 'camion2nuits', '10'),
(6, 'camion3nuits', '12');

-- --------------------------------------------------------

--
-- Structure de la table `b5_relation_reservation_formules`
--

DROP TABLE IF EXISTS `b5_relation_reservation_formules`;
CREATE TABLE IF NOT EXISTS `b5_relation_reservation_formules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_formules` int NOT NULL,
  `id_reservation` int NOT NULL,
  `jour` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_formules` (`id_formules`),
  KEY `id_reservation` (`id_reservation`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `b5_relation_reservation_formules`
--

INSERT INTO `b5_relation_reservation_formules` (`id`, `id_formules`, `id_reservation`, `jour`) VALUES
(1, 1, 1, '2024-05-30');

-- --------------------------------------------------------

--
-- Structure de la table `b5_relation_reservation_nuitees`
--

DROP TABLE IF EXISTS `b5_relation_reservation_nuitees`;
CREATE TABLE IF NOT EXISTS `b5_relation_reservation_nuitees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_nuitee` int NOT NULL,
  `id_reservation` int NOT NULL,
  `jour` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_nuitee` (`id_nuitee`),
  KEY `id_reservation` (`id_reservation`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `b5_relation_reservation_nuitees`
--

INSERT INTO `b5_relation_reservation_nuitees` (`id`, `id_nuitee`, `id_reservation`, `jour`) VALUES
(1, 1, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `b5_reservations`
--

DROP TABLE IF EXISTS `b5_reservations`;
CREATE TABLE IF NOT EXISTS `b5_reservations` (
  `id_reservation` int NOT NULL AUTO_INCREMENT,
  `quantite` int NOT NULL,
  `luge` int DEFAULT NULL,
  `casque` int DEFAULT NULL,
  `id_utilisateurs` int NOT NULL,
  `prix` int DEFAULT NULL,
  PRIMARY KEY (`id_reservation`),
  KEY `id_utilisateurs` (`id_utilisateurs`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `b5_reservations`
--

INSERT INTO `b5_reservations` (`id_reservation`, `quantite`, `luge`, `casque`, `id_utilisateurs`, `prix`) VALUES
(1, 2, 1, 1, 1, 50),
(2, 1, 1, 1, 9, 52),
(3, 1, 1, 1, 10, 52),
(4, 1, 1, 1, 11, 52),
(5, 1, 1, 1, 12, 52),
(6, 1, 1, 1, 13, 52),
(7, 1, 1, 1, 14, 52),
(8, 1, 1, 1, 15, 52),
(9, 1, 1, 1, 16, 52),
(10, 1, 1, 1, 17, 52),
(11, 1, 1, 1, 18, 52),
(12, 1, 1, 1, 19, 67);

-- --------------------------------------------------------

--
-- Structure de la table `b5_utilisateurs`
--

DROP TABLE IF EXISTS `b5_utilisateurs`;
CREATE TABLE IF NOT EXISTS `b5_utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` int NOT NULL,
  `RGPD` date DEFAULT NULL,
  `adresse_postale` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `telephone` (`telephone`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `b5_utilisateurs`
--

INSERT INTO `b5_utilisateurs` (`id`, `prenom`, `nom`, `email`, `telephone`, `RGPD`, `adresse_postale`, `role`, `mot_de_passe`) VALUES
(1, 'olivier', 'Mai', 'ol.maig@gml.com', 671749612, '2024-03-28', '45 r de fontenay', 'user', NULL),
(2, 'aaa', 'aaa', 'aaa@aaa.Fr', 671749613, '2024-04-04', 'aaa', 'user', '$2y$10$9PwDBADJisE61ZPn8egUauAmNwS5bK3gU3bzo5M6JVgFLJJvbOjf6'),
(3, 'aaa', 'aaa', 'aaa@aba.Fr', 671749610, '2024-04-04', 'aaa', 'user', '$2y$10$RjVnM9OWTZVykVx32qU4j.WQEa.p8kNxhab/wOgswLXD9VFgW0YVa'),
(4, 'aaa', 'lastOliv', 'aaa@aca.Fr', 671749611, '2024-04-04', 'aaa', 'user', '$2y$10$MrZX/S.BRsSUyIwD8Qct4.i6xcwe4qap73tKyAir/hQr3Y.xnxNDC'),
(5, 'aaa', 'lastOliv', 'aaa@ada.Fr', 671749615, '2024-04-04', 'aaa', 'user', '$2y$10$DoXk8YhkXPtSrQThgjYqw.QsP2LxxPGbcJ1Y0L98Nr2w7ednmXuiy'),
(6, 'aaa', 'lastOliv', 'aaa@afa.Fr', 671749616, '2024-04-04', 'aaa', 'user', '$2y$10$ZaFNG5iQ5OX40/MpijjpgOUlYnqFLOrRsnBolJ/IrrNky.xV7U0ba'),
(7, 'mmm', 'olivier', 'ol.mm@gmm.f', 675742312, '2024-04-04', 'hihihi', 'user', '$2y$10$yKUXPQ0y62b/1rHMOTFmtOswX6VQegKPokpz56DV0A4H9r9WXWQty'),
(8, 'mmm', 'olivier', 'ol.mm@gmm.e', 675742313, '2024-04-04', 'hihihi', 'user', '$2y$10$h6ViMsthNTiT.lt0qC7bseMGshxbcH9YcBGkysfafgpP3j3trvHMS'),
(9, 'mmm', 'olivier', 'ol.mm@gmm.a', 786868686, '2024-04-04', 'hihihi', 'user', '$2y$10$iHJxGmpTggcNRr.IT.Bw7OPiZ5mTk7PtwxhX.zI74jPS5BJvkXSs6'),
(10, 'mmm', 'olivier', 'ol.mm@gmm.c', 786868689, '2024-04-04', 'hihihi', 'user', '$2y$10$W1jBYxT9bVBQemtPfVrayu4ihGnSJoVI8qD0OHDcyW.6BJkFPAyGq'),
(11, 'mmm', 'olivier', 'ol.mm@gmm.d', 786868690, '2024-04-04', 'hihihi', 'user', '$2y$10$Bapjv9K0MzRdnyG0SGi1feEc/8Xnjk2Y/ro4kmM6PuCmPvLlmms5O'),
(12, 'mmm', 'olivier', 'ol.mm@gm.gg', 786868694, '2024-04-04', 'hihihi', 'user', '$2y$10$CqKf104DpwoGII7HZC1SJesvn.Ck19wrEPQMZvEKc8nlr.0.czZOK'),
(13, 'mai', 'olivier', 'ol.mm@gg.ff', 671749624, '2024-04-04', '45 r de r', 'user', '$2y$10$dDK5uwQiQSbTE7ev9uP1cO5TovcR7hok9Qh3ACxlVzOt1BgR8O7rO'),
(14, 'mai', 'olivier', 'ol.mm@gg.zz', 671749623, '2024-04-04', '45 r de r', 'user', '$2y$10$L2jUzJ6MVFGiVfGaI4LGe.hjIt2X/s3U8Hhn.En.iht7IjBh2a66a'),
(15, 'aaa', 'aaa', 'aaa@aaa.de', 675757575, '2024-04-04', 'rrr', 'user', '$2y$10$engpCQBNTpsyWoGv7gPOlOHgy4gx6WhFsjChmnN8lOq1xvtiV5jTK'),
(16, 'eee', 'olivi', 'ol.ff@ff.ee', 606060606, '2024-04-04', 'rr', 'user', '$2y$10$IUEOGWwJkQ/HWzjiobeCGe9njr.y8ltSdeu3VlKefzgVbJ8j/0GAK'),
(17, 'eee', 'olivi', 'ol.ff@ff.er', 606060604, '2024-04-04', 'rr', 'user', '$2y$10$jfU.f/aaNS6A4C3yi8cL6.yK2UIGH15pInzFAwbTcjT8d1fkHXDq6'),
(18, 'Olivier', 'Maignan', 'ol.ff@fafa.fafa', 606060687, '2024-04-04', 'rr', 'user', '$2y$10$7OGSD/VVf2DHZpnn1nzOq..uQiMIAAlKJOtV3SVWKMejqouwVW/5y'),
(19, 'herivola', 'herivola', 'herivola@gal.fr', 606063423, '2024-04-05', '45 r de R', 'user', '$2y$10$Nmlyik6G5HLyqtxwW4kFUe0BZi1BDcY0cFBxjewwJ4kR5Iw13oRE.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
