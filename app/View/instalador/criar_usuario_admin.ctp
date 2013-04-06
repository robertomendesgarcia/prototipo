<h3><?php echo __('Crie um usuário para administração do site.'); ?></h3>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('Usuario', array('id' => 'form_cria_usuario_adm')); ?>
<fieldset>    
    <?php
    echo $this->Form->input('nome', array('label' => 'Nome:', 'class' => 'obrigatorio'));
    echo $this->Form->input('email', array('label' => 'Email:', 'class' => 'obrigatorio'));
    echo $this->Form->input('usuario', array('label' => 'Usuário:', 'class' => 'obrigatorio'));
    echo $this->Form->input('tipo_id', array('type' => 'hidden', 'value' => '2', 'class' => 'obrigatorio'));
    echo $this->Form->input('senha', array('label' => 'Senha:', 'type' => 'password', 'class' => 'obrigatorio'));
    echo $this->Form->input('confirmar_senha', array('label' => 'Confirmar senha:', 'type' => 'password', 'class' => 'obrigatorio'));
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php // echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this news?')); ?>
</div>
