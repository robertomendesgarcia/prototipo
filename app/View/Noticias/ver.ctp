<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

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

