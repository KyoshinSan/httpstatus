<?php

namespace controllers\internals;

use \models\user as ModelUser;

class user extends \InternalController
{
    public function __construct(\PDO $pdo)
    {   
        $this->model_user = new ModelUser($pdo);
    }   

    public function check_credentials (string $email, string $password)
    {   
        $user = $this->model_user->get_one_by_email($email);
        $user_exist = password_verify($password , $user['password']);
        if($user_exist)
        {
            return $user;
        }

        return false;
    }

    public function check_api_key (string $api_key)
    {   
        $user_exist = $this->model_user->get_one_by_api_key($api_key);
        if($user_exist)
        {
            return true;
        }

        return false;
    }
}