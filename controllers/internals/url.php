<?php

namespace controllers\internals;

use \models\url as ModelUrl;

class url extends \InternalController
{
    public function __construct(\PDO $pdo)
    {   
        $this->model_url = new ModelUrl($pdo);
    }   

    public function add_url (string $url)
    {   
        $url_exist = $this->model_url->get_one_by_url($url);
        if(!$url_exist)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $this->model_url->create($url, $httpcode, new \DateTime());
        }
    }

    public function get_urls ()
    {   
        $urls_exists = $this->model_url->get_urls();
        
        if($urls_exists)
        {
            return $urls_exists;
        }

        return false;
    }

    public function get_url (string $url)
    {   
        $url_exist = $this->model_url->get_one_by_url($url);
        
        if($url_exist)
        {
            return $url_exist;
        }
        return false;
    }

    public function delete_url (int $id)
    {   
        $this->model_url->remove($id);
    }

    public function modify_url (string $url, int $id)
    {   
        $url_exist = $this->model_url->get_one_by_url($url);
        if(!$url_exist)
        {
            $this->model_url->modify_url($url, $id);
        }
    }

    public function get_url_by_id ($id)
    {   
        $url_exist = $this->model_url->get_one_by_id($id);
        
        if($url_exist)
        {
            return $url_exist;
        }

        return false;
    }
}