-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema banco
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema banco
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `banco` ;
USE `banco` ;

-- -----------------------------------------------------
-- Table `banco`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco`.`usuario` (
  `usuario_id` INT NOT NULL AUTO_INCREMENT,
  `usuario_cpf` VARCHAR(14) NOT NULL,
  `usuario_nome` VARCHAR(90) NOT NULL,
  `usuario_nascimento` DATE NOT NULL,
  `usuario_sexo` VARCHAR(50) NOT NULL,
  `usuario_email` VARCHAR(100) NOT NULL,
  `usuario_senha` VARCHAR(20) NOT NULL,
  `usuario_tipo` ENUM('org', 'usuario') NOT NULL DEFAULT 'usuario',
  PRIMARY KEY (`usuario_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `banco`.`evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco`.`evento` (
  `evento_id` INT NOT NULL AUTO_INCREMENT,
  `evento_nome` VARCHAR(150) NOT NULL,
  `evento_data` DATETIME NOT NULL,
  `evento_local` VARCHAR(100) NOT NULL,
  `evento_modalidade` VARCHAR(100) NOT NULL,
  `evento_inscritos` INT NOT NULL,
  `evento_valor` FLOAT NOT NULL,
  `evento_distancia` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`evento_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `banco`.`organizador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco`.`organizador` (
  `organizador_id` INT NOT NULL AUTO_INCREMENT,
  `organizador_email` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`organizador_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `banco`.`inscricoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco`.`inscricoes` (
  `evento_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`evento_id`, `usuario_id`),
  INDEX `fk_evento_has_usuario_usuario1_idx` (`usuario_id` ASC) VISIBLE,
  INDEX `fk_evento_has_usuario_evento_idx` (`evento_id` ASC) VISIBLE,
  CONSTRAINT `fk_evento_has_usuario_evento`
    FOREIGN KEY (`evento_id`)
    REFERENCES `banco`.`evento` (`evento_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_usuario_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `banco`.`usuario` (`usuario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `banco`.`usuario_has_organizador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco`.`usuario_has_organizador` (
  `usuario_id` INT NOT NULL,
  `organizador_id` INT NOT NULL,
  PRIMARY KEY (`usuario_id`, `organizador_id`),
  INDEX `fk_usuario_has_organizador_organizador1_idx` (`organizador_id` ASC) VISIBLE,
  INDEX `fk_usuario_has_organizador_usuario1_idx` (`usuario_id` ASC) VISIBLE,
  CONSTRAINT `fk_usuario_has_organizador_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `banco`.`usuario` (`usuario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_organizador_organizador1`
    FOREIGN KEY (`organizador_id`)
    REFERENCES `banco`.`organizador` (`organizador_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `banco`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco`.`pagamento` (
  `pagamento_id` INT NOT NULL AUTO_INCREMENT,
  `evento_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `pagamento_forma` VARCHAR(75) NOT NULL,
  `pagamento_data` DATETIME NOT NULL,
  PRIMARY KEY (`pagamento_id`, `evento_id`, `usuario_id`),
  INDEX `fk_pagamento_evento1_idx` (`evento_id` ASC) VISIBLE,
  INDEX `fk_pagamento_usuario1_idx` (`usuario_id` ASC) VISIBLE,
  CONSTRAINT `fk_pagamento_evento1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `banco`.`evento` (`evento_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagamento_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `banco`.`usuario` (`usuario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

