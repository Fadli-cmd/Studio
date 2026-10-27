<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;
use CodeIgniter\Exceptions\AlertError;
use Config\Validation;

class Login extends BaseController
{
    protected $login; // Pastikan properti didefinisikan

    public function __construct()
    {
        $this->login = new ModelLogin(); // Inisialisasi properti
        helper('form'); // Memuat helper form
    }

    public function index()
    {
        return view('login/index');
    }

    public function cekuser()
    {
        $iduser = $this->request->getPost('iduser');
        $pass = $this->request->getPost('pass');

        // validasi
        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'iduser' => [
                'rules' => 'required',
                'label' => 'ID USER',
                'errors' => [
                    'required' => '{field} TIDAK BOLEH KOSONG',
                ]
            ],
            'pass' => [
                'rules' => 'required',
                'label' => 'PASSWORD',
                'errors' => [
                    'required' => '{field} TIDAK BOLEH KOSONG',
                ]
            ],
        ]);

        if (!$valid) {
            $sessErorr = [
                'errIdUser' => $validation->getError('iduser'),
                'errPassword' => $validation->getError('pass'),
            ];

            session()->setFlashdata($sessErorr);
            return redirect()->to('/login/index');
        } else {
            $cekUserLogin = $this->login->where('usernama', $iduser)->first();
            if ($cekUserLogin == null) {
                $sessErorr = [
                    'errIdUser' => 'MAAF USER TIDAK TERDAFTAR',
                ];

                session()->setFlashdata($sessErorr);
                return redirect()->to('/login/index');
            } else {
                $passwordUser = $cekUserLogin['userpassword'];
                // Pastikan password_verify digunakan dengan benar
                if (password_verify($pass, $passwordUser)) {
                    $idlevel = $cekUserLogin['userLevelId'];
                    $namauser = $cekUserLogin['usernama'];
                    $namaLevel = $cekUserLogin['userLevelName'];

                    $simpan_sesion = [
                        'iduser' => $iduser,
                        'namauser' => $namauser,
                        'idLevel' => $idlevel,
                        'namaLevel' => $namaLevel
                    ];

                    session()->set($simpan_sesion);
                    return redirect()->to('/main/index');
                } else {
                    $sessErorr = [
                        'errPassword' => 'MAAF PASSWORD SALAH',
                    ];

                    session()->setFlashdata($sessErorr);
                    return redirect()->to('/login/index');
                }
            }
        }
    }

    public function keluar()
    {
        session()->destroy();
        return redirect()->to('/login/index');
    }
}
