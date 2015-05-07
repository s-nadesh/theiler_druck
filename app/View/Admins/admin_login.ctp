<?php echo $this->Form->create('Admin', array('action' => 'login', 'role' => 'form', 'novalidate'=>'novalidate', 'class'=>'admin_login_form')); ?>
<div class="popup-header">
    <span class="text-semibold"><?php echo __('Admin Login'); ?></span>
</div>
<div class="well">
    <div class="form-group has-feedback">
        <label><?php echo __('Email'); ?>*</label>
        <?php echo $this->Form->input('admin_email', array('class' => 'required form-control', 'label' => false, 'placeholder' => __('Email'))); ?>
        <i class="icon-users form-control-feedback"></i>
    </div>

    <div class="form-group has-feedback">
        <label><?php echo __('Password'); ?>*</label>
        <?php echo $this->Form->input('admin_password', array('type'=>'password', 'class' => 'required form-control', 'label' => false, 'placeholder' => __('Password'))); ?>
        <i class="icon-lock form-control-feedback"></i>
    </div>

    <div class="row form-actions">
        <div class="col-xs-6">

        </div>
        <div class="col-xs-6">
            <button type="submit" class="btn btn-warning pull-right"><i class="icon-menu2"></i> <?php echo __('Sign in'); ?></button>
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>