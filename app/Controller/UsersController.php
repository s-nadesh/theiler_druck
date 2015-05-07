<?php

class UsersController extends AppController {

    public $name = 'Users';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->deny(array('profile', 'logout'));
    }

    public function register() {
        if ($this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__("Your registration completed successfully"), 'flash_success');
            } else {
                $this->Session->setFlash(__("Registration failed"), 'flash_error');
            }
        }
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Login is incorrect'), 'flash_error');
            }
        }
        
        $this->set('title_for_layout', 'Login');
    }

    public function logout() {
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
    }

    public function profile() {
        
    }

}
