<?php
echo $this->Html->css(array('theme-blog'), array('inline' => false));
$this->Html->addCrumb(MyClass::translate("View Order"));

$billing_address = MyClass::decodeJSON($order['Order']['order_billing_address']);
$shipping_address = MyClass::decodeJSON($order['Order']['order_shipping_address']);
$payment_method = MyClass::decodeJSON($order['Order']['order_payment_method']);
$summary = MyClass::decodeJSON($order['Order']['order_summary']);

$billing_address_name = MyClass::translate($billing_address->address_title) . ' ' . $billing_address->address_firstname . ' ' . $billing_address->address_lastname;
$billing_address_street = $billing_address->address_street;
$billing_address_additional = $billing_address->address_additional;
$billing_address_city = $billing_address->address_post_code . ' ' . $billing_address->address_city;
$billing_address_country = $billing_address->address_country;
$billing_address_phone = $billing_address->address_phone;
$billing_address_mobile = $billing_address->address_mobile;

if ($shipping_address->identical == 1) {
    $shipping_address_name = $billing_address_name;
    $shipping_address_street = $billing_address_street;
    $shipping_address_additional = $billing_address_additional;
    $shipping_address_city = $billing_address_city;
    $shipping_address_country = $billing_address_country;
    $shipping_address_phone = $billing_address_phone;
    $shipping_address_mobile = $billing_address_mobile;
} else {
    $shipping_address_name = MyClass::translate($shipping_address->address_title) . ' ' . $shipping_address->address_firstname . ' ' . $shipping_address->address_lastname;
    $shipping_address_street = $shipping_address->address_street;
    $shipping_address_additional = $shipping_address->address_additional;
    $shipping_address_city = $shipping_address->address_post_code . ' ' . $shipping_address->address_city;
    $shipping_address_country = $shipping_address->address_country;
    $shipping_address_phone = $shipping_address->address_phone;
    $shipping_address_mobile = $shipping_address->address_mobile;
}
?>

<div role="main" class="main shop">
    <?php echo $this->element("breadcrumbs"); ?>
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <?php echo $this->element('my_account_sidebar'); ?>
            </div>
            <div class="col-md-9">
                <?php echo $this->Session->flash(); ?>
                <h2><?php echo MyClass::translate("View Order"); ?></h2>

                <div class="row">
                    <div class="col-md-12">
                        <div class="featured-box featured-box-secundary default info-content">
                            <div class="box-content">
                                <legend> <?php echo MyClass::translate("Order Details"); ?></legend> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="address">
                                            <strong><?php echo MyClass::translate("Order #"); ?>: </strong>  
                                            <?php echo $order['Order']['order_unique_id']; ?><br>
                                            <strong><?php echo MyClass::translate("Order Date"); ?>: </strong> 
                                            <?php echo date(PHP_DATE_FORMAT, strtotime($order['Order']['created'])); ?><br>
                                            <strong><?php echo MyClass::translate("Order Status"); ?>: </strong> 
                                            <?php echo MyClass::orderStatus($order['Order']['order_status']); ?><br>
                                            <span class="summary_total_gross"><?php echo MyClass::translate("Total Amount"); ?>:
                                                <?php echo MyClass::currencyFormat($order['Order']['order_final_amount']); ?> </span><br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="featured-box featured-box-secundary default info-content">
                                    <div class="box-content">
                                        <legend> <?php echo MyClass::translate("Billing Address"); ?></legend> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="address">
                                                    <strong><?php echo MyClass::translate("Name"); ?>: </strong>  <?php echo $billing_address_name; ?><br>
                                                    <strong><?php echo MyClass::translate("Street/No"); ?>: </strong> <?php echo $billing_address_street; ?><br>
                                                    <strong><?php echo MyClass::translate("City"); ?>: </strong> <?php echo $billing_address_city; ?><br>
                                                    <strong><?php echo MyClass::translate("Country"); ?>: </strong> <?php echo $shipping_address_country; ?><br>
                                                    <strong><?php echo MyClass::translate("Phone"); ?>: </strong> <?php echo $billing_address_phone; ?><br>
                                                    <?php if ($billing_address_mobile) { ?>
                                                        <strong><?php echo MyClass::translate("Mobile"); ?>: </strong> <?php echo $billing_address_mobile; ?><br>
                                                    <?php } ?>
                                                </p>
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
                                                    <strong><?php echo MyClass::translate("Name"); ?>: </strong>  <?php echo $shipping_address_name; ?><br>
                                                    <strong><?php echo MyClass::translate("Street/No"); ?>: </strong> <?php echo $shipping_address_street; ?><br>
                                                    <strong><?php echo MyClass::translate("City"); ?>: </strong> <?php echo $shipping_address_city; ?><br>
                                                    <strong><?php echo MyClass::translate("Country"); ?>: </strong> <?php echo $shipping_address_country; ?><br>
                                                    <strong><?php echo MyClass::translate("Phone"); ?>: </strong> <?php echo $shipping_address_phone; ?><br>
                                                    <?php if ($shipping_address_mobile) { ?>
                                                        <strong><?php echo MyClass::translate("Mobile"); ?>: </strong> <?php echo $shipping_address_mobile; ?><br>
                                                    <?php } ?>
                                                </p>
                                            </div>
                                        </div>
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
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <p>
                                            <b><?php echo $payment_method->name; ?></b> <br>
                                            <span><?php echo $payment_method->caption; ?></span>
                                        </p>
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
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <legend>  
                                            <?php echo MyClass::translate("Order Items"); ?> 
                                        </legend>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <table cellspacing="0" class="table shop_table cart">
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail"> &nbsp; </th>
                                                    <th class="product-name "> <?php echo MyClass::translate("Product"); ?> </th>
                                                    <th class="product-name "> <?php echo MyClass::translate("Pictures"); ?> </th>
                                                    <th class="product-price center"> <?php echo MyClass::translate("Price"); ?> </th>
                                                    <th class="product-quantity center"> <?php echo MyClass::translate("Quantity"); ?> </th>
                                                    <th class="product-subtotal center" align='right'> <?php echo MyClass::translate("Total"); ?> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($order['OrderItem'] as $key => $value) {
                                                    $order_item = MyClass::decodeJSON($value['order_item_product_value']);
                                                    $paper_variant = $this->requestAction('paper_variants/getPaperVariant/' . $order_item->paper_id);
                                                    ?>
                                                    <tr class="cart_table_item">
                                                        <td class="product-thumbnail">
                                                            <?php echo $this->Html->image('/' . PRODUCT_IMAGE_RESIZE_FOLDER . $order_item->product_image, array("class" => "img-responsive")); ?>
                                                        </td>

                                                        <td class="product-name">
                                                            <?php echo $order_item->product_name; ?>
                                                            <div class="hidden-xs hidden-sm hidden-md">
                                                                <?php
                                                                echo '<br>';
                                                                echo MyClass::translate("No.of Pages") . ": " . $order_item->item_product_no_of_pages . '<br>';
                                                                echo MyClass::translate("No.of Copies") . ": " . $order_item->item_product_no_of_copies . '<br>';
                                                                echo MyClass::translate("Paper Weight") . ": " . $paper_variant['PaperVariant']['paper_rang_grm'] . '<br>';
                                                                if ($order['Order']['order_good_for_print_on_paper'] > 0 ||
                                                                        $order['Order']['order_express_within_4_days'] > 0) {
                                                                    echo '<b>Additional Services:</b><br>';
                                                                }
                                                                if ($order['Order']['order_good_for_print_on_paper'] > 0)
                                                                    echo MyClass::translate("Good For Print On Paper") . '<br>';
                                                                if ($order['Order']['order_express_within_4_days'] > 0)
                                                                    echo MyClass::translate("Express Within 4 Days");
                                                                ?>
                                                            </div> 
                                                        </td>

                                                        <td class="product-picture">
                                                            <div class="row">
                                                                <?php if (!empty($order_item->item_picture_upload)) { ?>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($order_item->item_picture_upload as $orderfile) {
                                                                        ?>
                                                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                                                            <?php
                                                                            $is_image = MyClass::is_image(WWW_ROOT . ORDER_FILE_FOLDER . $orderfile);
                                                                            if ($is_image) {
                                                                                echo $this->Html->link($this->Html->image('/' . ORDER_FILE_FOLDER . $orderfile, array('class' => 'img-responsive')), array('controller' => 'orders', 'action' => 'fileDownload', $orderfile), array('escape' => false));
                                                                            } else {
                                                                                echo $this->Html->link($this->Html->image('preview_not_available.jpg', array('class' => 'img-responsive')), array('controller' => 'orders', 'action' => 'fileDownload', $orderfile), array('escape' => false));
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                        <?php
                                                                        if ($i / 3 == 1)
                                                                            echo '</div><div class="clearfix"></div><div class="row">';
                                                                        $i++;
                                                                    }
                                                                    ?>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <a href="<?php echo SITE_BASE_URL ?>orders/update_picture_upload/<?php echo $order['Order']['order_unique_id'] ?>/<?php echo $value['order_item_id'] ?>"> <?php echo MyClass::translate("Update pictures"); ?>  </a>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="product-price center">
                                                            <span class="amount"><?php echo MyClass::currencyFormat($order_item->item_price); ?></span>
                                                        </td>

                                                        <td class="product-quantity center">
                                                            <?php echo $order_item->item_quantity; ?>
                                                        </td>

                                                        <td class="product-subtotal center">
                                                            <span class="amount">
                                                                <?php echo MyClass::currencyFormat($order_item->item_sub_price); ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <tr class="summary_shipping_cost">
                                                    <td colspan="5">
                                                        <?php echo MyClass::translate("Shipping Cost"); ?>
                                                    </td>
                                                    <td align='right'>
                                                        <?php echo MyClass::currencyFormat($order['Order']['order_shipping_cost']); ?>
                                                    </td>
                                                </tr>

                                                <?php
                                                $additional_charge = $order['Order']['order_good_for_print_on_paper'] + $order['Order']['order_express_within_4_days'];
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
                                                        <?php echo MyClass::currencyFormat($order['Order']['order_total_net']); ?><br>
                                                        <span class="summary_vat">
                                                            <?php echo MyClass::currencyFormat($order['Order']['order_tax']); ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="summary_shipping_cost">
                                                    <td colspan="5">
                                                        <?php echo MyClass::translate("Total Gross"); ?>
                                                    </td>
                                                    <td align='right'>
                                                        <?php echo MyClass::currencyFormat($order['Order']['order_total_gross']); ?>
                                                    </td>
                                                </tr>
                                                <tr class="summary_total_gross">
                                                    <td colspan="5">
                                                        <?php echo MyClass::translate("Total Amount"); ?>
                                                    </td>
                                                    <td align='right'>
                                                        <?php echo MyClass::currencyFormat($order['Order']['order_final_amount']); ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>