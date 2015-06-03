<header class="colored flat-menu">
    <div class="header-top">
        <div class="container">
            <nav>
                <ul class="nav nav-pills nav-top">
                    <li class="phone">
                        <span><i class="icon icon-phone"></i> Tel. 044 787 03 00 </span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon icon-angle-right"></i>info@theilerdruck.ch
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="col-xs-12 col-sm-6 col-md-5">
            <h1 class="logo">
                <a href="<?php echo SITE_BASE_URL; ?>">
                    <?php echo $this->Html->image("theilerdrucklogo.png", array("alt" => SITE_NAME, "width" => "380", "height" => "70", "data-sticky-width" => "300", "data-sticky-height" => "55")); ?>
                </a>
            </h1>
        </div>
        <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".primary-nav">
            <i class="icon icon-bars"></i>
        </button>
    </div>
    <div class="navbar-collapse nav-main-collapse collapse primary-nav">
        <div class="container">
            <nav class="nav-main mega-menu">
                <ul class="nav nav-pills nav-main" id="mainMenu">
                    <li class="dropdown active">
                        <a class="dropdown-toggle" href="<?php echo SITE_BASE_URL ?>"> Start </a>
                    </li>
                    <li class="dropdown active">
                        <a class="dropdown-toggle" href="<?php echo SITE_BASE_URL ?>"> Produkte </a>
                    </li>
                    <li class="dropdown active">
                        <a class="dropdown-toggle" href="#"> Kontakt </a>
                    </li>
                    <li class="dropdown active">
                        <a class="dropdown-toggle" href="#">  Verlag </a>
                    </li>

                    <?php if (!$logged_in) { ?>
                    <li class="dropdown btn btn-lg btn-primary login-btn mega-menu-item mega-menu-shop">
                        <a class="dropdown-toggle mobile-redirect" href="<?php echo SITE_BASE_URL ?>users/login">
                                <?php echo MyClass::translate("Login"); ?>
                            <i class="icon icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                                <?php
                                                echo $this->Form->create('User', array(
                                                    'class' => 'user_login_popupform',
                                                    'url' => array('controller' => 'users', 'action' => 'login')
                                                ));
                                                ?>
                                            <table cellspacing="0" class="cart">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                                <?php
                                                                echo $this->Form->input('user_email', array('label' => false, "placeholder" => 'Email', "class" => "form-control", 'id' => 'user-email-popupform'));
                                                                ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                                <?php
                                                                echo $this->Form->password('user_password', array('label' => false, "class" => "form-control", "placeholder" => 'Password', 'id' => 'user-password-popupform'));
                                                                ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="actions" colspan="6">
                                                            <div class="actions-continue">
                                                                <ul>
                                                                    <li>
                                                                        <span><?php echo MyClass::translate("New here ?") ?>&nbsp;</span>
                                                                        <a href="<?php echo SITE_BASE_URL ?>users/register">
                                                                                <?php echo MyClass::translate("Register now"); ?>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <input type="submit" value="<?php echo MyClass::translate("Login"); ?>" name="proceed" class="btn btn-lg pull-right btn-primary">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                                <?php echo $this->Form->end(); ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <?php } else { ?>
                    <li class="dropdown active">
                            <?php echo $this->Html->link(MyClass::translate("My Account"), array('controller' => 'users', 'action' => 'profile')); ?>
                    </li>
                    <?php } ?>

                    <li class="dropdown cart-btn mega-menu-item mega-menu-shop">
                        <a href="<?php echo SITE_BASE_URL ?>carts" class="dropdown-toggle mobile-redirect">
                            <i class="icon icon-shopping-cart"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table cellspacing="0" class="cart">
                                                <tbody>
                                                    <?php
                                                    if ($this->Session->check('Shop')) {
                                                        $popup_cart = $this->Session->read('Shop');
                                                        foreach ($popup_cart['CartItems'] as $popup_cart_item) {
                                                            ?>
                                                    <tr>
                                                        <td class="product-thumbnail">
                                                            <a href="<?php echo SITE_BASE_URL ?>product/<?php echo $popup_cart_item['product_slug'] ?>">
                                                                        <?php echo $this->Html->image('/' . PRODUCT_IMAGE_RESIZE_FOLDER . $popup_cart_item['product_image'], array("class" => "img-responsive", "width" => "100", "height" => "100")); ?>
                                                            </a>
                                                        </td>
                                                        <td class="product-name">
                                                            <a href="<?php echo SITE_BASE_URL ?>product/<?php echo $popup_cart_item['product_slug'] ?>">
                                                                        <?php echo $popup_cart_item['product_name']; ?><br>

                                                            </a>
                                                        </td>
                                                        <td>
                                                                    <?php echo $popup_cart_item['item_quantity']; ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <span class="amount">
                                                                <strong>
                                                                            <?php echo MyClass::currencyFormat($popup_cart_item['item_sub_price']) ?>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                        <?php } ?>
                                                    <tr>
                                                        <td class="actions" colspan="6">
                                                            <div>
                                                                <input type="button" value="<?php echo MyClass::translate("View Cart") ?>" class="btn btn-default popup_buttons" data-popupredirect = "<?php echo SITE_BASE_URL ?>carts">
                                                                <input type="button" value="<?php echo MyClass::translate("Proceed to Checkout") ?>" name="proceed" class="btn pull-right btn-primary popup_buttons text-right" data-popupredirect = "<?php echo SITE_BASE_URL ?>checkouts">
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <?php } else { ?>
                                                    <tr>
                                                        <td class="actions" colspan="6">
                                                            <div class="actions-continue">
                                                                    <?php echo MyClass::translate("Your cart is currently empty"); ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <?php if ($cms_page_menu) { ?>
    <div class="secondry-menu">
        <div class="container">
            <div class="row">
                <div class="single-menu flat-menu secondry-mainnav">
                    <div class="container">
                        <button class="btn btn-responsive-nav btn-inverse secondry-btn" data-toggle="collapse" data-target=".secondary-nav">
                            <i class="icon icon-bars"></i>
                        </button>
                    </div>
                    <div class="navbar-collapse nav-main-collapse secondary-nav collapse">
                        <div class="container">
                            <nav class="nav-main">
                                    <?php $links = Myclass::getOnePageListMenu(); ?>
                                <ul class="nav nav-pills nav-main nav-main2" id="mainMenu2">
                                    <?php
                                    foreach($links as $k => $link){
                                     $active_class = ($k==0) ? 'active' : '';
                                    ?>
                                    <li class="dropdown <?php echo $active_class; ?>">
                                        <a data-hash class="dropdown-toggle" href="#<?php echo strtolower($link['Page']['page_title']) ?>"> <?php echo $link['Page']['page_title'] ?> </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</header>