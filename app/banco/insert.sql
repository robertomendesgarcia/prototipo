USE `prototipo_tcc`;

-- -----------------------------------------------------
-- Table `prototipo_tcc`.`configuracoes`
-- -----------------------------------------------------
INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('produtos', 'Site usa produtos.', '0', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('noticias', 'Site usa notícias.', '0', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('banners', 'Site usa banners.', '0', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('barra_lateral', 'Site usa barra lateral direita.', '0', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('rodape', 'Site usa rodapé.', '0', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_fonte', 'Cor da fonte.', '#333333', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_bg_html', 'Cor para background da tag html.', '#FFFFFF', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('img_bg_html_repeat', 'Forma de repetição para o background da tag html.', 'none', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('posicao_menu', 'Posiçãodo menu (1: Topo, 2: Esquerda).', '1', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('menu_degade', 'Usar degradê nos itens do menu.', '0', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_bg_menu', 'Cor de fundo dos itens do menu.', '#555555', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_fonte_menu', 'Cor da fonte dos itens do menu.', '#FFFFFF', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('mostrar_noticias_capa', 'Mostrar notícias na capa.', '0', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('qtde_noticias_capa', 'Quantidade de notícias na capa.', '3', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('mostrar_noticias_lateral', 'Mostrar notícias na barra lateral direita.', '0', NOW(), NOW());           

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('qtde_noticias_lateral', 'Quantidade de notícias na barra lateral direita.', '3', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('mostrar_produtos_capa', 'Mostrar produtos na capa.', '0', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('qtde_produtos_capa', 'Quantidade de produtos na capa.', '3', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('mostrar_produtos_lateral', 'Mostrar produtos na barra lateral direita.', '0', NOW(), NOW());           

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('qtde_produtos_lateral', 'Quantidade de produtos na barra lateral direita.', '3', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('img_bg_html', 'Imagem background tag html.', '3', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('img_logo', 'Imagem de logo.', 'logo.png', NOW(), NOW()); 


-- -----------------------------------------------------
-- Table `prototipo_tcc`.`banner_tipos`
-- -----------------------------------------------------
INSERT INTO `prototipo_tcc`.`banner_tipos` (`tipo`, `created`, `modified`)
VALUES ('Barra Lateral - Topo (120px de largura)', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`banner_tipos` (`tipo`, `created`, `modified`)
VALUES ('Barra Lateral - Entre Notícias e Produtos (120px de largura)', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`banner_tipos` (`tipo`, `created`, `modified`)
VALUES ('Barra Lateral - Abaixo (120px de largura)', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`banner_tipos` (`tipo`, `created`, `modified`)
VALUES ('Topo (940px de largura)', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`banner_tipos` (`tipo`, `created`, `modified`)
VALUES ('Centro (750px de largura)', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`banner_tipos` (`tipo`, `created`, `modified`)
VALUES ('Rodapé (750px de largura)', NOW(), NOW());






