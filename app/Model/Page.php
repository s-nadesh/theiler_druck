<?php

class Page extends AppModel {

    public $name = 'Page';
    public $primaryKey = 'page_id';
    //Generate slug fields.
    public $actsAs = array(
        'Sluggable.Sluggable' => array(
            'field' => 'page_title', // Field that will be slugged
            'slug' => 'page_slug', // Field that will be used for the slug
            'lowercase' => true, // Do we lowercase the slug ?
            'separator' => '-', //
            'overwrite' => true    // Does the slug is auto generated when field is saved no matter what
        )
    );
    //Relations
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
    
    public function getAllPages(){
        return $this->find('all', array(
           'conditions' => array(
           'Page.language_type_id' => CakeSession::read('Config.language')
          )
        ));
    }
    
}
