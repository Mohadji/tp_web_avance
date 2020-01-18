-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 13 jan. 2020 à 14:53
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_scolaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `actions`
--

CREATE TABLE `actions` (
  `id_action` int(50) NOT NULL,
  `libelle_action` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description_action` varchar(100) CHARACTER SET latin1 NOT NULL,
  `url_action` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ordre_affichage` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `annee_academique`
--

CREATE TABLE `annee_academique` (
  `id_an_aca` int(11) NOT NULL,
  `lib_an_aca` int(10) NOT NULL,
  `nbr_inscription` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `annee_etude`
--

CREATE TABLE `annee_etude` (
  `id_an_etude` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL,
  `id_fac` int(11) NOT NULL,
  `nom_an_etude` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `statut_anEtude` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
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
  `profil_etudiant` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `faculte`
--

CREATE TABLE `faculte` (
  `id_fac` int(11) NOT NULL,
  `nom_fac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email_fac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tel_fac` int(14) NOT NULL,
  `nbr_salle` int(2) NOT NULL,
  `statut_fac` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `group_action`
--

CREATE TABLE `group_action` (
  `id_group_action` int(50) NOT NULL,
  `libelle_group_action` varchar(50) NOT NULL,
  `bloc_menu` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `ordre_affichage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id_niveau` int(11) NOT NULL,
  `code_niveau` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `libelle_profil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `profil_action`
--

CREATE TABLE `profil_action` (
  `id_profil_action` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `id_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(50) NOT NULL,
  `prenom_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login_user` varchar(50) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `id_fac` int(11) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL,
  `create_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id_action`);

--
-- Index pour la table `annee_academique`
--
ALTER TABLE `annee_academique`
  ADD PRIMARY KEY (`id_an_aca`);

--
-- Index pour la table `annee_etude`
--
ALTER TABLE `annee_etude`
  ADD PRIMARY KEY (`id_an_etude`),
  ADD KEY `id_niveau` (`id_niveau`),
  ADD KEY `id_fac` (`id_fac`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD UNIQUE KEY `matricul_etudiant` (`matricul_etudiant`),
  ADD KEY `id_fac` (`id_fac`),
  ADD KEY `id_an_academique` (`id_an_academique`),
  ADD KEY `id_an_etude` (`id_an_etude`);

--
-- Index pour la table `faculte`
--
ALTER TABLE `faculte`
  ADD PRIMARY KEY (`id_fac`);

--
-- Index pour la table `group_action`
--
ALTER TABLE `group_action`
  ADD PRIMARY KEY (`id_group_action`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id_niveau`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Index pour la table `profil_action`
--
ALTER TABLE `profil_action`
  ADD PRIMARY KEY (`id_profil_action`),
  ADD KEY `id_profil` (`id_profil`),
  ADD KEY `id_action` (`id_action`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_profil` (`id_profil`),
  ADD KEY `id_fac` (`id_fac`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actions`
--
ALTER TABLE `actions`
  MODIFY `id_action` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `annee_academique`
--
ALTER TABLE `annee_academique`
  MODIFY `id_an_aca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `annee_etude`
--
ALTER TABLE `annee_etude`
  MODIFY `id_an_etude` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `faculte`
--
ALTER TABLE `faculte`
  MODIFY `id_fac` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `group_action`
--
ALTER TABLE `group_action`
  MODIFY `id_group_action` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id_niveau` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil_action`
--
ALTER TABLE `profil_action`
  MODIFY `id_profil_action` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
