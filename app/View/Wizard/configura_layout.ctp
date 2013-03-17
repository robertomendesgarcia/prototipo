<?php echo $this->Form->create('Layout'); ?>

<fieldset class="passo_1">

    <h3>Passo 1: escolha o layout desejado.</h3>

    <?php
    echo $this->Form->input('layout', array(
        'type' => 'radio',
        'options' => array('layout 1', 'layout 2', 'layout 3', 'layout 4')
    ));
    ?>
</fieldset>

<fieldset class="passo_2">

    <h3>Passo 2: escolha os recursos desejados.</h3>

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
    echo $this->Form->input('email_trabalhe_conosco', array(
        'label' => 'Email trabalhe conosco',
        'type' => 'text',
    ));
    ?>
</fieldset>

<fieldset class="passo_3">

    <h3>Passo 3: preencha as informações necessárias.</h3>

    <p class="campos_obrigatorios">* Campos Obrigatórios</p>

    <?php
    echo $this->Form->input('logo', array(
        'label' => 'Logo',
        'type' => 'file',
    ));
    echo $this->Form->input('titulo_site', array(
        'label' => 'Titulo site',
        'type' => 'text',
    ));
    echo $this->Form->input('slogan', array(
        'label' => 'Slogan',
        'type' => 'text',
    ));
    echo $this->Form->input('email_contato', array(
        'label' => 'Email contato',
        'type' => 'text',
    ));
    echo $this->Form->input('endereco_empresa', array(
        'label' => 'Endere&ccedil;o',
        'type' => 'text',
    ));
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php // echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this news?')); ?>
</div>