<h3>Passo 3: preencha as informações necessárias.</h3>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('Layout', array('id' => 'form_configura_dados', 'type' => 'file')); ?>

<fieldset class="passo_3">

    <?php
    echo $this->Form->input('titulo_site', array(
        'label' => 'Titulo do Site:',
        'type' => 'text',
        'class' => 'obrigatorio'
    ));
    echo $this->Form->input('slogan', array(
        'label' => 'Slogan do Site:',
        'type' => 'text',
    ));
    echo $this->Form->input('email_contato', array(
        'label' => 'Email para Contato:',
        'type' => 'text',
        'class' => 'obrigatorio'
    ));
    echo $this->Form->input('endereco_fisico_empresa', array(
        'label' => 'Endere&ccedil;o Físico da Empresa:',
        'type' => 'textarea',
    ));
    echo $this->Form->input('img_logo', array(
        'label' => 'Logo para o Site:',
        'type' => 'file',
    ));
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php // echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this news?')); ?>
</div>