<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('Usuario', array('id' => 'form_usuario')); ?>
<fieldset>
    <?php
    echo $this->Form->input('nome', array('label' => 'Nome:', 'class' => 'obrigatorio'));
    echo $this->Form->input('email', array('label' => 'E-mail:', 'class' => 'obrigatorio'));
    echo $this->Form->input('usuario', array('label' => 'Usuário:', 'class' => 'obrigatorio'));
    echo $this->Form->input('tipo_id', array('label' => __('Tipo:'), 'type' => 'select', 'options' => $tipos, 'empty' => 'Selecione...', 'class' => 'obrigatorio'));
//        echo $this->Form->input('senha', array('label' => 'Senha:'));
//        echo $this->Form->input('confirmar_senha', array('label' => 'Confirmar senha:'));        
    ?>
</fieldset>
<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Deseja realmente cancelar?')); ?>
</div>

<script type="text/javascript">
    if ($('#form_usuario').length) {        
        $('#UsuarioNome').focus();        
        $('#form_usuario').validate({
            rules: {
                'data[Usuario][nome]': 'required',
                'data[Usuario][email]': {                                
                    required : true,
                    email : true
                },                
                'data[Usuario][usuario]': 'required',
                'data[Usuario][tipo_id]': 'required'
            },
            messages: {
                'data[Usuario][nome]': 'Informe o nome do usuário.',
                'data[Usuario][email]': {
                    required: 'Informe o e-mail.',
                    email: 'E-mail inválido.'
                },
                'data[Usuario][usuario]': 'Informe o usuário para login.',
                'data[Usuario][tipo_id]': 'Informe o tipo do usuário.'
            }
        });        
    }                
</script>