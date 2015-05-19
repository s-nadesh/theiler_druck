<?php //  print_r($languagetype);
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

    <div class="tab-content">

        <!-- First tab -->
        <?php
            echo $this->Form->create('Page', array(
                "class" => "form-horizontal form-bordered admin_product_form_edit",
                "role" => "form",
                "enctype" => "multipart/form-data"
            ));
            ?>
         <?php $i=1;$k = 1; foreach ($languagetype as $lang): ?>
        
        <div <?php if($i ==1){echo 'class="tab-pane active fade in"';}else {echo 'class="tab-pane fade"';}?> id="page-<?php echo $lang['LanguageType']['language_type_name']?>">
            
           <?php if($i ==1){echo '<div class="panel panel-default">
                <div class="panel-heading">';}
                else {echo '<div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">';}?>
            
                    
                    
                    <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo MyClass::translate('Add Page'); ?></h6>
                    <a href="<?php echo SITE_BASE_URL ?>admin/pages" class="btn btn-primary pull-right"><?php echo MyClass::translate('Back'); ?></a>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo MyClass::translate('Page Title'); ?>: <span class="mandatory">*</span></label>
                        <div class="col-sm-10">
                            <?php echo $this->Form->input('page_title'.$lang['LanguageType']['language_type_id'], array('class' => 'required form-control', 'label' => false)); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo MyClass::translate('Page Description'); ?>: <span class="mandatory">*</span></label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('page_description'.$lang['LanguageType']['language_type_id'], array('type' => 'textarea', 'class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo MyClass::translate('Page Slug'); ?>: <span class="mandatory">*</span></label>
                        <div class="col-sm-10">
                            <?php
                            echo $this->Form->input('page_slug'.$lang['LanguageType']['language_type_id'], array('class' => 'required form-control', 'label' => false));
                            ?>
                        </div>
                    </div>


                    <div class="form-actions text-right">
                        <input type="submit" value="<?php echo MyClass::translate("Save Product"); ?>" class="btn btn-primary">
                    </div>
                </div>
            </div>
            
        </div>
         <?php $k++;$i++; endforeach;?>
        <?php echo $this->Form->end(); ?>

        <!-- Second tab -->
<!--        <div class="tab-pane fade" id="page-2">
            <?php
            $product_id = $this->data['Product']['product_id'];
            $pages_array = $no_of_pages_decode;
            $copies_array = $no_of_copies_decode;
            $default_copies = MyClass::getDefaultCoipes();
            echo $this->Form->create('ProductPrice', array(
                "role" => "form",
                'url' => array('controller' => 'product_prices', 'action' => 'update_price_calculation', $product_id, 'admin' => true)
            ));
            ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h6 class="panel-title"><i class="icon-coin"></i> <?php echo MyClass::translate('Price Calculation'); ?></h6>
                            <input type="submit" value="<?php echo MyClass::translate("Update Price Calculation"); ?>" class="btn btn-danger pull-right">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><?php echo MyClass::translate("Pages"); ?></th>
                                        <?php foreach ($default_copies as $default_copy) { ?>
                                            <th><?php echo $default_copy ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pages_array as $page_key => $page_value) { ?>
                                        <tr>
                                            <td><?php echo $page_value ?></td>
                                            <?php
                                            $final_array = array();
                                            foreach ($default_copies as $default_copy_key => $default_copy_value) {
                                                $pp_exists = $this->requestAction('admin/product_prices/get_pp/' . $product_id . '/' . $page_value . '/' . $default_copy_key);
                                                if ($pp_exists) {
                                                    $pp_id = $pp_exists['ProductPrice']['pp_id'];
                                                    $pp_price = $pp_exists['ProductPrice']['pp_price'];
                                                } else {
                                                    $pp_id = '';
                                                    $pp_price = '';
                                                }

                                                $final_array[] = array(
                                                    'pp_id' => $pp_id,
                                                    'product_id' => $product_id,
                                                    'pp_price' => $pp_price,
                                                    'pp_page' => $page_value,
                                                    'pp_copy' => $default_copy_key,
                                                );
                                            }
                                            ?>

                                            <?php foreach ($final_array as $final_key => $final) { ?>
                                                <td>
                                                    <input type="hidden" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][pp_id]" value="<?php echo $final['pp_id'] ?>">
                                                    <input type="hidden" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][product_id]" value="<?php echo $final['product_id'] ?>">
                                                    <input type="hidden" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][pp_no_of_pages]" value="<?php echo $final['pp_page'] ?>">
                                                    <input type="hidden" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][pp_no_of_copies]" value="<?php echo $final['pp_copy'] ?>">
                                                    <input type="text" name="data[ProductPrice][<?php echo $final['pp_page'] ?>][<?php echo $final_key ?>][pp_price]" value="<?php echo $final['pp_price'] ?>">
                                                </td>
                                            <?php } ?>

                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php echo $this->Form->end(); ?>
        </div>-->

    </div>
</div>