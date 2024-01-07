<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\WargaModel;

class User extends BaseController
{
    protected $usersModel;
    protected $wargaModel;
    protected $user;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->wargaModel = new WargaModel();
        $this->user = $this->usersModel->where('email', session()->get('email'))->first();
    }

    public function index()
    {
        if ($this->user) {
            // User by email
            $user = $this->usersModel->where('email', session()->get('email'))->first();

            // Pagination
            $currentPage = $this->request->getVar('page_warga') ? $this->request->getVar('page_warga') : 1;

            $data = [
                'title' => 'Home Page',
                'warga' => $this->wargaModel->paginate(5, 'warga'),
                'pager' => $this->wargaModel->pager,
                'currentPage' => $currentPage,
                'user' => $user,
            ];
            return view('user/index', $data);
        } else {
            session()->setFlashdata('gagal', 'Login terlebih dahulu!');
            return redirect()->to('login');
        }
    }
}
