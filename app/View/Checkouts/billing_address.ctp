<?php
$billing_address = $this->Session->read('Shop.Order.BillingAddress');

$billing_company_type = $billing_address['address_company_type'];
$billing_company_name = $billing_address['address_company_name'];

$billing_title = $billing_address['address_title'];
$billing_first_name = $billing_address['address_firstname'];
$billing_last_name = $billing_address['address_lastname'];

$billing_street = $billing_address['address_street'];
$billing_additional = $billing_address['address_additional'];
$billing_city = $billing_address['address_city'];
$billing_post_code = $billing_address['address_post_code'];
$billing_country = $billing_address['address_country'];

$billing_phone = $billing_address['address_phone'];
$billing_mobile = $billing_address['address_mobile'];
?>
<div role="main" class="main">
    <div class="container">
        <hr class="short">
        <?php echo $this->Session->flash(); ?>
        <div class="row">
            <div class="col-md-12 chekout-step">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li class="tab-active"> <?php echo MyClass::translate("Billing Address"); ?> </li>
                            <li> <?php echo MyClass::translate("Shipping Address"); ?> </li>
                            <li> <?php echo MyClass::translate("Payment Method"); ?> </li>
                            <li> <?php echo MyClass::translate("Summary"); ?> </li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row featured-boxes login">
                    <div class="col-md-12">
                        <h4><?php echo MyClass::translate("Billing Address") ?></h4>
                        <div class="featured-box featured-box-secundary default info-content">
                            <?php echo $this->Form->create('BillingAddress', array("class" => "form-horizontal form-bordered checkout-billing")); ?>
                            <div class="box-content">
                                <legend> 
                                    <?php echo MyClass::translate("Company"); ?>
                                    <span class="pull-right"> * <?php echo MyClass::translate("required fields"); ?> </span>
                                </legend> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Company or Individual"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php
                                        $types = MyClass::getCompanyTypes();
                                        echo $this->Form->input('address_company_type', array('type' => 'select', 'options' => $types, 'label' => false, 'class' => 'form-control', 'default' => $billing_company_type));
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group" id="company_name_div">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                       * <?php echo MyClass::translate("Company Name"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('address_company_name', array('label' => false, 'class' => 'form-control', 'value' => $billing_company_name)); ?>
                                    </div>
                                </div>

                                <legend> <?php echo MyClass::translate("Personal Data"); ?></legend> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Title"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php
                                        $titles = MyClass::getUserTitles();
                                        echo $this->Form->input('address_title', array('type' => 'select', 'options' => $titles, 'label' => false, 'class' => 'form-control', 'default' => $billing_title));
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Firstname"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('address_firstname', array('label' => false, 'class' => 'form-control', 'value' => $billing_first_name)); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Lastname"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('address_lastname', array('label' => false, 'class' => 'form-control', 'value' => $billing_last_name)); ?>
                                    </div>
                                </div>

                                <legend> <?php echo MyClass::translate("Your Address Details"); ?></legend> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Street/No"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('address_street', array('label' => false, 'class' => 'form-control', 'value' => $billing_street)); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        <?php echo MyClass::translate("Additional address"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('address_additional', array('label' => false, 'class' => 'form-control', 'value' => $billing_additional)); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("City"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('address_city', array('label' => false, 'class' => 'form-control', 'value' => $billing_city)); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Post Code"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('address_post_code', array('label' => false, 'class' => 'form-control', 'value' => $billing_post_code)); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Country"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php
                                        $countries = MyClass::getCountries();
                                        echo $this->Form->input('address_country', array('type' => 'select', 'options' => $countries, 'label' => false, 'class' => 'form-control', 'default' => $billing_country));
                                        ?>
                                    </div>
                                </div>

                                <legend> <?php echo MyClass::translate("Your Contact Information"); ?></legend> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        <?php echo MyClass::translate("Mobile"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('address_mobile', array('label' => false, 'class' => 'form-control', 'value' => $billing_mobile)); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">
                                        * <?php echo MyClass::translate("Phone"); ?>
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('address_phone', array('label' => false, 'class' => 'form-control', 'value' => $billing_phone)); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">&nbsp;</label>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->submit(MyClass::translate("Continue your order"), array("class" => "btn btn-primary btn-lg pull-right push-bottom"));
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

        $("#BillingAddressAddressCompanyType").change(function() {
            checkCompanyName();
        });

    });

    function checkCompanyName() {
        var companyType = $("#BillingAddressAddressCompanyType").val();
        if (companyType == 'Individual') {
            $("#company_name_div").hide();
        } else {
            $("#company_name_div").show();
        }
    }
</script>