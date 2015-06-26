<?php

class ProductsController extends AppController {

    public $name = 'Products';
    public $components = array('Image');

    //This function will run before every action
    public function beforeFilter() {
        parent::beforeFilter();
        $admin_auth_actions = array('admin_index', 'admin_add', 'admin_view', 'admin_edit');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'products');
    }

    //Admin Products Manage
    public function admin_index() {
        $products = $this->Product->find('all', array(
            'order' => array('Product.created DESC'),
            'recursive' => 0
        ));
        $this->set('title_for_layout', 'Products');
        $this->set(compact('products'));
    }

    //Admin View Single Product
    public function admin_view($product_id) {
        if (!$this->Product->exists($product_id)) {
            throw new NotFoundException(MyClass::translate('Invalid Product'));
        }

        $this->Product->recursive = 0;
        $product = $this->Product->findByProductId($product_id);

        $this->set('title_for_layout', 'Products');
        $this->set(compact('product'));
    }

    //Admin add product
    public function admin_add() {
        if ($this->request->is('post')) {
            $no_of_pages_array = MyClass::stringToArray("|", $this->data['Product']['product_no_of_pages']);
            $no_of_copies_array = MyClass::stringToArray("|", $this->data['Product']['product_no_of_copies']);

            $no_of_pages_json_array = MyClass::encodeJSON($no_of_pages_array);
            $no_of_copies_json_array = MyClass::encodeJSON($no_of_copies_array);

            $this->request->data['Product']['product_no_of_pages'] = $no_of_pages_json_array;
            $this->request->data['Product']['product_no_of_copies'] = $no_of_copies_json_array;

            if (!empty($this->request->data['Product']['product_image']['name'])) {
                $image_name = MyClass::getRandomString(5) . "_" . $this->data['Product']['product_image']['name'];
                $image_path = PRODUCT_IMAGE_FOLDER . $image_name;
                $image_temp_name = $this->data['Product']['product_image']['tmp_name'];
                move_uploaded_file($image_temp_name, $image_path);
                $this->request->data['Product']['product_image'] = $image_name;
                $this->productImageResize($image_name);
            }

            if ($this->Product->save($this->request->data)) {
                $product_id = $this->Product->getLastInsertID();
                $this->Session->setFlash(MyClass::translate('Product has been successfully added'), 'flash_success');
                $this->redirect(array('controller' => 'products', 'action' => 'edit', $product_id, 'admin' => true));
            }
        }
    }

    //Admin edit product
    public function admin_edit($product_id) {
        if (!$this->Product->exists($product_id)) {
            throw new NotFoundException(MyClass::translate('Invalid Product'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Product']['product_id'] = $product_id;

            $no_of_pages_array = MyClass::stringToArray("|", $this->data['Product']['product_no_of_pages']);
            $no_of_copies_array = MyClass::stringToArray("|", $this->data['Product']['product_no_of_copies']);

            $no_of_pages_json_array = MyClass::encodeJSON($no_of_pages_array);
            $no_of_copies_json_array = MyClass::encodeJSON($no_of_copies_array);

            $this->request->data['Product']['product_no_of_pages'] = $no_of_pages_json_array;
            $this->request->data['Product']['product_no_of_copies'] = $no_of_copies_json_array;

            if (!empty($this->request->data['Product']['product_image']['name'])) {
                //Remove Old Image in Folder
                MyClass::fileDelete(PRODUCT_IMAGE_FOLDER . $this->request->data['Product']['product_old_image']);
                MyClass::fileDelete(PRODUCT_IMAGE_RESIZE_FOLDER . $this->request->data['Product']['product_old_image']);
                unset($this->request->data['Product']['product_old_image']);

                //Save New Image in Folder
                $image_name = MyClass::getRandomString(5) . "_" . $this->data['Product']['product_image']['name'];
                $image_path = PRODUCT_IMAGE_FOLDER . $image_name;
                $image_temp_name = $this->data['Product']['product_image']['tmp_name'];
                move_uploaded_file($image_temp_name, $image_path);
                $this->request->data['Product']['product_image'] = $image_name;
                $this->productImageResize($image_name);
            } else {
                $this->request->data['Product']['product_image'] = $this->request->data['Product']['product_old_image'];
                unset($this->request->data['Product']['product_old_image']);
            }

            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(MyClass::translate('Product updated successfully'), 'flash_success');
            } else {
                $this->Session->setFlash(MyClass::translate('Failed to update product'), 'flash_error');
            }
        } else {
            $this->data = $this->Product->findByProductId($product_id);
        }
    }

    public function productImageResize($file_name) {
        $this->Image->prepare(WWW_ROOT . DS . PRODUCT_IMAGE_FOLDER . $file_name);
        $this->Image->resize(555, 555); //width,height,Red,Green,Blue
        $this->Image->save(WWW_ROOT . DS . PRODUCT_IMAGE_RESIZE_FOLDER . $file_name);
    }

    //Front End Product Details View Page.
    public function view($slug, $cart_items_key = '') {
        $this->requestAction('carts/clearCartFileUpload'); 
        $product = $this->Product->find('first', array(
            'conditions' => array(
                'Product.product_slug' => $slug
            )
        ));

        if (empty($product)) {
            $this->goHome();
        }

        $this->set(compact('product', 'cart_items_key'));
        $this->set('title_for_layout', $product['Product']['product_name']);
    }

    public function getProduct($product_id) {
        $product = $this->Product->find('first', array(
            'recursive' => 0,
            'conditions' => array(
                'Product.product_id' => $product_id
            )
        ));

        return $product;
    }

    public function getProducts($limit = 5) {
        $products = $this->Product->find('all', array(
            'recursive' => 0,
            'order' => array('Product.product_id ASC'),
            'limit' => $limit
        ));

        return $products;
    }

}
