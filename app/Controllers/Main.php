<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\ModelPelanggan;
use App\Models\ModelPembatalan;
use App\Models\ModelPembayaran;

class Main extends BaseController
{
	public function __construct()
	{
		$this->pemesanan = new BookingModel();
		$this->pembayaran = new ModelPembayaran();
        $this->pembatalan  = new ModelPembatalan();
	}

	public function index()
	{
		$now = date("Y-m-d");
		$countOrder = $this->pemesanan->countAllResults();
		$ttlcountOrder = 0;
		if ($countOrder != 0) {
			$ttlcountOrder = $countOrder;
		}
		$countJadwal = $this->pemesanan->where('stts_trx', "PEMBAYARAN DIKONFIRMASI")->where('tgl_take', $now)->countAllResults();
		$countMenungguPembayaran = $this->pemesanan->where('stts_trx', "MENUNGGU PEMBAYARAN")->countAllResults();
		$ttlcountMenungguPembayaran = 0;
		if ($countMenungguPembayaran != 0) {
			$ttlcountMenungguPembayaran = $countMenungguPembayaran;
		}
		$countMenungguKonfirmasi = $this->pemesanan->where('stts_trx', "MENUNGGU KONFIRMASI")->countAllResults();
		$ttlcountMenungguKonfirmasi = 0;
		if ($countMenungguKonfirmasi != 0) {
			$ttlcountMenungguKonfirmasi = $countMenungguKonfirmasi;
		}
		$dataOrder = $this->pemesanan->findAll();

		$data = [
			'countAllOrder' => $ttlcountOrder,
			'countMenungguPembayaran' => $ttlcountMenungguPembayaran,
			'countMenungguKonfirmasi' => $ttlcountMenungguKonfirmasi,
			'dataOrder' => $dataOrder,
			'ttlJadwal' => $countJadwal
		];

		// echo "<pre>";
		// print_r($data);

		return view('main/home', $data);
	}

	public function jadwal()
	{
		$now = date("Y-m-d");
		$countOrder = $this->pemesanan->countAllResults();
        $ttlcountOrder = 0;
        if ($countOrder != 0) {
            $ttlcountOrder = $countOrder;
        }
        $countMenungguPembayaran = $this->pemesanan->where('stts_trx', "MENUNGGU PEMBAYARAN")->countAllResults();
        $ttlcountMenungguPembayaran = 0;
        if ($countMenungguPembayaran != 0) {
            $ttlcountMenungguPembayaran = $countMenungguPembayaran;
        }
        $countMenungguKonfirmasi = $this->pemesanan->where('stts_trx', "MENUNGGU KONFIRMASI")->countAllResults();
        $dataJadwal = $this->pemesanan->where('stts_trx', "PEMBAYARAN DIKONFIRMASI")->where('tgl_take', $now)->findAll();
        for ($i = 0; $i < count($dataJadwal); $i++) {
            $dataPembayaran = $this->pembayaran->where('invoice', $dataJadwal[$i]['id_pemesanan'])->first();
            $dataJadwal[$i]['nama_pengirim'] = $dataPembayaran['nama_pengirim'];
            $dataJadwal[$i]['rek_pelanggan'] = $dataPembayaran['rek_pelanggan'];
            $dataJadwal[$i]['bukti_tf'] = $dataPembayaran['bukti_tf'];
        }

        $ttlcountMenungguKonfirmasi = 0;
        if ($countMenungguKonfirmasi != 0) {
            $ttlcountMenungguKonfirmasi = $countMenungguKonfirmasi;
        }
        // $dataOrder = $this->pemesanan->findAll();

        $data = [
            'countAllOrder' => $ttlcountOrder,
            'countMenungguPembayaran' => $ttlcountMenungguPembayaran,
            'countMenungguKonfirmasi' => $ttlcountMenungguKonfirmasi,
            'data' => $dataJadwal,
            // 'dataOrder' => $dataOrder,
        ];
		return view('main/jadwal', $data);
	}
}
