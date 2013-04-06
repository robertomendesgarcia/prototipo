<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('Noticia', array('type' => 'file', 'id' => 'form_noticia')); ?>
<fieldset>
    <?php
    echo $this->Form->input('id');
    echo $this->Form->input('titulo', array('label' => __('Title:'), 'class' => 'obrigatorio'));
    echo $this->Form->input('categoria_id', array('label' => __('Category:'), 'type' => 'select', 'options' => $categorias, 'empty' => 'Selecione...', 'class' => 'obrigatorio'));
    echo $this->Form->label('texto', __('Content:'));
    echo $this->Form->textarea('texto', array('class' => 'ckeditor'));
    echo $this->Form->input('fonte', array('label' => __('Source:')));
    echo $this->Form->input('data', array('label' => __('Date:'), 'class' => 'data', 'type' => 'text', 'value' => date("d/m/Y", strtotime($noticia['Noticia']['data']))));
    echo $this->Form->input('destaque', array('label' => __('Destaque:'), 'type' => 'select', 'options' => array(
            '1' => __('Yes'),
            '0' => __('No')
            )));
    echo $this->Form->input('ativo', array('label' => __('Active:'), 'type' => 'select', 'options' => array(
            '1' => __('Yes'),
            '0' => __('No')
            )));
    echo $this->Form->label('imagens', 'Galeria (imagens ' . implode(', ', $img['formatos']) . '):');
    echo $this->Form->input('imagens.', array('type' => 'file', 'multiple' => 'multiple'));
    ?>
    <?php echo $this->element('galeria'); ?>
</fieldset>
<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this news?')); ?>
</div>

<script type="text/javascript">
    if ($('#form_noticia').length) {        
        $('#NoticiaTitulo').focus();        
        $('#form_noticia').validate({
            rules: {
                'data[Noticia][titulo]': 'required',
                'data[Noticia][categoria_id]': 'required'
            },
            messages: {
                'data[Noticia][titulo]': 'Informe o título.',
                'data[Noticia][categoria_id]': 'Informe a categoria.'
            }
        });        
    }                
</script>