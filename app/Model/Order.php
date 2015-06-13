<?php

class Order extends AppModel {

    public $name = 'Order';
    public $primaryKey = 'order_id';
    public $virtualFields = array(
        'order_filename' => "CONCAT(order_unique_id, '.pdf')",
    );
    
    public $hasMany = array(
        'OrderItem' => array(
            'className' => 'OrderItem',
        )
    );

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );

}
