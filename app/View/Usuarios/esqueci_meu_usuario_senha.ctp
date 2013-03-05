<div class="janela form_login">
    <h3><?php echo __('Informe o e-mail cadastrado.'); ?></h3>
    <?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <?php
        echo $this->Form->input('email', array(
            'label' => __('E-mail:')
        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Enviar')); ?>
</div>