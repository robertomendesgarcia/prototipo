<?php

App::uses('AppModel', 'Model');

/**
 * Pagina Model
 *
 * @property Menu $Menu
 */
class Pagina extends AppModel {

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
     *//*
      public $validate = array(
      'pin' => array(
      'notempty' => array(
      'rule' => array('notempty'),
      //'message' => 'Your custom message here',
      //'allowEmpty' => false,
      //'required' => false,
      //'last' => false, // Stop validation after this rule
      //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
      'maxlength' => array(
      'rule' => array('maxlength' => 255),
      //'message' => 'Your custom message here',
      //'allowEmpty' => false,
      //'required' => false,
      //'last' => false, // Stop validation after this rule
      //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
      ),
      'titulo' => array(
      'notempty' => array(
      'rule' => array('notempty'),
      //'message' => 'Your custom message here',
      //'allowEmpty' => false,
      //'required' => false,
      //'last' => false, // Stop validation after this rule
      //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
      'maxlength' => array(
      'rule' => array('maxlength' => 255),
      //'message' => 'Your custom message here',
      //'allowEmpty' => false,
      //'required' => false,
      //'last' => false, // Stop validation after this rule
      //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
      ),
      );
     */
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
//	public $hasMany = array(
//		'Menu' => array(
//			'className' => 'Menu',
//			'foreignKey' => 'pagina_id',
//			'dependent' => false,
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'exclusive' => '',
//			'finderQuery' => '',
//			'counterQuery' => ''
//		)
//	);

    public function beforeSave($options = array()) {
        parent::beforeSave($options);

        if (empty($this->data['Pagina']['pin'])) {
            $this->data['Pagina']['pin'] = strtolower(UteisComponent::slug($this->data['Pagina']['titulo'])) . '_' . rand(1, 9999);
        }
    }

}
