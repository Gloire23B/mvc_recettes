-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 15 juin 2024 à 09:46
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `recettes`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Entrée'),
(2, 'Plat principal'),
(3, 'Dessert');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int DEFAULT NULL,
  `id_recette` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_recette` (`id_recette`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `text`, `date`, `id_user`, `id_recette`) VALUES
(1, 'Délicieux !', '2024-06-15 09:38:16', 1, 1),
(2, 'Recette facile à suivre.', '2024-06-15 09:38:16', 2, 2),
(3, 'Mon dessert préféré.', '2024-06-15 09:38:16', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
CREATE TABLE IF NOT EXISTS `recettes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `origine` varchar(150) DEFAULT NULL,
  `description` text,
  `id_categorie` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `nom`, `photo`, `origine`, `description`, `id_categorie`) VALUES
(1, 'Salade César', 'salade_cesar.jpg', 'Italie', 'Une délicieuse salade avec du poulet, des croûtons et du parmesan.', 1),
(2, 'Spaghetti Carbonara', 'spaghetti_carbonara.jpg', 'Italie', 'Un plat classique de pâtes italiennes avec des œufs, du fromage et du bacon.', 2),
(3, 'Tiramisu', 'tiramisu.jpg', 'Italie', 'Un dessert italien populaire avec du café, du mascarpone et des biscuits.', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `login`, `password`) VALUES
(1, 'Dupont', 'Jean', 'dupont', 'password123'),
(2, 'Martin', 'Marie', 'mmartin', 'password456');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `recettes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `recettes_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
