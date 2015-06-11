<?php echo $this->Html->css(array('theme-blog', '/vendor/jQuery-File-Upload/uploadfile'), array('inline' => false)); ?>
<?php echo $this->Html->script(array('/vendor/jQuery-File-Upload/jquery.uploadfile.min'), array('inline' => false)); ?>

<?php
//Product Details
$no_of_pages_json = $product['Product']['product_no_of_pages'];
$no_of_pages_array = MyClass::decodeJSON($no_of_pages_json);
$no_of_pages = MyClass::arrayToString(",", $no_of_pages_array);

$no_of_copies_json = $product['Product']['product_no_of_copies'];
$no_of_copies_array = MyClass::decodeJSON($no_of_copies_json);
$no_of_copies = MyClass::arrayToString(",", $no_of_copies_array);

$paper_variants = $this->requestAction('paper_variants/getPaperVariants');
$paper_array = array();
foreach ($paper_variants as $paper_variant) {
    $paper_array[$paper_variant['PaperVariant']['paper_id']] = $paper_variant['PaperVariant']['paper_rang_grm'] . '(' . $paper_variant['PaperVariant']['paper_rang_mgrm'] . 'mg ' . $paper_variant['PaperVariant']['paper_name'] . ')';
}
$papers = MyClass::arrayToString(",", $paper_array);

$cart_product_no_of_pages = $cart_product_no_of_copies = $cart_product_paper_id = $cart_product_picture_upload = '';
$cart_good_for_print_on_paper_checked = $cart_express_within_4_days_checked = '';
$cart_item_old_key = '';

$cart_product_quantity = 1;
$good_for_print_on_paper_checked = $express_within_4_days_checked = 'checked="checked"';

if ($cart_items_key) {
    $old_key = MyClass::refdecryption($cart_items_key);
    if ($this->Session->check('Shop.CartItems.' . $old_key)) {
        $from_cart_product = $this->Session->read('Shop.CartItems.' . $old_key);
        $cart_product_no_of_pages = $from_cart_product['item_product_no_of_pages'];
        $cart_product_no_of_copies = $from_cart_product['item_product_no_of_copies'];
        $cart_product_paper_id = $from_cart_product['paper_id'];
        $cart_product_quantity = $from_cart_product['item_quantity'];
        $cart_product_picture_upload = $from_cart_product['item_picture_upload'];

        $from_cart_additional = $this->Session->read('Shop.Additional');
        if ($from_cart_additional['good_for_print_on_paper'] > 0) {
            $cart_good_for_print_on_paper_checked = 'checked="checked"';
            $good_for_print_on_paper_checked = '';
        }

        if ($from_cart_additional['express_within_4_days'] > 0) {
            $cart_express_within_4_days_checked = 'checked="checked"';
            $express_within_4_days_checked = '';
        }

        $cart_item_old_key = $old_key;
    }
}
?>
<div role="main" class="main shop">
    <div class="container">
        <hr class="tall">
        <div class="row">
            <div class="col-md-6">
                <div class="thumbnail">
                    <?php echo $this->Html->image('/' . PRODUCT_IMAGE_RESIZE_FOLDER . $product['Product']['product_image'], array("class" => "img-responsive img-rounded", "alt" => $product['Product']['product_name'])) ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="summary entry-summary">
                    <h2 class="shorter"><strong><?php echo $product['Product']['product_name']; ?></strong></h2>
                    <hr class="short">
                    <p class="taller"> <?php echo MyClass::newLineBreak($product['Product']['product_description']); ?> </p>
                    <?php
                    echo $this->Form->create('Cart', array(
                        "action" => "add",
                        "method" => "post",
                        "class" => "cart",
                        'enctype' => 'multipart/form-data')
                    );

                    if ($cart_item_old_key != '') {
                        echo $this->Form->hidden('cart_item_old_key', array('value' => $cart_item_old_key));
                    }
                    echo $this->Form->hidden('product_id', array('value' => $product['Product']['product_id']));
                    ?>
                    <div class="form-group">
                        <label for="inputDefault" class="col-md-3 control-label"><?php echo MyClass::translate('No of pages') ?></label>
                        <div class="col-md-9">
                            <select name="data[Cart][no_of_pages]" class="form-control" id="no-of-pages" onchange="getProductPrice()">
                                <?php
                                foreach ($no_of_pages_array as $page_value) {
                                    $page_value_selected = '';
                                    if ($page_value == $cart_product_no_of_pages)
                                        $page_value_selected = 'selected = "selected"';
                                    ?>
                                    <option value="<?php echo $page_value ?>" <?php echo $page_value_selected; ?>>
                                        <?php echo $page_value ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDefault" class="col-md-3 control-label"><?php echo MyClass::translate('No of copies') ?></label>
                        <div class="col-md-9">
                            <select name="data[Cart][no_of_copies]" class="form-control" id="no-of-copies" onchange="getProductPrice()">
                                <?php
                                foreach ($no_of_copies_array as $copies_value) {
                                    $copies_value_selected = '';
                                    if ($copies_value == $cart_product_no_of_copies)
                                        $copies_value_selected = 'selected = "selected"';
                                    ?>
                                    <option value="<?php echo $copies_value ?>" <?php echo $copies_value_selected; ?>>
                                        <?php echo $copies_value ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDefault" class="col-md-3 control-label"><?php echo MyClass::translate('Paper Weight') ?></label>
                        <div class="col-md-9">
                            <select name="data[Cart][paper_id]" class="form-control">
                                <?php
                                foreach ($paper_array as $paper_key => $paper_value) {
                                    $paper_value_selected = '';
                                    if ($paper_key == $cart_product_paper_id)
                                        $paper_value_selected = 'selected = "selected"';
                                    ?>
                                    <option value="<?php echo $paper_key ?>" <?php echo $paper_value_selected; ?>>
                                        <?php echo $paper_value ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="inputDefault" class="col-md-5 control-label"><?php echo MyClass::translate("Good for print on paper"); ?></label>
                        <div class="col-md-7">
                            <input type="radio" name="data[Cart][good_for_print_on_paper]" value="0" onclick="getProductPrice()" <?php echo $good_for_print_on_paper_checked ?>>
                            <?php echo MyClass::translate("With Out"); ?>
                            <input type="radio" name="data[Cart][good_for_print_on_paper]" value="<?php echo GOOD_FOR_PRINT_ON_PAPER ?>" onclick="getProductPrice()" <?php echo $cart_good_for_print_on_paper_checked ?>>
                            <?php echo MyClass::translate("With"); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDefault" class="col-md-5 control-label"><?php echo MyClass::translate("Express within 4 days"); ?></label>
                        <div class="col-md-7">
                            <input type="radio" name="data[Cart][express_within_4_days]" value="0" checked="checked" onclick="getProductPrice()" <?php echo $express_within_4_days_checked ?>>
                            <?php echo MyClass::translate("With Out"); ?>
                            <input type="radio" name="data[Cart][express_within_4_days]" value="<?php echo EXPRESS_WITHIN_4_DAYS ?>" onclick="getProductPrice()" <?php echo $cart_express_within_4_days_checked ?>>
                            <?php echo MyClass::translate("With"); ?>
                        </div>
                    </div>

                    <hr class="short">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="quantity">
                                        <?php echo $this->Form->input('quantity', array("type" => "number", "class" => "input-text qty text quantity_number", "title" => "Qty", "value" => $cart_product_quantity, "min" => "1", "step" => "1", 'label' => false, 'onchange' => 'getProductPrice()')); ?>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <?php echo $this->Form->submit(MyClass::translate("Add to cart"), array("class" => "btn btn-primary btn-icon", 'div' => false)); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                            <span class="price" style="font-size: 24px">
                                <?php echo MyClass::translate("Price"); ?>: <span id="product-price"></span>
                            </span>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>

                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div id="mulitplefileuploader"><?php echo MyClass::translate('Picture upload') ?></div>
                            <?php if ($cart_product_picture_upload) { ?>
                                <div class='clearfix'></div>
                                <div class="row">
                                    <?php
                                    $i = 1;
                                    foreach ($cart_product_picture_upload as $cartfile) {
                                        $image_id = 'image_' . $i;
                                        ?>
                                        <div class="col-xs-3 col-sm-3 col-md-3" id="<?php echo $image_id; ?>">
                                            <?php echo $this->Html->image('/' . CART_FILE_FOLDER . $cartfile, array('class' => 'img-responsive')); ?>
                                            <a href="javascript:void(0)" onclick="removeCartProductImage('<?php echo $cartfile ?>', '<?php echo $image_id; ?>')">
                                                <i class="icon icon-times"></i>
                                            </a>
                                        </div>
                                        <?php
                                        if ($i / 4 == 1)
                                            echo '</div><div class="clearfix"></div><div class="row">';
                                        $i++;
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                            <div id="status"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tabs tabs-product">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#productInfo" data-toggle="tab"><?php echo MyClass::translate('Aditional Information'); ?></a></li>
                        <li><a href="#productQA" data-toggle="tab"><?php echo MyClass::translate("Ask a Question"); ?></a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="productInfo">
                            <table class="table table-striped push-top">
                                <tbody>
                                    <tr>
                                        <th><?php echo MyClass::translate('No of pages') ?></th>
                                        <td><?php echo $no_of_pages; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo MyClass::translate('No of copies') ?></th>
                                        <td><?php echo $no_of_copies; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo MyClass::translate('Paper Weight') ?></th>
                                        <td><?php echo $papers; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="productQA">
                            <h4><?php echo MyClass::translate("Ask a Question"); ?></h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo $this->Form->create('ProductQuestion', array('class' => 'ask_a_question', 'action' => 'add')); ?>
                                    <?php echo $this->Form->hidden('product_id', array('value' => $product['Product']['product_id'])); ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label><?php echo MyClass::translate("Your name"); ?>*</label>
                                                <?php echo $this->Form->input('question_name', array('class' => 'form-control', 'label' => false)); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <label><?php echo MyClass::translate("Your email address"); ?> *</label>
                                                <?php echo $this->Form->input('question_email', array('class' => 'form-control', 'label' => false)); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <label><?php echo MyClass::translate("Your phone"); ?></label>
                                                <?php echo $this->Form->input('question_phone', array('class' => 'form-control', 'label' => false)); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label><?php echo MyClass::translate("Question") ?> *</label>
                                                <?php echo $this->Form->input('question_content', array('type' => 'textarea', 'class' => 'form-control', 'label' => false)); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label><?php echo MyClass::translate("Captcha") ?> *</label>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="<?php echo SITE_BASE_URL ?>product_questions/getCaptcha" alt="" id="captcha" />
                                                    </div>
                                                    <div class="col-md-2">
                                                        <?php echo $this->Form->input('captcha', array('class' => 'form-control', 'label' => false)); ?>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <?php echo $this->Html->image("refresh.jpg", array("width" => "25", "alt" => "", "id" => "refresh")); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php echo $this->Form->submit(MyClass::translate("Submit"), array('class' => 'btn btn-primary btn-lg')); ?>
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
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        getProductPrice();

        $("body").on("click", ".quantity .input-group-btn", function() {
            getProductPrice();
        });

        // refresh captcha
        $('img#refresh').click(function() {
            change_captcha();
        });

        //Product ask a question section.
        $(".ask_a_question").validate({
            rules: {
                'data[ProductQuestion][question_name]': {
                    required: true,
                },
                'data[ProductQuestion][question_email]': {
                    required: true,
                    email: true,
                },
                'data[ProductQuestion][question_content]': {
                    required: true,
                },
                'data[ProductQuestion][captcha]': {
                    required: true,
                },
            },
            highlight: function(element) {
                $(element)
                        .parent()
                        .removeClass("has-success")
                        .addClass("has-error");
            },
            success: function(element) {
                $(element)
                        .parent()
                        .removeClass("has-error")
                        .addClass("has-success")
                        .find("label.error")
                        .remove();
            },
            submitHandler: function(form) {
                $.ajax({
                    type: $(form).attr('method'),
                    url: $(form).attr('action'),
                    data: $(form).serialize(),
                })
                        .done(function(response) {
                            if (response == 'success') {
                                change_captcha();
                                clear_form();
                                alert("Your question submitted successfully");
                            } else if (response == 'captcha_fail') {
                                alert("Please enter correct captcha code");
                            }
                        });
                return false; // required to block normal submit since you used ajax
            }
        });
    });

    function getProductPrice() {
        var product_id = $("#CartProductId").val();
        var no_of_pages = $("#no-of-pages").val();
        var no_of_copies = $("#no-of-copies").val();
        var quantity = $("#CartQuantity").val();
        $.ajax({
            url: "<?php echo SITE_BASE_URL ?>product_prices/getProductPrice/" + product_id + "/" + no_of_pages + "/" + no_of_copies + "/" + quantity,
            type: "POST",
            success: function(result) {
                placePrice(result);
            }
        });
    }

    function placePrice(result) {
        var good_for_print = $('input:radio[name="data[Cart][good_for_print_on_paper]"]:checked').val();
        var express = $('input:radio[name="data[Cart][express_within_4_days]"]:checked').val();
        var total = parseFloat(good_for_print) + parseFloat(express) + parseFloat(result);
        $("#product-price").html(total + "CHF");
    }

    function change_captcha()
    {
        document.getElementById('captcha').src = jssite_url + "product_questions/getCaptcha?rnd=" + Math.random();
    }

    function clear_form()
    {
        $("#ProductQuestionQuestionName").val('');
        $("#ProductQuestionQuestionEmail").val('');
        $("#ProductQuestionQuestionPhone").val('');
        $("#ProductQuestionQuestionContent").val('');
        $("#ProductQuestionCaptcha").val('');
    }

    function removeCartProductImage(file, imageId) {
        $.ajax({
            url: jssite_url + "carts/removeCartProductImage",
            type: 'DELETE',
            data: {
                cartItem: '<?php echo $cart_items_key ?>',
                fileName: file
            },
            success: function(result) {
                $("#" + imageId).remove();
                // Do something with the result
            }
        });
    }

</script>

<script>
    $(document).ready(function()
    {
        var settings = {
            url: jssite_url + "carts/fileUpload",
            dragDrop: true,
            showDone: false,
            fileName: "myfile",
            allowedTypes: "jpg,png,gif",
            returnType: "json",
            onSuccess: function(files, data, xhr)
            {
//                alert((data));
            },
            showDelete: true,
            deleteCallback: function(data, pd)
            {
                for (var i = 0; i < data.length; i++)
                {
                    $.post(jssite_url + "carts/fileDelete", {op: "delete", name: data[i]},
                    function(resp, textStatus, jqXHR)
                    {
                        //Show Message  
                        $("#status").append("<div>File Deleted</div>");
                    });
                }
                pd.statusbar.hide(); //You choice to hide/not.
            }
        }

        var uploadObj = $("#mulitplefileuploader").uploadFile(settings);
    });
</script>