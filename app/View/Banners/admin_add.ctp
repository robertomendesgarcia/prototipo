<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('Banner', array('type' => 'file', 'id' => 'form_banner')); ?>

<fieldset>
    <?php
    echo $this->Form->input('descricao', array('label' => __('Description:'), 'class' => 'obrigatorio'));
    echo $this->Form->input('banner_tipo_id', array('label' => __('Banner Type:'), 'type' => 'select', 'options' => $bannerTipos, 'empty' => 'Selecione...', 'class' => 'obrigatorio'));
    echo $this->Form->input('arquivo', array('type' => 'file', 'label' => 'Arquivo (' . implode(', ', $file['formatos']) . '):'));
//    echo $this->Form->input('validade', array('label' => __('Validate:'), 'type' => 'text', 'dateFormat' => 'dd/mm/YYYY', 'class' => 'data'));
    echo $this->Form->input('link', array('label' => __('Link/URL:')));
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Deseja realmente cancelar?')); ?>
</div>

<script type="text/javascript">
    if ($('#form_banner').length) {        
        $('#BannerDescricao').focus();        
        $('#form_banner').validate({
            rules: {
                'data[Banner][descricao]': 'required',
                'data[Banner][banner_tipo_id]': 'required',
                'data[Banner][link]': 'url'
            },
            messages: {
                'data[Banner][descricao]': 'Informe a descrição.',
                'data[Banner][banner_tipo_id]': 'Informe o tipo do banner.',
                'data[Banner][link]': 'Link/URL inválido.'
            }
        });        
    }                
</script>