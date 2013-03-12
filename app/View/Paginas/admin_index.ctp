<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('New Page'), array('action' => 'add'), array('class' => 'botao')); ?></li>
    </ul>
</div>


<table cellpadding="0" cellspacing="0" class="listagem">
    <tr>
        <th><?php echo $this->Paginator->sort('pin'); ?></th>
        <th><?php echo $this->Paginator->sort('titulo'); ?></th>
        <th><?php echo $this->Paginator->sort('ativo'); ?></th>
        <th><?php echo $this->Paginator->sort('modified'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($paginas as $pagina) { ?>
        <tr>
            <td class="centralizado"><?php echo h($pagina['Pagina']['pin']); ?></td>
            <td><?php echo h($pagina['Pagina']['titulo']); ?></td>
            <td class="centralizado"><?php echo ($pagina['Pagina']['ativo'] == 1) ? __('Yes') : __('No'); ?></td>
            <td class="centralizado"><?php echo date("d/m/Y", strtotime($pagina['Pagina']['modified'])); ?></td>
            <td class="acoes_3_botoes">
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pagina['Pagina']['id']), array('class' => 'editar')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pagina['Pagina']['id']), array('class' => 'excluir'), __('Are you sure you want to delete this page?')); ?>
            </td>
        </tr>
    <?php }; ?>
</table>