<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGaleri extends Model
{
	protected $table                = 'galery';
	protected $primaryKey           = 'id_galery';
	protected $allowedFields       = ['id_galery', 'foto_galery'];

	public function tampildata()
	{
		return $this->table('galery');
	}
	public function tampildata2()
	{
		return $this->table('galery');
	}
}
