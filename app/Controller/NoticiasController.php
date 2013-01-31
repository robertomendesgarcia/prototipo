<?php

App::uses('AppController', 'Controller');

/**
 * Noticias Controller
 *
 * @property Noticia $Noticia
 */
class NoticiasController extends AppController {
    
//    public $helpers = array('Fck');
    
    /**
     * index method
     *
     * @return void
     */
//    public function index() {
//        $this->Noticia->recursive = 0;
//        $this->set('noticias', $this->paginate());
//        $this->set('title_for_layout', __('News') . ' - ' . $this->title_for_layout);
//    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
//	public function view($id = null) {
//		$this->Noticia->id = $id;
//		if (!$this->Noticia->exists()) {
//			throw new NotFoundException(__('Invalid noticia'));
//		}
//		$this->set('noticia', $this->Noticia->read(null, $id));
//	}

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Noticia->recursive = 0;
        $this->set('noticias', $this->paginate());
        $this->set('title_for_layout', __('News') . ' - ' . $this->title_for_layout);
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
//    public function admin_view($id = null) {
//        $this->Noticia->id = $id;
//        if (!$this->Noticia->exists()) {
//            throw new NotFoundException(__('Invalid noticia'));
//        }
//        $this->set('noticia', $this->Noticia->read(null, $id));
//    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            
            print_r('<pre>');
            print_r($_FILES);exit;
            print_r('</pre>');
            
            $this->Noticia->create();
            if ($this->Noticia->save($this->request->data)) {
                $this->Session->setFlash(__('The noticia has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The noticia could not be saved. Please, try again.'));
            }
        }

        $this->loadModel('NoticiaCategoria');
        $categorias = $this->NoticiaCategoria->find('list', array(
            'conditions' => array(
                'NoticiaCategoria.ativo' => 1
            )
                ));
        $this->set(compact('categorias'));
        $this->set('title_for_layout', __('Add New News') . ' - ' . $this->title_for_layout);
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
//    public function admin_edit($id = null) {
//        $this->Noticia->id = $id;
//        if (!$this->Noticia->exists()) {
//            throw new NotFoundException(__('Invalid noticia'));
//        }
//        if ($this->request->is('post') || $this->request->is('put')) {
//            if ($this->Noticia->save($this->request->data)) {
//                $this->Session->setFlash(__('The noticia has been saved'));
//                $this->redirect(array('action' => 'index'));
//            } else {
//                $this->Session->setFlash(__('The noticia could not be saved. Please, try again.'));
//            }
//        } else {
//            $this->request->data = $this->Noticia->read(null, $id);
//        }
//        $categorias = $this->Noticia->Categorium->find('list');
//        $this->set(compact('categorias'));
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
//        $this->Noticia->id = $id;
//        if (!$this->Noticia->exists()) {
//            throw new NotFoundException(__('Invalid noticia'));
//        }
//        if ($this->Noticia->delete()) {
//            $this->Session->setFlash(__('Noticia deleted'));
//            $this->redirect(array('action' => 'index'));
//        }
//        $this->Session->setFlash(__('Noticia was not deleted'));
//        $this->redirect(array('action' => 'index'));
//    }
}
