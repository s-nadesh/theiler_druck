<?php $this->Html->addCrumb(__('Sliders')); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate("Manage Sliders"); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/pictures/add" class="btn btn-primary pull-right"><?php echo MyClass::translate("Add Slider"); ?></a>
    </div>
    <div class="datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo MyClass::translate("Title"); ?></th>
                    <th><?php echo __("Image"); ?></th>
                    <th><?php echo MyClass::translate("Sort"); ?></th>
                    <th><?php echo MyClass::translate("Action"); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php  if (!empty($pictures)) { ?>
                    <?php
                    $i = 1;
                    foreach ($pictures as $picture) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $picture['Picture']['picture_title']; ?></td>
                            <td><?php echo $this->Html->image("../files/pictures/{$picture['Picture']['picture_image']}", array('title' => $picture['Picture']['picture_title'], 'alt' => $picture['Picture']['picture_title'], 'height' => '100')); ?></td>
                            <td><?php echo $picture['Picture']['picture_sort']; ?></td>
                            <td>
                                <div class="table-controls">
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/pictures/edit/<?php echo $picture['Picture']['picture_id']; ?>" data-original-title="<?php echo MyClass::translate("View"); ?>">
                                        <i class="icon-pencil"></i>
                                    </a>
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/pictures/delete/<?php echo $picture['Picture']['picture_id']; ?>" data-original-title="<?php echo __("Delete"); ?>" onclick="return confirm('<?php echo __('Are you sure you wish to delete?') ?>');">
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