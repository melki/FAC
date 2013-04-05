-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 05 Avril 2013 à 11:04
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text NOT NULL,
  `mdp` text NOT NULL,
  `nb_sondages` int(11) NOT NULL,
  `nb_reponses` int(11) NOT NULL,
  `mail` text NOT NULL,
  `age` text NOT NULL,
  `sexe` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mdp`, `nb_sondages`, `nb_reponses`, `mail`, `age`, `sexe`) VALUES
(10, 'Bob', '$1$1W2..c5.$9J1Cd76USGzC8KeFYHvpA.', 2, 4, 'bob@gmail.com', '3', 'Femme'),
(11, 'papa', '$1$GX1.Xq3.$AuKwXH7Hr5Iwis81tX6CQ1', 0, 3, 'papa@gmail.com', '5', 'Homme');

-- --------------------------------------------------------

--
-- Structure de la table `multiple`
--

CREATE TABLE IF NOT EXISTS `multiple` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  `nb_choix` int(11) NOT NULL,
  `choix1` text NOT NULL,
  `choix2` text NOT NULL,
  `choix3` text NOT NULL,
  `choix4` text NOT NULL,
  `choix5` text NOT NULL,
  `choix6` text NOT NULL,
  `choix7` text NOT NULL,
  `choix8` text NOT NULL,
  `choix9` text NOT NULL,
  `choix10` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Contenu de la table `multiple`
--

INSERT INTO `multiple` (`id`, `id_question`, `nb_choix`, `choix1`, `choix2`, `choix3`, `choix4`, `choix5`, `choix6`, `choix7`, `choix8`, `choix9`, `choix10`) VALUES
(27, 54, 3, '1', '2', '4', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(28, 57, 2, '1', '2', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(29, 59, 3, 'choix1', 'choix2', 'choix3', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(30, 60, 2, 'Bleu ', 'Rouge', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(31, 62, 2, 'Bleu ', 'Rouge', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(32, 63, 2, '1', '2', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(33, 64, 2, '1', '2', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(34, 65, 3, '', '', '', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(35, 66, 3, '1', '2', '3', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(36, 67, 3, '11', '22', '33', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(37, 68, 6, 'd', 'd', 'd', 'd', 'd', '6d', 'a', 'a', 'a', 'a'),
(38, 73, 2, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(39, 74, 2, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(40, 75, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(41, 76, 4, 'a', 'a', 'a', 'sqsq', 'a', 'a', 'a', 'a', 'a', 'a'),
(42, 77, 3, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(43, 78, 2, 's', '22', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(44, 79, 1, '1', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(45, 80, 1, '11', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(46, 81, 2, 'Prout numero 1', 'Prout numero 2', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(47, 82, 4, 'Oui, beaucoup', 'Oui, assez', 'Non, pas vraiment', 'Non, pas du tout', 'a', 'a', 'a', 'a', 'a', 'a'),
(48, 83, 4, 'Le logo', 'Le design', 'La simplicitÃ©', 'Les crÃ©ateurs ', 'a', 'a', 'a', 'a', 'a', 'a'),
(49, 85, 2, 'ee', 'aa', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(50, 86, 2, 'ss', 'ssd', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sondage` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `titre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id`, `id_sondage`, `numero`, `type`, `titre`) VALUES
(54, 35, 1, 1, 'Multiple'),
(55, 35, 2, 3, '2'),
(56, 35, 3, 3, '3'),
(57, 35, 4, 2, '4'),
(58, 36, 1, 3, 'Quel age as tu '),
(59, 36, 2, 1, 'Multiple'),
(60, 37, 1, 1, 'Mutiple'),
(61, 37, 2, 3, 'Ecrite'),
(62, 37, 3, 2, 'Unique'),
(63, 38, 1, 1, 'ds'),
(64, 38, 2, 2, 'ds'),
(65, 39, 1, 1, 'Questio1'),
(66, 40, 1, 1, 'ds'),
(67, 40, 2, 2, 'Multiple'),
(68, 41, 1, 2, 'Questio1'),
(69, 41, 2, 3, 'One shot'),
(70, 42, 1, 3, 'z'),
(71, 42, 2, 3, 'z'),
(72, 42, 3, 3, 'z'),
(73, 43, 1, 2, 'ds'),
(74, 43, 2, 2, 'a'),
(75, 43, 3, 2, 'Questio3'),
(76, 44, 1, 2, 'Questio1'),
(77, 45, 1, 1, 'ds'),
(78, 45, 2, 1, 'Questio2'),
(79, 46, 1, 1, 'ds'),
(80, 46, 2, 1, 'Questio2'),
(81, 47, 1, 1, 'Essayons'),
(82, 48, 1, 2, 'Aimez vous le design'),
(83, 48, 2, 1, 'Quels sont les points forts de ce site'),
(84, 48, 3, 3, 'Avez vous une remarque sur ce site'),
(85, 49, 1, 1, 'test1'),
(86, 49, 2, 2, 'Questio2');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE IF NOT EXISTS `reponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sondage` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `nb_question` int(11) NOT NULL,
  `reponse1` text NOT NULL,
  `reponse2` text NOT NULL,
  `reponse3` text NOT NULL,
  `reponse4` text NOT NULL,
  `reponse5` text NOT NULL,
  `reponse6` text NOT NULL,
  `reponse7` text NOT NULL,
  `reponse8` text NOT NULL,
  `reponse9` text NOT NULL,
  `reponse10` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`id`, `id_sondage`, `id_membre`, `nb_question`, `reponse1`, `reponse2`, `reponse3`, `reponse4`, `reponse5`, `reponse6`, `reponse7`, `reponse8`, `reponse9`, `reponse10`) VALUES
(1, 45, 9, 2, '0 a', '0 22', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 45, 9, 2, ' a', ' 22', '0', '0', '0', '0', '0', '0', '0', '0'),
(3, 45, 9, 2, ' a a a', ' s 22', '0', '0', '0', '0', '0', '0', '0', '0'),
(4, 36, 9, 2, '', ' choix1 choix3', '0', '0', '0', '0', '0', '0', '0', '0'),
(5, 36, 9, 2, ' Prout', ' choix1 choix3', '0', '0', '0', '0', '0', '0', '0', '0'),
(6, 42, 9, 3, ' rzeatez', ' tezatezteza', ' trezteztr', '0', '0', '0', '0', '0', '0', '0'),
(7, 43, 9, 3, ' a', ' a', ' a', '0', '0', '0', '0', '0', '0', '0'),
(8, 40, 9, 2, ' 2 3', ' 11', '0', '0', '0', '0', '0', '0', '0', '0'),
(9, 40, 9, 2, ' 2 3', ' 11', '0', '0', '0', '0', '0', '0', '0', '0'),
(10, 45, 9, 2, ' a', ' 22', '0', '0', '0', '0', '0', '0', '0', '0'),
(11, 45, 9, 2, ' a a', ' s', '0', '0', '0', '0', '0', '0', '0', '0'),
(12, 45, 9, 2, ' a a', ' 22', '0', '0', '0', '0', '0', '0', '0', '0'),
(13, 44, 9, 1, ' a', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(14, 44, 9, 1, ' a', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(15, 44, 9, 1, ' sqsq', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(16, 44, 9, 1, ' a', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(17, 44, 9, 1, ' a', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(18, 44, 9, 1, ' a', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(19, 44, 9, 1, ' a', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(20, 44, 9, 1, ' a', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(21, 44, 9, 1, ' a', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(22, 45, 9, 2, ' a', ' 22', '0', '0', '0', '0', '0', '0', '0', '0'),
(23, 45, 9, 2, ' a a', ' s', '0', '0', '0', '0', '0', '0', '0', '0'),
(24, 44, 9, 1, ' a', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(25, 41, 9, 2, ' d', ' mezormsmlsfk', '0', '0', '0', '0', '0', '0', '0', '0'),
(26, 45, 9, 2, ' a', ' 22', '0', '0', '0', '0', '0', '0', '0', '0'),
(27, 43, 9, 3, ' a', ' a', ' a', 'none', 'none', 'none', 'none', 'none', 'none', 'none'),
(28, 38, 9, 2, ' 1 2', ' 2', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none'),
(29, 47, 9, 1, ' Prout numero 1 Prout numero 2', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none'),
(30, 47, 9, 1, ' Prout numero 2', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none'),
(31, 47, 9, 1, ' Prout numero 1 Prout numero 2', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none'),
(32, 48, 10, 3, ' Oui, assez', ' Le logo La simplicitÃ©', ' Non il est parfait', 'none', 'none', 'none', 'none', 'none', 'none', 'none'),
(33, 49, 10, 2, ' ee', ' ss', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none'),
(35, 48, 10, 3, ' Non, pas du tout', ' La simplicitÃ©', ' Nul', 'none', 'none', 'none', 'none', 'none', 'none', 'none'),
(36, 48, 10, 3, ' Oui, assez', ' La simplicitÃ©', ' Non', 'none', 'none', 'none', 'none', 'none', 'none', 'none'),
(37, 48, 10, 3, ' Oui, assez', ' Le design', ' non', 'none', 'none', 'none', 'none', 'none', 'none', 'none'),
(38, 48, 10, 3, '', ' La simplicitÃ©', ' k', 'none', 'none', 'none', 'none', 'none', 'none', 'none'),
(39, 48, 10, 3, '', '', ' ', 'none', 'none', 'none', 'none', 'none', 'none', 'none');

-- --------------------------------------------------------

--
-- Structure de la table `sondages`
--

CREATE TABLE IF NOT EXISTS `sondages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `id_membre` int(11) NOT NULL,
  `nb_question` int(11) NOT NULL,
  `categorie` text NOT NULL,
  `date` date NOT NULL,
  `nb_rempli` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Contenu de la table `sondages`
--

INSERT INTO `sondages` (`id`, `titre`, `id_membre`, `nb_question`, `categorie`, `date`, `nb_rempli`) VALUES
(48, 'Ce site internet', 10, 3, 'Vie quotidienne', '2013-04-05', 6),
(49, 'testons les accents', 10, 2, 'Jeux', '2013-04-05', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
