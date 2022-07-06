<?php

namespace App\Models;

use CodeIgniter\Model;

class SmallimgModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'smallimg';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama', 'jabatan', 'gambar'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
