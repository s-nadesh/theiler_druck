<?php $this->Html->addCrumb(MyClass::translate('Dashboard')); ?>
<!-- Info blocks -->
<?php
$users = ClassRegistry::init('User')->find('all', array('order' => array('User.created DESC')));
$orders = ClassRegistry::init('Order')->find('all', array('order' => array('Order.created DESC')));
$products = ClassRegistry::init('Product')->find('all', array('order' => array('Product.product_name ASC')));
$questions = ClassRegistry::init('ProductQuestion')->find('all', array('order' => array('ProductQuestion.created DESC'), 'limit' => '10'));
?>
<ul class="info-blocks">
    <li class="bg-primary">
        <div class="top-info">
            <?php echo $this->Html->link(MyClass::translate("Users"), array('controller' => 'users', 'action' => 'index')); ?>
            <small><?php echo MyClass::translate("Manage Users"); ?></small>
        </div>
        <a href="#"><i class="icon-users"></i></a>
        <span class="bottom-info bg-danger"><?php echo count($users) ?> <?php echo MyClass::translate('users') ?></span>
    </li>
    <li class="bg-warning">
        <div class="top-info">
            <?php echo $this->Html->link(MyClass::translate('Orders history'), array('controller' => 'orders', 'action' => 'index')); ?>
            <small><?php echo MyClass::translate('Purchases statistics') ?></small>
        </div>
        <a href="#"><i class="icon-cart2"></i></a>
        <span class="bottom-info bg-primary"><?php echo count($orders); ?> <?php echo MyClass::translate('orders') ?></span>
    </li>
    <li class="bg-success">
        <div class="top-info">
            <?php echo $this->Html->link(MyClass::translate("Products"), array('controller' => 'products', 'action' => 'index')); ?>
            <small><?php echo MyClass::translate("Manage Products"); ?></small>
        </div>
        <a href="#"><i class="icon-paragraph-justify2"></i></a>
        <span class="bottom-info bg-primary"><?php echo count($products) ?> <?php echo MyClass::translate('products') ?></span>
    </li>
</ul>
<!-- /info blocks -->
<!-- Page tabs -->
<div class="tabbable page-tabs">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab"><i class="icon-file"></i> <?php echo MyClass::translate('Activity') ?></a></li>
        <li><a href="#contacts" data-toggle="tab"><i class="icon-users"></i> <?php echo MyClass::translate("Latest Users"); ?> </a></li>
        <li><a href="#tasks" data-toggle="tab"><i class="icon-cart2"></i> <?php echo MyClass::translate("Latest Orders"); ?></a></li>
    </ul>
    <div class="tab-content">
        <!-- First tab -->
        <div class="tab-pane active fade in" id="activity">
            <!-- Questions and contact -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Questions -->
                    <h6><i class="icon-question5"></i> <?php echo MyClass::translate('Newest questions') ?></h6>
                    <div class="panel-group block">
                        <?php
                        $i = 1;
                        foreach ($questions as $key => $question) {
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h6 class="panel-title panel-trigger">
                                        <a data-toggle="collapse" href="#question<?php echo $i ?>"><?php echo "{$i}. {$question['ProductQuestion']['question_content']}?" ?></a>
                                    </h6>
                                </div>
                                <div id="question<?php echo $i ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?php $product = $this->requestAction('products/getProduct/' . $question['ProductQuestion']['product_id']); ?>
                                        <p><?php echo MyClass::translate("Name"); ?> : <strong><?php echo $question['ProductQuestion']['question_name'] ?></strong></p>
                                        <p><?php echo MyClass::translate("Email"); ?> : <strong><?php echo $question['ProductQuestion']['question_email'] ?></strong></p>
                                        <p><?php echo MyClass::translate("Product"); ?> : <strong><?php echo $product['Product']['product_name'] ?></strong></p>
                                        <p> 
                                            <?php echo MyClass::translate('Action'); ?>: 
                                            <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/product_questions/edit/<?php echo $question['ProductQuestion']['product_question_id']; ?>" data-original-title="<?php echo MyClass::translate("Add your answer"); ?>">
                                                <i class="icon-pencil"></i>
                                            </a>

                                            <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/product_questions/delete/<?php echo $question['ProductQuestion']['product_question_id']; ?>" data-original-title="<?php echo __("Delete"); ?>" onclick="return confirm('Are you sure you wish to delete?');">
                                                <i class="icon-remove2"></i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>

                    </div>
                </div>

            </div>
            <!-- /questions and contact -->
        </div>
        <!-- /first tab -->
        <!-- Second tab -->
        <div class="tab-pane fade" id="contacts">
            <!-- Contacts -->
            <div class="block">
                <div class="chat-member-heading clearfix">
                    <h6 class="pull-left"><i class="icon-users"></i> <?php echo MyClass::translate("Latest Users"); ?></h6>
                </div>

                <div class="datatable">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo MyClass::translate("User Name"); ?></th>
                                <th><?php echo MyClass::translate("User Email"); ?></th>
                                <th><?php echo MyClass::translate("Status"); ?></th>
                                <th><?php echo MyClass::translate("Created"); ?></th>
                                <th><?php echo MyClass::translate("Action"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($users)) { ?>
                                <?php
                                $i = 1;
                                foreach ($users as $user) {
                                    if ($i == 11)
                                        break;
                                    ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $user['User']['user_name']; ?></td>
                                        <td><?php echo $user['User']['user_email']; ?></td>
                                        <td><?php
                                            if ($user['User']['user_status'] == 1)
                                                echo 'Active';else {
                                                echo 'Inactive';
                                            }
                                            ?></td>
                                        <td><?php echo $user['User']['created']; ?></td>
                                        <td>
                                            <div class="table-controls">
                                                <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/users/view/<?php echo $user['User']['user_id']; ?>" data-original-title="<?php echo MyClass::translate("View"); ?>">
                                                    <i class="icon-zoom-in"></i>
                                                </a>
                                                <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/users/edit/<?php echo $user['User']['user_id']; ?>" data-original-title="<?php echo MyClass::translate("Edit"); ?>">
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
            <!-- contacts -->
        </div>
        <!-- /second tab -->
        <!-- Third tab -->
        <div class="tab-pane fade" id="tasks">
            <!-- Tasks table -->
            <div class="block">
                <h6 class="heading-hr"><i class="icon-cart2"></i> <?php echo MyClass::translate("Latest Orders"); ?></h6>
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
                                    if ($i == 11)
                                        break;
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
            <!-- /tasks table -->
        </div>
        <!-- /third tab -->
    </div>
</div>
<!-- /page tabs -->