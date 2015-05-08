<?php

class AdminsController extends AppController {

    public $name = 'Admins';

    public function beforeFilter() {
        parent::beforeFilter();
        $admin_auth_actions = array('admin_index', 'admin_profile', 'admin_change_password', 'admin_logout');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'admins');
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
                $this->Session->write('Admin.last_login', $admin_user['Admin']['admin_last_login']);

                $update = array(
                    'Admin' => array(
                        'admin_id' => $admin_user['Admin']['admin_id'],
                        'admin_last_login' => date("Y-m-d H:i:s"),
                        'admin_login_ip' => IPADDRESS,
                    )
                );

                $this->Admin->save($update);

                $this->goAdminHome();
            } else {
                $this->Session->setFlash(__('Email/Password combination was wrong'), 'flash_error');
            }
        }
    }

    //Admin logout function
    public function admin_logout() {
        $this->Session->destroy();
        $this->Session->setFlash(__('You have logged out successfully!!!.'), 'flash_success');
        $this->goAdminLogin();
    }

    //Admin Dashboard function
    public function admin_index() {
        $this->set('title_for_layout', __('Dashboard'));
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

    //Admin Forgpt Password
    public function admin_forgot_password() {
        if ($this->request->is('post')) {
            $admin = $this->Admin->findByAdminEmail($this->data['Admin']['admin_email']);
            if (!empty($admin)) {
                $new_password = MyClass::getRandomString(5);
                $update = array(
                    'Admin' => array(
                        'admin_id' => $admin['Admin']['admin_id'],
                        'admin_password' => MyClass::encrypt($new_password)
                    )
                );
                $this->Admin->save($update); 
                
                $Email = new CakeEmail(MAILSENDBY);
                $Email->template('forgot_password', 'email_layout')
                        ->emailFormat('html')
                        ->to($admin['Admin']['admin_email'])
                        ->subject('Forgot Password Mail From - ' . SITE_NAME)
                        ->from(SITEMAIL)
                        ->viewVars(array('name' => $admin['Admin']['admin_name'], 'password'=>$new_password))
                        ->send();
                
                $this->Session->setFlash(__("New password has been sent to your mail."), 'flash_success');
                $this->goAdminLogin();
            } else {
                $this->Session->setFlash(__("This email address is not exists."), 'flash_error');
            }
        }
    }

}
