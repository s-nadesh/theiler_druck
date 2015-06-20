<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

Router::connect('/admin', array('controller' => 'admins', 'action' => 'index', 'admin' => true));
Router::connect('/admin/login', array('controller' => 'admins', 'action' => 'login', 'admin' => true));
Router::connect('/admin/profile', array('controller' => 'admins', 'action' => 'profile', 'admin' => true));
Router::connect('/admin/change_password', array('controller' => 'admins', 'action' => 'change_password', 'admin' => true));
Router::connect('/admin/logout', array('controller' => 'admins', 'action' => 'logout', 'admin' => true));
Router::connect('/admin/forgot_password', array('controller' => 'admins', 'action' => 'forgot_password', 'admin' => true));

Router::connect('/product/*', array('controller' => 'products', 'action' => 'view'), array('pass' => array('slug', 'cart_items_key')));

Router::connect('/pages/leistungen', array('controller' => 'pages', 'action' => 'one_page', 2));
Router::connect('/pages/informationen', array('controller' => 'pages', 'action' => 'one_page', 1));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
