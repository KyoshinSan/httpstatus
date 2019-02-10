<?php

namespace models;

class user extends \Model
{
    public function get_one_by_email (string $email)
    {   
        return $this->get_one('user', ['email' => $email]);
    }   
    
    public function get_one_by_api_key (string $api_key)
    {   
        return $this->get_one('user', ['api_key' => $api_key]);
    }   
}
