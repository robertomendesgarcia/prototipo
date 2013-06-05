<div id="breadcrumbs">
    <?php
    if (!empty($noticia['NoticiaCategoria']['CategoriaPai']['id'])) {
        $this->Html->addCrumb($noticia['NoticiaCategoria']['CategoriaPai']['nome'], DEFAULT_URL . 'noticias/index/' . $noticia['NoticiaCategoria']['CategoriaPai']['id'] . '/' . $this->Uteis->slug($noticia['NoticiaCategoria']['CategoriaPai']['nome']));
    }

    $this->Html->addCrumb($noticia['NoticiaCategoria']['nome']);

    echo $this->Html->getCrumbs(' > ', array(
        'text' => 'Notícias',
        'url' => DEFAULT_URL . 'noticias',
        'escape' => false
    ));
    ?>
</div>

<?php if (!empty($noticia)) { ?>

    <span class="categoria"><?php echo date("d/m/Y", strtotime($noticia['Noticia']['data'])); ?> - <?php echo $noticia['NoticiaCategoria']['nome']; ?></span>
    <h3><?php echo $noticia['Noticia']['titulo']; ?></h3>

    <?php echo $noticia['Noticia']['texto']; ?>

    <?php if (!empty($noticia['Noticia']['fonte'])) { ?>
        <p class="fonte">Fonte: <?php echo $noticia['Noticia']['fonte']; ?></p>
    <?php } ?>

    <?php echo $this->element('galeria'); ?>

<?php } else { ?>
    <p>Notícia não encontrada...</p>        
<?php } ?>

<a class="ver_mais" href="<?php echo DEFAULT_URL; ?>noticias" title="<< Ver outras notícias"><< Ver outras notícias</a>

