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
    
    public function admin_index() {
        
        $users = $this->User->find('all', array(
            'order' => array('User.created DESC'),
            'recursive' => 0
        ));
        $this->set('title_for_layout', 'users');
        $this->set('admin_menu', 'users');
        $this->set(compact('users'));
	}
        
   public function admin_view($user_id) {
        if (!$this->User->exists($user_id)) {
            throw new NotFoundException(__('Invalid Page'));
        }

        $this->User->recursive = 0;
        $user = $this->User->findByUserId($user_id);

        $this->set('title_for_layout', 'User');
        $this->set('admin_menu', 'users');
        $this->set(compact('user'));
    }
    
    public function admin_edit($user_id) {
        if (!$this->User->exists($user_id)) {
            throw new NotFoundException(__('Invalid Page'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['User']['user_id'] = $user_id;
           if ($this->User->save($this->request->data)) {
//          $user_id = $this->Page->getLastInsertID();
                $this->Session->setFlash('Page has been successfully edited', 'flash_success');
                $this->redirect(array('controller' => 'users', 'action' => 'index', 'admin' => true));
            }
        } else {

            $this->data = $this->User->findByUserId($user_id);
//            print_r($this->data);exit;
        }
        $this->set('title_for_layouts', 'Edit User');
        $this->set('admin_menu', 'users');
    }
    
    public function admin_get_address($id) {

        $this->loadModel('UserAddress');
        $addrs =  $this->UserAddress->find('all',array('conditions' => array('UserAddress.user_id' => $id )));
       
        return $addrs;
    }
}
