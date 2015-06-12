<div role="main" class="main">
    <div role="main" class="main" id="1">
        <div id="content" class="content full">
            <section class="top">
                <div class="container">
                    <div class="row first-txt" id="1">
                        <div class="col-md-12">
                            <div class="sections-heading"><?php echo MyClass::translate("Contact"); ?></div>
                            <div class="contact-section">
                                <?php echo $this->Session->flash(); ?>
                                <div class="row">
                                    <?php echo $this->Form->create('Page', array('action' => 'contact_form')); ?>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <b><?php echo MyClass::translate("Your questions and comments are always welcome"); ?></b>
                                        <p>&nbsp;</p>
                                        <div class="form-group">
                                            <label><?php echo MyClass::translate("Firstname") ?>*</label>
                                            <?php echo $this->Form->input('contact_firstname', array("class" => "form-control", "label" => false)); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo MyClass::translate("Lastname") ?>*</label>
                                            <?php echo $this->Form->input('contact_lastname', array("class" => "form-control", "label" => false)); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo MyClass::translate("Email"); ?>*</label>
                                            <?php echo $this->Form->input('contact_email', array("class" => "form-control", "label" => false)); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo MyClass::translate("Regard"); ?>*</label>
                                            <?php echo $this->Form->input('contact_regard', array("class" => "form-control", "label" => false)); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo MyClass::translate("Message"); ?>*</label>
                                            <?php echo $this->Form->input('contact_message', array("type" => "textarea", "class" => "form-control", "label" => false)); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo MyClass::translate("Spam protection") ?> *</label>
                                            <?php echo $this->Form->input('contact_captcha', array('class' => 'form-control', 'label' => false)); ?>
                                            <img src="<?php echo SITE_BASE_URL ?>pages/getCaptcha" alt="" class="captcha" />
                                            <?php echo $this->Html->image("refresh.jpg", array("width" => "25", "alt" => "", "class" => "refresh")); ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $this->Form->submit('Send', array('class' => 'btn btn-primary btn-lg', 'div' => false, 'id' => 'contact_submit')); ?>
                                            <?php echo $this->Html->image("ajax-loader.gif", array("alt" => "", 'class' => 'hide', 'id' => 'contact-ajax-loader')); ?>
                                        </div>
                                        <div class="form-group hide" id="contact-message">
                                            <div class="alert fade in block-inner">
                                                <i class="icon-cancel-circle"></i><span id="cont-msg"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo $this->Form->end(); ?>
                                    <div class="col-xs-12 col-sm-5 col-md-5 col-md-offset-1 contact-right"> 
                                        <p> <?php echo $this->Html->image("theilerdrucklogo2.png", array("alt" => "")); ?> </p>
                                        <div class="clearfix"></div>
                                        <p> 
                                            <?php echo $this->Html->image("contact-icon1.png", array("width" => "57", 'height' => '58', "alt" => "")); ?>
                                            <?php echo MyClass::translate('Address') ?>:<br/>
                                            Verenastrasse 2<br/>
                                            8832  Wollerau<br/>
                                        </p>
                                        <p> 
                                            <?php echo $this->Html->image("contact-icon2.png", array("width" => "57", 'height' => '57', "alt" => "")); ?>
                                            Tel.:<br/>
                                            044 787 03 00
                                        </p>
                                        <p> 
                                            <?php echo $this->Html->image("contact-icon3.png", array("width" => "57", 'height' => '57', "alt" => "")); ?>
                                            <?php echo MyClass::translate('Fax') ?>:<br/>
                                            044 787 03 01
                                        </p>
                                        <p> 
                                            <?php echo $this->Html->image("contact-icon4.png", array("width" => "57", 'height' => '57', "alt" => "")); ?>
                                            <?php echo MyClass::translate('Email') ?>:<br/>
                                            <a href="mailto:info@theilerdruck.ch">info@theilerdruck.ch</a>
                                        </p>
                                        <div class="contact-map"> 
                                            <h4><?php echo MyClass::translate('Approach') ?></h4>
                                            <p>
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10844.698199828279!2d8.72116!3d47.193596!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe94d76d6c439cb2e!2sTheiler+Druck+AG!5e0!3m2!1sen!2sin!4v1433157270213" width="100%" height="310" frameborder="0" style="border:0"></iframe>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="top">
                <div class="container">
                    <div class="row" id="2">
                        <div class="col-md-12">
                            <div class="sections-heading"> <?php echo MyClass::translate('Contact persons') ?></div>
                            <div class="contact-section">
                                <div class="row">
                                    <?php
                                    $ini_level = 1;
                                    foreach ($contactPersons as $key => $contactPerson) {
                                        if ($contactPerson['ContactPerson']['cont_pers_level'] != $ini_level) {
                                            echo '<div class="clearfix"> </div>';
                                            $ini_level++;
                                        }
                                        ?>
                                        <div class="col-xs-12 col-sm-4 col-md-3 contact-person-cont"> 
                                            <p> <?php echo $this->Html->image("../files/contact_persons/{$contactPerson['ContactPerson']['cont_pers_image']}", array('title' => $contactPerson['ContactPerson']['cont_pers_name'], 'alt' => $contactPerson['ContactPerson']['cont_pers_name'])); ?></p>
                                            <p> 
                                            <h2> <?php echo $contactPerson['ContactPerson']['cont_pers_name'] ?> </h2>
                                            <b>G<?php echo $contactPerson['ContactPerson']['cont_pers_position'] ?></b></p>
                                            <p>Tel.: <?php echo $contactPerson['ContactPerson']['cont_pers_phone'] ?> <br/>
                                                <a href="mailto:<?php echo $contactPerson['ContactPerson']['cont_pers_email'] ?>"><?php echo $contactPerson['ContactPerson']['cont_pers_email'] ?></a>
                                            </p>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="top">
                <div class="container">
                    <div class="row" id="3">
                        <div class="col-md-12">  
                            <div class="contact-section">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="featured-box featured-box-secundary default info-content" >
                                            <div class="box-content box-content2 offertenanfrage-form">
                                                <div class="sections-heading"><?php echo MyClass::translate('Inquiry') ?> </div>
                                                <div class="row"> 
                                                    <div class="col-xs-12 col-sm-9 col-md-10"> <p> <?php echo MyClass::translate('Do not hesitate to ask for a free quote. we will gladly make our offer .') ?>  </p>  </div>
                                                    <div class="col-xs-12 col-sm-2 col-md-2">   
                                                        <a href="javascript:void(0)" class="btn btn-primary  dropdown-toggle inquiry-toggle">
                                                            <?php echo MyClass::translate('Hide Inquiry') ?> <i class="icon icon-angle-up"></i>
                                                        </a>   
                                                    </div>
                                                    <?php echo $this->Form->create('Page', array('action' => 'inquiry_form')); ?>
                                                    <div class="col-xs-12 col-sm-6 col-md-6 inquiry-form"> 
                                                        <div class="form-group">
                                                            <div class="row"> 
                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label><?php echo MyClass::translate('Company') ?>:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <?php echo $this->Form->input('inquiry_company', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row"> 
                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label><?php echo MyClass::translate('Name') ?>:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <?php echo $this->Form->input('inquiry_name', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row"> 
                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label><?php echo MyClass::translate('Firstname') ?>:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <?php echo $this->Form->input('inquiry_firstname', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row"> 
                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label><?php echo MyClass::translate('Street/No') ?>:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <?php echo $this->Form->input('inquiry_street', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row"> 
                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label><?php echo MyClass::translate('PLZ/Place') ?>:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <?php echo $this->Form->input('inquiry_plz', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row"> 
                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label><?php echo MyClass::translate('Phone') ?>:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <?php echo $this->Form->input('inquiry_phone', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row"> 
                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label><?php echo MyClass::translate('Fax') ?>:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <?php echo $this->Form->input('inquiry_fax', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row"> 
                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label><?php echo MyClass::translate('Email') ?>:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <?php echo $this->Form->input('inquiry_email', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row"> 
                                                                <div class="col-xs-12 col-sm-3 col-md-3"> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9">  <?php echo $this->Form->input('inquiry_is_phonecontact', array('label' => false, 'type' => 'checkbox', 'div' => false, 'value' => 'Y')); ?> <span> <?php echo MyClass::translate('Please contact us by phone') ?> </span> </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row"> 
                                                                <div class="col-xs-12 col-sm-3 col-md-3">  <label><?php echo MyClass::translate('Title of the product') ?>:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <?php echo $this->Form->input('inquiry_product_title', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                            </div>
                                                        </div>   
                                                        <div class="form-group">
                                                            <div class="row"> 
                                                                <div class="col-xs-12 col-sm-3 col-md-3">  <label><?php echo MyClass::translate('Edition') ?>:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <?php echo $this->Form->input('inquiry_edition', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                            </div>
                                                        </div> 

                                                        <div class="form-product">
                                                            <h2> <?php echo MyClass::translate('Product') ?>:</h2>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-3 col-md-3 hidden-sm">   </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-9"> 
                                                                    <div class="row"> 
                                                                        <?php
                                                                        $products = array(MyClass::translate('Sheet'), MyClass::translate('Leaflet'), MyClass::translate('Prospectus'), MyClass::translate('Business cards'), MyClass::translate('Brochure with envelope'), MyClass::translate('Booklet without cover'), MyClass::translate('Cutlery'));
                                                                        $products_checked = MyClass::translate('Prospectus');
                                                                        foreach ($products as $product) {
                                                                            ?>
                                                                            <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  
                                                                                <input name="data[Page][inquiry_product_type]" type="radio" value="<?php echo $product; ?>" <?php echo $products_checked == $product ? 'checked' : ''; ?>>  <?php echo $product; ?>  
                                                                            </div>
                                                                        <?php } ?>

                                                                    </div>
                                                                    <label><?php echo MyClass::translate('Please filling out : adhesive strips with or without windows, ( left / right), with, rubberized') ?></label>
                                                                    <?php echo $this->Form->input('inquiry_productname', array('class' => 'form-control', 'label' => false)); ?>
                                                                </div>
                                                            </div>
                                                        </div>  


                                                        <div class="form-product">
                                                            <h2> <?php echo MyClass::translate('Format') ?>: </h2>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-3 col-md-3">   </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-9"> 
                                                                    <div class="row"> 
                                                                        <?php
                                                                        $formats_1 = array('10.5 x 14.8 (A6)', '14.8 x 21.0(A5)', '21 x 29.7 (A4)', '29.37 x 42.0 (A3)', '8.5 x 5.4 (' . MyClass::translate('Business cards') . ')', 'C4 (' . MyClass::translate('Cutlery') . ')', 'C5 (' . MyClass::translate('Cutlery') . ')', 'C 5/6 (' . MyClass::translate('Cutlery') . ')');
                                                                        $formats_1_checked = '21 x 29.7 (A4)';
                                                                        foreach ($formats_1 as $format) {
                                                                            ?>
                                                                            <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  
                                                                                <input name="data[Page][inquiry_format_1]" type="radio" value="<?php echo $format; ?>" <?php echo $formats_1_checked == $format ? 'checked' : ''; ?>>  <?php echo $format; ?>  
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <label><?php echo MyClass::translate('Big individual') ?>:</label>
                                                                    <?php echo $this->Form->input('inquiry_big_individual', array('class' => 'form-control', 'label' => false)); ?>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-product">
                                                            <h2> <?php echo MyClass::translate('Scope') ?>: </h2>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-3 col-md-3 hidden-sm">   </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-9"> 
                                                                    <div class="row"> 
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="data[Page][inquiry_printed]" type="radio" value="<?php echo MyClass::translate('einseiting printed') ?>"> <?php echo MyClass::translate('einseiting printed') ?> </div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="data[Page][inquiry_printed]" type="radio" value="<?php echo MyClass::translate('beinseiting printed') ?>">  <?php echo MyClass::translate('beinseiting printed') ?></div>
                                                                        <div class="col-xs-12 col-sm-12 col-md-6 form-radio-option"> 
                                                                            <div class="row">
                                                                                <div class="col-xs-12 col-sm-8 col-md-7">
                                                                                    <?php echo $this->Form->input('inquiry_sides_content', array('class' => 'form-control', 'label' => false)); ?>
                                                                                </div>
                                                                                <div class="col-xs-12 col-sm-4 col-md-5">  <?php echo MyClass::translate('Sides Content') ?>  </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-12 col-md-6 form-radio-option"> 
                                                                            <div class="row">

                                                                                <div class="col-xs-12 col-sm-8 col-md-7">    
                                                                                    <?php echo $this->Form->input('inquiry_cover_pages', array('class' => 'form-control', 'label' => false)); ?>
                                                                                </div>
                                                                                <div class="col-xs-12 col-sm-4 col-md-5"> <?php echo MyClass::translate('Cover pages') ?>  <br/>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-3 col-md-2"> <label>  <?php echo MyClass::translate('Others') ?>:  </label> <br/>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-9 col-md-10">
                                                                            <?php echo $this->Form->input('inquiry_others_1', array('class' => 'form-control', 'label' => false)); ?>
                                                                            <?php echo $this->Form->input('inquiry_others_2', array('class' => 'form-control', 'label' => false)); ?>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-product">
                                                            <h2> <?php echo MyClass::translate('Format') ?>: </h2>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-3 col-md-3 hidden-sm">   </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-9"> 
                                                                    <div class="row">
                                                                        <?php
                                                                        $formats_2 = array('1-fabrig shwarz', '1/1-fabrig shwarz', '1-fabrig bunt', '1/1-fabrig bunt', ' 2-fabrig', '2/2-fabrig', '3-fabrig', '3/3-fabrig', '4-fabrig bunt', '4/4-fabr bunt', '4-fabrig Skala', '4/4-fabrig Skala', 'Drucklack');
                                                                        $formats_2_checked = "1-fabrig bunt";
                                                                        foreach ($formats_2 as $format) {
                                                                            ?>
                                                                            <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  
                                                                                <input name="data[Page][inquiry_format_2]" type="radio" value="<?php echo $format; ?>" <?php echo $formats_2_checked == $format ? 'checked' : ''; ?>>  <?php echo $format; ?>  
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <label><?php echo MyClass::translate('Special colors') ?>:</label>
                                                                    <?php echo $this->Form->input('inquiry_special_colors', array('class' => 'form-control', 'label' => false)); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1  inquiry-form">
                                                        <div class="form-product">
                                                            <h2> <?php echo MyClass::translate('Paper') ?>:</h2>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-md-12"> 
                                                                    <div class="row"> 
                                                                        <?php
                                                                        $papars = array('Offset weiss', 'Offset fabrig', 'Laser-Inkjet', 'chem. Papier', 'matt gerstrichen', 'glänzend gestrichen', 'Visitenkarten');
                                                                        $papers_checked = 'chem. Papier';
                                                                        foreach ($papars as $papar) {
                                                                            ?>
                                                                            <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  
                                                                                <input name="data[Page][inquiry_paper]" type="radio" value="<?php echo $papar; ?>" <?php echo $papers_checked == $papar ? 'checked' : ''; ?>>  <?php echo $papar; ?>  
                                                                            </div>
                                                                        <?php } ?>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">
                                                                            <?php echo $this->Form->input('inquiry_with_window', array('type' => 'checkbox', 'div' => false, 'label' => false, 'value' => 'Yes', 'checked' => true)); ?> <?php echo MyClass::translate('with window') ?>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-4 col-md-2 form-radio-option">   <?php echo MyClass::translate('Others') ?>:</div>
                                                                        <div class="col-xs-12 col-sm-8 col-md-10 form-radio-option">
                                                                            <?php echo $this->Form->input('inquiry_paper_others', array('class' => 'form-control', 'label' => false)); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-product">
                                                            <h2> <?php echo MyClass::translate('Paper weight') ?>:</h2>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-md-12"> 
                                                                    <div class="row"> 
                                                                        <?php
                                                                        $papar_weights = array('80 gm2', '100 gm2', '115 gm2', '120 gm2', '135 gm2', '150 gm2');
                                                                        $papar_weights_checked = "115 gm2";
                                                                        foreach ($papar_weights as $papar_weight) {
                                                                            ?>
                                                                            <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  
                                                                                <input name="data[Page][inquiry_paper_weight]" type="radio" value="<?php echo $papar_weight; ?>" <?php echo $papar_weights_checked == $papar_weight ? 'checked' : ''; ?>>  <?php echo $papar_weight; ?>  
                                                                            </div>
                                                                        <?php } ?>
                                                                        <div class="col-xs-12 col-sm-4 col-md-2 form-radio-option">   <?php echo MyClass::translate('Others') ?>:</div>
                                                                        <div class="col-xs-12 col-sm-8 col-md-10 form-radio-option"> <?php echo $this->Form->input('inquiry_paper_weight_others', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                                        <div class="border-form">
                                                                            <div class="col-xs-12 col-sm-4 col-md-2 form-radio-option">  <?php echo MyClass::translate('Envelope') ?>:</div>
                                                                            <div class="col-xs-12 col-sm-8 col-md-10 form-radio-option"> <input name="data[Page][inquiry_envelope]" type="radio" value="100 gm2"> 100 gm2</div>
                                                                            <div class="col-xs-12 col-sm-4 col-md-2 form-radio-option">   <?php echo MyClass::translate('Others') ?>:</div>
                                                                            <div class="col-xs-12 col-sm-8 col-md-10 form-radio-option"> <?php echo $this->Form->input('inquiry_envelope_others', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                                        </div>
                                                                        <div class="border-form">
                                                                            <div class="col-xs-12 col-sm-4 col-md-2 form-radio-option">  <?php echo MyClass::translate('Content') ?>: </div>
                                                                            <div class="col-xs-6 col-sm-4 col-md-5 form-radio-option"> <input name="data[Page][inquiry_cont]" type="radio" value="80 gm2"> 80 gm2</div>
                                                                            <div class="col-xs-6 col-sm-4 col-md-5 form-radio-option"> <input name="data[Page][inquiry_cont]" type="radio" value="100 gm2"> 100 gm2</div>
                                                                            <div class="col-xs-12 col-sm-4 col-md-2 form-radio-option">   <?php echo MyClass::translate('Others') ?>:</div>
                                                                            <div class="col-xs-12 col-sm-8 col-md-10 form-radio-option"> <?php echo $this->Form->input('inquiry_cont_others', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-product">
                                                            <h2> <?php echo MyClass::translate('Paper') ?>:</h2>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-md-12"> 
                                                                    <div class="row">
                                                                        <?php
                                                                        $papars_2 = array('Drahtheftung', 'Ringösen', 'Klebebindung', 'Fadenheftung', 'gefalzt', 'gerilt', 'gestanzt', 'perforiert', 'geschlitzt', 'numeriert');
                                                                        $papars_2_checked = array('Drahtheftung');
                                                                        foreach ($papars_2 as $papar) {
                                                                            echo '<div class="col-xs-6 col-sm-6 col-md-6 form-radio-option">';
                                                                            echo $this->Form->input('inquiry_paper_2', array('type' => 'checkbox', 'name' => 'data[Page][inquiry_paper_2][]', 'div' => false, 'label' => false, 'value' => $papar, 'checked' => in_array($papar, $papars_2_checked)));
                                                                            echo " {$papar} </div>";
                                                                            ?>
                                                                        <?php } ?>
                                                                        <div class="col-xs-12 col-sm-12 col-md-12 "> 
                                                                            <div class="border-form"> 
                                                                                <div class="row"> 
                                                                                    <div class="col-xs-12 col-sm-12 col-md-4 form-radio-option">  <?php echo $this->Form->input('inquiry_numbered', array('type' => 'checkbox', 'div' => false, 'label' => false, 'value' => 'Yes')); ?> <?php echo MyClass::translate('numbered') ?>:</div>
                                                                                    <div class="col-xs-2 col-sm-2 col-md-1 form-radio-option">   <?php echo MyClass::translate('from') ?></div>
                                                                                    <div class="col-xs-4 col-sm-3 col-md-3 form-radio-option"> <?php echo $this->Form->input('inquiry_numbered_from', array('class' => 'form-control', 'label' => false)); ?></div>
                                                                                    <div class="col-xs-2 col-sm-2 col-md-1 form-radio-option">   <?php echo MyClass::translate('to') ?></div>
                                                                                    <div class="col-xs-4 col-sm-3 col-md-3 form-radio-option"> <?php echo $this->Form->input('inquiry_numbered_to', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12 col-md-12 "> 
                                                                            <div class="border-form"> 
                                                                                <div class="row"> 
                                                                                    <div class="col-xs-12 col-sm-12 col-md-4 form-radio-option">  <?php echo $this->Form->input('inquiry_preforation_2er', array('type' => 'checkbox', 'div' => false, 'label' => false, 'value' => 'Yes')); ?> <?php echo MyClass::translate('perforation') ?> 2er</div>
                                                                                    <div class="col-xs-5 col-sm-4 col-md-3 form-radio-option">  <?php echo MyClass::translate('Diameter') ?></div>
                                                                                    <div class="col-xs-3 col-sm-3 col-md-3 form-radio-option"> <?php echo $this->Form->input('inquiry_preforation_2er_mm', array('class' => 'form-control', 'label' => false)); ?> </div>
                                                                                    <div class="col-xs-4 col-sm-2 col-md-1 form-radio-option">   <?php echo MyClass::translate('mm') ?></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-12 col-md-12 "> 
                                                                            <div class="border-form"> 
                                                                                <div class="row"> 
                                                                                    <div class="col-xs-12 col-sm-12 col-md-4 form-radio-option">  <?php echo $this->Form->input('inquiry_preforation_4er', array('type' => 'checkbox', 'div' => false, 'label' => false, 'value' => 'Yes')); ?> <?php echo MyClass::translate('perforation') ?> 4er</div>
                                                                                    <div class="col-xs-5 col-sm-4 col-md-3 form-radio-option"><?php echo MyClass::translate('Diameter') ?></div>
                                                                                    <div class="col-xs-3 col-sm-3 col-md-3 form-radio-option"> <?php echo $this->Form->input('inquiry_preforation_4er_mm', array('class' => 'form-control', 'label' => false)); ?></div>
                                                                                    <div class="col-xs-2 col-sm-2 col-md-1 form-radio-option">   <?php echo MyClass::translate('mm') ?></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <?php echo $this->Form->input('inquiry_gather', array('type' => 'checkbox', 'div' => false, 'label' => false, 'value' => 'Yes')); ?>   <?php echo MyClass::translate('gather') ?></div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <?php echo $this->Form->input('inquiry_sliced', array('type' => 'checkbox', 'div' => false, 'label' => false, 'value' => 'Yes')); ?>   <?php echo MyClass::translate('sliced') ?></div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-product">
                                                            <h2> <?php echo MyClass::translate('Prepress') ?>: </h2>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-md-12"> 
                                                                    <div class="row">
                                                                        <?php
                                                                        $pre_presses = array(MyClass::translate('Neusatz & design by Theiler Druck AG'), MyClass::translate('Raw data + Image sources delivered / set breaks by Theiler Druck AG'), MyClass::translate('Supplied exposure -ready data with program / ​​system information and color- expressive'));
                                                                        foreach ($pre_presses as $pre_press) {
                                                                            ?>
                                                                            <div class="col-xs-12 col-sm-12 col-md-12 form-radio-option">  
                                                                                <input name="data[Page][inquiry_prepress]" type="radio" value="<?php echo $pre_press; ?>">  <?php echo $pre_press; ?>  
                                                                            </div>
                                                                        <?php } ?>
                                                                        <div class="col-xs-12 col-sm-6 col-md-7 form-radio-option">   <?php echo MyClass::translate('Exposure violent data delivered on') ?>:
                                                                        </div>
                                                                        <div class="col-xs-4 col-sm-3 col-md-2 form-radio-option">  <?php echo $this->Form->input('inquiry_cd', array('type' => 'checkbox', 'div' => false, 'label' => false, 'value' => 'Yes', 'checked' => true)); ?>   <?php echo MyClass::translate('CD') ?></div>
                                                                        <div class="col-xs-4 col-sm-3 col-md-3 form-radio-option">  <?php echo $this->Form->input('inquiry_is_email', array('type' => 'checkbox', 'div' => false, 'label' => false, 'value' => 'Yes')); ?> <?php echo MyClass::translate('Email') ?></div>
                                                                    </div>
                                                                    <label> <?php echo MyClass::translate('Notes to other ihler request') ?>:</label>
                                                                    <p> <?php echo $this->Form->textarea('inquiry_request_notes', array('div' => false, 'label' => false, 'rows' => '6', 'class' => 'form-control')); ?> </p>
                                                                    <div class="row"> 
                                                                        <div class="col-xs-12 col-sm-12 col-md-12 form-radio-option">  <?php echo MyClass::translate('Spam protection') ?> *: </div>
                                                                        <div class="col-xs-12 col-sm-12 col-md-12 form-radio-option">
                                                                            <?php echo $this->Form->input('inquiry_captcha', array('class' => 'form-control', 'label' => false)); ?>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-12 col-md-12 form-radio-option">
                                                                            <img src="<?php echo SITE_BASE_URL ?>pages/getCaptcha" alt="" class="captcha" />
                                                                            <?php echo $this->Html->image("refresh.jpg", array("width" => "25", "alt" => "", "class" => "refresh")); ?>
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12 col-md-12 form-radio-option">
                                                                            <?php echo MyClass::translate('Please note that we can only process your request if the address details are correct') ?>
                                                                            <div class="form-group">
                                                                                <?php echo $this->Form->input(MyClass::translate('Submit Request'), array('class' => 'btn btn-primary btn-lg pull-right', 'label' => false, 'id' => 'inquiry_submit', 'type' => 'submit')); ?>
                                                                                <?php echo $this->Html->image("ajax-loader.gif", array("alt" => "", 'class' => 'hide', 'id' => 'inquiry-ajax-loader', 'style' => 'float: right;margin: 10px 15px;')); ?>
                                                                            </div>
                                                                            <div class="form-group hide" id="inquiry-message">
                                                                                <div class="alert fade in block-inner">
                                                                                    <i class="icon-cancel-circle"></i><span id="inq-msg"></span>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <?php echo $this->Form->end(); ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </section>   
                        <section class="top">
                            <div class="container">
                                <div class="row" id="4">
                                    <div class="col-md-12">
                                        <div class="sections-heading"><?php echo MyClass::translate('Publishing house') ?></div>
                                        <div class="sections-content">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6 publisher-cont">
                                                    <div class="row"> 
                                                        <div class="col-xs-12 col-sm-6 col-md-5"> 
                                                            <h2> Hofner Volksblatt </h2>
                                                            Verenastrasse 2 <br/> 
                                                            8832 Wollerau <br/>
                                                            Tel. 044 787 03 03 <br/>
                                                            Fax 044 787 03 10 <br/>
                                                            <a href="http://www.hoefner.ch">www.hoefner.ch</a><br/>
                                                            <a href="mailto:redaktion@hoefner.ch">redaktion@hoefner.ch</a> <br/>
                                                            <a href="mailto:redaktion@hoefner.ch">redaktion@hoefner.ch</a><br/>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 publisher-img">
                                                            <?php echo $this->Html->image('publisher-img1.jpg', array('class' => 'img-responsive')); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 publisher-cont">
                                                    <div class="row"> 
                                                        <div class="col-xs-12 col-sm-6 col-md-5"> 
                                                            <h2> March-Anzeiger </h2>
                                                            Alpenblickstrasse 26 <br/>
                                                            8853 Lachen<br/>
                                                            Tel. 055 451 08 88<br/>
                                                            Fax 055 451 08 89<br/>
                                                            <a href="http://www.marchenzeiger.ch">www.marchenzeiger.ch</a><br/>
                                                            <a href="mailto:redaktion@hoefner.ch">redaktion@marchanzeiger.ch</a><br/>
                                                            <a href="mailto:redaktion@hoefner.ch">inserate@theilermediaservice.ch</a><br/>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 publisher-img"> 
                                                            <?php echo $this->Html->image('publisher-img2.jpg', array('class' => 'img-responsive')); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Google Maps -->
                    </div>
                </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                // refresh captcha
                $('img.refresh').click(function () {
                    change_captcha();
                });

                $("#PageContactFormForm").validate({
                    rules: {
                        'data[Page][contact_firstname]': 'required',
                        'data[Page][contact_lastname]': 'required',
                        'data[Page][contact_regard]': 'required',
                        'data[Page][contact_captcha]': 'required',
                        'data[Page][contact_email]': {
                            required: true,
                            email: true
                        },
                        'data[Page][contact_message]': {
                            required: true,
                            minlength: 10
                        },
                    },
                    highlight: function (element) {
                        $(element)
                                .parent()
                                .removeClass("has-success")
                                .addClass("has-error");
                    },
                    success: function (element) {
                        $(element)
                                .parent()
                                .removeClass("has-error")
                                .addClass("has-success")
                                .find("label.error")
                                .remove();
                    },
                    submitHandler: function (form) {
                        $.ajax({
                            type: $(form).attr('method'),
                            url: $(form).attr('action'),
                            data: $(form).serialize(),
                            dataType: 'json',
                            beforeSend: function () {
                                $('#contact_submit').attr('disabled', true);
                                $("#contact-ajax-loader").removeClass('hide');
                                $("#contact-message").addClass('hide');
                            }
                        }).done(function (response) {
                            $('#contact_submit').attr('disabled', false);
                            $("#contact-ajax-loader").addClass('hide');
                            _msg_cont = $("#contact-message");
                            _msg_cont.find('div').attr('class', response.class);
                            _msg_cont.find('#cont-msg').html(response.message);
                            _msg_cont.removeClass('hide');
                            if (response.sts == 'success') {
                                change_captcha();
                                $(form)[0].reset();
                            }
                        });
                        return false;
                    }
                });

                $("#PageInquiryFormForm").validate({
                    rules: {
                        'data[Page][inquiry_captcha]': 'required',
                        'data[Page][inquiry_email]': {
                            required: true,
                            email: true
                        },
                    },
                    highlight: function (element) {
                        $(element)
                                .parent()
                                .removeClass("has-success")
                                .addClass("has-error");
                    },
                    success: function (element) {
                        $(element)
                                .parent()
                                .removeClass("has-error")
                                .addClass("has-success")
                                .find("label.error")
                                .remove();
                    },
                    submitHandler: function (form) {
                        $.ajax({
                            type: $(form).attr('method'),
                            url: $(form).attr('action'),
                            data: $(form).serialize(),
                            dataType: 'json',
                            beforeSend: function () {
                                $('#inquiry_submit').attr('disabled', true);
                                $("#inquiry-ajax-loader").removeClass('hide');
                                $("#inquiry-message").addClass('hide');
                            }
                        }).done(function (response) {
                            $('#inquiry_submit').attr('disabled', false);
                            $("#inquiry-ajax-loader").addClass('hide');
                            _msg_cont = $("#inquiry-message");
                            _msg_cont.find('div').attr('class', response.class);
                            _msg_cont.find('#inq-msg').html(response.message);
                            _msg_cont.removeClass('hide');
                            if (response.sts == 'success') {
                                change_captcha();
                                $(form)[0].reset();
                            }
                        });
                        return false;
                    }
                });

                $('.inquiry-toggle').on('click', function () {
                    var _inq_block = $(this).closest('.row');
                    if (_inq_block.find('.inquiry-form').is(':visible')) {
                        $(this).html('<?php echo MyClass::translate('Show Inquiry') ?> <i class="icon icon-angle-down"></i>');
                        _inq_block.find('.inquiry-form').fadeOut();
                    } else {
                        $(this).html('<?php echo _('Hide Inquiry') ?> <i class="icon icon-angle-up"></i>');
                        _inq_block.find('.inquiry-form').fadeIn();
                    }
                });
            });
            function change_captcha()
            {
                $('img.captcha').attr('src', jssite_url + "pages/getCaptcha?rnd=" + Math.random());
            }
        </script>
