<?php

App::uses('AppController', 'Controller');

/**
 * NoticiaCategorias Controller
 *
 * @property NoticiaCategoria $NoticiaCategoria
 */
class NoticiaCategoriasController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $categorias = $this->NoticiaCategoria->generateTreeList(null, null, null, '&nbsp;&nbsp;&nbsp;&nbsp;');
        $this->set('categorias', $categorias);

        $ativos = $this->NoticiaCategoria->find('list', array('fields' => array('id', 'ativo')));
        $this->set('ativos', $ativos);

        $this->set('title_for_layout', __('Categories for News') . ' - ' . $this->title_for_layout);
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->NoticiaCategoria->create();
            if ($this->NoticiaCategoria->save($this->request->data)) {
                $this->Session->setFlash(__('Category saved successfully.'), 'flash_message', array('tipo' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                if (empty($this->NoticiaCategoria->validationErrors)) {
                    $this->Session->setFlash(__('The category could not be saved. Please, try again.'), 'flash_message', array('tipo' => 'error'), 'admin');
                }
            }
        }
        $noticiaCategorias = $this->NoticiaCategoria->find('list');
        $this->set(compact('noticiaCategorias'));
        $this->set('title_for_layout', __('Add New Category') . ' - ' . $this->title_for_layout);
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->NoticiaCategoria->id = $id;
        if (!$this->NoticiaCategoria->exists()) {
            throw new NotFoundException(__('Invalid category.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->NoticiaCategoria->save($this->request->data)) {
                $this->Session->setFlash(__('Category saved successfully.'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->NoticiaCategoria->read(null, $id);
        }
        $noticiaCategorias = $this->NoticiaCategoria->find('list');
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
        $this->NoticiaCategoria->id = $id;
        if (!$this->NoticiaCategoria->exists()) {
            throw new NotFoundException(__('Invalid category.'), 'flash_message', array('tipo' => 'warning'), 'admin');
        }
        if ($this->NoticiaCategoria->delete()) {
            $this->Session->setFlash(__('Category successfully deleted.'), 'flash_message', array('tipo' => 'success'), 'admin');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('This category can not be deleted because there are other categories or news related to it.'), 'flash_message', array('tipo' => 'warning'), 'admin');
            $this->redirect(array('action' => 'index'));
        }
    }

}
