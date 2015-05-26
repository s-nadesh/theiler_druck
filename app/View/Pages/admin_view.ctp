<?php

$this->Html->addCrumb(__('Page'), array('controller' => 'pages', 'action' => 'index', 'admin'=>true));
$this->Html->addCrumb(__('View Page'));
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo __('View Page'); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/pages" class="btn btn-primary pull-right"><?php echo __('Back'); ?></a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th><?php echo __("Page Title"); ?></th>
                    <td><?php echo $page['Page']['page_title'] ?></td>
                </tr>
                <tr>
                    <th><?php echo __("Page Language"); ?></th>
                    <td><?php
                    $lang = $this->requestAction(array(
    'controller' => 'pages',
    'action' => 'get_language_name/'. $page['Page']['language_type_id']));
                    
                    echo $lang['LanguageType']['language_type_name']; ?></td>
                </tr>
                <tr>
                    <th><?php echo __("Page Description"); ?></th>
                    <td><?php echo MyClass::newLineBreak($page['Page']['page_description']) ?></td>
                </tr>
                <tr>
                    <th><?php echo __("Page Slug"); ?></th>
                    <td><?php echo $page['Page']['page_slug'] ?></td>
                </tr>
                <tr>
                    <th><?php echo __("Page Status"); ?></th>
                    <td><?php if($page['Page']['page_status']==1)
                        echo 'Active';
                               else {echo 'Inactive';}?></td>
                </tr>



            </tbody>
        </table>
    </div>
</div>





