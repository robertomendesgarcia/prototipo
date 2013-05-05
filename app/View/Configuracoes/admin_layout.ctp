<?php
//$titulo = explode(' - ', $title_for_layout);
//$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Configuracao', array('type' => 'file')); ?>

<fieldset>
    <?php echo $this->Form->input('usa_banners', array('label' => __('I want to have banners.'), 'type' => 'checkbox')); ?>
    <?php echo $this->Form->input('usa_barra_lateral', array('label' => __('I want to have a right sidebar.'), 'type' => 'checkbox')); ?>
    <?php echo $this->Form->input('usa_rodape', array('label' => __('I want to have a footer.'), 'type' => 'checkbox')); ?>
    <?php echo $this->Form->textarea('conteudo_rodape', array('class' => 'ckeditor')); ?>

    <?php    
    echo $this->Form->input('img_bg_topo', array(
        'label' => __('Imagem de Fundo do Topo (' . implode(', ', $img) . '):'),
        'type' => 'file',
    ));
    if (file_exists($this->data['Configuracao']['img_bg_topo'])) {
        echo "<div class='input logo_atual'>";
        echo $this->Form->label(__('Imagem de Fundo do Topo Atual:'));
        echo $this->PhpThumb->thumbnail($this->data['Configuracao']['img_bg_topo'], array(
            'w' => 100, 'h' => 100, 'zc' => 1
        ));
        echo "</div>";
    }
    ?>
    
    <div class="input">
        <?php echo $this->Form->input('cor_titulo', array('class' => 'color_picker', 'label' => __('Title color:'), 'div' => false)); ?>
        <div class="preview"></div>
    </div>
    <div class="input">
        <?php echo $this->Form->input('cor_fonte_texto', array('class' => 'color_picker', 'label' => __('Font color:'), 'div' => false)); ?>
        <div class="preview"></div>
    </div>
    <div class="input">
        <?php echo $this->Form->input('cor_bg_html', array('class' => 'color_picker', 'label' => __('Cor de fundo do Site:'), 'div' => false)); ?>
        <div class="preview"></div>
    </div>
    
    <?php    
    echo $this->Form->input('img_bg_html', array(
        'label' => __('Imagem de Fundo do Site (' . implode(', ', $img) . '):'),
        'type' => 'file',
    ));
    if (file_exists($this->data['Configuracao']['img_bg_html'])) {
        echo "<div class='input logo_atual'>";
        echo $this->Form->label(__('Imagem de Fundo Atual:'));
        echo $this->PhpThumb->thumbnail($this->data['Configuracao']['img_bg_html'], array(
            'w' => 100, 'h' => 100, 'zc' => 1
        ));
        echo "</div>";
    }
    ?>
    
    <?php
    echo $this->Form->input('img_bg_html_repeat', array('label' => __('Position the background image:'), 'type' => 'select', 'options' => array(
            'no-repeat' => __('Do not repeat'),
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
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => $this->params['action'], 'layout'), array('class' => 'cancelar'), __('Deseja realmente cancelar?')); ?>
</div>

