<?php
 
// this file must be stored in:
// protected/components/WebUser.php
 
class WebUser extends CWebUser {
 
	// Store model to not repeat query.
	private $_model;
 
	// Return first name.
	// access it by Yii::app()->user->first_name
	function getFirst_Name(){
		$user = $this->loadUser(Yii::app()->user->id);
		return $user->first_name;
	}
	function getUsername(){
		$user = $this->loadUser(Yii::app()->user->id);
		return $user->username;
	}
	function getPrivilege(){
		$user = $this->loadUser(Yii::app()->user->id);
		return $user->privilege;
	}
	function getUser_Type(){
		$user = $this->loadUser(Yii::app()->user->id);
		return $user->user_type;
	}
	
	function isAdmin(){
		$user = $this->loadUser(Yii::app()->user->id);
		if ($user===null)
			return false;
		else
			if($user->user_type === 'Admin')
				return true;
			else
				return false;
	}
	function isResident(){
		$user = $this->loadUser(Yii::app()->user->id);
		if ($user===null)
			return false;
		else
			if($user->user_type === 'Resident')
				return true;
			else
				return false;
	}
	function isBusiness(){
		$user = $this->loadUser(Yii::app()->user->id);
		if ($user===null)
			return false;
		else
			if($user->user_type === 'Business')
				return true;
			else
				return false;
	}
 
  // Load user model.
	protected function loadUser($id=null){
		if($this->_model===null){
			if($id!==null)
				$this->_model=User::model()->findByPk($id);
		}
		return $this->_model;
    }
}
?>