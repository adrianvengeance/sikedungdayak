<?php

namespace App\Models;

use CodeIgniter\Model;

class PindahModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pindah';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nik', 'numkk', 'namaagt', 'jeniskel', 'tglpindah', 'alamatpindah', 'keterangan', 'tgllahir', 'agama', 'goldar', 'keluarga', 'statusdiri', 'statuswarga', 'pendidikan', 'pekerjaan', 'ayah', 'ibu', 'hubungkel',];

    public function jumlah()
    {
        $query = $this->db->table('pindah');
        $query->select('*');
        $all = $query->get()->getResultArray();
        return count($all);
    }

    public function semuanya()
    {
        $query = $this->db->table('pindah');
        $query->select('*');
        return $query->get()->getResult();
    }
}
