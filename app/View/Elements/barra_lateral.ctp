<div id="barra_lateral">

    <?php
    if (!empty($banners[1])) {
        echo 'Banner 1!!';
    }
    ?>

    <?php
    if ($config['mostrar_noticias_lateral']) {
        echo 'Notícias na lateral!!';
    }
    ?>

    <?php
    if (!empty($banners[2])) {
        echo 'Banner 2!!';
    }
    ?>

    <?php
    if ($config['mostrar_produtos_lateral']) {
        echo 'Produtos na lateral!!';
    }
    ?>

    <?php
    if (!empty($banners[3])) {
        echo 'Banner 3!!';
    }
    ?>

</div>