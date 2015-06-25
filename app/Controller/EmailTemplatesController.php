<?php

App::uses('AppController', 'Controller');

class EmailTemplatesController extends AppController {

    public $components = array('Image');

    //This function will run before every action
    public function beforeFilter() {
        parent::beforeFilter();
        $admin_auth_actions = array('admin_index', 'admin_edit');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('title_for_layout', 'Email Templates');
        $this->set('admin_menu', 'email_templates');
    }

    public function admin_index() {
        $email_templates = $this->EmailTemplate->find('all', array(
            'order' => array('EmailTemplate.template_id ASC')
        ));
        $this->set(compact('email_templates'));
    }

    public function admin_edit($email_template_id) {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->EmailTemplate->save($this->request->data);
            $this->Session->setFlash(MyClass::translate("Content updated successfully"), 'flash_success');
        }
        $this->data = $this->EmailTemplate->findByTemplateId($email_template_id);
        $this->set('admin_menu', 'email_templates');
    }
}
