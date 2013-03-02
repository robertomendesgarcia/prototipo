<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('New User'), array('action' => 'add'), array('class' => 'botao')); ?></li>
    </ul>
</div>

<?php echo $this->element('filtro'); ?>

<table cellpadding="0" cellspacing="0" class="listagem">
    <tr>
        <th><?php echo $this->Paginator->sort('nome'); ?></th>
        <th><?php echo $this->Paginator->sort('usuario'); ?></th>
        <th><?php echo $this->Paginator->sort('email'); ?></th>
        <th><?php echo $this->Paginator->sort('created'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($usuarios as $usuario) { ?>
        <tr>
            <td><?php echo h($usuario['Usuario']['nome']); ?></td>
            <td><?php echo h($usuario['Usuario']['usuario']); ?></td>
            <td><?php echo h($usuario['Usuario']['email']); ?></td>            
            <td class="centralizado"><?php echo date("d/m/Y", strtotime($usuario['Usuario']['created'])); ?></td>            
            <td class="acoes_3_botoes">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $usuario['Usuario']['id']), array('class' => 'botao')); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usuario['Usuario']['id']), array('class' => 'botao')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usuario['Usuario']['id']), array('class' => 'botao'), __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?>
            </td>
        </tr>
    <?php }; ?>
</table>

<?php echo $this->element('paginacao'); ?>