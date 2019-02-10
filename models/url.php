<?php

namespace models;

class url extends \Model
{
    public function get_one_by_url (string $url)
    {   
        return $this->get_one('url', ['url' => $url]);
    }   
    
   	public function create (string $url, string $name)
    {
        return $this->insert('url', [
            'url' => $url,
            'name' => $name,
        ]);
    }

    public function modify (int $id, string $url, string $name)
    {
        return $this->update(
            'url',
            [
                'url' => $url,
                'name' => $name,
            ],
            [
                'id' => $id,
            ]
        );
    }

    public function remove (int $id)
    {
        return $this->delete('url', ['id' => $id]);
    }


}
