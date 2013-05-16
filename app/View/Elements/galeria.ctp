<?php
$imagens = ($this->params['controller'] == 'noticias') ? $noticia['NoticiaImagem'] : $produto['ProdutoImagem'];

if (!empty($imagens)) {
    ?>

    <?php if (isset($this->params['admin'])) { ?>
        <fieldset class="galeria">
            <legend><?php echo __('Galeria'); ?></legend>
        <?php } else { ?>
            <div class="galeria"> 
                <h3>Galeria</h3>
            <?php } ?>  

            <ul>

                <?php foreach ($imagens as $imagem) { ?>

                    <li>

                        <?php
                        $src = $img['path'] . $imagem['id'] . '.jpg';
                        $mini = $this->PhpThumb->thumbnail($src, array(
                            'w' => 100, 'h' => 100, 'zc' => 1
                        ));
                        ?>

                        <a href="<?php echo DEFAULT_URL . $src; ?>" title="<?php echo $imagem['titulo']; ?>">
                            <?php echo $mini; ?>
                        </a>

                        <?php if (isset($this->params['admin'])) { ?>

                            <a class="excluir" href="<?php echo DEFAULT_URL . $this->params['controller'] . '/excluir-imagem/' . $imagem['id']; ?>" title="<?php echo __('Excluir'); ?>">
                                <?php echo __('Excluir'); ?>
                            </a>

                        <?php } ?>

                    </li>

                <?php } ?>

            </ul>


            <?php if (isset($this->params['admin'])) { ?>
        </fieldset>
    <?php } else { ?>
        </div> 
    <?php } ?>  


<?php } ?>