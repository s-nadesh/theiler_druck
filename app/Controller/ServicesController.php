<?php

/**
 * Static content controller.
 *
 * This file will render views from views/services/
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
 * @link http://book.cakephp.org/2.0/en/controllers/services-controller.html
 */
class ServicesController extends AppController {

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
        $this->set('admin_menu', 'services');
    }

    /**
     * Displays a view
     *
     * @param mixed What service to display
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
        $service = $subservice = $title_for_layout = null;

        if (!empty($path[0])) {
            $service = $path[0];
        }
        if (!empty($path[1])) {
            $subservice = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('service', 'subservice', 'title_for_layout'));

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
        $services = $this->Service->find('all', array(
            'order' => array('Service.created DESC')
        ));

        $this->set('title_for_layout', 'services');
        $this->set('admin_menu', 'services');
        $this->set(compact('services'));
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            if ($this->Service->save($this->request->data)) {
                $service_id = $this->Service->getLastInsertID();
                $this->Session->setFlash(__('Service has been successfully added'), 'flash_success');
                $this->redirect(array('controller' => 'services', 'action' => 'edit', $service_id, 'admin' => true));
            }
        }
    }

    public function admin_edit($service_id) {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Service->save($this->request->data);
            $this->Session->setFlash(__("Content updated successfully"), 'flash_success');
        }
        $service_content = $this->data = $this->Service->findByServiceId($service_id);
        $this->set(compact('service_content'));
    }

    public function one_service() {
        $this->set('cms_service_menu', true);
        $this->set('body_attr', 'class="one-service" data-target=".single-menu" data-spy="scroll" data-offset="200"');
        $services = $this->Service->find('all', array(
            'conditions' => array("Service.is_one_service = '1'"),
            'order' => array('Service.sort_value ASC')
        ));

        $this->set(compact('services'));
    }

    public function contact() {
        $this->set('contact_service_menu', true);
        $this->set('body_attr', 'class="one-service" data-target=".single-menu" data-spy="scroll" data-offset="200"');
    }

}
