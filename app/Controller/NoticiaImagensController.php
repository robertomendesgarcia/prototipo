<?php
App::uses('AppController', 'Controller');
/**
 * NoticiaImagens Controller
 *
 * @property NoticiaImagen $NoticiaImagen
 */
class NoticiaImagensController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->NoticiaImagen->recursive = 0;
		$this->set('noticiaImagens', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->NoticiaImagen->id = $id;
		if (!$this->NoticiaImagen->exists()) {
			throw new NotFoundException(__('Invalid noticia imagen'));
		}
		$this->set('noticiaImagen', $this->NoticiaImagen->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->NoticiaImagen->create();
			if ($this->NoticiaImagen->save($this->request->data)) {
				$this->Session->setFlash(__('The noticia imagen has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The noticia imagen could not be saved. Please, try again.'));
			}
		}
		$noticias = $this->NoticiaImagen->Noticium->find('list');
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
		$this->NoticiaImagen->id = $id;
		if (!$this->NoticiaImagen->exists()) {
			throw new NotFoundException(__('Invalid noticia imagen'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->NoticiaImagen->save($this->request->data)) {
				$this->Session->setFlash(__('The noticia imagen has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The noticia imagen could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->NoticiaImagen->read(null, $id);
		}
		$noticias = $this->NoticiaImagen->Noticium->find('list');
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
		$this->NoticiaImagen->id = $id;
		if (!$this->NoticiaImagen->exists()) {
			throw new NotFoundException(__('Invalid noticia imagen'));
		}
		if ($this->NoticiaImagen->delete()) {
			$this->Session->setFlash(__('Noticia imagen deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Noticia imagen was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
