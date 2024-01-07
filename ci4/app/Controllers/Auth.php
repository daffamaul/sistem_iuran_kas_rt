<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Auth extends BaseController
{
    protected $helpers = ['form'];
    protected $validation;
    protected $usersModel;

    public function __construct()
    {
        $this->validation  = \Config\Services::validation();
        $this->usersModel = new UsersModel();
    }

    public function login()
    {
        $this->validation->setRules([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} perlu diisi',
                    'valid_email' => '{field} tidak valid'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} perlu diisi',
                    'min_length' => '{field} terlalu pendek'
                ],
            ],
        ]);


        $data = [
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];

        if (!$this->validation->run($data)) {
            $data = [
                'title' => 'Kas Warga — Login',
                'validation' => $this->validation
            ];
            return view('auth/login', $data);
        } else {
            $validatedData = $this->validation->getValidated();

            $email = $validatedData['email'];
            $password = $validatedData['password'];

            $user = $this->usersModel->where('email', $email)->first();

            if ($user) {
                if ($user['status'] == 1) {
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role' => $user['role']
                        ];
                        session()->set($data);
                        if ($user['role'] == 1) {
                            session()->setFlashdata('berhasil', 'Anda login sebagai admin!');
                            return redirect()->to('admin');
                        }
                        session()->setFlashdata('berhasil', 'Anda login sebagai user!');
                        return redirect()->to('user');
                    } else {
                        session()->setFlashdata('gagal', 'Gagal login, password salah!');
                        return redirect()->to('login');
                    }
                } else {
                    session()->setFlashdata('gagal', 'Gagal login, segera aktivasi akun!');
                    return redirect()->to('login');
                }
            } else {
                session()->setFlashdata('gagal', 'Gagal login, sudah buat akun?');
                return redirect()->to('login');
            }
        }
    }

    public function register()
    {
        $this->validation->setRules([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|max_length[30]|min_length[5]',
                'errors' => [
                    'required' => '{field} perlu diisi',
                    'max_length' => '{field} terlalu panjang',
                    'min_length' => '{field} terlalu pendek',
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} perlu diisi',
                    'valid_email' => '{field} tidak valid'
                ],
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[5]|max_length[10]',
                'errors' => [
                    'required' => '{field} perlu diisi',
                    'max_length' => '{field} terlalu panjang',
                    'min_length' => '{field} terlalu pendek',
                ],
            ],
            'password1' => [
                'label' => 'Password',
                'rules' => 'required|matches[password2]',
                'errors' => [
                    'required' => '{field} perlu diisi',
                    'matches' => '{field} tidak sesuai'
                ],
            ],
            'password2' => [
                'label' => 'Password',
                'rules' => 'required|matches[password1]',
                'errors' => [
                    'required' => '{field} perlu diisi',
                    'matches' => '{field} tidak sesuai'
                ],
            ],
        ]);

        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password1' => $this->request->getVar('password1'),
            'password2' => $this->request->getVar('password2'),
        ];

        if (!$this->validation->run($data)) {
            $data = [
                'title' => 'Kas Warga — Register',
                'validation' => $this->validation
            ];
            return view('auth/register', $data);
        } else {
            $validatedData = $this->validation->getValidated();
            $data = [
                'nama' => $validatedData['nama'],
                'email' => $validatedData['email'],
                'username' => $validatedData['username'],
                'password' => password_hash($validatedData['password1'], PASSWORD_DEFAULT),
                'status' => 1,
            ];
            $this->usersModel->insert($data);
            session()->setFlashdata('berhasil', 'Berhasil membuat akun');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->remove('email', 'role');
        session()->setFlashdata('berhasil', 'Berhasil logout!');
        return redirect()->to('login');
    }
}
