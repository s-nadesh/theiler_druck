<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    //This function will run before every action
    public function beforeFilter() {
        $admin_auth_actions = array('admin_index', 'admin_add', 'admin_view', 'admin_edit');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'pages');
        parent::beforeFilter();
    }

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function display() {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('page', 'subpage', 'title_for_layout'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    public function admin_index() {
        if($this->request->is('post')){
            pr($this->data); exit;
        }
        
    }

    public function admin_add() {

        $this->loadModel('LanguageType');
        $languagetype = $this->LanguageType->find(
                'all'
        );
        $max = $this->Page->find('first', array(
            'fields' => array('MAX(page_type_id) as Maxnumber')));
        $max_page = $max[0]['Maxnumber'] + 1;

        if (!empty($this->data)) {
            foreach ($this->data['Page'] as $key => $data) {
//                echo $key;
//                print_r($data);
                $this->request->data['Page']['page_type_id'] = $max_page;
                $this->request->data['Page']['language_type_id'] = $data['language_type_id'];
                $this->request->data['Page']['page_title'] = $data['page_title'];
                $this->request->data['Page']['page_description'] = $data['page_description'];
                $this->request->data['Page']['page_status'] = '1';
                $this->request->data['Page']['page_slug'] = Inflector::slug($data['page_title']);
                $this->Page->saveMany($this->request->data);
            }
            $this->Session->setFlash('Page has been successfully added', 'flash_success');
            $this->redirect(array('controller' => 'pages', 'action' => 'index', 'admin' => true));

            //   print_r($this->data);
//            exit;
        }

        $this->set(compact('languagetype'));
        $this->set('title_for_layouts', 'Add Page');
        $this->set('admin_menu', 'pages');
    }

    public function admin_view($page_id) {
        if (!$this->Page->exists($page_id)) {
            throw new NotFoundException(__('Invalid Page'));
        }

        $this->Page->recursive = 0;
        $page = $this->Page->findByPageId($page_id);

        $this->set('title_for_layout', 'Page');
        $this->set(compact('page'));
    }

    public function admin_edit($page_id) {
        if (!$this->Page->exists($page_id)) {
            throw new NotFoundException(__('Invalid Page'));
        }



        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Page']['page_id'] = $page_id;
            if ($this->Page->save($this->request->data)) {
//                $page_id = $this->Page->getLastInsertID();
                $this->Session->setFlash('Page has been successfully edited', 'flash_success');
                $this->redirect(array('controller' => 'pages', 'action' => 'index', 'admin' => true));
            }
        } else {

            $this->data = $this->Page->findByPageId($page_id);
//            print_r($this->data);exit;
        }
        $this->set('title_for_layouts', 'Add Page');
        $this->set('admin_menu', 'pages');
    }

    public function view($slug) {

        $lang_type_id = $this->Session->read('Config.language');
        $page_data = $this->Page->find('first', array('conditions' => array('Page.language_type_id' => $lang_type_id, 'Page.page_slug' => $slug)));
        $this->set(compact('page_data'));
    }

    public function admin_get_language_name($id) {
        $this->loadModel('LanguageType');
        $languagetype = $this->LanguageType->findByLanguageTypeId($id);
        return $languagetype;
    }
    
    public function one_page(){
        $this->set('cms_page_menu', true);
    }

}
