<?php

App::uses('AppController', 'Controller');

class BannerTiposController extends AppController {

    public function admin_index() {
        $this->BannerTipo->recursive = 0;
        $this->set('bannerTipos', $this->paginate());
        $this->set('title_for_layout', __('Banner Types') . ' - ' . $this->title_for_layout);
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->BannerTipo->create();
            if ($this->BannerTipo->save($this->request->data)) {
                $this->Session->setFlash(__('Tipo salvo com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Erro ao salvar o tipo.'), 'flash_message', array('tipo' => 'error'), 'admin');
            }
        }
        $this->set('title_for_layout', __('New Banner Type') . ' - ' . $this->title_for_layout);
    }

    public function admin_edit($id = null) {
        $this->BannerTipo->id = $id;
        if (!$this->BannerTipo->exists()) {
            throw new NotFoundException(__('Tipo inválido!'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->BannerTipo->save($this->request->data)) {
                $this->Session->setFlash(__('Tipo salvo com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Erro ao salvar o tipo.'), 'flash_message', array('tipo' => 'error'), 'admin');
            }
        } else {
            $this->request->data = $this->BannerTipo->read(null, $id);
        }
        $this->set('title_for_layout', __('Edit Banner Type') . ' - ' . $this->title_for_layout);
    }

    public function admin_delete($id = null) {

        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        $this->BannerTipo->id = $id;

        try {
            if (!$this->BannerTipo->exists()) {
                throw new NotFoundException(__('Tipo inválido.'));
            }
            if ($this->BannerTipo->delete()) {
                $this->Session->setFlash(__('Tipo excluído com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            }
        } catch (Exception $exc) {
            $exc->getTraceAsString();
            // TODO retonar um erro em um popup ao usuario informando o registro duplicado
        }

//        $this->Session->setFlash(__('Banner tipo was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
