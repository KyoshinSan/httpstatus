<?php
namespace controllers\internals;

use \models\history as ModelHistory;
use \models\url as ModelUrl;

class history extends \Controller
{

	public function __construct(\PDO $pdo)
	{
		$this->model_history = new ModelHistory($pdo);
		$this->model_url = new ModelUrl($pdo);
	}

	public function add_history(string $url, int $id)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		$this->model_history->create($id, $httpcode ,new \DateTime());
	}

	public function check_history()
	{
		$urls = $this->model_url->get_urls();

		while (true)
		{
			foreach ($urls as $key => $url) 
			{
				$ch = curl_init($urls[$key]['url']);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$output = curl_exec($ch);
				$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				curl_close($ch);

				$this->model_history->create($urls[$key]['id'], $httpcode ,new \DateTime());
				$this->model_url->modify_history($urls[$key]['id'], $httpcode ,new \DateTime());
			}

			sleep(120);
			$urls = $this->model_url->get_urls();

		}
	}

	public function gets_history ($id)
    {   
        $history_exist = $this->model_history->gets_history_by_id_desc($id);
        
        if($history_exist)
        {
            return $history_exist;
        }

        return false;
    }

    public function gets_histories ()
    {   
        $histories_exists = $this->model_history->gets_histories();
        
        if($histories_exists)
        {
            return $histories_exists;
        }

        return false;
    }

}