-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 25 Mars 2015 à 09:06
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `pari`
--

INSERT INTO `pari` (`id`, `dom`, `ext`, `cotedom`, `cotenul`, `coteext`, `sommeparie`, `id_user`, `coteparie`) VALUES
(1, 'Marseille', 'Reims', 1.36, 4.3, 7, 12, 1, 0),
(2, 'Marseille', 'Reims', 1.36, 4.3, 7, 15, 1, 0),
(3, 'Marseille', 'Reims', 1.36, 4.3, 7, 50, 2, 0),
(4, 'Marseille', 'Reims', 1.36, 4.3, 7, 50, 2, 0),
(5, 'Marseille', 'Reims', 1.36, 4.3, 7, 10, 4, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
