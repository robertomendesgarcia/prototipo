<?php
$imagens = ($this->params['controller'] == 'noticias') ? $noticia['NoticiaImagem'] : $produto['ProdutoImagem'];

if (!empty($imagens)) {
    ?>


    <fieldset class="galeria">
        <legend><?php echo __('Galeria'); ?></h2></legend>

        <ul>

            <?php foreach ($imagens as $imagem) { ?>

                <li>


                    <?php
                    $src = $img . $imagem['id'] . '.jpg';
                    echo $this->PhpThumb->thumbnail($src, array(
                        'w' => 100, 'h' => 100, 'zc' => 1
                    ));

//            $t = '<a href="' . DEFAULT_URL . $this->params['controller'] . '/excluir-imagem/' . $imagem['id'] . '" title="' . __('Excluir') . '">';
//            $t = $t . __('Excluir');
//            $t = $t . '</a>';
                    ?>
                    <?php // echo $this->Form->postLink(__('Delete'), array('controller' => $this->params['controller'], 'action' => 'excluir_imagem', $imagem['id']), array('class' => 'botao'), __('Deseja realmente excluir esta imagem?', $imagem['id'])); ?>

                    <a class="excluir" href="<?php echo DEFAULT_URL . $this->params['controller'] . '/excluir-imagem/' . $imagem['id']; ?>" title="<?php echo __('Excluir'); ?>">
                        <?php echo __('Excluir'); ?>
                    </a>

                </li>

            <?php } ?>

        </ul>

    </fieldset>

<?php } ?>