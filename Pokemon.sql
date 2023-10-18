-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : dbBB
-- Généré le : mer. 12 avr. 2023 à 15:48
-- Version du serveur : 8.0.32
-- Version de PHP : 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Pokemon`
--

-- --------------------------------------------------------

--
-- Structure de la table `Combats`
--

CREATE TABLE `Combats` (
  `Id_combat` int NOT NULL,
  `Joueur1` int DEFAULT NULL,
  `Pokemon_J1` int DEFAULT NULL,
  `Score_J1` int DEFAULT NULL,
  `Joueur2` int DEFAULT NULL,
  `Pokemon_J2` int DEFAULT NULL,
  `Score_J2` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Combats`
--

INSERT INTO `Combats` (`Id_combat`, `Joueur1`, `Pokemon_J1`, `Score_J1`, `Joueur2`, `Pokemon_J2`, `Score_J2`) VALUES
(28, 1, 5, 0, 2, 9, 3),
(29, 1, 4, 0, 2, 13, 3),
(33, 2, 6, 0, 11, 8, 3),
(34, 2, 6, 0, 11, 8, 3),
(39, 1, 7, 0, 99, 14, 3),
(40, 1, 8, 3, 99, 3, 0),
(41, 1, 8, 3, 2, 8, 0),
(42, 1, 3, 0, 2, 8, 3),
(43, 1, 4, 3, 11, 10, 0),
(44, 1, 5, 0, 2, 10, 3),
(45, 1, 16, 0, 99, 2, 3),
(46, 1, 8, 0, 99, 14, 3),
(47, 1, 4, 0, 1, 8, 3),
(48, 1, 13, 3, 99, 14, 0),
(49, 1, 8, 0, 99, 14, 3),
(50, 1, 5, 3, 2, 8, 0),
(52, 1, 3, 0, 2, 10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Joueurs`
--

CREATE TABLE `Joueurs` (
  `Id_Joueur` int NOT NULL,
  `Nom` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Pseudo` varchar(200) NOT NULL,
  `Email` varchar(400) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Joueurs`
--

INSERT INTO `Joueurs` (`Id_Joueur`, `Nom`, `Pseudo`, `Email`, `Password`) VALUES
(1, 'Maxime', 'Maskimask', 'ze.max@hotmail.fr', '6469fcfec0449c9a2effd959645cc0302bf77ba5bbd48292e064e08eda83312f'),
(2, 'Sarah', 'Bulle', 'Sarah@outlook.fr', '76048e21d59bfd161f6ed962d0e93e87cce67faf8f40386a7cce281a9aeb48b0'),
(11, 'Pierre', 'Midchasse', 'mid@outlook.fr', 'bedc29f44541ed5bb2bb265a43fa56a53e4d5f9e11c363c5127e573ba655fd1f'),
(99, 'Ordinateur', 'Ordi', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `Pokemons`
--

CREATE TABLE `Pokemons` (
  `Id_pokemon` int NOT NULL,
  `Nom` varchar(200) NOT NULL,
  `PV` int NOT NULL,
  `Pvmax` int NOT NULL,
  `PC` int NOT NULL,
  `Type` varchar(40) NOT NULL,
  `Id_Joueur_Fk` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Pokemons`
--

INSERT INTO `Pokemons` (`Id_pokemon`, `Nom`, `PV`, `Pvmax`, `PC`, `Type`, `Id_Joueur_Fk`) VALUES
(1, 'Salameche', 200, 200, 40, 'FEU', NULL),
(2, 'Feunard', 150, 150, 50, 'FEU', NULL),
(3, 'Magmar', 250, 250, 30, 'FEU', NULL),
(4, 'Poussifeu', 120, 120, 55, 'FEU', NULL),
(5, 'Carapuce', 200, 200, 40, 'EAU', NULL),
(6, 'Tortank', 250, 250, 30, 'EAU', NULL),
(7, 'Magicarpe', 150, 150, 50, 'EAU', NULL),
(8, 'Concombaffe', 120, 120, 55, 'EAU', NULL),
(9, 'Saquedeneu', 200, 200, 40, 'PLANTE', NULL),
(10, 'Gorythmic', 250, 250, 30, 'PLANTE', NULL),
(11, 'Jungko', 150, 150, 50, 'PLANTE', NULL),
(12, 'Tortipouss', 120, 120, 55, 'PLANTE', NULL),
(13, 'Pikachu', 200, 200, 40, 'ELECTRIK', NULL),
(14, 'Elekable', 250, 250, 30, 'ELECTRIK', NULL),
(15, 'Lainergie', 150, 150, 50, 'ELECTRIK', NULL),
(16, 'Dynavolt', 120, 120, 55, 'ELECTRIK', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Combats`
--
ALTER TABLE `Combats`
  ADD PRIMARY KEY (`Id_combat`),
  ADD KEY `Id_joueur` (`Joueur1`),
  ADD KEY `Id_Joueur_Fk` (`Joueur2`,`Joueur1`,`Score_J1`),
  ADD KEY `Id_pokemon_Fk` (`Pokemon_J2`,`Pokemon_J1`),
  ADD KEY `Pokemon_vainqueur` (`Pokemon_J1`),
  ADD KEY `Scores` (`Score_J1`),
  ADD KEY `Id_Joueur_Fk2` (`Score_J2`);

--
-- Index pour la table `Joueurs`
--
ALTER TABLE `Joueurs`
  ADD PRIMARY KEY (`Id_Joueur`);

--
-- Index pour la table `Pokemons`
--
ALTER TABLE `Pokemons`
  ADD PRIMARY KEY (`Id_pokemon`),
  ADD KEY `Id_Joueur_Fk` (`Id_Joueur_Fk`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Combats`
--
ALTER TABLE `Combats`
  MODIFY `Id_combat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `Joueurs`
--
ALTER TABLE `Joueurs`
  MODIFY `Id_Joueur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT pour la table `Pokemons`
--
ALTER TABLE `Pokemons`
  MODIFY `Id_pokemon` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Combats`
--
ALTER TABLE `Combats`
  ADD CONSTRAINT `Combats_ibfk_1` FOREIGN KEY (`Joueur1`) REFERENCES `Joueurs` (`Id_Joueur`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Combats_ibfk_2` FOREIGN KEY (`Joueur2`) REFERENCES `Joueurs` (`Id_Joueur`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Combats_ibfk_3` FOREIGN KEY (`Pokemon_J1`) REFERENCES `Pokemons` (`Id_pokemon`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Combats_ibfk_4` FOREIGN KEY (`Pokemon_J2`) REFERENCES `Pokemons` (`Id_pokemon`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `Pokemons`
--
ALTER TABLE `Pokemons`
  ADD CONSTRAINT `Pokemons_ibfk_1` FOREIGN KEY (`Id_Joueur_Fk`) REFERENCES `Joueurs` (`Id_Joueur`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
