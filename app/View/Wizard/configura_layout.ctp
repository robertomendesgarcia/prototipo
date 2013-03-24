<?php echo $this->Form->create('Layout'); ?>

<fieldset class="passo_1">

    <h3>Passo 1: escolha o layout desejado.</h3>

    <?php
    echo $this->Form->input('layout', array(
        'type' => 'radio',
        'options' => array('layout 1', 'layout 2', 'layout 3', 'layout 4')
    ));
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php // echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this news?')); ?>
</div>