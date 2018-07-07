-- MySQL Script generated by MySQL Workbench
-- Fri Jul  6 20:50:24 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema db_cadcli
-- -----------------------------------------------------
-- Banco de Dados do Sistema Cadastro de Clientes.
DROP SCHEMA IF EXISTS `db_cadcli` ;

-- -----------------------------------------------------
-- Schema db_cadcli
--
-- Banco de Dados do Sistema Cadastro de Clientes.
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_cadcli` DEFAULT CHARACTER SET utf8 ;
USE `db_cadcli` ;

-- -----------------------------------------------------
-- Table `tbuser`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbuser` ;

CREATE TABLE IF NOT EXISTS `tbuser` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `desLogin` VARCHAR(50) NOT NULL,
  `desPass` VARCHAR(256) NOT NULL,
  `desType` TINYINT NOT NULL,
  `dtRegister` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `dtUpdate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUser`),
  UNIQUE INDEX `desLogin_UNIQUE` (`desLogin` ASC))
ENGINE = InnoDB
COMMENT = 'Tabela de Usuários';


-- -----------------------------------------------------
-- Table `tbperson`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbperson` ;

CREATE TABLE IF NOT EXISTS `tbperson` (
  `idPerson` INT NOT NULL AUTO_INCREMENT,
  `idUser` INT NOT NULL,
  `desName` VARCHAR(100) NOT NULL,
  `desEmail` VARCHAR(100) NOT NULL,
  `desPhoto` TEXT NULL,
  `dtRegister` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `dtUpdate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPerson`),
  INDEX `tbperson_tbuser_pk` (`idUser` ASC),
  UNIQUE INDEX `desEmail_UNIQUE` (`desEmail` ASC),
  CONSTRAINT `tbperson_tbuser_fk`
    FOREIGN KEY (`idUser`)
    REFERENCES `tbuser` (`idUser`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Tabela de Perfil de Usuários';


-- -----------------------------------------------------
-- Table `tbaddress`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbaddress` ;

CREATE TABLE IF NOT EXISTS `tbaddress` (
  `idAddress` INT NOT NULL AUTO_INCREMENT,
  `desZip` VARCHAR(9) NOT NULL,
  `desStreet` VARCHAR(100) NOT NULL,
  `desNumber` INT(10) NULL,
  `desComplement` VARCHAR(100) NULL,
  `desNeighborhood` VARCHAR(100) NOT NULL,
  `desCity` VARCHAR(100) NOT NULL,
  `desState` CHAR(2) NOT NULL,
  `dtRegister` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `dtUpdate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idAddress`))
ENGINE = InnoDB
COMMENT = 'Tabela de Endereços';


-- -----------------------------------------------------
-- Table `tbcontact`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbcontact` ;

CREATE TABLE IF NOT EXISTS `tbcontact` (
  `idContact` INT NOT NULL AUTO_INCREMENT,
  `desPhone` VARCHAR(15) NULL,
  `desMobile` VARCHAR(15) NOT NULL,
  `dtRegister` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `dtUpdate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idContact`))
ENGINE = InnoDB
COMMENT = 'Tabela de Contatos';


-- -----------------------------------------------------
-- Table `tbclient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbclient` ;

CREATE TABLE IF NOT EXISTS `tbclient` (
  `idClient` INT NOT NULL AUTO_INCREMENT,
  `desName` VARCHAR(100) NOT NULL,
  `idAddress` INT NOT NULL,
  `idContact` INT NOT NULL,
  `desEmail` VARCHAR(100) NOT NULL,
  `dtBirthday` DATE NULL,
  `dtRegister` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `dtUpdate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idClient`),
  INDEX `tbclient_tbaddress_pk` (`idAddress` ASC),
  INDEX `tbclient_tbcontact_pk` (`idContact` ASC),
  CONSTRAINT `tbclient_tbaddress_fk`
    FOREIGN KEY (`idAddress`)
    REFERENCES `tbaddress` (`idAddress`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `tbclient_tbcontact_fk`
    FOREIGN KEY (`idContact`)
    REFERENCES `tbcontact` (`idContact`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Tabela de Clientes';

USE `db_cadcli` ;

-- -----------------------------------------------------
-- View `vw_userperson`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `vw_userperson` ;
USE `db_cadcli`;
CREATE  OR REPLACE VIEW `vw_userperson` AS
	select	a.idUser,
			a.desLogin,
            a.desPass,
            a.desType,
            b.desName,
            b.desEmail,
            b.desPhoto,
            date_format(b.dtRegister, '%d/%m/%Y') as 'dtRegister',
            date_format(b.dtUpdate, '%d/%m/%Y') as 'dtUpdate'
	from tbuser a
    inner join tbperson b
    using (idUser)
    order by a.idUser asc;

-- -----------------------------------------------------
-- View `vw_clientlist`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `vw_clientlist` ;
USE `db_cadcli`;
CREATE  OR REPLACE VIEW `vw_clientlist` AS
	select	a.idClient,
			a.desName,
            a.desEmail,
            date_format(a.dtBirthday, '%d/%m/%Y') as 'dtBirthday',
            b.desZip,
            b.desStreet,
            b.desNumber,
            b.desComplement,
            b.desNeighborhood,
            b.desCity,
            b.desState,
            c.desPhone,
            c.desMobile,
            date_format(c.dtRegister, '%d/%m/%Y') as 'dtRegister',
            date_format(c.dtUpdate, '%d/%m/%Y') as 'dtUpdate'
	from tbclient a
    inner join tbaddress b
    using (idAddress)
    inner join tbcontact c
    using (idContact)
    order by idClient asc;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `tbuser`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_cadcli`;
INSERT INTO `tbuser` (`idUser`, `desLogin`, `desPass`, `desType`, `dtRegister`, `dtUpdate`) VALUES (1, 'admin', '$2y$10$E8iHRv/20Go3GrJDXs.KDugf9XpWcxuH3U9aGShCdf/.vr6/Xp9D2', 1, '1990-01-01', '1990-01-01');

COMMIT;


-- -----------------------------------------------------
-- Data for table `tbperson`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_cadcli`;
INSERT INTO `tbperson` (`idPerson`, `idUser`, `desName`, `desEmail`, `desPhoto`, `dtRegister`, `dtUpdate`) VALUES (1, 1, 'Administrador', 'administrador@cadcli.com.br', NULL, '1990-01-01', '1990-01-01');

COMMIT;

