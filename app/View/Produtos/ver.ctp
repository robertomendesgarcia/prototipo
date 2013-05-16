<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php if (!empty($produto)) { ?>

    <span class="categoria"><?php echo $produto['ProdutoCategoria']['nome']; ?></span>
    <h3><?php echo $produto['Produto']['nome']; ?></h3>

    <div class="informacoes">

        <?php
        if (!empty($img_destaque)) {
            $src = $img['path'] . $img_destaque['id'] . '.jpg';
            echo $this->PhpThumb->thumbnail($src, array(
                'w' => 200, 'h' => 200, 'zc' => 1
            ));
        }
        ?>

        <p><?php echo nl2br($produto['Produto']['descricao']); ?></p>

        <?php
        if (!empty($produto['Produto']['valor'])) {
            echo '<span> R$ ' . number_format($produto['Produto']['valor'], 2, ',', '') . '</span>';
        } else {
            echo '<span>Consulte-nos</span>';
        }
        ?>

    </div>

    <?php echo $this->element('galeria'); ?>

<?php } else { ?>
    <p>Produto não encontrada...</p>        
<?php } ?>

<a class="ver_mais" href="<?php echo DEFAULT_URL; ?>produtos" title="<< Ver outros produtos"><< Ver outros produtos</a>

