<?php

namespace controllers\internals;

use \models\url as ModelUrl;

class api extends \InternalController
{
    public function __construct(\PDO $pdo)
    {   
        $this->model_url = new ModelUrl($pdo);
    }   

    public function get_urls ()
    {   
        $urls_list = $this->model_url->get_urls();
        
        if(!empty($urls_list))
        {
            return $urls_list;
        }

        return false;
    }

    public function get_ids_and_urls ()
    {   
        $urls_list = $this->model_url->get_urls();
        
        if(!empty($urls_list))
        {
            return $urls_list;
        }

        return false;
    }
}