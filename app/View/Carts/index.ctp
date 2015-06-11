<?php
echo $this->Html->css(array('theme-blog'), array('inline' => false));
$this->Html->addCrumb(MyClass::translate('Cart'));
?>

<div role="main" class="main shop">
    <?php echo $this->element("breadcrumbs"); ?>
    <div class="container">
        <?php echo $this->Session->flash(); ?>
        <div class="row">
            <div class="col-md-12">
                <?php if ($this->Session->check('Shop')) { ?>
                    <?php echo $this->Form->create('Cart', array('action' => 'update')); ?>
                    <div class="row featured-boxes">
                        <div class="col-md-12">
                            <div class="featured-box featured-box-secundary featured-box-cart">
                                <div class="box-content table-responsive">
                                    <table cellspacing="0" class="table shop_table cart">
                                        <thead>
                                            <tr>
                                                <th class="product-remove"> &nbsp; </th>
                                                <th class="product-thumbnail"> &nbsp; </th>
                                                <th class="product-name"> <?php echo MyClass::translate("Product"); ?> </th>
                                                <th class="product-picture"> <?php echo __("Pictures"); ?> </th>
                                                <th class="product-price center"> <?php echo MyClass::translate("Price"); ?> </th>
                                                <th class="product-quantity center"> <?php echo MyClass::translate("Quantity"); ?> </th>
                                                <th class="product-subtotal center"> <?php echo MyClass::translate("Total"); ?> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $shop = $this->Session->read('Shop');
                                            foreach ($shop['CartItems'] as $key => $value) {
                                                $product = $this->requestAction('products/getProduct/' . $value['product_id']);
                                                $paper_variant = $this->requestAction('paper_variants/getPaperVariant/' . $value['paper_id']);
                                                $key_encrypt = MyClass::refencryption($key);
                                                echo $this->Form->hidden('CartItems.' . $key . '.product_id', array('value' => $value['product_id']));
                                                echo $this->Form->hidden('CartItems.' . $key . '.no_of_pages', array('value' => $value['item_product_no_of_pages']));
                                                echo $this->Form->hidden('CartItems.' . $key . '.no_of_copies', array('value' => $value['item_product_no_of_copies']));
                                                echo $this->Form->hidden('CartItems.' . $key . '.paper_id', array('value' => $value['paper_id']));
                                                ?>
                                                <tr class="cart_table_item">

                                                    <td class="product-remove">
                                                        <a title="<?php echo MyClass::translate("Remove this item"); ?>" class="remove" href="<?php echo SITE_BASE_URL ?>carts/remove/<?php echo $key_encrypt ?>">
                                                            <i class="icon icon-times"></i>
                                                        </a>
                                                    </td>

                                                    <td class="product-thumbnail">
                                                        <?php echo $this->Html->image('/' . PRODUCT_IMAGE_RESIZE_FOLDER . $product['Product']['product_image'], array("class" => "img-responsive")); ?>
                                                    </td>

                                                    <td class="product-name">
                                                        <?php
                                                        echo $this->Html->link($product['Product']['product_name'], array('controller' => 'products', 'action' => 'view', $product['Product']['product_slug'], $key_encrypt));
                                                        ?>
                                                        <div class="hidden-xs hidden-sm hidden-md">
                                                            <?php
                                                            echo '<br>';
                                                            echo MyClass::translate("No.of Pages") . ": " . $value['item_product_no_of_pages'] . '<br>';
                                                            echo MyClass::translate("No.of Copies") . ": " . $value['item_product_no_of_copies'] . '<br>';
                                                            echo MyClass::translate("Paper Weight") . ": " . $paper_variant['PaperVariant']['paper_rang_grm'] . '<br>';
                                                            if ($shop['Additional']['good_for_print_on_paper'] > 0 ||
                                                                    $shop['Additional']['express_within_4_days'] > 0) {
                                                                echo '<b>' . MyClass::translate("Additional Services") . ':</b><br>';
                                                                if ($shop['Additional']['good_for_print_on_paper'] > 0)
                                                                    echo MyClass::translate("Good For Print On Paper") . '<br>';
                                                                if ($shop['Additional']['express_within_4_days'] > 0)
                                                                    echo MyClass::translate("Express Within 4 Days");
                                                            }
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
                                                        <span class="amount"><?php echo MyClass::currencyFormat($value['item_price']) ?></span>
                                                    </td>

                                                    <td class="product-quantity center">
                                                        <div class="quantity">
                                                            <?php
                                                            echo $this->Form->input('CartItems.' . $key . '.quantity', array("type" => "number", "class" => "input-text qty text quantity_number", "title" => "Qty", "value" => $value['item_quantity'], "min" => "1", "step" => "1", "label" => false));
                                                            ?>
                                                        </div>
                                                    </td>

                                                    <td class="product-subtotal center">
                                                        <span class="amount"><?php echo MyClass::currencyFormat($value['item_sub_price']) ?></span>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row featured-boxes cart">
                        <div class="col-md-6">
                            <div class="featured-box featured-box-secundary default">
                                <div class="box-content">
                                    <h4><?php echo MyClass::translate("Calculate Shipping"); ?></h4>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label><?php echo MyClass::translate("Country"); ?></label>
                                                <select class="form-control">
                                                    <?php $countries = MyClass::getCountries(); ?>
                                                    <?php foreach ($countries as $country) { ?>
                                                        <option value="<?php echo $country ?>"><?php echo $country ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label><?php echo MyClass::translate("Zip Code"); ?></label>
                                                <?php
                                                $zip_code_list = $this->requestAction('shipping_costs/getZipCodeList');
                                                echo $this->Form->input("sh_cost_id", array("type" => "select", "class" => "form-control", "label" => false, 'options' => $zip_code_list, "default" => $shop['Additional']['sh_cost_id']));
                                                echo $this->Form->hidden("good_for_print_on_paper", array('value' => $shop['Additional']['good_for_print_on_paper']));
                                                echo $this->Form->hidden("express_within_4_days", array('value' => $shop['Additional']['express_within_4_days']));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" value="<?php echo MyClass::translate("Update Totals"); ?>" class="btn btn-default pull-right push-bottom">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="featured-box featured-box-secundary default">
                                <div class="box-content">
                                    <h4><?php echo MyClass::translate("Cart Totals"); ?></h4>
                                    <table cellspacing="0" class="cart-totals">
                                        <tbody>
                                            <tr class="shipping">
                                                <td> <?php echo MyClass::translate("Shipping Cost"); ?>  </td>
                                                <td align="right"> <?php echo MyClass::currencyFormat($shop['Additional']['shipping_cost']) ?></td>
                                            </tr>

                                            <tr class="cart-subtotal">
                                                <td>
                                                    <?php echo MyClass::translate("Total Net"); ?><br>
                                                    <?php echo MyClass::translate("incl. 8% VAT."); ?>
                                                </td>
                                                <td align="right">
                                                    <span class="amount">
                                                        <?php echo MyClass::currencyFormat($shop['Additional']['cart_sub_price_without_tax']) ?><br>
                                                        <?php echo MyClass::currencyFormat($shop['Additional']['cart_tax']) ?>
                                                    </span>
                                                </td>
                                            </tr>

                                            <?php
                                            $additional_charge = $shop['Additional']['good_for_print_on_paper'] + $shop['Additional']['express_within_4_days'];
                                            if ($additional_charge > 0) {
                                                ?>
                                                <tr class="shipping">
                                                    <td> <?php echo MyClass::translate("Additional Services"); ?> </td>
                                                    <td align="right"> <?php echo MyClass::currencyFormat($additional_charge) ?> </td>
                                                </tr>
                                            <?php } ?>

                                            <tr class="total">
                                                <th>
                                                    <strong><?php echo MyClass::translate("Total Gross"); ?></strong>
                                                </th>
                                                <td align="right">
                                                    <strong>
                                                        <span class="amount">
                                                            <?php echo MyClass::currencyFormat($shop['Additional']['cart_sub_price_with_tax']) ?>
                                                        </span>
                                                    </strong>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="actions" colspan="6">
                                                    <div class="actions-continue">
                                                        <input type="submit" value="<?php echo MyClass::translate("Update Cart"); ?>" name="update_cart" class="btn btn-default">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>

                    <div class="row featured-boxes">
                        <div class="col-md-12">
                            <div class="actions-continue">
                                <a href="<?php echo SITE_BASE_URL ?>checkouts" class="btn btn-lg btn-primary">
                                    <?php echo MyClass::translate("Proceed to Checkout"); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row featured-boxes">
                        <div class="col-md-12">
                            <div class="featured-box featured-box-secundary featured-box-cart">
                                <div class="box-content">
                                    <?php echo MyClass::translate("Your cart is currently empty"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>