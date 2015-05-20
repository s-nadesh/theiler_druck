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
                    <li> <?php echo __("Payment Method"); ?> </li>  
                    <li> <?php echo __("Summary"); ?> </li>  
                </ul>
                <div class="billing-address-part1"> 
                    <legend> <?php echo __("Shipping Address"); ?> </legend>
                    <?php echo $this->Form->create('ShippingAddress', array('class' => 'checkout-shipping-address')); ?>
                    <div class="row">
                        In-Progress
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