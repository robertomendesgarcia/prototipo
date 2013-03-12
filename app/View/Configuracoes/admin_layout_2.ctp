<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Configuracao', array('type' => 'file')); ?>

<fieldset>
    <legend><?php echo __('Content Of The Site'); ?></legend>
    <?php echo $this->Form->input('usa_produtos', array('label' => __('I want to have products.'), 'type' => 'checkbox')); ?>
    <?php echo $this->Form->input('usa_noticias', array('label' => __('I want to have news.'), 'type' => 'checkbox')); ?>
    <?php echo $this->Form->input('usa_banners', array('label' => __('I want to have banners.'), 'type' => 'checkbox')); ?>
    <?php echo $this->Form->input('usa_barra_lateral', array('label' => __('I want to have a right sidebar.'), 'type' => 'checkbox')); ?>
    <?php echo $this->Form->input('usa_rodape', array('label' => __('I want to have a footer.'), 'type' => 'checkbox')); ?>
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

<fieldset>
    <legend><?php echo __('Menu'); ?></legend>
    <?php
    echo $this->Form->input('posicao_menu', array('label' => __('Menu position:'), 'type' => 'select', 'options' => array(
            '1' => __('Top'),
            '2' => __('Left')
            )));
    ?>
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

<fieldset>
    <legend><?php echo __('News'); ?></legend>
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
        , 'selected' => 3));
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
        , 'selected' => 3));
    ?>
</fieldset>

<fieldset>
    <legend><?php echo __('Products'); ?></legend>
    <?php echo $this->Form->input('mostrar_produtos_capa', array('label' => __('Show products on home.'), 'type' => 'checkbox')); ?>
    <?php
    echo $this->Form->input('qtde_produtos_capa', array('label' => __('Quantity products on home:'), 'type' => 'select', 'options' => array(
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
        , 'selected' => 3));
    ?>
    <?php echo $this->Form->input('mostrar_produtos_lateral', array('label' => __('Show products on sidebar.'), 'type' => 'checkbox')); ?>
    <?php
    echo $this->Form->input('qtde_produtos_lateral', array('label' => __('Quantity products on sidebar:'), 'type' => 'select', 'options' => array(
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
        , 'selected' => 3));
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
      <?php echo $this->Form->end(); ?>
      <?php echo $this->Form->postLink(__('Cancel'), array('action' => $this->params['action'], 'layout'), array('class' => 'cancelar'), __('Deseja realmente cancelar as alterações?')); ?>
</div>

