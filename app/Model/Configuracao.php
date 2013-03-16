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

    const MENU_TOPO = 1;
    const MENU_ESQUERDA = 2;

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

    function afterSave($created) {
        parent::afterSave($created);

        $barra_lateral = null;
        $posicao_menu = null;
        $tamanho = 'grande';

        if ($this->data['Configuracao']['pin'] == 'usa_barra_lateral') {
            $barra_lateral = $this->data['Configuracao']['conteudo'];
            $registro = $this->find('first', array(
                'conditions' => array(
                    'pin' => 'posicao_menu'
                )
                    ));
            $posicao_menu = $registro['Configuracao']['conteudo'];
        } elseif ($this->data['Configuracao']['pin'] == 'posicao_menu') {
            $posicao_menu = $this->data['Configuracao']['conteudo'];
            $registro = $this->find('first', array(
                'conditions' => array(
                    'pin' => 'usa_barra_lateral'
                )
                    ));
            $barra_lateral = $registro['Configuracao']['conteudo'];
        }
        
//        die($barra_lateral . ' --- ' . $posicao_menu);

        if (!empty($posicao_menu) && !empty($barra_lateral)) {

            if ((($posicao_menu == 1) && ($barra_lateral)) ||
                    (($posicao_menu == 2) && (!$barra_lateral))) {
                $tamanho = 'medio';
            } elseif (($posicao_menu == 2) && ($barra_lateral)) {
                $tamanho = 'pequeno';
            }

            $tamanho_centro = $this->find('first', array(
                'conditions' => array(
                    'pin' => 'tamanho_centro'
                )
                    ));
            $tamanho_centro['Configuracao']['conteudo'] = $tamanho;
            $this->save($tamanho_centro);
        }

        return true;
    }
    
    public function getConfigs() {
        return $this->find('all');
    }

}
