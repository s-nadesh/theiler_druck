<?php

class Product extends AppModel {

    public $name = 'Product';
    public $primaryKey = 'product_id';
    //Generate slug fields.
    public $actsAs = array(
        'Sluggable.Sluggable' => array(
            'field' => 'product_name', // Field that will be slugged
            'slug' => 'product_slug', // Field that will be used for the slug
            'lowercase' => true, // Do we lowercase the slug ?
            'separator' => '-', //
            'overwrite' => true    // Does the slug is auto generated when field is saved no matter what
        )
    );
    //Relations
    public $hasMany = array(
        'ProductPrice' => array(
            'className' => 'ProductPrice',
        )
    );

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
