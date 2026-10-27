<?php namespace App\Models;
use CodeIgniter\Model;


class UserModel extends Model
{
	public function simpan($data)
	{
		$query=$this->db->table('pelanggan')->insert($data);
        return $query;

	}

	public function cek_login($username)
	{
		return $this->db->table('pelanggan')
		->where(array('user_name'=>$username))
		->get()->getRowArray();
	}
}