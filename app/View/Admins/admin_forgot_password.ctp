<?php echo $this->Form->create('Admin', array('role' => 'form', 'novalidate'=>'novalidate', 'class'=>'admin_forgot_password_form')); ?>
<div class="popup-header">
    <span class="text-semibold"><?php echo __('Forgot Password'); ?></span>
</div>
<div class="well">
    <div class="form-group has-feedback">
        <label><?php echo __('Email'); ?>*</label>
        <?php echo $this->Form->input('admin_email', array('class' => 'required form-control', 'label' => false, 'placeholder' => __('Email'))); ?>
        <i class="icon-users form-control-feedback"></i>
    </div>

    <div class="row form-actions">
        <div class="col-xs-6">

        </div>
        <div class="col-xs-6">
            <button type="submit" class="btn btn-warning pull-right"><i class="icon-menu2"></i> <?php echo __('Submit'); ?></button>
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>