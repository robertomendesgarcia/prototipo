<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'capa', 'admin' => false));
Router::connect('/a-empresa', array('controller' => 'pages', 'action' => 'display', 'a-empresa', 'admin' => false));
Router::connect('/trabalhe-conosco', array('controller' => 'pages', 'action' => 'trabalhe_conosco', 'admin' => false));
Router::connect('/contato', array('controller' => 'pages', 'action' => 'contato', 'admin' => false));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

Router::connect('/noticia-categorias', array('controller' => 'noticiacategorias', 'action' => 'index', 'admin' => true));
Router::connect('/noticia-categorias/*', array('controller' => 'noticiacategorias', 'admin' => true));
Router::connect('/produto-categorias/*', array('controller' => 'produtocategorias', 'admin' => true));

Router::connect('/instalador/criar-usuario-admin', array('controller' => 'instalador', 'action' => 'criar_usuario_admin', 'admin' => false));

Router::connect('/usuarios/bem-vindo', array('controller' => 'usuarios', 'action' => 'bem_vindo', 'admin' => true));
Router::connect('/login', array('controller' => 'usuarios', 'action' => 'login', 'admin' => false));
Router::connect('/logout', array('controller' => 'usuarios', 'action' => 'logout', 'admin' => false));
Router::connect('/admin', array('controller' => 'usuarios', 'action' => 'login', 'admin' => false));

Router::connect('/choose-language/*', array('controller' => 'usuarios', 'action' => 'choose_language', 'admin' => false));



/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';

