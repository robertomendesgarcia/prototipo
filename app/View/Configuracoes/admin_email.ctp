<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Configuracao', array('type' => 'file', 'class' => 'form_email', 'id' => 'configura_email')); ?>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php // echo $this->Form->create('Email', array('id' => 'configura_email')); ?>
<fieldset>
    <?php
    echo $this->Form->input('smtp', array('label' => 'Smtp:', 'class' => 'obrigatorio'));
    echo $this->Form->input('nome', array('label' => 'Nome:', 'class' => 'obrigatorio'));
    echo $this->Form->input('email', array('label' => 'Email:', 'class' => 'obrigatorio'));
    echo $this->Form->input('usuario', array('label' => 'Usu&aacute;rio:', 'class' => 'obrigatorio'));
    echo $this->Form->input('senha', array('label' => 'Senha:', 'type' => 'password', 'class' => 'obrigatorio'));
    echo $this->Form->input('porta', array('label' => 'Porta:', 'class' => 'obrigatorio'));
    ?>
</fieldset>
<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => $this->params['action'], 'email'), array('class' => 'cancelar'), __('Deseja realmente cancelar?')); ?>
</div>

<script type="text/javascript">
    if ($('#configura_email').length) {        
        $('#EmailSmtp').focus();        
        $('#configura_email').validate({
            rules: {
                'data[Configuracao][smtp]': 'required',
                'data[Configuracao][nome]': 'required',
                'data[Configuracao][email]': {                                
                    required : true,
                    email : true
                },
                'data[Configuracao][usuario]': 'required',
                'data[Configuracao][senha]': 'required',
                'data[Configuracao][porta]': 'required'
            },
            messages: {
                'data[Configuracao][smtp]': 'Informe o smtp do e-mail.',
                'data[Configuracao][nome]': 'Informe o nome do e-mail.',
                'data[Configuracao][email]': {
                    required: 'Informe o e-mail.',
                    email: 'E-mail inválido.'
                },
                'data[Configuracao][usuario]': 'Informe o usuário do e-mail.',
                'data[Configuracao][senha]': 'Informe a senha do e-mail.',
                'data[Configuracao][porta]': 'Informe a porta do e-mail.'                            
            }
        });        
    }                
</script>