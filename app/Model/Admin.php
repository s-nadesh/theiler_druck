<?php

class Admin extends AppModel {

    public $name = 'Admin';
    public $primaryKey = 'admin_id';
    public $virtualFields = array(
        'admin_owner_name' => "extract_json_value(admin_bank_info,'/owner_name')",
        'admin_bank_name' => "extract_json_value(admin_bank_info,'/bank_name')",
        'admin_bank_account_number' => "extract_json_value(admin_bank_info,'/bank_account_number')",
        'admin_blz' => "extract_json_value(admin_bank_info,'/blz')",
        'admin_bic' => "extract_json_value(admin_bank_info,'/bic')",
        'admin_iban' => "extract_json_value(admin_bank_info,'/iban')",
        'admin_bank_information' => "extract_json_value(admin_bank_info,'/bank_information')",
    );

    public function beforeSave($options = array()) {
        if(isset($this->data['Admin']['save_bankinfo'])){
            $bank_info = array(
                'owner_name' => $this->data['Admin']['admin_owner_name'],
                'bank_name' => $this->data['Admin']['admin_bank_name'],
                'bank_account_number' => $this->data['Admin']['admin_bank_account_number'],
                'blz' => $this->data['Admin']['admin_blz'],
                'bic' => $this->data['Admin']['admin_bic'],
                'iban' => $this->data['Admin']['admin_iban'],
                'bank_information' => $this->data['Admin']['admin_bank_information'],
            );
            $this->data['Admin']['admin_bank_info'] = json_encode($bank_info);
        }
        return parent::beforeSave($options);
    }

    //Model Validations
//    public $validate = array(
//        'admin_email' => array(
//            'rule' => 'email',
//            'required' => true,
//            'message' => 'Please enter valid email address'
//        ),
//        'admin_password' => array(
//            'rule' => 'notEmpty',
//            'required' => true,
//            'message' => 'Please enter valid password'
//        )
//    );
}
