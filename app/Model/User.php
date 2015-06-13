<?php

class User extends AppModel {

    public $name = 'User';
    public $primaryKey = 'user_id';
    public $validate = array(
        'user_email' => array(
            'rule' => 'isUnique',
            'message' => '"Email" already exist.'
        ),
        'current_password' => array(
            'rule' => 'checkCurrentPassword',
            'message' => 'Old password not matched'
        ),
    );
    public $virtualFields = array(
        'fullname' => "CONCAT(user_name, ' ', user_lastname)",
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

    public function checkCurrentPassword($data) {
        $this->id = AuthComponent::user('user_id');
        $password = $this->field('user_password');
        return(AuthComponent::password($data['current_password']) == $password);
    }

}
