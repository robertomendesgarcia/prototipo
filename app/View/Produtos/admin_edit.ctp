<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('Produto', array('type' => 'file', 'id' => 'form_produto')); ?>

<fieldset>
    <?php
    echo $this->Form->input('id');
    echo $this->Form->input('nome', array('label' => __('Name:'), 'class' => 'obrigatorio'));
    echo $this->Form->input('categoria_id', array('label' => __('Category:'), 'type' => 'select', 'options' => $categorias, 'empty' => 'Selecione...', 'class' => 'obrigatorio'));
    echo $this->Form->input('valor', array('label' => __('Value:')));
    echo $this->Form->input('descricao', array('label' => __('Description:')));
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
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this product?')); ?>
</div>

<script type="text/javascript">
    if ($('#form_produto').length) {        
        $('#ProdutoNome').focus();        
        $('#form_produto').validate({
            rules: {
                'data[Produto][nome]': 'required',
                'data[Produto][categoria_id]': 'required'
            },
            messages: {
                'data[Produto][nome]': 'Informe o nome do produto.',
                'data[Produto][categoria_id]': 'Informe a categoria.',
            }
        });        
    }                
</script>