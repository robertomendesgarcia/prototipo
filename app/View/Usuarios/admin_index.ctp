<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('New User'), array('action' => 'add'), array('class' => 'botao', 'title' => __('New User'))); ?></li>
    </ul>
</div>

<?php // echo $this->element('filtro'); ?>

<table cellpadding="0" cellspacing="0" class="listagem">
    <tr>
        <!-- th><?php // echo $this->Paginator->sort('nome'); ?></th -->
        <th><?php echo $this->Paginator->sort('usuario', 'Usuário'); ?></th>
        <th><?php echo $this->Paginator->sort('email', 'E-mail'); ?></th>
        <th><?php echo $this->Paginator->sort('tipo_id'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($usuarios as $usuario) { ?>
        <tr>
            <!-- td><?php // echo h($usuario['Usuario']['nome']); ?></td -->
            <td><?php echo h($usuario['Usuario']['usuario']); ?></td>
            <td><?php echo h($usuario['Usuario']['email']); ?></td>     
            <td><?php echo $usuario['UsuarioTipo']['tipo']; ?></td>
            <td class="acoes_3_botoes">
                <?php echo $this->Html->link(__('Nova Senha'), array('action' => 'nova_senha', $usuario['Usuario']['id']), array('class' => 'enviar_senha', 'title' => __('Nova Senha'))); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usuario['Usuario']['id']), array('class' => 'editar', 'title' => __('Edit'))); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usuario['Usuario']['id']), array('class' => 'excluir', 'title' => __('Delete')), __('Deseja realmente excluir?', $usuario['Usuario']['id'])); ?>
            </td>
        </tr>
    <?php }; ?>
</table>

<?php echo $this->element('paginacao'); ?>