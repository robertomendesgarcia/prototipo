<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('NoticiaCategoria'); ?>

<fieldset>
    <?php
    echo $this->Form->input('nome', array('label' => __('Category:')));
    echo $this->Form->input('parent_id', array('label' => __('Parent:'), 'type' => 'select', 'options' => $noticiaCategorias, 'empty' => 'Selecione...'));
    echo $this->Form->input('ativo', array('label' => __('Active:'), 'type' => 'select', 'options' => array(
            '1' => __('Sim'),
            '0' => __('Não')
            )));
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel the changes?')); ?>
</div>

