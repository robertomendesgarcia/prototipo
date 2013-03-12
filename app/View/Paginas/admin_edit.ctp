<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Pagina'); ?>

<fieldset>
    <?php
    echo $this->Form->input('pin', array('label' => __('Pin:'), 'disabled' => true));
    echo $this->Form->input('titulo', array('label' => __('Title:')));
    echo $this->Form->input('ativo', array('label' => __('Active:'), 'type' => 'select', 'options' => array(
            '1' => __('Yes'),
            '0' => __('No')
            )));
    echo $this->Form->label('texto', __('Content:'));
    echo $this->Form->textarea('texto', array('class' => 'ckeditor'));
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Deseja realmente cancelar as alterações?')); ?>
</div>