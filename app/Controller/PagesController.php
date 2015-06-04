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
        parent::beforeFilter();
        $admin_auth_actions = array('admin_index');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'pages');
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
        $pages = $this->Page->find('all', array(
            'order' => array('Page.created DESC')
        ));

        $this->set('title_for_layout', 'pages');
        $this->set('admin_menu', 'pages');
        $this->set(compact('pages'));
    }

    public function admin_add() {
        if ($this->request->is('post')) {

            if (!empty($this->request->data['Page']['page_px_image']['name'])) {
                $image_name = MyClass::getRandomString(5) . "_" . $this->data['Page']['page_px_image']['name'];
                $image_path = PAGE_IMAGE_FOLDER . $image_name;
                $image_temp_name = $this->data['Page']['page_px_image']['tmp_name'];
                move_uploaded_file($image_temp_name, $image_path);
                $this->request->data['Page']['page_px_image'] = $image_name;
            } else {
                unset($this->request->data['Page']['page_px_image']);
            }

            if ($this->Page->save($this->request->data)) {
                $page_id = $this->Page->getLastInsertID();
                $this->Session->setFlash(__('Page has been successfully added'), 'flash_success');
                $this->redirect(array('controller' => 'pages', 'action' => 'edit', $page_id, 'admin' => true));
            }
        }
    }

    public function admin_edit($page_id) {
        if ($this->request->is('post') || $this->request->is('put')) {
            if (!empty($this->request->data['Page']['page_px_image']['name'])) {
                $image_name = MyClass::getRandomString(5) . "_" . $this->data['Page']['page_px_image']['name'];
                $image_path = PAGE_IMAGE_FOLDER . $image_name;
                $image_temp_name = $this->data['Page']['page_px_image']['tmp_name'];
                move_uploaded_file($image_temp_name, $image_path);
                $this->request->data['Page']['page_px_image'] = $image_name;
            } else {
                unset($this->request->data['Page']['page_px_image']);
            }

            $this->Page->save($this->request->data);
            $this->Session->setFlash(__("Content updated successfully"), 'flash_success');
        }

        $page_content = $this->Page->findByPageId($page_id);
        $this->set(compact('page_content'));
    }

    public function one_page() {
        $this->set('cms_page_menu', true);
        $this->set('body_attr', 'class="one-page" data-target=".single-menu" data-spy="scroll" data-offset="200"');
        $pages = $this->Page->find('all', array(
            'conditions' => array("Page.is_one_page = '1'"),
            'order' => array('Page.sort_value ASC')
        ));

        $this->set(compact('pages'));
    }

}
