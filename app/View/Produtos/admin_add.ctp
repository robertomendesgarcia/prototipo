<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Produto'); ?>

<fieldset>
      <?php
      echo $this->Form->input('nome', array('label' => __('Name:')));
      echo $this->Form->input('categoria_id', array('label' => __('Category:'), 'type' => 'select', 'options' => $categorias, 'empty' => 'Selecione...'));
      echo $this->Form->input('valor', array('label' => __('Value:')));
      echo $this->Form->input('descricao', array('label' =>  __('Description:')));
      echo $this->Form->input('ativo', array('label' => __('Active:'), 'type' => 'select', 'options' => array(
              '1' => __('Yes'),
              '0' => __('No')
              )));
      ?>
</fieldset>

<div class="botoes">
      <?php echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
      <?php echo $this->Form->end(); ?>
      <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'botao'), __('Do you really want to cancel this product?')); ?>
</div>

