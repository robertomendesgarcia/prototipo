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
//        $this->NoticiaCategoria->recursive = 0;
//        $this->set('categorias', $this->paginate());

        $categorias = $this->NoticiaCategoria->generateTreeList(null, null, null, '&nbsp;&nbsp;&nbsp;&nbsp;');
        $this->set('categorias', $categorias);
        
        $ativos = $this->NoticiaCategoria->find('list', array('fields' => array('id', 'ativo')));
        $this->set('ativos', $ativos);
        
        $this->set('title_for_layout', __('Categories for News') . ' - ' . $this->title_for_layout);
        
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
//    public function admin_view($id = null) {
//        $this->NoticiaCategoria->id = $id;
//        if (!$this->NoticiaCategoria->exists()) {
//            throw new NotFoundException(__('Invalid noticia categoria'));
//        }
//        $this->set('noticiaCategoria', $this->NoticiaCategoria->read(null, $id));
//    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->NoticiaCategoria->create();
            if ($this->NoticiaCategoria->save($this->request->data)) {
                $this->Session->setFlash(__('The noticia categoria has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The noticia categoria could not be saved. Please, try again.'));
            }
        }
//        $noticiaCategorias = $this->NoticiaCategoria->NoticiaCategorium->find('list');
        $noticiaCategorias = $this->NoticiaCategoria->find('list');
        $this->set(compact('noticiaCategorias'));
//        $lista_categorias = $this->NoticiaCategoria->find('list', array('fields' => array('id', 'nome')));
//        $this->set('lista_categorias', $lista_categorias);
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
//    public function admin_edit($id = null) {
//        $this->NoticiaCategoria->id = $id;
//        if (!$this->NoticiaCategoria->exists()) {
//            throw new NotFoundException(__('Invalid noticia categoria'));
//        }
//        if ($this->request->is('post') || $this->request->is('put')) {
//            if ($this->NoticiaCategoria->save($this->request->data)) {
//                $this->Session->setFlash(__('The noticia categoria has been saved'));
//                $this->redirect(array('action' => 'index'));
//            } else {
//                $this->Session->setFlash(__('The noticia categoria could not be saved. Please, try again.'));
//            }
//        } else {
//            $this->request->data = $this->NoticiaCategoria->read(null, $id);
//        }
//        $noticiaCategorias = $this->NoticiaCategoria->NoticiaCategorium->find('list');
//        $this->set(compact('noticiaCategorias'));
//    }

    /**
     * admin_delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
//    public function admin_delete($id = null) {
//        if (!$this->request->is('post')) {
//            throw new MethodNotAllowedException();
//        }
//        $this->NoticiaCategoria->id = $id;
//        if (!$this->NoticiaCategoria->exists()) {
//            throw new NotFoundException(__('Invalid noticia categoria'));
//        }
//        if ($this->NoticiaCategoria->delete()) {
//            $this->Session->setFlash(__('Noticia categoria deleted'));
//            $this->redirect(array('action' => 'index'));
//        }
//        $this->Session->setFlash(__('Noticia categoria was not deleted'));
//        $this->redirect(array('action' => 'index'));
//    }
}