<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
    <head>
        <title><?php echo $title_for_layout; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="pt-br" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Ederson Micheleto, Ramires Oliveira, Roberto Mendes Garcia" />
        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/jquery-ui.js"></script>
        <link href="<?php echo DEFAULT_URL; ?>css/geral.css" media="all" rel="stylesheet" type="text/css" />
        <link href="<?php echo DEFAULT_URL; ?>css/instalador.css" media="all" rel="stylesheet" type="text/css" />
    </head>
    <body id="<?php echo $this->params['controller']; ?>" class="<?php echo $this->params['action']; ?>">

        <div id="topo">
            
                <?php /* <ul>
                for ($i = 1; $i < 4; $i++) {
                    $aba_ativa = ($this->params['action'] == 'passo' . $i) ? 'class="ativa"' : null;
                    echo '<li ' . $aba_ativa . '>';
                    echo '<a href="' . DEFAULT_URL . 'instalador/passo' . $i . '" title="Passo ' . $i . '">Passo ' . $i . '</a>';
                    echo '</li>'; </ul>
                } */ 
                ?>
            
        </div>

        <div id="conteudo" class="janela">
            <?php echo $content_for_layout; ?>
        </div>

        <div id="rodape">

        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#tabs").tabs({
                    collapsible: false
                });
            });
        </script>
    </body>
</html>
