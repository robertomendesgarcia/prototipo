<?php

App::uses('AppModel', 'Model');

/**
 * NoticiaCategoria Model
 *
 * @property Categoria $Categoria
 */
class NoticiaCategoria extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'nome';
    
    public $actsAs = array('Tree');

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'nome' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank.'
            ),
            'maxlength' => array(
                'rule' => array('maxlength', 60),
                'message' => 'Your custom message here.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'minlength' => array(
                'rule' => array('minlength', 6),
                'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'ativo' => array(
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
        'Categoria' => array(
            'className' => 'NoticiaCategoria',
            'foreignKey' => 'parent_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
