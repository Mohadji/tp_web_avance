-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema gestion_scolaire
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gestion_scolaire
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gschool` DEFAULT CHARACTER SET utf8mb4 ;
-- -----------------------------------------------------
-- Schema test
-- -----------------------------------------------------
USE `gschool` ;

-- -----------------------------------------------------
-- Table `gestion_scolaire`.`group_action`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gschool`.`group_action` (
  `id_group_action` INT(50) NOT NULL AUTO_INCREMENT,
  `libelle_group_action` VARCHAR(50) NOT NULL,
  `bloc_menu` VARCHAR(50) NOT NULL,
  `icon` VARCHAR(50) NOT NULL,
  `ordre_affichage` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_group_action`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `gestion_scolaire`.`actions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gschool`.`actions` (
  `id_action` INT(50) NOT NULL AUTO_INCREMENT,
  `libelle_action` VARCHAR(50) CHARACTER SET 'latin1' NOT NULL,
  `description_action` VARCHAR(100) CHARACTER SET 'latin1' NOT NULL,
  `url_action` VARCHAR(50) CHARACTER SET 'latin1' NOT NULL,
  `ordre_affichage` VARCHAR(50) CHARACTER SET 'latin1' NOT NULL,
  `group_action_id_group_action` INT(50) NOT NULL,
  PRIMARY KEY (`id_action`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf32
COLLATE = utf32_unicode_ci;


-- -----------------------------------------------------
-- Table `gestion_scolaire`.`annee_academique`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gschool`.`annee_academique` (
  `id_an_aca` INT(11) NOT NULL AUTO_INCREMENT,
  `lib_an_aca` INT(10) NOT NULL,
  `nbr_inscription` INT(4) NOT NULL,
  PRIMARY KEY (`id_an_aca`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `gestion_scolaire`.`faculte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gschool`.`faculte` (
  `id_fac` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_fac` VARCHAR(20) NOT NULL,
  `email_fac` VARCHAR(20) NOT NULL,
  `tel_fac` INT(14) NOT NULL,
  `nbr_salle` INT(2) NOT NULL,
  `statut_fac` INT(1) NOT NULL,
  PRIMARY KEY (`id_fac`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `gestion_scolaire`.`niveau`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gschool`.`niveau` (
  `id_niveau` INT(11) NOT NULL AUTO_INCREMENT,
  `code_niveau` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`id_niveau`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `gestion_scolaire`.`annee_etude`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gschool`.`annee_etude` (
  `id_an_etude` INT(11) NOT NULL AUTO_INCREMENT,
  `id_niveau` INT(11) NOT NULL,
  `id_fac` INT(11) NOT NULL,
  `nom_an_etude` VARCHAR(25) NOT NULL,
  `statut_anEtude` INT(1) NOT NULL,
  `faculte_id_fac` INT(11) NOT NULL,
  `niveau_id_niveau` INT(11) NOT NULL,
  PRIMARY KEY (`id_an_etude`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `gestion_scolaire`.`etudiant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gschool`.`etudiant` (
  `id_etudiant` INT(11) NOT NULL AUTO_INCREMENT,
  `matricul_etudiant` INT(10) NOT NULL,
  `id_fac` INT(11) NOT NULL,
  `id_an_academique` INT(11) NOT NULL,
  `id_an_etude` INT(11) NOT NULL,
  `nom_etudiant` VARCHAR(25) NOT NULL,
  `prenom_etudiant` VARCHAR(25) NOT NULL,
  `date_naiss` DATE NOT NULL,
  `lieu_naiss` VARCHAR(25) NOT NULL,
  `nationalite` VARCHAR(10) NOT NULL,
  `sexe` VARCHAR(1) NOT NULL,
  `photo` LONGTEXT NOT NULL,
  `tel_etudiant` INT(14) NOT NULL,
  `montant` INT(5) NOT NULL,
  `profil_etudiant` INT(1) NOT NULL,
  `annee_academique_id_an_aca` INT(11) NOT NULL,
  `faculte_id_fac` INT(11) NOT NULL,
  `annee_etude_id_an_etude` INT(11) NOT NULL,
  PRIMARY KEY (`id_etudiant`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;



-- -----------------------------------------------------
-- Table `gestion_scolaire`.`profil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gschool`.`profil` (
  `id_profil` INT(11) NOT NULL AUTO_INCREMENT,
  `libelle_profil` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_profil`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `gestion_scolaire`.`profil_action`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gschool`.`profil_action` (
  `id_profil_action` INT(11) NOT NULL AUTO_INCREMENT,
  `id_profil` INT(11) NOT NULL,
  `id_action` INT(11) NOT NULL,
  `profil_id_profil` INT(11) NOT NULL,
  `actions_id_action` INT(50) NOT NULL,
  PRIMARY KEY (`id_profil_action`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;



-- -----------------------------------------------------
-- Table `gestion_scolaire`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gschool`.`user` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_user` VARCHAR(50) NOT NULL,
  `prenom_user` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `login_user` VARCHAR(50) NOT NULL,
  `id_profil` INT(11) NOT NULL,
  `id_fac` INT(11) NOT NULL,
  `password_user` VARCHAR(50) NOT NULL,
  `create_at` DATETIME NOT NULL,
  `create_by` VARCHAR(200) NOT NULL,
  `profil_id_profil` INT(11) NOT NULL,
  `faculte_id_fac` INT(11) NOT NULL,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
