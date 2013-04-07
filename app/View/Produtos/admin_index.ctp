<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('New Product'), array('action' => 'add'), array('class' => 'botao')); ?></li>
    </ul>
</div>

<?php echo $this->element('filtro'); ?>

<table cellpadding="0" cellspacing="0" class="listagem">
    <tr>
        <th><?php echo $this->Paginator->sort('nome'); ?></th>
        <th><?php echo $this->Paginator->sort('valor'); ?></th>
        <th><?php echo $this->Paginator->sort('destaque'); ?></th>
        <th><?php echo $this->Paginator->sort('ativo'); ?></th>
        <th><?php echo $this->Paginator->sort('categoria_id'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($produtos as $produto) { ?>
        <tr>
            <td><?php echo $produto['Produto']['nome']; ?></td>
            <td class="centralizado"><?php echo $this->Number->currency($produto['Produto']['valor'], 'R$ '); ?></td>
            <td class="centralizado"><?php echo ($produto['Produto']['destaque'] == 1) ? __('Yes') : __('No'); ?></td>
            <td class="centralizado"><?php echo ($produto['Produto']['ativo'] == 1) ? __('Yes') : __('No'); ?></td>
            <td class="centralizado"><?php echo $produto['ProdutoCategoria']['nome']; ?></td>
            <td class="acoes_3_botoes">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $produto['Produto']['id']), array('class' => 'ver')); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $produto['Produto']['id']), array('class' => 'editar')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $produto['Produto']['id']), array('class' => 'excluir'), __('Deseja realmente excluir?', $produto['Produto']['id'])); ?>
            </td>
        </tr>
    <?php }; ?>
</table>

<?php echo $this->element('paginacao'); ?>