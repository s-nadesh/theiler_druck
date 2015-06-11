<?php $this->Html->addCrumb(__('Contact Persons')); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo __("Manage Contact Persons"); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/contact_persons/add" class="btn btn-primary pull-right"><?php echo __("Add Contact Person"); ?></a>
    </div>
    <div class="datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo __("Name"); ?></th>
                    <th><?php echo __("Position"); ?></th>
                    <th><?php echo __("Email"); ?></th>
                    <th><?php echo __("Phone"); ?></th>
                    <th><?php echo __("Action"); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php  if (!empty($contactPersons)) { ?>
                    <?php
                    $i = 1;
                    foreach ($contactPersons as $contactPerson) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $contactPerson['ContactPerson']['cont_pers_name']; ?></td>
                            <td><?php echo $contactPerson['ContactPerson']['cont_pers_position']; ?></td>
                            <td><?php echo $contactPerson['ContactPerson']['cont_pers_email']; ?></td>
                            <td><?php echo $contactPerson['ContactPerson']['cont_pers_phone']; ?></td>
                            <td>
                                <div class="table-controls">
<!--                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/contact_persons/view/<?php echo $contactPerson['ContactPerson']['cont_pers_id']; ?>" data-original-title="<?php echo __("View"); ?>">
                                        <i class="icon-zoom-in"></i>
                                    </a>-->
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/contact_persons/edit/<?php echo $contactPerson['ContactPerson']['cont_pers_id']; ?>" data-original-title="<?php echo __("Edit"); ?>">
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