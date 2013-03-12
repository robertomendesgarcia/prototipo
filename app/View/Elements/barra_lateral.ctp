<div id="barra_lateral">

    <?php
    if (!empty($banners[1])) {
        echo 'Banner 1!!';
    }
    ?>

    <?php if ($config['mostrar_noticias_lateral'] && isset($noticias_lateral)) { ?>
        <h3><?php echo __('News'); ?></h3>
        <ul>
            <?php foreach ($noticias_lateral as $noticia_lateral) { ?>
                <li>
                    <a href="<?php echo DEFAULT_URL . 'noticias/ver/' . $noticia_lateral['Noticia']['id'] . '/' . $this->Uteis->slug($noticia_lateral['Noticia']['titulo']); ?>" title="<?php echo $noticia_lateral['Noticia']['titulo']; ?>">
                        <small>
                            <?php echo date("d/m/Y", strtotime($noticia_lateral['Noticia']['data'])); ?>
                        </small>
                        <strong>
                            <?php echo $noticia_lateral['Noticia']['titulo']; ?>
                        </strong>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

    <?php
    if (!empty($banners[2])) {
        echo 'Banner 2!!';
    }
    ?>

    <?php if ($config['mostrar_produtos_lateral'] && isset($noticias_lateral)) { ?>
        <h3><?php echo __('Products'); ?></h3>
        <ul>
            <?php foreach ($produtos_lateral as $produto_lateral) { ?>
                <li>
                    <a href="<?php echo DEFAULT_URL . 'produtos/ver/' . $produto_lateral['Produto']['id'] . '/' . $this->Uteis->slug($produto_lateral['Produto']['nome']); ?>" title="<?php echo $produto_lateral['Produto']['nome']; ?>">
                        <strong>
                            <?php echo $produto_lateral['Produto']['nome']; ?>
                        </strong>
                        <strong>
                            <?php echo $produto_lateral['Produto']['valor']; ?>
                        </strong>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

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