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
        <!-- <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/uniform/jquery.uniform.min.js"></script> //-->
        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/jquery-validation-1.11.0/dist/jquery.validate.min.js"></script>  
        <link href="<?php echo DEFAULT_URL; ?>js/uniform/css/uniform.default.css" media="all" rel="stylesheet" type="text/css" charset="utf-8" />        
        <link href="<?php echo DEFAULT_URL; ?>css/reset.css" media="all" rel="stylesheet" type="text/css" />
        <link href="<?php echo DEFAULT_URL; ?>css/admin.css" media="all" rel="stylesheet" type="text/css" />
    </head>
    <body id="c-<?php echo $this->params["controller"]; ?>" class="a-<?php echo $this->params["action"]; ?>">

        <?php echo $this->Session->flash("admin"); ?>
        <?php echo $this->Session->flash(); ?>

        <div id="topo">
            <div class="esquerda">
                <?php $titulo = explode('-', $title_for_layout); ?>
                <h2><?php echo trim($titulo[0]); ?></h2>
                <?php // echo $this->element('breadcrumbs'); ?>
            </div>
            <ul class="choose_language">
                <li class="lang_portuguese">
                    <a href="<?php echo DEFAULT_URL; ?>choose-language/pt-br" title="<?php echo __('Portuguese'); ?>"><?php echo __('Portuguese'); ?></a>
                </li>
                <li class="lang_english">
                    <a href="<?php echo DEFAULT_URL; ?>choose-language/en-us" title="<?php echo __('English'); ?>"><?php echo __('English'); ?></a>
                </li>
            </ul>
        </div>

        <div id="conteudo">
            <?php echo $content_for_layout; ?>
        </div>

        <div id="rodape">

        </div>

        <script type="text/javascript">
            var DEFAULT_URL = '<?php echo DEFAULT_URL; ?>';
            
            $('#adminMessage a').on('click', function(event){
                $('#adminMessage').fadeOut();
                event.preventDefault();
            });
            
            $(document).ready(function(){
                //                $('select, input, button, textarea, a.botao').not('input:file').uniform(); 	
                //                $('#UsuarioUsuario').focus();
                if ($('body#c-usuarios.a-login').length) {        
                    $('#UsuarioUsuario').focus();        
                    $('#UsuarioLoginForm').validate({
                        rules: {
                            'data[Usuario][usuario]': 'required',
                            'data[Usuario][senha]': 'required'
                        },
                        messages: {
                            'data[Usuario][usuario]': 'Informe seu usuário.',
                            'data[Usuario][senha]': 'Informe sua senha.'
                        }
                    });        
                }
                
                if ($('body#c-usuarios.a-esqueci_meu_usuario_senha').length) {        
                    $('#UsuarioEmail').focus();        
                    $('#UsuarioEsqueciMeuUsuarioSenhaForm').validate({
                        rules: {
                            'data[Usuario][email]': {
                                required: true,
                                email: true
                            }
                        },
                        messages: {
                            'data[Usuario][email]': {
                                required: 'Informe seu e-mail.',
                                email: 'E-mail inválido.'
                            }
                        }
                    });        
                }
                
                
            });
        </script>
    </body>
</html>
