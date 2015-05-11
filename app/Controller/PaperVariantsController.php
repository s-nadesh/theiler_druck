<?php

class PaperVariantsController extends AppController {

    public $name = 'PaperVariants';

    //This function will run before every action
    public function beforeFilter() {
        parent::beforeFilter();
        $admin_auth_actions = array('admin_index', 'admin_edit');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'paper_variants');
    }

    //Admin Manage Paper Variants.
    public function admin_index() {
        $papers = $this->PaperVariant->find('all');
        $this->set('title_for_layout', __('Paper Variants'));
        $this->set(compact('papers'));
    }

    //Admin Edit Paper Variant.
    public function admin_edit($paper_id) {
        if (!$this->PaperVariant->exists($paper_id)) {
            throw new NotFoundException(__('Invalid Paper Variant'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['PaperVariant']['paper_id'] = $paper_id;
            $range_gram = MyClass::mGramToGram($this->request->data['PaperVariant']['paper_rang_mgrm']);
            $this->request->data['PaperVariant']['paper_rang_grm'] = $range_gram;
            if ($this->PaperVariant->save($this->request->data)) {
                $this->Session->setFlash(__('Paper Variant Updated Successfully!!!'), 'flash_success');
                $this->redirect('index');
            } else {
                $this->Session->setFlash(__('Paper Variant Not Updated'), 'flash_error');
            }
        } else {
            $this->data = $this->PaperVariant->findByPaperId($paper_id);
        }
        $this->set('title_for_layout', __('Paper Variants'));
    }

    public function getPaperVariants() {
        $result = $this->PaperVariant->find('all', array(
            'order' => array('PaperVariant.paper_rang_mgrm ASC')
        ));

        return $result;
    }

    public function getPaperVariant($paper_id) {
        $result = $this->PaperVariant->findByPaperId($paper_id);

        return $result;
    }

}
