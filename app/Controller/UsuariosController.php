<?php

App::uses('AppController', 'Controller');

class UsuariosController extends AppController {

    function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $_SESSION['KCEDITOR']['disabled'] = false;
                $this->redirect($this->Auth->redirect(array(
                            'controller' => 'usuarios',
                            'action' => 'bem_vindo',
                            'admin' => true
                        )));
            } else {
                $this->Session->setFlash(__('Your username or password was incorrect.'), 'flash_message', array('tipo' => 'warning'), 'admin');
            }
        }
        $this->layout = 'login';
        $this->set('title_for_layout', __('Login') . ' - ' . $this->title_for_layout);
    }

    function logout() {
        if (isset($_SESSION['KCEDITOR'])) {
            unset($_SESSION['KCEDITOR']);
        }
        $this->redirect($this->Auth->logout());
    }

    public function admin_bem_vindo() {

        //-- NoticiaCategoria
        $this->loadModel('NoticiaCategoria');
        $noticia_categorias = $this->NoticiaCategoria->find('count');
        $noticia_categoria_ativos = $this->NoticiaCategoria->find('count', array(
            'conditions' => array(
                'NoticiaCategoria.ativo' => 1
            )
                ));
        $noticia_categoria_ultima = $this->NoticiaCategoria->find('first', array(
            'order' => 'NoticiaCategoria.created DESC'
                ));
        $noticia_categoria_ultima = $noticia_categoria_ultima['NoticiaCategoria']['created'];
        $noticia_categoria_ultima = !empty($noticia_categoria_ultima) ? date('d/m/Y', strtotime($noticia_categoria_ultima)) : null;
        $this->set('noticia_categorias', $noticia_categorias);
        $this->set('noticia_categoria_ativos', $noticia_categoria_ativos);
        $this->set('noticia_categoria_ultima', $noticia_categoria_ultima);

        //-- Noticia
        $this->loadModel('Noticia');
        $noticias = $this->Noticia->find('count');
        $noticia_ativas = $this->Noticia->find('count', array(
            'conditions' => array(
                'Noticia.ativo' => 1
            )
                ));
        $noticia_ultima = $this->Noticia->find('first', array(
            'order' => 'Noticia.created DESC'
                ));
        $noticia_ultima = $noticia_ultima['Noticia']['created'];
        $noticia_ultima = !empty($noticia_ultima) ? date('d/m/Y', strtotime($noticia_ultima)) : null;
        $this->set('noticias', $noticias);
        $this->set('noticia_ativas', $noticia_ativas);
        $this->set('noticia_ultima', $noticia_ultima);

        //-- ProdutoCategoria
        $this->loadModel('ProdutoCategoria');
        $produto_categorias = $this->ProdutoCategoria->find('count');
        $produto_categoria_ativos = $this->ProdutoCategoria->find('count', array(
            'conditions' => array(
                'ProdutoCategoria.ativo' => 1
            )
                ));
        $produto_categoria_ultima = $this->ProdutoCategoria->find('first', array(
            'order' => 'ProdutoCategoria.created DESC'
                ));
        $produto_categoria_ultima = $produto_categoria_ultima['ProdutoCategoria']['created'];
        $produto_categoria_ultima = !empty($produto_categoria_ultima) ? date('d/m/Y', strtotime($produto_categoria_ultima)) : null;
        $this->set('produto_categorias', $produto_categorias);
        $this->set('produto_categoria_ativos', $produto_categoria_ativos);
        $this->set('produto_categoria_ultima', $produto_categoria_ultima);

        //-- Produto
        $this->loadModel('Produto');
        $produtos = $this->Produto->find('count');
        $produto_ativos = $this->Produto->find('count', array(
            'conditions' => array(
                'Produto.ativo' => 1
            )
                ));
        $produto_ultimo = $this->Produto->find('first', array(
            'order' => 'Produto.created DESC'
                ));
        $produto_ultimo = $produto_ultimo['Produto']['created'];
        $produto_ultimo = !empty($produto_ultimo) ? date('d/m/Y', strtotime($produto_ultimo)) : null;
        $this->set('produtos', $produtos);
        $this->set('produto_ativos', $produto_ativos);
        $this->set('produto_ultimo', $produto_ultimo);

        //-- Banner
        $this->loadModel('Banner');
        $banners = $this->Banner->find('count');
        $banner_ativos = $this->Banner->find('count', array(
            'conditions' => array(
                'Banner.ativo' => 1
            )
                ));
        $banner_ultimo = $this->Banner->find('first', array(
            'order' => 'Banner.created DESC'
                ));
        $banner_ultimo = $banner_ultimo['Banner']['created'];
        $banner_ultimo = !empty($banner_ultimo) ? date('d/m/Y', strtotime($banner_ultimo)) : null;
        $this->set('banners', $banners);
        $this->set('banner_ativos', $banner_ativos);
        $this->set('banner_ultimo', $banner_ultimo);

        //-- Newslleter
        $this->loadModel('Newsletter');
        $newsletter = $this->Newsletter->find('count');
        $newsletter_ativos = $this->Newsletter->find('count', array(
            'conditions' => array(
                'Newsletter.ativo' => 1
            )
                ));
        $newsletter_ultimo = $this->Newsletter->find('first', array(
            'order' => 'Newsletter.created DESC'
                ));
        $newsletter_ultimo = $newsletter_ultimo['Newsletter']['created'];
        $newsletter_ultimo = !empty($newsletter_ultimo) ? date('d/m/Y', strtotime($newsletter_ultimo)) : null;
        $this->set('newsletter', $newsletter);
        $this->set('newsletter_ativos', $newsletter_ativos);
        $this->set('newsletter_ultimo', $newsletter_ultimo);

        //-- Curriculo
        $this->loadModel('Curriculo');
        $curriculos = $this->Curriculo->find('count');
        $curriculo_ativos = $this->Curriculo->find('count', array(
            'conditions' => array(
                'Curriculo.ativo' => 1
            )
                ));
        $curriculo_ultimo = $this->Curriculo->find('first', array(
            'order' => 'Curriculo.created DESC'
                ));
        $curriculo_ultimo = $curriculo_ultimo['Curriculo']['created'];
        $curriculo_ultimo = !empty($curriculo_ultimo) ? date('d/m/Y', strtotime($curriculo_ultimo)) : null;
        $this->set('curriculos', $curriculos);
        $this->set('curriculo_ativos', $curriculo_ativos);
        $this->set('curriculo_ultimo', $curriculo_ultimo);

        //-- Usuario
        $this->loadModel('Usuario');
        $usuarios = $this->Usuario->find('count');
        $usuario_ativos = $this->Usuario->find('count', array(
            'conditions' => array(
                'Usuario.ativo' => 1
            )
                ));
        $usuario_ultimo = $this->Usuario->find('first', array(
            'order' => 'Usuario.created DESC'
                ));
        $usuario_ultimo = $usuario_ultimo['Usuario']['created'];
        $usuario_ultimo = !empty($usuario_ultimo) ? date('d/m/Y', strtotime($usuario_ultimo)) : null;
        $this->set('usuarios', $usuarios);
        $this->set('usuario_ativos', $usuario_ativos);
        $this->set('usuario_ultimo', $usuario_ultimo);

        $this->set('title_for_layout', __('Welcome') . ' - ' . $this->title_for_layout);
    }

    public function admin_index() {
        $this->Usuario->recursive = 0;
        $this->set('usuarios', $this->paginate());
    }

//    public function view($id = null) {
//        $this->Usuario->id = $id;
//        if (!$this->Usuario->exists()) {
//            throw new NotFoundException(__('Invalid user'));
//        }
//        $this->set('user', $this->Usuario->read(null, $id));
//    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }


    public function admin_edit($id = null) {
        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Usuario->read(null, $id);
            unset($this->request->data['Usuario']['senha']);
        }
    }
//
//    public function delete($id = null) {
//        if (!$this->request->is('post')) {
//            throw new MethodNotAllowedException();
//        }
//        $this->Usuario->id = $id;
//        if (!$this->Usuario->exists()) {
//            throw new NotFoundException(__('Invalid user'));
//        }
//        if ($this->Usuario->delete()) {
//            $this->Session->setFlash(__('Usuario deleted'));
//            $this->redirect(array('action' => 'index'));
//        }
//        $this->Session->setFlash(__('Usuario was not deleted'));
//        $this->redirect(array('action' => 'index'));
//    }

    public function choose_language($language = 'pt-br') {
        $this->Session->write('Config.language', $language);
        $this->redirect($this->referer());
    }

}

