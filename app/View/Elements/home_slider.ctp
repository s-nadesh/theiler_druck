<div class="nivo-slider">
    <div class="slider-wrapper theme-default">
        <div id="nivoSlider" class="nivoSlider">
            <?php
            $images = ClassRegistry::init('Picture')->find('all', array('conditions' => array('Picture.picture_block' => 'SL'), 'order' => array('Picture.picture_sort ASC')));
            foreach ($images as $key => $image) {?>
                <img src='<?php echo SITE_BASE_URL."files/pictures/{$image['Picture']['picture_image']}"?>' data-thumb="<?php echo SITE_BASE_URL."files/pictures/{$image['Picture']['picture_image']}"?>" alt="" />
            <?php }?>
        </div>
        <div id="htmlcaption" class="nivo-html-caption"></div>
    </div>
</div>