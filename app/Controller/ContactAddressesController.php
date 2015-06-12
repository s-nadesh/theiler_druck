<?php

/**
 * Static content controller.
 *
 * This file will render views from views/contactAddresses/
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
 * @link http://book.cakephp.org/2.0/en/controllers/contactAddresses-controller.html
 */
class ContactAddressesController extends AppController {

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
        $this->set('admin_menu', 'contactAddresses');
    }

    /**
     * Displays a view
     *
     * @param mixed What contactAddresse to display
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
        $contactAddresse = $subcontactAddresse = $title_for_layout = null;

        if (!empty($path[0])) {
            $contactAddresse = $path[0];
        }
        if (!empty($path[1])) {
            $subcontactAddresse = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('contactAddresse', 'subcontactAddresse', 'title_for_layout'));

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
        $contactAddresses = $this->ContactAddresse->find('all', array(
            'order' => array('ContactAddresse.created DESC')
        ));

        $this->set('title_for_layout', 'contactAddresses');
        $this->set('admin_menu', 'contactAddresses');
        $this->set(compact('contactAddresses'));
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            if ($this->ContactAddresse->save($this->request->data)) {
                $contactAddresse_id = $this->ContactAddresse->getLastInsertID();
                $this->Session->setFlash(__('ContactAddresse has been successfully added'), 'flash_success');
                $this->redirect(array('controller' => 'contactAddresses', 'action' => 'edit', $contactAddresse_id, 'admin' => true));
            }
        }
    }

    public function admin_edit($contactAddresse_id) {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->ContactAddresse->save($this->request->data);
            $this->Session->setFlash(__("Content updated successfully"), 'flash_success');
        }
        $contactAddresse_content = $this->data = $this->ContactAddresse->findByContactAddresseId($contactAddresse_id);
        $this->set(compact('contactAddresse_content'));
    }
}
