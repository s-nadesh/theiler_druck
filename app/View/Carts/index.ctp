<?php
echo $this->Html->css(array('theme-shop', 'theme-blog'), array('inline' => false));
$this->Html->addCrumb(__('Cart'));
?>

<div role="main" class="main shop">
    <?php echo $this->element("breadcrumbs"); ?>
    <div class="container">
        <?php echo $this->Session->flash(); ?>
        <div class="row">
            <div class="col-md-12">
                <?php if (!empty($carts)) { ?>
                    <?php
                    $product = $this->requestAction('products/getProduct/' . $carts['product_id']);
                    $paper_variant = $this->requestAction('paper_variants/getPaperVariant/' . $carts['paper_id']);
                    ?>
                    <?php echo $this->Form->create('Cart', array('action' => 'add')); ?>
                    <?php
                    echo $this->Form->hidden('product_id', array('value' => $carts['product_id']));
                    echo $this->Form->hidden('no_of_pages', array('value' => $carts['cart_product_no_of_pages']));
                    echo $this->Form->hidden('no_of_copies', array('value' => $carts['cart_product_no_of_copies']));
                    echo $this->Form->hidden('paper_id', array('value' => $carts['paper_id']));
                    ?>
                    <div class="row featured-boxes">
                        <div class="col-md-12">
                            <div class="featured-box featured-box-secundary featured-box-cart">
                                <div class="box-content">
                                    <table cellspacing="0" class="shop_table cart">
                                        <thead>
                                            <tr>
                                                <th class="product-remove"> &nbsp; </th>
                                                <th class="product-thumbnail"> &nbsp; </th>
                                                <th class="product-name"> <?php echo __("Product"); ?> </th>
                                                <th class="product-price"> <?php echo __("Price"); ?> </th>
                                                <th class="product-quantity"> <?php echo __("Quantity"); ?> </th>
                                                <th class="product-subtotal"> <?php echo __("Total"); ?> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart_table_item">

                                                <td class="product-remove">
                                                    <a title="Remove this item" class="remove" href="<?php echo SITE_BASE_URL ?>carts/remove">
                                                        <i class="icon icon-times"></i>
                                                    </a>
                                                </td>

                                                <td class="product-thumbnail">
                                                    <?php echo $this->Html->image('/' . PRODUCT_IMAGE_RESIZE_FOLDER . $product['Product']['product_image'], array("class" => "img-responsive")); ?>
                                                </td>

                                                <td class="product-name">
                                                    <?php
                                                    echo $this->Html->link($product['Product']['product_name'], array('controller' => 'products', 'action' => 'view', 'slug' => $product['Product']['product_slug'])) . '<br>';
                                                    echo __("No.of Pages") . ": " . $carts['cart_product_no_of_pages'] . '<br>';
                                                    echo __("No.of Copies") . ": " . $carts['cart_product_no_of_copies'] . '<br>';
                                                    echo __("Paper") . ": " . $paper_variant['PaperVariant']['paper_rang_grm'] . '<br>';
                                                    ?>
                                                </td>

                                                <td class="product-price">
                                                    <span class="amount"><?php echo $carts['cart_price'] ?>CHF</span>
                                                </td>

                                                <td class="product-quantity">
                                                    <div class="quantity">
                                                        <?php
                                                        echo $this->Form->input('quantity', array("type" => "number", "class" => "input-text qty text quantity_number", "title" => "Qty", "value" => $carts['cart_quantity'], "min" => "1", "step" => "1", "label" => false));
                                                        ?>
                                                    </div>
                                                </td>

                                                <td class="product-subtotal">
                                                    <span class="amount"><?php echo $carts['cart_total_price'] ?>CHF</span>
                                                </td>
                                            </tr>

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
                                    <h4>Calculate Shipping</h4>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Country</label>
                                                <select class="form-control">
                                                    <option value="">Switzerland</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Zip Code</label>
                                                <?php
                                                $zip_code_list = $this->requestAction('shipping_costs/getZipCodeList');
                                                echo $this->Form->input("sh_cost_id", array("type" => "select", "class" => "form-control", "label" => false, 'options' => $zip_code_list, "default" => $carts['sh_cost_id']));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" value="Update Totals" class="btn btn-default pull-right push-bottom" data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="featured-box featured-box-secundary default">
                                <div class="box-content">
                                    <h4>Cart Totals</h4>
                                    <table cellspacing="0" class="cart-totals">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>
                                                    <strong>Cart Subtotal</strong>
                                                </th>
                                                <td>
                                                    <strong><span class="amount"><?php echo $carts['cart_total_price'] ?>CHF</span></strong>
                                                </td>
                                            </tr>
                                            <tr class="shipping">
                                                <th> Shipping  </th>
                                                <td> <?php echo $carts['shipping_cost'] ?>CHF </td>
                                            </tr>
                                            <tr class="total">
                                                <th>
                                                    <strong>Order Total</strong>
                                                </th>
                                                <td>
                                                    <strong><span class="amount"><?php echo $carts['order_total'] ?>CHF</span></strong>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="actions" colspan="6">
                                                    <div class="actions-continue">
                                                        <input type="submit" value="Update Cart" name="update_cart" class="btn btn-default">
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
                                <input type="submit" value="Proceed to Checkout →" name="proceed" class="btn btn-lg btn-primary">
                            </div>
                        </div>
                    </div>

                <?php } else { ?>

                    <div class="row featured-boxes">
                        <div class="col-md-12">
                            <div class="featured-box featured-box-secundary featured-box-cart">
                                <div class="box-content">
                                    <?php echo __("Your cart is currently empty"); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>