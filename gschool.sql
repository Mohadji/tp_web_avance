-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 24 Janvier 2020 à 14:40
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gschool`
--

-- --------------------------------------------------------

--
-- Structure de la table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id_action` int(50) NOT NULL AUTO_INCREMENT,
  `libelle_action` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description_action` varchar(100) CHARACTER SET latin1 NOT NULL,
  `url_action` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ordre_affichage_action` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_group_action` int(50) NOT NULL,
  PRIMARY KEY (`id_action`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=24 ;

--
-- Contenu de la table `actions`
--

INSERT INTO `actions` (`id_action`, `libelle_action`, `description_action`, `url_action`, `ordre_affichage_action`, `id_group_action`) VALUES
(1, 'Mon compte', 'voir son compte', 'user_view.php', '1', 1),
(2, 'Nouveau', 'creer un utilisateur (user)', 'user_add.php', '1', 3),
(3, 'Consulter ', 'voir la liste des utilisateurs', 'user_liste_view.php', '2', 3),
(4, '', 'modification d''un utilisateur', 'user_update.php', '3', 3),
(5, '', 'activer ou desactiver un utilisateur', 'user_active.php', '4', 3),
(6, 'Nouveau', 'creer un nouveau profil ', 'profil_add.php', '1', 4),
(7, 'Consulter ', 'voir la liste des profils', 'profil_view.php', '2', 4),
(8, 'Nouveau', 'Enregistrer un etudiant ', 'etudiant_add.php', '1', 5),
(9, 'Consulter ', 'voir la liste des etudiants', 'etudiant_liste_view.php', '2', 5),
(10, '', 'modifications des infos d''un etudiant', 'etudiant_update.php', '3', 5),
(11, 'Nouveau', 'creer une faculter ', 'faculte_add.php', '1', 6),
(12, 'Consulter', 'voir la liste des faculter', 'faculte_liste_view.php', '2', 6),
(13, '', 'modifier une faculter', 'faculte_update.php', '3', 6),
(14, 'Ajouter', 'creer une annee d''etude', 'anetude_add.php', '1', 8),
(15, 'Consulter ', 'voir la liste des annees d''etudes', 'anetude_liste_view.php', '2', 8),
(16, '', 'modification d''une annee d''etude', 'anetude_update.php', '3', 8),
(17, 'Imprimé', 'imprimer les faculte par ans', 'anetude_print.php', '4', 8),
(18, 'Ajouter', 'ajouter une annee academique', 'annac_add.php', '1', 7),
(19, 'Consulter ', 'voir son la liste des annees academique', 'annac_liste_view.php', '2', 7),
(20, '', 'modification d''une annee academique', 'annac_update.php', '3', 7),
(21, 'Nouvelle Inscription', 'faire une inscription d''un etudiant(e)', 'inscription_add.php', '1', 9),
(22, 'Consulter ', 'voir les inscription effectuer', 'inscription_liste_view.php', '2', 9),
(23, 'Imprimé quittance', 'imprimer une quittance d''inscription', 'inscription_print.php', '3', 9);

-- --------------------------------------------------------

--
-- Structure de la table `annee_academique`
--

CREATE TABLE IF NOT EXISTS `annee_academique` (
  `id_annac` int(11) NOT NULL AUTO_INCREMENT,
  `lib_annac` int(10) NOT NULL,
  `nbr_inscription` int(4) NOT NULL,
  PRIMARY KEY (`id_annac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `annee_etude`
--

CREATE TABLE IF NOT EXISTS `annee_etude` (
  `id_an_etude` int(11) NOT NULL AUTO_INCREMENT,
  `id_niveau` int(11) NOT NULL,
  `id_fac` int(11) NOT NULL,
  `nom_an_etude` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `statut_anEtude` int(1) NOT NULL,
  PRIMARY KEY (`id_an_etude`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `id_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `matricul_etudiant` int(10) NOT NULL,
  `id_fac` int(11) NOT NULL,
  `id_an_academique` int(11) NOT NULL,
  `id_an_etude` int(11) NOT NULL,
  `nom_etudiant` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_etudiant` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `date_naiss` date NOT NULL,
  `lieu_naiss` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nationalite` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `photo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tel_etudiant` int(14) NOT NULL,
  `montant` int(5) NOT NULL,
  `profil_etudiant` int(1) NOT NULL,
  PRIMARY KEY (`id_etudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `faculte`
--

CREATE TABLE IF NOT EXISTS `faculte` (
  `id_fac` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fac` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email_fac` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel_fac` int(20) NOT NULL,
  `nbr_salle` int(11) NOT NULL,
  `statut_fac` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_fac`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `faculte`
--

INSERT INTO `faculte` (`id_fac`, `nom_fac`, `email_fac`, `tel_fac`, `nbr_salle`, `statut_fac`) VALUES
(1, 'Faculté d''Agronomie', 'fac_agro@uam.edu', 92712929, 23, 1);

-- --------------------------------------------------------

--
-- Structure de la table `group_action`
--

CREATE TABLE IF NOT EXISTS `group_action` (
  `id_group_action` int(50) NOT NULL AUTO_INCREMENT,
  `libelle_group_action` varchar(50) NOT NULL,
  `bloc_menu` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `ordre_affichage` varchar(50) NOT NULL,
  PRIMARY KEY (`id_group_action`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `group_action`
--

INSERT INTO `group_action` (`id_group_action`, `libelle_group_action`, `bloc_menu`, `icon`, `ordre_affichage`) VALUES
(1, 'Mon compte', 'config', 'fe-user', '1'),
(2, 'Déconnexion', 'config', 'fe-log-out', '2'),
(3, 'Utilisateurs', 'claire', 'fe-users', '1'),
(4, 'Profils', 'claire', 'fe-user-check', '2'),
(5, 'Etudiants', 'claire', 'fe-user', '3'),
(6, 'Facultés', 'claire', 'fe-package', '4'),
(7, 'Année Académique', 'claire', 'fe-award', '6'),
(8, 'Année d''etude', 'claire', 'fe-watch', '5');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE IF NOT EXISTS `niveau` (
  `id_niveau` int(11) NOT NULL AUTO_INCREMENT,
  `code_niveau` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_niveau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_profil` varchar(50) NOT NULL COMMENT 'nom du profil',
  `created_by` int(11) NOT NULL COMMENT 'creer par',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date de creation',
  `modified_by` int(11) NOT NULL DEFAULT '0' COMMENT 'modifier par',
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'date de mofication',
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`id_profil`, `libelle_profil`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, 'Administrateur', 1, '2020-01-19 22:44:34', 0, '0000-00-00 00:00:00'),
(2, 'Secrétaire ', 1, '2020-01-19 23:46:43', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `profil_action`
--

CREATE TABLE IF NOT EXISTS `profil_action` (
  `id_profil_action` int(11) NOT NULL AUTO_INCREMENT,
  `id_profil` int(11) NOT NULL,
  `id_action` int(11) NOT NULL,
  PRIMARY KEY (`id_profil_action`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Contenu de la table `profil_action`
--

INSERT INTO `profil_action` (`id_profil_action`, `id_profil`, `id_action`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(38, 1, 23),
(57, 2, 9),
(58, 2, 8),
(59, 2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(50) NOT NULL,
  `prenom_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login_user` varchar(50) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `id_fac` int(11) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT '1',
  `create_at` datetime NOT NULL,
  `create_by` varchar(200) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `email`, `login_user`, `id_profil`, `id_fac`, `password_user`, `statut`, `create_at`, `create_by`) VALUES
(1, 'Mouhamed', 'Mohadji Sy', 'sycours@gmail.com', 'Msy', 1, 1, '123456', 1, '2020-01-13 00:00:00', '1'),
(2, 'Nafissatou', 'Chaibou Maikibi', 'nafi@gmail.com', 'Nafi', 2, 1, '123456', 1, '2020-01-20 00:00:00', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
