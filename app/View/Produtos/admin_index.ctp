<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('New Product'), array('action' => 'add'), array('class' => 'botao')); ?></li>
    </ul>
</div>

<table cellpadding="0" cellspacing="0" class="listagem">
    <tr>
        <th><?php echo $this->Paginator->sort('nome'); ?></th>
        <th><?php echo $this->Paginator->sort('descricao'); ?></th>
        <th><?php echo $this->Paginator->sort('valor'); ?></th>
        <th><?php echo $this->Paginator->sort('ativo'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($produtos as $produto) { ?>
        <tr>
            <td><?php echo $produto['Produto']['nome']; ?></td>
            <td><?php echo $produto['Produto']['descricao']; ?></td>
            <td><?php echo $this->Number->currency($produto['Produto']['valor'], 'R$ '); ?></td>
            <td><?php echo ($produto['Produto']['ativo'] == 1) ? __('Yes') : __('No'); ?></td>
            <td class="acoes_3_botoes">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $produto['Produto']['id']), array('class' => 'ver')); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $produto['Produto']['id']), array('class' => 'editar')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $produto['Produto']['id']), array('class' => 'excluir'), __('Are you sure you want to delete # %s?', $produto['Produto']['id'])); ?>
            </td>
        </tr>
    <?php }; ?>
</table>

<?php echo $this->element('paginacao'); ?>