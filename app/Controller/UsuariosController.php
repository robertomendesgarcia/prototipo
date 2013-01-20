<?php

App::uses('AppController', 'Controller');

class UsuariosController extends AppController {

    function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect(array(
                            'controller' => 'usuarios',
                            'action' => 'bem_vindo',
                            'admin' => true
                        )));
            } else {
                $this->Session->setFlash(__('Your username or password was incorrect.'), 'flash_message', array('tipo' => 'warning'), 'admin');
            }
        }
        $this->layout = 'admin';
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function admin_bem_vindo() {
        die('Bem Vindo!!');
    }

//    public function index() {
//        $this->Usuario->recursive = 0;
//        $this->set('users', $this->paginate());
//    }
//
//    public function view($id = null) {
//        $this->Usuario->id = $id;
//        if (!$this->Usuario->exists()) {
//            throw new NotFoundException(__('Invalid user'));
//        }
//        $this->set('user', $this->Usuario->read(null, $id));
//    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

//
//    public function edit($id = null) {
//        $this->Usuario->id = $id;
//        if (!$this->Usuario->exists()) {
//            throw new NotFoundException(__('Invalid user'));
//        }
//        if ($this->request->is('post') || $this->request->is('put')) {
//            if ($this->Usuario->save($this->request->data)) {
//                $this->Session->setFlash(__('The user has been saved'));
//                $this->redirect(array('action' => 'index'));
//            } else {
//                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
//            }
//        } else {
//            $this->request->data = $this->Usuario->read(null, $id);
//            unset($this->request->data['Usuario']['senha']);
//        }
//    }
//
//    public function delete($id = null) {
//        if (!$this->request->is('post')) {
//            throw new MethodNotAllowedException();
//        }
//        $this->Usuario->id = $id;
//        if (!$this->Usuario->exists()) {
//            throw new NotFoundException(__('Invalid user'));
//        }
//        if ($this->Usuario->delete()) {
//            $this->Session->setFlash(__('Usuario deleted'));
//            $this->redirect(array('action' => 'index'));
//        }
//        $this->Session->setFlash(__('Usuario was not deleted'));
//        $this->redirect(array('action' => 'index'));
//    }

    public function choose_language($language = 'pt-br') {
        $this->Session->write('Config.language', $language);
        $this->redirect($this->referer());
    }

}

