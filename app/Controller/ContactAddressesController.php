<?php

/**
 * Static content controller.
 *
 * This file will render views from views/ContactAddress/
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
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/ContactAddress-controller.html
 */
class ContactAddressesController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

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
            $this->Session->setFlash(__("Contact Address updated successfully"), 'flash_success');
        }
        $ContactAddress_content = $this->data = $this->ContactAddress->findByContAddrId($ContactAddress_id);
        $this->set(compact('ContactAddress_content'));
    }
    
    public function getContactaddress($type) {
        return $this->ContactAddress->findByContAddrType($type);
    }
}
