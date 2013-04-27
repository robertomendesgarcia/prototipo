SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `prototipo_tcc` ;
CREATE SCHEMA IF NOT EXISTS `prototipo_tcc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `prototipo_tcc` ;

-- -----------------------------------------------------
-- Table `prototipo_tcc`.`estruturas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`estruturas` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`estruturas` (
  `id` INT(1) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `pin` VARCHAR(60) NOT NULL ,
  `nome` VARCHAR(60) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  `usa_barra_lateral` VARCHAR(100) NULL ,
  `usa_rodape` VARCHAR(100) NULL ,
  `cor_fonte_texto` VARCHAR(100) NULL ,
  `cor_bg_html` VARCHAR(100) NULL ,
  `img_bg_html_repeat` VARCHAR(100) NULL ,
  `posicao_menu` VARCHAR(100) NULL ,
  `menu_degade` VARCHAR(100) NULL ,
  `cor_bg_menu` VARCHAR(100) NULL ,
  `cor_fonte_menu` VARCHAR(100) NULL ,
  `mostrar_noticias_capa` VARCHAR(100) NULL ,
  `qtde_noticias_capa` VARCHAR(100) NULL ,
  `mostrar_noticias_lateral` VARCHAR(100) NULL ,
  `qtde_noticias_lateral` VARCHAR(100) NULL ,
  `mostrar_produtos_capa` VARCHAR(100) NULL ,
  `qtde_produtos_capa` VARCHAR(100) NULL ,
  `mostrar_produtos_lateral` VARCHAR(100) NULL ,
  `qtde_produtos_lateral` VARCHAR(100) NULL ,
  `img_bg_html` VARCHAR(100) NULL ,
  `img_logo` VARCHAR(100) NULL ,
  `cor_titulo` VARCHAR(100) NULL ,
  `img_bg_topo` VARCHAR(100) NULL ,
  `keywords` VARCHAR(100) NULL ,
  `description` VARCHAR(100) NULL ,
  `author` VARCHAR(100) NULL ,
  `tamanho_centro` VARCHAR(100) NULL ,
  `telefone` VARCHAR(100) NULL ,
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
  `parent_id` INT(10) UNSIGNED NULL ,
  `lft` INT(10) NULL ,
  `rght` INT(10) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `categoria_id_idx` (`parent_id` ASC) ,
  CONSTRAINT `noticia_categoria_fk_noticia_categoria`
    FOREIGN KEY (`parent_id` )
    REFERENCES `prototipo_tcc`.`noticia_categorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


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
  `destaque` TINYINT(1) NULL ,
  `categoria_id` INT(10) UNSIGNED NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `categoria_id_idx` (`categoria_id` ASC) ,
  CONSTRAINT `noticia_fk_noticia_categoria`
    FOREIGN KEY (`categoria_id` )
    REFERENCES `prototipo_tcc`.`noticia_categorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


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
  INDEX `noticia_id_idx` (`noticia_id` ASC) ,
  CONSTRAINT `noticia_imagem_fk_noticia`
    FOREIGN KEY (`noticia_id` )
    REFERENCES `prototipo_tcc`.`noticias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`produto_categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`produto_categorias` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`produto_categorias` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(60) NOT NULL ,
  `ativo` TINYINT(1) NOT NULL ,
  `parent_id` INT(10) UNSIGNED NULL ,
  `lft` INT(10) NULL ,
  `rght` INT(10) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `categoria_id_idx` (`parent_id` ASC) ,
  CONSTRAINT `produto_categoria_fk_produto_categoria`
    FOREIGN KEY (`parent_id` )
    REFERENCES `prototipo_tcc`.`produto_categorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


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
  `destaque` TINYINT(1) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  INDEX `categoria_id_idx` (`categoria_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `produto_fk_produto_categoria`
    FOREIGN KEY (`categoria_id` )
    REFERENCES `prototipo_tcc`.`produto_categorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


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
  INDEX `produto_id_idx` (`produto_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `produto_imagem_fk_produto`
    FOREIGN KEY (`produto_id` )
    REFERENCES `prototipo_tcc`.`produtos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`paginas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`paginas` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`paginas` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `pin` VARCHAR(60) NOT NULL ,
  `titulo` VARCHAR(60) NOT NULL ,
  `texto` TEXT NULL ,
  `ativo` TINYINT(1) NULL ,
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
  `ativo` TINYINT(1) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`usuario_tipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`usuario_tipos` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`usuario_tipos` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `pin` VARCHAR(60) NOT NULL ,
  `tipo` VARCHAR(60) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


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
  `ativo` TINYINT(1) NULL ,
  `tipo_id` INT(10) UNSIGNED NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `usuario_fk_usuario_tipo`
    FOREIGN KEY (`tipo_id` )
    REFERENCES `prototipo_tcc`.`usuario_tipos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


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
  `ativo` TINYINT(1) NULL ,
  `link` VARCHAR(200) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `banner_tipo_is_idx` (`banner_tipo_id` ASC) ,
  CONSTRAINT `banner_fk_banner_tipo`
    FOREIGN KEY (`banner_tipo_id` )
    REFERENCES `prototipo_tcc`.`banner_tipos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`newsletter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `prototipo_tcc`.`newsletter` ;

CREATE  TABLE IF NOT EXISTS `prototipo_tcc`.`newsletter` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(60) NOT NULL ,
  `email` VARCHAR(60) NOT NULL ,
  `data_inscricao` DATETIME NOT NULL ,
  `ativo` TINYINT(1) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


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
  INDEX `noticia_id_idx` (`noticia_id` ASC) ,
  INDEX `noticia_comentario_id_idx` (`noticia_comentario_id` ASC) ,
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



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
