<?php

namespace App\Models;

use CodeIgniter\Model;

class AseptorModel extends Model
{
    protected $table            = 'aseptor';
    protected $primaryKey       = 'aseptor_id';
    protected $allowedFields    = ['data_id', 'sumber_aseptor', 'jenis_aseptor'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function ifExist($id)
    {
        $builder = $this->where('data_id', $id);
        return $builder->get()->getRow();
    }

    public function getId($dataid)
    {
        return $this->where('data_id', $dataid)->first();
    }

    public function count($sumber, $aseptor)
    {
        $builder = $this->where('sumber_aseptor', $sumber);
        $builder->where('jenis_aseptor', $aseptor);
        return $builder->get()->getResultArray();
    }

    public function listPeople($akseptor)
    {
        $builder = $this->select("*, TIMESTAMPDIFF(YEAR, tgllahir, CURDATE()) AS age");
        $builder->join('data', 'data.id = aseptor.data_id');
        $builder->where('jenis_aseptor', $akseptor);
        $builder->orderBy('sumber_aseptor ASC, age ASC');
        return $builder->get()->getResultArray();
    }
}
