<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoytModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'videoyt';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['link'];
}
