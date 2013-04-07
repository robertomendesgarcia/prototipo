<?php

App::uses('AppController', 'Controller');

class NewslettersController extends AppController {

    public function admin_index() {
        $options = array(
            'order' => array(
                array('Newsletter.nome' => 'ASC'),
            ),
            'limit' => 10
        );

        $this->paginate = $options;
        $newsletters = $this->paginate('Newsletter');

        $this->set('title_for_layout', __('Newsletter') . ' - ' . $this->title_for_layout);
        $this->set(compact('newsletters'));
    }

    public function admin_view($id = null) {
        $this->Newsletter->id = $id;
        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Newsletter inválido.'));
        }
        $this->set('newsletter', $this->Newsletter->read(null, $id));
    }

    public function admin_add() {
        if ($this->request->is('post') && !empty($this->data)) {
            $this->Newsletter->create();
            $this->request->data['Newsletter']['data_inscricao'] = date('Y-m-d H:i:s');
            if ($this->Newsletter->save($this->request->data)) {
                $this->Newsletter->save($this->data);
                $this->Session->setFlash(__('Newsletter salvo com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Erro ao salvar o newsletter.'), 'flash_message', array('tipo' => 'error'), 'admin');
            }
        }
        $this->set('title_for_layout', __('Newsletter') . ' - ' . $this->title_for_layout);
    }

    public function admin_edit($id = null) {
        $this->Newsletter->id = $id;
        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Newsletter inválido.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Newsletter->save($this->request->data)) {
                $this->Session->setFlash(__('Newsletter salvo com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Erro ao salvar o newsletter.'), 'flash_message', array('tipo' => 'error'), 'admin');
            }
        } else {
            $this->request->data = $this->Newsletter->read(null, $id);
        }
    }

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Newsletter->id = $id;
        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Newsletter inválido.'));
        }
        if ($this->Newsletter->delete()) {
            $this->Session->setFlash(__('Newsletter excluído com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Erro ao excluir o newsletter.'), 'flash_message', array('tipo' => 'error'), 'admin');
        $this->redirect(array('action' => 'index'));
    }

    public function add() {
        if ($this->request->is('post') && !empty($this->data)) {
            $this->Newsletter->create();
            $this->request->data['Newsletter']['data_inscricao'] = date('Y-m-d H:i:s');
            if ($this->Newsletter->save($this->request->data)) {
                $this->Newsletter->save($this->data);
                $this->Session->setFlash(__('Newsletter salvo com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
            } else {
                $this->Session->setFlash(__('Erro ao salvar o newsletter.'), 'flash_message', array('tipo' => 'error'), 'admin');
            }
        }
        $this->redirect($this->referer());
    }

}
