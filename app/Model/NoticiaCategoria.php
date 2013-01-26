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
                'message' => 'This field must be less than 60 characters.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'minlength' => array(
                'rule' => array('minlength', 6),
                'message' => 'This field must be at least 6 characters.',
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
        'CategoriaPai' => array(
            'className' => 'NoticiaCategoria',
            'foreignKey' => 'parent_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'CategoriaFilha' => array(
            'className' => 'NoticiaCategoria',
            'foreignKey' => 'parent_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Noticia' => array(
            'className' => 'Noticia',
            'foreignKey' => 'categoria_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public function beforeDelete($cascade = false) {
        parent::beforeDelete($cascade);

        $categoria = $this->find('first', array(
            'conditions' => array(
                'NoticiaCategoria.id' => $this->id
            )
                ));
//        pr($categoria);exit;
        if (!empty($categoria['CategoriaFilha'][0]['id'])) {
//            $this->Session->setFlash(__('This category can not be deleted because there are other categories related to it.'));
            return false;
        }

        if (!empty($categoria['Noticia'][0]['id'])) {
//            $this->Session->setFlash(__('This category cannot be deleted because there are news related to it.'));
            return false;
        }

        return true;
    }

}
