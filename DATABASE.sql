-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 28 Juin 2016 à 17:17
-- Version du serveur :  5.5.49-0+deb8u1
-- Version de PHP :  5.6.22-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sn`
--

-- --------------------------------------------------------

--
-- Structure de la table `archive_articles`
--

CREATE TABLE IF NOT EXISTS `archive_articles` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `auteur_id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `tags` varchar(255) NOT NULL,
  `expiration` date DEFAULT NULL,
  `cache` tinyint(1) NOT NULL DEFAULT '0',
  `dateSortie` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `auteur_id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `tags` varchar(255) NOT NULL,
  `expiration` date DEFAULT NULL,
  `cache` tinyint(1) NOT NULL DEFAULT '0',
  `dateSortie` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bans`
--

CREATE TABLE IF NOT EXISTS `bans` (
`id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `auto` tinyint(1) NOT NULL DEFAULT '0',
  `raison` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categoriesEntreprises`
--

CREATE TABLE IF NOT EXISTS `categoriesEntreprises` (
`id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `sigle` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(255) NOT NULL,
  `annee` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
`id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `texte` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE IF NOT EXISTS `eleves` (
`id` int(11) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `classe_sigle` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `annee` int(1) NOT NULL DEFAULT '1',
  `redoublant` tinyint(1) NOT NULL DEFAULT '0',
  `rue` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cp` varchar(20) NOT NULL,
  `ville` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `guard` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE IF NOT EXISTS `entreprises` (
`id` int(11) NOT NULL,
  `denomination` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rue` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cp` varchar(20) NOT NULL,
  `ville` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(50) NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  `guard` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `guard`
--

CREATE TABLE IF NOT EXISTS `guard` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `code` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `ip` varchar(20) NOT NULL,
  `logType` varchar(50) NOT NULL,
  `details` varchar(255) NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `logs_co`
--

CREATE TABLE IF NOT EXISTS `logs_co` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `ip` varchar(50) NOT NULL,
  `success` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
`id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `options`
--

INSERT INTO `options` (`id`, `nom`, `valeur`) VALUES
(1, 'extensions', 'pdf,docx,txt'),
(2, 'tailleMax', '5242880'),
(3, 'securite', '1'),
(4, 'importEleves', '0'),
(5, 'attributionClasses', '0'),
(6, 'attributionProfs', '0');

-- --------------------------------------------------------

--
-- Structure de la table `passReset`
--

CREATE TABLE IF NOT EXISTS `passReset` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_type` varchar(20) NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `preBans`
--

CREATE TABLE IF NOT EXISTS `preBans` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `ip` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `profs`
--

CREATE TABLE IF NOT EXISTS `profs` (
`id` int(11) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `matiere` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tit` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `guard` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `profs`
--

INSERT INTO `profs` (`id`, `mail`, `mdp`, `nom`, `prenom`, `matiere`, `tit`, `img`, `admin`, `guard`) VALUES
(1, 'admin@paradox.ovh', '$2y$10$CHwIfagPA3S0KxLFdRGJJuM.W3I53E0cvvpS/4W1Qxq0crhQN61VC', 'Paradox', 'Admin', NULL, NULL, '', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `stages`
--

CREATE TABLE IF NOT EXISTS `stages` (
`id` int(11) NOT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `entreprise_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `debutStage` date DEFAULT NULL,
  `finStage` date DEFAULT NULL,
  `description` text NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `archive_articles`
--
ALTER TABLE `archive_articles`
 ADD PRIMARY KEY (`id`), ADD KEY `auteur_id` (`auteur_id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`), ADD KEY `auteur_id` (`auteur_id`);

--
-- Index pour la table `bans`
--
ALTER TABLE `bans`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categoriesEntreprises`
--
ALTER TABLE `categoriesEntreprises`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
 ADD PRIMARY KEY (`sigle`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
 ADD PRIMARY KEY (`id`), ADD KEY `article_id` (`article_id`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
 ADD PRIMARY KEY (`id`), ADD KEY `classe_id` (`classe_sigle`), ADD KEY `classe_sigle` (`classe_sigle`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
 ADD PRIMARY KEY (`id`), ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `guard`
--
ALTER TABLE `guard`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logs_co`
--
ALTER TABLE `logs_co`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `passReset`
--
ALTER TABLE `passReset`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `preBans`
--
ALTER TABLE `preBans`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profs`
--
ALTER TABLE `profs`
 ADD PRIMARY KEY (`id`), ADD KEY `tit` (`tit`);

--
-- Index pour la table `stages`
--
ALTER TABLE `stages`
 ADD PRIMARY KEY (`id`), ADD KEY `entreprise_id` (`entreprise_id`), ADD KEY `eleve_id` (`eleve_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `bans`
--
ALTER TABLE `bans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categoriesEntreprises`
--
ALTER TABLE `categoriesEntreprises`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `guard`
--
ALTER TABLE `guard`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `logs_co`
--
ALTER TABLE `logs_co`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `passReset`
--
ALTER TABLE `passReset`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `preBans`
--
ALTER TABLE `preBans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `profs`
--
ALTER TABLE `profs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `stages`
--
ALTER TABLE `stages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
ADD CONSTRAINT `fk_articles_auteur` FOREIGN KEY (`auteur_id`) REFERENCES `profs` (`id`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
ADD CONSTRAINT `fk_comm_article` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Contraintes pour la table `eleves`
--
ALTER TABLE `eleves`
ADD CONSTRAINT `fk_eleves_classe` FOREIGN KEY (`classe_sigle`) REFERENCES `classes` (`sigle`);

--
-- Contraintes pour la table `entreprises`
--
ALTER TABLE `entreprises`
ADD CONSTRAINT `fk_entreprise_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categoriesEntreprises` (`id`);

--
-- Contraintes pour la table `profs`
--
ALTER TABLE `profs`
ADD CONSTRAINT `fk_profs_classe` FOREIGN KEY (`tit`) REFERENCES `classes` (`sigle`);

--
-- Contraintes pour la table `stages`
--
ALTER TABLE `stages`
ADD CONSTRAINT `fk_stagesrecherche_eleve` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`),
ADD CONSTRAINT `fk_stagesrecherche_entreprise` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
