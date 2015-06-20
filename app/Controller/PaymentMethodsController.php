<?php

App::uses('AppController', 'Controller');

class PaymentMethodsController extends AppController {

    public $components = array('Image');

    //This function will run before every action
    public function beforeFilter() {
        parent::beforeFilter();
        $admin_auth_actions = array('admin_index', 'admin_edit');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'payment_methods');
    }

    public function admin_index() {
        $payment_methods = $this->PaymentMethod->find('all', array(
            'conditions' => array('PaymentMethod.is_active = "1"'),
            'order' => array('PaymentMethod.payment_id ASC')
        ));

        $this->set('title_for_layout', 'payment methods');
        $this->set(compact('payment_methods'));
    }

    public function admin_edit($payment_method_id) {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->PaymentMethod->save($this->request->data);
            $this->Session->setFlash(MyClass::translate("Content updated successfully"), 'flash_success');
        }
        $this->data = $this->PaymentMethod->findByPaymentId($payment_method_id);
        $this->set('admin_menu', 'payment_methods');
    }
}
