<?php

class LanguagesController extends AppController {

    public $name = 'Languages';

    public function beforeFilter() {
        parent::beforeFilter();
    }

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
