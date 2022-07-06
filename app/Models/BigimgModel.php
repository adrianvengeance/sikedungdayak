<?php

namespace App\Models;

use CodeIgniter\Model;

class BigimgModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bigimg';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['title', 'subtitle', 'gambar'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
