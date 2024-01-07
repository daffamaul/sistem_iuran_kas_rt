<?php

namespace App\Models;

use CodeIgniter\Model;

class WargaModel extends Model
{
    protected $table = 'warga';
    protected $allowedFields = ['users_id', 'nama', 'jenis_kelamin', 'no_hp', 'alamat', 'no_rumah', 'nik', 'status'];

    public function search($keyword)
    {
        $builder = $this->table('warga');
        return $builder->like('nama', $keyword)->orLike('alamat', $keyword)->orLike('nik', $keyword);
    }
}
