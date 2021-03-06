<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<p class="campos_obrigatorios">* Campos Obrigatórios</p>

<?php echo $this->Form->create('ProdutoCategoria', array('id' => 'form_categoria')); ?>

<fieldset>
    <?php
    echo $this->Form->input('nome', array('label' => __('Category:'), 'class' => 'obrigatorio'));
    echo $this->Form->input('parent_id', array('label' => __('Parent:'), 'type' => 'select', 'options' => $noticiaCategorias, 'empty' => 'Selecione...'));
    echo $this->Form->input('ativo', array('label' => __('Active:'), 'type' => 'select', 'options' => array(
            '1' => __('Yes'),
            '0' => __('No')
            )));
    ?>
</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Deseja realmente cancelar?')); ?>
</div>

<script type="text/javascript">
    if ($('#form_categoria').length) {        
        $('#ProdutoCategoriaNome').focus();        
        $('#form_categoria').validate({
            rules: {
                'data[ProdutoCategoria][nome]': 'required'
            },
            messages: {
                'data[ProdutoCategoria][nome]': 'Informe o nome da categoria.'
            }
        });        
    }                
</script>