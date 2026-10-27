<?php

namespace App\Models;

use CodeIgniter\Model;


class HalamanModel extends Model
{
    public function getPaket()
    {
        $builder = $this->db->table('paket');
        return $builder->get();
    }
    public function getGaleri()
    {
        $builder = $this->db->table('galeri');
        return $builder->get();
    }
}
