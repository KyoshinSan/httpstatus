<?php
namespace controllers\publics;

use \controllers\internals\user as InternalUser;

class httpstatus extends \Controller
{

	public function __construct (\PDO $pdo)
    {
        parent::__construct($pdo);
        $this->internal_user = new InternalUser($pdo);
    }
    /** 
     * Home Page
     */ 
    public function home()
    {   
        return $this->render("httpstatus/home");
    }

    public function login()
    {
    	$email = $_POST['email'] ?? false;
    	$password = $_POST['password'] ?? false;

    	if (!$email || !$password)
    	{
    		header('Location: ' . HTTP_PWD);
            return false;
    	}

    	$user = $this->internal_user->check_credentials($email, $password);

        if($user)
        {
            $_SESSION['user'] = $user;
            header('Location: ' . HTTP_PWD);
            return true;
        }

        header('Location: ' . HTTP_PWD);
        return false;
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . HTTP_PWD);
        return true;
    }


}