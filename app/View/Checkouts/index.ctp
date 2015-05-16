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
                    <li> <?php echo __("Billing Address"); ?> </li>  
                    <li> <?php echo __("Shipping Address"); ?> </li>   
                    <li> <?php echo __("Mode of Shipment"); ?> </li>  
                    <li> <?php echo __("Payment Method"); ?> </li>  
                    <li> <?php echo __("Summary"); ?> </li>  
                </ul>
                <div class="billing-address-part1"> 
                    <?php echo $this->Session->flash(); ?>
                    <legend> <?php echo __("Create new customer account"); ?> </legend>
                    <a class="btn btn-lg btn-primary create-accbtn" href="<?php echo SITE_BASE_URL?>checkouts/register"> 
                        <?php echo __("Create new customer account"); ?>  
                    </a> <br>
                    <p> <?php echo __("You are a new customer and want to create and account with us."); ?> </p>
                    
                    <legend> <?php echo __("Login for registered customers"); ?> </legend>
                    <?php echo $this->Form->create('User'); ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-4">
                            <label> <?php echo __("Email"); ?> *</label>
                            <?php echo $this->Form->input('user_email', array('label'=>false, "class"=>"form-control")); ?>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-4">
                            <label><?php echo __("Password"); ?> *</label>
                            <?php echo $this->Form->password('user_password', array('label'=>false, "class"=>"form-control")); ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-2 col-md-1">
                            <input type="submit" class="btn btn-primary push-bottom " value="<?php echo __('Login'); ?>">
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>