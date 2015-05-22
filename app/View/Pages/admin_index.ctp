<?php $this->Html->addCrumb(__('Cms')); ?>

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
                    <th><?php echo __("Page Title"); ?></th>
                    <th><?php echo __("Page Language"); ?></th>
<!--                    <th><?php echo __("Descripition"); ?></th>-->
                    <th><?php echo __("status"); ?></th>
                    <th><?php echo __("Slug"); ?></th>
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
                            <td><?php $lang = $this->requestAction(array(
    'controller' => 'pages',
    'action' => 'get_language_name/'. $page['Page']['language_type_id']));
                    
                    echo $lang['LanguageType']['language_type_name']; ?></td>
<!--                            <td><?php echo $page['Page']['page_description']; ?></td>-->
                            <td><?php if($page['Page']['page_status']==1)echo 'Active';else {echo 'Inactive';} ?></td>
                            <td><?php echo $page['Page']['page_slug']; ?></td>
                            <td><?php echo $page['Page']['created']; ?></td>
                            <td>
                                <div class="table-controls">
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/pages/view/<?php echo $page['Page']['page_id']; ?>" data-original-title="<?php echo __("View"); ?>">
                                        <i class="icon-zoom-in"></i>
                                    </a>
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