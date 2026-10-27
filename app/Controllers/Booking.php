<?php

namespace App\Controllers;

use App\models\BookingModel;
use App\Models\ModelPaket;
use App\Models\ModelPelanggan;
use App\Models\ModelPembayaran;
use App\Models\ModelPembatalan;


class Booking extends BaseController
{
    protected $paket;
    protected $pemesanan;
    protected $Pelanggan;
    protected $Pembayaran;
    protected $Pembatalan;
	public function __construct()
	{
		$this->paket = new ModelPaket();
		$this->pemesanan = new BookingModel();
		$this->Pelanggan = new ModelPelanggan();
		$this->Pembayaran = new ModelPembayaran();
		$this->Pembatalan = new ModelPembatalan();
		helper('form');
	}


	public function index($kode)
	{
		$cekdata = $this->paket->find($kode);

		if ($cekdata) {

			$namaLogin = session()->get('login');
			$idArr = $this->Pelanggan->where('user_name', $namaLogin)->first();
			$id = $idArr['idmember'];

			$namauser = session()->get('login');
			$countdatapemesanan = $this->pemesanan->where('nama_member', $namauser)->countAllResults();
			$ttlorder = 0;
			if ($countdatapemesanan != 0) {
				$ttlorder = $countdatapemesanan;
			}

			$tgl = $this->pemesanan->findColumn('tgl_take');

			if ($tgl != null) {
				for ($i=0; $i < count($tgl); $i++) { 
					$dataSplit = $tgl[$i];
					$dataSplited = explode("-", $dataSplit);
					$month = $dataSplited[1];
					$excrementMonth = $month - 1;
					$data1 = $dataSplited[0];
					$tglFixed = array();
					$data2 = $dataSplited[2];
					array_push($tglFixed, $data1, $excrementMonth, $data2);
					$tgl[$i] = $tglFixed;
				}	
			} else {
				$tgl = array();
			}

			$data = [
				'kodepaket' => $cekdata['id_paket'],
				'namapaket' => $cekdata['nama_paket'],
				'harga' => $cekdata['harga'],
				'ket' => $cekdata['ket_paket'],
				'gambar' => $cekdata['foto_paket'],
				'idUser' => $id,
				'ttl_data' => $ttlorder,
				'tanggalSibuk' => $tgl
			];
			// echo "<pre>";
			// print_r ($data);
			// echo "</pre>";
			return view('booking/I_booking2', $data);
		}
	}




	public function detai($kode)
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

			return view('booking/I_booking', $data);
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
			return view('booking/I_booking');
		}
	}

	public function terimapembayaran()
	{

		if ($this->request->isAJAX()) {
			$data = $this->request->getVar();
			$nofak = $data['nofak'];
			$idpelanggan = $data['idpelanggan'];
			$namapel = $data['namapel'];
			$id_paket = $data['id_paket'];
			$namapaket = $data['namapaket'];
			$ttl_bayar = $data['ttl_bayar'];
			$sisa_bayar = $data['sisa_bayar'];
			$tanggaltrx = $data['tanggaltrx'];
			$status = $data['status'];
			$tgl_take = $data['tgl_take'];
			$jam = $data['jam'];
			$catt = $data['catt'];

			// function proses
			$data = [
				'id_pemesanan' => $nofak,
				'id_member' => $idpelanggan,
				'nama_member' => $namapel,
				'id_paket' => $id_paket,
				'nama_paket' => $namapaket,
				'ttl_bayar' => $ttl_bayar,
				'sisa_bayar' => $sisa_bayar,
				'tgl_trx' => $tanggaltrx,
				'stts_trx' => $status,
				'tgl_take' => $tgl_take,
				'jam' => $jam,
				'catatan' => $catt
			];

			$this->pemesanan->insert($data);
		}

		$json = [
			'success' => "Transaksi berhasil dibuat, Silahkan melakukan pembayaran!"


		];
		echo json_encode($json);
	}


	public function buatfaktur()
	{
		$tanggalSekarang = $this->request->getPost('tanggal');
		$BookingModel = new BookingModel();

		$hasil = $BookingModel->nofaktur($tanggalSekarang)->getRowArray();
		$data = $hasil['nofaktur'];

		$noUrutTerakhir = substr($data, -4);
		//nomor urut ditambah 1
		$nomorUrutSelanjutnya = intval($noUrutTerakhir) + 1;
		//membuat format nomor transaksi berikutnya
		$noFaktur = sprintf('INV-') . date('dmy', strtotime($tanggalSekarang)) . sprintf('%04s', $nomorUrutSelanjutnya);

		$json = [
			'nofaktur' => $noFaktur

		];
		echo json_encode($json);
	}

	public function edit($kode)
	{
		$cekdata = $this->pemesanan->find($kode);

		if ($cekdata) {

			$data = [
				'idpemesanan' => $cekdata['id_paket'],
				'namamember' => $cekdata['nama_member'],
				'namapaket' => $cekdata['nama_paket'],
				'hargapaket' => $cekdata['biaya'],
				'tgltrx' => $cekdata['tgl_trx'],
				'sttstrx' => $cekdata['stts_trx'],
				'tgltake' => $cekdata['tgl_take'],
				'jam' => $cekdata['jam'],
				'cat' => $cekdata['catatan']

			];


			return view('booking/I_booking', $data);
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

	public function bayarindex($nofak)
	{
		$dataPembayaran = $this->pemesanan->where('id_pemesanan', $nofak)->first();
		$id_pemesanan = $dataPembayaran['id_pemesanan'];
		$id_member = $dataPembayaran['id_member'];
		$nama_member = $dataPembayaran['nama_member'];
		$id_paket = $dataPembayaran['id_paket'];
		$tgl_trx = $dataPembayaran['tgl_trx'];
		$ttl_bayar = $dataPembayaran['ttl_bayar'];
		$sisa_bayar = $dataPembayaran['sisa_bayar'];
		$stts_trx = $dataPembayaran['stts_trx'];
		$tgl_take = $dataPembayaran['tgl_take'];
		$jam = $dataPembayaran['jam'];
		$catatan = $dataPembayaran['catatan'];

		$namauser = session()->get('login');
		$countdatapemesanan = $this->pemesanan->where('nama_member', $namauser)->countAllResults();
		$ttlorder = 0;
		if ($countdatapemesanan != 0) {
			$ttlorder = $countdatapemesanan;
		}

		$data = [
			'id' => $id_member,
			'invoice' => $id_pemesanan,
			'biaya' => $ttl_bayar,
			'ttl_data' => $ttlorder

		];

		
		// echo "<pre>";
		// print_r ($dataPembayaran);
		
		return view('booking/I_proses', $data);
	}

	public function resetpembayaran($nofak)
	{

		$data = [
			'stts_trx' => 'MENUNGGU PEMBAYARAN'
		];

		$this->pemesanan->update($nofak, $data);
		return redirect()->to("booking/bayarindex/$nofak");
	}

	public function prosespembayaran()
	{
		
		$invoice = $this->request->getPost('invoice');
		$idpelanggan = $this->request->getPost('idpelanggan');
		$namapengirim = $this->request->getPost('namapengirim');
		$norek = $this->request->getPost('norek');
		$gambar = $_FILES['bukti_tf']['name'];

		if ($gambar != NULL) {
			$namafilegambar = $invoice;
			$filegambar = $this->request->getFile('bukti_tf');
			$filegambar->move('bukti', $namafilegambar . '.' . $filegambar->getExtension());

			$patGambar = 'bukti/' . $filegambar->getName();
		} else {
			$patGambar = '';
		}
   
		$this->Pembayaran->insert([
			'invoice' => $invoice,
			'id_pelanggan' => $idpelanggan,
			'nama_pengirim' => $namapengirim,
			'rek_pelanggan' => $norek,
			'bukti_tf' => $patGambar
			
		]);

		$data = [
			'stts_trx' => 'MENUNGGU KONFIRMASI'
		];
		helper('form');

		$this->pemesanan->update($invoice, $data);
		return redirect()->to('booking/thankyou');
	}

	public function thankyou()
	{
		$namauser = session()->get('login');
		$countdatapemesanan = $this->pemesanan->where('nama_member', $namauser)->countAllResults();
		$ttlorder = 0;
		if ($countdatapemesanan != 0) {
			$ttlorder = $countdatapemesanan;
		}

		$data = [
			'ttl_data' => $ttlorder

		];
		return view('layout-frontend/thankyou', $data);
	}

	public function processed($inv)
	{
		$namauser = session()->get('login');
		$countdatapemesanan = $this->pemesanan->where('nama_member', $namauser)->countAllResults();
		$ttlorder = 0;
		if ($countdatapemesanan != 0) {
			$ttlorder = $countdatapemesanan;
		}

		$data = [
			'ttl_data' => $ttlorder,
			'inv' => $inv

		];
		return view('layout-frontend/processed', $data);
	}

	public function canceled($inv)
	{
		$namauser = session()->get('login');
		$countdatapemesanan = $this->pemesanan->where('nama_member', $namauser)->countAllResults();
		$ttlorder = 0;
		if ($countdatapemesanan != 0) {
			$ttlorder = $countdatapemesanan;
		}

		$dataAlasan = $this->Pembatalan->where('invoice', $inv)->first();

		$alasan = $dataAlasan['alasan'];

		$data = [
			'ttl_data' => $ttlorder,
			'inv' => $inv,
			'alasan' => $alasan

		];
		return view('layout-frontend/canceled', $data);
	}
	public function Mkonfirmasi()
	{

		return view('booking/M_Konfirimasi.php');
	}
}
