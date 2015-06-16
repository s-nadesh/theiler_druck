<?php
$billing_address = MyClass::decodeJSON($order['Order']['order_billing_address']);
$shipping_address = MyClass::decodeJSON($order['Order']['order_shipping_address']);
$payment_method = MyClass::decodeJSON($order['Order']['order_payment_method']);
$summary = MyClass::decodeJSON($order['Order']['order_summary']);
?>
<style>
    /**** Common Style *****/

    div, dl, dt, dd, ul, li, h1, h2, h3, h4, h5, h6, pre, code, form, fieldset, legend, input, textarea, p, blockquote, th, td {
        margin: 0;
        padding: 0;
    }
    html, body {
        font-size: 14px;
        text-align: left;
        color: #373435;
        font-family: Arial, Helvetica, sans-serif;
        direction: ltr;
        font-weight: normal;
        margin: 0;
        padding: 0px 0 0 0;
        background: #fff;
    }
</style>
<div style="width:900px; padding:10px; margin:0 auto;">
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
                <td width="200">
                    <?php echo $this->Html->image('theilerdrucklogo.png', array('style' => "float: left; height: 60px; background-repeat: no-repeat")); ?>
                </td>
                <td width="200">&nbsp;</td>
                <td valign="middle"> 
                    <?php
                    $contact_address = $this->requestAction(array('controller' => 'contact_addresses', 'action' => 'getContactaddress', 'DF'));
                    ;
                    ?>
                    <?php echo $contact_address['ContactAddress']['cont_addr_company']; ?><br>
                    <?php echo $contact_address['ContactAddress']['cont_addr_address_1']; ?><br>
                    <?php echo $contact_address['ContactAddress']['cont_addr_address_2']; ?><br>
                    Tel. <?php echo $contact_address['ContactAddress']['cont_addr_phone']; ?><br /> 
                    <?php echo MyClass::translate('Fax') ?> <?php echo $contact_address['ContactAddress']['cont_addr_fax']; ?><br /> 
                    <?php echo MyClass::translate('Email') ?> <?php echo $contact_address['ContactAddress']['cont_addr_email']; ?><br /> 
                </td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td align="center" colspan="3">
                    <span style="font-size:18px; font-weight:bold;"><?php echo MyClass::translate('INVOICE') ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="border-top:1px solid #000;">&nbsp;</td>
            </tr>
            <tr>
                <td width="270" valign="top">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                                <td width="90"><?php echo MyClass::translate("Order #"); ?></td>
                                <td width="20">:</td>
                                <td><?php echo $order['Order']['order_unique_id'] ?></td>
                            </tr>
                            <tr>
                                <td><?php echo MyClass::translate("Order Date"); ?></td>
                                <td>:</td>
                                <td><?php echo date(PHP_DATE_FORMAT, strtotime($order['Order']['created'])); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo MyClass::translate("Order Status"); ?></td>
                                <td>:</td>
                                <td><?php echo MyClass::orderStatus($order['Order']['order_status']); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo MyClass::translate("Payment Method"); ?></td>
                                <td>:</td>
                                <td><?php echo $payment_method->name; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo MyClass::translate("Total Amount"); ?></td>
                                <td>:</td>
                                <td><?php echo MyClass::currencyFormat($order['Order']['order_final_amount']); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <?php
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
                <td width="250" valign="top">
                    <strong><?php echo MyClass::translate("Billing Address"); ?></strong> <br>
                    <strong><?php echo MyClass::translate("Name"); ?>: </strong>  <?php echo $billing_address_name; ?> <br>
                    <strong><?php echo MyClass::translate("Street/No"); ?>: </strong> <?php echo $billing_address_street; ?> <br>
                    <strong><?php echo MyClass::translate("City"); ?>: </strong> <?php echo $billing_address_city; ?> <br>
                    <strong><?php echo MyClass::translate("Country"); ?>: </strong> <?php echo $shipping_address_country; ?> <br>
                    <strong><?php echo MyClass::translate("Phone"); ?>: </strong> <?php echo $billing_address_phone; ?> <br>
                    <?php if ($billing_address_mobile) { ?>
                        <strong><?php echo MyClass::translate("Mobile"); ?>: </strong> <?php echo $billing_address_mobile; ?><br>
                    <?php } ?>
                </td>
                <td width="240" valign="top">
                    <strong><?php echo MyClass::translate("Shipping Address"); ?></strong> <br>
                    <strong><?php echo MyClass::translate("Name"); ?>: </strong>  <?php echo $shipping_address_name; ?><br>
                    <strong><?php echo MyClass::translate("Street/No"); ?>: </strong> <?php echo $shipping_address_street; ?><br>
                    <strong><?php echo MyClass::translate("City"); ?>: </strong> <?php echo $shipping_address_city; ?><br>
                    <strong><?php echo MyClass::translate("Country"); ?>: </strong> <?php echo $shipping_address_country; ?><br>
                    <strong><?php echo MyClass::translate("Phone"); ?>: </strong> <?php echo $shipping_address_phone; ?><br>
                    <?php if ($shipping_address_mobile) { ?>
                        <strong><?php echo MyClass::translate("Mobile"); ?>: </strong> <?php echo $shipping_address_mobile; ?><br>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellspacing="0" cellpadding="10" border="0">
        <tbody>
            <tr>
                <td colspan="2" width="200" align="center" style="border:1px solid #000; border-right:0px; padding:5px;"><?php echo MyClass::translate("Product"); ?></td>
                <td align="center" style="border:1px solid #000; border-right:0px; padding:5px;"><?php echo MyClass::translate("Price"); ?></td>
                <td align="center" style="border:1px solid #000; border-right:0px; padding:5px;"> <?php echo MyClass::translate("Quantity"); ?></td>
                <td align="center" style="border:1px solid #000; padding:5px;"><?php echo MyClass::translate("Total"); ?></td>
            </tr>

            <?php
            foreach ($order['OrderItem'] as $key => $value) {
                $order_item = MyClass::decodeJSON($value['order_item_product_value']);
                $paper_variant = $this->requestAction('paper_variants/getPaperVariant/' . $order_item->paper_id);
                ?>
                <tr>
                    <td align="center" style="border:1px solid #000; border-top:0px; border-right:0px; padding:5px;">
                        <?php echo $this->Html->image('/' . PRODUCT_IMAGE_RESIZE_FOLDER . $order_item->product_image, array("style" => "height:80px;")); ?>
                    </td>
                    <td align="center" style="border:1px solid #000; border-right:0px; border-top:0px; border-left: 0px; padding:5px;">
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

                    <td align="center" style="border:1px solid #000; border-right:0px; border-top:0px; padding:5px;">
                        <span class="amount"><?php echo MyClass::currencyFormat($order_item->item_price); ?></span>
                    </td>

                    <td align="center" style="border:1px solid #000; border-right:0px; border-top:0px; padding:5px;">
                        <?php echo $order_item->item_quantity; ?>
                    </td>

                    <td align="center" style="border:1px solid #000; border-top:0px; padding:5px;">
                        <span class="amount">
                            <?php echo MyClass::currencyFormat($order_item->item_sub_price); ?>
                        </span>
                    </td>
                </tr>
            <?php } ?>


            <tr>
                <td colspan="4" align="right" style="border:1px solid #000; border-top:0px; border-right:0px; padding:5px;"><?php echo MyClass::translate("Shipping Cost"); ?></td>
                <td align="center" style="border:1px solid #000; border-top:0px; padding:5px;"><?php echo MyClass::currencyFormat($order['Order']['order_shipping_cost']); ?></td>
            </tr>

            <?php
            $additional_charge = $order['Order']['order_good_for_print_on_paper'] + $order['Order']['order_express_within_4_days'];
            if ($additional_charge > 0) {
                ?>
                <tr>
                    <td colspan="4" align="right" style="border:1px solid #000; border-top:0px; border-right:0px; padding:5px;"><?php echo MyClass::translate("Additional Services"); ?></td>
                    <td align="center" style="border:1px solid #000; border-top:0px; padding:5px;"><?php echo MyClass::currencyFormat($additional_charge) ?></td>
                </tr>
            <?php } ?>

            <tr>
                <td colspan="4" align="right" style="border:1px solid #000; border-top:0px; border-right:0px; padding:5px;"><?php echo MyClass::translate("Total Net"); ?><br /><?php echo MyClass::translate("incl. 8% VAT."); ?></td>
                <td align="center" style="border:1px solid #000; border-top:0px; padding:5px;"><?php echo MyClass::currencyFormat($order['Order']['order_total_net']); ?><br>
                    <span class="summary_vat">
                        <?php echo MyClass::currencyFormat($order['Order']['order_tax']); ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td colspan="4" align="right" style="border:1px solid #000; border-top:0px; border-right:0px; font-size:18px; padding:5px;"><?php echo MyClass::translate("Total Gross"); ?></td>
                <td align="center" style="border:1px solid #000; border-top:0px; padding:5px; font-size:18px;"><?php echo MyClass::currencyFormat($order['Order']['order_total_gross']); ?></td>
            </tr>

        </tbody>
    </table>

    <?php if ($payment_method->id == 2) { ?>
        <div style="margin-top: 10px;">
            <table width="100%" cellspacing="0" cellpadding="10" border="0">
                <tbody>
                    <tr>
                        <td colspan="2" style="border:0;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" colspan="3">
                            <span style="font-size:18px; font-weight:bold;"><?php echo $payment_method->name; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border:0;">&nbsp;</td>
                    </tr>
                    <?php $admin = $this->requestAction(array('controller' => 'admins', 'action' => 'getAdmin')); ?>
                    <tr>
                        <td colspan="2" align="center" style="border:1px solid #000; padding:5px;">
                                <?php echo $payment_method->caption; ?>
                            <br />
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="border:1px solid #000; border-top:0px; border-right:0px; padding:5px;"><?php echo MyClass::translate('Owner Name'); ?></td>
                        <td align="center" style="border:1px solid #000; border-top:0px; padding:5px;"><?php echo $admin['Admin']['admin_owner_name']; ?></td>
                    </tr>
                    <tr>
                        <td  align="center" style="border:1px solid #000; border-top:0px; border-right:0px; padding:5px;"><?php echo MyClass::translate('Bank Name'); ?></td>
                        <td align="center" style="border:1px solid #000; border-top:0px; padding:5px;"><?php echo $admin['Admin']['admin_bank_name']; ?></td>
                    </tr>
                    <tr>
                        <td  align="center" style="border:1px solid #000; border-top:0px; border-right:0px; padding:5px;"><?php echo MyClass::translate('Bank Account Number'); ?></td>
                        <td align="center" style="border:1px solid #000; border-top:0px; padding:5px;"><?php echo $admin['Admin']['admin_bank_account_number']; ?></td>
                    </tr>
                    <tr>
                        <td  align="center" style="border:1px solid #000; border-top:0px; border-right:0px; padding:5px;"><?php echo MyClass::translate('BLZ'); ?></td>
                        <td align="center" style="border:1px solid #000; border-top:0px; padding:5px;"><?php echo $admin['Admin']['admin_blz']; ?></td>
                    </tr>
                    <tr>
                        <td  align="center" style="border:1px solid #000; border-top:0px; border-right:0px; padding:5px;"><?php echo MyClass::translate('BIC'); ?></td>
                        <td align="center" style="border:1px solid #000; border-top:0px; padding:5px;"><?php echo $admin['Admin']['admin_bic']; ?></td>
                    </tr>
                    <tr>
                        <td  align="center" style="border:1px solid #000; border-top:0px; border-right:0px; padding:5px;"><?php echo MyClass::translate('IBAN'); ?></td>
                        <td align="center" style="border:1px solid #000; border-top:0px; padding:5px;"><?php echo $admin['Admin']['admin_iban']; ?></td>
                    </tr>
                    <tr>
                        <td  align="center" style="border:1px solid #000; border-top:0px; border-right:0px; padding:5px;"><?php echo MyClass::translate('Bank Information'); ?></td>
                        <td align="center" style="border:1px solid #000; border-top:0px; padding:5px;"><?php echo $admin['Admin']['admin_bank_information']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>
</div>


