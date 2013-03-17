<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('Produto', array('type' => 'file')); ?>

<fieldset>
    <?php
    echo $this->Form->input('nome', array('label' => __('Name:')));
    echo $this->Form->input('categoria_id', array('label' => __('Category:'), 'type' => 'select', 'options' => $categorias, 'empty' => 'Selecione...'));
    echo $this->Form->input('valor', array('label' => __('Value:')));
    echo $this->Form->input('descricao', array('label' => __('Description:'), 'class' => 'ckeditor'));
    echo $this->Form->input('destaque', array('label' => __('Destaque:'), 'type' => 'select', 'options' => array(
            '1' => __('Yes'),
            '0' => __('No')
            )));
    echo $this->Form->input('ativo', array('label' => __('Active:'), 'type' => 'select', 'options' => array(
            '1' => __('Yes'),
            '0' => __('No')
            )));
    echo $this->Form->label('imagens', 'Galeria:');
    echo $this->Form->input('imagens.', array('type' => 'file', 'multiple' => 'multiple'));
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this product?')); ?>
</div>

