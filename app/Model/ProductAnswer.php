<?php

class ProductAnswer extends AppModel {

    public $name = 'ProductAnswer';
    public $primaryKey = 'product_answer_id';
    public $belongsTo = array(
        'ProductQuestion' => array(
            'className' => 'ProductQuestion',
            'foreignKey' => 'product_question_id'
        )
    );

}
