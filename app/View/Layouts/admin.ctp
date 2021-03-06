<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
    <head>
        <title><?php echo $title_for_layout; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="pt-br" />
        <meta name="description" content="Protótipo para o Trabalho de Conculão de Curso - ESUCRI - Segundo semestre de 2013" />
        <meta name="keywords" content="" />
        <meta name="author" content="Ederson Micheleto, Ramores Oliveira, Roberto Mendes Garcia" />

        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/jquery-ui/js/jquery-ui-1.10.0.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/masked-input/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/geral_admin.js?"></script>

        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/jquery.flash.js"></script>

        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/jquery-validation-1.11.0/dist/jquery.validate.min.js"></script>  

        <link href="<?php echo DEFAULT_URL; ?>js/shadowbox-3.0.3/shadowbox.css" media="all" rel="stylesheet" type="text/css" charset="utf-8" />     
        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/shadowbox-3.0.3/shadowbox.js"></script>

        <link href="<?php echo DEFAULT_URL; ?>js/uniform/css/uniform.default.css" media="all" rel="stylesheet" type="text/css" charset="utf-8" />        
        <link href="<?php echo DEFAULT_URL; ?>js/jquery-ui/css/smoothness/jquery-ui-1.10.0.custom.min.css" media="all" rel="stylesheet" type="text/css" charset="utf-8" />        
        <link href="<?php echo DEFAULT_URL; ?>css/reset.css" media="all" rel="stylesheet" type="text/css" />
        <link href="<?php echo DEFAULT_URL; ?>css/admin.css" media="all" rel="stylesheet" type="text/css" />

        <?php
//        $arquivo_css = "./css/" . $this->params["controller"] . ".css";
//        if (file_exists($arquivo_css)) {
//            echo "<link href='" . DEFAULT_URL . $arquivo_css . "' media='all' rel='stylesheet' type='text/css' />";
//        }
        ?>

        <?php if (in_array($this->params["controller"], array('noticias', 'paginas', 'configuracoes')) && (in_array($this->params["action"], array('admin_add', 'admin_edit', 'admin_config')))) { ?>
            <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/ckeditor/ckeditor.js"></script>
            <!-- script type="text/javascript" src="<?php // echo DEFAULT_URL;   ?>js/uploadify/jquery.uploadify.min.js"></script -->
            <!-- link href="<?php // echo DEFAULT_URL;   ?>js/uploadify/uploadify.css" media="all" rel="stylesheet" type="text/css" charset="utf-8" / -->          
        <?php } ?>

        <?php if ($this->params["controller"] == 'configuracoes') { ?>
            <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/colorpicker/js/colorpicker.js"></script>
            <link href="<?php echo DEFAULT_URL; ?>js/colorpicker/css/colorpicker.css" media="all" rel="stylesheet" type="text/css" charset="utf-8" />          
        <?php } ?>

    </head>
    <body id="c-<?php echo $this->params["controller"]; ?>" class="a-<?php echo $this->params["action"]; ?>">

        <?php echo $this->Session->flash("admin"); ?>
        <?php echo $this->Session->flash("flash"); ?>

        <div id="topo">
            <div class="esquerda">
                <?php
                $titulo = explode('-', $title_for_layout);
//                pr($titulo); 
                ?>
                <h2><?php echo trim($titulo[0]); ?></h2>
                <?php echo $this->element('breadcrumbs'); ?>
            </div>
            <ul>
                <li class="logout">
                    <a href="<?php echo DEFAULT_URL; ?>logout" class="logout" title="<?php echo __('Logout'); ?>">
                        <?php echo __('Logout'); ?>
                    </a>
                </li>
            </ul>
        </div>

        <div id="conteudo" class="clearfix">

            <?php echo $this->element('menu_admin'); ?>

            <div id="centro">
                <?php echo $content_for_layout; ?>
            </div>
        </div>

        <div id="rodape">

        </div>

        <script type="text/javascript">
            var DEFAULT_URL = '<?php echo DEFAULT_URL; ?>';
        </script>
    </body>
</html>
