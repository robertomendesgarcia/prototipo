<h3>Passo 1: escolha o layout desejado.</h3>

<?php echo $this->Form->create('Layout', array('id' => 'form_selecao_layout')); ?>

<?php foreach ($estruturas as $key => $estrutura) { ?>

    <fieldset>
        <label><?php echo $estrutura; ?></label>
        <input type="radio" value="<?php echo $key; ?>" style="display: none;"  name="data[Layout][layout]" />

        <a href="#" id="<?php echo 'capa_' . $key; ?>" title="<?php echo $estrutura; ?>">
            <img src="<?php echo DEFAULT_URL . "img/layouts_padroes/capa_" . $key . '.png'; ?>" alt="<?php echo $estrutura; ?>" />
        </a>
    </fieldset>

<?php } ?>



<div class="botoes">
    <?php //echo $this->Form->submit(__('Submit'), array('div' => false));  ?>
    <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
    <?php echo $this->Form->end(); ?>
    <?php // echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this news?')); ?>
</div>