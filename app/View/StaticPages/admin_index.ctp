<?php $this->Html->addCrumb('StaticPages'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-file"></i> <?php echo __("Manage StaticPages"); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/static_pages/add" class="btn btn-primary pull-right"><?php echo __("Add StaticPage"); ?></a>
    </div>
    <div class="datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo __("Title"); ?></th>
                    <th><?php echo __("Language"); ?></th>
                    <th><?php echo __("Content"); ?></th>
                    <th><?php echo __("Created"); ?></th>
                    <th><?php echo __("Action"); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($static_pages)) { ?>
                    <?php
                    $i = 1;
                    foreach ($static_pages as $static_page) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $static_page['StaticPage']['page_title']; ?></td>
                            <td><?php echo $static_page['StaticPage']['page_lang']; ?></td>
                            <td><?php echo $static_page['StaticPage']['page_content']; ?></td>
                            <td><?php echo $static_page['StaticPage']['created']; ?></td>
                            <td>
                                <div class="table-controls">
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/static_page/edit/<?php echo $static_page['StaticPage']['page_id']; ?>" data-original-title="Edit">
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