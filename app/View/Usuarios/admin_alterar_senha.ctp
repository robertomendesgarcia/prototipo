<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('Usuario'); ?>
<fieldset>
    <?php
    echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
echo $this->Form->input('senha_atual', array('label' => 'Senha atual:', 'type' => 'password'));
    echo $this->Form->input('nova_senha', array('label' => 'Nova senha:', 'type' => 'password'));
    echo $this->Form->input('confirmar_senha', array('label' => 'Confirmar nova senha:', 'type' => 'password'));
    ?>
</fieldset>
<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php // echo $this->Form->postLink(__('Cancel'), array('action' => 'alterar_senha'), array('class' => 'cancelar'), __('Deseja realmente cancelar?')); ?>
</div>
