<?php

App::uses('AppController', 'Controller');

class ProdutosController extends AppController {

    public function admin_index() {
        $options = array(
            'order' => array('Produto.id' => 'DESC'),
            'limit' => 5
        );

        if ((!empty($this->data)) && (!empty($this->data['Filtro']['filtro']))) {

            if ($this->data['Filtro']['campo'] == 'nome') {
                $options['conditions'] = array(
                    'Produto.nome LIKE' => '%' . $this->data['Filtro']['filtro'] . '%'
                );
            } else {
                $options['conditions'] = array(
                    'ProdutoCategoria.nome LIKE' => '%' . $this->data['Filtro']['filtro'] . '%'
                );
            }
        }

        $this->paginate = $options;
        $produtos = $this->paginate('Produto');

        $this->set(compact('produtos'));
        $this->set('title_for_layout', __('Products') . ' - ' . $this->title_for_layout);
    }

    public function admin_view($id = null) {
        $this->Produto->id = $id;
        if (!$this->Produto->exists()) {
            throw new NotFoundException(__('Invalid produto'));
        }
        $this->set('produto', $this->Produto->read(null, $id));
    }

    public function admin_add() {

        if ($this->request->is('post')) {
            if (!empty($this->data)) {

                if ($this->Produto->save($this->request->data)) {

                    if (!empty($this->request->data['Produto']['imagens'])) {

                        foreach ($this->request->data['Produto']['imagens'] as $imagem) {

                            if (isset($imagem['name']) && $imagem["error"] == 0) {

                                $extensao = strrchr($imagem['name'], '.');
                                $extensao = strtolower(str_replace('.', '', $extensao));

                                if (in_array($extensao, $this->Produto->ProdutoImagem->img['formatos'])) {

                                    $this->Produto->ProdutoImagem->create();
                                    if ($this->Produto->ProdutoImagem->save(array(
                                                'produto_id' => $this->Produto->id,
                                                'titulo' => null,
                                                'destaque' => false
                                            ))) {

                                        $destino = $this->Produto->ProdutoImagem->img['path'] . $this->Produto->ProdutoImagem->id . '.' . $extensao;

                                        if (!move_uploaded_file($imagem['tmp_name'], $destino)) {
                                            die('Erro no upload!');
                                        }
                                    }
                                }
                            }
                        }
                    }

                    $this->Session->setFlash(__('The product has been saved.'), 'flash_message', array('tipo' => 'warning'), 'admin');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'flash_message', array('tipo' => 'warning'), 'admin');
                }
            }
        }

        $this->loadModel('ProdutoCategoria');
        $categorias = $this->ProdutoCategoria->find('list', array(
            'conditions' => array(
                'ProdutoCategoria.ativo' => 1
                )));

        $this->set(compact('categorias'));
        $this->set('title_for_layout', __('Add Product') . ' - ' . $this->title_for_layout);
    }

    public function admin_edit($id = null) {
        $this->Produto->id = $id;
        if (!$this->Produto->exists()) {
            throw new NotFoundException(__('Invalid produto'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Produto->save($this->request->data)) {

                if (!empty($this->request->data['Produto']['imagens'])) {

                    foreach ($this->request->data['Produto']['imagens'] as $imagem) {

                        if (isset($imagem['name']) && $imagem["error"] == 0) {

                            $extensao = strrchr($imagem['name'], '.');
                            $extensao = strtolower(str_replace('.', '', $extensao));

                            if (in_array($extensao, $this->Produto->ProdutoImagem->img['formatos'])) {

                                $this->Produto->ProdutoImagem->create();
                                if ($this->Produto->ProdutoImagem->save(array(
                                            'produto_id' => $this->Produto->id,
                                            'titulo' => null,
                                            'destaque' => false
                                        ))) {

                                    $destino = $this->Produto->ProdutoImagem->img['path'] . $this->Produto->ProdutoImagem->id . '.' . $extensao;

                                    if (!move_uploaded_file($imagem['tmp_name'], $destino)) {
                                        die('Erro no upload!');
                                    }
                                }
                            }
                        }
                    }
                }

                $this->Session->setFlash(__('The product has been saved.'), 'flash_message', array('tipo' => 'warning'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'flash_message', array('tipo' => 'warning'), 'admin');
            }
        } else {
            $this->request->data = $this->Produto->read(null, $id);
        }

        $this->loadModel('ProdutoCategoria');
        $categorias = $this->ProdutoCategoria->find('list', array(
            'conditions' => array(
                'ProdutoCategoria.ativo' => 1
                )));

        $produto = $this->Produto->findById($id);
        $this->set('img', $this->Produto->ProdutoImagem->img['path']);
        $this->set(compact('categorias', 'produto'));
        $this->set('title_for_layout', __('Edit News') . ' - ' . $this->title_for_layout);
    }

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        $this->Produto->id = $id;
        if (!$this->Produto->exists()) {
            throw new NotFoundException(__('Invalid noticia'));
        }

        if ($this->Produto->ProdutoImagem->deleteAll(array('produto_id' => $id), false)) {
            if ($this->Produto->delete()) {
                $this->Session->setFlash(__('Produto deleted.'), 'flash_message', array('tipo' => 'warning'), 'admin');
            } else {
                $this->Session->setFlash(__('Produto was not deleted.'), 'flash_message', array('tipo' => 'warning'), 'admin');
            }
        } else {
            $this->Session->setFlash(__('Produto was not deleted'));
        }

        $this->redirect(array('action' => 'index'));
    }

    public function excluir_imagem($id) {
        $id_noticia = $this->Produto->ProdutoImagem->noticia_id;

        $this->Produto->ProdutoImagem->id = $id;
        if (!$this->Produto->ProdutoImagem->exists()) {
            throw new NotFoundException(__('Invalid image.'));
        }

        if ($this->Produto->ProdutoImagem->delete()) {
            $this->Session->setFlash(__('Image successfully deleted.'), 'flash_message', array('tipo' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('The image could not be deleted. Please, try again.'), 'flash_message', array('tipo' => 'error'), 'admin');
        }

        $this->redirect($this->referer());
    }

}
