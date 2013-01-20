<div class="noticias view">
<h2><?php  echo __('Noticia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($noticia['Noticia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($noticia['Noticia']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Texto'); ?></dt>
		<dd>
			<?php echo h($noticia['Noticia']['texto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fonte'); ?></dt>
		<dd>
			<?php echo h($noticia['Noticia']['fonte']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($noticia['Noticia']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($noticia['Noticia']['ativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Noticia Categoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($noticia['NoticiaCategoria']['nome'], array('controller' => 'noticia_categorias', 'action' => 'view', $noticia['NoticiaCategoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($noticia['Noticia']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($noticia['Noticia']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Noticia'), array('action' => 'edit', $noticia['Noticia']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Noticia'), array('action' => 'delete', $noticia['Noticia']['id']), null, __('Are you sure you want to delete # %s?', $noticia['Noticia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Noticias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Noticia'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Noticia Categorias'), array('controller' => 'noticia_categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Noticia Categoria'), array('controller' => 'noticia_categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Noticia Comentarios'), array('controller' => 'noticia_comentarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Noticia Comentario'), array('controller' => 'noticia_comentarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Noticia Imagens'), array('controller' => 'noticia_imagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Noticia Imagen'), array('controller' => 'noticia_imagens', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Noticia Comentarios'); ?></h3>
	<?php if (!empty($noticia['NoticiaComentario'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Comentario'); ?></th>
		<th><?php echo __('Autor'); ?></th>
		<th><?php echo __('Noticia Id'); ?></th>
		<th><?php echo __('Noticia Comentario Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($noticia['NoticiaComentario'] as $noticiaComentario): ?>
		<tr>
			<td><?php echo $noticiaComentario['id']; ?></td>
			<td><?php echo $noticiaComentario['comentario']; ?></td>
			<td><?php echo $noticiaComentario['autor']; ?></td>
			<td><?php echo $noticiaComentario['noticia_id']; ?></td>
			<td><?php echo $noticiaComentario['noticia_comentario_id']; ?></td>
			<td><?php echo $noticiaComentario['created']; ?></td>
			<td><?php echo $noticiaComentario['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'noticia_comentarios', 'action' => 'view', $noticiaComentario['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'noticia_comentarios', 'action' => 'edit', $noticiaComentario['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'noticia_comentarios', 'action' => 'delete', $noticiaComentario['id']), null, __('Are you sure you want to delete # %s?', $noticiaComentario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Noticia Comentario'), array('controller' => 'noticia_comentarios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Noticia Imagens'); ?></h3>
	<?php if (!empty($noticia['NoticiaImagen'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Noticia Id'); ?></th>
		<th><?php echo __('Titulo'); ?></th>
		<th><?php echo __('Destaque'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($noticia['NoticiaImagen'] as $noticiaImagen): ?>
		<tr>
			<td><?php echo $noticiaImagen['id']; ?></td>
			<td><?php echo $noticiaImagen['noticia_id']; ?></td>
			<td><?php echo $noticiaImagen['titulo']; ?></td>
			<td><?php echo $noticiaImagen['destaque']; ?></td>
			<td><?php echo $noticiaImagen['created']; ?></td>
			<td><?php echo $noticiaImagen['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'noticia_imagens', 'action' => 'view', $noticiaImagen['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'noticia_imagens', 'action' => 'edit', $noticiaImagen['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'noticia_imagens', 'action' => 'delete', $noticiaImagen['id']), null, __('Are you sure you want to delete # %s?', $noticiaImagen['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Noticia Imagen'), array('controller' => 'noticia_imagens', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
