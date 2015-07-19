<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		//Consultar a la DB si existe registro igual al username ingresado en el form
		$user=Users::model()->find("LOWER(username)=?", array(strtolower($this->username)));

		if($user===NULL) //Devolver error si no existe Username
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif(sha1($this->password)!==$user->password) //Devolver error si no coincide Password
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			//Setear variables para tener acceso desde la aplicacion usando Yii::app()->user->id
			$this->_id=$user->id;
			$this->setState("email", $user->email);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}
}