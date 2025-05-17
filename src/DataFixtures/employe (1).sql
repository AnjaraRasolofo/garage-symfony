-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 16 mai 2025 à 19:34
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
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `poste` varchar(50) NOT NULL,
  `date_embauche` datetime DEFAULT NULL,
  `salaire` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `poste`, `date_embauche`, `salaire`) VALUES
(1, 'Rambolamanana', 'Tahiry', 'tahiry087@gmail.com', '+261 34 55 159 82', 'Andraisoro Antananarivo', 'Mécanicien', '2008-12-04 13:36:00', 435000),
(2, 'Rakotonirina', 'Lova', 'lova_rakoto@gmail.com', '+261 34 23 569 58', 'Ambohimangakely Antananarivo', 'Mécanicien', '2010-04-21 05:27:00', 420000),
(3, 'Ravalison', 'Junot', 'junot045@gmail.com', '+261 32 412 56', 'Ivanja Ambohintsoa', 'Electricien', '2016-10-12 18:48:00', 292000),
(4, 'Rakotoson', 'Andrinirina', 'andry_peintre@gmail.com', '+261 34 521 78', 'Ankadibahoaka Antananarivo', 'Peintre', '2012-09-19 06:17:00', 345000),
(5, 'Randrianarison', 'Fetraniaina', 'fetra29@gmail.com', '+261 34 09 879 99', 'Ankaraobato Antananarivo', 'Secretaire', '2012-02-14 08:10:00', 400000),
(6, 'Rakotoarimanana', 'Celestin', 'celess545@gmail.com', '+261 52 645 25', 'Ankadibahoaka Antananarivo', 'Aide peintre', '2011-08-03 09:03:00', 290000),
(7, 'Solofondraibe', 'Anjarasoa', 'anjara@programmer.net', '+261 34 60 513 46', '67 Ha Antananarivo', 'Informaticien', '2012-09-11 16:38:00', 650000),
(8, 'Ramanitra', 'Danny', 'danny.ramanitra@gmail.com', '+261 34 07 600 00', 'Andohanimandroseza Antananarivo', 'Gérant', '2000-02-18 09:12:00', 1500000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
