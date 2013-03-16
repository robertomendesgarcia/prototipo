<?php

App::uses('AppModel', 'Model');

class UsuarioTipo extends AppModel {

    public $displayField = 'tipo';
    
    public $hasMany = array(
        'Usuario' => array(
            'className' => 'Usuario',
            'foreignKey' => 'tipo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
