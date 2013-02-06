<?php

class Admin_Model_UserRegis
{
	protected $_registryId;
	protected $_userName;
    protected $_fullName;
    protected $_birthday;
    protected $_phoneNumber;
    protected $_sexAccount;
    protected $_homeTown;	
    protected $_capchar;
    protected $_email;
    protected $_passWord;
    public function __construct (array $options = null)
    {
        if (is_array($options)) {
            $this -> setOptions($options);
        }
    }
    public function __set ($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || ! method_exists($this, $method)) {
            throw new Exception('Invalid guest property');
        }
        $this -> $method($value);
    }
    public function __get ($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || ! method_exists($this, $method)) {
            throw new Exception('Invalid guest property');
        }
        return $this->$method();
    }
    public function setOptions (array $options)
    {
        $methods = get_class_methods($this);//lay tat ca ham trong this class return 1 array
        $bd = '';
        foreach ($options as $key => $value) {
        	if ($key == 'date' || $key == 'month' || $key == 'year' ){
        		 $bd = $bd.'/'.$value;
        	}
            $method = 'set' . ucfirst($key); //setRegisterId
            if (in_array($method, $methods)) {
            	$this -> $method($value);
            }
        }
        
        $this->setBirthday(substr($bd,1));
        return $this;
    }
    /*_registryId*/
    public function setRegistryId ($registryId)
	    {
	        $this->_registryId = (string) $registryId;
	        return $this;
	    }
    public function getRegistryId ()
	    {
	        return $this->_registryId;
	    }
	/*_userName*/
    public function setUserName ($username)
	    {
	        $this->_userName = (string) $username;
	        return $this;
	    }
    public function getUserName ()
	    {
	        return $this->_userName;
	    }
    /*_fullName*/
    public function setFullName ($fullname)
	    {
	        $this->_fullName = (string) $fullname;
	        return $this;
	    }
    public function getFullName ()
	    {
	        return $this->_fullName;
	    }
	/*_birthday*/
    public function setBirthday ($birthday)
	    {
	        $this->_birthday = (string) $birthday;
	        return $this;
	    }
    public function getBirthday ()
	    {
	        return $this->_birthday;
	    } 
    /*_birthday_DAY*/
    public function setDay ($day)
	    {
	        $this->_day = (string) $day;
	        return $this;
	    }
    public function getDay ()
	    {
	        return $this->_day;
	    } 
    
	    
	    
    /*_email*/
    public function setEmail ($email)
	    {
	        $this->_email = (string) $email;
	        return $this;
	    }
    public function getEmail ()
	    {
	        return $this->_email;
	    }
	/*_phoneNumber*/
    public function setPhoneNumber ($phoneNumber)
	    {
	        $this->_phoneNumber = (string) $phoneNumber;
	        return $this;
	    }
    public function getPhoneNumber ()
	    {
	        return $this->_phoneNumber;
	    }   
	/*_sexAccount*/
    public function setSexAccount ($SexAccount)
	    {
	        $this->_sexAccount = (string) $SexAccount;
	        return $this;
	    }
    public function getSexAccount ()
	    {
	        return $this->_sexAccount;
	    }  
	/*_homeTown*/
    public function setHomeTown ($homeTown)
	    {
	        $this->_homeTown = (string) $homeTown;
	        return $this;
	    }
    public function getHomeTown ()
	    {
	        return $this->_homeTown;
	    }
	/*_capchar*/
    public function setCapchar ($capchar)
	    {
	        $this->_capchar = (string) $capchar;
	        return $this;
	    }
    public function getCapchar ()
	    {
	        return $this->_capchar;
	    }
    /*_passWord*/
    public function setPassWord ($password)
	    {
	        $this->_passWord = (string) $password;
	        return $this;
	    }
    public function getPassWord ()
	    {
	        return $this->_passWord;
	    }

}

