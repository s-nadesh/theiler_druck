<?php $this->Html->addCrumb(MyClass::translate('Change Password')); ?>

<div role="main" class="main">
    <?php echo $this->element("breadcrumbs"); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php echo $this->element('my_account_sidebar'); ?>
            </div>
            <div class="col-md-9 chekout-step">
                <?php echo $this->Session->flash(); ?>
                <h2><?php echo MyClass::translate("Change Password"); ?></h2>
                <div class="row featured-boxes login">
                    <div class="col-md-12">
                        <div class="featured-box featured-box-secundary default info-content">
                            <?php echo $this->Form->create('User', array("class" => "form-horizontal form-bordered profile_change_password")); ?>
                            <div class="box-content">
                                <legend> 
                                    <?php echo MyClass::translate("Change Password"); ?>
                                    <span class="pull-right"> * <?php echo MyClass::translate("required fields"); ?> </span>
                                </legend> 
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("New Password"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->password('User.new_password', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Confirm Password"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->password('User.confirm_password', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">&nbsp;</label>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->submit(MyClass::translate("Change Password"), array("class" => "btn btn-primary btn-lg pull-right push-bottom"));
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>