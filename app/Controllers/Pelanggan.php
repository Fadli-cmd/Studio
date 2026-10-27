<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPelanggan;
use App\Models\BookingModel;
use App\Models\ModelPembayaran;

class Pelanggan extends BaseController
{
    protected $pelanggan;
    protected $pemesanan;
    protected $pembayaran;

    public function __construct()
    {
        $this->pelanggan = new ModelPelanggan();
        $this->pemesanan = new BookingModel();
        $this->pembayaran = new ModelPembayaran();
        helper('form'); // Memuat helper form
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
				session()->set('cari_pelanggan', $cari);
				redirect()->to('pelanggan/index');
			} else {
				$cari = session()->get('cari_pelanggan');
			}
	
			$datapelanggan = $cari ? $this->pelanggan->cariData($cari)->paginate(5, 'pelanggan') : $this->pelanggan->paginate(5, 'pelanggan');
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
			$nohalaman = $this->request->getVar('page_pelanggan') ? $this->request->getVar('page_pelanggan') : 1;
			$data = [
				'countAllOrder' => $ttlcountOrder,
				'countMenungguPembayaran' => $ttlcountMenungguPembayaran,
				'countMenungguKonfirmasi' => $ttlcountMenungguKonfirmasi,
				'tampildata' => $datapelanggan,
				'pager' => $this->pelanggan->pager,
				'nohalaman' => $nohalaman,
				'cari' => $cari
			];
			return view('pelanggan/viewpelanggan', $data);
		}

    public function formtambah()
    {

        return view('pelanggan/formtambah');
    }

    public function simpandata()
    {

        $idmember = $this->request->getPost('kd');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $alamat = $this->request->getPost('alamat');
        $nohp = $this->request->getPost('nohp');

        // validasi
        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'kd' => [
                'rules' => 'required|is_unique[pelanggan.idmember]',
                'label' => 'Id Pelanggan',
                'errors' => [
                    'required' => '{field} TIDAK BOLEH KOSONG',
                    'is_unique' => '{field} SUDAH ADA, COBA LAGI YANG LAIN'

                ]
            ],
            'username' => [
                'rules' => 'required',
                'label' => 'Username',
                'errors' => [
                    'required' => '{field} TIDAK BOLEH KOSONG',

                ]
            ],


            'email' => [
                'rules' => 'required',
                'label' => 'email',
                'errors' => [
                    'required' => '{field} TIDAK BOLEH KOSONG',
                    'numeric' => '{field} HANYA BOLEH ANGKA',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'label' => 'alamat',
                'errors' => [
                    'required' => '{field} TIDAK BOLEH KOSONG'
                ]
            ],
            'nohp' => [
                'rules' => 'required',
                'label' => 'nohp',
                'errors' => [
                    'required' => '{field} TIDAK BOLEH KOSONG',
                    'numeric' => '{field} HANYA BOLEH ANGKA',
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
            return redirect()->to('pelanggan/formtambah');
        } else {

            $this->pelanggan->insert([
                'idmember' => $idmember,
                'user_name' => $username,
                'email' => $email,
                'alamat' => $alamat,
                'telp' => $nohp
            ]);

            $pesan = [
                'sukses' => '<div class ="alert alert-success">YEYY.. DATA BERHASIL DISIMPAN</div>'

            ];

            session()->setFlashdata($pesan);
            return redirect()->to('pelanggan/index');
        }
    }
    public function formedit($kode)
    {
        $cekdata = $this->pelanggan->find($kode);

        if ($cekdata) {

            $data = [
                'kd' => $cekdata['idmember'],
                'username' => $cekdata['user_name'],
                'email' => $cekdata['email'],
                'alamat' => $cekdata['alamat'],
                'nohp' => $cekdata['telp']

            ];

            return view('pelanggan/formeditpelanggan', $data);
        }
    }
    public function updatedata()
    {
        $idmember = $this->request->getPost('kd');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $alamat = $this->request->getPost('alamat');
        $nohp = $this->request->getPost('nohp');

        // validasi
        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'username' => [
                'rules' => 'required',
                'label' => 'Username',
                'errors' => [
                    'required' => '{field} TIDAK BOLEH KOSONG',

                ]
            ],


            'email' => [
                'rules' => 'required',
                'label' => 'email',
                'errors' => [
                    'required' => '{field} TIDAK BOLEH KOSONG',
                    'numeric' => '{field} HANYA BOLEH ANGKA',
                ]
            ],

            'alamat' => [
                'rules' => 'required',
                'label' => 'alamat',
                'errors' => [
                    'required' => '{field} TIDAK BOLEH KOSONG'
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
            return redirect()->to('pelanggan/formedit/' . $idmember);
        } else {

            $this->pelanggan->update($idmember, [
                'user_name' => $username,
                'email' => $email,
                'alamat' => $alamat,
                'telp' => $nohp
            ]);

            $pesan = [
                'sukses' => '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <h5><i class="icon fas fa-check"></i> SELAMAT!!</h5>
            Data pelanggan Berhasil Di-Update
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button></div>'
            ];


            session()->setFlashdata($pesan);
            return redirect()->to('pelanggan/index');
        }
    }

    public function hapus($id)
    {

        $rowData = $this->pelanggan->find($id);

        if ($rowData) {

            $this->pelanggan->delete($id);

            $pesan = [
                'sukses' => '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> SELAMAT!!</h5>
                Data pelanggan Berhasil Di-Hapus
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('pelanggan/index');
        } else {
            exit('DATA TIDAK DITEMUKAN');
        }
    }
}
