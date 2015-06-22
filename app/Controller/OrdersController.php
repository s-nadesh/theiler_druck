<?php

class OrdersController extends AppController {

    public $components = array('Mpdf');
    public $name = 'Orders';

    //This function will run before every action
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->deny(array('index', 'view', 'update_picture_upload'));
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
            throw new NotFoundException(MyClass::translate('Invalid Order'));
        }

        $order = $this->Order->find('first', array(
            'conditions' => array('Order.order_id' => $order_id)
        ));

        $this->set('title_for_layout', 'Orders');
        $this->set(compact('order'));
    }

    public function admin_update_status() {
        if ($this->request->is('post')) {
            $update_order = array(
                'Order' => array(
                    'order_id' => $this->data['Order']['order_id'],
                    'order_status' => $this->data['Order']['order_status'],
                )
            );

            if ($this->Order->save($update_order)) {
                echo "Order status updated successfully";
            } else {
                echo "Order status can not be updated";
            }
            exit;
        }
    }

    //User orders manage page.
    public function index() {
        $orders = $this->Order->find('all', array(
            'conditions' => array('Order.user_id' => $this->Auth->user('user_id')),
            'recursive' => 0,
            'order' => array('Order.created DESC')
        ));

        $this->set(compact('orders'));
    }

    //User view single order page.
    public function view($order_unique_id) {
        $order = $this->Order->find('first', array(
            'conditions' => array('Order.user_id' => $this->Auth->user('user_id'), 'Order.order_unique_id' => $order_unique_id),
        ));

        if (empty($order)) {
            $this->Session->setFlash('Invalid Order', 'flash_error');
            $this->redirect('index');
        }

        $this->set(compact('order'));
    }

    public function orderpdf($order_id = NULL, $output = 'D') {
        $userid = $this->Auth->user('user_id');
        $this->layout = '';
        $order = $this->Order->find('first', array('conditions' => array('order_id' => $order_id)));
        if ($userid == $order['Order']['user_id']) {
            $this->set(compact('order'));
            $filename = $order['Order']['order_filename'];
            $this->Mpdf->init(array('en-GB-x', 'A4', '', '', 10, 10, 10, 10, 6, 3));
            $filepath = 'files/invoices/' . $filename;
            $this->Mpdf->setFilename($filepath);
            $this->Mpdf->setOutput($output);
        } else {
            $this->Session->setFlash("<div class='error msg'>" . MyClass::translate('Access denied.') . "</div>");
            $this->redirect(array('controller' => 'orders', 'action' => 'index'));
        }
    }

    public function fileDownload($file) {
        $this->autoRender = false;
        if (file_exists(WWW_ROOT . ORDER_FILE_FOLDER . $file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize(WWW_ROOT . ORDER_FILE_FOLDER . $file));
            ob_clean();
            flush();
            readfile(WWW_ROOT . ORDER_FILE_FOLDER . $file);
            exit;
        } else {
            echo "File does not exists";
        }
    }

    public function update_picture_upload($order_unique_id, $order_item_id) {
        $order = $this->Order->OrderItem->find('first', array(
            'conditions' => array('Order.user_id' => $this->Auth->user('user_id'), 'OrderItem.order_item_id' => $order_item_id),
        ));

        $this->set(compact('order'));
    }

    public function insertOrderProductImage($order_item_id) {
        $this->autoRender = false;
        $order = $this->Order->OrderItem->find('first', array(
            'conditions' => array('Order.user_id' => $this->Auth->user('user_id'), 'OrderItem.order_item_id' => $order_item_id),
        ));

        if (isset($_FILES["myfile"])) {
            $ret = array();

            $error = $_FILES["myfile"]["error"];
            //You need to handle  both cases
            //If Any browser does not support serializing of multiple files using FormData() 
            if (!is_array($_FILES["myfile"]["name"])) { //single file
                $fileName = MyClass::getRandomString(3) . '-' . $_FILES["myfile"]["name"];
                move_uploaded_file($_FILES["myfile"]["tmp_name"], ORDER_FILE_FOLDER . $fileName);
                $ret[] = $fileName;

                $order_item = $order['OrderItem'];
                $order_item_product_value = MyClass::decodeJSON($order_item['order_item_product_value']);
                $uploaded_pictures = $order_item_product_value->item_picture_upload;
                
                $result = am($uploaded_pictures, (array) $fileName);
                $order_item_product_value->item_picture_upload = $result;
                $order_item_product_value_encode = MyClass::encodeJSON($order_item_product_value);

                $order_item_update = array(
                    'OrderItem' => array(
                        'order_item_id' => $order_item_id,
                        'order_item_product_value' => $order_item_product_value_encode,
                    )
                );

                $this->Order->OrderItem->save($order_item_update);
            } else {  //Multiple files, file[]
                $fileCount = count($_FILES["myfile"]["name"]);
                for ($i = 0; $i < $fileCount; $i++) {
                    $fileName = MyClass::getRandomString(3) . '-' . $_FILES["myfile"]["name"][$i];
                    move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], ORDER_FILE_FOLDER . $fileName);
                    $ret[] = $fileName;

                    $order_item = $order['OrderItem'];
                    $order_item_product_value = MyClass::decodeJSON($order_item['order_item_product_value']);
                    $uploaded_pictures = $order_item_product_value->item_picture_upload;

                    $result = am($uploaded_pictures, (array) $fileName);
                    $order_item_product_value->item_picture_upload = $result;
                    $order_item_product_value_encode = MyClass::encodeJSON($order_item_product_value);

                    $order_item_update = array(
                        'OrderItem' => array(
                            'order_item_id' => $order_item_id,
                            'order_item_product_value' => $order_item_product_value_encode,
                        )
                    );

                    $this->Order->OrderItem->save($order_item_update);
                }
            }
            echo json_encode($ret);
        }
    }

    public function removeOrderProductImage() {
        $this->autoRender = false;

        if ($this->request->is('delete') || $this->request->is('post')) {
            $order = $this->Order->OrderItem->find('first', array(
                'conditions' => array('Order.user_id' => $this->Auth->user('user_id'), 'OrderItem.order_item_id' => $this->data['orderItemID']),
            ));

            $order_item = $order['OrderItem'];
            $order_item_product_value = MyClass::decodeJSON($order_item['order_item_product_value']);
            $uploaded_pictures = $order_item_product_value->item_picture_upload;

            $filename = $this->data['fileName'];
            $filePath = ORDER_FILE_FOLDER . $filename;
            $pos = array_search($filename, $uploaded_pictures);
            unset($uploaded_pictures[$pos]);

            $result = am($uploaded_pictures);
            $order_item_product_value->item_picture_upload = $result;
            $order_item_product_value_encode = MyClass::encodeJSON($order_item_product_value);
           
            if (file_exists($filePath)) {
                MyClass::fileDelete($filePath);
            }
            
            $orderItem = array(
                'OrderItem' => array(
                    'order_item_id' => $this->data['orderItemID'],
                    'order_item_product_value' => $order_item_product_value_encode
                )
            );
            $this->Order->OrderItem->save($orderItem);
            echo 'File deleted successfully';
        }
    }

}
