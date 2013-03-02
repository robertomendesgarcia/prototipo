<?php

App::uses('AppController', 'Controller');

class InstaladorController extends AppController {

    public $uses = array('Configuracao');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'instalador';
    }

    public function index() {
        $this->layout = 'instalador';
        //$this->redirect($this->passo1());
    }

    public function criar_usuario_admin() {

        if ($this->request->is('post')) {
            $this->loadModel('Usuario');
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }

        $this->render('criar_usuario_admin');
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
