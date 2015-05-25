<?php //  print_r($this->data);
$this->Html->addCrumb(__('User'), array('controller' => 'users', 'action' => 'index', 'admin' => true));
$this->Html->addCrumb(__('Edit User'));
?>

<div class="tabbable page-tabs">
 

    <div class="tab-content">

        <!-- First tab -->
        <div class="tab-pane active fade in" id="page">
            <?php
            echo $this->Form->create('User', array(
                "class" => "form-horizontal form-bordered admin_edit_user",
                "role" => "form",
                "enctype" => "multipart/form-data"
            ));
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo __('Edit User'); ?></h6>
                    <a href="<?php echo SITE_BASE_URL ?>admin/users" class="btn btn-primary pull-right"><?php echo __('Back'); ?></a>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo __('User Name'); ?>: <span class="mandatory">*</span></label>
                        <div class="col-sm-10">
                    <?php //echo $this->Form->hidden('language_type_id', array('label' => false)); ?>
                    <?php //echo $this->Form->hidden('page_type_id', array('label' => false)); ?>
                    <?php //echo $this->Form->hidden('page_status', array('label' => false)); ?>
                    <?php //echo $this->Form->hidden('page_slug', array('label' => false)); ?>
                            <?php echo $this->Form->input('user_name', array('class' => 'required form-control', 'label' => false)); ?>
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo __('User Email'); ?>: <span class="mandatory">*</span></label>
                        <div class="col-sm-10">
                            <?php echo $this->Form->input('user_email', array('disabled' => 'disabled', 'class' => 'required form-control', 'label' => false)); ?>
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo __('User Status'); ?>: <span class="mandatory">*</span></label>
                        <div class="col-sm-10">
                            <?php echo $this->Form->input('user_status', array(
                                  'type'=>'checkbox', 
                                 'label' => false,
//                                  'format' => array('before', 'input', 'between', 'label', 'after', 'error' ) 
  ) ); ?>
                        </div>
                    </div>


                    


                    <div class="form-actions text-right">
                        <input type="submit" value="<?php echo __("Save User"); ?>" class="btn btn-primary">
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>


    </div>
</div>

