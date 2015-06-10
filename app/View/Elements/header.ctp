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
            <div class="new-shoppingcart"> 
                <div class="new-carticon"><i class="icon icon-shopping-cart"></i></div> 
                <div class="new-carttxt"> 
                    <?php
                    if ($this->Session->check('Shop')) {
                        $header_cart = $this->Session->read('Shop');
                        $item_count = count($header_cart['CartItems']);
                        $cart_price = $header_cart['Additional']['cart_sub_price_with_tax'];
                    } else {
                        $item_count = 0;
                        $cart_price = 0.00;
                    }
                    ?>
                    <a href="<?php echo SITE_BASE_URL ?>carts"><?php echo $item_count; ?> Artikel | <?php echo MyClass::currencyFormat($cart_price) ?></a> <i class="icon icon-exclamation-circle"></i>
                </div> 
            </div>
            <div class="clearfix"></div>
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
                                        foreach ($links as $k => $link) {
                                            $active_class = ($k == 0) ? 'active' : '';
                                            ?>
                                            <li class=" <?php echo $active_class; ?>">
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

    <?php if($contact_page_menu){ ?>
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
                                <ul class="nav nav-pills nav-main nav-main2" id="mainMenu2">
                                    <li class="dropdown active">
                                        <a data-hash class="dropdown-toggle" href="#1"> Kontakt </a>
                                    </li>
                                    <li>
                                        <a data-hash href="#2">Ansprechpersonen</a>
                                    </li>
                                    <li>
                                        <a data-hash href="#3">Offertenanfrage</a>
                                    </li>
                                    <li>
                                        <a data-hash href="#4">Verlag</a>
                                    </li>
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