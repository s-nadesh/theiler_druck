<div role="main" class="main">
    <div role="main" class="main" id="1">
        <div id="content" class="content full">

            <section class="top">
                <div class="container">
                    <div class="row first-txt" id="1">
                        <div class="col-md-12">
                            <div class="sections-heading"><?php echo __("Contact"); ?></div>
                            <div class="contact-section">
                                <div class="row">
                                    <?php echo $this->Form->create('Page', array('action' => 'contact_form')); ?>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <b><?php echo __("Your questions and comments are always welcome"); ?></b>
                                        <p>&nbsp;</p>
                                        <div class="form-group">
                                            <label><?php echo __("Firstname") ?>*</label>
                                            <?php echo $this->Form->input('contact_firstname', array("class" => "form-control", "label" => false)); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo __("Lastname") ?>*</label>
                                            <?php echo $this->Form->input('contact_lasttname', array("class" => "form-control", "label" => false)); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo __("Email"); ?>*</label>
                                            <?php echo $this->Form->input('contact_email', array("class" => "form-control", "label" => false)); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo __("Regard"); ?>*</label>
                                            <?php echo $this->Form->input('contact_regard', array("class" => "form-control", "label" => false)); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo __("Message"); ?>*</label>
                                            <?php echo $this->Form->input('contact_message', array("type" => "textarea", "class" => "form-control", "label" => false)); ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo MyClass::translate("Captcha") ?> *</label>
                                            <?php echo $this->Form->input('contact_captcha', array('class' => 'form-control', 'label' => false)); ?>
                                            <img src="<?php echo SITE_BASE_URL ?>pages/getCaptcha" alt="" class="captcha" />
                                            <?php echo $this->Html->image("refresh.jpg", array("width" => "25", "alt" => "", "class" => "refresh")); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-lg" value="<?php echo __("Send"); ?>">
                                        </div>
                                    </div>
                                    <?php echo $this->Form->end(); ?>

                                    <div class="col-xs-12 col-sm-5 col-md-5 col-md-offset-1 contact-right"> 
                                        <p> <img src="img/theilerdrucklogo2.png" alt=""> </p>
                                        <div class="clearfix"></div>
                                        <p> 
                                            <img src="img/contact-icon1.png" width="57" height="58" alt=""> Anschrift:<br/>
                                            Verenastrasse 2<br/>
                                            8832  Wollerau<br/>
                                        </p>
                                        <p> 
                                            <img src="img/contact-icon2.png" width="57" height="58" alt=""> Tel.:<br/>
                                            044 787 03 00
                                        </p>
                                        <p> 
                                            <img src="img/contact-icon3.png" width="57" height="58" alt=""> Fax:<br/>
                                            044 787 03 01
                                        </p>
                                        <p> 
                                            <img src="img/contact-icon4.png" width="57" height="58" alt=""> E-Mail:<br/>
                                            <a href="mailto:info@theilerdruck.ch">info@theilerdruck.ch</a>
                                        </p>
                                        <div class="contact-map"> 
                                            <h4>Anfahrt</h4>
                                            <p>
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10844.698199828279!2d8.72116!3d47.193596!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe94d76d6c439cb2e!2sTheiler+Druck+AG!5e0!3m2!1sen!2sin!4v1433157270213" width="100%" height="310" frameborder="0" style="border:0"></iframe>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="top">
                <div class="container">
                    <div class="row" id="2">
                        <div class="col-md-12">
                            <div class="sections-heading"> Ansprechpersonen</div>

                            <div class="contact-section">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-3 contact-person-cont"> 

                                        <p> <img src="img/contact-person1.png"  alt=""></p>

                                        <p> 
                                        <h2> Walter Feldman </h2>
                                        <b>Geschäftsfüher </b></p>

                                        <p>Tel.: 044 787 03 65 <br/>
                                            <a href="mailto:w.feldman@theilerdruck.ch">w.feldman@theilerdruck.ch</a>


                                        </p>

                                    </div>


                                    <div class="clearfix"> </div>

                                    <div class="col-xs-12 col-sm-4 col-md-3 contact-person-cont"> 

                                        <p> <img src="img/contact-person2.png"  alt=""></p>

                                        <p> 
                                        <h2> Michel Schwander </h2>
                                        <b>Leiter Verkauf Innendienst </b></p>

                                        <p>Tel.: 044 787 03 69 <br/>
                                            <a href="mailto:w.feldman@theilerdruck.ch">m.schwander@theilerdruck.ch</a>


                                        </p>

                                    </div>



                                    <div class="col-xs-12 col-sm-4 col-md-3 contact-person-cont"> 

                                        <p> <img src="img/contact-person3.png"  alt=""></p>

                                        <p> 
                                        <h2> Roland Bachmann </h2>
                                        <b>Kundenberater
                                        </b></p>

                                        <p>Tel.: 044 787 03 06 <br/>
                                            <a href="mailto:r.bachman@theilerdruck.ch">r.bachman@theilerdruck.ch</a>


                                        </p>

                                    </div>



                                    <div class="col-xs-12 col-sm-4 col-md-3 contact-person-cont"> 

                                        <p> <img src="img/contact-person4.png"  alt=""></p>

                                        <p> 
                                        <h2> Heinz Burgi </h2>
                                        <b>Heinz Burgi</b>

                                        </p>

                                        <p>Tel.: 044 787 03 02<br/>
                                            <a href="mailto:h.buergi@theilerdruck.ch">h.buergi@theilerdruck.ch</a>


                                        </p>

                                    </div>


                                    <div class="col-xs-12 col-sm-4 col-md-3 contact-person-cont"> 

                                        <p> <img src="img/contact-person5.png"  alt=""></p>

                                        <p> 
                                        <h2>Herbert Steiner </h2>
                                        <b>Herbert Steiner</b>

                                        </p>

                                        <p>Tel.: 044 787 03 68<br/>
                                            <a href="mailto:h.steiner@theilerdruck.ch">h.steiner@theilerdruck.ch</a>


                                        </p>

                                    </div>



                                    <div class="col-xs-12 col-sm-4 col-md-3 contact-person-cont"> 

                                        <p> <img src="img/contact-person6.png"  alt=""></p>

                                        <p> 
                                        <h2>Rolf Meister </h2>
                                        <b>Leiter Druckvostufe</b>

                                        </p>

                                        <p>Tel.: 044 787 03 07<br/>
                                            <a href="mailto:r.meister@theilerdruck.ch">r.meister@theilerdruck.ch</a>


                                        </p>

                                    </div>


                                    <div class="col-xs-12 col-sm-4 col-md-3 contact-person-cont"> 

                                        <p> <img src="img/contact-person7.png"  alt=""></p>

                                        <p> 
                                        <h2>Guido Weber </h2>
                                        <b>Leiter Druck</b>

                                        </p>

                                        <p>Tel.: 044 787 03 67<br/>
                                            <a href="mailto:g.weber@theilerdruck.ch">g.weber@theilerdruck.ch</a>


                                        </p>

                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-md-3 contact-person-cont"> 

                                        <p> <img src="img/contact-person8.png"  alt=""></p>

                                        <p> 
                                        <h2>Tim Kafitz </h2>
                                        <b>Abteilungsleiter <br/>Ausrüsterei und Spedition  </b>
                                        </p>

                                        <p> Tel.: 044 786 09 00<br/>
                                            <a href="t.kafitz@theilerdruck.ch">t.kafitz@theilerdruck.ch</a>


                                        </p>

                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="top">
                <div class="container">
                    <div class="row" id="3">
                        <div class="col-md-12">  
                            <div class="contact-section">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="featured-box featured-box-secundary default info-content" >
                                            <div class="box-content box-content2 offertenanfrage-form">

                                                <div class="sections-heading">Offertenanfrage </div>



                                                <div class="row"> 


                                                    <div class="col-xs-12 col-sm-9 col-md-10"> <p> Zögern Sie nicht, verlangen Sie eine unverbindliche Offerte. Wir unterbreiten Ihnen gerne unser Angebot.  </p>  </div>

                                                    <div class="col-xs-12 col-sm-2 col-md-2">   

                                                        <a href="#" class="btn btn-primary  dropdown-toggle">
                                                            Offertenanfrage
                                                            <i class="icon icon-angle-up"></i>
                                                        </a>   
                                                    </div>


                                                    </a>



                                                    <div class="col-xs-12 col-sm-6 col-md-6"> 

                                                        <div class="form-group">

                                                            <div class="row"> 

                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label>Firma:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                            </div>

                                                        </div>






                                                        <div class="form-group">

                                                            <div class="row"> 

                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label>Name:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                            </div>

                                                        </div>




                                                        <div class="form-group">

                                                            <div class="row"> 

                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label>Vorname:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                            </div>

                                                        </div>




                                                        <div class="form-group">

                                                            <div class="row"> 

                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label>Strasse / Nr:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                            </div>

                                                        </div>

                                                        <div class="form-group">

                                                            <div class="row"> 

                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label>PLZ/Ort:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                            </div>

                                                        </div>

                                                        <div class="form-group">

                                                            <div class="row"> 

                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label>Telefon:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                            </div>

                                                        </div>

                                                        <div class="form-group">

                                                            <div class="row"> 

                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label>Fax:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                            </div>

                                                        </div>



                                                        <div class="form-group">

                                                            <div class="row"> 

                                                                <div class="col-xs-12 col-sm-3 col-md-3"> <label>E-mail:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                            </div>

                                                        </div>



                                                        <div class="form-group">

                                                            <div class="row"> 

                                                                <div class="col-xs-12 col-sm-3 col-md-3"> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9">  <input name="" type="checkbox" value="">  <span> Bitte nehmen Sie telefonisch Kontakt mit uns </span> </div>
                                                            </div>

                                                        </div>






                                                        <div class="form-group">

                                                            <div class="row"> 

                                                                <div class="col-xs-12 col-sm-3 col-md-3">  <label>Titel des Produktes:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                            </div>

                                                        </div>   


                                                        <div class="form-group">

                                                            <div class="row"> 

                                                                <div class="col-xs-12 col-sm-3 col-md-3">  <label>Auflage:</label> </div>
                                                                <div class="col-xs-12 col-sm-9 col-md-9"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                            </div>

                                                        </div> 




                                                        <div class="form-product">

                                                            <h2> Produkte:</h2>

                                                            <div class="row">

                                                                <div class="col-xs-12 col-sm-3 col-md-3 hidden-sm">   </div>

                                                                <div class="col-xs-12 col-sm-12 col-md-9"> 


                                                                    <div class="row"> 

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">  Einzelblatt  </div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option"> <input name="" type="radio" value="">  Flugblatt</div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option"> <input name="" type="radio" value=""> Prospekt </div>

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">  Visitenkarten  </div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">  Broschure mit Umschlag</div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value=""> Broschure ohne Umschlag </div>

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">   Couverts </div>




                                                                    </div>


                                                                    <label>Bitte ausfullen: mit Fenster, ohne Fenster, (links/rechts), 
                                                                        mit Haftstreifen, gummiert</label>
                                                                    <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value="">




                                                                </div>

                                                            </div>

                                                        </div>  








                                                        <div class="form-product">

                                                            <h2> Format: </h2>

                                                            <div class="row">

                                                                <div class="col-xs-12 col-sm-3 col-md-3">   </div>

                                                                <div class="col-xs-12 col-sm-12 col-md-9"> 


                                                                    <div class="row"> 

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">  10.5 x 14.8 (A6) </div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">  14.8 x 21.0(A5)</div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value=""> 21 x 29.7 (A4) </div>

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">  29.37 x 42.0 (A3) </div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">  8.5 x 5.4 (Visitenkarten)</div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option"> <input name="" type="radio" value=""> C4 (Couverts) </div>

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">   C5 (Couverts) </div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option"> <input name="" type="radio" value="">   C 5/6 (Couverts)</div>




                                                                    </div>


                                                                    <label>Individuelle Grosse:</label>
                                                                    <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value="">




                                                                </div>

                                                            </div>

                                                        </div>




                                                        <div class="form-product">

                                                            <h2> Umfang: </h2>

                                                            <div class="row">

                                                                <div class="col-xs-12 col-sm-3 col-md-3 hidden-sm">   </div>

                                                                <div class="col-xs-12 col-sm-12 col-md-9"> 


                                                                    <div class="row"> 

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value=""> einseiting bedruckt </div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">  beinseiting bedruckt</div>


                                                                        <div class="col-xs-12 col-sm-12 col-md-6 form-radio-option"> 


                                                                            <div class="row">



                                                                                <div class="col-xs-12 col-sm-8 col-md-7">    <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""></div>

                                                                                <div class="col-xs-12 col-sm-4 col-md-5">  Seiten  <br/>
                                                                                    Inhalt  </div>



                                                                            </div>




                                                                        </div>



                                                                        <div class="col-xs-12 col-sm-12 col-md-6 form-radio-option"> 


                                                                            <div class="row">





                                                                                <div class="col-xs-12 col-sm-8 col-md-7">    <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""></div>


                                                                                <div class="col-xs-12 col-sm-4 col-md-5"> Seiten Umschlag  <br/>
                                                                                </div>






                                                                            </div>






                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-3 col-md-2"> <label>  Sonstiges:  </label> <br/>
                                                                        </div>


                                                                        <div class="col-xs-12 col-sm-9 col-md-10">    <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""  style="margin-bottom:10px;"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""></div>







                                                                    </div>






                                                                </div>

                                                            </div>

                                                        </div>




                                                        <div class="form-product">

                                                            <h2> Format: </h2>

                                                            <div class="row">

                                                                <div class="col-xs-12 col-sm-3 col-md-3 hidden-sm">   </div>

                                                                <div class="col-xs-12 col-sm-12 col-md-9"> 


                                                                    <div class="row"> 

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value=""> 1-fabrig shwarz </div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value=""> 1/1-fabrig shwarz</div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value=""> 1-fabrig bunt </div>

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">  1/1-fabrig bunt </div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">  2-fabrig</div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value=""> 2/2-fabrig </div>

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">   3-fabrig </div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">  3/3-fabrig</div>


                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">   4-fabrig bunt</div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option"> <input name="" type="radio" value="">  4/4-fabr bunt</div>

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option"> <input name="" type="radio" value="">  4-fabrig Skala</div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option"> <input name="" type="radio" value="">  4/4-fabrig Skala</div>

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value=""> Drucklack</div>
                                                                        <div class="col-xs-12 col-sm-12 col-md-12 ">   </div>

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value=""> 3-fabrig</div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">   </div>



                                                                    </div>


                                                                    <label>Sonderfarben:</label>
                                                                    <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value="">




                                                                </div>

                                                            </div>

                                                        </div>



                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1">

                                                        <div class="form-product">

                                                            <h2> Papier:</h2>

                                                            <div class="row">

                                                                <div class="col-xs-12 col-sm-12 col-md-12"> 


                                                                    <div class="row"> 

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value=""> Offset weiss</div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">  Offset fabrig</div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option"> <input name="" type="radio" value=""> Laser-Inkjet</div>

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value=""> chem. Papier </div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">  matt gerstrichen</div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value=""> glänzend gestrichen </div>

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">  Visitenkarten </div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="checkbox" value="">   mit Fenster</div>

                                                                        <div class="col-xs-12 col-sm-4 col-md-2 form-radio-option">   Sonstiges:</div>

                                                                        <div class="col-xs-12 col-sm-8 col-md-10 form-radio-option"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>


                                                                    </div>







                                                                </div>

                                                            </div>

                                                        </div>





                                                        <div class="form-product">

                                                            <h2> Papiergewicht:</h2>

                                                            <div class="row">

                                                                <div class="col-xs-12 col-sm-12 col-md-12"> 


                                                                    <div class="row"> 

                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value=""> 80 gm2</div>
                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option"> <input name="" type="radio" value=""> 100 gm2</div>
                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value="">115 gm2</div>

                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option">  <input name="" type="radio" value=""> 120 gm2 </div>
                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option"> <input name="" type="radio" value=""> 135 gm2</div>
                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option"> <input name="" type="radio" value="">150 gm2 </div>


                                                                        <div class="col-xs-12 col-sm-4 col-md-2 form-radio-option">   Sonstiges:</div>

                                                                        <div class="col-xs-12 col-sm-8 col-md-10 form-radio-option"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>



                                                                        <div class="border-form">

                                                                            <div class="col-xs-12 col-sm-4 col-md-2 form-radio-option">  Umschlag:</div>
                                                                            <div class="col-xs-12 col-sm-8 col-md-10 form-radio-option"> <input name="" type="radio" value=""> 100 gm2</div>


                                                                            <div class="col-xs-12 col-sm-4 col-md-2 form-radio-option">   Sonstiges:</div>

                                                                            <div class="col-xs-12 col-sm-8 col-md-10 form-radio-option"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>


                                                                        </div>



                                                                        <div class="border-form">

                                                                            <div class="col-xs-12 col-sm-4 col-md-2 form-radio-option">  Inhalt: </div>
                                                                            <div class="col-xs-6 col-sm-4 col-md-5 form-radio-option"> <input name="" type="radio" value=""> 80 gm2</div>
                                                                            <div class="col-xs-6 col-sm-4 col-md-5 form-radio-option"> <input name="" type="radio" value=""> 100 gm2</div>


                                                                            <div class="col-xs-12 col-sm-4 col-md-2 form-radio-option">   Sonstiges:</div>

                                                                            <div class="col-xs-12 col-sm-8 col-md-10 form-radio-option"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>


                                                                        </div>

                                                                    </div>







                                                                </div>

                                                            </div>

                                                        </div>





                                                        <div class="form-product">

                                                            <h2> Papier:</h2>

                                                            <div class="row">

                                                                <div class="col-xs-12 col-sm-12 col-md-12"> 


                                                                    <div class="row"> 


                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option">  <input name="" type="checkbox" value="">   Drahtheftung</div>
                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option">  <input name="" type="checkbox" value="">   Ringösen</div>
                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option">  <input name="" type="checkbox" value="">  Klebebindung</div>
                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option">  <input name="" type="checkbox" value="">   Fadenheftung</div>
                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option">  <input name="" type="checkbox" value=""> gefalzt</div>
                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option">  <input name="" type="checkbox" value=""> gerilt</div>
                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option">  <input name="" type="checkbox" value=""> gestanzt</div>
                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option">  <input name="" type="checkbox" value="">   perforiert</div>
                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option">  <input name="" type="checkbox" value="">  geschlitzt</div>
                                                                        <div class="col-xs-6 col-sm-6 col-md-6 form-radio-option">  <input name="" type="checkbox" value="">  numeriert</div>


                                                                        <div class="col-xs-12 col-sm-12 col-md-12 "> 
                                                                            <div class="border-form"> 

                                                                                <div class="row"> 

                                                                                    <div class="col-xs-12 col-sm-12 col-md-4 form-radio-option">  <input name="" type="checkbox" value=""> numeriert:</div>

                                                                                    <div class="col-xs-2 col-sm-2 col-md-1 form-radio-option">   von</div>
                                                                                    <div class="col-xs-4 col-sm-3 col-md-3 form-radio-option"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                                                    <div class="col-xs-2 col-sm-2 col-md-1 form-radio-option">   bis</div>
                                                                                    <div class="col-xs-4 col-sm-3 col-md-3 form-radio-option"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>




                                                                        <div class="col-xs-12 col-sm-12 col-md-12 "> 
                                                                            <div class="border-form"> 

                                                                                <div class="row"> 

                                                                                    <div class="col-xs-12 col-sm-12 col-md-4 form-radio-option">  <input name="" type="checkbox" value=""> Lochung 2er</div>

                                                                                    <div class="col-xs-5 col-sm-4 col-md-3 form-radio-option">  Durchmesser</div>
                                                                                    <div class="col-xs-3 col-sm-3 col-md-3 form-radio-option"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                                                    <div class="col-xs-4 col-sm-2 col-md-1 form-radio-option">   mm</div>

                                                                                </div>

                                                                            </div>

                                                                        </div>


                                                                        <div class="col-xs-12 col-sm-12 col-md-12 "> 
                                                                            <div class="border-form"> 

                                                                                <div class="row"> 

                                                                                    <div class="col-xs-12 col-sm-12 col-md-4 form-radio-option">  <input name="" type="checkbox" value=""> Lochung 2er</div>

                                                                                    <div class="col-xs-5 col-sm-4 col-md-3 form-radio-option">  Durchmesser</div>
                                                                                    <div class="col-xs-3 col-sm-3 col-md-3 form-radio-option"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                                                    <div class="col-xs-2 col-sm-2 col-md-1 form-radio-option">   mm</div>

                                                                                </div>

                                                                            </div>

                                                                        </div>


                                                                        <div class="col-xs-12 col-sm-12 col-md-12 "> 
                                                                            <div class="border-form"> 

                                                                                <div class="row"> 

                                                                                    <div class="col-xs-12 col-sm-12 col-md-4 form-radio-option">  <input name="" type="checkbox" value=""> Lochung 4er</div>

                                                                                    <div class="col-xs-5 col-sm-4 col-md-3 form-radio-option">Durchmesser</div>
                                                                                    <div class="col-xs-3 col-sm-3 col-md-3 form-radio-option"> <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value=""> </div>
                                                                                    <div class="col-xs-2 col-sm-2 col-md-1 form-radio-option">   mm</div>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="checkbox" value="">   zusammentragen</div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-6 form-radio-option">  <input name="" type="checkbox" value="">   geschnitten</div>




                                                                    </div>







                                                                </div>

                                                            </div>

                                                        </div>





                                                        <div class="form-product">

                                                            <h2> Druckvorstufe: </h2>

                                                            <div class="row">

                                                                <div class="col-xs-12 col-sm-12 col-md-12"> 


                                                                    <div class="row"> 

                                                                        <div class="col-xs-12 col-sm-12 col-md-12 form-radio-option">  <input name="" type="radio" value=""> Neusatz & Gestaltung durch Theiler Druck AG
                                                                        </div>


                                                                        <div class="col-xs-12 col-sm-12 col-md-12 form-radio-option">  <input name="" type="radio" value=""> Rohdaten + Bildvorlagen geliefert / Satzumbruch durch Theiler Druck AG
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12 col-md-12 form-radio-option">  <input name="" type="radio" value=""> Belichtungsfertige Daten mit Program/systemangaben und
                                                                            farbverbindlichen Ausdruck angeliefert
                                                                        </div>


                                                                        <div class="col-xs-12 col-sm-6 col-md-7 form-radio-option">   belichtungfeftige Daten geliefert auf:
                                                                        </div>



                                                                        <div class="col-xs-4 col-sm-3 col-md-2 form-radio-option">  <input name="" type="checkbox" value="">   CD</div>
                                                                        <div class="col-xs-4 col-sm-3 col-md-3 form-radio-option">  <input name="" type="checkbox" value=""> E-mail</div>

                                                                    </div>

                                                                    <label> Sonstige Anmerkungen zu Ihler Anfrage:</label>

                                                                    <p> <textarea id="message" name="message" class="form-control" rows="6" data-msg-required="Please enter your message." maxlength="5000"></textarea> </p>



                                                                    <div class="row"> 

                                                                        <div class="col-xs-12 col-sm-12 col-md-12 form-radio-option">  Spamschutz: </div>


                                                                        <div class="col-xs-12 col-sm-6 col-md-7 form-radio-option"> <img src="img/captcha.jpg"  class="img-responsive"  alt=""></div>
                                                                        <div class="col-xs-12 col-sm-6 col-md-5 form-radio-option">  <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject"> </div>


                                                                        <div class="col-xs-12 col-sm-12 col-md-12 form-radio-option">
                                                                            Bitte beachten Sie, dass wir Ihre Anfrage nur bearbeiten, 
                                                                            wenn die Adressangaben korrekt sind,

                                                                            <div class="form-group">
                                                                                <input type="submit" value="Anfrage abschicken" class="btn btn-primary btn-lg pull-right" data-loading-text="Loading...">
                                                                            </div>





                                                                        </div>

                                                                    </div>

                                                                </div>




                                                            </div>





                                                        </div>


                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </section>   

                        <section class="top">
                            <div class="container">
                                <div class="row" id="4">
                                    <div class="col-md-12">
                                        <div class="sections-heading">Verlag</div>
                                        <div class="sections-content">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6 publisher-cont">
                                                    <div class="row"> 
                                                        <div class="col-xs-12 col-sm-6 col-md-5"> 
                                                            <h2> Hofner Volksblatt </h2>
                                                            Verenastrasse 2 <br/> 
                                                            8832 Wollerau <br/>
                                                            Tel. 044 787 03 03 <br/>
                                                            Fax 044 787 03 10 <br/>
                                                            <a href="http://www.hoefner.ch">www.hoefner.ch</a><br/>
                                                            <a href="mailto:redaktion@hoefner.ch">redaktion@hoefner.ch</a> <br/>
                                                            <a href="mailto:redaktion@hoefner.ch">redaktion@hoefner.ch</a><br/>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 col-md-6 publisher-img"> 
                                                            <img src="img/publisher-img1.jpg" class="img-responsive" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 publisher-cont">
                                                    <div class="row"> 
                                                        <div class="col-xs-12 col-sm-6 col-md-5"> 

                                                            <h2> March-Anzeiger </h2>
                                                            Alpenblickstrasse 26 <br/>
                                                            8853 Lachen<br/>
                                                            Tel. 055 451 08 88<br/>
                                                            Fax 055 451 08 89<br/>
                                                            <a href="http://www.marchenzeiger.ch">www.marchenzeiger.ch</a><br/>
                                                            <a href="mailto:redaktion@hoefner.ch">redaktion@marchanzeiger.ch</a><br/>
                                                            <a href="mailto:redaktion@hoefner.ch">inserate@theilermediaservice.ch</a><br/>
                                                        </div>


                                                        <div class="col-xs-12 col-sm-6 col-md-6 publisher-img"> <img src="img/publisher-img1.jpg" class="img-responsive" ></div>

                                                    </div>



                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Google Maps -->
                    </div>
                </div>
        </div>

<script type="text/javascript">
    $(document).ready(function() {

        // refresh captcha
        $('img.refresh').click(function() {
            change_captcha();
        });

    });


    function change_captcha()
    {
        $('img.captcha').attr('src',  jssite_url + "pages/getCaptcha?rnd=" + Math.random());
    }

</script>