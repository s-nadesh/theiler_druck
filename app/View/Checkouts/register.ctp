<div role="main" class="main">

    <div class="container">
        <hr class="short">
        <?php echo $this->Session->flash(); ?>

        <div class="row">
            <div class="col-md-12 chekout-step">

                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li class="tab-active"> <?php echo __("Billing Address"); ?> </li>
                            <li> <?php echo __("Shipping Address"); ?> </li>
                            <li> <?php echo __("Payment Method"); ?> </li>
                            <li> <?php echo __("Summary"); ?> </li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row featured-boxes login">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6"><h4><?php echo __("Create Account") ?></h4></div>
                            <div class="col-md-6">
                                <p class="pull-right">
                                    <?php echo __("Already have an account?") ?>
                                    <a href="<?php echo SITE_BASE_URL ?>checkouts"><?php echo __("Login here"); ?></a>
                                </p>
                            </div>
                        </div>

                        <div class="featured-box featured-box-secundary default info-content">
                            <?php echo $this->Form->create('User', array("class" => "form-horizontal form-bordered checkout-register")); ?>
                            <div class="box-content">
                                <legend> 
                                    <?php echo __("Company"); ?>
                                    <span class="pull-right"> * <?php echo __("required fields"); ?> </span>
                                </legend> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo __("Company or Individual"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php
                                        $types = MyClass::getCompanyTypes();
                                        echo $this->Form->input('UserAddress.address_company_type', array('type' => 'select', 'options' => $types, 'label' => false, 'class' => 'form-control'));
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        <?php echo __("Company Name"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('UserAddress.address_company_name', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <legend> <?php echo __("Personal Data"); ?></legend> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo __("Title"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php
                                        $titles = MyClass::getUserTitles();
                                        echo $this->Form->input('UserAddress.address_title', array('type' => 'select', 'options' => $titles, 'label' => false, 'class' => 'form-control'));
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo __("Firstname"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('UserAddress.address_firstname', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo __("Lastname"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('UserAddress.address_lastname', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        <?php echo __("Date of Birth"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('User.user_dob', array('type' => 'text', 'label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo __("Email"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('User.user_email', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <legend> <?php echo __("Your Address Details"); ?></legend> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo __("Street/No"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('UserAddress.address_street', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        <?php echo __("Additional address"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('UserAddress.address_additional', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo __("City"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('UserAddress.address_city', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo __("Post Code"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('UserAddress.address_post_code', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo __("Country"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php
                                        $countries = MyClass::getCountries();
                                        echo $this->Form->input('UserAddress.address_country', array('type' => 'select', 'options' => $countries, 'label' => false, 'class' => 'form-control'));
                                        ?>
                                    </div>
                                </div>

                                <legend> <?php echo __("Your Contact Information"); ?></legend> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        <?php echo __("Mobile"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('UserAddress.address_mobile', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo __("Phone"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('UserAddress.address_phone', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <legend> <?php echo __("Password"); ?></legend> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo __("Password"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->password('User.user_password', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo __("Repeat Password"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->password('User.repeat_password', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">&nbsp;</label>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->submit(__("Create Account"), array("class" => "btn btn-primary btn-lg pull-right push-bottom"));
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