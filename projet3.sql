-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 07 jan. 2019 à 22:13
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet3`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE IF NOT EXISTS `billets` (
  `billet_id` int(11) NOT NULL AUTO_INCREMENT,
  `billet_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `billet_title` varchar(255) NOT NULL,
  `billet_content` text NOT NULL,
  PRIMARY KEY (`billet_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`billet_id`, `billet_date`, `billet_title`, `billet_content`) VALUES
(1, '2018-11-27 23:00:00', 'Titre du billet 1', 'ceci est le premier billet du blog !'),
(2, '2018-12-02 23:00:00', 'Chapitre 2', 'Ceci est le contenu du 2ème chapitre de \"Billet simple pour l\'Alaska\"');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_date` date NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `billet_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_date`, `comment_author`, `comment_content`, `billet_id`) VALUES
(1, '2018-12-03', 'monpseudo', 'ceci est le premier commentaire, sur le premier billet', 1),
(5, '2019-01-07', 'cam', 'test form commentaires', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
