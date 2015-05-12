<?php
$this->Html->addCrumb('StaticPages', array('controller' => 'static_pages', 'action' => 'index', 'admin' => true));
$this->Html->addCrumb('Static Page Edit');

echo $this->Form->create('StaticPage', array(
    "class" => "form-horizontal form-bordered admin_static_page_form",
    "role" => "form",
    "enctype" => "multipart/form-data"
));
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-checkmark-circle"></i> <?php echo __('Edit StaticPage'); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/static_pages" class="btn btn-primary pull-right"><?php echo __('Back'); ?></a>
    </div>

    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo __('Title'); ?>: <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php echo $this->Form->input('page_title', array('class' => 'required form-control', 'label' => false)); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo __('Language'); ?>: <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <?php $languages = $this->requestAction('static_pages/getlanguages'); ?>
                <?php echo $this->Form->input('page_lang', array('options' => $languages, 'class' => 'required select2', 'label' => false, 'data-placeholder' => "Choose a Language")); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo __('Content'); ?>: <span class="mandatory">*</span></label>
            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="#" role="form">
                            <div class="block-inner">
                                <?php echo $this->Form->input('page_content', array('type' => 'textarea', 'class' => 'required form-control editor', 'label' => false, 'placeholder' => "Enter text ...")); ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-actions text-right">
            <input type="submit" value="Edit Static Page" class="btn btn-primary">
        </div>

    </div>
</div>
<?php echo $this->form->end(); ?>