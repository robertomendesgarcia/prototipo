

<ul>

    <?php foreach ($produtos as $produto) { ?>
        <li>

            <?php
            if (!empty($produto['ProdutoImagem'][0])) {
                $src = $img . $produto['ProdutoImagem'][0]['id'] . '.jpg';
                echo $this->PhpThumb->thumbnail($src, array(
                    'w' => 100, 'h' => 100, 'zc' => 1
                ));
            }
            ?>

            <small><?php echo $produto['ProdutoCategoria']['nome']; ?></small>
            <strong><?php echo $produto['Produto']['nome']; ?></strong>
            <p><?php echo $produto['Produto']['descricao']; ?></p>
            <?php
            if (!empty($produto['Produto']['valor'])) {
                echo '<span> R$ ' . $produto['Produto']['valor'] . '</span>';
            }
            ?>

        </li>
    <?php } ?>

</ul>

<?php echo $this->element('paginacao'); ?>