<?php

App::uses('AppController', 'Controller');
App::import('Model', 'ConnectionManager');

/**
 * Configuracoes Controller
 *
 * @property Configuracao $Configuraco
 */
class ConfiguracoesController extends AppController {

    public $uses = array('Configuracao');

    /**
     * admin_index method
     *
     * @return void
     */
//    public function admin_index() {
//        $this->Configuraco->recursive = 0;
//        $this->set('configuracos', $this->paginate());
//    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
//    public function admin_view($id = null) {
//        $this->Configuraco->id = $id;
//        if (!$this->Configuraco->exists()) {
//            throw new NotFoundException(__('Invalid configuraco'));
//        }
//        $this->set('configuraco', $this->Configuraco->read(null, $id));
//    }

    /**
     * admin_add method
     *
     * @return void
     */
//    public function admin_add() {
//        if ($this->request->is('post')) {
//            $this->Configuraco->create();
//            if ($this->Configuraco->save($this->request->data)) {
//                $this->Session->setFlash(__('The configuraco has been saved'));
//                $this->redirect(array('action' => 'index'));
//            } else {
//                $this->Session->setFlash(__('The configuraco could not be saved. Please, try again.'));
//            }
//        }
//    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
//    public function admin_edit($id = null) {
//        $this->Configuraco->id = $id;
//        if (!$this->Configuraco->exists()) {
//            throw new NotFoundException(__('Invalid configuraco'));
//        }
//        if ($this->request->is('post') || $this->request->is('put')) {
//            if ($this->Configuraco->save($this->request->data)) {
//                $this->Session->setFlash(__('The configuraco has been saved'));
//                $this->redirect(array('action' => 'index'));
//            } else {
//                $this->Session->setFlash(__('The configuraco could not be saved. Please, try again.'));
//            }
//        } else {
//            $this->request->data = $this->Configuraco->read(null, $id);
//        }
//    }

    /**
     * admin_delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
//    public function admin_delete($id = null) {
//        if (!$this->request->is('post')) {
//            throw new MethodNotAllowedException();
//        }
//        $this->Configuraco->id = $id;
//        if (!$this->Configuraco->exists()) {
//            throw new NotFoundException(__('Invalid configuraco'));
//        }
//        if ($this->Configuraco->delete()) {
//            $this->Session->setFlash(__('Configuraco deleted'));
//            $this->redirect(array('action' => 'index'));
//        }
//        $this->Session->setFlash(__('Configuraco was not deleted'));
//        $this->redirect(array('action' => 'index'));
//    }

    public function admin_config($pin) {

        if ($this->request->is('post')) {

            $dataSource = $this->Configuracao->getDataSource();
            $dataSource->begin();
            try {

                foreach ($this->request->data['Configuracao'] as $key => $value) {
                    if (!in_array($key, array('img_bg_html', 'img_logo', 'img_bg_topo'))) {
                        $config = $this->Configuracao->find('first', array(
                            'conditions' => array(
                                'pin' => $key
                            )
                                ));
                        if (!empty($config)) {
                            $config['Configuracao']['conteudo'] = $value;
                            if (!$this->Configuracao->save($config)) {
                                throw new Exception(__('The settings could not be saved. Please, try again.'));
                            }
                        }
                    } else {

//                        if ($value['error'] == 0) {
//                            $extensao = explode('.', $value['name']);
//                            $extensao = $extensao[count($extensao) - 1];
//                            if (!in_array(strtolower($extensao), $this->Configuracao->img['formatos'])) {
//                                throw new Exception(__('Invalid file.'));
//                            }
//                            print_r('<pre>');
//                            print_r($this->Configuracao->img['formatos']);
//                            print_r('</pre>');
//                            exit;
//                        }
                    }
                }

                $dataSource->commit();
                $this->Session->setFlash(__('Settings saved successfully.'), 'flash_message', array('tipo' => 'success'), 'admin');
            } catch (Exception $e) {
                $this->Session->setFlash($e->getMessage(), 'flash_message', array('tipo' => 'error'), 'admin');
                $dataSource->rollback();
            }
        } else {
            $configuracoes = $this->Configuracao->find('all');
            foreach ($configuracoes as $configuracao) {
                $this->request->data['Configuracao'][$configuracao['Configuracao']['pin']] = $configuracao['Configuracao']['conteudo'];
            }
        }

        $titulo = __('Configurações do Layout');
        switch ($pin) {
            case 'noticias':
                $titulo = __('Configurações das Notícias');
                break;
            case 'produtos':
                $titulo = __('Configurações dos Produtos');
                break;
            case 'menu':
                $titulo = __('Configurações do Menu');
                break;
        }

        $this->set('title_for_layout', $titulo . ' - ' . $this->title_for_layout);
        $this->render('admin_' . $pin);
    }

}
