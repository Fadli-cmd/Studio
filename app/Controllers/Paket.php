<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPaket;
use App\Models\BookingModel;
use App\Models\ModelPembayaran;


class Paket extends BaseController
{
	protected $paket;
    protected $pemesanan;
    protected $pembayaran;
	public function __construct()
	{
		helper('form'); 
		$this->paket = new ModelPaket();
		$this->pemesanan = new BookingModel();
		$this->pembayaran = new ModelPembayaran();
	}
	public function index()
	{
		$countOrder = $this->pemesanan->where('stts_trx', "PEMBAYARAN DIKONFIRMASI")->countAllResults();
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
		$ttlcountMenungguKonfirmasi = 0;
		if ($countMenungguKonfirmasi != 0) {
			$ttlcountMenungguKonfirmasi = $countMenungguKonfirmasi;
		}
		$dataOrder = $this->pemesanan->findAll();
		$dataMenungguKonfirmasi = $this->pemesanan->where('stts_trx', "PEMBAYARAN DIKONFIRMASI")->findAll();
		for ($i = 0; $i < count($dataMenungguKonfirmasi); $i++) {
			$dataPembayaran = $this->pembayaran->where('invoice', $dataMenungguKonfirmasi[$i]['id_pemesanan'])->first();
			$dataMenungguKonfirmasi[$i]['nama_pengirim'] = $dataPembayaran['nama_pengirim'];
			$dataMenungguKonfirmasi[$i]['rek_pelanggan'] = $dataPembayaran['rek_pelanggan'];
			$dataMenungguKonfirmasi[$i]['bukti_tf'] = $dataPembayaran['bukti_tf'];
		}
		$tombolcari = $this->request->getPost('tombolcari');
		if (isset($tombolcari)) {
			$cari = $this->request->getPost('cari');
			session()->set('cari_paket', $cari);
			redirect()->to('paket/index');
		} else {
			$cari = session()->get('cari_paket');
		}


		$datapaket = $cari ? $this->paket->tampildata_cari($cari)->paginate(10, 'paket') : $this->paket->tampildata()->paginate(10, 'paket');

		$nohalaman = $this->request->getVar('page_paket') ? $this->request->getVar('page_paket') : 1;

		$data = [
			'countAllOrder' => $ttlcountOrder,
			'countMenungguPembayaran' => $ttlcountMenungguPembayaran,
			'countMenungguKonfirmasi' => $ttlcountMenungguKonfirmasi,
			'tampildata' => $datapaket,
			'pager' => $this->paket->pager,
			'nohalaman' => $nohalaman

		];
		return view('Paket/viewpaket', $data);
	}

	public function tambah()
	{
		$countOrder = $this->pemesanan->where('stts_trx', "PEMBAYARAN DIKONFIRMASI")->countAllResults();
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
		$ttlcountMenungguKonfirmasi = 0;
		if ($countMenungguKonfirmasi != 0) {
			$ttlcountMenungguKonfirmasi = $countMenungguKonfirmasi;
		}
		$dataOrder = $this->pemesanan->findAll();
		$dataMenungguKonfirmasi = $this->pemesanan->where('stts_trx', "PEMBAYARAN DIKONFIRMASI")->findAll();
		for ($i = 0; $i < count($dataMenungguKonfirmasi); $i++) {
			$dataPembayaran = $this->pembayaran->where('invoice', $dataMenungguKonfirmasi[$i]['id_pemesanan'])->first();
			$dataMenungguKonfirmasi[$i]['nama_pengirim'] = $dataPembayaran['nama_pengirim'];
			$dataMenungguKonfirmasi[$i]['rek_pelanggan'] = $dataPembayaran['rek_pelanggan'];
			$dataMenungguKonfirmasi[$i]['bukti_tf'] = $dataPembayaran['bukti_tf'];
		}
		$data = [
			'countAllOrder' => $ttlcountOrder,
			'countMenungguPembayaran' => $ttlcountMenungguPembayaran,
			'countMenungguKonfirmasi' => $ttlcountMenungguKonfirmasi


		];
		return view('paket/formtambah', $data);
	}


	public function simpandata()
	{

		$kodepaket = $this->request->getPost('kodepaket');
		$namapaket = $this->request->getPost('namapaket');
		$harga = $this->request->getPost('hargapaket');
		$ket = $this->request->getPost('keterangan');



		// validasi
		$validation = \Config\Services::validation();

		$valid = $this->validate([
			'kodepaket' => [
				'rules' => 'required|is_unique[paket.id_paket]',
				'label' => 'KODE PAKET',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG',
					'is_unique' => '{field} SUDAH ADA, COBA LAGI YANG LAIN'
				]
			],

			'namapaket' => [
				'rules' => 'required',
				'label' => 'NAMA PAKET',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG',

				]
			],


			'hargapaket' => [
				'rules' => 'required|numeric',
				'label' => 'HARGA PAKET',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG',
					'numeric' => '{field} HANYA BOLEH ANGKA',
				]
			],

			'keterangan' => [
				'rules' => 'required',
				'label' => 'KETERANGAN',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG'
				]
			],

			'gambar' => [
				'rules' => 'mime_in[gambar,image/png,image/jpg,image/jpeg]|ext_in[gambar,png,jpg,jpeg]',
				'label' => 'GAMBAR',
				'errors' => [
					'mime_in' => 'FORMAT FILE {field} SALAH, PASTIKAN FORMATNYA (png,jpg,jpeg)'
				]
			]


		]);

		if (!$valid) {
			$pesan = [
				'error' => '
			  <div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i> EROR!!</h5>
			' . $validation->listErrors() . '
		   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		   </div> '

			];

			session()->setFlashdata($pesan);
			return redirect()->to('paket/tambah');
		} else {

			$gambar = $_FILES['gambar']['name'];

			if ($gambar != NULL) {
				$namafilegambar = $kodepaket;
				$filegambar = $this->request->getFile('gambar');
				$filegambar->move('uploud', $namafilegambar . '.' . $filegambar->getExtension());

				$patGambar = 'uploud/' . $filegambar->getName();
			} else {
				$patGambar = '';
			}
			$this->paket->insert([
				'id_paket' => $kodepaket,
				'nama_paket' => $namapaket,
				'harga' => $harga,
				'ket_paket' => $ket,
				'foto_paket' => $patGambar

			]);

			$pesanSukses = [
				'sukses' => '<div class="alert alert-success alert-dismissible">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <h5><i class="icon fas fa-check"></i> SELAMAT!!</h5>
		  DATA PAKET DENGAN KODE <strong>' . $kodepaket . '</strong> BERHASIL DISIMPAN
		 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		 </div> '

			];

			session()->setFlashdata($pesanSukses);
			return redirect()->to('paket/index');
		}
	}

	public function detail($kode)
	{
		$cekdata = $this->paket->find($kode);
		$namauser = session()->get('login');
		$countdatapemesanan = $this->pemesanan->where('nama_member', $namauser)->countAllResults();
		$ttlorder = 0;
		if ($countdatapemesanan != 0) {
			$ttlorder = $countdatapemesanan;
		}
		if ($cekdata) {

			$data = [
				'kodepaket' => $cekdata['id_paket'],
				'namapaket' => $cekdata['nama_paket'],
				'harga' => $cekdata['harga'],
				'ket' => $cekdata['ket_paket'],
				'gambar' => $cekdata['foto_paket'],
				'ttl_data' => $ttlorder

			];


			return view('paket/paketdetail', $data);
		} else {
			$pesanEror = [
				'sukses' => '<div class="alert alert-danger alert-dismissible">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <h5><i class="icon fas fa-check"></i> SELAMAT!!</h5>
		  DATA PAKET DENGAN KODE <strong>' . $kode . '</strong> TIDAK DITEMUKAN
		 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		 </div> '

			];

			session()->setFlashdata($pesanEror);
			return redirect()->to('paket/paketdetail');
		}
	}
	// public function detail($id)
	// {
	// 	$data['paket'] = $this->ModelPaket->paketdetail($id);
	// 	$data['nama_paket'] = "Paket Detail";

	// 	return view('paket/paketdetail', $id);
	// }
	public function edit($kode)
	{
		$countOrder = $this->pemesanan->where('stts_trx', "PEMBAYARAN DIKONFIRMASI")->countAllResults();
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
		$ttlcountMenungguKonfirmasi = 0;
		if ($countMenungguKonfirmasi != 0) {
			$ttlcountMenungguKonfirmasi = $countMenungguKonfirmasi;
		}
		$dataOrder = $this->pemesanan->findAll();
		$dataMenungguKonfirmasi = $this->pemesanan->where('stts_trx', "PEMBAYARAN DIKONFIRMASI")->findAll();
		for ($i = 0; $i < count($dataMenungguKonfirmasi); $i++) {
			$dataPembayaran = $this->pembayaran->where('invoice', $dataMenungguKonfirmasi[$i]['id_pemesanan'])->first();
			$dataMenungguKonfirmasi[$i]['nama_pengirim'] = $dataPembayaran['nama_pengirim'];
			$dataMenungguKonfirmasi[$i]['rek_pelanggan'] = $dataPembayaran['rek_pelanggan'];
			$dataMenungguKonfirmasi[$i]['bukti_tf'] = $dataPembayaran['bukti_tf'];
		}
		$cekdata = $this->paket->find($kode);

		if ($cekdata) {

			$data = [
				'kodepaket' => $cekdata['id_paket'],
				'namapaket' => $cekdata['nama_paket'],
				'harga' => $cekdata['harga'],
				'ket' => $cekdata['ket_paket'],
				'gambar' => $cekdata['foto_paket'],
				'countAllOrder' => $ttlcountOrder,
				'countMenungguPembayaran' => $ttlcountMenungguPembayaran,
				'countMenungguKonfirmasi' => $ttlcountMenungguKonfirmasi

			];


			return view('paket/formeditpaket', $data);
		} else {
			$pesanEror = [
				'sukses' => '<div class="alert alert-danger alert-dismissible">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <h5><i class="icon fas fa-check"></i> SELAMAT!!</h5>
		  DATA PAKET DENGAN KODE <strong>' . $kode . '</strong> TIDAK DITEMUKAN
		 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		 </div> '

			];

			session()->setFlashdata($pesanEror);
			return redirect()->to('paket/index');
		}
	}

	public function updatedata()
	{

		$kodepaket = $this->request->getPost('kodepaket');
		$namapaket = $this->request->getPost('namapaket');
		$harga = $this->request->getPost('hargapaket');
		$ket = $this->request->getPost('keterangan');


		// validasi
		$validation = \Config\Services::validation();

		$valid = $this->validate([
			'namapaket' => [
				'rules' => 'required',
				'label' => 'NAMA PAKET',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG',

				]
			],

			'hargapaket' => [
				'rules' => 'required|numeric',
				'label' => 'HARGA PAKET',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG',
					'numeric' => '{field} HANYA BOLEH ANGKA',
				]
			],

			'keterangan' => [
				'rules' => 'required',
				'label' => 'KETERANGAN PAKET',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG',
				]
			],


			'gambar' => [
				'rules' => 'mime_in[gambar,image/png,image/jpg,image/jpeg]|ext_in[gambar,png,jpg,jpeg]',
				'label' => 'GAMBAR',
				'errors' => [
					'mime_in' => 'FORMAT FILE {field} SALAH, PASTIKAN FORMATNYA (png,jpg,jpeg)'
				]
			]


		]);

		if (!$valid) {
			$pesan = [
				'erorupdate' => '
			  <div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i> EROR!!</h5>
			' . $validation->listErrors() . '
		   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		   </div> '

			];

			session()->setFlashdata($pesan);
			return redirect()->to('paket/edit/' . $kodepaket);
		} else {

			$cekdata = $this->paket->find($kodepaket);
			$patGambarLama = $cekdata['foto_paket'];

			$gambar = $_FILES['gambar']['name'];

			if ($gambar != NULL) {
				($patGambarLama == '' || $patGambarLama == null) ? '' :	unlink($patGambarLama);

				$namafilegambar = $kodepaket;
				$filegambar = $this->request->getFile('gambar');
				$filegambar->move('uploud', $namafilegambar . '.' . $filegambar->getExtension());

				$patGambar = 'uploud/' . $filegambar->getName();
			} else {
				$patGambar = $patGambarLama;
			}
			$this->paket->update($kodepaket, [
				'nama_paket' => $namapaket,
				'harga' => $harga,
				'ket_paket' => $ket,
				'foto_paket' => $patGambar

			]);

			$pesanSukses = [
				'sukses' => '<div class="alert alert-success alert-dismissible">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <h5><i class="icon fas fa-check"></i> SELAMAT!!</h5>
		  DATA PAKET DENGAN KODE <strong>' . $kodepaket . '</strong> BERHASIL DI UPDATE
		 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		 </div> '

			];

			session()->setFlashdata($pesanSukses);
			return redirect()->to('paket/index');
		}
	}
	public function hapus($kode)
	{

		$cekdata = $this->paket->find($kode);
		$patGambarLama = $cekdata['foto_paket'];

		if ($cekdata) {
			$this->paket->delete($kode);
			($patGambarLama == '' || $patGambarLama == null) ? '' :	unlink($patGambarLama);

			$pesanSukses = [
				'sukses' => '<div class="alert alert-success alert-dismissible">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <h5><i class="icon fas fa-check"></i> SELAMAT!!</h5>
		  DATA PAKET DENGAN KODE <strong>' . $kode . '</strong> BERHASIL DIHAPUS
		 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		 </div> '

			];

			session()->setFlashdata($pesanSukses);
			return redirect()->to('paket/index');
		}
	}
}
