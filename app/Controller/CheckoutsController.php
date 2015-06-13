<?php

class CheckoutsController extends AppController {

    public $name = 'Checkouts';

    //This function will run before every functions.
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->loginAction = array('controller' => 'checkouts', 'action' => 'index', 'admin' => false);
        $this->Auth->loginRedirect = array('controller' => 'checkouts', 'action' => 'billing_address', 'admin' => false);
        $this->Auth->logoutRedirect = array('controller' => 'checkouts', 'action' => 'index', 'admin' => false);

        if (!$this->Session->check('Shop')) {
            $this->redirect(array('controller' => 'carts', 'action' => 'index', 'admin' => false));
        }

        $allow_action = array('index', 'register');
        if (in_array($this->action, $allow_action)) {
            if ($this->Auth->loggedIn()) {
                $this->Session->write('Shop.Order.user_id', $this->Auth->user('user_id'));
                $this->redirect("billing_address");
            }
        }

        $auth_actions = array('billing_address', 'shipping_address', 'payment_method', 'summary', 'place_order');
        if (in_array($this->action, $auth_actions)) {
            if (!$this->Session->check('Shop.Order.user_id')) {
                $this->redirect("index");
            }
        }
    }

    //Checkout index function.
    public function index() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->write('Shop.Order.user_id', $this->Auth->user('user_id'));
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Login is incorrect'), 'flash_error');
            }
        }
    }

    //Checkout registration function
    public function register() {
        if ($this->request->is('post')) {
            $this->loadModel('User');
            $this->request->data['User']['user_name'] = $this->data['UserAddress']['address_firstname'] . ' ' . $this->data['UserAddress']['address_lastname'];

            if ($this->data['User']['user_dob']) {
                $this->request->data['User']['user_dob'] = date(DB_DATE_FORMAT, strtotime($this->data['User']['user_dob']));
            }

            if ($this->User->save($this->request->data)) {
                $user_id = $this->User->getLastInsertId();
                $this->loadModel('UserAddress');
                if ($this->request->data['UserAddress']['address_company_type'] == 'Individual') {
                    $this->request->data['UserAddress']['address_company_name'] = '';
                }
                $this->request->data['UserAddress']['address_type'] = 0;
                $this->request->data['UserAddress']['user_id'] = $user_id;
                $this->UserAddress->save($this->request->data);

                $this->request->data['User']['user_id'] = $user_id;
                unset($this->request->data['User']['user_password']);
                unset($this->request->data['User']['repeat_password']);
                $this->Auth->login($this->request->data['User']);
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__("Registration failed, Please check the errors in the form"), 'flash_error');
            }
        }
    }

    //Checkout Billing Address function.
    public function billing_address() {
        if ($this->request->is('post')) {
            if ($this->data['BillingAddress']['address_company_type'] == 'Individual') {
                $this->data['BillingAddress']['address_company_name'] = '';
            }
            $this->Session->write('Shop.Order.BillingAddress', $this->data['BillingAddress']);
            $this->redirect('shipping_address');
        }

        if (!$this->Session->check('Shop.Order.BillingAddress')) {
            $this->loadModel('UserAddress');
            $user_id = $this->Auth->user('user_id');
            $user_billing_address = $this->UserAddress->find('first', array(
                'conditions' => array(
                    'UserAddress.user_id' => $user_id,
                    'UserAddress.address_type' => 0,
                ),
                'recursive' => -1
            ));
            $this->Session->write('Shop.Order.BillingAddress', $user_billing_address['UserAddress']);
            $this->redirect('shipping_address');
        }
    }

    //Checkout Shipping Address function.
    public function shipping_address() {
        if (!$this->Session->check('Shop.Order.BillingAddress')) {
            $this->redirect('billing_address');
        }

        if ($this->request->is('post')) {
            $target_zip_code = $this->Session->read('Shop.Additional.target_zip_code');
            $zip_codes = MyClass::stringToArray('-', $target_zip_code);
            $zip_from = $zip_codes[0];
            $zip_to = $zip_codes[1];
            if ($this->data['ShippingAddress']['identical'] == 1) {
                $shipping_zip_code = $this->Session->read('Shop.Order.BillingAddress.address_post_code');
            } else {
                $shipping_zip_code = $this->data['ShippingAddress']['address_post_code'];
            }

            if ($shipping_zip_code >= $zip_from && $shipping_zip_code <= $zip_to) {
                if ($this->data['ShippingAddress']['address_company_type'] == 'Individual') {
                    $this->request->data['ShippingAddress']['address_company_name'] = '';
                }
                $this->Session->write('Shop.Order.ShippingAddress', $this->data['ShippingAddress']);
                $this->redirect('payment_method');
            } else {
                $this->Session->setFlash('Shipping address Zipcode must be within ' . $zip_from . '-' . $zip_to, 'flash_error');
            }
        }
    }

    //Checkout Payment Method function.
    public function payment_method() {
        if (!$this->Session->check('Shop.Order.BillingAddress')) {
            $this->redirect('billing_address');
        } elseif (!$this->Session->check('Shop.Order.ShippingAddress')) {
            $this->redirect('shipping_address');
        }

        if ($this->request->is('post')) {
            $payment_methods = MyClass::paymentMethods();
            foreach ($payment_methods['PaymentMethod'] as $payment_method) {
                if ($payment_method['id'] == $this->data['PaymentMethod']['id']) {
                    $choosen_method['PaymentMethod'] = array(
                        'id' => $payment_method['id'],
                        'name' => $payment_method['name'],
                        'fee' => $payment_method['fee'],
                        'caption' => $payment_method['caption'],
                    );
                    break;
                }
            }
            $this->Session->write('Shop.Order.PaymentMethod', $choosen_method['PaymentMethod']);
            $this->redirect('summary');
        }
    }

    public function summary() {
        if (!$this->Session->check('Shop.Order.BillingAddress')) {
            $this->redirect('billing_address');
        } elseif (!$this->Session->check('Shop.Order.ShippingAddress')) {
            $this->redirect('shipping_address');
        } elseif (!$this->Session->check('Shop.Order.PaymentMethod')) {
            $this->redirect('payment_method');
        }

        if ($this->request->is('post')) {
            $this->Session->write('Shop.Order.Summary.comment', $this->data['Summary']['comment']);
            $this->redirect('place_order');
        }
    }

    public function place_order() {
        if (!$this->Session->check('Shop.Order.BillingAddress')) {
            $this->redirect('billing_address');
        } elseif (!$this->Session->check('Shop.Order.ShippingAddress')) {
            $this->redirect('shipping_address');
        } elseif (!$this->Session->check('Shop.Order.PaymentMethod')) {
            $this->redirect('payment_method');
        } elseif (!$this->Session->check('Shop.Order.Summary')) {
            $this->redirect('summary');
        }

        $this->loadModel('Order');
        $shop = $this->Session->read('Shop');
        $order = array(
            'Order' => array(
                'order_unique_id' => MyClass::generateUniqueOrderId(),
                'user_id' => $shop['Order']['user_id'],
                'order_billing_address' => MyClass::encodeJSON($shop['Order']['BillingAddress']),
                'order_shipping_address' => MyClass::encodeJSON($shop['Order']['ShippingAddress']),
                'order_payment_method' => MyClass::encodeJSON($shop['Order']['PaymentMethod']),
                'order_summary' => MyClass::encodeJSON($shop['Order']['Summary']),
                'order_good_for_print_on_paper' => $shop['Additional']['good_for_print_on_paper'],
                'order_express_within_4_days' => $shop['Additional']['express_within_4_days'],
                'order_total_weight' => $shop['Additional']['cart_total_weight'],
                'order_shipping_cost' => $shop['Additional']['shipping_cost'],
                'order_total_net' => $shop['Additional']['cart_sub_price_without_tax'],
                'order_tax' => $shop['Additional']['cart_tax'],
                'order_total_gross' => $shop['Additional']['cart_sub_price_with_tax'],
                'order_final_amount' => $shop['Additional']['cart_total_price'],
                'order_status' => 1,
            )
        );

        if ($this->Order->save($order)) {
            $order_id = $this->Order->getLastInsertId();
            $this->loadModel('OrderItem');
            foreach ($shop['CartItems'] as $key => $value) {
                if ($value['item_picture_upload']) {
                    foreach ($value['item_picture_upload'] as $key1 => $value1) {
                        $oldname = CART_FILE_FOLDER . $value1;
                        $newname = ORDER_FILE_FOLDER . $value1;
                        rename($oldname, $newname);
                    }
                }
                $order_item = array(
                    'OrderItem' => array(
                        'order_id' => $order_id,
                        'order_item_product_key' => $key,
                        'order_item_product_value' => MyClass::encodeJSON($value),
                    )
                );
                $this->OrderItem->saveAll($order_item);
            }
            $this->requestAction(array('controller' => 'orders', 'action' => 'orderpdf', $order_id, 'F'), array('return', 'bare' => false));
            $admin = $this->requestAction(array('controller' => 'admins', 'action' => 'getAdmin'));
            $filename = "files/invoices/{$order['Order']['order_unique_id']}.pdf";
            $Email = new CakeEmail(MAILSENDBY);
            $Email->from(
                    array($admin['Admin']['admin_email']))
                    ->template('invoice', 'email_layout')
                    ->emailFormat('html')
                    ->to($this->Auth->user('user_email'))
                    ->attachments($filename)
                    ->subject(__('Invoice').': ' . $order['Order']['order_unique_id'])
                    ->viewVars(array(
                        'order_id' => $order_id,
                    ))
                    ->send();
            $this->Session->setFlash('Your order placed successfully.', 'flash_success');
            $this->Session->delete('Shop');
            $this->redirect(array('controller' => 'orders', 'action' => 'index'));
        }
    }

}
