<?php
$this->Html->addCrumb(MyClass::translate('Products'), array('controller' => 'products', 'action' => 'index', 'admin' => true));
$this->Html->addCrumb(MyClass::translate('Save Product'));

$tab_active1 = "active fade in";
$tab_active2 = "fade";
$tab_nav1 = "active";
$tab_nav2 = "";

if (isset($enable_tab)) {
    $tab_active1 = "fade";
    $tab_active2 = "active fade in";
    $tab_nav1 = "";
    $tab_nav2 = "active";
}
?>

<div class="tabbable page-tabs">
    <ul class="nav nav-tabs">
        <li class="<?php echo $tab_nav1?>">
            <a href="#product" data-toggle="tab"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate('Product'); ?> </a>
        </li>
        <li class="<?php echo $tab_nav2?>">
            <a href="#product-price" data-toggle="tab"><i class="icon-coin"></i> <?php echo MyClass::translate('Product Price Calculation'); ?> </a>
        </li>
    </ul>

    <div class="tab-content">

        <!-- First tab -->
        <div class="tab-pane <?php echo $tab_active1; ?>" id="product">
            <?php
            echo $this->Form->create('Product', array(
                'url' => array('controller' => 'products', 'action' => 'edit', $this->data['Product']['product_id'], 'admin' => true),
                "class" => "form-horizontal form-bordered admin_product_form_edit",
                "role" => "form",
                "enctype" => "multipart/form-data"
            ));
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate('Save Product'); ?></h6>
                    <a href="<?php echo SITE_BASE_URL ?>admin/products" class="btn btn-primary pull-right"><?php echo MyClass::translate('Back'); ?></a>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo MyClass::translate('Product Name'); ?>: <span class="mandatory">*</span></label>
                        <div class="col-sm-10">
                            <?php echo $this->Form->input('product_name', array('class' => 'required form-control', 'label' => false)); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo MyClass::translate('Product Description'); ?>: <span class="mandatory">*</span></label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('product_description', array('type' => 'textarea', 'class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo MyClass::translate('Aditional Information'); ?>: </label>
                        <div class="col-sm-10">
                            <?php echo $this->Form->input('product_additional_info', array('type' => 'textarea', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo MyClass::translate('Product SKU'); ?>: <span class="mandatory">*</span></label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('product_sku', array('class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo MyClass::translate('Product Factor'); ?>: <span class="mandatory">*</span></label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('product_factor', array('type' => 'text', 'class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo MyClass::translate('Product No.Of Pages'); ?>: <span class="mandatory">*</span></label>
                        <div class="col-sm-10">
                            <?php
                            $no_of_pages_json = $this->data['Product']['product_no_of_pages'];
                            $no_of_pages_decode = MyClass::decodeJSON($no_of_pages_json);
                            $no_of_pages = MyClass::arrayToString("|", $no_of_pages_decode);
                            echo $this->Form->input('product_no_of_pages', array('type' => 'textarea', 'class' => 'required form-control', 'label' => false, 'value' => $no_of_pages));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo MyClass::translate('Product No.Of Copies'); ?>: <span class="mandatory">*</span></label>
                        <div class="col-sm-10">
                            <?php
                            $no_of_copies_json = $this->data['Product']['product_no_of_copies'];
                            $no_of_copies_decode = MyClass::decodeJSON($no_of_copies_json);
                            $no_of_copies = MyClass::arrayToString("|", $no_of_copies_decode);
                            echo $this->Form->input('product_no_of_copies', array('type' => 'textarea', 'class' => 'required form-control', 'label' => false, 'value' => $no_of_copies));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo MyClass::translate('Product Image'); ?>:</label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->hidden('product_old_image', array('value' => $this->data['Product']['product_image']));
                            echo $this->Form->input('product_image', array('type' => 'file', 'class' => 'styled', 'label' => false));
                            ?>
                            <div class="col-sm-2">
                                <?php
                                echo $this->Html->image("/" . PRODUCT_IMAGE_FOLDER . $this->data['Product']['product_image'], array('alt' => $this->data['Product']['product_name'], 'class' => 'img-responsive'));
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions text-right">
                        <input type="submit" value="<?php echo MyClass::translate("Save Product"); ?>" class="btn btn-primary">
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>

        <!-- Second tab -->
        <div class="tab-pane <?php echo $tab_active2; ?>" id="product-price">
            <?php
            $product_id = $this->data['Product']['product_id'];
            $pages_array = $no_of_pages_decode;
            $copies_array = $no_of_copies_decode;
            $default_copies = MyClass::getDefaultCoipes();
            echo $this->Form->create('ProductPrice', array(
                "role" => "form",
                'url' => array('controller' => 'product_prices', 'action' => 'update_price_calculation', $product_id, 'admin' => true)
            ));

            $paper_variant1 = $this->requestAction('paper_variants/getPaperVariant/1');
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h6 class="panel-title">
                                <i class="icon-coin"></i> 
                                <?php echo MyClass::translate('Price Calculation'); ?>&nbsp;
                                <?php echo $paper_variant1['PaperVariant']['paper_rang_mgrm'] . ' g/m²'; ?>
                            </h6>
                            <input type="submit" value="<?php echo MyClass::translate("Update Price Calculation"); ?>" class="btn btn-danger pull-right">
                        </div>
                        <?php $paper_variant_id_1 = $paper_variant1['PaperVariant']['paper_id']; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><?php echo MyClass::translate("Pages"); ?></th>
                                        <?php foreach ($default_copies as $default_copy) { ?>
                                            <th><?php echo $default_copy ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pages_array as $page_key => $page_value) { ?>
                                        <tr>
                                            <td><?php echo $page_value ?></td>
                                            <?php
                                            $final_array = array();
                                            foreach ($default_copies as $default_copy_key => $default_copy_value) {
                                                $pp_exists = $this->requestAction('admin/product_prices/get_pp/' . $product_id . '/' . $page_value . '/' . $default_copy_key . '/' . $paper_variant_id_1);
                                                if ($pp_exists) {
                                                    $pp_id = $pp_exists['ProductPrice']['pp_id'];
                                                    $pp_price = $pp_exists['ProductPrice']['pp_price'];
                                                } else {
                                                    $pp_id = '';
                                                    $pp_price = '';
                                                }

                                                $final_array[] = array(
                                                    'pp_id' => $pp_id,
                                                    'product_id' => $product_id,
                                                    'pp_price' => $pp_price,
                                                    'pp_page' => $page_value,
                                                    'pp_copy' => $default_copy_key,
                                                    'paper_variant_id' => $paper_variant_id_1,
                                                );
                                            }
                                            ?>

                                            <?php foreach ($final_array as $final_key => $final) { ?>
                                                <td>
                                                    <input type="hidden" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][pp_id]" value="<?php echo $final['pp_id'] ?>">
                                                    <input type="hidden" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][product_id]" value="<?php echo $final['product_id'] ?>">
                                                    <input type="hidden" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][paper_variant_id]" value="<?php echo $final['paper_variant_id'] ?>">
                                                    <input type="hidden" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][pp_no_of_pages]" value="<?php echo $final['pp_page'] ?>">
                                                    <input type="hidden" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][pp_no_of_copies]" value="<?php echo $final['pp_copy'] ?>">
                                                    <input type="text" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][pp_price]" value="<?php echo $final['pp_price'] ?>">
                                                </td>
                                            <?php } ?>

                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>

            <?php
            echo $this->Form->create('ProductPrice', array(
                "role" => "form",
                'url' => array('controller' => 'product_prices', 'action' => 'update_price_calculation', $product_id, 'admin' => true)
            ));
            $paper_variant2 = $this->requestAction('paper_variants/getPaperVariant/2');
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h6 class="panel-title">
                                <i class="icon-coin"></i> 
                                <?php echo MyClass::translate('Price Calculation'); ?>&nbsp;
                                <?php echo $paper_variant2['PaperVariant']['paper_rang_mgrm'] . ' g/m²'; ?>
                            </h6>
                            <input type="submit" value="<?php echo MyClass::translate("Update Price Calculation"); ?>" class="btn btn-danger pull-right">
                        </div>
                        <?php $paper_variant_id_2 = $paper_variant2['PaperVariant']['paper_id']; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><?php echo MyClass::translate("Pages"); ?></th>
                                        <?php foreach ($default_copies as $default_copy) { ?>
                                            <th><?php echo $default_copy ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pages_array as $page_key => $page_value) { ?>
                                        <tr>
                                            <td><?php echo $page_value ?></td>
                                            <?php
                                            $final_array = array();
                                            foreach ($default_copies as $default_copy_key => $default_copy_value) {
                                                $pp_exists = $this->requestAction('admin/product_prices/get_pp/' . $product_id . '/' . $page_value . '/' . $default_copy_key . '/' . $paper_variant_id_2);
                                                if ($pp_exists) {
                                                    $pp_id = $pp_exists['ProductPrice']['pp_id'];
                                                    $pp_price = $pp_exists['ProductPrice']['pp_price'];
                                                } else {
                                                    $pp_id = '';
                                                    $pp_price = '';
                                                }

                                                $final_array[] = array(
                                                    'pp_id' => $pp_id,
                                                    'product_id' => $product_id,
                                                    'pp_price' => $pp_price,
                                                    'pp_page' => $page_value,
                                                    'pp_copy' => $default_copy_key,
                                                    'paper_variant_id' => $paper_variant_id_2,
                                                );
                                            }
                                            ?>

                                            <?php foreach ($final_array as $final_key => $final) { ?>
                                                <td>
                                                    <input type="hidden" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][pp_id]" value="<?php echo $final['pp_id'] ?>">
                                                    <input type="hidden" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][product_id]" value="<?php echo $final['product_id'] ?>">
                                                    <input type="hidden" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][paper_variant_id]" value="<?php echo $final['paper_variant_id'] ?>">
                                                    <input type="hidden" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][pp_no_of_pages]" value="<?php echo $final['pp_page'] ?>">
                                                    <input type="hidden" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][pp_no_of_copies]" value="<?php echo $final['pp_copy'] ?>">
                                                    <input type="text" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][pp_price]" value="<?php echo $final['pp_price'] ?>">
                                                </td>
                                            <?php } ?>

                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>

    </div>
</div>