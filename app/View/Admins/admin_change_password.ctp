<?php
$this->Html->addCrumb(MyClass::translate('Change Password'));

echo $this->Form->create('Admin', array(
    "class" => "form-horizontal form-bordered admin_change_password",
    "role" => "form",
));
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-key"></i> <?php echo MyClass::translate('Change Password'); ?></h6>
    </div>

    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('New Password'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('admin_new_password', array('type'=>'password', 'class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Confirm Password'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('admin_confirm_password', array('type'=>'password', 'class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-actions text-right">
            <input type="submit" value="<?php echo MyClass::translate('Change Password'); ?>" class="btn btn-primary">
        </div>
    </div>
</div>
<?php echo $this->form->end(); ?>