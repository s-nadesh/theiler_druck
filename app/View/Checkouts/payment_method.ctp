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

$shipping_address = $this->Session->read('Shop.Order.ShippingAddress');
if ($shipping_address['identical'] == 0) {
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
} else {
    $shipping_company_type = $billing_company_type;
    $shipping_company_name = $billing_company_name;

    $shipping_title = $billing_title;
    $shipping_first_name = $billing_first_name;
    $shipping_last_name = $billing_last_name;

    $shipping_street = $billing_street;
    $shipping_additional = $billing_additional;
    $shipping_city = $billing_city;
    $shipping_post_code = $billing_post_code;
    $shipping_country = $billing_country;

    $shipping_phone = $billing_phone;
    $shipping_mobile = $billing_mobile;
}

if ($this->Session->check('Shop.Order.PaymentMethod')) {
    $payment_method = $this->Session->read('Shop.Order.PaymentMethod');
    $choosen_id = $payment_method['id'];
} else {
    $choosen_id = '';
}
?>
<div role="main" class="main">
    <div class="container">
        <hr class="short">
        <?php echo $this->Session->flash(); ?>
        <div class="row featured-boxes login">
            <div class="col-md-12 chekout-step">

                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li> <a href="<?php echo SITE_BASE_URL ?>checkouts/billing_address"> <?php echo MyClass::translate("Billing Address"); ?> </a> </li>
                            <li> <a href="<?php echo SITE_BASE_URL ?>checkouts/shipping_address"> <?php echo MyClass::translate("Shipping Address"); ?> </a> </li>
                            <li class="tab-active"> <?php echo MyClass::translate("Payment Method"); ?> </li>
                            <li> <?php echo MyClass::translate("Summary"); ?> </li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="featured-box featured-box-secundary default info-content">
                            <div class="box-content">
                                <legend> <?php echo MyClass::translate("Billing Address"); ?></legend> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="address">
                                            <?php echo $billing_title . ' ' . $billing_first_name . ' ' . $billing_last_name; ?><br>
                                            <?php echo $billing_street; ?><br>
                                            <?php echo $billing_post_code . ' ' . $billing_city; ?><br>
                                            <?php echo $billing_country; ?><br>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?php echo SITE_BASE_URL ?>checkouts/billing_address" class="btn btn-lg btn-primary pull-right"><?php echo MyClass::translate("Billing Address Change"); ?></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="featured-box featured-box-secundary default info-content">
                            <div class="box-content">
                                <legend> <?php echo MyClass::translate("Shipping Address"); ?></legend> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="address">
                                            <?php echo $shipping_title . ' ' . $shipping_first_name . ' ' . $shipping_last_name; ?><br>
                                            <?php echo $shipping_street; ?><br>
                                            <?php echo $shipping_post_code . ' ' . $shipping_city; ?><br>
                                            <?php echo $shipping_country; ?><br>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?php echo SITE_BASE_URL ?>checkouts/shipping_address" class="btn btn-lg btn-primary pull-right"><?php echo MyClass::translate("Shipping Address Change"); ?></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="featured-box featured-box-secundary default info-content">
                            <?php echo $this->Form->create('PaymentMethod', array('class' => 'checkout-payment-method')); ?>
                            <div class="box-content payment_methods">
                                <legend> 
                                    <?php echo MyClass::translate("Payment Method"); ?>
                                    <span class="pull-right"> * <?php echo MyClass::translate("required fields"); ?></span>
                                </legend> 

                                <div id="payment-method-error"></div>

                                <?php
                                $payment_methods = MyClass::paymentMethods();
                                foreach ($payment_methods['PaymentMethod'] as $payment_method) {
                                    if ($payment_method['id'] == $choosen_id)
                                        $checked = 'checked = "checked"';
                                    else
                                        $checked = '';
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-9 col-sm-9 col-md-10">
                                            <p>
                                                <input type="radio" name="data[PaymentMethod][id]" value="<?php echo $payment_method['id'] ?>" <?php echo $checked; ?>>
                                                <?php echo $payment_method['name'] ?><br>
                                                <span><?php echo $payment_method['caption'] ?></span>
                                            </p>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-2">
                                            <p class="pull-right"><?php echo $payment_method['fee'] ?></p>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2">
                                        <a href="<?php echo SITE_BASE_URL ?>checkouts/shipping_address" class="btn btn-lg btn-default">
                                            <?php echo MyClass::translate("Back"); ?>
                                        </a>
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10">
                                        <input type="submit" value="<?php echo MyClass::translate("Continue your order"); ?>" class="btn btn-lg btn-primary pull-right">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        &nbsp;
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