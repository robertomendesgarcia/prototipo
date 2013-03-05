<?php

App::uses('AppController', 'Controller');

/**
 * ProdutoCategorias Controller
 *
 * @property ProdutoCategoria $ProdutoCategoria
 */
class ProdutoCategoriasController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $categorias = $this->ProdutoCategoria->generateTreeList(null, null, null, '&nbsp;&nbsp;&nbsp;&nbsp;');
        $this->set('categorias', $categorias);

        $ativos = $this->ProdutoCategoria->find('list', array('fields' => array('id', 'ativo')));
        $this->set('ativos', $ativos);

        $this->set('title_for_layout', __('Categories for Products') . ' - ' . $this->title_for_layout);
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->ProdutoCategoria->create();
            if ($this->ProdutoCategoria->save($this->request->data)) {
                $this->Session->setFlash(__('Category saved successfully.'), 'flash_message', array('tipo' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                if (empty($this->ProdutoCategoria->validationErrors)) {
                    $this->Session->setFlash(__('The category could not be saved. Please, try again.'), 'flash_message', array('tipo' => 'error'), 'admin');
                }
            }
        }
        $noticiaCategorias = $this->ProdutoCategoria->find('list');
        $this->set(compact('noticiaCategorias'));
        $this->set('title_for_layout', __('New Category') . ' - ' . $this->title_for_layout);
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->ProdutoCategoria->id = $id;
        if (!$this->ProdutoCategoria->exists()) {
            throw new NotFoundException(__('Invalid category.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ProdutoCategoria->save($this->request->data)) {
                $this->Session->setFlash(__('Category saved successfully.'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->ProdutoCategoria->read(null, $id);
        }
        $noticiaCategorias = $this->ProdutoCategoria->find('list');
        $this->set(compact('noticiaCategorias'));
        $this->set('title_for_layout', __('Edit Category') . ' - ' . $this->title_for_layout);
    }

    /**
     * admin_delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->ProdutoCategoria->id = $id;
        if (!$this->ProdutoCategoria->exists()) {
            throw new NotFoundException(__('Invalid category.'), 'flash_message', array('tipo' => 'warning'), 'admin');
        }
        if ($this->ProdutoCategoria->delete()) {
            $this->Session->setFlash(__('Category successfully deleted.'), 'flash_message', array('tipo' => 'success'), 'admin');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('This category can not be deleted because there are other categories or news related to it.'), 'flash_message', array('tipo' => 'warning'), 'admin');
            $this->redirect(array('action' => 'index'));
        }
    }

}
