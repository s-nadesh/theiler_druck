<?php $this->Html->addCrumb(MyClass::translate('Register')); ?>

<div role="main" class="main">

    <?php echo $this->element("breadcrumbs"); ?>

    <div class="container">
        <?php echo $this->Session->flash(); ?>

        <div class="row">
            <div class="col-md-12">

                <div class="row featured-boxes login">
                    <div class="col-md-12">
                        <div class="featured-box featured-box-secundary default info-content">
                            <div class="box-content">
                                <h4><?php echo MyClass::translate("Register An Account") ?></h4>
                                <?php echo $this->Form->create('User', array("class"=>"user_register")) ?>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label><?php echo MyClass::translate("Name")?></label>
                                            <?php echo $this->Form->input('user_name', array('label'=>false, 'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label><?php echo MyClass::translate("Email")?></label>
                                            <?php echo $this->Form->input('user_email', array('label'=>false, 'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label><?php echo MyClass::translate("Password")?></label>
                                            <?php echo $this->Form->password('user_password', array('label'=>false, 'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo $this->Form->submit(MyClass::translate("Register"), array("class"=>"btn btn-primary pull-right push-bottom")); ?>
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