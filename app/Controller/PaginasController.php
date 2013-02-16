<?php

App::uses('AppController', 'Controller');

class PaginasController extends AppController {

      public function admin_index() {
            $this->Pagina->recursive = 0;
            $this->set('paginas', $this->paginate());
            $this->set('title_for_layout', __('Pages Editable') . ' - ' . $this->title_for_layout);
      }

      public function admin_view($id = null) {
            $this->Pagina->id = $id;
            if (!$this->Pagina->exists()) {
                  throw new NotFoundException(__('Invalid pagina'));
            }
            $this->set('pagina', $this->Pagina->read(null, $id));
      }

      public function admin_add() {
            if ($this->request->is('post')) {
                  $this->Pagina->create();
                  if ($this->Pagina->save($this->request->data)) {
                        $this->Session->setFlash(__('The pagina has been saved'));
                        $this->redirect(array('action' => 'index'));
                  } else {
                        $this->Session->setFlash(__('The pagina could not be saved. Please, try again.'));
                  }
            }
            $this->set('title_for_layout', __('Add Page') . ' - ' . $this->title_for_layout);
      }

      public function admin_edit($id = null) {
            $this->Pagina->id = $id;
            if (!$this->Pagina->exists()) {
                  throw new NotFoundException(__('Invalid pagina'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                  if ($this->Pagina->save($this->request->data)) {
                        $this->Session->setFlash(__('The pagina has been saved'));
                        $this->redirect(array('action' => 'index'));
                  } else {
                        $this->Session->setFlash(__('The pagina could not be saved. Please, try again.'));
                  }
            } else {
                  $this->request->data = $this->Pagina->read(null, $id);
            }
            $this->set('title_for_layout', __('Edit Page') . ' - ' . $this->title_for_layout);
      }

      public function admin_delete($id = null) {
            if (!$this->request->is('post')) {
                  throw new MethodNotAllowedException();
            }
            $this->Pagina->id = $id;
            if (!$this->Pagina->exists()) {
                  throw new NotFoundException(__('Invalid pagina'));
            }
            if ($this->Pagina->delete()) {
                  $this->Session->setFlash(__('Pagina deleted'));
                  $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Pagina was not deleted'));
            $this->redirect(array('action' => 'index'));
      }

}
