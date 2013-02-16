<?php

App::uses('AppController', 'Controller');

class ProdutosController extends AppController {

      public function admin_index() {
            $options = array(
                'order' => array('Produto.id' => 'DESC'),
                'limit' => 5
            );

            $this->paginate = $options;
            $produtos = $this->paginate('Produto');

            $this->set(compact('produtos'));
            $this->set('title_for_layout', __('Products') . ' - ' . $this->title_for_layout);
      }

      public function admin_view($id = null) {
            $this->Produto->id = $id;
            if (!$this->Produto->exists()) {
                  throw new NotFoundException(__('Invalid produto'));
            }
            $this->set('produto', $this->Produto->read(null, $id));
      }

      public function admin_add() {
            if ($this->request->is('post')) {
                  $this->Produto->create();
                  if ($this->Produto->save($this->request->data)) {
                        $this->Session->setFlash(__('The produto has been saved'));
                        $this->redirect(array('action' => 'index'));
                  } else {
                        $this->Session->setFlash(__('The produto could not be saved. Please, try again.'));
                  }
            }

            $this->loadModel('ProdutoCategoria');
            $categorias = $this->ProdutoCategoria->find('list', array(
                'conditions' => array(
                    'ProdutoCategoria.ativo' => 1
                    )));

            $this->set(compact('categorias'));
            $this->set('title_for_layout', __('Add Product') . ' - ' . $this->title_for_layout);
      }

      public function admin_edit($id = null) {
            $this->Produto->id = $id;
            if (!$this->Produto->exists()) {
                  throw new NotFoundException(__('Invalid produto'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                  if ($this->Produto->save($this->request->data)) {
                        $this->Session->setFlash(__('The produto has been saved'));
                        $this->redirect(array('action' => 'index'));
                  } else {
                        $this->Session->setFlash(__('The produto could not be saved. Please, try again.'));
                  }
            } else {
                  $this->request->data = $this->Produto->read(null, $id);
            }

            $this->loadModel('ProdutoCategoria');
            $categorias = $this->ProdutoCategoria->find('list', array(
                'conditions' => array(
                    'ProdutoCategoria.ativo' => 1
                    )));

            $produto = $this->Produto->findById($id);
            $this->set(compact('categorias', 'produto'));
            $this->set('title_for_layout', __('Edit News') . ' - ' . $this->title_for_layout);
      }

      public function admin_delete($id = null) {
            if (!$this->request->is('post')) {
                  throw new MethodNotAllowedException();
            }
            $this->Produto->id = $id;
            if (!$this->Produto->exists()) {
                  throw new NotFoundException(__('Invalid produto'));
            }
            if ($this->Produto->delete()) {
                  $this->Session->setFlash(__('Produto deleted'));
                  $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Produto was not deleted'));
            $this->redirect(array('action' => 'index'));
      }

}
