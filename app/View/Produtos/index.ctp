<?php echo $this->element('breadcrumbs'); ?>

<h3>Produtos</h3>


<ul class="listagem">

    <?php foreach ($produtos as $produto) { ?>
        <li>
            <a href="<?php echo DEFAULT_URL . "produtos/ver/" . $produto['Produto']['id'] . "/" . $this->Uteis->slug($produto['Produto']['nome']); ?>" title="<?php echo $produto['Produto']['nome']; ?>">
                <?php
                if (!empty($produto['ProdutoImagem'][0])) {
                    $src = $img . $produto['ProdutoImagem'][0]['id'] . '.jpg';
                    echo $this->PhpThumb->thumbnail($src, array(
                        'w' => 150, 'h' => 150, 'zc' => 1
                    ));
                }
                ?>

                <small><?php echo $produto['ProdutoCategoria']['nome']; ?></small>
                <strong><?php echo $produto['Produto']['nome']; ?></strong>
                <p><?php echo $produto['Produto']['descricao']; ?></p>
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

<?php echo $this->element('paginacao'); ?>