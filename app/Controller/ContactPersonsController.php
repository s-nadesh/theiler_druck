<?php

App::uses('AppController', 'Controller');

class ContactPersonsController extends AppController {

    //This function will run before every action
    public function beforeFilter() {
        parent::beforeFilter();
        $admin_auth_actions = array('admin_index', 'admin_add', 'admin_edit');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('title_for_layout', MyClass::translate('Contact Persons'));
        $this->set('admin_menu', 'contactPersons');
    }

    public function admin_index() {
        $contactPersons = $this->ContactPerson->find('all', array(
            'order' => array('ContactPerson.created DESC')
        ));
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
                $this->Session->setFlash(MyClass::translate('ContactPerson has been successfully added'), 'flash_success');
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
            $this->Session->setFlash(MyClass::translate("Content updated successfully"), 'flash_success');
        }
        $this->data = $this->ContactPerson->findByContPersId($contactPerson_id);
    }

}
