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
App::uses('CakeEmail', 'Network/Email');

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

    //default component  
    public $components = array(
        'Session',
        'Auth'
    );

    //This function run every time before the action.
    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('cms_page_menu', false);
        $this->set('contact_page_menu', false);
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
        $this->Session->write('Config.language', 'de');
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

    //Common Function
    public function goAdminHome() {
        $this->redirect(array('controller' => 'admins', 'action' => 'index', 'admin' => true));
    }

    //Common Function
    public function goAdminLogin() {
        $this->redirect(array('controller' => 'admins', 'action' => 'login', 'admin' => true));
    }

    //Common Function
    public function goHome() {
        $this->redirect('/');
    }

    //Captcha function.
    public function getCaptcha() {
        $this->autoRender = false;
        $string = '';
        for ($i = 0; $i < 5; $i++) {
            $string .= chr(rand(97, 122));
        }

        $this->Session->write('Captcha.random_number', $string);
        $dir = WWW_ROOT . 'fonts/';
        $image = imagecreatetruecolor(165, 50);
        // random number 1 or 2
        $num = rand(1, 2);
        if ($num == 1) {
            $font = "Capture it 2.ttf"; // font style
        } else {
            $font = "Molot.otf"; // font style
        }

        // random number 1 or 2
        $num2 = rand(1, 2);
        if ($num2 == 1) {
            $color = imagecolorallocate($image, 113, 193, 217); // color
        } else {
            $color = imagecolorallocate($image, 163, 197, 82); // color
        }

        $white = imagecolorallocate($image, 255, 255, 255); // background color white
        imagefilledrectangle($image, 0, 0, 399, 99, $white);

        imagettftext($image, 30, 0, 10, 40, $color, $dir . $font, $this->Session->read('Captcha.random_number'));

        header("Content-type: image/png");
        imagepng($image);
    }

    public function sendMail($template_id, $to, $params = array()) {
        $template = ClassRegistry::init('EmailTemplate')->findByTemplateId($template_id);
        if (!empty($template)) {
            $message = $template['EmailTemplate']['template_content'];
            foreach ($params as $key => $param) {
                $message = str_replace("##{$key}##", $param, $message);
            }
            $Email = new CakeEmail(MAILSENDBY);
            $Email->template('email_template', 'email_layout')
                    ->emailFormat('html')
                    ->to($to)
                    ->replyTo($to)
                    ->subject($template['EmailTemplate']['template_subject'])
                    ->from($template['EmailTemplate']['template_from'])
                    ->viewVars(array(
                        'message' => $message
                    ))
                    ->send();
        }
    }

}
