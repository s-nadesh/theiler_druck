<footer>
    <div class="newfooter2">
        <div class="container">
            <div class="row">
                
<!--                <div class="col-xs-12 col-sm-3 col-md-3">   
                    <h5> Informationen</h5>
                    <?php
                    $links = Myclass::getOnePageListMenu(1);
                    $cms_page_attr = ($cms_page_menu && $column && $column == 1) ? 'data-hash' : '';
                    ?>
                    <ul> 
                        <?php
                        foreach ($links as $k => $link) {
                            $link_url = ($cms_page_menu && $column && $column == 1) ? "#" . strtolower($link['Page']['page_title']) : SITE_BASE_URL . "pages/informationen#" . strtolower($link['Page']['page_title']);
                            ?>
                            <li><a <?php echo $cms_page_attr; ?> href="<?php echo $link_url; ?>">  <?php echo $link['Page']['page_title'] ?> </a></li>
                        <?php } ?>
                    </ul>
                </div>-->

                <div class="col-xs-12 col-sm-4 col-md-4 cms_page_menu">   
<!--                    <h5>Technologie </h5>-->
                    <?php
                    $links = Myclass::getOnePageListMenu(2);
                    $cms_page_attr = ($cms_page_menu && $column && $column == 2) ? 'data-hash' : '';
                    ?>
                    <ul> 
                        <?php
                        foreach ($links as $k => $link) {
                            $link_url = ($cms_page_menu && $column && $column == 2) ? "#" . strtolower($link['Page']['page_title']) : SITE_BASE_URL . "pages/leistungen#" . strtolower($link['Page']['page_title']);
                            ?>
                            <li><a <?php echo $cms_page_attr; ?> href="<?php echo $link_url; ?>">  <?php echo $link['Page']['page_title'] ?> </a></li>
                        <?php } ?>
                    </ul>
                </div> 

                <div class="col-xs-12 col-sm-4 col-md-4">   
                    <h5>Kontakt</h5>  
                    <?php $contact_address = $this->requestAction(array('controller' => 'contact_addresses', 'action' => 'getContactaddress', 'DF'));?>
                    <ul> 
                        <li> 
                            <img src="<?php echo SITE_BASE_URL ?>img/theilerlogo16x16.png"  alt="" />&nbsp;<?php echo $contact_address['ContactAddress']['cont_addr_company'];?> 
                        </li>
                        <li> 
                            <img src="<?php echo SITE_BASE_URL ?>img/map.png"  alt="" />&nbsp;<?php echo $contact_address['ContactAddress']['cont_addr_address_1'];?>
                        </li>
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $contact_address['ContactAddress']['cont_addr_address_2'];?></li>
                        <li>
                            <img src="<?php echo SITE_BASE_URL ?>img/phone2.png"  alt="" />&nbsp;Tel. <?php echo $contact_address['ContactAddress']['cont_addr_phone'];?>
                        </li>
                        <li> <img src="<?php echo SITE_BASE_URL ?>img/fax.png"  alt="" />&nbsp;Fax. <?php echo $contact_address['ContactAddress']['cont_addr_fax'];?></li>
                        <li><img src="<?php echo SITE_BASE_URL ?>img/mail.png"  alt="" />&nbsp;<a href="mailto:<?php echo $contact_address['ContactAddress']['cont_addr_email'];?>"><?php echo $contact_address['ContactAddress']['cont_addr_email'];?></a></li>
                    </ul>
                </div>   

                <div class="col-xs-12 col-sm-4 col-md-4">   
                    <h5>Anfahrt </h5>     
                    <div class="social-icons">
                       <iframe width="100%" height="152" frameborder="0" style="border:0; margin-top:10px" src="https://www.google.com/maps/embed/v1/place?q=Theiler+Druck+AG,+Verenastrasse,+Wollerau,+Switzerland&key=AIzaSyDWvwxxxNCrdK0rQuOIouwVGYkRvSK2T9s&language=de"></iframe>
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