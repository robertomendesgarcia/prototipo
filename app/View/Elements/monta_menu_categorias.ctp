
<?php
$itens_categorias = $itens_produto_categorias;
$controle = 'produtos';
$modelo = 'ProdutoCategoria';
if ($tipo == 'noticias') {
    $itens_categorias = $itens_noticia_categorias;
    $controle = 'noticias';
    $modelo = 'NoticiaCategoria';
}
?>


<?php if (count($itens_categorias) > 0) { ?>

    <ul>

        <?php foreach ($itens_categorias as $cat_pai) { ?>

            <li>
                <a href="<?php echo DEFAULT_URL . $controle . '/index/' . $cat_pai[$modelo]['id'] . '/' . $this->Uteis->slug($cat_pai[$modelo]['nome']); ?>" title="<?php echo $cat_pai[$modelo]['nome']; ?>"><?php echo $cat_pai[$modelo]['nome']; ?></a>            

                <?php if (!empty($cat_pai['CategoriaFilha'])) { //pr($itens_produto_categorias); exit;     ?>

                    <ul>

                        <?php foreach ($cat_pai['CategoriaFilha'] as $cat_filha) { ?>

                            <li>
                                <a href="<?php echo DEFAULT_URL . $controle . '/index/' . $cat_filha['id'] . '/' . $this->Uteis->slug($cat_filha['nome']); ?>" title="<?php echo $cat_filha['nome']; ?>"><?php echo $cat_filha['nome']; ?></a>      
                            </li>

                            <?php if (!empty($cat_filha[0])) { ?>

                                <?php for ($i = 0; $i < 5; $i++) { ?>

                                    <?php if ((!empty($cat_filha[$i])) && (is_array($cat_filha[$i]))) { //pr($cat_filha[$i]); //exit;      ?>

                                        <ul>

                                            <li>
                                                <a href="<?php echo DEFAULT_URL . $controle . '/index/' . $cat_filha[$i]['id'] . '/' . $this->Uteis->slug($cat_filha[$i]['nome']); ?>" title="<?php echo $cat_filha[$i]['nome']; ?>"><?php echo $cat_filha[$i]['nome']; ?></a>      
                                            </li>

                                            <?php foreach ($cat_filha[$i] as $cat_neta) { //pr($cat_neta); echo 'i: ' . $i;   ?>

                                                <?php if ((!empty($cat_neta)) && (is_array($cat_neta))) { //pr($cat_neta); //exit;      ?>
                                                    <ul>

                                                        <li>
                                                            <a href="<?php echo DEFAULT_URL . $controle . '/index/' . $cat_neta['id'] . '/' . $this->Uteis->slug($cat_neta['nome']); ?>" title="<?php echo $cat_neta['nome']; ?>"><?php echo $cat_neta['nome']; ?></a>      
                                                        </li>
                                                    </ul>

                                                <?php } ?>

                                            <?php } ?>

                                        </ul>

                                    <?php } ?>

                                <?php } ?>

                            <?php } ?>

                        <?php } ?>

                    </ul>

                <?php } ?>

            </li>

        <?php } ?>   

    </ul>

<?php } ?>