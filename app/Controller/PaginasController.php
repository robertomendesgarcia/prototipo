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
            throw new NotFoundException(__('Página inválida.'));
        }
        $this->set('pagina', $this->Pagina->read(null, $id));
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Pagina->create();
            if ($this->Pagina->save($this->request->data)) {
                $this->Session->setFlash(__('Página salva com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Erro ao salvar a página.'), 'flash_message', array('tipo' => 'error'), 'admin');
            }
        }
        $this->set('title_for_layout', __('Add Page') . ' - ' . $this->title_for_layout);
    }

    public function admin_edit($id = null) {
        $this->Pagina->id = $id;
        if (!$this->Pagina->exists()) {
            throw new NotFoundException(__('Página inválida.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Pagina->save($this->request->data)) {
                $this->Session->setFlash(__('Página salva com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Erro ao salvar a página.'), 'flash_message', array('tipo' => 'error'), 'admin');
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
            throw new NotFoundException(__('Página inválida.'));
        }
        if ($this->Pagina->delete()) {
            $this->Session->setFlash(__('Página excluída com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Erro ao excluir a página.'), 'flash_message', array('tipo' => 'error'), 'admin');
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

        $this->set('title_for_layout', $conteudo['Pagina']['titulo'] . ' - ' . $this->title_for_layout);
        $this->set(compact('page', 'subpage', 'conteudo'));
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

        $this->set('title_for_layout', 'Contato - ' . $this->title_for_layout);
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
                            $this->Session->setFlash(__('Problemas ao salvar o arquivo. Por favor, tente novamente.'));
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

        $this->set('title_for_layout', 'Trabalhe Conosco - ' . $this->title_for_layout);
    }

    public function capa() {
        $noticias = null;
        $produtos = null;

        $this->loadModel('Configuracao');
        $config = $this->Configuracao->find('list', array(
            'fields' => array(
                'pin',
                'conteudo'
            ),
            'conditions' => array(
                'Configuracao.pin' => array(
                    'usa_noticias', 'usa_produtos',
                    'mostrar_noticias_capa', 'mostrar_noticias_capa',
                    'qtde_noticias_capa', 'qtde_produtos_capa'
                )
            )
        ));

        if (!empty($config)) {

            if ($config['usa_noticias']) {
                $this->loadModel('Noticia');
                $noticias = $this->Noticia->find('all', array(
                    'conditions' => array(
                        'Noticia.ativo' => 1
                    ),
                    'limit' => $config['qtde_noticias_capa'],
                    'order' => 'Noticia.created DESC'
                ));
            }

            if ($config['usa_produtos']) {
                $this->loadModel('Produto');
                $produtos = $this->Produto->find('all', array(
                    'conditions' => array(
                        'Produto.ativo' => 1
                    ),
                    'limit' => $config['qtde_produtos_capa'],
                    'order' => 'Produto.created DESC'
                ));
            }
        }

        $this->loadModel('Pagina');
        $a_empresa = $this->Pagina->find('first', array(
            'conditions' => array(
                'Pagina.ativo' => 1,
                'Pagina.pin LIKE' => '%a-empresa%'
            )
        ));

        $this->set('a_empresa', $a_empresa);
        $this->set('noticias', $noticias);
        $this->set('img_noticias', $this->Noticia->NoticiaImagem->img['path']);
        $this->set('produtos', $produtos);
        $this->set('img_produtos', $this->Produto->ProdutoImagem->img['path']);
        $this->set('title_for_layout', $this->title_for_layout);
    }

}
