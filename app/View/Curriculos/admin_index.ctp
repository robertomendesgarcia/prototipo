<?php // echo $this->element("filtro");  ?>

<?php // echo $this->element('paginacao_contador'); ?>

<table cellpadding="0" cellspacing="0" class="listagem">
    <tr>
        <th><?php echo $this->Paginator->sort('nome'); ?></th>
        <th><?php echo $this->Paginator->sort('email', 'E-mail'); ?></th>
        <th><?php echo $this->Paginator->sort('telefone'); ?></th>
        <th><?php echo $this->Paginator->sort('data', 'Data de Cadastro'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($curriculos as $curriculo) { ?>
        <tr>
            <td><?php echo h($curriculo['Curriculo']['nome']); ?></td>
            <td><?php echo h($curriculo['Curriculo']['email']); ?></td>
            <td><?php echo h($curriculo['Curriculo']['telefone']); ?></td>
            <td class="centralizado"><?php echo date("d/m/Y", strtotime($curriculo['Curriculo']['data'])); ?></td>
            <td class="acoes">
                <?php echo $this->Html->link(__('Download'), array('action' => 'download', $curriculo['Curriculo']['id']), array('class' => 'download', 'title' => 'Download')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $curriculo['Curriculo']['id']), array('class' => 'excluir', 'title' => __('Delete')), __('Deseja realmente excluir?', $curriculo['Curriculo']['id'])); ?>
            </td>
        </tr>
    <?php }; ?>
</table>

<?php // echo $this->element('paginacao'); ?>