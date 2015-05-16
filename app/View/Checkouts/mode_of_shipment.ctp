<?php
$billing_address = $this->Session->read('Shop.Order.BillingAddress');
$billing_zip_detail = $this->requestAction('shipping_costs/getZipCode/'.$billing_address['sh_cost_id']); 

$billing_title = $billing_address['title'];
$billing_first_name = $billing_address['first_name'];
$billing_last_name = $billing_address['last_name'];
$billing_street = $billing_address['street'];
$billing_street_number = $billing_address['street_number'];
$billing_city = $billing_address['city'];
$billing_country = $billing_address['country'];
$billing_post_code = $billing_zip_detail['ShippingCost']['target_zip_code']; 

$shipping_address = $this->Session->read('Shop.Order.ShippingAddress');
if ($shipping_address['new_shippping'] == 1) {
    $shipping_zip_detail = $this->requestAction('shipping_costs/getZipCode/'.$shipping_address['sh_cost_id']); 
    $shipping_title = $shipping_address['title'];
    $shipping_first_name = $shipping_address['first_name'];
    $shipping_last_name = $shipping_address['last_name'];
    $shipping_street = $shipping_address['street'];
    $shipping_street_number = $shipping_address['street_number'];
    $shipping_city = $shipping_address['city'];
    $shipping_country = $shipping_address['country'];
    $shipping_post_code = $shipping_zip_detail['ShippingCost']['target_zip_code']; 
} else {
    $shipping_title = $billing_title;
    $shipping_first_name = $billing_first_name;
    $shipping_last_name = $billing_last_name;
    $shipping_street = $billing_street;
    $shipping_street_number = $billing_street_number;
    $shipping_city = $billing_city;
    $shipping_country = $billing_country;
    $shipping_post_code = $billing_post_code;
}
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
                    <li> <a href="<?php echo SITE_BASE_URL ?>checkouts/shipping_address"><?php echo __("Shipping Address"); ?></a> </li>   
                    <li class="tab-active"> <?php echo __("Mode of Shipment"); ?> </li>  
                    <li> <?php echo __("Payment Method"); ?> </li>  
                    <li> <?php echo __("Summary"); ?> </li>  
                </ul>
                <div class="billing-address-part1"> 
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <legend> <?php echo __("Billing address"); ?></legend>
                            <p> 
                                <?php echo $billing_title . ' ' . $billing_first_name . ' ' . $billing_last_name; ?><br/> 
                                <?php echo $billing_street . ' ' . $billing_street_number; ?><br/> 
                                <?php echo $billing_post_code . ' ' . $billing_city; ?><br/> 
                                <?php echo $billing_country; ?><br/><br/>  
                            </p>
                            <p>
                                <b> 
                                    <a href="<?php echo SITE_BASE_URL ?>checkouts/billing_address"><?php echo __("Modify Billing Address"); ?></a>
                                </b>
                            </p>
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <legend> <?php echo __("Shipping Address"); ?> </legend>
                            <p> 
                                <?php echo $shipping_title . ' ' . $shipping_first_name . ' ' . $shipping_last_name; ?><br/> 
                                <?php echo $shipping_street . ' ' . $shipping_street_number; ?><br/> 
                                <?php echo $shipping_post_code . ' ' . $shipping_city; ?><br/> 
                                <?php echo $shipping_country; ?><br/><br/>  
                            </p>
                            <p>
                                <b> 
                                    <a href="<?php echo SITE_BASE_URL ?>checkouts/shipping_address"><?php echo __("Modify Shipping Address"); ?></a>
                                </b>
                            </p>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <legend> <?php echo __("Shipping Cost"); ?> </legend> 
                            <div class="row">
                                <div class="form-group"> 
                                    <div class="col-xs-12 col-sm-12 col-md-12 shipping-option">  
                                        <b> <?php echo __("Shipping Cost"); ?></b> 
                                        (<?php echo MyClass::weightFormat($this->Session->read('Shop.Additional.cart_total_weight'))?>) 
                                        <span> <?php echo MyClass::currencyFormat($this->Session->read('Shop.Additional.shipping_cost'))?> </span>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <?php echo $this->Form->create('ModeOfShipment'); ?>
                    <div class="row"> 
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-1 col-md-12 clearfix"> </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 push-top">
                                <input type="submit" data-loading-text="Loading..." class="btn btn-primary push-bottom " value="<?php echo __("Continue your order"); ?>">
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>