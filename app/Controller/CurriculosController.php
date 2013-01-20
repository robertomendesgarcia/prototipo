<?php
App::uses('AppController', 'Controller');
/**
 * Curriculos Controller
 *
 * @property Curriculo $Curriculo
 */
class CurriculosController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Curriculo->recursive = 0;
		$this->set('curriculos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Curriculo->id = $id;
		if (!$this->Curriculo->exists()) {
			throw new NotFoundException(__('Invalid curriculo'));
		}
		$this->set('curriculo', $this->Curriculo->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Curriculo->create();
			if ($this->Curriculo->save($this->request->data)) {
				$this->Session->setFlash(__('The curriculo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The curriculo could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Curriculo->id = $id;
		if (!$this->Curriculo->exists()) {
			throw new NotFoundException(__('Invalid curriculo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Curriculo->save($this->request->data)) {
				$this->Session->setFlash(__('The curriculo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The curriculo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Curriculo->read(null, $id);
		}
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
		$this->Curriculo->id = $id;
		if (!$this->Curriculo->exists()) {
			throw new NotFoundException(__('Invalid curriculo'));
		}
		if ($this->Curriculo->delete()) {
			$this->Session->setFlash(__('Curriculo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Curriculo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
