<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::uses('MyClass', 'Vendor');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth'
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->setLayout();
        $this->setLanguage();
        $this->setUserIdentity();
    }

    //Set Layout for all functions.
    public function setLayout() {
        if (isset($this->request->params['admin']) && ($this->request->params['prefix'] == 'admin')) {
            if ($this->Session->check('Admin.id')) {
                $this->layout = 'admin_inner';
            } else {
                $this->layout = 'admin_login';
            }
        } else {
            $this->layout = 'default';
        }
    }

    //Set Language for entire site.
    public function setLanguage() {
        if ($this->Session->check('Config.language')) {
            Configure::write('Config.language', $this->Session->read('Config.language'));
        }
    }

    //Auth component settings
    public function setUserIdentity() {
        $this->Auth->authorize = 'Controller';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => false);
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'profile', 'admin' => false);
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin' => false);

        $this->Auth->authenticate = array(
            AuthComponent::ALL => array(
                'userModel' => 'User',
                'fields' => array(
                    'username' => 'user_email',
                    'password' => 'user_password'
                ),
            ), 'Form'
        );
        
        $this->Auth->allow();

        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
    }

    public function isAuthorized($user) {
        return true;
    }

    public function goAdminHome() {
        $this->redirect(array('controller' => 'admins', 'action' => 'index', 'admin' => true));
    }

    public function goAdminLogin() {
        $this->redirect(array('controller' => 'admins', 'action' => 'login', 'admin' => true));
    }

    public function goHome() {
        $this->redirect('/');
    }

}
