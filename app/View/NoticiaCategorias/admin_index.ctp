<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('New Category'), array('action' => 'add'), array('class' => 'botao')); ?></li>
    </ul>
</div>
<?php // echo $this->element("filtro");  ?>

<?php // echo $this->element('paginacao_contador'); ?>

<table cellpadding="0" cellspacing="0" class="listagem">
    <tr>
        <th><?php echo __('Category'); ?></th>
        <th><?php echo __('Active'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($categorias as $key => $value) { ?>
        <tr>
            <td><?php echo $value; ?></td>
            <td class="centralizado"><?php echo ($ativos[$key] == 1) ? __('Yes') : __('No'); ?></td>
            <td class="acoes">
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $key), array('class' => 'editar')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $key), array('class' => 'excluir'), __('Deseja realmente excluir?')); ?>
            </td>
        </tr>
    <?php } ?>
</table>

<?php
// echo $this->element('paginacao'); ?>