<?php $this->Html->addCrumb(MyClass::translate('Profile')); ?>

<div role="main" class="main">
    <?php echo $this->element("breadcrumbs"); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php echo $this->element('my_account_sidebar'); ?>
            </div>
            <div class="col-md-9 chekout-step">
                <?php echo $this->Session->flash(); ?>
                <h2><?php echo __("Profile"); ?></h2>
                <div class="row featured-boxes login">
                    <div class="col-md-12">
                        <div class="featured-box featured-box-secundary default info-content">
                            <?php echo $this->Form->create('User', array("class" => "form-horizontal form-bordered profile_update")); ?>
                            <div class="box-content">
                                <legend> 
                                    <?php echo __("Edit Profile"); ?>
                                    <span class="pull-right"> * <?php echo __("required fields"); ?> </span>
                                </legend> 
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo __("Name"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('User.user_name', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        <?php echo __("Date of Birth"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('User.user_dob', array('type' => 'text', 'label' => false, 'class' => 'form-control datepicker')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">&nbsp;</label>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->submit(__("Edit Profile"), array("class" => "btn btn-primary btn-lg pull-right push-bottom"));
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

<script>
    $(document).ready(function() {
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '1970:' + new Date().getFullYear(),
            dateFormat: '<?php echo JS_DATE_FORMAT ?>'
        });
    });
</script>