<header class="colored flat-menu">
    <div class="header-top">
        <div class="container">
            <nav>
                <ul class="nav nav-pills nav-top">
                    <li class="phone">
                        <span><i class="icon icon-phone"></i>
                            Tel. 044 787 03 00 </span>
                    </li>
                    <li>
                        <a href="#"><i class="icon icon-angle-right"></i>Fax 044 787 03 01</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon icon-angle-right"></i>info@theilerdruck.ch</a>
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
        <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
            <i class="icon icon-bars"></i>
        </button>
    </div>
    <div class="navbar-collapse nav-main-collapse collapse">
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
                        <a class="dropdown-toggle" href="#"> Anfahrt </a>
                    </li>
                    <li class="dropdown active">
                        <a class="dropdown-toggle" href="#">  Verlag </a>
                    </li>

                    <li class="dropdown mega-menu-item mega-menu-shop">
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
                                                                    <input type="button" value="<?php echo __("View Cart") ?>" class="btn btn-default popup_buttons" data-popupredirect = "<?php echo SITE_BASE_URL ?>carts">
                                                                    <input type="button" value="<?php echo __("Proceed to Checkout") ?>" name="proceed" class="btn pull-right btn-primary popup_buttons text-right" data-popupredirect = "<?php echo SITE_BASE_URL ?>checkouts">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    <?php } else { ?>
                                                        <tr>
                                                            <td class="actions" colspan="6">
                                                                <div class="actions-continue">
                                                                    <?php echo __("Your cart is currently empty"); ?>
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

                    <?php if (!$logged_in) { ?>
                        <li class="dropdown mega-menu-item mega-menu-shop">
                            <a class="dropdown-toggle mobile-redirect" href="<?php echo SITE_BASE_URL ?>users/login">
                                <?php echo __("Login"); ?>
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
                                                                            <a href="<?php echo SITE_BASE_URL ?>users/register">
                                                                                <?php echo __("Register now"); ?>
                                                                            </a>
                                                                            <span><?php echo __("New here ?") ?>&nbsp;</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <input type="submit" value="<?php echo __("Login"); ?>" name="proceed" class="btn btn-lg pull-right btn-primary">
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
                            <?php echo $this->Html->link(MyClass::translate("Logout"), array('controller' => 'users', 'action' => 'logout')); ?>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</header>