<?php

class ShippingCostsController extends AppController {

    public $name = 'ShippingCosts';

    //This function will run before every action
    public function beforeFilter() {
        parent::beforeFilter();
        $admin_auth_actions = array('admin_index', 'admin_edit');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'shipping_costs');
    }

    //Admin Manage Shipping Costs
    public function admin_index() {
        $this->ShippingCost->getVirtualField('target_zip_code');
        $shipping_costs = $this->ShippingCost->find('all');
        $this->set('title_for_layout', __('Shipping Costs'));
        $this->set(compact('shipping_costs'));
    }

    //Admin Edit Shipping Cost
    public function admin_edit($sh_cost_id) {
        if (!$this->ShippingCost->exists($sh_cost_id)) {
            throw new NotFoundException(__('Invalid Shipping Cost'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['ShippingCost']['sh_cost_id'] = $sh_cost_id;
            if ($this->ShippingCost->save($this->request->data)) {
                $this->Session->setFlash(__('Shipping Cost Updated Successfully!!!'), 'flash_success');
                $this->redirect('index');
            } else {
                $this->Session->setFlash(__('Shipping Cost Not Updated'), 'flash_error');
            }
        } else {
            $this->data = $this->ShippingCost->findByShCostId($sh_cost_id);
        }
        $this->set('title_for_layout', __('Shipping Costs'));
    }

    public function getZipCodeList() {
        $this->ShippingCost->getVirtualField('target_zip_code');
        $result = $this->ShippingCost->find('list', array(
            'fields' => array('ShippingCost.sh_cost_id', 'ShippingCost.target_zip_code')
        ));

        return $result;
    }

}
