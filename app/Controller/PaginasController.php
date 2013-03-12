<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class PaginasController extends AppController {

    public function admin_index() {
        $this->Pagina->recursive = 0;
        $this->set('paginas', $this->paginate());
        $this->set('title_for_layout', __('Pages Editable') . ' - ' . $this->title_for_layout);
    }

    public function admin_view($id = null) {
        $this->Pagina->id = $id;
        if (!$this->Pagina->exists()) {
            throw new NotFoundException(__('Invalid pagina'));
        }
        $this->set('pagina', $this->Pagina->read(null, $id));
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Pagina->create();
            if ($this->Pagina->save($this->request->data)) {
                $this->Session->setFlash(__('The pagina has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The pagina could not be saved. Please, try again.'));
            }
        }
        $this->set('title_for_layout', __('Add Page') . ' - ' . $this->title_for_layout);
    }

    public function admin_edit($id = null) {
        $this->Pagina->id = $id;
        if (!$this->Pagina->exists()) {
            throw new NotFoundException(__('Invalid pagina'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Pagina->save($this->request->data)) {
                $this->Session->setFlash(__('The pagina has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The pagina could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Pagina->read(null, $id);
        }
        $this->set('title_for_layout', __('Edit Page') . ' - ' . $this->title_for_layout);
    }

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Pagina->id = $id;
        if (!$this->Pagina->exists()) {
            throw new NotFoundException(__('Invalid pagina'));
        }
        if ($this->Pagina->delete()) {
            $this->Session->setFlash(__('Pagina deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Pagina was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

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
//        if (!empty($path[$count - 1])) {
//            $title_for_layout = Inflector::humanize($path[$count - 1]);
//        }

        $conteudo = $this->Pagina->find('first', array(
            'conditions' => array(
                'Pagina.pin' => $page
            )
                ));

//        $title_for_layout = $conteudo['Pagina']['titulo'] . ' - ' . $title_for_layout; 'title_for_layout',

        $this->set(compact('page', 'subpage',  'conteudo'));
//        $this->render(implode('/', $path));
        $this->render('generica');
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
