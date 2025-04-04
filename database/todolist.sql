-- MySQL Script generated by MySQL Workbench
-- Thu Nov 10 22:03:44 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema todolist
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema todolist
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `todolist` DEFAULT CHARACTER SET utf8mb4 ;
USE `todolist` ;

-- -----------------------------------------------------
-- Table `todolist`.`planos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `todolist`.`planos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(80) NOT NULL,
  `descricao` TEXT NOT NULL,
  `valor` DECIMAL(8,2) NOT NULL,
  `data_cadastro` DATETIME NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `todolist`.`usuarios`
-- -----------------------------------------------------
-- todolist.usuarios definition

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `nivel` tinyint(1) NOT NULL DEFAULT '1',
  `foto` varchar(150) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;


-- -----------------------------------------------------
-- Table `todolist`.`tarefas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `todolist`.`tarefas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tarefa` VARCHAR(45) NOT NULL,
  `descricao` TEXT NOT NULL,
  `prioridade` VARCHAR(10) NOT NULL,
  `datavenc` DATETIME NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT 0,
  `usuarios_id` INT NOT NULL,
  PRIMARY KEY (`id`, `usuarios_id`),
  INDEX `fk_tarefas_usuarios1_idx` (`usuarios_id` ASC),
  CONSTRAINT `fk_tarefas_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `todolist`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `todolist`.`paginas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `todolist`.`paginas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(100) NOT NULL,
  `slug` VARCHAR(100) NOT NULL,
  `descricao` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
