-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 28 mars 2024 à 15:19
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `b5_relation_reservation_nuitees`
--

DROP TABLE IF EXISTS `b5_relation_reservation_nuitees`;
CREATE TABLE IF NOT EXISTS `b5_relation_reservation_nuitees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_nuitee` int NOT NULL,
  `id_reservation` int NOT NULL,
  `jour` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_nuitee` (`id_nuitee`),
  KEY `id_reservation` (`id_reservation`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`id_reservation`),
  KEY `id_utilisateurs` (`id_utilisateurs`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `b5_reservations`
--

INSERT INTO `b5_reservations` (`id_reservation`, `quantite`, `luge`, `casque`, `id_utilisateurs`) VALUES
(1, 2, 1, 1, 1);

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `telephone` (`telephone`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `b5_utilisateurs`
--

INSERT INTO `b5_utilisateurs` (`id`, `prenom`, `nom`, `email`, `telephone`, `RGPD`, `adresse_postale`, `role`) VALUES
(1, 'olivier', 'Mai', 'ol.maig@gml.com', 671749612, '2024-03-28', '45 r de fontenay', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;