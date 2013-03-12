<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
    <head>
        <title><?php echo $title_for_layout; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="pt-br" />
        <meta name="description" content="<?php echo $config['description']; ?>" />
        <meta name="keywords" content="<?php echo $config['keywords']; ?>" />
        <meta name="author" content="<?php echo $config['author']; ?>" />

        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/jquery-1.8.3.js"></script>  
        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/jquery-validation-1.11.0/dist/jquery.validate.min.js"></script>  
        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/masked-input/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/geral_externo.js"></script>


        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>



        <link href="<?php echo DEFAULT_URL; ?>js/uniform/css/uniform.default.css" media="all" rel="stylesheet" type="text/css" charset="utf-8" />        
        <link href="<?php echo DEFAULT_URL; ?>css/geral_externo.css" media="all" rel="stylesheet" type="text/css" />


        <style type="text/css">
            #wrapper {
                background-color: <?php echo!empty($config['cor_bg_html']) ? $config['cor_bg_html'] : '#FFFFFF'; ?>;
            }            
            #wrapper p {
                color: <?php echo!empty($config['cor_fonte_texto']) ? $config['cor_fonte_texto'] : '#333333'; ?>;
            }            
            #wrapper h3 {
                color: <?php echo!empty($config['cor_titulo']) ? $config['cor_titulo'] : '#333333'; ?>;
            }

        </style>
    </head>
    <body id="c-<?php echo $this->params["controller"]; ?>" class="a-<?php echo $this->params["action"]; ?>">

        <div id="topo">
            <h1>
                <a href="<?php echo DEFAULT_URL; ?>" title="Capa">
                    <?php echo $config['titulo_site']; ?>
                </a>
            </h1>

            <?php
            if ($config['posicao_menu'] == 1) {
                echo $this->element('menu_externo', array('tipo' => $config['posicao_menu']));
            }
            ?>

        </div>

        <?php echo $this->Session->flash(); ?>

        <div id="conteudo">

            <?php
            if ($config['posicao_menu'] == 2) {
                echo $this->element('menu_externo', array('tipo' => $config['posicao_menu']));
            }
            ?>

            <div id="wrapper" class="<?php echo $config['tamanho_centro']; ?>">
                <?php echo $content_for_layout; ?>
            </div>

            <?php
            if ($config['usa_barra_lateral']) {
                echo $this->element('barra_lateral');
            }
            ?>

        </div>


        <?php
        if ($config['usa_rodape']) {
            echo $this->element('rodape');
        }
        ?>

        <script type="text/javascript">
            var DEFAULT_URL = '<?php echo DEFAULT_URL; ?>';
            
            
            //            $('#conteudo h3').css('color', '<?php echo $config['cor_titulo']; ?>');
            
            
            //            carregarMapa('Rua Joaquim Nabuco, Criciúma - SC');
            
            
        </script>
    </body>
</html>
