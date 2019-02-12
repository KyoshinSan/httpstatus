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
    
   	public function create (string $url)
    {
        return $this->insert('urls', [
            'url' => $url,
        ]);
    }

    public function modify (string $url, int $id)
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
