<div class="users form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php
        echo $this->Form->input('usuario');
        echo $this->Form->input('senha');
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>