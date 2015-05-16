<?php
$shipping_title = '';
$shipping_first_name = '';
$shipping_last_name = '';
$shipping_company_name = '';
$shipping_additional_company_name = '';
$shipping_street = '';
$shipping_street_number = '';
$shipping_city = '';
$shipping_country = '';
$shipping_post_code = '';
$new_shipping = "checked = 'checked'";
$identical = "";
$new_shipping_class = "block";

if ($this->Session->check('Shop.Order.ShippingAddress')) {
    if ($this->Session->read('Shop.Order.ShippingAddress.new_shippping') == 1) {
        $shipping_address = $this->Session->read('Shop.Order.ShippingAddress');
        $shipping_title = $shipping_address['title'];
        $shipping_first_name = $shipping_address['first_name'];
        $shipping_last_name = $shipping_address['last_name'];
        $shipping_company_name = $shipping_address['company_name'];
        $shipping_additional_company_name = $shipping_address['additional_company_name'];
        $shipping_street = $shipping_address['street'];
        $shipping_street_number = $shipping_address['street_number'];
        $shipping_city = $shipping_address['city'];
        $shipping_country = $shipping_address['country'];
        $shipping_post_code = $shipping_address['sh_cost_id'];

        $new_shipping = "checked = 'checked'";
        $identical = '';
        $new_shipping_class = "block";
    } else {
        $new_shipping = "";
        $identical = "checked = 'checked'";
        $new_shipping_class = "none";
    }
}

$zip_code_list = $this->requestAction('shipping_costs/getZipCodeList');
?>

<div role="main" class="main shop">
    <div class="container">
        <hr class="tall">
        <div class="row">
            <div class="col-md-12">
                <h2 class="shorter"><strong><?php echo __("Checkout"); ?></strong></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 chekout-step">  
                <ul>
                    <li> <a href="<?php echo SITE_BASE_URL ?>checkouts/billing_address"><?php echo __("Billing Address"); ?></a> </li>  
                    <li class="tab-active"> <?php echo __("Shipping Address"); ?> </li>   
                    <li> <?php echo __("Mode of Shipment"); ?> </li>  
                    <li> <?php echo __("Payment Method"); ?> </li>  
                    <li> <?php echo __("Summary"); ?> </li>  
                </ul>
                <div class="billing-address-part1"> 
                    <legend> <?php echo __("Shipping Address"); ?> </legend>
                    <?php echo $this->Form->create('ShippingAddress', array('class' => 'checkout-shipping-address')); ?>
                    <div class="row">

                        <div class="form-group"> 
                            <div class="col-xs-12 col-sm-12 col-md-12">  
                                <label class="radio-inline">
                                    <input type="radio" value="0" id="inlineRadio2" name="data[ShippingAddress][new_shippping]" onclick="toggle_new_shipping(this)" <?php echo $identical ?>> 
                                    <?php echo __("Shipping address and billing address are identical"); ?>
                                </label>  
                                <br/>
                                <label class="radio-inline">
                                    <input type="radio" value="1" id="inlineRadio2" name="data[ShippingAddress][new_shippping]" onclick="toggle_new_shipping(this)" <?php echo $new_shipping ?>>  
                                    <span> <?php echo __("Create New Shipping address"); ?> </span>
                                </label> 
                            </div>
                        </div>

                        <div id="new_shipping" style="display: <?php echo $new_shipping_class ?>">
                            <div class="form-group"> 
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                    <label> <?php echo __("Title"); ?> *</label>
                                    <?php
                                    echo $this->Form->input('title', array('type' => 'select', 'options' => array('Ms' => 'Ms', 'Mr' => 'Mr'), 'empty' => 'Please select', "class" => "form-control", 'label' => false, 'default' => $shipping_title))
                                    ?>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12"> </div>

                            <div class="form-group">  
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                    <label> <?php echo __("First Name"); ?>* </label>
                                    <?php echo $this->Form->input('first_name', array("class" => "form-control", 'label' => false, 'value' => $shipping_first_name)); ?>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                    <label> <?php echo __("Last Name"); ?>* </label>
                                    <?php echo $this->Form->input('last_name', array("class" => "form-control", 'label' => false, 'value' => $shipping_last_name)); ?>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12"> </div>

                            <div class="form-group">  
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                    <label> <?php echo __("Company Name"); ?> </label>
                                    <?php echo $this->Form->input('company_name', array("class" => "form-control", 'label' => false, 'value' => $shipping_company_name)); ?>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                    <label> <?php echo __("Additional Company Name"); ?> </label>
                                    <?php echo $this->Form->input('additional_company_name', array("class" => "form-control", 'label' => false, 'value' => $shipping_additional_company_name)); ?>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12"> </div>

                            <div class="form-group">  
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                    <label> <?php echo __("Street"); ?>* </label>
                                    <?php echo $this->Form->input('street', array("class" => "form-control", 'label' => false, 'value' => $shipping_street)); ?>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                    <label> <?php echo __("Street Number"); ?>* </label>
                                    <?php echo $this->Form->input('street_number', array("class" => "form-control", 'label' => false, 'value' => $shipping_street_number)); ?>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12"> </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                    <label> <?php echo __("City"); ?>* </label>
                                    <?php echo $this->Form->input('city', array("class" => "form-control", 'label' => false, 'value' => $shipping_city)); ?>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                    <label> <?php echo __("Post Code"); ?>* </label>
                                    <?php echo $this->Form->input("sh_cost_id", array("type" => "select", "class" => "form-control", "label" => false, 'options' => $zip_code_list, 'default' => $shipping_post_code)); ?>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                    <label> <?php echo __("Country"); ?>* </label>
                                    <select class="form-control" name="data[ShippingAddress][country]">
                                        <?php $countries = MyClass::getCountries(); ?>
                                        <?php foreach ($countries as $country) { ?>
                                            <option value="<?php echo $country ?>"><?php echo $country ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12"> </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-md-6 push-top">
                                <input type="submit" class="btn btn-primary push-bottom " value="<?php echo __("Continue your order"); ?>">
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggle_new_shipping(element) {
        if (element.value == 1) {
            $("#new_shipping").show();
        } else {
            $("#new_shipping").hide();
        }
    }
</script>