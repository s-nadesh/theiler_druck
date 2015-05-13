<?php
$this->Html->addCrumb(MyClass::translate('Shipping Costs'), array('controller' => 'shipping_costs', 'action' => 'index', 'admin' => true));
$this->Html->addCrumb(MyClass::translate('Save Shipping Cost'));

echo $this->Form->create('ShippingCost', array(
    "class" => "form-horizontal form-bordered admin_shipping_cost",
    "role" => "form",
));
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-coin"></i> <?php echo MyClass::translate('Save Shipping Cost'); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/shipping_costs" class="btn btn-primary pull-right"><?php echo MyClass::translate('Back'); ?></a>
    </div>

    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Target Zip From'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('sh_cost_zip_from', array('class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Target Zip To'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('sh_cost_zip_to', array('type' => 'text', 'class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Basic Weight Price'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('sh_cost_basic_weight_price', array('type' => 'text', 'class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Additional Weight Price'); ?> <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('sh_cost_additional_weight_price', array('type' => 'text', 'class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-actions text-right">
            <input type="submit" value="<?php echo MyClass::translate("Save Shipping Cost"); ?>" class="btn btn-primary">
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>