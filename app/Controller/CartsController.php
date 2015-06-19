<?php

class CartsController extends AppController {

    public $name = 'Carts';
    
    public function beforeFiler(){
        parent::beforeFilter();
    }

    //Cart index page.
    public function index() {
        $this->set('page_title', MyClass::translate('Cart'));
    }

    //Add/Edit product in cart from Product detail page
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
        if ($this->Session->check('Shop.CartItems.' . $key)) {
            $deleteItem = $this->Session->read('Shop.CartItems.' . $key);
            $this->Session->delete("Shop.CartItems." . $key);
            $files = $deleteItem['item_picture_upload'];
            if (!empty($files)) {
                foreach ($files as $key => $value) {
                    $filePath = CART_FILE_FOLDER . $value;
                    if (file_exists($filePath)) {
                        MyClass::fileDelete($filePath);
                    }
                }
            }
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
        $this->redirect('index');
    }

    //Clear cart.
    public function clear() {
        if ($this->Session->check('Shop')) {
            if ($this->Session->check('Shop.CartItems')) {
                $cartItems = $this->Session->read('Shop.CartItems');
                if (!empty($cartItems)) {
                    foreach ($cartItems as $item_key => $item_value) {
                        $files = $item_value['item_picture_upload'];
                        if (!empty($files)) {
                            foreach ($files as $key => $value) {
                                $filePath = CART_FILE_FOLDER . $value;
                                if (file_exists($filePath)) {
                                    MyClass::fileDelete($filePath);
                                }
                            }
                        }
                    }
                }
            }
            $this->Session->delete('Shop');
            $this->Session->setFlash('Your cart is cleared', 'flash_error');
        }
        $this->redirect('index');
    }

    public function fileUpload() {
        $this->autoRender = false;
        if (isset($_FILES["myfile"])) {
            $ret = array();

            $error = $_FILES["myfile"]["error"];
            //You need to handle  both cases
            //If Any browser does not support serializing of multiple files using FormData() 
            if (!is_array($_FILES["myfile"]["name"])) { //single file
                $fileName = MyClass::getRandomString(3) . '-' . $_FILES["myfile"]["name"];
                move_uploaded_file($_FILES["myfile"]["tmp_name"], CART_FILE_FOLDER . $fileName);
                $ret[] = $fileName;

                if ($this->Session->check('Cart.fileUpload')) {
                    $this->Session->write('Cart.fileUpload', am($this->Session->read('Cart.fileUpload'), array($fileName)));
                } else {
                    $this->Session->write('Cart.fileUpload', array($fileName));
                }
            } else {  //Multiple files, file[]
                $fileCount = count($_FILES["myfile"]["name"]);
                for ($i = 0; $i < $fileCount; $i++) {
                    $fileName = MyClass::getRandomString(3) . '-' . $_FILES["myfile"]["name"][$i];
                    move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], CART_FILE_FOLDER . $fileName);
                    $ret[] = $fileName;
                    if ($this->Session->check('Cart.fileUpload')) {
                        $this->Session->write('Cart.fileUpload', am($this->Session->read('Cart.fileUpload'), array($fileName)));
                    } else {
                        $this->Session->write('Cart.fileUpload', array($fileName));
                    }
                }
            }
            echo json_encode($ret);
        }
    }

    public function fileDelete() {
        $this->autoRender = false;

        if (isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name'])) {
            $fileName = $_POST['name'];
            $filePath = CART_FILE_FOLDER . $fileName;
            if (file_exists($filePath)) {
                MyClass::fileDelete($filePath);
            }

            if ($this->Session->check('Cart.fileUpload')) {
                $pos = array_search($fileName, $this->Session->read('Cart.fileUpload'));
                $this->Session->delete('Cart.fileUpload.' . $pos);
            }
            echo "Deleted File " . $fileName . "<br>";
        }
    }

    public function clearCartFileUpload() {
        $this->autoRender = false;
        if ($this->Session->check('Cart.fileUpload')) {
            $files = $this->Session->read('Cart.fileUpload');
            foreach ($files as $key => $value) {
                $filePath = CART_FILE_FOLDER . $value;
                if (file_exists($filePath)) {
                    MyClass::fileDelete($filePath);
                }
            }
            $this->Session->delete('Cart');
        }
        return true;
    }

    public function removeCartProductImage() {
        $this->autoRender = false;
        if ($this->request->is('delete')) {
            $key = MyClass::refdecryption($this->data['cartItem']);
            $filename = $this->data['fileName'];
            $filePath = CART_FILE_FOLDER . $filename;
            
            $pos = array_search($filename, $this->Session->read('Shop.CartItems.' . $key . '.item_picture_upload'));
            $this->Session->delete('Shop.CartItems.' . $key . '.item_picture_upload.' . $pos);
            if (file_exists($filePath)) {
                MyClass::fileDelete($filePath);
            }
            echo 'File deleted successfully';
        }
    }

    //Update cart items.
    protected function setCartItem($product) {
        $key = $product['product_id'] . "_" . $product['no_of_pages'] . "_" . $product['no_of_copies'] . "_" . $product['paper_id'];

        $product_detail = $this->requestAction('products/getProduct/' . $product['product_id']);

        $data['product_id'] = $product['product_id'];
        $data['product_name'] = $product_detail['Product']['product_name'];
        $data['product_description'] = $product_detail['Product']['product_description'];
        $data['product_image'] = $product_detail['Product']['product_image'];
        $data['product_sku'] = $product_detail['Product']['product_sku'];
        $data['product_slug'] = $product_detail['Product']['product_slug'];
        $data['product_factor'] = $product_detail['Product']['product_factor'];
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

        $data['item_picture_upload'] = array();
        if (isset($product['cart_item_old_key'])) {
            if ($this->Session->check('Cart.fileUpload')) {
                if ($this->Session->check('Shop.CartItems.' . $product['cart_item_old_key'])) {
                    $data['item_picture_upload'] = am($this->Session->read('Shop.CartItems.' . $product['cart_item_old_key'] . '.item_picture_upload'), $this->Session->read('Cart.fileUpload'));
                }
                $this->Session->delete('Cart');
            } else {
                if ($this->Session->check('Shop.CartItems.' . $product['cart_item_old_key'])) {
                    $data['item_picture_upload'] = $this->Session->read('Shop.CartItems.' . $product['cart_item_old_key'] . '.item_picture_upload');
                }
            }

            if ($product['cart_item_old_key'] != $key) {
                $this->Session->delete('Shop.CartItems.' . $product['cart_item_old_key']);
            }
        } else {
            if ($this->Session->check('Cart.fileUpload')) {
                if ($this->Session->check('Shop.CartItems.' . $key)) {
                    $data['item_picture_upload'] = am($this->Session->read('Shop.CartItems.' . $key . '.item_picture_upload'), $this->Session->read('Cart.fileUpload'));
                } else {
                    $data['item_picture_upload'] = $this->Session->read('Cart.fileUpload');
                }
                $this->Session->delete('Cart');
            } else {
                if ($this->Session->check('Shop.CartItems.' . $key)) {
                    $data['item_picture_upload'] = $this->Session->read('Shop.CartItems.' . $key . '.item_picture_upload');
                }
            }
        }

        $this->Session->write('Shop.CartItems.' . $key, $data);
    }

    //Update cart additional details.
    protected function setCartAdditional($product) {
        if (isset($product['sh_cost_id']) && $product['sh_cost_id'] != '') {
            $data['sh_cost_id'] = $product['sh_cost_id'];
        } elseif ($this->Session->check('Shop.Additional.sh_cost_id')) {
            $data['sh_cost_id'] = $this->Session->read('Shop.Additional.sh_cost_id');
        } else {
            $shipping_cost = $this->requestAction('shipping_costs/getFirstZipCode');
            $data['sh_cost_id'] = $shipping_cost['ShippingCost']['sh_cost_id'];
        }

        $zip_code_detail = $this->requestAction('shipping_costs/getZipCode/' . $data['sh_cost_id']);
        $data['target_zip_code'] = $zip_code_detail['ShippingCost']['target_zip_code'];

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
