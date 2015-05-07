<?php $this->Html->addCrumb('Shipping Costs'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-table2"></i> <?php echo __('Manage Shipping Costs'); ?></h6>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo __('Taget ZIP'); ?></th>
                    <th><?php echo __('Basic Price'); ?></th>
                    <th><?php echo __('Additional Price'); ?></th>
                    <th><?php echo __('Action'); ?></th>
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
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/shipping_costs/edit/<?php echo $shipping_cost['ShippingCost']['sh_cost_id']; ?>" data-original-title="Edit">
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