<?php

namespace controllers\internals;

use \models\url as ModelUrl;

class url extends \InternalController
{
    public function __construct(\PDO $pdo)
    {   
        $this->model_url = new ModelUrl($pdo);
    }   

    public function add_url (string $url, string $name)
    {   
        $url_exist = $this->model_url->get_one_by_url($url);
        if(!$url_exist)
        {
            $this->model_url->create($url, $name);
        }
    }
}