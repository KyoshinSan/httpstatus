<?php

namespace models;

class url extends \Model
{
    public function get_one_by_url (string $url)
    {   
        return $this->get_one('urls', ['url' => $url]);
    }

    public function get_urls ()
    {   
        return $this->get('urls');
    }   
    
   	public function create (string $url, string $name)
    {
        return $this->insert('urls', [
            'url' => $url,
        ]);
    }

    public function modify (int $id, string $url, string $name)
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


}