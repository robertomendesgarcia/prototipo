<div id="breadcrumbs">
    <?php
    $url = null;
    if (!empty($categoria_selecionada)) {
        $url = DEFAULT_URL . 'noticias';
        if (!empty($categoria_selecionada['CategoriaPai']['id'])) {
            $this->Html->addCrumb($categoria_selecionada['CategoriaPai']['nome'], DEFAULT_URL . 'noticias/index/' . $categoria_selecionada['CategoriaPai']['id'] . '/' . $this->Uteis->slug($categoria_selecionada['CategoriaPai']['nome']));
        }
        $this->Html->addCrumb($categoria_selecionada['NoticiaCategoria']['nome']);
    }
    echo $this->Html->getCrumbs(' > ', array(
        'text' => 'Notícias',
        'url' => $url,
        'escape' => false
    ));
    ?>
</div>

<h3>Notícias</h3>

<?php if (!empty($noticias)) { ?>
    <ul>
        <?php foreach ($noticias as $noticia) { ?>
            <li>
                <a href="<?php echo DEFAULT_URL . 'noticias/ver/' . $noticia['Noticia']['id'] . '/' . $this->Uteis->slug($noticia['Noticia']['titulo']); ?>" title="<?php echo $noticia['Noticia']['titulo']; ?>">
                    <?php
                    $tamanho = 600;
                    if (!empty($noticia['NoticiaImagem'][0])) {
                        $src = $img . $noticia['NoticiaImagem'][0]['id'] . '.jpg';
                        echo $this->PhpThumb->thumbnail($src, array(
                            'w' => 120, 'h' => 120, 'zc' => 1
                        ));
                    } else {
                        $tamanho = 700;
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
<?php } ?>

<?php echo $this->element('paginacao'); ?>