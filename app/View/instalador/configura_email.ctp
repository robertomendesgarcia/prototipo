<?php echo $this->Form->create('Email'); ?>
<fieldset>

	<legend><?php echo __('Configurar Email'); ?></legend>

	<?php
	echo $this->Form->input('smtp', array('label' => 'Smtp:'));
	echo $this->Form->input('nome', array('label' => 'Nome:'));
	echo $this->Form->input('email', array('label' => 'Email:'));
	echo $this->Form->input('usuario', array('label' => 'Usu&aacute;rio:'));
	echo $this->Form->input('senha', array('label' => 'Senha:'));
	echo $this->Form->input('porta', array('label' => 'Porta:'));
	
	
	
	?>
</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>