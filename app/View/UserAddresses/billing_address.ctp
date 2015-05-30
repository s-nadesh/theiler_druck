<?php $this->Html->addCrumb(MyClass::translate('Billing Address')); ?>

<div role="main" class="main">
    <?php echo $this->element("breadcrumbs"); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php echo $this->element('my_account_sidebar'); ?>
            </div>
            <div class="col-md-9 chekout-step my_account">
                <?php echo $this->Session->flash(); ?>
                <h2><?php echo MyClass::translate("Change Billing Address"); ?></h2>
                <div class="row featured-boxes login">
                    <div class="col-md-12">
                        <div class="featured-box featured-box-secundary default info-content">
                            <?php echo $this->Form->create('UserAddress', array("class" => "form-horizontal form-bordered checkout-register")); ?>
                            <div class="box-content">
                                <legend> 
                                    <?php echo MyClass::translate("Company"); ?>
                                    <span class="pull-right"> * <?php echo MyClass::translate("required fields"); ?> </span>
                                </legend> 

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Company or Individual"); ?>
                                    </label>
                                    <div class="col-md-5">
                                        <?php
                                        $types = MyClass::getCompanyTypes();
                                        echo $this->Form->input('UserAddress.address_company_type', array('type' => 'select', 'options' => $types, 'label' => false, 'class' => 'form-control'));
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group" id="company_name_div">
                                    <label class="col-md-4 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Company Name"); ?>
                                    </label>
                                    <div class="col-md-5">
                                        <?php echo $this->Form->input('UserAddress.address_company_name', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <legend> <?php echo MyClass::translate("Personal Data"); ?></legend> 

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Title"); ?>
                                    </label>
                                    <div class="col-md-5">
                                        <?php
                                        $titles = MyClass::getUserTitles();
                                        echo $this->Form->input('UserAddress.address_title', array('type' => 'select', 'options' => $titles, 'label' => false, 'class' => 'form-control'));
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Firstname"); ?>
                                    </label>
                                    <div class="col-md-5">
                                        <?php echo $this->Form->input('UserAddress.address_firstname', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Lastname"); ?>
                                    </label>
                                    <div class="col-md-5">
                                        <?php echo $this->Form->input('UserAddress.address_lastname', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <legend> <?php echo MyClass::translate("Your Address Details"); ?></legend> 

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Street/No"); ?>
                                    </label>
                                    <div class="col-md-5">
                                        <?php echo $this->Form->input('UserAddress.address_street', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="inputDefault">
                                        <?php echo MyClass::translate("Additional address"); ?>
                                    </label>
                                    <div class="col-md-5">
                                        <?php echo $this->Form->input('UserAddress.address_additional', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("City"); ?>
                                    </label>
                                    <div class="col-md-5">
                                        <?php echo $this->Form->input('UserAddress.address_city', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Post Code"); ?>
                                    </label>
                                    <div class="col-md-5">
                                        <?php echo $this->Form->input('UserAddress.address_post_code', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Country"); ?>
                                    </label>
                                    <div class="col-md-5">
                                        <?php
                                        $countries = MyClass::getCountries();
                                        echo $this->Form->input('UserAddress.address_country', array('type' => 'select', 'options' => $countries, 'label' => false, 'class' => 'form-control'));
                                        ?>
                                    </div>
                                </div>

                                <legend> <?php echo MyClass::translate("Your Contact Information"); ?></legend> 

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="inputDefault">
                                        <?php echo MyClass::translate("Mobile"); ?>
                                    </label>
                                    <div class="col-md-5">
                                        <?php echo $this->Form->input('UserAddress.address_mobile', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Phone"); ?>
                                    </label>
                                    <div class="col-md-5">
                                        <?php echo $this->Form->input('UserAddress.address_phone', array('label' => false, 'class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="inputDefault">&nbsp;</label>
                                    <div class="col-md-5">
                                        <?php
                                        echo $this->Form->submit(MyClass::translate("Change Billing Address"), array("class" => "btn btn-primary btn-lg pull-right push-bottom"));
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
        checkCompanyName();

        $("#UserAddressAddressCompanyType").change(function() {
            checkCompanyName();
        });

    });

    function checkCompanyName() {
        var companyType = $("#UserAddressAddressCompanyType").val();
        if (companyType == 'Individual') {
            $("#company_name_div").hide();
        } else {
            $("#company_name_div").show();
        }
    }
</script>