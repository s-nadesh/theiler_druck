<?php
$this->Html->addCrumb(__('Profile'));

echo $this->Form->create('Admin', array(
    "class" => "form-horizontal form-bordered admin_profile",
    "role" => "form",
));
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i> <?php echo __('Admin Profile'); ?></h6>
    </div>

    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo __('Name'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('admin_name', array('class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo __('Email'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('admin_email', array('class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-actions text-right">
            <input type="submit" value="<?php echo __("Update Profile"); ?>" class="btn btn-primary">
        </div>
    </div>
</div>
<?php echo $this->form->end(); ?>