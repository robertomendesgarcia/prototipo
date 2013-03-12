<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Configuracao', array('type' => 'file')); ?>

<fieldset>
    <?php
    echo $this->Form->input('posicao_menu', array('label' => __('Menu position:'), 'type' => 'select', 'options' => array(
            '1' => __('Top'),
            '2' => __('Left')
            )));
    ?>
    <?php echo $this->Form->input('usa_trabalhe_conosco', array('label' => __('Quero ter um link Trabalhe Conosco.'), 'type' => 'checkbox')); ?>
    <?php echo $this->Form->input('menu_degade', array('label' => __('Menu with gradient background.'), 'type' => 'checkbox')); ?>
    <div class="input">
        <?php echo $this->Form->input('cor_bg_menu', array('class' => 'color_picker', 'label' => __('Background color:'), 'div' => false)); ?>
        <div class="preview"></div>
    </div>
    <div class="input">
        <?php echo $this->Form->input('cor_fonte_menu', array('class' => 'color_picker', 'label' => __('Font color:'), 'div' => false)); ?>
        <div class="preview"></div>
    </div>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => $this->params['action'], 'layout'), array('class' => 'cancelar'), __('Deseja realmente cancelar as alterações?')); ?>
</div>

