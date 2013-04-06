<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('Usuario', array('id' => 'form_alterar_senha')); ?>
<fieldset>
    <?php
    echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
echo $this->Form->input('senha_atual', array('label' => 'Senha atual:', 'type' => 'password', 'class' => 'obrigatorio'));
    echo $this->Form->input('nova_senha', array('label' => 'Nova senha:', 'type' => 'password', 'class' => 'obrigatorio'));
    echo $this->Form->input('confirmar_senha', array('label' => 'Confirmar nova senha:', 'type' => 'password', 'class' => 'obrigatorio'));
    ?>
</fieldset>
<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php // echo $this->Form->postLink(__('Cancel'), array('action' => 'alterar_senha'), array('class' => 'cancelar'), __('Deseja realmente cancelar?')); ?>
</div>

<script type="text/javascript">
    if ($('#form_alterar_senha').length) {        
        $('#UsuarioSenhaAtual').focus();        
        $('#form_alterar_senha').validate({
            rules: {
                'data[Usuario][senha_atual]': 'required',
                'data[Usuario][nova_senha]': 'required',
                'data[Usuario][confirmar_senha]': 'required'
            },
            messages: {
                'data[Usuario][senha_atual]': 'Informe a senha atual.',
                'data[Usuario][nova_senha]': 'Informe a nova senha.',
                'data[Usuario][confirmar_senha]': 'Confirme a nova senha.'                            
            }
        });        
    }                
</script>