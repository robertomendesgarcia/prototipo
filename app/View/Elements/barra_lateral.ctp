<div id="barra_lateral">

    <?php
    if (!empty($banners[1])) {
        echo 'Banner 1!!';
    }
    ?>

    <?php
    if ($config['mostrar_noticias_lateral']) {
        echo 'Notícias na lateral!!';
    }
    ?>

    <?php
    if (!empty($banners[2])) {
        echo 'Banner 2!!';
    }
    ?>

    <?php
    if ($config['mostrar_produtos_lateral']) {
        echo 'Produtos na lateral!!';
    }
    ?>

    <div id="newsletter">
        <?php echo $this->Form->create('Newsletter', array('controller' => 'Newsletters', 'action' => 'add')); ?>
        <fieldset>
            <legend>Newsletter</legend>
            <p>Fique por dentro das novidades, receba e-mails periódicos.</p>
            <?php
            echo $this->Form->input('nome', array('label' => __('Name:')));
            echo $this->Form->input('email', array('label' => __('E-mail:')));
            ?>
        </fieldset>
        <div class="botoes">
            <?php echo $this->Form->end('OK'); ?>
        </div>
        <?php
        if (!empty($banners[3])) {
            echo 'Banner 3!!';
        }
        ?>
    </div>
    
</div>