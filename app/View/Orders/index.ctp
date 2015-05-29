<?php
$this->Html->addCrumb(__("Orders"));
?>

<div role="main" class="main">
    <?php echo $this->element("breadcrumbs"); ?>
    <div class="container">
        
        <div class="row">
            <div class="col-md-3">
                <?php echo $this->element('my_account_sidebar'); ?>
            </div>
            <div class="col-md-9">
                <?php echo $this->Session->flash(); ?>
                <h2><?php echo __("My Orders"); ?></h2>
                <div class="row">
                    <div class="col-md-12">
                        <section>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-condensed mb-none">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><?php echo __("Order #"); ?></th>
                                                <th><?php echo __("Order Status"); ?></th>
                                                <th class="text-right"><?php echo __("Amount"); ?></th>
                                                <th><?php echo __("Order Date"); ?></th>
                                                <th class="text-center"><?php echo __("Action"); ?></th>
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
                                                        <td><?php echo $order['Order']['order_unique_id']?></td>
                                                        <td>
                                                            <?php echo MyClass::orderStatus($order['Order']['order_status'])?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?php echo MyClass::currencyFormat($order['Order']['order_final_amount'])?>
                                                        </td>
                                                        <td>
                                                            <?php echo date(PHP_DATE_FORMAT, strtotime($order['Order']['created'])) ; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="<?php echo SITE_BASE_URL?>orders/view/<?php echo $order['Order']['order_unique_id']?>">
                                                                <i class="icon icon-search-plus"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } else { ?>
                                                    <tr>
                                                        <td colspan="6"><?php echo __("No records found")?></td>
                                                    </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>