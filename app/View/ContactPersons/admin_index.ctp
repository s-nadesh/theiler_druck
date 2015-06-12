<?php $this->Html->addCrumb(MyClass::translate('Contact Persons')); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate("Manage Contact Persons"); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/contact_persons/add" class="btn btn-primary pull-right"><?php echo MyClass::translate("Add Contact Person"); ?></a>
    </div>
    <div class="datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo MyClass::translate("Name"); ?></th>
                    <th><?php echo MyClass::translate("Position"); ?></th>
                    <th><?php echo MyClass::translate("Email"); ?></th>
                    <th><?php echo MyClass::translate("Phone"); ?></th>
                    <th><?php echo MyClass::translate("Action"); ?></th>
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
<!--                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/contact_persons/view/<?php echo $contactPerson['ContactPerson']['cont_pers_id']; ?>" data-original-title="<?php echo MyClass::translate("View"); ?>">
                                        <i class="icon-zoom-in"></i>
                                    </a>-->
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/contact_persons/edit/<?php echo $contactPerson['ContactPerson']['cont_pers_id']; ?>" data-original-title="<?php echo MyClass::translate("Edit"); ?>">
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