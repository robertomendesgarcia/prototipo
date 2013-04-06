<?php

App::uses('AppController', 'Controller');

class BannersController extends AppController {

    public function admin_index() {
        $options = array(
            'order' => array('Banner.id' => 'DESC'),
            'limit' => 10
        );

        $this->paginate = $options;
        $banners = $this->paginate('Banner');
        $bannerTipos = $this->Banner->BannerTipo->find('list');
        $this->set('title_for_layout', __('Banners') . ' - ' . $this->title_for_layout);
        $this->set(compact('banners', 'bannerTipos'));
    }

//    public function admin_view($id = null) {
//        $this->Banner->id = $id;
//        if (!$this->Banner->exists()) {
//            throw new NotFoundException(__('Invalid banner'));
//        }
//        $this->set('banner', $this->Banner->read(null, $id));
//    }

    public function admin_add() {
        if ($this->request->is('post')) {
            if (!empty($this->data)) {

                if (!empty($this->request->data['Banner']['arquivo'])) {

                    $arquivo = $this->request->data['Banner']['arquivo'];

                    if (isset($arquivo['name']) && $arquivo["error"] == 0) {

                        $extensao = strrchr($arquivo['name'], '.');
                        $extensao = strtolower(str_replace('.', '', $extensao));

                        if (in_array($extensao, $this->Banner->file['formatos'])) {

                            $nome_arquivo = uniqid() . '.' . $extensao;
                            $destino = $this->Banner->file['path'] . $nome_arquivo;

                            if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
                                $this->request->data['Banner']['arquivo'] = $nome_arquivo;
                                if ($this->Banner->save($this->request->data)) {
                                    $this->Session->setFlash(__('The banner has been saved.'), 'flash_message', array('tipo' => 'warning'), 'admin');
                                    $this->redirect(array('action' => 'index'));
                                }
                            }
                        } else {
                            $this->Session->setFlash(__('São permitidos apenas arquivos ' . implode(', ', $this->Banner->file['formatos']) . '.'), 'flash_message', array('tipo' => 'error'), 'admin');
                        }
                    } else {
                        $this->Session->setFlash(__('Arquivo inválido.'), 'flash_message', array('tipo' => 'error'), 'admin');
                    }
                }
            } else {
                $this->Session->setFlash(__('The noticia could not be saved. Please, try again.'), 'flash_message', array('tipo' => 'warning'), 'admin');
            }
        }

        $bannerTipos = $this->Banner->BannerTipo->find('list');
        $this->set('file', $this->Banner->file);
        $this->set(compact('bannerTipos'));
        $this->set('title_for_layout', __('New Banner') . ' - ' . $this->title_for_layout);
    }

    public function admin_edit($id = null) {
        $this->Banner->id = $id;
        //$this->Banner->imagem = null;
        if (!$this->Banner->exists()) {
            throw new NotFoundException(__('Invalid banner'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

//            pr($this->request->data['Banner']);

            $arquivo = $this->request->data['Banner']['arquivo'];
            unset($this->request->data['Banner']['arquivo']);

//            pr($this->request->data['Banner']);
//            exit;

            if ($this->Banner->save($this->request->data)) {

                if (!empty($arquivo)) {

                    if (isset($arquivo['name']) && $arquivo["error"] == 0) {

                        $extensao = strrchr($arquivo['name'], '.');
                        $extensao = strtolower(str_replace('.', '', $extensao));

                        if (in_array($extensao, $this->Banner->file['formatos'])) {

                            $nome_arquivo = uniqid() . '.' . $extensao;
                            $destino = $this->Banner->file['path'] . $nome_arquivo;

                            if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
                                $this->request->data['Banner']['arquivo'] = $nome_arquivo;
                                if ($this->Banner->save($this->request->data)) {
                                    $this->Session->setFlash(__('The banner has been saved.'), 'flash_message', array('tipo' => 'warning'), 'admin');
                                    $this->redirect(array('action' => 'index'));
                                }
                            }
                        } else {
                            $this->Session->setFlash(__('São permitidos apenas arquivos ' . implode(', ', $this->Banner->file['formatos']) . '.'), 'flash_message', array('tipo' => 'error'), 'admin');
                        }
                    } else {
                        $this->Session->setFlash(__('Arquivo inválido.'), 'flash_message', array('tipo' => 'error'), 'admin');
                    }
                }

                $this->Session->setFlash(__('The noticia has been saved.'), 'flash_message', array('tipo' => 'warning'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The noticia could not be saved. Please, try again.'), 'flash_message', array('tipo' => 'warning'), 'admin');
            }
        } else {
            $this->request->data = $this->Banner->read(null, $id);
        }

        $bannerTipos = $this->Banner->BannerTipo->find('list');
        $this->set('file', $this->Banner->file);
        $this->set(compact('bannerTipos'));
        $this->set('title_for_layout', __('Edit Banner') . ' - ' . $this->title_for_layout);
    }

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Banner->id = $id;
        if (!$this->Banner->exists()) {
            throw new NotFoundException(__('Invalid banner'));
        }
        if ($this->Banner->delete()) {
            unlink(UPLOADS_URL . $this->Banner->arquivo);
            $this->Session->setFlash(__('Banner deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Banner was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}