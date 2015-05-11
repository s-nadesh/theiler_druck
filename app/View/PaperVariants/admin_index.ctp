<?php $this->Html->addCrumb(__('Paper Variants')); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-file6"></i> <?php echo __('Manage Paper Variants'); ?></h6>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo __('Paper range in mg'); ?></th>
                    <th><?php echo __('Paper range in gram'); ?></th>
                    <th><?php echo __('Paper name'); ?></th>
                    <th><?php echo __('Action'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($papers)) { ?>
                    <?php
                    $i = 1;
                    foreach ($papers as $paper) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $paper['PaperVariant']['paper_rang_mgrm'] ?></td>
                            <td><?php echo $paper['PaperVariant']['paper_rang_grm'] ?></td>
                            <td><?php echo $paper['PaperVariant']['paper_name'] ?></td>
                            <td>
                                <div class="table-controls">
                                    <a title="" class="btn btn-link btn-icon btn-xs tip" href="<?php echo SITE_BASE_URL ?>admin/paper_variants/edit/<?php echo $paper['PaperVariant']['paper_id']; ?>" data-original-title="<?php echo __("Edit"); ?>">
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