<div role="main" class="main">
    <div class="container">
        <hr class="short">
        <div class="row">
            <div class="col-md-12">
                <?php echo $this->Session->flash(); ?>

                <div class="row featured-boxes login checkout-login">
                    <div class="col-md-12">
                        <h4><?php echo __("Registration") ?></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="featured-box featured-box-secundary default info-content">
                                    <div class="box-content">
                                        <h4><?php echo __("I am new here"); ?></h4>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <p class="welcome"><?php echo __("Welcome on Theiler Druck AG"); ?></p>
                                                    <p><?php echo __("By logging in at Theiler Druck you are able to order more quick, know your order status at any time and you will always get an updated summary of your current orders."); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="<?php echo SITE_BASE_URL ?>checkouts/register" class="btn btn-primary btn-lg pull-right push-bottom">
                                                    <?php echo __("Create Account"); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="featured-box featured-box-secundary default info-content">
                                    <div class="box-content">
                                        <h4><?php echo __("I already have an account"); ?></h4>
                                        <?php echo $this->Form->create('User', array('class' => 'user_login')); ?>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><?php echo __("Email"); ?>*</label>
                                                    <?php echo $this->Form->input('user_email', array('label' => false, "class" => "form-control")); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><?php echo __("Password"); ?>*</label>
                                                    <?php echo $this->Form->password('user_password', array('label' => false, "class" => "form-control")); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-primary btn-lg pull-right push-bottom" value="<?php echo __('Login'); ?>">
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