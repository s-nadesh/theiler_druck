<div role="main" class="main">
    <div id="content" class="content full">

        <?php echo $this->element('home_slider'); ?>

        <div class="container">
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
        </div>

        <div class="home-concept">
            <div class="container">
                <div class="row center">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="icons-cont"> 
                            <?php echo $this->Html->image("icon-1.jpg", array("width" => "168", "height" => "113")); ?>
                            <p>1. Design erstellen</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="icons-cont"> 
                            <?php echo $this->Html->image("icon-2.jpg", array("width" => "168", "height" => "113")); ?>
                            <p>2. Bild hochladen</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="icons-cont"> 
                            <?php echo $this->Html->image("icon-3.jpg", array("width" => "168", "height" => "113")); ?>
                            <p>3. Druckauftrag erhalten</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row center">
                <div class="col-md-12">
                    <p class="featured lead"></p>
                    <h2 class="short word-rotator-title">
                        <?php echo MyClass::translate('Products'); ?>
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
                                            <i class="icon icon-bars"></i> <?php echo MyClass::translate('Details'); ?> 
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
                        <div class="get-started">
                            <a class="btn btn-lg btn-primary" href="#">Get Started Now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container center"> 
            <div class="row"> 
                <div class="col-md-12">
                    <p class="featured lead">
                    </p>
                    <p class="featured lead">
                        Versand und Bezahlung
                    </p>
                    <h2 class="short word-rotator-title">
                        Ganz entspannt die Outfits testen
                    </h2>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4"> 
                <div class="content-box">
                    <div class="content-box-icon-cont"> 
                        <div class="icons2"><i class="icon icon-gears"></i> </div>
                        <h2> In Ruhe anprobieren </h2>
                        <p> Sie erhalten nach etwa 5 Tagen eine Outfittery-Box mit kompletten Outfits, die Sie 10 Tage lang in Ruhe anprobieren können.</p>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4"> 
                <div class="content-box">
                    <div class="content-box-icon-cont"> 
                        <div class="icons2"><i class="icon icon-bar-chart-o"></i> </div>
                        <h2> Später zahlen</h2>
                        <p> Nur alles was zuhause bleibt und nicht zurückgeschickt wird, muss bezahlt werden. Erst nach der Anprobier-Frist wird die Rechnung gestellt.</p>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4"> 
                <div class="content-box">
                    <div class="content-box-icon-cont"> 
                        <div class="icons2"><i class="icon icon-truck"></i> </div>
                        <h2> Kostenloser Versand </h2>
                        <p> Sowohl Versand als auch Rückversand sind kostenlos. Rücksende-Etiketten für unsere Partner Swiss Post und Päckli Punkt werden gleich mitgeliefert. Päckli Punkt ermöglicht die Abgabe an 800 teilnehmennden Filialen von K-Kiosk und Avec.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>