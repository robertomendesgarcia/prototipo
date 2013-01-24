<?php
//        print_r('<pre>');
//        print_r($categorias);
//        print_r('</pre>');
//        exit;


$this->Html->addCrumb(__('Categories for News'));

?>

<?php echo $this->Form->create('NoticiaCategoria'); ?>

<fieldset>
    
    <legend><?php echo __('Add news category'); ?></legend>
    
        <?php
        echo $this->Form->input('nome', array('label' => __('Name:')));
        echo $this->Form->input('ativo', array('label' => 'Ativo:', 'type' => 'checkbox', array(
            '1' => __('Sim'),
            '0' => __('Não')
        )));
        echo $this->Form->input('parent_id', array('label' => __('Categoria Pai:'), 'type' => 'select', 'options' => $noticiaCategorias));

        
        ?>
    </fieldset>

<?php echo $this->Form->end(__('Submit')); ?>
