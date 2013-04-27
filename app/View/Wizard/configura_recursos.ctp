<h3>Passo 2: escolha os recursos desejados.</h3>

<?php echo $this->Form->create('Layout'); ?>

<fieldset class="passo_2">

    <?php
    echo $this->Form->input('usa_produtos', array(
        'label' => 'Usa produto',
        'type' => 'checkbox',
    ));
    echo $this->Form->input('usa_banners', array(
        'label' => 'Usa banner',
        'type' => 'checkbox',
    ));
    echo $this->Form->input('usa_noticias', array(
        'label' => 'Usa not&iacute;cias',
        'type' => 'checkbox',
    ));
    echo $this->Form->input('usa_trabalhe_conosco', array(
        'label' => 'Trabalhe conosco',
        'type' => 'checkbox',
    ));
    echo '<div class="input text desabilitado">';
    echo $this->Form->input('email_trabalhe_conosco', array(
        'label' => 'Email trabalhe conosco',
        'type' => 'text',
        'disabled' => 'disabled',
        'div' => false
    ));
    echo '</div>'
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php // echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this news?')); ?>
</div>