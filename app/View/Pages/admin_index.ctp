<?php $this->Html->addCrumb(MyClass::translate('Cms')); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate("Manage Pages"); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/pages/add" class="btn btn-primary pull-right"><?php echo MyClass::translate("Add Page"); ?></a>
    </div>
    <div class="datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo MyClass::translate("Page Title"); ?></th>
                    <th><?php echo MyClass::translate("Page Language"); ?></th>
                    <th><?php echo MyClass::translate("Descripition"); ?></th>
                    <th><?php echo MyClass::translate("status"); ?></th>
                    <th><?php echo MyClass::translate("Slug"); ?></th>
                    <th><?php echo MyClass::translate("Created"); ?></th>
                    <th><?php echo MyClass::translate("Action"); ?></th>
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
                            <td><?php echo $page['Page']['language_type_id']; ?></td>
                            <td><?php echo $page['Page']['page_description']; ?></td>
                            <td><?php echo $page['Page']['page_status']; ?></td>
                            <td><?php echo $page['Page']['page_slug']; ?></td>
                            <td><?php echo $page['Page']['created']; ?></td>
                            <td>
                                <div class="table-controls">
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/pages/view/<?php echo $page['Page']['page_id']; ?>" data-original-title="<?php echo MyClass::translate("View"); ?>">
                                        <i class="icon-zoom-in"></i>
                                    </a>
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/pages/edit/<?php echo $page['Page']['page_id']; ?>" data-original-title="<?php echo MyClass::translate("Save"); ?>">
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