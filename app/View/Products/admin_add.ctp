<?php
$this->Html->addCrumb(MyClass::translate('Products'), array('controller' => 'products', 'action' => 'index', 'admin' => true));
$this->Html->addCrumb(MyClass::translate('Product Add'));

echo $this->Form->create('Product', array(
    "class" => "form-horizontal form-bordered admin_product_form_add",
    "role" => "form",
    "enctype" => "multipart/form-data"
));
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate('Add Product'); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/products" class="btn btn-primary pull-right"><?php echo MyClass::translate('Back'); ?></a>
    </div>

    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Product Name'); ?>: <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('product_name', array('class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Product Description'); ?>: <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('product_description', array('type' => 'textarea', 'class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Product SKU'); ?>: <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('product_sku', array('class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Product Factor'); ?>: <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('product_factor', array('type'=>'text', 'class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Product No.Of Pages'); ?>: <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('product_no_of_pages', array('type' => 'textarea', 'class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Product No.Of Copies'); ?>: <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('product_no_of_copies', array('type' => 'textarea', 'class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate('Product Image'); ?>: <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('product_image', array('type' => 'file', 'class' => 'styled', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-actions text-right">
            <input type="submit" value="<?php echo MyClass::translate("Add Product"); ?>" class="btn btn-primary">
        </div>

    </div>
</div>
<?php echo $this->Form->end(); ?>