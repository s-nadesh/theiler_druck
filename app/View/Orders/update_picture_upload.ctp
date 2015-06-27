<?php echo $this->Html->css(array('theme-blog', '/vendor/jQuery-File-Upload/uploadfile'), array('inline' => false)); ?>
<?php echo $this->Html->script(array('/vendor/jQuery-File-Upload/jquery.uploadfile'), array('inline' => false)); ?>
<?php
$order_item = $order['OrderItem'];
$order_item_product_value = MyClass::decodeJSON($order_item['order_item_product_value']);
$uploaded_pictures = $order_item_product_value->item_picture_upload;

$this->Html->addCrumb(MyClass::translate("View Order") . ' #' . $order['Order']['order_unique_id'], array('controller' => 'orders', 'action' => 'view', $order['Order']['order_unique_id'], 'admin' => false));
$this->Html->addCrumb(MyClass::translate('Manage uploaded pictures'));
?>

<div role="main" class="main shop">
    <?php echo $this->element("breadcrumbs"); ?>
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <?php echo $this->element('my_account_sidebar'); ?>
            </div>
            <div class="col-md-9">
                <?php echo $this->Session->flash(); ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10">
                        <h2><?php echo MyClass::translate("Update pictures"); ?> </h2>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <a href="<?php echo SITE_BASE_URL ?>orders/view/<?php echo $order['Order']['order_unique_id'] ?>"> <?php echo MyClass::translate("Back"); ?></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="featured-box featured-box-secundary default info-content">
                            <div class="box-content table-responsive">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <legend>  
                                            <?php echo MyClass::translate("Uploaded pictures"); ?>
                                        </legend>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-xs-12 order_update_picture" id="uploading-div" >
                                        <div class="row">
                                            <div id="mulitplefileuploader"><?php echo MyClass::translate('Picture upload') ?></div>
                                        </div>
                                        <?php if ($uploaded_pictures) { ?>
                                            <div class='clearfix'></div>
                                            <div class="row uploaded-div">
                                                <?php
                                                $i = 1;
                                                foreach ($uploaded_pictures as $orderfile) {
                                                    $image_id = 'image_' . $i;
                                                    ?>
                                                    <div class="col-xs-2 col-sm-2 col-md-2 upload-img-thumb" id="<?php echo $image_id; ?>">
                                                        <?php
                                                        $is_image = MyClass::is_image(WWW_ROOT . ORDER_FILE_FOLDER . $orderfile);
                                                        if ($is_image) {
                                                            echo $this->Html->image('/' . ORDER_FILE_FOLDER . $orderfile, array('class' => '', 'width' => '80', 'height' => '81'));
                                                        } else {
                                                            echo $this->Html->image('default-doc.gif', array('class' => '', 'width' => '80', 'height' => '81'));
                                                        }
                                                        ?>
                                                        <a href="javascript:void(0)" onclick="removeOrderProductImage('<?php echo $orderfile ?>', '<?php echo $image_id; ?>', '<?php echo $order_item['order_item_id'] ?>')">
                                                            <i class="icon icon-times"></i>
                                                        </a>
                                                    </div>
                                                    <?php
                                                    if ($i / 6 == 1)
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
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function removeOrderProductImage(file, imageId, orderItemId) {
        $.ajax({
            url: jssite_url + "orders/removeOrderProductImage",
            type: 'DELETE',
            data: {
                orderItemID: orderItemId,
                fileName: file
            },
            success: function(result) {
                $("#" + imageId).remove();
                // Do something with the result
            }
        });
    }

    $(document).ready(function()
    {
        var settings = {
            url: jssite_url + "orders/insertOrderProductImage/<?php echo $order_item['order_item_id'] ?>",
            dragDrop: true,
            showDone: false,
            fileName: "myfile",
            allowedTypes: "jpg,png,pdf,eps,zip,psd",
            returnType: "json",
            showFileCounter: false,
            onSuccess: function(files, data, xhr)
            {
                var fileExtension = data[0].substring(data[0].lastIndexOf('.') + 1);
                if (fileExtension == 'jpg' || fileExtension == 'png' || fileExtension == 'psd') {
                    _img_src = "<?php echo SITE_BASE_URL . ORDER_FILE_FOLDER ?>" + data[0];
                } else {
                    _img_src = "<?php echo SITE_BASE_URL ?>img/default-doc.gif";
                }
                _img = "<img class='' width='80' height='81' src='" + _img_src + "' alt='img'>";
                _filediv = $('#uploading-div .ajax-file-upload-filename').filter(function(index) {
                    return $(this).text() === files[0];
                });
                _upload = _filediv.closest('.ajax-file-upload-statusbar');
                _upload.find('.ajax-file-upload-progress').html(_img).addClass('uploaded-success');
                _upload.find('.ajax-file-upload-filename').addClass('hide');
            },
            showDelete: true,
            onError: function(files, status, message) {
                alert("error");
                return false;
            },
            deleteCallback: function(data, pd)
            {
                for (var i = 0; i < data.length; i++)
                {
                    $.post(jssite_url + "orders/removeOrderProductImage", {op: "delete", fileName: data[i], orderItemID: '<?php echo $order_item['order_item_id'] ?>'},
                    function(resp, textStatus, jqXHR)
                    {
                        //Show Message  
//                        $("#status").append("<div>File Deleted</div>");
                    });
                }
                pd.statusbar.hide(); //You choice to hide/not.
            }
        }

        var uploadObj = $("#mulitplefileuploader").uploadFile(settings);
    });
</script>