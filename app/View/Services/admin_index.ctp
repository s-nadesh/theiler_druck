<?php $this->Html->addCrumb(__('Services')); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo __("Manage Services"); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/services/add" class="btn btn-primary pull-right"><?php echo __("Add Service"); ?></a>
    </div>
    <div class="datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo __("Title"); ?></th>
                    <th><?php echo __("Description"); ?></th>
                    <th><?php echo __("Sort"); ?></th>
                    <th><?php echo __("Created"); ?></th>
                    <th><?php echo __("Action"); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php  if (!empty($services)) { ?>
                    <?php
                    $i = 1;
                    foreach ($services as $service) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $service['Service']['service_title']; ?></td>
                            <td><?php echo $service['Service']['service_caption']; ?></td>
                            <td><?php echo $service['Service']['sort_value'] ?></td>
                            <td><?php echo $service['Service']['created']; ?></td>
                            <td>
                                <div class="table-controls">
<!--                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/services/view/<?php echo $service['Service']['service_id']; ?>" data-original-title="<?php echo __("View"); ?>">
                                        <i class="icon-zoom-in"></i>
                                    </a>-->
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/services/edit/<?php echo $service['Service']['service_id']; ?>" data-original-title="<?php echo __("Edit"); ?>">
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