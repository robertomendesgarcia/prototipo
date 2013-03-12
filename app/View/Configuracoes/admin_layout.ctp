<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Configuracao', array('type' => 'file')); ?>

<fieldset>
    <legend><?php echo __('Content Of The Site'); ?></legend>
    <?php echo $this->Form->input('usa_banners', array('label' => __('I want to have banners.'), 'type' => 'checkbox')); ?>
    <?php echo $this->Form->input('usa_barra_lateral', array('label' => __('I want to have a right sidebar.'), 'type' => 'checkbox')); ?>
    <?php echo $this->Form->input('usa_rodape', array('label' => __('I want to have a footer.'), 'type' => 'checkbox')); ?>
    <?php echo $this->Form->textarea('conteudo_rodape', array('class' => 'ckeditor')); ?>
</fieldset>

<fieldset>
    <legend><?php echo __('Layout Of The Site'); ?></legend>
    <div class="input">
        <?php echo $this->Form->label('img_logo', __('Image for logo:')); ?>
        <?php echo $this->Form->file('img_logo', array('div' => false)); ?>
        <div class="img"></div>
    </div>
    <div class="input">
        <?php echo $this->Form->label('img_bg_topo', __('Background image on top:')); ?>
        <?php echo $this->Form->file('img_bg_topo', array('div' => false)); ?>
        <div class="img"></div>
    </div>
    <div class="input">
        <?php echo $this->Form->input('cor_titulo', array('class' => 'color_picker', 'label' => __('Title color:'), 'div' => false)); ?>
        <div class="preview"></div>
    </div>
    <div class="input">
        <?php echo $this->Form->input('cor_fonte_texto', array('class' => 'color_picker', 'label' => __('Font color:'), 'div' => false)); ?>
        <div class="preview"></div>
    </div>
    <div class="input">
        <?php echo $this->Form->input('cor_bg_html', array('class' => 'color_picker', 'label' => __('Background color:'), 'div' => false)); ?>
        <div class="preview"></div>
    </div>
    <div class="input">
        <?php echo $this->Form->label('img_bg_html', __('Background image:')); ?>
        <?php echo $this->Form->file('img_bg_html', array('div' => false)); ?>
        <div class="img"></div>
    </div>
    <?php
    echo $this->Form->input('img_bg_html_repeat', array('label' => __('Position the background image:'), 'type' => 'select', 'options' => array(
            'none' => __('Do not repeat'),
            'repeat-x' => __('Horizontal repeat'),
            'repeat-y' => __('Vertical repeat'),
            'repeat' => __('Horizontal and vertical repeat')
            )));
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => $this->params['action'], 'layout'), array('class' => 'cancelar'), __('Deseja realmente cancelar as alterações?')); ?>
</div>

