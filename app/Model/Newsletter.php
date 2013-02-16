<?php

App::uses('AppModel', 'Model');

class Newsletter extends AppModel {

      public $useTable = 'newsletter';
      public $displayField = 'nome';
      public $validate = array(
//          'nome' => array(
//              'notempty' => array(
//                  'rule' => array('notempty'),
//                  'message' => 'Please put your name',
//                  'allowEmpty' => false,
//                  'required' => true,
//              ),
//              'maxlength' => array(
//                  'rule' => array('maxlength' => 255),
//                  'message' => 'Number of characteres permitted is 255',
//                  'allowEmpty' => false,
//                  'required' => true,
//              ),
//          ),
//          'email' => array(
//              'email' => array(
//                  'rule' => 'email',
//                  'message' => 'Not a valid email address',
//                  'last' => true,
//                  'allowEmpty' => false,
//                  'required' => true,
//              )
//          ),
//          'data_inscricao' => array(
//              'datetime' => array(
//                  'rule' => array('datetime'),
//                  'allowEmpty' => false,
//                  'required' => true,
//                  'on' => 'create',
//              ),
//          ),
      );

}
