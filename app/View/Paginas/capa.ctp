<?php echo $this->element('banners', array('pin' => 'capa')); ?>

<?php if (!empty($a_empresa)) { ?>
    <div class="a-empresa esquerda">
        <h3><?php echo $a_empresa['Pagina']['titulo']; ?></h3>
        <p><?php echo $this->Uteis->truncate(strip_tags($a_empresa['Pagina']['texto']), 600); ?></p>
        <a href="<?php echo DEFAULT_URL . 'paginas/' . $a_empresa['Pagina']['pin'] . '/' . $this->Uteis->slug($a_empresa['Pagina']['titulo']); ?>" title="leia mais">leia mais</a>
    </div>
<?php } ?>

<?php if (!empty($noticias)) { ?>
    <div class="noticias">
        <h3>Notícias</h3>
        <ul>
            <?php foreach ($noticias as $noticia) { ?>
                <li>
                    <a href="<?php echo DEFAULT_URL . 'noticias/ver/' . $noticia['Noticia']['id'] . '/' . $this->Uteis->slug($noticia['Noticia']['titulo']); ?>" title="<?php echo $noticia['Noticia']['titulo']; ?>">
                        <?php
                        $tamanho = 140;
                        if (!empty($noticia['NoticiaImagem'][0])) {
                            $src = $img_noticias . $noticia['NoticiaImagem'][0]['id'] . '.jpg';
                            echo $this->PhpThumb->thumbnail($src, array(
                                'w' => 90, 'h' => 90, 'zc' => 1
                            ));
                        } else {
                            $tamanho = 230;
                        }
                        ?>
                        <small><?php echo date("d/m/Y", strtotime($noticia['Noticia']['data'])); ?> - <?php echo $noticia['NoticiaCategoria']['nome']; ?></small>
                        <strong><?php echo $noticia['Noticia']['titulo']; ?></strong>
                        <span><?php echo $this->Uteis->truncate(strip_tags($noticia['Noticia']['texto']), $tamanho); ?></span>
                        <em>leia mais</em>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<?php if (!empty($produtos)) { ?>

    <div class="produtos esquerda">

        <h3>Produtos</h3>

        <ul class="listagem">

            <?php foreach ($produtos as $produto) { ?>

                <li>

                    <?php
                    if (!empty($produto['NoticiaImagem'][0])) {
                        $src = $img_produtos . $produto['ProdutoImagem'][0]['id'] . '.jpg';
                        echo $this->PhpThumb->thumbnail($src, array(
                            'w' => 100, 'h' => 100, 'zc' => 1
                        ));
                    }
                    ?>

                    <small><?php echo $produto['ProdutoCategoria']['nome']; ?></small>
                    <strong><?php echo $produto['Produto']['nome']; ?></strong>
                    <p><?php echo $produto['Produto']['descricao']; ?></p>
                </li>


            <?php } ?>

        </ul>

    </div>

<?php } ?>