-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 16 mai 2025 à 18:59
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
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `modele` varchar(255) DEFAULT NULL,
  `immatriculation` varchar(100) NOT NULL,
  `annee` varchar(10) DEFAULT NULL,
  `couleur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`client_id`, `marque`, `modele`, `immatriculation`, `annee`, `couleur`) VALUES
(5, 'Renault', 'Duster', '8547 WWT', '2023', 'Gris'),
(1, 'BMW', 'X5', '5642 TBN', '2023', 'Rouge'),
(4, 'Peugeot', 'Landtrack', 'BX-047-KH', '2024', 'Gris'),
(6, 'Toyota', 'Land cruiser HZJ76L', '207 CD 204', '2012', 'Blanche'),
(7, 'Peugeot', '3008', 'YJ-792-VL', '2018', 'Noir'),
(4, 'Mercedes', 'GL 500', '4578TCA', '2023', 'Blanc'),
(2, 'Mercedes', 'Sprinter 316 CDI', '1452 TAN', '2010', 'Vert'),
(5, 'Mercedes', 'ML 320', '5621 TAP', '2005', 'Bleu'),
(4, 'Volkswagen', 'Tiguan', '6358 TBP', '2022', 'Blanc'),
(0, 'Peugeot', '308', '3545 TBA', '2015', 'Blanc'),
(3, 'Mercedes', 'C220', '6363 TBG', '2020', 'Jaune'),
(2, 'Ford', 'Ranger', '8945 TBB', '2017', 'Vert'),
(5, 'Mercedes', 'Sprinter', '4512 TAP', '2021', 'Noir'),
(3, 'Renault', 'MEGANE', 'ER-819-OG', '2020', 'Blanc'),
(9, 'Renault', 'Laguna2', '6541 TCA', '2021', 'Bleu'),
(5, 'Renault', 'Logan', '9595 TBP', '2011', 'Gris'),
(6, 'Toyota', 'Land cruiser Prado', '0785 TAS', '2014', 'Blanche'),
(8, 'Renault', 'Master', 'XN-847-GL', '2024', 'Rouge'),
(7, 'BMW', 'X3', '5241 TBE', '2022', 'Jaune'),
(4, 'Mercedes', 'Sprinter 312', '9856 TBB', '2013', 'Jaune'),
(1, 'Volkswagen', 'Crafter', 'ZU-621-MV', '2000', 'Rouge'),
(3, 'MAZDA', 'BT 50', '2578 WWT', '2006', 'Rouge'),
(8, 'Citroën', 'Jumper', 'OZ-566-ZK', '2017', 'Bleu'),
(2, 'Volkswagen', 'Passat', 'ZR-499-VY', '2005', 'Blanc'),
(6, 'Toyota', 'Fortuner', '7474 WWT', '2023', 'Blanc'),
(6, 'Citroën', 'C5', '5894 TBB', '2018', 'Bleu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_292FFF1D19EB6921` (`client_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `FK_292FFF1D19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
