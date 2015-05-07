<?php

class ShippingCost extends AppModel {

    public $name = 'ShippingCost';
    public $primaryKey = 'sh_cost_id';
    public $virtualFields = array(
        'target_zip_code' => 'CONCAT(ShippingCost.sh_cost_zip_from, "-", ShippingCost.sh_cost_zip_to)'
    );
    public $displayField = 'target_zip_code';

//    public $validate = array(
//        'admin_email' => array(
//            'rule' => 'email',
//            'required' => true,
//            'message' => 'Please enter valid email address'
//        ),
//        'admin_password' => array(
//            'required' => true,
//            'message' => 'Please enter password'
//        )
//    );
}
