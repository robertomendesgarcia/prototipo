<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('New Banner'), array('action' => 'add'), array('class' => 'botao', 'title' => __('New Banner'))); ?></li>
    </ul>
</div>

<?php // echo $this->element("filtro"); ?>

<table cellpadding="0" cellspacing="0" class="listagem">
    <tr>
        <th><?php echo $this->Paginator->sort('descricao'); ?></th>
        <th><?php echo $this->Paginator->sort('ativo'); ?></th>
        <th><?php echo $this->Paginator->sort('banner_tipo_id'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($banners as $banner) { ?>
        <tr>
            <td><?php echo h($banner['Banner']['descricao']); ?></td>
            <td class="centralizado"><?php echo ($banner['Banner']['ativo'] == 1) ? __('Yes') : __('No'); ?></td>
            <td class="centralizado"><?php echo h($banner['BannerTipo']['tipo']); ?></td>
            <td class="acoes">
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $banner['Banner']['id']), array('class' => 'editar', 'title' => __('Edit'))); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $banner['Banner']['id']), array('class' => 'excluir', 'title' => __('Delete')), __('Deseja realmente excluir?', $banner['Banner']['id'])); ?>
            </td>
        </tr>
    <?php }; ?>
</table>

<?php echo $this->element('paginacao'); ?>