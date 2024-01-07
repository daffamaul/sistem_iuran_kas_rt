<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisIuranModel extends Model
{
    protected $table = 'jenis_iuran';
    protected $allowedFields = ['id', 'jenis_jurusan'];
}
