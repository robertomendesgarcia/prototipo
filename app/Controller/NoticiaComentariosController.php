<?php
App::uses('AppController', 'Controller');
/**
 * NoticiaComentarios Controller
 *
 * @property NoticiaComentario $NoticiaComentario
 */
class NoticiaComentariosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->NoticiaComentario->recursive = 0;
		$this->set('noticiaComentarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->NoticiaComentario->id = $id;
		if (!$this->NoticiaComentario->exists()) {
			throw new NotFoundException(__('Invalid noticia comentario'));
		}
		$this->set('noticiaComentario', $this->NoticiaComentario->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->NoticiaComentario->create();
			if ($this->NoticiaComentario->save($this->request->data)) {
				$this->Session->setFlash(__('The noticia comentario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The noticia comentario could not be saved. Please, try again.'));
			}
		}
		$noticias = $this->NoticiaComentario->Noticium->find('list');
		$this->set(compact('noticias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->NoticiaComentario->id = $id;
		if (!$this->NoticiaComentario->exists()) {
			throw new NotFoundException(__('Invalid noticia comentario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->NoticiaComentario->save($this->request->data)) {
				$this->Session->setFlash(__('The noticia comentario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The noticia comentario could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->NoticiaComentario->read(null, $id);
		}
		$noticias = $this->NoticiaComentario->Noticium->find('list');
		$this->set(compact('noticias'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->NoticiaComentario->id = $id;
		if (!$this->NoticiaComentario->exists()) {
			throw new NotFoundException(__('Invalid noticia comentario'));
		}
		if ($this->NoticiaComentario->delete()) {
			$this->Session->setFlash(__('Noticia comentario deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Noticia comentario was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->NoticiaComentario->recursive = 0;
		$this->set('noticiaComentarios', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->NoticiaComentario->id = $id;
		if (!$this->NoticiaComentario->exists()) {
			throw new NotFoundException(__('Invalid noticia comentario'));
		}
		$this->set('noticiaComentario', $this->NoticiaComentario->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->NoticiaComentario->create();
			if ($this->NoticiaComentario->save($this->request->data)) {
				$this->Session->setFlash(__('The noticia comentario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The noticia comentario could not be saved. Please, try again.'));
			}
		}
		$noticias = $this->NoticiaComentario->Noticium->find('list');
		$this->set(compact('noticias'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->NoticiaComentario->id = $id;
		if (!$this->NoticiaComentario->exists()) {
			throw new NotFoundException(__('Invalid noticia comentario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->NoticiaComentario->save($this->request->data)) {
				$this->Session->setFlash(__('The noticia comentario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The noticia comentario could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->NoticiaComentario->read(null, $id);
		}
		$noticias = $this->NoticiaComentario->Noticium->find('list');
		$this->set(compact('noticias'));
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
		$this->NoticiaComentario->id = $id;
		if (!$this->NoticiaComentario->exists()) {
			throw new NotFoundException(__('Invalid noticia comentario'));
		}
		if ($this->NoticiaComentario->delete()) {
			$this->Session->setFlash(__('Noticia comentario deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Noticia comentario was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
