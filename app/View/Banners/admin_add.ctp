<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Banner', array('type' => 'file')); ?>

<fieldset>
      <?php
      echo $this->Form->input('descricao', array('label' => __('Description:')));
      echo $this->Form->input('banner_tipo_id', array('label' => __('Banner Type:'), 'type' => 'select', 'options' => $bannerTipos, 'empty' => 'Selecione...'));
      echo $this->Form->input('arquivo', array('type' => 'file', 'label' => __('File:')));
      echo $this->Form->input('validade', array('label' => __('Validate:'), 'type' => 'text', 'dateFormat' => 'dd/mm/YYYY', 'class' => 'data'));
      ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
      <?php echo $this->Form->end(); ?>
      <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this banner?')); ?>
</div>