<?php

class StaticPagesController extends AppController {

    public $name = 'StaticPages';
//    public $components = array('Image');

    //This function will run before every action
    public function beforeFilter() {
        $admin_auth_actions = array('admin_index', 'admin_add', 'admin_view', 'admin_edit');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'cms');
        parent::beforeFilter();
    }

    //Admin StaticPage Manage
    public function admin_index() {
        $static_pages = $this->StaticPage->find('all', array(
            'order' => array('StaticPage.created DESC'),
            'recursive' => 0
        ));
        $this->set('title_for_layout', 'StaticPage');
        $this->set('admin_menu', 'static_pages');
        $this->set(compact('static_pages'));
    }

    //Admin View Single StaticPage
    public function admin_view($product_id) {
        $this->StaticPage->recursive = 0;
        $product = $this->StaticPage->findByStaticPageId($product_id);

        if (empty($product)) {
            $this->Session->setFlash('This StaticPage Not Exists', 'flash_error');
            return $this->redirect('index');
        }

        $this->set('title_for_layout', 'StaticPage');
        $this->set(compact('product'));
    }

    //Admin add product
    public function admin_add() {
        if ($this->request->is('post')) {
            if ($this->StaticPage->save($this->request->data)) {
                $this->Session->setFlash('Static Page has been successfully added', 'flash_success');
                $this->redirect(array('controller' => 'static_pages', 'action' => 'add','admin' => true));
            }
        }
        $this->set('admin_menu', 'static_pages');
    }

    //Admin edit product
    public function admin_edit($page_id) {
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->StaticPage->save($this->request->data)) {
                $page_id = $this->StaticPage->getLastInsertID();
                $this->Session->setFlash('Static Page has been successfully added', 'flash_success');
                $this->redirect(array('controller' => 'static_pages', 'action' => 'edit', $page_id, 'admin' => true));
            }
        } else {
            $this->data = $this->StaticPage->findByPageId($page_id);

            if (empty($this->data)) {
                $this->Session->setFlash('This Static Page Not Exists', 'flash_error');
                return $this->redirect('index');
            }
        }
    }

    public function getlanguages($lang = NULL) {
        $languages = array(
            'de' => 'German',
        );
        if($lang != NULL)
            return $languages[$lang];
        return $languages;
    }

}
