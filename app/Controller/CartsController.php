<?php

class CartsController extends AppController {

    public $name = 'Carts';

    public function index() {
        $this->set('page_title', __('Cart'));
    }

    //Add product in cart from Product detail page
    public function add() {
        if ($this->request->is('post')) {
            $product = $this->data['Cart'];
            $this->setCartItem($product);
            $this->setCartAdditional($product);
        }
        $this->redirect('index');
    }

    //Update product in cart from Product detail page
    public function update() {
        if ($this->request->is('post')) {
            foreach ($this->data['CartItems'] as $key => $product) {
                $this->setCartItem($product);
            }
            $this->setCartAdditional($this->data['Cart']);
        }
        $this->redirect('index');
    }

    //Remove single product from cart
    public function remove($key_encrypt) {
        $key = MyClass::refdecryption($key_encrypt);
        if ($this->Session->check('Shop')) {
            if ($this->Session->check('Shop.CartItems.' . $key)) {
                $this->Session->delete("Shop.CartItems." . $key);
            }

            if (count($this->Session->read('Shop.CartItems'))) {
                foreach ($this->Session->read('Shop.CartItems') as $key => $items) {
                    $product = array(
                        'product_id' => $items['product_id'],
                        'no_of_pages' => $items['item_product_no_of_pages'],
                        'no_of_copies' => $items['item_product_no_of_copies'],
                        'paper_id' => $items['paper_id'],
                        'quantity' => $items['item_quantity'],
                    );
                    $this->setCartItem($product);
                }
                $this->setCartAdditional($this->Session->read('Shop.Additional'));
            } else {
                $this->redirect('clear');
            }
        }
        $this->redirect('index');
    }

    //Clear cart.
    public function clear() {
        if ($this->Session->check('Shop')) {
            $this->Session->delete('Shop');
            $this->Session->setFlash('Your cart is cleared', 'flash_error');
        }
        $this->redirect('index');
    }

    protected function setCartItem($product) {
        $key = $product['product_id'] . "_" . $product['no_of_pages'] . "_" . $product['no_of_copies'] . "_" . $product['paper_id'];

        $data['product_id'] = $product['product_id'];
        $data['item_product_no_of_pages'] = $product['no_of_pages'];
        $data['item_product_no_of_copies'] = $product['no_of_copies'];
        $data['paper_id'] = $product['paper_id'];
        $data['item_quantity'] = $product['quantity'];

        $price = MyClass::priceCalculationPerProduct($data['product_id'], $data['item_product_no_of_pages'], $data['item_product_no_of_copies']);
        $sub_price = MyClass::priceCalculationPerProduct($data['product_id'], $data['item_product_no_of_pages'], $data['item_product_no_of_copies'], $data['item_quantity']);

        if (!$price) {
            $this->Session->setFlash('This item can not be added in your cart, because this item does have it\'s price', 'flash_error');
            $this->redirect('index');
        }

        $data['item_price'] = $price;
        $data['item_sub_price'] = $sub_price;

        $weight = MyClass::weightCalculationPerProduct($data['product_id'], $data['item_product_no_of_pages'], $data['item_product_no_of_copies'], $data['paper_id']);
        $sub_weight = MyClass::weightCalculationPerProduct($data['product_id'], $data['item_product_no_of_pages'], $data['item_product_no_of_copies'], $data['paper_id'], $data['item_quantity']);

        $data['item_weight'] = $weight;
        $data['item_sub_weight'] = $sub_weight;

        if ($this->Auth->loggedIn()) {
            $data['user_id'] = $this->Auth->user('user_id');
        } else {
            $data['cart_sessionid'] = $this->Session->id();
        }

        $this->Session->write('Shop.CartItems.' . $key, $data);
    }

    protected function setCartAdditional($product) {
        if (isset($product['sh_cost_id']) && $product['sh_cost_id'] != '') {
            $data['sh_cost_id'] = $product['sh_cost_id'];
        } elseif ($this->Session->check('Shop.Additional.sh_cost_id')) {
            $data['sh_cost_id'] = $this->Session->read('Shop.Additional.sh_cost_id');
        } else {
            $shipping_cost = $this->requestAction('shipping_costs/getFirstZipCode');
            $data['sh_cost_id'] = $shipping_cost['ShippingCost']['sh_cost_id'];
        }

        $data['good_for_print_on_paper'] = $product['good_for_print_on_paper'];
        $data['express_within_4_days'] = $product['express_within_4_days'];

        $cart_items = $this->Session->read('Shop.CartItems');

        $cart_weight = 0;
        $cart_sub_price = 0;

        foreach ($cart_items as $key => $value) {
            $cart_weight += $value['item_sub_weight'];
            $cart_sub_price += $value['item_sub_price'];
        }

        $data['cart_total_weight'] = $cart_weight;
        $data['cart_sub_price_with_tax'] = $cart_sub_price;
        $data['cart_tax'] = MyClass::vatCalculation($data['cart_sub_price_with_tax']);
        $data['cart_sub_price_without_tax'] = $data['cart_sub_price_with_tax'] - $data['cart_tax'];

        $shipping_cost = MyClass::shippingCostCalculation($data['sh_cost_id'], $data['cart_total_weight']);
        $data['shipping_cost'] = $shipping_cost;

        $data['cart_total_price'] = $data['good_for_print_on_paper'] + $data['express_within_4_days'] + $data['cart_sub_price_with_tax'] + $data['shipping_cost'];

        $this->Session->write('Shop.Additional', $data);
    }

}
