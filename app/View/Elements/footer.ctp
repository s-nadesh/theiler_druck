<footer>
    <div class="newfooter2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">   
                    <h5> Informationen</h5>
                    <ul> 
                        <li><a href="#">  Zahlungsmöglichkeiten </a></li>
                        <li><a href="#"> Versandinformationen</a></li>
                        <li><a href="#"> Widerrufsbelehrung</a></li>
                        <li><a href="#"> Impressum</a></li>
                        <li><a href="#"> AGB</a></li>
                        <li><a href="#"> Datenschutz</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3">   
                    <h5>Technologie </h5>
                    <?php
                    $links = Myclass::getOnePageListMenu();
                    $cms_page_attr = ($cms_page_menu) ? 'data-hash' : '';
                    ?>
                    <ul> 
                        <?php
                        foreach ($links as $k => $link) {
                            $link_url = ($cms_page_menu) ? "#" . strtolower($link['Page']['page_title']) : SITE_BASE_URL . "pages/leistungen#" . strtolower($link['Page']['page_title']);
                            ?>
                            <li><a <?php echo $cms_page_attr; ?> href="<?php echo $link_url; ?>">  <?php echo $link['Page']['page_title'] ?> </a></li>
                        <?php } ?>
                    </ul>
                </div>  
                <div class="col-xs-12 col-sm-3 col-md-3">   
                    <h5>Title 3  </h5>     
                    <ul> 
                        <li><a href="#">   Lorem ipsum dolor </a></li>
                        <li><a href="#"> consectetur</a></li>
                        <li><a href="#"> adipiscing elit</a></li>
                        <li><a href="#"> Morbi quis</a></li>
                        <li><a href="#"> Interdum</a></li>
                        <li><a href="#">malesuada fames</a></li>
                    </ul>
                </div>   
                <div class="col-xs-12 col-sm-3 col-md-3">   
                    <h5>Folge uns </h5>     
                    <div class="social-icons">
                        <ul class="social-icons">
                            <li class="facebook"><a title="" rel="tooltip" data-placement="top" target="_blank" href="http://www.facebook.com/" data-original-title="Facebook">Facebook</a></li>
                            <li class="twitter"><a title="" rel="tooltip" data-placement="top" target="_blank" href="http://www.twitter.com/" data-original-title="Twitter">Twitter</a></li>
                            <li class="linkedin"><a title="" rel="tooltip" data-placement="top" target="_blank" href="http://www.linkedin.com/" data-original-title="Linkedin">Linkedin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <p>&copy; <?php echo date('Y'); ?> Copyright - Theiler Druck AG</p>
                </div>
            </div>
        </div>
    </div>
</footer>