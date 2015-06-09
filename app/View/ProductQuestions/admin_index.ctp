<?php $this->Html->addCrumb(MyClass::translate("Product Questions")); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-file6"></i> <?php echo MyClass::translate("Un answered Questions"); ?></h6>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo MyClass::translate("Name"); ?></th>
                    <th><?php echo MyClass::translate("Email"); ?></th>
                    <th><?php echo MyClass::translate("Product"); ?></th>
                    <th><?php echo MyClass::translate("Question"); ?></th>
                    <th><?php echo MyClass::translate("Created"); ?></th>
                    <th><?php echo MyClass::translate('Action'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($unanswered_questions)) { ?>
                    <?php
                    $i = 1;
                    foreach ($unanswered_questions as $unanswered_question) {
                        $product = $this->requestAction('products/getProduct/'.$unanswered_question['ProductQuestion']['product_id']); 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $unanswered_question['ProductQuestion']['question_name'] ?></td>
                            <td><?php echo $unanswered_question['ProductQuestion']['question_email'] ?></td>
                            <td><?php echo $product['Product']['product_name'] ?></td>
                            <td><?php echo $unanswered_question['ProductQuestion']['question_content'] ?></td>
                            <td><?php echo $unanswered_question['ProductQuestion']['created'] ?></td>
                            <td>
                                <div class="table-controls">
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/product_questions/edit/<?php echo $unanswered_question['ProductQuestion']['product_question_id']; ?>" data-original-title="<?php echo MyClass::translate("Add your answer"); ?>">
                                        <i class="icon-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="7"><?php echo MyClass::translate("No record found"); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-file6"></i> <?php echo MyClass::translate("Answered Questions"); ?></h6>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo MyClass::translate("Name"); ?></th>
                    <th><?php echo MyClass::translate("Email"); ?></th>
                    <th><?php echo MyClass::translate("Product"); ?></th>
                    <th><?php echo MyClass::translate("Question"); ?></th>
                    <th><?php echo MyClass::translate("Answer"); ?></th>
                    <th><?php echo MyClass::translate('Action'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($answered_questions)) { ?>
                    <?php
                    $j = 1;
                    foreach ($answered_questions as $answered_question) {
                        $product1 = $this->requestAction('products/getProduct/'.$answered_question['ProductQuestion']['product_id']); 
                        ?>
                        <tr>
                            <td><?php echo $j++; ?></td>
                            <td><?php echo $answered_question['ProductQuestion']['question_name'] ?></td>
                            <td><?php echo $answered_question['ProductQuestion']['question_email'] ?></td>
                            <td><?php echo $product1['Product']['product_name'] ?></td>
                            <td><?php echo $answered_question['ProductQuestion']['question_content'] ?></td>
                            <td><?php echo $answered_question['ProductAnswer']['answer_content'] ?></td>
                            <td>
                                <div class="table-controls">
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/product_questions/edit/<?php echo $answered_question['ProductQuestion']['product_question_id']; ?>" data-original-title="<?php echo MyClass::translate("Update your answer"); ?>">
                                        <i class="icon-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="7"><?php echo MyClass::translate("No record found"); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>