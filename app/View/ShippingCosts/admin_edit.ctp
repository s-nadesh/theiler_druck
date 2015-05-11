<?php
$this->Html->addCrumb(__('Shipping Costs'), array('controller' => 'shipping_costs', 'action' => 'index', 'admin' => true));
$this->Html->addCrumb(__('Edit Shipping Cost'));

echo $this->Form->create('ShippingCost', array(
    "class" => "form-horizontal form-bordered admin_shipping_cost",
    "role" => "form",
));
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-coin"></i> <?php echo __('Edit Shipping Cost'); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/shipping_costs" class="btn btn-primary pull-right"><?php echo __('Back'); ?></a>
    </div>

    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo __('Target Zip From'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('sh_cost_zip_from', array('class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo __('Target Zip To'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('sh_cost_zip_to', array('type' => 'text', 'class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo __('Basic Weight Price'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('sh_cost_basic_weight_price', array('type' => 'text', 'class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo __('Additional Weight Price'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('sh_cost_additional_weight_price', array('type' => 'text', 'class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-actions text-right">
            <input type="submit" value="<?php echo __("Edit Shipping Cost"); ?>" class="btn btn-primary">
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>