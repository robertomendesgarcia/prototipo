<?php

App::uses('AppModel', 'AppModel');

class ProdutoCategoria extends AppModel {

    public $table = "produto_categorias";
    public $primaryKey = 'id';
    public $hasMany = array(
        'Produto' => array(
            'className' => 'Produto',
            'foreignKey' => 'categoria_id'
        ),
        'ProdutoCategoria' => array(
            'className' => 'ProdutoCategoria',
            'foreignKey' => 'categoria_id'
        ),
                
    );

}
