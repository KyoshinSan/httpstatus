<?php
namespace controllers\publics;

use \controllers\internals\user as InternalUser;
use \controllers\internals\url as InternalUrl;
use \controllers\internals\history as InternalHistory;

class api extends \Controller
{

	public function __construct (\PDO $pdo)
    {
        parent::__construct($pdo);
        $this->internal_user = new InternalUser($pdo);
        $this->internal_url = new InternalUrl($pdo);
        $this->internal_history = new InternalHistory($pdo);
    }
    /** 
     * Home Page
     */ 
    public function api()
    {   
        $api_key = $_GET['api_key'] ?? false;

        $user = $this->internal_user->check_api_key($api_key);

        if ($user)
        {
            $datas = array(
                'version' => 1,
                'list' => \Router::url('api', 'list'),
            );
            header('Content-Type: application/json');
            echo json_encode($datas);

            return true;
        }

        return false;
    }

    public function list()
    {   
        $api_key = $_GET['api_key'] ?? false;

        $user = $this->internal_user->check_api_key($api_key);

        if ($user)
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

            return true;
        }

        return false;
    }

    public function status($id)
    {   
        $api_key = $_GET['api_key'] ?? false;

        $user = $this->internal_user->check_api_key($api_key);

        if ($user)
        {
            $url = $this->internal_url->get_url_by_id($id);
            $datas = array(
                'id' => $url['id'],
                'url' => $url['url'],
                'status' => ['code' => $url['last_status'], 'at' => $url['last_at']],
            );

            header('Content-Type: application/json');
            echo json_encode($datas);

            return true;
        }

        return false;
    }

    public function history($id)
    {   
        $api_key = $_GET['api_key'] ?? false;

        $user = $this->internal_user->check_api_key($api_key);

        if ($user)
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

            return true;
        }

        return false;
    }    

    public function add ()
    {   
        $api_key = $_GET['api_key'] ?? false;
        $user = $this->internal_user->check_api_key($api_key);

        $url = $_POST['url'] ?? false;

        if ($user)
        {

            if (!$url || !filter_var($url, FILTER_VALIDATE_URL))
            {
                $datas = array(
                    'success' => false,
                );

                header('Content-Type: application/json');
                echo json_encode($datas);
                return false;
            }

            $this->internal_url->add_url($url);
            $id = $this->internal_url->get_url($url);
            $this->internal_history->add_history($url, $id['id']);

            $datas = array(
                'success' => true,
                'id' => $id['id'],
            );

            header('Content-Type: application/json');
            echo json_encode($datas);

            return true;
        }

        return false;

    } 

    public function delete ($id)
    {   
        $api_key = $_GET['api_key'] ?? false;
        $user = $this->internal_user->check_api_key($api_key);

        if ($user)
        {
            $id = intval($id);
            $this->internal_url->delete_url($id);
            $datas = array(
                'success' => true,
                'id' => $id['id'],
            );

            header('Content-Type: application/json');
            echo json_encode($datas);

            return true;
        }

        $datas = array(
            'success' => false,
        );

        header('Content-Type: application/json');
        echo json_encode($datas);
        
        return false;

    }

}