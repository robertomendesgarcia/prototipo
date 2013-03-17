<h3><?php echo __('Informe as configurações do banco.'); ?></h3>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('Banco', array('id' => 'configura_banco')); ?>
<fieldset>
    <?php
    echo $this->Form->input('host', array('label' => 'Host:', 'class' => 'obrigatorio'));
    echo $this->Form->input('login', array('label' => 'Login:', 'class' => 'obrigatorio'));
    echo $this->Form->input('senha', array('label' => 'Senha:', 'type' => 'password', 'class' => 'obrigatorio'));
    echo $this->Form->input('database', array('label' => 'Banco:', 'class' => 'obrigatorio'));
    ?>
</fieldset>
<div class="botoes">
      <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
      <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
      <?php echo $this->Form->end(); ?>
      <?php // echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this news?')); ?>
</div>