<?php
App::uses('AppController', 'Controller');
/**
 * Configuracos Controller
 *
 * @property Configuraco $Configuraco
 */
class ConfiguracosController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Configuraco->recursive = 0;
		$this->set('configuracos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Configuraco->id = $id;
		if (!$this->Configuraco->exists()) {
			throw new NotFoundException(__('Invalid configuraco'));
		}
		$this->set('configuraco', $this->Configuraco->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Configuraco->create();
			if ($this->Configuraco->save($this->request->data)) {
				$this->Session->setFlash(__('The configuraco has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configuraco could not be saved. Please, try again.'));
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
		$this->Configuraco->id = $id;
		if (!$this->Configuraco->exists()) {
			throw new NotFoundException(__('Invalid configuraco'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Configuraco->save($this->request->data)) {
				$this->Session->setFlash(__('The configuraco has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configuraco could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Configuraco->read(null, $id);
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
		$this->Configuraco->id = $id;
		if (!$this->Configuraco->exists()) {
			throw new NotFoundException(__('Invalid configuraco'));
		}
		if ($this->Configuraco->delete()) {
			$this->Session->setFlash(__('Configuraco deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Configuraco was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
