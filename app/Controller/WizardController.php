<?php

App::uses('AppController', 'Controller');

class WizardController extends AppController {

    public function index() {
        $this->redirect(array("action" => "admin_configuraLayout", 'admin' => true));
    }

    public function admin_index() {
        $this->redirect(array("action" => "admin_configuraLayout"));
    }

    public function admin_configuraLayout() {

        $this->layout = 'instalador';

        $this->loadModel('Estrutura');
        $estruturas = $this->Estrutura->find('list', array(
            'fields' => array('pin', 'nome'),
            'order' => 'Estrutura.pin ASC'
        ));

        if ($this->request->is('post')) {

//            print_r($this->request->data['Layout']['layout']);
//            exit;
//            $id = $this->request->data['Layout']['layout'] + 1;
            $this->loadModel('Estrutura');
            $estruturas = $this->Estrutura->find('first', array(
                'conditions' => array(
                    'Estrutura.pin' => $this->request->data['Layout']['layout']
                ),
            ));

            $this->loadModel('Configuracao');
            $var = $estruturas['Estrutura'];
            $chk = array("id", "nome", "created", "modified");
            foreach ($var as $key => $value) {
                $$key = $value;
                if (!in_array($key, $chk)) {
//                    echo $key . "<br>";
                    $sql = "update configuracoes set conteudo = '$value', modified=now() where pin='$key'";
                    $this->Configuracao->query($sql);
                }
            }

            $this->Session->setFlash(__('Layout salvo com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
            $this->redirect(array("action" => "admin_configuraRecursos"));

//            $usa_produtos = $this->request->data['Layout']['usa_produtos'];
//            $sql = "update configuracoes set conteudo = '$usa_produtos', modified=now() where pin='usa_produtos'";
//            $this->Configuracao->query($sql);
//
//            $usa_banners = $this->request->data['Layout']['usa_banners'];
//            $sql = "update configuracoes set conteudo = '$usa_banners', modified=now() where pin='usa_banners'";
//            $this->Configuracao->query($sql);
//
//            $usa_noticias = $this->request->data['Layout']['usa_noticias'];
//            $sql = "update configuracoes set conteudo = '$usa_noticias', modified=now() where pin='usa_noticias'";
//            $this->Configuracao->query($sql);
//
//            $trabalhe_conosco = $this->request->data['Layout']['usa_trabalhe_conosco'];
//            $sql = "update configuracoes set conteudo = '$trabalhe_conosco', modified=now() where pin='trabalhe_conosco'";
//            $this->Configuracao->query($sql);
//
//            $email_trabalhe_conosco = $this->request->data['Layout']['email_trabalhe_conosco'];
//            $sql = "update configuracoes set conteudo = '$email_trabalhe_conosco', modified=now() where pin='email_trabalhe_conosco'";
//            $this->Configuracao->query($sql);
        }

        $this->set('title_for_layout', __('Configurar Layout') . ' - ' . $this->title_for_layout);
        $this->set('estruturas', $estruturas);
        $this->render('configura_layout');
    }

    public function admin_configuraRecursos() {

        $this->layout = 'instalador';

        if ($this->request->is('post') && (isset($this->request->data['Layout']['usa_produtos']))) {
            //print_r($this->request->data['Layout']['layout']+1);
//            $id = $this->request->data['Layout']['layout'] + 1;
//            $this->loadModel('Estrutura');
//            $estruturas = $this->Estrutura->find('first', array(
//                'conditions' => array(
//                    'Estrutura.id' => $id
//                ),
//                    ));
//
//            $this->loadModel('Configuracao');
//            $var = $estruturas['Estrutura'];
//            $chk = array("id", "nome", "created", "modified");
//            foreach ($var as $key => $value) {
//                $$key = $value;
//                if (!in_array($key, $chk)) {
//                    echo $key . "<br>";
//                    $sql = "update configuracoes set conteudo = '$value', modified=now() where pin='$key'";
//                    $this->Configuracao->query($sql);
//                }
//            }
            $this->loadModel('Configuracao');

            $usa_produtos = $this->request->data['Layout']['usa_produtos'];
            $sql = "update configuracoes set conteudo = '$usa_produtos', modified=now() where pin='usa_produtos'";
            $this->Configuracao->query($sql);

            $usa_banners = $this->request->data['Layout']['usa_banners'];
            $sql = "update configuracoes set conteudo = '$usa_banners', modified=now() where pin='usa_banners'";
            $this->Configuracao->query($sql);

            $usa_noticias = $this->request->data['Layout']['usa_noticias'];
            $sql = "update configuracoes set conteudo = '$usa_noticias', modified=now() where pin='usa_noticias'";
            $this->Configuracao->query($sql);

            $trabalhe_conosco = $this->request->data['Layout']['usa_trabalhe_conosco'];
            $sql = "update configuracoes set conteudo = '$trabalhe_conosco', modified=now() where pin='trabalhe_conosco'";
            $this->Configuracao->query($sql);

            $email_trabalhe_conosco = $this->request->data['Layout']['email_trabalhe_conosco'];
            $sql = "update configuracoes set conteudo = '$email_trabalhe_conosco', modified=now() where pin='email_trabalhe_conosco'";
            $this->Configuracao->query($sql);

            $this->Session->setFlash(__('Recursos salvos com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
            $this->redirect(array("action" => "admin_configuraDados"));
        }

        $this->set('title_for_layout', __('Configurar Recursos') . ' - ' . $this->title_for_layout);

        $this->render('configura_recursos');

        //$this->redirect($this->passo1());
    }

    public function admin_configuraDados() {

        $this->layout = 'instalador';

        if ($this->request->is('post')) {
//            print_r($this->request->data['Layout']);
//            
//            exit;
//            $id = $this->request->data['Layout']['layout'] + 1;
//            $this->loadModel('Estrutura');
//            $estruturas = $this->Estrutura->find('first', array(
//                'conditions' => array(
//                    'Estrutura.id' => $id
//                ),
//                    ));
//
//            $this->loadModel('Configuracao');
//            $var = $estruturas['Estrutura'];
//            $chk = array("id", "nome", "created", "modified");
//            foreach ($var as $key => $value) {
//                $$key = $value;
//                if (!in_array($key, $chk)) {
//                    echo $key . "<br>";
//                    $sql = "update configuracoes set conteudo = '$value', modified=now() where pin='$key'";
//                    $this->Configuracao->query($sql);
//                }
//            }

            $this->loadModel('Configuracao');

            $titulo_site = $this->request->data['Layout']['titulo_site'];
            $sql = "update configuracoes set conteudo = '$titulo_site', modified=now() where pin='titulo_site'";
            $this->Configuracao->query($sql);

            $slogan = $this->request->data['Layout']['slogan'];
            $sql = "update configuracoes set conteudo = '$slogan', modified=now() where pin='slogan'";
            $this->Configuracao->query($sql);

            $email_contato = $this->request->data['Layout']['email_contato'];
            $sql = "update configuracoes set conteudo = '$email_contato', modified=now() where pin='email_contato'";
            $this->Configuracao->query($sql);

            $endereco_fisico_empresa = $this->request->data['Layout']['endereco_fisico_empresa'];
            $sql = "update configuracoes set conteudo = '$endereco_fisico_empresa', modified=now() where pin='endereco_fisico_empresa'";
            $sql = "update configuracoes set conteudo = '" . nl2br($endereco_fisico_empresa) . "', modified=now() where pin='conteudo_rodape'";
            $this->Configuracao->query($sql);

            if ($this->request->data['Layout']['img_logo']['error'] == 0) {

                $extensao = strrchr($this->request->data['Layout']['img_logo']['name'], '.');
                $extensao = strtolower(str_replace('.', '', $extensao));

                if (in_array($extensao, $this->Configuracao->img['formatos'])) {

                    $destino = $this->Configuracao->img['path'] . 'img_logo.' . $extensao;

                    if (move_uploaded_file($this->request->data['Layout']['img_logo']['tmp_name'], $destino)) {

                        $config = $this->Configuracao->find('first', array(
                            'conditions' => array(
                                'pin' => 'img_logo'
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


            if (file_exists("../Config/status_instalacao.cfg")) {
                $handle = fopen("../Config/status_instalacao.cfg", "r+");
            } else {
                $handle = fopen("../Config/status_instalacao.cfg", "w+");
            }
            $status = fread($handle, 10);
            $status = '2';
            if (fwrite($handle, $status)) {
                $this->Session->setFlash(__('Dados salvos com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
            } else {
                $this->Session->setFlash(__('Erro ao salvar os dados.'), 'flash_message', array('tipo' => 'error'), 'admin');
            }

            fclose($handle);
            $this->redirect(array("action" => "admin_wizard_concluido"));
        }



//        $this->loadModel('Configuracao');
//        $etapa = $this->Configuracao->find('first', array(
//            'conditions' => array(
//                'Configuracao.pin' => 'etapa_cms'
//            )
//                ));
//        $etapa['Configuracao']['conteudo'] = '1';
//        if ($this->Configuracao->save($etapa)) {
//            $this->redirect(array('controller' => 'usuarios', 'action' => 'login'));
//        } else {
//            $this->Session->setFlash(__('Erro ao salvar o usuÃ¡rio administrador.'), 'flash_message', array('tipo' => 'error'), 'admin');
//        }

        $this->set('title_for_layout', __('Configurar Dados') . ' - ' . $this->title_for_layout);

        $this->render('configura_dados');

        //$this->redirect($this->passo1());
    }

    public function admin_wizard_concluido() {
        $this->layout = 'instalador';
        $this->set('title_for_layout', __('Wizard Concluído') . ' - ' . $this->title_for_layout);
        $this->render('wizard_concluido');
    }

}

?>