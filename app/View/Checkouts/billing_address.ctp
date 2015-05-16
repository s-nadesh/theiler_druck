<?php
if ($this->Session->check('Shop.Order.BillingAddress')) {
    $billing_address = $this->Session->read('Shop.Order.BillingAddress');
    $billing_title = $billing_address['title'];
    $billing_first_name = $billing_address['first_name'];
    $billing_last_name = $billing_address['last_name'];
    $billing_street = $billing_address['street'];
    $billing_street_number = $billing_address['street_number'];
    $billing_city = $billing_address['city'];
    $billing_country = $billing_address['country'];
    $billing_post_code = $billing_address['sh_cost_id'];
} else {
    $billing_title = '';
    $billing_first_name = '';
    $billing_last_name = '';
    $billing_street = '';
    $billing_street_number = '';
    $billing_city = '';
    $billing_country = '';
    $billing_post_code = '';
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
                    <li class="tab-active"> <?php echo __("Billing Address"); ?> </li>  
                    <li> <?php echo __("Shipping Address"); ?> </li>   
                    <li> <?php echo __("Mode of Shipment"); ?> </li>  
                    <li> <?php echo __("Payment Method"); ?> </li>  
                    <li> <?php echo __("Summary"); ?> </li>  
                </ul>
                <div class="billing-address-part1"> 
                    <legend> <?php echo __("Billing Address"); ?> </legend>

                    <?php echo $this->Form->create('BillingAddress', array('class' => 'checkout-billing-address')); ?>
                    <div class="row">
                        <div class="form-group"> 
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <label> <?php echo __("Title"); ?> *</label>
                                <?php
                                echo $this->Form->input('title', array('type' => 'select', 'options' => array('Ms' => 'Ms', 'Mr' => 'Mr'), 'empty' => 'Please select', "class" => "form-control", 'label' => false, 'default' => $billing_title));
                                ?>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12"> </div>

                        <div class="form-group">  
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <label> <?php echo __("First Name"); ?>* </label>
                                <?php echo $this->Form->input('first_name', array("class" => "form-control", 'label' => false, 'value' => $billing_first_name)); ?>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <label> <?php echo __("Last Name"); ?>* </label>
                                <?php echo $this->Form->input('last_name', array("class" => "form-control", 'label' => false, 'value' => $billing_last_name)); ?>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12"> </div>

                        <div class="form-group">  
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <label> <?php echo __("Street"); ?>* </label>
                                <?php echo $this->Form->input('street', array("class" => "form-control", 'label' => false, 'value' => $billing_street)); ?>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <label> <?php echo __("Street Number"); ?>* </label>
                                <?php echo $this->Form->input('street_number', array("class" => "form-control", 'label' => false, 'value' => $billing_street_number)); ?>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12"> </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <label> <?php echo __("City"); ?>* </label>
                                <?php echo $this->Form->input('city', array("class" => "form-control", 'label' => false, 'value' => $billing_city)); ?>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <label> <?php echo __("Post Code"); ?>* </label>
                                <?php echo $this->Form->input("sh_cost_id", array("type" => "select", "class" => "form-control", "label" => false, 'options' => $zip_code_list, 'default' => $billing_post_code)); ?>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <label> <?php echo __("Country"); ?>* </label>
                                <select class="form-control" name="data[BillingAddress][country]">
                                    <?php $countries = MyClass::getCountries(); ?>
                                    <?php foreach ($countries as $country) { ?>
                                        <option value="<?php echo $country ?>"><?php echo $country ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12"> </div>

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