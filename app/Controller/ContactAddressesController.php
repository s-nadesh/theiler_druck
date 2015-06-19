<?php

App::uses('AppController', 'Controller');

class ContactAddressesController extends AppController {

    //This function will run before every action
    public function beforeFilter() {
        parent::beforeFilter();
        $admin_auth_actions = array('admin_index', 'admin_edit');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'ContactAddress');
    }

    public function admin_index() {
        $ContactAddresses = $this->ContactAddress->find('all', array(
            'order' => array('ContactAddress.created DESC')
        ));

        $this->set('title_for_layout', 'Contact Address');
        $this->set('admin_menu', 'ContactAddress');
        $this->set(compact('ContactAddresses'));
    }

    public function admin_edit($ContactAddress_id) {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->ContactAddress->save($this->request->data);
            $this->Session->setFlash(MyClass::translate("Contact Address updated successfully"), 'flash_success');
        }
        $ContactAddress_content = $this->data = $this->ContactAddress->findByContAddrId($ContactAddress_id);
        $this->set(compact('ContactAddress_content'));
    }
    
    public function getContactaddress($type) {
        return $this->ContactAddress->findByContAddrType($type);
    }
}
