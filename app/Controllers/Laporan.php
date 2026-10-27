<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\ModelPaket;
use App\Models\ModelPembayaran;
use App\Models\ModelPembatalan;
use App\Models\ModelPelanggan;
use App\Models\ModelKaryawan;
use DateTime;

class Laporan extends BaseController
{

	protected $pemesanan;
	protected $bookingModel;
	protected $pembayaran;
	protected $pembatalan;
	protected $pelanggan;
	protected $karyawan;
	protected $paket;
	public function __construct()
	{
		$this->pemesanan = new BookingModel();
		$this->pembayaran = new ModelPembayaran();
		$this->pembatalan  = new ModelPembatalan();
		$this->pelanggan  = new ModelPelanggan();
		$this->karyawan = new ModelKaryawan();
		$this->bookingModel = new BookingModel();
		$this->paket = new ModelPaket();
	}

	public function index()
	{
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
		$ttlcountMenungguKonfirmasi = 0;
		if ($countMenungguKonfirmasi != 0) {
			$ttlcountMenungguKonfirmasi = $countMenungguKonfirmasi;
		}
		$dataOrder = $this->pemesanan->findAll();

		$dataMenungguKonfirmasi = $this->pemesanan->where('stts_trx', "MENUNGGU PEMBAYARAN")->findAll();
		for ($i = 0; $i < count($dataMenungguKonfirmasi); $i++) {
			$dataPembayaran = $this->pembayaran->where('invoice', $dataMenungguKonfirmasi[$i]['id_pemesanan'])->first();
		}

		$data = [
			'countAllOrder' => $ttlcountOrder,
			'countMenungguPembayaran' => $ttlcountMenungguPembayaran,
			'countMenungguKonfirmasi' => $ttlcountMenungguKonfirmasi,
			'dataOrder' => $dataOrder,
			'data' => $dataMenungguKonfirmasi
		];
		return view('laporan/index', $data);
	}
	public function tampilkanLaporan()
    {
        $startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');

        $data = $this->pemesanan
            ->select('pemesanan.nama_paket, pelanggan.user_name, pemesanan.ttl_bayar as total_bayar, pemesanan.sisa_bayar, pemesanan.tgl_trx as tanggal_bayar')
            ->join('pelanggan', 'pelanggan.idmember = pemesanan.id_member')
            ->where('pemesanan.tgl_trx >=', $startDate)
            ->where('pemesanan.tgl_trx <=', $endDate)
            ->findAll();

        return view('/laporan/laporan_booking', ['data' => $data]);
    }
	public function showReport()
    {
		$startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');

		$data = $this->pemesanan
		->select('pemesanan.nama_paket, pelanggan.user_name, pemesanan.catatan, pemesanan.jam, pemesanan.tgl_take as tanggal_bayar')
		->join('pelanggan', 'pelanggan.idmember = pemesanan.id_member')
		->where('pemesanan.tgl_take >=', $startDate)
		->where('pemesanan.tgl_take <=', $endDate)
		->findAll();

	return view('/laporan/laporan_jadwal', ['data' => $data]);
        

    }
	public function status()
    {
		$startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');

		$data = $this->pemesanan
		->select('pemesanan.nama_paket, pelanggan.user_name, pemesanan.ttl_bayar as total_bayar, pemesanan.stts_trx, pemesanan.tgl_trx as tanggal_bayar')
		->join('pelanggan', 'pelanggan.idmember = pemesanan.id_member')
		->where('pemesanan.tgl_trx >=', $startDate)
		->where('pemesanan.tgl_trx <=', $endDate)
		->findAll();

	return view('/laporan/laporan_status', ['data' => $data]);
        

    }

	public function pelanggan()
	{
		$pelanggan =	$this->pelanggan->findAll();


		$data = [
			'pelanggan' => $pelanggan
		];

		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";
		return view("/laporan/laporan_pelanggan", $data);
	}
	public function faktur($inv)
	{
		$pemesanan = $this->pemesanan->where('id_pemesanan', $inv)->first();
	
		return view("/laporan/cetak_faktur", $pemesanan);
	}
	public function karyawan()
	{
		$karyawan =	$this->karyawan->findAll();


		$data = [
			'karyawan' => $karyawan
		];

		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";
		return view("/laporan/laporan_karyawan", $data);
	}

	public function pertanggal()
	{
		if ($this->request->isAJAX()) {
			$awal = $this->request->getPost('awal');
			$akhir = $this->request->getPost('akhir');

			$awalan = explode(" ", $awal);
			$akhiran = explode(" ", $akhir);

			$tAwal = $awalan[0];
			$tAkhir = $akhiran[0];

			$splitAwal = explode("/", $tAwal);
			$splitAkhir = explode("/", $tAkhir);


			$show = "$splitAwal[0]-$splitAwal[1]-$splitAwal[2] $splitAkhir[0]-$splitAkhir[1]-$splitAkhir[2]";

			// $this->pemesanan->where('tgl_trx <=', $tAwal)
			// 				->where('tgl_trx >=', $tAkhir)
			// 				->findAll();

			$data = [
				'success' => "/laporan/tampilpertanggal/$show"
			];

			echo json_encode($data);
		}
	}

	public function tampilpertanggal($parameter)
	{
		$tgl = explode(" ", $parameter);
		$tAwal = $tgl[0];
		$tglAwalFixing = explode("-", $tAwal);
		$tglAwalFixed = "$tglAwalFixing[2]-$tglAwalFixing[0]-$tglAwalFixing[1]";
		$tAkhir = $tgl[1];
		$tglAkhirFixing = explode("-", $tAkhir);
		$tglAkhirFixed = "$tglAkhirFixing[2]-$tglAkhirFixing[0]-$tglAkhirFixing[1]";
		$dataShow = $this->pemesanan
			->where('tgl_trx >=', $tglAwalFixed)
			->where('tgl_trx <=', $tglAkhirFixed)
			->findAll();
		$namapaket = #

		$data = [
			'tanggal' => $dataShow,
			'tglAwal' => $tglAwalFixed,
			'tglAkhir' => $tglAkhirFixed,
		];

		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";

		return view('/laporan/laporan_pertanggal', $data);
	}

	public function perbulan($param)
	{
		$splitData = explode("-", $param);
		$tglawal = "$splitData[0]-$splitData[1]-1";
		$tglakhir = "$splitData[0]-$splitData[1]-31";

		$dataShow = $this->pemesanan
			->where('tgl_trx >=', $tglawal)
			->where('tgl_trx <=', $tglakhir)
			->findAll();

		$data = [
			'tanggal' => $dataShow,
			'bulan' => $param,
			'tahun' => $splitData[0],
			'bText' => $splitData[2]
		];

		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";

		return view('/laporan/laporan_perbulan', $data);
	}

	public function tahun($param)
{
    $blnAwal = "$param-01-01";
    $blnAkhir = "$param-12-31";
    $dataShow = $this->pemesanan
        ->where('tgl_trx >=', $blnAwal)
        ->where('tgl_trx <=', $blnAkhir)
        ->orderBy('tgl_trx', 'ASC')
        ->findAll();

    $ttlBayar = 0;
    $ttlBayarSemua = 0;
    $bayar = array();
    for ($i = 1; $i <= 12; $i++) {
        // Get the first and last day of the month
        $firstDayOfMonth = (new DateTime("$param-$i-01"))->format('Y-m-d');
        $lastDayOfMonth = (new DateTime("$param-$i-01"))->format('Y-m-t'); // 'Y-m-t' gives the last day of the month

        $dataTanggal = $this->pemesanan
            ->where('tgl_trx >=', $firstDayOfMonth)
            ->where('tgl_trx <=', $lastDayOfMonth)
            ->orderBy('tgl_trx', 'ASC')
            ->findAll();

        $countTanggal = count($dataTanggal);

        if ($countTanggal != 0) {
            for ($u = 0; $u < $countTanggal; $u++) {
                $ttlBayar += $dataTanggal[$u]['ttl_bayar'];
                $ttlBayarSemua += $dataTanggal[$u]['ttl_bayar'];
            }
        }
        array_push($bayar, $ttlBayar);
        $ttlBayar = 0;
    }

    $data = [
        "bayar" => $bayar,
        "bayarSemua" => $ttlBayarSemua,
        "tahunTampil" => $param
    ];
    return view('/laporan/laporan_pertahun', $data);
}

	// function cetakbarangmasuk()
	// {
	// 	return view('laporan/viewbarangmasuk');
	// }


	// function cetakbarangkeluar()
	// {
	// 	return view('laporan/viewbarangkeluar');
	// }

	// function cetakdetailbarangmasuk()
	// {
	// 	return view('laporan/viewdetailbarangmasuk');
	// }

	// function cetakdetailbarangkeluar()
	// {
	// 	return view('laporan/viewdetailbarangkeluar');
	// }


	// function cetakbarangmasukperiode()
	// {
	// 	$tglawal = $this->request->getPost('tglawal');
	// 	$tglakhir = $this->request->getPost('tglakhir');

	// 	$modelbarangmasuk = new Modelbarangmasuk();
	// 	$datalaporan = $modelbarangmasuk->laporanperperiode($tglawal, $tglakhir);

	// 	$data = [
	// 		'datalaporan' => $datalaporan,
	// 		'tglawal' => $tglawal,
	// 		'tglakhir' => $tglakhir,

	// 	];
	// 	return view('laporan/cetallaporanbarangmasuk', $data);
	// }
	// function cetakdetailbarangmasukperiode()
	// {
	// 	$tglawal = $this->request->getPost('tglawal');
	// 	$tglakhir = $this->request->getPost('tglakhir');

	// 	$modelbarangmasuk = new Modelbarangmasuk();
	// 	$modeldetail = new Modeldetailbarangmasuk();
	// 	$datalaporan = $modelbarangmasuk->laporanperperiode($tglawal, $tglakhir);


	// 	// foreach ($datalaporan->getResultArray() as $total) :			
	// 	// 	$faktur = ($total['faktur1910005']);
	// 	// 	$datadetail = $modeldetail->dataDetail($faktur);
	// 	// endforeach;



	// 	$data = [
	// 		'datadetail' => $modeldetail->laporanperperiode($tglawal, $tglakhir),
	// 		'datalaporan' => $datalaporan,
	// 		'tglawal' => $tglawal,
	// 		'tglakhir' => $tglakhir,

	// 	];
	// 	return view('laporan/cetaldetaillaporanbarangmasuk', $data);
	// }

	// public function cetakdetailbarangkeluarkperiode()
	// {

	// 	$tglawal = $this->request->getPost('tglawal');
	// 	$tglakhir = $this->request->getPost('tglakhir');

	// 	$ModelBarangKeluar = new ModelBarangKeluar();
	// 	$modeldetail = new ModelDetailBarangKeluar();
	// 	$datalaporan = $ModelBarangKeluar->laporanperperiode($tglawal, $tglakhir);


	// 	// foreach ($datalaporan->getResultArray() as $total) :			
	// 	// 	$faktur = ($total['faktur1910005']);
	// 	// 	$datadetail = $modeldetail->dataDetail($faktur);
	// 	// endforeach;



	// 	$data = [
	// 		'datadetail' => $modeldetail->laporanperperiode($tglawal, $tglakhir),
	// 		'datalaporan' => $datalaporan,
	// 		'tglawal' => $tglawal,
	// 		'tglakhir' => $tglakhir,

	// 	];
	// 	return view('laporan/cetaldetaillaporanbarangkeluar', $data);
	// }


	// function cetakbarangkeluarperiode()
	// {
	// 	$tglawal = $this->request->getPost('tglawal');
	// 	$tglakhir = $this->request->getPost('tglakhir');

	// 	$modelbarangkeluar = new ModelBarangKeluar();
	// 	$datalaporan = $modelbarangkeluar->laporanperperiode($tglawal, $tglakhir);

	// 	$data = [
	// 		'datalaporan' => $datalaporan,
	// 		'tglawal' => $tglawal,
	// 		'tglakhir' => $tglakhir,

	// 	];
	// 	return view('laporan/cetallaporanbarangkeluar', $data);
	// }

	// function tampilgarfikbarangmasuk()
	// {

	// 	$bulan = $this->request->getPost('bulan');
	// 	$db = \Config\Database::connect();
	// 	$query = $db->query("SELECT `tglfaktur1910005` AS `tgl` ,totalharga1910005 FROM `barangmasuk1910005` WHERE DATE_FORMAT(`tglfaktur1910005`,'%Y-%m')= '$bulan' ORDER BY tglfaktur1910005 ASC")->getResult();
	// 	$data = [
	// 		'grafik' => $query
	// 	];
	// 	$json = [
	// 		'data' => view('laporan/grafikbarangmasuk', $data)
	// 	];
	// 	echo json_encode($json);
	// }
}
