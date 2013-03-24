<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');
App::import('Core', 'l10n');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $title_for_layout = 'WebFacility';

    /**
     * Define os componentes disponíveis por padrão
     *
     * @var array
     * @access public
     */
    public $components = array(
        'DebugKit.Toolbar',
        'Uteis',
        'Session',
        'Auth' => array(
            'authenticate' => array(
                'all' => array(
                    'userModel' => 'Usuario',
                    'fields' => array(
                        'username' => 'usuario',
                        'password' => 'senha'
                    ),
                ),
                'Form',
            ),
            'loginAction' => array(
                'controller' => 'usuarios',
                'action' => 'login',
                'admin' => false
            ),
            'authError' => 'You are not authorized to access that location.',
            'flash' => array(
                'element' => 'flash_message',
                'key' => 'admin',
                'params' => array(
                    'tipo' => 'warning'
                )
            )
        )
    );

    /**
     * Define os helpers disponíveis por padrão
     *
     * @var array
     * @access public
     */
    public $helpers = array(
        'Html',
        'Form',
        'Session',
        'Paginator',
        'Uteis',
        'PhpThumb.PhpThumb'
    );

    function beforeRender() {
        parent::beforeRender();
        if (!defined("DEFAULT_URL")) {
            define("DEFAULT_URL", Router::url("/", true));
        }

        if (isset($this->params['admin'])) {
            $this->layout = 'admin';
        }

        $this->loadModel('Configuracao');
        $config = $this->Configuracao->find('list', array(
            'fields' => array(
                'pin',
                'conteudo'
            )
                ));
        $this->set('config', $config);

        if ($config['mostrar_noticias_lateral']) {
            $this->loadModel('Noticia');
            $noticias = $this->Noticia->find('all', array(
                'conditions' => array(
                    'Noticia.ativo' => 1
                ),
                'order' => 'Noticia.destaque ASC, Noticia.data DESC',
                'limit' => !empty($config['qtde_noticias_lateral']) ? $config['qtde_noticias_lateral'] : 5,
                    ));
            $this->set('noticias_lateral', $noticias);
        }

        if ($config['mostrar_produtos_lateral']) {
            $this->loadModel('Produto');
            $produtos = $this->Produto->find('all', array(
                'conditions' => array(
                    'Produto.ativo' => 1
                ),
                'order' => 'Produto.destaque ASC',
                'limit' => !empty($config['qtde_produtos_lateral']) ? $config['qtde_produtos_lateral'] : 5,
                    ));
            $this->set('produtos_lateral', $produtos);
        }

        $this->loadModel('Pagina');
        $paginas = $this->Pagina->find('all', array(
            'conditions' => array(
                'Pagina.ativo' => 1
            ),
            'fields' => array(
                'pin',
                'titulo',
            )
                ));
        $this->set('opcoes_menu', $paginas);

        if ($config['usa_produtos']) {
            $this->loadModel('ProdutoCategoria');
            $produto_categorias = $this->ProdutoCategoria->find('all', array(
                'conditions' => array(
                    'ProdutoCategoria.ativo' => 1,
                    'ProdutoCategoria.parent_id' => null
                ),
                'order' => 'ProdutoCategoria.nome ASC',
                'fields' => array(
                    'ProdutoCategoria.id',
                    'ProdutoCategoria.nome',
                ),
                'recursive' => 5,
                'contain' => array(
                    'CategoriaFilha' => array(
                        'fields' => array(
                            'CategoriaFilha.id',
                            'CategoriaFilha.nome',
                        ),
                        'CategoriaFilha' => array(
                            'fields' => array(
                                'CategoriaFilha.id',
                                'CategoriaFilha.nome',
                            ),
                            'CategoriaFilha' => array(
                                'fields' => array(
                                    'CategoriaFilha.id',
                                    'CategoriaFilha.nome',
                                ),
                                'CategoriaFilha' => array(
                                    'fields' => array(
                                        'CategoriaFilha.id',
                                        'CategoriaFilha.nome',
                                    ),
                                    'CategoriaFilha' => array(
                                        'fields' => array(
                                            'CategoriaFilha.id',
                                            'CategoriaFilha.nome',
                                        ),
                                    )
                                )
                            )
                        )
                    )
                )
                    ));


//            $produto_categorias = $this->ProdutoCategoria->generateTreeList(array('ProdutoCategoria.ativo' => 1), null, null, '<ul><li>');

            $this->set('itens_produto_categorias', $produto_categorias);
        }
        
        if ($config['usa_noticias']) {
            $this->loadModel('NoticiaCategoria');
            $noticia_categorias = $this->NoticiaCategoria->find('all', array(
                'conditions' => array(
                    'NoticiaCategoria.ativo' => 1,
                    'NoticiaCategoria.parent_id' => null
                ),
                'order' => 'NoticiaCategoria.nome ASC',
                'fields' => array(
                    'NoticiaCategoria.id',
                    'NoticiaCategoria.nome',
                ),
                'recursive' => 5,
                'contain' => array(
                    'CategoriaFilha' => array(
                        'fields' => array(
                            'CategoriaFilha.id',
                            'CategoriaFilha.nome',
                        ),
                        'CategoriaFilha' => array(
                            'fields' => array(
                                'CategoriaFilha.id',
                                'CategoriaFilha.nome',
                            ),
                            'CategoriaFilha' => array(
                                'fields' => array(
                                    'CategoriaFilha.id',
                                    'CategoriaFilha.nome',
                                ),
                                'CategoriaFilha' => array(
                                    'fields' => array(
                                        'CategoriaFilha.id',
                                        'CategoriaFilha.nome',
                                    ),
                                    'CategoriaFilha' => array(
                                        'fields' => array(
                                            'CategoriaFilha.id',
                                            'CategoriaFilha.nome',
                                        ),
                                    )
                                )
                            )
                        )
                    )
                )
                    ));


//            $produto_categorias = $this->ProdutoCategoria->generateTreeList(array('ProdutoCategoria.ativo' => 1), null, null, '<ul><li>');

            $this->set('itens_noticia_categorias', $noticia_categorias);
        }


//        $this->loadModel('Menu');
//        $menu = $this->Menu->find('list', array(
//            'fields' => array(
//                'link',
//                'nome'
//            )
//                ));
//        $this->set('menu', $menu);
    }

    /**
     * Before Filter
     *
     * Função de callback executada antes que qualquer outra
     *
     * @access public
     * @link http://book.cakephp.org/pt/view/984/Callbacks
     */
    function beforeFilter() {
        Configure::write('Config.language', $this->Session->read('Config.language'));

        // Método de Hash da senha
        Security::setHash('md5');

        // Libera acesso para actions sem prefixo admin
        if (!(isset($this->params['admin']))) {
            $this->Auth->allow();

            $this->loadModel('Configuracao');
            $cfg = $this->Configuracao->find('first', array(
                'conditions' => array(
                    'Configuracao.pin' => 'titulo_site'
                )
                    ));
            $this->title_for_layout = $cfg['Configuracao']['conteudo'];
        }
    }

}