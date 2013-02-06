<?php
class Admin_ListAccountController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $listAcc = new Admin_Model_UserRegisMapper();
        $this->view->listUsers = $listAcc -> fetchUser();
    }

    public function deleteRowAction()
    {
        // action body
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $deleteRow = new Admin_Model_UserRegisMapper();
        $str = $this -> _request -> getParam("paraDelete");
        $deleteRow -> deleteUser($str);
        return $this->_helper->redirector('index');
    }

    public function editMemberAction()
    {
        // action body
        require_once APPLICATION_PATH . '\modules\admin\forms\Contact.php';
        $request = $this->getRequest();
        $str = $this -> _request -> getParam("paraEdit");
        
		$form = new Admin_Form_Contact();    
		$valueForm = new Admin_Model_UserRegisMapper();
		$valueRow = $valueForm -> getValueByPara($str);
		$form -> RegistryId -> setValue($valueRow -> getRegistryId());
		$form -> UserName -> setValue($valueRow -> getUserName());
		$form -> FullName -> setValue($valueRow -> getFullName());
			$birthday = explode("/",$valueRow -> getBirthday());
			$form -> date -> setvalue($birthday[0]);
			$form -> month -> setvalue($birthday[1]);
			$form -> year -> setvalue($birthday[2]);
		$form -> Email -> setValue($valueRow -> getEmail());
		$form -> PhoneNumber -> setValue($valueRow -> getPhoneNumber());
		$form -> SexAccount -> setValue($valueRow -> getSexAccount());
		$form -> HomeTown -> setValue($valueRow -> getHomeTown());
		$form -> Capchar -> setValue($valueRow -> getCapchar());
		$form -> PassWord -> setValue($valueRow -> getPassWord());
		if ($request -> isPost()) {
            if ($form->isValid($request -> getPost())) {
                $comment = new Admin_Model_UserRegis($form -> getValues());
                //$comment -> setRegistryId($str);
                $mapper = new Admin_Model_UserRegisMapper();
                $mapper -> updateUser($comment);
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











