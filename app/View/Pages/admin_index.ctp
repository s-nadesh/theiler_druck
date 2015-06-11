<?php $this->Html->addCrumb(__('Pages')); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo __("Manage Pages"); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/pages/add" class="btn btn-primary pull-right"><?php echo __("Add Page"); ?></a>
    </div>
    <div class="datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo __("Title"); ?></th>
                    <th><?php echo __("Subtitle"); ?></th>
                    <th><?php echo __("Sort"); ?></th>
                    <th><?php echo __("Created"); ?></th>
                    <th><?php echo __("Action"); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php  if (!empty($pages)) { ?>
                    <?php
                    $i = 1;
                    foreach ($pages as $page) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $page['Page']['page_title']; ?></td>
                            <td><?php echo $page['Page']['page_subtitle']; ?></td>
                            <td><?php echo $page['Page']['sort_value'] ?></td>
                            <td><?php echo $page['Page']['created']; ?></td>
                            <td>
                                <div class="table-controls">
<!--                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/pages/view/<?php echo $page['Page']['page_id']; ?>" data-original-title="<?php echo __("View"); ?>">
                                        <i class="icon-zoom-in"></i>
                                    </a>-->
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/pages/edit/<?php echo $page['Page']['page_id']; ?>" data-original-title="<?php echo __("Edit"); ?>">
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