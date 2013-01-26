<?php
        print_r('<pre>');
        print_r($categorias);
        print_r('</pre>');
        exit;
?>




<h2><?php echo __('Categories for News'); ?></h2>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New News'), array('action' => 'add')); ?></li>
    </ul>
</div>

<?php // echo $this->element("filtro");  ?>

<?php echo $this->element('paginacao_contador'); ?>

<table cellpadding="0" cellspacing="0">
    <tr>
        <th><?php echo $this->Paginator->sort('nome'); ?></th>
        <th><?php echo $this->Paginator->sort('ativo'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($categorias as $categoria) { ?>
        <tr>
            <td><?php echo h($categoria['NoticiaCategoria']['nome']); ?></td>

            <td><?php echo h($categoria['NoticiaCategoria']['ativo']); ?></td>

            <td class="actions">
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $categoria['NoticiaCategoria']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $categoria['NoticiaCategoria']['id']), null, __('Are you sure you want to delete # %s?', $categoria['NoticiaCategoria']['id'])); ?>
            </td>
        </tr>
    <?php } ?>
</table>

<?php echo $this->element('paginacao'); ?>