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

    public $components = array(
        'DebugKit.Toolbar',
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'usuarios', 'action' => 'bem_vindo'),
            'logoutRedirect' => array('controller' => 'usuarios', 'action' => 'login'),
            'loginAction' => array('controller' => 'usuarios', 'action' => 'login', 'plugin' => null),
            'settings' => array(
                'fields' => array(
                    'username' => 'usuario',
                    'password' => 'senha'
                ),
                'userModel' => 'Usuario',
                'scope' => array(),
                'recursive' => 0,
                'contain' => null,
            ),
        ),
    );

    function beforeRender() {
        parent::beforeRender();
        if (!defined("DEFAULT_URL")) {
            define("DEFAULT_URL", Router::url("/", true));
        }
    }

    function beforeFilter() {
        //$this->Auth->allow('index', 'view');

//        $locale = Configure::read('Config.language');
//        if ($locale && file_exists(VIEWS . $locale . DS . $this->viewPath)) {
//            // e.g. use /app/View/fre/Pages/tos.ctp instead of /app/View/Pages/tos.ctp
//            $this->viewPath = $locale . DS . $this->viewPath;
//        }
    }

}
