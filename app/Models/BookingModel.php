<?php

namespace App\Models;

use CodeIgniter\Model;


class BookingModel extends Model
{
    protected $table                = 'pemesanan';
    protected $primaryKey           = 'id_pemesanan';
    protected $allowedFields       = ['id_pemesanan', 'id_member', 'nama_member', 'id_paket','nama_paket', 'ttl_bayar', 'sisa_bayar', 'tgl_trx', 'stts_trx', 'tgl_take', 'jam', 'catatan',];

    public function tampildata()
    {
        return $this->table('pemesanan')->join('pelanggan', 'idmember=id_member');
    }
    public function noFaktur($tanggalSekarang)
    {
        return $this->table('pemesanan')->select('max(id_pemesanan) as nofaktur')->where('tgl_trx', $tanggalSekarang)->get();
        //select mas(faktur) as nofaktur from barangkeluar where tglfaktur='';
    }
     public function getLaporanJadwal()
    {
        return $this->table('pemesanan');
    }
    public function savePemesanan($data)
    {
        $query = $this->db->table('pemesanan')->insert($data);
        return $query;
    }
}
