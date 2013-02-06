<?php

class Admin_Model_UserRegisMapper extends Zend_Db_Table_Abstract
{
	    protected $_name = "registry";
	 	public function save (Admin_Model_UserRegis $users)
	    {
	        $data = array(	
	        				'RegistryId' => $users -> getRegistryId(),
					        'UserName' => $users -> getUserName(), 
					        'FullName' => $users -> getFullName(),
	        				'Birthday' => $users -> getBirthday(),
					        'Email' => $users -> getEmail(), 
	        				'PhoneNumber' => $users -> getPhoneNumber(),
	        				'SexAccount' => $users -> getSexAccount(),
	        				'HomeTown' => $users -> getHomeTown(),
	        				'Capchar' => $users -> getCapchar(),
					        'PassWord' => $users -> getPassWord()
	        );
	        $this ->  insert($data);
	    }
	    public function fetchUser ()
	    {
	        $resultSet = $this -> fetchAll();
	        $entries = array();
	        foreach ($resultSet as $row) {
	            $entry = new Admin_Model_UserRegis();
	            $entry
	            	-> setRegistryId($row['RegistryId'])
	            	-> setUserName($row['UserName'])
	            	-> setUserName($row['UserName'])
	                -> setFullName($row['FullName'])
	                -> setBirthday($row['Birthday'])
	                -> setEmail($row['Email'])
	                -> setPhoneNumber($row['PhoneNumber'])
	                -> setSexAccount($row['SexAccount'])
	                -> setHomeTown($row['HomeTown'])
	                -> setCapchar($row['Capchar'])
	                -> setPassWord($row['PassWord']);
	            $entries[] = $entry;
	        }
	        return $entries;
	    }
	    public  function deleteUser($userID)
	    {
	    	$row = $this->fetchRow('RegistryId = '.$userID);
			$row -> delete();
	    } 
	    public function updateUser(Admin_Model_UserRegis $users){
	    	$userId = $users -> getRegistryId();
			$data = array(	
							'UserName' => $users -> getUserName(), 
							'FullName' => $users -> getFullName(),
							'Birthday' => $users -> getBirthday(),
							'Email' => $users -> getEmail(), 
							'PhoneNumber' => $users -> getPhoneNumber(),
							'SexAccount' => $users -> getSexAccount(),
	        				'HomeTown' => $users -> getHomeTown(),
	        				'Capchar' => $users -> getCapchar(),
					        'PassWord' => $users -> getPassWord()
		        );
			$this->update($data, 'RegistryId = '.$userId);
		    }
		    
	    public function getValueByPara($paraEdit){
	    	$entry = new Admin_Model_UserRegis();
			$row = $this -> fetchRow('RegistryId =' . $paraEdit);
			$entry
					-> setRegistryId($row['RegistryId'])
	            	-> setUserName($row['UserName'])
	                -> setFullName($row['FullName'])
	                -> setBirthday($row['Birthday'])
	                -> setEmail($row['Email'])
	                -> setPhoneNumber($row['PhoneNumber'])
	                -> setSexAccount($row['SexAccount'])
	                -> setHomeTown($row['HomeTown'])
	                -> setCapchar($row['Capchar'])
	                -> setPassWord($row['PassWord']);
	            
	        return $entry;
		}
}

