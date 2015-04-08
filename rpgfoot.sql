-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Avril 2015 à 09:00
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `rpgfoot`
--

-- --------------------------------------------------------

--
-- Structure de la table `pari`
--

CREATE TABLE IF NOT EXISTS `pari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dom` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL,
  `cotedom` float NOT NULL,
  `cotenul` float NOT NULL,
  `coteext` float NOT NULL,
  `sommeparie` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `coteparie` float NOT NULL,
  `equipe_pari` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE IF NOT EXISTS `resultat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dom` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL,
  `butdom` int(11) NOT NULL,
  `butext` int(11) NOT NULL,
  `cotedom` double NOT NULL,
  `cotenul` double NOT NULL,
  `coteext` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `resultat`
--

INSERT INTO `resultat` (`id`, `dom`, `ext`, `butdom`, `butext`, `cotedom`, `cotenul`, `coteext`) VALUES
(4, 'Monaco', 'Saint-Etienne', 0, 0, 2.1, 3.15, 3.7),
(5, 'Guingamp', 'Lyon', 0, 0, 3.5, 3.25, 2.1),
(6, 'Lorient', 'Rennes', 0, 0, 2.1, 3.25, 3.6),
(7, 'Lille ', 'Reims', 0, 0, 1.64, 3.5, 6),
(8, 'Nice', 'Evian TG', 0, 0, 2, 3.3, 3.9),
(9, 'Metz', 'Toulouse', 0, 0, 2.7, 3.2, 2.65),
(10, 'Montpellier', 'Bastia', 0, 0, 1.95, 3.45, 3.9),
(11, 'Bordeaux', 'Lens', 0, 0, 1.56, 3.7, 6.75),
(12, 'Nantes', 'Caen', 0, 0, 2.1, 3.2, 3.5),
(13, 'Marseille', 'Paris SG', 0, 0, 3, 3.25, 2.35);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `points` double NOT NULL,
  `admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `password`, `pseudo`, `points`, `admin`) VALUES
(1, 'Ca marche pas', 'jules', 'mdp', 'julio', 999999886.8, 11),
(2, 'maurie', 'olivier', 'bite', 'olive', 0, NULL),
(3, 'maurie', 'olivier', 'bite', 'olive', 100, NULL),
(4, 'charbonnier', 'Louis', 'roux', 'anibal', 80, NULL),
(5, 'basse', 'jules', 'mdp', 'bito', 45, NULL),
(6, 'basse', 'jules', 'mdp', 'rabit', 98, NULL),
(7, 'oli', 'oli', 'oli', 'oli', 467.7, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
