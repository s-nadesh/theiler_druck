<div class="sidebar collapse">
    <div class="sidebar-content">

        <!-- User dropdown -->
        <?php $pro_img = $this->requestAction('admins/get_profile_pic/');?>
        <div class="user-menu dropdown">
            <a href="<?php echo SITE_BASE_URL?>admin" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo SITE_BASE_URL.PROFILE_IMAGE_RESIZE_FOLDER.$pro_img['Admin']['admin_profile_image']?>">
                <div class="user-info">
                    <?php echo $this->Session->read('Admin.name'); ?>
                </div>
            </a>
        </div>
        <!-- /user dropdown -->

        <!-- Main navigation -->
        <?php
        $marray = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11); //define number of main menus
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
        </ul>
        <!-- /main navigation -->
    </div>
</div>