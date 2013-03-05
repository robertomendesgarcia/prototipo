<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Banner'); ?>

<fieldset>
    <?php
    //   var_dump($descrica); exit;
    echo $this->Form->input('descricao', array('label' => __('Description:')));
    echo $this->Form->input('banner_tipo_id', array('label' => __('Banner Type:'), 'type' => 'select', 'options' => $bannerTipos, 'empty' => 'Selecione...'));
    echo $this->Form->input('validade', array('label' => __('Validate:'), 'type' => 'text', 'dateFormat' => 'dd/mm/YYYY', 'class' => 'data'));
    echo $this->Form->input('arquivo', array('type' => 'file', 'label' => __('File:')));
    ?>

    <?php
//      echo $this->Html->image('../uploads/banner/' . $this->data['Banner']['arquivo'],  array('alt'=>'advertisement', 'height'=>'100', 'width'=>'90'));  

    $src = $src . $this->data['Banner']['arquivo'];

    if (file_exists($src)) {
        echo $this->Form->label(null, 'Arquivo Atual:');
        echo '<div class="preview">';
        echo $this->PhpThumb->thumbnail($src, array(
            'w' => 100, 'h' => 100, 'zc' => 1
        ));
        echo '</div>';
    }
    ?>

</fieldset>

<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false));  ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this banner?')); ?>
</div>