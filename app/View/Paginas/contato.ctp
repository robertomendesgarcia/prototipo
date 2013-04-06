<h3>Contato</h3>

<?php echo $this->form->create('Contato', array('id' => 'form_contato')); ?>

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

<?php echo $this->form->input('assunto', array('label' => 'Assunto:', 'class' => 'obrigatorio')); ?>

<?php echo $this->form->input('mensagem', array('label' => 'Mensagem:', 'type' => 'textarea', 'class' => 'obrigatorio')); ?>

<?php echo $this->form->end('Enviar'); ?>

<div id="direita">

    <?php echo $this->element('google_maps'); ?>
    <div class="informacoes">
        <p><?php echo $config['endereco_fisico_empresa']; ?></p>
        <p>Fone: <?php echo $config['telefone_1']; ?></p>
        <p>E-mail: <?php echo $config['email_contato']; ?></p>

    </div>

</div>