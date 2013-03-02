<?php
$imagens = ($this->params['controller'] == 'noticias') ? $noticia['NoticiaImagem'] : $produto['ProdutoImagem'];
?>


<ul class="galeria">

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
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'excluir_imagem', $imagem['id']), array('class' => 'botao'), __('Are you sure you want to delete # %s?', $imagem['id'])); ?>


        </li>

    <?php } ?>

</ul>