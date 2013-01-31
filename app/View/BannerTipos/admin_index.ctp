<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('New Type'), array('action' => 'add'), array('class' => 'botao')); ?></li>
    </ul>
</div>

<?php // echo $this->element("filtro"); ?>

<?php echo $this->element('paginacao_contador'); ?>

<table cellpadding="0" cellspacing="0" class="listagem">
    <tr>
        <th><?php echo $this->Paginator->sort('tipo'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($bannerTipos as $bannerTipo) { ?>
        <tr>
            <td><?php echo h($bannerTipo['BannerTipo']['tipo']); ?></td>
            <td class="acoes">
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bannerTipo['BannerTipo']['id']), array('class' => 'botao')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bannerTipo['BannerTipo']['id']), array('class' => 'botao'), __('Are you sure you want to delete this type?', $bannerTipo['BannerTipo']['id'])); ?>
            </td>
        </tr>
    <?php }; ?>
</table>

<?php echo $this->element('paginacao'); ?>