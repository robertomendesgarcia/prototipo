<?php

App::uses('AuthComponent', 'Controller/Component');

class Usuario extends AppModel {

    public $name = 'Usuario';
    public $validate = array(
        'nome' => array(
            'Obrigatorio' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank'
            ),
        ),
        'email' => 'email',
        'usuario' => array(
            'Obrigatorio' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank'
            ),
            'Tamanho' => array(
                'rule' => array('between', 5, 15),
                'message' => 'Between 5 to 15 characters'
            ),
            'AlphaNumerico' => array(
                'rule' => 'alphaNumeric',
                'message' => 'Only alphabets and numbers allowed'
            ),
            'Unico' => array(
                'rule' => 'isUnique',
                'message' => 'This username has already been taken.'
            )
        ),
        'senha' => array(
            'Obrigatorio' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank'
            ),
            'Tamanho' => array(
                'rule' => array('between', 8, 60),
                'message' => 'Password should be at least 8 chars long'
            ),
            'AlphaNumerico' => array(
                'rule' => 'alphaNumeric',
                'message' => 'Only alphabets and numbers allowed'
            ),
        ),
    );

    public function beforeSave($options = array()) {

        if (isset($this->data[$this->alias]['senha'])) {
            $this->data[$this->alias]['senha'] = AuthComponent::password($this->data[$this->alias]['senha']);
        }

        return true;
    }

//    public function validaLogin($login) {
//        $busca = $this->find('first', array(
//            'conditions' => array(
//                'usuario' => $login
//            )
//                ));
//        if (!empty($busca)) {
//            return false;
//        }
//        return true;
//    }
}
