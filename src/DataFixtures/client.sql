-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 16 mai 2025 à 19:15
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
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `type`) VALUES
(201, 'Girard', 'François', 'girard.francois@example.org', '+261 39 210 92', 'Lot III Ter 67 Ha', 'Particulier'),
(202, 'Hardy', 'Isabelle', 'isabelle79@example.com', '+261 34 123 45', 'Lot IV 7 Isotry', 'Particulier'),
(203, 'Delmas', 'Benoît', 'delmas@gmail.com', '+261 22 546 63', 'boulevard André Ratsimilao', 'Particulier'),
(204, 'USAID', 'PSI Madagascar', 'psi@psi-usaid.org', '+261 22 584 56', 'Immeuble Fiaro Ampefiloha', 'Projet'),
(205, 'Fond d\'intervention pour le dévéloppeeny', 'FID', 'emmanuel_rakoto@gmail.com', '+261 32 547 89', 'Ankadifotsy Antananarivo', 'Association'),
(227, 'UN', 'Unicef', 'contact@unicef.com', '+261 22 352 36', 'Maison commune des nations unis Galaxy Andraharo', 'Organisme'),
(228, 'UN', 'Pnud', 'contact@pnud-un.org', '+261 22 352 36', 'Maison Commune des Nations Unies Zone Galaxy, Rue...Andraharo Antananarivo', 'Organisme'),
(248, 'OTIV', 'Otiv Tana', 'contact@otiv-tana.org', '+261 34 48 498 92', '99, Ratsimilao Antananarivo', 'Société'),
(249, 'Mallet', 'Zacharie', 'lorraine53@example.com', '0465782418', '2, rue de Pichon\n35819 Chauvindan', 'Particulier'),
(250, 'Masson', 'Alain', 'moreau.alain@gmail.com', '+261 33 12 391 06', '658, avenue de Weber56891 Analakely', 'Particulier');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
