<?php

namespace App\Controllers;

use App\Models\UserModel;

class Registrasi extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [
            'validation' => \config\Services::validation()
        ];
        echo view('userlogin/viewregistrasi', $data);
    }

    //--------------------------------------------------------------------
    public function save()
    {
        $rules = [
            'username' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[pelanggan.email]',
            'password' => 'required|min_length[8]',
            'passwordconfirm' => 'matches[password]'
        ];
        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'user_name' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'alamat' => $this->request->getVar('alamat'),
                'telp' => $this->request->getVar('telp'),
                'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)

            ];
            $model->simpan($data);
            return redirect()->to('/userlogin');
        } else {
            $data['validation'] = $this->validator;
            echo view('userlogin/viewregistrasi', $data);
        }
    }
}
