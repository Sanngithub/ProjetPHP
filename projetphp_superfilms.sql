-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 28 avr. 2022 à 18:02
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetphp_superfilms`
--

-- --------------------------------------------------------

--
-- Structure de la table `animes`
--

CREATE TABLE `animes` (
  `id_anime` int(11) NOT NULL,
  `titre_native` varchar(50) CHARACTER SET utf8 NOT NULL,
  `titre_romaji` varchar(50) NOT NULL,
  `titre_fr` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `studio` varchar(50) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `synopsis` varchar(1000) NOT NULL,
  `nb_episodes` int(11) NOT NULL,
  `note` float NOT NULL,
  `jaquette` blob DEFAULT NULL,
  `dateCreation` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `animes`
--

INSERT INTO `animes` (`id_anime`, `titre_native`, `titre_romaji`, `titre_fr`, `status`, `studio`, `genre`, `synopsis`, `nb_episodes`, `note`, `jaquette`, `dateCreation`) VALUES
(1, '進撃の巨人', 'Shingeki no Kyojin', 'L\'Attaque des Titans', 1, 'Wit Studio', 'Action, Drama, Fantasy, Mystery', 'Dans un monde ravagé par des titans mangeurs d’homme depuis plus d’un siècle, les rares survivants de l’Humanité n’ont d’autre choix pour survivre que de se barricader dans une cité-forteresse. Le jeune Eren, témoin de la mort de sa mère dévorée par un titan, n’a qu’un rêve : entrer dans le corps d’élite chargé de découvrir l’origine des titans, et les annihiler jusqu’au dernier…', 25, 0, NULL, '2022-04-19'),
(2, '進撃の巨人 2', 'Shingeki no Kyojin 2', 'L\'Attaque des Titans S2', 1, 'Wit Studio', 'Action, Drama, Fantasy, Mystery', 'Saison 2 de Shingeki no Kyojin<br>Suite aux événements impliquant Annie et Eren, tous les membres de leur promotion sont suspectés de pouvoir se transformer en Titan et sont isolés. Mais, pendant l’enquête, une nouvelle terrifiante parvient à la capitale : le mur de Rose serait fracturé.', 12, 0, NULL, '2022-04-19'),
(3, '進撃の巨人 3', 'Shingeki no Kyojin 3', 'L\'Attaque des Titans S3', 1, 'Wit Studio', 'Action, Drama, Fantasy, Mystery', 'Saison 3 de Shingeki no Kyojin<br>Le bataillon a réussi à récupérer Eren, mais le titan colossal et le titan cuirassé sont parvenus à leur échapper. De plus, les pertes sont colossales et Erwin doit faire face à de nouvelles accusations.', 22, 0, NULL, '2022-04-19'),
(4, '進撃の巨人 The Final Season', 'Shingeki no Kyojin The Final Season', 'L\'Attaque des Titans S4', 1, 'Wit Studio', 'Action, Drama, Fantasy, Mystery', 'Saison 4 de Shingeki no Kyojin', 28, 0, NULL, '2022-04-19');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `pseudo`, `password`, `nom`, `prenom`, `email`) VALUES
(37, 'userHashedPassword', '$2y$10$Nltp1JtT4OnoXUZEXCo5Reg2VranrYrRNpWrGLyUUGBf4ye1JD1DC', '123456', NULL, 'test@hashed.password'),
(38, 'anotherHashed', '$2y$10$1FuYizHDq6Rr/20YrajhLeW2oIAjIp3gtt1uAASNIvxf.YhyOubn6', 'azerty', NULL, '123@hash.ed'),
(39, 'jon', '$2y$10$.LM5UrJrICwkxPxa5eXv5ecqpWLoO7j1.rMzeBhFOY1K5sAmXOC/y', '456789', NULL, 'jon@init.users'),
(40, 'sann', '$2y$10$hvIO2DC9Y5SMKtcDCYfkH.ar5XqowI4U8MtmAYoAxCkNBzCFOVak2', '1234', NULL, 'sann@init.users');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animes`
--
ALTER TABLE `animes`
  ADD PRIMARY KEY (`id_anime`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animes`
--
ALTER TABLE `animes`
  MODIFY `id_anime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
