<?php

if (!empty($pin)) {

    $banners = $this->Session->read('__Banners');

    if (!empty($banners)) {

        $width = 170;
        $height = 170;
        if ($pin == 'centro') {
            $width = 700;
            $height = 100;
        }

        $banner = $banners[$pin];

        echo '<div class="banners">';

        if (!empty($banner['link'])) {
            echo '<a id="banner_' . $pin . '" href="' . $banner['link'] . '" title="' . $banner['descricao'] . '">';
        }

        $arquivo = $banners['path'] . $banner['arquivo'];
        if (file_exists($arquivo)) {
            echo $this->PhpThumb->thumbnail($arquivo, array(
                'w' => $width, 'h' => $height, 'zc' => 1
            ));
        }

        if (!empty($banner['link'])) {
            echo '</a>';
        }

        echo '</div>';
    }
}
?>