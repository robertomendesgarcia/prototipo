<?php

App::uses('AppModel', 'Model');

/**
 * Noticia Model
 *
 * @property Categoria $Categoria
 * @property NoticiaComentario $NoticiaComentario
 * @property NoticiaImagen $NoticiaImagen
 */
class Noticia extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'titulo';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'titulo' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank.'
            ),
            'maxlength' => array(
                'rule' => array('maxlength', 60),
                'message' => 'This field must be less than 60 characters.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'minlength' => array(
                'rule' => array('minlength', 6),
                'message' => 'This field must be at least 6 characters.',
            )
        ),
        'fonte' => array(
            'maxlength' => array(
                'rule' => array('maxlength', 60),
                'message' => 'This field must be less than 60 characters.',
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
        'categoria_id' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank.'
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
        'NoticiaCategoria' => array(
            'className' => 'NoticiaCategoria',
            'foreignKey' => 'categoria_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'NoticiaComentario' => array(
            'className' => 'NoticiaComentario',
            'foreignKey' => 'noticia_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'NoticiaImagen' => array(
            'className' => 'NoticiaImagen',
            'foreignKey' => 'noticia_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public function beforeDelete($cascade = false) {
        parent::beforeDelete($cascade);

        $this->NoticiaComentario->deleteAll(array(
            'conditions' => array(
                'NoticiaComentario.noticia_id' => $this->id
            )
                ), false);

        $this->NoticiaImagen->deleteAll(array(
            'conditions' => array(
                'NoticiaComentario.noticia_id' => $this->id
            )
                ), false);

        return true;
    }

}
