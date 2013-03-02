<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('BannerTipo'); ?>

<fieldset>
    <?php
    echo $this->Form->input('tipo', array('label' => __('Type:')));
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this type?')); ?>
</div>
