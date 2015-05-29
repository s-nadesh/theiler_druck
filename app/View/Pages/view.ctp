<?php echo $this->Html->css(array('theme-blog'), array('inline' => false)); ?>
<div role="main" class="main">

    <section class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo SITE_BASE_URL;?>">Home</a></li>
                        <li class="active"><?php echo $page_data['Page']['page_title']?></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2><?php echo $page_data['Page']['page_title']?></h2>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row">


            <div class="col-md-12">

               <?php  echo $page_data['Page']['page_description']?>

            </div>
        </div>





    </div>



</div>
