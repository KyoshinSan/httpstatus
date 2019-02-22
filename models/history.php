<?php

namespace models;

class history extends \Model
{

	public function create (int $id, int $status, \DateTime $at)
	{

		return $this->insert('history', [
			'id' => $id,
			'status' => $status,
			'at' => $at->format('Y-m-d H:i:s'),
		]);

	}

	public function gets_history_by_id_desc (int $id)
	{

		return $this->get('history', ['id' => $id], 'at', 'desc');

	}

	public function gets_histories ()
	{

		return $this->get('history');

	}

}