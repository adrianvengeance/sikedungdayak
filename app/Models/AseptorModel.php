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
}
