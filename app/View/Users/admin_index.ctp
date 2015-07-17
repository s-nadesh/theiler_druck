<?php $this->Html->addCrumb(MyClass::translate('Users')); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate("Manage Users"); ?></h6>
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
                <?php  if (!empty($users)) { ?>
                    <?php
                    $i = 1;
                    foreach ($users as $user) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $user['User']['user_name']; ?></td>
                            <td><?php echo $user['User']['user_email']; ?></td>
                            <td><?php if($user['User']['user_status']==1)echo 'Active';else {echo 'Inactive';} ?></td>
                            <td><?php echo date(PHP_DATE_TIME_FORMAT, strtotime($user['User']['created'])); ?></td>
                            <td>
                                <div class="table-controls">
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/users/view/<?php echo $user['User']['user_id']; ?>" data-original-title="<?php echo MyClass::translate("View"); ?>">
                                        <i class="icon-zoom-in"></i>
                                    </a>
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/users/edit/<?php echo $user['User']['user_id']; ?>" data-original-title="<?php echo MyClass::translate("Edit"); ?>">
                                        <i class="icon-pencil"></i>
                                    </a>
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/users/delete/<?php echo $user['User']['user_id']; ?>" data-original-title="<?php echo MyClass::translate("Delete"); ?>" onclick="return confirm('Are you sure you wish to delete?');">
                                        <i class="icon-remove2"></i>
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