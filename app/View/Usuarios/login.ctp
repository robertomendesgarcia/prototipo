<div class="janela form_login">
    <?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password.'); ?></legend>
        <?php
        echo $this->Form->input('usuario', array(
            'label' => __('Username:')
        ));
        echo $this->Form->input('senha', array(
            'label' => __('Password:')
        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Login')); ?>
</div>