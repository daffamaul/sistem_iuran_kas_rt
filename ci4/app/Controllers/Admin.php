<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\WargaModel;

class Admin extends BaseController
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
        d($this->request->getVar());
        if ($this->user) {
            if ($this->user['role'] == 1) {
                $keyword = $this->request->getVar('keyword');
                if ($keyword) {
                    $warga = $this->wargaModel->search($keyword);
                } else {
                    $warga = $this->wargaModel;
                }

                // Pagination
                $currentPage = $this->request->getVar('page_warga') ? $this->request->getVar('page_warga') : 1;

                $data = [
                    'title' => 'Home Page',
                    'warga' => $warga->paginate(5, 'warga'),
                    'pager' => $this->wargaModel->pager,
                    'currentPage' => $currentPage,
                    'user' => $this->user,
                ];
                return view('admin/index', $data);
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
                $warga = $this->wargaModel->find($id);
                $data = [
                    'title' => 'Detail Page',
                    'warga' => $warga,
                    'user' => $this->user,
                ];
                return view('admin/detail', $data);
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
                $data = [
                    'title' => 'Tambah Data',
                    'user' => $this->user,
                ];
                return view('admin/create', $data);
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
                    'users_id' => $this->user['id'],
                    'status' => $this->request->getVar('status'),
                    'nik' => $this->request->getVar('nik'),
                    'nama' => $this->request->getVar('nama'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'no_hp' => $this->request->getVar('no_hp'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_rumah' => $this->request->getVar('no_rumah')
                ];
                $this->wargaModel->save($data);
                session()->setFlashdata('berhasil', 'Data berhasil disimpan.');
                return redirect()->to('/admin');
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
                $this->wargaModel->delete($id);
                session()->setFlashdata('berhasil', 'Data berhasil dihapus.');
                return redirect()->to('/admin');
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
                    'warga' => $this->wargaModel->find($id),
                    'user' => $this->user
                ];
                return view('admin/edit', $data);
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
                if ($this->request->getVar('aktif') == 'on') {
                    $status = 1;
                } else {
                    $status = 0;
                }

                $data = [
                    'users_id' => $this->user['id'],
                    'status' => $status,
                    'nik' => $this->request->getVar('nik'),
                    'nama' => $this->request->getVar('nama'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'no_hp' => $this->request->getVar('no_hp'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_rumah' => $this->request->getVar('no_rumah')
                ];
                $this->wargaModel->update($id, $data);
                session()->setFlashdata('berhasil', 'Data berhasil diubah.');
                return redirect()->to('/admin');
            } else {
                session()->setFlashdata('gagal', 'Tidak memiliki hak akses!');
                return redirect()->to('/user');
            }
        } else {
            session()->setFlashdata('gagal', 'Login terlebih dahulu!');
            return redirect()->to('login');
        }
    }
}
