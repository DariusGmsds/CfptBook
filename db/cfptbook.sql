-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 23 fév. 2021 à 21:06
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
(1, 'PNG', '74040518999c41ce5a92007e361d508e.png', '2021-02-22 23:00:00', '0000-00-00 00:00:00', 1),
(2, 'png', 'cfd582af46d8fbb1bf2167710472393c.png', '2021-02-22 23:00:00', '0000-00-00 00:00:00', 1),
(3, 'Array', '6c6ed523fa62e90bd5a904c998d505c9', '2021-02-22 23:00:00', '0000-00-00 00:00:00', 2),
(4, 'Array', 'c8577c09b52c445cc257c66212ac10ec', '2021-02-22 23:00:00', '0000-00-00 00:00:00', 2),
(5, 'Array', 'c463ddd906871cc7312275b3dc91a84b', '2021-02-22 23:00:00', '0000-00-00 00:00:00', 3),
(6, 'Array', 'dcbef0ab256a76d41e29fbf4fb220930', '2021-02-22 23:00:00', '0000-00-00 00:00:00', 3);

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
(1, 'dwa', '2021-02-22 23:00:00', '2021-02-22 23:00:00'),
(2, 'dwa', '2021-02-22 23:00:00', '2021-02-22 23:00:00'),
(3, 'oui\r\n', '2021-02-22 23:00:00', '2021-02-22 23:00:00');

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
  MODIFY `idMedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
