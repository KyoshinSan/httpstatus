<?php
namespace controllers\publics;

use \controllers\internals\url as InternalUrl;
use \controllers\internals\history as InternalHistory;

class api extends \Controller
{

	public function __construct (\PDO $pdo)
    {
        parent::__construct($pdo);
        $this->internal_url = new InternalUrl($pdo);
        $this->internal_history = new InternalHistory($pdo);
    }
    /** 
     * Home Page
     */ 
    public function api()
    {   
        $datas = array(
            'version' => 1,
            'list' => \Router::url('api', 'list'),
        );
        header('Content-Type: application/json');
        echo json_encode($datas);
    }

    public function list()
    {   
        $urls = $this->internal_url->get_urls();
        $websites = array();

        foreach ($urls as $key => $url)
        {
            $websites[$key]['id'] = $url['id'];
            $websites[$key]['url'] = $url['url'];
            $websites[$key]['delete'] = \Router::url('api', 'delete', ['id'=>$url['id']]);
            $websites[$key]['status'] = \Router::url('api', 'status', ['id'=>$url['id']]);
            $websites[$key]['history'] = \Router::url('api', 'history', ['id'=>$url['id']]);
        }
        $datas = array(
            'version' => 1,
            'website' => $websites,
        );

        header('Content-Type: application/json');
        echo json_encode($datas);
    }

    public function status($id)
    {   
        $url = $this->internal_url->get_url_by_id($id);
        $datas = array(
            'id' => $url['id'],
            'url' => $url['url'],
            'status' => ['code' => $url['last_status'], 'at' => $url['last_at']],
        );

        header('Content-Type: application/json');
        echo json_encode($datas);
    }

    public function history($id)
    {   
        $url = $this->internal_url->get_url_by_id($id);
        $history = $this->internal_history->gets_history($id);
        $status = array();

        foreach ($history as $key => $values)
        {
            $status[$key]['code'] = $values['status'];
            $status[$key]['at'] = $values['at'];
        }

        $datas = array(
            'id' => $url['id'],
            'url' => $url['url'],
            'status' => $status,
        );

        header('Content-Type: application/json');
        echo json_encode($datas);
    }    

}