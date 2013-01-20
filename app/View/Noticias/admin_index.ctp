<h2><?php echo __('Noticias'); ?></h2>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Noticia'), array('action' => 'add')); ?></li>
    </ul>
</div>

<?php echo $this->element("filtro"); ?>

<?php echo $this->element('paginacao_contador'); ?>

<table cellpadding="0" cellspacing="0">
    <tr>
        <th><?php echo $this->Paginator->sort('id'); ?></th>
        <th><?php echo $this->Paginator->sort('titulo'); ?></th>
        <th><?php echo $this->Paginator->sort('texto'); ?></th>
        <th><?php echo $this->Paginator->sort('fonte'); ?></th>
        <th><?php echo $this->Paginator->sort('data'); ?></th>
        <th><?php echo $this->Paginator->sort('ativo'); ?></th>
        <th><?php echo $this->Paginator->sort('categoria_id'); ?></th>
        <th><?php echo $this->Paginator->sort('created'); ?></th>
        <th><?php echo $this->Paginator->sort('modified'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($noticias as $noticia): ?>
        <tr>
            <td><?php echo h($noticia['Noticia']['id']); ?>&nbsp;</td>
            <td><?php echo h($noticia['Noticia']['titulo']); ?>&nbsp;</td>
            <td><?php echo h($noticia['Noticia']['texto']); ?>&nbsp;</td>
            <td><?php echo h($noticia['Noticia']['fonte']); ?>&nbsp;</td>
            <td><?php echo h($noticia['Noticia']['data']); ?>&nbsp;</td>
            <td><?php echo h($noticia['Noticia']['ativo']); ?>&nbsp;</td>
            <td>
                <?php echo $this->Html->link($noticia['NoticiaCategoria']['nome'], array('controller' => 'noticia_categorias', 'action' => 'view', $noticia['NoticiaCategoria']['id'])); ?>
            </td>
            <td><?php echo h($noticia['Noticia']['created']); ?>&nbsp;</td>
            <td><?php echo h($noticia['Noticia']['modified']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $noticia['Noticia']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $noticia['Noticia']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $noticia['Noticia']['id']), null, __('Are you sure you want to delete # %s?', $noticia['Noticia']['id'])); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php echo $this->element('paginacao'); ?>