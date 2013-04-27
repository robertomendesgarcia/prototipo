<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('Banner', array('type' => 'file', 'id' => 'form_banner')); ?>

<fieldset>
    <?php
    //   var_dump($descrica); exit;
    echo $this->Form->input('descricao', array('label' => __('Description:'), 'class' => 'obrigatorio'));
    echo $this->Form->input('banner_tipo_id', array('label' => __('Banner Type:'), 'type' => 'select', 'options' => $bannerTipos, 'empty' => 'Selecione...', 'class' => 'obrigatorio'));
//    echo $this->Form->input('validade', array('label' => __('Validate:'), 'type' => 'text', 'dateFormat' => 'dd/mm/YYYY', 'class' => 'data'));
    echo $this->Form->input('arquivo', array('type' => 'file', 'label' => 'Arquivo (' . implode(', ', $file['formatos']) . '):'));

//      echo $this->Html->image('../uploads/banner/' . $this->data['Banner']['arquivo'],  array('alt'=>'advertisement', 'height'=>'100', 'width'=>'90'));  

    $src = $file['path'] . $this->data['Banner']['arquivo'];

    if (file_exists($src)) {
        echo $this->Form->label(null, 'Arquivo Atual:');
        echo '<div class="preview">';
        echo $this->PhpThumb->thumbnail($src, array(
            'w' => 100, 'h' => 100, 'zc' => 1
        ));
        echo '</div>';
    }

    echo $this->Form->input('link', array('label' => __('Link/URL:')));
    echo $this->Form->input('ativo', array('label' => __('Active:'), 'type' => 'select', 'options' => array(
            '1' => __('Yes'),
            '0' => __('No')
            )));
    ?>



</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false));  ?>
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