<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('Exportar'), array('action' => 'export'), array('class' => 'botao', 'title' => __('Exportar'))); ?></li>
    </ul>
</div>

<table cellpadding="0" cellspacing="0" class="listagem">
    <tr>
        <th><?php echo $this->Paginator->sort('nome'); ?></th>
        <th><?php echo $this->Paginator->sort('email', 'E-mail'); ?></th>
        <th><?php echo $this->Paginator->sort('data_inscricao', 'Data de Inscrição'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($newsletters as $newsletter) { ?>
        <tr>
            <td><?php echo h($newsletter['Newsletter']['nome']); ?></td>
            <td><?php echo h($newsletter['Newsletter']['email']); ?></td>
            <td class="centralizado"><?php echo date("d/m/Y H:i:s", strtotime($newsletter['Newsletter']['data_inscricao'])); ?></td>
            <td class="acoes">
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $newsletter['Newsletter']['id']), array('class' => 'excluir', 'title' => __('Delete')), __('Deseja realmente excluir?', $newsletter['Newsletter']['id'])); ?>
            </td>
        </tr>
    <?php }; ?>
</table>

<?php echo $this->element('paginacao'); ?>