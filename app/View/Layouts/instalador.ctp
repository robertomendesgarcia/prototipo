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
        <!-- <link href="<?php echo DEFAULT_URL; ?>js/uniform/css/uniform.default.css" media="all" rel="stylesheet" type="text/css" charset="utf-8" />         -->
        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo DEFAULT_URL; ?>js/masked-input/jquery.maskedinput.min.js"></script>
        <link href="<?php echo DEFAULT_URL; ?>js/uniform/css/uniform.default.css" media="all" rel="stylesheet" type="text/css" charset="utf-8" />        
        <link href="<?php echo DEFAULT_URL; ?>css/reset.css" media="all" rel="stylesheet" type="text/css" />
        <link href="<?php echo DEFAULT_URL; ?>css/admin.css" media="all" rel="stylesheet" type="text/css" />
        <link href="<?php echo DEFAULT_URL; ?>css/instalador.css" media="all" rel="stylesheet" type="text/css" />
    </head>
    <body id="c-<?php echo $this->params["controller"]; ?>" class="a-<?php echo $this->params["action"]; ?>">

        <?php echo $this->Session->flash("admin"); ?>
        <?php echo $this->Session->flash(); ?>

        <div id="topo">
            <div class="esquerda">
                <?php $titulo = explode('-', $title_for_layout); ?>
                <h2><?php echo trim($titulo[0]); ?></h2>
                <?php echo $this->element('breadcrumbs'); ?>
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

            <div id="wrapper">
                <?php echo $content_for_layout; ?>

                <?php
                if ($this->params['action'] <> 'admin_wizard_concluido') {
                    echo $this->element('menu_passos');
                }
                ?>
            </div>

        </div>

        <div id="rodape">

        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                
                // $('form input').first().focus();

                $('#LayoutUsaTrabalheConosco').on('click', function(){
                    if ($(this).prop('checked')) {
                        $('#LayoutEmailTrabalheConosco').removeAttr('disabled').parent('div').removeClass('desabilitado');
                        $('#LayoutEmailTrabalheConosco').focus();
                    } else {
                        $('#LayoutEmailTrabalheConosco').attr('disabled', 'disabled').val('').parent('div').addClass('desabilitado');                        
                    }
                });
                
                $('input:file').uniform();
                
                $.each($('form input.obrigatorio'), function(index, value){
                    $(this).prev('label').append('<span class="requerido"> *</span>');
                });
                
                //                if ($('#menu_passos').length) {
                //                    $('#menu_passos').css('margin-top', ($('#wrapper').height() - 52) * -1);
                //                }                
                
                //                $("#tabs").tabs({
                //                    collapsible: false
                //                });
                if ($('body#c-instalador.a-index').length || $('body#c-instalador.a-configurabanco').length || $('body#c-instalador.a-configuraBanco').length) {        
                    $('#BancoHost').focus();        
                    $('#configura_banco').validate({
                        rules: {
                            'data[Banco][host]': 'required',
                            'data[Banco][login]': 'required',
                            'data[Banco][senha]': 'required',
                            'data[Banco][database]': 'required'
                        },
                        messages: {
                            'data[Banco][host]': 'Informe o host do banco.',
                            'data[Banco][login]': 'Informe o login do banco.',
                            'data[Banco][senha]': 'Informe a senha do banco.',
                            'data[Banco][database]': 'Informe a database para criar.'
                        }
                    });        
                }
                
                if ($('#configura_email').length) {        
                    $('#EmailSmtp').focus();        
                    $('#configura_email').validate({
                        rules: {
                            'data[Email][smtp]': 'required',
                            'data[Email][nome]': 'required',
                            'data[Email][email]': {                                
                                required : true,
                                email : true
                            },
                            'data[Email][usuario]': 'required',
                            'data[Email][senha]': 'required',
                            'data[Email][porta]': 'required'
                        },
                        messages: {
                            'data[Email][smtp]': 'Informe o smtp do e-mail.',
                            'data[Email][nome]': 'Informe o nome do e-mail.',
                            'data[Email][email]': {
                                required: 'Informe o e-mail.',
                                email: 'E-mail inválido.'
                            },
                            'data[Email][usuario]': 'Informe o usuário do e-mail.',
                            'data[Email][senha]': 'Informe a senha do e-mail.',
                            'data[Email][porta]': 'Informe a porta do e-mail.'                            
                        }
                    });        
                }
                
                if ($('#form_cria_usuario_adm').length) {        
                    $('#UsuarioNome').focus();        
                    $('#form_cria_usuario_adm').validate({
                        rules: {
                            'data[Usuario][nome]': 'required',
                            'data[Usuario][email]': {                                
                                required : true,
                                email : true
                            },                            
                            'data[Usuario][usuario]': 'required',                            
                            'data[Usuario][senha]': 'required',                            
                            'data[Usuario][confirmar_senha]': 'required'
                        },
                        messages: {
                            'data[Usuario][nome]': 'Informe o nome.',
                            'data[Usuario][email]': {
                                required: 'Informe o e-mail.',
                                email: 'E-mail inválido.'
                            },                            
                            'data[Usuario][usuario]': 'Informe o usuário.',                            
                            'data[Usuario][senha]': 'Informe a senha.',                            
                            'data[Usuario][confirmar_senha]': 'Confirme a senha.'                            
                        }
                    });        
                }
                
                //-- Wizard
                if ($('#form_selecao_layout').length) {
                    
                    $('#form_selecao_layout fieldset a').on('click', function(event){
                        $('#form_selecao_layout fieldset input:radio').removeAttr('checked');
                        $('#form_selecao_layout fieldset').removeClass('selecionado');                        
                        $(this).parent('fieldset').find('input:radio').attr('checked', 'true');
                        $(this).parent('fieldset').addClass('selecionado');
                        event.preventDefault();
                    });                    
                    
                }
                
                if ($('#form_configura_dados').length) {
                    $('#LayoutTelefone').mask('(99) 9999-9999');  
                    $('#LayoutTituloSite').focus();        
                    $('#form_configura_dados').validate({
                        rules: {
                            'data[Layout][titulo_site]': 'required',
                            'data[Layout][email_contato]': {                                
                                required : true,
                                email : true
                            }
                        },
                        messages: {
                            'data[Layout][titulo_site]': 'Informe o título do site.',
                            'data[Layout][email_contato]': {
                                required: 'Informe o e-mail para contato.',
                                email: 'E-mail inválido.'
                            }                          
                        }
                    });        
                }

            });
        </script>
    </body>
</html>
