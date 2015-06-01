<?php $this->Html->addCrumb(__('Static Page')); ?>

<div class="tabbable page-tabs">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#english" data-toggle="tab"><i class="icon-paragraph-justify2"></i> <?php echo __("English"); ?> </a>
        </li>
        <li>
            <a href="#german" data-toggle="tab"><i class="icon-paragraph-justify2"></i> <?php echo __("German"); ?> </a>
        </li>
    </ul>


    <div class="tab-content">
        <?php
        echo $this->Form->create('Page', array(
            "class" => "form-horizontal form-bordered",
            "role" => "form",
            "enctype" => "multipart/form-data"
        ));
        echo $this->Form->hidden('page_id', array('value' => 1, 'label' => false));
        echo $this->Form->hidden('language_type_id', array('value' => 1, 'label' => false));
        ?>
        <!-- First tab -->
        <div class="tab-pane active fade in" id="english">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo __("Edit page content"); ?></h6>
                </div>

                <div class="panel-body">
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

                    <div class="form-actions text-right">
                        <input type="submit" value="<?php echo __("Edit"); ?>" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>

        <?php
        echo $this->Form->create('Page', array(
            "class" => "form-horizontal form-bordered",
            "role" => "form",
            "enctype" => "multipart/form-data"
        ));
        echo $this->Form->hidden('page_id', array('value' => 2, 'label' => false));
        echo $this->Form->hidden('language_type_id', array('value' => 2, 'label' => false));
        ?>
        <!-- Second tab -->
        <div class="tab-pane fade" id="product-price">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo __("Edit page content"); ?></h6>
                </div>

                <div class="panel-body">
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

                    <div class="form-actions text-right">
                        <input type="submit" value="<?php echo __("Edit"); ?>" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>