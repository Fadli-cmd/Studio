<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKaryawan extends Model
{
	protected $table                = 'karyawan';
	protected $primaryKey           = 'kd_karyawan';
	protected $allowedFields       = ['kd_karyawan', 'nama_karyawan', 'alamat', 'no_hp', 'bidang_kerja'];


	public function tampildata()
	{
		return $this->table('karyawan');
	}
}
