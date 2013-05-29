<?php
//$titulo = explode(' - ', $title_for_layout);
//$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Configuracao', array('type' => 'file')); ?>

<fieldset>
    <?php echo $this->Form->input('usa_rodape', array('label' => __('Quero ter um rodapé no meu site.'), 'type' => 'checkbox')); ?>

    <div class="input">
        <?php echo $this->Form->input('cor_bg_rodape', array('class' => 'color_picker', 'label' => __('Cor de fundo do Rodapé:'), 'div' => false)); ?>
        <div class="preview"></div>
    </div>
    <div class="input">
        <?php echo $this->Form->input('cor_texto_rodape', array('class' => 'color_picker', 'label' => __('Cor do texto no Rodapé:'), 'div' => false)); ?>
        <div class="preview"></div>
    </div>
    <label for="ConfiguracaoConteudoRodape">Texto para o Rodapé:</label>
    <?php echo $this->Form->textarea('conteudo_rodape', array('class' => 'ckeditor')); ?>

</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => $this->params['action'], 'layout'), array('class' => 'cancelar'), __('Deseja realmente cancelar?')); ?>
</div>

