<?php

App::uses('Component', 'Controller');

class UteisComponent extends Component {

    static function slug($str) {
        $str = strtolower(trim($str));
        $str = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str = preg_replace('/-+/', "-", $str);
        return $str;
    }

    static function truncate($str, $len, $end = '...') {
        return substr($str, 0, strrpos(substr($str, 0, $len), ' ')) . $end;
    }

}
