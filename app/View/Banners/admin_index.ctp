<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('New Banner'), array('action' => 'add'), array('class' => 'botao')); ?></li>
    </ul>
</div>

<?php // echo $this->element("filtro"); ?>

<?php echo $this->element('paginacao_contador'); ?>

<table cellpadding="0" cellspacing="0" class="listagem">
    <tr>
        <th><?php echo $this->Paginator->sort('descricao'); ?></th>
        <th><?php echo $this->Paginator->sort('validade'); ?></th>
        <th><?php echo $this->Paginator->sort('banner_tipo_id'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($banners as $banner) { ?>
        <tr>
            <td><?php echo h($banner['Banner']['descricao']); ?></td>
            <td><?php echo date("d/m/Y", strtotime($banner['Banner']['validade'])); ?></td>
            <td><?php echo h($banner['Banner']['banner_tipo_id']); ?></td>
            <td class="acoes">
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $banner['Banner']['id']), array('class' => 'botao')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $banner['Banner']['id']), array('class' => 'botao'), __('Are you sure you want to delete this banner?', $banner['Banner']['id'])); ?>
            </td>
        </tr>
    <?php }; ?>
</table>

<?php echo $this->element('paginacao'); ?>