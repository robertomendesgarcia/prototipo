-- -----------------------------------------------------
-- Table `configuracoes`
-- -----------------------------------------------------
DELETE FROM `configuracoes`;

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('usa_produtos', 'Usa produtos.', '0', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('usa_noticias', 'Usa notícias.', '0', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('usa_banners', 'Usa banners.', '0', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('usa_barra_lateral', 'Usa barra lateral direita.', '1', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('usa_rodape', 'Usa rodapé.', '1', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_fonte_texto', 'Cor da fonte para o texto.', '#333333', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_bg_html', 'Cor para background da tag html.', '#FFFFFF', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_bg_topo', 'Cor para background do topo.', '#FFFFFF', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_bg_rodape', 'Cor para background do rodapé.', '#545454', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_texto_rodape', 'Cor do texto no rodapé.', '#FFFFFF', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('img_bg_html_repeat', 'Forma de repetição para o background da tag html.', 'none', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('posicao_menu', 'Posição do menu (1: Topo, 2: Esquerda).', '1', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('menu_degade', 'Usar degradê nos itens do menu.', '0', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_bg_menu', 'Cor de fundo dos itens do menu.', '#555555', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_fonte_menu', 'Cor da fonte dos itens do menu.', '#FFFFFF', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('mostrar_noticias_capa', 'Mostrar notícias na capa.', '1', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('qtde_noticias_capa', 'Quantidade de notícias na capa.', '3', NOW(), NOW());

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('mostrar_noticias_lateral', 'Mostrar notícias na barra lateral direita.', '1', NOW(), NOW());           

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('qtde_noticias_lateral', 'Quantidade de notícias na barra lateral direita.', '3', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('mostrar_produtos_capa', 'Mostrar produtos na capa.', '1', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('qtde_produtos_capa', 'Quantidade de produtos na capa.', '3', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('mostrar_produtos_lateral', 'Mostrar produtos na barra lateral direita.', '1', NOW(), NOW());           

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('qtde_produtos_lateral', 'Quantidade de produtos na barra lateral direita.', '3', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('img_bg_html', 'Imagem background tag html.', '', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('img_logo', 'Imagem de logo.', 'logo.png', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('cor_titulo', 'Cor para os títulos.', '#333333', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('conteudo_rodape', 'Conteúdo para o rodapé.', '<p>...</p>', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('img_bg_topo', 'Imagem para background do topo.', '', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('titulo_site', 'Título para o site externo.', '...', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('slogan', 'Slogan para o site externo.', '...', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('keywords', 'Palavras chave para meta tag.', '...', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('description', 'Descrição meta tag.', '...', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('author', 'Autor para meta tag.', '...', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('tamanho_centro', 'Tamanho da área central.', 'medio', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('email_contato', 'E-mail para receber os contatos.', '', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('usa_trabalhe_conosco', 'Ter página de Trabalhe Conosco.', '1', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('email_trabalhe_conosco', 'E-mail para receber os currículos enviados pelo site.', '', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('pagina_institucional', 'Site tem uma págia institucional.', '1', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('endereco_fisico_empresa', 'Endereço físico da empresa.', '...', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('telefone_1', 'Telefone 1.', '...', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('telefone_2', 'Telefone 2.', '...', NOW(), NOW()); 

INSERT INTO `configuracoes` (`pin`, `descricao`, `conteudo`, `created`, `modified`)
VALUES ('json_configuracao_smtp', 'Configurações SMTP (json).', '', NOW(), NOW()); 

-- -----------------------------------------------------
-- Table `banner_tipos`
-- -----------------------------------------------------
DELETE FROM `banner_tipos`;

INSERT INTO `banner_tipos` (`pin`, `tipo`, `created`, `modified`)
VALUES ('barra_lateral_topo', 'Barra Lateral - Topo', NOW(), NOW()); 

INSERT INTO `banner_tipos` (`pin`, `tipo`, `created`, `modified`)
VALUES ('barra_lateral_meio', 'Barra Lateral - Meio', NOW(), NOW()); 

INSERT INTO `banner_tipos` (`pin`, `tipo`, `created`, `modified`)
VALUES ('barra_lateral_abaixo', 'Barra Lateral - Abaixo', NOW(), NOW());

INSERT INTO `banner_tipos` (`pin`, `tipo`, `created`, `modified`)
VALUES ('centro', 'Centro', NOW(), NOW());

INSERT INTO `banner_tipos` (`pin`, `tipo`, `created`, `modified`)
VALUES ('capa', 'Capa', NOW(), NOW());

-- -----------------------------------------------------
-- Table `paginas`
-- -----------------------------------------------------
DELETE FROM `paginas`;

INSERT INTO `paginas` (`pin`, `titulo`, `texto`, `ativo`, `created`, `modified`)
VALUES ('a-empresa', 'A Empresa', 'A empresa...', '1', NOW(), NOW());

-- -----------------------------------------------------
-- Table `estruturas`
-- -----------------------------------------------------
DELETE FROM `estruturas`;

-- Menu no Topo com Barra Lateral
INSERT INTO `estruturas` (`pin`,	`nome`, 				`created`, 	`modified`,	`usa_barra_lateral`,	`usa_rodape`, 	`cor_fonte_texto`, 	`cor_bg_html`,	`cor_bg_topo`,	`cor_bg_rodape`,	`cor_texto_rodape`, 	`img_bg_html_repeat`, 	`posicao_menu`,	`menu_degade`,	`cor_bg_menu`, `cor_fonte_menu`,	`mostrar_noticias_capa`,	`qtde_noticias_capa`,	`mostrar_noticias_lateral`,	`qtde_noticias_lateral`,	`mostrar_produtos_capa`,	`qtde_produtos_capa`,	`mostrar_produtos_lateral`,	`qtde_produtos_lateral`,	`img_bg_html`,								`cor_titulo`,	`img_bg_topo`, `keywords`,	`description`,	`author`,	`tamanho_centro`,	`telefone`)
				VALUES ('ep_01',	'Layout Padrão 01', 		NOW(), 		NOW(), 	'1', 					'1', 			'#333333', 			'#EBEBEB', 		'#565656',		'#565656', 			'#FFFFFF',				'repeat-x', 			'1', 			'0', 			'#444444', 		'#FFFFFF',			'1',						'3',					'1',						'3',						'1',						'6',					'1',						'3',						'img/layouts_padroes/ep_01/bg_html.png',	'#777777',		NULL,			NULL,		NULL,			NULL,		'medio',			NULL);

INSERT INTO `estruturas` (`pin`,	`nome`, 				`created`, 	`modified`,	`usa_barra_lateral`,	`usa_rodape`, 	`cor_fonte_texto`, 	`cor_bg_html`,	`cor_bg_topo`,	`cor_bg_rodape`,	`cor_texto_rodape`, 	`img_bg_html_repeat`, 	`posicao_menu`,	`menu_degade`,	`cor_bg_menu`, `cor_fonte_menu`,	`mostrar_noticias_capa`,	`qtde_noticias_capa`,	`mostrar_noticias_lateral`,	`qtde_noticias_lateral`,	`mostrar_produtos_capa`,	`qtde_produtos_capa`,	`mostrar_produtos_lateral`,	`qtde_produtos_lateral`,	`img_bg_html`,	`cor_titulo`,	`img_bg_topo`, 									`keywords`,	`description`,	`author`,	`tamanho_centro`,	`telefone`)
				VALUES ('ep_02',	'Layout Padrão 02', 		NOW(), 		NOW(), 	'1', 					'1', 			'#333333', 			'#EBEBEB', 		'#DB8b00',		'#D37C39', 			'#FFFFFF',				'repeat-x', 			'2', 			'0', 			'#FFFFFF', 		'#DB8b00',			'1',						'3',					'1',						'3',						'1',						'4',					'1',						'3',						NULL,			'#DB8b00',		'img/layouts_padroes/ep_02/img_bg_topo.png',	NULL,		NULL,			NULL,		'pequeno',			NULL);
		

INSERT INTO `estruturas` (`pin`,	`nome`, 				`created`, 	`modified`,	`usa_barra_lateral`,	`usa_rodape`, 	`cor_fonte_texto`, 	`cor_bg_html`,	`cor_bg_topo`,	`cor_bg_rodape`,	`cor_texto_rodape`, 	`img_bg_html_repeat`, 	`posicao_menu`,	`menu_degade`,	`cor_bg_menu`, `cor_fonte_menu`,	`mostrar_noticias_capa`,	`qtde_noticias_capa`,	`mostrar_noticias_lateral`,	`qtde_noticias_lateral`,	`mostrar_produtos_capa`,	`qtde_produtos_capa`,	`mostrar_produtos_lateral`,	`qtde_produtos_lateral`,	`img_bg_html`,	`cor_titulo`,	`img_bg_topo`, 	`keywords`,	`description`,	`author`,	`tamanho_centro`,	`telefone`)
				VALUES ('ep_03',	'Layout Padrão 03', 		NOW(), 		NOW(), 	'0', 					'1', 			'#444444', 			'#FFFFFF', 		'#DBE2EA',		'#DBE2EA', 			'#444444',				'repeat-x', 			'1', 			'0', 			'#777777', 		'#FFFFFF',			'1',						'3',					'1',						'3',						'1',						'8',					'1',						'3',						NULL,			'#555555',		NULL,			NULL,		NULL,			NULL,		'grande',			NULL);



		
INSERT INTO `estruturas` (`pin`,	`nome`, 				`created`, 	`modified`,	`usa_barra_lateral`,	`usa_rodape`, 	`cor_fonte_texto`, 	`cor_bg_html`,	`cor_bg_topo`,	`cor_bg_rodape`,	`cor_texto_rodape`, 	`img_bg_html_repeat`, 	`posicao_menu`,	`menu_degade`,	`cor_bg_menu`, `cor_fonte_menu`,	`mostrar_noticias_capa`,	`qtde_noticias_capa`,	`mostrar_noticias_lateral`,	`qtde_noticias_lateral`,	`mostrar_produtos_capa`,	`qtde_produtos_capa`,	`mostrar_produtos_lateral`,	`qtde_produtos_lateral`,	`img_bg_html`,	`cor_titulo`,	`img_bg_topo`, 									`keywords`,	`description`,	`author`,	`tamanho_centro`,	`telefone`)
				VALUES ('ep_04',	'Layout Padrão 04', 		NOW(), 		NOW(), 	'1', 					'1', 			'#42658D', 			'#7699C1', 		'#42658D',		'#496C94', 			'#FFFFFF',				'repeat-x', 			'2', 			'0', 			'#FFFFFF', 		'#42658D',			'1',						'3',					'1',						'3',						'1',						'4',					'1',						'3',						NULL,			'#42658D',		'img/layouts_padroes/ep_03/img_bg_topo.png',	NULL,		NULL,			NULL,		'pequeno',			NULL);

				

				
				
				
-- Menu na Esquerda com Barra Lateral
--INSERT INTO `estruturas` (`pin`,	`nome`, 				`created`, 	`modified`,	`usa_barra_lateral`,	`usa_rodape`, 	`cor_fonte_texto`, 	`cor_bg_html`, 	`img_bg_html_repeat`, 	`posicao_menu`,	`menu_degade`,	`cor_bg_menu`, `cor_fonte_menu`,	`mostrar_noticias_capa`,	`qtde_noticias_capa`,	`mostrar_noticias_lateral`,	`qtde_noticias_lateral`,	`mostrar_produtos_capa`,	`qtde_produtos_capa`,	`mostrar_produtos_lateral`,	`qtde_produtos_lateral`,	`img_bg_html`,								`img_logo`,	`cor_titulo`,	`img_bg_topo`,	`keywords`,	`description`,	`author`,	`tamanho_centro`,	`telefone`)
				--VALUES ('ep_02',	'Estrutura Padrão 02', 	NOW(), 		NOW(), 		'1', 					'1', 			'#333333', 			'#FFFFFF', 		'repeat-x', 			'2', 			'0', 			'#444444', 		'#FFFFFF',			'1',						'5',					'1',						'3',						'1',						'5',					'1',						'3',						'img/layouts_padroes/ep_02/bg_html.png',	NULL,		'#777777',		NULL,			NULL,		NULL,			NULL,		'medio',			'<p>...</p>',			NULL);

-- Menu na Esquerda sem Barra Lateral
--INSERT INTO `estruturas` (`pin`,	`nome`, 				`created`, 	`modified`,	`usa_barra_lateral`,	`usa_rodape`, 	`cor_fonte_texto`, 	`cor_bg_html`, 	`img_bg_html_repeat`, 	`posicao_menu`,	`menu_degade`,	`cor_bg_menu`, `cor_fonte_menu`,	`mostrar_noticias_capa`,	`qtde_noticias_capa`,	`mostrar_noticias_lateral`,	`qtde_noticias_lateral`,	`mostrar_produtos_capa`,	`qtde_produtos_capa`,	`mostrar_produtos_lateral`,	`qtde_produtos_lateral`,	`img_bg_html`,								`img_logo`,	`cor_titulo`,	`img_bg_topo`,	`keywords`,	`description`,	`author`,	`tamanho_centro`,	`pagina_institucional`,	`telefone`)
--								  VALUES ('ep_03',	'Estrutura Padrão 03', 	NOW(), 		NOW(), 		'0', 					'1', 			'#333333', 			'#FFFFFF', 		'repeat-x', 			'2', 			'0', 			'#444444', 		'#FFFFFF',			'1',						'5',					'1',						'3',						'1',						'5',					'1',						'3',						'img/layouts_padroes/ep_03/bg_html.png',	NULL,		'#777777',		NULL,			NULL,		NULL,			NULL,		'medio',			'<p>...</p>',			NULL);

-- Menu no Topo sem Barra Lateral
--INSERT INTO `estruturas` (`pin`,	`nome`, 				`created`, 	`modified`,	`usa_barra_lateral`,	`usa_rodape`, 	`cor_fonte_texto`, 	`cor_bg_html`, 	`img_bg_html_repeat`, 	`posicao_menu`,	`menu_degade`,	`cor_bg_menu`, `cor_fonte_menu`,	`mostrar_noticias_capa`,	`qtde_noticias_capa`,	`mostrar_noticias_lateral`,	`qtde_noticias_lateral`,	`mostrar_produtos_capa`,	`qtde_produtos_capa`,	`mostrar_produtos_lateral`,	`qtde_produtos_lateral`,	`img_bg_html`,								`img_logo`,	`cor_titulo`,	`img_bg_topo`,	`keywords`,	`description`,	`author`,	`tamanho_centro`,	`pagina_institucional`,	`telefone`)
--								  VALUES ('ep_04',	'Estrutura Padrão 04', 	NOW(), 		NOW(), 		'0', 					'1', 			'#333333', 			'#FFFFFF', 		'repeat-x', 			'1', 			'0', 			'#444444', 		'#FFFFFF',			'1',						'5',					'1',						'3',						'1',						'5',					'1',						'3',						'img/layouts_padroes/ep_04/bg_html.png',	NULL,		'#777777',		NULL,			NULL,		NULL,			NULL,		'medio',			'<p>...</p>',			NULL);

-- -----------------------------------------------------
-- Table `usuario_tipos`
-- -----------------------------------------------------
DELETE FROM `usuario_tipos`;

INSERT INTO `usuario_tipos` (`pin`, `tipo`, `created`, `modified`)
VALUES ('administrador', 'Administrador', NOW(), NOW()); 

INSERT INTO `usuario_tipos` (`pin`, `tipo`, `created`, `modified`)
VALUES ('restrito', 'Restrito', NOW(), NOW()); 