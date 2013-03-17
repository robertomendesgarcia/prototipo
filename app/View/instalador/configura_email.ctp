<h3><?php echo __('Configure o e-mail para envios pelo sistema.'); ?></h3>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('Email', array('id' => 'configura_email')); ?>
<fieldset>
    <?php
    echo $this->Form->input('smtp', array('label' => 'Smtp:', 'class' => 'obrigatorio'));
    echo $this->Form->input('nome', array('label' => 'Nome:', 'class' => 'obrigatorio'));
    echo $this->Form->input('email', array('label' => 'Email:', 'class' => 'obrigatorio'));
    echo $this->Form->input('usuario', array('label' => 'Usu&aacute;rio:', 'class' => 'obrigatorio'));
    echo $this->Form->input('senha', array('label' => 'Senha:', 'type' => 'password', 'class' => 'obrigatorio'));
    echo $this->Form->input('porta', array('label' => 'Porta:', 'class' => 'obrigatorio'));
    ?>
</fieldset>
<div class="botoes">
      <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
      <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
      <?php echo $this->Form->end(); ?>
      <?php // echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this news?')); ?>
</div>
