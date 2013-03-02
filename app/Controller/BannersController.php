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

    public function admin_view($id = null) {
        $this->Banner->id = $id;
        if (!$this->Banner->exists()) {
            throw new NotFoundException(__('Invalid banner'));
        }
        $this->set('banner', $this->Banner->read(null, $id));
    }

    public function admin_edit($id = null) {
        $this->Banner->id = $id;
        //$this->Banner->imagem = null;
        if (!$this->Banner->exists()) {
            throw new NotFoundException(__('Invalid banner'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Banner->save($this->request->data)) {
                $this->Session->setFlash(__('The banner has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Banner->read(null, $id);
        }
        $bannerTipos = $this->Banner->BannerTipo->find('list');
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

    public function admin_add() {
        if (!empty($this->data)) {
            $tempFile = $this->data['Banner']['arquivo']['tmp_name'];
            $targetPath = UPLOADS_URL . 'banner/';
            $targetFile = $this->data['Banner']['arquivo']['name'];
            $targetFile = str_replace(" ", "", microtime()) . "." . strtolower(end(explode(".", $targetFile))); // renomeia o arquivo com data/hora precisão de milisegundos 
            $pathImage = $targetPath . $targetFile;
            $this->request->data['Banner']['arquivo'] = $targetFile;
            if ($this->Banner->save($this->request->data)) {
                if (is_uploaded_file($tempFile)) {
                    move_uploaded_file($tempFile, $pathImage);
                }
                $this->Session->setFlash(__('The banner has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
            }
        }
        $bannerTipos = $this->Banner->BannerTipo->find('list');
        $this->set(compact('bannerTipos'));
        $this->set('title_for_layout', __('Add Banner') . ' - ' . $this->title_for_layout);
    }

}