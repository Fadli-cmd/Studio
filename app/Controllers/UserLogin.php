<?php

namespace App\Controllers;

use App\models\UserModel;

class UserLogin extends BaseController
{
    public function index()
    {

        echo view('userlogin/viewlogin');
    }

    //--------------------------------------------------------------------

    public function ceklogin()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $model->cek_login($username, $password);
        if ($cek) {
            $pass = $cek['user_password'];
            $veryfi = password_verify($password, $pass);
            if ($veryfi) {
                session()->set('login', $cek['user_name']);
                return redirect()->to('/halaman');
            } else {
                $session->setFlashdata('pwd', 'Password Salah');
                return redirect()->to('/UserLogin');
            }
        } else {
            $session->setFlashdata('user', 'User Tidak ditemukan ');
            return redirect()->to('/UserLogin');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/halaman');
    }
}
