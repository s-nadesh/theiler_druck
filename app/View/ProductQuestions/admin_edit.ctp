<?php
$this->Html->addCrumb(MyClass::translate("Product Questions"), array('controller' => 'product_questions', 'action' => 'index', 'admin' => true));
$this->Html->addCrumb(MyClass::translate('Edit'));
?>

<?php 
echo $this->Form->create('ProductQuestion', array(
    "class" => "form-horizontal form-bordered update_question_answer",
    "role" => "form",
));
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-file6"></i> <?php echo MyClass::translate("Product Question & Answer"); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/product_questions" class="btn btn-primary pull-right"><?php echo MyClass::translate('Back'); ?></a>
    </div>

    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate("Name"); ?></label>
            <div class="col-sm-10">
                <?php echo $this->data['ProductQuestion']['question_name']?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate("Email"); ?></label>
            <div class="col-sm-10">
                <?php echo $this->data['ProductQuestion']['question_email']?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate("Product Name"); ?></label>
            <div class="col-sm-10">
                <?php 
                $product = $this->requestAction('products/getProduct/'.$this->data['ProductQuestion']['product_id']); 
                echo $product['Product']['product_name']?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate("Phone"); ?></label>
            <div class="col-sm-10">
                <?php echo $this->data['ProductQuestion']['question_phone']?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate("Question"); ?></label>
            <div class="col-sm-10">
                <?php echo $this->data['ProductQuestion']['question_content']?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo MyClass::translate("Answer"); ?></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('ProductAnswer.answer_content', array('type' => 'textarea', 'class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-actions text-right">
            <input type="submit" value="<?php echo MyClass::translate("Update your answer"); ?>" class="btn btn-primary">
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>

