USE `prototipo_tcc`;

-- -----------------------------------------------------
-- Table `prototipo_tcc`.`configuracoes`
-- -----------------------------------------------------
DELETE FROM `prototipo_tcc`.`configuracoes`;

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('usa_produtos', 'Usa produtos.', '0', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('usa_noticias', 'Usa notícias.', '0', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('usa_banners', 'Usa banners.', '0', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('usa_barra_lateral', 'Usa barra lateral direita.', '1', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('usa_rodape', 'Usa rodapé.', '1', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_fonte_texto', 'Cor da fonte para o texto.', '#333333', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_bg_html', 'Cor para background da tag html.', '#FFFFFF', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('img_bg_html_repeat', 'Forma de repetição para o background da tag html.', 'none', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('posicao_menu', 'Posição do menu (1: Topo, 2: Esquerda).', '1', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('menu_degade', 'Usar degradê nos itens do menu.', '0', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_bg_menu', 'Cor de fundo dos itens do menu.', '#555555', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_fonte_menu', 'Cor da fonte dos itens do menu.', '#FFFFFF', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('mostrar_noticias_capa', 'Mostrar notícias na capa.', '1', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('qtde_noticias_capa', 'Quantidade de notícias na capa.', '5', NOW(), NOW());

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('mostrar_noticias_lateral', 'Mostrar notícias na barra lateral direita.', '1', NOW(), NOW());           

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('qtde_noticias_lateral', 'Quantidade de notícias na barra lateral direita.', '3', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('mostrar_produtos_capa', 'Mostrar produtos na capa.', '1', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('qtde_produtos_capa', 'Quantidade de produtos na capa.', '5', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('mostrar_produtos_lateral', 'Mostrar produtos na barra lateral direita.', '1', NOW(), NOW());           

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('qtde_produtos_lateral', 'Quantidade de produtos na barra lateral direita.', '3', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('img_bg_html', 'Imagem background tag html.', '', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('img_logo', 'Imagem de logo.', 'logo.png', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_titulo', 'Cor para os títulos.', '#333333', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('conteudo_rodape', 'Conteúdo para o rodapé.', '<p>...</p>', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('img_bg_topo', 'Imagem para background do topo.', '', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('titulo_site', 'Título para o site externo.', '...', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('slogan', 'Slogan para o site externo.', '...', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('keywords', 'Palavras chave para meta tag.', '...', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('description', 'Descrição meta tag.', '...', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('author', 'Autor para meta tag.', '...', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('tamanho_centro', 'Tamanho da área central.', 'medio', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('email_contato', 'E-mail para receber os contatos.', '', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('usa_trabalhe_conosco', 'Ter página de Trabalhe Conosco.', '1', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('email_trabalhe_conosco', 'E-mail para receber os currículos enviados pelo site.', '', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('pagina_institucional', 'Site tem uma págia institucional.', '1', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('endereco_fisico_empresa', 'Endereço físico da empresa.', '...', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('telefone_1', 'Telefone 1.', '...', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('telefone_2', 'Telefone 2.', '...', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('json_configuracao_smtp', 'Configurações SMTP (json).', '', NOW(), NOW()); 

-- -----------------------------------------------------
-- Table `prototipo_tcc`.`banner_tipos`
-- -----------------------------------------------------
DELETE FROM `prototipo_tcc`.`banner_tipos`;

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

-- -----------------------------------------------------
-- Table `prototipo_tcc`.`paginas`
-- -----------------------------------------------------
DELETE FROM `prototipo_tcc`.`paginas`;

INSERT INTO `prototipo_tcc`.`paginas` (`pin`, `titulo`, `texto`, `created`, `modified`)
VALUES ('a-empresa', 'A Empresa', 'A empresa...', NOW(), NOW());

-- -----------------------------------------------------
-- Table `prototipo_tcc`.`estruturas`
-- -----------------------------------------------------
DELETE FROM `prototipo_tcc`.`estruturas`;

-- Menu no Topo com Barra Lateral
INSERT INTO `prototipo_tcc`.`estruturas` (	`nome`, 				`created`, 	`modified`,	`usa_produtos`,	`usa_noticias`,	`usa_banners`,	`usa_barra_lateral`,	`usa_rodape`, 	`cor_fonte_texto`, 	`cor_bg_html`, 	`img_bg_html_repeat`, 	`posicao_menu`,	`menu_degade`,	`cor_bg_menu`, `cor_fonte_menu`,	`mostrar_noticias_capa`,	`qtde_noticias_capa`,	`mostrar_noticias_lateral`,	`qtde_noticias_lateral`,	`mostrar_produtos_capa`,	`qtde_produtos_capa`,	`mostrar_produtos_lateral`,	`qtde_produtos_lateral`,	`img_bg_html`,	`img_logo`,	`cor_titulo`,	`conteudo_rodape`,	`img_bg_topo`,	`titulo_site`,	`keywords`,	`description`,	`author`,	`tamanho_centro`,	`email_contato`,	`usa_trabalhe_conosco`,	`email_trabalhe_conosco`,	`pagina_institucional`,	`endereco`,	`telefone_1`,	`telefone_2`,	`slogan`)
								  VALUES (	'Estrutura Padrão 01', 	NOW(), 		NOW(), 		'1', 			'1', 			'1', 			'1', 					'1', 			'#333333', 			'#FFFFFF', 		'repeat-x', 			'1', 			'0', 			'#444444', 		'#FFFFFF',			'1',						'5',					'1',						'3',						'1',						'5',					'1',						'3',						NULL,			NULL,		'#777777',		NULL,				NULL,			'WebFacility',	NULL,		NULL,			NULL,		'medio',			NULL,				'1',				NULL,						'<p>...</p>',			NULL,		NULL,			NULL,			NULL);

-- Menu na Esquerda com Barra Lateral
INSERT INTO `prototipo_tcc`.`estruturas` (	`nome`, 				`created`, 	`modified`,	`usa_produtos`,	`usa_noticias`,	`usa_banners`,	`usa_barra_lateral`,	`usa_rodape`, 	`cor_fonte_texto`, 	`cor_bg_html`, 	`img_bg_html_repeat`, 	`posicao_menu`,	`menu_degade`,	`cor_bg_menu`, `cor_fonte_menu`,	`mostrar_noticias_capa`,	`qtde_noticias_capa`,	`mostrar_noticias_lateral`,	`qtde_noticias_lateral`,	`mostrar_produtos_capa`,	`qtde_produtos_capa`,	`mostrar_produtos_lateral`,	`qtde_produtos_lateral`,	`img_bg_html`,	`img_logo`,	`cor_titulo`,	`conteudo_rodape`,	`img_bg_topo`,	`titulo_site`,	`keywords`,	`description`,	`author`,	`tamanho_centro`,	`email_contato`,	`usa_trabalhe_conosco`,	`email_trabalhe_conosco`,	`pagina_institucional`,	`endereco`,	`telefone_1`,	`telefone_2`,	`slogan`)
								  VALUES (	'Estrutura Padrão 02', 	NOW(), 		NOW(), 		'1', 			'1', 			'1', 			'1', 					'1', 			'#333333', 			'#FFFFFF', 		'repeat-x', 			'2', 			'0', 			'#444444', 		'#FFFFFF',			'1',						'5',					'1',						'3',						'1',						'5',					'1',						'3',						NULL,			NULL,		'#777777',		NULL,				NULL,			'WebFacility',	NULL,		NULL,			NULL,		'medio',			NULL,				'1',				NULL,						'<p>...</p>',			NULL,		NULL,			NULL,			NULL);

-- Menu na Esquerda sem Barra Lateral
INSERT INTO `prototipo_tcc`.`estruturas` (	`nome`, 				`created`, 	`modified`,	`usa_produtos`,	`usa_noticias`,	`usa_banners`,	`usa_barra_lateral`,	`usa_rodape`, 	`cor_fonte_texto`, 	`cor_bg_html`, 	`img_bg_html_repeat`, 	`posicao_menu`,	`menu_degade`,	`cor_bg_menu`, `cor_fonte_menu`,	`mostrar_noticias_capa`,	`qtde_noticias_capa`,	`mostrar_noticias_lateral`,	`qtde_noticias_lateral`,	`mostrar_produtos_capa`,	`qtde_produtos_capa`,	`mostrar_produtos_lateral`,	`qtde_produtos_lateral`,	`img_bg_html`,	`img_logo`,	`cor_titulo`,	`conteudo_rodape`,	`img_bg_topo`,	`titulo_site`,	`keywords`,	`description`,	`author`,	`tamanho_centro`,	`email_contato`,	`usa_trabalhe_conosco`,	`email_trabalhe_conosco`,	`pagina_institucional`,	`endereco`,	`telefone_1`,	`telefone_2`,	`slogan`)
								  VALUES (	'Estrutura Padrão 03', 	NOW(), 		NOW(), 		'1', 			'1', 			'1', 			'0', 					'1', 			'#333333', 			'#FFFFFF', 		'repeat-x', 			'2', 			'0', 			'#444444', 		'#FFFFFF',			'1',						'5',					'1',						'3',						'1',						'5',					'1',						'3',						NULL,			NULL,		'#777777',		NULL,				NULL,			'WebFacility',	NULL,		NULL,			NULL,		'medio',			NULL,				'1',				NULL,						'<p>...</p>',			NULL,		NULL,			NULL,			NULL);

-- Menu no Topo sem Barra Lateral
INSERT INTO `prototipo_tcc`.`estruturas` (	`nome`, 				`created`, 	`modified`,	`usa_produtos`,	`usa_noticias`,	`usa_banners`,	`usa_barra_lateral`,	`usa_rodape`, 	`cor_fonte_texto`, 	`cor_bg_html`, 	`img_bg_html_repeat`, 	`posicao_menu`,	`menu_degade`,	`cor_bg_menu`, `cor_fonte_menu`,	`mostrar_noticias_capa`,	`qtde_noticias_capa`,	`mostrar_noticias_lateral`,	`qtde_noticias_lateral`,	`mostrar_produtos_capa`,	`qtde_produtos_capa`,	`mostrar_produtos_lateral`,	`qtde_produtos_lateral`,	`img_bg_html`,	`img_logo`,	`cor_titulo`,	`conteudo_rodape`,	`img_bg_topo`,	`titulo_site`,	`keywords`,	`description`,	`author`,	`tamanho_centro`,	`email_contato`,	`usa_trabalhe_conosco`,	`email_trabalhe_conosco`,	`pagina_institucional`,	`endereco`,	`telefone_1`,	`telefone_2`,	`slogan`)
								  VALUES (	'Estrutura Padrão 04', 	NOW(), 		NOW(), 		'1', 			'1', 			'1', 			'0', 					'1', 			'#333333', 			'#FFFFFF', 		'repeat-x', 			'1', 			'0', 			'#444444', 		'#FFFFFF',			'1',						'5',					'1',						'3',						'1',						'5',					'1',						'3',						NULL,			NULL,		'#777777',		NULL,				NULL,			'WebFacility',	NULL,		NULL,			NULL,		'medio',			NULL,				'1',				NULL,						'<p>...</p>',			NULL,		NULL,			NULL,			NULL);

-- -----------------------------------------------------
-- Table `prototipo_tcc`.`usuario_tipos`
-- -----------------------------------------------------
DELETE FROM `prototipo_tcc`.`usuario_tipos`;

INSERT INTO `prototipo_tcc`.`usuario_tipos` (`tipo`, `created`, `modified`)
VALUES ('Administrador', NOW(), NOW()); 

INSERT INTO `prototipo_tcc`.`usuario_tipos` (`tipo`, `created`, `modified`)
VALUES ('Restrito', NOW(), NOW()); 