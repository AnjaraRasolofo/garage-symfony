-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 16 mai 2025 à 19:35
-- Version du serveur : 10.11.11-MariaDB-0+deb12u1
-- Version de PHP : 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garage_manager`
--

-- --------------------------------------------------------

--
-- Structure de la table `employe_specialite`
--

CREATE TABLE `employe_specialite` (
  `employe_id` int(11) NOT NULL,
  `specialite_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employe_specialite`
--

INSERT INTO `employe_specialite` (`employe_id`, `specialite_id`) VALUES
(101, 65),
(101, 68),
(101, 69),
(101, 73),
(102, 65),
(102, 68),
(102, 69),
(102, 73),
(102, 78),
(103, 66),
(103, 67),
(103, 77),
(104, 74),
(104, 75),
(105, 81),
(105, 82),
(106, 74),
(106, 75),
(107, 66),
(107, 67),
(107, 81),
(107, 82),
(107, 83),
(108, 82),
(108, 83);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employe_specialite`
--
ALTER TABLE `employe_specialite`
  ADD PRIMARY KEY (`employe_id`,`specialite_id`),
  ADD KEY `IDX_651F26061B65292` (`employe_id`),
  ADD KEY `IDX_651F26062195E0F0` (`specialite_id`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employe_specialite`
--
ALTER TABLE `employe_specialite`
  ADD CONSTRAINT `FK_651F26061B65292` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_651F26062195E0F0` FOREIGN KEY (`specialite_id`) REFERENCES `specialite` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
