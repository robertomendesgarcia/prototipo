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
        $this->set('title_for_layout', __('Resumes') . ' - ' . $this->title_for_layout);
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
//	public function admin_view($id = null) {
//		$this->Curriculo->id = $id;
//		if (!$this->Curriculo->exists()) {
//			throw new NotFoundException(__('Invalid curriculo'));
//		}
//		$this->set('curriculo', $this->Curriculo->read(null, $id));
//	}

    /**
     * admin_add method
     *
     * @return void
     */
//	public function admin_add() {
//		if ($this->request->is('post')) {
//			$this->Curriculo->create();
//			if ($this->Curriculo->save($this->request->data)) {
//				$this->Session->setFlash(__('The curriculo has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The curriculo could not be saved. Please, try again.'));
//			}
//		}
//	}

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
//	public function admin_edit($id = null) {
//		$this->Curriculo->id = $id;
//		if (!$this->Curriculo->exists()) {
//			throw new NotFoundException(__('Invalid curriculo'));
//		}
//		if ($this->request->is('post') || $this->request->is('put')) {
//			if ($this->Curriculo->save($this->request->data)) {
//				$this->Session->setFlash(__('The curriculo has been saved'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The curriculo could not be saved. Please, try again.'));
//			}
//		} else {
//			$this->request->data = $this->Curriculo->read(null, $id);
//		}
//	}

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
            throw new NotFoundException(__('Currículo inválido.'));
        }
        if ($this->Curriculo->delete()) {
            $this->Session->setFlash(__('Currículo excluído com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Erro ao excluir o currículo.'), 'flash_message', array('tipo' => 'error'), 'admin');
        $this->redirect(array('action' => 'index'));
    }

    public function admin_download($id) {
        set_time_limit(0);

        $curriculo = $this->Curriculo->find('first', array(
            'conditions' => array(
                'id' => $id
            )
                ));

        if (!empty($curriculo)) {

            $aquivoNome = $curriculo['Curriculo']['arquivo'];
            $arquivoLocal = $this->Curriculo->file['path'] . $aquivoNome;
            if (!file_exists($arquivoLocal)) {
                $this->Session->setFlash(__('Arquivo não encontrado.'), 'flash_message', array('tipo' => 'warning'), 'admin');
            } else {

                $extensao = explode('.', $aquivoNome);
                $extensao = $extensao[count($extensao) - 1];
                $novoNome = $this->Uteis->slug($curriculo['Curriculo']['nome']) . '.' . $extensao;

                header('Content-Description: File Transfer');
                header('Content-Disposition: attachment; filename="' . $novoNome . '"');
                header('Content-Type: application/octet-stream');
                header('Content-Transfer-Encoding: binary');
                header('Content-Length: ' . filesize($aquivoNome));
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Expires: 0');

                readfile($aquivoNome);
            }
        }

        $this->redirect($this->admin_index());
    }

}
