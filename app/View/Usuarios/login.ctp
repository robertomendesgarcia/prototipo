<div class="janela form_login">
    <h3><?php echo __('Please enter your username and password.'); ?></h3>
    <?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <?php
        echo $this->Form->input('usuario', array(
            'label' => __('Username:')
        ));
        echo $this->Form->input('senha', array(
            'label' => __('Password:'),
            'type' => 'password'
        ));
        ?>
    </fieldset>
    <?php echo $this->Html->link(__('Esqueci meu usuário/senha.'), array('controller' => 'usuarios', 'action' => 'esqueci-meu-usuario-senha', 'admin' => false)); ?>
    <?php echo $this->Form->end(__('Login')); ?>
</div>