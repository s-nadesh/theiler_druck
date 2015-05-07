<?php

class AdminsController extends AppController {

    public $name = 'Admins';

    public function beforeFilter() {
        $admin_auth_actions = array('admin_index', 'admin_profile', 'admin_change_password', 'admin_logout');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'admins');
        parent::beforeFilter();
    }

    //Admin Login function
    public function admin_login() {
        if ($this->request->is('post')) {
            $hashed = MyClass::encrypt($this->data['Admin']['admin_password']);
            $admin_user = $this->Admin->find('first', array(
                'conditions' => array(
                    'admin_email' => $this->data['Admin']['admin_email'],
                    'admin_password' => $hashed
                )
            ));

            if (!empty($admin_user)) {
                $this->Session->write('Admin.id', $admin_user['Admin']['admin_id']);
                $this->Session->write('Admin.name', $admin_user['Admin']['admin_name']);
                $this->Session->write('Admin.email', $admin_user['Admin']['admin_email']);
                $this->goAdminHome();
            } else {
                $this->Session->setFlash(__('Email/Password combination was wrong'), 'flash_error');
            }
        }
    }

    //Admin logout function
    public function admin_logout() {
        $this->Session->delete('Admin.id');
        $this->Session->delete('Admin.name');
        $this->Session->delete('Admin.email');
        $this->Session->destroy();
        $this->Session->setFlash(__('You have logged out successfully!!!.'), 'flash_success');
        $this->goAdminLogin();
    }

    //Admin Dashboard function
    public function admin_index() {
        $this->set('title_for_layout', 'Dashboard');
    }

    //Admin Profile Update
    public function admin_profile() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Admin']['admin_id'] = $this->Session->read('Admin.id');
            if ($this->Admin->save($this->request->data)) {
                $this->Session->write('Admin.name', $this->request->data['Admin']['admin_name']);
                $this->Session->write('Admin.email', $this->request->data['Admin']['admin_email']);
                $this->Session->setFlash(__('Profile has been updated successfully!!!.'), 'flash_success');
            } else {
                $this->Session->setFlash(__('Profile can not be update.'), 'flash_error');
            }
        }
        $this->data = $this->Admin->findByAdminId($this->Session->read('Admin.id'));
    }

    //Admin Change Password
    public function admin_change_password() {
        if ($this->request->is('post')) {
            if ($this->data['Admin']['admin_new_password'] == $this->data['Admin']['admin_confirm_password']) {
                $hashed = MyClass::encrypt($this->data['Admin']['admin_new_password']);
                $update = array(
                    'Admin' => array(
                        'admin_id' => $this->Session->read('Admin.id'),
                        'admin_password' => $hashed,
                    )
                );
                if ($this->Admin->save($update)) {
                    $this->Session->setFlash(__('Password changed successfully.'), 'flash_success');
                } else {
                    $this->Session->setFlash(__('Password can not be changed .'), 'flash_error');
                }
            }
        }
    }

}
