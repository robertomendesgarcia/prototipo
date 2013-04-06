<small><?php echo $produto['ProdutoCategoria']['nome']; ?></small>
<strong><?php echo $produto['Produto']['nome']; ?></strong>
<p><?php echo $produto['Produto']['descricao']; ?></p>
<?php
if (!empty($produto['Produto']['valor'])) {
    echo '<span> R$ ' . number_format( $produto['Produto']['valor'], 2, ',', '') . '</span>';
}
?>

<?php echo $this->element('galeria'); ?>