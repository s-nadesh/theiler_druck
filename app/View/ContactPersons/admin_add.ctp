<?php 
$this->Html->addCrumb(__('Contact Person'), array('controller' => 'contact_persons', 'action' => 'index', 'admin' => true));
$this->Html->addCrumb(__('Add'));
?>

<div class="tabbable page-tabs">
    <div class="tab-content">
        <!-- First tab -->
        <div class="tab-pane active fade in" id="english">
            <?php
            echo $this->Form->create('ContactPerson', array(
                "class" => "form-horizontal form-bordered contact-person",
                "role" => "form",
                "enctype" => "multipart/form-data"
            ));
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo __("Add Contact Person"); ?></h6>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Name'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_pers_name', array('class' => 'form-control', 'label' => false));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Position'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_pers_position', array('class' => 'form-control', 'label' => false));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Phone'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_pers_phone', array('class' => 'form-control', 'label' => false));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Email'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_pers_email', array('class' => 'form-control', 'label' => false));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Image'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('cont_pers_image', array('type' => 'file', 'class' => 'styled', 'label' => false, 'id' => 'add_cont_pers_image'));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Level'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-1">
                            <?php
                            echo $this->Form->input('cont_pers_level', array('type' => 'text', 'class' => 'form-control', 'label' => false));
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