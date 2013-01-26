<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('ProdutoCategoria'); ?>

<fieldset>
    <?php
    echo $this->Form->input('nome', array('label' => __('Category:')));
    echo $this->Form->input('parent_id', array('label' => __('Parent:'), 'type' => 'select', 'options' => $noticiaCategorias, 'empty' => 'Selecione...'));
    echo $this->Form->input('ativo', array('label' => __('Active:'), 'type' => 'select', 'options' => array(
            '1' => __('Yes'),
            '0' => __('No')
            )));
    ?>
</fieldset>

<div class="botoes">
    <?php echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'botao'), __('Do you really want to cancel this category?')); ?>
</div>

