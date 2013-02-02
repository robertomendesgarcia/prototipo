<?php

App::uses('AppModel', 'Model');

/**
 * Configuraco Model
 *
 */
class Configuracao extends AppModel {

    public $img = array(
        'path' => 'uploads/layout/',
        'formatos' => array(
            'jpg',
            'jpeg',
            'png',
            'gif'
        )
    );

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'configuracoes';

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
        'pin' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field cannot be left blank.',
            ),
            'maxlength' => array(
                'rule' => array('maxlength', 60),
                'message' => 'This field must be less than 60 characters.',
            ),
        ),
        'descricao' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field cannot be left blank.',
            ),
            'maxlength' => array(
                'rule' => array('maxlength', 100),
                'message' => 'This field must be less than 100 characters.',
            ),
        ),
    );

}
