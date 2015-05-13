-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 08 Mai 2015 à 22:22
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
-- Structure de la table `equipe`
--

CREATE TABLE IF NOT EXISTS `equipe` (
  `nom` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`nom`, `logo`, `id`) VALUES
('Bastia', '/images/bastia.png', 1),
('Bordeaux', '/images/bordeaux.png', 2),
('Caen', '/images/caen.png', 3),
('Evian TG', '/images/evian.png', 4),
('Guingamp', '/images/guingamp.png', 5),
('Lens', '/images/lens.png', 6),
('Lille', '/images/lille.png', 8),
('Lorient', '/images/lorient.png', 9),
('Lyon', '/images/lyon.png', 10),
('Marseille', '/images/marseille.png', 11),
('Metz', '/images/metz.png', 12),
('Monaco', '/images/monaco.png', 13),
('Montpellier', '/images/montpellier.png', 14),
('Nantes', '/images/nantes.png', 15),
('Nice', '/images/nice.png', 16),
('Paris SG', '/images/paris.png', 17),
('Reims', '/images/reims.png', 18),
('Rennes', '/images/rennes.png', 19),
('Saint-Etienne', '/images/saintetienne.png', 20),
('Toulouse', '/images/toulouse.png', 21);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `pari`
--

INSERT INTO `pari` (`id`, `dom`, `ext`, `cotedom`, `cotenul`, `coteext`, `sommeparie`, `id_user`, `coteparie`, `equipe_pari`) VALUES
(28, 'Lille ', 'Reims', 1.64, 3.5, 6, 20, 7, 3.5, 'nul'),
(29, 'Lille ', 'Reims', 1.64, 3.5, 6, 50, 7, 3.5, 'nul'),
(30, 'Lille ', 'Reims', 1.64, 3.5, 6, 40, 7, 3.5, 'nul'),
(31, 'Lille ', 'Reims', 1.64, 3.5, 6, 40, 7, 3.5, 'nul');

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
  `logo_res` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `resultat`
--

INSERT INTO `resultat` (`id`, `dom`, `ext`, `butdom`, `butext`, `cotedom`, `cotenul`, `coteext`, `logo_res`) VALUES
(7, 'Lille ', 'Reims', 0, 0, 1.64, 3.5, 6, ''),
(8, 'Nice', 'Evian TG', 0, 0, 2, 3.3, 3.9, ''),
(9, 'Metz', 'Toulouse', 0, 0, 2.7, 3.2, 2.65, ''),
(10, 'Montpellier', 'Bastia', 0, 0, 1.95, 3.45, 3.9, ''),
(12, 'Nantes', 'Caen', 0, 0, 2.1, 3.2, 3.5, ''),
(13, 'Marseille', 'Paris SG', 0, 0, 3, 3.25, 2.35, '');

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
(5, 'basse', 'jules', 'mdp', 'bito', 45, NULL),
(7, 'oli', 'oli', 'oli', 'oli', 317.7, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
