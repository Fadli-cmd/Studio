<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKaryawan;
use App\Models\BookingModel;
use App\Models\ModelPembayaran;

class Karyawan extends BaseController
{
	protected $karyawan;
    protected $pemesanan;
    protected $pembayaran;
	public function __construct()
	{
		$this->karyawan = new ModelKaryawan();
		$this->pemesanan = new BookingModel();
		$this->pembayaran = new ModelPembayaran();
		helper('form'); 
	}
	public function index()
	{
		$countOrder = $this->pemesanan->where('stts_trx', "PEMBAYARAN DIKONFIRMASI")->countAllResults();
		$ttlcountOrder = 0;
		if ($countOrder != 0) {
			$ttlcountOrder = $countOrder;
		}
		$tombolcari = $this->request->getPost('tombolcari');
		if (isset($tombolcari)) {
			$cari = $this->request->getPost('cari');
			session()->set('cari_karyawan', $cari);
			redirect()->to('karyawan/index');
		} else {
			$cari = session()->get('cari_karyawan');
		}

		$datakaryawan = $cari ? $this->karyawan->cariData($cari)->paginate(5, 'karyawan') : $this->karyawan->paginate(5, 'karyawan');
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
		$nohalaman = $this->request->getVar('page_karyawan') ? $this->request->getVar('page_karyawan') : 1;
		$data = [
			'countAllOrder' => $ttlcountOrder,
			'countMenungguPembayaran' => $ttlcountMenungguPembayaran,
			'countMenungguKonfirmasi' => $ttlcountMenungguKonfirmasi,
			'tampildata' => $datakaryawan,
			'pager' => $this->karyawan->pager,
			'nohalaman' => $nohalaman,
			'cari' => $cari
		];
		return view('karyawan/viewkaryawan', $data);
	}
	public function formtambah()
	{
		$countOrder = $this->pemesanan->where('stts_trx', "PEMBAYARAN DIKONFIRMASI")->countAllResults();
		$ttlcountOrder = 0;
		if ($countOrder != 0) {
			$ttlcountOrder = $countOrder;
		}
		$tombolcari = $this->request->getPost('tombolcari');
		if (isset($tombolcari)) {
			$cari = $this->request->getPost('cari');
			session()->set('cari_karyawan', $cari);
			redirect()->to('karyawan/index');
		} else {
			$cari = session()->get('cari_karyawan');
		}

		$datakaryawan = $cari ? $this->karyawan->cariData($cari)->paginate(5, 'karyawan') : $this->karyawan->paginate(5, 'karyawan');
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
		$nohalaman = $this->request->getVar('page_karyawan') ? $this->request->getVar('page_karyawan') : 1;
		$data = [
			'countAllOrder' => $ttlcountOrder,
			'countMenungguPembayaran' => $ttlcountMenungguPembayaran,
			'countMenungguKonfirmasi' => $ttlcountMenungguKonfirmasi,
			'tampildata' => $datakaryawan,
			'pager' => $this->karyawan->pager,
			'nohalaman' => $nohalaman,
			'cari' => $cari
		];
		return view('karyawan/formtambah', $data);
	}

	public function simpandata()
	{

		$kdkaryawan = $this->request->getPost('kd');
		$namakaryawan = $this->request->getPost('namakaryawan');
		$alamat = $this->request->getPost('alamat');
		$nohp = $this->request->getPost('nohp');
		$bidang = $this->request->getPost('bidang');

		// validasi
		$validation = \Config\Services::validation();

		$valid = $this->validate([
			'kd' => [
				'rules' => 'required|is_unique[karyawan.kd_karyawan]',
				'label' => 'Id KARYAWAN',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG',
					'is_unique' => '{field} SUDAH ADA, COBA LAGI YANG LAIN'

				]
			],
			'namakaryawan' => [
				'rules' => 'required',
				'label' => 'NAMA KARYAWAN',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG'

				]
			],


			'alamat' => [
				'rules' => 'required',
				'label' => 'ALAMAT',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG'

				]
			],
			'nohp' => [
				'rules' => 'required',
				'label' => 'NO HP',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG'
				]
			],
			'bidang' => [
				'rules' => 'required',
				'label' => 'BIDANG',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG',
					'numeric' => '{field} HANYA BOLEH ANGKA'
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
			return redirect()->to('karyawan/formtambah');
		} else {

			$this->karyawan->insert([
				'kd_karyawan' => $kdkaryawan,
				'nama_karyawan' => $namakaryawan,
				'alamat' => $alamat,
				'no_hp' => $nohp,
				'bidang_kerja' => $bidang
			]);

			$pesan = [
				'sukses' => '<div class ="alert alert-success">YEYY.. DATA BERHASIL DISIMPAN</div>'

			];

			session()->setFlashdata($pesan);
			return redirect()->to('karyawan/index');
		}
	}
	public function formedit($kode)
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
		$cekdata = $this->karyawan->find($kode);

		if ($cekdata) {

			$data = [
				'kd' => $cekdata['kd_karyawan'],
				'namakaryawan' => $cekdata['nama_karyawan'],
				'alamat' => $cekdata['alamat'],
				'nohp' => $cekdata['no_hp'],
				'bidang' => $cekdata['bidang_kerja'],
				'countAllOrder' => $ttlcountOrder,
				'countMenungguPembayaran' => $ttlcountMenungguPembayaran,
				'countMenungguKonfirmasi' => $ttlcountMenungguKonfirmasi

			];

			return view('karyawan/formeditkaryawan', $data);
		}
	}
	public function updatedata()
	{
		$kdkaryawan = $this->request->getPost('kd');
		$namakaryawan = $this->request->getPost('namakaryawan');
		$alamat = $this->request->getPost('alamat');
		$nohp = $this->request->getPost('nohp');
		$bidang = $this->request->getPost('bidang');

		// validasi
		$validation = \Config\Services::validation();

		$valid = $this->validate([
			'namakaryawan' => [
				'rules' => 'required',
				'label' => 'NAMA KARYAWAN',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG'

				]
			],


			'alamat' => [
				'rules' => 'required',
				'label' => 'ALAMAT',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG'

				]
			],
			'nohp' => [
				'rules' => 'required',
				'label' => 'NO HP',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG'
				]
			],
			'bidang' => [
				'rules' => 'required',
				'label' => 'BIDANG',
				'errors' => [
					'required' => '{field} TIDAK BOLEH KOSONG',
					'numeric' => '{field} HANYA BOLEH ANGKA'
				]
			]

		]);

		if (!$valid) {
            $pesan = [
                'error' => '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <h5><i class="icon fas fa-check"></i> ERROR!!</h5>
                    ' . $validation->listErrors() . '
                </div>'
            ];

			session()->setFlashdata($pesan);
			return redirect()->to('karyawan/formedit/' . $kdkaryawan);
		} else {

			$this->karyawan->update($kdkaryawan, [
				'nama_karyawan' => $namakaryawan,
				'alamat' => $alamat,
				'no_hp' => $nohp,
				'bidang_kerja' => $bidang
			]);

			$pesan = [
				'sukses' => '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i> SELAMAT!!</h5>
			Data Karyawan Berhasil Di-Update
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'
			];


			session()->setFlashdata($pesan);
			return redirect()->to('karyawan/index');
		}
	}

	public function hapus($id)
	{

		$rowData = $this->karyawan->find($id);

		if ($rowData) {

			$this->karyawan->delete($id);

			$pesan = [
				'sukses' => '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-check"></i> SELAMAT!!</h5>
				Data karyawan Berhasil Di-Hapus
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'
			];
			session()->setFlashdata($pesan);
			return redirect()->to('karyawan/index');
		} else {
			exit('DATA TIDAK DITEMUKAN');
		}
	}
}
