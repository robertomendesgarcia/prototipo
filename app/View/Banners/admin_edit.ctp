<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Banner'); ?>

<fieldset>
      <?php
   //   var_dump($descrica); exit;
      echo $this->Form->input('descricao', array('label' => __('Description:')));
      echo $this->Form->input('banner_tipo_id', array('label' => __('Banner Type:'), 'type' => 'select', 'options' => $bannerTipos, 'empty' => 'Selecione...'));
      echo $this->Form->input('validade', array('label' => __('Validate:'), 'type' => 'text', 'dateFormat' => 'dd/mm/YYYY', 'class' => 'data'));
      echo $this->Form->input('arquivo', array('type' => 'file','label' => __('File:')));
      ?>
      <?php echo $this->Html->image('../uploads/banner/' . $this->data['Banner']['arquivo'],  array('alt'=>'advertisement', 'height'=>'90', 
    'width'=>'90'));  ?>
</fieldset>

<div class="botoes">
      <?php echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
      <?php echo $this->Form->end(); ?>
      <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'botao'), __('Do you really want to cancel this banner?')); ?>
</div>