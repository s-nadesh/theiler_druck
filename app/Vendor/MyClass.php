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

        $no_of_thousand_count = $no_of_thousand / 1000;

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

        $no_of_papers = $no_of_pages / 2; //2 page is equal to one paper.

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

    public static function weightFormat($number) {
        $result = number_format($number, 2);
        return $result . 'KG';
    }

    public static function currencyFormat($number) {
        $result = number_format($number, 2, ',', '\'');
        return $result . ' CHF';
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
            return $result['Language']['german'];
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

    public static function getCountries() {
        $country = array(
            'Switzerland' => self::translate('Switzerland')
        );

        return $country;
    }

    public static function getUserTitles() {
        $titles = array(
            'Mr' => self::translate('Mr'),
            'Ms' => self::translate('Ms')
        );
        return $titles;
    }

    public static function getCompanyTypes() {
        $types = array(
            'Individual' => self::translate('Individual'),
            'Company' => self::translate('Company'),
        );
        return $types;
    }

    public static function paymentMethods() {
        $p_methods = ClassRegistry::init('PaymentMethod')->find('all', array('conditions' => array('PaymentMethod.is_active = "1"')));
        foreach ($p_methods as $key => $p_method) {
            $methods['PaymentMethod'][$key] = array(
                'id' => $p_method['PaymentMethod']['payment_id'],
                'name' => $p_method['PaymentMethod']['payment_name'],
                'fee' => $p_method['PaymentMethod']['payment_fee'],
                'caption' => $p_method['PaymentMethod']['payment_caption'],
            );
        }
        return $methods;
    }

    public static function vatCalculation($amount) {
        $calculation = $amount * 0.08;
        return $calculation;
    }

    public static function generateUniqueOrderId() {
        $prefix = 'TD';
        $random = time();
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $final_rand = '';
        for ($i = 0; $i < 3; $i++) {
            $final_rand .= $chars[rand(0, strlen($chars) - 1)];
        }
        $suffix = $final_rand;
        $unique_id = $prefix . '-' . $random . '-' . $suffix;
        return $unique_id;
    }

    public static function fileDelete($file) {
        App::uses('File', 'Utility');
        $file = new File(WWW_ROOT . $file);
        return $file->delete();
    }

    public static function orderStatus($status_id = '') {
        $status = array(
            '1' => 'Pending',
            '2' => 'Progress',
            '3' => 'Completed',
            '4' => 'Cancel',
        );

        if ($status_id) {
            return $status[$status_id];
        } else {
            return $status;
        }
    }

    public static function getOnePageListMenu($column) {
        $links = ClassRegistry::init('Page')->find('all', array(
            'fields' => array('page_title'),
            'conditions' => array("Page.is_one_page = '1'", "Page.page_column" => $column),
            'order' => array('Page.sort_value ASC')
        ));

        return $links;
    }

    public static function is_image($path) {
        if (file_exists($path)) {
            $a = getimagesize($path);
            $image_type = $a[2];
            if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
                return true;
            }
        }
        return false;
    }

}
