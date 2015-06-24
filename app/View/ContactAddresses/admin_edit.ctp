<?php 
$this->Html->addCrumb(MyClass::translate('Contact Address'), array('controller' => 'contact_addresses', 'action' => 'index', 'admin' => true));
$this->Html->addCrumb(MyClass::translate('Edit'));
?>

<div class="tabbable service-tabs">
    <div class="tab-content">
        <!-- First tab -->
        <div class="tab-pane active fade in" id="english">
            <?php
            echo $this->Form->create('ContactAddress', array(
                "class" => "form-horizontal form-bordered contact-address validate",
                "role" => "form",
                "enctype" => "multipart/form-data"
            ));
            echo $this->Form->hidden('cont_addr_id');
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate("Edit service"); ?></h6>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Company'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_addr_company', array('class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Address 1'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_addr_address_1', array('class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Address 2'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_addr_address_2', array('class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Email'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_addr_email', array('class' => 'required form-control email', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Email'); ?> 2:
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_addr_email_2', array('class' => 'form-control email', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Email'); ?> 3:
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_addr_email_3', array('class' => 'form-control email', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Fax'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_addr_fax', array('class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Phone'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_addr_phone', array('class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Country'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_addr_country', array('class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Website'); ?>: 
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_addr_website', array('class' => 'form-control url', 'label' => false));
                            ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Facebook'); ?>: 
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_addr_facebook', array('class' => 'form-control url', 'label' => false));
                            ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Twitter'); ?>: 
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_addr_twitter', array('class' => 'form-control url', 'label' => false));
                            ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Linkedin'); ?>: 
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_addr_linkedin', array('class' => 'form-control url', 'label' => false));
                            ?>
                        </div>
                    </div>
                    
                    <div class="form-actions text-right">
                        <input type="submit" value="<?php echo MyClass::translate("Save"); ?>" class="btn btn-primary">
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>