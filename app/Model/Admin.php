<?php

class Admin extends AppModel {

    public $name = 'Admin';
    public $primaryKey = 'admin_id';
    public $validate = array(
//        'admin_email' => array(
//            'rule' => 'email',
//            'required' => true,
//            'message' => 'Please enter valid email address'
//        ),
//        'admin_password' => array(
//            'required' => true,
//            'message' => 'Please enter valid password'
//        )
    );

}
