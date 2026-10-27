<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\ModelPaket;

class Cart extends BaseController
{
	public function __construct()
	{
		$this->pemesanan = new BookingModel();
		$this->paket = new ModelPaket();
	}
	public function index()
	{

		$namauser = session()->get('login');
		$countdatapemesanan = $this->pemesanan->where('nama_member', $namauser)->countAllResults();
		$ttlorder = 0;
		if ($countdatapemesanan != 0) {
			$ttlorder = $countdatapemesanan;
		}
		$dataPemesanan = $this->pemesanan->where('nama_member', $namauser)->findAll();

		$countPemesanan = $this->pemesanan->where('nama_member', $namauser)->countAllResults();
		for ($i = 0; $i < $countPemesanan; $i++) {
			$dataPaket = $this->paket->where('id_paket', $dataPemesanan[$i]['id_paket'])->first();
			$dataPemesanan[$i]['url_gambar'] = $dataPaket['foto_paket'];
			$dataPemesanan[$i]['nama_paket'] = $dataPaket['nama_paket'];
		}
		$data = [
			'orderan' => $dataPemesanan,
			'ttl_data' => $ttlorder
		];

		// echo "<pre>";
		// print_r($data);

		return view('layout-frontend/cart', $data);
	}
}
