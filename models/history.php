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

}