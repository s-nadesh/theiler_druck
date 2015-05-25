<?php $this->Html->addCrumb(__('Users')); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo __("Manage Users"); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo __("User Name"); ?></th>
                    <th><?php echo __("User Email"); ?></th>
                    <th><?php echo __("Status"); ?></th>
                    <th><?php echo __("Created"); ?></th>
                    <th><?php echo __("Action"); ?></th>
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
                            <td><?php echo $user['User']['created']; ?></td>
                            <td>
                                <div class="table-controls">
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/users/view/<?php echo $user['User']['user_id']; ?>" data-original-title="<?php echo __("View"); ?>">
                                        <i class="icon-zoom-in"></i>
                                    </a>
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/users/edit/<?php echo $user['User']['user_id']; ?>" data-original-title="<?php echo __("Edit"); ?>">
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