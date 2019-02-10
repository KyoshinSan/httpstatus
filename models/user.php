<?php

namespace models;

class user extends \Model
{
    public function get_one_by_email ($email)
    {   
        return $this->get_one('user', ['email' => $email]);
    }   
    
    public function get_one_by_api_key ($api_key)
    {   
        return $this->get_one('user', ['api_key' => $api_key]);
    }   
}
