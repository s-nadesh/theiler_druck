<?php

//  print_r($languagetype);
//print_r($this->data);
$this->Html->addCrumb(MyClass::translate('Pages'), array('controller' => 'pages', 'action' => 'index', 'admin' => true));
$this->Html->addCrumb(MyClass::translate('Add Page'));
?>

<div class="tabbable page-tabs">
    <ul class="nav nav-tabs">
        <?php $j =1;  foreach ($languagetype as $lang): ?>
        <li <?php if($j ==1){echo 'class="active"';}else {echo '';}?>><a href="#page-<?php echo $lang['LanguageType']['language_type_name']?>" data-toggle="tab"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate($lang['LanguageType']['language_type_name']); ?> </a></li>
        <?php $j++; endforeach;?>
<!--        <li><a href="#page-2" data-toggle="tab"><i class="icon-coin"></i> <?php echo MyClass::translate('Product Price Calculation'); ?> </a></li>-->
    </ul>
  <?php
            echo $this->Form->create('Page', array(
                "class" => "form-horizontal form-bordered admin_add_page",
                "role" => "form",
                "enctype" => "multipart/form-data"
            ));
            ?>
    <div class="tab-content">

        <!-- First tab -->
      
         <?php $i=1;$k = 1; foreach ($languagetype as $lang): ?>

        <div <?php if($i ==1){echo 'class="tab-pane active fade in"';}else {echo 'class="tab-pane fade"';}?> id="page-<?php echo $lang['LanguageType']['language_type_name']?>">

           <?php if($i ==1){echo '<div class="panel panel-default">
                <div class="panel-heading">';}
                else {echo '<div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">';}?>



            <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate('Add Page'); ?></h6>
            <a href="<?php echo SITE_BASE_URL ?>admin/pages" class="btn btn-primary pull-right"><?php echo MyClass::translate('Back'); ?></a>
        </div>
                <?php echo $this->Form->hidden($lang['LanguageType']['language_type_id'].'.page_type_id', array('label' => false,'value'=>$lang['LanguageType']['language_type_id'])); ?>
                <?php echo $this->Form->hidden($lang['LanguageType']['language_type_id'].'.language_type_id', array('label' => false,'value'=>$lang['LanguageType']['language_type_id'])); ?>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo MyClass::translate('Page Title'); ?>: <span class="mandatory">*</span></label>
                <div class="col-sm-10">
                            <?php echo $this->Form->input($lang['LanguageType']['language_type_id'].'.page_title', array('class' => 'required form-control', 'label' => false)); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo MyClass::translate('Page Description'); ?>: <span class="mandatory">*</span></label>
                <div class="col-sm-10">
                            <?php
                            echo $this->Form->input($lang['LanguageType']['language_type_id'].'.page_description', array('type' => 'textarea', 'class' => 'ckeditor required form-control', 'label' => false));
                            ?>
                </div>
            </div>

<?php if($i !=1){?>
            <div class="form-actions text-right">
                <input type="submit" value="<?php echo MyClass::translate("Save Page"); ?>" class="btn btn-primary">
            </div>
       
<?php }?>
             </div>

<?php if($i ==1){echo '</div></div>';}
                else {echo '   </div></div>   </div></div>';}?>
         <?php $k++;$i++; endforeach;?>
       
    </div>
     <?php echo $this->Form->end(); ?>
</div>

<script>
    $(document).ready(function() {
     var $form = $(".admin_add_page");
     $form.validate().settings.ignore = [];
 });
    </script>
    