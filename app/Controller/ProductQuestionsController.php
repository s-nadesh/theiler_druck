<?php

class ProductQuestionsController extends AppController {

    public $name = 'ProductQuestions';

    //This function will execute before every action.
    public function beforeFilter() {
        parent::beforeFilter();
        $admin_auth_actions = array('admin_index', 'admin_edit');
        if (in_array($this->action, $admin_auth_actions)) {
            if (!$this->Session->check('Admin.id'))
                $this->goAdminLogin();
        }
        $this->set('admin_menu', 'product_questions');
    }

    public function admin_index() {
        $unanswered_questions = $this->ProductQuestion->find('all', array(
            'conditions' => array(
                'ProductAnswer.answer_content' => null,
            ),
            'order' => array('ProductQuestion.created DESC')
        ));

        $answered_questions = $this->ProductQuestion->find('all', array(
            'conditions' => array(
                'ProductAnswer.answer_content !=' => '',
            ),
            'order' => array('ProductQuestion.created DESC')
        ));

        $this->set(compact('unanswered_questions', 'answered_questions'));
    }

    public function admin_edit($question_id) {
        if ($this->request->is('post') || $this->request->is('put')) {
            $answer_exists = $this->ProductQuestion->ProductAnswer->find('first', array('conditions' => array(
                    'ProductAnswer.product_question_id' => $question_id,
                    'ProductAnswer.answer_content !=' => null,
            )));

            if (!empty($answer_exists)) {
                $update_answer = array(
                    'ProductAnswer' => array(
                        'product_answer_id' => $answer_exists['ProductAnswer']['product_answer_id'],
                        'answer_content' => $this->data['ProductAnswer']['answer_content'],
                    )
                );

                $this->ProductQuestion->ProductAnswer->save($update_answer);
                $this->Session->setFlash(__("Your answer saved successfully"), 'flash_success');
            } else {
                $insert_answer = array(
                    'ProductAnswer' => array(
                        'product_question_id' => $question_id,
                        'answer_content' => $this->data['ProductAnswer']['answer_content'],
                    )
                );

                $this->ProductQuestion->ProductAnswer->save($insert_answer);
                $this->Session->setFlash(__("Your answer saved successfully"), 'flash_success');
            }
            $this->redirect('index');
        }

        $this->data = $this->ProductQuestion->findByProductQuestionId($question_id);
    }

    //Add question from Product detail page.
    public function add() {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            if (strtolower($this->data['ProductQuestion']['captcha']) == strtolower($this->Session->read('Captcha.random_number'))) {
                if ($this->ProductQuestion->save($this->data)) {
                    $this->askQuestionMail($this->data);
                    $ret = array(
                        'sts' => 'success',
                        'class' => 'alert fade in block-inner alert-success',
                        'message' => __('Your question submitted successfully')
                    );
                } else {
                    $ret = array(
                        'sts' => 'danger',
                        'class' => 'alert fade in block-inner alert-danger',
                        'message' => __('Your question not submitted. Try again later')
                    );
                }
            } else {
                $ret = array(
                    'sts' => 'danger',
                    'class' => 'alert fade in block-inner alert-danger',
                    'message' => __('Captcha is not matched')
                );
            }
        }
        echo json_encode($ret);
        exit;
    }

    public function askQuestionMail($data) {
        if ($data) {
            $product = $this->requestAction('products/getProduct/' . $data['ProductQuestion']['product_id']);
            $Email = new CakeEmail(MAILSENDBY);
            $Email->from(array($data['ProductQuestion']['question_email'] => $data['ProductQuestion']['question_name']))
                    ->template('ask_a_question', 'email_layout')
                    ->emailFormat('html')
                    ->to(SITEMAIL)
                    ->subject('Frage zum Produkt: ' . $product['Product']['product_name'])
                    ->viewVars(array(
                        'data' => $data,
                    ))
                    ->send();
        }
    }

    public function getAnswersByProduct($product_id) {
        $answered_questions = $this->ProductQuestion->ProductAnswer->find('all', array(
            'conditions' => array('ProductQuestion.product_id' => $product_id),
            'order' => array('ProductAnswer.created DESC')
        ));
        return $answered_questions;
    }

}
