<?php

App::uses('AppModel', 'Model');

/**
 * ProdutoImagem Model
 *
 * @property Produto $Produto
 */
class ProdutoImagem extends AppModel {

    public $useTable = 'produto_imagens';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'titulo';
    public $img = array(
        'path' => 'uploads/produtos/',
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
        'produto_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
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
        'Produto' => array(
            'className' => 'Produto',
            'foreignKey' => 'produto_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
