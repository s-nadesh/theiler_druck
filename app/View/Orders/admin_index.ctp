<?php $this->Html->addCrumb(MyClass::translate("Orders")); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-file6"></i> <?php echo MyClass::translate("Manage Orders"); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo MyClass::translate("Order ID"); ?></th>
                    <th><?php echo MyClass::translate("User Name"); ?></th>
                    <th><?php echo MyClass::translate("Amount"); ?></th>
                    <th><?php echo MyClass::translate("Status") ?></th>
                    <th><?php echo MyClass::translate("Created") ?></th>
                    <th><?php echo MyClass::translate("Action") ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)) { ?>
                    <?php
                    $i = 1;
                    foreach ($orders as $order) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $order['Order']['order_unique_id'] ?></td>
                            <td>
                                <?php
                                $user = $this->requestAction('users/get_user/' . $order['Order']['user_id']);
                                echo $user['User']['user_name']
                                ?>
                            </td>
                            <td><?php echo MyClass::currencyFormat($order['Order']['order_final_amount']) ?></td>
                            <td><?php echo MyClass::orderStatus($order['Order']['order_status']) ?> </td>
                            <td><?php echo $order['Order']['created'] ?></td>
                            <td>
                                <div class="table-controls">
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/orders/view/<?php echo $order['Order']['order_id']; ?>" data-original-title="<?php echo MyClass::translate("View"); ?>">
                                        <i class="icon-zoom-in"></i>
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