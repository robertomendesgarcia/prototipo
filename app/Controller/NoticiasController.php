<?php

App::uses('AppController', 'Controller');

class NoticiasController extends AppController {

    public function index($categoria = null) {
        $options = array(
            'Noticia.ativo' => 1,
            'order' => array('Noticia.id' => 'DESC'),
            'limit' => 1000
        );

        if (!empty($categoria)) {
            $options['conditions']['Noticia.categoria_id'] = $categoria;
        }

        if ((!empty($this->data)) && (!empty($this->data['Noticia']['titulo']))) {
            $options['conditions'] = array(
                'Noticia.titulo LIKE' => '%' . $this->data['Noticia']['titulo'] . '%'
            );
        }

        $this->paginate = $options;
        $noticias = $this->paginate('Noticia');

        $this->set('img', $this->Noticia->NoticiaImagem->img['path']);
        $this->set(compact('noticias'));
        $this->set('title_for_layout', __('News') . ' - ' . $this->title_for_layout);
    }

    public function ver($id) {
        $noticia = $this->Noticia->find('first', array(
            'conditions' => array(
                'Noticia.id' => $id
            )
        ));
        $this->set('img', $this->Noticia->NoticiaImagem->img);
        $this->set(compact('noticia'));
        $this->set('title_for_layout', $noticia['Noticia']['titulo'] . ' - ' . __('News') . ' - ' . $this->title_for_layout);
    }

    public function admin_index() {

        $options = array(
            'order' => array('Noticia.data' => 'DESC'),
            'limit' => 1000
        );

        if ((!empty($this->data)) && (!empty($this->data['Filtro']['filtro']))) {

            if ($this->data['Filtro']['campo'] == 'titulo') {
                $options['conditions'] = array(
                    'Noticia.titulo LIKE' => '%' . $this->data['Filtro']['filtro'] . '%'
                );
            } else {
                $options['conditions'] = array(
                    'NoticiaCategoria.nome LIKE' => '%' . $this->data['Filtro']['filtro'] . '%'
                );
            }
        }

        $this->paginate = $options;
        $noticias = $this->paginate('Noticia');

        $this->set('title_for_layout', __('News') . ' - ' . $this->title_for_layout);
        $this->set(compact('noticias'));
    }

//    public function admin_view($id = null) {
//        $this->Noticia->id = $id;
//        if (!$this->Noticia->exists()) {
//            throw new NotFoundException(__('Invalid news.'));
//        }
//        $this->set('noticia', $this->Noticia->read(null, $id));
//    }

    public function admin_add() {

        if ($this->request->is('post')) {
            if (!empty($this->data)) {

                if ($this->Noticia->save($this->request->data)) {

                    if (!empty($this->request->data['Noticia']['imagens'])) {

                        foreach ($this->request->data['Noticia']['imagens'] as $imagem) {

                            if (isset($imagem['name']) && $imagem["error"] == 0) {

                                $extensao = strrchr($imagem['name'], '.');
                                $extensao = strtolower(str_replace('.', '', $extensao));

                                if (in_array($extensao, $this->Noticia->NoticiaImagem->img['formatos'])) {

                                    $this->Noticia->NoticiaImagem->create();
                                    if ($this->Noticia->NoticiaImagem->save(array(
                                                'noticia_id' => $this->Noticia->id,
                                                'titulo' => null,
                                                'destaque' => false
                                            ))) {

                                        $destino = $this->Noticia->NoticiaImagem->img['path'] . $this->Noticia->NoticiaImagem->id . '.' . $extensao;

                                        if (!move_uploaded_file($imagem['tmp_name'], $destino)) {
                                            die('Erro no upload!');
                                        }
                                    }
                                } else {
//                                    $this->Session->setFlash(__('Formato de arquvo inválido.'), 'flash_message', array('tipo' => 'warning'), 'admin');
                                }
                            }
                        }
                    }

                    $this->Session->setFlash(__('Notícia salva com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('Erro ao salvar a notícia.'), 'flash_message', array('tipo' => 'error'), 'admin');
                }
            }
        }

        $this->loadModel('NoticiaCategoria');
        $categorias = $this->NoticiaCategoria->find('list', array(
            'conditions' => array(
                'NoticiaCategoria.ativo' => 1
        )));
        $this->set(compact('categorias'));
        $this->set('img', $this->Noticia->NoticiaImagem->img);
        $this->set('title_for_layout', __('Nova Notícia') . ' - ' . $this->title_for_layout);
    }

    public function admin_edit($id = null) {
        $this->Noticia->id = $id;

        if (!$this->Noticia->exists()) {
            throw new NotFoundException(__('Notícia inválida.'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Noticia->save($this->request->data)) {

                if (!empty($this->request->data['Noticia']['imagens'])) {

                    foreach ($this->request->data['Noticia']['imagens'] as $imagem) {

                        if (isset($imagem['name']) && $imagem["error"] == 0) {

                            $extensao = strrchr($imagem['name'], '.');
                            $extensao = strtolower(str_replace('.', '', $extensao));

                            if (in_array($extensao, $this->Noticia->NoticiaImagem->img['formatos'])) {

                                $this->Noticia->NoticiaImagem->create();
                                if ($this->Noticia->NoticiaImagem->save(array(
                                            'noticia_id' => $this->Noticia->id,
                                            'titulo' => null,
                                            'destaque' => false
                                        ))) {

                                    $destino = $this->Noticia->NoticiaImagem->img['path'] . $this->Noticia->NoticiaImagem->id . '.' . $extensao;

                                    if (!move_uploaded_file($imagem['tmp_name'], $destino)) {
                                        die('Erro no upload!');
                                    }
                                }
                            }
                        }
                    }
                }

                $this->Session->setFlash(__('Notícia salva com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Erro ao salvar a notícia.'), 'flash_message', array('tipo' => 'error'), 'admin');
            }
        } else {
            $this->request->data = $this->Noticia->read(null, $id);
        }

        $this->loadModel('NoticiaCategoria');
        $categorias = $this->NoticiaCategoria->find('list', array(
            'conditions' => array(
                'NoticiaCategoria.ativo' => 1
            )
        ));

        $noticia = $this->Noticia->findById($id);
        $this->set('img', $this->Noticia->NoticiaImagem->img);
        $this->set(compact('categorias', 'noticia'));
        $this->set('title_for_layout', __('Edit News') . ' - ' . $this->title_for_layout);
    }

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        $this->Noticia->id = $id;
        if (!$this->Noticia->exists()) {
            throw new NotFoundException(__('Notícia inválida.'));
        }

        if ($this->Noticia->NoticiaImagem->deleteAll(array('noticia_id' => $id), false)) {
            if ($this->Noticia->delete()) {
                $this->Session->setFlash(__('Notícia excluída com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
            } else {
                $this->Session->setFlash(__('Erro ao excluir a notícia.'), 'flash_message', array('tipo' => 'error'), 'admin');
            }
        } else {
            $this->Session->setFlash(__('Erro ao excluir a notícia.'), 'flash_message', array('tipo' => 'error'), 'admin');
        }

        $this->redirect(array('action' => 'index'));
    }

    public function excluir_imagem($id) {
        $id_noticia = $this->Noticia->NoticiaImagem->noticia_id;

        $this->Noticia->NoticiaImagem->id = $id;
        if (!$this->Noticia->NoticiaImagem->exists()) {
            throw new NotFoundException(__('Imagem inválida.'));
        }

        if ($this->Noticia->NoticiaImagem->delete()) {
            $this->Session->setFlash(__('Imagem excluída com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('Erro ao excluir a imagem.'), 'flash_message', array('tipo' => 'error'), 'admin');
        }

        $this->redirect($this->referer());
    }

}