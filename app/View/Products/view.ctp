<?php echo $this->Html->css(array('theme-shop', 'theme-blog'), array('inline' => false)); ?>

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

$zip_code_list = $this->requestAction('shipping_costs/getZipCodeList');
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
                    <p class="taller">
                        <?php echo MyClass::newLineBreak($product['Product']['product_description']); ?>
                    </p>

                    <?php
                    echo $this->Form->create('Cart', array("action" => "add", "method" => "post", "class" => "cart"));
                    echo $this->Form->input('product_id', array('type' => 'hidden', 'value' => $product['Product']['product_id']));
                    ?>
                    <div class="form-group">
                        <label for="inputDefault" class="col-md-3 control-label"><?php echo __('No of pages') ?></label>
                        <div class="col-md-6">
                            <select name="data[Cart][no_of_pages]" class="form-control">
                                <?php foreach ($no_of_pages_array as $page_value) { ?>
                                    <option value="<?php echo $page_value ?>"><?php echo $page_value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDefault" class="col-md-3 control-label"><?php echo __('No of copies') ?></label>
                        <div class="col-md-6">
                            <select name="data[Cart][no_of_copies]" class="form-control">
                                <?php foreach ($no_of_copies_array as $copies_value) { ?>
                                    <option value="<?php echo $copies_value ?>"><?php echo $copies_value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDefault" class="col-md-3 control-label"><?php echo __('Papers') ?></label>
                        <div class="col-md-6">
                            <select name="data[Cart][paper_id]" class="form-control">
                                <?php foreach ($paper_array as $paper_key => $paper_value) { ?>
                                    <option value="<?php echo $paper_key ?>"><?php echo $paper_value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDefault" class="col-md-3 control-label"><?php echo __('Zip code') ?></label>
                        <div class="col-md-6">
                            <select name="data[Cart][sh_cost_id]" class="form-control">
                                <?php foreach ($zip_code_list as $zip_key => $zip_value) { ?>
                                    <option value="<?php echo $zip_key ?>"><?php echo $zip_value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="quantity">
                        <input type="button" class="minus" value="-">
                        <?php echo $this->Form->input('quantity', array("type" => "number", "class" => "input-text qty text", "title" => "Qty", "value" => "1", "min" => "1", "step" => "1", 'label' => false)); ?>
                        <input type="button" class="plus" value="+">
                    </div>

                    <?php echo $this->Form->submit(__("Add to cart"), array("class" => "btn btn-primary btn-icon", 'div' => false)); ?>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tabs tabs-product">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#productInfo" data-toggle="tab"><?php echo __('Aditional Information'); ?></a></li>
                        <li><a href="#productReviews" data-toggle="tab"><?php echo __('Reviews'); ?>(2)</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="productInfo">
                            <table class="table table-striped push-top">
                                <tbody>
                                    <tr>
                                        <th><?php echo __('No of pages') ?></th>
                                        <td><?php echo $no_of_pages; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __('No of copies') ?></th>
                                        <td><?php echo $no_of_copies; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __('Papers') ?></th>
                                        <td><?php echo $papers; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="productReviews">
                            <ul class="comments">
                                <li>
                                    <div class="comment">
                                        <div class="img-thumbnail">
                                            <img class="avatar" alt="" src="img/avatar-2.jpg">
                                        </div>
                                        <div class="comment-block">
                                            <div class="comment-arrow"></div>
                                            <span class="comment-by">
                                                <strong>John Doe</strong>
                                                <span class="pull-right">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%"><strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                </span>
                                            </span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <hr class="tall">
                            <h4>Add a review</h4>
                            <div class="row">
                                <div class="col-md-12">

                                    <form action="" id="submitReview" type="post">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>Your name *</label>
                                                    <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Your email address *</label>
                                                    <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label>Review *</label>
                                                    <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit" value="Submit Review" class="btn btn-primary" data-loading-text="Loading...">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>