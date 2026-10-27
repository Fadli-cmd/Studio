<?php

namespace App\Controllers;

use App\Models\ModelPaket;
use App\Models\ModelGaleri;
use App\Models\BookingModel;

class Halaman extends BaseController
{

	public function __construct()
	{
		$this->paket = new ModelPaket();
		$this->galeri = new ModelGaleri();
		$this->pemesanan = new BookingModel();
	}
	public function index()
	{
		$tombolcari = $this->request->getPost('tombolcari');
		if (isset($tombolcari)) {
			$cari = $this->request->getPost('cari');
			session()->set('cari_galeri', $cari);
			redirect()->to('galeri/index');
		} else {
			$cari = session()->get('cari_galeri');
		}

		$datapaket = $cari ? $this->paket->cariData($cari)->paginate(5, 'paket') : $this->paket->paginate(5, 'paket');
		$datagaleri = $cari ? $this->galeri->cariData($cari)->paginate(5, 'paket') : $this->galeri->paginate(5, 'paket');


		$nohalaman = $this->request->getVar('page_galeri') ? $this->request->getVar('page_galeri') : 1;

		$namauser = session()->get('login');
		$countdatapemesanan = $this->pemesanan->where('nama_member', $namauser)->countAllResults();
		$ttlorder = 0;
		if ($countdatapemesanan != 0) {
			$ttlorder = $countdatapemesanan;
		}
		$data = [
			'tampildata' => $datapaket,
			'tampildata2' => $datagaleri,
			'pager' => $this->galeri->pager,
			'nohalaman' => $nohalaman,
			'cari' => $cari,
			'ttl_data' => $ttlorder
		];
		// echo "<pre>";
		// print_r($data);

		return view('layout-frontend/landingpage', $data);
	}

	public function paket()
	{
		$datapaket = $this->paket->paginate(5, 'paket');
		$namauser = session()->get('login');
		$countdatapemesanan = $this->pemesanan->where('nama_member', $namauser)->countAllResults();
		$ttlorder = 0;
		if ($countdatapemesanan != 0) {
			$ttlorder = $countdatapemesanan;
		}
		$data = [
			'tampildata' => $datapaket,
			'ttl_data' => $ttlorder
		];
		return view('layout-frontend/Paket.php', $data);
	}
	public function notif()
	{

		return view('layout-frontend/thankyou');
	}
	public function galeri()
	{
		$datapaket = $this->paket->paginate(5, 'paket');
		$namauser = session()->get('login');
		$countdatapemesanan = $this->pemesanan->where('nama_member', $namauser)->countAllResults();
		$ttlorder = 0;
		if ($countdatapemesanan != 0) {
			$ttlorder = $countdatapemesanan;
		}
		$datagaleri = $this->galeri->paginate(20, 'galery');
		$data = [
			'tampildata' => $datagaleri,
			'ttl_data' => $ttlorder

		];
		return view('layout-frontend/galeri.php', $data);
	}
	public function contact()
	{
		$datapaket = $this->paket->paginate(5, 'paket');
		$namauser = session()->get('login');
		$countdatapemesanan = $this->pemesanan->where('nama_member', $namauser)->countAllResults();
		$ttlorder = 0;
		if ($countdatapemesanan != 0) {
			$ttlorder = $countdatapemesanan;
		}
		$data = [
			'tampildata' => $datapaket,
			'ttl_data' => $ttlorder
		];
		return view('layout-frontend/Contact.php', $data);
	}
	public function about()
	{
		$datapaket = $this->paket->paginate(5, 'paket');
		$namauser = session()->get('login');
		$countdatapemesanan = $this->pemesanan->where('nama_member', $namauser)->countAllResults();
		$ttlorder = 0;
		if ($countdatapemesanan != 0) {
			$ttlorder = $countdatapemesanan;
		}
		$data = [
			'tampildata' => $datapaket,
			'ttl_data' => $ttlorder
		];
		return view('layout-frontend/about.php', $data);
	}
}
