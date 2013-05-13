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
    public function admin_index() {

        $this->redirect($this->admin_config('dados'));

//        $this->Configuraco->recursive = 0;
//        $this->set('configuracos', $this->paginate());
    }

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

    public function admin_email() {

        if ($this->request->data) {

            $config = $this->Configuracao->find('first', array(
                'conditions' => array(
                    'pin' => 'json_configuracao_smtp'
                )
            ));
            if (!empty($config)) {
                $config['Configuracao']['conteudo'] = json_encode($this->request->data['Configuracao']);
                if ($this->Configuracao->save($config)) {

                    $var = $this->request->data['Configuracao'];
                    foreach ($var as $key => $value) {
                        $$key = $value;
                    }
                    $txt = "<?php
                            class EmailConfig {
                                public \$smtp = array(
                                    'transport' => 'Smtp',
                                    'from' => array('$email' => '$nome'),
                                    'host' => '$smtp ',
                                    'port' => $porta,
                                    'timeout' => 30,
                                    'username' => '$usuario',
                                    'password' => '$senha',
                                    'client' => null,
                                    'log' => false,
                                    'charset' => 'utf-8',
                                    'headerCharset' => 'utf-8',
                                );
                            }
                            ? >";

                    $handle = fopen("../Config/email.php", "w+");
                    if (fwrite($handle, $txt) === FALSE) {
                        echo "Não foi possível escrever no arquivo";
                        exit;
                    }
                    $this->Session->setFlash(__('Settings saved successfully.'), 'flash_message', array('tipo' => 'success'), 'admin');
                } else {
                    $this->Session->setFlash(__('Erro ao salvar as configurações.'), 'flash_message', array('tipo' => 'error'), 'admin');
                }
            }
        } else {
            $config = $this->Configuracao->find('first', array(
                'conditions' => array(
                    'pin' => 'json_configuracao_smtp'
                )
            ));
            if (!empty($config)) {
//                $config = json_decode($config['Configuracao']['conteudo']);
//                pr(get_object_vars($config)); exit;                
                if (!empty($config['Configuracao']['conteudo'])) {
                    $this->request->data['Configuracao'] = get_object_vars(json_decode($config['Configuracao']['conteudo']));
                }
            }
        }

        $this->set('title_for_layout', __('Configurações de E&#45;mail') . ' - ' . $this->title_for_layout);
    }

    public function admin_config($pin) {

        if ($this->request->is('post')) {

            if (!empty($this->request->data['Configuracao'])) {

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
                                    throw new Exception(__('Erro ao salvar as configurações.'));
                                }
                            }
                        } else {

                            if ($value['error'] == 0) {

                                $extensao = strrchr($value['name'], '.');
                                $extensao = strtolower(str_replace('.', '', $extensao));

                                if (in_array($extensao, $this->Configuracao->img['formatos'])) {

                                    $destino = $this->Configuracao->img['path'] . $key . '.' . $extensao;

                                    if (move_uploaded_file($value['tmp_name'], $destino)) {

                                        $config = $this->Configuracao->find('first', array(
                                            'conditions' => array(
                                                'pin' => $key
                                            )
                                        ));
                                        if (!empty($config)) {
                                            $config['Configuracao']['conteudo'] = $destino;
                                            if (!$this->Configuracao->save($config)) {
                                                throw new Exception(__('Erro ao salvar as configurações.'));
                                            }
                                        }
                                    } else {
                                        throw new Exception(__('Erro no upload do arquivo.'));
                                    }
                                } else {
                                    throw new Exception(__('Arquivo inválido.'));
                                }
                            }
                        }
                    }

                    $dataSource->commit();
                    $this->Session->setFlash(__('Settings saved successfully.'), 'flash_message', array('tipo' => 'success'), 'admin');
                } catch (Exception $e) {
                    $this->Session->setFlash($e->getMessage(), 'flash_message', array('tipo' => 'error'), 'admin');
                    $dataSource->rollback();
                }
            } else {
                $this->Session->setFlash(__('Alterações canceladas.'), 'flash_message', array('tipo' => 'info'), 'admin');
            }
        }

        $configuracoes = $this->Configuracao->find('all');
        foreach ($configuracoes as $configuracao) {
            $this->request->data['Configuracao'][$configuracao['Configuracao']['pin']] = $configuracao['Configuracao']['conteudo'];
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
            case 'dados':
                $titulo = __('Configurações dos Dados Iniciais');
                break;
            case 'email':
                $titulo = __('Configurações de E&#45;mail');
                break;
        }

        $this->set('title_for_layout', $titulo . ' - ' . $this->title_for_layout);
        $this->set('img', $this->Configuracao->img['formatos']);
        $this->render('admin_' . $pin);
    }

}
