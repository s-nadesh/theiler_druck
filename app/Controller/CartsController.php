<?php

class CartsController extends AppController {

    public $name = 'Carts';

    public function index() {
        $cart_product = '';
        if($this->Session->check('Shop.OrderItem')){
            $cart_product = $this->Session->read('Shop.OrderItem');
        }
        $this->set('carts', $cart_product);
        $this->set('page_title', __('Cart'));
    }

    //Add product in cart table from Product detail page
    public function add() {
        if ($this->request->is('post')) {
            $product = $this->data['Cart'];
            $this->addCartSession($product);
        }

        $this->redirect('index');
    }
    
    public function remove(){
        if($this->Session->check('Shop.OrderItem')){
            $this->Session->delete("Shop");
        }
        $this->redirect('index');
    }

    protected function addCartSession($product) {
        if (!empty($product)) {

            $data['product_id'] = $product['product_id'];
            $data['cart_product_no_of_pages'] = $product['no_of_pages'];
            $data['cart_product_no_of_copies'] = $product['no_of_copies'];
            $data['paper_id'] = $product['paper_id'];
            $data['sh_cost_id'] = $product['sh_cost_id'];
            $data['cart_quantity'] = $product['quantity'];

            $price = MyClass::priceCalculationPerProduct($data['product_id'], $data['cart_product_no_of_pages'], $data['cart_product_no_of_copies']);
            $total_price = MyClass::priceCalculationPerProduct($data['product_id'], $data['cart_product_no_of_pages'], $data['cart_product_no_of_copies'], $data['cart_quantity']);
            
            if(!$price){
                $this->Session->setFlash('This item can not be added in your cart, because this item does have it\'s price', 'flash_error');
                $this->redirect('index'); 
            }

            $data['cart_price'] = $price;
            $data['cart_total_price'] = $total_price;
            
            $weight = MyClass::weightCalculationPerProduct($data['product_id'], $data['cart_product_no_of_pages'], $data['cart_product_no_of_copies'], $data['paper_id']);
            $total_weight = MyClass::weightCalculationPerProduct($data['product_id'], $data['cart_product_no_of_pages'], $data['cart_product_no_of_copies'], $data['paper_id'], $data['cart_quantity']);
            
            $data['cart_weight'] = $weight;
            $data['cart_total_weight'] = $total_weight;
            
            $data['shipping_cost'] = MyClass::shippingCostCalculation($data['sh_cost_id'], $data['cart_total_weight']);
            $data['order_total'] =  $data['cart_total_price'] + $data['shipping_cost'];

            if ($this->Auth->loggedIn()) {
                $data['user_id'] = $this->Auth->user('user_id');
            } else {
                $data['cart_sessionid'] = $this->Session->id();
            }

            $this->Session->write('Shop.OrderItem', $data);
        }
    }

    ##########################################################################################################################

    protected function getCarts() {
        if ($this->Auth->loggedIn()) {
            $user_id = $this->Auth->user('user_id');

            $result = $this->Cart->find('all', array(
                'conditions' => array(
                    'Cart.user_id' => $user_id
                )
            ));
        } else {
            $sessionid = $this->Session->id();

            $result = $this->Cart->find('all', array(
                'conditions' => array(
                    'Cart.cart_sessionid' => $sessionid
                )
            ));
        }
        return $result;
    }

    //Update Cart table when add or update function call.
    protected function addCartTable($product) {
        if (!empty($product)) {

            $data['Cart']['product_id'] = $product['product_id'];
            $data['Cart']['cart_product_no_of_pages'] = $product['no_of_pages'];
            $data['Cart']['cart_product_no_of_copies'] = $product['no_of_copies'];
            $data['Cart']['paper_id'] = $product['paper_id'];
//            $data['Cart']['sh_cost_id'] = $product['sh_cost_id'];
            $data['Cart']['cart_quantity'] = $product['quantity'];

            if ($this->Auth->loggedIn()) {

                $data['Cart']['user_id'] = $this->Auth->user('user_id');

                $cart_exists = $this->Cart->find('first', array(
                    'conditions' => array(
                        'Cart.user_id' => $data['Cart']['user_id'],
                        'Cart.product_id' => $data['Cart']['product_id'],
                        'Cart.cart_product_no_of_pages' => $data['Cart']['cart_product_no_of_pages'],
                        'Cart.cart_product_no_of_copies' => $data['Cart']['cart_product_no_of_copies'],
                        'Cart.paper_id' => $data['Cart']['paper_id'],
//                        'Cart.sh_cost_id' => $data['Cart']['sh_cost_id'],
                    )
                ));
            } else {
                $data['Cart']['cart_sessionid'] = $this->Session->id();

                $cart_exists = $this->Cart->find('first', array(
                    'conditions' => array(
                        'Cart.cart_sessionid' => $data['Cart']['cart_sessionid'],
                        'Cart.product_id' => $data['Cart']['product_id'],
                        'Cart.cart_product_no_of_pages' => $data['Cart']['cart_product_no_of_pages'],
                        'Cart.cart_product_no_of_copies' => $data['Cart']['cart_product_no_of_copies'],
                        'Cart.paper_id' => $data['Cart']['paper_id'],
//                        'Cart.sh_cost_id' => $data['Cart']['sh_cost_id'],
                    )
                ));
            }

            if ($cart_exists) {
                $data['Cart']['cart_id'] = $cart_exists['Cart']['cart_id'];
            } else {
                $this->Cart->create();
            }

            $this->Cart->save($data, false);
        }
    }

}
