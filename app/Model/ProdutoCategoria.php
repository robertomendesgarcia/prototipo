<?php

class ProdutoCategoria extends AppModel {

    public $table = "produto_categorias";
    public $actsAs = array('Tree');
    public $displayField = 'nome';
//    public $actsAs = array('Containable');
//    public $hasMany = array(
////        'Produto' => array(
////            'className' => 'Produto',
////            'foreignKey' => 'categoria_id'
////        ),
//        'ProdutoCategoriaFilhas' => array(
//            'className' => 'ProdutoCategoria',
//            'foreignKey' => 'categoria_id'
//        ),
//    );
//    public $hasOne = array(
//        'ProdutoCategoriaPai' => array(
//            'className' => 'ProdutoCategoria',
//            'foreignKey' => 'categoria_id'
//        ),
//    );
    public $validate = array(
        'nome' => array(
            'Obrigatorio' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank'
            ),
        ),
    );

}
