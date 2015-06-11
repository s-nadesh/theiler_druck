<div role="main" class="main">
    <div id="content" class="content full">

        <?php echo $this->element('home_slider'); ?>

        <!--        <div class="container">
                    <div class="row center">
                        <div class="col-md-12">
                            <p class="featured lead">
                            </p>
                            <p class="featured lead">
                                So Funktioniert's
                            </p>
                            <h2 class="short word-rotator-title">
                                Der angenehmste Weg zur perfekten Firmendruckvorlage
                            </h2>
                        </div>
                    </div>
                </div>-->

        <!--        <div class="home-concept">
                    <div class="container">
                        <div class="row center">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="icons-cont"> 
        <?php // echo $this->Html->image("icon-1.jpg", array("width" => "168", "height" => "113")); ?>
                                    <p>1. Design erstellen</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="icons-cont"> 
        <?php // echo $this->Html->image("icon-2.jpg", array("width" => "168", "height" => "113")); ?>
                                    <p>2. Bild hochladen</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="icons-cont"> 
        <?php // echo $this->Html->image("icon-3.jpg", array("width" => "168", "height" => "113")); ?>
                                    <p>3. Druckauftrag erhalten</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->

        <div class="container">
            <div class="row center">
                <div class="col-md-12">
                    <p class="featured lead"></p>
                    <h2 class="short word-rotator-title">
                        <?php echo __('Products'); ?>
                    </h2>
                    <?php
                    $home_products = $this->requestAction('products/getProducts');
                    if (!empty($home_products)) {
                        foreach ($home_products as $home_product) {
                            ?>
                            <div class="col-xs-15 col-sm-15 col-md-15">  
                                <div class="products-type-cont">
                                    <a href="<?php echo SITE_BASE_URL ?>product/<?php echo $home_product['Product']['product_slug'] ?>">  
                                        <?php echo $this->Html->image('/' . PRODUCT_IMAGE_FOLDER . $home_product['Product']['product_image'], array("class" => "img-responsive")); ?>
                                    </a>
                                    <p> 
                                        <a href="<?php echo SITE_BASE_URL ?>product/<?php echo $home_product['Product']['product_slug'] ?>">
                                            <?php echo $home_product['Product']['product_name']; ?>
                                        </a>
                                    </p>
                                    <p class="deatils-btn"> 
                                        <a href="<?php echo SITE_BASE_URL ?>product/<?php echo $home_product['Product']['product_slug'] ?>">
                                            <i class="icon icon-bars"></i> <?php echo __('Details'); ?> 
                                        </a> 
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <section class="parallax" data-parallax="scroll" data-image-src="<?php echo SITE_BASE_URL ?>img/parallax.jpg" >
            <div class="container">
                <div class="row center">
                    <div class="col-md-12">
                        <h2 class="short text-shadow big  bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
                        <!--                        <div class="get-started">
                                                    <a class="btn btn-lg btn-primary" href="#">Get Started Now!</a>
                                                </div>-->
                    </div>
                </div>
            </div>
        </section>

        <div class="container center"> 
            <div class="row"> 
                <div class="col-md-12">
<!--                    <p class="featured lead">
                    </p>
                    <p class="featured lead">
                        Versand und Bezahlung
                    </p>-->
                    <h2 class="short word-rotator-title">
                        Ihre Vorteile bei uns
                    </h2>
                </div>
            </div>

            <?php
            $services = ClassRegistry::init('Service')->find('all', array('order' => array('Service.sort_value ASC')));
            $count = count($services);
            $columns = floor(12 / $count );
            foreach ($services as $key => $service) {
                ?>
                <div class="col-xs-12 col-sm-<?php echo $columns; ?> col-md-<?php echo $columns; ?>"> 
                    <div class="content-box">
                        <div class="content-box-icon-cont"> 
                            <div class="icons2"><i class="icon icon-<?php echo $service['Service']['service_image']?>"></i> </div>
                            <h2> <?php echo $service['Service']['service_title']?> </h2>
                            <p> <?php echo $service['Service']['service_caption']?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

    </div>
</div>