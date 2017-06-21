<?php

class Model_Login extends Model
{

	public function check_login($login,$password)
	{
echo $login;
    $salt = "salt";
    $password = md5($password.$salt);
    $check = $this->db_get_one('SELECT id FROM users WHERE password = :pass AND login = :login',array(
      ':pass' => $password,
      ':login' => $login
    ));

    if(!empty($check))
    {
      return true;
    } else {
      return false;
    }

	}

}
