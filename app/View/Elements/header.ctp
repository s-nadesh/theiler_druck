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
        <h1 class="logo">
            <a href="<?php echo SITE_BASE_URL; ?>">
                <?php echo $this->Html->image("theilerdrucklogo.png", array("alt"=>SITE_NAME ,"width"=>"380", "height"=>"70", "data-sticky-width"=>"300", "data-sticky-height"=>"55")); ?>
            </a>
        </h1>
        <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
            <i class="icon icon-bars"></i>
        </button>
    </div>
    <div class="navbar-collapse nav-main-collapse collapse">
        <div class="container">
            <nav class="nav-main mega-menu">
                <ul class="nav nav-pills nav-main" id="mainMenu">
                    <li class="dropdown active">
                        <a class="dropdown-toggle" href="<?php echo SITE_BASE_URL?>"> Start </a>
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
                        <a href="<?php echo SITE_BASE_URL?>carts" class="dropdown-toggle mobile-redirect">
                            <i class="icon icon-shopping-cart"></i> 
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>