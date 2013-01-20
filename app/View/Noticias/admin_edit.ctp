<div class="noticias form">
<?php echo $this->Form->create('Noticia'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Noticia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('titulo');
		echo $this->Form->input('texto');
		echo $this->Form->input('fonte');
		echo $this->Form->input('data');
		echo $this->Form->input('ativo');
		echo $this->Form->input('categoria_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Noticia.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Noticia.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Noticias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Noticia Categorias'), array('controller' => 'noticia_categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Noticia Categoria'), array('controller' => 'noticia_categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Noticia Comentarios'), array('controller' => 'noticia_comentarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Noticia Comentario'), array('controller' => 'noticia_comentarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Noticia Imagens'), array('controller' => 'noticia_imagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Noticia Imagen'), array('controller' => 'noticia_imagens', 'action' => 'add')); ?> </li>
	</ul>
</div>
