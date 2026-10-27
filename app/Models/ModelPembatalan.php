<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembatalan extends Model
{
	protected $table                = 'pembatalan';
	protected $primaryKey           = 'invoice';
	protected $allowedFields       = ['invoice', 'alasan'];
}
