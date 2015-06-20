<?php $this->Html->addCrumb(__('Email Templates')); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate("Manage Email Templates"); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo MyClass::translate("Name"); ?></th>
                    <th><?php echo MyClass::translate("Subject"); ?></th>
                    <th><?php echo MyClass::translate("Content"); ?></th>
                    <th><?php echo MyClass::translate("Action"); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php  if (!empty($email_templates)) { ?>
                    <?php
                    $i = 1;
                    foreach ($email_templates as $email_template) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $email_template['EmailTemplate']['template_name']; ?></td>
                            <td><?php echo $email_template['EmailTemplate']['template_subject']; ?></td>
                            <td><?php echo $email_template['EmailTemplate']['template_content']; ?></td>
                            <td>
                                <div class="table-controls">
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/email_templates/edit/<?php echo $email_template['EmailTemplate']['template_id']; ?>" data-original-title="<?php echo MyClass::translate("View"); ?>">
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