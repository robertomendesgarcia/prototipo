<?php
App::uses('AppController', 'Controller');
/**
 * ProdutoImagens Controller
 *
 * @property ProdutoImagen $ProdutoImagen
 */
class ProdutoImagensController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ProdutoImagen->recursive = 0;
		$this->set('produtoImagens', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->ProdutoImagen->id = $id;
		if (!$this->ProdutoImagen->exists()) {
			throw new NotFoundException(__('Invalid produto imagen'));
		}
		$this->set('produtoImagen', $this->ProdutoImagen->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProdutoImagen->create();
			if ($this->ProdutoImagen->save($this->request->data)) {
				$this->Session->setFlash(__('The produto imagen has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produto imagen could not be saved. Please, try again.'));
			}
		}
		$produtos = $this->ProdutoImagen->Produto->find('list');
		$this->set(compact('produtos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->ProdutoImagen->id = $id;
		if (!$this->ProdutoImagen->exists()) {
			throw new NotFoundException(__('Invalid produto imagen'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProdutoImagen->save($this->request->data)) {
				$this->Session->setFlash(__('The produto imagen has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produto imagen could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ProdutoImagen->read(null, $id);
		}
		$produtos = $this->ProdutoImagen->Produto->find('list');
		$this->set(compact('produtos'));
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
		$this->ProdutoImagen->id = $id;
		if (!$this->ProdutoImagen->exists()) {
			throw new NotFoundException(__('Invalid produto imagen'));
		}
		if ($this->ProdutoImagen->delete()) {
			$this->Session->setFlash(__('Produto imagen deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Produto imagen was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
