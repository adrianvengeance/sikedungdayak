<?php

namespace App\Models;

use CodeIgniter\Model;

class KritiksaranModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kritiksaran';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['niknama', 'isi'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
