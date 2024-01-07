<?php

namespace App\Models;

use CodeIgniter\Model;

class IuranModel extends Model
{
    protected $table = 'iuran';
    protected $allowedFields = ['tanggal', 'warga_id', 'nominal', 'keterangan', 'jenis_iuran'];

    public function search($keyword)
    {
        $builder = $this->table('iuran');
        return $builder->like('warga_id', $keyword)->orLike('keterangan', $keyword)->orLike('jenis_iuran', $keyword)->orLike('nominal', $keyword);
    }

    public function iuran_warga_detail($id)
    {
        $iuran_warga_detail = $this->db->table('iuran')
            ->join('warga', 'warga.id = iuran.warga_id')
            ->where('iuran.id', $id)
            ->get()
            ->getResultArray();
        return $iuran_warga_detail;
    }

    public function iuran_warga_edit()
    {
        $iuran_warga_edit = $this->db->table('iuran')
            ->select('*')
            ->join('warga', 'warga.id = iuran.warga_id')
            ->join('jenis_iuran', 'jenis_iuran.id = iuran.jenis_iuran')
            ->get()
            ->getResultArray();
        return $iuran_warga_edit;
    }

    public function sum_nominal()
    {
        $sum_nominal = "SELECT sum(iuran.nominal) AS total_nominal FROM iuran ";
        $result = $this->db->query($sum_nominal);
        return $result->getResultArray();
    }
}
