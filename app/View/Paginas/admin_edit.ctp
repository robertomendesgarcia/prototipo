<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Pagina'); ?>

<fieldset>
      <?php
      echo $this->Form->input('pin', array('label' => __('Pin:')));
      echo $this->Form->input('titulo', array('label' => __('Title:')));
      echo $this->Form->label('texto', __('Content:'));
      echo $this->Form->textarea('texto', array('class' => 'ckeditor'));
      ?>
</fieldset>

<div class="botoes">
      <?php echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
      <?php echo $this->Form->end(); ?>
      <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'botao'), __('Do you really want to cancel this page?')); ?>
</div>