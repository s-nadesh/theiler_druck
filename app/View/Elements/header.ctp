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
        <!--        <div class="col-xs-12 col-sm-2 col-md-2 cp-logo"> 
        <?php // echo $this->Html->image("cp-logo.jpg"); ?>
                </div>-->
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
                    
                    <?php if(!$logged_in){ ?>
                    <li class="dropdown mega-menu-item mega-menu-shop">
                        <a class="dropdown-toggle mobile-redirect" href="#">
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
                                                'class' => 'user_login_popup',
                                                'url' => array('controller' => 'users', 'action' => 'login')
                                            ));
                                            ?>
                                            <table cellspacing="0" class="cart">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            echo $this->Form->input('user_email', array('label' => false, "class" => "form-control"));
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            echo $this->Form->password('user_password', array('label' => false, "class" => "form-control", 'id' => 'user-password-popupform'));
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="actions" colspan="6">
                                                            <div class="actions-continue">
                                                                <?php echo __("New here ?") ?>
                                                                <a href=""><?php echo __("Register now"); ?></a>
                                                                <input type="submit" value="<?php echo __("Login"); ?>" name="proceed" class="btn btn-lg pull-right btn-primary">
                                                            </div>
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
                    
                    <li class="dropdown mega-menu-item mega-menu-shop">
                        <a href="<?php echo SITE_BASE_URL ?>carts" class="dropdown-toggle mobile-redirect">
                            <i class="icon icon-shopping-cart"></i> 
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>