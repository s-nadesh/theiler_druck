<?php $this->Html->addCrumb(MyClass::translate('Products')); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate("Manage Products"); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/products/add" class="btn btn-primary pull-right"><?php echo MyClass::translate("Add Product"); ?></a>
    </div>
    <div class="datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo MyClass::translate("Product Name"); ?></th>
                    <th><?php echo MyClass::translate("Product SKU"); ?></th>
                    <th><?php echo MyClass::translate("Product Factor"); ?></th>
                    <th><?php echo MyClass::translate("Created"); ?></th>
                    <th><?php echo MyClass::translate("Action"); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)) { ?>
                    <?php
                    $i = 1;
                    foreach ($products as $product) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $product['Product']['product_name']; ?></td>
                            <td><?php echo $product['Product']['product_sku']; ?></td>
                            <td><?php echo $product['Product']['product_factor']; ?></td>
                            <td><?php echo $product['Product']['created']; ?></td>
                            <td>
                                <div class="table-controls">
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/products/view/<?php echo $product['Product']['product_id']; ?>" data-original-title="<?php echo MyClass::translate("View"); ?>">
                                        <i class="icon-zoom-in"></i>
                                    </a>
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/products/edit/<?php echo $product['Product']['product_id']; ?>" data-original-title="<?php echo MyClass::translate('Edit'); ?>">
                                        <i class="icon-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>