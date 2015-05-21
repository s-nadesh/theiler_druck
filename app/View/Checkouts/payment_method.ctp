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
                            <li><a href="<?php echo SITE_BASE_URL ?>checkouts/billing_address"><?php echo __("Billing Address"); ?></a></li>
                            <li><a href="<?php echo SITE_BASE_URL ?>checkouts/shipping_address"><?php echo __("Shipping Address"); ?></a></li>
                            <li class="tab-active"> <?php echo __("Payment Method"); ?> </li>
                            <li> <?php echo __("Summary"); ?> </li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row featured-boxes login">
                    <div class="col-md-12">
                        In-Progress
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>