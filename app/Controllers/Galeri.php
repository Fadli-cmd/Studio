<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGaleri;
use App\Models\BookingModel;
use App\Models\ModelPembayaran;

class Galeri extends BaseController
{
	protected $galeri;
	protected $pemesanan;
	protected $pembayaran;
	public function __construct()
	{helper('form'); 
		$this->galeri = new ModelGaleri();
		$this->pemesanan = new BookingModel();
		$this->pembayaran = new ModelPembayaran();
		// Memuat helper form

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
			session()->set('cari_galeri', $cari);
			redirect()->to('galeri/index');
		} else {
			$cari = session()->get('cari_galeri');
		}

		$datagaleri = $cari ? $this->galeri->cariData($cari)->paginate(5, 'galeri') : $this->galeri->paginate(5, 'galeri');

		$nohalaman = $this->request->getVar('page_galeri') ? $this->request->getVar('page_galeri') : 1;
		$data = [
			'countAllOrder' => $ttlcountOrder,
			'countMenungguPembayaran' => $ttlcountMenungguPembayaran,
			'countMenungguKonfirmasi' => $ttlcountMenungguKonfirmasi,
			'tampildata' => $datagaleri,
			'pager' => $this->galeri->pager,
			'nohalaman' => $nohalaman,
			'cari' => $cari
		];
		return view('galeri/viewgaleri', $data);
	}
	public function tambah()
	{

		return view('galeri/formtambah');
	}

	public function simpandata()
	{

		$idgaleri = $this->request->getPost('idgaleri');
		$fotogaleri = $this->request->getPost('gambar');

		// validasi
		$validation = \Config\Services::validation();

		$valid = $this->validate([
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
				'errornama' => '<div class ="alert alert-danger">' . $validation->getError() . '</div>'

			];

			session()->setFlashdata($pesan);
			return redirect()->to('galeri/formtambah');
		} else {
			$gambar = $_FILES['gambar']['name'];

			if ($gambar != NULL) {
				$namafilegambar = $idgaleri;
				$filegambar = $this->request->getFile('gambar');
				$filegambar->move('uploud', $namafilegambar . '.' . $filegambar->getExtension());

				$patGambar = 'uploud/' . $filegambar->getName();
			} else {
				$patGambar = '';
			}
			$this->galeri->insert([
				'foto_galery' => $patGambar
			]);

			$pesan = [
				'sukses' => '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i> SELAMAT!!</h5>
			Data Galeri Berhasil Di-Simpan
		   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		   </div> '

			];

			session()->setFlashdata($pesan);
			return redirect()->to('galeri/index');
		}
	}

	public function edit($id)
	{
		$rowData = $this->galeri->find($id);

		if ($rowData) {
			$data = [
				'id' => $id,
				'gambar' => $rowData['foto_galery']
			];
			return view('galeri/formeditgaleri', $data);
		} else {
			exit('DATA TIDAK DITEMUKAN');
		}
	}
	public function updatedata()
	{

		$idgaleri = $this->request->getPost('idgaleri');


		// validasi
		$validation = \Config\Services::validation();

		$valid = $this->validate([
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
				'errornama' => '<div class ="alert alert-danger">' . $validation->getError() . '</div>'

			];

			session()->setFlashdata($pesan);
			return redirect()->to('galeri/edit/' . $idgaleri);
		} else {

			$rowData = $this->galeri->find($idgaleri);
			$patGambarLama = $rowData['foto_galery'];

			$gambar = $_FILES['gambar']['name'];

			if ($gambar != NULL) {
				($patGambarLama == '' || $patGambarLama == null) ? '' :	unlink($patGambarLama);

				$namafilegambar = $idgaleri;
				$filegambar = $this->request->getFile('gambar');
				$filegambar->move('uploud', $namafilegambar . '.' . $filegambar->getExtension());

				$patGambar = 'uploud/' . $filegambar->getName();
			} else {
				$patGambar = $patGambarLama;
			}
			$this->galeri->update($idgaleri, [
				'foto_galery' => $patGambar
			]);

			$pesan = [
				'sukses' => '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i> SELAMAT!!</h5>
			Data Kategori Berhasil Di-Update
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'
			];


			session()->setFlashdata($pesan);
			return redirect()->to('galeri/index');
		}
	}

	public function hapus($id)
	{

		$rowData = $this->galeri->find($id);
		$patGambarLama = $rowData['foto_galery'];
		if ($rowData) {

			$this->galeri->delete($id);
			($patGambarLama == '' || $patGambarLama == null) ? '' :	unlink($patGambarLama);
			$pesan = [
				'sukses' => '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-check"></i> SELAMAT!!</h5>
				Data Kategori Berhasil Di-Hapus
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'
			];
			session()->setFlashdata($pesan);
			return redirect()->to('galeri/index');
		} else {
			exit('DATA TIDAK DITEMUKAN');
		}
	}
}
