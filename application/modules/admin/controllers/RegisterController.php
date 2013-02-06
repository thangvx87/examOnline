<?php

class Admin_RegisterController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       // action body
        require_once APPLICATION_PATH . '\modules\admin\forms\Contact.php';
        $request = $this->getRequest();
        $form = new Admin_Form_Contact();
        $actionUrl = $this -> view -> url(array('module' => 'admin', 'controller' => 'Register', 'action' => 'index'), 'moduleRoute', true);
        $form -> setAction($actionUrl);
        if ($request -> isPost()) {
            if ($form->isValid($request -> getPost())) {
                $comment = new Admin_Model_UserRegis($form -> getValues());
                $mapper = new Admin_Model_UserRegisMapper();
                $mapper->save($comment);
//              return $this->_helper->redirector('index');
            }
            else {
        		Zend_Debug::dump($form -> getMessages());
            	$form -> populate($request -> getPost());
            	$this->view->errors = $form -> getMessages();
            }
        }
        $this->view->form = $form;
    }


}

