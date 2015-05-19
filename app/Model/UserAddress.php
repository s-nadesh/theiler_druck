<?php

class UserAddress extends AppModel {

    public $name = 'UserAddress';
    public $primaryKey = 'address_id';
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );

}
