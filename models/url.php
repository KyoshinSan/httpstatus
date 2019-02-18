<?php

namespace models;

class url extends \Model
{
    public function get_one_by_url (string $url)
    {   
        return $this->get_one('urls', ['url' => $url]);
    }

    public function get_one_by_id (string $id)
    {   
        return $this->get_one('urls', ['id' => $id]);
    }

    public function get_urls ()
    {   
        return $this->get('urls', [], 'id', 'desc');
    }   
    
   	public function create (string $url, int $status, \DateTime $at)
    {
        return $this->insert('urls', [
            'url' => $url,
            'last_status' => $status,
            'last_at' => $at->format('Y-m-d H:i:s'),
        ]);
    }

    public function modify_url (string $url, int $id)
    {
        return $this->update(
            'urls',
            [
                'url' => $url,
            ],
            [
                'id' => $id,
            ]
        );
    }

    public function remove (int $id)
    {
        return $this->delete('urls', ['id' => $id]);
    }

    public function modify_history (string $id, int $status, \DateTime $at)
    {
        return $this->update(
            'urls',
            [
                'last_status' => $status,
                'last_at' => $at->format('Y-m-d H:i:s'),
            ],
            [
                'id' => $id,
            ]
        );
    }

}
