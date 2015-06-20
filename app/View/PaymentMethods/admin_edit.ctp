<?php 
$this->Html->addCrumb(__('Payment Method'), array('controller' => 'payment_methods', 'action' => 'index', 'admin' => true));
$this->Html->addCrumb(MyClass::translate('Edit'));
?>

<div class="tabbable page-tabs">
    <div class="tab-content">
        <!-- First tab -->
        <div class="tab-pane active fade in" id="english">
            <?php
            echo $this->Form->create('PaymentMethod', array(
                "class" => "form-horizontal form-bordered validate payment-method",
                "role" => "form",
                "enctype" => "multipart/form-data"
            ));
            echo $this->Form->hidden('payment_id');
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo __("Edit Payment Method"); ?></h6>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Name'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('payment_name', array('class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Caption'); ?>: 
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('payment_caption', array('type' => 'text', 'class' => 'form-control', 'label' => false));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Fee'); ?>: 
                        </label>
                        <div class="col-sm-1">
                            <?php
                            echo $this->Form->input('payment_fee', array('type' => 'text', 'class' => 'number-only form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-actions text-right">
                        <input type="submit" value="<?php echo MyClass::translate("Save"); ?>" class="btn btn-primary">
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>