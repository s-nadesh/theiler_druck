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
            <div class="footer-menu">
                <?php $links = Myclass::getOnePageListMenu(); ?>
                <ul>
                    <?php foreach($links as $k => $link){ ?>
                    <li>
                        <a href="<?php echo SITE_BASE_URL;?>pages/leistungen#<?php echo strtolower($link['Page']['page_title']) ?>"> <?php echo $link['Page']['page_title'] ?> </a>
                    </li>
                    <?php } ?>
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