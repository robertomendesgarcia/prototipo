<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('New News'), array('action' => 'add'), array('class' => 'botao')); ?></li>
    </ul>
</div>

<?php echo $this->element('filtro'); ?>

<table cellpadding="0" cellspacing="0" class="listagem">
    <tr>
        <th><?php echo $this->Paginator->sort('titulo'); ?></th>
        <th><?php echo $this->Paginator->sort('data'); ?></th>
        <th><?php echo $this->Paginator->sort('ativo'); ?></th>
        <th><?php echo $this->Paginator->sort('categoria_id'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($noticias as $noticia) { ?>
        <tr>
            <td><?php echo h($noticia['Noticia']['titulo']); ?></td>
            <td class="centralizado"><?php echo date("d/m/Y", strtotime($noticia['Noticia']['data'])); ?></td>
            <td class="centralizado"><?php echo ($noticia['Noticia']['ativo'] == 1) ? __('Yes') : __('No'); ?></td>
            <td><?php echo $noticia['NoticiaCategoria']['nome']; ?></td>
            <td class="acoes_3_botoes">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $noticia['Noticia']['id']), array('class' => 'botao')); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $noticia['Noticia']['id']), array('class' => 'botao')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $noticia['Noticia']['id']), array('class' => 'botao'), __('Are you sure you want to delete # %s?', $noticia['Noticia']['id'])); ?>
            </td>
        </tr>
    <?php }; ?>
</table>

<?php echo $this->element('paginacao'); ?>