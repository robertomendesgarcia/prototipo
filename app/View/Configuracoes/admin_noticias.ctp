<?php
//$titulo = explode(' - ', $title_for_layout);
//$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Configuracao', array('type' => 'file')); ?>

<fieldset>
    <?php echo $this->Form->input('usa_noticias', array('label' => __('I want to have news on my site.'), 'type' => 'checkbox')); ?>
    <div class="campos">
        <?php echo $this->Form->input('mostrar_noticias_capa', array('label' => __('Show news on home.'), 'type' => 'checkbox')); ?>
        <?php
        echo $this->Form->input('qtde_noticias_capa', array('label' => __('Quantity news on home:'), 'type' => 'select', 'options' => array(
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6,
                7 => 7,
                8 => 8,
                9 => 9,
                10 => 10)
            ));
        ?>
        <?php echo $this->Form->input('mostrar_noticias_lateral', array('label' => __('Show news on sidebar.'), 'type' => 'checkbox')); ?>
        <?php
        echo $this->Form->input('qtde_noticias_lateral', array('label' => __('Quantity news on sidebar:'), 'type' => 'select', 'options' => array(
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6,
                7 => 7,
                8 => 8,
                9 => 9,
                10 => 10)
            ));
        ?>
    </div>
</fieldset>
<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => $this->params['action'], 'noticias'), array('class' => 'cancelar'), __('Deseja realmente cancelar?')); ?>
</div>

