<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('Pagina', array('id' => 'form_pagina')); ?>

<fieldset>
    <?php
//    echo $this->Form->input('pin', array('label' => __('Pin:'), 'disabled' => true));
    echo $this->Form->input('titulo', array('label' => __('Title:'), 'class' => 'obrigatorio'));
    echo $this->Form->input('ativo', array('label' => __('Active:'), 'type' => 'select', 'options' => array(
            '1' => __('Yes'),
            '0' => __('No')
            )));
    echo $this->Form->label('texto', __('Content:'));
    echo $this->Form->textarea('texto', array('class' => 'ckeditor'));
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this page?')); ?>
</div>
<script type="text/javascript">
    if ($('#form_pagina').length) {        
        $('#PaginaTitulo').focus();        
        $('#form_pagina').validate({
            rules: {
                'data[Pagina][titulo]': 'required'
            },
            messages: {
                'data[Pagina][titulo]': 'Informe o título da página.'
            }
        });        
    }                
</script>