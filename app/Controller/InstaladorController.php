<?php

App::uses('AppController', 'Controller');

class InstaladorController extends AppController {

    public $name = 'Instalador';
    public $uses = array('Configuracao');

    public function index() {
        $this->layout = 'instalador';
        //$this->redirect($this->passo1());
    }

//    public function passo1() {
//        $this->layout = 'instalador';
//    }
//
//    public function passo2() {
//        $this->layout = 'instalador';
//    }
//
//    public function passo3() {
//        $this->layout = 'instalador';
//    }

}
