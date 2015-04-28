-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 28 Avril 2015 à 16:41
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `rest-qcm`
--

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
`id` int(11) NOT NULL,
  `libelle` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`id`, `libelle`) VALUES
(4, 'Programmation'),
(5, 'Reseau');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
`id` int(11) NOT NULL,
  `libelle` varchar(250) NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `libelle`, `code`) VALUES
(48, 'questionnaireSansGroupe', 'pasDeCode'),
(52, 'adzaazd', 'azd'),
(53, 'groupe2da', 'zafzdazd');

-- --------------------------------------------------------

--
-- Structure de la table `groupe_questionnaire`
--

CREATE TABLE IF NOT EXISTS `groupe_questionnaire` (
`id` int(11) NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `groupe_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=349 ;

--
-- Contenu de la table `groupe_questionnaire`
--

INSERT INTO `groupe_questionnaire` (`id`, `questionnaire_id`, `groupe_id`) VALUES
(343, 159, 52),
(347, 159, 53),
(348, 160, 48);

-- --------------------------------------------------------

--
-- Structure de la table `groupe_utilisateur`
--

CREATE TABLE IF NOT EXISTS `groupe_utilisateur` (
  `utilisateur_id` int(11) NOT NULL,
  `groupe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupe_utilisateur`
--

INSERT INTO `groupe_utilisateur` (`utilisateur_id`, `groupe_id`) VALUES
(3, 48),
(7, 52),
(7, 53);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `questionnaire_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=173 ;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id`, `libelle`, `questionnaire_id`) VALUES
(169, 'zadzda', 159),
(170, 'fezze', 160),
(171, 'zdaaz', 160),
(172, 'question3', 160);

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

CREATE TABLE IF NOT EXISTS `questionnaire` (
`id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `domaine_id` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=161 ;

--
-- Contenu de la table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `libelle`, `domaine_id`, `date`) VALUES
(159, 'adzdzazad', NULL, '2015-04-27'),
(160, 'azddz', NULL, '2015-04-27');

-- --------------------------------------------------------

--
-- Structure de la table `rang`
--

CREATE TABLE IF NOT EXISTS `rang` (
`id` int(11) NOT NULL,
  `libelle` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `rang`
--

INSERT INTO `rang` (`id`, `libelle`) VALUES
(1, 'admin'),
(2, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `realisation`
--

CREATE TABLE IF NOT EXISTS `realisation` (
`id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE IF NOT EXISTS `reponse` (
`id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `good` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=697 ;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`id`, `libelle`, `question_id`, `good`) VALUES
(681, 'azdzad', 169, 1),
(682, 'zdaaz', 169, 0),
(683, 'dazza', 169, 0),
(684, 'dzaaz', 169, 0),
(685, 'test', 170, 0),
(686, 'test', 170, 0),
(687, 'test', 170, 1),
(688, 'test', 170, 0),
(689, 'adzz', 171, 1),
(690, 'daz', 171, 0),
(691, 'dazadz', 171, 0),
(692, 'dazazd', 171, 0),
(693, 'adzdz', 172, 0),
(694, 'adzdaz', 172, 0),
(695, 'daz', 172, 1),
(696, 'adz', 172, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse_utilisateur`
--

CREATE TABLE IF NOT EXISTS `reponse_utilisateur` (
  `reponse_id` int(11) NOT NULL,
  `realisation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`id` int(11) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `rang_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `nom`, `prenom`, `rang_id`) VALUES
(3, 'jcouture', '123456', 'couture', 'julien', 1),
(4, 'gtostain', '123456', 'tostain', 'guillaume', 1),
(5, 'tportois', '123456', 'portois', 'théo', 1),
(6, 'utilisateur', '123456', 'nom1', 'prenom1', 2),
(7, 'test', 'test', 'test', 'test', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe_questionnaire`
--
ALTER TABLE `groupe_questionnaire`
 ADD PRIMARY KEY (`id`), ADD KEY `groupe_id` (`groupe_id`), ADD KEY `questionnaire_id` (`questionnaire_id`);

--
-- Index pour la table `groupe_utilisateur`
--
ALTER TABLE `groupe_utilisateur`
 ADD PRIMARY KEY (`utilisateur_id`,`groupe_id`), ADD KEY `fk_utilisateur_has_groupe_groupe1_idx` (`groupe_id`), ADD KEY `fk_utilisateur_has_groupe_utilisateur1_idx` (`utilisateur_id`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_question_questionnaire1_idx` (`questionnaire_id`);

--
-- Index pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_questionnaire_domaine1_idx` (`domaine_id`);

--
-- Index pour la table `rang`
--
ALTER TABLE `rang`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `realisation`
--
ALTER TABLE `realisation`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_score_utilisateur1_idx` (`utilisateur_id`), ADD KEY `fk_score_questionnaire1_idx` (`questionnaire_id`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_reponse_question_idx` (`question_id`);

--
-- Index pour la table `reponse_utilisateur`
--
ALTER TABLE `reponse_utilisateur`
 ADD PRIMARY KEY (`reponse_id`,`realisation_id`), ADD KEY `fk_reponse_has_realisation_realisation1_idx` (`realisation_id`), ADD KEY `fk_reponse_has_realisation_reponse1_idx` (`reponse_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_utilisateur_rang1_idx` (`rang_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT pour la table `groupe_questionnaire`
--
ALTER TABLE `groupe_questionnaire`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=349;
--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=173;
--
-- AUTO_INCREMENT pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT pour la table `rang`
--
ALTER TABLE `rang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `realisation`
--
ALTER TABLE `realisation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=697;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `groupe_questionnaire`
--
ALTER TABLE `groupe_questionnaire`
ADD CONSTRAINT `groupe_questionnaire_ibfk_1` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `groupe_questionnaire_ibfk_2` FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `groupe_utilisateur`
--
ALTER TABLE `groupe_utilisateur`
ADD CONSTRAINT `fk_utilisateur_has_groupe_groupe1` FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_utilisateur_has_groupe_utilisateur1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
ADD CONSTRAINT `fk_question_questionnaire1` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
ADD CONSTRAINT `fk_questionnaire_domaine1` FOREIGN KEY (`domaine_id`) REFERENCES `domaine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `realisation`
--
ALTER TABLE `realisation`
ADD CONSTRAINT `fk_score_questionnaire1` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_score_utilisateur1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
ADD CONSTRAINT `fk_reponse_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reponse_utilisateur`
--
ALTER TABLE `reponse_utilisateur`
ADD CONSTRAINT `fk_reponse_has_realisation_realisation1` FOREIGN KEY (`realisation_id`) REFERENCES `realisation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_reponse_has_realisation_reponse1` FOREIGN KEY (`reponse_id`) REFERENCES `reponse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
ADD CONSTRAINT `fk_utilisateur_rang1` FOREIGN KEY (`rang_id`) REFERENCES `rang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
