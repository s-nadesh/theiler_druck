<?php

class UsersController extends AppController {

    public $name = 'Users';

    //This function will execute before every action.
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->deny(array('profile', 'change_password', 'logout'));
        $admin_auth_actions = array('admin_index', 'admin_view', 'admin_edit', 'admin_delete');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
    }

    //User Registration function.
    public function register() {
        if ($this->request->is('post')) {
            $this->request->data['User']['user_name'] = $this->data['UserAddress']['address_firstname'];
            $this->request->data['User']['user_lastname'] = $this->data['UserAddress']['address_lastname'];

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
                $this->Session->setFlash(MyClass::translate("Registration completed successfully, You can login now"), 'flash_success');
                return $this->redirect('login');
            } else {
                $this->Session->setFlash(MyClass::translate("Registration failed, Please try again"), 'flash_error');
            }
        }
    }

    //User Login function.
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->goHome());
            } else {
                $this->Session->setFlash(MyClass::translate('Login is incorrect'), 'flash_error');
            }
        }
        $this->set('title_for_layout', 'Login');
    }

    //User update profile information
    public function profile() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $user_update = array(
                'User' => array(
                    'user_id' => $this->Auth->user('user_id'),
                    'user_name' => $this->data['User']['user_name'],
                    'user_lastname' => $this->data['User']['user_lastname'],
                    'user_dob' => $this->data['User']['user_dob'],
                )
            );
            if ($this->User->save($user_update)) {
                $this->Session->setFlash(MyClass::translate('Profile updated successfully'), 'flash_success');
            } else {
                $this->Session->setFlash(MyClass::translate('Profile can not be updated'), 'flash_error');
            }
        }
        $this->data = $this->User->find('first', array('conditions' => array('User.user_id' => $this->Auth->user('user_id'))));
    }

    //User change password
    public function change_password() {
        if ($this->request->is('post')) {
            if ($this->data['User']['new_password'] == $this->data['User']['confirm_password']) {
                $change_password = array(
                    'User' => array(
                        'user_id' => $this->Auth->user('user_id'),
                        'user_password' => $this->data['User']['new_password'],
                        'current_password' => $this->data['User']['current_password']
                    )
                );

                if ($this->User->save($change_password)) {
                    $this->Session->setFlash(MyClass::translate('Password changed successfully'), 'flash_success');
                    $this->redirect('change_password');
                } else {
                    $this->Session->setFlash(MyClass::translate('Old password not matched'), 'flash_error');
                }
            } else {
                $this->Session->setFlash(MyClass::translate('Password does not match'), 'flash_error');
            }
        }
    }

    //User Logout function.
    public function logout() {
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
    }

    //User Forgot Password function.
    public function forgot_password() {
        if ($this->request->is('post')) {
            $user = $this->User->find('first', array('conditions' => array('User.user_email' => $this->data['User']['user_email'])));

            if (!empty($user)) {
                $reset_link = MyClass::getRandomString(25);
                $user_update = array(
                    'User' => array(
                        'user_id' => $user['User']['user_id'],
                        'password_reset_token' => $reset_link,
                        'modified' => date('Y-m-d H:i:s')
                    )
                );
                $this->User->save($user_update);

                $time_valid = date('Y-m-d H:i:s');
                $resetlink = SITE_BASE_URL . 'users/reset_password/' . $reset_link . '/' . $user['User']['user_id'];

                $this->sendMail(1, $this->data['User']['user_email'], array(
                    'NAME' => $user['User']['user_name'],
                    'RESET_LINK' => $resetlink,
                    'TIME_VALID' => $time_valid
                ));

                $this->Session->setFlash(MyClass::translate('Your Password Reset Link sent to your email address.'), 'flash_success');
                $this->redirect('login');
            } else {
                $this->Session->setFlash(MyClass::translate('This Email Address Not Exists'), 'flash_error');
            }
        }
    }

    public function reset_password($str, $id) {
        $user = $this->User->findByUserId($id);

        if (empty($user) || $user['User']['password_reset_token'] != $str) {
            $this->Session->setFlash(MyClass::translate('Not a valid Reset link'), 'flash_error');
            $this->redirect('login');
        } else {
            $start = strtotime($user['User']['modified']);
            $end = strtotime(date('Y-m-d H:i:s'));
            $seconds = $end - $start;
            $days = floor($seconds / 86400);
            $hours = floor(($seconds - ($days * 86400)) / 3600);
            $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600)) / 60);

            if ($minutes > 5) {
                $this->Session->setFlash(MyClass::translate('This Reset Link Expired. Please Try again.'), 'flash_error');
                $this->redirect('forgot_password');
            }
        }

        if ($this->request->is('post')) {
            $user_update = array(
                'User' => array(
                    'user_id' => $id,
                    'user_password' => $this->data['User']['user_password'],
                    'password_reset_token' => ''
                )
            );

            $this->User->save($user_update);
            $this->Session->setFlash(MyClass::translate('Your Password Changed Successfully.'), 'flash_success');
            $this->redirect('login');
        }
    }

    public function get_user($user_id) {
        $user = $this->User->findByUserId($user_id);
        return $user;
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
            throw new NotFoundException(MyClass::translate('Invalid Page'));
        }

        $this->User->recursive = 0;
        $user = $this->User->findByUserId($user_id);

        $this->set('title_for_layout', 'User');
        $this->set('admin_menu', 'users');
        $this->set(compact('user'));
    }

    public function admin_edit($user_id) {
        if (!$this->User->exists($user_id)) {
            throw new NotFoundException(MyClass::translate('Invalid Page'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['User']['user_id'] = $user_id;
            if ($this->User->save($this->request->data)) {
//          $user_id = $this->Page->getLastInsertID();
                $this->Session->setFlash(MyClass::translate('User has been successfully edited'), 'flash_success');
                $this->redirect(array('controller' => 'users', 'action' => 'index', 'admin' => true));
            }
        } else {

            $this->data = $this->User->findByUserId($user_id);
//            print_r($this->data);exit;
        }
        $this->set('title_for_layouts', 'Edit User');
        $this->set('admin_menu', 'users');
    }

    public function admin_delete($user_id) {
        if (!$this->User->exists($user_id)) {
            throw new NotFoundException(MyClass::translate('Invalid User'));
        }

        $this->loadModel('Order');
        //Check any order is "IN-PROGRESS" stage for this user.
        $user_order_progress = $this->Order->find('first', array(
            'conditions' => array('Order.user_id' => $user_id, 'Order.order_status' => 2)
        ));

        if (!empty($user_order_progress)) {
            $this->Session->setFlash(MyClass::translate('This user order is IN-PROGRESS, So can not be deleted'), 'flash_error');
            $this->redirect(array('controller' => 'users', 'action' => 'index', 'admin' => true));
        }

        $user_orders = $this->Order->findAllByUserId($user_id);
        
        if (!empty($user_orders)) {
            foreach ($user_orders as $user_order) {
                foreach ($user_order['OrderItem'] as $order_item) {
                    $order_item_product_value = MyClass::decodeJSON($order_item['order_item_product_value']);
                    $uploaded_pictures = $order_item_product_value->item_picture_upload;
                    if (!empty($uploaded_pictures)) {
                        foreach ($uploaded_pictures as $value) {
                            $filePath = ORDER_FILE_FOLDER . $value;
                            if (file_exists($filePath)) {
                                MyClass::fileDelete($filePath);
                            }
                        }
                    }
                }
                $this->Order->delete($user_order['Order']['order_id'], true);
            }
        }

        if ($this->User->delete($user_id, true)) {
            $this->Session->setFlash(MyClass::translate('User deleted successfully'), 'flash_success');
            $this->redirect(array('controller' => 'users', 'action' => 'index', 'admin' => true));
        }
    }

    public function admin_get_address($id) {
        $this->loadModel('UserAddress');
        $addrs = $this->UserAddress->find('all', array('conditions' => array('UserAddress.user_id' => $id)));
        return $addrs;
    }

}
