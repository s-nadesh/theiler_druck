<?php

class ProductPrice extends AppModel {

    public $name = 'ProductPrice';
    public $primaryKey = 'pp_id';
    //Relations
    public $belongsTo = array(
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'product_id'
        )
    );
    
}