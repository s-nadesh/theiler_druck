<?php

class ProductQuestion extends AppModel {

    public $name = 'ProductQuestion';
    public $primaryKey = 'product_question_id';
    
    public $hasOne = array(
        'ProductAnswer' => array(
            'className' => 'ProductAnswer',
        )
    );

}
