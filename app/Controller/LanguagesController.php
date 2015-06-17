<?php

class LanguagesController extends AppController {

    public $name = 'Languages';

    public function beforeFilter() {
        parent::beforeFilter();
        $admin_auth_actions = array('admin_index');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'languages');
    }

    //Admin Manage All Language Words
    public function admin_index() {
        $languages = $this->Language->find('all', array(
            'order' => array('Language.english ASC')
        ));

        $this->set(compact('languages'));
    }

    //Save recored from ajax request
    public function admin_update_languange() {
        if (!$this->Session->check('Admin.id')){
            echo 'Loggedout';
            exit;
        }
        
        if ($this->request->is('post')) {
            $update = array(
                'Language' => array(
                    'language_id' => $this->data['id'],
                    'german' => $this->data['german'],
                )
            );

            if ($this->Language->save($update)) {
                echo __("Language updated successfully.");
            } else {
                echo __("Language can not be updated, Please try again");
            }
            exit;
        }
    }

    ######################################################################################

    public function admin_update_po_mysql() {
        include WWW_ROOT . 'files/PO_Mysql/PO.php';

        $po = new File_Gettext_PO();
        $po->load(WWW_ROOT . 'files/PO_Mysql/default.po');
        $poArray = $po->toArray();

        foreach ($poArray['strings'] as $msgid => $msgstr) {
            $exists = $this->Language->find('first', array('conditions' => array('english' => $msgid)));

            if (empty($exists)) {
                $update = array(
                    'Language' => array(
                        'english' => $msgid
                    )
                );

                $this->Language->saveAll($update);
            }
        } exit;
    }

}
