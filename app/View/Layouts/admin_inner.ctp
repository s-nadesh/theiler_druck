<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_BASE_URL; ?>img/theilerlogo16x16.png">
        <title><?php echo SITE_NAME; ?></title>

        <?php echo $this->Html->css(array('admin/bootstrap.min', 'admin/londinium-theme', 'admin/styles', 'admin/icons')); ?>

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

        <script type="text/javascript">
            var SUCCESS_TXT = '<?php echo MyClass::translate('Success') ?>';
        </script>
        <?php
        echo $this->Html->script(array('admin/plugins/charts/sparkline.min', 'admin/plugins/forms/uniform.min', 'admin/plugins/forms/select2.min', 'admin/plugins/forms/inputmask', 'admin/plugins/forms/autosize', 'admin/plugins/forms/inputlimit.min', 'admin/plugins/forms/listbox', 'admin/plugins/forms/multiselect', 'admin/plugins/forms/validate.min', 'admin/plugins/forms/additional-methods.min', 'admin/plugins/forms/tags.min', 'admin/plugins/forms/switch.min', 'admin/plugins/forms/uploader/plupload.full.min', 'admin/plugins/forms/uploader/plupload.queue.min', 'admin/plugins/forms/wysihtml5/wysihtml5.min', 'admin/plugins/forms/wysihtml5/toolbar', 'admin/plugins/interface/daterangepicker', 'admin/plugins/interface/fancybox.min', 'admin/plugins/interface/moment', 'admin/plugins/interface/jgrowl.min', 'admin/plugins/interface/datatables.min', 'admin/plugins/interface/colorpicker', 'admin/plugins/interface/fullcalendar.min', 'admin/plugins/interface/timepicker.min', 'admin/plugins/interface/collapsible.min', 'admin/bootstrap.min', 'admin/application', 'admin/custom_validations', 'ckeditor/ckeditor'));
        if ($this->Session->check('Config.language') && $this->Session->read('Config.language') != 'eng') {
            echo $this->Html->script(array("admin/plugins/forms/languages/messages_{$this->Session->read('Config.language')}.js"));
        }

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <script type="text/javascript">
            $(document).ready(function () {
                _uploader = $(".uploader");
                if (_uploader.length > 0) {
                    $(_uploader).find('.filename').html('<?php echo MyClass::translate('No File Selected') ?>');
                }
            })
        </script>
    </head>

    <body class="sidebar-wide">

        <!-- Navbar -->
        <?php echo $this->element('admin/navbar'); ?>
        <!-- /navbar -->


        <!-- Page container -->
        <div class="page-container">

            <!-- Sidebar -->
            <?php echo $this->element('admin/sidebar'); ?>
            <!-- /sidebar -->

            <!-- Page content -->
            <div class="page-content">

                <!-- Breadcrumbs line -->
                <div class="breadcrumb-line">
                    <?php
                    echo $this->Html->getCrumbList(array(
                        'firstClass' => false,
                        'lastClass' => 'active',
                        'class' => 'breadcrumb'
                            ), array(
                        'text' => MyClass::translate('Home'),
                        'url' => array('controller' => 'admins', 'action' => 'index', 'admin' => true),
                            )
                    );
                    ?>
                </div>
                <!-- /breadcrumbs line -->

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-title">
                        <h3><?php echo MyClass::translate($title_for_layout); ?></h3>
                    </div>
                </div>
                <!-- /page header -->

                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>

                <!-- Footer -->
                <div class="footer clearfix">
                    <div class="pull-left">&copy; <?php echo date("Y") ?>. <?php echo SITE_NAME; ?></div>
                </div>
                <!-- /footer -->
            </div>
            <!-- /page content -->
        </div>
        <!-- /page container -->
    </body>
</html>