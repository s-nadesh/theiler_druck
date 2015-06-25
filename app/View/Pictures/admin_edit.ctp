<?php 
$this->Html->addCrumb(MyClass::translate('Slider'), array('controller' => 'pictures', 'action' => 'index', 'admin' => true));
$this->Html->addCrumb(MyClass::translate('Edit'));
?>

<div class="tabbable page-tabs">
    <div class="tab-content">
        <!-- First tab -->
        <div class="tab-pane active fade in" id="english">
            <?php
            echo $this->Form->create('Picture', array(
                "class" => "form-horizontal form-bordered validate",
                "role" => "form",
                "enctype" => "multipart/form-data"
            ));
            echo $this->Form->hidden('picture_id');
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate("Edit Slider"); ?></h6>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Title'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('picture_title', array('class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Image'); ?>:
                        </label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('picture_image', array('type' => 'file', 'class' => 'styled', 'label' => false));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <?php
                            echo $this->Html->image("../files/pictures/{$this->data['Picture']['picture_image']}", array('title' => $this->data['Picture']['picture_title'], 'alt' => $this->data['Picture']['picture_title'], 'height' => '100'));
                            echo $this->Form->hidden('picture_old_image', array('value' => $this->data['Picture']['picture_image']));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            <?php echo MyClass::translate('Sort'); ?>: <span class="mandatory">*</span>
                        </label>
                        <div class="col-sm-1">
                            <?php
                            echo $this->Form->input('picture_sort', array('type' => 'text', 'class' => 'required form-control', 'label' => false));
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