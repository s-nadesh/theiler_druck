<?php 
$this->Html->addCrumb(MyClass::translate('Products'), array('controller' => 'products', 'action' => 'index', 'admin'=>true));
$this->Html->addCrumb(MyClass::translate('View Product'));
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate('View Product'); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/products" class="btn btn-primary pull-right"><?php echo MyClass::translate('Back'); ?></a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th><?php echo MyClass::translate("Product Name"); ?></th>
                    <td><?php echo $product['Product']['product_name'] ?></td>
                </tr>
                <tr>
                    <th><?php echo MyClass::translate("Product Description"); ?></th>
                    <td><?php echo MyClass::newLineBreak($product['Product']['product_description']) ?></td>
                </tr>
                <tr>
                    <th><?php echo MyClass::translate("Aditional Information"); ?></th>
                    <td><?php echo MyClass::newLineBreak($product['Product']['product_additional_info']) ?></td>
                </tr>
                <tr>
                    <th><?php echo MyClass::translate("Product SKU"); ?></th>
                    <td><?php echo $product['Product']['product_sku'] ?></td>
                </tr>
                <tr>
                    <th><?php echo MyClass::translate("Product Factor"); ?></th>
                    <td><?php echo $product['Product']['product_factor'] ?></td>
                </tr>
                <tr>
                    <th><?php echo MyClass::translate("Product No.of pages"); ?></th>
                    <td>
                        <?php
                        $no_of_pages_json = $product['Product']['product_no_of_pages'];
                        $no_of_pages_decode = MyClass::decodeJSON($no_of_pages_json);
                        $no_of_pages = MyClass::arrayToString("|", $no_of_pages_decode);
                        echo $no_of_pages;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo MyClass::translate("Product No.of copies"); ?></th>
                    <td>
                        <?php
                        $no_of_copies_json = $product['Product']['product_no_of_copies'];
                        $no_of_copies_decode = MyClass::decodeJSON($no_of_copies_json);
                        $no_of_copies = MyClass::arrayToString("|", $no_of_copies_decode);
                        echo $no_of_copies;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo MyClass::translate("Product Image"); ?></th>
                    <td>
                        <div class="col-sm-3">
                            <?php echo $this->Html->image('/'. PRODUCT_IMAGE_FOLDER . $product['Product']['product_image'], array('alt' => $product['Product']['product_name'], 'class' => 'img-responsive')) ?>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>