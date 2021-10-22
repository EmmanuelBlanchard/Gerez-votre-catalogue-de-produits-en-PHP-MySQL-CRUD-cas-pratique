-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 15 août 2019 à 09:40
-- Version du serveur :  10.3.15-MariaDB
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `catalogue`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `idCours` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `idType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`idCours`, `libelle`, `description`, `image`, `idType`) VALUES
(1, 'Les fondamentaux du Javascript et de Node.JS', 'Réaliser une application web complète avec les technologies HTML, CSS, JAVASCRIPT, Node JS, et une archi. client/serveur', 'JS.png', 1),
(2, '35 Exercices JavaScript', '30exercices JavaScript corrigés en vidéo (20 faciles, 7 moyens, 3 complexes) pour réviser variables, tableaux, objets...', 'JS2.png', 1),
(3, 'Le PHP', '9 heures de pratique de PHP avec PHP Data Objects (PDO), Bootstrap, MySQL, et la Programmation Orientée Objets (POO)', 'PHP.png', 2),
(4, 'La refonte d\'un site web déjà en ligne', 'D\'un site statique à un site dynamique. MVC, HTML/CSS/Bootstrap, PHP, JS/JQuery, MySQL/PDO, sécurité, MCD/MPD (MERISE)..', 'PHP2.png', 2),
(5, '100 requêtes pour maîtriser pour SQL', 'Le cours complet pour apprendre le langage SQL par la pratique au travers de 100 requêtes différentes, sur MySQL', 'SQL.png', 3),
(6, 'Créer des jeux web avec Phaser', 'Créer des jeux javaScript grâce à Phaser (version 3), piloté avec un serveur node.js ou avec Apache', 'JEUX.png', 4),
(7, 'Créer des jeux web en JS Natif', 'Réaliser puissance 4, la bataille navale et une application de labyrinthe en JavaScript, HTML et CSS sans framework (JS)', 'JEUX2.png', 4);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `idType` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`idType`, `libelle`) VALUES
(1, 'JavaScript'),
(2, 'PHP'),
(3, 'SQL'),
(4, 'Jeux web');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`idCours`),
  ADD KEY `FK_TYPE_COURS` (`idType`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`idType`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `idCours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `idType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `FK_TYPE_COURS` FOREIGN KEY (`idType`) REFERENCES `type` (`idType`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
