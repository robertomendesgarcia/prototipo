<?php

App::uses('AppModel', 'Model');

/**
 * Banner Model
 *
 * @property BannerTipo $BannerTipo
 */
class Banner extends AppModel {

      /**
       * Display field
       *
       * @var string
       */
      public $displayField = 'descricao';

      /**
       * Validation rules
       *
       * @var array
       */
      public $validate = array(
          'descricao' => array(
              'maxlength' => array(
                  'rule' => array('maxlength', 60),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              //'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
              ),
              'notempty' => array(
                  'rule' => array('notempty'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              //'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
              ),
          ),
//		'arquivo' => array(
//			'notempty' => array(
//				'rule' => array('maxlength', 60),
//				//'message' => 'Your custom message here',
//				'allowEmpty' => false,
//				'required' => true,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//		'validade' => array(
//			'datetime' => array(
//				'rule' => array('datetime'),
//				//'message' => 'Your custom message here',
//				'allowEmpty' => true,
//				'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
          'banner_tipo_id' => array(
              'numeric' => array(
                  'rule' => array('numeric'),
              //'message' => 'Your custom message here',
              //'allowEmpty' => false,
              //'required' => false,
              //'last' => false, // Stop validation after this rule
              //'on' => 'create', // Limit validation to 'create' or 'update' operations
              ),
              'notempty' => array(
                  'rule' => array('notempty'),
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
          'BannerTipo' => array(
              'className' => 'BannerTipo',
              'foreignKey' => 'banner_tipo_id',
              'conditions' => '',
              'fields' => '',
              'order' => ''
          )
      );

}
