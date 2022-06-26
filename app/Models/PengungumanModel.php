<?php

namespace App\Models;

use CodeIgniter\Model;

class PengungumanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengunguman';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['isi', 'waktu'];
}
