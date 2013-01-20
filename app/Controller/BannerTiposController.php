<?php
App::uses('AppController', 'Controller');
/**
 * BannerTipos Controller
 *
 * @property BannerTipo $BannerTipo
 */
class BannerTiposController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BannerTipo->recursive = 0;
		$this->set('bannerTipos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->BannerTipo->id = $id;
		if (!$this->BannerTipo->exists()) {
			throw new NotFoundException(__('Invalid banner tipo'));
		}
		$this->set('bannerTipo', $this->BannerTipo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BannerTipo->create();
			if ($this->BannerTipo->save($this->request->data)) {
				$this->Session->setFlash(__('The banner tipo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner tipo could not be saved. Please, try again.'));
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
		$this->BannerTipo->id = $id;
		if (!$this->BannerTipo->exists()) {
			throw new NotFoundException(__('Invalid banner tipo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BannerTipo->save($this->request->data)) {
				$this->Session->setFlash(__('The banner tipo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner tipo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->BannerTipo->read(null, $id);
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
		$this->BannerTipo->id = $id;
		if (!$this->BannerTipo->exists()) {
			throw new NotFoundException(__('Invalid banner tipo'));
		}
		if ($this->BannerTipo->delete()) {
			$this->Session->setFlash(__('Banner tipo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Banner tipo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BannerTipo->recursive = 0;
		$this->set('bannerTipos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->BannerTipo->id = $id;
		if (!$this->BannerTipo->exists()) {
			throw new NotFoundException(__('Invalid banner tipo'));
		}
		$this->set('bannerTipo', $this->BannerTipo->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BannerTipo->create();
			if ($this->BannerTipo->save($this->request->data)) {
				$this->Session->setFlash(__('The banner tipo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner tipo could not be saved. Please, try again.'));
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
		$this->BannerTipo->id = $id;
		if (!$this->BannerTipo->exists()) {
			throw new NotFoundException(__('Invalid banner tipo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BannerTipo->save($this->request->data)) {
				$this->Session->setFlash(__('The banner tipo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner tipo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->BannerTipo->read(null, $id);
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
		$this->BannerTipo->id = $id;
		if (!$this->BannerTipo->exists()) {
			throw new NotFoundException(__('Invalid banner tipo'));
		}
		if ($this->BannerTipo->delete()) {
			$this->Session->setFlash(__('Banner tipo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Banner tipo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
