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
        <link href="<?php echo DEFAULT_URL; ?>js/uniform/css/uniform.default.css" media="all" rel="stylesheet" type="text/css" charset="utf-8" />        
        <link href="<?php echo DEFAULT_URL; ?>css/reset.css" media="all" rel="stylesheet" type="text/css" />
        <link href="<?php echo DEFAULT_URL; ?>css/geral.css" media="all" rel="stylesheet" type="text/css" />
        <link href="<?php echo DEFAULT_URL; ?>css/admin.css" media="all" rel="stylesheet" type="text/css" />
        <?php
        $arquivo_css = "./css/" . $this->params["controller"] . ".css";
        if (file_exists($arquivo_css)) {
            echo "<link href='" . DEFAULT_URL . $arquivo_css . "' media='all' rel='stylesheet' type='text/css' />";
        }
        ?>
    </head>
    <body id="c-<?php echo $this->params["controller"]; ?>" class="a-<?php echo $this->params["action"]; ?>">

        <?php echo $this->Session->flash("auth"); ?>

        <div id="topo" class="janela">

        </div>

        <div id="conteudo">
            <?php echo $content_for_layout; ?>
        </div>

        <div id="rodape" class="janela">

        </div>

        <script type="text/javascript">
            var DEFAULT_URL = '<?php echo DEFAULT_URL; ?>';
            $(document).ready(function(){
                $("select, input, button, textarea").uniform(); 	
            });
        </script>
    </body>
</html>
