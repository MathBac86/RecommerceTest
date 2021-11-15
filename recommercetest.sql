-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 15 nov. 2021 à 16:54
-- Version du serveur : 8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `recommercetest`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produits_id` int NOT NULL,
  `num_commande` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_commande` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `mail_commande` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6EEAA67DCD11A2CF` (`produits_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `produits_id`, `num_commande`, `date_commande`, `mail_commande`) VALUES
(1, 3, 'CD0001', '2021-11-15 14:14:50', 'test@test.fr'),
(2, 3, 'CD0002', '2021-11-15 14:15:30', 'ano@anno.fr'),
(3, 9, 'CD0002', '2021-11-15 14:15:30', 'ano@anno.fr');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20211115140017', '2021-11-15 14:13:59', 264);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque_produit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_produit` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom_produit`, `marque_produit`, `prix_produit`) VALUES
(1, 'Iphone 6', 'Apple', 250),
(2, 'PinePhone', 'Pine', 180),
(3, 'FairPhone 3', 'FairPhone', 380),
(4, 'FairPhone 4', 'FairPhone', 550),
(5, 'Volla Phone', 'Volla', 250),
(6, 'Iphone 20', 'Apple', 5250),
(7, 'Galaxy Fold 3', 'Samsung', 2250),
(8, 'Pro 1', 'F(x)tec', 550),
(9, 'Iphone 7', 'Apple', 350),
(10, 'Pro 5', 'Meizu', 150);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67DCD11A2CF` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
