<?php $this->Html->addCrumb(MyClass::translate('Shipping Costs')); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-coin"></i> <?php echo MyClass::translate('Manage Shipping Costs'); ?></h6>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo MyClass::translate('Taget ZIP'); ?></th>
                    <th><?php echo MyClass::translate('Basic Price'); ?></th>
                    <th><?php echo MyClass::translate('Additional Price'); ?></th>
                    <th><?php echo MyClass::translate('Action'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($shipping_costs)) { ?>
                    <?php
                    $i = 1;
                    foreach ($shipping_costs as $shipping_cost) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $shipping_cost['ShippingCost']['target_zip_code'] ?></td>
                            <td><?php echo $shipping_cost['ShippingCost']['sh_cost_basic_weight_price'] ?></td>
                            <td><?php echo $shipping_cost['ShippingCost']['sh_cost_additional_weight_price'] ?></td>
                            <td>
                                <div class="table-controls">
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/shipping_costs/edit/<?php echo $shipping_cost['ShippingCost']['sh_cost_id']; ?>" data-original-title="<?php echo MyClass::translate("Save"); ?>">
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