<?php

class UteisHelper extends AppHelper {

    public function slug($str) {
        $str = strtolower(trim($str));
        $str = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str = preg_replace('/-+/', "-", $str);
        return $str;
    }

    function truncate($str, $len, $end = '...') {
        return substr($str, 0, strrpos(substr($str, 0, $len), ' ')) . $end;
    }
    
}
