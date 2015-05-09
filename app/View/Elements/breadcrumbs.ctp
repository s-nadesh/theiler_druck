<section class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                echo $this->Html->getCrumbList(
                        array(
                    'firstClass' => false,
                    'lastClass' => 'active',
                    'class' => 'breadcrumb'
                        ), array(
                    'text' => 'Home',
                    'url' => array('controller' => 'pages', 'action' => 'display', 'home'),
                        )
                );
                ?>
            </div>
        </div>
        <?php if (isset($page_title)): ?>
            <div class="row">
                <div class="col-md-12">
                    <h2><?php echo $page_title ?></h2>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
