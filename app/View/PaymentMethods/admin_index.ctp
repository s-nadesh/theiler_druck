<?php $this->Html->addCrumb(__('Payment Methods')); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate("Manage Payment Methods"); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo MyClass::translate("Name"); ?></th>
                    <th><?php echo MyClass::translate("Caption"); ?></th>
                    <th><?php echo __("Fee"); ?></th>
                    <th><?php echo MyClass::translate("Action"); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php  if (!empty($payment_methods)) { ?>
                    <?php
                    $i = 1;
                    foreach ($payment_methods as $payment_method) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $payment_method['PaymentMethod']['payment_name']; ?></td>
                            <td><?php echo $payment_method['PaymentMethod']['payment_caption']; ?></td>
                            <td><?php echo $payment_method['PaymentMethod']['payment_fee']; ?></td>
                            <td>
                                <div class="table-controls">
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/payment_methods/edit/<?php echo $payment_method['PaymentMethod']['payment_id']; ?>" data-original-title="<?php echo MyClass::translate("View"); ?>">
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