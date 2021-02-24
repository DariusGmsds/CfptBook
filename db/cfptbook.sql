-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 24 fév. 2021 à 15:56
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cfptbook`
--

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `idMedia` int(11) NOT NULL,
  `typeMedia` text NOT NULL,
  `nomMedia` text NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modificationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idPost` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`idMedia`, `typeMedia`, `nomMedia`, `creationDate`, `modificationDate`, `idPost`) VALUES
(54, 'image/jpeg', 'bf6789bba78f31c9874fb3989e8eb3bc.jpg', '2021-02-23 23:00:00', '0000-00-00 00:00:00', 50),
(55, 'image/jpeg', '6ae553cdfb87564a9dd5964816927e71.jpg', '2021-02-23 23:00:00', '0000-00-00 00:00:00', 50),
(52, 'image/jpeg', '6d622d41931576b074c70004167fed54.jpg', '2021-02-23 23:00:00', '0000-00-00 00:00:00', 50),
(53, 'image/jpeg', 'f9cceb74eed8ec93d67c3ce4cfbd2b22.jpg', '2021-02-23 23:00:00', '0000-00-00 00:00:00', 50),
(51, 'image/png', 'e47e831f18031fe401f7183fd3ae1c74.png', '2021-02-23 23:00:00', '0000-00-00 00:00:00', 49),
(48, 'image/png', 'afaebcad8018643a9da68c2caed99300.png', '2021-02-23 23:00:00', '0000-00-00 00:00:00', 46),
(49, 'image/png', 'a97ce3da4c6f759902e2c6ef05926051.png', '2021-02-23 23:00:00', '0000-00-00 00:00:00', 47),
(50, 'image/png', '7067b6dd526df42e8ad424cf4cd8e15d.png', '2021-02-23 23:00:00', '0000-00-00 00:00:00', 48);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modificationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`idPost`, `commentaire`, `creationDate`, `modificationDate`) VALUES
(46, 'oui', '2021-02-23 23:00:00', '2021-02-23 23:00:00'),
(47, 'oui', '2021-02-23 23:00:00', '2021-02-23 23:00:00'),
(48, 'dw', '2021-02-23 23:00:00', '2021-02-23 23:00:00'),
(49, 'dw', '2021-02-23 23:00:00', '2021-02-23 23:00:00'),
(50, 'dwafwf', '2021-02-23 23:00:00', '2021-02-23 23:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`idMedia`),
  ADD KEY `idPost` (`idPost`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `idMedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
