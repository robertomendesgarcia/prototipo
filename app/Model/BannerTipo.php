<?php

App::uses('AppModel', 'Model');

/**
 * BannerTipo Model
 *
 * @property Banner $Banner
 */
class BannerTipo extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'tipo';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'tipo' => array(
            'maxlength' => array(
                'rule' => array('maxlength', 60),
                'message' => 'This field must be less than 60 characters.',
            ),
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field cannot be left blank.'
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Banner' => array(
            'className' => 'Banner',
            'foreignKey' => 'banner_tipo_id',
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

}
