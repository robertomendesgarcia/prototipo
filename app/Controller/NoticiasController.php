<?php

App::uses('AppController', 'Controller');

class NoticiasController extends AppController {

//    public $helpers = array('Fck');

      public function admin_index() {
            $options = array(
                'order' => array('Noticia.data' => 'DESC'),
                'limit' => 10
            );

            $this->paginate = $options;
            $noticias = $this->paginate('Noticia');

            $this->set('title_for_layout', __('News') . ' - ' . $this->title_for_layout);
            $this->set(compact('noticias'));
      }

      public function admin_view($id = null) {
            $this->Noticia->id = $id;
            if (!$this->Noticia->exists()) {
                  throw new NotFoundException(__('Invalid noticia'));
            }
            $this->set('noticia', $this->Noticia->read(null, $id));
      }

      public function admin_add() {

            if ($this->request->is('post')) {
                  if (!empty($this->data)) {
                        $noticia = $this->Noticia->save($this->request->data);
                        if (!empty($noticia)) {

                              //$this->Noticia->NoticiaImagen->create();
                             $imagens = $this->request->data['Noticia']['imagens'];
                             //  print_r($imagens);
                             //      exit;
                              $noticia_id = $this->Noticia->id;
                             
                              foreach($this->request->data['Noticia']['imagens'] as $image) {
                                
                                   
                                    $titulo = $image['name'];
                                      print_r($titulo . '<br>');
                                       $this->Noticia->NoticiaImagen->save(array('noticia_id' => $noticia_id, 'titulo' => $titulo, 'destaque' => true));
                                    
                              }
                             

                              //$this->redirect(array('action' => 'index'));
                        } else {
                              $this->Session->setFlash(__('The noticia could not be saved. Please, try again.'));
                        }
                  }
            }

            if (!empty($this->data)) {
                  
            }
            //exit;
//              foreach ($_FILES as $file) {
//                              $uploadfile = $uploaddir . basename($file['name']);
//                              if (!move_uploaded_file($file["tmp_name"], $uploadfile)) {
//                                    echo set_e('error', 'Image [' . $i . '] not uploaded', '');
//                              }
//                        }
//            
//            // print_r($_FILES); exit;
//                  $imagens = new NoticiaImagen();
//                  if (isset($this->data['Noticia']['imagen'])) {
//                        $tempFile = $this->data['Noticia']['imagen']['tmp_name'];
//                        foreach ($tempFile as $key => $temp_name){
//                            $file_name = $key.$tempFile['imagen']['name'][$key];  
//                            print_r($file_name); exit;
//                        }
//                        $targetPath = UPLOADS_URL . 'banner/';
//                        $targetFile = $this->data['Banner']['arquivo']['name'];
//                        $targetFile = str_replace(" ", "", microtime()) . "." . strtolower(end(explode(".", $targetFile))); // renomeia o arquivo com data/hora precisão de milisegundos 
//                        $pathImage = $targetPath . $targetFile;
//                        $this->request->data['Banner']['arquivo'] = $targetFile;
//                        if ($this->Banner->save($this->request->data)) {
//                              if (is_uploaded_file($tempFile)) {
//                                    move_uploaded_file($tempFile, $pathImage);
//                              }
//                              $this->Session->setFlash(__('The banner has been saved'));
//                              $this->redirect(array('action' => 'index'));
//                        } else {
//                              $this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
//                        }
//                  }

            $this->loadModel('NoticiaCategoria');
            $categorias = $this->NoticiaCategoria->find('list', array(
                'conditions' => array(
                    'NoticiaCategoria.ativo' => 1
                    )));
            $this->set(compact('categorias'));
            $this->set('title_for_layout', __('Add News') . ' - ' . $this->title_for_layout);
      }

      public function admin_edit($id = null) {
            $this->Noticia->id = $id;
            if (!$this->Noticia->exists()) {
                  throw new NotFoundException(__('Invalid noticia'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                  if ($this->Noticia->save($this->request->data)) {
                        $this->Session->setFlash(__('The noticia has been saved'));
                        $this->redirect(array('action' => 'index'));
                  } else {
                        $this->Session->setFlash(__('The noticia could not be saved. Please, try again.'));
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
            $this->set(compact('categorias', 'noticia'));
            $this->set('title_for_layout', __('Edit News') . ' - ' . $this->title_for_layout);
      }

      public function admin_delete($id = null) {
            if (!$this->request->is('post')) {
                  throw new MethodNotAllowedException();
            }
            $this->Noticia->id = $id;
            if (!$this->Noticia->exists()) {
                  throw new NotFoundException(__('Invalid noticia'));
            }
            if ($this->Noticia->delete()) {
                  $this->Session->setFlash(__('Noticia deleted'));
                  $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Noticia was not deleted'));
            $this->redirect(array('action' => 'index'));
      }

}