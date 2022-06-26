<?php

namespace App\Models;

use CodeIgniter\Model;

class MeninggalModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'meninggal';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nik', 'numkk', 'namaagt', 'jeniskel', 'tgllahir', 'tgldie', 'penyebab', 'agama', 'goldar', 'keluarga', 'statusdiri', 'statuswarga', 'pendidikan', 'pekerjaan', 'ayah', 'ibu', 'hubungkel',];

    public function jumlah()
    {
        $query = $this->db->table('meninggal');
        $query->select('*');
        $all = $query->get()->getResultArray();
        return count($all);
    }

    public function semuanya()
    {
        $query = $this->db->query("SELECT *, CURDATE(), TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age FROM meninggal;");
        return $query->getResult();
    }
}
