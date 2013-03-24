<?php

App::uses('AppModel', 'Model');

/**
 * ProdutoCategoria Model
 *
 * @property ProdutoCategoria $ParentProdutoCategoria
 * @property ProdutoCategoria $ChildProdutoCategoria
 */
class ProdutoCategoria extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'nome';
    public $actsAs = array('Tree', 'Containable');

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
            )
        ),
        'inativo' => array(
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
            'className' => 'ProdutoCategoria',
            'foreignKey' => 'parent_id',
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
        'CategoriaFilha' => array(
            'className' => 'ProdutoCategoria',
            'foreignKey' => 'parent_id',
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
        'Produto' => array(
            'className' => 'Produto',
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
                'ProdutoCategoria.id' => $this->id
            )
                ));
//        pr($categoria);
//        exit;
        if (!empty($categoria['CategoriaFilha'][0]['id'])) {
//            $this->Session->setFlash(__('This category can not be deleted because there are other categories related to it.'));
            return false;
        }

        if (!empty($categoria['Produto'][0]['id'])) {
//            $this->Session->setFlash(__('This category cannot be deleted because there are news related to it.'));
            return false;
        }

        return true;
    }

}
