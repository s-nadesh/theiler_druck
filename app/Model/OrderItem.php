<?php

class OrderItem extends AppModel {

    public $name = 'OrderItem';
    public $primaryKey = 'order_item_id';
    public $belongsTo = array(
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'order_id'
        )
    );

}
