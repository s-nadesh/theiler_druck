<?php

class MyClass {

    public static function encrypt($value) {
        return hash("sha512", $value);
    }

    public static function refencryption($str) {
        return base64_encode($str);
    }

    public static function refdecryption($str) {
        return base64_decode($str);
    }

    public static function getRandomString($length = 9) {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //length:36
        $final_rand = '';
        for ($i = 0; $i < $length; $i++) {
            $final_rand .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $final_rand;
    }

    public static function stringToArray($separator, $string) {
        $result = explode($separator, $string);
        return $result;
    }

    public static function arrayToString($separator, $array) {
        $result = implode($separator, $array);
        return $result;
    }

    public static function encodeJSON($array) {
        return json_encode($array);
    }

    public static function decodeJSON($json_data) {
        return json_decode($json_data);
    }

    public static function newLineBreak($string) {
        return nl2br($string);
    }

    public static function mGramToGram($value) {
        $result = $value / 1000;
        return $result;
    }

    public static function gramToMGram($value) {
        $result = $value * 1000;
        return $result;
    }

    public static function priceCalculationPerProduct($product_id, $no_of_pages, $no_of_copies, $qunatity = 1) {
        $model = ClassRegistry::init('ProductPrice');

        if ($no_of_copies < 5000) {
            $default_copy = 1000;
        } elseif ($no_of_copies < 10000) {
            $default_copy = 5000;
        } else {
            $default_copy = 10000;
        }

        $no_of_thousand = $no_of_copies - $default_copy;

        $no_of_thousand_count = number_format($no_of_thousand / 1000);

        $product_default_price = $model->find('first', array(
            'conditions' => array(
                'ProductPrice.product_id' => $product_id,
                'ProductPrice.pp_no_of_pages' => $no_of_pages,
                'ProductPrice.pp_no_of_copies' => $default_copy,
            )
        ));

        $product_additional_price = $model->find('first', array(
            'conditions' => array(
                'ProductPrice.product_id' => $product_id,
                'ProductPrice.pp_no_of_pages' => $no_of_pages,
                'ProductPrice.pp_no_of_copies' => "-1",
            )
        ));

        if (!empty($product_default_price)) {
            $product_price = $product_default_price['ProductPrice']['pp_price'] + ($no_of_thousand_count * $product_additional_price['ProductPrice']['pp_price']);

            $result = $product_price * $qunatity;

            return $result;
        } else {
            return false;
        }
    }

    public static function weightCalculationPerProduct($product_id, $no_of_pages, $no_of_copies, $paper_id, $quantity = 1) {
        $product = ClassRegistry::init('Product');
        $paper_variant = ClassRegistry::init('PaperVariant');

        $no_of_papers = $no_of_pages / 2;

        $product_detail = $product->find('first', array(
            'recursive' => 0,
            'conditions' => array('Product.product_id' => $product_id)
        ));

        $paper_detail = $paper_variant->find('first', array('conditions' => array('PaperVariant.paper_id' => $paper_id)));

        $weight = $product_detail['Product']['product_factor'] * $no_of_papers * $paper_detail['PaperVariant']['paper_rang_grm'] * $no_of_copies;

        $result = $weight * $quantity;

        return $result;
    }

    public static function shippingCostCalculation($sh_cost_id, $cart_total_weight) {
        $sh_cost = ClassRegistry::init('ShippingCost');

        $shipping_cost = $sh_cost->find('first', array('conditions' => array('ShippingCost.sh_cost_id' => $sh_cost_id)));
        $basic_weight_price = $shipping_cost['ShippingCost']['sh_cost_basic_weight_price'];
        $additional_weight_price = $shipping_cost['ShippingCost']['sh_cost_additional_weight_price'];

        $shipping_price = '';

        if ($cart_total_weight <= 100) {
            $shipping_price = $basic_weight_price;
        } else {
            $remaining_weight = $cart_total_weight - 100;
            $no_of_hundreds_count = ceil($remaining_weight / 100);
            $additional_price = $no_of_hundreds_count * $additional_weight_price;
            $shipping_price = $basic_weight_price + $additional_price;
        }

        return $shipping_price;
    }
    
    public static function weightFormat($number){
        $result = number_format($number, 2);
        return $result . 'KG';
    }
    
    public static function currencyFormat($number){
        $result = number_format($number, 2);
        return $result . 'CHF';
    } 
    
    public static function translate($text) {
        App::import('Model', 'Language');
        $language = new Language();
        $result = $language->find('first', array(
            'conditions' => array(
                'Language.english' => $text
            )
        ));

        if (!empty($result) && $result['Language']['german'] != '') {
            return $result['Language']['english'];
        } else {
            return $text;
        }
    }
    
    public static function getDefaultCoipes() {
        $default_copies = array(
            '1000' => '1000',
            '5000' => '5000',
            '10000' => '10000',
            '-1' => 'Additional 1000',
        );

        return $default_copies;
    }
    
    public static function getCountries(){
        $country = array(
            'Switzerland' => 'Switzerland'
        );
        
        return $country;
    }
    
    public static function getUserTitles(){
        $titles = array(
            'Mr' => 'Mr',
            'Ms' => 'Ms'
        );
        return $titles;
    }
    
    public static function getCompanyTypes(){
        $types = array(
            'Individual' => 'Individual',
            'Company' => 'Company',
        );
        return $types;
    }
    

}
