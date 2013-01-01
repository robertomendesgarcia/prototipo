<?php echo $this->Form->create('ProdutoCategoria'); ?>

<fieldset>
    
    <legend><?php echo __('Add product category'); ?></legend>
    
        <?php
        echo $this->Form->input('nome', array('label' => 'Nome:'));
        echo $this->Form->input('inativo', array('label' => 'Desabilitar:', 'type' => 'checkbox'));
        echo $this->Form->input('parent_id', array('label' => 'Categoria Pai:', 'type' => 'select', 'options' => $lista_categorias));

        
        ?>
    </fieldset>

<?php echo $this->Form->end(__('Submit')); ?>
