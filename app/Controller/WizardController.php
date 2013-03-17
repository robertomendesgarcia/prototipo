<?php

App::uses('AppController', 'Controller');

class WizardController extends AppController {

    public function index() {
        $this->redirect($this->configuraLayout());
    }

    public function configuraLayout() {

        $this->layout = 'instalador';

        if ($this->request->is('post')) {
            //print_r($this->request->data['Layout']['layout']+1);
            $id = $this->request->data['Layout']['layout'] + 1;
            $this->loadModel('Estrutura');
            $estruturas = $this->Estrutura->find('first', array(
                'conditions' => array(
                    'Estrutura.id' => $id
                ),
                    ));

            $this->loadModel('Configuracao');
            $var = $estruturas['Estrutura'];
            $chk = array("id", "nome", "created", "modified");
            foreach ($var as $key => $value) {
                $$key = $value;
                if (!in_array($key, $chk)) {
                    echo $key . "<br>";
                    $sql = "update configuracoes set conteudo = '$value', modified=now() where pin='$key'";
                    $this->Configuracao->query($sql);
                }
            }
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
        }

        $this->render('configura_layout');

        //$this->redirect($this->passo1());
    }

}

?>