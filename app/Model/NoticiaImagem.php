<?php

App::uses('AppModel', 'Model');

/**
 * NoticiaImagem Model
 *
 * @property Noticia $Noticia
 */
class NoticiaImagem extends AppModel {
    
    public $useTable = 'noticia_imagens';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'titulo';
    public $img = array(
        'path' => 'uploads/noticias/',
        'formatos' => array(
            'jpg',
            'jpeg',
            'png',
            'gif'
        )
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'noticia_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'destaque' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Noticia' => array(
            'className' => 'Noticia',
            'foreignKey' => 'noticia_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
