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
                    <h5>Kontakt </h5>  
                   





                    <ul> 
                        <li>   <img src="<?php echo SITE_BASE_URL ?>img/theilerlogo16x16.png"  alt="" /> &nbsp;Theiler Druck AG </li>
                        <li> <img src="<?php echo SITE_BASE_URL ?>img/map.png"  alt="" /> &nbsp;Verenastrasse 2</li>
                        <li> &nbsp; &nbsp; &nbsp;  &nbsp;8832 Wollerau</li>
                        <li><img src="<?php echo SITE_BASE_URL ?>img/phone2.png"  alt="" /> &nbsp; Tel. 044 787 03 00</li>
                        <li> <img src="<?php echo SITE_BASE_URL ?>img/fax.png"  alt="" /> &nbsp; Fax 044 787 03 01</li>
                        <li><img src="<?php echo SITE_BASE_URL ?>img/mail.png"  alt="" /> &nbsp;info@theilerdruck.ch   </li>
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
                        
                    
                       <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10844.698199828279!2d8.72116!3d47.193596!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe94d76d6c439cb2e!2sTheiler+Druck+AG!5e0!3m2!1sen!2sin!4v1433915187228" width="100%" height="120" frameborder="0" style="border:0; margin-top:10px"></iframe>
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