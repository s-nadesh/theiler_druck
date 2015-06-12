<?php $this->Html->addCrumb(__('Contact Address')); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo __("Manage Contact Address"); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo __("Company"); ?></th>
                    <th><?php echo __("Address 1"); ?></th>
                    <th><?php echo __("Address 2"); ?></th>
                    <th><?php echo __("Email"); ?></th>
                    <th><?php echo __("Phone"); ?></th>
                    <th><?php echo __("Action"); ?></th>
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
<!--                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/contactaddresses/view/<?php echo $contactAddress['ContactAddress']['cont_addr_id']; ?>" data-original-title="<?php echo __("View"); ?>">
                                        <i class="icon-zoom-in"></i>
                                    </a>-->
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/contactaddresses/edit/<?php echo $contactAddress['ContactAddress']['cont_addr_id']; ?>" data-original-title="<?php echo __("Edit"); ?>">
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