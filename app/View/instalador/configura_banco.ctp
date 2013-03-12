<?php echo $this->Form->create('Banco'); ?>
<fieldset>

	<legend><?php echo __('Configurar Banco'); ?></legend>

	<?php
	echo $this->Form->input('host', array('label' => 'Host:'));
	echo $this->Form->input('login', array('label' => 'Login:'));
	echo $this->Form->input('senha', array('label' => 'Senha:'));
	echo $this->Form->input('database', array('label' => 'Banco:'));
	
	
	
	?>
</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>