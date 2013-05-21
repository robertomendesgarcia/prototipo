<?php

if (!empty($pin)) {

    $banners = $this->Session->read('__Banners');

    if (!empty($banners)) {
//        $width = 170;
//        $height = null;
//        if ($pin == 'centro') {
//            $width = null;
//            $height = 100;
//        }
//        if ($pin == 'capa') {
//            $width = null;
//            $height = 200;
//        }

        if (array_key_exists($pin, $banners)) {

            $banner = $banners[$pin];

            echo '<div class="banners ' . $pin . '">';

            if (!empty($banner['link'])) {
                echo '<a id="banner_' . $pin . '" href="' . $banner['link'] . '" title="' . $banner['descricao'] . '">';
            }

            $arquivo = $banners['path'] . $banner['arquivo'];
            if (file_exists($arquivo)) {

                if (substr($arquivo, -3) == 'swf') {

                    echo "<div id='banner_swf'></div><script type='text/javascript'> 
                        $('#banner_swf').flash({
                            src: '" . DEFAULT_URL . $arquivo . "',
                            width: 320,
                            height: 240
                        });
                        </script>";
                } else {

//                if () {
                    echo $this->PhpThumb->thumbnail($arquivo, array());
//            'w' => $width, 'h' => $height, 'zc' => 1                
                }
            }

            if (!empty($banner['link'])) {
                echo '</a>';
            }

            echo '</div>';
        }
    }
}
?>