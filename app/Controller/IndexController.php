<?php

App::uses('AppIndexController', 'Controller');

class IndexController extends AppIndexController {

    public function index() {

//        Status null: nunca foi utilizado, então vai para o instalador;
//        Status 1: indica que terminou o instalador;
//        Status 2: indica que terminou o Wizard;

        if (file_exists("../Config/status_instalacao.cfg")) {
            $handle = fopen("../Config/status_instalacao.cfg", "r+");
        } else {
            $handle = fopen("../Config/status_instalacao.cfg", "w+");
        }
        $status = fread($handle, 10);
        fclose($handle);

//        die($status . ' !!');

        switch ($status) {
            case null:
//                $status = '1';
//                if (fwrite($handle, $status) === FALSE) {
//                    $this->Session->setFlash(__('Não foi possível escrever no arquivo.'), 'flash_message', array('tipo' => 'error'), 'admin');
//                } else {
////                    $this->Session->setFlash(__('Status salvo com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
//                }
                $this->redirect(array(
                    'controller' => 'instalador',
                    'action' => 'configuraBanco'
                ));
                break;
            case '1':
                $this->redirect(array(
                    'controller' => 'usuarios',
                    'action' => 'login'
                ));
                break;
            default:
                $this->redirect(array(
                    'controller' => 'paginas',
                    'action' => 'capa'
                ));
                break;
        }
    }

}

