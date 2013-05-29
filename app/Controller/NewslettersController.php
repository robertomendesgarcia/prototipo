<?php

App::uses('AppController', 'Controller');

class NewslettersController extends AppController {

    public function admin_index() {
        $options = array(
            'order' => array(
                array('Newsletter.nome' => 'ASC'),
            ),
            'limit' => 1000
        );

        $this->paginate = $options;
        $newsletters = $this->paginate('Newsletter');

        $this->set('title_for_layout', __('Newsletter') . ' - ' . $this->title_for_layout);
        $this->set(compact('newsletters'));
    }

    public function admin_view($id = null) {
        $this->Newsletter->id = $id;
        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Newsletter inválido.'));
        }
        $this->set('newsletter', $this->Newsletter->read(null, $id));
    }

    public function admin_add() {
        if ($this->request->is('post') && !empty($this->data)) {
            $this->Newsletter->create();
            $this->request->data['Newsletter']['data_inscricao'] = date('Y-m-d H:i:s');
            if ($this->Newsletter->save($this->request->data)) {
                $this->Newsletter->save($this->data);
                $this->Session->setFlash(__('Newsletter salvo com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Erro ao salvar o newsletter.'), 'flash_message', array('tipo' => 'error'), 'admin');
            }
        }
        $this->set('title_for_layout', __('Newsletter') . ' - ' . $this->title_for_layout);
    }

    public function admin_edit($id = null) {
        $this->Newsletter->id = $id;
        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Newsletter inválido.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Newsletter->save($this->request->data)) {
                $this->Session->setFlash(__('Newsletter salvo com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Erro ao salvar o newsletter.'), 'flash_message', array('tipo' => 'error'), 'admin');
            }
        } else {
            $this->request->data = $this->Newsletter->read(null, $id);
        }
    }

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Newsletter->id = $id;
        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Newsletter inválido.'));
        }
        if ($this->Newsletter->delete()) {
            $this->Session->setFlash(__('Newsletter excluído com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Erro ao excluir o newsletter.'), 'flash_message', array('tipo' => 'error'), 'admin');
        $this->redirect(array('action' => 'index'));
    }

    public function add() {
        if ($this->request->is('post') && !empty($this->data)) {
            $this->Newsletter->create();
            $this->request->data['Newsletter']['data_inscricao'] = date('Y-m-d H:i:s');
            if ($this->Newsletter->save($this->request->data)) {
                $this->Newsletter->save($this->data);
                $this->Session->setFlash(__('Newsletter salvo com sucesso.'), 'flash_message', array('tipo' => 'success'), 'admin');
            } else {
                $this->Session->setFlash(__('Erro ao salvar o newsletter.'), 'flash_message', array('tipo' => 'error'), 'admin');
            }
        }
        $this->redirect($this->referer());
    }

    /**
     *
     * Dynamically generates a .csv file by looping through the results of a sql query.
     *
     */
    function admin_export() {
        ini_set('max_execution_time', 600); //increase max_execution_time to 10 min if data set is very large
        //create a file
        $filename = "newsletter_" . date("d_m_Y") . ".csv";
        $csv_file = fopen('php://output', 'w');

        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

//        $results = $this->ModelName->query($sql); // This is your sql query to pull that data you need exported
        //or
//        $results = $this->ModelName->find('all', array());
        $results = $this->Newsletter->find('all', array(
            'fields' => array('nome', 'email')
                ));

        // The column headings of your .csv file
        $header_row = array('Nome', 'E-mail');
        fputcsv($csv_file, $header_row, ',', '"');

        // Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
        foreach ($results as $result) {
            // Array indexes correspond to the field names in your db table(s)
            $row = array(
                $result['Newsletter']['nome'],
                $result['Newsletter']['email'],
            );

            fputcsv($csv_file, $row, ',', '"');
        }

        fclose($csv_file);
        
        $this->redirect($this->admin_index());
    }

}
