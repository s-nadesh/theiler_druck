<?php $this->Html->addCrumb(__('Static Service')); ?>

<div class="tabbable service-tabs">
    <div class="tab-content">
        <!-- First tab -->
        <div class="tab-pane active fade in" id="english">
            <?php
            echo $this->Form->create('Service', array(
                "class" => "form-horizontal form-bordered",
                "role" => "form",
                "enctype" => "multipart/form-data"
            ));
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo __("Edit service content"); ?></h6>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Service Title'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('service_title', array('class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Icon'); ?>:
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('service_image', array('type' => 'text', 'class' => 'form-control', 'label' => false));
                            ?>
                            <span class="help-block">You may find icons name on <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Description'); ?>:
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('service_caption', array('type' => 'textarea', 'class' => 'form-control', 'label' => false));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Sort'); ?>:
                        </label>
                        <div class="col-sm-1">
                            <?php
                            echo $this->Form->input('sort_value', array('type' => 'text', 'class' => 'form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-actions text-right">
                        <input type="submit" value="<?php echo __("Save"); ?>" class="btn btn-primary">
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>