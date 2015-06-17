<?php
$this->Html->addCrumb(MyClass::translate("Orders"), array('controller' => 'orders', 'action' => 'index', 'admin' => true));
$this->Html->addCrumb(MyClass::translate("View Order"));

$user = $this->requestAction('users/get_user/' . $order['Order']['user_id']);
$billing_address = MyClass::decodeJSON($order['Order']['order_billing_address']);
$shipping_address = MyClass::decodeJSON($order['Order']['order_shipping_address']);
$payment_method = MyClass::decodeJSON($order['Order']['order_payment_method']);
$summary = MyClass::decodeJSON($order['Order']['order_summary']);

$billing_address_name = $billing_address->address_title . ' ' . $billing_address->address_firstname . ' ' . $billing_address->address_lastname;
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
    $shipping_address_name = $shipping_address->address_title . ' ' . $shipping_address->address_firstname . ' ' . $shipping_address->address_lastname;
    $shipping_address_street = $shipping_address->address_street;
    $shipping_address_additional = $shipping_address->address_additional;
    $shipping_address_city = $shipping_address->address_post_code . ' ' . $shipping_address->address_city;
    $shipping_address_country = $shipping_address->address_country;
    $shipping_address_phone = $shipping_address->address_phone;
    $shipping_address_mobile = $shipping_address->address_mobile;
}
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-coin"></i> <?php echo MyClass::translate("View Order"); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/orders" class="btn btn-primary pull-right"><?php echo MyClass::translate('Back'); ?></a>
    </div>

    <div class="panel-body">
        <div class="row invoice-header">
            <div class="col-sm-6">
                <h3><?php echo $user['User']['user_name'] ?></h3>
                <span><?php echo $user['User']['user_email'] ?></span>
            </div>
            <?php echo $this->Form->create('Order', array('id' => 'order_status_update')); ?>
            <div class="col-sm-6">
                <ul class="invoice-details">
                    <li><?php echo MyClass::translate("Order #"); ?><strong class="text-danger"><?php echo $order['Order']['order_unique_id'] ?></strong></li>
                    <li><?php echo MyClass::translate("Date of Order"); ?>: <strong><?php echo $order['Order']['created'] ?></strong></li>
                    <li>
                        <?php echo MyClass::translate("Order Status"); ?>: 
                        <?php $order_status = MyClass::orderStatus(); ?>
                        <strong>
                            <select name="data[Order][order_status]" onchange="orderStatusUpdate()">
                                <?php
                                foreach ($order_status as $status_key => $status) {
                                    $status_selected = '';
                                    if ($status_key == $order['Order']['order_status'])
                                        $status_selected = 'selected = "selected"';
                                    ?>
                                    <option value="<?php echo $status_key; ?>" <?php echo $status_selected; ?>><?php echo $status; ?></option>
                                <?php } ?>
                            </select>
                        </strong>
                        <input type="hidden" value="<?php echo $order['Order']['order_id'] ?>" name="data[Order][order_id]">
                    </li>
                </ul>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <h6><?php echo MyClass::translate("Billing Address"); ?>:</h6>
                <ul>
                    <li> <?php echo $billing_address_name; ?> </li>
                    <li> <?php echo $billing_address_street; ?> </li>
                    <?php if ($billing_address_additional) { ?>
                        <li><?php echo $billing_address_additional; ?></li>
                    <?php } ?>

                    <li><?php echo $billing_address_city; ?></li>
                    <li><?php echo $billing_address_country; ?></li>
                    <li><?php echo $billing_address_phone; ?></li>
                    <?php if ($billing_address_mobile) { ?>
                        <li><?php echo $billing_address_mobile; ?></li>
                    <?php } ?>
                </ul>
            </div>

            <div class="col-sm-6">
                <h6><?php echo MyClass::translate("Shipping Address"); ?>:</h6>
                <ul>
                    <li> <?php echo $shipping_address_name; ?> </li>
                    <li> <?php echo $shipping_address_street; ?> </li>
                    <?php if ($shipping_address_additional) { ?>
                        <li><?php echo $shipping_address_additional; ?></li>
                    <?php } ?>

                    <li><?php echo $shipping_address_city; ?></li>
                    <li><?php echo $shipping_address_country; ?></li>
                    <li><?php echo $shipping_address_phone; ?></li>
                    <?php if ($shipping_address_mobile) { ?>
                        <li><?php echo $shipping_address_mobile; ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th><?php echo MyClass::translate("Product"); ?></th>
                    <th><?php echo MyClass::translate("Pictures"); ?></th>
                    <th><?php echo MyClass::translate("Price"); ?></th>
                    <th><?php echo MyClass::translate("Quantity"); ?></th>
                    <th><?php echo MyClass::translate("Total"); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order['OrderItem'] as $order_item) { ?>
                    <?php $order_item_detail = MyClass::decodeJSON($order_item['order_item_product_value']); ?>
                    <tr>
                        <td>
                            <b><?php echo $order_item_detail->product_name; ?></b><br>
                            <?php echo MyClass::translate("No of Pages"); ?> : <?php echo $order_item_detail->item_product_no_of_pages; ?><br>
                            <?php echo MyClass::translate("No of Coipes"); ?> : <?php echo $order_item_detail->item_product_no_of_copies; ?><br>
                            <?php
                            echo MyClass::translate("Paper") . ' : ';
                            $paper_detail = $this->requestAction('paper_variants/getPaperVariant/' . $order_item_detail->paper_id);
                            echo $paper_detail['PaperVariant']['paper_rang_grm'];

                            if ($order['Order']['order_good_for_print_on_paper'] > 0 ||
                                    $order['Order']['order_express_within_4_days'] > 0) {
                                echo '<br><b>Additional Services:</b><br>';
                            }
                            if ($order['Order']['order_good_for_print_on_paper'] > 0)
                                echo MyClass::translate("Good For Print On Paper") . '<br>';
                            if ($order['Order']['order_express_within_4_days'] > 0)
                                echo MyClass::translate("Express Within 4 Days");
                            ?>
                            <br>
                        </td>
                        <td>
                            <div class="row admin_order_view">
                                <?php if (!empty($order_item_detail->item_picture_upload)) { ?>
                                    <?php
                                    $i = 1;
                                    foreach ($order_item_detail->item_picture_upload as $orderfile) {
                                        ?>
                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <?php
                                            $is_image = MyClass::is_image(WWW_ROOT . ORDER_FILE_FOLDER . $orderfile);
                                            if ($is_image) {
                                                echo $this->Html->link($this->Html->image('/' . ORDER_FILE_FOLDER . $orderfile, array('class' => 'img-responsive')), array('controller' => 'orders', 'action' => 'fileDownload', $orderfile, 'admin' => false), array('escape' => false));
                                            } else {
                                                echo $this->Html->link($this->Html->image('preview_not_available.jpg', array('class' => 'img-responsive')), array('controller' => 'orders', 'action' => 'fileDownload', $orderfile, 'admin' => false), array('escape' => false));
                                            }
                                            ?>
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
                        <td><?php echo MyClass::currencyFormat($order_item_detail->item_price); ?></td>
                        <td><?php echo $order_item_detail->item_quantity; ?></td>
                        <td><strong><?php echo MyClass::currencyFormat($order_item_detail->item_sub_price); ?></strong></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="panel-body">
        <div class="row invoice-payment">
            <div class="col-sm-8">
                <h6><?php echo MyClass::translate("Payment Method"); ?>:</h6>
                <?php echo $payment_method->name; ?>
            </div>

            <div class="col-sm-4">
                <h6>
                    <?php echo MyClass::translate("Total"); ?>: 
                    <span class="text-danger">
                        <?php echo MyClass::currencyFormat($order['Order']['order_final_amount']); ?>
                    </span>
                </h6>
                <table class="table">
                    <tbody>
                        <tr>
                            <td><?php echo MyClass::translate("Shipping Cost"); ?>:</td>
                            <td class="text-right"><?php echo MyClass::currencyFormat($order['Order']['order_shipping_cost']); ?></td>
                        </tr>
                        <?php
                        $additional_services = $order['Order']['order_good_for_print_on_paper'] + $order['Order']['order_express_within_4_days'];
                        if ($additional_services > 0) {
                            ?>
                            <tr>
                                <td><?php echo MyClass::translate("Additional Services"); ?>:</td>
                                <td class="text-right"><?php echo MyClass::currencyFormat($additional_services); ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td>
                                <?php echo MyClass::translate("Total Net") ?>:<br>
                                <?php echo MyClass::translate("incl. 8% VAT.") ?>:
                            </td>
                            <td class="text-right">
                                <?php echo MyClass::currencyFormat($order['Order']['order_total_net']); ?><br>
                                <?php echo MyClass::currencyFormat($order['Order']['order_tax']); ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo MyClass::translate("Total Gross"); ?>:</th>
                            <td class="text-right">
                                <h6><?php echo MyClass::currencyFormat($order['Order']['order_total_gross']); ?></h6>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <?php if ($summary->comment) { ?>
            <h6><?php echo MyClass::translate("Comments"); ?>:</h6>
            <?php echo $summary->comment; ?>
        <?php } ?>

    </div>
</div>   

<script type="text/javascript">
    function orderStatusUpdate() {
        $.ajax({
            url: "<?php echo SITE_BASE_URL ?>admin/orders/update_status",
            type: "POST",
            data: $("#order_status_update").serialize(),
            success: function(result) {
                alert(result);
            }
        });
    }
</script>