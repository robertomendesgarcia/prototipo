<div id="barra_lateral">

    <?php echo $this->element('banners', array('pin' => 'barra_lateral_topo')); ?>

    <?php if ($config['mostrar_noticias_lateral'] && isset($noticias_lateral)) { ?>
        <div class="noticias busca">
            <h3><?php echo __('News'); ?></h3>
            <ul>
                <?php foreach ($noticias_lateral as $noticia_lateral) { ?>
                    <li>
                        <a href="<?php echo DEFAULT_URL . 'noticias/ver/' . $noticia_lateral['Noticia']['id'] . '/' . $this->Uteis->slug($noticia_lateral['Noticia']['titulo']); ?>" title="<?php echo $noticia_lateral['Noticia']['titulo']; ?>">
                            <small>
                                <?php echo date("d/m/Y", strtotime($noticia_lateral['Noticia']['data'])); ?> - 
                                <?php echo $noticia_lateral['NoticiaCategoria']['nome']; ?>
                            </small>
                            <strong>
                                <?php echo $noticia_lateral['Noticia']['titulo']; ?>
                            </strong>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <?php echo $this->Form->create('Noticia', array('class' => 'form_busca', 'url' => array('controller' => 'noticias', 'action' => 'index'))); ?>
            <?php echo $this->Form->input('titulo', array('label' => false, 'div' => false)); ?>
            <?php echo $this->Form->end('OK'); ?>
        </div>
    <?php } ?>

    <?php if ($config['mostrar_produtos_lateral'] && isset($noticias_lateral)) { ?>
        <div class="produtos busca">
            <h3><?php echo __('Products'); ?></h3>
            <ul>
                <?php foreach ($produtos_lateral as $produto_lateral) { ?>
                    <li>
                        <a href="<?php echo DEFAULT_URL . 'produtos/ver/' . $produto_lateral['Produto']['id'] . '/' . $this->Uteis->slug($produto_lateral['Produto']['nome']); ?>" title="<?php echo $produto_lateral['Produto']['nome']; ?>">
                            <strong>
                                <?php echo $produto_lateral['Produto']['nome']; ?>
                            </strong>
                            <?php
                            if (!empty($produto_lateral['Produto']['valor'])) {
                                echo '<span> R$ ' . number_format($produto_lateral['Produto']['valor'], 2, ',', '') . '</span>';
                            } else {
                                echo '<span>Consulte-nos</span>';
                            }
                            ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <?php echo $this->Form->create('Produto', array('class' => 'form_busca', 'url' => array('controller' => 'produtos', 'action' => 'index'))); ?>
            <?php echo $this->Form->input('nome', array('label' => false, 'div' => false)); ?>
            <?php echo $this->Form->end('OK'); ?>
        </div>
    <?php } ?>

    <?php echo $this->element('banners', array('pin' => 'barra_lateral_meio')); ?>

    <div id="newsletter">
        <h3>Newsletter</h3>
        <?php echo $this->Form->create('Newsletter', array('controller' => 'Newsletters', 'action' => 'add'), array('id' => 'NewsletterAddForm')); ?>
        <fieldset>
            <p>Receba informativos periódicos.</p>
            <?php
            echo $this->Form->input('nome', array('label' => __('Name:')));
            echo $this->Form->input('email', array('label' => __('E-mail:')));
            ?>
        </fieldset>
        <div class="botoes">
            <?php echo $this->Form->end('Cadastrar'); ?>
        </div>
        <?php
        if (!empty($banners[3])) {
            echo 'Banner 3!!';
        }
        ?>
    </div>

    <?php echo $this->element('banners', array('pin' => 'barra_lateral_abaixo')); ?>

</div>