<?php

class OrdersController extends AppController {

    public $name = 'Orders';

    //This function will run before every action
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->deny(array('index', 'view'));
        $admin_auth_actions = array('admin_index', 'admin_view', 'admin_update_status');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'orders');
    }

    public function admin_index() {
        $orders = $this->Order->find('all', array(
            'order' => array('Order.created DESC'),
            'recursive' => 0
        ));
        
        $this->set('title_for_layout', 'Orders');
        $this->set(compact('orders'));
    }

    public function admin_view($order_id) {
        if (!$this->Order->exists($order_id)) {
            throw new NotFoundException(__('Invalid Order'));
        }

        $order = $this->Order->find('first', array(
            'conditions' => array('Order.order_id' => $order_id)
        ));
        
        $this->set('title_for_layout', 'Orders');
        $this->set(compact('order'));
    }
    
    public function admin_update_status(){
        if($this->request->is('post')){
            $update_order = array(
                'Order' => array(
                    'order_id' => $this->data['Order']['order_id'],
                    'order_status' => $this->data['Order']['order_status'],
                )
            );
            
            if($this->Order->save($update_order)){
                echo "Order status updated successfully";
            } else {
                echo "Order status can not be updated";
            }
            exit;
        }
    }
    
    //User orders manage page.
    public function index(){
        $orders = $this->Order->find('all', array(
            'conditions' => array('Order.user_id' => $this->Auth->user('user_id')),
            'recursive' => 0
        ));
        
        $this->set(compact('orders'));
    }
    
    //User view single order page.
    public function view($order_unique_id){
        $order = $this->Order->find('first', array(
            'conditions' => array('Order.user_id' => $this->Auth->user('user_id'), 'Order.order_unique_id' => $order_unique_id),
        ));
        
        if(empty($order)){
            $this->Session->setFlash('Invalid Order', 'flash_error');
            $this->redirect('index');
        }
        
        $this->set(compact('order')); 
    }

}
