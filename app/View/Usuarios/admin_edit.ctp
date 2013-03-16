<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Usuario'); ?>
<fieldset>
    <?php
    echo $this->Form->input('nome', array('label' => 'Nome:'));
    echo $this->Form->input('email', array('label' => 'E-mail:'));
    echo $this->Form->input('usuario', array('label' => 'Usuário:'));
    echo $this->Form->input('tipo_id', array('label' => __('Tipo:'), 'type' => 'select', 'options' => $tipos, 'empty' => 'Selecione...'));
//        echo $this->Form->input('senha', array('label' => 'Senha:'));
//        echo $this->Form->input('confirmar_senha', array('label' => 'Confirmar senha:'));        
    ?>
</fieldset>
<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Deseja realmente cancelar este usuário?')); ?>
</div>
