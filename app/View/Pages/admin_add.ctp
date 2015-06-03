<?php $this->Html->addCrumb(__('Static Page')); ?>

<div class="tabbable page-tabs">
    <div class="tab-content">
        <!-- First tab -->
        <div class="tab-pane active fade in" id="english">
            <?php
            echo $this->Form->create('Page', array(
                "class" => "form-horizontal form-bordered",
                "role" => "form",
                "enctype" => "multipart/form-data"
            ));
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo __("Edit page content"); ?></h6>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Page Title'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('page_title', array('class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Page SubTitle'); ?>:
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('page_subtitle', array('class' => 'form-control', 'label' => false));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Page Content'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('page_content', array('type' => 'textarea', 'class' => 'ckeditor required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Parrallax Image'); ?>:
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('page_px_image', array('type' => 'file', 'class' => 'form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Parrallax Caption'); ?>:
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('page_px_caption', array('type' => 'textarea', 'class' => 'form-control', 'label' => false));
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

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Is one page'); ?>:
                        </label>
                        <div class="col-sm-1">
                            <?php
                            echo $this->Form->input('is_one_page', array('type' => 'checkbox','div' => false, 'class' => 'form-control', 'label' => false, 'value' => 1));
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