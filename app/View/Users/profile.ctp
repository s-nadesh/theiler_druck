<?php $this->Html->addCrumb(MyClass::translate('Profile')); ?>

<div role="main" class="main">

    <?php echo $this->element("breadcrumbs"); ?>

    <div class="container">
        <?php echo $this->Session->flash(); ?>

        <div class="row">
            <div class="col-md-12">

                <div class="row featured-boxes login">
                    <div class="col-md-12">
                        <div class="featured-box featured-box-secundary default info-content">
                            <div class="box-content">
                                <h4><?php echo $current_user['user_name'] ?>, <?php echo MyClass::translate("Welcome to Theiler Druck") ?></h4>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label><?php echo $this->Html->link(MyClass::translate("Logout"), array('controller' => 'users', 'action' => 'logout')); ?></label>
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