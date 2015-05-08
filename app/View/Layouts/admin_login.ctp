<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo SITE_NAME; ?></title>

        <?php echo $this->Html->css(array('admin/bootstrap.min', 'admin/londinium-theme', 'admin/styles', 'admin/icons')); ?>

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
        
        <?php echo $this->Html->script(array('admin/plugins/charts/sparkline.min', 'admin/plugins/forms/uniform.min', 'admin/plugins/forms/select2.min', 'admin/plugins/forms/inputmask', 'admin/plugins/forms/autosize', 'admin/plugins/forms/inputlimit.min', 'admin/plugins/forms/listbox', 'admin/plugins/forms/multiselect', 'admin/plugins/forms/validate.min', 'admin/plugins/forms/tags.min', 'admin/plugins/forms/switch.min', 'admin/plugins/forms/uploader/plupload.full.min', 'admin/plugins/forms/uploader/plupload.queue.min', 'admin/plugins/forms/wysihtml5/wysihtml5.min', 'admin/plugins/forms/wysihtml5/toolbar', 'admin/plugins/interface/daterangepicker', 'admin/plugins/interface/fancybox.min', 'admin/plugins/interface/moment', 'admin/plugins/interface/jgrowl.min', 'admin/plugins/interface/datatables.min', 'admin/plugins/interface/colorpicker', 'admin/plugins/interface/fullcalendar.min', 'admin/plugins/interface/timepicker.min', 'admin/plugins/interface/collapsible.min', 'admin/bootstrap.min', 'admin/application', 'admin/custom_validations')); ?>
        
        <?php
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>

    <body class="full-width page-condensed">

        <!-- Navbar -->
        <div class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-right">
                    <span class="sr-only">Toggle navbar</span>
                    <i class="icon-grid3"></i>
                </button>
                <a class="navbar-brand" href="<?php echo SITE_BASE_URL?>admin/login">
                    <?php echo SITE_NAME; ?>
                </a>
            </div>
        </div>
        <!-- /navbar -->

        <!-- Login wrapper -->
        <div class="login-wrapper">
            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>
        </div>  
        <!-- /login wrapper -->

        <!-- Footer -->
        <div class="footer clearfix">
            <div class="pull-left">&copy; <?php echo date("Y") ?>. <?php echo SITE_NAME; ?></div>
        </div>
        <!-- /footer -->
    </body>
</html>