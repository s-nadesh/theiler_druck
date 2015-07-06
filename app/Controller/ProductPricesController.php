<?php

class ProductPricesController extends AppController {

    public $name = 'ProductPrices';

    //This function will run before every action
    public function beforeFilter() {
        parent::beforeFilter();
        $admin_auth_actions = array('admin_update_price_calculation', 'admin_get_pp');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'product_prices');
    }

    //Admin Update price calculation product wise
    public function admin_update_price_calculation($product_id) {
        if (!empty($this->data)) {
            foreach ($this->data['ProductPrice'] as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    //Insert or Update the price values.
                    if ($value1['pp_price']) {
                        $this->ProductPrice->save($value1);
                    }

                    //Delete the price values.
                    if ($value1['pp_id'] != '' && $value1['pp_price'] == "") {
                        $this->ProductPrice->delete($value1['pp_id']);
                    }
                }
            }
            $this->Session->setFlash(MyClass::translate('Price Calculation Updated Successfully!!!'), 'flash_success');
            $this->redirect(array('controller' => 'products', 'action' => 'edit', $product_id, 'admin' => true));
        }
    }

    public function admin_get_pp($product_id, $product_page, $product_copy, $paper_variant_id) {
        $result = $this->ProductPrice->find('first', array(
            'conditions' => array(
                'ProductPrice.product_id' => $product_id,
                'ProductPrice.pp_no_of_pages' => $product_page,
                'ProductPrice.pp_no_of_copies' => $product_copy,
                'ProductPrice.paper_variant_id' => $paper_variant_id,
            )
        ));
        return $result;
    }

    public function getProductPrice($product_id, $no_of_pages, $no_of_coipes, $paper_variant_id, $quantity) {
        $price = MyClass::priceCalculationPerProduct($product_id, $no_of_pages, $no_of_coipes, $paper_variant_id, $quantity);
        echo $price;
        exit;
    }

}
