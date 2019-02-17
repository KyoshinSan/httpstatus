<?php
namespace controllers\publics;

use \controllers\internals\api as InternalApi;

class api extends \Controller
{

	public function __construct (\PDO $pdo)
    {
        parent::__construct($pdo);
        $this->internal_api = new InternalApi($pdo);
    }
    /** 
     * Home Page
     */ 
    public function api()
    {   
        $datas = array(
            'version' => 1,
            'list' => 'http://example.fr/httpstatus/api/list/',
        );
        header('Content-Type: application/json');
        echo json_encode($datas);
    }

    public function list()
    {   
        $urls = $this->internal_api->get_urls();

        foreach ($urls as $key => $url)
        {
            $urls[$key]['delete'] = \Router::url('api', 'delete', ['id'=>$url['id']]);
            $urls[$key]['status'] = \Router::url('api', 'status', ['id'=>$url['id']]);
            $urls[$key]['history'] = \Router::url('api', 'history', ['id'=>$url['id']]);
        }
        $datas = array(
            'version' => 1,
            'website' => $urls,
        );

        header('Content-Type: application/json');
        echo json_encode($datas);
    }

    



}