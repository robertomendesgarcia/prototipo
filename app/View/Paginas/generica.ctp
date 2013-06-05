<div id="breadcrumbs">
    <?php
    echo $this->Html->getCrumbs(' > ', array(
        'text' => $conteudo['Pagina']['titulo'],
        'url' => null,
        'escape' => false
    ));
    ?>
</div>

<h3><?php echo $conteudo['Pagina']['titulo']; ?></h3>

<?php echo $conteudo['Pagina']['texto']; ?>