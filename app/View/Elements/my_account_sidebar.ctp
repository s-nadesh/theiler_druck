<aside class="sidebar">
    <h4><?php echo __("My Account") ?></h4>
    <ul class="nav nav-list primary push-bottom">
        <li><?php echo $this->Html->link(__("Profile"), array('controller' => 'users', 'action' => 'profile')); ?></li>
        <li><?php echo $this->Html->link(__("Change Password"), array('controller' => 'users', 'action' => 'change_password')); ?></li>
        <li><?php echo $this->Html->link(__("Change Billing Address"), array('controller' => 'user_addresses', 'action' => 'billing_address')); ?></li>
        <li><?php echo $this->Html->link(__("Orders"), array('controller' => 'orders', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(MyClass::translate("Logout"), array('controller' => 'users', 'action' => 'logout')); ?></li>
    </ul>
</aside>