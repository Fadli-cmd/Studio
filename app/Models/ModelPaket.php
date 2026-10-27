<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPaket extends Model
{
	protected $table                = 'paket';
	protected $primaryKey           = 'id_paket';
	protected $allowedFields       = ['id_paket', 'nama_paket', 'harga', 'ket_paket', 'foto_paket'];

	public function tampildata()
	{
		return $this->table('paket');
	}

	public function tampildata_cari($cari)
	{
		return $this->table('paket');
	}
	public function paketdetail($id)
	{
		$sql = "SELECT * from paket WHERE id_paket='$id'";
		$query = $this->db->query($sql);
		$data = $query->getResultArray();
		return $data;
	}
}
