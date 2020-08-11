-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 11, 2020 at 06:55 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `palmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `authuser`
--

DROP TABLE IF EXISTS `authuser`;
CREATE TABLE IF NOT EXISTS `authuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `authorization` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`),
  UNIQUE KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_command` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_produit` varchar(100) NOT NULL,
  `date` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `service_livraison` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `delai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telephone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nif` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `adresse` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_command` (`id_command`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `id_command`, `id_produit`, `date`, `service_livraison`, `delai`, `email`, `telephone`, `nom`, `prenom`, `nif`, `adresse`) VALUES
(67, '5f296dd900609', '', '', '', '', '', '', '', '', '', ''),
(66, '5f296cf55e4cf', '94ruei3i03', '20 nov 2020', 'Axioma', '8', 'u@jk.com', '43939202', 'Pierre', 'Danny', '489239930293', 'Rue du Port');

-- --------------------------------------------------------

--
-- Table structure for table `identifiant`
--

DROP TABLE IF EXISTS `identifiant`;
CREATE TABLE IF NOT EXISTS `identifiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4056 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `identifiant`
--

INSERT INTO `identifiant` (`id`, `token`) VALUES
(4007, '51'),
(4055, '5f296dd900609'),
(4054, '5f296cf55e4cf'),
(4053, '5f28133d33342'),
(4052, '5f28133bc7bbd'),
(4051, '5f281339dfcc1'),
(4050, '5f281337b71d4'),
(4049, '5f2813360e6dd'),
(4048, '5f281334b9d87'),
(4047, '5f28131edbdaf'),
(4046, '5f281293b9c66'),
(4045, '5f2812234a2ab'),
(4044, '5f2812099ec33');

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bureau` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `statut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` varchar(100) NOT NULL,
  `nom_produit` varchar(100) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` text NOT NULL,
  `categorie` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_vendeur` varchar(100) DEFAULT NULL,
  `note` float NOT NULL,
  `prix` float NOT NULL,
  `table_livraison` text NOT NULL,
  `delai_livraison` varchar(100) NOT NULL,
  `zone_livraison` text NOT NULL,
  `nb_achat` int(11) NOT NULL,
  `nb_vue` int(11) NOT NULL,
  `statut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `id_produit`, `nom_produit`, `description`, `image`, `categorie`, `id_vendeur`, `note`, `prix`, `table_livraison`, `delai_livraison`, `zone_livraison`, `nb_achat`, `nb_vue`, `statut`) VALUES
(1, '848r7eh3883', 'Bodman', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', '', 'Beauty', '47eh8rh4', 4.5, 7384, '[\" Lorem Ipsum\",\" Lorem Ipsum\",\" Lorem Ipsum\"]', '5 jours', '', 34, 12243, 1),
(2, '849fj49j494', 'Victoria\'s Secrets', ' Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', '', 'Beauty', '38rh38hr', 3.8, 3948.9, '[\"machate\",\"lisionne\",\"mikali\"]', '8 jours', '', 342, 14332, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_command` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `montant` varchar(100) NOT NULL,
  `methode` varchar(100) NOT NULL,
  `statut` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_command` (`id_command`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `id_command`, `montant`, `methode`, `statut`) VALUES
(40, '5f296cf55e4cf', '100', 'Moncash', 'valide');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `telephone` (`telephone`),
  UNIQUE KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
