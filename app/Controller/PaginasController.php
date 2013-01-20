<?php
App::uses('AppController', 'Controller');
/**
 * Paginas Controller
 *
 * @property Pagina $Pagina
 */
class PaginasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Pagina->recursive = 0;
		$this->set('paginas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Pagina->id = $id;
		if (!$this->Pagina->exists()) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		$this->set('pagina', $this->Pagina->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pagina->create();
			if ($this->Pagina->save($this->request->data)) {
				$this->Session->setFlash(__('The pagina has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pagina could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Pagina->id = $id;
		if (!$this->Pagina->exists()) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pagina->save($this->request->data)) {
				$this->Session->setFlash(__('The pagina has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pagina could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Pagina->read(null, $id);
		}
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
		$this->Pagina->id = $id;
		if (!$this->Pagina->exists()) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		if ($this->Pagina->delete()) {
			$this->Session->setFlash(__('Pagina deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Pagina was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Pagina->recursive = 0;
		$this->set('paginas', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Pagina->id = $id;
		if (!$this->Pagina->exists()) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		$this->set('pagina', $this->Pagina->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Pagina->create();
			if ($this->Pagina->save($this->request->data)) {
				$this->Session->setFlash(__('The pagina has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pagina could not be saved. Please, try again.'));
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
		$this->Pagina->id = $id;
		if (!$this->Pagina->exists()) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pagina->save($this->request->data)) {
				$this->Session->setFlash(__('The pagina has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pagina could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Pagina->read(null, $id);
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
		$this->Pagina->id = $id;
		if (!$this->Pagina->exists()) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		if ($this->Pagina->delete()) {
			$this->Session->setFlash(__('Pagina deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Pagina was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
