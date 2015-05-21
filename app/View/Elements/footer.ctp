<footer>
    <div class="newfooter2">
        <div class="container">
            <div class="row">
            </div>
            <div class="col-md-12"> 
                <div class="social-icons">
                    <ul class="social-icons">
                        <li class="facebook"><a title="" rel="tooltip" data-placement="top" target="_blank" href="http://www.facebook.com/" data-original-title="Facebook">Facebook</a></li>
                        <li class="twitter"><a title="" rel="tooltip" data-placement="top" target="_blank" href="http://www.twitter.com/" data-original-title="Twitter">Twitter</a></li>
                        <li class="linkedin"><a title="" rel="tooltip" data-placement="top" target="_blank" href="http://www.linkedin.com/" data-original-title="Linkedin">Linkedin</a></li>
                    </ul>
                </div>
            </div>
            <?php App::import("Model", "Page");
                $Page = new Page();
                $menu_result = $Page->getAllPages();
               // Print_r($menu_result);
 ?>
            <div class="footer-menu"> 
                <ul> 
                    <?php foreach($menu_result as $menu):?>
                    <li><a href="<?php echo SITE_BASE_URL;?>pages/view/<?php echo $menu['Page']['page_slug'] ?>"> <?php echo $menu['Page']['page_title'] ?> </a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <p>© 2015 Copyright - Theiler Druck AG</p>
                </div>
            </div>
        </div>
    </div>
</footer>