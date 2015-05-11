<?php
$this->Html->addCrumb(__('Paper Variants'), array('controller' => 'paper_variants', 'action' => 'index', 'admin' => true));
$this->Html->addCrumb(__('Edit Paper Variant'));

echo $this->Form->create('PaperVariant', array(
    "class" => "form-horizontal form-bordered admin_paper_variants",
    "role" => "form",
));
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-file6"></i> <?php echo __('Edit Paper Variant'); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/paper_variants" class="btn btn-primary pull-right"><?php echo __('Back'); ?></a>
    </div>

    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo __('Paper Name'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('paper_name', array('class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo __('Range in milligram'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('paper_rang_mgrm', array('type'=>'text', 'class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-actions text-right">
            <input type="submit" value="<?php echo __("Edit Paper Variant"); ?>" class="btn btn-primary">
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>