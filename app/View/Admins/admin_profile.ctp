<?php
$this->Html->addCrumb(MyClass::translate('Profile'));

echo $this->Form->create('Admin', array(
    "class" => "form-horizontal form-bordered admin_profile",
    "role" => "form",
    "enctype" => "multipart/form-data"
));
echo $this->Form->hidden('save_bankinfo', array('value' => '1'));
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i> <?php echo MyClass::translate('Admin Profile'); ?></h6>
    </div>

    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Name'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('admin_name', array('class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Email'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('admin_email', array('class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Profile Image'); ?>:</label>
            <div class="col-sm-10">
                <?php
                echo $this->Form->hidden('profile_old_image', array('value' => $this->data['Admin']['admin_profile_image']));
                echo $this->Form->input('admin_profile_image', array('type' => 'file', 'class' => 'styled', 'label' => false));
                ?>
                <div class="col-sm-2">
                    <?php
                    echo $this->Html->image("/" . PROFILE_IMAGE_FOLDER . $this->data['Admin']['admin_profile_image'], array('alt' => $this->data['Admin']['admin_profile_image'], 'class' => 'img-responsive'));
                    ?>

                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Owner Name'); ?> </label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('admin_owner_name', array('class' => 'form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Bank Name'); ?> </label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('admin_bank_name', array('class' => 'form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Bank Account Number'); ?> </label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('admin_bank_account_number', array('class' => 'form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('BLZ'); ?> </label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('admin_blz', array('class' => 'form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('BIC'); ?> </label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('admin_bic', array('class' => 'form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('IBAN'); ?> </label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('admin_iban', array('class' => 'form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Bank Information'); ?> </label>
            <div class="col-sm-10">
                <?php echo $this->Form->textarea('admin_bank_information', array('class' => 'form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-actions text-right">
            <input type="submit" value="<?php echo MyClass::translate("Update Profile"); ?>" class="btn btn-primary">
        </div>
    </div>
</div>
<?php echo $this->form->end(); ?>