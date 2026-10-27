<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelPembayaran extends Model
{
    protected $table                = 'pembayaran';
    protected $primaryKey           = 'invoice';
    protected $allowedFields       = ['invoice', 'id_member', 'nama_pengirim', 'rek_pelanggan', 'bukti_tf'];
}
