<?php $this->Html->addCrumb(MyClass::translate('Contact Address')); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate("Manage Contact Address"); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo MyClass::translate("Company"); ?></th>
                    <th><?php echo MyClass::translate("Address 1"); ?></th>
                    <th><?php echo MyClass::translate("Address 2"); ?></th>
                    <th><?php echo MyClass::translate("Email"); ?></th>
                    <th><?php echo MyClass::translate("Phone"); ?></th>
                    <th><?php echo MyClass::translate("Action"); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php  if (!empty($ContactAddresses)) { ?>
                    <?php
                    $i = 1;
                    foreach ($ContactAddresses as $contactAddress) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $contactAddress['ContactAddress']['cont_addr_company']; ?></td>
                            <td><?php echo $contactAddress['ContactAddress']['cont_addr_address_1']; ?></td>
                            <td><?php echo $contactAddress['ContactAddress']['cont_addr_address_2']; ?></td>
                            <td><?php echo $contactAddress['ContactAddress']['cont_addr_email'] ?></td>
                            <td><?php echo $contactAddress['ContactAddress']['cont_addr_phone']; ?></td>
                            <td>
                                <div class="table-controls">
<!--                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/contactaddresses/view/<?php echo $contactAddress['ContactAddress']['cont_addr_id']; ?>" data-original-title="<?php echo MyClass::translate("View"); ?>">
                                        <i class="icon-zoom-in"></i>
                                    </a>-->
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/contact_addresses/edit/<?php echo $contactAddress['ContactAddress']['cont_addr_id']; ?>" data-original-title="<?php echo MyClass::translate("Edit"); ?>">
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