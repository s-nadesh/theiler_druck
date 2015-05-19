<?php

class User extends AppModel {

    public $name = 'User';
    public $primaryKey = 'user_id';
    public $validate = array(
        'user_email' => array(
            'rule' => 'isUnique',
            'message' => '"Email" already exist.'
        ),
    );
    public $hasMany = array(
        'UserAddress' => array(
            'className' => 'UserAddress',
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->name]['user_password'])) {
            $this->data[$this->name]['user_password'] = AuthComponent::password($this->data[$this->name]['user_password']);
        }
        return true;
    }

}
