<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8">
        <title><?php echo SITE_NAME ?></title>
        <meta name="keywords" content="" />

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Libs CSS -->
        <?php
        echo $this->Html->css(array('bootstrap', 'fonts/font-awesome/css/font-awesome'));
        echo $this->Html->css(array('/vendor/owl-carousel/owl.carousel', '/vendor/owl-carousel/owl.theme', '/vendor/magnific-popup/magnific-popup'), 'stylesheet', array('media' => 'screen'));
        echo $this->Html->css(array('theme', 'theme-elements', 'theme-animate'));
        echo $this->Html->css(array('/vendor/rs-plugin/css/settings', '/vendor/circle-flip-slideshow/css/component'), 'stylesheet', array('media' => 'screen'));
        echo $this->Html->css(array('skins/blue', 'custom', 'theme-responsive'));
        ?>

        <!-- Head Libs -->
        <?php echo $this->Html->script('/vendor/modernizr'); ?>

        <!--[if IE]>
        <?php echo $this->Html->css('ie'); ?>
        <![endif]-->

        <!--[if lte IE 8]>
        <?php echo $this->Html->script('/vendor/respond'); ?>
        <![endif]-->

        <?php
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>

    <body>
        <div class="body">
            <?php echo $this->element('header'); ?>

            <?php echo $this->fetch('content'); ?>

            <?php echo $this->element('footer'); ?>
        </div>

        <?php
        echo $this->Html->script(array('/vendor/jquery', 'plugins', '/vendor/jquery.easing', '/vendor/jquery.appear', '/vendor/jquery.cookie', '/vendor/bootstrap', '/vendor/bootstrap/bootstrap-number-input', '/vendor/twitterjs/twitter', '/vendor/rs-plugin/js/jquery.themepunch.plugins.min', '/vendor/rs-plugin/js/jquery.themepunch.revolution.min', '/vendor/owl-carousel/owl.carousel', '/vendor/circle-flip-slideshow/js/jquery.flipshow', '/vendor/magnific-popup/magnific-popup', '/vendor/jquery.validate', 'views/view.home', 'theme', 'custom'));
        ?>
        <script>
            
        </script>
    </body>
</html>
