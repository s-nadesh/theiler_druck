<?php

/**
 * Static content controller.
 *
 * This file will render views from views/contactPersons/
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
 * @link http://book.cakephp.org/2.0/en/controllers/contactPersons-controller.html
 */
class ContactPersonsController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    //This function will run before every action
    public function beforeFilter() {
        parent::beforeFilter();
        $admin_auth_actions = array('admin_index', 'admin_add', 'admin_edit');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'contactPersons');
    }

    public function admin_index() {
        $contactPersons = $this->ContactPerson->find('all', array(
            'order' => array('ContactPerson.created DESC')
        ));

        $this->set('title_for_layout', 'contactPersons');
        $this->set('admin_menu', 'contactPersons');
        $this->set(compact('contactPersons'));
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            if (!empty($this->request->data['ContactPerson']['cont_pers_image']['name'])) {
                $image_name = MyClass::getRandomString(5) . "_" . $this->data['ContactPerson']['cont_pers_image']['name'];
                $image_path = CONTACT_PERSON_IMAGE_FOLDER . $image_name;
                $image_temp_name = $this->data['ContactPerson']['cont_pers_image']['tmp_name'];
                move_uploaded_file($image_temp_name, $image_path);
                $this->request->data['ContactPerson']['cont_pers_image'] = $image_name;
            } else {
                unset($this->request->data['ContactPerson']['cont_pers_image']);
            }
            
            if ($this->ContactPerson->save($this->request->data)) {
                $contactPerson_id = $this->ContactPerson->getLastInsertID();
                $this->Session->setFlash(__('ContactPerson has been successfully added'), 'flash_success');
                $this->redirect(array('controller' => 'contactPersons', 'action' => 'edit', $contactPerson_id, 'admin' => true));
            }
        }
    }

    public function admin_edit($contactPerson_id) {
        if ($this->request->is('post') || $this->request->is('put')) {
            if (!empty($this->request->data['ContactPerson']['cont_pers_image']['name'])) {
                $image_name = MyClass::getRandomString(5) . "_" . $this->data['ContactPerson']['cont_pers_image']['name'];
                $image_path = CONTACT_PERSON_IMAGE_FOLDER . $image_name;
                $image_temp_name = $this->data['ContactPerson']['cont_pers_image']['tmp_name'];
                move_uploaded_file($image_temp_name, $image_path);
                $this->request->data['ContactPerson']['cont_pers_image'] = $image_name;
                $old_image_path = CONTACT_PERSON_IMAGE_FOLDER . $this->data['ContactPerson']['cont_pers_old_image'];
                MyClass::fileDelete($old_image_path);
            } else {
                unset($this->request->data['ContactPerson']['cont_pers_image']);
            }
            
            $this->ContactPerson->save($this->request->data);
            $this->Session->setFlash(__("Content updated successfully"), 'flash_success');
        }
        $this->data = $this->ContactPerson->findByContPersId($contactPerson_id);
    }

}
