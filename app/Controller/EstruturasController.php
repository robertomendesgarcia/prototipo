<?php
App::uses('AppController', 'Controller');
/**
 * Estruturas Controller
 *
 * @property Estrutura $Estrutura
 */
class EstruturasController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Estrutura->recursive = 0;
		$this->set('estruturas', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Estrutura->id = $id;
		if (!$this->Estrutura->exists()) {
			throw new NotFoundException(__('Invalid estrutura'));
		}
		$this->set('estrutura', $this->Estrutura->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Estrutura->create();
			if ($this->Estrutura->save($this->request->data)) {
				$this->Session->setFlash(__('The estrutura has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estrutura could not be saved. Please, try again.'));
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
		$this->Estrutura->id = $id;
		if (!$this->Estrutura->exists()) {
			throw new NotFoundException(__('Invalid estrutura'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Estrutura->save($this->request->data)) {
				$this->Session->setFlash(__('The estrutura has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estrutura could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Estrutura->read(null, $id);
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
		$this->Estrutura->id = $id;
		if (!$this->Estrutura->exists()) {
			throw new NotFoundException(__('Invalid estrutura'));
		}
		if ($this->Estrutura->delete()) {
			$this->Session->setFlash(__('Estrutura deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Estrutura was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
