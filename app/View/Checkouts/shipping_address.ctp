<?php
$shipping_company_type = '';
$shipping_company_name = '';

$shipping_title = '';
$shipping_first_name = '';
$shipping_last_name = '';

$shipping_street = '';
$shipping_additional = '';
$shipping_city = '';
$shipping_post_code = '';
$shipping_country = '';

$shipping_phone = '';
$shipping_mobile = '';

$shipping_identical_checked = "checked = 'checked'";
$shipping_new_checked = "";
$new_shipping_div_class = 'none';

if ($this->Session->check('Shop.Order.ShippingAddress')) {
    if ($this->Session->read('Shop.Order.ShippingAddress.identical') == 0) {
        //Shipping and Billing are different
        $shipping_address = $this->Session->read('Shop.Order.ShippingAddress');
        $shipping_company_type = $shipping_address['address_company_type'];
        $shipping_company_name = $shipping_address['address_company_name'];

        $shipping_title = $shipping_address['address_title'];
        $shipping_first_name = $shipping_address['address_firstname'];
        $shipping_last_name = $shipping_address['address_lastname'];

        $shipping_street = $shipping_address['address_street'];
        $shipping_additional = $shipping_address['address_additional'];
        $shipping_city = $shipping_address['address_city'];
        $shipping_post_code = $shipping_address['address_post_code'];
        $shipping_country = $shipping_address['address_country'];

        $shipping_phone = $shipping_address['address_phone'];
        $shipping_mobile = $shipping_address['address_mobile'];

        $shipping_identical_checked = "";
        $shipping_new_checked = "checked = 'checked'";
        $new_shipping_div_class = 'block';
    }
}
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
                            <li><a href="<?php echo SITE_BASE_URL ?>checkouts/billing_address"><?php echo __("Billing Address"); ?></a></li>
                            <li class="tab-active"> <?php echo __("Shipping Address"); ?> </li>
                            <li> <?php echo __("Payment Method"); ?> </li>
                            <li> <?php echo __("Summary"); ?> </li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row featured-boxes login">
                    <div class="col-md-12">
                        <h4><?php echo __("Shipping Address") ?></h4>
                        <div class="featured-box featured-box-secundary default info-content">
                            <?php echo $this->Form->create('ShippingAddress', array("class" => "form-horizontal form-bordered checkout-shipping", 'id' => 'shipping-address-form')); ?>
                            <div class="box-content">
                                <legend> 
                                    <?php echo __("Choose Shipping Address"); ?>
                                    <span class="pull-right"> * <?php echo __("required fields"); ?> </span>
                                </legend> 

                                <div class="form-group">
                                    <div class="col-md-2">&nbsp;</div>
                                    <div class="col-md-10">
                                        <p>
                                            <input type="radio" value="1" name="data[ShippingAddress][identical]" id="shipping_identical" <?php echo $shipping_identical_checked ?>>
                                            &nbsp;<label for="shipping_identical"><?php echo __("Shipping address and billing address are identical"); ?></label>
                                        </p>
                                        <p>
                                            <input type="radio" value="0" name="data[ShippingAddress][identical]" id="shipping_new" <?php echo $shipping_new_checked ?>>
                                            &nbsp;<label for="shipping_new"><?php echo __("Create new shipping address"); ?></label>
                                        </p>
                                    </div>
                                </div>

                                <div id="new-shipping-div" style="display: <?php echo $new_shipping_div_class ?>">
                                    <legend> 
                                        <?php echo __("Company"); ?>
                                    </legend> 

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="inputDefault">
                                            * <?php echo __("Company or Individual"); ?>
                                        </label>
                                        <div class="col-md-6">
                                            <?php
                                            $types = MyClass::getCompanyTypes();
                                            echo $this->Form->input('address_company_type', array('type' => 'select', 'options' => $types, 'label' => false, 'class' => 'form-control', 'default' => $shipping_company_type));
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group" id="company_name_div">
                                        <label class="col-md-3 control-label" for="inputDefault">
                                           * <?php echo __("Company Name"); ?>
                                        </label>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->input('address_company_name', array('label' => false, 'class' => 'form-control', 'value' => $shipping_company_name)); ?>
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
                                            echo $this->Form->input('address_title', array('type' => 'select', 'options' => $titles, 'label' => false, 'class' => 'form-control', 'default' => $shipping_title));
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="inputDefault">
                                            * <?php echo __("Firstname"); ?>
                                        </label>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->input('address_firstname', array('label' => false, 'class' => 'form-control', 'value' => $shipping_first_name)); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="inputDefault">
                                            * <?php echo __("Lastname"); ?>
                                        </label>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->input('address_lastname', array('label' => false, 'class' => 'form-control', 'value' => $shipping_last_name)); ?>
                                        </div>
                                    </div>

                                    <legend> <?php echo __("Your Address Details"); ?></legend> 

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="inputDefault">
                                            * <?php echo __("Street/No"); ?>
                                        </label>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->input('address_street', array('label' => false, 'class' => 'form-control', 'value' => $shipping_street)); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="inputDefault">
                                            <?php echo __("Additional address"); ?>
                                        </label>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->input('address_additional', array('label' => false, 'class' => 'form-control', 'value' => $shipping_additional)); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="inputDefault">
                                            * <?php echo __("City"); ?>
                                        </label>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->input('address_city', array('label' => false, 'class' => 'form-control', 'value' => $shipping_city)); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="inputDefault">
                                            * <?php echo __("Post Code"); ?>
                                        </label>
                                        <div class="col-md-6">
                                            <?php
                                            $ship_code = $this->requestAction('shipping_costs/getZipCode/' . $this->Session->read('Shop.Additional.sh_cost_id'));
                                            $post_code_from = $ship_code['ShippingCost']['sh_cost_zip_from'];
                                            $post_code_to = $ship_code['ShippingCost']['sh_cost_zip_to'];
                                            echo $this->Form->input('address_post_code', array('label' => false, 'class' => 'form-control', 'value' => $shipping_post_code, 'data-from-zip' => $post_code_from, 'data-to-zip' => $post_code_to));
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="inputDefault">
                                            * <?php echo __("Country"); ?>
                                        </label>
                                        <div class="col-md-6">
                                            <?php
                                            $countries = MyClass::getCountries();
                                            echo $this->Form->input('address_country', array('type' => 'select', 'options' => $countries, 'label' => false, 'class' => 'form-control', 'default' => $shipping_country));
                                            ?>
                                        </div>
                                    </div>

                                    <legend> <?php echo __("Your Contact Information"); ?></legend> 

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="inputDefault">
                                            <?php echo __("Mobile"); ?>
                                        </label>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->input('address_mobile', array('label' => false, 'class' => 'form-control', 'value' => $shipping_mobile)); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="inputDefault">
                                            * <?php echo __("Phone"); ?>
                                        </label>
                                        <div class="col-md-6">
                                            <?php echo $this->Form->input('address_phone', array('label' => false, 'class' => 'form-control', 'value' => $shipping_phone)); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="inputDefault">&nbsp;</label>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->submit(__("Continue your order"), array("class" => "btn btn-primary btn-lg pull-right push-bottom"));
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
        toggleNewShippingDiv();
        checkCompanyName();

        $("#ShippingAddressAddressCompanyType").change(function() {
            checkCompanyName();
        });

        $('#shipping-address-form input[name="data[ShippingAddress][identical]"]').click(function() {
            toggleNewShippingDiv();
        });
    });

    function toggleNewShippingDiv() {
        var identical = $('input[name="data[ShippingAddress][identical]"]:checked', '#shipping-address-form').val();
        if (identical == 1) {
            $("#new-shipping-div").hide();
        } else {
            $("#new-shipping-div").show();
        }
    }

    function checkCompanyName() {
        var companyType = $("#ShippingAddressAddressCompanyType").val();
        if (companyType == 'Individual') {
            $("#company_name_div").hide();
        } else {
            $("#company_name_div").show();
        }
    }
</script>