<?php
App::uses('AppController', 'Controller');
/**
 * Produtos Controller
 *
 * @property Produto $Produto
 */
class ProdutosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Produto->recursive = 0;
		$this->set('produtos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Produto->id = $id;
		if (!$this->Produto->exists()) {
			throw new NotFoundException(__('Invalid produto'));
		}
		$this->set('produto', $this->Produto->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Produto->create();
			if ($this->Produto->save($this->request->data)) {
				$this->Session->setFlash(__('The produto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produto could not be saved. Please, try again.'));
			}
		}
		$categorias = $this->Produto->Categorium->find('list');
		$this->set(compact('categorias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Produto->id = $id;
		if (!$this->Produto->exists()) {
			throw new NotFoundException(__('Invalid produto'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Produto->save($this->request->data)) {
				$this->Session->setFlash(__('The produto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produto could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Produto->read(null, $id);
		}
		$categorias = $this->Produto->Categorium->find('list');
		$this->set(compact('categorias'));
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
		$this->Produto->id = $id;
		if (!$this->Produto->exists()) {
			throw new NotFoundException(__('Invalid produto'));
		}
		if ($this->Produto->delete()) {
			$this->Session->setFlash(__('Produto deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Produto was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Produto->recursive = 0;
		$this->set('produtos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Produto->id = $id;
		if (!$this->Produto->exists()) {
			throw new NotFoundException(__('Invalid produto'));
		}
		$this->set('produto', $this->Produto->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Produto->create();
			if ($this->Produto->save($this->request->data)) {
				$this->Session->setFlash(__('The produto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produto could not be saved. Please, try again.'));
			}
		}
		$categorias = $this->Produto->Categorium->find('list');
		$this->set(compact('categorias'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Produto->id = $id;
		if (!$this->Produto->exists()) {
			throw new NotFoundException(__('Invalid produto'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Produto->save($this->request->data)) {
				$this->Session->setFlash(__('The produto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produto could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Produto->read(null, $id);
		}
		$categorias = $this->Produto->Categorium->find('list');
		$this->set(compact('categorias'));
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
		$this->Produto->id = $id;
		if (!$this->Produto->exists()) {
			throw new NotFoundException(__('Invalid produto'));
		}
		if ($this->Produto->delete()) {
			$this->Session->setFlash(__('Produto deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Produto was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
