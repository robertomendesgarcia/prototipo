<?php echo $this->Form->create('Usuario'); ?>

<fieldset>
    
    <legend><?php echo __('Add User'); ?></legend>
    
        <?php
        echo $this->Form->input('nome', array('label' => 'Nome:'));
        echo $this->Form->input('email', array('label' => 'Email:'));
        echo $this->Form->input('usuario', array('label' => 'Usuário:'));
        echo $this->Form->input('senha', array('label' => 'Senha:'));
        echo $this->Form->input('confirmar_senha', array('label' => 'Confirmar senha:'));
        
        
        ?>
    </fieldset>

<?php echo $this->Form->end(__('Submit')); ?>
