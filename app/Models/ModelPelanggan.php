<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelanggan extends Model
{
	protected $table                = 'pelanggan';
	protected $primaryKey           = 'idmember';
	protected $allowedFields       = ['idmember', 'user_name', 'email', 'alamat', 'telp'];


	public function tampildata()
	{
		return $this->table('pelanggan');
	}
}