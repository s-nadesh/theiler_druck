<?php

class CheckoutsController extends AppController {

    public $name = 'Checkouts';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->loginAction = array('controller' => 'checkouts', 'action' => 'index', 'admin' => false);
        $this->Auth->loginRedirect = array('controller' => 'checkouts', 'action' => 'billing_address', 'admin' => false);
        $this->Auth->logoutRedirect = array('controller' => 'checkouts', 'action' => 'index', 'admin' => false);

        $actions = array('register', 'index', 'billing_address', 'shipping_address', 'mode_of_shipment');
        if (in_array($this->action, $actions)) {
            if (!$this->Session->check('Shop')) {
                $this->redirect(array('controller' => 'carts', 'action' => 'index', 'admin' => false));
            }
        }
    }

    public function index() {
        if ($this->Auth->loggedIn()) {
            $this->Session->write('Shop.Order.user_id', $this->Auth->user('user_id'));
            $this->redirect("billing_address");
        }

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->write('Shop.Order.user_id', $this->Auth->user('user_id'));
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Login is incorrect'), 'flash_error');
            }
        }
    }

    public function register() {
        if ($this->Auth->loggedIn()) {
            $this->Session->write('Shop.Order.user_id', $this->Auth->user('user_id'));
            $this->redirect("billing_address");
        }

        if ($this->request->is('post')) {
            $this->loadModel('User');
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__("Your registration completed successfully, Login to continue"), 'flash_success');
                $this->redirect('index');
            } else {
                $this->Session->setFlash(__("Registration failed"), 'flash_error');
            }
        }
    }

    public function billing_address() {
        if (!$this->Session->check('Shop.Order.user_id')) {
            $this->redirect("index");
        }

        if ($this->request->is('post')) {
            $this->Session->write('Shop.Order.BillingAddress', $this->data['BillingAddress']);
            $this->redirect('shipping_address');
        }
    }

    public function shipping_address() {
        if (!$this->Session->check('Shop.Order.user_id')) {
            $this->redirect("index");
        } elseif (!$this->Session->check('Shop.Order.BillingAddress')) {
            $this->redirect("billing_address");
        }

        if ($this->request->is('post')) {
            if ($this->data['ShippingAddress']['new_shippping'] == 1) {
                $this->Session->write('Shop.Order.ShippingAddress', $this->data['ShippingAddress']);
                $this->Session->write('Shop.Additional.sh_cost_id', $this->Session->read('Shop.Order.ShippingAddress.sh_cost_id'));
                $shipping_cost = MyClass::shippingCostCalculation($this->Session->read('Shop.Additional.sh_cost_id'), $this->Session->read('Shop.Additional.cart_total_weight'));
                $this->Session->write('Shop.Additional.shipping_cost', $shipping_cost);
            } else {
                $this->Session->write('Shop.Order.ShippingAddress.new_shippping', 0);
                $this->Session->write('Shop.Additional.sh_cost_id', $this->Session->read('Shop.Order.BillingAddress.sh_cost_id'));
                $shipping_cost = MyClass::shippingCostCalculation($this->Session->read('Shop.Additional.sh_cost_id'), $this->Session->read('Shop.Additional.cart_total_weight'));
                $this->Session->write('Shop.Additional.shipping_cost', $shipping_cost);
            }
            $this->redirect('mode_of_shipment');
        }
    }

    public function mode_of_shipment() {
        if (!$this->Session->check('Shop.Order.user_id')) {
            $this->redirect("index");
        } elseif (!$this->Session->check('Shop.Order.BillingAddress')) {
            $this->redirect("billing_address");
        } elseif (!$this->Session->check('Shop.Order.ShippingAddress')) {
            $this->redirect("shipping_address");
        }

        if ($this->request->is('post')) {
            $this->Session->write('Shop.Order.ModeOfShipment', 'Completed');
        }
    }

}
