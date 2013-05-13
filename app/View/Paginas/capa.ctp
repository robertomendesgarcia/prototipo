<?php echo $this->element('banners', array('pin' => 'capa')); ?>

<?php if (!empty($noticias)) { ?>
    <div class="noticias esquerda">
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
                            $tamanho = 200;
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

<div class="direita">
    <?php if (!empty($a_empresa)) { ?>
        <div class="a-empresa">
            <h3><?php echo $a_empresa['Pagina']['titulo']; ?></h3>
            <p><?php echo $this->Uteis->truncate(strip_tags($a_empresa['Pagina']['texto']), 600); ?></p>
            <a href="<?php echo DEFAULT_URL . 'paginas/' . $a_empresa['Pagina']['pin'] . '/' . $this->Uteis->slug($a_empresa['Pagina']['titulo']); ?>" title="leia mais">leia mais</a>
        </div>
    <?php } ?>
    <?php if (!empty($config['usa_trabalhe_conosco'])) { ?>
        <div class="trabalhe_conosco">
            <h3>Trabalhe Conosco</h3>
            <img src="<?php echo DEFAULT_URL . 'img/venha_trabalhar.jpg'; ?>" style="width:100px;" alt="Trabalhe Conosco" />
            <!-- p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p -->
            <p>Venha fazer parte da nossa equipe!</p>
            <a href="<?php echo DEFAULT_URL . 'trabalhe-conosco'; ?>" title="Clique aqui e envie seu currículo.">Clique aqui e envie seu currículo.</a>
        </div>
    <?php } ?>
</div>

<?php if (!empty($produtos)) { ?>
    <div class="produtos">
        <h3>Produtos</h3>
        <ul class="listagem">
            <?php foreach ($produtos as $produto) { ?>
                <li>
                    <a href="<?php echo DEFAULT_URL . 'produtos/ver/' . $produto['Produto']['id'] . '/' . $this->Uteis->slug($produto['Produto']['nome']); ?>" title="<?php echo $produto['Produto']['nome']; ?>">                    
                        <small><?php echo $produto['ProdutoCategoria']['nome']; ?></small>
                        <?php
                        if (!empty($produto['ProdutoImagem'][0])) {
                            $src = $img_produtos . $produto['ProdutoImagem'][0]['id'] . '.jpg';
                            echo $this->PhpThumb->thumbnail($src, array(
                                'w' => 100, 'h' => 100, 'zc' => 1
                            ));
                        }
                        ?>
                        <strong><?php echo $produto['Produto']['nome']; ?></strong>
                        <?php
                        if (!empty($produto['Produto']['valor'])) {
                            echo '<span> R$ ' . number_format($produto['Produto']['valor'], 2, ',', '') . '</span>';
                        } else {
                            echo '<span>Consulte-nos</span>';
                        }
                        ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>