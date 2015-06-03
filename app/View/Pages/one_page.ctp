<div role="main" class="main">
    <div role="main" class="main" id="1">
        <div id="content" class="content full">
            <?php foreach ($pages as $page){ ?>
            <!--Start Section-->
            <section class="top">
                <div class="container">
                    <div class="row first-txt" id="prepress">
                        <div class="col-md-12">
                            <div class="sections-heading"><?php echo $page['Page']['page_title'] ?></div>
<?php if($page['Page']['page_subtitle']){ ?>
                            <div class="sections-sub-heading"><?php echo $page['Page']['page_subtitle'] ?></div>
<?php } ?>
                            <div class="sections-content">
                                <?php echo $page['Page']['page_content'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php if($page['Page']['page_px_image']){ ?>
            <section class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo '/' . PAGE_IMAGE_FOLDER . $page['Page']['page_px_image'] ?>);">
                <div class="container">
                    <div class="row center">
                        <div class="col-md-12">
                            <?php echo $page['Page']['page_px_caption'] ?>
                        </div>
                    </div>
                </div>
            </section>
<?php } ?>
           <!--End Prepress Section-->
            <?php } ?>
        </div>
    </div>
</div>