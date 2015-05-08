<div class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo SITE_BASE_URL?>admin">
            <?php echo SITE_NAME; ?>
        </a>
        <a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
            <span class="sr-only">Toggle navbar</span>
            <i class="icon-grid3"></i>
        </button>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar">
            <span class="sr-only">Toggle navigation</span>
            <i class="icon-paragraph-justify2"></i>
        </button>
    </div>

    <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
        <li class="user dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <img src="http://placehold.it/300">
                <span><?php echo $this->Session->read('Admin.name'); ?></span>
                <i class="caret"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right icons-right">
                <li><a href="<?php echo SITE_BASE_URL?>admin/profile"><i class="icon-user"></i> <?php echo __("Profile"); ?></a></li>
                <li><a href="<?php echo SITE_BASE_URL?>admin/change_password"><i class="icon-key"></i> <?php echo __("Change Password"); ?></a></li>
                <li><a href="<?php echo SITE_BASE_URL?>admin/logout"><i class="icon-exit"></i> <?php echo __("Logout"); ?> </a></li>
            </ul>
        </li>
    </ul>
</div>