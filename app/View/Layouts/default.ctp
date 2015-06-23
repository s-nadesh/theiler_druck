<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8">
        <title><?php echo SITE_NAME ?></title>
        <meta name="keywords" content="" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_BASE_URL; ?>img/theilerlogo16x16.png">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Libs CSS -->
        <?php
        echo $this->Html->css(array('bootstrap', 'fonts/font-awesome/css/font-awesome'));

        echo $this->Html->css(array('/vendor/owl-carousel/owl.carousel', '/vendor/owl-carousel/owl.theme', '/vendor/magnific-popup/magnific-popup'), 'stylesheet', array('media' => 'screen'));

        echo $this->Html->css(array('theme', 'theme-elements', 'theme-animate', 'theme-shop'));

        echo $this->Html->css(array('/vendor/nivo-slider/nivo-slider', '/vendor/nivo-slider/themes/default/default', '/vendor/rs-plugin/css/settings', '/vendor/circle-flip-slideshow/css/component'), 'stylesheet', array('media' => 'screen'));

        echo $this->Html->css(array('skins/blue', 'custom', 'custom_nad', 'theme-responsive'));
        ?>

        <!-- Head Libs -->
        <?php echo $this->Html->script(array('/vendor/modernizr', '/vendor/jquery')); ?>

        <!--[if IE]>
        <?php echo $this->Html->css('ie'); ?>
        <![endif]-->

        <!--[if lte IE 8]>
        <?php echo $this->Html->script('/vendor/respond'); ?>
        <![endif]-->

        <!-- Date Picker -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <?php echo $this->Html->script('/vendor/respond'); ?>
        <script>
        var jssite_url ='<?php echo SITE_BASE_URL ?>';
        </script>

        <?php
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        
        
    </head>

    <body <?php if(isset($body_attr)) echo $body_attr; ?>>
    
    <div id="fl_menu">
    
  <a href="http://www.sdv-award.ch/" target="_blank" >   <img src="<?php echo SITE_BASE_URL ?>img/sdv_small.png"  alt="" /> </a>
	
	
    </div>
</div>
        <div class="body">
            <?php echo $this->element('header'); ?>

            <?php echo $this->fetch('content'); ?>

            <?php echo $this->element('footer'); ?>
        </div>

        <?php
        echo $this->Html->script(array('plugins', '/vendor/jquery.easing', '/vendor/jquery.appear', '/vendor/jquery.cookie', '/vendor/bootstrap', '/vendor/bootstrap/bootstrap-number-input', '/vendor/twitterjs/twitter', '/vendor/rs-plugin/js/jquery.themepunch.plugins.min', '/vendor/rs-plugin/js/jquery.themepunch.revolution.min', '/vendor/owl-carousel/owl.carousel', '/vendor/circle-flip-slideshow/js/jquery.flipshow', '/vendor/magnific-popup/magnific-popup', '/vendor/jquery.stellar', '/vendor/jquery.validate', '/vendor/parallax', '/vendor/nivo-slider/jquery.nivo.slider', 'views/view.home', 'theme', 'custom', 'jquery.easing.1.3'));
        
        if($this->Session->check('Config.language') && $this->Session->read('Config.language') != 'eng'){
            echo $this->Html->script(array("/vendor/jquery.validation/languages/messages_{$this->Session->read('Config.language')}.js"));
        }
        ?>

<script>
//config
$float_speed=1500; //milliseconds
$float_easing="easeOutQuint";
$menu_fade_speed=500; //milliseconds
$closed_menu_opacity=0.75;

//cache vars
$fl_menu=$("#fl_menu");
$fl_menu_menu=$("#fl_menu .menu");
$fl_menu_label=$("#fl_menu .label");

$(window).load(function() {
	menuPosition=$('#fl_menu').position().top;
	FloatMenu();
	$fl_menu.hover(
		function(){ //mouse over
			$fl_menu_label.fadeTo($menu_fade_speed, 1);
			$fl_menu_menu.fadeIn($menu_fade_speed);
		},
		function(){ //mouse out
			$fl_menu_label.fadeTo($menu_fade_speed, $closed_menu_opacity);
			$fl_menu_menu.fadeOut($menu_fade_speed);
		}
	);
});

$(window).scroll(function () { 
	FloatMenu();
});

function FloatMenu(){
	var scrollAmount=$(document).scrollTop();
	var newPosition=menuPosition+scrollAmount;
	if($(window).height()<$fl_menu.height()+$fl_menu_menu.height()){
		$fl_menu.css("top",menuPosition);
	} else {
		$fl_menu.stop().animate({top: newPosition}, $float_speed, $float_easing);
	}
}
</script>
    </body>
</html>
