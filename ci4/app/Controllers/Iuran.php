<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\WargaModel;
use App\Models\IuranModel;
use App\Models\JenisIuranModel;

class Iuran extends BaseController
{
    protected $usersModel;
    protected $wargaModel;
    protected $iuranModel;
    protected $jenisIuranModel;
    protected $user;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->iuranModel = new IuranModel();
        $this->wargaModel = new WargaModel();
        $this->jenisIuranModel = new JenisIuranModel();
        $this->user = $this->usersModel->where('email', session()->get('email'))->first();
    }

    public function index()
    {
        if ($this->user) {
            if ($this->user['role'] == 1) {
                $keyword = $this->request->getVar('keyword');
                if ($keyword) {
                    $iuran = $this->iuranModel->search($keyword);
                } else {
                    $iuran = $this->iuranModel;
                }

                // Pagination
                $currentPage = $this->request->getVar('page_iuran') ? $this->request->getVar('page_iuran') : 1;

                $nominal = $this->iuranModel->sum_nominal()[0];

                $data = [
                    'title' => 'Home Page',
                    'iuran' => $iuran->paginate(5, 'iuran'),
                    'pager' => $this->iuranModel->pager,
                    'currentPage' => $currentPage,
                    'user' => $this->user,
                    'nominal' => $nominal,
                ];
                return view('iuran/index', $data);
            } else {
                session()->setFlashdata('gagal', 'Tidak memiliki hak akses!');
                return redirect()->to('/user');
            }
        } else {
            session()->setFlashdata('gagal', 'Login terlebih dahulu!');
            return redirect()->to('login');
        }
    }

    public function detail($id = false)
    {
        if ($this->user) {
            if ($this->user['role'] == 1) {
                $iuran_warga = $this->iuranModel->iuran_warga_detail($id)[0];
                $iuran = $this->iuranModel->find($id);
                $data = [
                    'title' => 'Detail Page',
                    'iuran_warga' => $iuran_warga,
                    'iuran' => $iuran,
                    'user' => $this->user,
                ];
                return view('iuran/detail', $data);
            } else {
                session()->setFlashdata('gagal', 'Tidak memiliki hak akses!');
                return redirect()->to('/user');
            }
        } else {
            session()->setFlashdata('gagal', 'Login terlebih dahulu!');
            return redirect()->to('login');
        }
    }

    public function create()
    {
        if ($this->user) {
            if ($this->user['role'] == 1) {
                $warga = $this->wargaModel->findAll();
                $data = [
                    'title' => 'Tambah Data',
                    'user' => $this->user,
                    'warga' => $warga,
                ];
                return view('iuran/create', $data);
            } else {
                session()->setFlashdata('gagal', 'Tidak memiliki hak akses!');
                return redirect()->to('/user');
            }
        } else {
            session()->setFlashdata('gagal', 'Login terlebih dahulu!');
            return redirect()->to('login');
        }
    }

    public function save()
    {
        if ($this->user) {
            if ($this->user['role'] == 1) {
                $data = [
                    'tanggal' => $this->request->getVar('tanggal'),
                    'warga_id' => (int)$this->request->getVar('warga_id'),
                    'nominal' => (int)$this->request->getVar('nominal'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'jenis_iuran' => (int)$this->request->getVar('jenis_iuran'),
                ];
                $this->iuranModel->save($data);
                session()->setFlashdata('berhasil', 'Data berhasil disimpan.');
                return redirect()->to('/iuran');
            } else {
                session()->setFlashdata('gagal', 'Tidak memiliki hak akses!');
                return redirect()->to('/user');
            }
        } else {
            session()->setFlashdata('gagal', 'Login terlebih dahulu!');
            return redirect()->to('login');
        }
    }

    public function delete($id)
    {
        if ($this->user) {
            if ($this->user['role'] == 1) {
                $this->iuranModel->delete($id);
                session()->setFlashdata('berhasil', 'Data berhasil dihapus.');
                return redirect()->to('/iuran');
            } else {
                session()->setFlashdata('gagal', 'Tidak memiliki hak akses!');
                return redirect()->to('/user');
            }
        } else {
            session()->setFlashdata('gagal', 'Login terlebih dahulu!');
            return redirect()->to('login');
        }
    }

    public function edit($id)
    {
        if ($this->user) {
            if ($this->user['role'] == 1) {
                $data = [
                    'title' => 'Ubah Data',
                    'iuran_warga' => $this->iuranModel->iuran_warga_edit($id)[0],
                    'iuran' => $this->iuranModel->find($id),
                    'user' => $this->user,
                    'warga' => $this->wargaModel->findAll(),
                    'jenis_iuran' => $this->jenisIuranModel->findAll(),
                ];
                return view('iuran/edit', $data);
            } else {
                session()->setFlashdata('gagal', 'Tidak memiliki hak akses!');
                return redirect()->to('/user');
            }
        } else {
            session()->setFlashdata('gagal', 'Login terlebih dahulu!');
            return redirect()->to('login');
        }
    }

    public function update($id)
    {
        if ($this->user) {
            if ($this->user['role'] == 1) {
                $data = [
                    'tanggal' => $this->request->getVar('tanggal'),
                    'warga_id' => (int)$this->request->getVar('warga_id'),
                    'nominal' => (int)$this->request->getVar('nominal'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'jenis_iuran' => (int)$this->request->getVar('jenis_iuran'),
                ];
                $this->iuranModel->update($id, $data);
                session()->setFlashdata('berhasil', 'Data berhasil diubah.');
                return redirect()->to('/iuran');
            } else {
                session()->setFlashdata('gagal', 'Tidak memiliki hak akses!');
                return redirect()->to('/user');
            }
        } else {
            session()->setFlashdata('gagal', 'Login terlebih dahulu!');
            return redirect()->to('login');
        }
    }

    public function debug($id)
    {
        dd($this->iuranModel->iuran_warga_edit($id));
        // dd($this->wargaModel->findAll());
    }
}
