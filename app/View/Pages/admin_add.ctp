<?php $this->Html->addCrumb(MyClass::translate('Static Page')); ?>

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
                    <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate("Edit page content"); ?></h6>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Page Title'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('page_title', array('class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Page SubTitle'); ?>:
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('page_subtitle', array('class' => 'form-control', 'label' => false));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Page Content'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('page_content', array('type' => 'textarea', 'class' => 'ckeditor required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Parrallax Image'); ?>:
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('page_px_image', array('type' => 'file', 'class' => 'styled', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Parrallax Caption'); ?>:
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('page_px_caption', array('type' => 'textarea', 'class' => 'form-control', 'label' => false));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Sort'); ?>:
                        </label>
                        <div class="col-sm-1">
                            <?php
                            echo $this->Form->input('sort_value', array('type' => 'text', 'class' => 'form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Is one page'); ?>:
                        </label>
                        <div class="col-sm-1">
                            <?php
                            echo $this->Form->input('is_one_page', array('type' => 'checkbox','div' => false, 'class' => 'form-control', 'label' => false, 'value' => 1));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo __('Footer Column'); ?>:
                        </label>
                        <div class="col-sm-3">
                            <?php
                            echo $this->Form->input('page_column', array('div' => false, 'class' => 'form-control', 'label' => false, 'options' => array('1' => '1st Column', '2' => '2nd Column'), 'empty' => ''));
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