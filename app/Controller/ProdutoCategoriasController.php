<?php
App::uses('AppController', 'Controller');
/**
 * ProdutoCategorias Controller
 *
 * @property ProdutoCategoria $ProdutoCategoria
 */
class ProdutoCategoriasController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ProdutoCategoria->recursive = 0;
		$this->set('produtoCategorias', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->ProdutoCategoria->id = $id;
		if (!$this->ProdutoCategoria->exists()) {
			throw new NotFoundException(__('Invalid produto categoria'));
		}
		$this->set('produtoCategoria', $this->ProdutoCategoria->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProdutoCategoria->create();
			if ($this->ProdutoCategoria->save($this->request->data)) {
				$this->Session->setFlash(__('The produto categoria has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produto categoria could not be saved. Please, try again.'));
			}
		}
		$parentProdutoCategorias = $this->ProdutoCategoria->ParentProdutoCategorium->find('list');
		$this->set(compact('parentProdutoCategorias'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->ProdutoCategoria->id = $id;
		if (!$this->ProdutoCategoria->exists()) {
			throw new NotFoundException(__('Invalid produto categoria'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProdutoCategoria->save($this->request->data)) {
				$this->Session->setFlash(__('The produto categoria has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produto categoria could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ProdutoCategoria->read(null, $id);
		}
		$parentProdutoCategorias = $this->ProdutoCategoria->ParentProdutoCategorium->find('list');
		$this->set(compact('parentProdutoCategorias'));
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
		$this->ProdutoCategoria->id = $id;
		if (!$this->ProdutoCategoria->exists()) {
			throw new NotFoundException(__('Invalid produto categoria'));
		}
		if ($this->ProdutoCategoria->delete()) {
			$this->Session->setFlash(__('Produto categoria deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Produto categoria was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
