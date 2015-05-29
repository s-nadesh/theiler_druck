<?php

class UserAddressesController extends AppController {

    public $name = 'UserAddresses';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->deny(array('profile', 'change_password', 'logout'));
    }

    public function billing_address() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $address = $this->UserAddress->find('first', array(
                'conditions' => array('UserAddress.user_id' => $this->Auth->user('user_id'), 'address_type' => 0),
                'recursive' => -1
            ));
            
            $this->request->data['UserAddress']['address_id'] = $address['UserAddress']['address_id'];
            if ($this->data['UserAddress']['address_company_type'] == 'Individual') {
                $this->request->data['UserAddress']['address_company_name'] = '';
            }
            
            if($this->UserAddress->save($this->request->data)){
                $this->Session->setFlash('Billing address updated successfully', 'flash_success');
            } else {
                $this->Session->setFlash('Billing address can not updated', 'flash_error');
            }
        }

        $this->data = $this->UserAddress->find('first', array(
            'conditions' => array('UserAddress.user_id' => $this->Auth->user('user_id'), 'address_type' => 0),
            'recursive' => -1
        ));
    }

}
