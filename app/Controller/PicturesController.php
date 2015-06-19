<?php

App::uses('AppController', 'Controller');

class PicturesController extends AppController {

    public $components = array('Image');

    //This function will run before every action
    public function beforeFilter() {
        parent::beforeFilter();
        $admin_auth_actions = array('admin_index', 'admin_add', 'admin_edit', 'admin_delete');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'pictures');
    }

    public function admin_index() {
        $pictures = $this->Picture->find('all', array(
            'conditions' => array('Picture.picture_block' => 'SL'),
            'order' => array('Picture.picture_sort ASC')
        ));

        $this->set('title_for_layout', 'pictures');
        $this->set('admin_submenu', 'slider');
        $this->set(compact('pictures'));
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $save = true;
            if (!empty($this->request->data['Picture']['picture_image']['name'])) {
                $getimage = getimagesize($this->data['Picture']['picture_image']['tmp_name']);
                $width = $getimage[0];
                $height = $getimage[1];
                if ($width >= SLIDER_WIDTH && $height >= SLIDER_HEIGHT) {
                    $image_name = MyClass::getRandomString(5) . "_" . $this->data['Picture']['picture_image']['name'];
                    $image_path = PICTURE_IMAGE_FOLDER . $image_name;
                    $image_temp_name = $this->data['Picture']['picture_image']['tmp_name'];
                    move_uploaded_file($image_temp_name, $image_path);

                    $this->Image->prepare(WWW_ROOT . DS . $image_path);
                    $this->Image->resize(SLIDER_WIDTH, SLIDER_HEIGHT); //width,height,Red,Green,Blue
                    $this->Image->save(WWW_ROOT . DS . $image_path);

                    $this->request->data['Picture']['picture_image'] = $image_name;
                } else {
                    $save = false;
                    $this->Session->setFlash(MyClass::translate('Slider Image width & height not matched'), 'flash_error');
                }
            } else {
                unset($this->request->data['Picture']['picture_image']);
            }

            if ($save) {
                if ($this->Picture->save($this->request->data)) {
                    $picture_id = $this->Picture->getLastInsertID();
                    $this->Session->setFlash(MyClass::translate('Picture has been successfully added'), 'flash_success');
                    $this->redirect(array('controller' => 'pictures', 'action' => 'edit', $picture_id, 'admin' => true));
                }
            }
        }
        $this->set('admin_submenu', 'slider');
    }

    public function admin_edit($picture_id) {
        if ($this->request->is('post') || $this->request->is('put')) {
            if (!empty($this->request->data['Picture']['picture_image']['name'])) {
                $image_name = MyClass::getRandomString(5) . "_" . $this->data['Picture']['picture_image']['name'];
                $image_path = PICTURE_IMAGE_FOLDER . $image_name;
                $image_temp_name = $this->data['Picture']['picture_image']['tmp_name'];
                move_uploaded_file($image_temp_name, $image_path);
                $this->Image->prepare(WWW_ROOT . DS . $image_path);
                $this->Image->resize(SLIDER_WIDTH, SLIDER_HEIGHT, 0, 136, 204); //width,height,Red,Green,Blue
                $this->Image->save(WWW_ROOT . DS . $image_path);
                $this->request->data['Picture']['picture_image'] = $image_name;
                $old_image_path = PICTURE_IMAGE_FOLDER . $this->data['Picture']['picture_old_image'];
                MyClass::fileDelete($old_image_path);
            } else {
                unset($this->request->data['Picture']['picture_image']);
            }

            $this->Picture->save($this->request->data);
            $this->Session->setFlash(MyClass::translate("Content updated successfully"), 'flash_success');
        }
        $this->data = $this->Picture->findByPictureId($picture_id);
        $this->set('admin_submenu', 'slider');
    }

    public function admin_parralex() {
        if ($this->request->is('post') || $this->request->is('put')) {
            if (!empty($this->request->data['Picture']['picture_image']['name'])) {
                $image_name = MyClass::getRandomString(5) . "_" . $this->data['Picture']['picture_image']['name'];
                $image_path = PICTURE_IMAGE_FOLDER . $image_name;
                $image_temp_name = $this->data['Picture']['picture_image']['tmp_name'];
                move_uploaded_file($image_temp_name, $image_path);
                $this->request->data['Picture']['picture_image'] = $image_name;
                $old_image_path = PICTURE_IMAGE_FOLDER . $this->data['Picture']['picture_old_image'];
                MyClass::fileDelete($old_image_path);
            } else {
                unset($this->request->data['Picture']['picture_image']);
            }

            $this->Picture->save($this->request->data);
            $this->Session->setFlash(MyClass::translate("Content updated successfully"), 'flash_success');
        }
        $this->data = $this->Picture->findByPictureBlock('PL');
        $this->set('admin_submenu', 'parralex');
    }

    public function admin_delete($picture_id) {
        if (!$this->Picture->exists($picture_id)) {
            throw new NotFoundException(MyClass::translate('Invalid Picture'));
        }

        $picture = $this->Picture->findByPictureId($picture_id);
        if ($this->Picture->delete($picture_id, true)) {
            $old_image_path = PICTURE_IMAGE_FOLDER . $picture['Picture']['picture_image'];
            MyClass::fileDelete($old_image_path);
            $this->Session->setFlash(MyClass::translate('Product picture deleted successfully'), 'flash_success');
            $this->redirect(array('controller' => 'pictures', 'action' => 'index', 'admin' => true));
        }
    }

}
