<?php
echo $this->Html->css(array('theme-blog'), array('inline' => false));

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

$payment_method = $this->Session->read('Shop.Order.PaymentMethod');
?>
<div role="main" class="main shop">
    <div class="container">
        <hr class="short">
        <?php echo $this->Session->flash(); ?>
        <div class="row featured-boxes login">
            <div class="col-md-12 chekout-step">

                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li><a href="<?php echo SITE_BASE_URL ?>checkouts/billing_address"><?php echo MyClass::translate("Billing Address"); ?></a></li>
                            <li><a href="<?php echo SITE_BASE_URL ?>checkouts/shipping_address"><?php echo MyClass::translate("Shipping Address"); ?></a></li>
                            <li><a href="<?php echo SITE_BASE_URL ?>checkouts/payment_method"><?php echo MyClass::translate("Payment Method"); ?></a></li>
                            <li class="tab-active"> <?php echo MyClass::translate("Summary"); ?> </li>
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
                                        <a href="<?php echo SITE_BASE_URL ?>checkouts/shipping_address" class="btn btn-lg btn-primary pull-right">
                                            <?php echo MyClass::translate("Shipping Address Change"); ?>
                                        </a>
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
                            <div class="box-content payment_methods">
                                <legend>  <?php echo MyClass::translate("Payment Method"); ?> </legend> 

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-4">
                                                <p>
                                                    <?php echo $payment_method['name']; ?><br>
                                                    <span><?php echo $payment_method['caption'] ?></span>
                                                </p>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <p>
                                                    <?php echo $payment_method['fee']; ?><br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <p class="pull-right">
                                            <a href="<?php echo SITE_BASE_URL ?>checkouts/payment_method" class="btn btn-lg btn-primary">
                                                <?php echo MyClass::translate("Payment method change"); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo $this->Form->create('Summary'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="featured-box featured-box-secundary default info-content">
                            <div class="box-content payment_methods">
                                <legend>  <?php echo MyClass::translate("Comment to the order"); ?> </legend> 
                                <div class="row">
                                    <div class="col-xs-12">
                                        <textarea name="data[Summary][comment]" class="form-control" placeholder="Here you can enter a comment to your order" rows='4'></textarea>
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
                            <div class="box-content table-responsive">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-10">
                                        <legend>  
                                            <?php echo MyClass::translate("Your shopping cart contains the following products"); ?> 
                                        </legend>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-2">
                                        <a href="<?php echo SITE_BASE_URL ?>carts" class="btn btn-lg btn-primary pull-right">
                                            <?php echo MyClass::translate("Edit cart"); ?>
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 ">
                                        <table cellspacing="0" class="table shop_table cart">
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail"> &nbsp; </th>
                                                    <th class="product-name "> <?php echo MyClass::translate("Product"); ?> </th>
                                                    <th class="product-picture"> <?php echo __("Pictures"); ?> </th>
                                                    <th class="product-price center"> <?php echo MyClass::translate("Price"); ?> </th>
                                                    <th class="product-quantity center"> <?php echo MyClass::translate("Quantity"); ?> </th>
                                                    <th class="product-subtotal center" align='right'> <?php echo MyClass::translate("Total"); ?> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $shop = $this->Session->read('Shop');
                                                foreach ($shop['CartItems'] as $key => $value) {
                                                    $product = $this->requestAction('products/getProduct/' . $value['product_id']);
                                                    $paper_variant = $this->requestAction('paper_variants/getPaperVariant/' . $value['paper_id']);
                                                    ?>
                                                    <tr class="cart_table_item">
                                                        <td class="product-thumbnail">
                                                            <?php echo $this->Html->image('/' . PRODUCT_IMAGE_RESIZE_FOLDER . $product['Product']['product_image'], array("class" => "img-responsive")); ?>
                                                        </td>
                                                        <td class="product-name">
                                                            <?php
                                                            echo $this->Html->link($product['Product']['product_name'], array('controller' => 'products', 'action' => 'view', 'slug' => $product['Product']['product_slug']));
                                                            ?>
                                                            <div class="hidden-xs hidden-sm hidden-md">
                                                                <?php
                                                                echo '<br>';
                                                                echo MyClass::translate("No.of Pages") . ": " . $value['item_product_no_of_pages'] . '<br>';
                                                                echo MyClass::translate("No.of Copies") . ": " . $value['item_product_no_of_copies'] . '<br>';
                                                                echo MyClass::translate("Paper Weight") . ": " . $paper_variant['PaperVariant']['paper_rang_grm'] . '<br>';
                                                                if ($shop['Additional']['good_for_print_on_paper'] > 0 ||
                                                                        $shop['Additional']['express_within_4_days'] > 0) {
                                                                    echo '<b>Additional Services:</b><br>';
                                                                }
                                                                if ($shop['Additional']['good_for_print_on_paper'] > 0)
                                                                    echo MyClass::translate("Good For Print On Paper") . '<br>';
                                                                if ($shop['Additional']['express_within_4_days'] > 0)
                                                                    echo MyClass::translate("Express Within 4 Days");
                                                                ?>
                                                            </div> 
                                                        </td>

                                                        <td class="product-picture">
                                                            <div class="row">
                                                                <?php if (!empty($value['item_picture_upload'])) { ?>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($value['item_picture_upload'] as $cartfile) {
                                                                        ?>
                                                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                                                            <?php echo $this->Html->image('/' . CART_FILE_FOLDER . $cartfile, array('class' => 'img-responsive')); ?>
                                                                        </div>
                                                                        <?php
                                                                        if ($i / 4 == 1)
                                                                            echo '</div><div class="clearfix"></div><div class="row">';
                                                                        $i++;
                                                                    }
                                                                    ?>
                                                                <?php } ?>
                                                            </div>
                                                        </td>

                                                        <td class="product-price center">
                                                            <span class="amount"><?php echo MyClass::currencyFormat($value['item_price']); ?></span>
                                                        </td>

                                                        <td class="product-quantity center">
                                                            <?php echo $value['item_quantity']; ?>
                                                        </td>

                                                        <td class="product-subtotal center">
                                                            <span class="amount">
                                                                <?php echo MyClass::currencyFormat($value['item_sub_price']); ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <tr class="summary_shipping_cost">
                                                    <td colspan="5">
                                                        <?php echo MyClass::translate("Shipping Cost"); ?>
                                                    </td>
                                                    <td align='right'>
                                                        <?php echo MyClass::currencyFormat($shop['Additional']['shipping_cost']); ?>
                                                    </td>
                                                </tr>

                                                <?php
                                                $additional_charge = $shop['Additional']['good_for_print_on_paper'] + $shop['Additional']['express_within_4_days'];
                                                if ($additional_charge > 0) {
                                                    ?>
                                                    <tr class="summary_shipping_cost">
                                                        <td colspan="5"> <?php echo MyClass::translate("Additional Services"); ?> </td>
                                                        <td align="right"> <?php echo MyClass::currencyFormat($additional_charge) ?> </td>
                                                    </tr>
                                                <?php } ?>

                                                <tr class="summary_shipping_cost">
                                                    <td colspan="5">
                                                        <?php echo MyClass::translate("Total Net"); ?><br>
                                                        <span class="summary_vat"><?php echo MyClass::translate("incl. 8% VAT."); ?></span>
                                                    </td>
                                                    <td align='right'>
                                                        <?php echo MyClass::currencyFormat($shop['Additional']['cart_sub_price_without_tax']); ?><br>
                                                        <span class="summary_vat">
                                                            <?php echo MyClass::currencyFormat($shop['Additional']['cart_tax']); ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="summary_total_gross">
                                                    <td colspan=5">
                                                        <?php echo MyClass::translate("Total Gross"); ?>
                                                    </td>
                                                    <td align='right'>
                                                        <?php echo MyClass::currencyFormat($shop['Additional']['cart_sub_price_with_tax']); ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <a href="<?php echo SITE_BASE_URL ?>checkouts/payment_method" class="btn btn-lg btn-default">
                                            <?php echo MyClass::translate("Back"); ?>
                                        </a>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <input type="submit" value="<?php echo MyClass::translate("Continue your order"); ?>" class="btn btn-lg btn-primary pull-right">
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
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>