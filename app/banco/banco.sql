SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `prototipo_tcc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `prototipo_tcc` ;

-- -----------------------------------------------------
-- Table `prototipo_tcc`.`estruturas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`estruturas` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`estruturas` (
  `id` INT(1) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(60) NOT NULL ,
  `posicao_menu` INT(1) NOT NULL ,
  `barra_lateral_direita` TINYINT(1) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`configuracoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`configuracoes` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`configuracoes` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `pin` VARCHAR(60) NOT NULL ,
  `descricao` VARCHAR(100) NULL ,
  `conteudo` VARCHAR(1000) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`noticia_categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`noticia_categorias` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`noticia_categorias` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(60) NOT NULL ,
  `ativo` TINYINT(1) NOT NULL ,
  `categoria_id` INT(10) UNSIGNED NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `noticia_categoria_fk_noticia_categoria`
    FOREIGN KEY (`categoria_id` )
    REFERENCES `prototipo_tcc`.`noticia_categorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE INDEX `categoria_id_idx` ON `prototipo_tcc`.`noticia_categorias` (`categoria_id` ASC) ;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`noticias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`noticias` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`noticias` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(60) NOT NULL ,
  `texto` TEXT NULL ,
  `fonte` VARCHAR(60) NULL ,
  `data` DATETIME NULL ,
  `ativo` TINYINT(1) NOT NULL ,
  `categoria_id` INT(10) UNSIGNED NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `noticia_fk_noticia_categoria`
    FOREIGN KEY (`categoria_id` )
    REFERENCES `prototipo_tcc`.`noticia_categorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE INDEX `categoria_id_idx` ON `prototipo_tcc`.`noticias` (`categoria_id` ASC) ;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`noticia_imagens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`noticia_imagens` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`noticia_imagens` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `noticia_id` INT(10) UNSIGNED NOT NULL ,
  `titulo` VARCHAR(60) NULL ,
  `destaque` TINYINT(1) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `noticia_imagem_fk_noticia`
    FOREIGN KEY (`noticia_id` )
    REFERENCES `prototipo_tcc`.`noticias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE INDEX `noticia_id_idx` ON `prototipo_tcc`.`noticia_imagens` (`noticia_id` ASC) ;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`produto_categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`produto_categorias` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`produto_categorias` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(60) NOT NULL ,
  `inativo` TINYINT(1) NOT NULL ,
  `parent_id` INT(10) UNSIGNED NULL ,
  `lft` INT(10) NULL ,
  `rght` INT(10) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `produto_categoria_fk_produto_categoria`
    FOREIGN KEY (`parent_id` )
    REFERENCES `prototipo_tcc`.`produto_categorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE INDEX `categoria_id_idx` ON `prototipo_tcc`.`produto_categorias` (`parent_id` ASC) ;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`produtos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`produtos` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`produtos` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(60) NOT NULL ,
  `valor` DOUBLE NULL ,
  `descricao` TEXT NULL ,
  `categoria_id` INT(10) UNSIGNED NOT NULL ,
  `ativo` TINYINT(1) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `produto_fk_produto_categoria`
    FOREIGN KEY (`categoria_id` )
    REFERENCES `prototipo_tcc`.`produto_categorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE INDEX `categoria_id_idx` ON `prototipo_tcc`.`produtos` (`categoria_id` ASC) ;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`produto_imagens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`produto_imagens` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`produto_imagens` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `produto_id` INT(10) UNSIGNED NOT NULL ,
  `titulo` VARCHAR(60) NULL ,
  `destaque` TINYINT(1) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `produto_imagem_fk_produto`
    FOREIGN KEY (`produto_id` )
    REFERENCES `prototipo_tcc`.`produtos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE INDEX `produto_id_idx` ON `prototipo_tcc`.`produto_imagens` (`produto_id` ASC) ;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`paginas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`paginas` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`paginas` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `pin` VARCHAR(60) NOT NULL ,
  `titulo` VARCHAR(60) NOT NULL ,
  `texto` TEXT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`curriculos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`curriculos` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`curriculos` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(60) NOT NULL ,
  `email` VARCHAR(60) NULL ,
  `telefone` VARCHAR(15) NULL ,
  `data` DATETIME NOT NULL ,
  `observacao` VARCHAR(500) NULL ,
  `arquivo` VARCHAR(60) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`usuarios` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`usuarios` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(60) NOT NULL ,
  `usuario` VARCHAR(60) NOT NULL ,
  `senha` VARCHAR(60) NOT NULL ,
  `email` VARCHAR(60) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`menu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`menu` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`menu` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `link` VARCHAR(100) NULL ,
  `menu_id` INT(10) UNSIGNED NULL ,
  `pagina_id` INT(10) UNSIGNED NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `menu_fk_menu`
    FOREIGN KEY (`menu_id` )
    REFERENCES `prototipo_tcc`.`menu` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `menu_fk_pagina`
    FOREIGN KEY (`pagina_id` )
    REFERENCES `prototipo_tcc`.`paginas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE INDEX `menu_id_idx` ON `prototipo_tcc`.`menu` (`menu_id` ASC) ;

CREATE INDEX `pagina_id_idx` ON `prototipo_tcc`.`menu` (`pagina_id` ASC) ;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`banner_tipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`banner_tipos` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`banner_tipos` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(60) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`banners`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`banners` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`banners` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(60) NOT NULL ,
  `arquivo` VARCHAR(60) NOT NULL ,
  `validade` DATETIME NULL ,
  `banner_tipo_id` INT(10) UNSIGNED NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `banner_fk_banner_tipo`
    FOREIGN KEY (`banner_tipo_id` )
    REFERENCES `prototipo_tcc`.`banner_tipos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE INDEX `banner_tipo_is_idx` ON `prototipo_tcc`.`banners` (`banner_tipo_id` ASC) ;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`newsletter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`newsletter` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`newsletter` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(60) NOT NULL ,
  `email` VARCHAR(60) NOT NULL ,
  `data_inscricao` DATETIME NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE UNIQUE INDEX `email_UNIQUE` ON `prototipo_tcc`.`newsletter` (`email` ASC) ;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`noticia_comentarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`noticia_comentarios` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`noticia_comentarios` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `comentario` VARCHAR(500) NOT NULL ,
  `autor` VARCHAR(60) NOT NULL ,
  `noticia_id` INT(10) UNSIGNED NOT NULL ,
  `noticia_comentario_id` INT(10) UNSIGNED NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `noticia_comentario_fk_noticia`
    FOREIGN KEY (`noticia_id` )
    REFERENCES `prototipo_tcc`.`noticias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `noticia_comentario_fk_noticia_comentario`
    FOREIGN KEY (`noticia_comentario_id` )
    REFERENCES `prototipo_tcc`.`noticia_comentarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE INDEX `noticia_id_idx` ON `prototipo_tcc`.`noticia_comentarios` (`noticia_id` ASC) ;

CREATE INDEX `noticia_comentario_id_idx` ON `prototipo_tcc`.`noticia_comentarios` (`noticia_comentario_id` ASC) ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
