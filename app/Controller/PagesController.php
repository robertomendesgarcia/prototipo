<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Pages';

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     */
    public function display() {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('page', 'subpage', 'title_for_layout'));
        $this->render(implode('/', $path));
    }

    public function contato() {

        if ($this->request->is('post')) {

            if (empty($this->request->data['author']) && empty($this->request->data['msg'])) {

                $email = new CakeEmail('smtp');
//                $email->viewVars(array('value' => 12345));
//                $email->deliver('smtp');
                $email->template('contato');
                $email->emailFormat('html');
                $email->to('giganteguerreirodaileom@hotmail.com');
                $email->subject('Contato efetuado pelo site');
                $email->from('robertomendesgarcia@gmail.com');

                if ($email->send()) {
                    die('1');
                } else {
                    die('0');
                }
            }

            var_dump($this->request->data);
            exit;
        }
    }

    public function trabalhe_conosco() {

        if ($this->request->is('post')) {

            $this->loadModel('Curriculo');

            if (empty($this->request->data['author']) && empty($this->request->data['msg'])) {

                $arquivo = null;
                $data = $this->request->data['Curriculo'];

                if ((!empty($data['curriculo']['name'])) && ($data['curriculo']['error'] == 0)) {

                    $extensao = explode('.', $data['curriculo']['name']);
                    $extensao = $extensao[count($extensao) - 1];

                    if (in_array($extensao, $this->Curriculo->file['extensoes'])) {
                        $arquivo = uniqid() . '.' . $extensao;
                        if (!move_uploaded_file($data['curriculo']['tmp_name'], $this->Curriculo->file['path'] . $arquivo)) {
                            $this->Session->setFlash(__('Problemas ao sarvar o arquivo. Por favor, tente novamente.'));
                        }
                    } else {
                        $this->Session->setFlash(__('Arquivo inválido.'));
                    }
                }

                $data['arquivo'] = $arquivo;
                $data['data'] = date('Y-m-d H:i:s');

                if ($this->Curriculo->save($data)) {
                    $this->Session->setFlash(__('Currículo salvo com sucesso.</br>Obrigado.'));
                } else {
                    $this->Session->setFlash(__('Problemas ao salvar seu currículo. Por favor, tente novamente.'));
                }
            }
        }
    }

}
