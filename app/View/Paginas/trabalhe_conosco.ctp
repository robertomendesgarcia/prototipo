<div id="breadcrumbs">
    <?php
    echo $this->Html->getCrumbs(' > ', array(
        'text' => 'Trabalhe Conosco',
        'url' => null,
        'escape' => false
    ));
    ?>
</div>

<h3>Trabalhe Conosco</h3>

<?php echo $this->form->create('Curriculo', array('type' => 'file', 'id' => 'form_trabalhe_conosco')); ?>

<p class="campos_obrigatorios"><span>*</span> Campos obrigatórios.</p>

<div class="for-spam">
    <p>Não preencha estes campos!</p>
    <label>Author</label>
    <input type="text" name="author" class="text">
    <label>Name</label>
    <input type="text" name="name" class="text">
    <label>E-mail</label>
    <input type="text" name="email" class="text">
    <label>Subject</label>
    <input type="text" name="subject" class="text">
    <label>Message</label>
    <textarea name="msg" rows="5" cols="10" class="uniform"></textarea>
    <label>Comment</label>
    <textarea name="comment" rows="5" cols="10" class="uniform"></textarea>
    <p>Preencha estes campos!</p>
</div>

<?php echo $this->form->input('nome', array('label' => 'Nome:', 'class' => 'obrigatorio')); ?>

<?php echo $this->form->input('email', array('label' => 'E-mail:', 'class' => 'obrigatorio')); ?>

<?php echo $this->form->input('telefone', array('label' => 'Telefone:')); ?>

<?php echo $this->form->input('observacao', array('label' => 'Observações:', 'type' => 'textarea')); ?>

<?php echo $this->form->input('curriculo', array('label' => 'Currículo:', 'type' => 'file', 'class' => 'obrigatorio')); ?>

<?php echo $this->form->end('Enviar'); ?>
