<?php

App::uses('AuthComponent', 'Controller/Component');

class Usuario extends AppModel {

    public $name = 'Usuario';
//    public $virtualFields = array(
//        'confirmar_senha' => ''
//    );

    public $validate = array(
        'nome' => array(
            'Obrigatorio' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank.'
            ),
        ),
        'email' => 'email',
        'usuario' => array(
            'Obrigatorio' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank.'
            ),
            'Tamanho' => array(
                'rule' => array('between', 5, 15),
                'message' => 'Between 5 to 15 characters.'
            ),
            'AlphaNumerico' => array(
                'rule' => 'alphaNumeric',
                'message' => 'Only alphabets and numbers allowed.'
            ),
            'Unico' => array(
                'rule' => 'isUnique',
                'message' => 'This username has already been taken.'
            )
        ),
        'senha' => array(
            'Obrigatorio' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank.'
            ),
            'Tamanho' => array(
                'rule' => array('between', 6, 60),
                'message' => 'Password should be at least 6 chars long.'
            ),
            'AlphaNumerico' => array(
                'rule' => 'alphaNumeric',
                'message' => 'Only alphabets and numbers allowed.'
            ),
            'confirmarSenha' => array(
                'rule' => array('confirmarSenha'),
                'message' => 'A senha e sua confirmação não são iguais.'
            )
        ),
    );
    public $belongsTo = array(
        'UsuarioTipo' => array(
            'className' => 'UsuarioTipo',
            'foreignKey' => 'tipo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public function confirmarSenha($data) {
        // $data will contain array('password' => 'value')
        if (isset($this->data[$this->alias]['confirmar_senha'])) {
            return $this->data[$this->alias]['confirmar_senha'] === current($data);
        }
        return true;
    }

    public function beforeSave($options = array()) {

        if (isset($this->data[$this->alias]['senha']) && isset($this->data[$this->alias]['confirmar_senha'])) {
            if ($this->data[$this->alias]['senha'] <> $this->data[$this->alias]['confirmar_senha']) {
                return false;
            }
        }

        if (isset($this->data[$this->alias]['senha'])) {
            $this->data[$this->alias]['senha'] = AuthComponent::password($this->data[$this->alias]['senha']);
        }

        return true;
    }

}
