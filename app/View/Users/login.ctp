<?php $this->Html->addCrumb(MyClass::translate('Login')); ?>

<div role="main" class="main">
    <?php echo $this->element("breadcrumbs"); ?>
    <div class="container">
        <?php echo $this->Session->flash(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="row featured-boxes login checkout-login">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="featured-box featured-box-secundary default info-content">
                                    <div class="box-content">
                                        <h4><?php echo MyClass::translate("I am new here"); ?></h4>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <p class="welcome"><?php echo MyClass::translate("Welcome on Theiler Druck AG"); ?></p>
                                                    <p><?php echo MyClass::translate("By logging in at Theiler Druck you are able to order more quick, know your order status at any time and you will always get an updated summary of your current orders."); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="<?php echo SITE_BASE_URL ?>users/register" class="btn btn-primary btn-lg pull-right push-bottom">
                                                    <?php echo MyClass::translate("Create Account"); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="featured-box featured-box-secundary default info-content">
                                    <div class="box-content">
                                        <h4><?php echo MyClass::translate("I already have an account"); ?></h4>
                                        <?php echo $this->Form->create('User', array('class' => 'user_login')); ?>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><?php echo MyClass::translate("Email"); ?>*</label>
                                                    <?php echo $this->Form->input('user_email', array('label' => false, "class" => "form-control")); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><?php echo MyClass::translate("Password"); ?>*</label>
                                                    <?php echo $this->Form->password('user_password', array('label' => false, "class" => "form-control")); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php echo $this->Html->link(__('Forgot Password ?'), array('controller' => 'users', 'action' => 'forgot_password')); ?>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="submit" class="btn btn-primary btn-lg pull-right push-bottom" value="<?php echo MyClass::translate('Login'); ?>">
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