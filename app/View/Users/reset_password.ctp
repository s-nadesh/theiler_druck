<?php $this->Html->addCrumb(__('Reset Password')); ?>

<div role="main" class="main">
    <?php echo $this->element("breadcrumbs"); ?>
    <div class="container">
        <?php echo $this->Session->flash(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="row featured-boxes login">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 center">
                                <div class="featured-box featured-box-secundary default info-content">
                                    <div class="box-content">
                                        <?php echo $this->Form->create('User', array('class' => 'user_reset_password')); ?>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><?php echo __("New Password"); ?>*</label>
                                                    <?php echo $this->Form->password('user_password', array('label' => false, "class" => "form-control")); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><?php echo __("Confirm Password"); ?>*</label>
                                                    <?php echo $this->Form->password('user_confirm_password', array('label' => false, "class" => "form-control")); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-primary btn-lg pull-right push-bottom" value="<?php echo __('Reset Password'); ?>">
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
        </div>
    </div>
</div>