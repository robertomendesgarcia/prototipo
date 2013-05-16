-- -----------------------------------------------------
-- Table `estruturas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `estruturas` ;

CREATE  TABLE IF NOT EXISTS `estruturas` (
  `id` INT(1) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `pin` VARCHAR(60) NOT NULL ,
  `nome` VARCHAR(60) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  `usa_barra_lateral` VARCHAR(100) NULL ,
  `usa_rodape` VARCHAR(100) NULL ,
  `cor_fonte_texto` VARCHAR(100) NULL ,
  `cor_bg_html` VARCHAR(100) NULL ,
  `cor_bg_menu` VARCHAR(100) NULL ,
  `cor_fonte_menu` VARCHAR(100) NULL ,
  `cor_bg_topo` VARCHAR(100) NULL ,
  `cor_bg_rodape` VARCHAR(100) NULL ,
  `img_bg_html_repeat` VARCHAR(100) NULL ,
  `posicao_menu` VARCHAR(100) NULL ,
  `menu_degade` VARCHAR(100) NULL ,
  `mostrar_noticias_capa` VARCHAR(100) NULL ,
  `qtde_noticias_capa` VARCHAR(100) NULL ,
  `mostrar_noticias_lateral` VARCHAR(100) NULL ,
  `cor_titulo` VARCHAR(100) NULL ,
  `qtde_noticias_lateral` VARCHAR(100) NULL ,
  `mostrar_produtos_capa` VARCHAR(100) NULL ,
  `qtde_produtos_capa` VARCHAR(100) NULL ,
  `mostrar_produtos_lateral` VARCHAR(100) NULL ,
  `qtde_produtos_lateral` VARCHAR(100) NULL ,
  `img_bg_html` VARCHAR(100) NULL ,
  `img_logo` VARCHAR(100) NULL ,
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
-- Table `configuracoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `configuracoes` ;

CREATE  TABLE IF NOT EXISTS `configuracoes` (
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
-- Table `noticia_categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `noticia_categorias` ;

CREATE  TABLE IF NOT EXISTS `noticia_categorias` (
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
    REFERENCES `noticia_categorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `noticias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `noticias` ;

CREATE  TABLE IF NOT EXISTS `noticias` (
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
    REFERENCES `noticia_categorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `noticia_imagens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `noticia_imagens` ;

CREATE  TABLE IF NOT EXISTS `noticia_imagens` (
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
    REFERENCES `noticias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `produto_categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `produto_categorias` ;

CREATE  TABLE IF NOT EXISTS `produto_categorias` (
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
    REFERENCES `produto_categorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `produtos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `produtos` ;

CREATE  TABLE IF NOT EXISTS `produtos` (
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
    REFERENCES `produto_categorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `produto_imagens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `produto_imagens` ;

CREATE  TABLE IF NOT EXISTS `produto_imagens` (
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
    REFERENCES `produtos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `paginas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `paginas` ;

CREATE  TABLE IF NOT EXISTS `paginas` (
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
-- Table `curriculos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `curriculos` ;

CREATE  TABLE IF NOT EXISTS `curriculos` (
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
-- Table `usuario_tipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuario_tipos` ;

CREATE  TABLE IF NOT EXISTS `usuario_tipos` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `pin` VARCHAR(60) NOT NULL ,
  `tipo` VARCHAR(60) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuarios` ;

CREATE  TABLE IF NOT EXISTS `usuarios` (
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
    REFERENCES `usuario_tipos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `banner_tipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `banner_tipos` ;

CREATE  TABLE IF NOT EXISTS `banner_tipos` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `pin` VARCHAR(60) NOT NULL ,
  `tipo` VARCHAR(60) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `banners`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `banners` ;

CREATE  TABLE IF NOT EXISTS `banners` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(60) NOT NULL ,
  `arquivo` VARCHAR(60) NOT NULL ,
  `banner_tipo_id` INT(10) UNSIGNED NOT NULL ,
  `ativo` TINYINT(1) NULL ,
  `link` VARCHAR(200) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `banner_tipo_is_idx` (`banner_tipo_id` ASC) ,
  CONSTRAINT `banner_fk_banner_tipo`
    FOREIGN KEY (`banner_tipo_id` )
    REFERENCES `banner_tipos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `newsletter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `newsletter` ;

CREATE  TABLE IF NOT EXISTS `newsletter` (
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



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
