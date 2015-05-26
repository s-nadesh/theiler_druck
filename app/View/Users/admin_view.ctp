<?php

$this->Html->addCrumb(__('User'), array('controller' => 'users', 'action' => 'index', 'admin'=>true));
$this->Html->addCrumb(__('View User'));
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-paragraph-justify2"></i> <?php echo __('View User'); ?></h6>
        <a href="<?php echo SITE_BASE_URL ?>admin/users" class="btn btn-primary pull-right"><?php echo __('Back'); ?></a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th><?php echo __("User Name"); ?></th>
                    <td><?php echo $user['User']['user_name'] ?></td>
                </tr>
                <tr>
                    <th><?php echo __("User Email"); ?></th>
                    <td><?php echo $user['User']['user_email']?></td>
                </tr>
                <tr>
                    <th><?php echo __("User Status"); ?></th>
                    <td><?php  if($user['User']['user_status']==1)echo 'Active';else {echo 'Inactive';} ?></td>
                </tr>
                <tr>
                    <th><?php echo __("User Created"); ?></th>
                    <td><?php echo $user['User']['created'] ?></td>
                </tr>
               



            </tbody>
        </table>
    </div>
    </div>


    
    <div id="activity" class="tab-pane active fade in">

         

<?php $addrs = $this->requestAction(array(
    'controller' => 'users',
    'action' => 'get_address/'. $user['User']['user_id']));?>
            <!-- Questions and contact -->
            <div class="row">
                 <?php $i = 1; foreach($addrs as $addr): ?>
               <div class="col-md-6">
                  <div class="panel panel-default">   
                    <!-- Contacts -->
                    <div class="panel-heading">
                        <h6 class="panel-title" ><i class="icon-paragraph-justify2"></i> Address <?php echo $i;?></h6>
                         </div>
                        <ul class="message-list">

                            <li class="message-list-header"><?php echo $addr['UserAddress']['address_title'].'.'.$addr['UserAddress']['address_firstname'].' '.$addr['UserAddress']['address_lastname'] ?></li>

                                 <?php echo '<li class="message-list-header">'.$addr['UserAddress']['address_street'].'<br>'
                                         .$addr['UserAddress']['address_city'].'<br>'
                                         .$addr['UserAddress']['address_post_code'] .'<br>'
                                         .$addr['UserAddress']['address_country'].'<br><span class="icon-phone2">:'
                                         .$addr['UserAddress']['address_phone'].'<br><span class="icon-mobile">:'
                                         .$addr['UserAddress']['address_mobile'].'</li>'?> 
                              
                        </ul>
                   
                    <!-- contacts -->
                  </div>
                </div>
                   <?php $i++; endforeach;?>
             

            </div>
            <!-- /questions and contact -->
        </div>
        

    
