<?php

class UsersController extends AppController {

    public $name = 'Users';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->deny(array('profile', 'logout'));
         $admin_auth_actions = array('admin_index', 'admin_view', 'admin_edit');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
    }

    public function register() {
        if ($this->request->is('post')) {
//            print_r($this->data);exit;
            $this->request->data['User']['user_name'] = $this->data['UserAddress']['address_firstname'] . ' ' . $this->data['UserAddress']['address_lastname'];

            if ($this->data['User']['user_dob']) {
                $this->request->data['User']['user_dob'] = date(DB_DATE_FORMAT, strtotime($this->data['User']['user_dob']));
            }
            if ($this->User->save($this->request->data)) {
                $user_id = $this->User->getLastInsertId();
                $this->loadModel('UserAddress');
                if ($this->request->data['UserAddress']['address_company_type'] == 'Individual') {
                    $this->request->data['UserAddress']['address_company_name'] = '';
                }
                $this->request->data['UserAddress']['address_type'] = 0;
                $this->request->data['UserAddress']['user_id'] = $user_id;
                $this->UserAddress->save($this->request->data);

                $this->request->data['User']['user_id'] = $user_id;
                unset($this->request->data['User']['user_password']);
                unset($this->request->data['User']['user_repeat_password']);
                $this->Auth->login($this->request->data['User']);
                return $this->redirect($this->Auth->redirect());
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
                $this->Session->setFlash('User has been successfully edited', 'flash_success');
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
    
    public function get_user($user_id){
        $user = $this->User->findByUserId($user_id);
        return $user;
    }
}
