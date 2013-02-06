<?php

class Admin_Form_Contact extends Zend_Form
{
    public function init()
    {	 
        /* Form Elements & Other Definitions Here ... */
    	$this -> setMethod( Zend_Form :: METHOD_POST);
    	/**/
    	$registryId = new Zend_Form_Element_Hidden('RegistryId');
    	$this -> addElement($registryId);
    	
    	$username = new Zend_Form_Element_Text('UserName');
        $unameValidator = new Zend_Validate_StringLength(0, 50);
        $unameRegex = new Zend_Validate_Regex('/[a-zA-Z]/');
		$unameRegex->setMessage('Your validation message goes here', Zend_Validate_Regex::NOT_MATCH);
        $username->setLabel('Your Name:');
        $username->setRequired(true);
        $username->setValidators(array($unameValidator,$unameRegex));
        $this->addElement($username);
        
        $password = new Zend_Form_Element_Password('PassWord');
        $password->setLabel('Your password: ');
        $password->setRequired(true);
        $this->addElement($password);
        
        $fullname = new Zend_Form_Element_Text('FullName');
        $fnameValidator = new Zend_Validate_StringLength(0,50);
        $fullname->setLabel('Your FullName:');
        $fullname->setValidators(array($fnameValidator));
        $fullname->setFilters(array('StringTrim'));
        $this->addElement($fullname);
		
        $date = new Zend_Form_Element_Select('date');
        $month = new Zend_Form_Element_Select('month');
        $year = new Zend_Form_Element_Select('year');
        
        $date -> addMultiOption('0','Date');
        $date -> setName("date")
        	  -> setValue('0');
	        for ($d = 1; $d <= 31; $d++)
		        {
		        	$date -> addMultiOption($d,$d);
		        } 
	   	$month -> addMultiOption('0','Month');
        $month -> setName("month")
        	  -> setValue('0');
	        for ($d = 1; $d <= 12; $d++)
		        {
		        	$month -> addMultiOption($d,$d);
		        } 
        $year -> addMultiOption('0','Year');
        $year -> setName("year")
        	  -> setValue('0');
	        for ($d = 1970; $d <= date('Y'); $d++)
		        {
		        	$year -> addMultiOption($d,$d);
		        } 
	   	$this -> addElements(array($date,$month,$year));
        
        $email = new Zend_Form_Element_Text('Email');
        $emailValidator = new Zend_Validate_EmailAddress();
        $email -> setLabel('Your Email:');
        $email -> setValidators(array($emailValidator));
        $this -> addElement($email);
        
        $phoneNumber = new Zend_Form_Element_Text('PhoneNumber');
        $phoneNumber -> setLabel('Phone Number:');
        $this -> addElement($phoneNumber);
        
        $sexAccount = new Zend_Form_Element_Select('SexAccount');
        $sexAccount -> addMultiOption('01','Nam');
        $sexAccount -> addMultiOption('02','Nữ');
        $sexAccount -> addMultiOption('GT','Giới tính');
        $sexAccount -> setLabel("SexAccount: ")
        			-> setName('SexAccount');
        $sexAccount	-> setValue('GT');
		$this -> addElement($sexAccount);
        
        $homeTown = new Zend_Form_Element_Textarea('HomeTown');
        $homeTown ->setAttrib('cols', '40')
				  ->setAttrib('rows', '4');
        $homeTown -> setValue('Hải Dương Việt Nam');
        $this -> addElement($homeTown);
        
        $capchar = new Zend_Form_Element_Text('Capchar');
        $capchar -> setLabel('Capchar: ');
        $this -> addElement($capchar);

        $submit = new Zend_Form_Element_Submit('submit');        
        $submit->setLabel('Add Member');
        $reset = new Zend_Form_Element_Reset('reset');
        $reset->setLabel('Reset');
        $this->addElements(array($submit,$reset));
    }
}

