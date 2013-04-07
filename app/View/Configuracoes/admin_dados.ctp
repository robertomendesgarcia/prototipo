<?php
//$titulo = explode(' - ', $title_for_layout);
//$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Configuracao', array('type' => 'file', 'class' => 'form_dados', 'id' => 'configura_dados')); ?>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<fieldset class="passo_3">

    <?php
    echo $this->Form->input('titulo_site', array(
        'label' => 'Título do Site:',
        'type' => 'text',
        'class' => 'obrigatorio'
    ));
    echo $this->Form->input('slogan', array(
        'label' => 'Slogan para o Site:',
        'type' => 'text',
    ));
    echo $this->Form->input('email_contato', array(
        'label' => 'E-mail para Contato:',
        'type' => 'text',
        'class' => 'obrigatorio'
    ));
    echo $this->Form->input('endereco_fisico_empresa', array(
        'label' => 'Endere&ccedil;o Físico da Empresa:',
        'type' => 'textarea',
    ));
    echo $this->Form->input('img_logo', array(
        'label' => 'Logo para o Site (imagens ' . implode(', ', $img) . '):',
        'type' => 'file',
    ));
    if (file_exists($this->data['Configuracao']['img_logo'])) {
        echo "<div class='input logo_atual'>";
        echo $this->Form->label('Logo Atual:');
        echo $this->PhpThumb->thumbnail($this->data['Configuracao']['img_logo'], array(
            'w' => 100, 'zc' => 1
        ));
        echo "</div>";
    }
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'config', 'dados'), array('class' => 'cancelar'), __('Deseja realmente cancelar?')); ?>
</div>


<script type="text/javascript">
    if ($('#configura_dados').length) {        
        $('#ConfiguracaoTituloSite').focus();        
        $('#configura_dados').validate({
            rules: {
                'data[Configuracao][titulo_site]': 'required',
                'data[Configuracao][email_contato]': {                                
                    required : true,
                    email : true
                }
            },
            messages: {
                'data[Configuracao][titulo_site]': 'Informe o título do site.',
                'data[Configuracao][email_contato]': {
                    required: 'Informe o e-mail para contato.',
                    email: 'E-mail inválido.'
                }                        
            }
        });        
    }    
</script>