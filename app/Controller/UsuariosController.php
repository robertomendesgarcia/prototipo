<?php

App::uses('AppController', 'Controller');

class UsuariosController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('add', 'logout');
        $this->layout = 'admin';
    }

    public function login() {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect());
        } else {
            $this->Session->setFlash(__('Invalid usuario or senha, try again'));
        }
    }
//
//    public function logout() {
//        $this->redirect($this->Auth->logout());
//    }
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
            if ($this->Usuario->validaLogin($this->request->data['usuario'])) {
                $this->Usuario->create();
                if ($this->Usuario->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('This \'user\' already exists. Please inform another.'));
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
}

