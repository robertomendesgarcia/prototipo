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
            throw new NotFoundException(__('Invalid newsletter'));
        }
        $this->set('newsletter', $this->Newsletter->read(null, $id));
    }

    public function admin_add() {
        if ($this->request->is('post') && !empty($this->data)) {
            $this->Newsletter->create();
            $this->request->data['Newsletter']['data_inscricao'] = date('Y-m-d H:i:s');
            if ($this->Newsletter->save($this->request->data)) {
                $this->Newsletter->save($this->data);
                $this->Session->setFlash(__('The newsletter has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The newsletter could not be saved. Please, try again.'));
            }
        }
        $this->set('title_for_layout', __('Newsletter') . ' - ' . $this->title_for_layout);
    }

    public function admin_edit($id = null) {
        $this->Newsletter->id = $id;
        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Invalid newsletter'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Newsletter->save($this->request->data)) {
                $this->Session->setFlash(__('The newsletter has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The newsletter could not be saved. Please, try again.'));
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
            throw new NotFoundException(__('Invalid newsletter'));
        }
        if ($this->Newsletter->delete()) {
            $this->Session->setFlash(__('Newsletter deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Newsletter was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
    
        public function add() {
        if ($this->request->is('post') && !empty($this->data)) {
            $this->Newsletter->create();
            $this->request->data['Newsletter']['data_inscricao'] = date('Y-m-d H:i:s');
            if ($this->Newsletter->save($this->request->data)) {
                $this->Newsletter->save($this->data);
                $this->Session->setFlash(__('The newsletter has been saved'));
            } else {
                $this->Session->setFlash(__('The newsletter could not be saved. Please, try again.'));
            }
        }
                $this->redirect($this->referer());
    }

}
