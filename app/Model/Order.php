<?php

class Order extends AppModel {

    public $name = 'Order';
    public $primaryKey = 'order_id';
    public $hasMany = array(
        'OrderItem' => array(
            'className' => 'OrderItem',
        )
    );

}
