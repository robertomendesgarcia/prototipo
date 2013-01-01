<?php

App::uses('AppController', 'Controller', 'ProdutoCategoria');

class ProdutoCategoriasController extends AppController {

    public function admin_index() {
        $categorias = $this->ProdutoCategoria->generateTreeList(null, null, null, '&nbsp;&nbsp;&nbsp;&nbsp;');
        $this->set('categorias', $categorias);
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->ProdutoCategoria->create();
            if ($this->ProdutoCategoria->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }

        $lista_categorias = $this->ProdutoCategoria->find('list', array('fields' => array('id', 'nome')));
        $this->set('lista_categorias', $lista_categorias);
        $this->render('edit');
    }

    public function admin_edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $categoria = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Your post has been updated.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update your post.');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }

}
