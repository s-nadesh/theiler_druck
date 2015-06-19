<div class="sidebar collapse">
    <div class="sidebar-content">

        <!-- User dropdown -->
        <?php $pro_img = $this->requestAction('admins/get_profile_pic/'); ?>
        <div class="user-menu dropdown">
            <a href="<?php echo SITE_BASE_URL ?>admin" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo SITE_BASE_URL . PROFILE_IMAGE_RESIZE_FOLDER . $pro_img['Admin']['admin_profile_image'] ?>">
                <div class="user-info">
                    <?php echo $this->Session->read('Admin.name'); ?>
                </div>
            </a>
        </div>
        <!-- /user dropdown -->

        <!-- Main navigation -->
        <?php
        $marray = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13); //define number of main menus
        $sarray = array(0, 1); //define number of main menus
        if (@$admin_menu == 'admins')
            $marray[0] = 'active';
        elseif (@$admin_menu == 'paper_variants')
            $marray[1] = 'active';
        elseif (@$admin_menu == 'products')
            $marray[2] = 'active';
        elseif (@$admin_menu == 'shipping_costs')
            $marray[3] = 'active';
        elseif (@$admin_menu == 'product_prices')
            $marray[4] = 'active';
        elseif (@$admin_menu == 'product_questions')
            $marray[5] = 'active';
        elseif (@$admin_menu == 'languages')
            $marray[6] = 'active';
        elseif (@$admin_menu == 'pages')
            $marray[7] = 'active';
        elseif (@$admin_menu == 'users')
            $marray[8] = 'active';
        elseif (@$admin_menu == 'orders')
            $marray[9] = 'active';
        elseif (@$admin_menu == 'services')
            $marray[10] = 'active';
        elseif (@$admin_menu == 'contactpersons')
            $marray[11] = 'active';
        elseif (@$admin_menu == 'contact_addresses')
            $marray[12] = 'active';
        elseif (@$admin_menu == 'pictures')
            $marray[13] = 'active';

        if (@$admin_submenu == 'slider')
            $sarray[0] = 'active';
        elseif (@$admin_submenu == 'parralex')
            $sarray[1] = 'active';

        echo@$admin_submenu;
        ?>
        <ul class="navigation">
            <li class="<?php echo $marray[0] ?>">
                <a href="<?php echo SITE_BASE_URL ?>admin">
                    <span><?php echo MyClass::translate("Dashboard"); ?></span> <i class="icon-dashboard"></i>
                </a>
            </li>
            <li class="<?php echo $marray[1] ?>">
                <a href="<?php echo SITE_BASE_URL ?>admin/paper_variants">
                    <span><?php echo MyClass::translate("Paper Variants"); ?></span><i class="icon-file6"></i>
                </a>
            </li>
            <li class="<?php echo $marray[2] ?>">
                <a href="<?php echo SITE_BASE_URL ?>admin/products">
                    <span><?php echo MyClass::translate("Products"); ?></span><i class="icon-paragraph-justify2"></i>
                </a>
            </li>
            <li class="<?php echo $marray[3] ?>">
                <a href="<?php echo SITE_BASE_URL ?>admin/shipping_costs">
                    <span><?php echo MyClass::translate("Shipping Costs"); ?></span><i class="icon-coin"></i>
                </a>
            </li>
            <li class="<?php echo $marray[5] ?>">
                <a href="<?php echo SITE_BASE_URL ?>admin/product_questions">
                    <span><?php echo MyClass::translate("Product Q&A"); ?></span><i class="icon-question"></i>
                </a>
            </li>
            <li class="<?php echo $marray[6] ?>">
                <a href="<?php echo SITE_BASE_URL ?>admin/languages">
                    <span><?php echo MyClass::translate("Languages"); ?></span><i class="icon-bookmarks"></i>
                </a>
            </li>
            <li class="<?php echo $marray[7] ?>">
                <a href="<?php echo SITE_BASE_URL ?>admin/pages">
                    <span><?php echo MyClass::translate("Cms"); ?></span><i class="icon-book"></i>
                </a>
            </li>
            <li class="<?php echo $marray[8] ?>">
                <a href="<?php echo SITE_BASE_URL ?>admin/users">
                    <span><?php echo MyClass::translate("Users"); ?></span><i class="icon-users"></i>
                </a>
            </li>
            <li class="<?php echo $marray[9] ?>">
                <a href="<?php echo SITE_BASE_URL ?>admin/orders">
                    <span><?php echo MyClass::translate("Orders"); ?></span><i class="icon-cart"></i>
                </a>
            </li>
            <li class="<?php echo $marray[10] ?>">
                <a href="<?php echo SITE_BASE_URL ?>admin/services">
                    <span><?php echo MyClass::translate("Services"); ?></span><i class="icon-podium"></i>
                </a>
            </li>
            <li class="<?php echo $marray[11] ?>">
                <a href="<?php echo SITE_BASE_URL ?>admin/contact_persons">
                    <span><?php echo MyClass::translate("Contact Persons"); ?></span><i class="icon-phone3"></i>
                </a>
            </li>
            <li class="<?php echo $marray[12] ?>">
                <a href="<?php echo SITE_BASE_URL ?>admin/contact_addresses">
                    <span><?php echo MyClass::translate("Contact Address"); ?></span><i class="icon-address-book"></i>
                </a>
            </li>
            <li class="<?php echo $marray[13] ?>">
                <a href="#" class="expand" id="second-level"><span><?php echo __('Images') ?></span> <i class="icon-images"></i></a>
                <ul>
                    <li class="<?php echo $sarray[0] ?>"><a href="<?php echo SITE_BASE_URL ?>admin/pictures"><?php echo __("Slider"); ?></a></li>
                    <li class="<?php echo $sarray[1] ?>"><a href="<?php echo SITE_BASE_URL ?>admin/pictures/parralex"><?php echo __("Parallax"); ?></a></li>
                </ul>
            </li>
        </ul>
        <!-- /main navigation -->
    </div>
</div>