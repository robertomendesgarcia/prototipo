<?php

//-- Créditos a Pedro Elsner
//-- http://pedroelsner.com/2011/07/criando-uma-area-restrita-no-cakephp/

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

    /**
     * Define os componentes disponíveis por padrão
     *
     * @var array
     * @access public
     */
    public $components = array(
        'DebugKit.Toolbar',
        'Session',
        'Auth'
    );

    /**
     * Define os helpers disponíveis por padrão
     *
     * @var array
     * @access public
     */
    var $helpers = array(
        'Html',
        'Form',
        'Session',
        'Paginator'
    );

    function beforeRender() {
        parent::beforeRender();
        if (!defined("DEFAULT_URL")) {
            define("DEFAULT_URL", Router::url("/", true));
        }
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

        Security::setHash('md5'); // Método de Hash da senha

        $this->Auth->userModel = "Usuario"; // Nome do modelo para os usuários

        $this->Auth->fields = array(
            'username' => 'usuario', // Troque o segundo parametro se desejar

            'password' => 'senha', // Troque o segundo parametro se desejar
        );

//        $this->Auth->userScope = array(
//            'User.active' => '1' // Permite apenas usuários ativos
//        );

        $this->Auth->authorize = 'controller'; // Utiliza a função isAuthorize para autorizar os usuários

        $this->Auth->autoRedirect = true; // Redireciona o usuário para a requisição anterior que foi negada após o login

        $this->Auth->loginAction = array(
            'controller' => 'usuarios',
            'action' => 'login',
            'admin' => false
        );

        $this->Auth->loginRedirect = array(
            'controller' => 'pages',
            'action' => 'index',
            'admin' => true
        );

        $this->Auth->logoutRedirect = array(
            'controller' => 'pages',
            'action' => 'home',
            'admin' => false
        );

        $this->Auth->loginError = __('Usuário ou senha inválidos.', true);
        $this->Auth->authError = __('Você não tem permissão para acessar.', true);

        // Libera acesso para actions sem prefixo admin
        if (!(isset($this->params['admin']))) {
            $this->Auth->allow('*');
        }
    }

    /**
     * Is Authorized
     *
     * Faz a autorização do usuário
     *
     * @return boolean
     * @access public
     */
    function isAuthorized() {
        // Pode ser mais complexo antes de liberar o acesso
        return true;
    }

}
